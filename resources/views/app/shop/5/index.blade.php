@extends('app.shop.5.layouts.master')

@section('content')

<!-- main-search start -->
<div class="main-search-active">
  <div class="sidebar-search-icon">
    <button class="search-close"><span class="icon-close"></span></button>
  </div>
  <div class="sidebar-search-input">
    <form>
      <div class="form-search">
        <input id="search" class="input-text" value="" placeholder="Search entire store here ..." type="search">
        <button class="search-btn" type="button">
          <i class="icon-magnifier"></i>
        </button>
      </div>
    </form>
  </div>
</div>
<!-- main-search start -->

<!-- Hero Slider Start -->
@foreach($slideshows as $slideshow)
<div class="hero-slider hero-slider-one">
  <!-- Single Slide Start -->
  <div class="single-slide" style="background-image: url({{ $slideshow->image['original'] }})">
    <!-- Hero Content One Start -->
    <div class="hero-content-one container">
      <div class="row">
        <div class="col-lg-6 col-md-8">
          <div class="slider-text-info">
            <h3>{!! $slideshow->title !!}</h3>
            <h1>{!! $slideshow->description !!}</h1>
            <a href="shop.html" class="btn slider-btn uppercase"><span>خرید</span></a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="slider-inner-image">
            <img src="assets/images/slider/slier-inner-1.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- Hero Content One End -->
  </div>
  <!-- Single Slide End -->
</div>
@endforeach
<!-- Hero Section End -->

<!-- about-area start -->
<div class="about-area section-pt">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="about-image">
          <a href="#"><img src="assets/images/about/about-1.jpg" alt=""></a>
          <span class="text_left">Welcome To Furniture</span>
        </div>

      </div>
      <div class="col-lg-6">
        <div class="about-contents">
          <h3>پیشنهاد ویژه</h3>
          <div class="price-box">
            <span class="old-price">$330.00</span>
            -
            <span class="new-price"> $230.00</span>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius tem incidid ut labore et dolore mag aliqua. Ut enim ad minim veniam, quis nostrud exercitati ullamco laboris nisi ut aliquip ex ea commodo consequ. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepte sint occaecat cupidatat non proident, sunt in culpa qui.</p>
          <button class="btn shop-btn-two">
            SHOP NOW
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- about-area end -->

