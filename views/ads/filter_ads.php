<link rel="stylesheet" href="public/css/bootstrap.min.css">

<div class=" fl-wrap  lws_mobile  tabs-act block_box">
    <div class="filter-sidebar-header fl-wrap" id="filters-column">

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
                            <select id="type" class="form-control country" name="type">
                                <option value="0">همه تبلیغ ها</option>
                                <option value="1">فروشندگان</option>
                                <option value="2">خریداران</option>
                            </select>
                        </div>

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
                        <button class="header-search-button color-bg" onclick="search();">
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
