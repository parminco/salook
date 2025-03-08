<style>
    .black_ads {
        color: black !important;
        font-weight: normal !important;
    }

    a.black_ads:hover {
        color: #4DB7FE !important;
    }
</style>
<section class="gray-bg hidden-section particles-wrapper" style="padding-bottom: 10px;padding-top: 0px">
    <div class="container">
        <div class="section-title" style="padding: 0">
            <div class="section-subtitle"></div>
            <h2>اخرین تبلیغات ها</h2>
            <span class="section-separator"></span>
        </div>
        <div id="categoryDiv" class="listing-item-grid_container fl-wrap">
            <div class="row">
                <?php
                $ads = $data['ads'];

                //forooshandegan
                $seller = $ads['seller'];

                //end
                //kharidaran
                $buyer = $ads['buyer'];

                //end
                ?>
                <div class="col-md-6">
                    <div class="footer-widget fl-wrap">
                        <h3 class="black_ads">فروشندگان</h3>
                        <div class="col-md-12 right-ads-index">
                            <div class="footer-widget-posts fl-wrap">
                                <ul class="no-list-style">
                                    <table class="order">
                                        <tbody>
                                        <?php
                                        foreach ($seller as $item) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <a style="color: black" class="orderHover" href="ads/ads_info/<?=$item['id']?>"><?=$item['title']?></a>
                                                        <p style="font-size: 8pt;float: left;color:#566985;margin-top: 3px"><?=$item['created_at']?></p>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
                                        </tbody>
                                    </table>
                                    <a href="ads" class="footer-link shop-item_link color-bg" >همه تبلیغ ها <i class="fal fa-long-arrow-left" style="color: white"></i></a>

                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="footer-widget fl-wrap">
                        <h3 class="black_ads">خریداران </h3>
                        <div class="col-md-12 right-ads-index">
                            <div class="footer-widget-posts fl-wrap">
                                <ul class="no-list-style">
                                    <table class="order">
                                        <tbody>
                                    <?php
                                    foreach ($buyer as $item) {
                                        ?>
                                        <tr>
                                            <td>
                                                <div>
                                                    <a style="color: black" class="orderHover" href="ads/ads_info/<?=$item['id']?>"><?=$item['title']?></a>
                                                    <p style="font-size: 8pt;float: left;color:#566985;margin-top: 3px"><?=$item['created_at']?></p>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php }
                                    ?>
                                        </tbody>
                                    </table>
                                    <a href="ads" class="footer-link shop-item_link color-bg" >همه تبلیغ ها <i class="fal fa-long-arrow-left" style="color: white"></i></a>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>