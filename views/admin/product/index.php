<?php

require('views/admin/layoat.php');
$productsInfo = $data['productsInfo'];

$title = '';
$description = '';
if (isset($_GET['deleted_at'])) {
    $title = 'حذف!';
    $description = 'حذف با موفقیت انجام شد';
}
if (isset($_GET['updated_at'])) {
    $title = 'ویرایش!';
    $description = 'ویرایش با موفقیت انجام شد';
}


if ($title != '') {
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
                    <h2 class="page-header-title">مدیریت محصولات</h2>
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
                            <h4>محصولات</h4>
                        </div>

                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>کد</th>
                                        <th>تصویر</th>
                                        <th>عنوان</th>
                                        <th>قیمت</th>
                                        <th>درصد تخفیف</th>
                                        <th>توضیحات</th>
                                        <th>دسته بندی</th>
                                        <th>نوع فایل</th>
                                        <th>تاریخ ثبت</th>
                                        <th width="110">تنظیمات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($productsInfo as $product) {
                                        ?>
                                        <tr>
                                            <td><span class="text-primary"><?= $count ?></span></td>
                                            <td>
                                                <img style="border-radius: 4px"
                                                     src="public/images/product/<?= $product['id'] ?>/small.jpg"
                                                     width="60" alt="تصویر">
                                            </td>
                                            <td><?= $product['title'] ?></td>
                                            <td><?= $product['price'] ?></td>
                                            <td><?= $product['discount'] ?></td>
                                            <td><?= $product['introduction'] ?></td>
                                            <td><?= $product['categoryTitle'] ?></td>
                                            <td><?= $product['type'] ?></td>
                                            <td><?= $product['created_at'] ?></td>
                                            <td class="td-actions">
                                                <div class="btn-group mr-1 mb-2" style="width: 120px;height: 40px">
                                                    <button type="button" class="btn btn-primary">عملیات</button>
                                                    <a class="btn btn-primary dropdown-toggle d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 0">
                                                        <i class="la la-angle-down mr-0"></i>
                                                    </a>
                                                    <div class="dropdown-menu" x-placement="bottom-start">
                                                        <a class="dropdown-item" href="adminproduct/addproductgallery/<?=$product['id']?>">گالری</a>
                                                        <a class="dropdown-item" href="adminproduct/addproductdescription/<?=$product['id']?>">توضیحات</a>
                                                        <a class="dropdown-item" href="adminproduct/addproductfile/<?=$product['id']?>">فایل</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="adminproduct/editproduct/<?=$product['id']?>">ویرایش</a>
                                                        <a class="dropdown-item" href="adminproduct/deleteproduct/<?=$product['id']?>"">حذف</a>
                                                    </div>
                                                </div>
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


