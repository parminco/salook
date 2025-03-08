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

$active = 'editProfile';
require('header_profile.php');

$userInfo = $data['userInfo'];
?>
<!--  section  end-->
<!--  section  -->
<section class="gray-bg main-dashboard-sec" id="sec1">
    <div class="container">
        <!--  dashboard-menu-->
        <?php
        require('menu.php');

        ?>


        <div class="col-md-9">
            <div class="dashboard-title   fl-wrap">
                <h3>ویرایش پروفایل</h3>
            </div>
            <!-- profile-edit-container-->
            <form action="profile/editprofile" method="post" enctype="multipart/form-data">

                <div class="profile-edit-container fl-wrap block_box">
                    <?php
                    if (isset($_GET['error'])) {
                    ?>

                    <p class="error-resetpassword"><?= $_GET['error']; ?></div>
                <?php } ?>

                <div class="custom-form">
                    <div class="col-sm-12">
                        <label>نام</label>
                        <input type="text" class="pass-input" name="name" value="<?=$userInfo['name']; ?>">
                    </div>
                    <div class="col-sm-12">
                        <label>ایمیل*</label>
                        <input type="email" class="pass-input" name="email" value="<?=$userInfo['email']; ?>">
                    </div>
                    <div class="col-sm-12">
                        <label>موبایل*</label>
                        <input type="text" class="pass-input" name="phone" value="<?=$userInfo['phone']; ?>">

                    </div>

                    <div class="col-sm-12">
                        <label style="margin-bottom: 0;margin-top: 15px">تصویر تبلیغ</label>
                        <div class="was-validated">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required="" style="margin-top: -30px;margin-bottom: -30px">
                                <label style="text-align: left" class="custom-file-label" for="validatedCustomFile">حجم
                                    کمتر از۲مگابایت-پسوندjpg,png</label>
                                <div class="invalid-feedback">لطفا تصویر مورد نظرتان را انتخاب کنید</div>
                            </div>
                        </div>

                    </div>

                    <button class="btn color2-bg  float-btn">ذخیره تغییرات<i class="fal fa-save"></i></button>
                </div>
        </div>
        </form>
        <!-- profile-edit-container end-->
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