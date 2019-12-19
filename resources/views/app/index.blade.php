<!DOCTYPE html>
<html class="no-js" lang="fa">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

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

                  <li class="menu-item">  <a  href="#about" class="menu-link nav-link">  درباره سیستم </a>  </li>
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
                  <li><a href="{{ route('login') }}"
                    class="btn btn-md btn-auto btn-grad"><span>ورود</span></a></li>
                    <li><a href="{{ route('register') }}"
                      class="btn btn-md btn-auto btn-grad"><span>عضویت</span></a></li>
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
                        <div class="banner-gfx banner-gfx-re-s1 animated" data-animate="fadeInUp"
                        data-delay=".9">
                        <img src="/app/images/header/gfx-a.png" alt="header">
                      </div>
                    </div><!-- .col -->
                    <div class="col-lg-7 col-sm-10 text-center text-lg-left">
                      <div class="banner-caption cpn tc-light">
                        <div class="cpn-head">
                          <h1 class="title animated" data-animate="fadeInUp" data-delay=".1">سیستم فروشگاه ساز امید</h1><br class="d-none d-md-block">
                          <h4 class="title animated" data-animate="fadeInUp" data-delay=".2">  ارایه راهکار یکپارچه فروش آنلاین </h4>
                          </div>
                          <div class="cpn-text">
                            <p class="animated" data-animate="fadeInUp" data-delay="2">
                              <ul class="list list-check animated" data-animate="fadeInUp"
                              data-delay=".3">
                              <li>مدیریت ظاهر و شخصی سازی قالب فروشگاه</li>
                              <li> کاهش هزینه راه اندازی فروشگاه آنلاین
                              </li>
                              <li>یکپارچگی سیستم پرداخت</li>
                              <li>کاهش سیکل زمانی</li>
                            </ul>
                          </div>
                          <div class="cpn-action">


                            <div class="cpn-btns animated" data-animate="fadeInUp" data-delay="1.2">  <a class="btn btn-grad" href="{{ route('shops.show') }}">مشاهده لیست فروشگاهها</a>   <a class="btn btn-grad" href="{{ route('products.show') }}">جستجوی محصول</a> </div>
                              <ul class="cpn-links animated" data-animate="fadeInUp" data-delay="1.3">
                                <li><a class="link" href="#steps"><em
                                  class="link-icon far fa-file-alt"></em>مراحل احراز هویت
                                  پرداخت یاری</a></li>
                                  <li><a class="link" href="#services"><em
                                    class="link-icon fas fa-lightbulb"></em> راهکار های آنلاین
                                    امید</a></li>
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
                      <span style="color: white" class="rank-count">سیستم تخفیف</span>
                    </li>
                    <li class="rank-item rank-item2 animated" data-animate="fadeInUp" data-delay="1">
                      <span style="color: white" class="rank-count">نمایش آمار بازدید </span>
                    </li>
                    <li class="rank-item rank-item3 animated" data-animate="fadeInUp" data-delay="1.1">
                      <span style="color: white" class="rank-count">یکپارچه سازی</span>
                    </li>
                    <li class="rank-item rank-item4 animated" data-animate="fadeInUp" data-delay="1.2">
                      <span style="color: white" class="rank-count">گزارشات لحظه ای</span>
                    </li>
                    <li class="rank-item rank-item5 animated" data-animate="fadeInUp" data-delay="1.3">
                      <span style="color: white" class="rank-count"> جستجو پیشرفته </span>
                    </li>
                    <li class="rank-item rank-item6 animated" data-animate="fadeInUp" data-delay="1.4">
                      <span style="color: white" class="rank-count">پیگیری سفارشات</span>
                    </li>
                    <li class="rank-item rank-item7 animated" data-animate="fadeInUp" data-delay="1.5">
                      <div style="color: white" class="rank-count pt-1">آموزش و پشتیبانی</div>
                    </li>
                  </ul>
                </section>
                <!-- // -->
                <section id="about" class="section bg-light section-l section-about" id="about">

                  <div class="container">
                    <!-- Block @s -->
                    <div class="nk-block nk-block-about">
                      <div class="row align-items-center gutter-vr-30px pdb-l">
                        <div class="col-lg-6">
                          <div class="nk-block-text">
                            <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">درباره فروشگاه ساز امید</h2>
                            <p class="animated" data-animate="fadeInUp" data-delay=".2">
                              با توجه به افزایش روزافزون استفاده از پلتفرم آنلاین بعنوان فضایی انعطاف پذیر و کارآمد جهت ارائه، فروش و پشتیبانی از محصولات و خدمات کسب و کارها و بنگاه های اقتصادی کوچک، تیم طراحی و توسعه شرکت فناور ستاره نوران با هدف ایجاد پلتفرم یکپارچه و کاهش هزینه و سیکل زمانی ایجاد فروشگاه اینترنتی،  سیستم یکپارچه فروشگاه سازامید  را ایجاد نموده است.
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="nk-block-video animated" data-animate="fadeInUp" data-delay=".5">
                            <img src="/app/images/video/a.png" alt="video">
                            <a href="" class="nk-block-video-play video-popup btn-play btn-play-light"><em
                              class="fas fa-play"></em></a>
                            </div>
                          </div>
                        </div>
                      </div><!-- .block @e -->
                      <!-- Section Head @s -->
                      <div class="section-head">
                        <h2 class="title title-lg animated" data-animate="fadeInUp" data-delay=".6">مزایای سیستم فروشگاه ساز امید</h2>
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
                                <h5 class="title title-sm">عدم لزوم نصب نرم افزار</h5>
                                <p>

                                  تنها با داشتن اینترنت، میتوان از خدمات سیستم بهره مند شد و این موضوع منجر به
                                  تسهیل در فرآیند کاربری میشود. </p>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="feature animated" data-animate="fadeInUp" data-delay=".8">
                                <div class="feature-icon dot">
                                  <em class="icon ikon ikon-donught"></em>
                                </div>
                                <div class="feature-text">
                                  <h5 class="title title-sm">گزارشات لحظه ای برخط</h5>
                                  <p>
                                    در سیستم فروشگاه ساز امید قابلیت گزارش گیری در قالب نمودار های متنوع، جداول شخصی سازی
                                    شده و فیلتر شده بر اساس معیار های مختلف و... فراهم میباشد. </p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="feature animated" data-animate="fadeInUp" data-delay=".9">
                                  <div class="feature-icon dot">
                                    <em class="icon ikon ikon-document"></em>
                                  </div>
                                  <div class="feature-text">
                                    <h5 class="title title-sm">استفاده از طریق تمام بستر ها</h5>
                                    <p>

                                      باتوجه به مالتی پلتفرم بودن سیستم فروشگاه ساز امید، قابلیت بهره مندی از تمامی قابلیت
                                      های سیستم از تمام پلتفرم ها فراهم میباشد.</p>
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
                                    <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">مراحل عضویت و استفاده
                                      از سیستم </h2>
                                      <p class="animated" data-animate="fadeInUp" data-delay=".2">
                                        باتوجه به تعهد شرکت فناور ستاره نوران به ایجاد ساختاری امن و قابل اطمینان برای تمامی
                                        ذینفعان خدمات، استفاده از پلتفرم امید شاپ ملزم به احراز هویت کاربران میباشد که در
                                        ادامه با فرآیند مربوطه آشنا خواهید شد.
                                      </p>
                                    </div><!-- .section-head @e -->
                                    <div class="features-list mr-4 mgb-m30">
                                      <div class="feature feature-s2 animated" data-animate="fadeInUp" data-delay=".4">
                                        <div class="feature-icon dot">
                                          <em class="icon ikon ikon-shiled-alt"></em>
                                        </div>
                                        <div class="feature-text">
                                          <h5 class="title title-sm">مرحله ۱) عضویت در سامانه</h5>
                                          <p>با ورود به قسمت عضویت در سامانه و تکمیل فرم ثبت نام فرآیند عضویت شما در سیستم
                                            تکمیل شده و میبایست پس از ورود به سیستم اطلاعات هویتی خودرا تکمیل
                                            نمایید. </p>
                                          </div>
                                        </div>
                                        <div class="feature feature-s2 animated" data-animate="fadeInUp" data-delay=".5">
                                          <div class="feature-icon dot">
                                            <em class="icon ikon ikon-user"></em>
                                          </div>
                                          <div class="feature-text">
                                            <h5 class="title title-sm">مرحله ۲) احراز هویت</h5>
                                            <p>با ورود به منو تکمیل اطلاعات و احراز هویت و وارد نمودن اطلاعات در سامانه
                                              امید شاپ، فرآیند احراز هویت شما آغاز شده و تیم مدیریت امید شاپ به سرعت
                                              اطلاعات هویتی شمارا بررسی خواهند کرد.</p>
                                            </div>
                                          </div>
                                          <div class="feature feature-s2 animated" data-animate="fadeInUp" data-delay=".6">
                                            <div class="feature-icon dot">
                                              <em class="icon ikon ikon-data-server"></em>
                                            </div>
                                            <div class="feature-text">
                                              <h5 class="title title-sm">مرحله ۳) فعالسازی خدمات</h5>
                                              <p> پس از احراز هویت شما میتوانید بدون محدودیت از تمامی ماژول ها و خدمات سامانه
                                                امید شاپ استفاده نمایید.</p>
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
                                      <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">راهکار های کلیدی فروشگاه ساز امید
                                      </h2>
                                      <p class="animated" data-animate="fadeInUp" data-delay=".2">در این قسمت لیست خدمات اصلی سیستم فروشگاه ساز امید
                                        را مشاهده می مایید</p>
                                      </div><!-- .section-head @e -->
                                      <!-- Block @s -->
                                      <div class="nk-block nk-block-problems tc-light">
                                        <div class="row no-gutters align-items-center">
                                          <div class="col-lg-6">
                                            <div class="feature boxed boxed-lg bg-theme no-mg split-lg-left split-left animated"
                                            data-animate="fadeInUp" data-delay=".3">
                                            <h4 class="title title-md">کاهش هزینه راه اندازی فروشگاه آنلاین</h4>
                                            <p>
                                              اینترنت به عنوان یکی از ابزارهای جدید پرداخت این امکان را برای افراد فراهم آورده تا فروشندگان کالا و خدمات بتوانند با اتصال فروشگاه مجازی خود به سامانه پرداخت اینترنتی به سادگی و سرعت بالا کالای خود را بفروشند و خدمات ارائه دهند. باتوجه به فراهم نمودن زیرساخت های مورد نیاز جهت ایجاد سیستم فروشگاهی توسط سیستم امید شاپ، با صرف کمترین هزینه میتوانید وبسایت فروشگاهی خودرا بصورت مستقل برروی بستر سخت افزاری و نرم افزاری ما، پیاده سازی نمایید.
                                            </p>
                                            <ul class="list list-dot">
                                              <li>گزارشات کلی</li>
                                              <li>ارایه اپلیکیشن موبایل</li>
                                              <li>ارایه گزارشات هوشمند و آنی</li>
                                              <li>قابلیت استفاده در پلتفرم های مختلف</li>
                                              <li>امکان شخصی سازی توسط بازدیدکننده</li>
                                              <li>امکان ارسال خبرنامه به کاربران فروشگاه ساز</li>
                                              <li>ارسال آلارم ها و اعلان از طریق ایمیل و پیامک</li>
                                              <li>گزارش ساز (امکان ایجاد گزارشات در قالب نمودار و جداول)</li>
                                            </ul>
                                          </div>
                                        </div><!-- .col -->
                                        <div class="col-lg-6">
                                          <div class="feature-group bg-theme-alt split-right split-lg animated"
                                          data-animate="fadeInUp" data-delay=".4">
                                          <div class="feature boxed bg-white-10">
                                            <div class="feature-text">
                                              <h4 class="title title-md">کاهش سیکل زمانی</h4>
                                              <p>
