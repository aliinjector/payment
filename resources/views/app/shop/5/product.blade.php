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

<!-- breadcrumb-area start -->
<div class="breadcrumb-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="breadcrumb-title">مشاهده محصول</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active">جزئیات محصول</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb product-details-page">
    <div class="container">
      <div class="row">
          <div class="col-12">
            <div class="col-lg-6"><img src="{{ asset($product->image['400,400'] ? $product->image['400,400'] : '/images/no-image.png') }}" alt="" class="col-8 d-block img-thumbnail" style="max-height: 40em;">
  </div>
 </div>
</div>

        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-6">
                <div class="product-details-images">
                    <div class="product_details_container">
                        <!-- product_big_images start -->
                        <div class="product_big_images_gallery">
                            @foreach ($galleries as $gallery)
                            <div class="single-product-gallery">
                                <a href="{{ $gallery->filename }}" class="img-poppu">
                                    <img src="{{ $gallery->filename }}" alt="#">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <!-- product_big_images end -->
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-6">
                <!-- product_details_info start -->
                <div class="product_details_info">
                    <h2>{{ $product->title }}</h2>
                    <!-- pro_rating start -->
                    <div class="pro_rating d-flex">
                        <ul class="product-rating d-flex">
                            <li><span class="icon-star"></span></li>
                            <li><span class="icon-star"></span></li>
                            <li><span class="icon-star"></span></li>
                            <li><span class="icon-star"></span></li>
                            <li><span class="icon-star"></span></li>
                        </ul>

                    </div>
                    <!-- pro_rating end -->

                    <!-- pro_dtl_prize start -->

                    @if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now())
                        <h2 class="pro_dtl_prize">{{ number_format($product->off_price) }} تومان</h2>
                        <span><del>{{ number_format($product->price) }} تومان</del></span>
                        @else
                        <h2 class="old_prize">{{ number_format($product->price) }}تومان </h2>
                        @endif

                    <!-- pro_dtl_prize end -->
                    <!-- pro_dtl_color start-->

                    @if($product->colors->count() != 0)
                    <div class="pro_dtl_color">
                        <h2 class="title_2">انتخاب رنگ</h2>
                        <ul class="pro_choose_color">
                      @php
                      $i = 0;
                       @endphp
                       @foreach($product->colors as $color)
                         <li class="color-sel color-select {{ $i == 0 ? 'active' : '' }}">
                          <a class="options-color tt-border tt-color-bg-08" style="background-color:#{{ $color->code }}" data-color="{{ $color->id }}"></a>
                       </li>
                       @php
                       $i ++;
                        @endphp
                       @endforeach
                    </ul>
                  @endif

                    <!-- pro_dtl_color end-->
                    <!-- pro_dtl_size start -->
                    <div class="pro_dtl_size">
                        <h2 class="title_2">سایز</h2>
                        <ul class="pro_choose_size">
                            <li><a href="#">S</a></li>
                            <li><a href="#">M</a></li>
                            <li><a href="#">XL</a></li>
                            <li><a href="#">XXL</a></li>
                        </ul>
                    </div>
                    <!-- pro_dtl_size end -->
                    <!-- product-quantity-action start -->
                    <div class="product-quantity-action">
                        <div class="prodict-statas"><span class="ml-2">تعداد:</span></div>
                        <div class="product-quantity">
                            <form action="#">
                                <div class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input value="1" type="number">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- product-quantity-action end -->
                    <!-- pro_dtl_btn start -->
                    <ul class="pro_dtl_btn">
                        <li>

                        						@if(\Auth::user())

                        						<a class="buy_now_btn" href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}">
                        						افزودن به سبد خرید</a>

                        						@endif
