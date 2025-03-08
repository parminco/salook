<link rel="stylesheet" href="public/css/validated/bootstrap.min.css">

<?php
if (isset($_GET['empty'])) {
    ?>

    <div id="msgAlert">
        <div id="closeTag" class="alert alert-warning alert-dismissible fade show" role="alert">
            لطفا فیلد ها را با دقت پر کنید
            <span class="close" aria-hidden="true" onclick="hideAlert();">×</span>
        </div>
    </div>
<?php }

$active = 'ads_insert';
require ('header_profile.php');
?>
<!--  section  end-->
<!--  section  -->
<section class="gray-bg main-dashboard-sec" id="sec1">
    <div class="container">
        <!--  dashboard-menu-->
        <?php require('menu.php'); ?>


        <!-- dashboard-menu  end-->
        <!-- dashboard content-->
        <div class="col-md-9">
            <div class="dashboard-title   fl-wrap">
                <h3>ثبت تبلیغ جدید</h3>
            </div>

            <form method="post" action="profile/add_ads" enctype="multipart/form-data">
                <div class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">


                        <div class="col-sm-6">
                            <label>عنوان تبلیغ
                                <i class="fal fa-briefcase"></i>
                            </label>
                            <input name="title" type="text" placeholder="عنوان کسب و کار(حداقل 70 کارکتر)"
                                   maxlength="70">
                        </div>

                        <div class="col-sm-6">
                            <label>دسته بندی
                                <i class="fal fa-briefcase"></i>
                            </label>
                            <div class="listsearch-input-item">
                                <select name="type" data-placeholder="Apartments" class="chosen-select no-search-select"
                                        style="display: none;">
                                    <option value="1">فروشندگان</option>
                                    <option value="2">خریداران</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label>تانژ
                                <i class="fal fa-circle"></i>
                            </label>
                            <input name="tonnage" type="text" placeholder="..."
                                   maxlength="70">
                        </div>
                        <div class="col-sm-6">
                            <label>قیمت(تومان)
                                <i class="fal fa-dollar-sign"></i>
                            </label>
                            <input name="price" type="text" placeholder=1000"
                                   maxlength="10">
                        </div>

                        <div class="col-sm-12">
                            <label>توضیحات تبلیغ</label>
                            <textarea name="description" maxlength="1000"
                                      placeholder="دراین مکان توضیحات تبیلغات قرار میگیرد(حداقل1000کارکتر)"></textarea>
                        </div>

                        <div class="col-sm-12">
                            <label style="margin-bottom: 0;margin-top: 15px">تصویر تبلیغ</label>
                            <div class="was-validated">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="validatedCustomFile"
                                           required style="margin-top: -30px;margin-bottom: -30px">
                                    <label style="text-align: left" class="custom-file-label" for="validatedCustomFile">حجم
                                        کمتر از۲مگابایت-پسوندjpg,png</label>
                                    <div class="invalid-feedback">لطفا تصویر مورد نظرتان را انتخاب کنید</div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <span style="display: block;width: 100%"></span>
                        <button type="submit" class="btn color2-bg  float-btn">ارسال تبلیغ<i
                                    class="fal fa-paper-plane"></i></button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>

<script src="public/js/dashboard.js"></script>


<script>
    function hideAlert() {
        $('#msgAlert').html('');
    }

</script>