تیم تحقیق و توسعه امیدشاپ، باتوجه به نیازسنجی صورت گرفته تمامی خواسته های صاحبان کسب و کار جهت بهره مندی از مزایای حوزه وب و بارگذاری و ارایه خدمات و محصولات بر آن بستر، این سیستم را طراحی و توسعه داده است و نیازی به استفاده از سیستم های مربوط به تولید محتوی درکنار پلاگین های متفرقه نیست.                                               </p>
                                            </div>
                                          </div>
                                          <div class="feature boxed bg-white-2">
                                            <div class="feature-text">
                                              <h4 class="title title-md">یکپارچگی سیستم پرداخت</h4>
                                              <p>
بااستفاده از درگاه پرداخت یکپارچه سیستم امید شاپ، میتوانید بدون نگرانی فروش خودرا آغاز کرده و درخواست تسویه ثبت نمایید.                                              </p>

                                              </div>
                                            </div>
                                            <div class="feature boxed bg-black-10">
                                              <div class="feature-text">
                                                <h4 class="title title-md">
                                                  مدیریت ظاهر و شخصی سازی قالب فروشگاه
                                                </h4>
                                                <p>
قابلیت انتخاب قالب از پیش طراحی شده و همچنین شخصی سازی آن توسط مدیر فروشگاه و بازدیدکنندگان فراهم میباشد و به راحتی میتوان از فرایند را از پنل مدیریت فروشگاه و تنظیمات قالب انجام داد.                                                </p>
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
                                      <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">سایر خدمات سیستم فروشگاه ساز امید</h2>
                                      <p class="animated" data-animate="fadeInUp" data-delay=".2">در این قسمت سایر خدمات سیستم فروشگاه ساز امید
                                        را مشاهده مینمایید</p>
                                      </div><!-- .section-head @e -->
                                      <!-- Block @s -->
                                      <div class="nk-block nk-block-features-s3 mgb-m40 mgt-m20">
                                        <div class="row justify-content-center">
                                          <div class="col-lg-6 col-md-10">
                                            <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp"
                                            data-delay=".3">
                                            <div class="feature-icon">
                                              <i class="fa fa-cart-arrow-down
                                              "></i>
                                            </div>
                                            <div class="feature-text">
                                              <h4 class="title title-md title-dark">فروش کالا های مختلف (فیزیکی - دانلودی - خدماتی)
                                              </h4>
                                              <p>
