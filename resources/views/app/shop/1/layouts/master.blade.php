@yield('headerStyles')
<!DOCTYPE html>
<html lang="en">

<head>
    {!! SEO::generate() !!}
    <meta charset="utf-8">
    @if (\Request::route()->getName() == 'user.purchased.list')
    <title>{{ __('app-shop-1-layouts-master.pageTitle') }}</title>
    @else
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @endif
    <meta name="author" content="Setareh Nooran Co. Ali Rahmani">
    <!-- App favicon -->
    <link href="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- App css -->
    <link href="/dashboard/assets/css/color-option.css" rel="stylesheet" type="text/css">

    <link href="/app/shop/1/assets/css/jquery.steps.css" rel="stylesheet" type="text/css">
    <link href="/app/shop/1/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/app/shop/1/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/app/shop/1/assets/css/compare.css">
    <link href="/app/shop/1/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="/app/shop/1/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/color-option.css" rel="stylesheet" type="text/css">
    <link href="/app/shop/1/assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="/app/css/custom.css" rel="stylesheet" type="text/css">
    <style>
        .form-control-borderless {
            border: none;
        }

        .form-control-borderless:hover,
        .form-control-borderless:active,
        .form-control-borderless:focus {
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
            margin-top: -1px;
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

        .li-color {
            color: #465f73;
        }

        .opacity-lost {
            opacity: 0.4 !important;
        }
        .bg-omid-orange{
          background-color: #F68712!important;
          color: white!important;
        }
        .bg-omid-orange:hover {
          background-color: white!important;
          color:  #F68712!important;
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
                                        {{ __('app-shop-1-layouts-master.khorooj') }}
                                    </button>
                                </a>
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title mr-4">{{ __('app-shop-1-layouts-master.pageTitle') }}</h4>
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
                        <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('shop',$shop->english_name) }}" tabindex="-1" aria-disabled="true">{{ __('app-shop-1-layouts-master.safheAsli') }}</a>
                    </li>


                    @if($shop->menu_show == "mega_menu")
                        <div class="dropdown mx-3 hover-opacity">
                            <a href="">
                                <button class="btn btn-primary-outline dropdown-toggle iranyekan f-em1-5 font-weight-normal" style="color:
                                #465f73!important">
                                    دسته بندی کالا ها
                                </button>
                            </a>
                            <ul class="dropdown-menu multi-level font-16 p-4" role="menu" aria-labelledby="dropdownMenu" style="right:.2em!important;width: 265px;min-height: 50vh;">
                                @foreach ($shopCategories->where('parent_id' , null) as $subCategory)
                                @if (!$subCategory->children()->exists())
                                <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}" style="color: #465f73!important;">
                                    <li class="dropdown-item dropdown-submenu font-15 py-3 @if( Request::is('*/category/'.$subCategory->id)) bg-omid-orange @endif">{{ $subCategory->name }}
                                    </li>
                                </a>
                                @else
                                <li class="dropdown-submenu py-3" style="position: static;">
                                    <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}" class="dropdown-item pointer-crouser @if( Request::is('*/category/'.$subCategory->id)) bg-omid-orange @endif" style="width: 107%;" tabindex="-1"
                                      class="li-color">{{ $subCategory->name }}</a>
                                    <ul class="dropdown-menu font-16" style="width: 992px;min-height: 50vh;background-color: #FFFFFF;border-radius: 8px;">
                                        <div class="row">
                                            @foreach ($subCategory->children()->get() as $subSubCategory)
                                            <div class="col-lg-3">
                                                @if (!$subSubCategory->children()->exists())
                                                <a tabindex="-1" href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id]) }}">
                                                    <li class="dropdown-item py-3 @if( Request::is('*/category/'.$subSubCategory->id)) bg-omid-orange @endif">{{ $subSubCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></li>
                                                </a>
                                                @else
                                                <li class="dropdown-submenu" style="background-color:#FFFFFF;">
                                                    <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id]) }}" class="dropdown-item pointer-crouser @if( Request::is('*/category/'.$subSubCategory->id)) bg-omid-orange @endif" style="font-weight: 500!important"
                                                      class="li-color">{{ $subSubCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></a>
                                                </li>
                                                @foreach($subSubCategory->children()->get() as $subSubSubCategory)
                                                    <li class="dropdown-submenu pr-5 text-left">
                                                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id]) }}" class="iranyekan @if( Request::is('*/category/'.$subSubSubCategory->id)) bg-omid-orange @endif" style="color: #4a5f73;font-size: 14px;">
                                                            {{ $subSubSubCategory->name }}
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                    @endif

                                            </div>
                                            @endforeach

                                        </div>

                                    </ul>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        @else
                          @inject('CategoryCTLR', 'App\Http\Controllers\Shop\CategoryController')
                        @foreach ($shopCategories->where('parent_id' , null)->take($shop->menu_show_count) as $shopCategory)
                        <div class="dropdown mx-3">
                            <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategory->id]) }}">
                                <button class="btn btn-primary-outline dropdown-toggle iranyekan f-em1-5 font-weight-normal @if(Request::is('*/category/'.$shopCategory->id)) border-bottom border-omid-orange @endif @if(Route::currentRouteName() == 'category' and $CategoryCTLR->getAllSubCategories($shopCategory->id)->contains('id', explode('/',url()->current())[5])) border-bottom border-omid-orange @endif" style="color:
                                #465f73!important">
                                {{ $shopCategory->name }}
                                </button>
                            </a>
                            @if($shop->menu_show == "nestead_menu")
                                @if($shopCategory->children()->exists())
                                    <ul class="dropdown-menu multi-level font-16" role="menu" aria-labelledby="dropdownMenu" style="right:.2em!important">
                                        @foreach ($shopCategory->children()->get() as $subCategory)
                                        @if (!$subCategory->children()->exists())
                                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}" style="color: #465f73!important;">
                                            <li class="dropdown-item dropdown-submenu @if( Request::is('*/category/'.$subCategory->id)) bg-omid-orange @endif @if(Route::currentRouteName() == 'category' and $CategoryCTLR->getAllSubCategories($subCategory->id)->contains('id', explode('/',url()->current())[5])) border-bottom border-omid-orange @endif">{{ $subCategory->name }}
                                            </li>
                                        </a>
                                        @else
                                        <li class="dropdown-submenu">
                                            <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}" class="dropdown-item pointer-crouser @if( Request::is('*/category/'.$subCategory->id)) bg-omid-orange @endif @if(Route::currentRouteName() == 'category' and $CategoryCTLR->getAllSubCategories($subCategory->id)->contains('id', explode('/',url()->current())[5])) border-bottom border-omid-orange @endif" style="color: #465f73!important;"
                                              tabindex="-1">{{ $subCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></a>
                                            <ul class="dropdown-menu font-16">
                                                @foreach ($subCategory->children()->get() as $subSubCategory)
                                                @if (!$subSubCategory->children()->exists())
                                                <a tabindex="-1" href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id]) }}">
                                                    <li class="dropdown-item @if( Request::is('*/category/'.$subSubCategory->id)) bg-omid-orange @endif">{{ $subSubCategory->name }}</li>
                                                </a>
                                                @else
                                                <li class="dropdown-submenu">
                                                    <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id]) }}" class="dropdown-item pointer-crouser @if( Request::is('*/category/'.$subSubCategory->id)) bg-omid-orange @endif"
                                                      style="color: #465f73!important;">{{ $subSubCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></a>
                                                    <ul class="dropdown-menu font-16">
                                                        @foreach ($subSubCategory->children()->get() as $subSubSubCategory)
                                                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id]) }}" style="color: #465f73!important;">
                                                            <li class="dropdown-item @if( Request::is('*/category/'.$subSubSubCategory->id)) bg-omid-orange @endif">{{ $subSubSubCategory->name }}</li>
                                                        </a>
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
                        @endif
                </ul>
                <ul class="navbar-nav float-right ">
                    @guest
                    <div class="search-icon d-flex align-items-center mx-3 ">
                        <a href="{{ route('register', ['shop' => $shop->english_name]) }}" style="font-size:13px;">
                            <button type="button" class="btn bg-blue-omid text-white rounded">{{ __('app-shop-1-layouts-master.ozviat') }}</button>
                        </a>
                    </div>
                    <div class="search-icon d-flex align-items-center ml-5 mt-2 ">
                        <a href="{{ route('login') }}" style="font-size:13px;">
                            <button type="button" class="bg-orange-omid btn mt-lg-0 mt-sm-2 px-3 mt-lg-n2 px-sm-4 mr-sm-3 rounded text-white">{{ __('app-shop-1-layouts-master.vorood') }}</button>
                        </a>
                    </div>
                    @endguest
                    @auth
                    <div class="dropdown search-icon d-flex align-items-center mx-5 my-4" @if($shop->logo == null) style="margin-left: 80px!important;" @endif>
                        <button class="btn bg-blue-omid text-white rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          اطلاعات کاربری {{ \Auth::user()->firstName . ' ' . \Auth::user()->lastName  }}
                        </button>
                        <div class="dropdown-menu p-3 position-absolute" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('wishlist' , ['shop' => $shop->english_name]) }}"><i class="fas fa-heart p-2"></i>{{ __('app-shop-1-layouts-master.alagheMandiHa') }} <span
                                  class="circle-bg byekan font-14">{{ \Auth::user()->wishlist()->get()->where('shop_id', $shop->id)->count() != 0 ?  \Auth::user()->wishlist()->get()->where('shop_id', $shop->id)->first()->products()->count() : 0 }} </span></a>
                            <a class="dropdown-item" href="{{ route('user-cart' , ['shop' => $shop->english_name]) }}"><i class="fas fa-shopping-cart p-2"></i>سبد خرید<span
                                  class="circle-bg byekan font-14 m-2">{{ \Auth::user()->cart()->get()->count()  != 0 ?  \Auth::user()->cart()->get()->first()->cartProduct()->count() : 0 }} </span></a>
                            @if(\Auth::user()->id == $shop->user_id)
                                <a class="dropdown-item" href="{{ route('dashboard.index') }}"><i class="fas fa-user p-2"></i>پنل مدیریت</a>
                                @else
                                <a class="dropdown-item" href="{{ route('user-panel.index') }}"><i class="fas fa-user p-2"></i>{{ __('app-shop-1-layouts-master.panelKarbari') }}</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('user-address.index') }}"><i class="fas fa-address-card p-2"></i>{{ __('app-shop-1-layouts-master.addressHa') }}</a>
                                <a class="dropdown-item" href="{{ route('user.purchased.list') }}"><i class="fas fa-shopping-cart p-2"></i>{{ __('app-shop-1-layouts-master.listSefaareshaat') }}</a>
                                <a class="dropdown-item" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i class="fas fa-chart-bar p-2"></i>{{ __('app-shop-1-layouts-master.moghayese') }} <span
                                      class="circle-bg byekan font-14">{{ \Auth::user()->compare()->get()->where('shop_id', $shop->id)->count() != 0 ?  \Auth::user()->compare()->get()->where('shop_id', $shop->id)->first()->products()->count() : 0 }}</span></a>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt p-2"></i>{{ __('app-shop-1-layouts-master.khorooj') }}</a>
                        </div>
                    </div>
                    @endauth



                    <li class="nav-item">
                        <a href="{{ route('shop', $shop->english_name) }}">
                            <img class="img-fluid d-lg-block" src="{{ $shop->logo['200,100'] }}" alt="">
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
            <footer style="margin: 25px; font-family: iranyekan" class="footer text-center text-sm-left text-muted bg-green-rock">
                <div class="border-bottom">
                    <ul class="list-group">
                        <li class="list-group-item border-0 text-white iranyekan font-15" style="background-color: transparent">
                            {{-- <a href="{{ route('faq.show', ['shopName' => $shop->english_name]) }}" class="text-white">
                                سوالات متداول
                            </a> --}}

                        </li>
                        <li class="list-group-item border-0 text-white iranyekan font-15" style="background-color: transparent">
                            <a href="{{ route('template.contact', $shop->english_name) }}" class="text-white">

                                درباره ما و تماس
                            </a>

                        </li>
                    </ul>
                </div>
                <div class="pt-3 text-white">

                    &copy; ۱۳۹۸ - کلیه حقوق محفوظ است.
                    <a target="_blank" href="https://omidshop.net">
                        <span class="text-white d-none d-sm-inline-block float-right">قدرت گرفته از سیستم فروشگاه ساز امید</span>
                    </a>
                </div>

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
        <script src="/app/shop/1/assets/js/bootstrap-select.min.js"></script>


        @toastr_js
        @toastr_render

        @include('sweet::alert')
        @yield('pageScripts')
        <script src="{{url('stats/script.js')}}"></script>
        <script type="text/javascript">
            $('.hover-opacity').hover(
                function() {
                    $('.page-content').addClass('opacity-lost')
                },
                function() {
                    $('.page-content').removeClass('opacity-lost')
                }
            )
        </script>

</body>

</html>
