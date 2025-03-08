<?php
//$test=array('اسپانیا');
//$test=serialize($test);
//echo $test;
//session_start();
//
//
//if (isset($_SESSION['user_id'])) {
//    header('location:dashbord.php?SESSION=' . $_SESSION['user_id']);
//}

$time = time();
//echo $time.'<br>';
//
//require 'core/model.php';
//$model = new model();
//$email = 1;
//$password = 1;
//$sql = 'select * from tbl_user where email=? and password=?';
//$params = [$email, $password];
//$result = $model->doSelect($sql, $params);
//if (sizeof($result) == 1) {
//    session_start();
//    session_regenerate_id();
//    $user_id = $_SESSION['user_id'] = $result[0]['id'];
//    $_SESSION['is_login'] = 'xr3f';
//
//    $time = time();
//    $sql = 'select * from tbl_tariffs_user where user_id=? and expire_time>?';
//    $tariffs = $model->doSelect($sql, [$user_id, $time]);
//    if (sizeof($tariffs) == 1) {
//        $_SESSION['tariffs_id'] = $tariffs[0]['tariffs_id'];
//        print_r($tariffs);
//    }
//}

//session_start();
//if (isset($_SESSION['tariffs_id'])) {
//    $tariffs_id = $_SESSION['tariffs_id'];
//}
//
//$sql = 'select * from tbl_tariffs where id=?';
//$tariff = $model::doSelect($sql, [$tariffs_id], 1);
//$country_ids = $tariff['country_ids'];
//echo($country_ids);
//$country_ids = explode(',', $country_ids);
//$country_name=[];
//foreach ($country_ids as $key=>$country_id) {
//    $sql='select * from tbl_location where id=?';
//    $country_name[$key]=$country=$model::doSelect($sql,[$country_id],1);
//}
//
//$Real_Time = date('Y-m-d', time());
//$Expire_Time = date('Y-m-d', '1610379483');
//
//
//$date1 = date_create($Real_Time);
//$date2 = date_create($Expire_Time);
//
//$diff = date_diff($date1, $date2);
//echo $diff->format("%R%a days");
//
//


?>

<style>
    a {
        cursor: pointer;
        width: 100px;
        height: 30px;
        display: block;
        text-align: center;
        background: #c6c6c6;
        border-radius: 4px;
        overflow: hidden;
        line-height: 24px;
        color: red;
        margin: 3px;

    }

    .active-li-category {
        color: black;
    }

    .class2 {
        color: #1da1f2;
    }
</style>

<?php

for ($x = 1; $x < 10; $x++) {
    $categoryTag='category'.$x;
    $categoryId='#category'.$x;
//    echo $categoryId;
    ?>

    <a class="categoryTag" id="<?=$categoryTag?>" onclick="addAtive('<?=$categoryId?>');"><?=$x?>-click me!</a>

<?php } ?>

<script>
    function addAtive(idCategory) {
        alert(idCategory);
        $('.categoryTag').removeClass('active-li-category');
        $(idCategory).addClass("active-li-category");
    }
</script>


<script src="public/js/jquery.min.js"></script>
