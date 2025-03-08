<?php

require('views/admin/layoat.php');

    if (isset($_GET['empty'])) {
    ?>
        <div id="dark" style="display: block"></div>
        <!-- Begin Auto Close Modal -->
        <div id="delay-modal" class="modal fade show" style="display: block; padding-right: 17px;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="section-title mt-5 mb-2">
                            <h2 class="text-gradient-01">هشدار!</h2>
                        </div>
                        <p class="mb-5">لطفا گزینه ها را با دقت پر کنید</p>
                        <button id="close_modal" type="button" class="btn btn-shadow btn-gradient-01 mb-3" data-dismiss="modal">باشه</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Auto Close Modal -->
<?php }
?>

<link rel="stylesheet" href="public/admin/assets/vendors/css/base/bootstrap.min.css">
<link rel="stylesheet" href="public/admin/assets/vendors/css/base/seenboard-1.0.css">
<link rel="stylesheet" href="public/admin/assets/css/bootstrap-select/bootstrap-select.css">
<style>
    .default-sidebar > .side-navbar ul ul {
        background: #252946;
    }
</style>
<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">افزودن تعرفه جدید</h2>
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
                            <form method="post" action="admintariffs/addtariffs"
                                  class="needs-validation was-validated" novalidate="" enctype="multipart/form-data">

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">عنوان
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="name" type="text" class="form-control" placeholder="عنوان"
                                               required="">
                                        <div class="invalid-feedback">
                                            عنوان تعرفه نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">دسته بندی
                                        *</label>
                                    <div class="col-lg-5">
                                        <select name="category_ids[]" class="selectpicker show-menu-arrow form-control"
                                                multiple="">
                                            <?php
                                            $category = $data['category'];
                                            foreach ($category as $item) {
                                                ?>
                                                <option value="<?= $item['id'] ?>"><?= $item['title']?></option>
                                            <?php }
                                            ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">تعداد تبلیغ
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="limit_ads" type="number" class="form-control" placeholder="تعداد تبلیغ" required="" min="0" value="0">
                                        <div class="invalid-feedback">
                                            تعداد تبلیغ را درست وارد کنید
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">دسته بندی
                                        *</label>
                                    <div class="col-lg-5">
                                        <select name="country_ids[]" class="selectpicker show-menu-arrow form-control"
                                                multiple="">
                                            <?php
                                            $country = $data['country'];
                                             foreach ($country as $row) {
                                                ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['name']?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">قیمت
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="price" type="number" class="form-control" placeholder="قیمت" required="" min="0" value="0">
                                        <div class="invalid-feedback">
                                            قیمت را درست وارد کنید
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

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">رنگ زمینه
                                        *</label>
                                    <div class="col-lg-5">
                                        <input type="text" name="background" class="form-control jscolor">
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


     <script src="public/admin/assets/vendors/js/bootstrap-select/bootstrap-select.js"></script>
    <script src="public/admin/assets/vendors/js/app/app.min.js"></script>
    <script src="public/js/jscolor.js"></script>