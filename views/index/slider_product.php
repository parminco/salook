<section class="slw-sec" id="sec1" style="padding-bottom: 0;padding-top: 10px;background:  #f6f6f6 !important; ">
    <div class="section-title" style="padding-bottom: 15px;">
        <h2>اخرین محصولات</h2>
        <div class="section-subtitle"></div>
        <span class="section-separator"></span>
        <p>با انتخاب یکی از محصولات به صفحه ی توضیحات آن محصول بروید</p>
    </div>
    <div class="listing-slider-wrap fl-wrap">
        <div class="listing-slider fl-wrap">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!--  swiper-slide  -->
                    <?php
                    $product = $data['product'];

                    foreach ($product as $row) {
                        ?>
                        <div class="swiper-slide">
                            <div class="listing-slider-item fl-wrap">
                                <!-- listing-item  -->
                                <div class="listing-item listing_carditem">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img">
                                            <div class="geodir-js-favorite_btn">
                                                <i class="fal fa-shopping-cart" onclick="addToCart(<?=$row['id'];?>);"></i>
                                                <span>افزودن به سبد خرید</span>
                                            </div>
                                            <a href="product/showProduct/<?= $row['id'] ?>"
                                               class="geodir-category-img-wrap fl-wrap">
                                                <img src="public/images/product/<?= $row['id'] ?>/small.jpg" alt="image-product" style="width: 500px;height: 300px">
                                            </a>
                                            <?php
                                            if ($row['discount'] > 0) {
                                                ?>

                                                <div class="geodir_status_date gsd_open" style="background: #f53c2d">
                                                    <i class="fal fa-percent"></i>
                                                    <?= $row['discount'] ?>
                                                    درصد تخفیف
                                                </div>

                                            <?php }
                                            ?>
                                            <div class="geodir-category-opt">
                                                <div class="geodir-category-opt_title">
                                                    <h4>
                                                        <a href="product/showProduct/<?= $row['id'] ?>"><?= $row['title'] ?></a>
                                                    </h4>
                                                    <div class="geodir-category-location">
                                                        <a href="">
                                                            <i class="fas fa-map-marker-alt"></i> ایران , تهران
                                                            , زعفرانیه
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="listing_carditem_footer fl-wrap">
                                                    <a class="listing-item-category-wrap" href="#">
                                                        <div class="listing-item-category red-bg">
                                                            <i class="fal fa-list "></i>
                                                        </div>
                                                        <span><?= $row['title_category'] ?></span>
                                                    </a>

                                                    <div class="post-author">
                                                        <a class="listing-item-category-wrap" href="">
                                                            <div class="listing-item-category red-bg">
                                                                <i class="fal fa-dollar-sign "></i>
                                                            </div>
                                                            <span>
قیمت محصول:
                                                               <?= number_format($row['price'])?>
                                                            </span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <!-- listing-item end -->
                            </div>
                        </div>
                    <?php }
                    ?>
                    <!--  swiper-slide end  -->
                </div>
            </div>
            <div class="listing-carousel-button listing-carousel-button-next2"><i
                        class="fas fa-caret-right"></i></div>
            <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i>
            </div>
        </div>
        <div class="tc-pagination_wrap">
            <div class="tc-pagination2"></div>
        </div>
    </div>
</section>