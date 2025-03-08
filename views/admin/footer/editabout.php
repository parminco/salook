<?php

require('views/admin/layoat.php');
$footerInfo = $data['footerInfo'];

if (isset($_GET['success'])) {
    ?>
    <div id="dark" style="display: block"></div>
    <!-- Begin Auto Close Modal -->
    <div id="delay-modal" class="modal fade show" style="display: block; padding-right: 17px;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="sa-icon sa-success animate" style="display: block;">
                        <span class="sa-line sa-tip animateSuccessTip"></span>
                        <span class="sa-line sa-long animateSuccessLong"></span>
                        <div class="sa-placeholder"></div>
                        <div class="sa-fix"></div>
                    </div>
                    <div class="section-title mt-5 mb-2">
                        <h2 class="text-gradient-01">موفق!</h2>
                    </div>
                    <p class="mb-5">ویرایش با موفقیت انجام شد</p>
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

            </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
            <div class="col-xl-12">

                <!-- Default -->
                <div class="widget has-shadow" style="min-height: 500px">
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4 style="padding-left: 5px">ویرایش درباره ما</h4>
                        </div>

                        <div class="widget-body">
                            <form method="post" action="adminfooter/" class="needs-validation was-validated"
                                  novalidate="" enctype="multipart/form-data">

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">درباره شرکت
                                        *</label>
                                    <div class="col-lg-5">
                                        <textarea name="description" type="text" class="form-control"
                                                  placeholder="درباره شرکت "><?= $footerInfo['description'] ?></textarea>
                                        <div class="invalid-feedback">
                                            درباره شرکت نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">ایمیل
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="email" type="email" class="form-control" placeholder="ایمیل"
                                               value="<?= $footerInfo['email'] ?>">
                                        <div class="invalid-feedback">
                                            ایمیل نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">ادرس
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="address" type="text" class="form-control" placeholder="ادرس"
                                               value="<?= $footerInfo['address'] ?>">
                                        <div class="invalid-feedback">
                                            ادرس نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">تلفن
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="phone" type="text" class="form-control" placeholder="تلفن
" value="<?= $footerInfo['phone'] ?>">
                                        <div class="invalid-feedback">
                                            تلفن نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">اینستاگرام</label>
                                    <div class="col-lg-5">
                                        <input name="instagram" type="url" class="form-control"
                                               value="<?= $footerInfo['instagram'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">توییتر</label>
                                    <div class="col-lg-5">
                                        <input name="twitter" type="url" class="form-control"
                                               value="<?= $footerInfo['twitter'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">تلگرام</label>
                                    <div class="col-lg-5">
                                        <input name="telegram" type="url" class="form-control"
                                               value="<?= $footerInfo['telegram'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">یوتیوب</label>
                                    <div class="col-lg-5">
                                        <input name="youtube" type="url" class="form-control"
                                               value="<?= $footerInfo['youtube'] ?>">
                                    </div>
                                </div>


                                <input type="hidden" name="footer_id" value="<?= $footerInfo['id'] ?>">

                                <div class="em-separator separator-dashed"></div>
                                <div class="text-right">
                                    <button class="btn btn-gradient-05" type="submit">اجرای عملیات</button>
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




