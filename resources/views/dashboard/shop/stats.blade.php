@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
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
            <div class="col-lg-12">

                <!--end card-->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <div class="icon-info"><span>بازدید کل</span></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                          <h4 class="mt-0 mb-1">{{ $stats->count() }}</h4></div>
                                            <p class="mb-1 text-muted">بازدید</p>
                                    </div>
                                </div>
                                <div class="progress mt-2" style="height:3px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                      <div class="icon-info"><span>بازدید کننده کل</span></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <h4 class="mt-0 mb-1">{{ $stats->count() }}</h4></div>
                                        <p class="mb-1 text-muted">بازدید</p>
                                    </div>
                                </div>
                                <div class="progress mt-2" style="height:3px;">
                                    <div class="progress-bar bg-purple" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                      <div class="icon-info"><span>بازدید امروز</span></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <h4 class="mt-0 mb-1">{{ $stats->count() }}</h4></div>
                                        <p class="mb-1 text-muted">بازدید</p>
                                    </div>
                                </div>
                                <div class="progress mt-2" style="height:3px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                      <div class="icon-info"><span>بازدیدکننده امروز</span></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <h4 class="mt-0 mb-1">{{ $stats->count() }}</h4></div>
                                        <p class="mb-1 text-muted">بازدید</p>
                                    </div>
                                </div>
                                <div class="progress mt-2" style="height:3px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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
            </div>
            <!--end col-->

        </div>





        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">لیست بازدید ها</h4>
                        <p class="text-muted mb-4 font-13">لیست تمامی بازدید های سایت شما</p>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="searchBox bg-dark">
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
    <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
    <script src="/dashboard/assets/plugins/dropify/js/dropify.min.js"></script>
    <script src="/dashboard/assets/pages/jquery.form-upload.init.js"></script>
    <script type="text/javascript">
        $(window).resize(function() {
            if ($(window).width() < 1300) {
                $("body").addClass('enlarge-menu');

            } else {
                $("body").removeClass('enlarge-menu');

            }
        }).resize();
    </script>
    <script type="text/javascript">
    $(window).resize(function() {
        if ($(window).width() < 1070) {
          $(".icon-show").removeClass('d-none');

        } else {
            $(".icon-show").addClass('d-none');

        }
    }).resize();
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#datatable_filter').parent().remove();
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('input#myInputTextField').on("focus", function(){
        if ($(this).hasClass("searchActive")){
               $(this).removeClass("searchActive");
           }
           else{
          $('input#myInputTextField').addClass('searchActive');
          }
    });
    });
    </script>

        @stop
