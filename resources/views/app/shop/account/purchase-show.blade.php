<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ __('app-shop-2-layouts-master.pageTitle') }}</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="/app/shop/2/css/style.css">
    <link href="/app/shop/2/font/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/app/shop/2/css/pagination.css" rel="stylesheet">
    <link rel="stylesheet" href="/app/shop/1/assets/css/jquery-ui.css" />
    <script src="/app/shop/1/assets/js/jquery.min.js"></script>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    @yield('headerScripts')
    <link rel="stylesheet" href="{{ asset('/app/shop/2/css/master.css') }}" />
    <style media="screen">
    .tt-table-shop-03 tr td:nth-child(1), .tt-table-shop-03 tr th:nth-child(1) {
       width: auto!important;
      }
      .tt-table-shop-03 tr td:not(:nth-child(1)), .tt-table-shop-03 tr th:not(:nth-child(1)){
        width: auto!important;

      }
    body{
      margin: auto;
      font-size: 16px;
      font-weight: bolder;
    }
    </style>
    @toastr_css
</head>

<body class="p-5">

    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="tt-title-subpages noborder">سفارش شما</h1>
                <div class="tt-shopping-layout">
                    <a href="{{ route('user.purchased.list') }}" class="tt-link-back"><i class="icon-e-20"></i>بازگشت به صفحه لیست سفارشات</a>
                    <div class="tt-data">{{ jdate($purchase->created_at) }}</div>
                    <div class="tt-wrapper">
                        <div class="tt-table-responsive">
                            <table class="tt-table-shop-03">
                                <thead>
                                    <tr>
                                        <th>نام محصول</th>
                                        <th>قیمت</th>
                                        <th>تعداد</th>
                                        <th>رنگ</th>
                                        <th>روش پرداخت</th>
                                        <th>روش ارسال</th>
                                        <th>هزینه ارسال</th>
                                        <th>قیمت جمع کالا</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->products()->get() as $product)

                                    <tr>
                                        <td><a href="{{ route('product', ['shop'=>$purchase->shop->english_name, 'id'=>$product->id]) }}">{{ $product->title }}</a></td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>{{ $purchase->cart()->withTrashed()->where('user_id' , $purchase->user->id)->where('status' , 1)->get()->first()->cartProduct->where('product_id' , $product->id)->first()->quantity }}</td>
                                        @if($purchase->cart()->withTrashed()->where('user_id' , $purchase->user->id)->where('status' , 1)->get()->first()->cartProduct->where('product_id' , $product->id)->first()->color)
                                        <td>{{ $purchase->cart()->withTrashed()->where('user_id' , $purchase->user->id)->where('status' , 1)->get()->first()->cartProduct->where('product_id' , $product->id)->first()->color->name }}</td>
                                        @else
                                          <td></td>
                                      @endif
                                      <td><span>
                                              {{ $purchase->payment_method == "online_payment" ? "پرداخت آنلاین" : "پرداخت نقدی ( حضوری )" }}
                                          </span></td>
                                      <td><span>
                                            @if($purchase->shipping =="quick_way")
                                              ارسال سریع
                                            @elseif($purchase->shipping =="posting_way")
                                              ارسال پستی
                                            @else
                                              دریافت حضوری
                                            @endif
                                          </span></td>
                                        <td>{{ number_format($purchase->total_price -  $purchase->cart()->withTrashed()->where('user_id' , $purchase->user->id)->where('status' , 1)->get()->first()->cartProduct->where('product_id' , $product->id)->first()->total_price)}}</td>
                                        <td>{{ number_format($purchase->shipping_price) }}

                                        </td>
                                        <td>
                                          @if($product->type == 'file')
                                              <div class="icon-show row">
                                                  <a href="{{ route('file-download', ['shop'=>$product->shop()->first()->english_name, 'id'=>$product->id, 'purchaseId'=>$purchase->id]) }}" id="downloadFile"><i class="fa fa-download text-success mr-1 button font-18 ml-5 p-3 "></i>
                                                  </a>
                                                  <form action="{{ route('downloadLinkRequest',['product_id'=>$product->id, 'user_purchase_id' => $purchase->id]) }}" method="post">
                                                      @csrf
                                                  <button class="btn btn-primary">
                                                    درخواست لینک دانلود جدید
                                                  </button>
                                                    </form>
                                              </div>
                                              @else

                                              @endif
                                        </td>

                                    </tr>
                                  @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
  <link rel="stylesheet" href="/app/shop/2/css/rtl.css">
  <link rel="stylesheet" href="/app/shop/2/css/custom.css">
  @toastr_js
  @toastr_render
  @include('sweet::alert')
  @yield('footerScripts')
  <script src="{{url('stats/script.js')}}"></script>
  </html>
