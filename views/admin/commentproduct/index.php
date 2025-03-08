<?php

require('views/admin/layoat.php');
$commentProduct = $data['commentProduct'];
?>

<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">مدیریت نظرات</h2>
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
                            <h4>نظرات</h4>
                        </div>

                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>کد</th>
                                        <th>کاربر</th>
                                        <th>نظر</th>
                                        <th>تاریخ ثبت</th>
                                        <th>وضعیت</th>

                                        <th width="110">تنظیمات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count=1;
                                    foreach ($commentProduct as $comment)
                                    {
                                        ?>
                                        <tr>
                                            <td><span class="text-primary"><?=$count?></span></td>

                                            <td><?=$comment['email']?></td>
                                            <td><?=$comment['comment']?></td>
                                            <td><?=$comment['created_at']?></td>
                                            <td>
                                                <?php
                                                if ($comment['status'] == 1) {
                                                    echo '<span class="success-span">تایید شده</span>';
                                                } else {
                                                    echo '<span class="danger-span">تایید نشده</span>';
                                                } ?>
                                            </td>

                                            <td class="td-actions">
                                                <a href="admincommentproduct/verificationcomment/<?=$comment['id']?>" title="تایید">
                                                    <i class="la la-check edit"></i>
                                                </a>
                                                <a href="admincommentproduct/deletecomment/<?=$comment['id']?>">
                                                    <i class="la la-close delete"></i>
                                                </a>
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



