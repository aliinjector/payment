@extends('app.shop.1.layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="page-title-box">
            <h4 class="page-title iranyekan">{{ __('app-shop-1-index.frooshgah') }} {{ $shop->name }}</h4>
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
                    <input class="form-control form-control-lg form-control-borderless" name="queryy" type="search" placeholder="{{ __('app-shop-1-index.searchPlaceholder') }}...">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn bg-blue-omid text-white rounded" type="submit">{{ __('app-shop-1-index.jostojoo') }}</button>
                </div>
                <!--end of col-->
            </div>
        </form>
        <!--end page-title-box-->
    </div>


</div>
@if($lastProducts->count() == 0)
    <div class="d-flex justify-content-center align-items-center" style="height:80vh">
        <h4>
          {{ __('app-shop-1-index.noProduct') }}
        </h4>
    </div>
    @else
    <!-- end page title end breadcrumb -->


    <!--Carousel Wrapper-->
    <div style="width: 90%; margin: auto" id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-2" data-slide-to="1"></li>
            <li data-target="#carousel-example-2" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">


            @foreach($slideshows as $slideshow)
            <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                <div class="view">
                    <a href="{{ $slideshow->url }}">
                        <img class="d-block w-100" src="{{ $slideshow->image['original'] }}" alt="{{ $slideshow->title }}" style=" max-height: 70vh;">
                        <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">{{ $slideshow->title }}</h3>
                    <p>{{ $slideshow->description }}</p>
                </div>
            </div>
            </a>
            @endforeach





        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->








    <h2 class="line-throw mt-5"><span>{{ __('app-shop-1-index.akharinMahsoolat') }} </span></h2>


    <div class="row p-5">
        @if($lastProducts[0])
        <div class="col-lg-3">
            <div class="card e-co-product">
                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[0]->id]) }}"><img src="{{ $lastProducts[0]->image['250,250'] }}" alt="" class="img-fluid"></a>
                <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[0]->id]) }}" class="product-title">{{ $lastProducts[0]->title }}</a>
                    <div class="d-flex justify-content-between my-2 byekan">
                        @if($lastProducts[0]->off_price != null)
                            <p class="product-price byekan">{{ number_format($lastProducts[0]->off_price) }} {{ __('app-shop-1-index.tooman') }} <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($lastProducts[0]->price) }} {{ __('app-shop-1-index.tooman') }}</del></span>
                            </p>
                            @else
                            <p class="product-price byekan">{{ number_format($lastProducts[0]->price) }} {{ __('app-shop-1-index.tooman') }} <span class="ml-2 byekan"></span>
                                @endif
                    </div>
                    <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$lastProducts[0]->id]) }}" method="post" id="compareForm{{ $lastProducts[0]->id }}">
                        @csrf
                        <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $lastProducts[0]->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                    </form>
                    <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$lastProducts[0]->id]) }}" method="post" id="wishlistForm{{ $lastProducts[0]->id }}">
                        @csrf

                      <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $lastProducts[0]->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" class="fas fa-heart m-2"></i></a>
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
                      <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[0]->id]) }}" class="text-white">
                          مشاهده محصول
                        </a>
                         </button>

                    @endif

                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        @endif
        <!--end col-->

        @if(isset($lastProducts[1]))
        <div class="col-lg-3">
            <div class="card e-co-product">
                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[1]->id]) }}"><img src="{{ $lastProducts[1]->image['250,250']}}" alt="" class="img-fluid"></a>
                <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[1]->id]) }}" class="product-title">{{ $lastProducts[1]->title }}</a>
                    <div class="d-flex justify-content-between my-2">
                        @if($lastProducts[1]->off_price != null)
                            <p class="product-price byekan">{{ number_format($lastProducts[1]->off_price) }} {{ __('app-shop-1-index.tooman') }} <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($lastProducts[1]->price) }} {{ __('app-shop-1-index.tooman') }}</del></span>
                            </p>
                            @else
                            <p class="product-price byekan">{{ number_format($lastProducts[1]->price) }} {{ __('app-shop-1-index.tooman') }} <span class="ml-2 byekan"></span>
                                @endif

                    </div>
                    <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$lastProducts[1]->id]) }}" method="post" id="compareForm{{ $lastProducts[1]->id }}">
                        @csrf
                        <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $lastProducts[1]->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                    </form>
                    <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$lastProducts[1]->id]) }}" method="post" id="wishlistForm{{ $lastProducts[1]->id }}">
                        @csrf

                      <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $lastProducts[1]->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" class="fas fa-heart m-2"></i></a>
                    </form>
                                        @if(\Auth::user())

                    {{-- <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$lastProducts[1]->id}}">
                        <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                            @if($lastProducts[1]->type == 'file') {{ __('app-shop-1-index.daryafteFile') }}
                                @else {{ __('app-shop-1-index.addToCart') }}
                                @endif</button>

                    </form> --}}
                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                      <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[1]->id]) }}" class="text-white">
                          مشاهده محصول
                        </a>
                         </button>

                    @endif

                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        @endif



        @if(isset($lastProducts[2]))
        <div class="col-lg-3">
            <div class="card e-co-product">
                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[2]->id]) }}"><img src="{{ $lastProducts[2]->image['250,250'] }}" alt="" class="img-fluid"></a>
                <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[2]->id]) }}" class="product-title">{{ $lastProducts[2]->title }}</a>
                    <div class="d-flex justify-content-between my-2">
                        @if($lastProducts[2]->off_price != null)
                            <p class="product-price byekan">{{ number_format($lastProducts[2]->off_price) }} {{ __('app-shop-1-index.tooman') }} <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($lastProducts[2]->price) }} {{ __('app-shop-1-index.tooman') }}</del></span>
                            </p>
                            @else
                            <p class="product-price byekan">{{ number_format($lastProducts[2]->price) }} {{ __('app-shop-1-index.tooman') }} <span class="ml-2 byekan"></span>
                                @endif

                    </div>
                    <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$lastProducts[2]->id]) }}" method="post" id="compareForm{{ $lastProducts[2]->id }}">
                        @csrf
                        <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $lastProducts[2]->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                    </form>
                    <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$lastProducts[2]->id]) }}" method="post" id="wishlistForm{{ $lastProducts[2]->id }}">
                        @csrf

                      <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $lastProducts[2]->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" class="fas fa-heart m-2"></i></a>
                    </form>
                                      @if(\Auth::user())
                    {{-- <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$lastProducts[2]->id}}">
                        <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                            @if($lastProducts[2]->type == 'file'){{ __('app-shop-1-index.daryafteFile') }}
                                @else {{ __('app-shop-1-index.addToCart') }}
                                @endif</button>
                    </form> --}}

                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                      <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[2]->id]) }}" class="text-white">
                          مشاهده محصول
                        </a>
                         </button>


                    @endif

                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        @endif
        <!--end col-->
        @if(isset($lastProducts[3]))
        <div class="col-lg-3">
            <div class="card e-co-product">
                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[3]->id]) }}"><img src="{{ $lastProducts[3]->image['250,250'] }}" alt="" class="img-fluid"></a>
                {{-- <div class="ribbon ribbon-pink"><span class="byekan">50% تخفیف</span></div> --}}
                <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[3]->id]) }}" class="product-title"></a>{{ $lastProducts[3]->title }}</a>
                    <div class="d-flex justify-content-between my-2">
                        @if($lastProducts[3]->off_price != null)
                            <p class="product-price byekan">{{ number_format($lastProducts[3]->off_price) }} {{ __('app-shop-1-index.tooman') }} <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($lastProducts[3]->price) }} {{ __('app-shop-1-index.tooman') }}</del></span>
                            </p>
                            @else
                            <p class="product-price byekan">{{ number_format($lastProducts[3]->price) }} {{ __('app-shop-1-index.tooman') }} <span class="ml-2 byekan"></span>
                                @endif

                    </div>
                    <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$lastProducts[3]->id]) }}" method="post" id="compareForm{{ $lastProducts[3]->id }}">
                        @csrf
                        <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $lastProducts[3]->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                    </form>

                    <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$lastProducts[3]->id]) }}" method="post" id="wishlistForm{{ $lastProducts[3]->id }}">
                        @csrf

                      <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $lastProducts[3]->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" class="fas fa-heart m-2"></i></a>
                    </form>

                           @if(\Auth::user())

                    {{-- <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$lastProducts[3]->id}}">
                        <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                            @if($lastProducts[3]->type == 'file') {{ __('app-shop-1-index.daryafteFile') }}
                                @else {{ __('app-shop-1-index.addToCart') }}
                                @endif</button>
                    </form> --}}

                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                      <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[3]->id]) }}" class="text-white">
                          مشاهده محصول
                        </a>
                         </button>
                    @endif
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        @endif

        <!--end col-->
    </div>
    </div>





    <div class="row">
        <div class="col-12">
            <div class="card offer-box">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <div class="offer-content text-center justify-content-center">
                                <p class="text-white">{{ __('app-shop-1-index.pishnahadVizhe') }}</p>
                                <h3 class="mb-3 text-white">50%{{ __('app-shop-1-index.sarfejooeeDarHazineha') }}</h3>
                                <hr class="thick">
                                <h5 class="text-white iranyekan">{{ __('app-shop-1-index.baKharideOnline') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>


    <h2 class="mt-5 line-throw"><span>{{ __('app-shop-1-index.porFrooshTarinHa') }}</span></h2>

    <div class="row p-5">
        @if(isset($bestSelling[0]))

        <div class="col-lg-3">
            <div class="card e-co-product">
                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[0]->id]) }}"><img src="{{ $bestSelling[0]->image['250,250'] }}" alt="" class="img-fluid"></a>
                <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[0]->id]) }}" class="product-title"></a> {{ $bestSelling[0]->title }} </a>
                    <div class="d-flex justify-content-between my-2">
                        @if($bestSelling[0]->off_price != null)
                            <p class="product-price byekan">{{ number_format($bestSelling[0]->off_price) }} {{ __('app-shop-1-index.tooman') }} <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($bestSelling[0]->price) }} {{ __('app-shop-1-index.tooman') }}</del></span>
                            </p>
                            @else
                            <p class="product-price byekan">{{ number_format($bestSelling[0]->price) }} {{ __('app-shop-1-index.tooman') }} <span class="ml-2 byekan"></span>
                                @endif

                    </div>
                    <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$bestSelling[0]->id]) }}" method="post" id="compareForm{{ $bestSelling[0]->id }}">
                        @csrf
                        <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $bestSelling[0]->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                    </form>

                    <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$bestSelling[0]->id]) }}" method="post" id="wishlistForm{{ $bestSelling[0]->id }}">
                        @csrf

                      <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $bestSelling[0]->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" class="fas fa-heart m-2"></i></a>
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
                      <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[0]->id]) }}" class="text-white">
                          مشاهده محصول
                        </a>
                         </button>

                    @endif

                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        @endif

        <!--end col-->
        @if(isset($bestSelling[1]))

        <div class="col-lg-3">
            <div class="card e-co-product">
                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[1]->id]) }}"><img src="{{ $bestSelling[1]->image['250,250'] }}" alt="" class="img-fluid"></a>
                {{-- <div class="ribbon ribbon-secondary"><span>جدید</span></div> --}}
                <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[1]->id]) }}" class="product-title"></a>{{ $bestSelling[1]->title }}</a>
                    <div class="d-flex justify-content-between my-2">
                        @if($bestSelling[1]->off_price != null)
                            <p class="product-price byekan">{{ number_format($bestSelling[1]->off_price) }} {{ __('app-shop-1-index.tooman') }}  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($bestSelling[1]->price) }} {{ __('app-shop-1-index.tooman') }} </del></span>
                            </p>
                            @else
                            <p class="product-price byekan">{{ number_format($bestSelling[1]->price) }} {{ __('app-shop-1-index.tooman') }}  <span class="ml-2 byekan"></span>
                                @endif

                    </div>
                    <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$bestSelling[1]->id]) }}" method="post" id="compareForm{{ $bestSelling[1]->id }}">
                        @csrf
                        <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $bestSelling[1]->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                    </form>

                    <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$bestSelling[1]->id]) }}" method="post" id="wishlistForm{{ $bestSelling[1]->id }}">
                        @csrf

                      <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $bestSelling[1]->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" class="fas fa-heart m-2"></i></a>
                    </form>
                            @if(\Auth::user())

                    {{-- @if($bestSelling[1]->type == 'file' and $bestSelling[1]->purchases()->get()->where('user_id' , \Auth::user()->id)->count() >= 1)
                      <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan comming-soon"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[1]->type == 'file') شما قبلا این فایل را خریداری کرده اید @endif</button>
                      @else --}}
                    {{-- <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$bestSelling[1]->id}}">
                        <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                            @if($bestSelling[1]->type == 'file'){{ __('app-shop-1-index.daryafteFile') }}
                                @else {{ __('app-shop-1-index.addToCart') }}
                                @endif</button>
                    </form> --}}
                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                      <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[1]->id]) }}" class="text-white">
                          مشاهده محصول
                        </a>
                         </button>


                    @endif

                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        @endif

        <!--end col-->

        @if(isset($bestSelling[2]))

        <div class="col-lg-3">
            <div class="card e-co-product">
                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[2]->id]) }}"><img src="{{ $bestSelling[2]->image['250,250'] }}" alt="" class="img-fluid"></a>
                <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[2]->id]) }}" class="product-title">{{ $bestSelling[2]->title }}</a>
                    <div class="d-flex justify-content-between my-2">
                        @if($bestSelling[2]->off_price != null)
                            <p class="product-price byekan">{{ number_format($bestSelling[2]->off_price) }} {{ __('app-shop-1-index.tooman') }}  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($bestSelling[2]->price) }} {{ __('app-shop-1-index.tooman') }} </del></span>
                            </p>
                            @else
                            <p class="product-price byekan">{{ number_format($bestSelling[2]->price) }} {{ __('app-shop-1-index.tooman') }}  <span class="ml-2 byekan"></span>
                                @endif
                    </div>
                    <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$bestSelling[2]->id]) }}" method="post" id="compareForm{{ $bestSelling[2]->id }}">
                        @csrf
                        <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $bestSelling[2]->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                    </form>
                    <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$bestSelling[2]->id]) }}" method="post" id="wishlistForm{{ $bestSelling[2]->id }}">
                        @csrf

                      <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $bestSelling[2]->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" class="fas fa-heart m-2"></i></a>
                    </form>

                          @if(\Auth::user())

                    {{-- @if($bestSelling[2]->type == 'file' and $bestSelling[2]->purchases()->get()->where('user_id' , \Auth::user()->id)->count() >= 1)
                        <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan comming-soon"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[2]->type == 'file') شما قبلا این فایل را خریداری کرده اید @endif</button>
                        @else --}}
                    {{-- <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$bestSelling[2]->id}}">
                        <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                            @if($bestSelling[2]->type == 'file') {{ __('app-shop-1-index.daryafteFile') }}
                                @else {{ __('app-shop-1-index.addToCart') }}
                                @endif</button>
                    </form> --}}

                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                      <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[2]->id]) }}" class="text-white">
                          مشاهده محصول
                        </a>
                         </button>

                    @endif
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        @endif

        <!--end col-->

        @if(isset($bestSelling[3]))

        <div class="col-lg-3">
            <div class="card e-co-product">
                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[3]->id]) }}"><img src="{{ $bestSelling[3]->image['250,250'] }}" alt="" class="img-fluid"></a>
                <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[3]->id]) }}" class="product-title">{{ $bestSelling[3]->title }}</a>
                    <div class="d-flex justify-content-between my-2">
                        @if($bestSelling[3]->off_price != null)
                            <p class="product-price byekan">{{ number_format($bestSelling[3]->off_price) }} {{ __('app-shop-1-index.tooman') }}  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{ number_format($bestSelling[3]->price) }} {{ __('app-shop-1-index.tooman') }} </del></span>
                            </p>
                            @else
                            <p class="product-price byekan">{{ number_format($bestSelling[3]->price) }} {{ __('app-shop-1-index.tooman') }}  <span class="ml-2 byekan"></span>
                                @endif
                    </div>
                    <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$bestSelling[3]->id]) }}" method="post" id="compareForm{{ $bestSelling[3]->id }}">
                        @csrf
                        <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $bestSelling[3]->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                    </form>

                    <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$bestSelling[3]->id]) }}" method="post" id="wishlistForm{{ $bestSelling[3]->id }}">
                        @csrf

                      <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $bestSelling[3]->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" class="fas fa-heart m-2"></i></a>
                    </form>
                        @if(\Auth::user())
                    {{-- @if($bestSelling[3]->type == 'file' and $bestSelling[3]->purchases()->get()->where('user_id' , \Auth::user()->id)->count() >= 1)
                          <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan comming-soon"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[3]->type == 'file') شما قبلا این فایل را خریداری کرده اید @endif</button>
                          @else --}}
                    {{-- <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$bestSelling[3]->id}}">
                        <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                            @if($bestSelling[3]->type == 'file') {{ __('app-shop-1-index.daryafteFile') }}
                                @else {{ __('app-shop-1-index.addToCart') }}
                                @endif</button>
                    </form> --}}

                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                      <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[3]->id]) }}" class="text-white">
                          مشاهده محصول
                        </a>
                         </button>

                    @endif
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        @endif

        <!--end col-->
    </div>
