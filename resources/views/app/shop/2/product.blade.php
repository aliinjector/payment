@extends('app.shop.2.layouts.master')

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

            </div>
        </div>
        <!-- /mobile product slider  -->
        <div class="container container-fluid-mobile">
            <div class="row">
                <div class="col-6 hidden-xs">

                    <div class="tt-product-vertical-layout">
                        <div class="tt-product-single-img">
                            <div>
                                <button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button> <img class="zoom-product" src="{{ $product->image['original'] }}" data-zoom-image="{{ $product->image['original'] }}" alt=""></div>
                        </div>
                        <div class="tt-product-single-carousel-vertical">
                            <ul id="smallGallery" class="tt-slick-button-vertical slick-animated-show-js">

                                <li><a class="zoomGalleryActive" href="#" data-image="{{ $product->image['original'] }}" data-zoom-image="{{ $product->image['original'] }}"><img src="{{ $product->image['original'] }}" alt=""></a></li>

                                @foreach ($galleries as $gallery)
                                <li><a href="#" data-image="/{{ $gallery->filename }}" data-zoom-image="/{{ $gallery->filename }}"><img src="/{{ $gallery->filename }}" alt=""></a></li>
                                @endforeach

                                @foreach ($galleries->where('product_id', $product->id)->where('type', 'video')->take(1) as $video)
                                <li>
                                    <div class="video-link-product" data-toggle="modal" data-type="video" data-target="#modalVideoProduct" data-value="/{{ $video->filename }}" data-poster="video/video_img.jpg"><img
                                          src="/app/shop/2/images/product//product-small-empty.png" alt="">
                                        <div><i class="icon-f-32"></i></div>
                                    </div>
                                </li>
                                @endforeach






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
                        <h3 class="tt-title m-4">{{ $product->title }}</h3>
                        <div class="tt-price m-4"><span class="new-price">{{ number_format($product->price) }} تومان</span></div>
                        <div class="tt-review m-4">
                            <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-half"></i> <i class="icon-star-empty"></i></div><a class="product-page-gotocomments-js"
                              href="#">{{ $product->comments->count() }} نظر مشتری </a>
                        </div>

                        <div class="tt-wrapper m-4">
                            <div class="tt-row-custom-01">
                                <div class="col-item">
                                    <div class="tt-input-counter style-01"><span class="minus-btn"></span>
                                        <input type="text" value="1" size="5"> <span class="plus-btn"></span></div>
                                </div>
                                @auth
                                <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" class="btn tt-btn-addtocart btn-cart btn-sm waves-effect waves-light iranyekan btn btn-lg"><i class="icon-f-39"></i>
                                        @if($product->type == 'file') دریافت فایل
                                            @else اضافه به سبد خرید
                                            @endif</button>
                                </form>
                                @endauth
                            </div>
                        </div>
                        <div class="tt-wrapper m-4">
                            <ul class="tt-list-btn">
                                <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
                                <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="myForm{{ $product->id }}">
                                    @csrf

                                    <li><a class="btn-link" href="javascript:{}" onclick="document.getElementById('myForm{{ $product->id }}').submit();"><i class="icon-n-072"></i>افزودن به علاقه مندی</a></li>
                                </form>

                                <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="compareForm{{ $product->id }}">
                                    @csrf

                                    <li><a class="btn-link" href="javascript:{}" onclick="document.getElementById('compareForm{{ $product->id }}').submit();"><i class="icon-n-08"></i>افزودن به مقایسه</a></li>

                                </form>

                            </ul>
                        </div>
                        <div class="tt-wrapper m-4">
                            <div class="tt-add-info">

                                <ul class="tt-options-swatch options-middle flex-row mb-2">
                                    @foreach($product->colors as $color)
                                        <li>
                                            <a class="options-color tt-border tt-color-bg-08" href="#" style="background-color:#{{ $color->code }}"></a>
                                        </li>
                                        @endforeach
                                </ul>

                                <ul>
                                    @if ($product->type == "file")
                                    <h6 class="text-muted font-13">حجم فایل :</h6>
                                    <ul class="list-unstyled pro-features border-0 iranyekan">
                                        <li>{{ round($product->file_size / 1048576,2)}} مگابایت</li>
                                    </ul>
                                    @endif
                                    @if ($product->type == "product")
                                    <h6 class="text-muted font-13">وزن محصول :</h6>
                                    <ul class="list-unstyled pro-features border-0 iranyekan">
                                        <li>{{ $product->weight }} گرم</li>
                                    </ul>
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="tt-collapse-block m-4">
                            <div class="tt-item">
                                <div class="tt-collapse-title">توضیحات</div>
                                <div style="text-align: justify" class="tt-collapse-content">
                                    {{ $product->description }}
                                </div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-collapse-title">ویژگی ها</div>
                                <div class="tt-collapse-content">
                                    <ul class="list-unstyled pro-features border-0 iranyekan">
                                        @for ($i=1; $i <= 10; $i++)
                                          <div class="wrapper d-inline-block">
                                            @if ($product->{"feature_{$i}"})
                                            <li class="ty-compact-list">{{ $product->{"feature_{$i}"} }} </li>
                                            @endif
                                            @endfor
                                            <div class="show-more mr-1 mt-4" style="line-height: 2;"><i class="fas fa-plus"></i>
                                                <span class="toggle-show">موارد بیشتر</span>
                                            </div>
                                </div>
                                </ul>
                            </div>
                        </div>
                        <div class="tt-item">
                            <div class="tt-collapse-title tt-poin-comments">نظرات ({{ $product->comments->where('approved', '1')->count() }})</div>
                            <div class="tt-collapse-content">
                                <div class="tt-review-block">
                                    <div class="tt-row-custom-02">
                                    </div>
                                    <div class="tt-review-comments">

                                        @foreach ($comments->where('approved', '1')->where('parent_id', '0') as $comment)
                                        <div class="tt-item">
                                            <div class="tt-avatar">
                                                <a href="#"></a>
                                            </div>
                                            <div class="tt-content">
                                                <div class="tt-comments-info"><span class="username">توسط: <span>{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</span></span> <span class="time"> -
                                                        {{ jdate($comment->created_at)->ago() }}</span></div>
                                                <p style="padding: 10px 10px 10px 10px;  margin: 10px 10px 10px 10px;  background-color: #f7f8fa;  border-radius: 5px;">{{ $comment->comment }}</p>
                                            </div>
                                        </div>

                                        @foreach ($comments->where('approved', '1')->where('parent_id', $comment->id) as $comment)
                                        <div class="tt-item">
                                            <div class="tt-avatar">
                                                <i style="margin: 40px;" class="fa fa-reply"></i>
                                            </div>
                                            <div class="tt-content">
                                                <div class="tt-comments-info"><span class="username">توسط: <span>{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</span></span> <span class="time"> -
                                                        {{ jdate($comment->created_at)->ago() }}</span></div>
                                                <p style="padding: 10px 10px 10px 10px;  margin: 10px 10px 10px 10px;  background-color: #f7f8fa;  border-radius: 5px;">{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                        @endforeach




                                        @endforeach

                                    </div>
                                    <div class="tt-review-form">


                                        @auth

                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                <p><strong>متاسفانه مشکلی در ارسال نظر رخ داده است:</strong></p>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif



                                            <form class="form-default" method="post" action="/comment">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="" for="">ثبت نظر شما:</label>
                                                    <textarea style="font-family: iranyekan" placeholder="متن نظر را وارد نمایید" class="form-control" name="comment" id="" cols="30" rows="5"></textarea>
                                                    <input type="hidden" name="parent_id" value="0">
                                                    <input type="hidden" name="commentable_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                                    <input type="hidden" name="commentable_type" value="{{ get_class($product) }}">
                                                </div>
                                                <div class="form-group">
                                                    <center><button style="color: white" class="btn bg-blue-omid mt-4">ارسال نظر</button></center>
                                                </div>
                                            </form>
                                            @endauth

                                            @guest()
                                            <a href="{{ route('login')  }}">
                                                <div class="alert alert-danger">جهت ثبت نظر درسایت باید وارد شوید‌. برای ورود یا عضویت اینجا
                                                    کلیک کنید.
                                                </div>
                                            </a>
                                            @endguest

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

            @if(strlen($shop->shopContact->facebook_url) > 3 )
                <li><a target="_blank" class="fa fa-facebook" href="{{ $shop->shopContact->facebook_url }}"></a></li>
                @endif

                @if(strlen($shop->shopContact->instagram_url) > 3 )
                    <li><a class="fa fa-instagram" href="{{ $shop->shopContact->instagram_url }}"></a></li>
                    @endif

                    @if(strlen($shop->shopContact->telegram_url) > 3 )
                        <li><a class="fa fa-telegram" href="{{ $shop->shopContact->telegram_url }}"></a></li>
                        @endif


        </ul>
    </div>
</div>
<div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
        <div class="tt-block-title text-left">
            <h3 class="tt-title-small">محصولات مشابه</h3>
        </div>
        <div class="tt-carousel-products row arrow-location-right-top tt-alignment-img tt-layout-product-item slick-animated-show-js">

            @foreach($offeredProducts as $product)
            <div class="col-6 col-md-4 col-lg-3">
                @include('app.shop.2.layouts.partials.product')
            </div>
            @endforeach

        </div>
    </div>
</div>
</div>

@endsection

@section('footerScripts')

@endsection
