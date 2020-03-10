@yield('headerStyles')
<html class="no-js" lang="fa">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="/app/css/vendor.bundlee332.css?ver=161">
    <link rel="stylesheet" href="/app/css/stylee332.css?ver=161">
    <link rel="stylesheet" href="/app/css/rtle332.css?ver=161">
    <link href="/app/shop/2/font/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/app/shop/1/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="/app/shop/1/assets/js/jquery.min.js"></script>
    <link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/app/shop/2/css/master.css') }}" />

</head>
<style>
    body {
        margin: auto;
        font-size: 16px;
        font-weight: 500;
    }

    th,
    td {
        font-family: iranyekan !important;
    }

    .tt-table-shop-01 thead th {
        font-size: 18px !important;
    }

    .btn {
        font-size: 16px !important;
    }
    .bg-fanavar{
      background-color: #163395!important;
    }
    .navbar{
          padding: 2.5rem 3rem!important;
    }
    .contact-icon {
height: 43px;
width: 55px;
font-size: 23px;
line-height: 38px;
text-align: center;
color: #fff;
background: #23c99d;
box-shadow: 0px 2px 15px 0px rgba(35,201,157,0.5);
border-radius: 50%;
margin-right: 15px;
flex-shrink: 0;
}
.contact-list li {

font-size: 21px;
}
.contact-list li {

padding-top: 35.5px;

}
    .demo-panel {
        display: none !important;
    }

    .promo-content {
        display: none !important;
    }

    .promo-trigger {
        display: none !important;
    }
    .is-transparent .banner-fs {
        min-height: 30vh;
    }
    .toast-message{
      line-height: 29px!important;
    }
</style>
@toastr_css

<body class="nk-body body-wider bg-light has-rtl" dir="rtl">
    <style>
        .toast-message {
            font-size: 20px;
        }
    </style>
    <header class="nk-header page-header is-transparent is-sticky is-shrink" id="header">
        <!-- Header @s -->
        <div class="header-main">
            <div class="header-container container">
                <div class="header-wrap">
                    <!-- Logo @s -->
                    <div class="header-logo logo animated" data-animate="fadeInDown" data-delay=".6">
                        <a href="/" class="logo-link">
                            <img class="logo-dark" src="/app/images/logo.png" srcset="/app/images/logo.png 2x" alt="logo">
                            <img class="logo-light" src="/app/images/logo.png" srcset="/app/images/logo.png 2x" alt="logo">
                        </a>
                    </div>

                    <!-- Menu Toogle @s -->
                    <div class="header-nav-toggle">
                        <a href="/" class="navbar-toggle" data-menu-toggle="header-menu">
                            <div class="toggle-line">
                                <span></span>
                            </div>
                        </a>
                    </div>

                    <!-- Menu @s -->
                    <div class="header-navbar animated" data-animate="fadeInDown" data-delay=".75">
                        <nav class="header-menu mr-5" id="header-menu">
                            <ul class="menu">
                                <li class="menu-item">
                                    <a class="menu-link nav-link" href="{{ route('index') }}">{{ __('index.menu1') }}</a>
                                </li>

                                <li class="menu-item"> <a href="#about" class="menu-link nav-link">{{ __('index.menu2') }}م </a> </li>

                                <li class="menu-item">
                                    <a class="menu-link nav-link" href="#services"> {{ __('index.menu3') }}</a>
                                </li>


                                <li class="menu-item">
                                    <a class="menu-link nav-link" target="_blank" href="/shops">{{ __('index.menu4') }}</a>
                                </li>

                                <li class="menu-item">
                                    <a class="menu-link nav-link" target="_blank" href="/products">{{ __('index.menu5') }}</a>
                                </li>


                                <li class="menu-item">
                                    <a class="menu-link nav-link" href="#faq">{{ __('index.menu6') }}</a>
                                </li>


                                <li class="menu-item">
                                    <a class="menu-link nav-link" href="#contact">{{ __('index.menu7') }}</a>
                                </li>


                            </ul>
                            <ul class="menu-btns">
                              @if(\auth::user()->type == 'customer')
                                <li><a href="{{ url('/'.$shop->english_name) }}" class="btn btn-md btn-auto btn-grad"><span>فروشگاه</span></a></li>
                              @else
                                <li><a href="{{ route('dashboard.index') }}" class="btn btn-md btn-auto btn-grad"><span>پنل مدیریت</span></a></li>
                              @endif
                              <li><a href="{{ route('logout') }}" class="btn btn-md btn-auto btn-grad"><span>خروج</span></a></li>



                            </ul>
                        </nav>
                    </div><!-- .header-navbar @e -->
                </div>
            </div>
        </div><!-- .header-main @e -->

        <!-- Banner @s -->
        <div class="header-banner bg-theme-grad">
            <div class="nk-banner">
                <div class="banner-fs">

                </div>
            </div><!-- .nk-banner -->
            <div class="nk-ovm mask-a shape-a"></div>

            <!-- Place Particle Js -->

        </div>
        <!-- .header-banner @e -->
    </header>

                <!-- Page-Title -->
                @yield('content')
                <!--end row-->
            </div>

                    <footer id="contact" class="nk-footer bg-theme-grad">

                        <!-- // -->
                        <section class="section section-footer section-l tc-light bg-transparent">

                            <div class="container">
                                <!-- Block @s -->
                                <div class="nk-block block-footer">
                                    <div class="row">


                                        <div class="col-lg-2 col-sm-4 mb-4 mb-sm-0">
                                            <div class="wgs wgs-menu animated" data-animate="fadeInUp" data-delay=".3">
                                                <h6 class="wgs-title">{{ __('index.linkHayePorKarbordTitle') }}</h6>
                                                <div class="wgs-body">
                                                    <ul class="wgs-links">
                                                        <li><a target="_blank" href="{{ route('terms') }}">{{ __('index.linkHayePorKarbordItem1') }}</a></li>
                                                        <li><a target="_blank" href="/app//docs">{{ __('index.linkHayePorKarbordItem2') }}</a></li>
                                                        <li><a target="_blank" href="/app//docs">{{ __('index.linkHayePorKarbordItem3') }}</a></li>
                                                        <li><a href="/app/#faq">{{ __('index.linkHayePorKarbordItem4') }}</a></li>
                                                        <li><a href="/lang/fa">فارسی</a></li>
                                                        <li><a href="/lang/ar">عربی</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .col -->

                                        <div class="col-lg-6 mb-4 mb-lg-0 order-lg-first">
                                            <div class="wgs wgs-text animated" data-animate="fadeInUp" data-delay=".1">
                                                <div class="wgs-body">
                                                    <a href="/" class="wgs-logo">
                                                        <img src="/app/images/logo.png" srcset="/app/images/logo.png 2x" alt="logo">
                                                    </a>
                                                    <p style="font-family: BYekan!important;">{{ __('index.FooterTitle') }}</p>
                                                    <p class="copyright-text">{{ __('index.FooterDesc') }}</p>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .block @e -->
                            </div>

                        </section>
                        <div class="nk-ovm shape-b"></div>
                    </footer>
                </div>

                <!-- JavaScript -->
                <script src="/app/js/jquery.bundlee332.js?ver=161"></script>
                <script src="/app/js/scriptse332.js?ver=161"></script>
                <script src="/app/js/charts.js"></script>
                <script src="{{url('stats/script.js')}}"></script>
                <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
                <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
                <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
                <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
                <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
                </html>
            </body>

            </html>
