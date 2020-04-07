@extends('dashboard.layouts.master')
@section('content')

    <style>
        .page-link{
            font-family: BYekan!important;
        }
        #countries {
            width: 100%;
            height: 400px
        }

        #cities {
            width: 100%;
            height: 500px;
        }


        #iranMap {
            height: 600px;
            min-width: 90%;
            max-width: 600px;
            margin: 0 auto;
        }

        .loading {
            margin-top: 10em;
            text-align: center;
            color: gray;
        }

        #isps {
            width: 99%;
            height: 550px;
        }

        tspan {
            font-family: BYekan !important;
        }

        .morris-hover {
            font-family: BYekan !important;

        }
    </style>

<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "> آمار بازدید فروشگاه </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

        @include('dashboard.layouts.errors')

        <div class="row">
            <div class="col-lg-3">
                <div class="card card-eco">
                        <div class="card-body">
                            <h4 class="title-text mt-0">بازدید کل</h4>
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-bold byekan">{{ $stats->count() }}</h3>
                            </div>
                        </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-3">
                <div class="card card-eco">
                        <div class="card-body">
                            <h4 class="title-text mt-0">بازدید کننده کل</h4>
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-bold byekan">{{ $stats->count() }}</h3>
                            </div>
                        </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <!--end col-->
            <div class="col-lg-3">
                <div class="card card-eco">
                    <div class="card-body">
                        <h4 class="title-text mt-0">بازدید امروز</h4>
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-bold byekan">{{ $stats->count() }}</h3>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>

            <div class="col-lg-3">
                <div class="card card-eco">
                    <div class="card-body">
                        <h4 class="title-text mt-0">بازدیدکننده امروز</h4>
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-bold byekan">{{ $stats->count() }}  </h3>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>

        <div id="stat"></div>

        <div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">نمودار <span style="color:#67b7dc">بازدید</span> / <span style="color:#fdd400">بازدیدکنندگان</span> ۳۰ روز اخیر</h4>
                            <p class="text-muted mb-4 font-13">اعداد براساس بازدید ها و بازدیدکننده های وارد شده
                                در فروشگاه شما میباشد.</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="month" style="width: 100%; height: 500px;" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">دستگاه بازدید کنندگان</h4>
                            <p class="text-muted mb-4 font-13">پراکندگی بازدید کنندگان براساس دستگاه</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="platforms" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div  class="card">
                        <div style="height: 615" class="card-body">
                            <h4 class="mt-0 header-title">مرورگر بازدید کنندگان</h4>
                            <p class="text-muted mb-4 font-13">پراکندگی بازدید کنندگان براساس دستگاه</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="browsers" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">موتور های جستجوگر</h4>
                            <p class="text-muted mb-4 font-13">مقدار ورودی بازدید براساس موتور های جستجوگر</p>
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">بربازدید ترین صفحات</h4>
                            <p class="text-muted mb-4 font-13">پراکندگی بازدید براساس مقدار بازدید از هر
                                صفحه/محصول</p>
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>




        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">لیست بازدید ها</h4>
                        <p class="text-muted mb-4 font-13">لیست تمامی بازدید های سایت شما</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="searchBox bg-dark"  style="margin-top: -15px;">
                                        <input type="text" id="myInputTextField" class="searchInput">
                                        <button class="searchButton" href="#">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">

                                        <thead style="text-align: center">
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" >زمان</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">سیستم عامل	</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">مرورگر</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">IP	</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">کشور</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">شهر</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">ISP</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">لینک دهنده</th>
                                        </tr>
                                        </thead>
                                        <tbody style="text-align: center" class="iranyekan">
                                        @foreach($stats as $stat)
                                            <tr>
                                                <td>{{ jdate($stat->updated_at) }}</td>
                                                <td>{{ $stat->osName }}</td>
                                                <td>{{ $stat->browserName }}</td>
                                                <td>{{ $stat->ip }}</td>
                                                <td>{{ $stat->country }}</td>
                                                <td>{{ $stat->city }}</td>
                                                <td>{{ $stat->isp }}</td>
                                                <td>{{ $stat->ref }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
    <!-- Attachment Modal -->
    @endsection
    @section('pageScripts')

        <script src="/dashboard/assets/amcharts/core.js"></script>
        <script src="/dashboard/assets/amcharts/charts.js"></script>
        <script src="/dashboard/assets/amcharts/animated.js"></script>

        <script>
            $(window).resize(function() {
                if ($(window).width() < 1300) {
                    $("body").addClass('enlarge-menu');

                } else {
                    $("body").removeClass('enlarge-menu');

                }
            }).resize();
            $(window).resize(function() {
                if ($(window).width() < 1070) {
                    $(".icon-show").removeClass('d-none');

                } else {
                    $(".icon-show").addClass('d-none');

                }
            }).resize();
            $(document).ready(function(){
                $('#datatable_filter').parent().remove();
                $('#datatable_wrapper').children(':first').find('.col-sm-12').removeClass('col-sm-12 col-md-6');

            });
            $(document).ready(function(){
                $('input#myInputTextField').on("focus", function(){
                    if ($(this).hasClass("searchActive")){
                        $(this).removeClass("searchActive");
                    }
                    else{
                        $('input#myInputTextField').addClass('searchActive');
                    }
                });
            });
            oTable = $('#datatable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said



            am4core.ready(function() {

// Themes begin
                am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
                var chart = am4core.create("month", am4charts.XYChart);

// Export
                chart.exporting.menu = new am4core.ExportMenu();

// Data for both series
                var data = [ {
                    "year": "2009",
                    "income": 23.5,
                    "expenses": 21.1
                }, {
                    "year": "2010",
                    "income": 26.2,
                    "expenses": 30.5
                }, {
                    "year": "2011",
                    "income": 30.1,
                    "expenses": 34.9
                }, {
                    "year": "2012",
                    "income": 29.5,
                    "expenses": 31.1
                }, {
                    "year": "2013",
                    "income": 30.6,
                    "expenses": 28.2,
                    "lineDash": "5,5",
                }, {
                    "year": "2014",
                    "income": 34.1,
                    "expenses": 32.9,
                    "strokeWidth": 1,
                    "columnDash": "5,5",
                    "fillOpacity": 0.2,
                    "additional": "(projection)"
                } ];

                /* Create axes */
                var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "year";
                categoryAxis.renderer.minGridDistance = 30;

                /* Create value axis */
                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                /* Create series */
                var columnSeries = chart.series.push(new am4charts.ColumnSeries());
                columnSeries.name = "Income";
                columnSeries.dataFields.valueY = "income";
                columnSeries.dataFields.categoryX = "year";

                columnSeries.columns.template.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
                columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
                columnSeries.columns.template.propertyFields.stroke = "stroke";
                columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
                columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
                columnSeries.tooltip.label.textAlign = "middle";

                var lineSeries = chart.series.push(new am4charts.LineSeries());
                lineSeries.name = "Expenses";
                lineSeries.dataFields.valueY = "expenses";
                lineSeries.dataFields.categoryX = "year";

                lineSeries.stroke = am4core.color("#fdd400");
                lineSeries.strokeWidth = 3;
                lineSeries.propertyFields.strokeDasharray = "lineDash";
                lineSeries.tooltip.label.textAlign = "middle";

                var bullet = lineSeries.bullets.push(new am4charts.Bullet());
                bullet.fill = am4core.color("#fdd400"); // tooltips grab fill from parent by default
                bullet.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
                var circle = bullet.createChild(am4core.Circle);
                circle.radius = 4;
                circle.fill = am4core.color("#fff");
                circle.strokeWidth = 3;

                chart.data = data;

            }); // end am4core.ready()



        </script>


        @stop
