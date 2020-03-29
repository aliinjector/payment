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
         <a href="{{ route('purchase.status') }}">
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
            <div id="crm_dash_2" class="apex-charts" style="min-height: 380px;">
               <div id="foroosh"></div>
            </div>
            <div class="resize-triggers">
               <div class="expand-trigger">
                  <div style="width: 1027px; height: 406px;"></div>
               </div>
               <div class="contract-trigger"></div>
            </div>
         </div>
         <!--end card-body-->
      </div>
      <!--end card-->
   </div>
   <!--end col-->
   <div class="col-lg-4">
      <div class="card">
         <div class="card-body">
            <h4 class="header-title mt-0">{{ __('dashboard-shop-dashboard-shop.nemoodarMogheyatJoghrafiaee') }}</h4>
            <div id="world-map-markers" class="dashboard-map"></div>
            <div class="row">
               <div class="col-md-5">
                  <div class="mt-3">
                     <span class="text-info">{{ __('dashboard-shop-dashboard-shop.nemoodarMogheyatJoghrafiaeeItem1') }}</span> <small class="float-right text-muted ml-3 font-14">۸۱٪</small>
                     <div class="progress mt-2" style="height:3px;">
                        <div class="progress-bar bg-pink" role="progressbar" style="width: 81%; border-radius:5px;" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <div class="mt-3">
                     <span class="text-info">{{ __('dashboard-shop-dashboard-shop.nemoodarMogheyatJoghrafiaeeItem2') }}</span> <small class="float-right text-muted ml-3 font-14">۶۸٪</small>
                     <div class="progress mt-2" style="height:3px;">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 68%; border-radius:5px;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
               </div>
               <!--end col-->
               <div class="col-md-5 ml-auto">
                  <div class="mt-3">
                     <span class="text-info">{{ __('dashboard-shop-dashboard-shop.nemoodarMogheyatJoghrafiaeeItem3') }}</span> <small class="float-right text-muted ml-3 font-14">۴۸٪</small>
                     <div class="progress mt-2" style="height:3px;">
                        <div class="progress-bar bg-purple" role="progressbar" style="width: 48%; border-radius:5px;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
                  <div class="mt-3">
                     <span class="text-info">{{ __('dashboard-shop-dashboard-shop.nemoodarMogheyatJoghrafiaeeItem4') }}</span> <small class="float-right text-muted ml-3 font-14">۳۲٪</small>
                     <div class="progress mt-2" style="height:3px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 32%; border-radius:5px;" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
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
<!--end row-->
<div style="display: none" class="row">
   <div class="col-lg-4">
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-8 align-self-center">
                  <div>
                     <h4 class="mt-0 header-title">{{ __('dashboard-shop-dashboard-shop.nemoodarDaraamad') }}</h4>
                     <h2 class="mt-0 font-weight-bold">$57k</h2>
                     <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> Up From Last Month</p>
                  </div>
               </div>
               <!--end col-->
               <div class="col-4 align-self-center">
                  <div class="icon-info text-right"><i class="dripicons-wallet bg-soft-info"></i></div>
               </div>
               <!--end col-->
            </div>
            <!--end row-->
         </div>
         <!--end card-body-->
         <div class="card-body overflow-hidden p-0">
            <div class="d-flex mb-0 h-100 dash-info-box">
               <div class="w-100">
                  <div class="apexchart-wrapper">
                     <div id="eco_dash_2" class="chart-gutters"></div>
                  </div>
               </div>
            </div>
         </div>
         <!--end card-body-->
      </div>
      <!--end card-->
   </div>
   <!--end col-->
   <div class="col-lg-4">
      <div class="card">
         <div class="card-body">
            <h4 class="mt-0 header-title mb-3">New Customers</h4>
            <div class="row">
               <div class="col-8">
                  <div class="align-self-center">
                     <div id="re_customers" class="apex-charts mb-n4"></div>
                  </div>
               </div>
               <!--end col-->
               <div class="col-4 align-self-center">
                  <div class="re-customers-detail">
                     <h3 class="mb-0">21,546</h3>
                     <p class="text-muted"><i class="mdi mdi-circle text-info mr-1"></i>New Customers</p>
                  </div>
                  <div class="re-customers-detail">
                     <h3 class="mb-0">1535</h3>
                     <p class="text-muted"><i class="mdi mdi-circle text-light mr-1"></i>Repeated</p>
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
   <!--end col-->
