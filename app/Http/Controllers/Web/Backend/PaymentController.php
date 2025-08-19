<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function buyNow($id)
    {
        $user = Auth::user();

        $plan = Plan::findOrFail($id);

        Payment::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'amount' => $plan->amount
        ]);

        $user->amount = $user->amount + $plan->amount;
        $user->save();

        return redirect()->route('recharge')->with('message', 'Payment successful');

    }
}
