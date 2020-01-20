@extends('dashboard.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">گزارش کدهای تخفیف شما</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">گزارش کدهای تخفیف</h4>
                        <p class="text-muted mb-4 font-13">در این بخش میتوانید گزارشی از کد های تخفیف خود ملاحظه کنید . این گزارش بر اساس نام استفاده کننده ی کد تخفیف و تاریخ استفاده به نمایش در می آیند.</p>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">

                                <div class="col-sm-12 table-responsive">
                                  <div class="searchBox bg-dark" style="bottom: 87%;left: 11%;">
                                      <input type="text" id="myInputTextField" class="searchInput iranyekan">
                                      <button class="searchButton border" href="#">
                                          <i class="fa fa-search"></i>
                                      </button>
                                  </div>
                                  <div class="table-responsive">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 20px;">نام استفاده کننده
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 115px;">نام کد تخفیف استفاده شده
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending"
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">کد تخفیف</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">مبلغ کد تخفیف</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">تاریخ استفاده</th>
                                            </tr>
                                        </thead>
                                        <tbody class="byekan">
                                            @foreach($vouchersReports as $vouchersReport)
                                            <tr role="row" class="odd icon-hover hover-color">
                                                <td>{{ $vouchersReport->user->firstName .' '. $vouchersReport->user->lastName }}</td>
                                                <td>{{ $vouchersReport->voucher->name }}</td>
                                                <td>{{ $vouchersReport->voucher->code }}</td>
                                                <td>{{ $vouchersReport->voucher->discount_amount }}</td>
                                                <td>{{ jdate($vouchersReport->created_at) }}</td>
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
        </div>
    </div>

    @endsection
    @section('pageScripts')
      <script src="{{ asset('/dashboard/assets/js/admin-voucher-report.js') }}"></script>

    @stop