</li>
                        <li>


                        <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name]) }}" method="post" id="wishlistForm{{ $product->id }}">
                            @csrf
                            <input type="hidden" name="productID" value="{{ $product->id }}">

                          <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $product->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #Ffffff;font-size: 20px;margin-top: 5px;"class="ion-heart"></i></a>
                        </form></li>
                        <li>
                        <form action="{{ route('compare.store', ['shop'=>$shop->english_name]) }}" method="post" id="compareForm{{ $product->id }}">
                            @csrf
                            <input type="hidden" name="productID" value="{{ $product->id }}">

                            <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $product->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                        </form></li>
                    </ul>
                    <!-- pro_dtl_btn end -->
                    <!-- pro_social_share start -->
                    <div class="pro_social_share d-flex">
                        <h2 class="title_2 ml-2">اشتراک گذاری:</h2>
                        <ul class="pro_social_link">
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <!-- pro_social_share end -->
                </div>
                <!-- product_details_info end -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-details-tab mt--60">
                    <ul role="tablist" class="mb--50 nav">
                        <li class="active" role="presentation">
                            <a data-toggle="tab" role="tab" href="#description" class="active">Description</a>
                        </li>
                        <li role="presentation">
                            <a data-toggle="tab" role="tab" href="#sheet">Data sheet</a>
                        </li>
                        <li role="presentation">
                            <a data-toggle="tab" role="tab" href="#reviews">نظرات</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="product_details_tab_content tab-content">
                    <!-- Start Single Content -->
                    <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                        <div class="product_description_wrap">
                            <div class="product_desc mb--30">
                                <h2 class="title_3">Details</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis noexercit ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id.</p>
                            </div>
                            <div class="pro_feature">
                                <h2 class="title_3">Features</h2>
                                <ul class="feature_list">
                                    <li><a href="#"><i class="ion-ios-play-outline"></i>Duis aute irure dolor in reprehenderit in voluptate velit esse</a></li>
                                    <li><a href="#"><i class="ion-ios-play-outline"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>
                                    <li><a href="#"><i class="ion-ios-play-outline"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>
                                    <li><a href="#"><i class="ion-ios-play-outline"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div class="product_tab_content tab-pane" id="sheet" role="tabpanel">
                        <div class="pro_feature">
                            <h2 class="title_3">Data sheet</h2>
                            <ul class="feature_list">
                                <li><a href="#"><i class="ion-ios-play-outline"></i>Duis aute irure dolor in reprehenderit in voluptate velit esse</a></li>
                                <li><a href="#"><i class="ion-ios-play-outline"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>
                                <li><a href="#"><i class="ion-ios-play-outline"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>
                                <li><a href="#"><i class="ion-ios-play-outline"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>
                                <li><a href="#"><i class="ion-ios-play-outline"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>
                                <li><a href="#"><i class="ion-ios-play-outline"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>
                                <li><a href="#"><i class="ion-ios-play-outline"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                        <div class="review_address_inner">
                            <!-- Start Single Review -->
                            <div class="pro_review">
                                <div class="review_thumb">
                                    <img alt="review images" src="assets/images/review/1.jpg">
                                </div>
                                <div class="review_details">
                                    <div class="review_info">
                                        <h4><a href="#">Gerald Barnes</a></h4>
                                        <ul class="product-rating d-flex">
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                        </ul>
                                        <div class="rating_send">
                                            <a href="#"><i class="ion-reply"></i></a>
                                        </div>
                                    </div>
                                    <div class="review_date">
                                        <span>27 Jun, 2018 at 3:30pm</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                </div>
                            </div>
                            <!-- End Single Review -->
                            <!-- Start Single Review -->
                            <div class="pro_review ans">
                                <div class="review_thumb">
                                    <img alt="review images" src="assets/images/review/2.jpg">
                                </div>
                                <div class="review_details">
                                    <div class="review_info">
                                        <h4><a href="#">Gerald Barnes</a></h4>
                                        <ul class="product-rating d-flex">
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                        </ul>
                                        <div class="rating_send">
                                            <a href="#"><i class="ion-reply"></i></a>
                                        </div>
                                    </div>
                                    <div class="review_date">
                                        <span>27 Jun, 2018 at 4:32pm</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                </div>
                            </div>
                            <!-- End Single Review -->
                        </div>
                        <!-- Start RAting Area -->
                        <div class="rating_wrap">
                            <h2 class="rating-title">نظر خود را ثبت کنید</h2>
                            <div class="rating_list">
                                <ul class="product-rating d-flex">
                                    <li><span class="icon-star"></span></li>
                                    <li><span class="icon-star"></span></li>
                                    <li><span class="icon-star"></span></li>
                                    <li><span class="icon-star"></span></li>
                                    <li><span class="icon-star"></span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End RAting Area -->
                        <div class="comments-area comments-reply-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="#" class="comment-form-area">
                                        <div class="comment-input">
                                            <p class="comment-form-author">
                                                <label>نام و نام خانوادگی<span class="required">*</span></label>
                                                <input type="text" required="required" name="Name">
                                            </p>
                                            <p class="comment-form-email">
                                                <label>آدرس ایمیل<span class="required">*</span></label>
                                                <input type="text" required="required" name="email">
                                            </p>
                                        </div>
                                        <p class="comment-form-comment">
                                            <label>نظر خود را یادداشت کنید</label>
                                            <textarea class="comment-notes" required="required"></textarea>
                                        </p>
                                        <div class="comment-form-submit">
                                            <input type="submit" value="ارسال نظر" class="comment-submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->

@endsection
