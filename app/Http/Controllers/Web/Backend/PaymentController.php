<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

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


    // paypal payment
    public function payment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success'),
                "cancel_url" => route('paypal.payment.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "100.00"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id']) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
            return redirect()->route('recharge')->with('error', 'Something went wrong.');
        }

        return redirect()->route('recharge')->with('error', $response['message'] ?? 'Something went wrong.');
    }

    public function paymentCancel()
    {
        return Inertia::render('Paypal/Cancel');
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            // Payment info extract
            $transaction_id = $response['id'];
            $payer_name = $response['payer']['name']['given_name'] ?? '' . ' ' . ($response['payer']['name']['surname'] ?? '');
            $payer_email = $response['payer']['email_address'] ?? null;
            $currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $status = $response['status'];

            // Save to database
            Payment::create([
                'transaction_id' => $transaction_id,
                'payer_name'     => $payer_name,
                'payer_email'    => $payer_email,
                'currency'       => $currency,
                'amount'         => $amount,
                'status'         => $status,
            ]);

            return redirect()->route('recharge')->with('message', 'Transaction completed and saved successfully.');
        }

        return redirect()->route('recharge')->with('error', $response['message'] ?? 'Payment capture failed.');
    }
}
