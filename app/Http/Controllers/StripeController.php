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



        $order           = new USDPayment();
        $order->name     = $request->name;
        $order->email    = $request->email;
        $order->amount   = $request->amount;
        $order->phone   = $request->phone;
        $order->status   = 0;
        $order->reference = 'NVDC_DONATION_' . $ref;
        $order->save();

        Mail::to('info@nvdcng.com')->send(new \App\Mail\DonationPaymentAdmin($order));
        Mail::to($request->email)->send(new \App\Mail\DonationPayment($order));

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
