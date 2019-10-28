@extends('app.shop.layouts.master')
@section('content')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="float-right">

                                    </div>
                                    <h4 class="page-title">{{ $product->title }}</h4>
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
                                            <div class="col-lg-6"><img src="{{ $product->image['400,400'] }}" alt="" class="col-8 d-block" height="400"></div>
                                            <!--end col-->
                                            <div class="col-lg-6 align-self-center">
                                                <div class="single-pro-detail">
                                                    <h3 class="pro-title iranyekan pb-5">{{ $product->title }}
                                                        <div class="custom-border mt-3"></div>

                                                    </h3>

                                                    @if ($product->amount != 0 || $product->type == 'service' || $product->type == 'file')
                                                    <span class="bg-soft-success rounded-pill px-3 py-1 font-weight-bold">موجود</span>
                                                      @else
                                                        <span class="bg-soft-pink rounded-pill px-3 py-1 font-weight-bold">ناموجود</span>
                                                    @endif
                                                    {{-- <ul class="list-inline mb-2 product-review">
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                                            <li class="list-inline-item">4.5 (30 reviews)</li>
                                                        </ul> --}}
                                                        @if($product->off_price != null)
                                                    <h2 class="pro-price">{{  number_format($product->off_price) }} تومان</h2>
                                                    <span><del>{{  number_format($product->price) }} تومان</del></span>
                                                    @else
                                                    <h2 class="pro-price">{{  number_format($product->price) }} تومان</h2>
                                                    @endif
                                                    <h6 class="text-muted font-13">ویژگی ها :</h6>
                                                    <ul class="list-unstyled pro-features border-0 iranyekan">
                                                      @if ($product->feature_1)
                                                        <li>{{ $product->feature_1 }}</li>
                                                      @endif
                                                      @if ($product->feature_2)
                                                        <li>{{ $product->feature_2 }}</li>
                                                      @endif
                                                      @if ($product->feature_3)
                                                        <li>{{ $product->feature_3 }}</li>
                                                      @endif
                                                      @if ($product->feature_4)
                                                        <li>{{ $product->feature_4 }}</li>
                                                      @endif
                                                    </ul>
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

                                                    @if ($product->color_1 || $product->color_2 || $product->color_3 || $product->color_4 || $product->color_5)
                                                      <h5 class="text-muted d-inline-block align-middle mr-2">رنگ :</h5>
                                                    @endif
                                                    @if ($product->color_1)
                                                      <div class="form-check-inline ml-2 color-picker p-1" style="background-color:{{ $product->color_1 }}">
                                                          <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                                          <label for="inlineRadio1"></label>
                                                      </div>
                                                    @endif
                                                    @if ($product->color_2)
                                                    <div class="form-check-inline color-picker p-1" style="background-color:{{ $product->color_2 }}">
                                                        <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                                        <label for="inlineRadio2"></label>
                                                    </div>
                                                  @endif
                                                  @if ($product->color_3)
                                                    <div class="form-check-inline color-picker p-1" style="background-color:{{ $product->color_3 }}">
                                                        <input type="radio" id="inlineRadio3" value="option3" name="radioInline">
                                                        <label for="inlineRadio3"></label>
                                                    </div>
                                                  @endif
                                                  @if ($product->color_4)
                                                    <div class="form-check-inline color-picker p-1" style="background-color:{{ $product->color_4 }}">
                                                        <input type="radio" id="inlineRadio4" value="option4" name="radioInline">
                                                        <label for="inlineRadio4"></label>
                                                    </div>
                                                  @endif
                                                  @if ($product->color_5)
                                                    <div class="form-check-inline color-picker p-1" style="background-color:{{ $product->color_5 }}">
                                                        <input type="radio" id="inlineRadio4" value="option4" name="radioInline">
                                                        <label for="inlineRadio4"></label>
                                                    </div>
                                                  @endif
                                                <div class="quantity mt-3">
                                                  @auth
                                                    @if($product->type == 'file')
                                                      <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                      <button type="submit" class="btn btn-primary iranyekan rounded"><i class="mdi mdi-cart mr-1"></i> دریافت فایل </button>
                                                    </form>
                                                    @else
                                                      <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <button type="submit" class="text-white btn bg-blue-omid iranyekan rounded"><i class="mdi mdi-cart mr-1"></i> اضافه به سبد خرید </button>
                                                    @endif

                                                  </form>
                                                @endauth
                                                @guest
                                                  <a href="{{ route('register') }}">
                                                  <button type="button" class="btn btn-primary iranyekan rounded"><i class="mdi mdi-cart mr-1"></i> ثبت نام و خرید </button>
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
                                                <h4 class="header-title text-white font-weight-bold">ارسال سریع</h4>
                                                <p class="text-white mb-0">امکان ارسال در سریع ترین زمان ممکن پس از ثبت سفارش در سامانه.</p>
                                            </div>
                                        </div>
                                      @endif
                                        <!--end col-->
                                        @if ($product->money_back == 1)
                                        <div class="col-lg-3">
                                            <div class="pro-order-box min-height-160 border bg-red-rock"><i class="mdi mdi-refresh text-white"></i>
                                                <h4 class="header-title text-white font-weight-bold">تضمین بازگشت وجه</h4>
                                                <p class="text-white mb-0">درصورت عدم رضایت از محصول وجه دریافتی بازگشت داده میشود.</p>
                                            </div>
                                        </div>
                                      @endif

                                        <!--end col-->
                                        @if ($product->support == 1)
                                        <div class="col-lg-3">
                                            <div class="pro-order-box min-height-160 border bg-green-rock"><i class="mdi mdi-headset text-white"></i>
                                                <h4 class="header-title text-white font-weight-bold">پشتیبانی 24 ساعته</h4>
                                                <p class="mb-0 text-white">تیم پشتیبانی مجموعه به صورت 24 ساعته آماده پاسخگویی به سوالات شما میباشند.</p>
                                            </div>
                                        </div>
                                      @endif

                                        <!--end col-->
                                        @if ($product->secure_payment == 1)
                                        <div class="col-lg-3">
                                            <div class="pro-order-box mb-0 min-height-160 border bg-blue-rock"><i class="mdi mdi-wallet text-white"></i>
                                                <h4 class="header-title text-white font-weight-bold">پرداخت امن</h4>
                                                <p class="text-white mb-0">امکان پرداخت امن در سامانه و تجربه پرداخت امن.</p>
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
                                <div class="card-body comming-soon">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="newsletters-text">
                                                <h4>ثبت نام در خبرنامه</h4>
                                                <p class="text-muted mb-0">برای دریافت اخرین اخبار سامانه میتوانید در خبرنامه ثبت نام کنید.</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-md-6 align-self-center">
                                            <div class="newsletters-input">
                                                <form class="position-relative">
                                                    <input type="email" placeholder="ایمیل خود را وارد کنید" required="" style="direction: ltr">
                                                    <button type="submit" class="btn btn-success rounded">دنبال کردن</button>
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
                                            <h5 class="mt-3">توضیحات   :</h5>
                                            <p class="text-muted mb-4">{{ $product->description }}</p>
                                            <ul class="list-unstyled mb-4">
                                              @if ($product->feature_1)
                                                <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>{{ $product->feature_1 }}.</li>
                                              @endif
                                              @if ($product->feature_2)
                                                <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>{{ $product->feature_2 }}.</li>
                                              @endif
                                              @if ($product->feature_3)
                                                <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>{{ $product->feature_3 }}.</li>
                                              @endif
                                              @if ($product->feature_4)
                                                <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>{{ $product->feature_4 }}.</li>
                                              @endif
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
                                    <div class="review-box text-center align-item-center">
                                        <h1 class="byekan">{{ $product->buyCount }}</h1>
                                        <h4 class="header-title">مجموع فروش</h4>
                                    </div>


                                    <h4 class="mt-3 mb-3">برچسب ها :</h4>
                                    <ul class="tags iranyekan">
                                        @foreach ($product->tags()->get() as $tag)
                                        <li><a href="{{ route('shop.tag.product', ['shop'=>$shop->english_name, 'name'=>$tag->name]) }}" class="tag iranyekan">{{ $tag->name }}</a></li>
                                        @endforeach
                                    </ul>


                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>

                    <!-- container -->
                </div>

@endsection
@section('pageScripts')

@include('sweet::alert')
@stop
