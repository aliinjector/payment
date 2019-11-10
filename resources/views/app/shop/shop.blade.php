@extends('app.shop.layouts.master')
@section('content')
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title iranyekan">فروشگاه {{ $shop->name }}</h4>
                    <p class="text-muted mb-3 mt-1">{{ $shop->description }}</p>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
@if($lastProducts->count() == 0)
<div class="d-flex justify-content-center align-items-center" style="height:80vh">
<h4>
    هیچ محصولی در این فروشگاه وجود ندارد
</h4>
</div>
@else
        <!-- end page title end breadcrumb -->

        <h2 class="line-throw"><span>اخرین محصولات </span></h2>


         <div class="row p-5">
            @if($lastProducts[0])
                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[0]->id]) }}"><img src="{{ $lastProducts[0]->image['250,250'] }}" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[0]->id]) }}" class="product-title">{{ $lastProducts[0]->title }}</a>
                                <div class="d-flex justify-content-between my-2 byekan">
                                        @if($lastProducts[0]->off_price != null)
                                        <p class="product-price byekan">{{  number_format($lastProducts[0]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($lastProducts[0]->price) }} تومان</del></span>
                                        </p>
                                        @else
                                        <p class="product-price byekan">{{  number_format($lastProducts[0]->price) }} تومان  <span class="ml-2 byekan"></span>
                                            @endif
                                </div>
                                <a target="_blank" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                            @if(\Auth::user())
                                  <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$lastProducts[0]->id}}">
                                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> @if($lastProducts[0]->type == 'file') دریافت فایل  @else اضافه به سبد خرید @endif</button>
                                  </form>


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
                            <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[1]->id]) }}"><img src="{{ $lastProducts[1]->image['250,250']}}" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[1]->id]) }}" class="product-title">{{ $lastProducts[1]->title }}</a>
                                <div class="d-flex justify-content-between my-2">
                                        @if($lastProducts[1]->off_price != null)
                                        <p class="product-price byekan">{{  number_format($lastProducts[1]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($lastProducts[1]->price) }} تومان</del></span>
                                        </p>
                                        @else
                                        <p class="product-price byekan">{{  number_format($lastProducts[1]->price) }} تومان  <span class="ml-2 byekan"></span>
                                            @endif

                                </div>
                                <a target="_blank" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                            @if(\Auth::user())
{{--
                                @if($lastProducts[1]->type == 'file' and $lastProducts[1]->purchases()->get()->where('user_id' , \Auth::user()->id)->count() >= 1)
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan comming-soon"><i class="mdi mdi-cart mr-1"></i> @if($lastProducts[1]->type == 'file') شما قبلا این فایل را خریداری کرده اید @endif</button>
                                @else --}}
                                  <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$lastProducts[1]->id}}">
                                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> @if($lastProducts[1]->type == 'file') دریافت فایل  @else اضافه به سبد خرید @endif</button>

                                  </form>

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
                            <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[2]->id]) }}"><img src="{{ $lastProducts[2]->image['250,250'] }}" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[2]->id]) }}" class="product-title">{{ $lastProducts[2]->title }}</a>
                                <div class="d-flex justify-content-between my-2">
                                        @if($lastProducts[2]->off_price != null)
                                        <p class="product-price byekan">{{  number_format($lastProducts[2]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($lastProducts[2]->price) }} تومان</del></span>
                                        </p>
                                        @else
                                        <p class="product-price byekan">{{  number_format($lastProducts[2]->price) }} تومان  <span class="ml-2 byekan"></span>
                                            @endif

                                </div>
                                <a target="_blank" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                            @if(\Auth::user())

                                {{-- @if($lastProducts[2]->type == 'file' and $lastProducts[2]->purchases()->get()->where('user_id' , \Auth::user()->id)->count() >= 1)
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan comming-soon"><i class="mdi mdi-cart mr-1"></i> @if($lastProducts[2]->type == 'file') شما قبلا این فایل را خریداری کرده اید @endif</button>
                                @else --}}
                                  <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$lastProducts[2]->id}}">
                                      <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> @if($lastProducts[2]->type == 'file') دریافت فایل  @else اضافه به سبد خرید @endif</button>
                                  </form>


                        @endif

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    @endif

