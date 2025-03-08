<div class="box-widget-item fl-wrap block_box">
    <div class="box-widget-item-header">
        <h3>باکس ویژگی ها </h3>
    </div>
    <div class="box-widget">

        <div class="box-widget-content bwc-nopad">
            <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                <ul class="no-list-style">
                    <li>
                        <span><i class="fal fa-link"></i> نام محصول :</span>
                        <a><?= $productInfo['title'] ?></a></li>
                    <li>
                        <span><i class="fal fa-eye"></i> تعداد بازدید :</span>
                        <a href="#"><?= $productInfo['views'] ?></a>
                    </li>
                    <li>
                        <span><i class="fal fa-file"></i>نوع فایل :</span>
                        <a><?= $productInfo['type'] ?></a></li>


                    <li><span><i class="fal fa-file"></i>قیمت :</span>
                        <a><?= number_format($productInfo['total_price']) ?></a></li>
                    <li>
                </ul>
            </div>
            <div class="list-widget-social bottom-bcw-box  fl-wrap">
                <ul class="no-list-style">
                    <div class="custom-form product-header_form ">

                        <button style="margin: 0" class="color-bg" onclick="addToCart(<?=$productInfo['id']?>);">افزودن به سبد خرید</button>

                    </div>
                </ul>

            </div>
        </div>
    </div>
</div>