<!DOCTYPE html>
<!--
Item Name: SeenBoard - Web App & Admin Dashboard Template
1.0
Author: Mt.rezaei
-->
<html lang="fa">
<head>
    <base href="<?= URL ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ورود به پنل مدیریت سایت سالوک</title>
    <meta name="description" content="SeenBoard is a Web App and Admin Dashboard Template built with Bootstrap 4">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Iran licence -->
    <link rel="stylesheet" href="public/admin/assets/css/fontiran.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="public/admin/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/admin/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/admin/assets/img/favicon-16x16.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="public/admin/assets/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="public/admin/assets/vendors/css/base/seenboard-1.0.css">


    <link rel="stylesheet" href="public/css/style_main_admin.css">
    <link rel="stylesheet" href="public/css/style_main.css">


</head>

<div class="container-fluid no-padding h-100">
    <div class="row flex-row h-100 bg-white">
        <!-- Begin Left Content -->
        <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
            <div class="seenboard-bg background-05">
                <div class="seenboard-overlay overlay-01"></div>
                <div class="authentication-col-content mx-auto">
                    <h1 class="gradient-text-01">
                        سایت سالوک
                    </h1>
                    <div class="sign-btn text-center" style="margin-top: 30px">
                        <a href="admindashbord" class="btn btn-gradient-05" style="color: #fff">برگشت به پنل مدیریت</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Left Content -->
        <!-- Begin Right Content -->

            <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
                <!-- Begin Form -->
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">

                        <img src="public/images/adminprofile.png" alt="logo">

                    </div>
                    <h3> تغییر رمز عبور</h3>
                    <form action="adminlogin/resetpassword" method="post">
                        <?php
                        if (isset($_GET['error']))
                        {
                            ?>
                            <span id="errorLogin" class="error" style="padding: 10px;text-align: center;"><?=$_GET['error']?></span>
                        <?php }
                        ?>

                        <div class="group material-input">
                            <input name="oldPassword" type="password" required="">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>رمز عبور فعلی</label>
                        </div>
                        <div class="group material-input">
                            <input name="newPassword" type="password" required="">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>رمز عبور جدبد</label>
                        </div>
                        <div class="group material-input">
                            <input name="confirmPassword" type="password" required="">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>تکرار رمز عبور جدید</label>
                        </div>


                    <div class="sign-btn text-center">
                        <button type="submit" class="btn btn-lg btn-gradient-01">اجرای عملیات</button>
                    </div>
                    </form>
                </div>
                <!-- End Form -->
            </div>

        <!-- End Right Content -->
    </div>
    <!-- End Row -->
</div>

