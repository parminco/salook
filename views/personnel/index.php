<section>
    <div class="container big-container">
        <div class="section-title">
            <h2><span>صفحه همکاران ما</span></h2>
            <span style="margin-bottom:60px" class="section-separator"></span>

            <div class="grid-item-holder gallery-items fl-wrap" style="position: relative; height: 950px;">
                <!--  gallery-item-->
                <?php
                $personnel=$data['personnel'];
                foreach ($personnel as $row)
                {
                    ?>
                    <div class="gallery-item restaurant events">
                        <!-- listing-item  -->
                        <div class="listing-item">
                            <article class="geodir-category-listing fl-wrap">
                                <div class="geodir-category-img">
                                    <a class="geodir-category-img-wrap fl-wrap">
                                        <img src="public/images/personnel/<?=$row['id']?>.jpg">
                                    </a>
                                </div>
                                <div class="geodir-category-content fl-wrap title-sin_item">
                                    <div class="geodir-category-content-title fl-wrap">
                                        <div class="geodir-category-content-title-item">
                                            <h3 class="title-sin_map">
                                                <a><?=$row['name']?></a>
                                                <span class="verified-badge"><i class="fal fa-check"></i></span>
                                            </h3>
                                            <div class="geodir-category-location fl-wrap">
                                                <a><i class="fas fa-user "></i>سمت:<?=$row['side']?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="geodir-category-text fl-wrap">
                                        <p class="small-text">
                                            <?=$row['description']?>
                                        </p>

                                    </div>

                                    <div style="border-top: 1px solid #eeeeee;padding: 10px"
                                         class="geodir-category-text fl-wrap">
                                        <div class="geodir-category-location fl-wrap">
                                            <a><i class="fas fa-clock"></i>شروع همکاری:<?=$row['date_joine']?></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- listing-item end -->
                    </div>
               <?php }
                ?>


            </div>

        </div>
    </div>

</section>