{{--                hjkl--}}

                    <!--end col-->
                    @if(isset($lastProducts[3]))
                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[3]->id]) }}"><img src="{{ $lastProducts[3]->image['250,250'] }}" alt="" class="img-fluid"></a>
                            {{-- <div class="ribbon ribbon-pink"><span class="byekan">50% تخفیف</span></div> --}}
                            <div class="card-body product-info"><a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$lastProducts[3]->id]) }}" class="product-title"></a>{{ $lastProducts[3]->title }}</a>
                                <div class="d-flex justify-content-between my-2">
                                        @if($lastProducts[3]->off_price != null)
                                        <p class="product-price byekan">{{  number_format($lastProducts[3]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($lastProducts[3]->price) }} تومان</del></span>
                                        </p>
                                        @else
                                        <p class="product-price byekan">{{  number_format($lastProducts[3]->price) }} تومان  <span class="ml-2 byekan"></span>
                                            @endif

                                </div>
                                <a target="_blank" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                            @if(\Auth::user())

                                {{-- @if($lastProducts[3]->type == 'file' and $lastProducts[3]->purchases()->get()->where('user_id' , \Auth::user()->id)->count() >= 1)
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan comming-soon"><i class="mdi mdi-cart mr-1"></i> @if($lastProducts[3]->type == 'file') شما قبلا این فایل را خریداری کرده اید @endif</button>
                                @else --}}
                                  <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$lastProducts[3]->id}}">
                                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> @if($lastProducts[3]->type == 'file') دریافت فایل  @else اضافه به سبد خرید @endif</button>
                                  </form>

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
                                        <p class="text-white">پیشنهاد ویژه</p>
                                        <h3 class="mb-3 text-white">50% صرفه جویی در هزینه ها</h3>
                                        <hr class="thick">
                                        <h5 class="text-white iranyekan">با خرید از سامانه آنلاین</h5></div>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>




            <h2 class="mt-5 line-throw"><span>پرفروش ترین محصولات</span></h2>

            <div class="row p-5">
                    @if(isset($bestSelling[0]))

                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[0]->id]) }}"><img src="{{ $bestSelling[0]->image['250,250'] }}" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[0]->id]) }}" class="product-title"></a> {{ $bestSelling[0]->title }} </a>
                                <div class="d-flex justify-content-between my-2">
                                        @if($bestSelling[0]->off_price != null)
                                        <p class="product-price byekan">{{  number_format($bestSelling[0]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($bestSelling[0]->price) }} تومان</del></span>
                                        </p>
                                        @else
                                        <p class="product-price byekan">{{  number_format($bestSelling[0]->price) }} تومان  <span class="ml-2 byekan"></span>
                                            @endif

                                </div>
                                <a target="_blank" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                            @if(\Auth::user())

                                {{-- @if($bestSelling[0]->type == 'file' and $bestSelling[0]->purchases()->get()->where('user_id' , \Auth::user()->id)->count() >= 1)
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan comming-soon"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[0]->type == 'file') شما قبلا این فایل را خریداری کرده اید @endif</button>
                                @else --}}
                                  <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$bestSelling[0]->id}}">
                                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[0]->type == 'file') دریافت فایل  @else اضافه به سبد خرید @endif</button>
                                  </form>
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
                            <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[1]->id]) }}"><img src="{{ $bestSelling[1]->image['250,250'] }}" alt="" class="img-fluid"></a>
                            {{-- <div class="ribbon ribbon-secondary"><span>جدید</span></div> --}}
                            <div class="card-body product-info"><a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[1]->id]) }}" class="product-title"></a>{{ $bestSelling[1]->title }}</a>
                                <div class="d-flex justify-content-between my-2">
                                        @if($bestSelling[1]->off_price != null)
                                        <p class="product-price byekan">{{  number_format($bestSelling[1]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($bestSelling[1]->price) }} تومان</del></span>
                                        </p>
                                        @else
                                        <p class="product-price byekan">{{  number_format($bestSelling[1]->price) }} تومان  <span class="ml-2 byekan"></span>
                                            @endif

                                </div>
                                <a target="_blank" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                            @if(\Auth::user())

                                {{-- @if($bestSelling[1]->type == 'file' and $bestSelling[1]->purchases()->get()->where('user_id' , \Auth::user()->id)->count() >= 1)
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan comming-soon"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[1]->type == 'file') شما قبلا این فایل را خریداری کرده اید @endif</button>
                                @else --}}
                                  <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$bestSelling[1]->id}}">
                                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[1]->type == 'file') دریافت فایل  @else اضافه به سبد خرید @endif</button>
                                  </form>


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
                            <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[2]->id]) }}"><img src="{{ $bestSelling[2]->image['250,250'] }}" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[2]->id]) }}" class="product-title">{{ $bestSelling[2]->title }}</a>
                                <div class="d-flex justify-content-between my-2">
                                        @if($bestSelling[2]->off_price != null)
                                        <p class="product-price byekan">{{  number_format($bestSelling[2]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($bestSelling[2]->price) }} تومان</del></span>
                                        </p>
                                        @else
                                        <p class="product-price byekan">{{  number_format($bestSelling[2]->price) }} تومان  <span class="ml-2 byekan"></span>
                                            @endif
                                </div>
                                <a target="_blank" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                            @if(\Auth::user())

                                {{-- @if($bestSelling[2]->type == 'file' and $bestSelling[2]->purchases()->get()->where('user_id' , \Auth::user()->id)->count() >= 1)
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan comming-soon"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[2]->type == 'file') شما قبلا این فایل را خریداری کرده اید @endif</button>
                                @else --}}
                                  <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$bestSelling[2]->id}}">
                                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[2]->type == 'file') دریافت فایل  @else اضافه به سبد خرید @endif</button>
                                  </form>

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
                            <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[3]->id]) }}"><img src="{{ $bestSelling[3]->image['250,250'] }}" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$bestSelling[3]->id]) }}" class="product-title">{{ $bestSelling[3]->title }}</a>
                                <div class="d-flex justify-content-between my-2">
                                        @if($bestSelling[3]->off_price != null)
                                        <p class="product-price byekan">{{  number_format($bestSelling[3]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($bestSelling[3]->price) }} تومان</del></span>
                                        </p>
                                        @else
                                        <p class="product-price byekan">{{  number_format($bestSelling[3]->price) }} تومان  <span class="ml-2 byekan"></span>
                                            @endif
                                </div>
                                <a target="_blank" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                            @if(\Auth::user())
                                {{-- @if($bestSelling[3]->type == 'file' and $bestSelling[3]->purchases()->get()->where('user_id' , \Auth::user()->id)->count() >= 1)
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan comming-soon"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[3]->type == 'file') شما قبلا این فایل را خریداری کرده اید @endif</button>
                                @else --}}
                                  <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$bestSelling[3]->id}}">
                                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> @if($bestSelling[3]->type == 'file') دریافت فایل  @else اضافه به سبد خرید @endif</button>
                                  </form>

                            @endif
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    @endif

                    <!--end col-->
                </div>
                @endif
    <!-- container -->

@endsection
@section('pageScripts')
<script>
    $(document).on('click', '#ttttt', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var test = $(this).data('test');
        $.ajax({
            type: "post",
            url: "{{url('dashboard/product-category/delete')}}",
            data: {
                id: id,
                test: test,
                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
            },
            success: function(data) {
                var url = document.location.origin + "/dashboard/product-category";
                location.href = url;
            }
        });
    });
</script>
@stop
