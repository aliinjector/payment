@extends('dashboard.layouts.master')
@section('content')

    <style>
        .page-link{
            font-family: BYekan!important;
        }
        #countries {
            width: 100%;
            height: 400px
        }

        #cities {
            width: 100%;
            height: 500px;
        }


        #iranMap {
            height: 600px;
            min-width: 90%;
            max-width: 600px;
            margin: 0 auto;
        }

        .loading {
            margin-top: 10em;
            text-align: center;
            color: gray;
        }

        #isps {
            width: 99%;
            height: 550px;
        }

        tspan {
            font-family: BYekan !important;
        }

        .morris-hover {
            font-family: BYekan !important;

        }
    </style>

<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "> آمار بازدید فروشگاه </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

        @include('dashboard.layouts.errors')

        <div class="row">
            <div class="col-lg-3">
                <div class="card card-eco">
                        <div class="card-body">
                            <h4 class="title-text mt-0">بازدید کل</h4>
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-bold byekan">{{ $stats->count() }}</h3>
                            </div>
                        </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-3">
                <div class="card card-eco">
                        <div class="card-body">
                            <h4 class="title-text mt-0">بازدید کننده کل</h4>
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-bold byekan">{{ $stats->count() }}</h3>
                            </div>
                        </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <!--end col-->
            <div class="col-lg-3">
                <div class="card card-eco">
                    <div class="card-body">
                        <h4 class="title-text mt-0">بازدید امروز</h4>
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-bold byekan">{{ $stats->count() }}</h3>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>

            <div class="col-lg-3">
                <div class="card card-eco">
                    <div class="card-body">
                        <h4 class="title-text mt-0">بازدیدکننده امروز</h4>
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-bold byekan">{{ $stats->count() }}  </h3>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">لیست بازدید ها</h4>
                        <p class="text-muted mb-4 font-13">لیست تمامی بازدید های سایت شما</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="searchBox bg-dark"  style="margin-top: -15px;">
                                        <input type="text" id="myInputTextField" class="searchInput">
                                        <button class="searchButton" href="#">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">

                                        <thead style="text-align: center">
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" >زمان</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">سیستم عامل	</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">مرورگر</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">IP	</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">کشور</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">شهر</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">ISP</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">لینک دهنده</th>
                                        </tr>
                                        </thead>
                                        <tbody style="text-align: center" class="iranyekan">
                                        @foreach($stats as $stat)
                                            <tr>
                                                <td>{{ jdate($stat->updated_at) }}</td>
                                                <td>{{ $stat->osName }}</td>
                                                <td>{{ $stat->browserName }}</td>
                                                <td>{{ $stat->ip }}</td>
                                                <td>{{ $stat->country }}</td>
                                                <td>{{ $stat->city }}</td>
                                                <td>{{ $stat->isp }}</td>
                                                <td>{{ $stat->ref }}</td>
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
            </div>
            <!-- end col -->
        </div>
    </div>
    <!-- Attachment Modal -->
    @endsection
    @section('pageScripts')
      <script src="{{ asset('/dashboard/assets/js/admin-sats.js') }}"></script>



        @stop
