@extends('dashboard.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row my-4">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "> لیست سفارشات کاربر فروشگاه</li>
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
                                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">ردیف</th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">تاریخ ثبت سفارش</th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">عملیات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="text-align: center" class="iranyekan">
                                                      @php
                                                        $id = 1;
                                                      @endphp
                                                        @foreach($purchases as $purchase)
                                                          <tr role="row" class="odd icon-hover hover-color">
                                                            <td>{{ $id }}</td>
                                                            <td>{{ jdate($purchase->created_at) }}</td>
                                                            <td>
                                                                <a href="{{ route('users.purchase.show', ['userID' => $purchase->user->id, 'id' => $purchase->id]) }}">
                                                              <button class="btn btn-outline-danger">
                                                                مشاهده جزئیات
                                                              </button>
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
                    </div>
                    <!-- end col -->
                </div>
    </div>
    <!-- Attachment Modal -->
    @endsection
    @section('pageScripts')
      <script src="{{ asset('/dashboard/assets/js/admin-users-index.js') }}"></script>

@stop
