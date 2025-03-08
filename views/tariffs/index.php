<style>
    .price-item {
        margin: 3px;
    }
</style>
<section id="sec1" data-scrollax-parent="true">
    <div class="container">
        <div class="section-title">
            <h2> لیست تعرفه ها</h2>
            <span class="section-separator"></span>
            <p>با شارژ کردن اکانت دسترسی خود را به مقاله ها ارتقا بدید.</p>
        </div>


        <div class="pricing-wrap fl-wrap">

            <?php
            $tariffs = $data['tariffs'];
            foreach ($tariffs as $item) {
                ?>
                <form id="form_<?= $item['id'] ?>" method="post" action="tariffs/savetariffs/">
                    <input name="tariffs_id" type="hidden" value="<?= $item['id'] ?>">
                    <input name="tariffs_name" type="hidden" value="<?= $item['name'] ?>">
                    <input name="tariffs_price" type="hidden" value="<?= $item['price'] ?>">
                    <input name="credit_time" type="hidden" value="<?= $item['credit_time'] ?>">
                    <div class="price-item">
                        <div class="price-head" style="background:#<?= $item['background'] ?>">
                            <div class="price-num col-dec-1 fl-wrap">
                                <div class="price-num-item">
                            <span class="mouth-cont" style="font-size:80% "><?= number_format($item['price']) ?>
                                <span class="curen">تومان</span>
                            </span>
                                </div>
                                <div class="clearfix"></div>
                                <div class="price-num-desc"><span
                                            class="mouth-cont"><?= $item['credit_time'] ?> ماهه</span>
                                </div>
                            </div>
                            <div class="circle-wrap" style="right:20%;top:50px;">
                                <div class="circle_bg-bal circle_bg-bal_versmall"
                                     data-scrollax="properties: { translateY: '50px' }"
                                     style="transform: translateZ(0px) translateY(2.77933px);"></div>
                            </div>
                            <div class="circle-wrap" style="right:75%;top:90px;">
                                <div class="circle_bg-bal circle_bg-bal_versmall"></div>
                            </div>
                            <div class="footer-wave">
                                <svg viewBox="0 0 100 25">
                                    <path fill="#fff" d="M0 30 V12 Q30 6 55 12 T100 11 V30z"></path>
                                </svg>
                            </div>
                            <div class="footer-wave footer-wave2">
                                <svg viewBox="0 0 100 25">
                                    <path fill="#fff" d="M0 90 V12 Q30 7 45 12 T100 11 V30z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="price-content fl-wrap">
                            <div class="price-desc fl-wrap">
                                <ul class="no-list-style">
                                    <li><?= $item['limit_ads'] ?> تبلیغ</li>
                                    <li><?= $item['credit_time'] ?> ماه در دسترس بودن</li>
                                    <li>دسته:<?php
                                        $category = unserialize($item['category']);
                                        $category = join(',', $category);
                                        echo $category;
                                        ?>
                                    </li>
                                     <li>کشور:
                                        <?php
                                        $country = unserialize($item['country']);
                                        $country = join(',', $country);
                                        echo $country;

                                        ?>
                                    </li>
                                </ul>
                                <a style="cursor: pointer" onclick="submitForm(<?= $item['id'] ?>);" class="price-link green-bg">انتخاب کردن</a>
                            </div>
                        </div>
                    </div>
                </form>
            <?php }
            ?>

        </div>


    </div>
</section>

<script>
    function submitForm(form_id) {
        $('#form_'+form_id).submit();
    }
</script>