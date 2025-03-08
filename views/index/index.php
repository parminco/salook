

<!-- navigation  end -->

<!-- wishlist-wrap-->

<!--wishlist-wrap end -->
</header>
<!-- header end-->
<!-- wrapper-->
<div id="wrapper">
    <!-- content-->
    <div class="content">
        <!--section  -->

        <?php require('slider_main.php'); ?>

        <!--section end-->
        <!--section  -->
        <?php require('slider_product.php'); ?>
        <!--section end-->
        <!--section -->
        <?php require('category_product.php'); ?>
        <!--section end-->
        <!--section  -->
        <?php require('ads.php'); ?>
        <!--section end-->

        <section class="gray-bg" style="padding-top: 10px;">
            <div class="container">
                <div class="clients-carousel-wrap fl-wrap">
                    <div class="cc-btn   cc-prev"><i class="fal fa-angle-left"></i></div>
                    <div class="cc-btn cc-next"><i class="fal fa-angle-right"></i></div>
                    <div class="clients-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!--client-item-->
                                <?php
                                $customersLogo = $data['customersLogo'];
                                foreach ($customersLogo as $row) {
                                    ?>

                                    <div class="swiper-slide">
                                        <a class="client-item">
                                            <img style="width: 120px;height: 120px"
                                                 src="public/images/customers_logo/<?= $row['id'] ?>.png"
                                                 alt="لوگوی شرکت">
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!--client-item end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section end-->
    </div>
    <!--content end-->
</div>
<!-- wrapper end-->


<script>
    function allCategory() {
        var divTag = $('#categoryDiv');
        var more = $('#moreCategory');

        var btnTag = more.text();
        if (btnTag == 'مشاهده همه دسته ها') {
            divTag.removeClass('onMoreCategory');
            divTag.addClass('moreCategory');
            more.html('<i class="fal fa-arrow-alt-up"></i>نمایش کمتر');
        } else if (btnTag == 'نمایش کمتر') {
            divTag.removeClass('moreCategory');
            divTag.addClass('onMoreCategory');
            more.html('<i class="fal fa-arrow-alt-down"></i>مشاهده همه دسته ها');
        }
    }
</script>