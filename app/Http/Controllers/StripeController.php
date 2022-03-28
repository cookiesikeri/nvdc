<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use Illuminate\Http\Request;
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
            'description' => 'DPayment for Donation',
            'payment_method_types' => ['card']
        ]);
        $intent = $payment_intent->client_secret;

        return view('stripe.checkout', [
            'intent' => $intent,
            'amount' => $request->amount,
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }

    public function callback(Request $request)
    {
        // $ref = Str::random(10);

        // $donations           = new Donate();
        // $donations->name     = $request->name;
        // $donations->email    = $request->email;
        // $donations->amount = $request->amount;
        // $donations->reference = $ref;
        // $donations->save();


        return view('stripe.success');
    }
}
