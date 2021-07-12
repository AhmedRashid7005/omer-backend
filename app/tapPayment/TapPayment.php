<?php
namespace App\tapPayment;
require __DIR__.'/vendor/autoload.php';
use TapPayments\GoSell;

// My api  Test Token
// arafat.dml@gmail.com
// arafat api key...
GoSell::setPrivateKey("sk_test_eDn7uGt1BL096EOiRH3CoXpV");

class TapPayment{

    /**
     * @date: 18/11/2020
     * createCharge
     * @author arafat | arafat.dml@gmail.com
     * @return this will auto redirect to the
     * Execute page
     */

    public function createCharge($createData){
        // dd($createData);
        $charge = GoSell\Charges::create( $createData );

        // dump($charge); //will give charge response as PHP object

        /**
         *
         * @date 17/11/2020
         * @author Arafat.dml@gmail.com
         * This Piece Of code Is Wtritten By arafat
         * If we have the Charge Response then We need to
         * Redirect the user to Make the Payment Execute
         *
         */

        if($charge){
            $executeChargeUrl = $charge->transaction->url;
            // Now Redirect
            header("location:".$executeChargeUrl);
            exit();
        }
        // return false;
    }

    /**
     * @date: 18/11/2020
     * @author arafat | arafat.dml@gmail.com
     * executeCharge
     * @return This Will Execute the Charge And return information
     */

    public function executeCharge($chargeId){

        $retrieved_charge = GoSell\Charges::retrieve($chargeId);

        return $retrieved_charge;
        // dump($retrieved_charge);
    }

}