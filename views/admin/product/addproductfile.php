<?php

require('views/admin/layoat.php');
 ?>

<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">افزودن محصول</h2>
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
                            <h4>اضافه کردن فایل</h4>
                            <div style="width: 85%;text-align: left">
                                <a href="adminproduct/addproductdescription/<?=$data['product_id']?>" class="btn btn-gradient-01">مرحله بعد</a>
                            </div>
                        </div>

                        <div class="widget-body">
                            <form method="post" action="adminproduct/addproductfile/<?=$data['product_id']?>" class="needs-validation was-validated"
                                  novalidate="" enctype="multipart/form-data">


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">نوع فایل *</label>
                                    <div class="col-lg-5">
                                        <select name="type" class="form-control" style="height: 44px">
                                            <option value="PDF">PDF</option>
                                            <option value="ZIP">ZIP</option>
                                            <option value="Word">Word</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">فایل *</label>
                                    <div class="col-lg-5">
                                        <input name="file" type="file" class="form-control" placeholder="تصویر" required="">
                                        <div class="invalid-feedback">
                                            فایل نمیتواند خالی باشد (Word,PDF,Zip)

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


