@extends('dashboard.layouts.master')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">داشبورد گزارشات کلی</a></li>
                        <li class="breadcrumb-item active">داشبورد پین پی</li>
                    </ol>
                </div>
                <h4 class="page-title">داشبورد اصلی</h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0"> کاربران </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۱۲۴ </h3><i
                            class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                                class="mdi mdi-trending-up"></i>۱۰.۵٪</span> افزایش نسبت به دیروز</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0"> فروش ها</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۲۲۳</h3><i
                            class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                                class="mdi mdi-trending-up"></i>۱.۵٪</span> افزایش نسبت به دیروز</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">امتیاز شما </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۴۰۰۰ امتیاز </h3><i
                            class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i
                                class="mdi mdi-trending-down"></i>۱۰.۵٪</span> کاهش نسبت به دیروز</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">موجودی حساب</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۲۳۱ میلیون</h3><i
                            class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
                    <p class="mb-0 text-muted text-truncate"><span class="text-success"><i
                                class="mdi mdi-trending-up"></i>۱۰.۵٪</span> افزایش نسبت به دیروز</p>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body" style="position: relative;">


                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>

                    <div id="monthly" style="min-width: 310px; height: 400px; margin: 0 auto; direction: rtl"></div>



                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 1027px; height: 406px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!-- end col-->
        <div class="col-lg-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card crm-data-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 align-self-center">
                                    <div class="data-icon"><i class="far fa-smile rounded-circle bg-soft-warning"></i>
                                    </div>
                                </div>
                                <!-- end col-->
                                <div class="col-sm-8">
                                    <h3 class="byekan">1200</h3>
                                    <p class="text-muted font-14 mb-0">مشتری راضی</p>
                                </div>
                                <!-- end col-->
                            </div>
                            <!-- end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!-- end col-->
                <div class="col-md-6">
                    <div class="card crm-data-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 align-self-center">
                                    <div class="data-icon"><i class="far fa-user rounded-circle bg-soft-success"></i>
                                    </div>
                                </div>
                                <!-- end col-->
                                <div class="col-sm-8">
                                    <h3 class="byekan">101</h3>
                                    <p class="text-muted font-14 mb-0">مشتری جدید</p>
                                </div>
                                <!-- end col-->
                            </div>
                            <!-- end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!-- end col-->
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="card crm-data-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 align-self-center">
                                    <div class="data-icon"><i
                                            class="far fa-handshake rounded-circle bg-soft-secondary"></i></div>
                                </div>
                                <!-- end col-->
                                <div class="col-sm-8">
                                    <h3 class="byekan">720</h3>
                                    <p class="text-muted font-14 mb-0">فروش جدید</p>
                                </div>
                                <!-- end col-->
                            </div>
                            <!-- end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!-- end col-->
                <div class="col-md-6">
                    <div class="card crm-data-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 align-self-center">
                                    <div class="data-icon"><i class="far fa-registered rounded-circle bg-soft-pink"></i>
                                    </div>
                                </div>
                                <!-- end col-->
                                <div class="col-sm-8">
                                    <h3 class="byekan">964</h3>
                                    <p class="text-muted font-14 mb-0">کاربر جدید</p>
                                </div>
                                <!-- end col-->
                            </div>
                            <!-- end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!-- end col-->
            </div>
            <!--end row-->
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <p class="mb-0 text-muted font-13"><i class="mdi mdi-album mr-2 text-secondary"></i>اهداف جدید</p>
                        </div>
                        <!-- end col-->
                        <div class="col-sm-6">
                            <p class="mb-0 text-muted font-13"><i class="mdi mdi-album mr-2 text-warning"></i>هدفگزاری فروش</p>
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row-->
                    <div class="progress bg-warning mb-3" style="height:5px;">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 65%" aria-valuenow="65"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0 text-muted text-truncate align-self-center"><span class="text-success"><i
                                    class="mdi mdi-trending-up"></i>1.5%</span> افزایش نسبت به هفته گذشته</p>
                        <button type="button" class="btn btn-outline-info btn-sm">گزارش فروش</button>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>



    <!--end row-->
    <div style="display: none" class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 align-self-center">
                            <div class="">
                                <h4 class="mt-0 header-title">This Month Revenue</h4>
                                <h2 class="mt-0 font-weight-bold">$57k</h2>
                                <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span>
                                    Up From Last Month</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-4 align-self-center">
                            <div class="icon-info text-right"><i class="dripicons-wallet bg-soft-info"></i></div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
                <div class="card-body overflow-hidden p-0">
                    <div class="d-flex mb-0 h-100 dash-info-box">
                        <div class="w-100">
                            <div class="apexchart-wrapper">
                                <div id="eco_dash_2" class="chart-gutters"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-3">New Customers</h4>
                    <div class="row">
                        <div class="col-8">
                            <div class="align-self-center">
                                <div id="re_customers" class="apex-charts mb-n4"></div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-4 align-self-center">
                            <div class="re-customers-detail">
                                <h3 class="mb-0">21,546</h3>
                                <p class="text-muted"><i class="mdi mdi-circle text-info mr-1"></i>New Customers</p>
                            </div>
                            <div class="re-customers-detail">
                                <h3 class="mb-0">1535</h3>
                                <p class="text-muted"><i class="mdi mdi-circle text-light mr-1"></i>Repeated</p>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div class="card carousel-bg-img">
                <div class="card-body dash-info-carousel">
                    <h4 class="mt-0 header-title">Populer Product</h4>
                    <div id="carousel_2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="media"><img src="/dashboard/assets/images/products/img-2.png" height="200"
                                                        class="mr-4" alt="...">
                                    <div class="media-body align-self-center"><span class="badge badge-primary mb-2">354 sold</span>
                                        <h4 class="mt-0">Important Watch</h4>
                                        <p class="text-muted mb-0">$99.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="media"><img src="/dashboard/assets/images/products/img-3.png" height="200"
                                                        class="mr-4" alt="...">
                                    <div class="media-body align-self-center"><span class="badge badge-primary mb-2">654 sold</span>
                                        <h4 class="mt-0">Wireless Headphone</h4>
                                        <p class="text-muted mb-0">$39.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="media"><img src="/dashboard/assets/images/products/img-1.png" height="200"
                                                        class="mr-4" alt="...">
                                    <div class="media-body align-self-center"><span class="badge badge-primary mb-2">551 sold</span>
                                        <h4 class="mt-0">Leather Bag</h4>
                                        <p class="text-muted mb-0">$49.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel_2" role="button" data-slide="prev"><span
                                class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span>
                        </a><a class="carousel-control-next" href="#carousel_2" role="button" data-slide="next"><span
                                class="carousel-control-next-icon" aria-hidden="true"></span> <span
                                class="sr-only">Next</span></a></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div style="display: none" class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body order-list">
                    <h4 class="header-title mt-0 mb-3">Order List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th class="border-top-0">Product</th>
                                <th class="border-top-0">Pro Name</th>
                                <th class="border-top-0">Country</th>
                                <th class="border-top-0">Order Date/Time</th>
                                <th class="border-top-0">Pcs.</th>
                                <th class="border-top-0">Amount ($)</th>
                                <th class="border-top-0">Status</th>
                            </tr>
                            <!--end tr-->
                            </thead>
                            <tbody>
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-1.png" alt="user"></td>
                                <td>Beg</td>
                                <td><img src="/dashboard/assets/images/flags/us_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>3/03/2019 4:29 PM</td>
                                <td>200</td>
                                <td>$750</td>
                                <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-2.png" alt="user"></td>
                                <td>Watch</td>
                                <td><img src="/dashboard/assets/images/flags/french_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>13/03/2019 1:09 PM</td>
                                <td>180</td>
                                <td>$970</td>
                                <td><span class="badge badge-boxed badge-soft-danger">Delivered</span></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-3.png" alt="user"></td>
                                <td>Headphone</td>
                                <td><img src="/dashboard/assets/images/flags/spain_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>22/03/2019 12:09 PM</td>
                                <td>30</td>
                                <td>$2800</td>
                                <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-4.png" alt="user"></td>
                                <td>Purse</td>
                                <td><img src="/dashboard/assets/images/flags/russia_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>14/03/2019 8:27 PM</td>
                                <td>100</td>
                                <td>$520</td>
                                <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-5.png" alt="user"></td>
                                <td>Shoe</td>
                                <td><img src="/dashboard/assets/images/flags/italy_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>18/03/2019 5:09 PM</td>
                                <td>100</td>
                                <td>$1150</td>
                                <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <td><img class="" src="/dashboard/assets/images/products/img-6.png" alt="user"></td>
                                <td>Boll</td>
                                <td><img src="/dashboard/assets/images/flags/us_flag.jpg" alt=""
                                         class="img-flag thumb-xxs rounded-circle"></td>
                                <td>30/03/2019 4:29 PM</td>
                                <td>140</td>
                                <td>$ 650</td>
                                <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                            </tr>
                            <!--end tr-->
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                    <!--end /div-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
@endsection


@section('pageScripts')
    <script>
        Highcharts.chart('monthly', {
            chart: {
                type: 'line',
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان']
            },
            yAxis: {
                title: {
                    text: 'مبلغ (هزار تومان)'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'مبلغ',
                data: [720000, 690000, 950000, 1400000, 1840000, 2150000, 2520000, 2650000]
            }]
        });
    </script>
@stop
