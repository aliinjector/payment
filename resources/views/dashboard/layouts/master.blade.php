<!--
Author: Ali Rahmani
-->

@yield('headerStyles')


        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>پایان پی - داشبورد اصلی</title>
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
    <style>
        .main-icon-menu{
            overflow: scroll!important;
        }
    </style>
</head>

<body>
<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left"><a href="/" class="logo"><span><img src="/dashboard/assets/images/logo-sm.png" alt="logo-small" class="logo-sm"> </span><span><img src="/dashboard/assets/images/logo-dark.png" alt="logo-large" class="logo-lg"></span></a></div>
    <!--end logo-->
    <!-- Navbar -->
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-right mb-0">

            <li class="dropdown notification-list"><a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="dripicons-bell noti-icon"></i> <span class="badge badge-danger badge-pill noti-icon-badge">۲</span></a>
                <div class="dropdown-menu dropdown-lg">
                    <!-- item-->
                    <h6 class="dropdown-item-text">اعلان (۲)</h6>
                    <div class="slimscroll notification-list">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details">متن اعلان<small class="text-muted">توضیحات اعلان</small></p>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                            <p class="notify-details">متن اعلان<small class="text-muted">توضیحات اعلان</small></p>
                        </a>
                        <!-- item-->
                    </div>
                    <!-- All--><a href="javascript:void(0);" class="dropdown-item text-center text-primary">مشاهده همه <i class="fi-arrow-right"></i></a></div>
            </li>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="/dashboard/assets/images/users/noavatar.png" alt="profile-user" class="rounded-circle"> <span class="ml-1 nav-user-name hidden-sm"> {{ \Auth::user()->firstName . ' ' . \Auth::user()->lastName }} <i class="mdi mdi-chevron-down"></i></span></a>
                <div class="dropdown-menu"><a class="dropdown-item" href="{{ route('setting.index') }}"><i class="dripicons-user text-muted mr-2"></i> تنظیمات و پروفایل کاربری</a> <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted mr-2"></i> کیف پول من</a> <a class="dropdown-item" href="#"><i class="dripicons-gear text-muted mr-2"></i> تنظیمات حساب </a> <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted mr-2"></i> قفل </a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"><i class="dripicons-exit text-muted mr-2"></i> خروج از سیستم</a></div>
            </li>
        </ul>
        <!--end topbar-nav-->
        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="button-menu-mobile nav-link waves-effect waves-light"><i class="dripicons-menu nav-icon"></i></button>
            </li>
            <li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" placeholder="جستجو ..." class="form-control"> <a href="#"><i class="fas fa-search"></i></a></form>
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

                <a href="#Dashboard" class="nav-link {{ request()->is('dashboard/UserInformation*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/UserInformation*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/index*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/ticket*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/setting*') == 1 ? 'active' : '' }} " data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="داشبورد اصلی">
                    <i style="color: #86a3f7;font-size: 25px" class="mdi mdi-desktop-mac-dashboard"></i>
                </a>

                <a href="#PardakhtYari" class="nav-link {{ request()->is('dashboard/wallet*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/card*') == 1 ? 'active' : '' }}  " data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="پرداخت یاری">
                    <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M435.2 80H76.8c-24.9 0-44.6 19.6-44.6 44L32 388c0 24.4 19.9 44 44.8 44h358.4c24.9 0 44.8-19.6 44.8-44V124c0-24.4-19.9-44-44.8-44zm0 308H76.8V256h358.4v132zm0-220H76.8v-44h358.4v44z"></path></svg>
                </a>
                <!--end PayanPayAnalytic-->

                <a href="#PayanPayCrypto" class="nav-link {{ request()->is('dashboard/shop*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/product-list*') == 1 ? 'active' : '' }} {{ request()->is('dashboard/product-category*') == 1 ? 'active' : '' }} " data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="فروشگاه ساز">
                    <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M169.6 377.6c-22.882 0-41.6 18.718-41.6 41.601 0 22.882 18.718 41.6 41.6 41.6s41.601-18.718 41.601-41.6c-.001-22.884-18.72-41.601-41.601-41.601zM48 51.2v41.6h41.6l74.883 151.682-31.308 50.954c-3.118 5.2-5.2 12.482-5.2 19.765 0 27.85 19.025 41.6 44.825 41.6H416v-40H177.893c-3.118 0-5.2-2.082-5.2-5.2 0-1.036 2.207-5.2 2.207-5.2l20.782-32.8h154.954c15.601 0 29.128-8.317 36.4-21.836l74.882-128.8c1.237-2.461 2.082-6.246 2.082-10.399 0-11.446-9.364-19.765-20.8-19.765H135.364L115.6 51.2H48zm326.399 326.4c-22.882 0-41.6 18.718-41.6 41.601 0 22.882 18.718 41.6 41.6 41.6S416 442.082 416 419.2c0-22.883-18.719-41.6-41.601-41.6z"></path></svg>
                </a>
                <!--end PayanPayCrypto-->

                <a href="#PayanPayProject" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="باشگاه مشتریان">
                    <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M239.208 343.937c-17.78 10.103-38.342 15.876-60.255 15.876-21.909 0-42.467-5.771-60.246-15.87C71.544 358.331 42.643 406 32 448h293.912c-10.639-42-39.537-89.683-86.704-104.063zM178.953 120.035c-58.479 0-105.886 47.394-105.886 105.858 0 58.464 47.407 105.857 105.886 105.857s105.886-47.394 105.886-105.857c0-58.464-47.408-105.858-105.886-105.858zm0 186.488c-33.671 0-62.445-22.513-73.997-50.523H252.95c-11.554 28.011-40.326 50.523-73.997 50.523z"></path><g><path d="M322.602 384H480c-10.638-42-39.537-81.691-86.703-96.072-17.781 10.104-38.343 15.873-60.256 15.873-14.823 0-29.024-2.654-42.168-7.49-7.445 12.47-16.927 25.592-27.974 34.906C289.245 341.354 309.146 364 322.602 384zM306.545 200h100.493c-11.554 28-40.327 50.293-73.997 50.293-8.875 0-17.404-1.692-25.375-4.51a128.411 128.411 0 0 1-6.52 25.118c10.066 3.174 20.779 4.862 31.895 4.862 58.479 0 105.886-47.41 105.886-105.872 0-58.465-47.407-105.866-105.886-105.866-37.49 0-70.427 19.703-89.243 49.09C275.607 131.383 298.961 163 306.545 200z"></path></g></svg>
                </a>
                <!--end PayanPayProject-->

                <a href="#PayanPayEcommerce" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="فروش شارژ">
                    <i style="color: #86a3f7;font-size: 25px" class="dripicons-shopping-bag"></i>
                </a>
                <!--end PayanPayEcommerce-->

                <a href="#PayanPayCRM" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="پرداخت قبوض">
                    <i style="color: #86a3f7;font-size: 25px" class="fas fa-ticket-alt"></i>
                </a>

                <!--end PayanPayCRM-->
                <a href="#PayanPayOthers" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="پرداخت عوارض و فروش بلیط">
                    <i style="color: #86a3f7;font-size: 25px" class="fas fa-money-check"></i>
                </a>
                <!--end PayanPayOthers-->
{{--                <a href="#PayanPayPages" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="شارژ ساختمان">--}}
{{--                    <i style="color: #86a3f7;font-size: 25px" class="far fa-building"></i>--}}
{{--                </a>--}}

                <a class="pt-4" target="_blank" href="http://olympictower.ir/login"  >
                    <i style="color: #86a3f7;font-size: 25px" class="far fa-building"></i>
                </a>

                <!--end PayanPayPages-->
                <a href="#PayanPayAuthentication" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="استعلام چک">
                    <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M387.581 139.712L356.755 109 216.913 248.319l30.831 30.719 139.837-139.326zM481.172 109L247.744 340.469l-91.39-91.051-30.827 30.715L247.744 403 512 139.712 481.172 109zM0 280.133L123.321 403l30.829-30.713L31.934 249.418 0 280.133z"></path></svg>
                </a>


                <a href="#PayanPayTpg" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="پرداخت تلفنی">
                    <i style="color: #86a3f7;font-size: 25px" class="fas fa-phone"></i>
                </a>
                <!--end PayanPayTpg-->


            </nav>
            <!--end nav-->
        </div>
        <!--end main-icon-menu-->
        <div class="main-menu-inner">
            <div class="menu-body slimscroll">

                <div id="PardakhtYari" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">پرداخت یاری</h6></div>
                    <ul class="nav">
                        {{--<li style="display: none;" class="nav-item"><a class="nav-link" href=""><i class="mdi mdi-chart-bar"></i>داشبورد گزارشات</a></li>--}}
                        <li class="nav-item {{ request()->is('dashboard/wallet*') == 1 ? 'active' : '' }} "><a class="nav-link {{ request()->is('dashboard/wallet*') == 1 ? 'active' : '' }} " href="{{ route('wallet.index') }}"><i class="mdi mdi-wallet"></i>کیف پول های شما</a></li>
                        <li class="nav-item"><a class="nav-link" href=""><i class="fab fa-cc-amazon-pay"></i>درگاه های پرداخت</a></li>
                        {{--<li class="nav-item"><a class="nav-link" href=""><i class="far fa-money-bill-alt"></i>درخواست تسویه حساب</a></li>--}}
                        <li class="nav-item {{ request()->is('dashboard/card*') == 1 ? 'active' : '' }}"><a class="nav-link {{ request()->is('dashboard/card*') == 1 ? 'active' : '' }}" href="{{ route('card.index') }}"><i class="fas fa-credit-card"></i>کارت های بانکی</a></li>
                        {{--<li class="nav-item"><a class="nav-link" href=""><i class="fab fa-cc-amazon-pay"></i>لینک پرداخت آنی</a></li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href=""><i class="mdi mdi-percent"></i>کد تخفیف</a></li>--}}
                        <li class="nav-item"><a class="nav-link" href=""><i class="mdi mdi-code-tags-check"></i>سورس کدها</a></li>
                        <li class="nav-item"><a class="nav-link" href=""><i class="mdi mdi-school"></i>آموزش</a></li>
                    </ul>
                </div>


                <div id="Dashboard" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">داشبورد پایان پی</h6></div>
                    <ul class="nav">
                        <li class="nav-item {{ request()->is('dashboard/UserInformation*') == 1 ? 'active' : '' }}"><a style="color: #f1646c" class="nav-link {{ request()->is('dashboard/UserInformation*') == 1 ? 'active' : '' }} " href="{{ route('UserInformation.index') }}"><i style="color: #f1646c!important" class="mdi mdi-lock-alert"></i>تکمیل اطلاعات و احراز هویت</a></li>
                        <li class="nav-item {{ request()->is('dashboard/index*') == 1 ? 'active' : '' }}"><a class="nav-link {{ request()->is('dashboard/index*') == 1 ? 'active' : '' }}" href="{{ route('index.index') }}"><i class="mdi mdi-school"></i>داشبورد گزارشات کلی</a></li>
                        <li class="nav-item {{ request()->is('dashboard/ticket*') == 1 ? 'active' : '' }}"><a class="nav-link {{ request()->is('dashboard/ticket*') == 1 ? 'active' : '' }} " href="{{ route('ticket.index') }}"><i class="mdi mdi-school"></i>پشتیبانی و تیکتینگ</a></li>
                        <li class="nav-item  {{ request()->is('dashboard/setting*') == 1 ? 'active' : '' }} "><a class="nav-link {{ request()->is('dashboard/setting*') == 1 ? 'active' : '' }} " href="{{ route('setting.index') }}"><i class="mdi mdi-school"></i>تنظیمات و پروفایل کاربری</a></li>
                    </ul>
                </div>




                <!-- end Analytic -->
                <div id="PayanPayCrypto" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">فروشگاه ساز</h6></div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="shop"><i class="dripicons-device-desktop"></i>گزارشات فروشگاه شما</a></li>
                        <li class="nav-item"><a class="nav-link" href="product-list"><i class="dripicons-device-desktop"></i>لیست کالاها / خدمات</a></li>
                        <li class="nav-item"><a class="nav-link" href="product-detail"><i class="dripicons-device-desktop"></i>جزئیات محصول</a></li>
                        <li class="nav-item"><a class="nav-link" href="product-category"><i class="dripicons-device-desktop"></i> محصولات هر دسته بندی
                        </a></li>
                        <li class="nav-item"><a class="nav-link" href="jj"><i class="dripicons-device-desktop"></i>تنظیمات فروشگاه</a></li>
                    </ul>
                </div>
                <!-- end Crypto -->
                <div id="PayanPayProject" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">باشگاه مشتریان</h6></div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>داشبورد</a></li>
                    </ul>
                </div>
                <!-- end  Project-->
                <div id="PayanPayEcommerce" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">فروش شارژ</h6></div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>داشبورد</a></li>
                    </ul>
                </div>
                <!-- end Ecommerce -->
                <div id="PayanPayCRM" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">پرداخت قبوض</h6></div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>داشبورد</a></li>
                    </ul>
                </div>
                <!-- end CRM -->
                <div id="PayanPayOthers" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title"> پرداخت عوارض و فروش بلیط </h6></div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>داشبورد</a></li>
                    </ul>
                    <!--end nav-->
                </div>
                <!-- end Others -->
                <div id="PayanPayPages" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">شارژ ساختمان</h6></div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>داشبورد گزارشات</a></li>
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>لیست واحد ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>افزودن واحد</a></li>
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>تنظیمات شارژ ساختمان</a></li>
                    </ul>
                </div>
                <!-- end Pages -->
                <div id="PayanPayAuthentication" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title"> استعلام چک</h6></div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>لیست چک ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>افزودن چک</a></li>
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>تنظیمات یادآوری</a></li>
                    </ul>
                </div>

                <div id="PayanPayTpg" class="main-icon-menu-pane">
                    <div class="title-box">
                        <h6 class="menu-title">  پرداخت تلفنی (TPG) </h6></div>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>لیست پرداخلی ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="crm-index.html"><i class="dripicons-monitor"></i>تنظیمات پرداخت تلفنی</a></li>
                    </ul>
                </div>


                <!-- end Authentication-->
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

<script>
    $(window).on('load', function() {

        if (window.location.href.indexOf("wallet") == -1) {
            $('#PardakhtYari').removeClass("active");
            $("a[href$='PardakhtYari']").removeClass("active");

        }
        if (window.location.href.indexOf("card") == -1) {
            $('#PardakhtYari').removeClass("active");
            $("a[href$='PardakhtYari']").removeClass("active");
        }



        if (window.location.href.indexOf("wallet") > -1) {
            $('#PardakhtYari').addClass("active");
            $("a[href$='PardakhtYari']").addClass("active");

        }
        if (window.location.href.indexOf("card") > -1) {
            $('#PardakhtYari').addeClass("active");
            $("a[href$='PardakhtYari']").addClass("active");
        }



        });

</script>
</body>

</html>


