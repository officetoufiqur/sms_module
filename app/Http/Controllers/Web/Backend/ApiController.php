<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Sender;
use App\Models\SmsFile;
use App\Services\SendSms;
use App\Rules\ValidNumbers;
use App\Jobs\SendMessageJob;
use Illuminate\Http\Request;
use App\Helpers\CharacterCount;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function sendSmsStore(Request $request)
    {
        // Validate request
        $request->validate([
            'sender_id' => 'required|string|exists:senders,sender_id',
            'message'   => 'required|string',
            'number'    => ['required', 'string', new ValidNumbers],
        ]);

        DB::beginTransaction();

        try {
            $sender = Sender::where('sender_id', $request->sender_id)
                ->with('user:id,musking,non_musking')
                ->firstOrFail();

            $rate = $sender->type === 'musking'
                ? $sender->user->musking
                : $sender->user->non_musking;

            $cc = new CharacterCount();
            $segments = $cc->getNumberOfSMSsegments($request->message);

            $numbers = array_map('trim', explode(',', $request->number));
            $count = count($numbers);
            $totalCost = $rate * $count * $segments;

            $user = Auth::user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated.'
                ], 401);
            }

            if ($totalCost > $user->amount && $user->amount < 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Insufficient amount'
                ], 400);
            }

            if ($count <= 5) {
                // Send immediately
                $sms = new SendSms();
                $sms->messageSend($request->number, $request->message);

                $user->decrement('amount', $totalCost);

                foreach ($numbers as $num) {
                    SmsFile::create([
                        'sender_id' => $request->sender_id,
                        'number'    => $num,
                        'message'   => $request->message,
                        'count'     => $segments,
                        'cost'      => $rate * $segments,
                        'status'    => 'delivered',
                    ]);
                }
            } else {
                // Queue the messages
                foreach ($numbers as $num) {
                    SmsFile::create([
                        'sender_id' => $request->sender_id,
                        'number'    => $num,
                        'message'   => $request->message,
                        'count'     => $segments,
                        'cost'      => $rate * $segments,
                        'status'    => 'pending',
                    ]);

                    SendMessageJob::dispatch($num, $request->message, $request->sender_id, $segments, $rate * $segments);
                }

                $user->decrement('amount', $totalCost);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'SMS sent successfully!',
                'total_cost' => $totalCost,
                'segments' => $segments,
                'numbers_count' => $count,
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong, please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
