<section class="gray-bg hidden-section particles-wrapper" style="padding-top: 10px;padding-bottom: 25px">
    <div class="container">
        <div class="section-title">
            <h2>دسته بندی محصولات</h2>
            <div class="section-subtitle"></div>
            <span class="section-separator"></span>
            <p>با انتخاب یکی از دسته بندی ها راحت تر به محصول مورد نظر خود برسید </p>
        </div>
        <div id="categoryDiv" class="listing-item-grid_container fl-wrap"
             style="height: 560px; overflow: hidden">
            <div class="row">
                <!--  listing-item-grid  -->
                <?php
                $category = $data['category'];
                foreach ($category as $item) {
                    ?>
                <a href="product/index/<?= $item['id'] ?>">
                    <div class="col-sm-4">
                        <div class="listing-item-grid">

                            <div class="bg" data-bg="public/images/category/<?= $item['id'] ?>.jpg"></div>

                            <div class="d-gr-sec"></div>
                            <div class="listing-counter color2-bg"><span>250</span>محصول</div>
                            <div class="listing-item-grid_title">
                                <h3><a href="product/index/<?= $item['id'] ?>"><?= $item['title'] ?></a></h3>
                                <!--                                    <p>این مکان مربوط به توضیحات دسته بندی می باشد</p>-->
                            </div>
                        </div>
                    </div>
                </a>
                    <?php
                }
                ?>
            </div>
        </div>
        <a id="moreCategory" onclick="allCategory()" class="btn dec_btn color2-bg">مشاهده همه دسته ها<i
                class="fal fa-arrow-alt-down"></i></a>
    </div>
</section>