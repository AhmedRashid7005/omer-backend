<?php
namespace App\paypal;
require __DIR__.'/vendor/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function pr($data){
    echo "<pre>";
    print_r($data);
    echo "<pre>";
}

class Paypal{

    public $apiContext;

    public function __construct()
    {
        $this->apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                'AaUhjPX8h6Ap7UALw_x0wyeTDRyeJ0S7kG3UqpyxziFz4cL_xVxzOXSTbV2RLReL-XsdVarNvQcwKcMR',
                'EBhZmygbmW-KUvIiDQeWr7_GbeO03O7JiAWTwfAlsw9KZ787kv1C6OGAWiPGpY7eiJ9XCsiFJI11tW1Q'
                )
            );
    }

    public  function CreateSimplePaymentAndAuthorizeUser($planName, $planPrice)
    {
        $invoiceNumber = uniqid();
        $_SESSION["invoiceNumber"] = $invoiceNumber;

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName($planName)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice($planPrice);

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($planPrice);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($planPrice)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription($planName." Payment description")
            ->setInvoiceNumber($invoiceNumber);


        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route("paypal-execute-payment")."?success=true")
            ->setCancelUrl(route("paypal-execute-payment")."?success=false");


        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $request = clone $payment;

        try {
            $payment->create($this->apiContext);
        } catch (Exception $ex) {

           printf("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
            exit(1);
        }
        $payment->getApprovalLink();
        $approvalUrl = $payment->getApprovalLink();
        // dd($payment);
        // redrect ...
        header("Location: " . $approvalUrl);
        exit();
    }

    public  function ExecuteSimplePayment(){
        if (isset($_GET['success']) && $_GET['success'] == 'true') {

            $paymentId = $_GET['paymentId'];
            $payment = Payment::get($paymentId, $this->apiContext);
            // dump($payment);


            $execution = new PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);

            // if we want we can revalidate the payment here
           /*

           $transaction = new Transaction();
            $amount = new Amount();
            $details = new Details();

            $details->setShipping(0)
                ->setTax(0)
                ->setSubtotal(10);

            $amount->setCurrency('USD');
            $amount->setTotal(10);
            $amount->setDetails($details);
            $transaction->setAmount($amount);

            $execution->addTransaction($transaction);
            */
            // end revalidation the payment

            try {

                $result = $payment->execute($execution, $this->apiContext);

                return $paymentId;

                /*printf("Executed Payment", "Payment", $payment->getId(), $execution, $result);*/

                // Getting my payment Details

               /* $payment = Payment::get($paymentId, $this->apiContext);
                pr($payment);
                pr( $payment->getId() );
                */

                // Getting All Payments
               /* $params = array('count' => 10, 'start_index' => 5);
                $payments = Payment::all($params, $this->apiContext);
                pr($payments);*/

                # ---------------------------------------
                # End Arafat code for database Store
                # ---------------------------------------
            } catch (Exception $ex) {
                return false;
                // die("Error On Paypal Model");
            }
        } else {
            return false;
            printf("Get Data is Empty on Paypal Response", null);
            exit;
        }
        return false;
    }
}