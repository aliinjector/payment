@extends('app.shop.1.layouts.master')
@section('content')

    <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <h2 class="line-throw"><span>مقایسه محصولات </span></h2>



    <section style="direction: rtl" class="cd-products-comparison-table ">
        <header>
            <div class="actions">
            </div>
        </header>

        <div class="cd-products-table">
            <div class="features">
                <div class="top-info iranyekan">محصولات انتخاب شده</div>
                <ul class="cd-features-list">
                    <li>قیمت</li>
                </ul>
            </div> <!-- .features -->

            <div class="cd-products-wrapper">
                <ul class="cd-products-columns">
                  @foreach($compareProducts as $compareProduct)
                    <li class="product">
                        <div class="top-info">
                            <img src="/app/shop/1/assets/images/labtop.jpg" alt="product image">
                            <h3>{{ $compareProduct->title }}</h3>
                        </div> <!-- .top-info -->

                        <ul class="cd-features-list">
                            <li>$600</li>
                        </ul>
                    </li>
                  @endforeach

                </ul> <!-- .cd-products-columns -->
            </div> <!-- .cd-products-wrapper -->

        </div> <!-- .cd-products-table -->
    </section> <!-- .cd-products-comparison-table -->



    <!-- container -->

@endsection
@section('pageScripts')
    <script src="/app/shop/1/assets/js//modernizr.js"></script> <!-- Modernizr -->
    <script src="/app/shop/1/assets/js//compare.js"></script>
@stop
