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

    body{
      margin: auto;
      font-size: 16px;
    font-weight: 500;    }

    th, td {
      font-family: iranyekan !important;
    }
.tt-table-shop-01 thead th{
  font-size: 18px!important;
}
.btn {
  font-size: 16px!important;
}
    </style>
    @toastr_css
</head>

<body class="p-5">
    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="tt-title-subpages noborder">حساب کاربری</h1>
                <div class="tt-shopping-layout">
                    <div class="tt-wrapper">
                        <h3 class="tt-title">سوابق سفارشات</h3>
                        <div class="tt-table-responsive">
                            <table class="tt-table-shop-01">
                                <thead>
                                    <tr>
                                        <th class="iranyekan">سفارش</th>
                                        <th>نوع پرداخت</th>
                                        <th>وضعیت سفارش</th>
                                        <th>مبلغ کل</th>
                                        <th>تاریخ ثبت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @php
                                    $id = 1;
                                  @endphp
                                  @foreach ($purchases as $purchase)
                                    <tr>
                                        <td class="byekan"><a href="{{ route('user.purchased.list.show', $purchase->id) }}">{{ $id }}</a></td>
                                        <td>{{ $purchase->payment_method == "online_payment" ? "پرداخت آنلاین" : "پرداخت نقدی ( حضوری )" }}</td>
                                        <td>{{ $purchase->status == 0 ? "انجام نشده" : "تکمیل شده" }}</td>
                                        <td>{{ number_format($purchase->total_price) }} تومان</td>
                                        <td>{{ jdate($purchase->created_at) }}</td>
                                        <td>
                                          <a href="{{ route('user.purchased.list.show', $purchase->id) }}" class="btn text-white rounded byekan m-1">مشاهده سفارش</a>
                                          <a href="{{ route('user.purchased.list.show.invoice', $purchase->id) }}" class="btn text-white rounded byekan m-1" style="  padding: 20px 37px!important;background-color: #28a745;background-image: linear-gradient(-180deg,#34d058,#28a745 90%);">فاکتور سفارش</a>
                                        </td>
                                    </tr>
                                    @php
                                      $id ++
                                    @endphp
                                  @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tt-wrapper">
                        <h3 class="tt-title">اطلاعات حساب</h3>
                        <div class="tt-table-responsive">
                            <table class="tt-table-shop-02">
                                <tbody>
                                    <tr>
                                        <td>نام:</td>
                                        <td>{{ \auth::user()->firstName .' '. \auth::user()->lastName }}</td>
                                    </tr>
                                    <tr>
                                        <td>ایمیل:</td>
                                        <td>{{ \auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>شماره:</td>
                                        <td>{{ \auth::user()->mobile }}</td>
                                    </tr>
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
