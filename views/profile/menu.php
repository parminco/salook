<div class="col-md-3">
    <div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> منوی داشبورد</div>
    <div class="clearfix"></div>
    <div class="fixed-bar fl-wrap" id="dash_menu">
        <div class="user-profile-menu-wrap fl-wrap block_box">
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>اصلی</h3>
                <ul class="no-list-style">

                    <li><a href="profile/index"
                           class=" <?php if ($active == 'dashbord') {
                               echo 'user-profile-act';
                           } ?>">
                            <i class="fal fa-chart-line"></i>داشبورد</a></li>

                    <li><a href="profile/orders" class=" <?php if ($active == 'order') {
                            echo 'user-profile-act';
                        } ?>">
                            <i class="fal fa-shopping-cart"></i>سفارشات من</a></li>

                </ul>
            </div>
            <!-- user-profile-menu end-->
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>تبلیغ ها</h3>
                <ul class="no-list-style">
                    <li>
                        <a href="profile/ads" class=" <?php if ($active == 'ads') {
                            echo 'user-profile-act';
                        } ?>">
                            <i class="fal fa-th-list"></i>تبلیغ های من
                        </a>
                    </li>
                    <li>
                        <a href="profile/add_ads" class=" <?php if ($active == 'ads_insert') {
                            echo 'user-profile-act';
                        } ?>">
                            <i class="fal fa-file-plus"></i>ثبت تبلیغ جدید
                        </a>
                    </li>

                    <li>
                        <a href="profile/resetpassword" class="<?php if ($active == 'reset_password') {
                            echo 'user-profile-act';
                        } ?>">
                            <i class="fal fa-key"></i>تغییر رمز عبور
                        </a>
                    </li>
                </ul>
            </div>
            <!-- user-profile-menu end-->
            <button class="logout_btn color2-bg">خروج <i class="fas fa-sign-out"></i></button>
        </div>
    </div>
    <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="#dash_menu" style="z-index: auto; position: relative; top: 0px;">بازگشت<i class="fas fa-caret-up"></i></a><div style="display: none; width: 276px; height: 52px; float: none;"></div>
</div>