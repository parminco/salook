<?php

require('views/admin/layoat.php');

    if (isset($_GET['success'])) {
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
                    <p class="mb-5">افزودن تعرفه جدید  با موفقیت انجام شد</p>
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
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">مدیریت تعرفه ها </h2>
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
                    <div class="widget-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">

                                <thead>
                                <tr>
                                    <th>عنوان</th>
                                    <th>دسته بندی</th>
                                    <th>تعداد تبلیغ</th>
                                    <th>کشورها</th>
                                    <th>قیمت</th>
                                    <th>اعتبار</th>
                                    <th>رنگ</th>
                                    <th style="text-align: center">حذف کردن</th>
                                </tr>

                                </thead>
                                <tbody>
                                <?php
                                $tariffsInfo = $data['tariffsInfo'];
                                foreach ($tariffsInfo as $item) {
                                 ?>

                                    <tr>
                                        <th><?=$item['name']?></th>
                                        <th>
                                            <?php
                                            $category=unserialize($item['category']);
                                            $category=implode(',',$category);
                                            echo $category;
                                            ?>
                                        </th>
                                        <th><?=$item['limit_ads']?></th>
                                        <th>
                                            <?php
                                            $country=unserialize($item['country']);
                                            $country=implode(',',$country);
                                            echo $country;
                                            ?>
                                        </th>
                                        <th><?=$item['price']?></th>
                                        <th><?=$item['credit_time']?>
                                        <span>ماه</span>
                                        </th>
                                        <th>
                                            <span style="background: #<?=$item['background']?>;width: 30px;border-radius: 4px;height: 30px"></span>
                                        </th>
                                        <th class="td-actions" style="text-align: center">
                                            <a href="admintariffs/delete/<?=$item['id']?>"><i class="la la-trash  delete"></i></a>
                                        </th>
                                    </tr>

                                <?php }
                                ?>
                                </tbody>
                            </table>
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


