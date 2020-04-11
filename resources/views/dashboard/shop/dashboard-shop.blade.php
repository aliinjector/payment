@extends('dashboard.layouts.master')
<style>
   .highcharts-figure, .highcharts-data-table table {
      min-width: 360px;
      max-width: 800px;
      margin: 1em auto;
   }

   .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #EBEBEB;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
   }
   .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
   }
   .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
   }
   .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
      padding: 0.5em;
   }
   .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
   }
   .highcharts-data-table tr:hover {
      background: #f1f7ff;
   }

</style>
@section('content')
<div class="row">
  @include('dashboard.layouts.errors')

   <div class="col-sm-12">
      <div class="page-title-box">
         <div class="float-right">
            <ol style="direction: ltr" class="breadcrumb">
               <li class="breadcrumb-item active">{{ __('dashboard-shop-dashboard-shop.leftCurrentPage') }}</li>
            </ol>
         </div>
         <h4 class="page-title">{{ __('dashboard-shop-dashboard-shop.pageTitle') }}</h4>
      </div>
      <!--end page-title-box-->
   </div>
   <!--end col-->
</div>
<!--end row-->
<!-- end page title end breadcrumb -->
<div class="row">
   <div class="col-lg-4">
      <div class="card card-eco">
         <a href="{{ route('product-list.index') }}">
         <div class="card-body">
            <h4 class="title-text mt-0">{{ __('dashboard-shop-dashboard-shop.box1') }}</h4>
            <div class="d-flex justify-content-between">
               <h3 class="font-weight-bold byekan">{{ number_format($shop->products()->get()->count()) }}</h3>
               <i class="fa fa-cubes card-eco-icon text-pink align-self-center"></i>
            </div>
         </div>
         </a>
         <!--end card-body-->
      </div>
      <!--end card-->
   </div>
   <!--end col-->
   <div class="col-lg-4">
      <div class="card card-eco">
         <a href="{{ route('purchases.index') }}">
            <div class="card-body">
               <h4 class="title-text mt-0">{{ __('dashboard-shop-dashboard-shop.box2') }}</h4>
               <div class="d-flex justify-content-between">
                  <h3 class="font-weight-bold byekan">{{ number_format($shop->purchases()->get()->count()) }}</h3>
                  <i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i>
               </div>
            </div>
         </a>
         <!--end card-body-->
      </div>
      <!--end card-->
   </div>
   <!--end col-->
   <!--end col-->
   <div class="col-lg-4">
        <a href="{{ route('purchases.index') }}" target="_blank">
      <div class="card card-eco">
         <div class="card-body">
            <h4 class="title-text mt-0"></h4>

            {{ __('dashboard-shop-dashboard-shop.box3') }} </h4>
            <div class="d-flex justify-content-between">
                 <h3 class="font-weight-bold byekan">{{ number_format($sumPurchasesPrice) }} تومان</h3>
               <i class="dripicons-wallet card-eco-icon text-success align-self-center"></i>
            </div>
         </div>
         <!--end card-body-->
      </div>
    </a>

      <!--end card-->
   </div>
   <!--end col-->
</div>
<!--end row-->
<div class="row">
   <div class="col-lg-8">
      <div class="card">
         <div class="card-body" style="position: relative;">
               <div style="font-family: BYekan!important;" id="foroosh"></div>

         </div>
         <!--end card-body-->
      </div>
      <!--end card-->
   </div>
   <!--end col-->

   <div class="col-lg-4">
      <div class="card carousel-bg-img" style="height: 440px;">
         <div class="card-body dash-info-carousel">
            <h4 class="mt-0 header-title">پرفروش ترین  ها</h4>
            <div id="carousel_2" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  @php $i=0 @endphp
                  @foreach($bestSellings as $bestSelling)
                     <div class="carousel-item {{ $i==0 ? 'active' : '' }}">
                        <div class="media row justify-content-center">
                          <div class="row justify-content-center">
                            <img src="{{ asset($bestSelling->image['400,400'] ? $bestSelling->image['400,400'] : '/images/no-image.png') }}"  height="170" width="190" class="mr-2" alt="...">
                          </div>
                        </div>
                        <div class="row">
                          <div class="media-body align-self-center">
                            <div class="row justify-content-center mt-4">
                              <span class="badge badge-primary mb-2 byekan w-50 f-19">{{ $bestSelling->buyCount }} {{ __('dashboard-shop-dashboard-shop.mahsoolateMahboobForoosh') }}</span>
                            </div>
                            <div class="row justify-content-center mt-4">
                              <h4 class="mt-0">{{ $bestSelling->title }}</h4>
                            </div>
                          <div class="row justify-content-center">
                            <p class="text-muted mb-0">{{ number_format($bestSelling->price) }} {{ __('dashboard-shop-dashboard-shop.mahsoolateMahboobCurrency') }}</p>
                          </div>
                          </div>
                        </div>

                     </div>
                     @php $i++ @endphp
                  @endforeach
               </div>
               <a class="carousel-control-prev" href="#carousel_2" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a><a class="carousel-control-next" href="#carousel_2" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span></a>
            </div>
         </div>
         <!--end card-body-->
      </div>
      <!--end card-->
   </div>


   <!--end col-->
