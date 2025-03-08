<?php
class Payment
{
    private $zarinpalMerchantID = zarinpalMerchantID;
    private $CallbackURL = CallbackURL;

    function __construct()
    {
        require('public/nusoap/nusoap.php');
    }


    function zarinpalRequest($Amount, $Description,$CallbackURL)
    {

        $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        $client->soap_defencoding = 'UTF-8';

        $params = [
            'MerchantID' => '1fbf86e5-9125-4f6a-86df-af4b17c62a70',
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
            '-9' => 'خطای اعتبار سنجی',
            '-10' => 'خطا',
            '-21'=>'هیچ نوع تراکنش مالی برای این درخواست پیدا نشد',
            '101' => 'تراکنش وریفای شده',
            '-54'=>'اتوریتی نامعتبر است',
            '-51'=>'پرداخت ناموفق',
            '-11'=>'مرچنت کد فعال نیست لطفا با تیم پشتیبانی ما تماس بگیرید',

        ];
        $Error='';
        if ($Status != 100) {
            $Error = $zarinpalErrors[$Status];
        }
        if ($Status == 100) {
            $Authority = $result['Authority'];
        }

        $array = ['Status' => $Status, 'Authority' => $Authority,'Error'=>$Error];
        return $array;

    }



    function zarinpalVrefy($Amount, $Authority)
    {
        $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        $client->soap_defencoding = 'UTF-8';

        $result = $client->call('PaymentVerification', [
            'MerchantID' =>'1fbf86e5-9125-4f6a-86df-af4b17c62a70',
            'Authority' => $Authority,
            'Amount' => $Amount
        ]);
        $zarinpalErrors = [];
        $Status = @$result['Status'];
        $Error = '';
        $RefID = '';
        if ($Status != 100) {
            $ErrorArray = unserialize(zarinpalErrors);
//            echo($Status);
            $Error=@$ErrorArray[$Status];

        }
        if ($Status == 100) {
            $RefID = $result['RefID'];
        }

        $array = ['Status' => $Status, 'Error' => $Error, 'RefID' => $RefID];
        return $array;
    }

}

?>