<div class="list-single-main-item fl-wrap block_box" id="sec3" style="margin-top: 20px">
    <div class="list-single-main-item-title">
        <h3>گالری / عکس</h3>
    </div>
    <div class="list-single-main-item_content fl-wrap">
        <div class="single-carousel-wrap fl-wrap lightgallery">
            <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i></div>
            <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i></div>
            <div class="single-carousel fl-wrap full-height">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        $productGallery = $data['productGallery'];
                        foreach ($productGallery as $item) {
                            ?>

                            <div class="swiper-slide">
                                <div class="box-item">
                                    <img src="public/images/product/<?= $productInfo['id'] ?>/gallery/<?= $item['img'] ?>"
                                         alt="">
                                    <a href="public/images/product/<?= $productInfo['id'] ?>/gallery/<?= $item['img'] ?>"
                                       class="gal-link popup-image"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>