</div>
<!--end row-->
<div style="display: none" class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-body order-list">
            <h4 class="header-title mt-0 mb-3">Order List</h4>
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
<div class="row">
   <div class="col-lg-4">
      <div class="card" style="height: 300px;">
         <div class="card-body">
            <div class="row">
               <div class="col-8 align-self-center">
                  <div class="">
                     <h4 class="mt-0 header-title">{{ __('dashboard-shop-dashboard-shop.nemoodarDaraamad') }}</h4>
                     <h2 class="mt-0 font-weight-bold">1 {{ __('dashboard-shop-dashboard-shop.nemoodarDaraamadCurrency') }} </h2>
                     <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> {{ __('dashboard-shop-dashboard-shop.nemoodarDaraamadRate') }}</p>
                  </div>
               </div>
               <!--end col-->
               <div class="col-4 align-self-center">
                  <div class="icon-info text-right"><i class="far fa-money-bill-alt bg-soft-info"></i></div>
               </div>
               <!--end col-->
            </div>
            <!--end row-->
         </div>
         <!--end card-body-->
         <div class="card-body overflow-hidden p-0">
            <div class="d-flex mb-0 h-100 dash-info-box">
               <div class="w-100">
                  <div class="apexchart-wrapper" style="position: relative;">
                     <div id="eco_dash_2" class="chart-gutters" style="min-height: 135px;">
                        <div id="apexchartsf1blzh83j" class="apexcharts-canvas apexchartsf1blzh83j light" style="width: 501px; height: 135px;">
                           <svg id="SvgjsSvg1811" width="501" height="135" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                              <g id="SvgjsG1813" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                                 <defs id="SvgjsDefs1812">
                                    <clipPath id="gridRectMaskf1blzh83j">
                                       <rect id="SvgjsRect1816" width="503" height="137" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                    </clipPath>
                                    <clipPath id="gridRectMarkerMaskf1blzh83j">
                                       <rect id="SvgjsRect1817" width="541" height="175" x="-20" y="-20" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                    </clipPath>
                                 </defs>
                                 <g id="SvgjsG1853" class="apexcharts-xaxis" transform="translate(0, 0)">
                                    <g id="SvgjsG1854" class="apexcharts-xaxis-texts-g" transform="translate(0, 1.875)"></g>
                                 </g>
                                 <g id="SvgjsG1857" class="apexcharts-grid">
                                    <line id="SvgjsLine1859" x1="0" y1="135" x2="501" y2="135" stroke="transparent" stroke-dasharray="0"></line>
                                    <line id="SvgjsLine1858" x1="0" y1="1" x2="0" y2="135" stroke="transparent" stroke-dasharray="0"></line>
                                 </g>
                                 <g id="SvgjsG1819" class="apexcharts-bar-series apexcharts-plot-series">
                                    <g id="SvgjsG1820" class="apexcharts-series Revenue" rel="1" data:realIndex="0">
                                       <path id="apexcharts-bar-area-0" d="M 4.848387096774193 135L 4.848387096774193 79.36612903225806Q 7.080645161290322 78.13387096774193 9.312903225806451 79.36612903225806L 9.312903225806451 135L 3.848387096774193 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 4.848387096774193 135L 4.848387096774193 79.36612903225806Q 7.080645161290322 78.13387096774193 9.312903225806451 79.36612903225806L 9.312903225806451 135L 3.848387096774193 135" pathFrom="M 4.848387096774193 135L 4.848387096774193 135L 9.312903225806451 135L 9.312903225806451 135L 3.848387096774193 135" cy="78.75" cx="20.009677419354837" j="0" val="50" barHeight="56.25" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 21.009677419354837 135L 21.009677419354837 68.11612903225806Q 23.241935483870964 66.88387096774193 25.474193548387095 68.11612903225806L 25.474193548387095 135L 20.009677419354837 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 21.009677419354837 135L 21.009677419354837 68.11612903225806Q 23.241935483870964 66.88387096774193 25.474193548387095 68.11612903225806L 25.474193548387095 135L 20.009677419354837 135" pathFrom="M 21.009677419354837 135L 21.009677419354837 135L 25.474193548387095 135L 25.474193548387095 135L 20.009677419354837 135" cy="67.5" cx="36.170967741935485" j="1" val="60" barHeight="67.5" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 37.170967741935485 135L 37.170967741935485 56.866129032258065Q 39.403225806451616 55.633870967741935 41.63548387096774 56.866129032258065L 41.63548387096774 135L 36.170967741935485 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 37.170967741935485 135L 37.170967741935485 56.866129032258065Q 39.403225806451616 55.633870967741935 41.63548387096774 56.866129032258065L 41.63548387096774 135L 36.170967741935485 135" pathFrom="M 37.170967741935485 135L 37.170967741935485 135L 41.63548387096774 135L 41.63548387096774 135L 36.170967741935485 135" cy="56.25" cx="52.332258064516125" j="2" val="70" barHeight="78.75" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 53.332258064516125 135L 53.332258064516125 45.616129032258065Q 55.564516129032256 44.383870967741935 57.79677419354838 45.616129032258065L 57.79677419354838 135L 52.332258064516125 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 53.332258064516125 135L 53.332258064516125 45.616129032258065Q 55.564516129032256 44.383870967741935 57.79677419354838 45.616129032258065L 57.79677419354838 135L 52.332258064516125 135" pathFrom="M 53.332258064516125 135L 53.332258064516125 135L 57.79677419354838 135L 57.79677419354838 135L 52.332258064516125 135" cy="45" cx="68.49354838709677" j="3" val="80" barHeight="90" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 69.49354838709677 135L 69.49354838709677 34.366129032258065Q 71.7258064516129 33.133870967741935 73.95806451612903 34.366129032258065L 73.95806451612903 135L 68.49354838709677 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 69.49354838709677 135L 69.49354838709677 34.366129032258065Q 71.7258064516129 33.133870967741935 73.95806451612903 34.366129032258065L 73.95806451612903 135L 68.49354838709677 135" pathFrom="M 69.49354838709677 135L 69.49354838709677 135L 73.95806451612903 135L 73.95806451612903 135L 68.49354838709677 135" cy="33.75" cx="84.6548387096774" j="4" val="90" barHeight="101.25" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 85.6548387096774 135L 85.6548387096774 23.116129032258065Q 87.88709677419354 21.883870967741938 90.11935483870967 23.116129032258065L 90.11935483870967 135L 84.6548387096774 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 85.6548387096774 135L 85.6548387096774 23.116129032258065Q 87.88709677419354 21.883870967741938 90.11935483870967 23.116129032258065L 90.11935483870967 135L 84.6548387096774 135" pathFrom="M 85.6548387096774 135L 85.6548387096774 135L 90.11935483870967 135L 90.11935483870967 135L 84.6548387096774 135" cy="22.5" cx="100.81612903225805" j="5" val="100" barHeight="112.5" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 101.81612903225805 135L 101.81612903225805 28.741129032258065Q 104.04838709677418 27.508870967741938 106.28064516129031 28.741129032258065L 106.28064516129031 135L 100.81612903225805 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 101.81612903225805 135L 101.81612903225805 28.741129032258065Q 104.04838709677418 27.508870967741938 106.28064516129031 28.741129032258065L 106.28064516129031 135L 100.81612903225805 135" pathFrom="M 101.81612903225805 135L 101.81612903225805 135L 106.28064516129031 135L 106.28064516129031 135L 100.81612903225805 135" cy="28.125" cx="116.97741935483869" j="6" val="95" barHeight="106.875" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 117.97741935483869 135L 117.97741935483869 39.991129032258065Q 120.20967741935482 38.758870967741935 122.44193548387095 39.991129032258065L 122.44193548387095 135L 116.97741935483869 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 117.97741935483869 135L 117.97741935483869 39.991129032258065Q 120.20967741935482 38.758870967741935 122.44193548387095 39.991129032258065L 122.44193548387095 135L 116.97741935483869 135" pathFrom="M 117.97741935483869 135L 117.97741935483869 135L 122.44193548387095 135L 122.44193548387095 135L 116.97741935483869 135" cy="39.375" cx="133.13870967741934" j="7" val="85" barHeight="95.625" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 134.13870967741934 135L 134.13870967741934 51.241129032258065Q 136.37096774193546 50.008870967741935 138.6032258064516 51.241129032258065L 138.6032258064516 135L 133.13870967741934 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 134.13870967741934 135L 134.13870967741934 51.241129032258065Q 136.37096774193546 50.008870967741935 138.6032258064516 51.241129032258065L 138.6032258064516 135L 133.13870967741934 135" pathFrom="M 134.13870967741934 135L 134.13870967741934 135L 138.6032258064516 135L 138.6032258064516 135L 133.13870967741934 135" cy="50.625" cx="149.29999999999998" j="8" val="75" barHeight="84.375" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 150.29999999999998 135L 150.29999999999998 62.491129032258065Q 152.5322580645161 61.258870967741935 154.76451612903224 62.491129032258065L 154.76451612903224 135L 149.29999999999998 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 150.29999999999998 135L 150.29999999999998 62.491129032258065Q 152.5322580645161 61.258870967741935 154.76451612903224 62.491129032258065L 154.76451612903224 135L 149.29999999999998 135" pathFrom="M 150.29999999999998 135L 150.29999999999998 135L 154.76451612903224 135L 154.76451612903224 135L 149.29999999999998 135" cy="61.875" cx="165.46129032258062" j="9" val="65" barHeight="73.125" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 166.46129032258062 135L 166.46129032258062 73.74112903225806Q 168.69354838709674 72.50887096774193 170.92580645161289 73.74112903225806L 170.92580645161289 135L 165.46129032258062 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 166.46129032258062 135L 166.46129032258062 73.74112903225806Q 168.69354838709674 72.50887096774193 170.92580645161289 73.74112903225806L 170.92580645161289 135L 165.46129032258062 135" pathFrom="M 166.46129032258062 135L 166.46129032258062 135L 170.92580645161289 135L 170.92580645161289 135L 165.46129032258062 135" cy="73.125" cx="181.62258064516126" j="10" val="55" barHeight="61.875" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 182.62258064516126 135L 182.62258064516126 62.491129032258065Q 184.85483870967738 61.258870967741935 187.08709677419353 62.491129032258065L 187.08709677419353 135L 181.62258064516126 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 182.62258064516126 135L 182.62258064516126 62.491129032258065Q 184.85483870967738 61.258870967741935 187.08709677419353 62.491129032258065L 187.08709677419353 135L 181.62258064516126 135" pathFrom="M 182.62258064516126 135L 182.62258064516126 135L 187.08709677419353 135L 187.08709677419353 135L 181.62258064516126 135" cy="61.875" cx="197.7838709677419" j="11" val="65" barHeight="73.125" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 198.7838709677419 135L 198.7838709677419 51.241129032258065Q 201.01612903225802 50.008870967741935 203.24838709677417 51.241129032258065L 203.24838709677417 135L 197.7838709677419 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 198.7838709677419 135L 198.7838709677419 51.241129032258065Q 201.01612903225802 50.008870967741935 203.24838709677417 51.241129032258065L 203.24838709677417 135L 197.7838709677419 135" pathFrom="M 198.7838709677419 135L 198.7838709677419 135L 203.24838709677417 135L 203.24838709677417 135L 197.7838709677419 135" cy="50.625" cx="213.94516129032255" j="12" val="75" barHeight="84.375" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 214.94516129032255 135L 214.94516129032255 39.991129032258065Q 217.17741935483866 38.758870967741935 219.4096774193548 39.991129032258065L 219.4096774193548 135L 213.94516129032255 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 214.94516129032255 135L 214.94516129032255 39.991129032258065Q 217.17741935483866 38.758870967741935 219.4096774193548 39.991129032258065L 219.4096774193548 135L 213.94516129032255 135" pathFrom="M 214.94516129032255 135L 214.94516129032255 135L 219.4096774193548 135L 219.4096774193548 135L 213.94516129032255 135" cy="39.375" cx="230.1064516129032" j="13" val="85" barHeight="95.625" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 231.1064516129032 135L 231.1064516129032 28.741129032258065Q 233.3387096774193 27.508870967741938 235.57096774193545 28.741129032258065L 235.57096774193545 135L 230.1064516129032 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 231.1064516129032 135L 231.1064516129032 28.741129032258065Q 233.3387096774193 27.508870967741938 235.57096774193545 28.741129032258065L 235.57096774193545 135L 230.1064516129032 135" pathFrom="M 231.1064516129032 135L 231.1064516129032 135L 235.57096774193545 135L 235.57096774193545 135L 230.1064516129032 135" cy="28.125" cx="246.26774193548383" j="14" val="95" barHeight="106.875" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 247.26774193548383 135L 247.26774193548383 17.491129032258065Q 249.49999999999994 16.258870967741938 251.7322580645161 17.491129032258065L 251.7322580645161 135L 246.26774193548383 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 247.26774193548383 135L 247.26774193548383 17.491129032258065Q 249.49999999999994 16.258870967741938 251.7322580645161 17.491129032258065L 251.7322580645161 135L 246.26774193548383 135" pathFrom="M 247.26774193548383 135L 247.26774193548383 135L 251.7322580645161 135L 251.7322580645161 135L 246.26774193548383 135" cy="16.875" cx="262.42903225806447" j="15" val="105" barHeight="118.125" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 263.42903225806447 135L 263.42903225806447 45.616129032258065Q 265.6612903225806 44.383870967741935 267.8935483870967 45.616129032258065L 267.8935483870967 135L 262.42903225806447 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 263.42903225806447 135L 263.42903225806447 45.616129032258065Q 265.6612903225806 44.383870967741935 267.8935483870967 45.616129032258065L 267.8935483870967 135L 262.42903225806447 135" pathFrom="M 263.42903225806447 135L 263.42903225806447 135L 267.8935483870967 135L 267.8935483870967 135L 262.42903225806447 135" cy="45" cx="278.59032258064514" j="16" val="80" barHeight="90" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 279.59032258064514 135L 279.59032258064514 56.866129032258065Q 281.8225806451613 55.633870967741935 284.05483870967737 56.866129032258065L 284.05483870967737 135L 278.59032258064514 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 279.59032258064514 135L 279.59032258064514 56.866129032258065Q 281.8225806451613 55.633870967741935 284.05483870967737 56.866129032258065L 284.05483870967737 135L 278.59032258064514 135" pathFrom="M 279.59032258064514 135L 279.59032258064514 135L 284.05483870967737 135L 284.05483870967737 135L 278.59032258064514 135" cy="56.25" cx="294.7516129032258" j="17" val="70" barHeight="78.75" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 295.7516129032258 135L 295.7516129032258 68.11612903225806Q 297.98387096774195 66.88387096774193 300.21612903225804 68.11612903225806L 300.21612903225804 135L 294.7516129032258 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 295.7516129032258 135L 295.7516129032258 68.11612903225806Q 297.98387096774195 66.88387096774193 300.21612903225804 68.11612903225806L 300.21612903225804 135L 294.7516129032258 135" pathFrom="M 295.7516129032258 135L 295.7516129032258 135L 300.21612903225804 135L 300.21612903225804 135L 294.7516129032258 135" cy="67.5" cx="310.9129032258065" j="18" val="60" barHeight="67.5" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 311.9129032258065 135L 311.9129032258065 79.36612903225806Q 314.1451612903226 78.13387096774193 316.3774193548387 79.36612903225806L 316.3774193548387 135L 310.9129032258065 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 311.9129032258065 135L 311.9129032258065 79.36612903225806Q 314.1451612903226 78.13387096774193 316.3774193548387 79.36612903225806L 316.3774193548387 135L 310.9129032258065 135" pathFrom="M 311.9129032258065 135L 311.9129032258065 135L 316.3774193548387 135L 316.3774193548387 135L 310.9129032258065 135" cy="78.75" cx="327.07419354838714" j="19" val="50" barHeight="56.25" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 328.07419354838714 135L 328.07419354838714 90.61612903225806Q 330.3064516129033 89.38387096774193 332.5387096774194 90.61612903225806L 332.5387096774194 135L 327.07419354838714 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 328.07419354838714 135L 328.07419354838714 90.61612903225806Q 330.3064516129033 89.38387096774193 332.5387096774194 90.61612903225806L 332.5387096774194 135L 327.07419354838714 135" pathFrom="M 328.07419354838714 135L 328.07419354838714 135L 332.5387096774194 135L 332.5387096774194 135L 327.07419354838714 135" cy="90" cx="343.2354838709678" j="20" val="40" barHeight="45" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 344.2354838709678 135L 344.2354838709678 101.86612903225806Q 346.46774193548396 100.63387096774193 348.70000000000005 101.86612903225806L 348.70000000000005 135L 343.2354838709678 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 344.2354838709678 135L 344.2354838709678 101.86612903225806Q 346.46774193548396 100.63387096774193 348.70000000000005 101.86612903225806L 348.70000000000005 135L 343.2354838709678 135" pathFrom="M 344.2354838709678 135L 344.2354838709678 135L 348.70000000000005 135L 348.70000000000005 135L 343.2354838709678 135" cy="101.25" cx="359.3967741935485" j="21" val="30" barHeight="33.75" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 360.3967741935485 135L 360.3967741935485 84.99112903225806Q 362.6290322580646 83.75887096774193 364.8612903225807 84.99112903225806L 364.8612903225807 135L 359.3967741935485 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 360.3967741935485 135L 360.3967741935485 84.99112903225806Q 362.6290322580646 83.75887096774193 364.8612903225807 84.99112903225806L 364.8612903225807 135L 359.3967741935485 135" pathFrom="M 360.3967741935485 135L 360.3967741935485 135L 364.8612903225807 135L 364.8612903225807 135L 359.3967741935485 135" cy="84.375" cx="375.55806451612915" j="22" val="45" barHeight="50.625" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 376.55806451612915 135L 376.55806451612915 73.74112903225806Q 378.7903225806453 72.50887096774193 381.0225806451614 73.74112903225806L 381.0225806451614 135L 375.55806451612915 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 376.55806451612915 135L 376.55806451612915 73.74112903225806Q 378.7903225806453 72.50887096774193 381.0225806451614 73.74112903225806L 381.0225806451614 135L 375.55806451612915 135" pathFrom="M 376.55806451612915 135L 376.55806451612915 135L 381.0225806451614 135L 381.0225806451614 135L 375.55806451612915 135" cy="73.125" cx="391.7193548387098" j="23" val="55" barHeight="61.875" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 392.7193548387098 135L 392.7193548387098 62.491129032258065Q 394.95161290322596 61.258870967741935 397.18387096774205 62.491129032258065L 397.18387096774205 135L 391.7193548387098 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 392.7193548387098 135L 392.7193548387098 62.491129032258065Q 394.95161290322596 61.258870967741935 397.18387096774205 62.491129032258065L 397.18387096774205 135L 391.7193548387098 135" pathFrom="M 392.7193548387098 135L 392.7193548387098 135L 397.18387096774205 135L 397.18387096774205 135L 391.7193548387098 135" cy="61.875" cx="407.8806451612905" j="24" val="65" barHeight="73.125" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 408.8806451612905 135L 408.8806451612905 51.241129032258065Q 411.11290322580663 50.008870967741935 413.3451612903227 51.241129032258065L 413.3451612903227 135L 407.8806451612905 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 408.8806451612905 135L 408.8806451612905 51.241129032258065Q 411.11290322580663 50.008870967741935 413.3451612903227 51.241129032258065L 413.3451612903227 135L 407.8806451612905 135" pathFrom="M 408.8806451612905 135L 408.8806451612905 135L 413.3451612903227 135L 413.3451612903227 135L 407.8806451612905 135" cy="50.625" cx="424.04193548387116" j="25" val="75" barHeight="84.375" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 425.04193548387116 135L 425.04193548387116 39.991129032258065Q 427.2741935483873 38.758870967741935 429.5064516129034 39.991129032258065L 429.5064516129034 135L 424.04193548387116 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 425.04193548387116 135L 425.04193548387116 39.991129032258065Q 427.2741935483873 38.758870967741935 429.5064516129034 39.991129032258065L 429.5064516129034 135L 424.04193548387116 135" pathFrom="M 425.04193548387116 135L 425.04193548387116 135L 429.5064516129034 135L 429.5064516129034 135L 424.04193548387116 135" cy="39.375" cx="440.2032258064518" j="26" val="85" barHeight="95.625" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 441.2032258064518 135L 441.2032258064518 28.741129032258065Q 443.43548387096797 27.508870967741938 445.66774193548406 28.741129032258065L 445.66774193548406 135L 440.2032258064518 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 441.2032258064518 135L 441.2032258064518 28.741129032258065Q 443.43548387096797 27.508870967741938 445.66774193548406 28.741129032258065L 445.66774193548406 135L 440.2032258064518 135" pathFrom="M 441.2032258064518 135L 441.2032258064518 135L 445.66774193548406 135L 445.66774193548406 135L 440.2032258064518 135" cy="28.125" cx="456.3645161290325" j="27" val="95" barHeight="106.875" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 457.3645161290325 135L 457.3645161290325 23.116129032258065Q 459.59677419354864 21.883870967741938 461.82903225806473 23.116129032258065L 461.82903225806473 135L 456.3645161290325 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 457.3645161290325 135L 457.3645161290325 23.116129032258065Q 459.59677419354864 21.883870967741938 461.82903225806473 23.116129032258065L 461.82903225806473 135L 456.3645161290325 135" pathFrom="M 457.3645161290325 135L 457.3645161290325 135L 461.82903225806473 135L 461.82903225806473 135L 456.3645161290325 135" cy="22.5" cx="472.52580645161316" j="28" val="100" barHeight="112.5" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 473.52580645161316 135L 473.52580645161316 45.616129032258065Q 475.7580645161293 44.383870967741935 477.9903225806454 45.616129032258065L 477.9903225806454 135L 472.52580645161316 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 473.52580645161316 135L 473.52580645161316 45.616129032258065Q 475.7580645161293 44.383870967741935 477.9903225806454 45.616129032258065L 477.9903225806454 135L 472.52580645161316 135" pathFrom="M 473.52580645161316 135L 473.52580645161316 135L 477.9903225806454 135L 477.9903225806454 135L 472.52580645161316 135" cy="45" cx="488.68709677419383" j="29" val="80" barHeight="90" barWidth="6.4645161290322575"></path>
                                       <path id="apexcharts-bar-area-0" d="M 489.68709677419383 135L 489.68709677419383 68.11612903225806Q 491.91935483871 66.88387096774193 494.15161290322607 68.11612903225806L 494.15161290322607 135L 488.68709677419383 135" fill="rgba(74,199,236,0.5)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskf1blzh83j)" pathTo="M 489.68709677419383 135L 489.68709677419383 68.11612903225806Q 491.91935483871 66.88387096774193 494.15161290322607 68.11612903225806L 494.15161290322607 135L 488.68709677419383 135" pathFrom="M 489.68709677419383 135L 489.68709677419383 135L 494.15161290322607 135L 494.15161290322607 135L 488.68709677419383 135" cy="67.5" cx="504.8483870967745" j="30" val="60" barHeight="67.5" barWidth="6.4645161290322575"></path>
                                       <g id="SvgjsG1821" class="apexcharts-datalabels"></g>
                                    </g>
                                 </g>
                                 <line id="SvgjsLine1860" x1="0" y1="0" x2="501" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                 <line id="SvgjsLine1861" x1="0" y1="0" x2="501" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                 <g id="SvgjsG1862" class="apexcharts-yaxis-annotations"></g>
                                 <g id="SvgjsG1863" class="apexcharts-xaxis-annotations"></g>
                                 <g id="SvgjsG1864" class="apexcharts-point-annotations"></g>
                              </g>
                              <g id="SvgjsG1855" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)">
                                 <g id="SvgjsG1856" class="apexcharts-yaxis-texts-g"></g>
                              </g>
                           </svg>
                           <div class="apexcharts-legend"></div>
                           <div class="apexcharts-tooltip light">
                              <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                              <div class="apexcharts-tooltip-series-group">
                                 <span class="apexcharts-tooltip-marker" style="background-color: rgb(74, 199, 236);"></span>
                                 <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                    <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                    <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="resize-triggers">
                        <div class="expand-trigger">
                           <div style="width: 502px; height: 136px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end card-body-->
      </div>
      <!--end card-->
   </div>
   <!--end col-->
   <div class="col-lg-4">
      <div class="card" style="height: 300px;">
         <div class="card-body">
            <h4 class="mt-0 header-title mb-3">{{ __('dashboard-shop-dashboard-shop.nemoodarNewCustomer') }}</h4>
            <div class="row">
               <div class="col-8">
                  <div class="align-self-center" style="position: relative;">
                     <div id="re_customers" class="apex-charts mb-n4" style="min-height: 217px;">
                        <div id="apexchartsh48b324l" class="apexcharts-canvas apexchartsh48b324l light" style="width: 294px; height: 217px;">
                           <svg id="SvgjsSvg1867" width="294" height="217" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                              <g id="SvgjsG1869" class="apexcharts-inner apexcharts-graphical" transform="translate(68, 0)">
                                 <defs id="SvgjsDefs1868">
                                    <clipPath id="gridRectMaskh48b324l">
                                       <rect id="SvgjsRect1870" width="162" height="184" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                    </clipPath>
                                    <clipPath id="gridRectMarkerMaskh48b324l">
                                       <rect id="SvgjsRect1871" width="200" height="222" x="-20" y="-20" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                    </clipPath>
                                 </defs>
                                 <g id="SvgjsG1873" class="apexcharts-pie" data:innerTranslateX="0" data:innerTranslateY="-25">
                                    <g id="SvgjsG1874" transform="translate(0, -5) scale(1)">
                                       <circle id="SvgjsCircle1875" r="53.807317073170736" cx="80" cy="91" fill="transparent"></circle>
                                       <g id="SvgjsG1876">
                                          <g id="apexcharts-series-0" class="apexcharts-series apexcharts-pie-series NewxCustomers" rel="1">
                                             <path id="apexcharts-donut-slice-0" d="M 80 8.21951219512195 A 82.78048780487805 82.78048780487805 0 1 1 13.029178563205576 139.65714990928424 L 36.468966066083624 122.62714744103477 A 53.807317073170736 53.807317073170736 0 1 0 80 37.192682926829264 L 80 8.21951219512195 z" fill="rgba(77,121,246,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area" index="0" j="0" data:angle="234" data:startAngle="0" data:strokeWidth="2" data:value="65" data:pathOrig="M 80 8.21951219512195 A 82.78048780487805 82.78048780487805 0 1 1 13.029178563205576 139.65714990928424 L 36.468966066083624 122.62714744103477 A 53.807317073170736 53.807317073170736 0 1 0 80 37.192682926829264 L 80 8.21951219512195 z"></path>
                                          </g>
                                          <g id="apexcharts-series-1" class="apexcharts-series apexcharts-pie-series Repeated" rel="2">
                                             <path id="apexcharts-donut-slice-1" d="M 13.029178563205576 139.65714990928424 A 82.78048780487805 82.78048780487805 0 0 1 79.98555207938732 8.21951345594087 L 79.99060885160175 37.19268374636156 A 53.807317073170736 53.807317073170736 0 0 0 36.468966066083624 122.62714744103477 L 13.029178563205576 139.65714990928424 z" fill="rgba(209,230,250,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-pie-area" index="0" j="1" data:angle="126" data:startAngle="234" data:strokeWidth="2" data:value="35" data:pathOrig="M 13.029178563205576 139.65714990928424 A 82.78048780487805 82.78048780487805 0 0 1 79.98555207938732 8.21951345594087 L 79.99060885160175 37.19268374636156 A 53.807317073170736 53.807317073170736 0 0 0 36.468966066083624 122.62714744103477 L 13.029178563205576 139.65714990928424 z"></path>
                                          </g>
                                       </g>
                                    </g>
                                 </g>
                                 <line id="SvgjsLine1881" x1="0" y1="0" x2="160" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                 <line id="SvgjsLine1882" x1="0" y1="0" x2="160" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                              </g>
                           </svg>
                           <div class="apexcharts-legend"></div>
                           <div class="apexcharts-tooltip dark">
                              <div class="apexcharts-tooltip-series-group">
                                 <span class="apexcharts-tooltip-marker" style="background-color: rgb(77, 121, 246);"></span>
                                 <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                    <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                    <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                 </div>
                              </div>
                              <div class="apexcharts-tooltip-series-group">
                                 <span class="apexcharts-tooltip-marker" style="background-color: rgb(209, 230, 250);"></span>
                                 <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                    <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                    <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="resize-triggers">
                        <div class="expand-trigger">
                           <div style="width: 295px; height: 218px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                     </div>
                  </div>
               </div>
               <!--end col-->
               <div class="col-4 align-self-center">
                  <div class="re-customers-detail">
                     <h3 class="mb-0">21,546</h3>
                     <p class="text-muted"><i class="mdi mdi-circle text-info mr-1"></i>{{ __('dashboard-shop-dashboard-shop.nemoodarNewCustomerItem1') }}</p>
                  </div>
                  <div class="re-customers-detail">
                     <h3 class="mb-0">1535</h3>
                     <p class="text-muted"><i class="mdi mdi-circle text-light mr-1"></i>{{ __('dashboard-shop-dashboard-shop.nemoodarNewCustomerItem2') }}</p>
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
   <div class="col-lg-4">
      <div class="card carousel-bg-img" style="height: 300px;">
         <div class="card-body dash-info-carousel">
            <h4 class="mt-0 header-title">{{ __('dashboard-shop-dashboard-shop.mahsoolateMahboob') }}</h4>
            <div id="carousel_2" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                 @php $i=0 @endphp
                 @foreach($bestSellings as $bestSelling)
                  <div class="carousel-item {{ $i==0 ? 'active' : '' }}">
                     <div class="media">
                        <img src="{{ $bestSelling->image['400,400'] }}"  height="230" width="190" class="mr-2" alt="...">
                        <div class="media-body align-self-center">
                           <span class="badge badge-primary mb-2 byekan w-50 f-10">{{ $bestSelling->buyCount }} {{ __('dashboard-shop-dashboard-shop.mahsoolateMahboobForoosh') }}</span>
                           <h4 class="mt-0">{{ $bestSelling->title }}</h4>
                           <p class="text-muted mb-0">{{ number_format($bestSelling->price) }} {{ __('dashboard-shop-dashboard-shop.mahsoolateMahboobCurrency') }}</p>
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

@endsection
@section('pageScripts')
   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/series-label.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/modules/export-data.js"></script>
   <script src="https://code.highcharts.com/modules/accessibility.js"></script>

   <script>
      Highcharts.chart('foroosh', {

         title: {
            text: 'نمودار وضعیت کلی فروشگاه'
         },

         subtitle: {
            text: ''
         },

         yAxis: {
            title: {
               text: 'تعداد فروش'
            }
         },

         xAxis: {
            accessibility: {
               rangeDescription: ''
            }
         },

         legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
         },

         plotOptions: {
            series: {
               label: {
                  connectorAllowed: false
               },
               pointStart: 2010
            }
         },

         series: [{
            name: 'تعداد کابران جدید',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
         }, {
            name: 'تعداد فروش',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
         }, {
            name: 'مقدار فروش',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
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
   </script>
@stop
