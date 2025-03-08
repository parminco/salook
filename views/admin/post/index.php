<link rel="stylesheet" href="public/admin/assets/vendors/css/base/bootstrap.min.css">
<link rel="stylesheet" href="public/admin/assets/vendors/css/base/seenboard-1.0.css">
<link rel="stylesheet" href="public/admin/assets/css/datatables/datatables.min.css">
<?php

require('views/admin/layoat.php');

$title = '';
$description = '';
if (isset($_GET['edited'])) {
    $title = 'ویرایش!';
    $description = 'ویرایش با موفقیت انجام شد';
}
if (isset($_GET['success'])) {
    $title = 'موفق!';
    $description = 'ایجاد مقاله جدید با موفقیت انجام شد';
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
                    <h2 class="page-header-title">مدیریت مقاله ها </h2>
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
                            <h4> مقاله ها</h4>
                        </div>
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table id="sorting-table" class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>عنوان</th>
                                        <th>دسته</th>
                                        <th>کشور</th>
                                        <th>تاریخ ثبت</th>
                                        <th>اخرین ویرایش</th>
                                        <th>توضیحات</th>
                                        <th>تنظیمات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $posts=$data['posts'];
                                    foreach ($posts as $post)
                                    {
                                        ?>
                                        <tr>
                                            <td><span class="text-primary"><?=$post['title']?></span></td>
                                            <td><?=$post['categoryTitle']?></td>
                                            <td><?=$post['locationName']?></td>
                                            <td><?=$post['created_at']?></td>
                                            <td>
                                                <?php
                                                if ($post['updated_at']=='')
                                                {
                                                    echo '...';
                                                }
                                                else
                                                {
                                                    echo $post['updated_at'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                        data-target="#modal-centere<?=$post['id']?>" title="توضیحات">
                                                    <i style="margin: 0" class="la la-file-text-o"></i>
                                                </button>

                                                <!-- Begin Centered Modal -->
                                                <div id="modal-centere<?=$post['id']?>" class="modal fade">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> <?=$post['title']?></h4>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span aria-hidden="true">×</span>
                                                                    <span class="sr-only">بستن</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    <?=$post['description']?>
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-shadow"
                                                                        data-dismiss="modal">بستن
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Centered Modal -->
                                            </td>
                                            <td class="td-actions">

                                                <a href="adminpost/editpost/<?=$post['id']?>"><i class="la la-edit edit"></i></a>
                                                <a href="adminpost/deletepost/<?=$post['id']?>"><i class="la la-close delete"></i></a>
                                            </td>
                                        </tr>

                                    <?php }
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


    <!-- Begin Page Vendor Js -->
    <script src="public/admin/assets/vendors/js/datatables/datatables.js"></script>
    <script src="public/admin/assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
    <script src="public/admin/assets/vendors/js/datatables/jszip.min.js"></script>
    <script src="public/admin/assets/vendors/js/datatables/buttons.html5.min.js"></script>
    <script src="public/admin/assets/vendors/js/datatables/pdfmake.min.js"></script>
    <script src="public/admin/assets/vendors/js/datatables/vfs_fonts.js"></script>
    <script src="public/admin/assets/vendors/js/datatables/buttons.print.min.js"></script>
    <script src="public/admin/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
    <script src="public/admin/assets/vendors/js/app/app.min.js"></script>
    <!-- End Page Vendor Js -->
    <!-- Begin Page Snippets -->
    <script src="public/admin/assets/js/components/tables/tables.js"></script>
    <!-- End Page Snippets -->