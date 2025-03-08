<?php

require('views/admin/layoat.php');

$title = '';
$description = '';
if (isset($_GET['usedCode'])) {
    $title = 'خطا!';
    $description = 'از این نام قبلا استفاده شده';
}
if (isset($_GET['success'])) {
    $title = 'موفق!';
    $description = 'ایجاد کد تخفیف جدید با موفقیت انجام شد';
}


if ($title != '') {
    ?>
    <div id="dark" style="display: block"></div>
    <!-- Begin Auto Close Modal -->
    <div id="delay-modal" class="modal fade show" style="display: block; padding-right: 17px;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <?php
                    if (isset($_GET['success']))
                    {
                        ?>
                    <div class="sa-icon sa-success animate" style="display: block;">
                        <span class="sa-line sa-tip animateSuccessTip"></span>
                        <span class="sa-line sa-long animateSuccessLong"></span>
                        <div class="sa-placeholder"></div>
                        <div class="sa-fix"></div>
                    </div>

                    <?php }
                    ?>
                    <div class="section-title mt-5 mb-2">
                        <h2 class="text-gradient-01"><?= $title ?></h2>
                    </div>
                    <p class="mb-5"><?= $description ?></p>
                    <button id="close_modal" type="button" class="btn btn-shadow btn-gradient-04 mb-3"
                            data-dismiss="modal">خوبه
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Auto Close Modal -->
<?php }
?>
<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">افزودن تخفیف</h2>
                    <div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Default -->
                <div class="widget has-shadow" style="min-height: 500px">
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4>افزودن</h4>
                        </div>

                        <div class="widget-body">
                            <form method="post" action="adminproduct/adddiscountcode" class="needs-validation was-validated"
                                  novalidate="" enctype="multipart/form-data">

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">عنوان
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="name" type="text" class="form-control" placeholder="عنوان"
                                               required="">
                                        <div class="invalid-feedback">
                                            عنوان محصول نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">درصد تخفیف
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="percent" type="number" class="form-control"
                                               placeholder="درصد تخفیف" required="" min="0" max="100" value="0">
                                        <div class="invalid-feedback">
                                            درصد تخفیف را درست وارد کنید
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">اعتبار(ماه)
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="credit_time" type="number" class="form-control" placeholder="اعتبار" required="" min="1" value="1">
                                        <div class="invalid-feedback">
                                            اعتبار را درست وارد کنید
                                        </div>
                                    </div>
                                </div>

                                <div class="em-separator separator-dashed"></div>
                                <div class="text-right">
                                    <button class="btn btn-gradient-04" type="submit">ذخیره</button>
                                    <button class="btn btn-shadow" type="reset">بازگردانی</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- End Default -->


            </div>
        </div>
        <!-- End Row -->
    </div>

    <?php
    require('views/admin/layoat_footer.php');
    ?>


