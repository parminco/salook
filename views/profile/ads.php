<?php
$active = 'ads';
require ('header_profile.php');
?>
<!--  section  end-->
<!--  section  -->
<section class="gray-bg main-dashboard-sec" id="sec1">
    <div class="container">
        <!--  dashboard-menu-->
        <?php require('menu.php'); ?>

        <!-- dashboard-menu  end-->
        <!-- dashboard content-->
        <div class="col-md-9">
            <div class="dashboard-title   fl-wrap">
                <h3>تبلیغ های من</h3>
            </div>
            <!-- dashboard-list-box-->
            <div class="dashboard-list-box  fl-wrap">
                <!-- dashboard-list -->
                <?php
                $ads=$data['ads'];
                foreach ($ads as $row)
                {
                    ?>

                <div class="dashboard-list fl-wrap">
                    <div class="dashboard-message">
                        <div class="booking-list-contr">
                            <a href="profile/ads_edit/<?=$row['id']?>" class="color-bg tolt" data-microtip-position="left" data-tooltip="ویرایش">
                                <i class="fal fa-edit"></i>
                            </a>
                            <a href="profile/remove_ads/<?=$row['id']?>" class="red-bg tolt" data-microtip-position="left" data-tooltip="حذف">
                                <i class="fal fa-trash"></i>
                            </a>
                        </div>
                        <div class="dashboard-message-text">
                            <img src="public/images/ads/<?=$row['id']?>.jpg" alt="ads">
                            <h4><a><?=$row['title']?></a></h4>
                            <div class="geodir-category-location clearfix">
                                <a> تاریخ ثبت :<?=$row['created_at']?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                ?>
                <!-- dashboard-list end-->
            </div>
            <!-- dashboard-list-box end-->

        </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>
</div>
<!--content end-->
</div>

<script src="public/js/dashboard.js"></script>



