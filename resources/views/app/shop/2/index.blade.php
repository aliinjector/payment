@extends('app.shop.2.layouts.master')
@section('headerScripts')
<link rel="stylesheet" href="{{ asset('/app/shop/2/css/app-index.css') }}" />


@toastr_css
@endsection

@section('content')
<div id="tt-pageContent">
    @if($slideshows->count() > 0)
        <br><br><br>
        <div class="slideshow-container">

            @foreach($slideshows as $slideshow)

            <div class="mySlides fade">
                <a href="{{ $slideshow->url }}">
                    <div class="text2">{!! $slideshow->title !!}</div>
                    <img class="d-block w-100 slide-image" src="{{ $slideshow->image['original'] }}" alt="{{ $slideshow->title }}" style=" height: 34vh;">
                    <div class="text">{!! $slideshow->description !!}</div>
                </a>
            </div>

            @endforeach

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>


        <br><br><br>
        @endif



        <div>
            @if($errors->any())
                <div class="alert alert-danger p-5">
                    <p><strong>متاسفانه خطایی پیش آمده:</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        </div>
        @if($slideCategories != null and count($slideCategories) == 3)
        <div class="container-indent nomargin">
            <div class="container-fluid-custom">
                <div class="row tt-layout-promo-box">
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$slideCategories[0]->id, 'name' => $slideCategories[0]->name]) }}" class="tt-promo-box tt-one-child"><img src="/app/shop/2/images/loader.svg"
                              data-src="{{ $slideCategories[0]->icon['931,800'] }}" alt="">
                            <div class="tt-description">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-small">{{ $slideCategories[0]->name }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$slideCategories[1]->id, 'name' => $slideCategories[1]->name]) }}" class="tt-promo-box tt-one-child"><img src="/app/shop/2/images/loader.svg"
                              data-src="{{ $slideCategories[1]->icon['930,390']  }}" alt="" style="max-height: 60vh;">
                            <div class="tt-description">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-small">{{ $slideCategories[1]->name }}</div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$slideCategories[2]->id, 'name' => $slideCategories[2]->name]) }}" class="tt-promo-box tt-one-child"><img src="/app/shop/2/images/loader.svg"
                              data-src="{{ $slideCategories[2]->icon['930,390'] }}" alt="" style="max-height: 60vh;">
                            <div class="tt-description">
                                <div class="tt-description-wrapper">
                                    <div class="tt-background"></div>
                                    <div class="tt-title-small">{{ $slideCategories[2]->name }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- <div class="container-indent">
        <div class="container">
            <div class="tt-block-title">
                <h1 class="tt-title">{{ __('app-shop-2-index.darbareFrooshgah') }}</h1>
</div>
<div class="tt-text-box01">شرکت رایانه خدمات امید (سهامی خاص) به‌ منظور ایجاد ظرفیت‌ها و پتانسیل‌های بیشتر در جهت تأمین نیازهای فناوری اطلاعات و ارتباطات بانک سپه در تاریخ 1384/04/01 و با شماره 248987 در اداره ثبت شرکت‌های تهران به ثبت
    رسید.</div>
</div>
</div> --}}
<div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
        <ul class="nav nav-tabs tt-tabs-default" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tt-tab01-01">{{ __('app-shop-2-index.akharinMahsoolat') }}</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tt-tab01-02">{{ __('app-shop-2-index.porfrooshtarinHa') }}</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tt-tab01-03">{{ __('app-shop-2-index.porbazdidTarinHa') }}</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tt-tab01-04">{{ __('app-shop-2-index.darayeTakhfif') }}</a></li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane active" id="tt-tab01-01">

                <div class="row tt-layout-product-item">

                    @forelse($lastProducts as $product)

                    <div class="col-6 col-md-4 col-lg-3 m-90">
                        @include('app.shop.2.layouts.partials.product')
                    </div>

                  @empty
                    <div class="text-danger" style="font-size:17px">
                      <p>محصولی در این بخش وجود ندارد</p>
                    </div>
                  @endforelse

                </div>

            </div>

            <div class="tab-pane" id="tt-tab01-02">
                <div class="row tt-layout-product-item">

                    @forelse($bestSellings as $product)

                    <div class="col-6 col-md-4 col-lg-3 m-90">
                        @include('app.shop.2.layouts.partials.product')
                    </div>

                    @empty
                      <div class="text-danger" style="font-size:17px">
                        <p>محصولی در این بخش وجود ندارد</p>
                      </div>
                    @endforelse

                </div>
            </div>
            <div class="tab-pane" id="tt-tab01-03">
                <div class="row tt-layout-product-item">
                    @forelse($mostView as $product)

                    <div class="col-6 col-md-4 col-lg-3 m-90">
                        @include('app.shop.2.layouts.partials.product')
                    </div>

                  @empty
                    <div class="text-danger" style="font-size:17px">
                      <p>محصولی در این بخش وجود ندارد</p>
                    </div>
                  @endforelse
                </div>
            </div>
            <div class="tab-pane" id="tt-tab01-04">
                <div class="row tt-layout-product-item">
                  @forelse($hasDescount as $product)

                    <div class="col-6 col-md-4 col-lg-3 m-90">

                        @include('app.shop.2.layouts.partials.product')

                    </div>


                  @empty
                    <div class="text-danger" style="font-size:17px">
                      <p>محصولی در این بخش وجود ندارد</p>
                    </div>
                  @endforelse

                </div>
            </div>

        </div>
    </div>
</div>

<br><br><br>
<div class="container-indent mt-5 mb-5">
    <div class="container text-center">
        <div class="tt-slider-fullwidth arrow-location-center-02 slick-animated-show-js">
            @foreach($feedbacks as $feedback)
            <div class="item">

                <h2 class="tt-title">نظر مشتریان درباره فروشگاه امید</h2>
                <p>{{ $feedback->feedback }}</p>
                <div class="tt-subscription">
                    <div class="tt-text-large">{{ $feedback->title }}</div>
                </div>

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
                <a href="{{ route('brand', ['shop' => $shop->english_name, 'id' => $brand->id]) }}"><img src="{{ $brand->icon['120,50'] }}" alt=""></a>
            </div>
            @endforeach

        </div>
    </div>
</div>

<br><br>

</div>
@endsection

@section('footerScripts')
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>

@endsection
