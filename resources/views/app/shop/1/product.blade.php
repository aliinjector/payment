@extends('app.shop.1.layouts.master')
@section('content')

<link href='/app/shop/1/assets/css//simplelightbox.min.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('/app/shop/1/assets/css/category.css') }}" />

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">

            </div>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6"><img src="{{ $product->image['400,400'] }}" alt="" class="col-8 d-block img-thumbnail" style="max-height: 40em;">
                        <div class="gallery mt-4 mr-4">
                            @foreach ($galleries as $gallery)
                            <a href="/{{ $gallery->filename }}"><img width="100px" class="img-thumbnail" src="/{{ $gallery->filename }}" alt="" title="" /></a>
                            @endforeach
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6 align-self-center">
                        <div class="single-pro-detail">
                            <h3 class="pro-title iranyekan pb-5">{{ $product->title }}
                                <div class="custom-border mt-3"></div>
                            </h3>
                            @if ($product->amount != 0 || $product->type == 'service' || $product->type == 'file')
                            <span class="bg-soft-success rounded-pill px-3 py-1 font-weight-bold">{{ __('app-shop-1-product.mojoodi') }}</span>
                            @else
                            <span class="bg-soft-pink rounded-pill px-3 py-1 font-weight-bold">{{ __('app-shop-1-product.naaMojood') }}</span>
                            @endif
                            @if($product->off_price != null)
                                <h2 class="pro-price">{{ number_format($product->off_price) }} {{ __('app-shop-1-product.tooman') }}</h2>
                                <span><del>{{ number_format($product->price) }} {{ __('app-shop-1-product.tooman') }}</del></span>
                                @else
                                <h2 class="pro-price">{{ number_format($product->price) }}{{ __('app-shop-1-product.tooman') }} </h2>
                                @endif
                                <h6 class="text-muted font-13">{{ __('app-shop-1-product.vizhegiha') }} :</h6>
                                <ul class="list-unstyled pro-features border-0 iranyekan">
                                       <div class="wrapper">
                                         @foreach ($product->facilities as $facility)

                                        <li class="ty-compact-list">{{ $facility->name }} </li>
                                      @endforeach

                                        <div class="show-more mr-1 mt-4" style="line-height: 2;"><i class="fas fa-plus"></i>
                                            <span class="toggle-show"> {{ __('app-shop-1-product.more') }}</span>
                                        </div>
                        </div>
                        </ul>
                        @if ($product->type == "file")
                        <h6 class="text-muted font-13">{{ __('app-shop-1-product.hajmeFile') }} :</h6>
                        <ul class="list-unstyled pro-features border-0 iranyekan">
                            <li>{{ round($product->file_size / 1048576,2)}} {{ __('app-shop-1-product.megaByte') }}</li>
                        </ul>
                        @endif
                        @if ($product->type == "product")
                        <h6 class="text-muted font-13">{{ __('app-shop-1-product.vazneMahsool') }} :</h6>
                        <ul class="list-unstyled pro-features border-0 iranyekan">
                            <li>{{ $product->weight }} گرم</li>
                        </ul>
                        @endif
                        <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="compareForm{{ $product->id }}">
                            @csrf
                            <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $product->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                        </form>
                        <div class="quantity mt-3">
                            @auth
                            @if($product->type == 'file')
                                <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" class="btn btn-primary iranyekan rounded"><i class="mdi mdi-cart mr-1"></i> {{ __('app-shop-1-product.daryaafteFile') }} </button>
                                </form>
                                @else
                                <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" class="text-white btn bg-blue-omid iranyekan rounded"><i class="mdi mdi-cart mr-1"></i> {{ __('app-shop-1-product.ezaafeBeSabadeKharid') }} </button>
                                    @endif

                                </form>
                                @endauth
                                @guest
                                <a href="{{ route('register') }}">
                                    <button type="button" class="btn btn-primary iranyekan rounded"><i class="mdi mdi-cart mr-1"></i> {{ __('app-shop-1-product.registerForAddToCart') }} </button>
                                </a>
                                @endguest

                        </div>
                    </div>
                </div>



                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
