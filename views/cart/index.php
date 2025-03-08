<style>


</style>
<form action="cart/saveorder" method="post">


    <section class="gray-bg small-padding no-top-padding-sec" id="sec1">
        <?php
        $cartInfo = $data['cartInfo'];
        $priceTotalall = $data['priceTotalall'];
        $discountTotalall = $data['discountTotalall'];

        if (sizeof($cartInfo) >= 1) {
            ?>
            <div class="container" style="padding-top: 100px">

                <div class="clearfix"></div>
                <!-- CHECKOUT TABLE -->
                <div class=" fl-wrap">
                    <h4 class="cart-ttitle ">سبد خرید شما</h4>
                    <table class="table table-border checkout-table table-responsive-lg">
                        <tbody>
                        <tr>
                            <th class="hidden-xs">عکس</th>
                            <th>نام محصول</th>
                            <th class="hidden-xs">دردصد تخفیف</th>
                            <th class="hidden-xs">
                                قیمت
                            </th>
                            <th>
                                قیمت
                                <span class="discount_span">(با محاسبه تخفیف‌)</span>
                            </th>
                            <th>حذف</th>
                        </tr>

                        <?php
                        $cartInfo = $data['cartInfo'];
                        $numberLoop = sizeof($cartInfo);
                        foreach ($cartInfo as $item) { ?>
                            <input name="numberLoop" type="hidden" value="<?= $numberLoop ?>">
                            <tr>
                                <td class="hidden-xs">
                                    <a><img src="public/images/product/<?= $item['id'] ?>/small.jpg" alt=""
                                            class="respimg"></a>
                                </td>
                                <td>
                                    <a href="product/showProduct/<?= $item['id'] ?>">
                                        <h5 class="product-name"><?= $item['title'] ?></h5>
                                        <input type="hidden" name="productTitle[]" value="<?= $item['title'] ?>">
                                    </a>
                                </td>
                                <td class="hidden-xs">
                                    <h5 class="order-money"><?= number_format($item['discount']) ?>%</h5>
                                    <input type="hidden" name="productDiscount[]"
                                           value="<?= $item['price'] - $item['priceTotal'] ?>">
                                </td>

                                <td class="hidden-xs">
                                    <h5 class="order-money"><?= number_format($item['price']) ?> تومان</h5>
                                </td>

                                <td>
                                    <h5 class="order-money"><?= number_format($item['priceTotal']) ?> تومان</h5>
                                    <input type="hidden" name="productPrice[]" value="<?= $item['priceTotal'] ?>">
                                </td>
                                <td class="pr-remove">

                                    <a href="cart/deletecart/<?= $item['CartRow'] ?>" class="delete"
                                       onclick="SubmitFormCart();" title="Remove"><i class="fal fa-times"></i></a>

                                </td>
                            </tr>
                            <input type="hidden" name="productId[]" value="<?= $item['id'] ?>">

                        <?php }
                        ?>

                        </tbody>
                    </table>
                </div>
                <!-- /CHECKOUT TABLE -->
                <!-- COUPON -->
                <div class="coupon-holder fl-wrap">
                    <div>
                        <input type="text" id="codeDiscount" placeholder="کد تخفیف">
                        <a onclick="checkCodeDsicount(<?=$priceTotalall ?>);"
                           class="btn-a color2-bg color-bg btn-uc float-right">درخواست </a>
                        <p id="error-code" class="error-code-discount"></p>
                    </div>
                    <a href="cart" class="pull-left color-bg btn-uc">به روز رسانی سبد خرید
                    </a>
                </div>
                <!-- /COUPON -->
                <!-- CART TOTALS  -->
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-7">
                        <div class="cart-totals">
                            <h4 class="cart-ttitle ">قیمت کل سبد خرید</h4>
                            <table class="table table-border checkout-table">
                                <tbody>
                                <tr>
                                    <th>تخفیف کل:</th>
                                    <td><?= number_format($discountTotalall) ?> تومان</td>
                                </tr>

                                <tr>
                                    <th>قیمت کل:</th>
                                    <td><?= number_format($priceTotalall) ?> تومان</td>
                                </tr>

                                <tr>
                                    <th> کد تخفیف:</th>
                                    <td id="discountTdTag">0 تومان</td>
                                </tr>
                                <tr>
                                    <th> قابل پرداخت:</th>
                                    <td id="priceTotalAllTdTag">
                                        <input name="priceTotalall" type="hidden" value="<?= $priceTotalall ?>">
                                        <?= number_format($priceTotalall) ?> تومان
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <button style="width: 180px" type="submit" class="btn  color-bg btn-d">پرداخت</button>
                        </div>
                    </div>
                </div>
                <!-- /CART TOTALS  -->
            </div>
            <?php
        } else {
            ?>
            <div class="container" style="padding-top: 100px;height: 500px">
                <img src="public/images/BasketEmpty.png" style="margin: 85px 0 auto;width: 200px">
                <h4 class="cart-ttitle" style="text-align: center"> سبد خرید شما خالی است! </h4>
                <a style="color: #3AACED" href="index">
                    بازگشت به صفحه اصلی
                </a>
            </div>

        <?php }
        ?>

    </section>

</form>

<script>
    function checkCodeDsicount($priceTotalall) {
        var codeDiscount = $('#codeDiscount').val();
        var errorTag = $('#error-code');
        var discountTdTag=$('#discountTdTag');
        var priceTotalAllTdTag=$('#priceTotalAllTdTag');
        var url = 'cart/checkcodedsicount/';
        var data = {'codeDiscount': codeDiscount,'priceTotalall':$priceTotalall};
        if (codeDiscount !== '') {
            errorTag.html('');
            $.post(url, data, function (msg) {
                if (msg === 'invalid') {
                    errorTag.html('کد تخفیف نامعتبر می باشد');
                } else {
                    console.log(msg);
                    var discountCodePrice=msg['discountCodePrice'];
                    var priceTotalall=msg['priceTotalall'];
                    discountTdTag.html(discountCodePrice+' تومان')


                    priceTotalAllTdTag.html('<input name="priceTotalall" type="hidden" value="'+priceTotalall+'">'+priceTotalall+' تومان');

                    errorTag.html('کد تخفیف اعمال شد');
                }
            }, 'json');
        } else {
            errorTag.html('لطفا کد تخفیف را وارد کنید');
        }
    }
</script>