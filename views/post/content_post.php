<body onload="search();">

<div class="list-main-wrap-header fl-wrap block_box no-vis-shadow" style="margin-bottom: 20px">
    <div class="list-main-wrap-title">
        <h2> جستجوی : <span>مقاله ها </span></h2>
    </div>
    <div class="list-main-wrap-opt">
        <div class="price-opt">
            <span class="price-opt-title">تعداد نمایش:</span>
            <div class="listsearch-input-item">
                <select id="limit" class="chosen-select no-search-select" onchange="search();">
                    <option value="1">یک</option>
                    <option value="2">دو</option>
                    <option value="5">پنج</option>
                    <option value="10">ده</option>
                    <option value="15">پانزده</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="content_post">

</div>
</body>
<script>



        var current_Page = 1;

        function search() {


            var category_ID = $('#category option:selected').val();
            var country_ID = $('#country option:selected').val();
            var limit = $('#limit option:selected').val();
            var asc = document.getElementById("descORasc").checked;
            var content_post = $('.content_post');

            var url = 'post/search/';
            var data = {
                'category': category_ID,
                'country': country_ID,
                'asc': asc,
                'current_page': current_Page,
                'limit': limit
            };
            $.post(url, data, function (msg) {

                content_post.html('');
                // console.log(msg[0]);
                $.each(msg[0], function (index, val) {
                    var item = '<div class="list-single-main-item fl-wrap block_box"><div class="header-post"><div class="right"><h3 class="title">' + val['title'] + '</h3></div><div class="left"><span>تاریخ :' + val['created_at'] + '</span></div><div class="bordered"></div></div><div class="list-single-main-item_content fl-wrap"><p>' + val['description'] + '</p></div><div class="header-post"><div class="bordered"></div><div class="right"><span>دسته:' + val['nameCategory'] + '</span></div><div class="left"><span>منطقه: ' + val['continentLocation'] + '/' + val['countryLocation'] + '</span></div></div></div>';

                    content_post.append(item);
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
            },'json');

        }
</script>