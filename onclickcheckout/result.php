<?php

require_once('../hyperpayclass.php');
$hp = new Hyperpay();

$checkoutId = $_GET['id'];

$responseData= $hp->get_payment_status($checkoutId);

$paymentResponse = json_decode($responseData, TRUE);


$resultCode = $paymentResponse["result"]["code"];


$successPattern1 = '/^(000\.000\.|000\.100\.1|000\.[36])/';
$successPattern2 = '/^(000\.400\.0[^3]|000\.400\.100)/';

if(preg_match($successPattern1, $resultCode) || preg_match($successPattern2, $resultCode)){

    echo "Payment Success";
    
    if($paymentResponse['registrationId']){
        echo "regisration ID " . $paymentResponse['registrationId'];
    }
    
    

}else{
    echo "Payment Rejected";
    
    //you can not save the regisration Id if the payment is declined.
}

?>