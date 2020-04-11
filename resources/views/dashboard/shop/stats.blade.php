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
        #devices {
            width: 100%;
            height: 500px;
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
                            <h4 class="title-text mt-0">بازدید امروز</h4>
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-bold byekan">{{ $todayVisits }}</h3>
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
                            <h4 class="title-text mt-0">بازدید کننده امروز</h4>
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-bold byekan">{{ $todayVisitors }}</h3>
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
                        <h4 class="title-text mt-0">بازدید دیروز</h4>
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-bold byekan">{{ $yesterDayVisits }}</h3>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>

            <div class="col-lg-3">
                <div class="card card-eco">
                    <div class="card-body">
                        <h4 class="title-text mt-0">بازدیدکننده دیروز</h4>
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-bold byekan">{{ $yesterDayVisitors }}  </h3>
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
                            <h4 class="mt-0 header-title">نمودار <span>بازدید</span> هفته اخیر اخیر</h4>
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

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">دستگاه بازدید کنندگان</h4>
                            <p class="text-muted mb-4 font-13">پراکندگی بازدید کنندگان براساس دستگاه</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="devices" style="width: 100%; height: 500px; direction: ltr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
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

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">موتور های جستجوگر</h4>
                            <p class="text-muted mb-4 font-13">مقدار ورودی بازدید براساس موتور های جستجوگر</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="searchEngines" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">بربازدید ترین صفحات</h4>
                            <p class="text-muted mb-4 font-13">پراکندگی بازدید براساس مقدار بازدید از هر
                                صفحه/محصول</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">

                                        <table id="ViewTable" class="table table-bordered dt-responsive dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">

                                            <thead style="text-align: center">
                                            <tr role="row">
                                                <th  tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"  >صفحه/محصول</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">تعداد بازدید	</th>
                                            </tr>
                                            </thead>
                                            <tbody style="text-align: center" class="iranyekan">
                                            @foreach($pages as $page)
                                                <tr>
                                                    <td><a target="_blank" href="{{ url($page->page) }}">{{ $page->page }}</a></td>
                                                    <td>{{ $page->total }}</td>
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
        </div>




        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">لیست بازدید ها</h4>
                        <p class="text-muted mb-4 font-13">لیست تمامی بازدید های سایت شما</p>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="table-responsive">

                                    <table id="lastTable" class="table table-bordered dt-responsive dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">

                                        <thead style="text-align: center">
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="  ascending" >زمان</th>
                                            <th>سیستم عامل	</th>
                                            <th>مرورگر</th>
                                            <th>IP</th>
                                            <th>کشور</th>
                                            <th>شهر</th>
                                            <th>ISP</th>
                                            <th>دستگاه</th>
                                            <th>صفحه</th>
                                            <th>لینک دهنده</th>
                                        </tr>
                                        </thead>
                                        <tbody style="text-align: center" class="iranyekan">
                                        @foreach($stats as $stat)
                                            <tr>
                                                <td style="direction: ltr; font-family: BYekan">{{ jdate($stat->updated_at) }}</td>
                                                <td>{{ $stat->osName }}</td>
                                                <td>{{ $stat->browserName }}</td>
                                                <td>{{ $stat->ip }}</td>
                                                <td>{{ $stat->country }}</td>
                                                <td>{{ $stat->city }}</td>
                                                <td>{{ $stat->isp }}</td>
                                                <td>{{ $stat->device }}</td>
                                                <td><a href="{{ url($stat->page) }}">{{ $stat->page }}</a></td>
                                                <td><a href="{{ url($stat->ref) }}">{{ $stat->ref }}</a></td>
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
                chart.rtl = true;
                chart.scrollbarX = new am4core.Scrollbar();


// Add data
                chart.data = [
                    @foreach($monthlyVisits as $monthlyVisit)
                    {
                        "country": "{{ $monthlyVisit->day }}",
                        "visits": {{ $monthlyVisit->total }}
                    },
                    @endforeach
                    ];

// Create axes
                var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "country";
                categoryAxis.renderer.grid.template.location = 0;
                categoryAxis.renderer.minGridDistance = 30;
                categoryAxis.renderer.labels.template.horizontalCenter = "right";
                categoryAxis.renderer.labels.template.verticalCenter = "middle";
                categoryAxis.renderer.labels.template.rotation = 270;
                categoryAxis.tooltip.disabled = true;
                categoryAxis.renderer.minHeight = 110;

                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.renderer.minWidth = 50;

