@extends('app.shop.account.layouts.master')
<style media="screen">
  h6{
  font-size: .8rem!important;
  }
  h5{
  font-size: 1rem!important;
  }
</style>

@section('content')

    <div id="tt-pageContent" class="d-flex justify-content-center">
        <div class="card col-lg-8 mb-5 mr-16 mt-5 col-md-8 col-sm-12 print-big">
          <div class="row justify-content-between">
              <div class="m-2 pt-4">تاریخ ثبت سفارش : {{ jdate($purchase->created_at) }} </div>
                @if($shop->invoice->logo == "enable")
              <img src="{{ asset($shop->logo['200,100']) ? $shop->logo['200,100'] : '' }}" class="logo-sm mr-2">
            @endif
            @if($shop->invoice->number == "enable")
              <div class="m-2 pt-4">شماره فاکتور :  {{ $shop->english_name . '_' . $shop->invoice->id  }} </div>
            @endif

          </div>
            @include('dashboard.layouts.errors')
            <div class="card-body invoice-head">
                <div class="row justify-content-around p-2 d-none printable">
                            @if($shop->invoice->date == "enable")
                                <div class="row">
                                    <b class="mx-1">تاریخ : </b> 1399/3/3
                                </div>
                                @endif
                </div>
                @if($shop->invoice->seller_info == "enable")
                    <div class="row border">
                        <h5 class="col-lg-12 d-flex justify-content-center bg-gray p-2 border">مشخصات فروشنده :</h5>
                        <div>
                            <div class="row">
                                <div class="items p-3">
                                    <b class="mx-1">نام فروشگاه :</b> <span class="mr-5">{{ $shop->name }}</span>
                                    @if($shop->invoice->tel == "enable")
                                        <b class="mx-1">تلفن فروشگاه :</b> <span class="mr-5">{{ $shop->shopContact->tel }}</span>
                                        @endif
                                        @if($shop->invoice->email == "enable")
                                            <b class="mx-1">ایمیل فروشگاه :</b> <span class="mr-5">{{ $shop->shopContact->shop_email }}</span>
                                            @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="items p-3">
                                    @if($shop->invoice->economic_code == "enable")
                                        <b class="mx-1">کد اقتصادی فروشگاه :</b> <span class="mr-5">{{ $shop->invoice->economic_code_number }}</span>
                                        @endif
                                        @if($shop->invoice->registration_number == "enable")
                                            <b class="mx-1">شماره ثبت فروشگاه :</b> <span class="mr-5">{{ $shop->invoice->registration_number‌_number }}</span>
                                            @endif
                                            @if($shop->invoice->address == "enable")
                                                <b class="mx-1">آدرس فروشگاه :</b> <span class="mr-5">{{ $shop->shopContact->address }}</span>
                                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($shop->invoice->custom_info == "enable")
                        <div class="row border mb-4 printable">
                            <h5 class="col-lg-12 d-flex justify-content-center bg-gray p-2 border">مشخصات خریدار :</h5>
                            <div>
                                <div class="row">
                                    <div class="items p-3">
                                        <b class="mx-1">نام و نام خانوادگی :</b>  <span class="mr-5">{{ $purchase->user->firstName . ' ' . $purchase->user->lastName }}</span>
                                        <b class="mx-1">شماره خریدار :</b> <span class="mr-5">{{ $purchase->user->mobile }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="items p-3">
                                        <b class="mx-1">آدرس خریدار :</b> <span class="mr-5">{{ $purchase->address->address }}</span>
                                        <b class="mx-1">ایمیل خریدار :</b> <span class="mr-5">{{ $purchase->user->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!--end row-->
            </div>
            <!--end card-body-->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="d-flex d-flex justify-content-between">
                            <h6 class="mb-0"><b>تاریخ نمایش فاکتور :</b> {{ jdate() }}</h6>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="table-responsive project-invoice">
                            <table class="table table-bordered mb-0 rounded">
                                <thead class="thead-light">
                                    <tr>
                                        <th>نام محصول</th>
                                        <th>قیمت</th>
                                        <th>تعداد</th>
                                        <th>رنگ</th>
                                        <th>خصوصیات</th>
                                        <th>قیمت مجموع</th>
                                    </tr>
                                    <!--end tr-->
                                </thead>
                                <tbody class="iranyekan font-14">
                                    @foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->cartProduct as $product)
                                    <tr>
                                        <td>
                                            <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->product()->withTrashed()->get()->first()->slug, 'id' => $product->product()->withTrashed()->get()->first()->id]) }}">
                                                <h5 class="mt-0 mb-1">{{ $product->product()->withTrashed()->get()->first()->title }}</h5>
                                            </a>
                                        </td>
                                        <td>{{ number_format($product->total_price / $product->quantity ) }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        @if($product->color)
                                            <td>{{ $product->color->name }}</td>
                                            @else
                                            <td></td>
                                            @endif
                                            @if ($product->specification != null)
                                            <td>
                                                @foreach($product->specification as $specificationId)
                                                    @foreach($specificationItems->where('id', $specificationId)->unique('id') as $specificationItem)
                                                        {{ $specificationItem->specification->name }} : {{ $specificationItem->name }} <br>
                                                        @endforeach
                                                        @endforeach
                                            </td>
                                            @else
                                            <td></td>
                                            @endif
                                            <td> {{ number_format($product->total_price - $purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->total_off_price) }} </td>
                                    </tr>
                                    @endforeach
                                    <!--end tr-->
                                    <!--end tr-->
                                    <tr class="bg-dark text-white">
                                        <th colspan="4" class="border-0">
                                            <div class="">
                                                <b> هزینه ارسال : </b>{{ number_format($purchase->shipping_price) }} تومان<br />
                                            </div>
                                            <div class="">
                                                <b> مبلغ تخفیف : </b>@if($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->total_off_price == null) 0  @else{{ $purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->total_off_price }} @endif تومان<br />
                                            </div>
                                            @if($shop->invoice->description_status == "enable")
                                                <div class="mt-3">
                                                    <b> توضیحات : </b>{{ $shop->invoice->description }}
                                                </div>
                                                @endif
                                                @if($shop->invoice->vat == "enable")
                                                    <div class="mt-3 byekan">
                                                        <b> درصد مالیات بر ارزش افزوده : </b>%9
                                                    </div>
                                                    @endif
                                        </th>
                                        <td class="border-0 font-14"><b>جمع کل</b></td>
                                        <td>
                                            {{ number_format($purchase->total_price + $purchase->shipping_price) }}
                                        </td>
                                    </tr>
                                    <!--end tr-->
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>

                        <!--end /div-->
                    </div>
                    @if($shop->invoice->sign == "enable")
                        <div class="col-12 justify-content-between mt-5 d-none printable">
                            <div class="">
                                محل امضای فروشنده
                            </div>
                            <div class="">
                                محل امضای مشتری
                            </div>
                        </div>
                        @endif

                        <div class="d-lg-flex col-lg-12 justify-content-end d-none-print">
                            <div class="mt-4">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <button onclick="print_invoice()" class="btn tt-btn-addtocart text-white mt-4 mr-2">چاپ فاکتور</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                </div>
            </div>
            @if($shop->invoice->motto == "enable")
                <div class="border justify-content-around p-2 row d-none printable">
                    {{ $shop->invoice->motto_text }}
                </div>
                @endif
                <!--end row-->
                <!--end row-->
                <!--end row-->
        </div>
    </div>

    <script src="{{ asset('/app/shop/2/js/purchase-list.js') }}"></script>
    <script src="{{ asset('/app/shop/2/js/shipping.js') }}"></script>
    <link rel="stylesheet" href="/app/shop/2/css/rtl.css">
    <link rel="stylesheet" href="/app/shop/2/css/custom.css">
    @toastr_js
    @toastr_render
    @include('sweet::alert')
    @yield('footerScripts')
  @endsection
