<?php

$active = 'order';
require ('header_profile.php');
?>
<!--  section  end-->
<!--  section  -->
<section class="gray-bg main-dashboard-sec" id="sec1">
    <div class="container">
        <!--  dashboard-menu-->
        <?php
        require('menu.php');
        $orderInfo = $data['orderInfo'];

        ?>

        <!-- dashboard-menu  end-->
        <!-- dashboard content-->
        <div class="col-md-9">

            <div class="list-single-main-item fl-wrap block_box" style="min-height: 500px;padding: 20px">

                <h4 class="cart-ttitle" style="font-size: 15px">جزئیات سفارش :<?= @$orderInfo['order_code'] ?> </h4>

                <div style="overflow-x:auto;">
                    <table class="order">
                        <tr>
                            <th>محصول</th>
                            <th>تخفیف</th>
                            <th>قیمت</th>
                            <th>لینک دانلود</th>
                        </tr>
                        <?php

                        $cartInfo = unserialize(@$orderInfo['cart_info']);
                        if (is_array($cartInfo)) {
                            foreach ($cartInfo as $row) {
                                ?>
                                <tr>
                                    <td><?= $row['title'] ?></td>
                                    <td><?= number_format($row['discount']) ?></td>
                                    <td><?= number_format($row['price']) ?></td>
                                    <td><a class="downloadFile" href="">کلیک کنید</a></td>
                                </tr>
                            <?php }
                        }

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



