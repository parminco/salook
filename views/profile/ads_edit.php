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
 
$active = 'ads';
require ('header_profile.php');
?>
<!--  section  end-->
<!--  section  -->
<section class="gray-bg main-dashboard-sec" id="sec1">
    <div class="container">
        <!--  dashboard-menu-->
        <?php
        require('menu.php');
        $ads_info=$data['ads_info'];
        ?>


        <!-- dashboard-menu  end-->
        <!-- dashboard content-->
        <div class="col-md-9">
            <div class="dashboard-title   fl-wrap">
                <h3>ویرایش تبلیغ
                    <span style="color: red;font-size:9pt">
                        (<?=@$ads_info['title']?>)
                    </span>
                </h3>
            </div>

            <form method="post" action="profile/ads_edit/<?=@$ads_info['id']?>" enctype="multipart/form-data">
                <div class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">


                        <div class="col-sm-6">
                            <label>عنوان تبلیغ
                                <i class="fal fa-briefcase"></i>
                            </label>
                            <input name="title" type="text" placeholder="عنوان کسب و کار(حداقل 50 کارکتر)"
                                   maxlength="50" value="<?=@$ads_info['title']?>">
                        </div>

                        <div class="col-sm-6">
                            <label>دسته بندی
                                <i class="fal fa-briefcase"></i>
                            </label>
                            <div class="listsearch-input-item">
                                <select name="type" data-placeholder="Apartments" class="chosen-select no-search-select"
                                        style="display: none;">
                                    <option <?php if (@$ads_info['type']==1) {echo 'selected="selected" ';}?> value="1">فروشندگان</option>
                                    <option <?php if (@$ads_info['type']==2) {echo 'selected="selected" ';}?> value="2">خریداران</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label>توضیحات تبلیغ</label>
                            <textarea name="description" maxlength="1000"
                                      placeholder="دراین مکان توضیحات تبیلغات قرار میگیرد(حداقل1000کارکتر)"><?=@$ads_info['description']?></textarea>
                        </div>

                        <div class="col-sm-12">
                            <label style="margin-bottom: 0;margin-top: 15px">تصویر تبلیغ</label>
                            <div class="was-validated">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="validatedCustomFile"
                                           required style="margin-top: -30px;margin-bottom: -30px" value="public/images/ads/<?=@$ads_info['id']?>.jpg">
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