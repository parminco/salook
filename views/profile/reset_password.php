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

$active = 'reset_password';
require ('header_profile.php');
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
                <h3>تغییر رمز عبور</h3>
            </div>
            <!-- profile-edit-container-->
            <form action="profile/resetpassword" method="post">

                <div class="profile-edit-container fl-wrap block_box">
                    <?php
                    if (isset($_GET['error'])) {
                        ?>

                        <p class="error-resetpassword"><?= $_GET['error']; ?></div>
                    <?php } ?>

                    <div class="custom-form">
                        <div class="pass-input-wrap fl-wrap">
                            <label>رمز عبور فعلی</label>
                            <input type="password" class="pass-input" name="oldPassword">
                            <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                        </div>
                        <div class="pass-input-wrap fl-wrap">
                            <label>رمز عبور جدید</label>
                            <input type="password" class="pass-input" name="newPassword">
                            <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                        </div>
                        <div class="pass-input-wrap fl-wrap">
                            <label>تکرار رمز عبور جدید</label>
                            <input type="password" class="pass-input" name="confirmPassword">
                            <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                        </div>
                        <button class="btn    color2-bg  float-btn">ذخیره تغییرات<i class="fal fa-save"></i></button>
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