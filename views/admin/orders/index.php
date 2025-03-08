<link rel="stylesheet" href="public/admin/assets/vendors/css/base/bootstrap.min.css">
<link rel="stylesheet" href="public/admin/assets/vendors/css/base/seenboard-1.0.css">
<link rel="stylesheet" href="public/admin/assets/css/datatables/datatables.min.css">
<?php

require('views/admin/layoat.php');
$orders = $data['orders'];
?>

<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">مدیریت سفارشات</h2>
                    <div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Default -->
                <div class="widget has-shadow">
                    <div style="min-height: 450px">
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="export-table">

                                    <thead>
                                    <tr>
                                        <th>شناسه خرید</th>
                                        <th>کاربر</th>
                                        <th>تاریخ خرید</th>
                                        <th>قیمت</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $orders = $data['orders'];
                                    foreach ($orders as $order) {
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="adminorders/orderinfo/<?= $order['order_code'] ?>"
                                                   class="orderHover" title="جزئیات"><?= $order['order_code'] ?></a>
                                            </td>
                                            <td>
                                                <?= $order['email'] ?>
                                            </td>
                                            <td><?= $order['date'] ?></td>
                                            <td><?= number_format($order['amount']) ?></td>
                                            <td>
                                                <?php
                                                if ($order['pay_status'] == 1) {
                                                    echo '<span class="success-span">پرداخت شده</span>';
                                                } else {
                                                    echo '<span class="danger-span">پرداخت نشده</span>';
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
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