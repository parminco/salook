<?php

require('views/admin/layoat.php');
$productInfo = $data['productInfo'];
$categoryInfo = $data['categoryInfo'];
?>

<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">
                        ویرایش محصول
                    <span style="font-size: 9pt;color: red">(<?= $productInfo['title'] ?>)</span>
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
                            <h4>ویرایش</h4>
                        </div>

                        <div class="widget-body">
                            <form method="post" action="adminproduct/editproduct/<?= $productInfo['id'] ?>" class="needs-validation was-validated"
                                  novalidate="" enctype="multipart/form-data">

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">عنوان
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="title" type="text" class="form-control" placeholder="عنوان"
                                               required="" value="<?= $productInfo['title'] ?>">
                                        <div class="invalid-feedback">
                                            عنوان محصول نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">قیمت
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="price" type="number" class="form-control" placeholder="قیمت"
                                               required="" min="0"   value="<?= $productInfo['price'] ?>">
                                        <div class="invalid-feedback">
                                            قیمت را درست وارد کنید
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">درصد تخفیف
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="discount" type="number" class="form-control"
                                               placeholder="درصد تخفیف" required="" min="0" max="100"  value="<?= $productInfo['discount'] ?>">
                                        <div class="invalid-feedback">
                                            درصد تخفیف را درست وارد کنید
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">توضیحات*</label>
                                    <div class="col-lg-5">
                                        <textarea name="introduction" class="form-control"
                                                  placeholder="توضیحات">  <?= $productInfo['introduction'] ?> </textarea>
                                        <div class="invalid-feedback">
                                            توضیحات نمیتواند خالی باشد
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">دسته بندی
                                        *</label>
                                    <div class="col-lg-5">
                                        <select name="category" class="form-control" style="height: 44px">
                                            <?php
                                            foreach ($categoryInfo as $item) {
                                                ?>
                                                <option value="<?= $item['id'] ?>" <?php if ($item['id']==$productInfo['category']){echo 'selected=selected';} ?>>
                                                    <?= $item['title'] ?>
                                                </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">تصویر </label>
                                    <div class="col-lg-5">
                                        <input name="image" type="file" class="form-control"  value="public/images/product/<?=$productInfo['id']?>/large.jpg"">
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


