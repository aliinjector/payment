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
    <link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    font-weight: 500;    }
    th, td,a {
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
      <div class="row justify-content-end">
      @if(\auth::user()->type == 'customer')
        <a href="{{ url('/'.$shop_name) }}">
          <button type="button" class="border-0 btn-warning p-2 rounded" style="
                font-size: 19px;
                padding-bottom: 7px!important;
                padding-top: 9px!important;
            ">
                    بازشگت به فروشگاه
                </button>
      </a>
    @else
      <a href="{{ route('dashboard.index') }}">
        <button type="button" class="border-0 btn-warning p-2 rounded" style="
              font-size: 19px;
              padding-bottom: 7px!important;
              padding-top: 9px!important;
          ">
                پنل مدیریت
              </button>
    </a>
    @endif
      <a href="{{ route('logout') }}">
        <button type="button" class="border-0 btn-danger mr-3 p-1 px-3 rounded" style="
              font-size: 18px;
          ">
                خروج از حساب<i class="fa fa-arrow-circle-left m-2"></i>
            </button>
    </a>
    </div>
        <div class="container-indent">
            <div class="">
                <h1 class="tt-title-subpages noborder">سفارش شما</h1>
                <div class="tt-shopping-layout">
                    <a href="{{ route('user.purchased.list') }}" class="tt-link-back"><i class="icon-e-20"></i>بازگشت به صفحه لیست سفارشات</a>
                    <div class="tt-data mb-3">{{ jdate($purchase->created_at) }}</div>
                </div>
            </div>
            <div class="table-responsive">

            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
              aria-describedby="datatable_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شناسه
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نام محصول
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">قیمت
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">تعداد
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">رنگ
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">خصوصیات
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">روش پرداخت
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">روش ارسال
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">هزینه ارسال
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">قیمت جمع کالا
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">عملیات
                        </th>
                    </tr>
                </thead>
                <tbody class="iranyekan">
                  @php
                    $id = 1;
                  @endphp

                  @foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->cartProduct as $product)

                    <tr role="row" class="odd">
                      <td>{{ $id }}</td>
                        <td><a href="{{ route('product', ['shop'=>$purchase->shop->english_name, 'id'=>$product->product()->withTrashed()->get()->first()->slug]) }}">{{ $product->product()->withTrashed()->get()->first()->title }}</a></td>
                        <td>{{ number_format($product->total_price / $product->quantity ) }}</td>
                        <td>{{ $product->quantity }}</td>
                        @if($product->color)
                        <td>{{ $product->color->name }}</td>
                        @else
                          <td>-</td>
                      @endif
                      @if ($product->specification != null)
                        <td>
                      @foreach($product->specification as $specificationId)
                        @foreach($specificationItems->where('id', $specificationId)->unique('id') as $specificationItem)
                        {{ $specificationItem->specification->name }} :  {{ $specificationItem->name }} <br>
                        @endforeach
                      @endforeach
                    </td>
                  @else
                    <td>-</td>
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
                        <td>
                          {{ number_format($purchase->shipping_price) }}
                        </td>
                          <td>{{ number_format($product->total_price + $product->specification_price)}}</td>
                        <td>
                          @if($product->product()->withTrashed()->get()->first()->type == 'file')
                              <div class="icon-show row">
                                  <a href="{{ route('file-download', ['shop'=>$product->product()->withTrashed()->get()->first()->shop()->first()->english_name, 'id'=>$product->product()->withTrashed()->get()->first()->id, 'purchaseId'=>$purchase->id]) }}" id="downloadFile"><i class="fa fa-download text-success p-3 button font-18 "></i>
                                  </a>
                                  <form action="{{ route('downloadLinkRequest',['product_id'=>$product->product()->withTrashed()->get()->first()->id, 'user_purchase_id' => $purchase->id]) }}" method="post">
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
                    @php
                      $id ++
                    @endphp
                </tbody>
            </table>
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
  <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
  <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
  </html>
