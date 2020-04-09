@extends('app.shop.1.layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="page-title-box">
            <h4 class="page-title iranyekan">فروشگاه {{ $shop->name }}</h4>
            <p class="text-muted mb-3 mt-1">{{ $shop->description }}</p>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->

    <div class="col-sm-3 mt-3">
        <form class="card card-sm" action="{{ route('search', $shop->english_name) }}" method="post">
            @csrf
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                    <i style="color: #F68712!important;" class="fas fa-search h4 text-body"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" name="queryy" type="search" placeholder="نام محصول ویا سازنده...">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn bg-blue-omid text-white rounded" type="submit">جستجو</button>
                </div>
                <!--end of col-->
            </div>
        </form>
        <!--end page-title-box-->
    </div>


</div>

<div style="width: 90%; margin: auto" id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach($slideshows as $slideshow)
        <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
            <div class="view">
                <a href="{{ $slideshow->url }}">
                    <img class="d-block w-100" src="{{ $slideshow->image['original'] }}" alt="{{ $slideshow->title }}" style=" max-height: 70vh;">
                    <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">{!! $slideshow->title !!}</h3>
                <p>{!! $slideshow->description !!}</p>
            </div>
        </div>
        </a>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">قبلی</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">بعدی</span>
    </a>
</div>
<h2 class="line-throw my-5"><span>آخرین محصولات </span></h2>
<div class="row p-5">

    @forelse ($lastProducts as $lastProduct)
    <div class="col-lg-3">
        <div class="card e-co-product">
            <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$lastProduct->slug, 'id' => $lastProduct->id]) }}"><img src="{{ asset($lastProduct->image['250,250'] ? $lastProduct->image['250,250'] : '/images/no-image.png') }}" alt="" class="img-fluid"></a>
            <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$lastProduct->slug, 'id' => $lastProduct->id]) }}" class="product-title">{{ $lastProduct->title }}</a>
                <div class="d-flex justify-content-between my-2 byekan">
                    @if($lastProduct->off_price != null and $lastProduct->off_price_started_at < now() and $lastProduct->off_price_expired_at > now())
                            <p class="product-price byekan">{{ number_format($lastProduct->off_price) }} تومان <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($lastProduct->price) }}
                                        تومان}}</del></span>
                            </p>
                            @else
                            <p class="product-price byekan">{{ number_format($lastProduct->price) }} تومان <span class="ml-2 byekan"></span>
                                @endif
                </div>
                <form action="{{ route('compare.store', ['shop'=>$shop->english_name]) }}" method="post" id="compareForm{{ $lastProduct->id }}">
                    @csrf
                    <input type="hidden" name="productID" value="{{ $lastProduct->id }}">

                    <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $lastProduct->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i
                          style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                </form>
                <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name]) }}" method="post" id="wishlistForm{{ $lastProduct->id }}">
                    @csrf
                    <input type="hidden" name="productID" value="{{ $lastProduct->id }}">

                    <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $lastProduct->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i
                          style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" class="fas fa-heart m-2"></i></a>
                </form>
                @if(\Auth::user())
                {{-- <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$lastProducts[0]->id}}">
                <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                    @if($lastProducts[0]->type == 'file'){{ __('app-shop-1-index.daryafteFile') }}
                        @else {{ __('app-shop-1-index.addToCart') }}
                        @endif</button>
                        </form> --}}
                        <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                            <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$lastProduct->slug, 'id' => $lastProduct->id]) }}" class="text-white">
                                مشاهده محصول
                            </a>
                        </button>
                        @endif
            </div>
        </div>
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


@includeWhen($shop->special_offer == 'enable','app.shop.1.layouts.partials.special_offer', ['special_text' => $shop->special_offer_text])