امید شاپ محدود به فروش کالای فیزیکی نیست و میتوان محصولات دانلودی و خدماتی نیز در سیستم به فروش رساند.
                                               </p>
                                              </div>
                                            </div>
                                          </div><!-- .col -->
                                          <div class="col-lg-6 col-md-10">
                                            <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp"
                                            data-delay=".4">
                                            <div class="feature-icon">
                                              <i class="fa fa-money"></i>
                                            </div>
                                            <div class="feature-text">
                                              <h4 class="title title-md title-dark">سیستم تخفیف پیشرفته
                                              </h4>
                                              <p>
در سیستم تخفیف میتوان باتوجه به بازه زمانی مشخص، برای کاربران خاص، بصورت ریالی ویا درصدی با سقف معین و تعداد استفاده مورد نظر، کد تخفیف درنظر بگیرید.                                              </p>
                                              </div>
                                            </div>
                                          </div><!-- .col -->
                                          <div class="col-lg-6 col-md-10">
                                            <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp"
                                            data-delay=".5">
                                            <div class="feature-icon">
                                              <i class="fa fa-file-text mt-4"></i>
                                            </div>
                                            <div class="feature-text">
                                              <h4 class="title title-md title-dark">عدم نیاز به اخذ مجوز (درگاه - اینماد - پیامک )</h4>
                                              <p>