</div>
<!--end row-->



<div class="row">
   <div class="col-lg-8">
      <div class="card">
         <div class="card-body">
            <h4 class="header-title mt-0">قیف فروش</h4>

            <div style="font-family: BYekan!important;" id="funnel"></div>

            <!--end row-->
         </div>
         <!--end card-body-->
      </div>
      <!--end card-->
   </div>
   <!--end col-->



      <div class="col-lg-4">
         <div class="card carousel-bg-img" style="height: 469px;">
            <div class="card-body dash-info-carousel">
               <h4 class="mt-0 header-title">پربازدید ترین ها</h4>
               <div id="carousel_3" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     @php $i=0 @endphp
                     @foreach($bestViews as $bestView)
                        <div class="carousel-item {{ $i==0 ? 'active' : '' }}">
                           <div class="media row justify-content-center">
                             <div class="row justify-content-center">
                               <img src="{{ asset($bestView->image['400,400'] ? $bestView->image['400,400'] : '/images/no-image.png') }}"  height="170" width="190" class="mr-2 mt-5" alt="...">
                             </div>
                           </div>
                           <div class="row">
                             <div class="media-body align-self-center">
                               <div class="row justify-content-center mt-4">
                                 <span class="badge badge-primary mb-2 byekan w-50 f-19">{{ $bestView->buyCount }} {{ __('dashboard-shop-dashboard-shop.mahsoolateMahboobForoosh') }}</span>
                               </div>
                               <div class="row justify-content-center mt-4">
                                 <h4 class="mt-0">{{ $bestView->title }}</h4>
                               </div>
                             <div class="row justify-content-center">
                               <p class="text-muted mb-0">{{ number_format($bestView->price) }} {{ __('dashboard-shop-dashboard-shop.mahsoolateMahboobCurrency') }}</p>
                             </div>
                             </div>
                           </div>

                        </div>
                        @php $i++ @endphp
                     @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carousel_3" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a><a class="carousel-control-next" href="#carousel_3" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span></a>
               </div>
            </div>
            <!--end card-body-->
         </div>
         <!--end card-->
      </div>
   <!--end col-->

   <!--end col-->
</div>

