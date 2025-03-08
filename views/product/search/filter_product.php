<link rel="stylesheet" href="public/css/bootstrap.min.css">
<div class="box-widget-item fl-wrap block_box">
    <div class="box-widget-item-header">
        <h3>جستجوی محصولات</h3>
    </div>
    <div class="box-widget fl-wrap">
        <div class="box-widget-content">
            <div class="search-widget">
                <div class="fl-wrap">
                    <input id="searchProductTitle" type="text" class="search" placeholder="جستجو ..."
                           value="">
                    <a class="search-submit color2-bg" onclick="searchProductTitle();"><i class="fal fa-search"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box-widget-item fl-wrap block_box">
    <div class="box-widget-item-header">
        <h3>دسته بندی محصولات</h3>
    </div>

    <div class="box-widget fl-wrap">
        <div class="box-widget-content">
            <ul class="cat-item no-list-style">
                <li class="cursor">
                    <?php
                    $categorySelect = $data['categorySelect'];
                    ?>
                    <a id="category0" onclick="addAtive('#category0');" data-categoryId="0"
                       class="categoryTag <?php if ($categorySelect == 0) echo "active-li-category"; ?>">
                        همه دسته ها
                    </a>
                    <span><i class="fal fa-list-alt"></i></span>
                </li>
                <?php
                $categoryInfo = $data['categoryInfo'];
                foreach ($categoryInfo as $row) {
                    $categoryTag = "category" . $row['id'];
                    $categoryId = '#category' . $row['id'];

                    ?>
                    <li class="cursor">
                        <a id="<?= $categoryTag ?>" onclick="addAtive('<?= $categoryId ?>');"
                           data-categoryId=" <?= $row['id'] ?>"
                           class="categoryTag <?php if ($categorySelect == $row['id']) echo "active-li-category"; ?>">
                            <?= $row['title'] ?>
                        </a>
                        <span><i class="fal fa-list-alt"></i></span>
                    </li>
                <?php }
                ?>

            </ul>

        </div>

    </div>

</div>

<!--<ul class="no-list-style">-->
<!---->
<!--    <li>-->
<!--        <input id="descORasc" type="checkbox" name="check" checked="">-->
<!--        <label for="check-d3">صعودی</label>-->
<!--    </li>-->
<!---->
<!--</ul>-->
<script>
    function addAtive(idCategory) {
        // alert(idCategory);
        $('.categoryTag').removeClass('active-li-category');
        $(idCategory).addClass("active-li-category");
        search();
    }


    function searchProductTitle() {
        var checkMsgVal = '0';
        var content_product = $('.content_product');
        var productTitle = $('#searchProductTitle').val();
        var url = 'product/searchtitle/';
        var data = {
            'productTitle': productTitle
        };
        // console.log(data);
        $.post(url, data, function (msg) {
            content_product.html('');
            // console.log(msg[0]);
            $.each(msg, function (index, val) {
                checkMsgVal = '1';
                // console.log(msg);
                var item = '<div class="shop-item"><div class="shop-item-media"><a href="product/showProduct/' + val['id'] + '"><img alt="product" src="public/images/product/' + val['id'] + '/large.jpg"></a></div><div class="shop-item_title"><h4><a href="product/showProduct/' + val['id'] + '">' + val['title'] + '</a></h4><span class="shop-item_price">' + val['price'] + ' تومان</span><a href="product/showProduct/' + val['id'] + '" class="shop-item_link color-bg">جزئیات</a></div></div>';
                content_product.append(item);
            });

        }, 'json');
        // if (checkMsgVal == '0') {
        //     alert('هیچ محصولی یافت نشد');
        //     content_product.html('<p>هیچ محصولی یافت نشد</p>');
        // }
    }
</script>

