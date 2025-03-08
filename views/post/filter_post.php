<link rel="stylesheet" href="public/css/bootstrap.min.css">

<div class=" fl-wrap  lws_mobile  tabs-act block_box">
    <div class="filter-sidebar-header fl-wrap" id="filters-column">
        <ul class="tabs-menu fl-wrap no-list-style">
            <li class="current"><a href="#filters-search"> <i class="fal fa-sliders-h"></i> فیلترها </a></li>
            <li><a href="#category-search"> <i class="fal fa-image"></i>دسته بندی ها </a></li>
        </ul>
    </div>
    <div class="scrl-content filter-sidebar    fs-viscon">
        <!--tabs -->
        <div class="tabs-container fl-wrap">
            <!--tab -->
            <div class="tab">
                <div id="filters-search" class="tab-content  first-tab ">

                    <!-- listsearch-input-item-->
                    <div class="listsearch-input-item" style="z-index: 346">
                        <div class="listsearch-input-item " style="z-index: 344">
                            <select id="category" class="form-control category" name="category">
                                <?php
                                $category = $data['category'];
                                $category=array_filter($category);
                                if (is_array($category)) {
                                    foreach ($category as $item) {

                                ?>
                                <option value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
                                <?php
                                }
                                }
                                ?>
                            </select>
                        </div>

                    <!-- listsearch-input-item end-->
                    <!-- listsearch-input-item-->
                    <div class="listsearch-input-item" style="z-index: 345">
<!--                            <select name="country" id="country" class="form-control" onchange="selectList('country');">-->
                            <select name="country" id="country" class="form-control">
                                <?php
                                $country = $data['country'];

                                $country=array_filter($country);
                                if (is_array($country)) {
                                foreach ($country as $item) {
                                    ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                    <?php
                                }
                                }
                                ?>
                            </select>
                    </div>
                    <!-- listsearch-input-item end-->

                    </div>
                    <!-- listsearch-input-item end-->

                    <!-- listsearch-input-item-->
                    <div class="listsearch-input-item clact">
                        <div class=" fl-wrap filter-tags">
                            <ul class="no-list-style">

                                <li>
                                    <input id="descORasc" type="checkbox" name="check" checked="">
                                    <label for="check-d3">صعودی</label>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- listsearch-input-item end-->
                    <!-- listsearch-input-item-->
                    <div class="listsearch-input-item">
                        <button class="header-search-button color-bg" onclick="search(1);">
                            <i class="far fa-search"></i><span>جستجو</span></button>
                    </div>
                    <!-- listsearch-input-item end-->
                    <div class="clear-filter-btn"><i class="far fa-redo"></i> تنظیم مجدد</div>
                </div>
            </div>
            <!--tab end-->

            <!--tab -->
            <!--tab end-->
        </div>
        <!--tabs end-->
    </div>
</div>
<a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="#filters-column">بازگشت به فیلترها <i
            class="fas fa-caret-up"></i></a>


<!--<script>-->
<!--    function selectList($tag) {-->
<!---->
<!--        if ($tag === 'country') {-->
<!--            var location_ID = $('#country option:selected').val();-->
<!--        }-->
<!--        if (location_ID==0)-->
<!--        {-->
<!--            $('.country').html('<option value="0">همه کشور ها</option>');-->
<!--        }-->
<!--        var url = 'post/getlocation/'+location_ID;-->
<!--        var data = {};-->
<!--        $.post(url, data, function (msg) {-->
<!--            // console.log(msg);-->
<!--            $('.country').html('<option value="0">همه کشور ها</option>');-->
<!--            $.each(msg, function (index, val) {-->
<!--               var optionTag='<option value="'+val['id']+'">'+val['name']+'</option>';-->
<!--                $('.country').append(optionTag);-->
<!--            });-->
<!---->
<!--        },'json');-->
<!---->
<!---->
<!--    }-->
<!--</script>-->