باتوجه به فراهم نمودن سیستم پرداخت، نیازی به طی کردن مراحل مربوط به اخذ درگاه بانکی و سایر موارد نمیباشد.
                                              </p>
                                              </div>
                                            </div>
                                          </div><!-- .col -->

                                          <div class="col-lg-6 col-md-10">
                                            <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp"
                                            data-delay=".6">
                                            <div class="feature-icon">
                                              <i class="fa fa-newspaper-o mt-4"></i>
                                            </div>
                                            <div class="feature-text">
                                              <h4 class="title title-md title-dark">سیستم خبرنامه هوشمند</h4>
                                              <p>
قابلیت ارسال ایمیل های زمانبندی شده و رویداد محور به تمامی ویا برخی از کاربران خاص عضو فروشگاه
                                              </p>
                                            </div>
                                          </div>
                                        </div><!-- .col -->
                                        <div class="col-lg-6 col-md-10">
                                          <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp"
                                          data-delay=".7">
                                          <div class="feature-icon">
                                            <i class="fa fa-line-chart mt-4"></i>
                                          </div>
                                          <div class="feature-text">
                                            <h4 class="title title-md title-dark">

                                              سیستم آمار بازدید کنندگان و خریداران<br>
                                              (موقعیت جغرافیایی - بازه های زمانی و … )

                                            </h4>
                                            <p>