<!-- product-area start -->
<div class="product-area section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- section-title start -->
        <div class="section-title">
          <h2>پرفروش ترین محصولات</h2>
          <p> توضیحات  توضیحات  توضیحات  توضیحات  توضیحات  توضیحات  توضیحات </p>
        </div>
        <!-- section-title end -->
      </div>
    </div>
    <!-- product-warpper start -->
    <div class="product-warpper">
      <div class="row">
        @forelse ($bestSellings as $bestSelling)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <!-- single-product-wrap start -->
          <div class="single-product-wrap">
            <div class="product-image">
              <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$bestSelling->slug, 'id' => $bestSelling->id]) }}">
                <img src="{{ asset($bestSelling->image['250,250'] ? $bestSelling->image['250,250'] : '/images/no-image.png') }}" alt=""></a>
                <div class="product-action">

                  <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name]) }}"
                    method="post" id="wishlistForm{{ $bestSelling->id }}"
                    style="display:inline;">
                    @csrf
                    <input type="hidden" name="productID" value="{{ $bestSelling->id }}">

                    <a href="javascript:{}"class="wishlist" title="افزودن به علاقه مندی ها"
                    onclick="document.getElementById('wishlistForm{{ $bestSelling->id }}').submit();"
                    data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}"
                    data-tposition="left"><i class="icon-heart"></i></a>
                  </form>


                  @if(\Auth::user())

                  <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$bestSelling->slug, 'id' => $bestSelling->id]) }}">
                    <i class="icon-eye"></i>
                  </a>

                  @endif



                  <form action="{{ route('compare.store', ['shop'=>$shop->english_name]) }}"
                    method="post" id="compareForm{{ $bestSelling->id }}"
                    style="display:inline;">
                    @csrf
                    <input type="hidden" name="productID" value="{{ $bestSelling->id }}">

                    <a href="javascript:{}" class="add-to-cart"
                    onclick="document.getElementById('compareForm{{ $bestSelling->id }}').submit();"
                    data-tooltip="{{ __('app-shop-3-category.afzoodanBeMoghayese') }}"
                    data-tposition="left"><i
                    class="icon-handbag"></i></a>
                  </form>

                  <a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-eye"></i></a>
                </div>
              </div>
              <div class="product-content">
                <h3><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$bestSelling->slug, 'id' => $bestSelling->id]) }}">{{ $bestSelling->title }}</a></h3>
                <div class="price-box">

                  @if($bestSelling->off_price != null and $bestSelling->off_price_started_at < now() and $bestSelling->off_price_expired_at > now())
                      <span class="old-price">{{ number_format($bestSelling->off_price) }} تومان  <i
                                  class="fa fa-arrow-right ml-2"></i><span class="ml-2"><del>{{ number_format($bestSelling->price) }}
                                  {{ __('app-shop-5-index.tooman') }}</del></span></span>
                  @else
                      <span class="new-price">{{ number_format($bestSelling->price) }} تومان</span>
                  @endif

                </div>
              </div>
            </div>
            <!-- single-product-wrap end -->
        </div>
      @empty
          <div class="align-items-center justify-content-center row w-100 text-danger my-5">
              <h4>
                  هیچ محصولی در این فروشگاه وجود ندارد
              </h4>
          </div>
      @endforelse

        </div>
      </div>
      <!-- product-warpper start -->
    </div>
  </div>
  <!-- product-area end -->

  <!-- lg-banner-bg start -->
  <div class="lg-banner-area lg-banner-bg section-ptb">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <div class="lg-banner-info">
            <h2>Contrary to popular belief is not simply rand.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit <br> sed do eiusmod tempor incid</p>
            <a href="#" class="btn more-product-btn">MORE PRODUCTS</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- lg-banner-bg end -->

  <!-- product-area start -->
  <div class="product-area section-ptb">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <!-- section-title start -->
          <div class="section-title">
            <h2>آخرین محصولات</h2>
            <p> توضیحات  توضیحات  توضیحات  توضیحات  توضیحات  توضیحات  توضیحات  توضیحات  توضیحات </p>
          </div>
          <!-- section-title end -->
        </div>
      </div>

      <!-- product-warpper start -->
      <div class="product-warpper">
        <div class="product-slider row">
            @forelse ($lastProducts as $lastProduct)
          <div class="col">
            <!-- single-product-wrap start -->
            <div class="single-product-wrap">
              <div class="product-image">
                <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$lastProduct->slug, 'id' => $lastProduct->id]) }}"><img src="{{ asset($lastProduct->image['250,250'] ? $lastProduct->image['250,250'] : '/images/no-image.png') }}" alt=""></a>
                <div class="product-action">

                                    <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name]) }}"
                                      method="post" id="wishlistForm{{ $lastProduct->id }}"
                                      style="display:inline;">
                                      @csrf
                                      <input type="hidden" name="productID" value="{{ $lastProduct->id }}">

                                      <a href="javascript:{}"class="wishlist" title="افزودن به علاقه مندی ها"
                                      onclick="document.getElementById('wishlistForm{{ $lastProduct->id }}').submit();"
                                      data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}"
                                      data-tposition="left"><i class="icon-heart"></i></a>
                                    </form>


                                    @if(\Auth::user())

                                    <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$lastProduct->slug, 'id' => $lastProduct->id]) }}">
                                      <i class="icon-eye"></i>
                                    </a>

                                    @endif



                                    <form action="{{ route('compare.store', ['shop'=>$shop->english_name]) }}"
                                      method="post" id="compareForm{{ $lastProduct->id }}"
                                      style="display:inline;">
                                      @csrf
                                      <input type="hidden" name="productID" value="{{ $lastProduct->id }}">

                                      <a href="javascript:{}" class="add-to-cart"
                                      onclick="document.getElementById('compareForm{{ $lastProduct->id }}').submit();"
                                      data-tooltip="{{ __('app-shop-3-category.afzoodanBeMoghayese') }}"
                                      data-tposition="left"><i
                                      class="icon-handbag"></i></a>
                                    </form>


                                                    @if(\Auth::user())
                                                            <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                                                                <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$lastProduct->slug, 'id' => $lastProduct->id]) }}" class="text-white">
                                                                    مشاهده محصول
                                                                </a>
                                                            </button>
                                                    @endif


                </div>
              </div>

              @empty
              <div class="align-items-center justify-content-center row w-100 text-danger my-5">
                  <h4>
                      هیچ محصولی در این فروشگاه وجود ندارد
                  </h4>
              </div>
              @endforelse

              <div class="product-content">
                <h3><a href="product-details.html">Products Name 009</a></h3>
                <div class="price-box">
                  <span class="old-price">150.00</span>
                  <span class="new-price">125.00</span>
                </div>
              </div>
            </div>
            <!-- single-product-wrap end -->
          </div>
          <div class="col">
            <!-- single-product-wrap start -->
            <div class="single-product-wrap">
              <div class="product-image">
                <a href="product-details.html"><img src="assets/images/product/10.jpg" alt=""></a>
                <div class="product-action">
                  <a href="#" class="wishlist"><i class="icon-heart"></i></a>
                  <a href="#" class="add-to-cart"><i class="icon-handbag"></i></a>
                  <a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-shuffle"></i></a>
                </div>
              </div>
              <div class="product-content">
                <h3><a href="product-details.html">Products Name 003</a></h3>
                <div class="price-box">
                  <span class="old-price">144.00</span>
                  <span class="new-price">124.00</span>
                </div>
              </div>
            </div>
            <!-- single-product-wrap end -->
          </div>
          <div class="col">
            <!-- single-product-wrap start -->
            <div class="single-product-wrap">
              <div class="product-image">
                <a href="product-details.html"><img src="assets/images/product/11.jpg" alt=""></a>
                <div class="product-action">
                  <a href="#" class="wishlist"><i class="icon-heart"></i></a>
                  <a href="#" class="add-to-cart"><i class="icon-handbag"></i></a>
                  <a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-shuffle"></i></a>
                </div>
              </div>
              <div class="product-content">
                <h3><a href="product-details.html">Products Name 005</a></h3>
                <div class="price-box">
                  <span class="old-price">130.00</span>
                  <span class="new-price">120.00</span>
                </div>
              </div>
            </div>
            <!-- single-product-wrap end -->
          </div>
          <div class="col">
            <!-- single-product-wrap start -->
            <div class="single-product-wrap">
              <div class="product-image">
                <a href="product-details.html"><img src="assets/images/product/12.jpg" alt=""></a>
                <div class="product-action">
                  <a href="#" class="wishlist"><i class="icon-heart"></i></a>
                  <a href="#" class="add-to-cart"><i class="icon-handbag"></i></a>
                  <a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-shuffle"></i></a>
                </div>
              </div>
              <div class="product-content">
                <h3><a href="product-details.html">Products Name 012</a></h3>
                <div class="price-box">
                  <span class="new-price">120.00</span>
                </div>
              </div>
            </div>
            <!-- single-product-wrap end -->
          </div>
          <div class="col">
            <!-- single-product-wrap start -->
            <div class="single-product-wrap">
              <div class="product-image">
                <a href="product-details.html"><img src="assets/images/product/3.jpg" alt=""></a>
                <div class="product-action">
                  <a href="#" class="wishlist"><i class="icon-heart"></i></a>
                  <a href="#" class="add-to-cart"><i class="icon-handbag"></i></a>
                  <a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-shuffle"></i></a>
                </div>
              </div>
              <div class="product-content">
                <h3><a href="product-details.html">Products Name 001</a></h3>
                <div class="price-box">
                  <span class="old-price">140.00</span>
                  <span class="new-price">120.00</span>
                </div>
              </div>
            </div>
            <!-- single-product-wrap end -->
          </div>
          <div class="col">
            <!-- single-product-wrap start -->
            <div class="single-product-wrap">
              <div class="product-image">
                <a href="product-details.html"><img src="assets/images/product/7.jpg" alt=""></a>
                <div class="product-action">
                  <a href="#" class="wishlist"><i class="icon-heart"></i></a>
                  <a href="#" class="add-to-cart"><i class="icon-handbag"></i></a>
                  <a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-shuffle"></i></a>
                </div>
              </div>
              <div class="product-content">
                <h3><a href="product-details.html">Products Name 001</a></h3>
                <div class="price-box">
                  <span class="old-price">140.00</span>
                  <span class="new-price">120.00</span>
                </div>
              </div>
            </div>
            <!-- single-product-wrap end -->
          </div>
        </div>
      </div>
      <!-- product-warpper start -->
    </div>
  </div>
  <!-- product-area end -->

  <!-- banner-area start -->
  <div class="banner-area section-pb">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <!-- single-banner start -->
          <div class="single-banner">
            <div class="banner-bg">
              <a href="shop.html"><img src="assets/images/banner/1.jpg" alt=""></a>
            </div>
            <div class="banner-contet">
              <p>30% Off</p>
              <h3>Chair Collection </h3>
              <a href="#" class="btn-3">SHOP NOW</a>
            </div>
          </div>
          <!-- single-banner end -->
        </div>
        <div class="col-lg-6  col-md-6">
          <!-- single-banner start -->
          <div class="single-banner s-mt-30">
            <div class="banner-bg">
              <a href="shop.html"><img src="assets/images/banner/2.jpg" alt=""></a>
            </div>
            <div class="banner-contet">
              <p>30% Off</p>
              <h3>Chair Collection </h3>
              <a href="#" class="btn-3">SHOP NOW</a>
            </div>
          </div>
          <!-- single-banner end -->
        </div>
      </div>
    </div>
  </div>
  <!-- banner-area end -->
  <div class="row">
    <div class="col-lg-12">
      <!-- section-title start -->
      <div class="section-title">
        <h2>بازخورد مشتریان</h2>
      </div>
      <!-- section-title end -->
    </div>
  </div>
  <!-- testimonial-area start -->
  <div class="testimonial-area testimonial-bg overlay section-ptb">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-md-2 col-md-8 col-sm-12">
          <div class="testimonial-slider">
            <div class="testimonial-inner text-center">
              <div class="test-cont">
                <img src="assets/images/icon/2.png" alt="">
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of passages.</p>
              </div>
              <div class="test-author">
                <h4>Michelle Mitchell</h4>
                <p>ui ux - Designer</p>
              </div>
            </div>
            <div class="testimonial-inner text-center">
              <div class="test-cont">
                <img src="assets/images/icon/2.png" alt="">
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of passages.</p>
              </div>
              <div class="test-author">
                <h4>Michelle Mitchell</h4>
                <p>ui ux - Designer</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- testimonial-area end -->

  <!-- secton-area start -->
  <div class="secton-area section-pt">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="instagram-wrapper">
            <div class="instaram-title text-center">
              <h3>ما را در اینستاگرام دنبال کنید <a href="#">shop@</a></h3>
            </div>
            <div class="instagram-warp instagram-slider row">
              <div class="col-lg-6">
                <div class="single-instagram">
                  <a href="#"><img src="assets/images/instagram/1.jpg" alt=""></a>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="single-instagram">
                  <a href="#"><img src="assets/images/instagram/2.jpg" alt=""></a>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="single-instagram">
                  <a href="#"><img src="assets/images/instagram/1.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-1">
          <div class="subscribe-area">
            <div class="subsctibe-title text-center">
              <h3>عضویت در خبرنامه</h3>
              <p>جهت عضویت در سیستم خبرنامه، آدرس ایمیل خودرا در فرم زیر وارد نموده و برروی گزینه عضویت کلیک نمایید.</p>
            </div>
            <div class="subscribe-content text-center">
              <input class="input-field" type="email" placeholder="your mail address">
              <button class=" btn subscribe-btn">SUBSCRIBE</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- secton-area end -->

  <!-- our-brand-area start -->
  <div class="our-brand-area section-ptb">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="our-brand-active">
            <div class="single-brand">
              <a href="#"><img src="assets/images/brand/1.jpg" alt=""></a>
            </div>
            <div class="single-brand">
              <a href="#"><img src="assets/images/brand/2.jpg" alt=""></a>
            </div>
            <div class="single-brand">
              <a href="#"><img src="assets/images/brand/3.jpg" alt=""></a>
            </div>
            <div class="single-brand">
              <a href="#"><img src="assets/images/brand/4.jpg" alt=""></a>
            </div>
            <div class="single-brand">
              <a href="#"><img src="assets/images/brand/5.jpg" alt=""></a>
            </div>
            <div class="single-brand">
              <a href="#"><img src="assets/images/brand/3.jpg" alt=""></a>
            </div>
            <div class="single-brand">
              <a href="#"><img src="assets/images/brand/4.jpg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- our-brand-area end -->

  @endsection
