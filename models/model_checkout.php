<?php

class model_checkout extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function createProductLinks($productIds)
    {

    }

    function zarinpalCheckout($data)
    {
//        $Status = $data['Status'];
        $Authority = $data['Authority'];

        $sql = 'select * from tbl_order_product where beforepay=?';
        $result = $this->doSelect($sql, [$Authority], 1);

        $Amount = @$result['amount'];

        require 'core/payment.php';
        $Payment = new Payment();
        $Vrefy = $Payment->zarinpalVrefy($Amount, $Authority);
        $Status = $Vrefy['Status'];
        $Error = $Vrefy['Error'];
        $RefID = $Vrefy['RefID'];
        $pay_time = time();
        if ($Status == 100) {

            $sql = 'update tbl_order_product set pay_status=1,afterpay=?,pay_time=? where beforepay=?';
            $params = [$RefID, $pay_time, $Authority];
            $this->doQuery($sql, $params);

            //return product Paid
            $sql = 'select * from tbl_order_product where beforepay=?';
            $result = $this->doSelect($sql, [$Authority], 1);

            //
            return $result;

        } else {
            $zarinpalErrors = unserialize(zarinpalErrors);
            return ['Error' => $zarinpalErrors[$Status]];
        }

    }


    function zarinpalCheckoutTariffs($data)
    {
//        $Status = $data['Status'];
        $Authority = $data['Authority'];

        $sql = 'select * from tbl_tariffs_user where beforepay=?';
        $result = $this->doSelect($sql, [$Authority], 1);

        $Amount = @$result['amount'];

        require 'core/payment.php';
        $Payment = new Payment();
        $Vrefy = $Payment->zarinpalVrefy($Amount, $Authority);
        $Status = $Vrefy['Status'];
        $Error = $Vrefy['Error'];
        $RefID = $Vrefy['RefID'];
        $pay_time = time();
        if ($Status == 100) {

            $sql = 'update tbl_tariffs_user set pay_status=1,afterpay=?,pay_time=? where beforepay=?';
            $params = [$RefID, $pay_time, $Authority];
            $this->doQuery($sql, $params);

            //return product Paid
            $sql = 'select * from tbl_tariffs_user where beforepay=?';
            $result = $this->doSelect($sql, [$Authority], 1);
             $_SESSION['tariffs_id'] = $result['tariffs_id'];
            return $result;


        } else {
            $zarinpalErrors = unserialize(zarinpalErrors);
            return ['Error' => $zarinpalErrors[$Status]];
        }

    }

}


