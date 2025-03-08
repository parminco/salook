<?php
require('views/admin/layoat.php');

$orderSata = $data['orderSata'];

$keys=array_keys($orderSata);
$dates=implode("','",$keys);


$values=array_values($orderSata);
$values=implode(',',$values);

 ?>

    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">داشبورد</h2>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-xl-12">
                    <!-- Default -->
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>نمودار فروش</h4>
                    </div>
                    <div class="widget has-shadow">
                       <div style="min-height: 450px">

                           <div id="container"></div>

                       </div>
                    </div>
                    <!-- End Default -->


                </div>
            </div>
            <!-- End Row -->
        </div>

<?php
require('views/admin/layoat_footer.php');
?>


        <script type="text/javascript">
            $(function () {
                $('#container').highcharts({
                    title: {
                        text: 'نمودار آمار فروش در7روز گذشته',
                        x: -20 //center
                    },
                    subtitle: {
                        text: 'وبسایت سالوک',
                        x: -20
                    },
                    xAxis: {
                        categories: ['<?= $dates?>']
                    },
                    yAxis: {
                        title: {
                            text: 'تعداد سفارش'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#f00'
                        }]
                    },
                    tooltip: {
                        valueSuffix: ''
                    },

                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },

                    series: [{
                        name: 'تعداد فروش',
                        data: [<?= $values?>]
                    }]
                });
            });
        </script>
        <script src="public/admin/highcharts/highcharts.js"></script>
        <script src="public/admin/highcharts/exporting.js"></script>