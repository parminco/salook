<div class="box-widget-item fl-wrap block_box">
    <div class="box-widget-item-header">
        <h3>محصولات مشابه</h3>
    </div>
    <div class="box-widget fl-wrap">
        <div class="box-widget-content">
            <ul class="cart-modal-list no-list-style fl-wrap">
                <?php
                $ProductSimilar = $data['ProductSimilar'];
                if (sizeof($ProductSimilar)!=0){
                foreach ($ProductSimilar as $row) {
                    ?>
                    <li style="background: #f7f7f7">
                        <a class="cart-modal-image" href="product/showProduct/<?=$row['id']?>">
                            <img src="public/images/product/<?=$row['id']?>/small.jpg" alt="">
                        </a>
                        <div class="cart-modal-det">
                            <a href="product/showProduct/<?=$row['id']?>"><?=$row['title']?></a>
                            <div class="quantity"><span class="woocommerce-Price-amount"><?=number_format($row['price'])?> تومان</span></div>
                        </div>
                    </li>
                <?php }}
                else{
                    echo 'محصول مشابه ای یافت نشد';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
