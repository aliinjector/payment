@yield('headerStyles')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @if (\Request::route()->getName() == 'user.purchased.list')
      <title>لیست سفارشات شما</title>
    @else
    <title>صفحه اصلی فروشگاه {{ $shop->name }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="صفحه اصلی فروشگاه {{ $shop->name }}" name="description">
  @endif
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
    <link href="/app/css/custom.css" rel="stylesheet" type="text/css">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">


</head>

<body>
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

@if(\Request::route()->getName() == 'user.purchased.list')
  <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="page-title-box">
                          <div class="float-right">
                              <ol style="direction: ltr" class="breadcrumb">
                                  <li class="breadcrumb-item active mb-3 ml-lg-4">
                                      <a href="{{ route('logout') }}">
                                          <button class="btn-sm small btn-primary">
                                              خروج از حساب کاربری
                                          </button>
                                      </a>
                                  </li>
                              </ol>
                          </div>
                          <h4 class="page-title mr-4">لیست سفارشات شما</h4></div>
                      <!--end page-title-box-->
                  </div>
                  <!--end col-->
              </div>
        @else
<nav class="navbar navbar-expand-lg navbar-light bg-white mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto mr-2">
                <li class="nav-item">
                        <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('show.shop',$shop->first()->english_name) }}" tabindex="-1" aria-disabled="true">صفحه اصلی</a>
                      </li>
              @foreach ($shopCategories as $shopCategorie)
            <li class="nav-item">
              <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('shop.show.category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategorie->id]) }}" tabindex="-1" aria-disabled="true">{{ $shopCategorie->name }}</a>
            </li>
            @endforeach
          </ul>
          <ul class="navbar-nav ml-2">
                @guest
                <li class="nav-item mt-4 pl-4">
                        <div class="search-icon d-lg-block">
                                <a href="{{ route('login') }}" style="font-size:15px;" ><i class="fas fa-sign-in-alt"></i> ورود</a>

                                <a href="{{ route('register') }}" class="pr-2">
                                    <span class="" style="font-size:15px;"><i class="fa fa-user"></i> عضویت</span></a>
                            </div>
                        </li>
                        @endguest
                        @auth
                        @if(\Auth::user()->id == $shop->user_id)
                        <div class="search-icon d-flex align-items-center ml-5 ">
                            <a href="{{ route('dashboard-shop.index') }}" style="font-size:13px;">
                            <button type="button" class="btn btn-outline-primary">ورود به پنل مدیریت</button>
                            </a>
                        </div>
                      @else
                        <div class="search-icon d-flex align-items-center mx-3 ">
                            <a href="{{ route('user.purchased.list' , ['userID' => \Auth::user()->id]) }}" style="font-size:13px;">
                            <button type="button" class="btn btn-outline-primary"> مدیریت سفارشات</button>
                            </a>
                        </div>
                        <div class="search-icon d-flex align-items-center ml-5 ">
                            <a href="{{ route('cart.show' , ['shop' => $shop->english_name , 'userID' => \Auth::user()->id]) }}" style="font-size:13px;">
                                  <button type="button" class="btn btn-primary px-3 border-success">سبد خرید <i class="mr-2 fas fa-shopping-cart"></i>@if(\Auth::user()->cart()->get()->count() != 0) {{ \Auth::user()->cart()->get()->first()->products()->count() }} @else 0 @endif</button>
                            </a>
                        </div>
                        @endif
                        @endauth

              <li class="nav-item">
                  <a href="{{ route('show.shop', $shop->first()->english_name) }}">
                  <img class="img-fluid d-sm-none d-lg-block" src="{{ $shop->logo['200,100'] }}" alt="">
                </a>
              </li>

          </ul>
        </div>
      </nav>
    @endif

<div class="page-content">
    <div class="container-fluid">
            <!-- Page-Title -->
            @yield('content')
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
