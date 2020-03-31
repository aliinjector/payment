@extends('app.shop.2.layouts.master')
@section('headerScripts')
<link rel="stylesheet" href="/app/shop/2/assets/css/bootstrap-select.css" />
<link rel="stylesheet" href="/app/shop/2/assets/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="/app/shop/1/assets/css/custom.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<style media="screen">
    .h-50-vh {
        height: 50vh !important;

        .w-22 {
            width: 22% !important;
        }
    }

    @mediaonly screen and (max-width: 400px) {
        .icon-f-39 {
            display: none;
        }
    }
    .card{
      height: 520px;
    }
    .crd-img{
          height: 335px;
    }
    .crd-img-off{
          height: 305px!important;
    }
    @media only screen and (max-width: 600px) {
  .icon-f-39 {
  display: none;
  }
}
.collapse{
  display: inline!important;
}
.dropdown-toggle::after {
    display: none!important;
}
</style>
<div id="tt-pageContent">
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
                                <button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button> <img class="zoom-product" src="{{ asset($product->image['original'] ? $product->image['original'] : '/images/no-image.png') }}" data-zoom-image="{{ asset($product->image['original'] ? $product->image['original'] : '/images/no-image.png') }}" alt="">
                            </div>
                        </div>
                        <div class="tt-product-single-carousel-vertical">
                            <ul id="smallGallery" class="tt-slick-button-vertical slick-animated-show-js">
                                <li><a class="zoomGalleryActive" href="#" data-image="{{ asset($product->image['original'] ? $product->image['original'] : '/images/no-image.png') }}" data-zoom-image="{{ asset($product->image['original'] ? $product->image['original'] : '/images/no-image.png') }}"><img src="{{ asset($product->image['original'] ? $product->image['original'] : '/images/no-image.png') }}" alt=""></a></li>
                                @foreach ($galleries as $gallery)
                                <li><a href="#" data-image="/{{ $gallery->filename }}" data-zoom-image="/{{ $gallery->filename }}"><img src="/{{ $gallery->filename }}" alt=""></a></li>
                                @endforeach
                                @foreach ($galleries->where('product_id', $product->id)->where('type', 'video')->take(1) as $video)
                                <li>
                                    <div class="video-link-product" data-toggle="modal" data-type="video" data-target="#modalVideoProduct" data-value="/{{ $video->filename }}" data-poster="video/video_img.jpg">
                                        <img src="/app/shop/2/images/product//product-small-empty.png" alt="">
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
                                <li><span>{{ __('app-shop-2-product.code') }}:</span> {{ $product->id }}</li>
                                <li style="display:none"><span>{{ __('app-shop-2-product.mojoodi') }}:</span> 40 {{ __('app-shop-2-product.adad') }}</li>
                            </ul>
                        </div>
                        <h3 class="tt-title m-4">{{ $product->title }}</h3>
                        @if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now())
                            <div class="tt-price m-4"><span class="new-price"><del>{{ number_format($product->price) }}</del> {{ __('app-shop-2-product.tooman') }}</span></div>
                            <div class="tt-price m-4"><span class="new-price">{{ number_format($product->off_price) }} {{ __('app-shop-2-product.tooman') }}</span></div>
                            @else
                            <div class="tt-price m-4"><span class="new-price">{{ number_format($product->price) }} {{ __('app-shop-2-product.tooman') }}</span></div>
                            @endif
                            <div class="tt-review m-4">
                                <div class="tt-rating">
                                    @for ($i = 1; $i
                                    <= (int)$product->avgRating; $i++)
                                        <i class="icon-star"></i>
                                        @endfor
                                </div>
                                <a class="product-page-gotocomments-js" href="#">{{ $product->comments->count() }}{{ __('app-shop-2-product.nazareMoshtari') }}</a>
                            </div>
                            @auth
                            <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                @csrf
                                <div class="tt-wrapper m-4">
                                    <div class="tt-row-custom-01">
                                        <div class="col-item">
                                            <div class="tt-input-counter style-01"><span class="minus-btn"></span>
                                                <input name="quantity" type="text" value="1" size="5"> <span class="plus-btn"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <button type="submit" class="btn iranyekan mt-1"><i class="icon-f-39"></i>
                                            @if($product->type == 'file'){{ __('app-shop-2-product.daryaafteFile') }}
                                                @else {{ __('app-shop-2-product.ezaafeBeSabadeKharid') }}
                                                @endif</button>
                                    </div>
                                </div>
                                <div class="mt-4 mb-3 d-flex">
                                    @foreach($product->specifications as $specification)
                                        <div class="">
                                            <label class="p-3">
                                                {{ $specification->name }} :
                                            </label>
                                            <select class="selectpicker" {{ $specification->type == 'checkbox' ? 'multiple' : '' }} name="specification[]" title="موردی انتخاب نشده است">
                                                @foreach($specification->items as $item)
                                                    <option {{ $loop->first ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }} <span>+ ( {{ $item->price }} تومان )</span></option>
                                                    @endforeach
                                            </select>
                                        </div>

                                        @endforeach
                                </div>
                            </form>
                            @endauth
                            @guest
                            <a href="{{ route('login') }}">
                                <button type="button" class="btn iranyekan mt-1"><i class="icon-f-39"></i>
                                    {{ __('app-shop-2-product.registerForAddToCart') }}
                                </button>
                            </a>
                            @endguest
                            <div class="tt-wrapper m-4">
                                <ul class="tt-list-btn">
                                    <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name]) }}" method="post" id="myForm{{ $product->id }}">
                                        @csrf
                                        <input type="hidden" name="productID" value="{{ $product->id }}">

                                        <li><a class="btn-link" href="javascript:{}" onclick="document.getElementById('myForm{{ $product->id }}').submit();"><i class="icon-n-072"></i>{{ __('app-shop-2-product.addToAlaaghemandiHa') }}</a></li>
                                    </form>
                                    <form action="{{ route('compare.store', ['shop'=>$shop->english_name]) }}" method="post" id="compareForm{{ $product->id }}">
                                        @csrf
                                        <li><a class="btn-link" href="javascript:{}" onclick="document.getElementById('compareForm{{ $product->id }}').submit();"><i class="icon-n-08"></i>{{ __('app-shop-2-product.addToAfzoodanBeMoghayese') }}</a>
                                        </li>
                                        <input type="hidden" name="productID" value="{{ $product->id }}">

                                    </form>
                                </ul>
                            </div>
                            <div class="tt-wrapper m-4">
                                <div class="tt-add-info">
                                    <ul class="tt-options-swatch options-middle flex-row mb-2">
                                        @php
                                        $i = 0;
                                        @endphp
                                        @foreach($product->colors as $color)
                                            <li class="color-select {{ $i == 0 ? 'active' : '' }}">
                                                <a class="options-color tt-border tt-color-bg-08" href="#" data-color="{{ $color->id }}" style="background-color:#{{ $color->code }}">
                                                </a>
                                            </li>
                                            @php
                                            $i ++;
                                            @endphp
                                            @endforeach
                                    </ul>
                                    <ul>
                                        @if ($product->type == "file")
                                        <h6 class="text-muted font-13">{{ __('app-shop-2-product.hajmeFile') }} :</h6>
                                        <ul class="list-unstyled pro-features border-0 iranyekan">
                                            <li>{{ round($product->file_size / 1048576,2)}} {{ __('app-shop-2-product.megaByte') }}</li>
                                        </ul>
                                        @endif
                                        @if ($product->type == "product")
                                        <h6 class="text-muted font-13">{{ __('app-shop-2-product.vazneMahsool') }} :</h6>
                                        <ul class="list-unstyled pro-features border-0 iranyekan">
                                            <li>{{ $product->weight }} {{ __('app-shop-2-product.geraam') }}</li>
                                        </ul>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="border-bottom m-4 mb-5 tt-collapse-block">
                                <div class="tt-item">
                                    <div class="tt-collapse-title">{{ __('app-shop-2-product.tozihaat') }}</div>
                                    <div style="text-align: justify" class="tt-collapse-content">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-collapse-title">برچسب ها</div>
                                    <div style="text-align: justify" class="tt-collapse-content">
                                        <div class="row">
                                            <ul class="tags iranyekan">
                                                @foreach ($product->tags as $tag)
                                                <li><a href="{{ route('tag', ['shop'=>$shop->english_name, 'name'=>$tag->name]) }}" class="tag iranyekan ">{{ $tag->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-collapse-title">{{ __('app-shop-2-product.vizhegiha') }}</div>
                                    <div style="text-align: justify" class="tt-collapse-content">
                                        <ul>
                                            @foreach ($product->facilities as $facility)
                                            <li>{{ $facility->name }}</li>
                                            @endforeach
                                        </ul>


                                    </div>


                                </div>
                                <div class="tt-item">
                                    <div class="tt-collapse-title">{{ __('app-shop-2-product.emtiazaat') }}</div>
                                    <div class="tt-collapse-content">
                                        <ul class="list-unstyled pro-features border-0 iranyekan">
                                            <div class="review-box text-center align-item-center border col-12 m-3" style="direction:ltr">
                                                @auth
                                                @if(collect($userProducts)->where('id' ,$product->id)->count() > 0)
                                                    <h5 style="color: #f1646c;" class="p-3">{{ __('app-shop-2-product.sabteEmtiazKonid') }}</h5>
                                                    <form class="" action="{{route('rate' , ['shop'=>$shop->english_name, 'id'=>$product->id])}}" method="post">
                                                        @csrf {{ method_field('PATCH') }}
                                                        @if($productRates->where('author_id' ,\auth::user()->id)->where('ratingable_id' , $product->id)->count() > 0)
                                                            @else
                                                            <select id="combostar">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                            @endif
                                                            <input id="starcount" type="hidden" name="rate" value="">
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            <input type="hidden" name="slug" value="{{ $product->slug }}">
                                                            <input type="hidden" name="shop" value="{{ $shop->english_name }}">
                                                            <br>
                                                            @if($productRates->where('author_id' ,\auth::user()->id)->where('ratingable_id' , $product->id)->count() > 0)
                                                                <button type="submit" class="btn bg-orange-omid mt-3 text-white rounded" disabled>{{ __('app-shop-2-product.shomaGhablanEmtiazSabtKardeid') }} </button>
                                                                @else
                                                                <button type="submit" class="btn bg-orange-omid mt-3 text-white rounded">{{ __('app-shop-2-product.sabteEmtiaz') }}</button>
                                                                @endif
                                                    </form>
                                                    @endif
                                                    @endauth
                                                    <br>
                                                    @if($shop->buyCount_show == 'enable')
                                                        <h4 class="header-title pt-4">{{ __('app-shop-2-product.majmooeForoosh') }}</h4>
                                                        <div class="review-box text-center align-item-center p-3">
                                                            <h1 class="byekan">{{ $product->buyCount }}</h1>
                                                            @endif
                                                            <ul class="p-2" style="list-style: none;font-size: 25px;">
                                                                <li class="list-inline-item pb-3"><small class="text-muted font-14">{{ __('app-shop-2-product.majoomeAraa') }} ({{ $productRates->count() }})</small></li>
                                                                <li class="list-inline-item"><small class="text-muted font-14">{{ __('app-shop-2-product.motevaseteAra') }} ({{ (int)$product->avgRating }})</small></li>
                                                            </ul>
                                                            <ul class="d-flex justify-content-center p-3">
                                                                @for ($i = 1; $i <= (int)$product->avgRating; $i++)
                                                                    <div class="tt-rating" style="font-size: 30px;!important">
                                                                        <i class="icon-star"></i>
                                                                    </div>
                                                                    @endfor
                                                            </ul>
                                                        </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-collapse-title tt-poin-comments">{{ __('app-shop-2-product.nazaraat') }} ({{ $product->comments->where('approved', '1')->count() }})</div>
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
                                                        <div class="tt-comments-info"><span class="username">{{ __('app-shop-2-product.by') }}: <span>{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</span></span> <span class="time"> -
                                                                {{ jdate($comment->created_at)->ago() }}</span>
                                                        </div>
                                                        <p style="padding: 10px 10px 10px 10px;  margin: 10px 10px 10px 10px;  background-color: #f7f8fa;  border-radius: 5px;">{{ $comment->comment }}</p>
                                                    </div>
                                                </div>
                                                @foreach ($comments->where('approved', '1')->where('parent_id', $comment->id) as $comment)
                                                <div class="tt-item">
                                                    <div class="tt-avatar">
                                                        <i style="margin: 40px;" class="fa fa-reply"></i>
                                                    </div>
                                                    <div class="tt-content">
                                                        <div class="tt-comments-info"><span class="username">{{ __('app-shop-2-product.by') }}: <span>{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</span></span> <span class="time"> -
                                                                {{ jdate($comment->created_at)->ago() }}</span>
                                                        </div>
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
                                                        <p><strong>{{ __('app-shop-2-product.error') }}:</strong></p>
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
                                                            <label class="" for="">{{ __('app-shop-2-product.sabteNazareShoma') }}:</label>
                                                            <textarea style="font-family: iranyekan" placeholder="{{ __('app-shop-2-product.matneNazar') }}" class="form-control" name="comment" id="" cols="30" rows="5"></textarea>
                                                            <input type="hidden" name="parent_id" value="0">
                                                            <input type="hidden" name="commentable_id" value="{{ $product->id }}">
                                                            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                                            <input type="hidden" name="commentable_type" value="{{ get_class($product) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <center><button style="color: white" class="btn bg-blue-omid mt-4">{{ __('app-shop-2-product.ersaaleNazar') }}</button></center>
                                                        </div>
                                                    </form>
                                                    @endauth
                                                    @guest()
                                                    <a href="{{ route('login')  }}">
                                                        <div class="alert alert-danger">{{ __('app-shop-2-product.loginToComment') }}.
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
            <div class="row">
                @if ($product->fast_sending == 'on')
                <div class="col-lg-3">
                    <div class="pro-order-box border bg-orange-rock p-4 rounded" style="max-height: 20vh;min-height: 200px;"><i class="mdi mdi-truck-fast text-white"></i>
                        <h4 class="header-title text-white font-weight-bold">{{ __('app-shop-1-product.ersaaleSari') }}</h4>
                        <p class="text-white mb-0">{{ __('app-shop-1-product.ersaaleSariDesc') }}.</p>
                    </div>
                </div>
                @endif
                <!--end col-->
                @if ($product->money_back == 'on')
                <div class="col-lg-3">
                    <div class="bg-red-rock border p-4 rounded pro-order-box " style="max-height: 20vh;min-height: 200px;"><i class="mdi mdi-refresh text-white"></i>
                        <h4 class="header-title text-white font-weight-bold">{{ __('app-shop-1-product.baazgasteVajh') }}</h4>
                        <p class="text-white mb-0">{{ __('app-shop-1-product.baazgasteVajhDesc') }}.</p>
                    </div>
                </div>
                @endif

                <!--end col-->
                @if ($product->support == 'on')
                <div class="col-lg-3">
                    <div class="pro-order-box border bg-green-rock p-4 rounded" style="max-height: 20vh;min-height: 200px;"><i class="mdi mdi-headset text-white"></i>
                        <h4 class="header-title text-white font-weight-bold">{{ __('app-shop-1-product.poshtibaani') }}</h4>
                        <p class="mb-0 text-white">{{ __('app-shop-1-product.poshtibaaniDesc') }}.</p>
                    </div>
                </div>
                @endif

                <!--end col-->
                @if ($product->secure_payment == 'on')
                <div class="col-lg-3">
                    <div class="pro-order-box mb-0 border bg-blue-rock p-4 rounded" style="max-height: 20vh;min-height: 200px;"><i class="mdi mdi-wallet text-white"></i>
                        <h4 class="header-title text-white font-weight-bold">{{ __('app-shop-1-product.pardaakhteAmn') }}</h4>
                        <p class="text-white mb-0">{{ __('app-shop-1-product.pardaakhteAmnDesc') }}.</p>
                    </div>
                </div>
                @endif
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

                <h3 class="tt-title-small pt-5">{{ __('app-shop-2-product.moshabeh') }}</h3>
            </div>
            <div class="row">
                @foreach($offeredProducts as $product)
                  <div class="col-sm-6 col-md-6 col-lg-3 py-3">
                    <div class="card p-5">
                      <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}" @if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now()) class="crd-img-off" @else class="crd-img" @endif >
                      <img class="card-img-top" src="{{ asset($product->image['250,250'] ? $product->image['250,250'] : '/images/no-image.png') }}" alt="Card image cap" style="width:350px">
                      </a>
                      <div class="card-body p-5">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        @if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now())
                          <p class="card-text"><del>{{ number_format($product->price) }}</del> تومان</p>
                        <p class="card-text">{{ number_format($product->off_price) }}  تومان</p>
                            @else
                              <p class="card-text py-2">{{ $product->price }} تومان</p>
                            @endif
                        <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}" class="btn btn-primary">مشاهده محصول</a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>


@endsection
@section('footerScripts')
<script src="/app/shop/1/assets/js/jquery.combostars.js"></script>
<script>
    $(function() {
        $('#combostar').on('change', function() {
            $('#starcount').val($(this).val());
        });
        $('#combostar').combostars();
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="/app/shop/1/assets/js/simple-lightbox.min.js"></script>
<script>
    $(function() {
        var $gallery = $('.gallery a').simpleLightbox();
    });
</script>
<script type="text/javascript">
    $(window).load(function() {
        setTimeout(function() {
            $('.image-box-card').addClass('h-50-vh');
        }, 100)
    })
</script>

<script>
    if ($("#color-selection").length == 0) {
        if ($("li.color-select").hasClass("active")) {
            var colorId = $("li.color-select > a").data('color');
            $("div.tt-input-counter").append('<input type="hidden" id="color-selection" name="color" value="' + colorId + '">');
        }
    }
    //when the Add Field button is clicked
    $('.options-color').on('click', function() {
        var colorId = $(this).data('color');
        if ($("#color-selection").length > 0) {
            $("#color-selection").remove();
        }
        $("div.tt-input-counter").append('<input type="hidden" id="color-selection" name="color" value="' + colorId + '">');
    });
</script>
<script>
    $(window).on("load", function() {
        $(".filter-option").css('text-align', 'center');
    });
</script>
<script async src="/app/shop/2/js/bootstrap.bundle.min.js"></script>
<script>
    setInterval(function() {
        $('.col-6').css('width', '22%');
        $('.draggable').css('width', '100%');
    }, 1000);
</script>
@endsection
