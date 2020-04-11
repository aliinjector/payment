@yield('headerStyles')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $FastPay->title }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="امید شاپ - داشبورد اصلی" name="description">
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
<body class="iranyekan">
@section('content')
    <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
@endsection
@section('pageScripts')
@stop
@yield('content')
<div class="card col-lg-8 mb-5 mr-16 mt-5 col-md-8 col-sm-12">
    @include('dashboard.layouts.errors')
    <div class="card-body invoice-head">

        <!--end row-->
    </div>
    <!--end card-body-->
    <div class="card-body">

        <!--end row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive project-invoice">
                    <table class="table table-bordered mb-0 text-center">
                        <thead class="thead-light">
                        <tr>
                            <th>عنوان لینک</th>
                            <th>توضیحات لینک</th>
                            <th> قیمت </th>
                        </tr>
                        <!--end tr-->
                        </thead>
                        <tbody class="iranyekan font-14">
                        <tr>
                            <td>
                                <a href="">
                                    <h5 class="mt-0 mb-1">{{ $FastPay->title }}</h5>
                                </a>
                            </td>
                            <td> {{ $FastPay->description }} </td>
                            <td>{{ number_format($FastPay->price) }} تومان</td>
                        </tr>
                        </tbody>
                    </table>
                    <!--end table-->
                </div>
            </div>
            <div class="d-lg-flex col-lg-12 justify-content-center">
                <div class="mt-4">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success mt-4">پرداخت آنلاین</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
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
<footer class="footer text-center text-sm-left pt-0">&copy; ۱۳۹۸-۱۳۹۹ - کلیه حقوق محفوظ است. <span class="text-muted d-none d-sm-inline-block float-right">طراحی و توسعه در دپارتمان فناوری اطلاعات شرکت فناور ستاره نوران</span></footer>
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
<script>
    $(document).ready(function() {
        $(".showAddresses").click(function() {
            $(".address_1").removeClass("d-none");
            $(".address_2").removeClass("d-none");
            $(".address_3").removeClass("d-none");
            $(".newAddress").removeClass("d-none");
            $(".showAddresses").addClass("d-none");
            $(".address_input").addClass("d-none");
        });
    });
    $(document).ready(function() {
        $(".newAddress").click(function() {
            $(".address_input").removeClass("d-none");
            $(".newAddress").addClass("d-none");
            $(".address_1").addClass("d-none");
            $(".address_2").addClass("d-none");
            $(".address_3").addClass("d-none");
            $(".showAddresses").removeClass("d-none");

        });
    });

</script>
@include('sweet::alert')
@yield('pageScripts')
</body>
</html>
