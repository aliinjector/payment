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

<body class="iranyekan">@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto mr-2">
                <li class="nav-item">
                        <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('show.shop', $shop->first()->english_name) }}" tabindex="-1" aria-disabled="true">صفحه اصلی</a>
                      </li>
              @foreach ($shopCategories as $shopCategorie)

            <li class="nav-item">
              <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('shop.show.category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategorie->id]) }}" tabindex="-1" aria-disabled="true">{{ $shopCategorie->name }}</a>
            </li>
            @endforeach
          </ul>
          <ul class="navbar-nav ml-2">
                <li class="nav-item">
                        <a href="{{ route('show.shop', $shop->first()->english_name) }}">
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
                            <div class="card col-lg-12 mb-5 mt-5 iranyekan">
                                <div class="card-body invoice-head">
                                    <div class="row">
                                        <div class="col-md-4 align-self-center"><img src="{{ $shop->logo['200,100'] }}" alt="logo-small" class="logo-sm mr-2" height="26">
                                            <p class="mt-2 mb-0 text-muted">{{ $shop->description }}.</p>
                                        </div>
                                        <!--end col-->
                                        <div class="col-md-8">
                                            <ul class="list-inline mb-0 contact-detail float-right">
                                                <li class="list-inline-item">
                                                    <div class="pr-3"><i class="mdi mdi-web"></i>
                                                        <p class="text-muted mb-0">www.modirproje/{{ $shop->english_name }}.com</p>
                                                        <p class="text-muted mb-0"><br></p>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="pr-3"><i class="mdi mdi-phone"></i>
                                                        <p class="text-muted mb-0">{{ $shop->shopContact->tel }}</p>
                                                        <p class="text-muted mb-0">{{ $shop->shopContact->phone }}</p>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="pr-3"><i class="mdi mdi-map-marker"></i>
                                                        <p class="text-muted mb-0">{{ $shop->shopContact->city }} {{ $shop->shopContact->province }}</p>
                                                        <p class="text-muted mb-0">{{ $shop->shopContact->address }}</p>
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
                                        <div class="col-md-3 mb-3">
                                            <div class="">
                                                <h6 class="mb-0"><b>تاریخ ثبت فاکتور :</b> {{ jdate() }}</h6>
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
                                                            <th>نام محصول</th>
                                                            <th>قیمت کالا</th>
                                                            <th>میزان تخفیف</th>
                                                            <th>جمع قیمت</th>
                                                        </tr>
                                                        <!--end tr-->
                                                    </thead>
                                                    <tbody class="iranyekan font-14">

                                                        <tr>
                                                            <td>
                                                                <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}">
                                                                <h5 class="mt-0 mb-1">{{ $product->title }}</h5>
                                                            </a>
                                                            </td>
                                                            <td>{{ $product->price }}</td>
                                                            <td> @if($product->off_price == null) 0 @else {{ $product->price-$product->off_price}} @endif </td>
                                                            <td>@if($product->off_price != null){{ $product->off_price}}@else {{ $product->price }}@endif</td>
                                                        </tr>
                                                        <!--end tr-->


                                                        <!--end tr-->
                                                        <tr class="bg-dark text-white">
                                                            <th colspan="2" class="border-0"></th>
                                                            <td class="border-0 font-14"><b>جمع کل</b></td>
                                                            <td>@if($product->off_price != null){{ $product->off_price}}@else {{ $product->price }}@endif</td>
                                                            </tr>
                                                        <!--end tr-->
                                                    </tbody>
                                                </table>
                                                <!--end table-->
                                            </div>

                                            <!--end /div-->
                                        </div>
                                        <div class="d-lg-flex col-lg-12 justify-content-lg-between justify-content-sm-end">
                                            <a @if($product->type == 'file')href="{{ route('download.file', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}" @else href="#" @endif>
                                        <button type="button" class="btn btn-success mt-3 col-sm-12">تایید فاکتور</button>
                                             </a>
                                            <div class="mt-3 col-lg-4 col-sm-12">
                                            <div class="input-group ml-2">
                                                <input type="text" class="form-control" placeholder="استفاده از کد تخفیف" aria-describedby="button-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button" id="button-addon2">اعمال کد تخفیف</button>
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
