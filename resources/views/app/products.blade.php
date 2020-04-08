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
<style>
  .page-item{
    list-style-type:none;
  }
  .pagination{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }
  .page-link{
    font-family: BYekan;
  }
</style>
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
    <a href="/" class="logo-holder"><img style="    width: 60px!important;" src="http://fannavars.ir/media/logos/logo0.png" alt=""></a>

    <div class="nav-holder main-menu">
      <nav>
        <ul class="no-list-style">
          <li><a href="">تماس</a></li>
          <li><a href="">قوانین و شرایط استفاده</a></li>
          <li><a href="/#products">آخرین محصولات</a></li>
          <li><a href="/#shops">آخرین فروشگاه ها</a></li>
          <li><a href="/#search">جستجوی محصول</a></li>
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


    <a href="" class="add-list color-bg">عضویت و ایجاد فروشگاه <span><i class="fal fa-layer-plus"></i></span></a>
    <div class="show-reg-form modal-open avatar-img" data-srcav="images/avatar/3.jpg"><i class="fal fa-user"></i>ورود به سیستم</div>

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
      <!--  section  -->
      <section class="parallax-section single-par" data-scrollax-parent="true">
        <div class="bg par-elem "  data-bg="images/bg/6.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <div class="container">
          <div class="container small-container">
            <div class="intro-item fl-wrap">
              <span class="section-separator"></span>
              <div class="bubbles">
                <h1>جستجوی محصولات امیدشاپ</h1>
              </div>
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
                            <input type="text" name="keyword" placeholder="به دنبال چه محصول/خدمتی میگردید؟"
                             @if(isset(request()->keyword))
                               value="{{request()->keyword}}"
                            @endif
                            />
                          </div>
                          <button class="main-search-button color2-bg">جستجو <i class="far fa-search"></i></button>
                        </div>
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

          </div>
        </div>
        <div class="header-sec-link">
          <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
        </div>
      </section>
      <!--  section  end-->
      <section class="gray-bg small-padding no-top-padding-sec" id="sec1">
        <div class="container">
          <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
           <span> جستجوی محصولات امیدشاپ</span>
          </div>

          <div class="mob-nav-content-btn  color2-bg show-list-wrap-search ntm fl-wrap"><i class="fal fa-filter"></i>  Filters</div>
          <div class="fl-wrap">
            <div class="row">


              <div class="col-md-9">
                <!-- list-main-wrap-header-->
                <div class="list-main-wrap-header fl-wrap block_box no-vis-shadow">
                  <!-- list-main-wrap-title-->
                  <div class="list-main-wrap-title">
                    <h2 style="direction: rtl">
                      نتایج جستجو برای:
                      <span> {{ request()->keyword }} </span>
                    </h2>
                  </div>
                  <!-- list-main-wrap-title end-->
                  <!-- list-main-wrap-opt-->
                  <div class="list-main-wrap-opt">
                    <!-- price-opt-->
                        <div class="price-opt">
                          <span class="price-opt-title">ترتیب براساس:</span>
                          <div class="listsearch-input-item">
                            <select name="orderBy" class="chosen-select no-search-select" >
                              <option id="higherView">پربازدید ترین</option>
                              <option id="higherScore">بالاترین امتیاز</option>
                              <option id="lowestPrice">کمترین قیمت</option>
                              <option id="highestPrice">بالاترین قیمت</option>
                            </select>
                          </div>
                        </div>
                        <!-- price-opt end-->
                        <!-- price-opt-->
                        <div class="grid-opt">
                          <ul class="no-list-style">
                            <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="fal fa-th"></i></span></li>
                            <li class="grid-opt_act"><span class="one-col-grid tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="fal fa-list"></i></span></li>
                          </ul>
                        </div>
                        <!-- price-opt end-->
                      </div>
                      <!-- list-main-wrap-opt end-->
                    </div>
                    <!-- list-main-wrap-header end-->
                    <!-- listing-item-container -->
                    <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                      <!-- listing-item  -->
                      @foreach ($products as $product)
                        <div class="listing-item" style="">
                          <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img">
                              <a target="_blank" href="{{ $product->shop->english_name . '/' . 'product'. '/' . $product->id . '/' . $product->slug }}" class="geodir-category-img-wrap fl-wrap">
                                <img style="height: 250px" src="{{ $product->image['original'] }}" alt="">
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
                                    <a target="_blank" href="{{ $product->shop->english_name . '/' . 'product'. '/' . $product->id . '/' . $product->slug }}">{{ $product->title }}</a>
                                  </h3>
                                </div>
                              </div>
                              <div class="geodir-category-text fl-wrap">
                                <p class="small-text">  {!! str_limit($product->description, 100) !!} </p>

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
                      @endforeach


                      <!-- listing-item end -->
                        {{ $products->links() }}
                    </div>
                    <!-- listing-item-container end -->
                  </div>



                  <div class="col-md-3">
                    <div class=" fl-wrap lws_mobile   tabs-act block_box">
                      <div class="filter-sidebar-header fl-wrap" id="filters-column">
                        <ul class="tabs-menu fl-wrap no-list-style">
                          <li class="current"><a href="#filters-search"> <i style="float: right;" class="fal fa-sliders-h"></i> فیلتر نتایج </a></li>
                        </ul>
                      </div>
                      <div class="scrl-content filter-sidebar    fs-viscon">
                        <!--tabs -->
                        <div class="tabs-container fl-wrap">
                          <!--tab -->
                          <div class="tab">
                            <div id="filters-search" class="tab-content  first-tab ">
                              <!-- listsearch-input-item-->
                              {{--FILTER HERE--}}
                              <!-- listsearch-input-item-->

                              <div class="listsearch-input-item">
                                <button class="header-search-button color-bg"><i class="far fa-search"></i><span>جستجو</span></button>
                              </div>
                              <!-- listsearch-input-item end-->
                            </div>
                          </div>
                          <!--tab end-->
                          <!--tab -->

                          <!--tab end-->
                        </div>
                        <!--tabs end-->
                      </div>
                    </div>
                    <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="#filters-column">مشاهده فیلتر <i class="fas fa-caret-up"></i></a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <div class="limit-box fl-wrap"></div>
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