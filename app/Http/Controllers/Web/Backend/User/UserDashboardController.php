<?php

namespace App\Http\Controllers\Web\Backend\User;

use App\Models\Plan;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Sender;
use App\Models\Payment;
use App\Models\SmsFile;
use App\Services\SendSms;
use App\Imports\SmsImport;
use App\Rules\ValidNumbers;
use App\Jobs\SendMessageJob;
use App\Services\SmsService;
use Illuminate\Http\Request;
use App\Helpers\CharacterCount;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserDashboardController extends Controller
{
    public function kyc()
    {
        $user = Auth::user();
        return Inertia::render('user_dashboard/Kyc', compact('user'));
    }

    public function kycStore(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string',
            'company_number' => 'required|string',
            'company_type' => 'required|string',
            'address' => 'required|string',
            'mobile' => 'required|string',
            'file_type' => 'required|string',
            'file' => 'required|file|mimes:jpg,png,jpeg,pdf,doc,docx',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filePath = $file->storeAs('uploads/kyc', $filename, 'public');
        }

        $otp = random_int(100000, 999999);

        $user = Auth::user();
        $user->company_name = $request->company_name;
        $user->company_number = $request->company_number;
        $user->company_type = $request->company_type;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->mobile_otp = $otp;
        $user->mobile_is_verified = false;
        $user->file_type = $request->file_type;
        $user->file = '/storage/' . $filePath;
        $user->save();

        $sms = new SmsService();
        $sms->sendSms($user->mobile, 'Your KYC OTP is ' . $otp);

        session(['email' => $user->email]);

        return redirect()->route('mobile.otp')->with('message', 'KYC Mobile OTP has been sent.');
    }

    public function mobileOtp()
    {
        $email = session('email');
        return Inertia::render('user_dashboard/MobileOtp', compact('email'));
    }

    public function mobileOtpStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mobile_otp' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return to_route('login')->withErrors(['email' => 'User not found.']);
        }

        if ($user->mobile_otp === $request->mobile_otp) {
            $user->mobile_is_verified = true;
            $user->mobile_otp = null;
            $user->save();

            Auth::login($user);

            return to_route('kyc')->with('message', 'OTP verified successfully.');
        }

        return redirect()->back()->withErrors(['otp' => 'Invalid OTP or Email does not match.']);
    }

    public function dashboard()
    {
        $amount = Payment::where('user_id', Auth::user()->id)->sum('amount');
        $payment = [
            'amount' => $amount,
        ];
        return Inertia::render('Dashboard', compact('payment'));
    }

    public function recharge()
    {
        $plans = Plan::all();

        $plans->each(function ($plan) {
            $plan->plan_feature = json_decode($plan->plan_feature, true);
        });

        return Inertia::render('user_dashboard/Recharge', compact('plans'));
    }

    public function transections()
    {
        $transection = Payment::with('plan')
            ->where('user_id', Auth::user()->id)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'plan_name' => $item->plan->plan_name,
                'amount' => $item->amount,
            ]);

        return Inertia::render('user_dashboard/Transections', compact('transection'));
    }

    public function ratePlan()
    {
        $ratePlan = User::where('id', Auth::user()->id)->select('musking', 'non_musking')->first();

        return Inertia::render('user_dashboard/RatePlan', compact('ratePlan'));
    }

    public function sendSms()
    {
        $senderId = Sender::where('user_id', Auth::user()->id)->get();
        $balence = Auth::user()->amount;

        return Inertia::render('user_dashboard/SendSms', compact('senderId', 'balence'));
    }
    public function sendSmsFile()
    {
        $senderId = Sender::where('user_id', Auth::user()->id)->get();
        return Inertia::render('user_dashboard/SendSmsFile', compact('senderId'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
            'message' => 'required|string',
            'sender_id' => 'required|string',
            'gender' => 'required|string',
            'age' => 'nullable|string',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filePath = $file->storeAs('uploads/sms', $filename, 'public');
        }

        Excel::import(
            new SmsImport($request->message, $request->sender_id, $request->age),
            storage_path('app/public/' . $filePath)
        );

        return back()->with('message', 'Data imported and saved to database.');
    }



    public function sendSmsStore(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|string|exists:senders,sender_id',
            'message'   => 'required|string',
            'number'    => ['required', 'string', new ValidNumbers],
        ]);

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

            if ($totalCost > $user->amount) {
                return back()->with('error', 'Insufficient amount');
            }

            if ($count <= 5) {
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
                foreach ($numbers as $num) {
                    SmsFile::create([
                        'sender_id' => $request->sender_id,
                        'number'    => $num,
                        'message'   => $request->message,
                        'count'     => $segments,
                        'cost'      => $rate * $segments,
                        'status'    => 'pending', 
                    ]);
                }

                SendMessageJob::dispatch($num, $request->message, $request->sender_id, $segments, $rate * $segments);
                
                $user->decrement('amount', $totalCost);
            }


            DB::commit();
            return back()->with('message', 'Sms Sent Successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong, please try again.');
        }
    }




    public function senderId()
    {
        $user = Auth::user();
        $senders = Sender::where('user_id', $user->id)->get();
        return Inertia::render('user_dashboard/SendId/Index', compact('senders'));
    }

    public function storeSenderId(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|string',
            'type' => 'required|string',
        ]);

        Sender::create([
            'user_id' => Auth::user()->id,
            'sender_id' => $request->sender_id,
            'type' => $request->type
        ]);

        return redirect()->route('sender_id')->with('message', 'Sender Id Created Successfully!');
    }

    // public function editSenderId($id)
    // {
    //     $sender = Sender::find($id);
    //     return Inertia::render('user_dashboard/SendId/Edit', compact('sender'));
    // }

    // public function updateSenderId(Request $request, $id)
    // {
    //     $sender = Sender::find($id);

    //     $sender->update([
    //         'sender_id' => $request->sender_id,
    //         'type' => $request->type
    //     ]);

    //     return redirect()->route('sender_id')->with('message', 'Sender Id Updated Successfully!');
    // }

    // public function destroySenderId($id)
    // {
    //     $sender = Sender::find($id);
    //     $sender->delete();
    //     return redirect()->route('sender_id')->with('message', 'Sender Id Deleted Successfully!');
    // }

    public function createSenderId()
    {
        return Inertia::render('user_dashboard/SendId/Create');
    }

    public function smsLogs()
    {
        $smsLogs = SmsFile::all();
        return Inertia::render('user_dashboard/SmsLogs', compact('smsLogs'));
    }

    public function blockUser()
    {
        $blockUser = SmsFile::where('block', 1)->get();
        return Inertia::render('user_dashboard/BlockUser', compact('blockUser'));
    }

    public function blockUserCreate()
    {
        return Inertia::render('user_dashboard/BlockUserCreate');
    }

    public function blockUserStore(Request $request)
    {
        $request->validate([
            'number' => [
                'required',
                'regex:/^01[3-9][0-9]{8}$/', // Valid BD format
                function ($attribute, $value, $fail) {
                    $allowedPrefixes = ['013', '017', '014', '018']; // Example: GP + Robi
                    $prefix = substr($value, 0, 3);
                    if (!in_array($prefix, $allowedPrefixes)) {
                        $fail("The $attribute must be from an allowed mobile operator.");
                    }
                }
            ],
        ]);

        SmsFile::create([
            'name' => $request->name,
            'age' => $request->age,
            'number' => $request->number,
            'gender' => $request->gender,
            'block' => 1
        ]);

        return back()->with('message', 'User Blocked Successfully!');
    }

    public function blockUserUpdate($id)
    {
        SmsFile::where('id', $id)->update(['block' => 0]);
        return back()->with('message', 'User Unblocked Successfully!');
    }
}
