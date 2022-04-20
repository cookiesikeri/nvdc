<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Donate;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }


    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();



        if ($paymentDetails['status'] == true && $paymentDetails['status'] == 'Verification successful') {
            $payment = new Donate();
            $payment->user_id = auth()->user() ? auth()->user()->id : NULL;
            $payment->reference = $paymentDetails['data']['reference'];
            $payment->actual_amount = array_key_exists('actual_amount', $paymentDetails['data']['metadata']) ? $paymentDetails['data']['metadata']['actual_amount'] : null;
            $payment->customer_id = $paymentDetails['data']['customer']['id'];
            $payment->name = $paymentDetails['data']['customer']['first_name'] != null ? $paymentDetails['data']['customer']['first_name'] . ' ' . $paymentDetails['data']['customer']['last_name'] : null;
            $payment->email = $paymentDetails['data']['customer']['email'];
            $payment->phone = $paymentDetails['data']['customer']['phone'];
            $payment->amount = $paymentDetails['data']['amount'] / 100;
            $payment->fees = $paymentDetails['data']['fees'] / 100;
            $payment->gateway_response = $paymentDetails['data']['gateway_response'];
            $payment->paid_at = $paymentDetails['data']['paid_at'];
            $payment->transaction_date = $paymentDetails['data']['transaction_date'];
            $payment->payment_status = $paymentDetails['data']['status'];
            $payment->save;

        }


}

    /**
 *  In the case where you need to pass the data from your
 *  controller instead of a form
 *  Make sure to send:
 *  required: email, amount, reference, orderID(probably)
 *  optionally: currency, description, metadata
 *  e.g:
 *
 */








/**
 *  This fluent method does all the dirty work of sending a POST request with the form data
 *  to Paystack Api, then it gets the authorization Url and redirects the user to Paystack
 *  Payment Page. We've abstracted all of it, so you don't have to worry about that.
 *  Just eat your cookies while coding!
 */
Paystack::getAuthorizationUrl()->redirectNow();

/**
 * Alternatively, use the helper.
 */
paystack()->getAuthorizationUrl()->redirectNow();

/**
 * This fluent method does all the dirty work of verifying that the just concluded transaction was actually valid,
 * It verifies the transaction reference with Paystack Api and then grabs the data returned from Paystack.
 * In that data, we have a lot of good stuff, especially the `authorization_code` that you can save in your db
 * to allow for easy recurrent subscription.
 */
Paystack::getPaymentData();

/**
 * Alternatively, use the helper.
 */
paystack()->getPaymentData();

/**
 * This method gets all the customers that have performed transactions on your platform with Paystack
 * @returns array
 */
Paystack::getAllCustomers();

/**
 * Alternatively, use the helper.
 */
paystack()->getAllCustomers();


/**
 * This method gets all the plans that you have registered on Paystack
 * @returns array
 */
Paystack::getAllPlans();

/**
 * Alternatively, use the helper.
 */
paystack()->getAllPlans();


/**
 * This method gets all the transactions that have occurred
 * @returns array
 */
Paystack::getAllTransactions();

/**
 * Alternatively, use the helper.
 */
paystack()->getAllTransactions();

/**
 * This method generates a unique super secure cryptographic hash token to use as transaction reference
 * @returns string
 */
Paystack::genTranxRef();

/**
 * Alternatively, use the helper.
 */
paystack()->genTranxRef();


/**
* This method creates a subaccount to be used for split payments
* @return array
*/
Paystack::createSubAccount();

/**
 * Alternatively, use the helper.
 */
paystack()->createSubAccount();


/**
* This method fetches the details of a subaccount
* @return array
*/
Paystack::fetchSubAccount();

/**
 * Alternatively, use the helper.
 */
paystack()->fetchSubAccount();


/**
* This method lists the subaccounts associated with your paystack account
* @return array
*/
Paystack::listSubAccounts();

/**
 * Alternatively, use the helper.
 */
paystack()->listSubAccounts();


/**
* This method Updates a subaccount to be used for split payments
* @return array
*/
Paystack::updateSubAccount();

/**
 * Alternatively, use the helper.
 */
paystack()->updateSubAccount();

}

