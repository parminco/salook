<?php
$active = 'order';
require ('header_profile.php');
?>
<!--  section  end-->
<!--  section  -->
<section class="gray-bg main-dashboard-sec" id="sec1">
    <div class="container">
        <!--  dashboard-menu-->
        <?php require('menu.php'); ?>

        <!-- dashboard-menu  end-->
        <!-- dashboard content-->
        <div class="col-md-9">

            <div class="list-single-main-item fl-wrap block_box" style="min-height: 500px;padding: 20px">

                <h4 class="cart-ttitle" style="font-size: 20px"> لیست خریدهای من </h4>

                <div style="overflow-x:auto;">
                    <table class="order">
                        <tr>
                            <th>شناسه خرید</th>
                            <th>تاریخ خرید</th>
                            <th>قیمت</th>
                            <th>وضعیت</th>
                        </tr>
                        <?php
                        $orders = $data['orders'];
                        foreach ($orders as $order) {
                            ?>
                            <tr>
                                <td>
                                    <a class="orderHover"
                                       href="profile/order/<?= $order['order_code'] ?>"><?= $order['order_code'] ?></a>
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
            <!-- dashboard content end-->
        </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>
</div>
<!--content end-->
</div>

<script src="public/js/dashboard.js"></script>



