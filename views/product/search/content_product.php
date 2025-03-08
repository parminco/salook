<body <?php if ($data['categorySelect'] == 0) {
    echo 'onload="search();"';
} ?> >

<div class="list-main-wrap-header fl-wrap block_box no-vis-shadow" style="margin-bottom: 20px">
    <div class="list-main-wrap-title">
        <h2> جستجوی : <span>محصولات</span></h2>
    </div>
    <div class="list-main-wrap-opt">
        <div class="price-opt">
            <span class="price-opt-title">تعداد نمایش:</span>
            <div class="listsearch-input-item">
                <select id="limit" class="chosen-select no-search-select" onchange="search();">
                    <option value="1">یک</option>
                    <option value="2">دو</option>
                    <option value="5">پنج</option>
                    <option value="10" selected="selected">ده</option>
                    <option value="15">پانزده</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="content_product">
    <?php

    $productsSearchTitle = @$data['productsSearchTitle'];
    $productInfo = $data['productsInfo'];



    foreach ($productInfo as $row) {
        ?>

        <div class="shop-item">
            <div class="shop-item-media"><a href="product/showProduct/<?= $row['id'] ?>">
                    <img alt="product" src="public/images/product/<?= $row['id'] ?>/large.jpg"></a>
            </div>
            <div class="shop-item_title">
                <h4><a href=product/showProduct/<?= $row['id'] ?>"><?= $row['title'] ?></a></h4>
                <span class="shop-item_price"><?= number_format($row['price']) ?> تومان</span>
                <a href=product/showProduct/<?= $row['id'] ?>" class="shop-item_link color-bg">جزئیات</a></div>
        </div>


    <?php }
    ?>
</div>
</body>
<script>


    var current_Page = 1;

    var checkMsgNull = '';


    function search(page) {

        if (typeof (page) != 'undefined') {
            current_Page = page;
        } else {
            current_Page = 1
        }
        if (current_Page < 1) {
            current_Page = 1;
        }
        var last_page = '';
        last_page = $('#pagination_div a:last').text();
        if (current_Page > last_page) {
            current_Page = last_page;
        }

        // var category = $('#category option:selected').val();
        var category = $('a.active-li-category').attr('data-categoryId');
        // alert(category);
        var limit = $('#limit option:selected').val();
        // var asc = document.getElementById("descORasc").checked;
        var asc = 'false';
        var content_product = $('.content_product');

        var url = 'product/search/';
        var data = {
            'asc': asc,
            'category': category,
            'current_page': current_Page,
            'limit': limit
        };

        // console.log(data);
        $.post(url, data, function (msg) {

            checkMsgNull = msg[0];
            content_product.html('');
            // console.log(msg[0]);
            $.each(msg[0], function (index, val) {

                var item = '<div class="shop-item"><div class="shop-item-media"><a href="product/showProduct/' + val['id'] + '"><img alt="product" src="public/images/product/' + val['id'] + '/large.jpg"></a></div><div class="shop-item_title"><h4><a href="product/showProduct/' + val['id'] + '">' + val['title'] + '</a></h4><span class="shop-item_price">' + val['price'] + ' تومان</span><a href="product/showProduct/' + val['id'] + '" class="shop-item_link color-bg">جزئیات</a></div></div>';
                content_product.append(item);
            });
            // console.log(msg[1]);
            var page_number = msg[1];
            var i = '';
            var active = '';
            $('#pagination_div').html('');

            var start = current_Page - 1;
            if (start < 1) {
                start = 1;
            }
            var end = current_Page + 2;
            if (end > page_number) {
                end = page_number;
            }

            for (i = start; i <= end; i++) {
                if (i === current_Page) {
                    active = 'current-page';
                } else {
                    active = '';
                }
                $('#pagination_div').append('<a onclick="pagination(this,' + i + ');" class="' + active + '">' + i + '</a>');
            }
        }, 'json');
        // console.log(checkMsgNull);
        if (checkMsgNull == '') {
            $('#pagination_div').append('<a onclick="pagination(this,1);" class="current-page">1</a>');
            content_product.html('<p>هیچ محصولی یافت نشد</p>');

        }
    }


</script>