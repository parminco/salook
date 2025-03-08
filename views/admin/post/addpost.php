<?php

require('views/admin/layoat.php');
$categoryInfo = $data['categoryInfo'];
$locationInfo = $data['locationInfo'];
?>
<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">افزودن مقاله</h2>
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
                            <form method="post" action="adminpost/addpost" class="needs-validation was-validated" novalidate="" enctype="multipart/form-data">

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">عنوان *</label>
                                    <div class="col-lg-5">
                                        <input name="title" type="text" class="form-control" placeholder="عنوان" required="">
                                        <div class="invalid-feedback">
                                            عنوان مقاله نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">دسته بندی *</label>
                                    <div class="col-lg-5">
                                        <select name="category_id" class="form-control" style="height: 44px">
                                            <?php
                                            foreach ($categoryInfo as $item) {
                                                ?>
                                                <option value="<?= $item['id'] ?>">
                                                    <?= $item['title'] ?>
                                                </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">کشور*</label>
                                    <div class="col-lg-5">
                                        <select name="country_id" class="form-control" style="height: 44px">
                                            <?php
                                            foreach ($locationInfo as $item) {
                                                ?>
                                                <option value="<?= $item['id'] ?>">
                                                    <?= $item['name'] ?>
                                                </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">توضیحات *</label>
                                    <div class="col-lg-5">
                                        <textarea name="description"  class="form-control" placeholder="توضیحات" required=""></textarea>
                                        <div class="invalid-feedback">
                                            توضیحات مقاله نمیتواند خالی باشد
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