@foreach($lastPurchases as $purchase)
<div class="modal fade bd-example-modal-xl" id="ShowAddressModal{{ $purchase->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اطلاعات خریدار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-scroll" style="background-color:#fbfcfd">

                    <div class="form-group mb-0">
                        <div class="input-group mt-3">
                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                               class="fas fa-star required-star mr-1"></i>نام و نام خانوادگی:</span></div>
                            <input type="text" class="form-control inputfield" name="name" value="{{ $purchase->user->firstName . ' ' . $purchase->user->lastName }}" readonly>
                        </div>

                    </div>
                    <div class="form-group mb-0">
                        <div class="input-group mt-3">
                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                               class="fas fa-star required-star mr-1"></i>تلفن :</span></div>
                            <input type="text" class="form-control inputfield" name="name" value="{{ $purchase->user->mobile }}" readonly>
                        </div>

                    </div>
                    <div class="form-group mb-0">
                        <div class="input-group mt-3">
                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                               class="fas fa-star required-star mr-1"></i>استان :</span></div>
                            <input type="text" class="form-control inputfield" name="name" value="{{ $purchase->address()->withTrashed()->get()->first()->province }}" readonly>
                        </div>

                    </div>
                    <div class="form-group mb-0">
                        <div class="input-group mt-3">
                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                               class="fas fa-star required-star mr-1"></i>شهر :</span></div>
                            <input type="text" class="form-control inputfield" name="name" value="{{ $purchase->address()->withTrashed()->get()->first()->city }}" readonly>
                        </div>

                    </div>
                    <div class="form-group mb-0">
                        <div class="input-group mt-3">
                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                               class="fas fa-star required-star mr-1"></i>کد پستی :</span></div>
                            <input type="text" class="form-control inputfield" name="name" value="{{ $purchase->address()->withTrashed()->get()->first()->zip_code }}" readonly>
                        </div>

                    </div>
                    <div class="form-group mb-0">
                        <div class="input-group mt-3">
                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                               class="fas fa-star required-star mr-1"></i>آدرس :</span></div>
                            <input type="text" class="form-control inputfield" name="name" value="{{ $purchase->address()->withTrashed()->get()->first()->address }}" readonly>
                        </div>

                    </div>
                    <!--end form-group-->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger rounded" data-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--end row-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">لیست سفارشات فروشگاه</h4>
                <p class="text-muted mb-4 font-13">در این بخش میتوانید لیست تمامی سفارشات فروشگاه خود را ملاحظه کنید </p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="searchBox bg-dark" style="margin-top: -15px;">
                                <input type="text" id="myInputTextField" class="searchInput">
                                <button class="searchButton" href="#">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                            <div class="table-responsive">

                                <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
                                    <thead style="text-align: center">
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">ردیف</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">نام</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">نام خانوادگی</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">روش پرداخت</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">روش ارسال</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">وضعیت سفارش</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">تاریخ ثبت سفارش</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center" class="iranyekan">
                                        @php
                                        $id = 1;
                                        @endphp
                                        @foreach($lastPurchases as $purchase)
                                        <tr role="row" class="odd icon-hover hover-color">
                                            <td>{{ $id }}</td>
                                            <td>{{ $purchase->user->firstName }}</td>
                                            <td>{{ $purchase->user->lastName }}</td>
                                            <td><span class="badge badge-pill badge-soft-primary font-15 font-weight-bolder p-3 show4">
                                                    {{ $purchase->payment_method == "online_payment" ? "پرداخت آنلاین" : "پرداخت نقدی ( حضوری )" }}
                                                </span></td>
                                                <td><span class="badge badge-pill badge-soft-primary font-15 font-weight-bolder p-3 show4">
                                              @if($purchase->shipping =="quick_way")
                                                ارسال سریع
                                              @elseif($purchase->shipping =="posting_way")
                                                ارسال پستی
                                              @elseif($purchase->shipping =="person_way")
                                                دریافت حضوری
                                              @else
                                                __
                                              @endif
                                            </span></td>
                                            <td> <span class="@if($purchase->status == 0) text-red @else text-green @endif">@if($purchase->status == 0) پرداخت نشده
                            @else پرداخت شده
                            @endif</span></td>

                                            <td>{{ jdate($purchase->created_at) }}</td>
                                            <td>
                                                <a href="{{ route('purchases.show', ['id' => $purchase->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('purchases.show', ['id' => $purchase->id]) }}" data-toggle="modal" data-target="#ShowAddressModal{{ $purchase->id }}">
                                                        <i class="dripicons-user-id"></i>
                                                </a>
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
                    </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>


