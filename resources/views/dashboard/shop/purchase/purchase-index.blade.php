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

        @foreach($purchases as $purchase)
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
                                    <input type="text" class="form-control inputfield" name="name" value="{{ $purchase->address->province }}" readonly>
                                </div>

                            </div>
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                       class="fas fa-star required-star mr-1"></i>شهر :</span></div>
                                    <input type="text" class="form-control inputfield" name="name" value="{{ $purchase->address->city }}" readonly>
                                </div>

                            </div>
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                       class="fas fa-star required-star mr-1"></i>کد پستی :</span></div>
                                    <input type="text" class="form-control inputfield" name="name" value="{{ $purchase->address->zip_code }}" readonly>
                                </div>

                            </div>
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                       class="fas fa-star required-star mr-1"></i>آدرس :</span></div>
                                    <input type="text" class="form-control inputfield" name="name" value="{{ $purchase->address->address }}" readonly>
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
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">هزینه ارسال</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">جمع کل</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">مبلغ کل سفارش</th>
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
                                    <td>{{ $purchase->shipping_price }}</td>
                                                    <td>
                                                      {{ number_format($purchase->total_price) }}
                                                    </td>
                                                    <td>
                                                      {{ number_format($purchase->total_price + $purchase->shipping_price) }}
                                                    </td>
                                                    <td>{{ jdate($purchase->created_at) }}</td>
                                                    <td>
                                                        <a href="{{ route('purchases.show', ['id' => $purchase->id]) }}">
                                                            <button class="btn btn-primary">
                                                                مشاهده جزئیات
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('purchases.show', ['id' => $purchase->id]) }}" data-toggle="modal" data-target="#ShowAddressModal{{ $purchase->id }}">
                                                            <button class="btn btn-dropbox">
                                                              اطلاعات خریدار
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
            <!-- end col -->
        </div>
    </div>
    <!-- Attachment Modal -->
    @endsection
    @section('pageScripts')
    <script src="{{ asset('/dashboard/assets/js/admin-users-index.js') }}"></script>

    @stop
