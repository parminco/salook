<?php

require('views/admin/layoat.php');
?>

<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">مدیریت منو</h2>
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
                            <h4>مدیریت</h4>

                        </div>

                        <div class="widget-body">
                            <form method="post" action="adminmenu/addmenu/"
                                  class="needs-validation was-validated"
                                  novalidate="" enctype="multipart/form-data">


                                <div class="form-group row d-flex align-items-center mb-5">
                                    <div class="col-xl-10">
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-control-label">عنوان<span class="text-danger ml-2">*</span></label>
                                                <input type="text" class="form-control" name="title">
                                            </div>

                                            <div class="col-xl-12">
                                                <label class="form-control-label">لینک<span class="text-danger ml-2">*</span></label>
                                                <input type="text" class="form-control" name="link">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <button class="btn btn-gradient-04" type="submit">ذخیره</button>
                                    </div>
                                </div>


                            </form>

                            <div class="em-separator separator-dashed"></div>

                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>

                                        <th>عنوان</th>
                                        <th>لینک</th>
                                        <th width="120">حذف</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $menuInfo = $data['menuInfo'];

                                    foreach ($menuInfo as $item) {
                                        ?>
                                        <tr>

                                            <td><?=$item['title']?></td>
                                            <td><?=$item['link']?></td>
                                            <td>
                                                <a href="adminmenu/deletemenu/<?=$item['id']?>"><i class="la la-close delete"></i></a>
                                            </td>


                                        </tr>

                                        <?php } ?>

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


