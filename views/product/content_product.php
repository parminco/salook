<div class="product-header-details">
    <?php
    if ($productInfo['discount'] > 0) { ?>
        <span class="phd_sale green-bg">تخفیف <?= $productInfo['discount'] ?>%</span>
    <?php } ?>
    <div class="row">
        <div class="col-md-6">
            <div class=" shop-media-img">
                <img src="public/images/product/<?= $productInfo['id'] ?>/large.jpg"
                     alt="" style="width: 80%;border-radius: 4px;">
            </div>
        </div>
        <div class="col-md-6">
            <h3><?= $productInfo['title'] ?>  </h3>
            <span class=" <?php
            if ($productInfo['discount'] > 0) {
                echo 'product-header-details_price';
            } else {
                echo 'price-style';
            }
            ?> old-price"><?= @number_format($productInfo['price']) ?>تومان</span>
            <?php
            if ($productInfo['discount'] > 0) { ?>
                <span class="product-header-details_price">
                <?= @number_format($productInfo['total_price']) ?> تومان
                </span>
            <?php } ?>
            <div class="box_like">
                <!--ajax-->
                <form method="post" action="">
                    <i class="like_blue fa fa-thumbs-up" aria-hidden="true"
                       onclick="point('like',<?= $productInfo['id'] ?>);">
                                                        <span class="number" id="likeCount">
                                                            <?= $productInfo['likecount'] ?>
                                                        </span>
                    </i>
                    <i class="like_red fa fa-thumbs-down" aria-hidden="true"
                       onclick="point('dislike',<?= $productInfo['id'] ?>);">
                                                        <span class="number" id="dislikeCount">
                                                            <?= $productInfo['dislikecount'] ?>
                                                        </span>
                    </i>
                </form>
            </div>
            <span class="fw-separator"></span>
            <div class="clearfix"></div>
            <p><?= $productInfo['introduction'] ?></p>

        </div>
    </div>

