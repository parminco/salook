<!--footer -->
<footer class="main-footer fl-wrap">
    <?php
    $model = new Model;

    $footer_info = $model->getFooterInfo();
    $personnel = $model->getPersonnel();
    $honors = $model->getHonors();
    ?>
    <!--footer-inner-->
    <div class="footer-inner   fl-wrap">
        <div class="container">
            <div class="row">
                <!-- footer-widget-->
                <div class="col-md-4">
                    <div class="footer-widget fl-wrap">
                        <div class="footer-logo"><a href="index.html"><img src="images\logo.png" alt=""></a></div>
                        <div class="footer-contacts-widget fl-wrap">
                            <p><?= $footer_info['description'] ?></p>
                            <ul class="footer-contacts fl-wrap no-list-style">
                                <li><span><i class="fal fa-envelope"></i> ایمیل :</span><a
                                            target="_blank"><?= $footer_info['email'] ?></a></li>
                                <li><span><i class="fal fa-map-marker"></i> آدرس :</span><a target="_blank">
                                        <?= $footer_info['address'] ?>
                                    </a>
                                </li>
                                <li>
                                    <span><i class="fal fa-phone"></i> تلفن :</span><a>   <?= $footer_info['phone'] ?></a>
                                </li>
                                <li>
                                    <span> راه های ارتباطی :</span>
                                    <a class="no-padding" href="<?= $footer_info['instagram'] ?>" title="instagram">
                                        <img src="public/images/footer/instagram.png" width="30">
                                    </a>
                                    <a class="no-padding" href="<?= $footer_info['telegram'] ?>"
                                       title="telegram">
                                        <img src="public/images/footer/telegram.png" width="25">
                                    </a>
                                    <a class="no-padding" href="<?= $footer_info['twitter'] ?>" title="twitter">
                                        <img src="public/images/footer/twitter.png" width="30">
                                    </a>
                                    <a class="no-padding" href="<?= $footer_info['youtube'] ?>"
                                       title="youtube">
                                        <img src="public/images/footer/youtube.png" width="30">
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <!-- footer-widget end-->
                <!-- footer-widget-->
                <div class="col-md-4">
                    <div class="footer-widget fl-wrap">
                        <h3>همکاران ما</h3>
                        <div class="footer-widget-posts fl-wrap">
                            <ul class="no-list-style">
                                <?php
                                foreach ($personnel as $row) {
                                    ?>

                                    <li class="clearfix">
                                        <a class="widget-posts-img">
                                            <img src="public/images/personnel/<?= $row['id'] ?>.jpg"></a>
                                        <div class="widget-posts-descr">
                                            <a><?= $row['name'] ?></a>
                                            <span class="widget-posts-date">
                                            <i class="fal fa-user"></i>سمت:<?= $row['side'] ?>
                                        </span>
                                            <span class="widget-posts-date">
                                            <i class="fal fa-calendar"></i>
                                           <?= $row['description'] ?>
                                        </span>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>

                            </ul>
                            <a href="personnel" class="footer-link">همه همکاران <i
                                        class="fal fa-long-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <!-- footer-widget end-->
                <!-- footer-widget  -->
                <div class="col-md-4">
                    <div class="footer-widget fl-wrap">
                        <h3>افتخارات ما</h3>
                        <div class="footer-widget-posts fl-wrap">
                            <ul class="no-list-style">
                                <?php
                                foreach ($honors as $item) {
                                    ?>

                                    <li class="clearfix">
                                        <a class="widget-posts-img">
                                            <img src="public/images/honors/<?= $item['id'] ?>.jpg"></a>
                                        <div class="widget-posts-descr">
                                            <a><?= $item['title'] ?></a>
                                            <span class="widget-posts-date">
                                            <i class="fal fa-calendar"></i>دریافت:<?= $item['date_received'] ?>
                                        </span>
                                            <span class="widget-posts-date">
                                            <i class="fal fa-calendar"></i>
                                            <?= $item['description'] ?>
                                         </span>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- footer-widget end-->
            </div>
        </div>
        <!-- footer bg-->
        <div class="footer-bg" data-ran="4"></div>
        <div class="footer-wave">
            <svg viewbox="0 0 100 25">
                <path fill="#fff" d="M0 30 V12 Q30 6 55 12 T100 11 V30z"></path>
            </svg>
        </div>
        <!-- footer bg  end-->
    </div>
    <!--footer-inner end -->
    <!--sub-footer-->
    <div class="sub-footer  fl-wrap" style="background: #484d59;padding-top: 0">
        <div class="container">
            <div class="copyright"> &#169;طراحی و توسعه داده شده توسط شرکت
                <a style="color: white;font-size: 12px" href="https://www.instagram.com/amir_programmer/">پارمین وب</a>
            </div>

            <div class="subfooter-nav">
                <ul class="no-list-style">
                    <li><a href="https://www.instagram.com/amir_programmer/">ادرس اینستاگرام</a></li>
                    <li><a href="https://t.me/amirhosseinnodehi">ادرس تلگرام</a></li>
                    <li><a>شماره تماس-09339076284</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--sub-footer end -->
</footer>
<!--footer end -->

<!--reg ister form -->
<?php
require('views/user_controller/index.php');
?>
<!--register form end -->
<a class="to-top" style="background: #FFD700"><i style="color: black" class="fas fa-caret-up"></i></a>
</div>
<!-- Main end -->

<script>
    function addToCart($productId) {
        var url = '<?= URL ?>cart/addtocart/' + $productId;
        var data = {};
        $.post(url, data, function (msg) {
            window.location.assign('<?=URL?>cart');
        });
    }
</script>
<!--=============== scripts  ===============-->
<script src="public/js/jquery.min.js"></script>
<script src="public/js/plugins.js"></script>
<script src="public/js/scripts.js"></script>
<script src="public/js/admin_script.js"></script>


<script src="public/js/map-listing.js"></script>


<script src="public/js/shop.js"></script>

<!-- Bootstrap Datepicker JS -->
<script src="public/js/bootstrap-datepicker.min.js"></script>
<!-- persian picker JS -->
<script src="public/src/jquery.md.bootstrap.datetimepicker.js" type="text/javascript"></script>
<!-- <script src="assets/dist/jquery.md.bootstrap.datetimepicker.js" type="text/javascript"></script> -->
<script src="public/js/picker-style.js" type="text/javascript"></script>
</body>
</html>