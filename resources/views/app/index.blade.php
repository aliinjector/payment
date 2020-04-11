<!DOCTYPE HTML>
<html lang="fa">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>سیستم فروشگاه ساز امید</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content="فروشگاه ساز امید"/>
    <meta name="description" content="راه اندازی و ایجاد فروشگاه آنلاین در کمترین زمان و پایینترین هزینه"/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="/index/css/reset.css">
    <link type="text/css" rel="stylesheet" href="/index/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="/index/css/style.css">
    <link type="text/css" rel="stylesheet" href="/index/css/color.css">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body>
<!--loader-->
<div class="loader-wrap">
    <div class="loader-inner">
        <div class="loader-inner-cirle"></div>
    </div>
</div>
<!--loader end-->
<!-- main start  -->
<div id="main">
    <!-- header -->
    <header class="main-header">
        <a href="" class="logo-holder"><img style="    width: 60px!important;" src="http://fannavars.ir/media/logos/logo0.png" alt=""></a>

        <div class="nav-holder main-menu">
            <nav>
                <ul class="no-list-style">
                    <li><a href="">تماس</a></li>
                    <li><a href="">قوانین و شرایط استفاده</a></li>
                    <li><a href="#products">آخرین محصولات</a></li>
                    <li><a href="#shops">آخرین فروشگاه ها</a></li>
                    <li><a href="#search">جستجوی محصول</a></li>
                </ul>
            </nav>
        </div>


        <!-- header opt end-->

        <!-- nav-button-wrap-->
        <div class="nav-button-wrap color-bg">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- nav-button-wrap end-->
        <!--  navigation -->


        <a href="/register" class="add-list color-bg">عضویت و ایجاد فروشگاه <span><i class="fal fa-layer-plus"></i></span></a>
        <a href="/login"><div class="show-reg-form avatar-img" data-srcav="images/avatar/3.jpg"><i class="fal fa-user"></i>ورود به سیستم</div></a>

        <!-- navigation  end -->
        <!-- header-search_container -->

        <!-- header-search_container  end -->
        <!-- wishlist-wrap-->

        <!--wishlist-wrap end -->
    </header>
    <!-- header end-->
    <!-- wrapper-->
    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <!--section  -->
            <section class="hero-section" id="search"  data-scrollax-parent="true">
                <div class="bg-tabs-wrap">
                    <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
                        <!--ms-container-->
                        <div class="slideshow-container" data-scrollax="properties: { translateY: '300px' }" >
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <!--ms_item-->

                                    <!--ms_item end-->
                                    <!--ms_item-->
                                    <div class="swiper-slide ">
                                        <div class="ms-item_fs fl-wrap full-height">
                                            <div class="bg" data-bg="images/bg/6.jpg"></div>
                                            <div class="overlay op7"></div>
                                        </div>
                                    </div>
                                    <!--ms_item end-->
                                    <!--ms_item-->
                                    <div class="swiper-slide">
                                        <div class="ms-item_fs fl-wrap full-height">
                                            <div class="bg" data-bg="images/bg/35.html"></div>
                                            <div class="overlay op7"></div>
                                        </div>
                                    </div>
                                    <!--ms_item end-->
                                </div>
                            </div>
                        </div>
                        <!--ms-container end-->
                    </div>
                </div>
                <div class="container small-container">
                    <div class="intro-item fl-wrap">
                        <span class="section-separator"></span>
                        <div class="bubbles">
                            <h1>جستجوی محصولات امیدشاپ</h1>
                        </div>
                        <h3>محصول مورد نظر خودرا در کمترین زمان پیدا کنید</h3>
                    </div>
                    <!-- main-search-input-tabs-->
                    <div class="main-search-input-tabs  tabs-act fl-wrap">

                        <!--tabs -->
                        <div class="tabs-container fl-wrap  ">
                            <!--tab -->
                            <div class="tab">
                                <div id="tab-inpt1" class="tab-content first-tab">
                                    <div class="main-search-input-wrap fl-wrap">
                                        <form method="post" action="{{ route('products.search') }}">
                                            @csrf
                                            <div class="main-search-input fl-wrap">
                                                <div class="main-search-input-item">
                                                    <label><i class="fal fa-keyboard"></i></label>
                                                    <input type="text" name="keyword" placeholder="به دنبال چه محصول/خدمتی میگردید؟" value=""/>
                                                </div>
                                                <button class="main-search-button color2-bg">جستجو <i class="far fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--tab end-->
                            <!--tab -->

                            <!--tab end-->
                        </div>
                        <!--tabs end-->
                    </div>
                    <!-- main-search-input-tabs end-->
                    <div class="hero-categories fl-wrap">
                        <h4 class="hero-categories_title">به دنبال فروشگاه هستید؟ نمایش فروشگاه ها براساس دسته بندی</h4>
                        <ul class="no-list-style">
                            <li><a href=""><i class="far fa-cheeseburger"></i><span>رستوران ها</span></a></li>
                            <li><a href=""><i class="far fa-tshirt"></i><span>فروشگاه لباس</span></a></li>
                            <li><a href=""><i class="far fa-tablet"></i><span>لوازم الکترونیکی</span></a></li>
                            <li><a href=""><i class="far fa-cocktail"></i><span>کافیشاپ</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-sec-link">
                    <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
                </div>
            </section>
            <!--section end-->
            <!--section  -->
            <section class="slw-sec" id="shops">
                <div class="section-title">
                    <h2>آخرین فروشگاه ها</h2>
                    <div class="section-subtitle">آخرین فروشگاه های امیدشاپ</div>
                    <span class="section-separator"></span>
                    <p style="direction: rtl">آخرین فروشگاه های ایجاد شده در فروشگاه ساز امید را مشاهده مینمایید.</p>
                </div>
                <div class="listing-slider-wrap fl-wrap">
                    <div class="listing-slider fl-wrap">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!--  swiper-slide  -->
                                @foreach ($shops as $shop)
                                    <div class="swiper-slide">
                                        <div class="listing-slider-item fl-wrap">
                                            <!-- listing-item  -->
                                                <a target="_blank" href="/{{ $shop->english_name }}"><div class="listing-item listing_carditem">
                                                    <article class="geodir-category-listing fl-wrap">
                                                        <div class="geodir-category-img">
                                                            <a target="_blank" href="/{{ $shop->english_name }}"  class="geodir-category-img-wrap fl-wrap" style="height:30vh">
                                                                <img style="height: 100%; max-height: 250px" src="{{ $shop->logo['original'] }}" alt="">
                                                            </a>
                                                            <div class="geodir_status_date gsd_open"><a target="_blank" href="/{{ $shop->english_name }}"> فروشگاه {{ $shop->name }}  </a></div>
                                                            <div class="geodir-category-opt">
                                                                <div class="geodir-category-opt_title">
                                                                    <div class="geodir-category-location"><a target="_blank" href="/{{ $shop->english_name }}">  آدرس: تهران - خیابان پاسداران<i class="fas fa-map-marker-alt"></i></a></div>
                                                                </div>

                                                                <div style="margin-bottom: 10px;" class="listing_carditem_footer fl-wrap">
                                                                    <a class="listing-item-category-wrap" target="_blank" href="/{{ $shop->english_name }}">
                                                                        <span>دسته:‌ {{ $shop->shopCategory->name }}</span>
                                                                    </a>

                                                                    <div  class="post-author"><span style="direction: rtl;color: white;">مدیر فروشگاه: {{ isset($shop->user) ? $shop->user->firstName . ' ' . $shop->user->lastName : '' }}</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </a>
                                            </div>
                                            <!-- listing-item end -->
                                        </div>
                                    </div>
                                @endforeach





                                <!--  swiper-slide end  -->
                            </div>
                        </div>
                        <div class="listing-carousel-button listing-carousel-button-next2"><i class="fas fa-caret-right"></i></div>
                        <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i></div>
                    </div>
                    <div class="tc-pagination_wrap">
                        <div class="tc-pagination2"></div>
                    </div>
                </div>
            </section>
            <!--section end-->
            <div class="sec-circle fl-wrap"></div>
            <!--section -->
            <section style="display: none"  class="gray-bg hidden-section particles-wrapper">
                <div class="container">
                    <div class="section-title">
                        <h2>برخی شهر های مورد پوشش</h2>
                        <div class="section-subtitle">شهر های تحت پوشش امیدشاپ</div>
                        <span class="section-separator"></span>
                        <p style="direction: rtl">امیدشاپ بدون درنظر گرفتن محدودیت جغرافیایی، در سراسر ایران خدمت رسانی می نماید.</p>
                    </div>
                    <div class="listing-item-grid_container fl-wrap">
                        <div style="direction: rtl; text-align: right" class="row">
                            <!--  listing-item-grid  -->

                            <div style="float: right;" class="col-sm-8">
                                <div class="listing-item-grid">
                                    <div class="bg"  data-bg="images/all/59.jpg"></div>
                                    <div class="d-gr-sec"></div>
                                    <div class="listing-counter color2-bg"><span>۴۴ </span> فروشگاه</div>
                                    <div class="listing-item-grid_title">
                                        <h3><a href="">تهران</a></h3>
                                        <p>با کلیک برروی نام شهر، فروشگاه ها را مشاهده نمایید.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="listing-item-grid">
                                    <div class="bg"  data-bg="images/all/56.jpg"></div>
                                    <div class="d-gr-sec"></div>
                                    <div class="listing-counter color2-bg"><span>۱۵ </span> فروشگاه</div>
                                    <div class="listing-item-grid_title">
                                        <h3><a href="">البرز</a></h3>
                                        <p>با کلیک برروی نام شهر، فروشگاه ها را مشاهده نمایید.</p>
                                    </div>
                                </div>
                            </div>
                            <!--  listing-item-grid end  -->
                            <!--  listing-item-grid  -->
                            <div class="col-sm-4">
                                <div class="listing-item-grid">
                                    <div class="bg"  data-bg="images/all/57.jpg"></div>
                                    <div class="d-gr-sec"></div>
                                    <div class="listing-counter color2-bg"><span>۲۲ </span> فروشگاه</div>
                                    <div class="listing-item-grid_title">
                                        <h3><a href="">اصفهان</a></h3>
                                        <p>با کلیک برروی نام شهر، فروشگاه ها را مشاهده نمایید.</p>
                                    </div>
                                </div>
                            </div>
                            <!--  listing-item-grid end  -->
                            <!--  listing-item-grid  -->
                            <div class="col-sm-4">
                                <div class="listing-item-grid">
                                    <div class="bg"  data-bg="images/all/58.jpg"></div>
                                    <div class="d-gr-sec"></div>
                                    <div class="listing-counter color2-bg"><span>۹ </span> فروشگاه</div>
                                    <div class="listing-item-grid_title">
                                        <h3><a href="">یزد</a></h3>
                                        <p>با کلیک برروی نام شهر، فروشگاه ها را مشاهده نمایید.</p>
                                    </div>
                                </div>
                            </div>
                            <!--  listing-item-grid end  -->
                            <!--  listing-item-grid  -->
                            <div class="col-sm-4">
                                <div class="listing-item-grid">
                                    <div class="bg"  data-bg="images/all/60.jpg"></div>
                                    <div class="d-gr-sec"></div>
                                    <div class="listing-counter color2-bg"><span>۱۲ </span> فروشگاه</div>
                                    <div class="listing-item-grid_title">
                                        <h3><a href="">مشهد</a></h3>
                                        <p>با کلیک برروی نام شهر، فروشگاه ها را مشاهده نمایید.</p>
                                    </div>
                                </div>
                            </div>
                            <!--  listing-item-grid end  -->
                            <!--  listing-item-grid  -->

                            <!--  listing-item-grid end  -->
                        </div>
                    </div>
                    <a href="" class="btn dec_btn   color2-bg">مشاهده تمامی شهرها<i class="fal fa-arrow-alt-right"></i></a>
                </div>
            </section>
            <!--  section  -->
            <!--section end-->
            <section class="parallax-section small-par" data-scrollax-parent="true">
                <div class="bg par-elem "  data-bg="" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay  op7"></div>
                <div class="container">
                    <div class=" single-facts single-facts_2 fl-wrap">
                        <!-- inline-facts -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="16422">16422</div>
                                    </div>
                                </div>
                                <h6>محصول فروخته شده</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="23422">23422</div>
                                    </div>
                                </div>
                                <h6>محصول ثبت شده</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="611">611</div>
                                    </div>
                                </div>
                                <h6>اپلیکیشن موبایل فعال</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="722">722</div>
                                    </div>
                                </div>
                                <h6>فروشگاه فعال</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                    </div>
                </div>
            </section>
            <!--section end-->
            <!--section  -->
            <section id="products">
                <div class="container big-container">
                    <div class="section-title">
                        <h2><span>آخرین محصولات فروشگاه ها</span></h2>
                        <div class="section-subtitle">فروشگاه ساز امید</div>
                        <span class="section-separator"></span>
                        <p style="direction: rtl">آخرین محصولات فروشگاه ها در این قسمت قابل مشاهده میباشد.</p>
                    </div>

                    <div class="grid-item-holder gallery-items fl-wrap">
                        <!--  gallery-item-->
                        @foreach ($products as $product)
                            <div class="gallery-item restaurant events">
                                <div class="listing-item" style="">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div style="height: 252px!important;" class="geodir-category-img">
                                            <a target="_blank" href="{{ $product->shop->english_name . '/' . 'product'. '/' . $product->id . '/' . $product->slug }}" class="geodir-category-img-wrap fl-wrap">
                                                <img style="height: 250px;" src="{{ $product->image['original'] }}" alt="">
                                            </a>
                                            <div class="listing-avatar"><a href=""><img src="{{ $product->shop->user->avatar }}" alt=""></a>
                                                <span class="avatar-tooltip">مدیر فروشگاه:‌  <strong> {{ $product->shop->user->firstName . ' ' . $product->shop->user->lastName }}</strong></span>
                                            </div>
                                            <div class="geodir_status_date gsd_open">نام فروشگاه: {{ $product->shop->name }}</div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap title-sin_item">
                                            <div class="geodir-category-content-title fl-wrap">
                                                <div class="geodir-category-content-title-item">
                                                    <h3 class="title-sin_map">
                                                        <a target="_blank" href="{{ $product->shop->english_name . '/' . 'product'. '/' . $product->id . '/' . $product->slug }}">{{ str_limit($product->title, 60) }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="geodir-category-text fl-wrap">
                                                <p class="small-text">   {!! str_limit($product->description, 70) !!} </p>

                                            </div>
                                            <div class="geodir-category-footer fl-wrap">
                                                <a class="listing-item-category-wrap" href="#">
                                                    <div class="listing-item-category blue-bg"><i class="fa fa-user"></i></div>
                                                    <span>مدیر فروشگاه:‌ {{ $product->shop->user->firstName . ' ' . $product->shop->user->lastName }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>

                        @endforeach


                    </div>
                </div>
            </section>
            <!--section end-->

            <!--section  -->
            <section      data-scrollax-parent="true">
                <div class="container">
                    <div class="section-title">
                        <h2>از کجا شروع کنم؟</h2>
                        <div class="section-subtitle">استفاده از امیدشاپ </div>
                        <span class="section-separator"></span>
                        <p style="direction: rtl"> در این بخش، مراحل عضویت، پیکربندی و بهره گیری از فروشگاه شما تشریح داده شده است.</p>
                    </div>
                    <div class="process-wrap fl-wrap">
                        <ul class="no-list-style">
                            <li>
                                <div class="process-item">
                                    <span class="process-count">۳ </span>
                                    <div class="time-line-icon"><i class="fal fa-chart-pie"></i></div>
                                    <h4 style="direction: rtl"> از گزارشات فروش لذت ببرید !</h4>
                                    <p style="direction: rtl">فروشگاه شما آماده استفاده است!  گزارشات برخط و گرافیکی جهت تصمیم گیری و نظارت بهتر شما آماده شده است که میتوانید از آنها بهره مند شوید. </p>
                                </div>
                                <span class="pr-dec"></span>
                            </li>
                            <li>
                                <div class="process-item">
                                    <span class="process-count">۲</span>
                                    <div class="time-line-icon"><i class="fal fa-cog"></i></div>
                                    <h4> تکمیل تنظیمات اولیه</h4>
                                    <p style="direction: rtl">پس از عضویت، میبایست دسته بندیها، محصولات و سایر موارد مورد نیاز را در پنل مدیریت فروشگاه خود تنظیم نمایید تا فروشگاه شما اماده بهره برداری شود.</p>
                                </div>
                                <span class="pr-dec"></span>
                            </li>
                            <li>
                                <div class="process-item">
                                    <span class="process-count">۱</span>
                                    <div class="time-line-icon"><i class="fal fa-layer-plus"></i></div>
                                    <h4> عضویت در فروشگاه ساز</h4>
                                    <p style="direction: rtl">در کمتر از ۳ دقیقه میتوانید فرم عضویت در فروشگاه ساز امید را تکمیل و حساب کاربری خودرا آماده ورود به دنیای مجانی کنید.</p>
                                </div>
                            </li>
                        </ul>
                        <div class="process-end"><i class="fal fa-check"></i></div>
                    </div>
                </div>
            </section>
            <!--section end-->




            <section style="display: none" id="sec1" data-scrollax-parent="true">
                <div class="container">
                    <div class="section-title">
                        <h2> قیمت خدمات </h2>
                        <div class="section-subtitle">پکیج های امیدشاپ</div>
                        <span class="section-separator"></span>
                        <p>در این بخش، میتوانید پکیج های ارایه خدمات فروشگاه ساز امید را مشاهده نمایید و به مقایسه آنها بپردازید.</p>
                    </div>
                    <div class="pricing-switcher">
                        <div class="fieldset color-bg">
                            <input type="radio" name="duration-1" id="monthly-1" class="tariff-toggle" checked="">
                            <label for="monthly-1">ماهانه</label>
                            <input type="radio" name="duration-1" class="tariff-toggle" id="yearly-1">
                            <label for="yearly-1">سالانه</label>
                            <span class="switch"></span>
                        </div>
                    </div>
                    <div style="direction: rtl" class="pricing-wrap fl-wrap">
                        <!-- price-item-->
                        <div class="price-item">
                            <div class="price-head  purp-gradient-bg">
                                <h3>مقدماتی</h3>
                                <div class="price-num col-dec-1 fl-wrap">
                                    <div class="price-num-item"><span class="mouth-cont">۴۹<span class="curen">هزار تومان</span></span><span class="year-cont">۵۳۰<span class="curen">هزار تومان</span></span></div>
                                    <div class="clearfix"></div>
                                    <div class="price-num-desc"><span class="mouth-cont">هر ماه</span><span class="year-cont">هر سال</span></div>
                                </div>
                                <div class="circle-wrap" style="right:20%;top:50px;">
                                    <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '50px' }" style="transform: translateZ(0px) translateY(-7.65661px);"></div>
                                </div>
                                <div class="circle-wrap" style="right:75%;top:90px;">
                                    <div class="circle_bg-bal circle_bg-bal_versmall"></div>
                                </div>
                                <div class="footer-wave">
                                    <svg viewBox="0 0 100 25">
                                        <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z"></path>
                                    </svg>
                                </div>
                                <div class="footer-wave footer-wave2">
                                    <svg viewBox="0 0 100 25">
                                        <path fill="#fff" d="M0 90 V12 Q30 7 45 12 T100 11 V30z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="price-content fl-wrap">
                                <div class="price-desc fl-wrap">
                                    <ul class="no-list-style">
                                        <li>قابلیت شماره ۱</li>
                                        <li>قابلیت شماره ۲</li>
                                        <li>قابلیت شماره ۳</li>
                                        <li>قابلیت شماره ۴</li>
                                    </ul>
                                    <a href="#" class="price-link purp-bg">انتخاب پکیج</a>
                                </div>
                            </div>
                        </div>
                        <!-- price-item end-->
                        <!-- price-item-->
                        <div class="price-item best-price">
                            <div class="price-head   gradient-bg">
                                <h3>حرفه ای</h3>
                                <div class="price-num col-dec-2 fl-wrap">
                                    <div class="price-num-item"><span class="mouth-cont">۱۰۹<span class="curen">هزار تومان</span></span><span class="year-cont">۱۰۱۰<span class="curen">هزار تومان</span></span></div>
                                    <div class="clearfix"></div>
                                    <div class="price-num-desc"><span class="mouth-cont">هر ماه</span><span class="year-cont">هر سال</span></div>
                                </div>
                                <div class="circle-wrap" style="right:20%;top:70px;">
                                    <div class="circle_bg-bal circle_bg-bal_versmall"></div>
                                </div>
                                <div class="circle-wrap" style="right:70%;top:40px;">
                                    <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-150px' }" style="transform: translateZ(0px) translateY(22.9698px);"></div>
                                </div>
                                <div class="footer-wave">
                                    <svg viewBox="0 0 100 25">
                                        <path fill="#fff" d="M0 60 V2 Q30 17 55 12 T100 11 V30z"></path>
                                    </svg>
                                </div>
                                <div class="footer-wave footer-wave2">
                                    <svg viewBox="0 0 100 25">
                                        <path fill="#fff" d="M0 90 V16 Q30 7 45 12 T100 5 V30z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="price-content fl-wrap">
                                <div class="price-desc fl-wrap">
                                    <ul class="no-list-style">
                                        <li>قابلیت شماره ۱</li>
                                        <li>قابلیت شماره ۲</li>
                                        <li>قابلیت شماره ۳</li>
                                        <li>قابلیت شماره ۴</li>
                                    </ul>
                                    <a href="#" class="price-link rec-link color-bg">انتخاب پکیج</a>
                                    <div class="recomm-price">
                                        <i class="fal fa-check"></i>
                                        پیشنهادی
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- price-item end-->
                        <!-- price-item-->
                        <div class="price-item">
                            <div class="price-head green-gradient-bg  ">
                                <h3>بیزنس</h3>
                                <div class="price-num col-dec-1 fl-wrap">
                                    <div class="price-num-item"><span class="mouth-cont">۱۴۹<span class="curen">هزار تومان</span></span><span class="year-cont">۱۴۳۰<span class="curen">هزار تومان</span></span></div>
                                    <div class="clearfix"></div>
                                    <div class="price-num-desc"><span class="mouth-cont">هر ماه</span><span class="year-cont">هر سال</span></div>
                                </div>
                                <div class="circle-wrap" style="right:20%;top:50px;">
                                    <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '50px' }" style="transform: translateZ(0px) translateY(-7.65661px);"></div>
                                </div>
                                <div class="circle-wrap" style="right:75%;top:90px;">
                                    <div class="circle_bg-bal circle_bg-bal_versmall"></div>
                                </div>
                                <div class="footer-wave">
                                    <svg viewBox="0 0 100 25">
                                        <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z"></path>
                                    </svg>
                                </div>
                                <div class="footer-wave footer-wave2">
                                    <svg viewBox="0 0 100 25">
                                        <path fill="#fff" d="M0 90 V12 Q30 7 45 12 T100 11 V30z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="price-content fl-wrap">
                                <div class="price-desc fl-wrap">
                                    <ul class="no-list-style">
                                        <li>قابلیت شماره ۱</li>
                                        <li>قابلیت شماره ۲</li>
                                        <li>قابلیت شماره ۳</li>
                                        <li>قابلیت شماره ۴</li>
                                    </ul>
                                    <a href="#" class="price-link green-bg">انتخاب پکیج</a>
                                </div>
                            </div>
                        </div>
                        <!-- price-item end-->
                    </div>
                    <span class="section-separator"></span>
                    <!-- features-box-container -->
                    <div class="features-box-container fl-wrap">
                        <div class="row">
                            <!--features-box -->
                            <div class="col-md-4">
                                <div class="features-box">
                                    <div class="time-line-icon">
                                        <i class="fal fa-headset"></i>
                                    </div>
                                    <h3>پشتیبانی ۲۴ ساعته</h3>
                                    <p> امیدشاپ به پشتیبانی از مشتریان خود  متعهد است و مشتریان گرامی میتوانند بصورت ثبت تیکت، تلفنی و چت با پشتیبانی در ارتباط باشند. </p>
                                </div>
                            </div>
                            <!-- features-box end  -->
                            <!--features-box -->
                            <div class="col-md-4">
                                <div class="features-box">
                                    <div class="time-line-icon">
                                        <i class="fal fa-users-cog"></i>
                                    </div>
                                    <h3>پنل مدیریت</h3>
                                    <p> در سامانه امیدشاپ، با بهره گیری از آخرین ابزار تکنولوژی به راحتی و در هرزمان و مکان امکان مدیریت فروشگاه آنلاین فراهم میباشد. </p>
                                </div>
                            </div>
                            <!-- features-box end  -->
                            <!--features-box -->
                            <div class="col-md-4">
                                <div class="features-box ">
                                    <div class="time-line-icon">
                                        <i class="fal fa-mobile"></i>
                                    </div>
                                    <h3>اپلیکیشن موبایل</h3>
                                    <p>پس از ایجاد فروشگاه در سیستم فروشگاه ساز امید، میتوانید درخواست ایجاد اپلیکیشن اندروید و ios فروشگاه خود را ثبت نمایید.</p>
                                </div>
                            </div>
                            <!-- features-box end  -->
                        </div>
                    </div>
                    <!-- features-box-container end  -->
                </div>
            </section>




            <!--section  -->
            <section class="gradient-bg hidden-section" data-scrollax-parent="true">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="collage-image">
                                <img src="/index/images/api.png" class="main-collage-image" alt="">
                                <div class="images-collage-title color2-bg icdec"> <p> اپلیکیشن بر بستر امید شاپ </p></div>
                                <div class="images-collage_icon green-bg" style="right:-20px; top:120px;"><i class="fal fa-thumbs-up"></i></div>
                                <div class="collage-image-min cim_1"><img src="/index/images/api/1.jpg" alt=""></div>
                                <div class="collage-image-min cim_2"><img src="/index/images/api/2.jpg" alt=""></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="colomn-text  pad-top-column-text fl-wrap">
                                <div class="colomn-text-title">
                                    <h3 style="text-align: right">اپلیکیشن اختصاصی فروشگاه شما </h3>
                                    <p style="text-align: right; direction: rtl">پس از ایجاد فروشگاه در سیستم فروشگاه ساز امید، میتوانید درخواست ایجاد اپلیکیشن اندروید و ios فروشگاه خود را ثبت نمایید.</p>
                                    <a href="#" class=" down-btn color3-bg"><i class="fab fa-apple"></i>  آی او اس </a>
                                    <a href="#" class=" down-btn color3-bg"><i class="fab fa-android"></i>  اندروید </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
                <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
                <div class="circle-wrap" style="left:270px;top:120px;" data-scrollax="properties: { translateY: '-200px' }">
                    <div class="circle_bg-bal circle_bg-bal_small"></div>
                </div>
                <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
                    <div class="circle_bg-bal circle_bg-bal_big"></div>
                </div>
                <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
                    <div class="circle_bg-bal circle_bg-bal_big"></div>
                </div>
                <div class="circle-wrap" style="left:40%;bottom:-70px;"  >
                    <div class="circle_bg-bal circle_bg-bal_middle"></div>
                </div>
                <div class="circle-wrap" style="right:40%;top:-10px;"  >
                    <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
                </div>
                <div class="circle-wrap" style="right:55%;top:90px;"  >
                    <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
                </div>
            </section>
            <!--section end-->

            <!--section  -->
            <section class="gray-bg">
                <div class="container">
                    <div class="clients-carousel-wrap fl-wrap">
                        <div class="cc-btn   cc-prev"><i class="fal fa-angle-left"></i></div>
                        <div class="cc-btn cc-next"><i class="fal fa-angle-right"></i></div>
                        <div class="clients-carousel">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <!--client-item-->
                                    <div class="swiper-slide">
                                        <a href="#" class="client-item"><img src="http://fannavars.ir/media/logos/logo.png" alt=""></a>
                                    </div>
                                    <!--client-item end-->
                                    <!--client-item-->
                                    <div class="swiper-slide">
                                        <a href="#" class="client-item"><img src="http://fannavars.ir/media/logos/logo.png" alt=""></a>
                                    </div>
                                    <!--client-item end-->
                                    <!--client-item-->
                                    <div class="swiper-slide">
                                        <a href="#" class="client-item"><img src="http://fannavars.ir/media/logos/logo.png" alt=""></a>
                                    </div>
                                    <!--client-item end-->
                                    <!--client-item-->
                                    <div class="swiper-slide">
                                        <a href="#" class="client-item"><img src="http://fannavars.ir/media/logos/logo.png" alt=""></a>
                                    </div>
                                    <!--client-item end-->
                                    <!--client-item-->
                                    <div class="swiper-slide">
                                        <a href="#" class="client-item"><img src="http://fannavars.ir/media/logos/logo.png" alt=""></a>
                                    </div>
                                    <!--client-item end-->
                                    <!--client-item-->
                                    <div class="swiper-slide">
                                        <a href="#" class="client-item"><img src="http://fannavars.ir/media/logos/logo.png" alt=""></a>
                                    </div>
                                    <!--client-item end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--section end-->
        </div>
        <!--content end-->
    </div>
    <!-- wrapper end-->
    <!--footer -->
    <footer class="main-footer fl-wrap">
        <!-- footer-header-->
        <div class="footer-header fl-wrap grad ient-dark">
            <div class="container">
                <div class="row">

                    <div class="col-md-7">
                        <div class="subscribe-widget">
                            <div class="subcribe-form">
                                <form id="subscribe">
                                    <input style="direction: rtl" class="enteremail fl-wrap" name="email" id="subscribe-email" placeholder="آدرس ایمیل خود را وارد نمایید" spellcheck="false" type="text">
                                    <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fal fa-envelope"></i></button>
                                    <label for="subscribe-email" class="subscribe-message"></label>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div style="text-align: right" class="subscribe-header">
                            <h3>عضویت در خبرنامه امیدشاپ</h3>
                            <p style="direction: rtl" >با عضویت در سامانه خبرنامه فروشگاه ساز امید، از آخرین امکانات و بروزرسانی ها باخبر شوید.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-header end-->
        <!--footer-inner-->

        <!--footer-inner end -->
        <!--sub-footer-->
        <div class="sub-footer  fl-wrap">
            <div class="container">
                <div class="copyright">  &#169;    تمامی حقوق محفوظ است. سیستم فروشگاه ساز امید</div>
            </div>
        </div>
        <!--sub-footer end -->
    </footer>
    <!--footer end -->

    <a class="to-top"><i class="fas fa-caret-up"></i></a>
</div>

<!---start GOFTINO code--->
<script type="text/javascript">
    !function(){var a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/Hqa6DI",l=localStorage.getItem("goftino");g.type="text/javascript",g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
</script>
<!---end GOFTINO code--->

<!-- Main end -->
<!--=============== scripts  ===============-->
<script src="/index/js/jquery.min.js"></script>
<script src="/index/js/plugins.js"></script>
<script src="/index/js/scripts.js"></script>
<script src="/index/js/map-single.js"></script>
</body>

</html>
