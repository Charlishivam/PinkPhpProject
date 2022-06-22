<body onload="document.frm1.submit()">
<?php 
  $request = $viewrequest->row();

  $mode = $config['cashfree_payment_mode'] == "production" ? "PROD" : "TEST"; //<------------ Change to TEST for test server, PROD for production
  extract($_POST);
  $secretKey= 'TEST6d73ffc852beff568fa738fa290d733c3c094c8b';//$config['cashfree_app_secret'];
  $postData = array( 
  "appId" =>  '96771a829b2ff08af9985abca17769',//$config['cashfree_app_id'],
  "orderId" => $request->transaction_id, 
  "orderAmount" =>number_format((float) $request->paid_amount, 1, '.', ''), 
  "orderCurrency" => "INR", 
  "orderNote" => "", 
  "customerName" => "Name-".$request->customer_first_name .''.$request->customer_last_name, 
  "customerPhone" => $request->customer_mobile, 
  "customerEmail" => "demo@gmail.com",
  "returnUrl" =>  base_url('subscription/payment_update') , 
  "notifyUrl" => "",
);

ksort($postData);
$signatureData = "";
foreach ($postData as $key => $value){
    $signatureData .= $key.$value;
}
$signature = hash_hmac('sha256', $signatureData, $secretKey,true);
$signature = base64_encode($signature);

if ($mode == "PROD") {
  $url = "https://www.cashfree.com/checkout/post/submit";
} else {
  $url = "https://test.cashfree.com/billpay/checkout/post/submit";
}

?>
  <form action="<?php echo $url; ?>" name="frm1" method="post">
      <p>Please wait.......</p>
      <input type="hidden" name="signature" value='<?php echo $signature; ?>'/>
      <input type="hidden" name="orderNote" value='<?php echo $postData['orderNote'] ; ?>'/>
      <input type="hidden" name="orderCurrency" value='<?php echo $postData['orderCurrency'] ?>'/>
      <input type="hidden" name="customerName" value='<?php echo $postData['customerName']; ?>'/>
      <input type="hidden" name="customerEmail" value='<?php echo $postData['customerEmail']; ?>'/>
      <input type="hidden" name="customerPhone" value='<?php echo $postData['customerPhone']; ?>'/>
      <input type="hidden" name="orderAmount" value='<?php echo $postData['orderAmount']; ?>'/>
      <input type ="hidden" name="notifyUrl" value='<?php echo $postData['notifyUrl']; ?>'/>
      <input type ="hidden" name="returnUrl" value='<?php echo $postData['returnUrl']; ?>'/>
      <input type="hidden" name="appId" value='<?php echo $postData['appId']; ?>'/>
      <input type="hidden" name="orderId" value='<?php echo $postData['orderId']; ?>'/>
  </form>
</body>