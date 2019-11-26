@extends('app.new-shop.01.master')

@section('headerScripts')

@endsection

@section('content')
  <div id="tt-pageContent">
        <div class="container-indent">
            <!-- mobile product slider  -->
            <div class="tt-mobile-product-layout visible-xs">
                <div class="tt-mobile-product-slider arrow-location-center slick-animated-show-js">
									@foreach ($galleries as $gallery)
											<div><img src="/{{ $gallery->filename }}" alt=""></div>
									@endforeach
                    <div>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/GhyKqj_P2E4" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div>
                        <div class="tt-video-block">
                            <a href="#" class="link-video"></a>
                            <video class="movie" src="video/video.mp4" poster="video/video_img.jpg"></video>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /mobile product slider  -->
            <div class="container container-fluid-mobile">
                <div class="row">
                    <div class="col-6 hidden-xs">
                        <div class="tt-product-vertical-layout">
                            <div class="tt-product-single-img">
                                <div>
                                    <button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button> <img class="zoom-product" src="{{ $product->image['original'] }}" data-zoom-image="/{{ $product->image['original'] }}" alt=""></div>
                            </div>
                            <div class="tt-product-single-carousel-vertical">
                                <ul id="smallGallery" class="tt-slick-button-vertical slick-animated-show-js">
																	<li><a class="zoomGalleryActive" href="#" data-image="/{{ $galleries[0]->filename }}" data-zoom-image="/{{ $galleries[0]->filename }}"><img src="/{{ $galleries[0]->filename }}" alt=""></a></li>
																	@foreach ($galleries as $gallery)
																	<li><a href="#" data-image="/{{ $gallery->filename }}" data-zoom-image="/{{ $gallery->filename }}"><img src="/{{ $gallery->filename }}" alt=""></a></li>
																	@endforeach


                                    <li><a href="#" data-image="images/product/product-01-03.jpg" data-zoom-image="images/product/product-01-03.jpg"><img src="images/product/product-01-03.jpg" alt=""></a></li>
                                    <li><a href="#" data-image="images/product/product-01-04.jpg" data-zoom-image="images/product/product-01-04.jpg"><img src="images/product/product-01-04.jpg" alt=""></a></li>




																		<li>
                                        <div class="video-link-product" data-toggle="modal" data-type="youtube" data-target="#modalVideoProduct" data-value="http://www.youtube.com/embed/GhyKqj_P2E4"><img src="images/product/product-small-empty.png" alt="">
                                            <div><i class="icon-f-32"></i></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="video-link-product" data-toggle="modal" data-type="video" data-target="#modalVideoProduct" data-value="video/video.mp4" data-poster="video/video_img.jpg"><img src="images/product/product-small-empty.png" alt="">
                                            <div><i class="icon-f-32"></i></div>
                                        </div>
                                    </li>



                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="tt-product-single-info">
                            <div class="tt-add-info">
                                <ul>
                                    <li><span>کد کالا:</span> {{ $product->id }}</li>
                                    <li style="display:none"><span>موجودی:</span> 40 عدد</li>
                                </ul>
                            </div>
                            <h3 class="tt-title">{{ $product->title }}</h3>
                            <div class="tt-price"><span class="new-price">{{ number_format($product->price) }} تومان</span></div>
                            <div class="tt-review">
                                <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-half"></i> <i class="icon-star-empty"></i></div><a class="product-page-gotocomments-js" href="#">{{ $product->comments->count() }} نظر مشتری </a></div>

                            <div class="tt-wrapper">
                                <div class="tt-row-custom-01">
                                    <div class="col-item">
                                        <div class="tt-input-counter style-01"><span class="minus-btn"></span>
                                            <input type="text" value="1" size="5"> <span class="plus-btn"></span></div>
                                    </div>
                                    <div class="col-item"><a href="#" class="btn btn-lg"><i class="icon-f-39"></i>افزودن به سبد خرید</a></div>
                                </div>
                            </div>
                            <div class="tt-wrapper">
                                <ul class="tt-list-btn">
                                    <li><a class="btn-link" href="#"><i class="icon-n-072"></i>افزودن به علاقه مندی</a></li>
                                    <li><a class="btn-link" href="#"><i class="icon-n-08"></i>افزودن به مقایسه</a></li>
                                </ul>
                            </div>
                            <div class="tt-wrapper">
                                <div class="tt-add-info">
                                    <ul>
                                        <li><span>برند:</span> Polo</li>
                                        <li><span>نوع محصول:</span> T-Shirt</li>
                                        <li><span>تگ ها:</span> <a href="#">T-Shirt</a>, <a href="#">Women</a>, <a href="#">Top</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tt-collapse-block">
                                <div class="tt-item">
                                    <div class="tt-collapse-title">توضیحات</div>
                                    <div style="text-align: justify" class="tt-collapse-content">
																			{{ $product->description }}
																		</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-collapse-title">ویژگی ها</div>
                                    <div class="tt-collapse-content">
                                        <table class="tt-table-03">
                                            <tbody>
                                                <tr>
                                                    <td>Color:</td>
                                                    <td>Blue, Purple, White</td>
                                                </tr>
                                                <tr>
                                                    <td>Size:</td>
                                                    <td>20, 24</td>
                                                </tr>
                                                <tr>
                                                    <td>Material:</td>
                                                    <td>100% Polyester</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-collapse-title tt-poin-comments">نظرات (3)</div>
                                    <div class="tt-collapse-content">
                                        <div class="tt-review-block">
                                            <div class="tt-row-custom-02">
                                                <div class="col-item">
                                                    <h2 class="tt-title">1 REVIEW FOR VARIABLE PRODUCT</h2></div>
                                                <div class="col-item"><a href="#">ثبت نظر جدید</a></div>
                                            </div>
                                            <div class="tt-review-comments">
                                                <div class="tt-item">
                                                    <div class="tt-avatar">
                                                        <a href="#"><img src="images/product/single/review-comments-img-01.jpg" alt=""></a>
                                                    </div>
                                                    <div class="tt-content">
                                                        <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-half"></i> <i class="icon-star-empty"></i></div>
                                                        <div class="tt-comments-info"><span class="username">by <span>ADRIAN</span></span> <span class="time">on January 14, 2017</span></div>
                                                        <div class="tt-comments-title">Very Good!</div>
                                                        <p>Ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                                                    </div>
                                                </div>
                                                <div class="tt-item">
                                                    <div class="tt-avatar">
                                                        <a href="#"><img src="images/product/single/review-comments-img-02.jpg" alt=""></a>
                                                    </div>
                                                    <div class="tt-content">
                                                        <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-half"></i> <i class="icon-star-empty"></i></div>
                                                        <div class="tt-comments-info"><span class="username">by <span>JESICA</span></span> <span class="time">on January 14, 2017</span></div>
                                                        <div class="tt-comments-title">Bad!</div>
                                                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    </div>
                                                </div>
                                                <div class="tt-item">
                                                    <div class="tt-avatar">
                                                        <a href="#"></a>
                                                    </div>
                                                    <div class="tt-content">
                                                        <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-half"></i> <i class="icon-star-empty"></i></div>
                                                        <div class="tt-comments-info"><span class="username">by <span>ADAM</span></span> <span class="time">on January 14, 2017</span></div>
                                                        <div class="tt-comments-title">Very Good!</div>
                                                        <p>Diusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tt-review-form">
                                                <div class="tt-message-info">BE THE FIRST TO REVIEW <span>“BLOUSE WITH SHEER &AMP; SOLID PANELS”</span></div>
                                                <p>Your email address will not be published. Required fields are marked *</p>
                                                <div class="tt-rating-indicator">
                                                    <div class="tt-title">YOUR RATING *</div>
                                                    <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-half"></i> <i class="icon-star-empty"></i></div>
                                                </div>
                                                <form class="form-default">
                                                    <div class="form-group">
                                                        <label for="inputName" class="control-label">نام *</label>
                                                        <input type="email" class="form-control" id="inputName" placeholder="Enter your name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail" class="control-label">ایمیل *</label>
                                                        <input type="password" class="form-control" id="inputEmail" placeholder="Enter your e-mail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="textarea" class="control-label">متن نظر *</label>
                                                        <textarea class="form-control" id="textarea" placeholder="Enter your review" rows="8"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn">ثبت</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-indent wrapper-social-icon">
            <div class="container">
                <ul class="tt-social-icon justify-content-center">
                    <li>
                        <a class="icon-g-64" href="http://www.facebook.com/"></a>
                    </li>
                    <li>
                        <a class="icon-h-58" href="http://www.facebook.com/"></a>
                    </li>
                    <li>
                        <a class="icon-g-66" href="http://www.twitter.com/"></a>
                    </li>
                    <li>
                        <a class="icon-g-67" href="http://www.google.com/"></a>
                    </li>
                    <li>
                        <a class="icon-g-70" href="https://instagram.com/"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <div class="tt-block-title text-left">
                    <h3 class="tt-title-small">محصولات مشابه</h3></div>
                <div class="tt-carousel-products row arrow-location-right-top tt-alignment-img tt-layout-product-item slick-animated-show-js">

									@foreach($offeredProducts as $offeredProduct)
                    <div class="col-2 col-md-4 col-lg-3">
                        <div class="tt-product thumbprod-center">
                            <div class="tt-image-box">
                                <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                <a href="#" class="tt-btn-compare" data-tooltip="مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="{{ $offeredProduct->image['original'] }}" alt=""></span><span class="tt-img-roll-over"><img src="$offeredProduct->galleries[1]" alt=""></span></a></div>
                            <div class="tt-description">
                                <div class="tt-row">
                                    <ul class="tt-add-info">
                                        <li><a href="#">{{ $offeredProduct->productCategory->name }}</a></li>
                                    </ul>
                                    <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i></div>
                                </div>
                                <h2 class="tt-title"><a href="product.html">{{ $offeredProduct->title }}</a></h2>
                                <div class="tt-price">{{ number_format($offeredProduct->price) }} تومان </div>
                                <div class="tt-product-inside-hover">
                                    <div class="tt-row-btn"><a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">افزودن به سبد خرید</a></div>
                                    <div class="tt-row-btn">
                                        <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                        <a href="#" class="tt-btn-wishlist"></a>
                                        <a href="#" class="tt-btn-compare"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
									@endforeach

                </div>
            </div>
        </div>
    </div>

		@endsection

		@section('footerScripts')

		@endsection
