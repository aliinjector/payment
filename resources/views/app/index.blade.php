<!DOCTYPE html>
<html class="no-js" lang="fa">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="author" content="Setareh Nooran Co. Ali Rahmani">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="سیستم فروشگاه ساز امید">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="/app/images/favicon.png">
    <!-- Site Title  -->
    <title>سیستم فروشگاه ساز امید</title>
    <!-- Bundle and Base CSS -->
    <link rel="stylesheet" href="/app/css/vendor.bundlee332.css?ver=161">
    <link rel="stylesheet" href="/app/css/stylee332.css?ver=161">
    <!-- Color Scheme CSS -->
    <link rel="stylesheet" href="/app/css/themee332.css?ver=161" id="theming">
    <!-- RTL Styles -->
    <link rel="stylesheet" href="/app/css/rtle332.css?ver=161">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<style>
    .demo-panel {
        display: none !important;
    }

    .promo-content {
        display: none !important;
    }

    .promo-trigger {
        display: none !important;
    }
</style>

<body class="nk-body body-wider bg-light has-rtl" dir="rtl">
    <div class="nk-wrap">
        <header class="nk-header page-header is-transparent is-sticky is-shrink" id="header">
            <!-- Header @s -->
            <div class="header-main">
                <div class="header-container container">
                    <div class="header-wrap">
                        <!-- Logo @s -->
                        <div class="header-logo logo animated" data-animate="fadeInDown" data-delay=".6">
                            <a href="/" class="logo-link">
                                <img class="logo-dark" src="/app/images/logo.png" srcset="images/logo.png 2x" alt="logo">
                                <img class="logo-light" src="/app/images/logo.png" srcset="images/logo.png 2x" alt="logo">
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
                                        <a class="menu-link nav-link" href="#">صفحه اصلی</a>
                                    </li>

                                    <li class="menu-item"> <a href="#about" class="menu-link nav-link"> درباره سیستم </a> </li>
                                    <li class="menu-item">
                                        <a class="menu-link nav-link" href="#services"> خدمات</a>
                                    </li>


                                    <li class="menu-item">
                                        <a class="menu-link nav-link" target="_blank" href="/shops">فروشگاه ها</a>
                                    </li>

                                    <li class="menu-item">
                                        <a class="menu-link nav-link" target="_blank" href="/products">محصولات</a>
                                    </li>


                                    <li class="menu-item">
                                        <a class="menu-link nav-link" href="#faq">سوالات متداول</a>
                                    </li>


                                    <li class="menu-item">
                                        <a class="menu-link nav-link" href="#contact">تماس باما</a>
                                    </li>


                                </ul>
                                <ul class="menu-btns">
                                    <li><a href="{{ route('login') }}" class="btn btn-md btn-auto btn-grad"><span>ورود</span></a></li>
                                    <li><a href="{{ route('register') }}" class="btn btn-md btn-auto btn-grad"><span>عضویت</span></a></li>


                                </ul>
                            </nav>
                        </div><!-- .header-navbar @e -->
                    </div>
                </div>
            </div><!-- .header-main @e -->

            <!-- Banner @s -->
            <div class="header-banner bg-theme-grad">
                <div class="nk-banner">
                    <div class="banner banner-fs banner-single banner-gap-b2">
                        <div class="banner-wrap">
                            <div class="container">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-5 order-lg-last">
                                        <div class="banner-gfx banner-gfx-re-s1 animated" data-animate="fadeInUp" data-delay=".9">
                                            <img src="/app/images/header/gfx-a.png" alt="header">
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-lg-7 col-sm-10 text-center text-lg-left">
                                        <div class="banner-caption cpn tc-light">
                                            <div class="cpn-head">
                                                <h1 class="title animated" data-animate="fadeInUp" data-delay=".1">{{ __('index.title') }}</h1><br class="d-none d-md-block">
                                                <h4 class="title animated" data-animate="fadeInUp" data-delay=".2">{{ __('index.shoar') }}</h4>
                                            </div>
                                            <div class="cpn-text">
                                                <p class="animated" data-animate="fadeInUp" data-delay="2">
                                                    <ul class="list list-check animated" data-animate="fadeInUp" data-delay=".3">
                                                        <li>{{ __('index.ghabeliat1') }}</li>
                                                        <li>{{ __('index.ghabeliat2') }}</li>
                                                        <li>{{ __('index.ghabeliat3') }}</li>
                                                        <li>{{ __('index.ghabeliat4') }}</li>
                                                    </ul>
                                            </div>
                                            <div class="cpn-action">


                                                <div class="cpn-btns animated" data-animate="fadeInUp" data-delay="1.2"> <a class="btn btn-grad" href="{{ route('shops.show') }}">{{ __('index.shopLists') }}</a> <a class="btn btn-grad"
                                                      href="{{ route('products.show') }}">{{ __('index.productSearch') }}</a> </div>
                                                <ul class="cpn-links animated" data-animate="fadeInUp" data-delay="1.3">
                                                    <li><a class="link" href="#steps"><em class="link-icon far fa-file-alt"></em>{{ __('index.ehraz') }}</a></li>
                                                    <li><a class="link" href="#services"><em class="link-icon fas fa-lightbulb"></em>{{ __('index.raahkar') }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-banner -->
                <div class="nk-ovm mask-a shape-a"></div>

                <!-- Place Particle Js -->
                <div id="particles-bg" class="particles-container particles-bg"></div>
            </div>
            <!-- .header-banner @e -->
        </header>

        <main class="nk-pages">
            <section class="section no-pd text-center over-up">
                <ul class="rank-list">
                    <li class="rank-item rank-item1 animated" data-animate="fadeInUp" data-delay=".9">
                        <span style="color: white" class="rank-count">{{ __('index.box1') }}</span>
                    </li>
                    <li class="rank-item rank-item2 animated" data-animate="fadeInUp" data-delay="1">
                        <span style="color: white" class="rank-count">{{ __('index.box2') }}</span>
                    </li>
                    <li class="rank-item rank-item3 animated" data-animate="fadeInUp" data-delay="1.1">
                        <span style="color: white" class="rank-count">{{ __('index.box3') }}</span>
                    </li>
                    <li class="rank-item rank-item4 animated" data-animate="fadeInUp" data-delay="1.2">
                        <span style="color: white" class="rank-count">{{ __('index.box4') }}</span>
                    </li>
                    <li class="rank-item rank-item5 animated" data-animate="fadeInUp" data-delay="1.3">
                        <span style="color: white" class="rank-count">{{ __('index.box5') }}</span>
                    </li>
                    <li class="rank-item rank-item6 animated" data-animate="fadeInUp" data-delay="1.4">
                        <span style="color: white" class="rank-count">{{ __('index.box6') }}</span>
                    </li>
                    <li class="rank-item rank-item7 animated" data-animate="fadeInUp" data-delay="1.5">
                        <div style="color: white" class="rank-count pt-1">{{ __('index.box7') }}</div>
                    </li>
                </ul>
            </section>
            <!-- // -->
            <section id="about" class="section bg-light section-l section-about" id="about">

                <div class="container">
                    <!-- Block @s -->
                    <div class="nk-block nk-block-about">
                        <div class="row align-items-center gutter-vr-30px pdb-l">
                            <div class="col-lg-12 mb-3">
                                <div class="nk-block-text">
                                    <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">{{ __('index.aboutTitle') }}</h2>
                                    <p class="animated" data-animate="fadeInUp" data-delay=".2">
                                        {{ __('index.aboutDesc') }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div><!-- .block @e -->
                    <!-- Section Head @s -->
                    <div class="section-head">
                        <h2 class="title title-lg animated" data-animate="fadeInUp" data-delay=".6">{{ __('index.mazayatitle') }}</h2>
                    </div><!-- .section-head @e -->
                    <!-- Block @s -->
                    <div class="nk-block nk-block-features mgb-m30">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="feature animated" data-animate="fadeInUp" data-delay=".7">
                                    <div class="feature-icon dot">
                                        <em class="icon ikon ikon-paricle-alt"></em>
                                    </div>
                                    <div class="feature-text">
                                        <h5 class="title title-sm">{{ __('index.maziat1title') }}</h5>
                                        <p>
                                            {{ __('index.maziat1') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="feature animated" data-animate="fadeInUp" data-delay=".8">
                                    <div class="feature-icon dot">
                                        <em class="icon ikon ikon-donught"></em>
                                    </div>
                                    <div class="feature-text">
                                        <h5 class="title title-sm">{{ __('index.maziat2title') }}</h5>
                                        <p>
                                            {{ __('index.maziat2') }} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="feature animated" data-animate="fadeInUp" data-delay=".9">
                                    <div class="feature-icon dot">
                                        <em class="icon ikon ikon-document"></em>
                                    </div>
                                    <div class="feature-text">
                                        <h5 class="title title-sm">{{ __('index.maziat3title') }}</h5>
                                        <p>{{ __('index.maziat3') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .block @s -->
                </div>

            </section>
            <!-- // -->
            <section id="steps" class="section section-l section-features bg-white" id="why">

                <div class="container">
                    <!-- Block @s -->
                    <div class="nk-block nk-block-features-s2">
                        <div class="row align-items-center flex-row-reverse">
                            <div class="col-lg-5">
                                <div class="gfx py-4 animated" data-animate="fadeInUp" data-delay=".4">
                                    <img src="/app/images/gfx/gfx-a.png" alt="gfx">
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-7">
                                <!-- Section Head @s -->
                                <div class="section-head">
                                    <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">{{ __('index.marahelTitle') }}</h2>
                                    <p class="animated" data-animate="fadeInUp" data-delay=".2">
                                        {{ __('index.marahelDesc') }}
                                    </p>
                                </div><!-- .section-head @e -->
                                <div class="features-list mr-4 mgb-m30">
                                    <div class="feature feature-s2 animated" data-animate="fadeInUp" data-delay=".4">
                                        <div class="feature-icon dot">
                                            <em class="icon ikon ikon-shiled-alt"></em>
                                        </div>
                                        <div class="feature-text">
                                            <h5 class="title title-sm">{{ __('index.marhale1Title') }}</h5>
                                            <p> {{ __('index.marhale1Desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="feature feature-s2 animated" data-animate="fadeInUp" data-delay=".5">
                                        <div class="feature-icon dot">
                                            <em class="icon ikon ikon-user"></em>
                                        </div>
                                        <div class="feature-text">
                                            <h5 class="title title-sm">{{ __('index.marhale2Title') }}</h5>
                                            <p>{{ __('index.marhale2Desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="feature feature-s2 animated" data-animate="fadeInUp" data-delay=".6">
                                        <div class="feature-icon dot">
                                            <em class="icon ikon ikon-data-server"></em>
                                        </div>
                                        <div class="feature-text">
                                            <h5 class="title title-sm">{{ __('index.marhale3Title') }}</h5>
                                            <p> {{ __('index.marhale3Desc') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>

            </section>
            <!-- // -->
            <section id="services" class="section section-l section-problem bg-light" id="problem">

                <div class="container">
                    <!-- Section Head @s -->
                    <div class="section-head text-center wide-auto-sm">
                        <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">{{ __('index.raahkatHatitle') }}
                        </h2>
                        <p class="animated" data-animate="fadeInUp" data-delay=".2">{{ __('index.raahkatDesc') }}</p>
                    </div><!-- .section-head @e -->
                    <!-- Block @s -->
                    <div class="nk-block nk-block-problems tc-light">
                        <div class="row no-gutters align-items-center">
                            <div class="col-lg-6">
                                <div class="feature boxed boxed-lg bg-theme no-mg split-lg-left split-left animated" data-animate="fadeInUp" data-delay=".3">
                                    <h4 class="title title-md">{{ __('index.raah1Title') }}</h4>
                                    <p>
                                        {{ __('index.raah1Desc') }}
                                    </p>
                                    <ul class="list list-dot">
                                        <li>{{ __('index.raahItem1') }}</li>
                                        <li>{{ __('index.raahItem2') }}</li>
                                        <li>{{ __('index.raahItem3') }}</li>
                                        <li>{{ __('index.raahItem4') }}</li>
                                        <li>{{ __('index.raahItem5') }}</li>
                                        <li>{{ __('index.raahItem6') }}</li>
                                        <li>{{ __('index.raahItem7') }}</li>
                                        <li>{{ __('index.raahItem8') }}</li>
                                    </ul>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-6">
                                <div class="feature-group bg-theme-alt split-right split-lg animated" data-animate="fadeInUp" data-delay=".4">
                                    <div class="feature boxed bg-white-10">
                                        <div class="feature-text">
                                            <h4 class="title title-md">{{ __('index.raah2Title') }}</h4>
                                            <p>
                                                {{ __('index.raah2Desc') }} </p>
                                        </div>
                                    </div>
                                    <div class="feature boxed bg-white-2">
                                        <div class="feature-text">
                                            <h4 class="title title-md"> {{ __('index.raah3Title') }}</h4>
                                            <p>
                                                {{ __('index.raah3Desc') }} </p>

                                        </div>
                                    </div>
                                    <div class="feature boxed bg-black-10">
                                        <div class="feature-text">
                                            <h4 class="title title-md">
                                                {{ __('index.raah4Title') }}
                                            </h4>
                                            <p>
                                                {{ __('index.raah4Desc') }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>

            </section>
            <!-- // -->
            <section class="section section-l section-solution bg-light pt-0" id="solution">

                <div class="container">
                    <!-- Section Head @s -->
                    <div class="section-head text-center wide-auto-sm">
                        <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">{{ __('index.saayerKhadamatTitle') }}</h2>
                        <p class="animated" data-animate="fadeInUp" data-delay=".2">
                            {{ __('index.saayerKhadamatDesc') }}</p>
                    </div><!-- .section-head @e -->
                    <!-- Block @s -->
                    <div class="nk-block nk-block-features-s3 mgb-m40 mgt-m20">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-10">
                                <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp" data-delay=".3">
                                    <div class="feature-icon">
                                        <i class="fa fa-cart-arrow-down
                                              "></i>
                                    </div>
                                    <div class="feature-text">
                                        <h4 class="title title-md title-dark">{{ __('index.khedmat1Title') }}
                                        </h4>
                                        <p>
                                            {{ __('index.khedmat1Desc') }}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-6 col-md-10">
                                <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp" data-delay=".4">
                                    <div class="feature-icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h4 class="title title-md title-dark">{{ __('index.khedmat2Title') }}
                                        </h4>
                                        <p>
                                            {{ __('index.khedmat2Desc') }} </p>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-6 col-md-10">
                                <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp" data-delay=".5">
                                    <div class="feature-icon">
                                        <i class="fa fa-file-text mt-4"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h4 class="title title-md title-dark">{{ __('index.khedmat3Title') }}</h4>
                                        <p>
                                            {{ __('index.khedmat3Desc') }}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- .col -->

                            <div class="col-lg-6 col-md-10">
                                <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp" data-delay=".6">
                                    <div class="feature-icon">
                                        <i class="fa fa-newspaper-o mt-4"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h4 class="title title-md title-dark">{{ __('index.khedmat4Title') }}</h4>
                                        <p>
                                            {{ __('index.khedmat4Desc') }}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-6 col-md-10">
                                <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp" data-delay=".7">
                                    <div class="feature-icon">
                                        <i class="fa fa-line-chart mt-4"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h4 class="title title-md title-dark">

                                            <br>
                                            {{ __('index.khedmat5Title') }}
                                        </h4>
                                        <p>
                                        {{ __('index.khedmat5Desc') }}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-6 col-md-10">
                                <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp" data-delay=".8">
                                    <div class="feature-icon">
                                        <i class="fa fa-instagram mt-4"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h4 class="title title-md title-dark">  {{ __('index.khedmat6Title') }}</h4>
                                        <p>
                                            {{ __('index.khedmat6Desc') }}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>

            </section>


            <section class="bg-theme bg-pattern-dots" id="tokens">

                <div class="section-l section-tokensale tc-light">

                    <div class="container">
                        <!-- Section Head @s -->
                        <div class="section-head text-center wide-auto">
                            <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">{{ __('index.listKhadamatVaEmkanatTitle') }}</h2>
                            <p class="animated" data-animate="fadeInUp" data-delay=".2">
                                {{ __('index.listKhadamatVaEmkanatDesc') }}</p>
                        </div><!-- .section-head @e -->
                        <!-- Block @s -->
                        <div class="nk-block nk-block-token mgb-m30">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".1">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat1') }}</h6>
                                    </div>
                                </div><!-- .col -->

                                <div class="col-lg-6">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".2">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat2') }}</h6>
                                    </div>
                                </div><!-- .col -->







                            </div><!-- .row -->

                            <div class="row">
                                <div class="col-lg-3">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".3">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat3') }} </h6>
                                    </div>
                                </div><!-- .col -->



                                <div class="col-lg-3">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".4">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat4') }} </h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-3">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".5">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat5') }} </h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-3">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".6">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat6') }} </h6>
                                    </div>
                                </div><!-- .col -->

                            </div>



                            <div class="row">


                                <div class="col-lg-3">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".7">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat7') }} </h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-3">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".8">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat8') }}</h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-3">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".9">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat9') }} </h6>
                                    </div>
                                </div><!-- .col -->



                                <div class="col-lg-3">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".10">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat10') }} </h6>
                                    </div>
                                </div><!-- .col -->




                            </div><!-- .row -->



                            <div class="row">

                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".11">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat11') }}</h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".12">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat12') }} </h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".13">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat13') }}</h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".14">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat14') }}</h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".15">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat15') }} </h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".16">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat16') }} </h6>
                                    </div>
                                </div><!-- .col -->








                            </div><!-- .row -->



                            <div class="row">


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".17">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat17') }} </h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".18">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat18') }} </h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".19">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">{{ __('index.KhadamatVaEmkanat19') }} </h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".20">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat20') }} </h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".21">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat21') }} </h6>
                                    </div>
                                </div><!-- .col -->


                                <div class="col-lg-2">
                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".22">
                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> {{ __('index.KhadamatVaEmkanat22') }} </h6>
                                    </div>
                                </div><!-- .col -->





                            </div><!-- .row -->








                        </div><!-- .block @e -->
                    </div>

                </div><!-- .section-tokensale -->


            </section>
            <!-- // -->


            <section class="section section-l section-wallet bg-white" id="app-download">

                <div class="container">
                    <!-- Block @s -->
                    <div class="nk-block nk-block-text-wrap">
                        <div class="row align-items-center justify-content-center flex-row-reverse">
                            <div class="col-lg-7 mb-4 mb-lg-0">
                                <div class="nk-block-img bg-pattern-dots-color">
                                    <div class="app-slide-wrap animated" data-animate="fadeInUp" data-delay=".1">
                                        <div class="app-slide">
                                            <img src="/app/images/app-screens/login.jpg" alt="App Screen">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-10 text-center text-lg-left">
                                <div class="nk-block-text">
                                    <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">{{ __('index.narmAfzareMobileTitle') }}
                                    </h2>
                                    <p class="animated" data-animate="fadeInUp" data-delay=".2"> {{ __('index.narmAfzareMobileDesc') }}</p>
                                    <div class="pdt-m animated" data-animate="fadeInUp" data-delay=".3">
                                        <a href="#" class="btn btn-grad">{{ __('index.narmAfzareMobileBtn') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .block @e -->
                </div>

            </section>
            <!-- // -->


            {{-- <section style="display:none" id="faq" class="section section-l section-faq bg-white" id="faq">

                <div class="container">
                    <!-- Section Head @s -->
                    <div class="section-head text-center wide-auto">
                        <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">سوالات متداول</h2>
                        <p class="animated" data-animate="fadeInUp" data-delay=".2">در این قسمت، سوالات متداول کاربران را مشاهده میکنید.
                        </p>
                    </div><!-- .section-head @e -->
                    <!-- Block @s -->
                    <div class="nk-block block-faq">
                        <div class="row">
                            <div class="col-md-4 col-lg-3 mb-4 mb-lg-0">
                                <ul class="nav tab-nav tab-nav-vr tab-nav-bdr mr-lg-3 animated" data-animate="fadeInUp" data-delay=".3">
                                    <li><a class="active" data-toggle="tab" href="#general-questions"><em class="fas fa-caret-right"></em>سوالات کلی</a></li>
                                    <li><a data-toggle="tab" href="#ico-questions"><em class="fas fa-caret-right"></em>پرداخت
                                            یاری</a></li>
                                    <li><a data-toggle="tab" href="#tokens-sales"><em class="fas fa-caret-right"></em>فروشگاه
                                            ساز</a></li>
                                    <li><a data-toggle="tab" href="#clients-releted"><em class="fas fa-caret-right"></em>سیستم
                                            فروش شارژ</a></li>
                                </ul>
                            </div><!-- .col -->
                            <div class="col-md-8 col-lg-9">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="general-questions">
                                        <div class="accordion accordion-faq" id="faq-1">
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".1">
                                                <h5 class="accordion-title accordion-title-sm" data-toggle="collapse" data-target="#faq-1-1">
                                                    آیا عضویت در سیستم فروشگاه ساز امید رایگان است؟ <span class="accordion-icon"></span>
                                                </h5>
                                                <div id="faq-1-1" class="collapse show" data-parent="#faq-1">
                                                    <div class="accordion-content">
                                                        <p>بله، عضویت در سیستم کاملا رایگان است و بدون پرداخت هزینه میتوانید عضو سیستم شوید.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".2">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-1-2">چگونه میتوانم لیست تراکنش های درگاه خود را مشاهده کنم؟ <span class="accordion-icon"></span></h5>
                                                <div id="faq-1-2" class="collapse" data-parent="#faq-1">
                                                    <div class="accordion-content">
                                                        <p>با ورود به پنل کاربری، کلیک برروی منوی پرداخت یاری و ورود به قسمت تراکنش ها، میتوانید لیست تراکنش های مربوط به درگاه خودرا مشاهده نمایید.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".3">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-1-3">پشتیبانی فروشگاه ساز امید به چه صورت است؟ <span class="accordion-icon"></span></h5>
                                                <div id="faq-1-3" class="collapse" data-parent="#faq-1">
                                                    <div class="accordion-content">
                                                        <p>میتوانید بصورت 24 ساعته از طریق ارسال تیکت و چت پشتیبانی باما در ارتباط باشید. همچنین میتوانید با تماس با شماره تلفن دفتر فروشگاه ساز امید، با تیم پشتیبانی ارتباط برقرار کنید.</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="ico-questions">
                                        <div class="accordion accordion-faq" id="faq-2">
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".1">
                                                <h5 class="accordion-title accordion-title-sm" data-toggle="collapse" data-target="#faq-2-1">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-2-1" class="collapse show" data-parent="#faq-2">
                                                    <div class="accordion-content">
                                                        <div class="accordion-content">
                                                            <p>متن پاسخ</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".2">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-2-2">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-2-2" class="collapse" data-parent="#faq-2">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".3">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-2-3">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-2-3" class="collapse" data-parent="#faq-2">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".4">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-2-4">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-2-4" class="collapse" data-parent="#faq-2">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tokens-sales">
                                        <div class="accordion accordion-faq" id="faq-3">
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".1">
                                                <h5 class="accordion-title accordion-title-sm" data-toggle="collapse" data-target="#faq-3-1">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-3-1" class="collapse show" data-parent="#faq-3">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".2">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-3-2">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-3-2" class="collapse" data-parent="#faq-3">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".3">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-3-3">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-3-3" class="collapse" data-parent="#faq-3">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".4">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-3-4">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-3-4" class="collapse" data-parent="#faq-3">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="clients-releted">
                                        <div class="accordion accordion-faq" id="faq-4">
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".1">
                                                <h5 class="accordion-title accordion-title-sm" data-toggle="collapse" data-target="#faq-4-1">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-4-1" class="collapse show" data-parent="#faq-4">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".2">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-4-2">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-4-2" class="collapse" data-parent="#faq-4">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".3">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-4-3">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-4-3" class="collapse" data-parent="#faq-4">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".4">
                                                <h5 class="accordion-title accordion-title-sm collapsed" data-toggle="collapse" data-target="#faq-4-4">متن سوال<span class="accordion-icon"></span></h5>
                                                <div id="faq-4-4" class="collapse" data-parent="#faq-4">
                                                    <div class="accordion-content">
                                                        <p>متن پاسخ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>

            </section> --}}
        </main>

        <footer id="contact" class="nk-footer bg-theme-grad">
            <section class="section no-pdy section-contact bg-transparent">

                <div class="container">
                    <!-- Block @s -->
                    <div class="nk-block block-contact animated" data-animate="fadeInUp" data-delay=".9" id="contact">
                        <div class="row justify-content-center no-gutters">
                            <div class="col-lg-6">
                                <div class="contact-wrap split split-left split-lg-left bg-white">
                                    <h5 class="title title-md">{{ __('index.tamasBaMaTitle') }}</h5>
                                    <form method="post" action="{{ route('sendemail.send') }}">
                                        @csrf
                                        <div class="field-item">
                                            <input name="name" type="text" class="input-line required">
                                            <label class="field-label field-label-line">{{ __('index.tamasBaMaFormName') }}</label>
                                        </div>
                                        <div class="field-item">
                                            <input name="email" type="email" class="input-line required email">
                                            <label class="field-label field-label-line">{{ __('index.tamasBaMaFormEmail') }}</label>
                                        </div>
                                        <div class="field-item">
                                            <textarea name="message" class="input-line input-textarea required"></textarea>
                                            <label class="field-label field-label-line">{{ __('index.tamasBaMaFormText') }}</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <button type="submit" class="btn btn-lg btn-grad">{{ __('index.tamasBaMaFormBtn') }}</button>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-results"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-4">
                                <div class="contact-wrap split split-right split-lg-right bg-genitian bg-theme tc-light">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <ul class="contact-list">
                                            <li>
                                                <em class="contact-icon fas fa-building"></em>
                                                <div class="contact-text">
                                                    <h6>
                                                        {{ __('index.tamasBaMaLeftBoxItem1') }}
                                                    </h6>
                                                    <span></span>
                                                </div>
                                            </li>
                                            <li>
                                                <em class="contact-icon fas fa-phone"></em>
                                                <div class="contact-text">
                                                    <span class="byekan">{{ __('index.tamasBaMaLeftBoxItem2') }}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <em class="contact-icon fas fa-envelope"></em>
                                                <div class="contact-text">
                                                    <span>{{ __('index.tamasBaMaLeftBoxItem3') }}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <em class="contact-icon fas fa-paper-plane"></em>
                                                <div class="contact-text">
                                                    <span>{{ __('index.tamasBaMaLeftBoxItem4') }}</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="contact-social">
                                            <h6>{{ __('index.tamasBaMaLeftBoxItem5') }}</h6>
                                            <ul class="social-links">
                                                <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                                                <li><a href="#"><em class="fab fa-telegram"></em></a></li>
                                                <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                                <li><a href="#"><em class="fab fa-youtube"></em></a></li>
                                                <li><a href="#"><em class="fab fa-instagram"></em></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>

                <div class="nk-ovm ovm-top ovm-h-60 bg-light"></div><!-- .nk-ovm -->
            </section>
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
                                            <img src="/app/images/logo.png" srcset="images/logo.png 2x" alt="logo">
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
</body>

</html>