ثبت و مشاهده آمار بازدید مشتریان فروشگاه، بصورت ریز (شهر بازدید کنندگان)
                                            </p>
                                            </div>
                                          </div>
                                        </div><!-- .col -->
                                        <div class="col-lg-6 col-md-10">
                                          <div class="feature feature-s3 feature-center animated" data-animate="fadeInUp"
                                          data-delay=".8">
                                          <div class="feature-icon">
                                            <i class="fa fa-instagram mt-4"></i>
                                          </div>
                                          <div class="feature-text">
                                            <h4 class="title title-md title-dark">ارتباط با شبکه های اجتماعی اینستاگرام و ...</h4>
                                            <p>
                                                      قابلیت ارتباط سیستم با API شبکه های اجتماعی جهت درج محصولات
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
                                      <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">لیست خدمات و امکانات</h2>
                                        <p class="animated" data-animate="fadeInUp" data-delay=".2">
                                          ماژول های فروشگاه ساز امید</p>
                                        </div><!-- .section-head @e -->
                                        <!-- Block @s -->
                                        <div class="nk-block nk-block-token mgb-m30">
                                          <div class="row">

                                            <div class="col-lg-6">
                                              <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".1">
                                                <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> امکان اضافه کردن محصولات متنوع ( فیزیکی، فایل و خدمت) </h6>
                                              </div>
                                            </div><!-- .col -->

                                            <div class="col-lg-6">
                                              <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".2">
                                                <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> امکان نمایش گزارشات فروشگاه بر روی نمودار ها</h6>
                                              </div>
                                            </div><!-- .col -->







                                              </div><!-- .row -->

                                                <div class="row">
                                                  <div class="col-lg-3">
                                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".3">
                                                      <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> لیست کالا ها و خدمات </h6>
                                                    </div>
                                                  </div><!-- .col -->



                                                  <div class="col-lg-3">
                                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".4">
                                                      <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> سیستم تخفیف </h6>
                                                    </div>
                                                  </div><!-- .col -->


                                                  <div class="col-lg-3">
                                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".5">
                                                      <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> بازخورد مشتریان </h6>
                                                    </div>
                                                  </div><!-- .col -->


                                                  <div class="col-lg-3">
                                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".6">
                                                      <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> شخصی سازی قالب فروشگاه </h6>
                                                    </div>
                                                  </div><!-- .col -->

                                                </div>



                                                <div class="row">


                                                  <div class="col-lg-3">
                                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".7">
                                                      <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> روش های ارسال </h6>
                                                    </div>
                                                  </div><!-- .col -->


                                                  <div class="col-lg-3">
                                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".8">
                                                      <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">هزینه های افزوده</h6>
                                                    </div>
                                                  </div><!-- .col -->


                                                  <div class="col-lg-3">
                                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".9">
                                                      <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> فیلترینگ </h6>
                                                    </div>
                                                  </div><!-- .col -->



                                                  <div class="col-lg-3">
                                                    <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".10">
                                                      <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> جستجو </h6>
                                                    </div>
                                                  </div><!-- .col -->




                                                    </div><!-- .row -->



                                              <div class="row">

                                                <div class="col-lg-2">
                                                  <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".11">
                                                    <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">دسته بندی ها</h6>
                                                  </div>
                                                </div><!-- .col -->


                                                <div class="col-lg-2">
                                                  <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".12">
                                                    <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> برند ها </h6>
                                                  </div>
                                                </div><!-- .col -->


                                                <div class="col-lg-2">
                                                  <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".13">
                                                    <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> سفارشات</h6>
                                                  </div>
                                                </div><!-- .col -->


                                                <div class="col-lg-2">
                                                  <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".14">
                                                    <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">آمار بازدید</h6>
                                                  </div>
                                                </div><!-- .col -->


                                                <div class="col-lg-2">
                                                  <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".15">
                                                    <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> پشتیبانی </h6>
                                                  </div>
                                                </div><!-- .col -->


                                                <div class="col-lg-2">
                                                  <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".16">
                                                    <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> آموزش  </h6>
                                                  </div>
                                                </div><!-- .col -->








                                                  </div><!-- .row -->



                                                  <div class="row">


                                                    <div class="col-lg-2">
                                                      <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".17">
                                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">  خبرنامه </h6>
                                                      </div>
                                                    </div><!-- .col -->


                                                    <div class="col-lg-2">
                                                      <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".18">
                                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center">گالری </h6>
                                                      </div>
                                                    </div><!-- .col -->


                                                    <div class="col-lg-2">
                                                      <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".19">
                                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> سیستم نظرات </h6>
                                                      </div>
                                                    </div><!-- .col -->


                                                    <div class="col-lg-2">
                                                      <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".20">
                                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> امتیاز دهی </h6>
                                                      </div>
                                                    </div><!-- .col -->


                                                    <div class="col-lg-2">
                                                      <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".21">
                                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> کالای مشابه </h6>
                                                      </div>
                                                    </div><!-- .col -->


                                                    <div class="col-lg-2">
                                                      <div style="    padding: 20px;text-align: center;" class="token-info bg-theme animated" data-animate="fadeInUp" data-delay=".22">
                                                        <span style="font-weight: 500;font-size: 18px;  color: #23c99d;" class="title title-md mb-2 text-sm-center"> سبد خرید </h6>
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
                                                  <h2 class="title animated" data-animate="fadeInUp" data-delay=".1">نرم افزار موبایل
                                                  </h2>
                                                  <p class="animated" data-animate="fadeInUp" data-delay=".2"> باتوجه به افزایش روز افزودن استفاده از تلفن همراه بعنوان دریچه ارتباط با دنیای مجازی، تیم طراحی و توسعه با هدف ایجاد پلتفرم یکپارچه و سهولت در استفاده از سیستم فروشگاه ساز امید، اقدام به طراحی اپلیکیشن موبایل کرده است که به زودی قابل دسترس عموم قرار خواهد گرفت.</p>
                                                  <div class="pdt-m animated" data-animate="fadeInUp" data-delay=".3">
                                                    <a href="#" class="btn btn-grad">دریافت اپلیکیشن موبایل (به زودی)</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div><!-- .block @e -->
                                        </div>

                                      </section>
                                      <!-- // -->


                                      <section style="display:none" id="faq" class="section section-l section-faq bg-white" id="faq">

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
                                                  <ul class="nav tab-nav tab-nav-vr tab-nav-bdr mr-lg-3 animated" data-animate="fadeInUp"
                                                  data-delay=".3">
                                                  <li><a class="active" data-toggle="tab" href="#general-questions"><em
                                                    class="fas fa-caret-right"></em>سوالات کلی</a></li>
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
                                                                <h5 class="accordion-title accordion-title-sm" data-toggle="collapse"
                                                                data-target="#faq-1-1">
                                                                   آیا عضویت در سیستم فروشگاه ساز امید رایگان است؟  <span class="accordion-icon"></span>
                                                              </h5>
                                                              <div id="faq-1-1" class="collapse show" data-parent="#faq-1">
                                                                <div class="accordion-content">
                                                                  <p>بله، عضویت در سیستم کاملا رایگان است و بدون پرداخت هزینه میتوانید عضو سیستم شوید.</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".2">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-1-2">چگونه میتوانم لیست تراکنش های درگاه خود را مشاهده کنم؟ <span
                                                              class="accordion-icon"></span></h5>
                                                              <div id="faq-1-2" class="collapse" data-parent="#faq-1">
                                                                <div class="accordion-content">
                                                                  <p>با ورود به پنل کاربری، کلیک برروی منوی پرداخت یاری و ورود به قسمت تراکنش ها، میتوانید لیست تراکنش های مربوط به درگاه خودرا مشاهده نمایید.</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".3">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-1-3">پشتیبانی فروشگاه ساز امید به چه صورت است؟ <span
                                                              class="accordion-icon"></span></h5>
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
                                                              <h5 class="accordion-title accordion-title-sm" data-toggle="collapse"
                                                              data-target="#faq-2-1">متن سوال<span class="accordion-icon"></span></h5>
                                                              <div id="faq-2-1" class="collapse show" data-parent="#faq-2">
                                                                <div class="accordion-content">
                                                                  <div class="accordion-content">
                                                                    <p>متن پاسخ</p>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".2">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-2-2">متن سوال<span
                                                              class="accordion-icon"></span></h5>
                                                              <div id="faq-2-2" class="collapse" data-parent="#faq-2">
                                                                <div class="accordion-content">
                                                                  <p>متن پاسخ</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".3">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-2-3">متن سوال<span
                                                              class="accordion-icon"></span></h5>
                                                              <div id="faq-2-3" class="collapse" data-parent="#faq-2">
                                                                <div class="accordion-content">
                                                                  <p>متن پاسخ</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".4">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-2-4">متن سوال<span
                                                              class="accordion-icon"></span></h5>
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
                                                              <h5 class="accordion-title accordion-title-sm" data-toggle="collapse"
                                                              data-target="#faq-3-1">متن سوال<span class="accordion-icon"></span></h5>
                                                              <div id="faq-3-1" class="collapse show" data-parent="#faq-3">
                                                                <div class="accordion-content">
                                                                  <p>متن پاسخ</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".2">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-3-2">متن سوال<span
                                                              class="accordion-icon"></span></h5>
                                                              <div id="faq-3-2" class="collapse" data-parent="#faq-3">
                                                                <div class="accordion-content">
                                                                  <p>متن پاسخ</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".3">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-3-3">متن سوال<span
                                                              class="accordion-icon"></span></h5>
                                                              <div id="faq-3-3" class="collapse" data-parent="#faq-3">
                                                                <div class="accordion-content">
                                                                  <p>متن پاسخ</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".4">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-3-4">متن سوال<span
                                                              class="accordion-icon"></span></h5>
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
                                                              <h5 class="accordion-title accordion-title-sm" data-toggle="collapse"
                                                              data-target="#faq-4-1">متن سوال<span class="accordion-icon"></span></h5>
                                                              <div id="faq-4-1" class="collapse show" data-parent="#faq-4">
                                                                <div class="accordion-content">
                                                                  <p>متن پاسخ</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".2">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-4-2">متن سوال<span
                                                              class="accordion-icon"></span></h5>
                                                              <div id="faq-4-2" class="collapse" data-parent="#faq-4">
                                                                <div class="accordion-content">
                                                                  <p>متن پاسخ</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".3">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-4-3">متن سوال<span
                                                              class="accordion-icon"></span></h5>
                                                              <div id="faq-4-3" class="collapse" data-parent="#faq-4">
                                                                <div class="accordion-content">
                                                                  <p>متن پاسخ</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item animated" data-animate="fadeInUp" data-delay=".4">
                                                              <h5 class="accordion-title accordion-title-sm collapsed"
                                                              data-toggle="collapse" data-target="#faq-4-4">متن سوال<span
                                                              class="accordion-icon"></span></h5>
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

                                            </section>
                                          </main>

                                          <footer id="contact" class="nk-footer bg-theme-grad">
                                             <section class="section no-pdy section-contact bg-transparent">

                                               <div class="container">
                                                 <!-- Block @s -->
                                                 <div class="nk-block block-contact animated" data-animate="fadeInUp" data-delay=".9" id="contact">
                                                   <div class="row justify-content-center no-gutters">
                                                     <div class="col-lg-6">
                                                       <div class="contact-wrap split split-left split-lg-left bg-white">
                                                         <h5 class="title title-md">تماس باما</h5>
                                                         <form method="post" action="{{ route('sendemail.send') }}">
                                                           @csrf
                                                           <div class="field-item">
                                                             <input name="name" type="text" class="input-line required">
                                                             <label class="field-label field-label-line">نام</label>
                                                           </div>
                                                           <div class="field-item">
                                                             <input name="email" type="email" class="input-line required email">
                                                             <label class="field-label field-label-line">آدرس ایمیل</label>
                                                           </div>
                                                           <div class="field-item">
                                                             <textarea name="message"
                                                             class="input-line input-textarea required"></textarea>
                                                             <label class="field-label field-label-line">متن پیام</label>
                                                           </div>
                                                           <div class="row">
                                                             <div class="col-sm-4">
                                                               <button type="submit" class="btn btn-lg btn-grad">ارسال</button>
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
                                                                 <h6>منطقه آزاد انزلی - مجتمع تجاری اداری ستاره شمال - طبقه اول - واحد
                                                                   2136
                                                                   شرکت فناور ستاره نوران</h6>
                                                                   <span></span>
                                                                 </div>
                                                               </li>
                                                               <li>
                                                                 <em class="contact-icon fas fa-phone"></em>
                                                                 <div class="contact-text">
                                                                   <span class="byekan">91008658</span>
                                                                 </div>
                                                               </li>
                                                               <li>
                                                                 <em class="contact-icon fas fa-envelope"></em>
                                                                 <div class="contact-text">
                                                                   <span>info@omid.ir</span>
                                                                 </div>
                                                               </li>
                                                               <li>
                                                                 <em class="contact-icon fas fa-paper-plane"></em>
                                                                 <div class="contact-text">
                                                                   <span> عضویت در کانال تلگرام فروشگاه ساز امید</span>
                                                                 </div>
                                                               </li>
                                                             </ul>
                                                             <div class="contact-social">
                                                               <h6>مارا در شبکه های اجتماعی دنبال کنید</h6>
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
                                                         <div class="wgs wgs-menu animated" data-animate="fadeInUp" data-delay=".2">
                                                           <h6 class="wgs-title">فروشگاه ساز امید</h6>
                                                           <div class="wgs-body">
                                                             <ul class="wgs-links">
                                                               <li><a href="#about">درباره ما</a></li>
                                                               <li><a href="#services">خدمات امید</a></li>
                                                               <li><a target="_blank" href="/app//docs">طراحی سایت فروشگاهی</a></li>
                                                               <li><a target="_blank" href="/app//docs">طراحی وب سایت</a></li>
                                                             </ul>
                                                           </div>
                                                         </div>
                                                       </div><!-- .col -->

                                                       <div class="col-lg-2 col-sm-4 mb-4 mb-sm-0">
                                                         <div class="wgs wgs-menu animated" data-animate="fadeInUp" data-delay=".3">
                                                           <h6 class="wgs-title">لینک های کاربردی</h6>
                                                           <div class="wgs-body">
                                                             <ul class="wgs-links">
                                                               <li><a target="_blank" href="/app//docs">مستندات</a></li>
                                                               <li><a target="_blank" href="/app//docs">آموزش</a></li>
                                                               <li><a target="_blank" href="/app//docs">سورس کدها</a></li>
                                                               <li><a href="/app/#faq">سوالات متداول</a></li>
                                                             </ul>
                                                           </div>
                                                         </div>
                                                       </div><!-- .col -->
                                                       <div class="col-lg-2 col-sm-4 mb-4 mb-sm-0">
                                                         <div class="wgs wgs-menu animated" data-animate="fadeInUp" data-delay=".4">
                                                           <h6 class="wgs-title">حقوقی</h6>
                                                           <div class="wgs-body">
                                                             <ul class="wgs-links">
                                                               <li><a target="_blank" href="/app//docs">قوانین</a></li>
                                                               <li><a target="_blank" href="/app//docs">حریم خصوصی</a></li>
                                                               <li><a target="_blank" href="/app//docs">شرایط استفاده</a></li>
                                                               <li><a href="#steps">مراحل احراز هویت</a></li>
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
                                                             <p style="font-family: BYekan!important;">© کلیه حقوق محفوظ است. 1398 </p>
                                                             <p class="copyright-text">طراحی و توسعه در دپارتمان فناوری اطلاعات سیستم فروشگاه ساز امید</p>
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
