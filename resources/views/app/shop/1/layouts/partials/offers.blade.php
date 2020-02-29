
    <h2 class="line-throw mt-5"><span class="throw-background">محصولات پیشنهادی </span></h2>

    <div class="row row p-5">
            @if($offeredProducts[0])
                <div class="col-lg-3">
                    <div class="card e-co-product" style="min-height: 40vh;">
                        <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[0]->id]) }}"><img src="{{ $offeredProducts[0]->image['250,250'] }}" alt="" class="img-fluid"></a>
                        <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[0]->id]) }}" class="product-title">{{ $offeredProducts[0]->title }}</a>
                            <div class="d-flex justify-content-between my-2 byekan">
                                @if($offeredProducts[0]->off_price != null)
                                    <p class="product-price byekan">{{  number_format($offeredProducts[0]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($offeredProducts[0]->price) }} تومان</del></span>
                                    </p>
                                @else
                                    <p class="product-price byekan">{{  number_format($offeredProducts[0]->price) }} تومان  <span class="ml-2 byekan"></span>
                                @endif
                            </div>
                            <p class="text-center">
                                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[0]->id]) }}"><button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> مشاهده جزییات</button></a>
                            </p>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
            @endif
        <!--end col-->

            @if(isset($offeredProducts[1]))
                <div class="col-lg-3">
                    <div class="card e-co-product" style="min-height: 40vh;">
                        <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[1]->id]) }}"><img src="{{ $offeredProducts[1]->image['250,250']}}" alt="" class="img-fluid"></a>
                        <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[1]->id]) }}" class="product-title">{{ $offeredProducts[1]->title }}</a>
                            <div class="d-flex justify-content-between my-2">
                                @if($offeredProducts[1]->off_price != null)
                                    <p class="product-price byekan">{{  number_format($offeredProducts[1]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($offeredProducts[1]->price) }} تومان</del></span>
                                    </p>
                                @else
                                    <p class="product-price byekan">{{  number_format($offeredProducts[1]->price) }} تومان  <span class="ml-2 byekan"></span>
                                @endif

                            </div>
                            <p class="text-center">
                                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[1]->id]) }}"><button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> مشاهده جزییات</button></a>
                            </p>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            @endif



            @if(isset($offeredProducts[2]))
                <div class="col-lg-3">
                    <div class="card e-co-product" style="min-height: 40vh;">
                        <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[2]->id]) }}"><img src="{{ $offeredProducts[2]->image['250,250'] }}" alt="" class="img-fluid"></a>
                        <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[2]->id]) }}" class="product-title">{{ $offeredProducts[2]->title }}</a>
                            <div class="d-flex justify-content-between my-2">
                                @if($offeredProducts[2]->off_price != null)
                                    <p class="product-price byekan">{{  number_format($offeredProducts[2]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($offeredProducts[2]->price) }} تومان</del></span>
                                    </p>
                                @else
                                    <p class="product-price byekan">{{  number_format($offeredProducts[2]->price) }} تومان  <span class="ml-2 byekan"></span>
                                @endif

                            </div>
                            <p class="text-center">
                                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[2]->id]) }}"><button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> مشاهده جزییات</button></a>
                            </p>

                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
            @endif

            {{--                hjkl--}}

        <!--end col-->
            @if(isset($offeredProducts[3]))
                <div class="col-lg-3">
                    <div class="card e-co-product" style="min-height: 40vh;">
                        <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[3]->id]) }}"><img src="{{ $offeredProducts[3]->image['250,250'] }}" alt="" class="img-fluid"></a>
                        {{-- <div class="ribbon ribbon-pink"><span class="byekan">50% تخفیف</span></div> --}}
                        <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[3]->id]) }}" class="product-title"></a>{{ $offeredProducts[3]->title }}</a>
                            <div class="d-flex justify-content-between my-2">
                                @if($offeredProducts[3]->off_price != null)
                                    <p class="product-price byekan">{{  number_format($offeredProducts[3]->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($offeredProducts[3]->price) }} تومان</del></span>
                                    </p>
                                @else
                                    <p class="product-price byekan">{{  number_format($offeredProducts[3]->price) }} تومان  <span class="ml-2 byekan"></span>
                                @endif

                            </div>
                                    <p class="text-center">
                                        <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$offeredProducts[3]->id]) }}"><button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> مشاهده جزییات</button></a>
                                    </p>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
        @endif

        <!--end col-->
    </div>
