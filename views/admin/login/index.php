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
            <div class="seenboard-bg background-02">
                <div class="seenboard-overlay overlay-01"></div>
                <div class="authentication-col-content mx-auto">
                    <h1 class="gradient-text-01">
                        به سایت سالوک خوش آمدید!
                    </h1>
                    <span class="description">
                                پنل مدیریتی سایت سالوک کامل و زیبا برای پیاده سازی ایده هایتان می توانید بهترین گزینه ها را ببنید  و انتخاب کنید.
                            </span>
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
                <h3>ورود به پنل مدیریت</h3>
                <form>
                    <span id="errorLogin" class="error" style="padding: 10px;text-align: center;"></span>
                    <div class="group material-input">
                        <input id="email" type="email" required="">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>ایمیل</label>
                    </div>
                    <div class="group material-input">
                        <input id="password" type="password" required="">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>رمز عبور</label>
                    </div>
                </form>

                <div class="sign-btn text-center">
                    <a onclick="login();" class="btn btn-lg btn-gradient-01">
                        ورود 
                    </a>
                </div>
               
            </div>
            <!-- End Form -->
        </div>
        <!-- End Right Content -->
    </div>
    <!-- End Row -->
</div>

 <script>
     function login() {
         var email = $('#email').val();
         var password = $('#password').val();
         // alert(password);

         var url = 'adminlogin/checkadminlogin/';
         var data = {'email': email, 'password': password};
         $.post(url, data, function (msg) {
             // alert(password);

             console.log(msg);
             if (msg ==1) {
                 window.location.assign('admindashbord');

             } else if (msg == 0) {
                 $('#errorLogin').html('لطفا مشخصات را درست وارد کنید');
             }
             else if (msg == -1) {
                 $('#errorLogin').html('ایمیل و پسورد باید بیشتر از ۸ و کمتر از ۳۲ کارکتر باشد');
             }
             else if (msg == -2) {
                 $('#errorLogin').html('ایمیل یا پسورد به اشتباه وارد شده');
             }
         }, 'json');
     }

 </script>


<script src="public/admin/assets/vendors/js/base/jquery.min.js"></script>
<script src="public/admin/assets/vendors/js/base/core.min.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="public/admin/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
<script src="public/admin/assets/vendors/js/app/app.min.js"></script>
<script src="public/admin/assets/js/components/validation/validation.min.js"></script>




<script src="public/js/admin_script.js"></script>