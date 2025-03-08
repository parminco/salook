<?php

require('views/admin/layoat.php');
$personnelInfo=$data['personnelInfo'];


    if (isset($_GET['addPersonnel'])) {
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
                    <p class="mb-5">افزودن همکار موفقیت انجام شد</p>
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
                    <h2 class="page-header-title">مدیریت همکاران ما</h2>
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
                            <h4>همکاران ما</h4>
                            <div style="text-align: left;width: 90%">
                            <a href="adminfooter/addpersonnel" style="color: white" class="btn btn-gradient-04">ایجاد همکار جدید</a>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>کد</th>
                                        <th>تصویر</th>
                                        <th>نام</th>
                                        <th>سمت</th>
                                        <th width="150">توضیحات</th>
                                        <th>شروع همکاری</th>

                                        <th>تنظیمات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count=1;
                                    foreach ($personnelInfo as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><span class="text-primary"><?=$count?></span></td>
                                            <td>
                                                <img style="border-radius: 4px" src="public/images/personnel/<?=$row['id']?>.jpg" alt="تصویر" width="60">
                                            </td>
                                            <td>  <?=$row['name']?> </td>
                                            <td>  <?=$row['side']?> </td>
                                            <td>  <?=$row['description']?> </td>
                                            <td>  <?=$row['date_joine']?> </td>
                                            <td class="td-actions">
                                                <a href="adminfooter/editpersonnel/<?=$row['id']?>"><i class="la la-edit edit"></i></a>
                                                <a href="adminfooter/deletepersonnel/<?=$row['id']?>"><i class="la la-close delete"></i></a>
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


