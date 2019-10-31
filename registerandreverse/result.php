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

    echo "Payment Success\r\n";
    echo "----------------\r\n";
    echo "Registration ID " .  $paymentResponse['registrationId'] . "\r\n";
    echo "----------------\r\n";
    $paymentId = $paymentResponse['id'];
    
    //Do the reverse if the payment is sucessful, and store the registrationId for later on payments.

    $reverseResponseData = $hp->reverse_payment($paymentId);
    $reverseRespone = json_decode($reverseResponseData, TRUE);
    $reverseResultCode = $paymentResponse["result"]["code"];
    if(preg_match($successPattern1, $reverseResultCode) || preg_match($successPattern2, $reverseResultCode)){
        echo "----------------\r\n";
        echo  "Reverse Was Successful";


    }else{
        echo "Unsuccessful Reverse";
    }

}else{
        //you can not save the regisration Id if the payment is declined.

	echo "Payment Rejected";
}

?>