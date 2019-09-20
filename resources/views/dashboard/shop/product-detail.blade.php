@extends('dashboard.layouts.master')
@section('content')
  <style media="screen">
  input[type='radio']:after {
  width: 16px;
  height: 16px;
  border-radius: 20px;
  top: -1px;
  left: -2px;
  position: relative;
  background-color: white;
  content: '';
  display: inline-block;
  visibility: visible;
  border: 2px solid white;
}

input[type='radio']:checked:after {
  width: 16px;
  height: 16px;
  border-radius: 20px;
  top: -1px;
  left: -2px;
  position: relative;
  background-color: #919191;
  content: '';
  display: inline-block;
  visibility: visible;
  border: 2px solid white;
}
  </style>
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">محصول</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">محصول</h4>
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
                            <div class="col-lg-6"><img src="{{ $product->image['400,400'] }}" alt="" class="col-8 d-block"></div>
                            <!--end col-->
                            <div class="col-lg-6 align-self-center">
                                <div class="single-pro-detail">
                                    <div class="custom-border mb-3"></div>
                                    <h3 class="pro-title iranyekan">{{ $product->title }}</h3>
                                    @if ($product->amount != 0)
                                    <span class="bg-soft-success rounded-pill px-3 py-1 font-weight-bold">موجود</span>
                                      @else
                                        @if ($product->type == "service")
                                          <span class="bg-soft-pink rounded-pill px-3 py-1 font-weight-bold">غیرقابل دسترس</span>
                                        @else
                                        <span class="bg-soft-pink rounded-pill px-3 py-1 font-weight-bold">ناموجود</span>
                                      @endif
                                    @endif
                                    {{-- <ul class="list-inline mb-2 product-review">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                            <li class="list-inline-item">4.5 (30 reviews)</li>
                                        </ul> --}}
                                    <h2 class="pro-price">{{ $product->price }} تومان</h2>
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
                               <a href="#" class="btn btn-primary text-white px-4 d-inline-block"><i class="mdi mdi-cart mr-2"></i>اضافه به سبد خرید</a>
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
                            <div class="pro-order-box min-height-160 border"><i class="mdi mdi-truck-fast text-success"></i>
                                <h4 class="header-title">ارسال سریع</h4>
                                <p class="text-muted mb-0">امکان ارسال در سریع ترین زمان ممکن پس از ثبت سفارش در سامانه.</p>
                            </div>
                        </div>
                      @endif
                        <!--end col-->
                        @if ($product->money_back == 1)
                        <div class="col-lg-3">
                            <div class="pro-order-box min-height-160 border"><i class="mdi mdi-refresh text-danger"></i>
                                <h4 class="header-title">تضمین بازگشت وجه</h4>
                                <p class="text-muted mb-0">درصورت عدم رضایت از محصول وجه دریافتی بازگشت داده میشود.</p>
                            </div>
                        </div>
                      @endif

                        <!--end col-->
                        @if ($product->support == 1)
                        <div class="col-lg-3">
                            <div class="pro-order-box min-height-160 border"><i class="mdi mdi-headset text-warning"></i>
                                <h4 class="header-title">پشتیبانی 24 ساعته</h4>
                                <p class="text-muted mb-0">تیم پشتیبانی مجموعه به صورت 24 ساعته آماده پاسخگویی به سوالات شما میباشند.</p>
                            </div>
                        </div>
                      @endif

                        <!--end col-->
                        @if ($product->secure_payment == 1)
                        <div class="col-lg-3">
                            <div class="pro-order-box mb-0 min-height-160 border"><i class="mdi mdi-wallet text-purple"></i>
                                <h4 class="header-title">پرداخت امن</h4>
                                <p class="text-muted mb-0">امکان پرداخت امن در سامانه و تجربه پرداخت امن.</p>
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
                <div class="card-body">
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
                                    <input type="email" placeholder="ایمیل خود را وارد کنید" required="">
                                    <button type="submit" class="btn btn-success">دنبال کردن</button>
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
                        <div class="col-lg-3 align-self-center"><img src="{{ $product->image['250,250'] }}" alt="" class="d-block mx-auto col-12"></div>
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
                        <h4 class="header-title">مجموع فروش   </h4>
                        {{-- <ul class="list-inline mb-0 product-review">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                <li class="list-inline-item"><small class="text-muted">Total Review (700)</small></li>
                            </ul> --}}
                    </div>
                    {{-- <ul class="list-unstyled mt-3">
                            <li class="mb-2"><span class="text-info">5 Star</span> <small class="float-right text-muted ml-3 font-14">593</small>
                                <div class="progress mt-2" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%; border-radius:5px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="mb-2"><span class="text-info">4 Star</span> <small class="float-right text-muted ml-3 font-14">99</small>
                                <div class="progress mt-2" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 18%; border-radius:5px;" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="mb-2"><span class="text-info">3 Star</span> <small class="float-right text-muted ml-3 font-14">6</small>
                                <div class="progress mt-2" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 10%; border-radius:5px;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="mb-2"><span class="text-info">2 Star</span> <small class="float-right text-muted ml-3 font-14">2</small>
                                <div class="progress mt-2" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 1%; border-radius:5px;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li><span class="text-info">1 Star</span> <small class="float-right text-muted ml-3 font-14">0</small>
                                <div class="progress mt-2" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%; border-radius:5px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                        </ul> --}}
                    <div class="review-box text-center align-item-center">
                        <h3 class="byekan">100%</h3>
                        <h4 class="header-title">رضایت مشتری</h4>
                        <p class="text-muted mb-0">درصد عدم استرداد کالا توسط مشتری.</p>
                    </div>
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
@stop
