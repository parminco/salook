<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--=============== basic  ===============-->
    <base href="<?= URL ?>">
    <title>فاکتور خرید اشتراک</title>
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
    $tariffsPaid = $data['tariffsPaid'];
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
                            شناسه خرید: <?= $tariffsPaid['order_code'] ?><br>
                            تاریخ : <?= $tariffsPaid['date'] ?>
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
                تعرفه
            </td>
            <td>
                قیمت تعرفه
            </td>
        </tr>

            <tr class="item">
                <td>
                    <?= $tariffsPaid['tariffs_name'] ?>
                </td>
                <td>
                    <?= number_format($tariffsPaid['amount']) ?>
                </td>
            </tr>



        <tr class="total">
            <td></td>
            <td style="padding-top:50px;">
                جمع کل: <?= number_format($tariffsPaid['amount']) ?> تومان
            </td>
        </tr>

        <tr class="total">
            <td class="print-title">
                سپاس از اعتماد شما برای رفتن به پنل کاربری
                <a href="profile" style="text-decoration: none;color: red">کلیک کنید</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<a href="javascript:window.print()" class="print-button">چاپ فاکتور</a>

</body>
</html>