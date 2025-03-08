<!DOCTYPE html>
<html lang="fa" class="scroller">
<base href="<?= URL ?>">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>وب سایت سالوک</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="public/css/reset.css">
    <link type="text/css" rel="stylesheet" href="public/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="public/css/style.css">
    <link type="text/css" rel="stylesheet" href="public/css/color.css">
    <link type="text/css" rel="stylesheet" href="public/css/shop.css">
    <link type="text/css" rel="stylesheet" href="public/css/style_main.css">
    <link type="text/css" rel="stylesheet" href="public/css/dashboard-style.css">


    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="public/css/date-picker.css">
    <!-- persian picker CSS -->
    <link rel="stylesheet" href="public/src/jquery.md.bootstrap.datetimepicker.style.css">

    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="public/images/favicon.ico">
</head>

<style>
    .scroller {
        overflow-y: scroll;
        color:#949494;
        scrollbar-color:black #949494;

    }
</style>
<body>
<!--loader-->
<div class="loader-wrap">
    <div class="loader-inner">
        <div class="loader-inner-cirle"></div>
    </div>
</div>

<?php

if (isset($_GET['failedLogin'])) {
    ?>
    <div id="modal-failed-login" class="main-register-wrap" style="display: block;">
        <div class="reg-overlay" style="display: block;"></div>
        <div class="main-register-holder tabs-act">
            <div class="main-register fl-wrap  modal_main vis_mr">
                <div class="main-register_title">هشدار</div>
                <div class="close-reg close_modal"><i class="fal fa-times"></i></div>
                <p class="text-failed-login">لطفا اول وارد سایت بشید</p>
                <a class="close_modal btn-failed-login" style="">
                    باشه
                </a>
            </div>
        </div>
    </div>
<?php }
?>
<!--loader end-->
<!-- main start  -->
<div id="main">
    <!-- header -->
    <header class="main-header">
        <!-- logo-->
        <a href="index" class="logo-holder"><img src="public/images/logo/SALLOOK.png" alt="logo"></a>
        <!-- logo end-->

        <!-- header opt -->

        <div class="show-reg-form" style="margin-top: -4px;margin-right: -7px">
            <a style="top: 0" href="cart" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
        </div>

        <?php
        @session_start();
        if (isset($_SESSION['user_id'])) {
            ?>
            <a href="user_controller/logout" class="lang-wrap">
                <div class="show-lang">
                    <i class="fal fa-sign-out" style="margin-left:3px;"></i>
                    خروج
                </div>
            </a>
            <?php
        } else {
            ?>
            <div class="lang-wrap">
                <div class="show-lang modal-open">
                    <i class="fal fa-user" style="margin-left:3px;"></i>ورود/عضویت
                </div>
            </div>
            <?php
        }
        ?>

        <!-- nav-button-wrap-->
        <div class="nav-button-wrap color-bg">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- nav-button-wrap end-->
        <!--  navigation -->
        <div class="nav-holder main-menu">
            <nav>
                <ul class="no-list-style">
                    <?php
                    $model = new Model;
                    $menuInfo = $model->getMenuInfo();
                    foreach ($menuInfo as $row) {
                        ?>
                        <li>
                            <a href="<?=$row['link']?>"><?=$row['title']?></a>
                        </li>

                    <?php }
                    ?>

                    <li>
                        <div class="show-lang modal-open" style="padding: 0;padding-top: 2px;margin: -5px;">
                            <a>ورود/عضویت</a>
                        </div>
                    </li>

                </ul>
            </nav>
        </div>
        <!-- navigation  end -->

    </header>
