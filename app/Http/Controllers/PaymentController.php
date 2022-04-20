<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Donate;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{

    public function redirectToGateway(Request $request)
    {
        // Paystack receives the amount in Kobo, so we multiply by 100 to get the Naira equivalent
        $request->amount = $request->amount * 100;

        if ($request->type == 'card'){
            $this->payWithCard($request);
        }

        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function payWithCard(Request $request)
    {
        $resp = array(
            'status'    =>  0,
            'msg'       =>  'Pending'
        );
        $verified = $this->verifyPaystackPayment($request->pRef);
        if($verified == -1) {
            $resp['status'] = $verified;
            $resp['msg'] = 'We were unable to initiate the process of verifying your payment status. Please contact our customer support lines for help.';
        } else if((1 <= $verified) && ($verified <= 88)) {
            $resp['status'] = $verified;
            $resp['msg'] = 'Unfortunately, our servers encountered an error trying to validate your payment status. Please contact our customer support lines for help.';
        } else if($verified == 404) {
            $resp['status'] = $verified;
            $resp['msg'] = 'We could not find your payment transaction reference. Your payment might have been declined. Please contact your bank for clarification.';
        } else if($verified == '503') {
            $resp['status'] = $verified;
            $resp['msg'] = 'Unable to verify transaction. Please contact our customer support lines for help.';
        } else {
            $ref = Str::random(6);
            if(Auth::check()) {
                Log::info('user is Authenticated');
                $user = Auth::user();
            } else {
                Log::info('user is not Authenticated');
                $user = User::create([
                    'username' => 'user',
                    'email' => $this->random_email(),
                    'password' => 'user',
                    'phone' =>  'user',
                ]);
                Log::info('user account was successfully created.');
                Log::info($user);
            }
            $order = new Donate();

            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->amount = $request->amount;
            $order->paystack_ref = $request->pRef;

            $order->payment_type = 'Card';
            $order->reference = 'NVDC_NG_DONATION_' . $ref;
            $order->payment_status = 1;
            $order->status = 1;

            $user->donations()->save($order);
            Log::info('order saved.');
            $resp['status'] = 200;
            $resp['msg'] = "successful.";
            if(Auth::check()) {
                return response()->json($resp);
            } else {
            $resp['status'] = 100;
            $resp['msg'] = "Payment successful.";
            return response()->json($resp);
            }

        }
}

public function paymentCallBack(){

    $paymentDetails = Paystack::getPaymentData();


    if ($paymentDetails['status'] == true && $paymentDetails['data']['metadata']['custom_field']['type'] == 'card'){

        return $this->payWithCardCallback();
    }
    else{
        dd($paymentDetails['data']['metadata']['custom_field']['type']);
    }


}

public function payWithCardCallback(){
    $paymentDetails = Paystack::getPaymentData();
    if ($paymentDetails['data']['status'] == 'success'){
        $order = Donate::find($paymentDetails['data']['metadata']['custom_field']);
        $order->reference = request()->trxref;
        $order->status = 'paid';
        $order->save();

        Session::flash('success', 'Transaction Successful. Your Reference ID is: ' . request()->trxref);
        return redirect()->route('paymentsummary')->with('transaction_ref', request()->trxref);
    }else{
        dd('payment failed');
    }
    return $this;
}

public function random_email()
{
    $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $domains = ['gmail', 'yahoo', 'outlook', 'protonmail'];
    $groups = ['com', 'net', 'ai', 'org', 'tech'];
    $suffix = rand(0, count($domains) - 1);
    $dot = rand(0, count($groups) - 1);
    $chars = '';
    for($i = 0; $i < 8; $i++)
    {
        $r = rand(0, strlen($alpha) - 1);
        $chars .= $alpha[$r];
    }
    $email = $chars . '@' . $domains[$suffix] . '.' . $groups[$dot];
    return $email;
}

public function PaymentSummary()
{


    return view('paywithcard');

}

public function verifyPaystackPayment($paystackRef) {
    $verified = 0;
    $result = array();
    $url = 'https://api.paystack.co/transaction/verify/' . $paystackRef;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt(
        $ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . env('PAYSTACK_SECRET_KEY')]
    );
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $request = curl_exec($ch);

    if(curl_errno($ch)) {
        $verified = curl_errno($ch);
    } else {
        if ($request) {
            $result = json_decode($request, true);
            Log::info($result);
            if($result["status"] == "success") {
                $verified = 100;
            } else {
                $verified = 404;
            }
        } else {
            $verified = 503;
        }
    }
    curl_close($ch);
}









}

