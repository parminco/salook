<section class="gray-bg hidden-section particles-wrapper">
    <div class="container">

        <div id="categoryDiv" class="listing-item-grid_container fl-wrap" style="height: 560px; overflow: hidden">
            <div class="row">

                <div class="profile-edit-container fl-wrap block_box">
                    <!-- booking-list-->
                    <?php
                    $ads_info = $data['ads_info'];
                    ?>
                    <div class="booking-list">
                        <div class="booking-list-message">

                            <div class="booking-list-message-avatar">
                                <img src="public/images/profile/<?= $ads_info['user_id'] ?>.jpg" alt="">
                            </div>

                            <div class="booking-list-message-text">
                                <h4><?= @$ads_info['name'] ?> - <span><?= @$ads_info['created_at'] ?></span></h4>

                                <span class="fw-separator"></span>

                                <div class="cart-details_header">

                                        <a class="widget-posts-img">
                                            <img src="public/images/ads/<?= $ads_info['id'] ?>.jpg">
                                        </a>

                                        <div class="widget-posts-descr">
                                            <h4><a><?= @$ads_info['title'] ?></a></h4>
                                            <div style="margin: 0">
                                                <p style="padding: 0">تناژ:<?= @$ads_info['tonnage'] ?></p>
                                                <p style="padding: 0">قیمت:<?= @$ads_info['price'] ?></p>
                                            </div>
                                            <div class="geodir-category-location fl-wrap">
                                                <p>
                                                    <?= @$ads_info['description'] ?>
                                                </p>
                                            </div>

                                        </div>
                                    </div>


                            </div>


                            <?php
                            if (@$ads_info['updated_at'] != '') { ?>
                                <div style="text-align: left;width: 100%;">
                                    <h4 style="padding-top: 20px">اخرین ویرایش :
                                        <span><?= $ads_info['updated_at'] ?></span>
                                    </h4>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>