@if($feedbacks->count() >= 1)
    <h2 class="mt-5 line-throw"><span>{{ __('app-shop-1-index.feedback') }} </span></h2>


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
                <a class="carousel-control-prev bg-orange-omid" href="#carouselContent" role="button" data-slide="prev" style="width: 3%;opacity: 1;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">قبلی</span>
                </a>
                <a class="carousel-control-next bg-orange-omid" href="#carouselContent" role="button" data-slide="next" style="width: 3%;opacity: 1;">
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
        <h2 class="mt-5 line-throw"><span>برند ها</span></h2>


        <div class="row mt-5 mb-4">
            <div class="col-12">
                <div id="carouselContentBrand" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                      @foreach($brands as $brand)

                      <a href="/{{ $shop->english_name }}/brand/{{ $brand->id }}">
                        <div class="carousel-item {{$loop->first ? 'active' : ''}} text-center p-4 ml-lg-n2">
                          <img style="width: 250px" src="{{ $brand->icon['original'] }}" alt="">
                            <h5>{{ $brand->name }}</h5>
                        </div>
                      @endforeach
                    </a>
                    </div>
                    <a class="carousel-control-prev bg-orange-omid" href="#carouselContentBrand" role="button" data-slide="prev" style="width: 3%;opacity: 1;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">قبلی</span>
                    </a>
                    <a class="carousel-control-next bg-orange-omid" href="#carouselContentBrand" role="button" data-slide="next" style="width: 3%;opacity: 1;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">بعدی</span>
                    </a>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        @endif





    @endif
    <!-- container -->

    @endsection
    @section('pageScripts')
    @stop
