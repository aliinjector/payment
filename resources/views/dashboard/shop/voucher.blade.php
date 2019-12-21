@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
    $(document).ready(function() {
        $('.start-field-example').persianDatepicker({
            altField: '.start-alt-field'
        });
        $('.expire-field-example').persianDatepicker({
            altField: '.expire-alt-field'
        });
    });
</script>
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "> کدهای تخفیف </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                    {{-- <h4 class="page-title">لیست محصولات دسته بندی شماره یک</h4> --}}
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

        <div class="text-right">
            <a href="#" data-toggle="modal" data-target="#AddVoucherModal" class="btn btn-primary text-white d-inline-block text-right mb-4 font-weight-bold mt-3 rounded"><i class="fa fa-plus mr-2"></i>افزودن کد تخفیف</a>
        </div>


        @include('dashboard.layouts.errors')

        <div class="modal fade bd-example-modal-xl" id="AddVoucherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">افزودن کد تخفیف جدید</h5>
                        <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll">
                        <form action="{{ route('vouchers.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">نام کد تخفیف:</span></div>
                                    <input type="text" class="form-control inputfield" name="name" placeholder="مثال: کد تخفیف 10000 تومانی">
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات کد :</span></div>
                                    <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد کد تخفیف مانند مناسبت آن">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">تعداد استفاده :</span></div>
                                    <input type="number" class="form-control inputfield" name="uses" placeholder="مثال: 10">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">میزان تخفیف:</span></div>
                                    <input type="text" class="form-control inputfield" name="discount_amount" placeholder="مثال: 30000">
                                    <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                </div>

                                <div class="input-group mt-3 d-none users-voucher">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">تخفیف به کاربران خاص:</span></div>
                                    <select multiple="multiple" class="form-control" id="exampleFormControlSelect2" name="users[]">
                                        @foreach($usersFullName as $userFullName)
                                        <option>{{ $userFullName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">تاریخ شروع:</span></div>
                                    <input type="hidden" class="start-alt-field col h-50px border-0" name="starts_at" />
                                    <input class="start-field-example col h-50px border-0" name="" />

                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">تاریخ انقضا:</span></div>
                                    <input type="hidden" class="expire-alt-field col h-50px border-0" name="expires_at" />
                                    <input class="expire-field-example col h-50px border-0" name="" />
                                </div>

                                <div class="input-group-append mt-3"><a href="#" class="voucher"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i>تخفیف به کاربران خاص
                                        </span></a>
                                </div>
                            </div>
                            <div class="custom-control custom-switch switch-blue input-group-append mt-3 m-3">
                                <input type="checkbox" class="custom-control-input" id="customSwitchBlue" name="first_purchase">
                                <label class="custom-control-label font-15 text-dark"  for="customSwitchBlue">فقط برای سفارش اول کاربران فعال باشد</label>
                            </div>
                            <!--end form-group-->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger rounded" data-dismiss="modal">انصراف</button>
                        <button type="submit" class="btn btn-primary rounded">ثبت درخواست</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>

        @foreach($vouchers as $voucher)
        <div class="modal fade bd-example-modal-xl" id="UpdateVoucherModal{{ $voucher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ویرایش کد تخفیف</h5>
                        <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll">
                        <form action="{{ route('vouchers.update', $voucher->id) }}" method="post" class="form-horizontal">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">نام کد تخفیف:</span></div>
                                    <input type="text" class="form-control inputfield" name="name" value="{{ $voucher->name }}">
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات کد :</span></div>
                                    <input type="text" class="form-control inputfield" name="description" value="{{ $voucher->description }}">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">تعداد استفاده :</span></div>
                                    <input type="number" class="form-control inputfield" name="uses" value="{{ $voucher->uses }}">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">میزان تخفیف:</span></div>
                                    <input type="text" class="form-control inputfield" name="discount_amount" placeholder="مثال: 30000" value="{{ $voucher->discount_amount }}">
                                    <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">تاریخ شروع:</span></div>
                                    <input type="hidden" class="start-alt-field col h-50px border-0" name="starts_at" />
                                    <input class="start-field-example col h-50px border-0" name="" value="{{ $voucher->starts_at }}" />

                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">تاریخ انقضا:</span></div>
                                    <input type="hidden" class="expire-alt-field col h-50px border-0" name="expires_at" />
                                    <input class="expire-field-example col h-50px border-0" name="" value="{{ $voucher->expires_at }}" />
                                </div>
                            </div>
                            <!--end form-group-->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger rounded" data-dismiss="modal">انصراف</button>
                        <button type="submit" class="btn btn-primary rounded">ثبت درخواست</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
        @endforeach



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">لیست کدهای تخفیف</h4>


                        <p class="text-muted mb-4 font-13">لیست تمامی کدهای تخفیف فروشگاه شما</p>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12 table-responsive">



                                    <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer rounded font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                      aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 20px;">شناسه
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 115px;">نام
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 55px;">وضعیت </th>
                                                {{-- <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">توضیحات </th> --}}
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">کد تخفیف</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">تعداد استفاده</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;"> میزان تخفیف</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;"> تاریخ شروع</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">تاریخ انقضا</th>
                                            </tr>
                                        </thead>
                                        <tbody class="byekan">
                                          @php
                                            $id = 1;
                                          @endphp
                                            @foreach($vouchers as $voucher)
                                            <tr role="row" class="odd icon-hover hover-color" id="{{ $voucher->id }}">
                                                <td>{{ $id }}</td>
                                                <td>{{ $voucher->name }}</td>
                                                <td class="font-18">
                                                    {{-- <form class="form-inline" action="" method="post"> --}}
                                                    @csrf
                                                    {{ method_field('put') }}
                                                    <button class="btn btn-link p-0 change" type="submit" data-id="{{ $voucher->id }}">
                                                        @if($voucher->status == 1)
                                                            <i class="fa fa-toggle-on text-success show{{ $voucher->id }}"></i>
                                                            <i class="fa fa-toggle-off text-muted d-none {{ $voucher->id }}"></i>
                                                            @else
                                                            <i class="fa fa-toggle-on text-success d-none {{ $voucher->id }}"></i>
                                                            <i class="fa fa-toggle-off text-muted show{{ $voucher->id }}"></i>
                                                            @endif
                                                    </button>
                                                    @if ($voucher->status == 1)
                                                    <span class="badge badge-soft-success show{{ $voucher->id }}">
                                                        فعال
                                                    </span>
                                                    <span class="badge badge-soft-pink d-none {{ $voucher->id }}">
                                                        غیرفعال
                                                    </span>
                                                    @else
                                                    <span class="badge badge-soft-success d-none {{ $voucher->id }}">
                                                        فعال
                                                    </span>
                                                    <span class="badge badge-soft-pink show{{ $voucher->id }}">
                                                        غیرفعال
                                                    </span>
                                                    @endif
                                                    {{-- </form> --}}

                                                </td>
                                                {{-- <td>{{ $voucher->description }}</td> --}}
                                                <td>{{ $voucher->code }}</td>
                                                <td>{{ $voucher->uses }}</td>
                                                <td>{{ $voucher->discount_amount }}</td>
                                                <td>{{ jdate($voucher->starts_at) }}</td>
                                                <td class=" p-3">{{ jdate($voucher->expires_at) }}
                                                    <div class="d-none icon-show">
                                                        <a href="{{ $voucher->id }}" id="editVoucher" data-toggle="modal" data-target="#UpdateVoucherModal{{ $voucher->id }}"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                                        </a>

                                                        <a href="" id="removeVoucher" data-id="{{ $voucher->id }}" data-name="{{ $voucher->description }}"><i class="far fa-trash-alt text-danger font-15"></i></a>
                                                    </div>
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

    <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>



    <script>
        $(document).on('click', '#removeVoucher', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            swal(` ${'حذف کد:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                    dangerMode: true,
                    icon: "warning",
                    buttons: ["انصراف", "حذف"],

                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "post",
                            url: "{{url('dashboard/shop/vouchers/delete')}}",
                            data: {
                                id: id,
                                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                            },
                            success: function(data) {
                                var url = document.location.origin + "/dashboard/shop/vouchers";
                                location.href = url;
                            }
                        });
                    } else {
                        toastr.warning('لغو شد.', '', []);
                    }
                });
        });
    </script>

    <script>
        $(".change").click(function() {
            var id = $(this).data("id");
            $.ajax({
                url: "vouchers/change-status/" + id,
                type: 'POST',
                contentType: 'application/json',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                }
            });
            $("i." + id).toggleClass("d-none");
            $("span." + id).toggleClass("d-none");
            $("i.show" + id).toggleClass("d-none");
            $("span.show" + id).toggleClass("d-none");
            toastr.success('وضعیت تغییر کرد.', '', []);
        });
        $(".voucher").click(function() {
            $(".users-voucher").removeClass("d-none");
            $(".voucher").addClass("d-none");
        });
    </script>
    @stop