<h2 class="my-5 line-throw"><span>پرفروش ترین محصولات</span></h2>
<div class="row p-5">

      @forelse ($bestSellings as $bestSelling)
        <div class="col-lg-3">
        <div class="card e-co-product">
            <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$bestSelling->slug, 'id' => $bestSelling->id]) }}"><img src="{{ asset($bestSelling->image['250,250'] ? $bestSelling->image['250,250'] : '/images/no-image.png') }}" alt="" class="img-fluid"></a>
            <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$bestSelling->slug, 'id' => $bestSelling->id]) }}" class="product-title"></a> {{ $bestSelling->title }} </a>
                <div class="d-flex justify-content-between my-2">
                    @if($bestSelling->off_price != null and $bestSelling->off_price_started_at < now() and $bestSelling->off_price_expired_at > now())
                        <p class="product-price byekan">{{ number_format($bestSelling->off_price) }} تومان <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($bestSelling->price) }}
                                    {{ __('app-shop-1-index.tooman') }}</del></span>
                        </p>
                        @else
                        <p class="product-price byekan">{{ number_format($bestSelling->price) }} تومان <span class="ml-2 byekan"></span>
                            @endif
                </div>
                <form action="{{ route('compare.store', ['shop'=>$shop->english_name]) }}" method="post" id="compareForm{{ $bestSelling->id }}">
                    @csrf
                    <input type="hidden" name="productID" value="{{ $bestSelling->id }}">

                    <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $bestSelling->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i
                          style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                </form>
                <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name]) }}" method="post" id="wishlistForm{{ $bestSelling->id }}">
                    @csrf
                    <input type="hidden" name="productID" value="{{ $bestSelling->id }}">

                    <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $bestSelling->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}"
                      data-tposition="left"><i style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" class="fas fa-heart m-2"></i></a>
                </form>

                @if(\Auth::user())

                {{-- <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$bestSelling[0]->id}}">
                <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                    @if($bestSelling[0]->type == 'file') {{ __('app-shop-1-index.daryafteFile') }}
                        @else {{ __('app-shop-1-index.addToCart') }}
                        @endif</button>
                        </form> --}}

                        <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                            <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$bestSelling->slug, 'id' => $bestSelling->id]) }}" class="text-white">
                                مشاهده محصول
                            </a>
                        </button>
                        @endif
            </div>
        </div>
    </div>
      @empty
        <div class="align-items-center justify-content-center row w-100 text-danger">
            <h4>
                {{ __('app-shop-1-index.noProduct') }}
            </h4>
        </div>
      @endforelse
    <!--end col-->
</div>
@if($feedbacks->count() >= 1)
    <h2 class="my-5 line-throw"><span>بازخورد مشتریان </span></h2>
    <div class="row mt-5 mb-4">
        <div class="col-12">
            <div id="carouselContent" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach($feedbacks as $feedback)

                    <div class="carousel-item {{$loop->first ? 'active' : ''}} text-center p-4 ml-lg-n2">
                        <h3>{{ $feedback->title }}</h3>
                        <h5>{{ $feedback->feedback }}</h5>
                    </div>
                    @endforeach

                </div>
                <a class="carousel-control-prev bg-orange-omid rounded" href="#carouselContent" role="button" data-slide="prev" style="width: 3%;opacity: 1;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">قبلی</span>
                </a>
                <a class="carousel-control-next bg-orange-omid rounded" href="#carouselContent" role="button" data-slide="next" style="width: 3%;opacity: 1;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">بعدی</span>
                </a>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    @endif


    @if($brands->count() >= 1)
        <h2 class="my-5 line-throw"><span>برند ها</span></h2>


        <div class="row mt-5 mb-4">
            <div class="col-12">
                <div id="carouselContentBrand" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach($brands as $brand)
                            <div class="carousel-item {{$loop->first ? 'active' : ''}} text-center p-4 ml-lg-n2">
                                <a href="/{{ $shop->english_name }}/brand/{{ $brand->id }}">
                                    <img style="width: 250px" src="{{ $brand->icon['original'] }}" alt="">
                                    <h5>{{ $brand->name }}</h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev bg-orange-omid rounded" href="#carouselContentBrand" role="button" data-slide="prev" style="width: 3%;opacity: 1;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">قبلی</span>
                    </a>
                    <a class="carousel-control-next bg-orange-omid rounded" href="#carouselContentBrand" role="button" data-slide="next" style="width: 3%;opacity: 1;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">بعدی</span>
                    </a>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        @endif





        <!-- container -->

        @endsection
        @section('pageScripts')


        @stop
