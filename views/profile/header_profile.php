<?php
$userInfo = $data['userInfo'];
$userTariffs = @$data['userTariffs'];
?>

<link type="text/css" rel="stylesheet" href="public/css/dashboard-style.css">
<link type="text/css" rel="stylesheet" href="public/css/color.css">
<div id="wrapper">
    <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
            <div class="container">
                <div class="dashboard-breadcrumbs breadcrumbs"><a href="index">خانه</a><a href="profile">داشبورد</a><span>صفحه اصلی</span>
                </div>
                <!--Tariff Plan menu-->
                <?php
                 if (is_array($userTariffs)){
                ?>
                     <div class="tfp-btn"><span>طرح تعرفه : </span> <strong><?= $userTariffs['tariffs_name']; ?></strong>
                     </div>
                     <div class="tfp-det">
                         <p>تعرفه شما: <a><?= $userTariffs['tariffs_name']; ?></a></p>
                         <p> پایان اعتبار:
                             <a> <?= $userTariffs['credit_days']; ?>
                                 روز </a></p>
<!--                         <p> برای مشاهده جزئیات یا به روزرسانی از لینک زیر استفاده کنید.</p>-->
                         <a href="tariffs" class="tariffs-btn">تعرفه ها</a>
                     </div>
                 <?php }
                ?>

                <!--Tariff Plan menu end-->
                <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
                    <h1>خوش آمدید : <span><?= $userInfo['name'] ?></span></h1>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="dashboard-header fl-wrap">
                <div class="container">
                    <div class="dashboard-header_conatiner fl-wrap">
                        <div class="dashboard-header-avatar">
                            <img src="public/images/profile/<?= $userInfo['id'] ?>.jpg" alt="profile">
                            <a href="profile/editprofile" class="color-bg edit-prof_btn"><i
                                        class="fal fa-edit"></i></a>
                        </div>
                        <div class="dashboard-header-stats-wrap">
                            <div class="dashboard-header-stats">
                                <div class="swiper-container swiper-container-horizontal swiper-container-rtl"
                                     style="cursor: grab;">
                                    <div class="swiper-wrapper"
                                         style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <!--  dashboard-header-stats-item -->
                                        <div class="swiper-slide swiper-slide-active"
                                             style="width: 180px; margin-left: 10px;">
                                            <div class="dashboard-header-stats-item">
                                                <i class="fal fa-calendar "></i>
                                                تاریخ عضویت
                                                <span><?= $userInfo['created_at'] ?></span>
                                            </div>
                                        </div>
                                        <!--  dashboard-header-stats-item end -->

                                    </div>
                                    <span class="swiper-notification" aria-live="assertive"
                                          aria-atomic="true"></span><span
                                            class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                            <!--  dashboard-header-stats  end -->
                            <div class="dhs-controls">
                                <div class="dhs dhs-prev swiper-button-disabled" tabindex="0" role="button"
                                     aria-label="Previous slide" aria-disabled="true"><i class="fal fa-angle-left"></i>
                                </div>
                                <div class="dhs dhs-next" tabindex="0" role="button" aria-label="Next slide"
                                     aria-disabled="false"><i class="fal fa-angle-right"></i></div>
                            </div>
                        </div>
                        <!--  dashboard-header-stats-wrap end -->
                        <a href="profile/add_ads" class="add_new-dashboard">افزودن تبلیغ <i class="fal fa-layer-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
            <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
            <div class="circle-wrap"
                 style="left: 120px; bottom: 120px; transform: translateZ(0px) translateY(-133.333px);"
                 data-scrollax="properties: { translateY: '-200px' }">
                <div class="circle_bg-bal circle_bg-bal_small"></div>
            </div>
            <div class="circle-wrap" style="right: 420px; bottom: -70px; transform: translateZ(0px) translateY(100px);"
                 data-scrollax="properties: { translateY: '150px' }">
                <div class="circle_bg-bal circle_bg-bal_big"></div>
            </div>
            <div class="circle-wrap" style="left: 420px; top: -70px; transform: translateZ(0px) translateY(66.6667px);"
                 data-scrollax="properties: { translateY: '100px' }">
                <div class="circle_bg-bal circle_bg-bal_big"></div>
            </div>
            <div class="circle-wrap" style="left:40%;bottom:-70px;">
                <div class="circle_bg-bal circle_bg-bal_middle"></div>
            </div>
            <div class="circle-wrap" style="right:40%;top:-10px;">
                <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"
                     style="transform: translateZ(0px) translateY(-233.333px);"></div>
            </div>
            <div class="circle-wrap" style="right:55%;top:90px;">
                <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"
                     style="transform: translateZ(0px) translateY(-233.333px);"></div>
            </div>
        </section>