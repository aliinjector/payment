@extends('app.shop.2.layouts.master')

@section('headerScripts')

@endsection

@section('content')
<div id="tt-pageContent">
    <div class="container-indent nomargin">
        <div class="container-fluid-custom">
            <div class="row tt-layout-promo-box">
                <div class="col-sm-12 col-md-6">
                    <a href="listing-left-column.html" class="tt-promo-box tt-one-child"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/promo/index09-promo-img-01.jpg" alt="">
                        <div class="tt-description">
                            <div class="tt-description-wrapper">
                                <div class="tt-background"></div>
                                <div class="tt-title-small">لپتاپ</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a href="listing-left-column.html" class="tt-promo-box tt-one-child"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/promo/index09-promo-img-02.jpg" alt="">
                        <div class="tt-description">
                            <div class="tt-description-wrapper">
                                <div class="tt-background"></div>
                                <div class="tt-title-small">موبایل</div>
                            </div>
                        </div>
                    </a>
                    <a href="listing-left-column.html" class="tt-promo-box tt-one-child"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/promo/index09-promo-img-03.jpg" alt="">
                        <div class="tt-description">
                            <div class="tt-description-wrapper">
                                <div class="tt-background"></div>
                                <div class="tt-title-small">تبلت</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container">
            <div class="tt-block-title">
                <h1 class="tt-title">درباره فروشگاه امید</h1></div>
            <div class="tt-text-box01">شرکت رایانه خدمات امید (سهامی خاص) به‌ منظور ایجاد ظرفیت‌ها و پتانسیل‌های بیشتر در جهت تأمین نیازهای فناوری اطلاعات و ارتباطات بانک سپه در تاریخ 1384/04/01 و با شماره 248987 در اداره ثبت شرکت‌های تهران به ثبت رسید.</div>
        </div>
    </div>
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <ul class="nav nav-tabs tt-tabs-default" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tt-tab01-01">آخرین محصولات</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tt-tab01-02">پرفروش ترین ها</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tt-tab01-03">پربازدید ترین ها</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tt-tab01-04">محصولات دارای تخفیف</a></li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="tt-tab01-01">

                    <div class="row tt-layout-product-item">

                      @foreach($lastProducts as $product)

                        <div class="col-6 col-md-4 col-lg-3">
                          @include('app.shop.2.layouts.partials.product')
                        </div>

                        @endforeach

                    </div>

                </div>

                <div class="tab-pane" id="tt-tab01-02">
                    <div class="row tt-layout-product-item">

                      @foreach($bestSelling as $product)

                        <div class="col-6 col-md-4 col-lg-3">
                          @include('app.shop.2.layouts.partials.product')
                        </div>

                        @endforeach

                    </div>
                </div>
                <div class="tab-pane" id="tt-tab01-03">
                    <div class="row tt-layout-product-item">

                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-45.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-45-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 78</div>
                                    <div class="tt-option-block">
                                        <ul class="tt-options-swatch">
                                            <li>
                                                <a class="options-color tt-color-bg-03" href="#"></a>
                                            </li>
                                            <li>
                                                <a class="options-color tt-color-bg-04" href="#"></a>
                                            </li>
                                            <li>
                                                <a class="options-color tt-color-bg-05" href="#"></a>
                                            </li>
                                        </ul>
                                    </div>
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
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-14.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-14-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 51</div>
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


                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-10.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-10-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                        <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i></div>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 124</div>
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
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-07.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-07-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 12</div>
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

                    </div>
                </div>
                <div class="tab-pane" id="tt-tab01-04">
                    <div class="row tt-layout-product-item">
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-07.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-07-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 12</div>
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


                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-45.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-45-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 78</div>
                                    <div class="tt-option-block">
                                        <ul class="tt-options-swatch">
                                            <li>
                                                <a class="options-color tt-color-bg-03" href="#"></a>
                                            </li>
                                            <li>
                                                <a class="options-color tt-color-bg-04" href="#"></a>
                                            </li>
                                            <li>
                                                <a class="options-color tt-color-bg-05" href="#"></a>
                                            </li>
                                        </ul>
                                    </div>
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
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-14.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-14-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 51</div>
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
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-15.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-15-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 12</div>
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


                    </div>
                </div>
                <div class="tab-pane" id="tt-tab01-05">
                    <div class="row tt-layout-product-item">
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-41.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-41-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                        <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-half"></i> <i class="icon-star-empty"></i></div>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 24</div>
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
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-18.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-18-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                        <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i></div>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 124</div>
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
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-07.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-07-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 12</div>
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




                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="tt-product thumbprod-center">
                                <div class="tt-image-box">
                                    <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
                                    <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a> <a href="product.html"><span class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-15.jpg" alt=""></span><span class="tt-img-roll-over"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-15-01.jpg" alt=""></span></a></div>
                                <div class="tt-description">
                                    <div class="tt-row">
                                        <ul class="tt-add-info">
                                            <li><a href="#">دسته بندی</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                                    <div class="tt-price">تومان 12</div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>
    <div class="container-indent mt-5 mb-5">
        <div class="container">
            <div class="tt-slider-fullwidth arrow-location-center-02 slick-animated-show-js">
              @foreach($feedbacks as $feedback)
              <div class="item">
                <a href="blog-single-post.html" class="tt-content-info">
                  <h2 class="tt-title">نظر مشتریان درباره فروشگاه امید</h2>
                  <p>{{ $feedback->feedback }}</p>
                  <div class="tt-subscription">
                    <div class="tt-text-large">{{ $feedback->title }}</div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
        </div>
    </div>

    <br><br><br>

    <div class="container-indent mt-5  mb-5">
        <div class="container">
            <div class="row tt-carousel-brands arrow-location-center-02 tt-arrow-hover slick-animated-show-js">

              @foreach($brands as $brand)
                <div>
                    <a href="/brands/{{ $brand->id }}"><img src="{{ $brand->icon['120,50'] }}" alt=""></a>
                </div>
              @endforeach

            </div>
        </div>
    </div>

    <br><br>

</div>
@endsection

@section('footerScripts')

@endsection
