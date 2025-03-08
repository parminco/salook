<?php

require('views/admin/layoat.php');
$categoryInfo=$data['categoryInfo'];
?>

<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">مدیریت دسته بندی ها </h2>
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
                            <h4>دسته بندی</h4>
                        </div>

                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>کد</th>
                                        <th>تصویر</th>
                                        <th>عنوان</th>

                                        <th>تنظیمات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count=1;
                                    foreach ($categoryInfo as $row)
                                    {
                                    ?>
                                        <tr>
                                            <td><span class="text-primary"><?=$count?></span></td>
                                            <td>
                                                <img style="border-radius: 4px" src="public/images/category/<?=$row['id']?>.jpg" alt="تصویر" width="100">
                                            </td>
                                            <td>  <?=$row['title']?> </td>
                                            <td class="td-actions">
                                                <a href="admincategory/editcategory/<?=$row['id']?>"><i class="la la-edit edit"></i></a>
                                                <a href="admincategory/deletecategory/<?=$row['id']?>"><i class="la la-close delete"></i></a>
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


