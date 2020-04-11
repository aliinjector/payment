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
            <h4 class="mt-0 header-title">{{ __('dashboard-shop-dashboard-shop.mahsoolateMahboob') }}</h4>
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
               <h4 class="mt-0 header-title">{{ __('dashboard-shop-dashboard-shop.mahsoolateMahboob') }}</h4>
               <div id="carousel_2" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     @php $i=0 @endphp
                     @foreach($bestSellings as $bestSelling)
                        <div class="carousel-item {{ $i==0 ? 'active' : '' }}">
                           <div class="media row justify-content-center">
                             <div class="row justify-content-center">
                               <img src="{{ asset($bestSelling->image['400,400'] ? $bestSelling->image['400,400'] : '/images/no-image.png') }}"  height="170" width="190" class="mr-2 mt-5" alt="...">
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

   <!--end col-->
</div>



<!--end row-->
<div style="" class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-body order-list">
            <h4 class="header-title mt-0 mb-3">لیست سفارشات</h4>
            <div class="table-responsive">
               <table class="table table-hover mb-0">
                  <thead class="thead-light">
                     <tr>
                        <th class="border-top-0">Product</th>
                        <th class="border-top-0">Pro Name</th>
                        <th class="border-top-0">Country</th>
                        <th class="border-top-0">Order Date/Time</th>
                        <th class="border-top-0">Pcs.</th>
                        <th class="border-top-0">Amount ($)</th>
                        <th class="border-top-0">Status</th>
                     </tr>
                     <!--end tr-->
                  </thead>
                  <tbody>
                     <tr>
                        <td><img class="" src="/dashboard/assets/images/products/img-1.png" alt="user"></td>
                        <td>Beg</td>
                        <td><img src="/dashboard/assets/images/flags/us_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                        <td>3/03/2019 4:29 PM</td>
                        <td>200</td>
                        <td>$750</td>
                        <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                     </tr>
                     <!--end tr-->
                     <tr>
                        <td><img class="" src="/dashboard/assets/images/products/img-2.png" alt="user"></td>
                        <td>Watch</td>
                        <td><img src="/dashboard/assets/images/flags/french_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                        <td>13/03/2019 1:09 PM</td>
                        <td>180</td>
                        <td>$970</td>
                        <td><span class="badge badge-boxed badge-soft-danger">Delivered</span></td>
                     </tr>
                     <!--end tr-->
                     <tr>
                        <td><img class="" src="/dashboard/assets/images/products/img-3.png" alt="user"></td>
                        <td>Headphone</td>
                        <td><img src="/dashboard/assets/images/flags/spain_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                        <td>22/03/2019 12:09 PM</td>
                        <td>30</td>
                        <td>$2800</td>
                        <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                     </tr>
                     <!--end tr-->
                     <tr>
                        <td><img class="" src="/dashboard/assets/images/products/img-4.png" alt="user"></td>
                        <td>Purse</td>
                        <td><img src="/dashboard/assets/images/flags/russia_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                        <td>14/03/2019 8:27 PM</td>
                        <td>100</td>
                        <td>$520</td>
                        <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                     </tr>
                     <!--end tr-->
                     <tr>
                        <td><img class="" src="/dashboard/assets/images/products/img-5.png" alt="user"></td>
                        <td>Shoe</td>
                        <td><img src="/dashboard/assets/images/flags/italy_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                        <td>18/03/2019 5:09 PM</td>
                        <td>100</td>
                        <td>$1150</td>
                        <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                     </tr>
                     <!--end tr-->
                     <tr>
                        <td><img class="" src="/dashboard/assets/images/products/img-6.png" alt="user"></td>
                        <td>Boll</td>
                        <td><img src="/dashboard/assets/images/flags/us_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle"></td>
                        <td>30/03/2019 4:29 PM</td>
                        <td>140</td>
                        <td>$ 650</td>
                        <td><span class="badge badge-boxed badge-soft-success">Shipped</span></td>
                     </tr>
                     <!--end tr-->
                  </tbody>
               </table>
               <!--end table-->
            </div>
            <!--end /div-->
         </div>
         <!--end card-body-->
      </div>
      <!--end card-->
   </div>
   <!--end col-->
</div>


@endsection
@section('pageScripts')
   <script src="/dashboard/assets/highcharts/highcharts.js"></script>
   <script src="/dashboard/assets/highcharts/series-label.js"></script>
   <script src="/dashboard/assets/highcharts/exporting.js"></script>
   <script src="/dashboard/assets/highcharts/export-data.js"></script>
   <script src="/dashboard/assets/highcharts/funnel.js"></script>
   <script src="/dashboard/assets/highcharts/accessibility.js"></script>

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
