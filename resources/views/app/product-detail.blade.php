@yield('headerStyles')


        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>پایان پی - داشبورد اصلی</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="پایان پی - داشبورد اصلی" name="description">
    <meta name="author" content="Setareh Nooran Co. Ali Rahmani">
    <!-- App favicon -->
    <link href="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- App css -->
    <link href="/dashboard/assets/css/jquery.steps.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/custom.css" rel="stylesheet" type="text/css">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

  <style media="screen">
  input[type='radio']:after {
  width: 16px;
  height: 16px;
  border-radius: 20px;
  top: -2px;
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
  top: -2px;
  left: -2px;
  position: relative;
  background-color: #919191;
  content: '';
  display: inline-block;
  visibility: visible;
  border: 2px solid white;
}
  </style>
</head>
<body>@section('content')
        <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

        <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto mr-2">
                        <li class="nav-item">
                                <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('show.shop', \Auth::user()->shop()->first()->english_name) }}" tabindex="-1" aria-disabled="true">صفحه اصلی</a>
                              </li>
                      @foreach ($shopCategories as $shopCategorie)
                    <li class="nav-item">
                      <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('shop.show.category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategorie->id]) }}" tabindex="-1" aria-disabled="true">{{ $shopCategorie->name }}</a>
                    </li>
                    @endforeach
                  </ul>
                  <ul class="navbar-nav ml-2">
                        <li class="nav-item">
                                <a href="{{ route('show.shop', \Auth::user()->shop()->first()->english_name) }}">
                                <img src="{{ $shop->logo['200,100'] }}" alt="">
                              </a>
                            </li>
                  </ul>
                </div>
              </nav>
              <div class="page-content">
                    <div class="container-fluid">
                        <!-- Page-Title -->
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
                                                    <h2 class="pro-price">{{  number_format($product->price) }} تومان</h2>
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
                                                    @if($product->type == 'file')
                                                    <a href="{{ route('download.file', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}" target="_blank" class="btn btn-primary text-white px-4 d-inline-block"><i class="fa fa-download mr-2"></i>دریافت فایل</a>
                                                    @else
                                                    <a href="#" class="btn btn-primary text-white px-4 d-inline-block"><i class="mdi mdi-cart mr-2"></i>خرید </a>
                                                    @endif

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
<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        @yield('content')

    <!--end row-->
    </div>
    <!-- container -->
    <footer class="footer text-center text-sm-left">&copy; ۱۳۹۸ - کلیه حقوق محفوظ است. <span class="text-muted d-none d-sm-inline-block float-right">طراحی و توسعه در دپارتمان فناوری اطلاعات شرکت فناور ستاره نوران</span></footer>
    <!--end footer-->
</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->
<!-- jQuery  -->
<script src="/dashboard/assets/js/jquery.min.js"></script>
<script src="/dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="/dashboard/assets/js/metisMenu.min.js"></script>
<script src="/dashboard/assets/js/waves.min.js"></script>
<script src="/dashboard/assets/js/jquery.slimscroll.min.js"></script>
<script src="/dashboard/assets/plugins/moment/moment.js"></script>
<script src="/dashboard/assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/dashboard/assets/pages/jquery.eco_dashboard.init.js"></script>
<script src="/dashboard/assets/js/jquery.form-wizard.init.js"></script>
<script src="/dashboard/assets/js/jquery.steps.min.js"></script>
<!-- App js -->
<script src="/dashboard/assets/js/app.js"></script>
<script src="/dashboard/assets/js/sweetalert.min.js"></script>
@include('sweet::alert')
@yield('pageScripts')

<script>
$(window).on('load', function() {

    // if (window.location.href.indexOf("wallet") == -1) {
    //     $('#PardakhtYari').removeClass("active");
    //     $("a[href$='PardakhtYari']").removeClass("active");
    //
    // }
    // if (window.location.href.indexOf("card") == -1) {
    //     $('#PardakhtYari').removeClass("active");
    //     $("a[href$='PardakhtYari']").removeClass("active");
    // }
    //
    //
    //
    // if (window.location.href.indexOf("wallet") > -1) {
    //     $('#PardakhtYari').addClass("active");
    //     $("a[href$='PardakhtYari']").addClass("active");
    //
    // }
    // if (window.location.href.indexOf("card") > -1) {
    //     $('#PardakhtYari').addeClass("active");
    //     $("a[href$='PardakhtYari']").addClass("active");
    // }

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

         //>=, not <=
        if (scroll >= 300) {
            //clearHeader, not clearheader - caps H
            $(".fixed-box-buy").addClass("top-fixed");
        }
        if (scroll <= 300) {
            //clearHeader, not clearheader - caps H
            $(".fixed-box-buy").removeClass("top-fixed");
        }
    }); //missing );

    });

</script>
</body>

</html>
