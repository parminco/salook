<div class="tab">
    <div id="shop-tab3" class="tab-content">
        <div class="shop-tab-container">
            <div class="reviews-comments-wrap" style="width: 100%">

                <!-- reviews-comments-item -->
                <?php
                $productId = $data['productInfo']['id'];

                $commentsProduct = $data['commentProduct'];

                foreach ($commentsProduct as $row) {
                    ?>
                    <div style="float: right;margin-bottom: 10px">

                        <div class="reviews-comments-item-text fl-wrap">
                            <div class="reviews-comments-header fl-wrap">
                                <h4><a><?= $row['name'] ?></a></h4>

                            </div>
                            <p><?= $row['comment'] ?></p>
                            <div class="reviews-comments-item-footer fl-wrap">
                                <div class="reviews-comments-item-date"><span><i
                                                class="far fa-calendar-check"></i>تاریخ ثبت:
                                    <?= $row['created_at'] ?>
                                </span>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php }
                ?>
                <!--reviews-comments-item end-->
            </div>
        </div>
        <span class="fw-separator"></span>
        <!-- Add Review Box -->
        <div id="add-review" class="shop-review-box fl-wrap">
            <!-- Review Comment -->
            <div class="leave-rating-wrap">
                <span class="leave-rating-title">ارسال نظرات: </span>

            </div>
            <form method="post" action="" id="add-comment" class="add-comment  custom-form">
                <fieldset>
                    <textarea id="comment" cols="40" rows="3" placeholder="نظر:" onchange="checkLoginUser();"
                              onclick="checkLoginUser();"></textarea>
                    <div class="clearfix"></div>
                    <a onclick="addComment(<?= $productId ?>);" class="btn  color2-bg  float-btn"
                       style="cursor: pointer">ارسال <i
                                class="fal fa-paper-plane"></i></a>
                </fieldset>
            </form>
        </div>
        <!-- Add Review Box / End -->
    </div>
</div>
</div>

<script>


    var isLogin = 0;

    function checkLoginUser() {

        var url = 'product/checkUserLogin/';
        var data = {};
        $.post(url, data, function (msg) {
            console.log(msg);
            if (msg == 'isLogin') {
                // alert('ok');
                document.getElementById("comment").disabled = false;
                isLogin = 1;

            } else if (msg == 'notLogin') {
                document.getElementById("comment").disabled = true;
                isLogin = 0;
                alert('برای درج نظر ابتدا باید وارد سایت بشوید');

            }
        }, 'json');
    }

    function addComment($productId) {
        if (isLogin === 1) {
            var comment = $('#comment').val();

            if (comment != '') {
                var url = 'product/addcomment/';
                var data = {
                    'comment': comment,
                    'productId': $productId
                };
                $.post(url, data, function (msg) {
                    if (msg == 'addedComment') {

                        $('#comment').val(null);
                        var textMsg = 'نظز شما با موفقیت اضافه شد';
                        $('#msgAlert').html('<div  id="closeTag"  style="color:#155724 ;background-color:#d4edda;border-color:#c3e6cb;  " class="alert alert-warning alert-dismissible fade show" role="alert">' + textMsg + '<span class="close"aria-hidden="true" onclick="hideAlert();">&times;</span></div>')

                    }
                }, 'json');
            }
        } else if (isLogin === 0) {
            checkLoginUser();
        }
    }


</script>
