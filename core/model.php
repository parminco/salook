<?php

class model
{

    public static $conn = '';

    function __construct()
    {

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'mohsenheydari';
        $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, $attr);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (function_exists('jdate') == false) {
            require('public/jdf/jdf.php');
        }
    }

    function doSelect($sql, $valuse = [], $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)
    {

        $stm = self::$conn->prepare($sql);
        foreach ($valuse as $key => $value) {

            $stm->bindValue($key + 1, $value);
        }


        $stm->execute();


        if ($fetch == '') {
            $result = $stm->fetchAll($fetchStyle);
        } else {

            $result = $stm->fetch($fetchStyle);
        }

        return $result;
    }

    function doQuery($sql, $valuse = [])
    {

        $stm = self::$conn->prepare($sql);
        foreach ($valuse as $key => $value) {

            $stm->bindValue($key + 1, $value);
        }
        if ($stm->execute()) {
            return 'true';
        }


    }

    function getOrderCode($table)
    {
        $order_code = $order_code = 'SK-' . rand(12, 99) . '-' . rand(150, 999) . '-' . rand(1000, 9999);
        $sql = 'select order_code from ' . $table . ' where order_code=?';
        $result = $this->doSelect($sql, [$order_code]);
        if (sizeof($result) == 0) {
            return $order_code;
        } else if (sizeof($result) > 0) {
            $this->getOrderCode();

        }


    }

    function getCartCookie()
    {

        if (isset($_COOKIE['cart'])) {
            $cookie = $_COOKIE['cart'];
        } else {

            $expire = time() + 7 * 24 * 3600;
            $value = time();
            setcookie('cart', $value, $expire, '/');
            $cookie = $value;
        }

        return $cookie;
    }

    function getCart()
    {
        $sql = "SELECT tbl_cart.*,tbl_cart.id as CartRow,tbl_product.*
        FROM tbl_cart 
        LEFT JOIN tbl_product ON tbl_product.id=tbl_cart.idproduct
        where cookie=? order by tbl_cart.id desc ";

        $cookie = $this->getCartCookie();
        $params = [$cookie];
        $result = $this->doSelect($sql, $params);

        foreach ($result as $key => $row) {
            $discount = ($row['discount'] * $row['price']) / 100;
            $priceTotal = ($row['price'] - $discount);
            $result[$key]['discountTotal'] = $discount;
            $result[$key]['priceTotal'] = $priceTotal;
        }

        $priceTotalall = 0;
        $discountTotalall = 0;
        foreach ($result as $row) {
            $price = $row['price'];
            $discount = ($row['discount'] * $row['price']) / 100;
            $priceTotal = ($price - $discount);

            $discountTotalall += $discount;
            $priceTotalall += $priceTotal;
        }

        return [$result, $priceTotalall, $discountTotalall];
    }


    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
    {

        $new_height = $h;

        list($width, $height) = getimagesize($file);

        $r = $width / $height;

        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        $what = getimagesize($file);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);

                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }

        if ($new_height != '') {
            $newheight = $new_height;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);//the new image
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

        imagejpeg($dst, $pathToSave, 95);//pish farz in tabe 75 darsad quality ast

        return $dst;


    }


    function sessionInit()
    {
//        if (!isset($_session_start)) {
        @session_start();
//        }
    }

    public static function sessionSet($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function sessionGet($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return 'false';
        }
    }

    public static function sessionGet2($name)
    {
        if (isset($_SESSION[$name])) {
            return true;

        } else {
            return false;
        }
    }

    public static function setCookie($name)
    {
        if (!isset($_COOKIE[$name])) {

            $expire = time() + 7 * 24 * 3600;
            $value = time();
            setcookie($name, $value, $expire, '/');

        }

    }

    function ClearInput($value)
    {
        return trim(htmlentities(addslashes($value)));
    }

    function ClearScreenText($value)
    {

        return stripcslashes(filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    }


    public static function jaliliDate($format = 'Y-n-j')
    {

        $date = jdate($format);
        return $date;
    }

    public static function jaliliToMiladi($jalili, $format = '/')
    {
        $jalili = explode('/', $jalili);
        $Year = @$jalili[0];
        $Month = @$jalili[1];
        $Day = @$jalili[2];

        $date = jalali_to_gregorian($Year, $Month, $Day);
        $date = implode($format, $date);

        $date = new  DateTime($date);
        $date = $date->format('Y/m/d');
        return $date;
    }

    public static function MiladiTojalili($miladi, $format = '/')
    {
        $miladi = explode('/', $miladi);
        $Year = $miladi[0];
        $Month = $miladi[1];
        $Day = $miladi[2];

        $date = gregorian_to_jalali($Year, $Month, $Day);
        $date = implode($format, $date);


        return $date;
    }

    //footer class
    function getFooterInfo()
    {

        $sql = 'select * from tbl_footer_info limit 1';
        $result = $this->doSelect($sql, [], 1);
        return $result;
    }

    function getPersonnel()
    {

        $sql = 'select * from tbl_personnel order by id desc limit 3';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getHonors()
    {

        $sql = 'select * from tbl_honors limit 3';
        $result = $this->doSelect($sql);
        return $result;
    }

    // end footer class

    function getMenuInfo()
    {
        $sql = 'select * from tbl_menu';
        $result = $this->doSelect($sql);
        return $result;
    }
}


?>
















