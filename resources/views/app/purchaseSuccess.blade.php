@yield('headerStyles')


        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>فاکتور</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="پایان پی - داشبورد اصلی" name="description">
    <meta name="author" content="Setareh Nooran Co. Ali Rahmani">
    <!-- App favicon -->
    <link href="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- App css -->
    <link href="/dashboard/assets/css/jquery.steps.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/custom.css" rel="stylesheet" type="text/css">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

</head>

<body>@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

<nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto mr-2">
                <li class="nav-item">
                        <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('show.shop', \Auth::user()->shop()->first()->english_name) }}" tabindex="-1" aria-disabled="true">صفحه اصلی</a>
                      </li>
              @foreach ($shopCategories as $shopCategorie)

            <li class="nav-item">
              <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('shop.show.category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategorie->id]) }}" tabindex="-1" aria-disabled="true">{{ $shopCategorie->name }}</a>
            </li>
            @endforeach
          </ul>
          <ul class="navbar-nav ml-2">
                <li class="nav-item">
                        <a href="{{ route('show.shop', \Auth::user()->shop()->first()->english_name) }}">
                        <img src="{{ $shop->logo['200,100'] }}" alt="">
                      </a>
                    </li>
          </ul>
        </div>
      </nav>


@endsection


@section('pageScripts')
@stop
        @yield('content')
                            <div class="card col-8 mb-5 mr-16 mt-5">
                                <div class="card-body invoice-head">
                                    <div class="row">
                                        <div class="col-md-4 align-self-center"><img src="../assets/images/logo-sm.png" alt="logo-small" class="logo-sm mr-2" height="26"> <img src="../assets/images/logo-dark.png" alt="logo-large" class="logo-lg" height="16">
                                            <p class="mt-2 mb-0 text-muted">If account is not paid within 7 days the credits details supplied as confirmation.</p>
                                        </div>
                                        <!--end col-->
                                        <div class="col-md-8">
                                            <ul class="list-inline mb-0 contact-detail float-right">
                                                <li class="list-inline-item">
                                                    <div class="pr-3"><i class="mdi mdi-web"></i>
                                                        <p class="text-muted mb-0">www.abcdefghijklmno.com</p>
                                                        <p class="text-muted mb-0">www.qrstuvwxyz.com</p>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="pr-3"><i class="mdi mdi-phone"></i>
                                                        <p class="text-muted mb-0">+123 123456789</p>
                                                        <p class="text-muted mb-0">+123 123456789</p>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="pr-3"><i class="mdi mdi-map-marker"></i>
                                                        <p class="text-muted mb-0">2821 Kensington Road,</p>
                                                        <p class="text-muted mb-0">Avondale Estates, GA 30002 USA.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="">
                                                <h6 class="mb-0"><b>Start Date :</b> 11/05/2019</h6>
                                                <h6 class="mb-0"><b>End Date :</b> 10/06/2019</h6></div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-md-6">
                                            <h6 class="mb-0"><b>Compny :</b> Hubland</h6>
                                            <h6 class="mb-0"><b>Project Name :</b> Trading System</h6>
                                            <h6 class="mb-0"><b>Invoice No :</b> #1240</h6></div>
                                        <!--end col-->
                                        <div class="col-md-3">
                                            <div class="text-center bg-light p-3 mb-3">
                                                <h5 class="bg-info mt-0 p-2 text-white d-sm-inline-block">Payment Methods</h5>
                                                <h6 class="font-13">Paypal &amp; Cards Payments :</h6>
                                                <p class="mb-0 text-muted">CompanyA/c.paypal@gmai.com</p>
                                                <p class="mb-0 text-muted">Visa, Master Card, Chaque</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive project-invoice">
                                                <table class="table table-bordered mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Project Breakdown</th>
                                                            <th>Hours</th>
                                                            <th>Rate</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                        <!--end tr-->
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h5 class="mt-0 mb-1">Project Design</h5>
                                                                <p class="mb-0 text-muted">It is a long established fact that a reader will be distracted.</p>
                                                            </td>
                                                            <td>60</td>
                                                            <td>$50</td>
                                                            <td>$3000.00</td>
                                                        </tr>
                                                        <!--end tr-->
                                                        <tr>
                                                            <td>
                                                                <h5 class="mt-0 mb-1">Development</h5>
                                                                <p class="mb-0 text-muted">It is a long established fact that a reader will be distracted.</p>
                                                            </td>
                                                            <td>100</td>
                                                            <td>$50</td>
                                                            <td>$5000.00</td>
                                                        </tr>
                                                        <!--end tr-->
                                                        <tr>
                                                            <td>
                                                                <h5 class="mt-0 mb-1">Testing &amp; Bug Fixing</h5>
                                                                <p class="mb-0 text-muted">It is a long established fact that a reader will be distracted.</p>
                                                            </td>
                                                            <td>10</td>
                                                            <td>$20</td>
                                                            <td>$200.00</td>
                                                        </tr>
                                                        <!--end tr-->
                                                        <tr>
                                                            <td colspan="2" class="border-0"></td>
                                                            <td class="border-0 font-14"><b>Sub Total</b></td>
                                                            <td class="border-0 font-14"><b>$82,000.00</b></td>
                                                        </tr>
                                                        <!--end tr-->
                                                        <tr>
                                                            <th colspan="2" class="border-0"></th>
                                                            <td class="border-0 font-14"><b>Tax Rate</b></td>
                                                            <td class="border-0 font-14"><b>$0.00%</b></td>
                                                        </tr>
                                                        <!--end tr-->
                                                        <tr class="bg-dark text-white">
                                                            <th colspan="2" class="border-0"></th>
                                                            <td class="border-0 font-14"><b>Total</b></td>
                                                            <td class="border-0 font-14"><b>$82,000.00</b></td>
                                                        </tr>
                                                        <!--end tr-->
                                                    </tbody>
                                                </table>
                                                <!--end table-->
                                            </div>
                                            <!--end /div-->
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                    <!--end row-->

                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                <!--end footer-->
            </div>



    <!--end row-->
    </div>
    <!-- container -->
    <footer class="footer text-center text-sm-left">&copy; ۱۳۹۸ - کلیه حقوق محفوظ است. <span class="text-muted d-none d-sm-inline-block float-right">طراحی و توسعه در دپارتمان فناوری اطلاعات شرکت فناور ستاره نوران</span></footer>
    <!--end footer-->
</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->
<!-- jQuery  -->
<script src="/dashboard/assets/js/jquery.min.js"></script>
<script src="/dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="/dashboard/assets/js/metisMenu.min.js"></script>
<script src="/dashboard/assets/js/waves.min.js"></script>
<script src="/dashboard/assets/js/jquery.slimscroll.min.js"></script>
<script src="/dashboard/assets/plugins/moment/moment.js"></script>
<script src="/dashboard/assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/dashboard/assets/pages/jquery.eco_dashboard.init.js"></script>
<script src="/dashboard/assets/js/jquery.form-wizard.init.js"></script>
<script src="/dashboard/assets/js/jquery.steps.min.js"></script>
<!-- App js -->
<script src="/dashboard/assets/js/app.js"></script>
<script src="/dashboard/assets/js/sweetalert.min.js"></script>
@include('sweet::alert')
@yield('pageScripts')
</body>

</html>
