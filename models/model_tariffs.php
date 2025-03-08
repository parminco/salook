<?php

class model_tariffs extends model
{
    function getTariffs()
    {
        $sql = 'select * from tbl_tariffs where deleted_at=?';
        $result = $this->doSelect($sql,['']);
        return $result;
    }

    function saveTariffs($data)
    {

        $tariffs_id = $data['tariffs_id'];
        $tariffs_name = $data['tariffs_name'];
        $tariffs_price = $data['tariffs_price'];
        $credit_time = $data['credit_time'];

        $monthToDay = $credit_time * 30;

        $expire_time=time() + ($monthToDay * 24*60*60);
//        echo $expire_time.'<br>';
//        echo 'Real Time: '. date('Y-m-d', time()) ."<br>";
//        echo 'Expire Time: '. date('Y-m-d', $expire_time) ."<br>";


         $userId = self::sessionGet('user_id');
        $date = self::jaliliDate('Y/n/j');


        require 'core/payment.php';
        $cartType = 'saveTariffs';
        $beforepy = '';
        $Description = 'خرید اشتراک';
        $CalbackUrl = URL . 'checkout/tariffs';
        if ($cartType == 'saveTariffs') {
            $Payment = new Payment();
            $result = $Payment->zarinpalRequest($tariffs_price, $Description, $CalbackUrl);
//            print_r($result);
            $Status = $result['Status'];
            $Authority = $result['Authority'];
            $beforepy = $Authority;

        }
        $time = time();


        $order_code = $this->getOrderCode('tbl_tariffs_user');

        $sql = 'insert into tbl_tariffs_user (order_code,beforepay,user_id ,tariffs_id,tariffs_name,date,expire_time,amount) values(?,?,?,?,?,?,?,?)';
        $params = [$order_code,$beforepy, $userId, $tariffs_id,$tariffs_name,$date,$expire_time,$tariffs_price];
        $this->doQuery($sql, $params);

        if ($cartType == 'saveTariffs') {

            if ($Status == 100) {

                $url = 'https://next.zarinpal.com/pg/StartPay/' . $Authority;
                echo'<script>location.href ="'.$url.'";</script>';
//                header('location:https://sandbox.zarinpal.com/pg/StartPay/' . $Authority);
            } else {
                //انجام نشده

                $url=URL.'carterror/index/' . $Status;
                echo'<script>location.href ="'.$url.'";</script>';
//                header('location:' . URL . 'carterror/index/' . $Status);

            }

        }

    }

}

?>