// Create series
                var series = chart.series.push(new am4charts.ColumnSeries());
                series.sequencedInterpolation = true;
                series.dataFields.valueY = "visits";
                series.dataFields.categoryX = "country";
                series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
                series.columns.template.strokeWidth = 0;

                series.tooltip.pointerOrientation = "vertical";

                series.columns.template.column.cornerRadiusTopLeft = 10;
                series.columns.template.column.cornerRadiusTopRight = 10;
                series.columns.template.column.fillOpacity = 0.8;

// on hover, make corner radiuses bigger
                var hoverState = series.columns.template.column.states.create("hover");
                hoverState.properties.cornerRadiusTopLeft = 0;
                hoverState.properties.cornerRadiusTopRight = 0;
                hoverState.properties.fillOpacity = 1;

                series.columns.template.adapter.add("fill", function(fill, target) {
                    return chart.colors.getIndex(target.dataItem.index);
                });

// Cursor
                chart.cursor = new am4charts.XYCursor();

            }); // end am4core.ready()






            am4core.ready(function() {

// Themes begin
                am4core.useTheme(am4themes_animated);
// Themes end

                var chart = am4core.create("devices", am4charts.PieChart);
                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                chart.data = [
                        @foreach($devices as $device)
                    {
                        "country": "{{ $device->device }}",
                        "value": {{ $device->total }}
                    },
                    @endforeach
                ];


                chart.radius = am4core.percent(70);
                chart.innerRadius = am4core.percent(40);
                chart.startAngle = 180;
                chart.endAngle = 360;

                var series = chart.series.push(new am4charts.PieSeries());
                series.dataFields.value = "value";
                series.dataFields.category = "country";

                series.slices.template.cornerRadius = 10;
                series.slices.template.innerCornerRadius = 7;
                series.slices.template.draggable = true;
                series.slices.template.inert = true;
                series.alignLabels = false;

                series.hiddenState.properties.startAngle = 90;
                series.hiddenState.properties.endAngle = 90;

                chart.legend = new am4charts.Legend();

            }); // end am4core.ready()





            am4core.ready(function() {

// Themes begin
                am4core.useTheme(am4themes_animated);
// Themes end

                var chart = am4core.create("browsers", am4charts.PieChart);
                chart.rtl = true;
                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                chart.data = [
                        @foreach($browsers as $browser)
                    {
                        "country": "{{ $browser->browserName }}",
                        "value": {{ $browser->total }}
                    },
                    @endforeach
                ];


                chart.radius = am4core.percent(70);
                chart.innerRadius = am4core.percent(40);
                chart.startAngle = 180;
                chart.endAngle = 360;

                var series = chart.series.push(new am4charts.PieSeries());
                series.dataFields.value = "value";
                series.dataFields.category = "country";

                series.slices.template.cornerRadius = 10;
                series.slices.template.innerCornerRadius = 7;
                series.slices.template.draggable = true;
                series.slices.template.inert = true;
                series.alignLabels = false;

                series.hiddenState.properties.startAngle = 90;
                series.hiddenState.properties.endAngle = 90;

                chart.legend = new am4charts.Legend();

            }); // end am4core.ready()







            am4core.ready(function() {

// Themes begin
                am4core.useTheme(am4themes_animated);
// Themes end

                var chart = am4core.create("searchEngines", am4charts.PieChart);
                chart.rtl = true;
                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                chart.data = [
                        @foreach($searchEngines as $searchEngine)
                    {
                        "country": "{{ $searchEngine->searchEngine == 'Nothing' ? 'مستقیم' : $searchEngine->searchEngine}}",
                        "value": {{ $searchEngine->total }}
                    },
                    @endforeach
                ];


                chart.radius = am4core.percent(70);
                chart.innerRadius = am4core.percent(40);
                chart.startAngle = 180;
                chart.endAngle = 360;

                var series = chart.series.push(new am4charts.PieSeries());
                series.dataFields.value = "value";
                series.dataFields.category = "country";

                series.slices.template.cornerRadius = 10;
                series.slices.template.innerCornerRadius = 7;
                series.slices.template.draggable = true;
                series.slices.template.inert = true;
                series.alignLabels = false;

                series.hiddenState.properties.startAngle = 90;
                series.hiddenState.properties.endAngle = 90;

                chart.legend = new am4charts.Legend();

            }); // end am4core.ready()





            $(document).ready(function() {
                $("#datatable").DataTable(), $(document).ready(function() {

                    $("#lastTable").DataTable({
                        "order": [[ 0, "desc" ]]
                    });


                    $("#ViewTable").DataTable({
                        "order": [[ 1, "desc" ]]
                    });
                })
            })
        </script>


        @stop
