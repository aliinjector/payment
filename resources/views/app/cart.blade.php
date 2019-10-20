@yield('headerStyles')


        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>صفحه اصلی فروشگاه {{ $shop->name }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="صفحه اصلی فروشگاه {{ $shop->name }}" name="description">
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
</head>

<body style="font-size:18px!important">@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

<nav class="navbar navbar-expand-lg navbar-light bg-white">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto mr-2">
                <li class="nav-item">
                        <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('show.shop', $shop->first()->english_name) }}" tabindex="-1" aria-disabled="true">صفحه اصلی</a>
                      </li>
              @foreach ($shopCategories as $shopCategorie)

            <li class="nav-item">
              <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('shop.show.category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategorie->id]) }}" tabindex="-1" aria-disabled="true">{{ $shopCategorie->name }}</a>
            </li>
            @endforeach
          </ul>
          <ul class="navbar-nav ml-2">
                @guest
                <li class="nav-item mt-4 pl-4">
                        <div class="search-icon d-lg-block">
                                <a href="{{ route('login') }}" style="font-size:15px;" ><i class="fas fa-sign-in-alt"></i> ورود</a>

                                <a href="{{ route('register') }}" class="pr-2">
                                    <span class="" style="font-size:15px;"><i class="fa fa-user"></i> عضویت</span></a>
                            </div>
                        </li>
                        @endguest
                        @auth
                        @if(\Auth::user()->id == $shop->user_id)
                        <div class="search-icon d-flex align-items-center ml-5 ">
                            <a href="{{ route('dashboard-shop.index') }}" style="font-size:13px;">
                            <button type="button" class="btn btn-outline-primary">ورود به پنل مدیریت</button>
                            </a>
                        </div>
                      @else
                        <div class="search-icon d-flex align-items-center mx-3 ">
                            <a href="{{ route('user.purchased.list' , ['userID' => \Auth::user()->id]) }}" style="font-size:13px;">
                            <button type="button" class="btn btn-outline-primary"> مدیریت سفارشات</button>
                            </a>
                        </div>
                        <div class="search-icon d-flex align-items-center ml-5 ">
                            <a href="{{ route('cart.show' , ['shop' => $shop->english_name , 'userID' => \Auth::user()->id]) }}" style="font-size:13px;">
                            <button type="button" class="btn btn-primary px-3 border-success">سبد خرید <i class="mr-2 fas fa-shopping-cart"></i>@if(\Auth::user()->cart()->get()->count() != 0) {{ \Auth::user()->cart()->get()->first()->products()->count() }} @else 0 @endif</button>
                            </a>
                        </div>
                        @endif
                        @endauth
              <li class="nav-item">
                  <a href="{{ route('show.shop', $shop->first()->english_name) }}">
                  <img class="img-fluid d-sm-none d-lg-block" src="{{ $shop->logo['200,100'] }}" alt="">
                </a>
              </li>

          </ul>
        </div>
      </nav>
<div class="page-content">
  <h1>

  </h1>
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    {{--  <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "> دسته بندی </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>  --}}
                    <h4 class="page-title iranyekan">فروشگاه {{ $shop->name }}</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
          @if(isset($products))

            <div class="card-body">
                <h4 class="header-title mt-0">سبد خرید </h4>
                <p class="mb-4 text-muted">لیست محصولات سبد خرید.</p>
                <div class="table-responsive shopping-cart">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>محصول</th>
                                <th>قیمت واحد کالا</th>
                                <th>میزان تخفیف</th>
                                <th>تعداد</th>
                                <th>مجموع</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>

                        <form  action="{{ route('quantity',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id]) }}" method="post">
                          @csrf
                            @foreach ($products as $product)
                            <tr>
                                <td><img src="{{ $product->image['80,80'] }}" alt="" height="52">
                                    <p class="d-inline-block align-middle mb-0"><a href="" class="d-inline-block align-middle mb-0 product-name">{{ $product->title }}</a>
                                        <br><span class="text-muted font-13">رنگ قرمز</span></p>
                                </td>
                                <td>{{ number_format($product->price) }} تومان </td>
                                <td> @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($product->off_price == null) 0 @else {{ number_format($product->price-$product->off_price)}} @endif </td>
                                <td>

                                                <select class="c-ui-select js-ui-select" id="expressShipping-count-{{ $product->id }}" autocomplete="off" tabindex="-1" name="quantity{{ $product->id }}">
                                                  <option value="1">۱</option>
                                                  <option value="2">۲</option>
                                                  <option value="3">۳</option>
                                                  <option value="4">۴</option>
                                                  <option value="5">۵</option>
                                                </select>

                                </td>
                                <td>@if(isset($discountedPrice)){{ number_format($discountedPrice) }}@elseif($product->off_price != null){{ number_format($product->off_price)}} @else {{ number_format($product->price) }} @endif</td>
                                <td>
                                    <a href="" class="text-danger"><i class="mdi mdi-close-circle-outline font-18"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="d-flex input-group-append justify-content-end">
                    <button type="submit" class="btn btn-success mt-4">ثبت و ادامه</button>
                  </form>

                    </div>

                <!--end row-->
            </div>
          @else

            <h4 class="d-flex justify-content-center p-4">محصولی در سبد خرید شما وجود ندارد</h4>

          @endif

            <!--end card-->
        </div>
        <!--end card-body-->
    </div>
    <!--end col-->
</div>


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
{{-- @foreach ($products as $product)
<script type="text/javascript">
$(function(){
 $('#expressShipping-count-{{$product->id}}').on('change', function(){
     var value = $(this).val();
     console.log(value);
         $.ajax({
           type:'put',
             url: "{{url('/user-cart/digikala/7/quantity-change/1')}}",
             data: {
                 value: value,
                 "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
             },

         });
    });
});
</script>
@endforeach --}}
@include('sweet::alert')
@yield('pageScripts')
</body>

</html>
