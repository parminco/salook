<style>
    div.pagination a {
        cursor: pointer;
        margin: 1px;
    }

    .pagination a:hover {
        background: #4DB7FE;
    }

    .pagination .current-page {
        background: #4DB7FE;
    }
</style>
<div id="wrapper">
    <!-- content-->
    <div class="content">

        <div class="clearfix"></div>
        <section class="gray-bg small-padding no-top-padding-sec">
            <div class="container">

                <div class="fl-wrap" style="padding-top: 30px;">
                    <div class="mob-nav-content-btn mncb_half color2-bg show-list-wrap-search ntm fl-wrap"
                         style="border-radius: 4px !important;width: 100%">
                        <i class="fal fa-filter"></i> فیلترها
                    </div>

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-4" style="padding-top: 30px">
                            <?php
                            require 'filter_ads.php';
                            ?>

                        </div>
                        <div class="col-md-8">

                            <!-- listing-item-container -->
                            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                                <?php
                                require 'content_ads.php';
                                ?>
                                <div id="pagination" class="pagination fwmpag">


                                    <div id="pagination_div">
                                        <a>1</a>
                                    </div>

<!--

                                </div>
                                <!-- listing-item-container end -->
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
</div>

<script>

    function pagination(tag, page) {
        var liTag = $(tag);
        $('#pagination_div a').removeClass('current-page');
        liTag.addClass('current-page');
        console.log(liTag);

        search(page);
    }
</script>


