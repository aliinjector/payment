@yield('headerStyles')
<!DOCTYPE html>
<html lang="en">

<head>
    {!! SEO::generate() !!}
    <meta charset="utf-8">
    @if (\Request::route()->getName() == 'user.purchased.list')
    <title>لیست سفارشات شما</title>
    @else
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @endif
    <meta name="author" content="Setareh Nooran Co. Ali Rahmani">
    <!-- App favicon -->
    <link href="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- App css -->
    <link href="/app/shop/1/assets/css/jquery.steps.css" rel="stylesheet" type="text/css">
    <link href="/app/shop/1/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/app/shop/1/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/app/shop/1/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="/app/shop/1/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/color-option.css" rel="stylesheet" type="text/css">
    <link href="/app/shop/1/assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="/app/css/custom.css" rel="stylesheet" type="text/css">
    <style>
    .form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            right: 100% !important;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }
    </style>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    @toastr_css


</head>

<body>
    <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
    <style>
        .toast-message {
            font-size: 20px;
        }
    </style>
    @if(\Request::route()->getName() == 'user.purchased.list')
        <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol style="direction: ltr" class="breadcrumb">
                            <li class="breadcrumb-item active mb-3 ml-lg-4">
                                <a href="{{ route('logout') }}">
                                    <button class="btn-sm small btn-primary rounded">
                                        خروج از حساب کاربری
                                    </button>
                                </a>
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title mr-4">لیست سفارشات شما</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        @else
        <nav class="navbar navbar-expand-lg navbar-light bg-white mb-3 shadow-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mr-2">
                    <li class="nav-item">
                        <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('shop',$shop->english_name) }}" tabindex="-1" aria-disabled="true">صفحه اصلی</a>
                    </li>
                    @foreach ($shopCategories->where('parent_id' , null)->take(5) as $shopCategory)
                    <div class="dropdown mx-3">
                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategory->id]) }}">
                            <button class="btn btn-primary-outline dropdown-toggle iranyekan f-em1-5 font-weight-normal @if( Request::is('*/category/'.$shopCategory->id)) border-bottom border-omid-orange @endif" style="color:
                            #465f73!important">
                            {{ $shopCategory->name }}
                            </button>
                        </a>
                        @if($shop->menu_show == "nestead_menu")
                            @if($shopCategory->children()->exists())
                                <ul class="dropdown-menu multi-level font-16" role="menu" aria-labelledby="dropdownMenu" style="right:.2em!important">
                                    @foreach ($shopCategory->children()->get() as $subCategory)
                                    @if (!$subCategory->children()->exists())
                                    <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}" style="color: #465f73!important;"><li class="dropdown-item dropdown-submenu">{{ $subCategory->name }}
                                    </li>
                                    </a>
                                    @else
                                    <li class="dropdown-submenu">
                                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}" class="dropdown-item pointer-crouser" style="color: #465f73!important;" tabindex="-1">{{ $subCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></a>
                                        <ul class="dropdown-menu font-16">
                                            @foreach ($subCategory->children()->get() as $subSubCategory)
                                            @if (!$subSubCategory->children()->exists())
                                            <a tabindex="-1" href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id]) }}"><li class="dropdown-item">{{ $subSubCategory->name }}</li></a>
                                            @else
                                            <li class="dropdown-submenu">
                                                <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id]) }}" class="dropdown-item pointer-crouser" style="color: #465f73!important;">{{ $subSubCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></a>
                                                <ul class="dropdown-menu font-16">
                                                    @foreach ($subSubCategory->children()->get() as $subSubSubCategory)
                                                      <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id]) }}"
                                                            style="color: #465f73!important;"><li class="dropdown-item">{{ $subSubSubCategory->name }}</li></a>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                @endif
                                @endif
                    </div>
                    @endforeach
                </ul>
                <ul class="navbar-nav float-right ">
                    @guest
                    <div class="search-icon d-flex align-items-center mx-3 ">
                        <a href="{{ route('register', ['shop' => $shop->english_name]) }}" style="font-size:13px;">
                            <button type="button" class="btn bg-blue-omid text-white rounded">عضویت</button>
                        </a>
                    </div>
                    <div class="search-icon d-flex align-items-center ml-5 mt-2 ">
                        <a href="{{ route('login') }}" style="font-size:13px;">
                            <button type="button" class="bg-orange-omid btn mt-lg-0 mt-sm-2 px-3 mt-lg-n2 px-sm-4 mr-sm-3 rounded text-white">ورود</button>
                        </a>
                    </div>
                    @endguest
                    @auth
                    @if(\Auth::user()->id == $shop->user_id)
                        <div class="search-icon d-flex align-items-center ml-5 ">
                            <a href="{{ route('dashboard.index') }}" style="font-size:13px;">
                                <button type="button" class="btn bg-blue-omid text-white rounded">ورود به پنل مدیریت</button>
                            </a>
                        </div>
                        @else
                        <div class="search-icon d-flex align-items-center mx-3 ">
                            <a href="{{ route('user.purchased.list') }}" style="font-size:13px;">
                                <button type="button" class="btn bg-blue-omid text-white rounded"> مدیریت سفارشات</button>
                            </a>
                        </div>
                        @endif
                        <div class="search-icon d-flex align-items-center ml-5">
                            <a href="{{ route('user-cart' , ['shop' => $shop->english_name]) }}" style="font-size:13px;">
                                <button type="button" class="bg-orange-omid btn mt-lg-0 mt-sm-2 px-3 rounded text-white">سبد خرید <i class="mr-2 fas fa-shopping-cart"></i>
                                    @if(\Auth::user()->cart()->get()->count() != 0) {{ \Auth::user()->cart()->get()->first()->products()->count() }}
                                        @else 0
                                        @endif</button>
                            </a>
                        </div>
                        @endauth
                        <div class="search-icon d-flex align-items-center mx-3 ">
                            <a href="{{ route('user.purchased.list') }}" style="font-size:13px;">
                                <button type="button" class="btn bg-blue-omid text-white rounded"></button>
                            </a>
                        </div>

                        <li class="nav-item">
                            <a href="{{ route('shop', $shop->english_name) }}">
                                <img class="img-fluid d-sm-none d-lg-block" src="{{ $shop->logo['200,100'] }}" alt="">
                            </a>
                        </li>

                </ul>
            </div>
        </nav>
        @endif

        <div class="page-content main-bg-color">
            <div class="container-fluid">
                <!-- Page-Title -->
                @yield('content')
                <!--end row-->
            </div>
            <!-- container -->
            <footer style="    margin: 25px; font-family: iranyekan" class="footer text-center text-sm-left text-muted">
              &copy; ۱۳۹۸ - کلیه حقوق محفوظ است.
              <a target="_blank" href="https://omidshop.net">
                <span class="text-muted d-none d-sm-inline-block float-right">قدرت گرفته از سیستم فروشگاه ساز امید</span>
              </a>
            </footer>

            <!--end footer-->
        </div>
        <!-- end page content -->
        </div>
        <!-- end page-wrapper -->
        <!-- jQuery  -->
        <script src="/app/shop/1/assets/js/jquery.min.js"></script>
        <script src="/app/shop/1/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/app/shop/1/assets/js/metisMenu.min.js"></script>
        <script src="/app/shop/1/assets/js/waves.min.js"></script>
        <script src="/app/shop/1/assets/js/jquery.slimscroll.min.js"></script>
        <script src="/app/shop/1/assets/plugins/moment/moment.js"></script>
        <script src="/app/shop/1/assets/plugins/apexcharts/apexcharts.min.js"></script>
        <script src="/app/shop/1/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="/app/shop/1/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="/app/shop/1/assets/pages/jquery.eco_dashboard.init.js"></script>
        <script src="/app/shop/1/assets/js/jquery.form-wizard.init.js"></script>
        <script src="/app/shop/1/assets/js/jquery.steps.min.js"></script>
        <!-- App js -->
        <script src="/app/shop/1/assets/js/app.js"></script>
        <script src="/app/shop/1/assets/js/sweetalert.min.js"></script>

        @toastr_js
        @toastr_render

        @include('sweet::alert')
        @yield('pageScripts')
    <script src="{{url('stats/script.js')}}"></script>
</body>

</html>
