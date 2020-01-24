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
                            <li class="breadcrumb-item "> {{ __('dashboard-shop-users-index.leftCurrentPage1') }}</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('dashboard-shop-users-index.leftCurrentPage2') }}</a></li>
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
                                        <div class="icon-info"><span>{{ __('dashboard-shop-users-index.box1') }}</span></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <h4 class="mt-0 mb-1">{{ $users->count() }}</h4>
                                        </div>
                                        <p class="mb-0 text-muted">{{ __('dashboard-shop-users-index.box1Desc') }}</p>
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
                                        <div class="icon-info"><span>{{ __('dashboard-shop-users-index.box1') }}</span></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-0 text-muted">{{ __('dashboard-shop-users-index.box1Desc') }}</p>
                                            <h4 class="mt-0 mb-1">{{ $users->count() }}</h4>
                                        </div>
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
                                        <div class="icon-info"><span>{{ __('dashboard-shop-users-index.box1') }}</span></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-0 text-muted">{{ __('dashboard-shop-users-index.box1Desc') }}</p>
                                            <h4 class="mt-0 mb-1">{{ $users->count() }}</h4>
                                        </div>
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
                                        <div class="icon-info"><span>{{ __('dashboard-shop-users-index.box1') }}</span></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-0 text-muted">{{ __('dashboard-shop-users-index.box1Desc') }}</p>
                                            <h4 class="mt-0 mb-1">{{ $users->count() }}</h4>
                                        </div>
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
                        <h4 class="mt-0 header-title">{{ __('dashboard-shop-users-index.ListKarbaranTitle') }}</h4>
                        <p class="text-muted mb-4 font-13">{{ __('dashboard-shop-users-index.ListKarbaranDesc') }}</p>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
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
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">{{ __('dashboard-shop-users-index.ListKarbaranItem1') }}</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">{{ __('dashboard-shop-users-index.ListKarbaranItem2') }}</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">{{ __('dashboard-shop-users-index.ListKarbaranItem3') }}</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">{{ __('dashboard-shop-users-index.ListKarbaranItem4') }}</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">{{ __('dashboard-shop-users-index.ListKarbaranItem5') }}</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">{{ __('dashboard-shop-users-index.ListKarbaranItem6') }}</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">{{ __('dashboard-shop-users-index.ListKarbaranItem7') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: center" class="iranyekan">
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->firstName }}</td>
                                                    <td>{{ $user->lastName }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->mobile }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('users.purcheses', $user) }}">{{ __('dashboard-shop-users-index.ListKarbaranItem8') }}</a>
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
            </div>
            <!-- end col -->
        </div>
    </div>
    <!-- Attachment Modal -->
    @endsection
    @section('pageScripts')
      <script src="{{ asset('/dashboard/assets/js/admin-users-index.js') }}"></script>

    @stop
