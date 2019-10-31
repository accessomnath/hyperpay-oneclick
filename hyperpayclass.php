<?php
    class Hyperpay{

        public 

        function request_checkoutId($amount){
            
            $rand = md5(uniqid(rand(), true));
            $url = "https://test.oppwa.com/v1/checkouts";
            $data = "entityId=8ac7a4c96818d43101682254512d0ab9" .
            "&amount=$amount" .
            "&currency=SAR" .
            "&customer.email=ialmaghrabii@gmail.com" .
            "&merchantTransactionId=$rand".
            "&testMode=EXTERNAL".
            "&createRegistration=true".
            "&paymentType=DB";
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                           'Authorization:Bearer OGFjN2E0Yzk2ODE4ZDQzMTAxNjgyMjU0MGMwMDBhYjV8NHpiUkRBUjlFVw=='));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
            //return $responseData;

            $response = json_decode($responseData, TRUE);
          
            $checkoutId = $response["id"];
            return $checkoutId;
        }
        function request_oneclickcheckot_checkoutId($amount, $registrationsArr){
            
            $rand = md5(uniqid(rand(), true));
            $url = "https://test.oppwa.com/v1/checkouts";
            $data = "entityId=8ac7a4c96818d43101682254512d0ab9" .
            "&amount=$amount" .
            "&currency=SAR" .
            "&customer.email=ialmaghrabii@gmail.com" .
            "&merchantTransactionId=$rand".
            "&testMode=EXTERNAL".
            "&createRegistration=true".
            "&registrations[0].id=$registrationsArr[0]" .
            "&registrations[1].id=$registrationsArr[1]" .
            "&paymentType=DB";
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                           'Authorization:Bearer OGFjN2E0Yzk2ODE4ZDQzMTAxNjgyMjU0MGMwMDBhYjV8NHpiUkRBUjlFVw=='));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
            //return $responseData;

            $response = json_decode($responseData, TRUE);
          
            $checkoutId = $response["id"];
            return $checkoutId;
        }
       

        function get_payment_status($checkoutId){
            $url = "https://test.oppwa.com/v1/checkouts/$checkoutId/payment";
            $url .= "?entityId=8ac7a4c96818d43101682254512d0ab9";
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                           'Authorization:Bearer OGFjN2E0Yzk2ODE4ZDQzMTAxNjgyMjU0MGMwMDBhYjV8NHpiUkRBUjlFVw=='));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
            return $responseData;
        }
        
        function reverse_payment($paymentId){
            $url = "https://test.oppwa.com/v1/payments/$paymentId";
            $data = "entityId=8ac7a4c96818d43101682254512d0ab9" .
            "&testMode=EXTERNAL".
                "&paymentType=RV";

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, $url);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGFjN2E0Yzk2ODE4ZDQzMTAxNjgyMjU0MGMwMDBhYjV8NHpiUkRBUjlFVw=='));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $responseData = curl_exec($ch);
                if(curl_errno($ch)) {
                return curl_error($ch);
                }
                curl_close($ch);
                return $responseData;
        }

        
    }
?>