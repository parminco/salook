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
                            <h4>افزودن عکس به گالری محصول</h4>
                            <div style="width: 75%;text-align: left">
                                <a href="adminproduct/addproductdescription/<?= $data['product_id'] ?>/" class="btn btn-gradient-01">مرحله بعد</a>
                            </div>
                        </div>

                        <div class="widget-body">
                            <form method="post" action="adminproduct/addproductgallery/<?= $data['product_id'] ?>"
                                  class="needs-validation was-validated"
                                  novalidate="" enctype="multipart/form-data">


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">تصویر
                                        *</label>
                                    <div class="col-lg-5">
                                        <input name="image" type="file" class="form-control" placeholder="تصویر"
                                               required="">
                                        <div class="invalid-feedback">
                                            تصویر نمیتواند خالی باشد (500px در 300px)

                                        </div>
                                    </div>
                                    <button class="btn btn-gradient-04" type="submit">ذخیره</button>
                                </div>


                            </form>

                            <div class="em-separator separator-dashed"></div>

                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>کد</th>
                                        <th>تصویر</th>
                                         <th>حذف</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $product_id = $data['product_id'];
                                    $gallery = $data['gallery'];
                                    $count=1;
                                    foreach ($gallery as $item) {
                                        ?>
                                        <tr>
                                            <td><span class="text-primary"><?=$count?></span></td>
                                            <td>
                                                <img style="border-radius: 4px" src="public/images/product/<?=$product_id?>/gallery/<?=$item['img']?>" alt="تصویر" width="100">

                                            </td>

                                            <td class="td-actions">
                                                <a href="adminproduct/deleteproductgallery/<?=$product_id?>/<?=$item['img']?>"><i class="la la-close delete"></i></a>
                                            </td>
                                        </tr>

                                    <?php
                                    $count++;
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
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


