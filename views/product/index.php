<?php
$productInfo = $data['productInfo'];
?>

<div id="msgAlert"></div>
<!-- wrapper-->
<div id="wrapper" style="padding-top: 40px" onload="checkLoginUser();">
    <!-- content-->
    <div class="content">
        <!--section-->
        <section class="gray-bg small-padding" id="sec1">
            <div class="container">

                <div class="fl-wrap">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="fl-wrap block_box product-header">
                                <?php require 'content_product.php' ?>
                            </div>
                        </div>


                        <div class="">
                            <!-- shop-tabs-->
                            <!-- list-single-main-item-->
                            <?php require 'gallery.php'; ?>
                            <!-- list-single-main-item end -->
                            <div class="tabs-act fl-wrap">
                                <div class="shop-tabs-menu " id="st-menu">
                                    <ul class="tabs-menu fl-wrap no-list-style">
                                        <li class="current"><a href="#shop-tab1">توضیحات</a></li>
                                        <li><a href="#shop-tab3">نظرات</a></li>
                                    </ul>
                                </div>
                                <!-- shop-tabs-->
                                <!-- shop-tabs-->
                                <div class="shop-tabs fl-wrap block_box">
                                    <!--tabs -->
                                    <div class="tabs-container fl-wrap">
                                        <!--tab -->
                                        <?php
                                        require 'collapse_product.php'
                                        ?>
                                        <!--tab end-->

                                        <!--tab comment -->
                                        <?php
                                        require 'comment_product.php';
                                        ?>
                                        <!--tab end-->
                                    </div>
                                    <!--tabs end-->
                                </div>
                                <!-- shop-tabs end-->

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class=" fl-wrap ">
                                <!--box-widget-item -->
                                <?php require 'search_box.php' ?>
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                <?php require 'box_information_product.php' ?>
                                <!--box-widget-item end -->

                            <?php require 'box_similar_product.php' ?>

                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!--section end-->
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->

</div>

<script>

    function point($var, $productId) {
        var url = 'product/checkSetCookiePoint/' + $productId + '/' + $var;
        var data = {};
        $.post(url, data, function (msg) {

            // alert(msg);
            if (msg === 'notScorePoint') {
                var textMsg = 'شما قبلا برای این پست نظر ثبت کرده اید';
                $('#msgAlert').html('<div  id="closeTag"  class="alert alert-warning alert-dismissible fade show" role="alert">' + textMsg + '<span class="close"aria-hidden="true" onclick="hideAlert();">&times;</span></div>')

            }
            if (msg === 'successScorePoint') {
                if ($var === 'dislike') {
                    var dislikeCount = $('#dislikeCount').text();
                    dislikeCount = parseInt(dislikeCount);
                    dislikeCount += 1;
                    $('#dislikeCount').html(dislikeCount);

                }

                if ($var === 'like') {
                    var likeCount = $('#likeCount').text();
                    likeCount = parseInt(likeCount);
                    likeCount += 1;
                    $('#likeCount').html(likeCount);

                }
            }
        }, 'json');
    }

    function hideAlert() {
        $('#msgAlert').html('');
    }


    function addToCart($productId) {
        var url = '<?= URL ?>cart/addtocart/' + $productId;
        var data = {};
        $.post(url, data, function (msg) {
            window.location.assign('<?=URL?>cart');
        });
    }

</script>