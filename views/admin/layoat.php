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
    <title>پنل مدیریت سایت سالوک</title>
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


    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<style>
    .default-sidebar > .side-navbar ul ul {
        background: #252946;
    }
</style>
<body id="page-top">

<div class="page">
    <!-- Begin Header -->
    <header class="header">
        <nav class="navbar fixed-top">

            <!-- Begin Topbar -->
            <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                <!-- Begin Logo -->
                <div class="navbar-header">
                    <a href="admindashbord" class="navbar-brand">
                        <div class="brand-image brand-big">
                            <img src="public/images/logo/SALLOOK.png" alt="logo" class="logo-big">
                        </div>
                        <div class="brand-image brand-small">
                            <img src="public/images/logo/SALLOOK.png" alt="logo" class="logo-small">
                        </div>
                    </a>
                    <!-- Toggle Button -->
                    <a id="toggle-btn" href="#" class="menu-btn active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                    <!-- End Toggle -->
                </div>
                <!-- End Logo -->
                <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#"
                                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                 class="nav-link"><img src="public/images/adminprofile.png" alt="..."
                                                                       class="avatar rounded-circle"></a>
                    <ul aria-labelledby="user" class="user-size dropdown-menu">
                        <li class="welcome" style="padding-bottom: 0">
                            <img src="public/images/adminprofile.png" alt="..." class="rounded-circle">
                        </li>
                        <li style="text-align: center;color:#9e9e9e">امیر حسین نودهی</li>

                        <li class="separator"></li>
                        <li>
                            <a href="adminlogin/resetpassword" class="dropdown-item">
                                تغییر رمز عبور
                            </a>
                        </li>
                        <li>
                            <a href="adminlogin/logout" class="dropdown-item">
                                خروج
                            </a>
                        </li>


                    </ul>
                </li>
            </div>
            <!-- End Topbar -->
        </nav>
    </header>
    <!-- End Header -->
    <!-- Begin Page Content -->
    <div class="page-content d-flex align-items-stretch">
        <div class="default-sidebar" style="background: #2c304d">
            <!-- Begin Side Navbar -->
            <nav class="side-navbar box-scroll sidebar-scroll">
                <!-- Begin Main Navigation -->
                <ul class="list-unstyled">
                    <li><a href="admindashbord"><i class="la la-spinner"></i><span>داشبورد</span></a></li>
                    <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i
                                    class="la la-list-alt "></i><span>دسته بندی ها</span></a>
                        <ul id="dropdown-app" class="collapse list-unstyled pt-0">
                            <li><a href="admincategory/addcategory">ایجاد</a></li>
                            <li><a href="admincategory">مدیریت</a></li>
                        </ul>
                    </li>

                </ul>

                <span class="heading">مدیریت اسلایدشو</span>
                <ul class="list-unstyled">

                    <li>
                        <a href="#dropdown-forms" aria-expanded="false" data-toggle="collapse">
                            <i class="la la-picture-o"></i>
                            <span>اسلایدشو</span>
                        </a>
                        <ul id="dropdown-forms" class="collapse list-unstyled pt-0">
                            <li><a href="adminslider/addslider">ایجاد</a></li>
                            <li><a href="adminslider/">مدیریت</a></li>
                        </ul>
                    </li>

                </ul>


                <span class="heading">مدیریت محصولات</span>
                <ul class="list-unstyled">
                    <li>
                        <a href="#dropdown-product" aria-expanded="false" data-toggle="collapse">
                            <i class="la la-shopping-cart"></i>
                            <span>محصولات</span>
                        </a>
                        <ul id="dropdown-product" class="collapse list-unstyled pt-0">
                            <li><a href="adminproduct/addproduct">ایجاد</a></li>
                            <li><a href="adminproduct/">مدیریت</a></li>
                            <li><a href="admincommentproduct">نظرات کابران</a></li>
                            <li><a href="adminproduct/adddiscountcode">ایجاد کد تخفیف</a></li>
                        </ul>
                    </li>
                    <a href="adminorders">
                        <i class="la la-cart-plus"></i>
                        <span>سفارشات</span>
                    </a>
                </ul>


                <span class="heading">مدیریت مقاله ها</span>
                <ul class="list-unstyled">
                    <li>
                        <a href="#dropdown-post" aria-expanded="false" data-toggle="collapse">
                            <i class="la la-file-text-o"></i>
                            <span>مقاله ها</span>
                        </a>
                        <ul id="dropdown-post" class="collapse list-unstyled pt-0">
                            <li><a href="adminpost/addpost">ایجاد</a></li>
                            <li><a href="adminpost/">مدیریت</a></li>
                        </ul>
                    </li>
                </ul>


                <span class="heading">مدیریت تعرفه ها</span>
                <ul class="list-unstyled">

                    <li>
                        <a href="#dropdown-tariffs" aria-expanded="false" data-toggle="collapse">
                            <i class="la la-money"></i>
                            <span>تعرفه ها</span>
                        </a>
                        <ul id="dropdown-tariffs" class="collapse list-unstyled pt-0">
                            <li><a href="admintariffs/addtariffs">ایجاد</a></li>
                            <li><a href="admintariffs/">مدیریت</a></li>
                            <li><a href="admintariffs/ordertariffs">سفارشات</a></li>
                        </ul>
                    </li>
                </ul>

                <span class="heading">لوگو شرکت های همکار</span>
                <ul class="list-unstyled">
                    <li>
                        <a href="#dropdown-customerslogo" aria-expanded="false" data-toggle="collapse">
                            <i class="la la-user-plus"></i>
                            <span>لوگو</span>
                        </a>
                        <ul id="dropdown-customerslogo" class="collapse list-unstyled pt-0">
                            <li><a href="admincustomerslogo/addlogo">ایجاد</a></li>
                            <li><a href="admincustomerslogo/">مدیریت</a></li>

                        </ul>
                    </li>
                </ul>



                <span class="heading">تنظیمات سایت</span>
                <ul class="list-unstyled">
                    <a href="adminmenu">
                        <i class="la la-bars"></i>
                        <span>مدیریت منو</span>
                    </a>
                    <li>
                        <a href="#dropdown-footer" aria-expanded="false" data-toggle="collapse">
                            <i class="la la-info"></i>
                            <span>مدیریت پاورقی</span>
                        </a>
                        <ul id="dropdown-footer" class="collapse list-unstyled pt-0">
                            <li><a href="adminfooter/">ویرایش درباره ما</a></li>
                            <li><a href="adminfooter/personnel">همکاران ما</a></li>
                            <li><a href="adminfooter/honors">افتخارات ما</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- End Main Navigation -->
            </nav>
            <!-- End Side Navbar -->
        </div>
        <!-- End Left Sidebar -->

        <!-- End Container -->
