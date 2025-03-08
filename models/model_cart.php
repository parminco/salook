<?php

class model_cart extends model
{
    function getCart2()
    {
        $cartInfo = parent::getCart();
        return $cartInfo;
    }


    function addToCart($productId)
    {
        $cookie = self::getCartCookie();
        $sql = 'select * from tbl_cart where cookie=? and idproduct=?';
        $params = [$cookie, $productId];
        $result = $this->doSelect($sql, $params);
        if (isset($result[0])) {
//            $sql = 'update tbl_cart set tedad=tedad+1 where cookie=? and idproduct=?';

        } else {
            $sql = 'insert into tbl_cart (cookie,idproduct) values (?,?)';
        }
        $params = [$cookie, $productId];
        $this->doQuery($sql, $params);
    }

    function deleteCart($cartId)
    {

        $sql = 'delete from tbl_cart where id =?';
        $this->doQuery($sql, [$cartId]);
        $url = URL . 'cart/index';
        echo '<script>location.href ="' . $url . '";</script>';

    }


    function saveOrder($data)
    {
         if (isset($_SESSION['user_id'])) {
            $cartInfo = [];
            $key = 0;
//        echo 'Sizeof data is:  ' . sizeof($data) . '<br>';
            $numberLoop = $data['numberLoop'];
            for ($i = 0; $i < $numberLoop; $i++) {
//            echo 'key is:  ' . $key . '<br>';
//            echo 'numberLoop is:  ' . $numberLoop . '<br>';

                $cartInfo[$key]['id'] = @$data['productId'][$key];
                $cartInfo[$key]['title'] = @$data['productTitle'][$key];
                $cartInfo[$key]['discount'] = @$data['productDiscount'][$key];
                $cartInfo[$key]['price'] = @$data['productPrice'][$key];

                $key++;
            }

            $cartInfo = array_filter($cartInfo);
//            print_r($cartInfo);
            $cartInfo = serialize($cartInfo);


            $priceTotalAll = $data['priceTotalall'];
             $userId = self::sessionGet('user_id');
            $date = self::jaliliDate('Y/n/j');


            require 'core/payment.php';
            $cartType = 'orderFile';
            $beforepy = '';
            $Description = 'خرید فایل';
            $CalbackUrl = URL . 'checkout/';
            if ($cartType == 'orderFile') {
                $Payment = new Payment();
//                print_r($Payment);
                $result = $Payment->zarinpalRequest($priceTotalAll, $Description, $CalbackUrl);
//                print_r($result);
                $Status = $result['Status'];
                $Authority = $result['Authority'];
                $beforepy = $Authority;

            }
            $time = time();


            $order_code = $this->getOrderCode('tbl_order_product');

            $sql = 'insert into tbl_order_product (order_code,beforepay,user_id,cart_info,amount,date) values(?,?,?,?,?,?)';
            $params = [$order_code, $beforepy, $userId, $cartInfo, $priceTotalAll, $date];
            $this->doQuery($sql, $params);

            if ($cartType == 'orderFile') {

                if ($Status == 100) {

//                    print_r($result);

                    $url = 'https://next.zarinpal.com/pg/StartPay/' . $Authority;
                    echo '<script>location.href ="' . $url . '";</script>';

                } else {
                    //انجام نشده
                    $url = URL . 'carterror/index/' . $Status;
                    echo '<script>location.href ="' . $url . '";</script>';
//                    header('location:' . URL . 'carterror/index/' . $Status);

                }

            }
        } else {
//            header('location:'.URL.'cart?failedLogin');
            $url = URL . 'cart?failedLogin';
            echo '<script>location.href ="' . $url . '";</script>';
        }

    }

    function checkCodeDsicount($data)
    {
        $codeDiscount = $this->ClearInput($data['codeDiscount']);
        $real_time = time();
        $sql = 'select * from tbl_code_discount where name=? and expire_time > ?';
        $result = $this->doSelect($sql, [$codeDiscount, $real_time]);

        if (sizeof($result) == 0) {
            return 'invalid';
        } else {
            $priceTotalall = $data['priceTotalall'];
            $discountPercent=$result[0]['percent'];

            $discountCodePrice=$priceTotalall*$discountPercent/100;
            $priceTotalall=$priceTotalall-$discountCodePrice;

            $resultTotal=[
                'discountCodePrice'=>number_format($discountCodePrice),
                'priceTotalall'=>number_format($priceTotalall)
            ];
            return  $resultTotal;
        }


    }

}

?>