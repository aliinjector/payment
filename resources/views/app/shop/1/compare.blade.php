@extends('app.shop.1.layouts.master')
@section('content')
    <link rel="stylesheet" href="/app/shop/1/assets/css/compare.css">

    <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
{{--                    <h4 class="page-title iranyekan">فروشگاه {{ $shop->name }}</h4>--}}
{{--                    <p class="text-muted mb-3 mt-1">{{ $shop->description }}</p>--}}
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <h2 class="line-throw"><span>مقایسه محصولات </span></h2>



    <section style="direction: rtl" class="cd-products-comparison-table">
        <header>
            <div class="actions">
            </div>
        </header>

        <div class="cd-products-table">
            <div class="features">
                <div class="top-info">محصولات انتخاب شده</div>
                <ul class="cd-features-list">
                    <li>قیمت</li>
                    <li>امتیاز کاربران</li>
                    <li>رزولوشن</li>
                    <li>نوع مانیتور</li>
                    <li>اندازه مانیتور</li>
                    <li>رفرش ریت</li>
                    <li>سال تولید</li>
                    <li>تکنولوژی تونر</li>
                    <li>ورودی اترنت</li>
                    <li>پورت ورودی</li>
                </ul>
            </div> <!-- .features -->

            <div class="cd-products-wrapper">
                <ul class="cd-products-columns">
                    <li class="product">
                        <div class="top-info">
                            <img src="/app/shop/1/assets/images/labtop.jpg" alt="product image">
                            <h3>Sumsung Series 6 J6300</h3>
                        </div> <!-- .top-info -->

                        <ul class="cd-features-list">
                            <li>$600</li>
                            <li class="rate"><span>5/5</span></li>
                            <li>1080p</li>
                            <li>LED</li>
                            <li>47.6 inches</li>
                            <li>800Hz</li>
                            <li>2015</li>
                            <li>mpeg4</li>
                            <li>1 Side</li>
                            <li>3 Port</li>
                        </ul>
                    </li> <!-- .product -->

                </ul> <!-- .cd-products-columns -->
            </div> <!-- .cd-products-wrapper -->

            <ul class="cd-table-navigation">
                <li><a href="#0" class="prev inactive">قبلی</a></li>
                <li><a href="#0" class="next">بعدی</a></li>
            </ul>
        </div> <!-- .cd-products-table -->
    </section> <!-- .cd-products-comparison-table -->



    <!-- container -->

@endsection
@section('pageScripts')
    <script src="/app/shop/1/assets/js//modernizr.js"></script> <!-- Modernizr -->
    <script src="/app/shop/1/assets/js//compare.js"></script>
@stop
