<?php 

//Deduct 1 SAR from customer and reverse it back
require_once('../hyperpayclass.php');
$hp = new Hyperpay();

$checkoutId = $hp->request_checkoutId(1.00);

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
    <h3>Deduct 1 SAR from the customer Card, Rigester it in Hyperpay Database and reverse it back.</h3>
</div>
        <script>
        var wpwlOptions = {    
          registrations: {        
            requireCvv: true,        
            hideInitialPaymentForms: true    
          }}
        </script>
		
<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId=<?php echo $checkoutId;?>"></script>
          
		  <form action="http://localhost/chefcan_demo/registerandreverse/result.php" class="paymentWidgets" data-brands="VISA MASTER MADA"></form>
</body>
</html>