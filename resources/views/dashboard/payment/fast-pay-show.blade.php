@yield('headerStyles')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>فاکتور</title>
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
</head>
<body class="iranyekan">
@section('content')
    <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
@endsection
@section('pageScripts')
@stop
@yield('content')
<div class="card col-lg-8 mb-5 mr-16 mt-5 col-md-8 col-sm-12">
    @include('dashboard.layouts.errors')
    <div class="card-body invoice-head">

        <!--end row-->
    </div>
    <!--end card-body-->
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="">
                    <h6 class="mb-0"><b>تاریخ ثبت فاکتور :</b> {{ jdate() }}</h6>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive project-invoice">
                    <table class="table table-bordered mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>نام محصول</th>
                            <th>میزان تخفیف</th>
                            <th> قیمت کالا</th>
                        </tr>
                        <!--end tr-->
                        </thead>
                        <tbody class="iranyekan font-14">
                        <tr>
                            <td>
                                <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}">
                                    <h5 class="mt-0 mb-1">{{ $product->title }}</h5>
                                </a>
                            </td>
                            <td> @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($product->off_price == null) 0 @else {{ number_format($product->price-$product->off_price)}} @endif </td>
                            <td>{{ number_format($product->price) }}</td>
                        </tr>
                        <!--end tr-->
                        <!--end tr-->
                        <tr class="bg-dark text-white">
                            <th colspan="1" class="border-0"></th>
                            <td class="border-0 font-14"><b>جمع کل</b></td>
                            <td>@if(isset($discountedPrice)){{ number_format($discountedPrice) }}@elseif($product->off_price != null){{ number_format($product->off_price)}} @else {{ number_format($product->price) }} @endif</td>
                        </tr>
                        <!--end tr-->
                        </tbody>
                    </table>
                    <!--end table-->
                </div>
                <div class="col-lg-4 mt-3 mr-lg-n4">
                    <form class="form-inline col-lg-12" action="{{ route('approved',['shop'=>$shop->english_name, 'id'=>$product->id]) }}" method="post">
                        @csrf
                        <input type="text" name="code" class="form-control col-lg-6 col-md-12 col-sm-12" placeholder="کد" aria-describedby="button-addon2">
                        <button class="btn btn-outline-pink col-lg-6" type="submit" id="button-addon2">اعمال  تخفیف</button>
                    </form>
                </div>
                <form action="{{ route('purchase.submit', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}" method="post" class="form-horizontal">
                    @csrf
                    @if($product->type != 'file')
                        <div class="col-md-6 mt-5">
                            <div class="total-payment">
                                <h4 class="header-title">مجموع پرداختی</h4>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="payment-title">قیمت کالا :</td>
                                        <td> {{ number_format($product->price) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="payment-title">میزان تخفیف :</td>
                                        <td> @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($product->off_price == null) 0 @else {{ number_format($product->price-$product->off_price)}} @endif تومان</td>
                                    </tr>
                                    <tr>
                                        <td class="payment-title"> روش ارسال :</td>
                                        <td>
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    @if($shop->quick_way == 'enable')
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="shipping_way" id="quick_way" value="quick_way" checked="checked">
                                                            <label for="quick_way">ارسال سریع</label>
                                                        </div>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if($shop->posting_way == 'enable')
                                                        <div class="radio radio-info mt-2">
                                                            <input type="radio" name="shipping_way" id="posting_way" value="posting_way">
                                                            <label for="posting_way">ارسال پستی</label>
                                                        </div>
                                                    @endif
                                                    @if($shop->person_way == 'enable')
                                                        <div class="radio radio-info mt-2">
                                                            <input type="radio" name="shipping_way" id="person_way" value="person_way">
                                                            <label for="person_way">دریافت حضوری</label>
                                                        </div>
                                                    @endif
                                                </li>
                                                <li class="mt-2 "><span class=" showAddresses btn btn-soft-primary font-weight-bolder">انتخاب آدرس
                                             </span>
                                                </li>
                                                <li>
                                                    @if(isset(\auth::user()->userInformation()->get()->first()->address))
                                                        <div class="radio radio-info mt-3 d-none address_1">
                                                            <input type="radio" name="address" id="address_1" value="address_1" checked>
                                                            <label class="min-width-100-fix" for="address_1">{{ \auth::user()->userInformation()->get()->first()->address }}</label>
                                                        </div>
                                                    @endif
                                                    @if(isset(\auth::user()->userInformation()->get()->first()->address_2))
                                                        <div class="radio radio-info mt-3 d-none address_2">
                                                            <input type="radio" name="address" id="address_2" value="address_2">
                                                            <label class="min-width-100-fix" for="address_2">{{ \auth::user()->userInformation()->get()->first()->address_2 }}</label>
                                                        </div>
                                                    @endif
                                                    @if(isset(\auth::user()->userInformation()->get()->first()->address_3))
                                                        <div class="radio radio-info mt-3 d-none address_3">
                                                            <input type="radio" name="address" id="address_3" value="address_3">
                                                            <label class="min-width-100-fix" for="address_3">{{ \auth::user()->userInformation()->get()->first()->address_3 }}</label>
                                                        </div>
                                                    @endif
                                                </li>
                                                <span class="btn btn-soft-primary font-weight-bolder d-none newAddress mt-3"><i class="fa fa-plus mr-2"></i> اضافه کردن آدرس
                                          </span>
                                                <li class="col-lg-12 address_input d-none">
                                                    <textarea class="form-control mt-3" name="new_address" id="" cols="90" rows="5" placeholder="در صورت تمایل به ارسال به آدرس جدید لطفا آدرس مورد نظر را در کادر زیر وارد کنید"></textarea>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="payment-title font-weight-bolder">مبلغ قابل پرداخت :</td>
                                        <td class="text-dark font-weight-bolder"> @if(isset($discountedPrice)){{ number_format($discountedPrice) }}@elseif($product->off_price != null){{ number_format($product->off_price)}} @else {{ number_format($product->price) }} @endif</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                @endif
                <!--end /div-->
            </div>
            <div class="d-lg-flex col-lg-12 justify-content-end">
                <div class="mt-4">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success mt-4">ثبت فاکتور</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
    <!--end row-->
    <!--end row-->
    <!--end row-->
</div>
<!--end card-body-->
</div>
<!--end card-->
</div>
<!--end col-->
<!--end footer-->
</div>
<!--end row-->
</div>
<!-- container -->
<footer class="footer text-center text-sm-left pt-0">&copy; ۱۳۹۸ - کلیه حقوق محفوظ است. <span class="text-muted d-none d-sm-inline-block float-right">طراحی و توسعه در دپارتمان فناوری اطلاعات شرکت فناور ستاره نوران</span></footer>
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
<script>
    $(document).ready(function() {
        $(".showAddresses").click(function() {
            $(".address_1").removeClass("d-none");
            $(".address_2").removeClass("d-none");
            $(".address_3").removeClass("d-none");
            $(".newAddress").removeClass("d-none");
            $(".showAddresses").addClass("d-none");
            $(".address_input").addClass("d-none");
        });
    });
    $(document).ready(function() {
        $(".newAddress").click(function() {
            $(".address_input").removeClass("d-none");
            $(".newAddress").addClass("d-none");
            $(".address_1").addClass("d-none");
            $(".address_2").addClass("d-none");
            $(".address_3").addClass("d-none");
            $(".showAddresses").removeClass("d-none");

        });
    });

</script>
@include('sweet::alert')
@yield('pageScripts')
</body>
</html>
