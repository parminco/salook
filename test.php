<base href="<?= URL ?>">
<?php
require('public/nusoap/nusoap.php');
$MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX'; //Required
$Amount = 1000; //Amount will be based on Toman - Required
$Description = 'توضیحات تراکنش تستی'; // Required
$Email = 'UserEmail@Mail.Com'; // Optional
$Mobile = '09123456789'; // Optional
$CallbackURL = 'http://www.yoursoteaddress.ir/verify.php'; // Required


$client = new nusoap_client('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
$client->soap_defencoding = 'UTF-8';

$params = [
    'MerchantID' => 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX',
    'Amount' => $Amount,
    'Description' => $Description,
    'CallbackURL' => $CallbackURL,
];

$result = $client->call('PaymentRequest', $params);


$zarinpalErrors = [];
$Status = $result['Status'];

$Authority = '';

$zarinpalErrors = [

    '-1' => 'اطلاعات ارسال شده ناقص شده است',
    '-2' => 'IP یا مرچنت کد صحیح نیست',
    '-3' => 'سطح تایید پذیرنده کمتر از نقره ای است',
    '-10' => 'خطا'

];
$Error='';
if ($Status != 100) {
    $Error = $zarinpalErrors[$Status];
}
if ($Status == 100) {
    $Authority = $result['Authority'];
}

$array = ['Status' => $Status, 'Authority' => $Authority,'Error'=>$Error];
print_r($array);
return $array;



?>





