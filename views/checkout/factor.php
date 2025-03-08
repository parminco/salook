<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--=============== basic  ===============-->
    <base href="<?= URL ?>">
    <title>فاکتور خرید</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="public/css/invoice.css">
    <!--=============== favicons ===============-->
</head>
<body>
<div class="invoice-box">
    <?php
    $productPaid = $data['productPaid'];
    ?>
    <table>
        <tbody>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tbody>
                    <tr>
                        <td class="title">
                            <img src="public/images/logo2.png" style="width:150px; height:auto" alt="">
                        </td>
                        <td>
                            سایت سالوک<br>
                            شناسه خرید: <?= $productPaid['order_code'] ?><br>
                            تاریخ : <?= $productPaid['date'] ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr class="heading">
            <td>
                روش پرداخت
            </td>
            <td>
                درگاه اینترنتی
            </td>
        </tr>
        <tr class="details">
            <td>
                پرداخت اینترنتی
            </td>
            <td>
                زرین پال
            </td>
        </tr>
        <tr class="heading">
            <td>
                محصول
            </td>
            <td>
                قیمت تک محصول
            </td>
        </tr>

        <?php
        $cart_info = unserialize($productPaid['cart_info']);
        foreach ($cart_info as $row) {
            ?>
            <tr class="item">
                <td>
                    <?= $row['title'] ?>
                </td>
                <td>
                    <?= number_format($row['price']) ?>
                </td>
            </tr>

        <?php }
        ?>

        <tr class="total">
            <td></td>
            <td style="padding-top:50px;">
                جمع کل: <?= number_format($productPaid['amount']) ?> تومان
            </td>
        </tr>

        <tr class="total">
            <td class="print-title">
                سپاس از اعتماد شما برای دانلود فایل ها
                <a href="profile/order/ <?= $productPaid['order_code'] ?>" style="text-decoration: none;color: red">کلیک کنید</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<a href="javascript:window.print()" class="print-button">چاپ فاکتور</a>

</body>
</html>