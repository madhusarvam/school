<?php
/*
- Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
- Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_MID constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_WEBSITE constant with details received from Paytm.
- Above details will be different for testing and production environment.
*/
//  $sccode=$this->session->userdata("school_code");

//  if($sccode == 9){
   
  

define('PAYTM_ENVIRONMENT', 'PROD'); // PROD
define('PAYTM_MERCHANT_KEY', 'jwQHtwG&JCaFKwrn'); //Change this constant's value with Merchant key received from Paytm.
define('PAYTM_MERCHANT_MID', 'Ramdoo95234147283164'); //Change this constant's value with MID (Merchant ID) received from Paytm.
define('PAYTM_MERCHANT_WEBSITE', 'WEBPROD'); //Change this constant's value with Website name received from Paytm.

$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/order/status';
$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/order/status ';
	$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
}

define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);

// }
// else{
    
// define('PAYTM_ENVIRONMENT', ''); // PROD
// define('PAYTM_MERCHANT_KEY', ''); //Change this constant's value with Merchant key received from Paytm.
// define('PAYTM_MERCHANT_MID', ''); //Change this constant's value with MID (Merchant ID) received from Paytm.
// define('PAYTM_MERCHANT_WEBSITE', ''); //Change this constant's value with Website name received from Paytm.

// $PAYTM_STATUS_QUERY_NEW_URL='';
// $PAYTM_TXN_URL='';
// if (PAYTM_ENVIRONMENT == '') {
// 	$PAYTM_STATUS_QUERY_NEW_URL='';
// 	$PAYTM_TXN_URL='';
// }

// define('PAYTM_REFUND_URL', '');
// define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
// define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
// define('PAYTM_TXN_URL', $PAYTM_TXN_URL);

   //}
?>
