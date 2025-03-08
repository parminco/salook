<?php

require('views/admin/layoat.php');
$orderInfo = $data['orderInfo'];
?>

<div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="cart-ttitle">جزئیات سفارش :<?= @$orderInfo['order_code'] ?> </h2>
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

                        <div style="overflow-x:auto;">

                            <div class="widget-body">
                                <div class="table-responsive">
                                    <table id="export-table" class="table-hover table mb-0">
                                        <thead>
                                        <tr>
                                            <th>محصول</th>
                                            <th>تخفیف</th>
                                            <th>قیمت</th>
                                        </tr>
                                        </thead>
                                        <?php

                                        $cartInfo = unserialize(@$orderInfo['cart_info']);
                                        if (is_array($cartInfo)) {
                                            foreach ($cartInfo as $row) {
                                                ?>
                                                <tr>
                                                    <td><?= $row['title'] ?></td>
                                                    <td><?= number_format($row['discount']) ?></td>
                                                    <td><?= number_format($row['price']) ?></td>

                                                </tr>
                                            <?php }
                                        }

                                        ?>
                                    </table>
                                </div>
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
