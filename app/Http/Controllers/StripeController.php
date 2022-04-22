<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use App\Models\USDPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe;
use Illuminate\Support\Str;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    public function initialize(Request $request)
    {
        $ref = '51' . substr(uniqid(mt_rand(), true), 0, 8);

        if (!$request->amount) {
            return redirect()->route('stripe.pay');
        }

        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey(config('services.payment.stripe_secret'));

        $amount = $request->amount;
        $amount *= 100;
        $amount = (int) $amount;


        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'USD',
            'description' => 'Payment for UDSD Donation',
            'payment_method_types' => ['card']
        ]);
        $intent = $payment_intent->client_secret;



        $user           = new USDPayment();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->amount   = $request->amount;
        $user->phone   = $request->phone;
        $user->status   = 0;
        $user->reference = 'NVDC_DONATION_' . $ref;
        $user->save();

        Mail::to('info@nvdcng.com')->send(new \App\Mail\DonationPaymentAdmin($user));
        Mail::to($request->email)->send(new \App\Mail\DonationPayment($user));

        return view('stripe.checkout', [
            'intent' => $intent,
            'amount' => $request->amount,
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }

    public function callback(Request $request)
    {


        return view('stripe.success');
    }
}
