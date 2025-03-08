<?php

require('views/admin/layoat.php');
$sliderInfo = $data['sliderInfo'];

?>
<style>
    .image-slider{
        border-radius:4px;
        overflow: hidden;
        box-shadow: 0 0 8px 0 rgba(0, 0, 0, .6);
    }
</style>
<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">ویرایش اسلایدشو
                    <span style="font-size: 10pt;color: red">
                        (<?=$sliderInfo['title']?>)
                    </span>

                    </h2>
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
                            <h4 style="padding-left: 5px">ویرایش</h4>
                            <img class="image-slider" src="public/images/slider/<?=$sliderInfo['id']?>.jpg" width="100" alt="تصویر">
                        </div>

                            <div class="widget-body">
                                <form method="post" action="adminslider/editslider/<?=$sliderInfo['id']?>" class="needs-validation was-validated" novalidate=""  enctype="multipart/form-data" >

                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">عنوان *</label>
                                        <div class="col-lg-5">
                                            <input name="title" type="text" class="form-control" placeholder="عنوان" value="<?=$sliderInfo['title']?>">
                                            <div class="invalid-feedback">
                                               عنوان اسلایدر نمیتواند خالی باشد
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">لینک اسلایدر</label>
                                        <div class="col-lg-5">
                                            <input name="link" type="url" class="form-control" value="<?=$sliderInfo['link']?>">
                                        </div>
                                    </div>

                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">تصویر</label>
                                        <div class="col-lg-5">
                                            <input name="image" type="file" class="form-control">
                                        </div>

                                        <span style="text-align: center;font-size: 9pt;width: 100%;margin-top: 3px">
                                            تصویر اسلایدر نمیتواند خالی باشد (1500px در 500px)
                                        </span>
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


