<?php

require('views/admin/layoat.php');
?>

<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">افزودن همکارجدید</h2>
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
                            <form method="post" action="adminfooter/addpersonnel" class="needs-validation was-validated"
                                  novalidate="" enctype="multipart/form-data">

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">نام
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="name" type="text" class="form-control" placeholder="نام"
                                               required="">
                                        <div class="invalid-feedback">
                                            نام نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">سمت
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="side" type="text" class="form-control" placeholder="سمت"
                                               required="">
                                        <div class="invalid-feedback">
                                            سمت نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">توضیحات
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="description" type="text" class="form-control" placeholder="توضیحات"
                                               required="">
                                        <div class="invalid-feedback">
                                            توضیحات نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">شروع همکاری *</label>
                                    <div class="col-lg-5">
                                        <input name="date_joine" type="text" class="form-control" placeholder="شروع همکاری"
                                               required="">
                                        <div class="invalid-feedback">
                                            شروع همکاری نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">تصویر
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="image" type="file" class="form-control" placeholder="تصویر"
                                               required="">
                                        <div class="invalid-feedback">
                                            تصویر نمیتواند خالی باشد (500px در 500px)

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


