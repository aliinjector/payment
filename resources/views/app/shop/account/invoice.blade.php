@extends('app.shop.2.layouts.master')
@section('headerScripts')
  <style>
.radio input{
  opacity: 1
}

.price{
  animation: bubble 2s forwards;

}
@keyframes bubble  {
  from {
    font-size: 24px;
  }
  to {
    font-size: 16px;

  }
}

  </style>
@endsection
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div id="tt-pageContent" class="d-flex justify-content-center">
   <div class="card col-lg-8 mb-5 mr-16 mt-5 col-md-8 col-sm-12 print-big">
      @include('dashboard.layouts.errors')
      <div class="card-body invoice-head">
         <div class="row justify-content-around p-2 d-none printable">
           @if($shop->invoice->logo == "enable")
            <img src="{{ $shop->logo['200,100'] }}" alt="logo-small" class="logo-sm mr-2" height="35">
          @endif
          @if($shop->invoice->number == "enable")
            <div class="row">
               <b class="mx-1">شماره : </b> 23443
            </div>
          @endif
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
                     <b class="mr-5">نام فروشگاه :</b> {{ $shop->name }}
                     @if($shop->invoice->tel == "enable")
                     <b class="mr-5">تلفن فروشگاه :</b> {{ $shop->shopContact->tel }}
                   @endif
                   @if($shop->invoice->email == "enable")
                     <b class="mr-5">ایمیل فروشگاه :</b> {{ $shop->shopContact->shop_email }}
                   @endif
                  </div>
               </div>
               <div class="row">
                  <div class="items p-3">
                    @if($shop->invoice->economic_code == "enable")
                     <b class="mr-5">کد اقتصادی فروشگاه :</b> {{ $shop->invoice->economic_code_number }}
                   @endif
                   @if($shop->invoice->registration_number == "enable")
                     <b class="mr-5">شماره ثبت فروشگاه :</b> {{ $shop->invoice->registration_number‌_number }}
                   @endif
                     @if($shop->invoice->address == "enable")
                     <b class="mr-5">آدرس فروشگاه :</b> {{ $shop->shopContact->address }}
                   @endif
                  </div>
               </div>
            </div>
         </div>
       @endif
         @if($shop->invoice->custom_info == "enable")
         <div class="row border mb-4 d-none printable">
            <h5 class="col-lg-12 d-flex justify-content-center bg-gray p-2 border">مشخصات خریدار :</h5>
            <div>
               <div class="row">
                  <div class="items p-3">
                     <b class="mx-3">نام و نام خانوادگی :</b> test
                     <b class="mx-3">شماره خریدار :</b> test
                  </div>
               </div>
               <div class="row">
                  <div class="items p-3">
                     <b class="mx-3">آدرس خریدار :</b> test
                     <b class="mx-3">ایمیل خریدار :</b> test
                  </div>
               </div>
            </div>
         </div>
       @endif
         <div class="row">
            <div class="col-md-4 align-self-center">
               <img src="{{ $shop->logo['200,100'] }}" alt="logo-small" class="logo-sm mr-2" height="26">
               <p class="mt-2 mb-0 text-muted">{{ $shop->description }}.</p>
            </div>
            <!--end col-->
            <div class="col-md-8">
               <ul class="list-inline mb-0 contact-detail float-right">
                  <li class="list-inline-item">
                     <div class="pr-3">
                        <i class="mdi mdi-web"></i>
                        <p class="text-muted mb-0">www.modirproje/{{ $shop->english_name }}.com</p>
                        <p class="text-muted mb-0"><br></p>
                     </div>
                  </li>
                  <li class="list-inline-item">
                     <div class="pr-3">
                        <i class="mdi mdi-phone"></i>
                        <p class="text-muted mb-0">{{ $shop->shopContact->tel }}</p>
                        <p class="text-muted mb-0">{{ $shop->shopContact->phone }}</p>
                     </div>
                  </li>
                  <li class="list-inline-item">
                     <div class="pr-3">
                        <i class="mdi mdi-map-marker"></i>
                        <p class="text-muted mb-0">{{ $shop->shopContact->city }} {{ $shop->shopContact->province }}</p>
                        <p class="text-muted mb-0">{{ $shop->shopContact->address }}</p>
                     </div>
                  </li>
               </ul>
            </div>
            <!--end col-->
         </div>
         <!--end row-->
      </div>
      <!--end card-body-->
      <div class="card-body">
         <div class="row">
            <div class="col-md-12 mb-3">
               <div class="d-flex d-flex justify-content-between">
                  <h6 class="mb-0"><b>تاریخ ثبت فاکتور :</b> {{ jdate() }}</h6>
               </div>
            </div>
            <!--end col-->
         </div>
         <!--end row-->
         <div class="row">
            <div class="col-lg-12">
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
                              <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}">
                                 <h5 class="mt-0 mb-1">{{ $product->product->title }}</h5>
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
                           {{ $specificationItem->specification->name }} :  {{ $specificationItem->name }} <br>
                           @endforeach
                         @endforeach
                       </td>
                     @else
                       <td></td>
                       @endif
                           <td> {{ number_format($product->total_price) }} </td>
                        </tr>
                        @endforeach
                        <!--end tr-->
                        <!--end tr-->
                        <tr class="bg-dark text-white">
                           <th colspan="4" class="border-0">
                              <div class="">
                                 <b> هزینه ارسال : </b>{{ number_format($purchase->shipping_price) }} تومان<br />
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
                             {{ number_format($purchase->total_price) }}
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
@endsection
@section('footerScripts')
  <script src="{{ asset('/app/shop/2/js/purchase-list.js') }}"></script>
  <script src="{{ asset('/app/shop/2/js/shipping.js') }}"></script>

@endsection