<!--end col-->
</div>
<!-- end row -->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @if ($product->fast_sending == 1)
                    <div class="col-lg-3">
                        <div class="pro-order-box min-height-160 border bg-orange-rock"><i class="mdi mdi-truck-fast text-white"></i>
                            <h4 class="header-title text-white font-weight-bold">{{ __('app-shop-1-product.ersaaleSari') }}</h4>
                            <p class="text-white mb-0">{{ __('app-shop-1-product.ersaaleSariDesc') }}.</p>
                        </div>
                    </div>
                    @endif
                    <!--end col-->
                    @if ($product->money_back == 1)
                    <div class="col-lg-3">
                        <div class="pro-order-box min-height-160 border bg-red-rock"><i class="mdi mdi-refresh text-white"></i>
                            <h4 class="header-title text-white font-weight-bold">{{ __('app-shop-1-product.baazgasteVajh') }}</h4>
                            <p class="text-white mb-0">{{ __('app-shop-1-product.baazgasteVajhDesc') }}.</p>
                        </div>
                    </div>
                    @endif

                    <!--end col-->
                    @if ($product->support == 1)
                    <div class="col-lg-3">
                        <div class="pro-order-box min-height-160 border bg-green-rock"><i class="mdi mdi-headset text-white"></i>
                            <h4 class="header-title text-white font-weight-bold">{{ __('app-shop-1-product.poshtibaani') }}</h4>
                            <p class="mb-0 text-white">{{ __('app-shop-1-product.poshtibaaniDesc') }}.</p>
                        </div>
                    </div>
                    @endif

                    <!--end col-->
                    @if ($product->secure_payment == 1)
                    <div class="col-lg-3">
                        <div class="pro-order-box mb-0 min-height-160 border bg-blue-rock"><i class="mdi mdi-wallet text-white"></i>
                            <h4 class="header-title text-white font-weight-bold">{{ __('app-shop-1-product.pardaakhteAmn') }}</h4>
                            <p class="text-white mb-0">{{ __('app-shop-1-product.pardaakhteAmnDesc') }}.</p>
                        </div>
                    </div>
                    @endif
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<div class="row">
    <div class="col-md-9">
        <div class="card bg-newsletters">
            <div class="card-body bg-green-rock rounded">
                <div class="row">
                    <div class="col-md-6">
                        <div class="newsletters-text">
                            <h4>{{ __('app-shop-1-product.khabarNaame') }}</h4>
                            <p class="text-white mb-0">{{ __('app-shop-1-product.khabarNaameDesc') }}.</p>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6 align-self-center">
                        <div class="newsletters-input">
                          <form class="form-inline form-default" method="post" novalidate="novalidate" action="{{ route('subscribe', $shop->id) }}">
                            @csrf
                                <input type="email" name="email" placeholder="{{ __('app-shop-1-product.khabarNaamePlaceholder') }}" required="" style="direction: ltr">
                                <button type="submit" class="btn btn-blue rounded">{{ __('app-shop-1-product.khabarNaameBtn') }}</button>
                            </form>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 align-self-center"><img src="{{ $product->image['250,250'] }}" alt="" height="250" class="d-block mx-auto col-12"></div>
                    <div class="col-lg-9">
                        <h5 class="mt-3">{{ __('app-shop-1-product.tozihaat') }} :</h5>
                        <p class="text-muted mb-4"> {!! $product->description  !!}</p>
                        <ul class="list-unstyled mb-4">
                            @for ($i=1; $i
                            <= 10; $i++) @if ($product->{"feature_{$i}"})
                            <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>{{ $product->{"feature_{$i}"} }}.</li>
                            @endif
                            @endfor
                        </ul>

                        <!--end row-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="review-box text-center align-item-center" style="direction:ltr">
                    @auth
                    @if(collect($userProducts)->where('id' ,$product->id)->count() > 0)
                        <h5 style="color: #f1646c;" class="p-3">{{ $productRates->where('author_id' ,\auth::user()->id)->where('ratingable_id' , $product->id)->count() > 0 ? "شما مجاز به ثبت امتیاز نمیباشید"  : "امتیاز خود را به این کالا ثبت کنید " }}</h5>
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
                                <input type="hidden" name="shop" value="{{ $shop->english_name }}">
                                <br>
                                @if($productRates->where('author_id' ,\auth::user()->id)->where('ratingable_id' , $product->id)->count() > 0)
                                    <button type="submit" class="btn bg-orange-omid mt-3 text-white rounded comming-soon">{{ __('app-shop-1-product.shomaGhablanEmtiazSabtKardeid') }} </button>
                                    @else
                                    <button type="submit" class="btn bg-orange-omid mt-3 text-white rounded">{{ __('app-shop-1-product.sabteEmtiaz') }}</button>
                                    @endif
                        </form>
                        @endif
                        @endauth
                        <br>
                        @if($shop->buyCount_show == 'enable')
                        <h4 class="header-title pt-4">{{ __('app-shop-1-product.majmooeForoosh') }}</h4>
                        <div class="review-box text-center align-item-center p-3">
                           <h1 class="byekan">{{ $product->buyCount }}</h1>
                           @endif
                            <ul class="list-inline mb-0 product-review">
                                <li class="list-inline-item"><small class="text-muted font-14">{{ __('app-shop-1-product.majoomeAraa') }} ({{ $productRates->count() }})</small></li>
                                <li class="list-inline-item"><small class="text-muted font-14">{{ __('app-shop-1-product.motevaseteAra') }} ({{ (int)$product->avgRating }})</small></li>
                            </ul>
                            <ul class="list-inline mb-0 product-review">

                                @for ($i = 1; $i
                                <= (int)$product->avgRating; $i++)
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    @endfor
                            </ul>
                        </div>
                </div>
                @if ($productRates->count() > 0)
                <ul class="list-unstyled mt-3 font-15 p-1">
                    <li class="mb-2"><span class="text-info">5 {{ __('app-shop-1-product.setaareh') }} </span> <small class="float-right text-muted ml-3 font-14">{{ $productRates->where('rating' , 5)->count() }}</small>
                        <div class="progress mt-2" style="height:5px;">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width:{{$productRates->where('rating' , 5)->count() * 100 / $productRates->count() }}%; border-radius:5px;" aria-valuenow="80" aria-valuemin="0"
                              aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="mb-2"><span class="text-info">4 {{ __('app-shop-1-product.setaareh') }}</span> <small class="float-right text-muted ml-3 font-14">{{ $productRates->where('rating' , 4)->count() }}</small>
                        <div class="progress mt-2" style="height:5px;">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: {{$productRates->where('rating' , 4)->count() * 100 / $productRates->count() }}%; border-radius:5px;" aria-valuenow="18" aria-valuemin="0"
                              aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="mb-2"><span class="text-info">3 {{ __('app-shop-1-product.setaareh') }}</span> <small class="float-right text-muted ml-3 font-14">{{ $productRates->where('rating' , 3)->count() }}</small>
                        <div class="progress mt-2" style="height:5px;">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: {{$productRates->where('rating' , 3)->count() * 100 / $productRates->count() }}%; border-radius:5px;" aria-valuenow="10" aria-valuemin="0"
                              aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="mb-2"><span class="text-info">2 {{ __('app-shop-1-product.setaareh') }}</span> <small class="float-right text-muted ml-3 font-14">{{ $productRates->where('rating' , 2)->count() }}</small>
                        <div class="progress mt-2" style="height:5px;">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: {{$productRates->where('rating' , 2)->count() * 100 / $productRates->count() }}%; border-radius:5px;" aria-valuenow="1" aria-valuemin="0"
                              aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li><span class="text-info">1 {{ __('app-shop-1-product.setaareh') }}</span> <small class="float-right text-muted ml-3 font-14">{{ $productRates->where('rating' , 1)->count() }}</small>
                        <div class="progress mt-2" style="height:5px;">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: {{$productRates->where('rating' , 1)->count() * 100 / $productRates->count() }}%; border-radius:5px;" aria-valuenow="0" aria-valuemin="0"
                              aria-valuemax="100"></div>
                        </div>
                    </li>
                </ul>
                @endif

                <h4 class="mt-3 mb-3">{{ __('app-shop-1-product.tags') }} :</h4>
                <ul class="tags iranyekan">
                    @foreach ($product->tags()->get() as $tag)
                    <li><a href="{{ route('tag', ['shop'=>$shop->english_name, 'name'=>$tag->name]) }}" class="tag iranyekan ">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>


            </div>
            <!--end card-body-->
        </div>


        <!--end card-->
    </div>


    <!--end col-->
</div>


@include('app.shop.1.layouts.partials.offers')
@include('app.shop.1.layouts.partials.comments')


<!-- container -->
</div>
</div>

@endsection
@section('pageScripts')
  <script src="{{ asset('/app/shop/1/assets/js/product.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  
  <script type="text/javascript" src="/app/shop/1/assets/js/simple-lightbox.min.js"></script>
@include('sweet::alert')
@stop
