<!--
Author: Ali Rahmani
-->

@yield('headerStyles')


        <!DOCTYPE html>
<html lang="fa">

<head>
    <script src="/dashboard/assets/js/jquery.min.js"></script>
    <script src="/dashboard/assets/js/jquery.form-xeditable.init.js"></script>
    <script src="/dashboard/assets/js/bootstrap-editable.min.js"></script>
    <meta charset="utf-8">
    <title>{{ __('dashboard-layouts-master.pageTitle') }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="پایان پی - داشبورد اصلی" name="description">
    <meta name="author" content="Setareh Nooran Co. Ali Rahmani">
    <!-- App favicon -->
    <link href="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- App css -->
    <link href="/dashboard/assets/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/jquery.steps.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/color-option.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/persian-datepicker.css" rel="stylesheet" type="text/css">
    <link href="/app/css/toastr.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

    @toastr_css
    {{--ا--}}
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <style>
        .toast-message {
            font-size: 20px;
        }
    </style>

    <style>
        .main-icon-menu {
            overflow: scroll !important;
        }
        .dataTables_info {
            font-family: BYekan !important;
        }
        .custom-select {
            font-family: BYekan !important;
        }
        .page-link {
            font-family: BYekan !important;
        }
        /* .slimScrollDiv{
              height: 65px!important;
        } */
        .notification-list {
            height: 69px!important;
        }
    </style>
</head>

<body>
<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left"><a href="/" class="logo"><span><img src="/dashboard/assets/images/logo-sm.png" alt="logo-small" class="logo-sm"> </span><span><img src="/dashboard/assets/images/logo-dark.png" alt="logo-large"
                                                                                                                                                                class="logo-lg"></span></a></div>
    <!--end logo-->
    <!-- Navbar -->
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-right mb-0">
            <li class="dropdown notification-list"><a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i
                            class="dripicons-bell noti-icon"></i>
                    @if(\auth()->user()->notifications->where('read_at', null)->count() > 0)
                        <span class="badge badge-danger badge-pill noti-icon-badge BYekan">{{ \auth()->user()->notifications->where('read_at', null)->count() }}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-lg">
                    <!-- item-->
                    <h6 class="dropdown-item-text BYekan">{{ __('dashboard-layouts-master.headerelaan') }} ({{ \auth()->user()->notifications->where('read_at', null)->count() }})</h6>
                    @foreach (\auth()->user()->notifications->where('read_at', null) as $notification)
                        <div class="slimscroll notification-list border">
                            <!-- item-->
                            <a href="{{ route($notification['data']['url'],'notification') }}" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details">{{ __('dashboard-layouts-master.headerelaanTitle') }}<small class="text-muted">
                                        {{ $notification['data']['message'] }}
                                    </small></p>
                            </a>
                            <small class="text-muted m-2">{{ jdate($notification->created_at) }}</small>

                        </div>
                    @endforeach
                    <form action="{{ route('notification.read-all') }}" method="post" id="readall">
                    @csrf
                    @method('PUT')
                    <!-- All--><a href="javascript:$('#readall').submit();" class="dropdown-item text-center text-primary"><i class="fas fa-check-double ml-1"></i>خوانده شده</a>
                    </form>
                </div>
            </li>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="/dashboard/assets/images/users/noavatar.png"
                                                                                                                                                                                     alt="profile-user" class="rounded-circle"> <span class="ml-1 nav-user-name hidden-sm"> {{ \Auth::user()->firstName . ' ' . \Auth::user()->lastName }} <i class="mdi mdi-chevron-down"></i></span></a>
                <div class="dropdown-menu"><a class="dropdown-item" href="{{ route('setting.index') }}"><i class="dripicons-user text-muted mr-2"></i> {{ __('dashboard-layouts-master.headertanzimaatVaProfileKarbari') }}</a> <a class="dropdown-item" href="{{ route('wallet.index') }}"><i
                                class="dripicons-wallet text-muted mr-2"></i> {{ __('dashboard-layouts-master.headerKifePooleMan') }}</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"><i class="dripicons-exit text-muted mr-2"></i> {{ __('dashboard-layouts-master.headerKhoroojAzSystem') }}</a>
                </div>
            </li>
        </ul>
        <!--end topbar-nav-->
        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="button-menu-mobile nav-link waves-effect waves-light"><i class="dripicons-menu nav-icon"></i></button>
            </li>
            <li class="hide-phone app-search">
                <form action="{{ route('dashboard.products.search') }}" method="post" role="search" class="">
                    @csrf
                    <input type="text" name="title" placeholder="نام محصول ..." value="{{ isset($title) ? $title : '' }}" class="form-control">
                    <a href="javascript:;" class="myClass" onclick="$('#submitBtn').click();"><i style="padding-top: 10px" class="fas fa-search"></i></a>
                    <button type="submit" id="submitBtn" style="display:none;" data-validate="contact-form">Hidden Button</button>

                </form>
            </li>
        </ul>
    </nav>
    <!-- end navbar-->
</div>
<!-- Top Bar End -->
<div class="page-wrapper">
    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <div class="main-icon-menu">
            <nav class="nav">


                <a href="#PayanPayDashboard"
                   class="nav-link {{ request()->is('*verification/sms*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/UserInformation*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/UserInformation*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/index*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/ticket*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/setting*') == 1 ? 'active' : '' }} "
                   data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="{{ __('dashboard-layouts-master.sideBarTitleDashboardAsli') }}">
                    <i style="color: #86a3f7;font-size: 25px" class="  {{ request()->is('dashboard/UserInformation*') == 1 ? 'menu-active' : '' }} {{ request()->is('*verification/sms*') == 1 ? 'menu-active' : '' }} {{ request()->is('dashboard/UserInformation*') == 1 ? 'menu-active' : '' }} {{ request()->is('dashboard/index*') == 1 ? 'menu-active' : '' }} {{ request()->is('dashboard/ticket*') == 1 ? 'menu-active' : '' }} {{ request()->is('dashboard/setting*') == 1 ? 'menu-active' : '' }} mdi mdi-desktop-mac-dashboard"></i>
                </a>


                <a href="#PayanPayPardakhtYari" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="{{ __('dashboard-layouts-master.sideBarTitlePardakhtYari') }}">
                    <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M435.2 80H76.8c-24.9 0-44.6 19.6-44.6 44L32 388c0 24.4 19.9 44 44.8 44h358.4c24.9 0 44.8-19.6 44.8-44V124c0-24.4-19.9-44-44.8-44zm0 308H76.8V256h358.4v132zm0-220H76.8v-44h358.4v44z"></path>
                    </svg>
                </a>


                <a href="#PayanPayShopMaker" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="{{ __('dashboard-layouts-master.sideBarTitleForooshgahSaz') }}">
                    <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                                d="M169.6 377.6c-22.882 0-41.6 18.718-41.6 41.601 0 22.882 18.718 41.6 41.6 41.6s41.601-18.718 41.601-41.6c-.001-22.884-18.72-41.601-41.601-41.601zM48 51.2v41.6h41.6l74.883 151.682-31.308 50.954c-3.118 5.2-5.2 12.482-5.2 19.765 0 27.85 19.025 41.6 44.825 41.6H416v-40H177.893c-3.118 0-5.2-2.082-5.2-5.2 0-1.036 2.207-5.2 2.207-5.2l20.782-32.8h154.954c15.601 0 29.128-8.317 36.4-21.836l74.882-128.8c1.237-2.461 2.082-6.246 2.082-10.399 0-11.446-9.364-19.765-20.8-19.765H135.364L115.6 51.2H48zm326.399 326.4c-22.882 0-41.6 18.718-41.6 41.601 0 22.882 18.718 41.6 41.6 41.6S416 442.082 416 419.2c0-22.883-18.719-41.6-41.601-41.6z">
                        </path>
                    </svg>
                </a>


                <a href="#PayanPayBashgah" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="{{ __('dashboard-layouts-master.sideBarTitleBashgahMoshtarian') }}">
                    <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                                d="M239.208 343.937c-17.78 10.103-38.342 15.876-60.255 15.876-21.909 0-42.467-5.771-60.246-15.87C71.544 358.331 42.643 406 32 448h293.912c-10.639-42-39.537-89.683-86.704-104.063zM178.953 120.035c-58.479 0-105.886 47.394-105.886 105.858 0 58.464 47.407 105.857 105.886 105.857s105.886-47.394 105.886-105.857c0-58.464-47.408-105.858-105.886-105.858zm0 186.488c-33.671 0-62.445-22.513-73.997-50.523H252.95c-11.554 28.011-40.326 50.523-73.997 50.523z">
                        </path>
                        <g>
                            <path
                                    d="M322.602 384H480c-10.638-42-39.537-81.691-86.703-96.072-17.781 10.104-38.343 15.873-60.256 15.873-14.823 0-29.024-2.654-42.168-7.49-7.445 12.47-16.927 25.592-27.974 34.906C289.245 341.354 309.146 364 322.602 384zM306.545 200h100.493c-11.554 28-40.327 50.293-73.997 50.293-8.875 0-17.404-1.692-25.375-4.51a128.411 128.411 0 0 1-6.52 25.118c10.066 3.174 20.779 4.862 31.895 4.862 58.479 0 105.886-47.41 105.886-105.872 0-58.465-47.407-105.866-105.886-105.866-37.49 0-70.427 19.703-89.243 49.09C275.607 131.383 298.961 163 306.545 200z">
                            </path>
                        </g>
                    </svg>

                </a>


                <a href="#PayanPayChargeShopMaker" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="{{ __('dashboard-layouts-master.sideBarTitleForooshgahSazSharzh') }}">
                    <i style="color: #86a3f7;font-size: 25px" class="dripicons-shopping-bag"></i>
                </a>


                <a class="pt-4 pb-4" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="{{ __('dashboard-layouts-master.sideBarTitleModiriatMojtamaHayeMaskooni') }}" target="_blank" href="http://olympictower.ir/login021">
                    <i style="color: #86a3f7;font-size: 25px" class="far fa-building"></i>
                </a>


                <a href="#PayanPayBill" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="{{ __('dashboard-layouts-master.sideBarTitlePardakhtGhobooz') }}">
                    <i style="color: #86a3f7;font-size: 25px" class="fas fa-ticket-alt"></i>

                </a>


                <a href="#PayanPayAvarez" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="{{ __('dashboard-layouts-master.sideBarTitleAvvarezVaBilit') }}">
                    <i style="color: #86a3f7;font-size: 25px" class="fas fa-money-check"></i>

                </a>


                <a href="#PayanPayCheck" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="{{ __('dashboard-layouts-master.sideBarTitleEstelaamCheck') }}">
                    <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                                d="M387.581 139.712L356.755 109 216.913 248.319l30.831 30.719 139.837-139.326zM481.172 109L247.744 340.469l-91.39-91.051-30.827 30.715L247.744 403 512 139.712 481.172 109zM0 280.133L123.321 403l30.829-30.713L31.934 249.418 0 280.133z">
                        </path>
                    </svg>
                </a>


                <a href="#PayanPayTPG" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="{{ __('dashboard-layouts-master.sideBarTitlePardakhteTelephoni') }}">
                    <i style="color: #86a3f7;font-size: 25px" class="fas fa-phone"></i>
                </a>


                <!--end PayanPayAuthentication-->
            </nav>
            <!--end nav-->
        </div>
        <!--end main-icon-menu-->
        <div class="main-menu-inner">
            <div class="menu-body slimscroll">
                <div id="PayanPayDashboard" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">داشبورد اصلی</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item "><a style="color: red" class="nav-link {{ request()->is('dashboard/UserInformation*') == 1 ? 'active' : '' }} {{ request()->is('*verification/sms*') == 1 ? 'active' : '' }}" href="{{ route('UserInformation.index') }}"><i class="dripicons-meter"></i>تکمیل اطلاعات و احراز هویت</a></li>
                        <li class="nav-item "><a class="nav-link {{ request()->is('dashboard/index*') == 1 ? 'active' : '' }}" href="{{ route('index.index') }}"><i class="dripicons-user-group"></i>داشبورد گزارشات کلی</a></li>
                        <li class="nav-item"><a class="nav-link  {{ request()->is('dashboard/ticket*') == 1 ? 'active' : '' }}" href="{{ route('ticket.index') }}"><i class="dripicons-document"></i>پشتیبانی و تیکتینگ</a></li>
                        <li class="nav-item "><a class="nav-link {{ request()->is('dashboard/setting*') == 1 ? 'active' : '' }}" href="{{ route('setting.index') }}"><i class="dripicons-document"></i>تنظیمات و پروفایل کاربری</a></li>
                        <li class="nav-item"><a target="_blank" class="nav-link" href="/docs"><i class="mdi mdi-code-tags-check"></i>مستندات و آموزش</a></li>
                    </ul>
                </div>
                <!-- end Analytic -->
                <div id="PayanPayPardakhtYari" class="main-icon-menu-pane {{ request()->is('*payment*') == 1 ? 'active' : '' }}">
                    <div class="title-box">
                        <h6 class="menu-title">پرداخت یاری</h6>
                    </div>
                    <ul class="nav">
                        {{-- <li class="nav-item"><a class="nav-link" href=""><i class="dripicons-device-desktop"></i>داشبورد گزارشات</a></li>--}}
                        <li class="nav-item"><a class="nav-link  {{ request()->is('dashboard/gateway*') == 1 ? 'active' : '' }}" href="{{ route('gateway.index') }}"><i class="fab fa-cc-amazon-pay"></i>درگاه های پرداخت</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('dashboard/wallet*') == 1 ? 'active' : '' }} " href="{{ route('wallet.index') }}"><i class="mdi mdi-wallet"></i>کیف پول های شما</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('dashboard/card*') == 1 ? 'active' : '' }}" href="{{ route('card.index') }}"><i class="fas fa-credit-card"></i>کارت های بانکی</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('dashboard/checkout*') == 1 ? 'active' : '' }}" href="{{ route('checkout.index') }}"><i class="fas fa-credit-card"></i>لیست درخواست های تسویه</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('dashboard/fast-pay*') == 1 ? 'active' : '' }}" href="{{ route('fast-pay.index') }}"><i class="fas fa-credit-card"></i>لینک های پرداخت آنی</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('dashboard/sharing*') == 1 ? 'active' : '' }}" href="{{ route('sharing.index') }}"><i class="fas fa-credit-card"></i>تسهیم وجوه</a></li>
                    </ul>
                </div>
                <!-- end Crypto -->
                <div id="PayanPayShopMaker" class="main-icon-menu-pane {{ request()->is('*shop*') == 1 ? 'active' : '' }}">
                    <div class="title-box">

                        <h6 class="menu-title">{{ __('dashboard-layouts-master.forooshgahSazSideBarPageTitle') }}</h6>
                    </div>
                    @if (\Auth::user()->shop()->count() != 0)
                        <li class="nav-item bg-light p-2 pr-4 mb-2 mt-2"><a class="nav-link" target="_blank" href="{{ route('shop', \Auth::user()->shop()->first()->english_name) }}"><i class="fa fa-eye"></i> {{ __('dashboard-layouts-master.forooshgahSazSideBarShow') }} </a></li>
                        <li class="nav-item bg-primary p-2 pr-4 mb-2 mt-2 rounded"><a class="nav-link text-white iranyekan font-weight-bolder" href="{{ request()->is('*application*') != 1 ? route('application.index') : '#' }}"><i class="fas fa-arrow-alt-circle-down	text-white"></i> درخواست اپلیکیشن </a></li>
                    @endif
                    <ul class="nav">
                        @if (\Auth::user()->shop()->count() == 0)
                            @if(\Auth::user()->type == 'user')
                                <li class="nav-item"><a class="nav-link " href="{{ route('shop-setting.index') }}"><i class="dripicons-jewel"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarIjadForooshgah') }}</a></li>
                            @endif
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.index') }}"><i class="dripicons-view-thumb"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarDashboard') }}</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->is('*galleries*') == 1 ? 'active' : '' }}" href="{{ route('product-list.index') }}"><i class="dripicons-user-id"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarListKalaha') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('product-comments.index') }}"><i class="fa fa-comments"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarNazaraat') }}</a></li>
                            <li class="nav-item"><a class="nav-link icon-hover" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory"><i class="far fa-edit"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarModiriatDasteBandiha') }}</a></li>
                            <div class="collapse mr-4 {{ request()->is('*categrory-managment*') == 1 ? 'show' : '' }}" id="collapseCategory">
                                <li class="nav-item"><a class="nav-link" href="{{ route('product-category.index') }}"><i class="fa fa-copy"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarEzafeKardaneDasteBandi') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('specification.index') }}"><i class="fa fa-list-alt"></i>خصوصیات محصولات</a></li>
                            </div>
                            <li class="nav-item"><a class="nav-link" href="{{ route('brand.index') }}"><i class="fa fa-calendar"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarBrand') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('vouchers.index') }}"><i class="mdi mdi-gift"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarCodeTakhfif') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('vouchers.voucher-report') }}"><i class="fa fa-check-square"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarGozareshCodeTakhfif') }}</a></li>
                            <li class="nav-item"><a class="nav-link icon-hover" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="far fa-edit"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarModiriatForooshgah') }}</a></li>
                            <div class="collapse mr-4 {{ request()->is('*managment*') == 1 ? 'show' : '' }}" id="collapseExample">
                                <li class="nav-item"><a class="nav-link" href="{{ route('shop-setting.index') }}"><i class="dripicons-jewel"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarTanzimaatForooshgah') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('faq.index') }}"><i class="fa fa-question-circle"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarFAQ') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('slideshow.index') }}"><i class="fa fa-clone"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarSlider') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('feedback.index') }}"><i class="dripicons-calendar"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarFeedback') }}</a></li>
                            </div>

                            <li class="nav-item"><a class="nav-link icon-hover" data-toggle="collapse" data-target="#collapsepurchases" aria-expanded="false" aria-controls="collapsepurchases"><i class="fa fa-clone"></i>مدیریت سفارشات</a></li>
                            <div class="collapse mr-4 {{ request()->is('*purchases-managment*') == 1 ? 'show' : '' }}" id="collapsepurchases">
                                <li class="nav-item"><a class="nav-link" href="{{ route('purchases.index') }}"><i class="fa fa-clipboard"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarVaziaatSefaareshaat') }} </a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('download-link-request-status.index') }}" style="font-size:12px;"><i class="far fa-arrow-alt-circle-down"></i>درخواست های لینک دانلود</a></li>
                            </div>

                            <li class="nav-item"><a class="nav-link" href="{{ route('stats.index') }}"><i class="fas fa-chart-bar"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarAmaarBazdid') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i>{{ __('dashboard-layouts-master.forooshgahSazSideBarModiriatKarbaraan') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('user-panel.index') }}"><i class="far fa-clipboard"></i>پنل کاربری</a></li>
                        @endif


                    </ul>
                    </li>

                    </ul>
                </div>
                <!-- end  Project-->
                <div id="PayanPayBashgah" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">باشگاه مشتریان</h6>
                    </div>
                    <ul class="nav">
                    </ul>
                </div>
                <!-- end Ecommerce -->


                <div id="PayanPayChargeShopMaker" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">فروشگاه ساز شارژ</h6>
                    </div>
                    <ul class="nav">
                    </ul>
                </div>
                <!-- end CRM -->


                <div id="PayanPayBill" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">پرداخت قبوض</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('bill.index') }}"><i class="dripicons-jewel"></i>ثبت قبض</a></li>

                    </ul>
                </div>
                <!-- end CRM -->


                <div id="PayanPayAvarez" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">پرداخت عوارض و فروش بلیط</h6>
                    </div>
                    <ul class="nav">
                    </ul>
                </div>
                <!-- end CRM -->

                <div id="PayanPayCheck" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">استعلام چک</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('chequeInquiry.index') }}"><i class="dripicons-jewel"></i>ثبت و بررسی چک</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('chequeInquiry.index') }}"><i class="dripicons-jewel"></i>لیست چک های ثبت شده</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('chequeInquiry.index') }}"><i class="dripicons-jewel"></i>تنظیمات یادآوری</a></li>
                    </ul>
                </div>
                <!-- end Check -->



                <div id="PayanPayTPG" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">پرداخت تلفنی</h6>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('tpg.index') }}"><i class="dripicons-jewel"></i>لیست تماس ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('tpg.index') }}"><i class="dripicons-jewel"></i>لیست پرداخت ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('tpg.index') }}"><i class="dripicons-jewel"></i>تنظیمات </a></li>

                    </ul>
                </div>
                <!-- end TPG -->




            </div>
            <!--end menu-body-->
        </div>
        <!-- end main-menu-inner-->
    </div>
    <!-- end left-sidenav-->

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page-Title -->
        @yield('content')

        <!--end row-->
        </div>
        <!-- container -->
        <footer class="footer text-center text-sm-left">&copy; {{ __('dashboard-layouts-master.footerRightCopyRighr') }}. <span class="text-muted d-none d-sm-inline-block float-right">{{ __('dashboard-layouts-master.leftDevelopeTeam') }} </span></footer>
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
<!-- jQuery  -->

<script src="/dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="/dashboard/assets/js/metisMenu.min.js"></script>
<script src="/dashboard/assets/js/waves.min.js"></script>
<script src="/dashboard/assets/js/jquery.slimscroll.min.js"></script>
<script src="/dashboard/assets/plugins/moment/moment.js"></script>
<script src="/dashboard/assets/js/bootstrap-editable.min.js"></script>
<script src="/dashboard/assets/js/jquery.form-xeditable.init.js"></script>
<script src="/dashboard/assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/dashboard/assets/pages/jquery.eco_dashboard.init.js"></script>
<script src="/dashboard/assets/js/jquery.form-wizard.init.js"></script>
<script src="/dashboard/assets/js/jquery.steps.min.js"></script>
<!-- App js -->
<script src="/dashboard/assets/js/app.js"></script>
<script src="/dashboard/assets/js/sweetalert.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
<script src="/dashboard/assets/plugins/dropify/js/dropify.min.js"></script>
<script src="/dashboard/assets/pages/jquery.form-upload.init.js"></script>
<script>
    $('#myInputTextField').keyup(function() {
        oTable.search($(this).val()).draw();
    })
</script>
@toastr_js
@toastr_render
@include('sweet::alert')
@yield('pageScripts')
</body>

</html>
