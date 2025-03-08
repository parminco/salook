
<?php

require('views/admin/layoat.php');
$personnelInfo = $data['personnelInfo'];

if (isset($_GET['editPersonnel'])) {
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
                    <button id="close_modal" type="button" class="btn btn-shadow btn-gradient-04 mb-3" data-dismiss="modal">خوبه</button>
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
                            <h4 style="padding-left: 5px">
                                ویرایش همکار
                            </h4>
                            <img class="image-box" src="public/images/personnel/<?=$personnelInfo['id']?>.jpg" width="50">
                        </div>

                        <div class="widget-body">
                            <form method="post" action="adminfooter/editpersonnel/<?=$personnelInfo['id']?>" class="needs-validation was-validated"
                                  novalidate="" enctype="multipart/form-data">

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">نام
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="name" type="text" class="form-control" placeholder="نام" required="" value="<?=$personnelInfo['name']?>">
                                        <div class="invalid-feedback">
                                            نام نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">سمت
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="side" type="text" class="form-control" placeholder="سمت" required="" value="<?=$personnelInfo['side']?>">
                                        <div class="invalid-feedback">
                                            سمت نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">توضیحات
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="description" type="text" class="form-control" placeholder="توضیحات" required="" value="<?=$personnelInfo['description']?>">
                                        <div class="invalid-feedback">
                                            توضیحات نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">شروع همکاری *</label>
                                    <div class="col-lg-5">
                                        <input name="date_joine" type="text" class="form-control" placeholder="شروع همکاری" required="" value="<?=$personnelInfo['date_joine']?>">
                                        <div class="invalid-feedback">
                                            شروع همکاری نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">تصویر </label>
                                    <div class="col-lg-5">
                                        <input name="image" type="file" class="form-control" placeholder="تصویر(500px در 500px)"  value="public/images/personnel/<?=$personnelInfo['id']?>">
                                    </div>
                                </div>


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