@endsection
@section('pageScripts')
   <script src="/dashboard/assets/highcharts/highcharts.js"></script>
   <script src="/dashboard/assets/highcharts/series-label.js"></script>
   <script src="/dashboard/assets/highcharts/exporting.js"></script>
   <script src="/dashboard/assets/highcharts/export-data.js"></script>
   <script src="/dashboard/assets/highcharts/funnel.js"></script>
   <script src="/dashboard/assets/highcharts/accessibility.js"></script>
   <script src="{{ asset('/dashboard/assets/js/admin-users-index.js') }}"></script>


   <script>

      Highcharts.chart('foroosh', {
         chart: {
            type: 'line'
         },
         title: {
            text: 'نمودار وضعیت کلی فروشگاه'
         },

         xAxis: {
            categories: ["{{ \Morilog\Jalali\Jalalian::forge('now - 6 days')->format('%A، %d %B') }}", "{{ \Morilog\Jalali\Jalalian::forge('now - 5 days')->format('%A، %d %B') }}", "{{ \Morilog\Jalali\Jalalian::forge('now - 4 days')->format('%A، %d %B') }}", "{{ \Morilog\Jalali\Jalalian::forge('now - 3 days')->format('%A، %d %B') }}", "{{ \Morilog\Jalali\Jalalian::forge('now - 2 days')->format('%A، %d %B') }}", "{{ \Morilog\Jalali\Jalalian::forge('now - 1 days')->format('%A، %d %B') }}", "{{ \Morilog\Jalali\Jalalian::forge('today')->format('%A، %d %B') }}"]
         },

         yAxis: {
            title: {
               text: 'تعداد / مقدار'
            }
         },

         legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
         },



         plotOptions: {

            line: {
               dataLabels: {
                  enabled: true,
                  connectorAllowed: false
               },
            }
         },
         series: [{
            name: 'Visits',
            data: [ {{ $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 6 days')->format('%Y/%m/%d'))->first() ? $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 6 days')->format('%Y/%m/%d'))->first()->total : 0}} , {{ $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 5 days')->format('%Y/%m/%d'))->first() ? $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 5 days')->format('%Y/%m/%d'))->first()->total : 0 }}, {{ $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 4 days')->format('%Y/%m/%d'))->first() ? $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 4 days')->format('%Y/%m/%d'))->first()->total : 0 }}, {{ $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 3 days')->format('%Y/%m/%d'))->first() ? $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 3 days')->format('%Y/%m/%d'))->first()->total : 0 }}, {{ $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 2 days')->format('%Y/%m/%d'))->first() ? $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 2 days')->format('%Y/%m/%d'))->first()->total : 0 }}, {{ $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 1 days')->format('%Y/%m/%d'))->first() ? $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('now - 1 days')->format('%Y/%m/%d'))->first()->total : 0 }}, {{ $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('today')->format('%Y/%m/%d'))->first() ? $weeklyVisits->where('day', \Morilog\Jalali\Jalalian::forge('today')->format('%Y/%m/%d'))->first()->total : 0 }}]
         }, {
            name: 'Visitors',
            data: [ {{ $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 6 days')->format('%Y/%m/%d'))->first() ? $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 6 days')->format('%Y/%m/%d'))->first()->total : 0}} , {{ $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 5 days')->format('%Y/%m/%d'))->first() ? $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 5 days')->format('%Y/%m/%d'))->first()->total : 0 }}, {{ $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 4 days')->format('%Y/%m/%d'))->first() ? $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 4 days')->format('%Y/%m/%d'))->first()->total : 0 }}, {{ $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 3 days')->format('%Y/%m/%d'))->first() ? $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 3 days')->format('%Y/%m/%d'))->first()->total : 0 }}, {{ $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 2 days')->format('%Y/%m/%d'))->first() ? $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 2 days')->format('%Y/%m/%d'))->first()->total : 0 }}, {{ $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 1 days')->format('%Y/%m/%d'))->first() ? $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('now - 1 days')->format('%Y/%m/%d'))->first()->total : 0 }}, {{ $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('today')->format('%Y/%m/%d'))->first() ? $weeklyVisitors->where('day', \Morilog\Jalali\Jalalian::forge('today')->format('%Y/%m/%d'))->first()->total : 0 }}]
         }, {
            name: 'Purchuses',
            data: [ {{ $purchases->where('date', \Morilog\Jalali\Jalalian::forge('now - 6 days')->format('%Y/%m/%d'))->count() }} , {{ $purchases->where('date', \Morilog\Jalali\Jalalian::forge('now - 5 days')->format('%Y/%m/%d'))->count() }}, {{ $purchases->where('date', \Morilog\Jalali\Jalalian::forge('now - 4 days')->format('%Y/%m/%d'))->count()  }}, {{ $purchases->where('date', \Morilog\Jalali\Jalalian::forge('now - 3 days')->format('%Y/%m/%d'))->count()  }}, {{ $purchases->where('date', \Morilog\Jalali\Jalalian::forge('now - 2 days')->format('%Y/%m/%d'))->count()  }}, {{ $purchases->where('date', \Morilog\Jalali\Jalalian::forge('now - 1 days')->format('%Y/%m/%d'))->count()  }}, {{ $purchases->where('date', \Morilog\Jalali\Jalalian::forge('today')->format('%Y/%m/%d'))->count() }}]
         }],

         responsive: {
            rules: [{
               condition: {
                  maxWidth: 500
               },
               chartOptions: {
                  legend: {
                     layout: 'horizontal',
                     align: 'center',
                     verticalAlign: 'bottom'
                  }
               }
            }]
         }
      });









      Highcharts.chart('funnel', {
         chart: {
            type: 'funnel'
         },
         title: {
            text: 'قیف فروش'
         },
         plotOptions: {
            series: {
               dataLabels: {
                  enabled: true,
                  format: '\u202B' + '{point.name}: {point.y:f}', // \u202B is RLE char for RTL support
                  enabled: true,
                  y: -5, //Optional
                  style: {
                     fontSize: '13px',
                     fontFamily: 'tahoma',
                     textShadow: false, //bug fixed IE9 and EDGE
                  },
                  useHTML: true,
               },

               center: ['40%', '50%'],
               neckWidth: '30%',
               neckHeight: '25%',
               width: '80%'
            }
         },
         legend: {
            enabled: false
         },
         series: [{
            name: 'QTY',
            data: [
               ['بازدید کنندگان فروشگاه', {{ $visitorsCount }}],
               ['محصولات سفارش داده شده', {{ $purchasesSabtShode }}],
               ['محصولات خریداری شده', {{ $purchasesPardakhtShode }}],
            ]
         }],

         responsive: {
            rules: [{
               condition: {
                  maxWidth: 500
               },
               chartOptions: {
                  plotOptions: {
                     series: {
                        dataLabels: {
                           inside: true
                        },
                        center: ['50%', '50%'],
                        width: '100%'
                     }
                  }
               }
            }]
         }
      });


   </script>
@stop
