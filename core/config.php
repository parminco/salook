<?php
define('URL', 'http://127.0.0.1/MohsenHeydari/');
define('zarinpalMerchantID', '1fbf86e5-9125-4f6a-86df-af4b17c62a70');
define('CallbackURL', URL . 'checkout/');
define('zarinpalWebAdress', 'https://www.zarinpal.com/pg/services/WebGate/wsdl');




$zarinpalErrors = [

    '-1' => 'اطلاعات ارسال شده ناقص شده است',
    '-2' => 'IP یا مرچنت کد صحیح نیست',
    '-3' => 'سطح تایید پذیرنده کمتر از نقره ای است',
    '-10' => 'خطا',
    '-21' => 'هیچ نوع تراکنش مالی برای این درخواست پیدا نشد',
    '101' => 'تراکنش وریفای شده',
    '-9' => 'خطای اعتبار سنجی',
    '-54'=>'اتوریتی نامعتبر است',
    '-51'=>'پرداخت ناموفق',
    '-11'=>'مرچنت کد فعال نیست لطفا با تیم پشتیبانی ما تماس بگیرید',

];

define('zarinpalErrors', serialize($zarinpalErrors));




?>


