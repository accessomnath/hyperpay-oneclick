<?php 

//Deduct 1 SAR from customer and reverse it back
require_once('../hyperpayclass.php');
$hp = new Hyperpay();

$registrationsArr = ['8ac7a4a06cccfceb016ccd331b850e52', '8ac7a4a26cccfaff016ccd340bf60990'];

$checkoutId = $hp->request_oneclickcheckot_checkoutId(1.00, $registrationsArr);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChefCan Demo</title>
</head>
<body>
<div>
    <h3>One Click checkout Demo</h3>
</div>
        <script>
        var wpwlOptions = {    
          registrations: {        
            requireCvv: true,        
            hideInitialPaymentForms: true    
          }}
        </script>
		
<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId=<?php echo $checkoutId;?>"></script>
          
		  <form action="http://localhost/chefcan_demo/onclickcheckout/result.php" class="paymentWidgets" data-brands="VISA MASTER MADA"></form>
</body>
</html>