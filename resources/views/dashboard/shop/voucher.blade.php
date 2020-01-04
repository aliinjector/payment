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
                            <li class="breadcrumb-item ">{{ __('dashboard-shop-voucher.leftCurrentPage1') }}</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('dashboard-shop-voucher.leftCurrentPage2') }}</a></li>
                        </ol>
                    </div>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

        <div class="text-right">
            <a href="#" data-toggle="modal" data-target="#AddVoucherModal" class="btn btn-primary text-white d-inline-block text-right mb-4 font-weight-bold mt-3 rounded"><i class="fa fa-plus mr-2"></i>{{ __('dashboard-shop-voucher.addBtn') }}</a>
        </div>


        @include('dashboard.layouts.errors')

        <div class="modal fade bd-example-modal-xl" id="AddVoucherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard-shop-voucher.addModalTitle') }}</h5>
                        <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll">
                        <form action="{{ route('vouchers.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.addModalItem1') }}:</span></div>
                                    <input type="text" class="form-control inputfield" name="name" placeholder="{{ __('dashboard-shop-voucher.addModalItem1ex') }}">
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.addModalItem2') }} :</span></div>
                                    <input type="text" class="form-control inputfield" name="description" placeholder="{{ __('dashboard-shop-voucher.addModalItem2ex') }}">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.addModalItem3') }} :</span></div>
                                    <input type="number" class="form-control inputfield" name="uses" placeholder="{{ __('dashboard-shop-voucher.addModalItem3ex') }}">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.addModalItem4') }}:</span></div>
                                    <input type="text" class="form-control inputfield" name="discount_amount" placeholder="{{ __('dashboard-shop-voucher.addModalItem4ex') }}">
                                    <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> {{ __('dashboard-shop-voucher.addModalItem4Left') }}</span></div>

                                </div>

                                <div class="input-group mt-3 d-none users-voucher">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.addModalItem5') }}:</span></div>
                                    <select multiple="multiple" class="form-control" id="exampleFormControlSelect2" name="users[]">
                                        @foreach($usersFullName as $userFullName)
                                        <option>{{ $userFullName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.addModalItem6') }}:</span></div>
                                    <input type="hidden" class="start-alt-field col h-50px border-0" name="starts_at" />
                                    <input class="start-field-example col h-50px border-0" name="" />

                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.addModalItem7') }}:</span></div>
                                    <input type="hidden" class="expire-alt-field col h-50px border-0" name="expires_at" />
                                    <input class="expire-field-example col h-50px border-0" name="" />
                                </div>

                                <div class="input-group-append mt-3"><a href="#" class="voucher"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i>{{ __('dashboard-shop-voucher.addModalItem5') }}
                                        </span></a>
                                </div>
                            </div>
                            <div class="custom-control custom-switch switch-blue input-group-append mt-3 m-3">
                                <input type="checkbox" class="custom-control-input" id="customSwitchBlue" name="first_purchase">
                                <label class="custom-control-label font-15 text-dark"  for="customSwitchBlue">{{ __('dashboard-shop-voucher.addModalItem8') }}</label>
                            </div>
                            <!--end form-group-->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger rounded" data-dismiss="modal">{{ __('dashboard-shop-voucher.addModalItem9') }}</button>
                        <button type="submit" class="btn btn-primary rounded">{{ __('dashboard-shop-voucher.addModalItem10') }}</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard-shop-voucher.editModalTitle') }}</h5>
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
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.editModalItem1') }}:</span></div>
                                    <input type="text" class="form-control inputfield" name="name" value="{{ $voucher->name }}">
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.editModalItem2') }}:</span></div>
                                    <input type="text" class="form-control inputfield" name="description" value="{{ $voucher->description }}">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.editModalItem3') }} :</span></div>
                                    <input type="number" class="form-control inputfield" name="uses" value="{{ $voucher->uses }}">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.editModalItem4') }}:</span></div>
                                    <input type="text" class="form-control inputfield" name="discount_amount"  value="{{ $voucher->discount_amount }}">
                                    <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.editModalItem5') }}:</span></div>
                                    <input type="hidden" class="start-alt-field col h-50px border-0" name="starts_at" />
                                    <input class="start-field-example col h-50px border-0" name="" value="{{ $voucher->starts_at }}" />

                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.editModalItem6') }}:</span></div>
                                    <input type="hidden" class="expire-alt-field col h-50px border-0" name="expires_at" />
                                    <input class="expire-field-example col h-50px border-0" name="" value="{{ $voucher->expires_at }}" />
                                </div>
                            </div>
                            <!--end form-group-->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger rounded" data-dismiss="modal">{{ __('dashboard-shop-voucher.addModalItem9') }}</button>
                        <button type="submit" class="btn btn-primary rounded">{{ __('dashboard-shop-voucher.addModalItem10') }}</button>
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
                        <h4 class="mt-0 header-title">{{ __('dashboard-shop-voucher.listCodeTakhfifTitle') }}</h4>


                        <p class="text-muted mb-4 font-13">{{ __('dashboard-shop-voucher.listCodeTakhfifDesc') }}.</p>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                  <div class="table-responsive">

                                  <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">

                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 20px;">{{ __('dashboard-shop-voucher.listCodeTakhfifItem1') }}
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 115px;">{{ __('dashboard-shop-voucher.listCodeTakhfifItem2') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 55px;">{{ __('dashboard-shop-voucher.listCodeTakhfifItem3') }} </th>
                                                {{-- <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">توضیحات </th> --}}
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">{{ __('dashboard-shop-voucher.listCodeTakhfifItem4') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">{{ __('dashboard-shop-voucher.listCodeTakhfifItem5') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;"> {{ __('dashboard-shop-voucher.listCodeTakhfifItem6') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">{{ __('dashboard-shop-voucher.listCodeTakhfifItem7') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">{{ __('dashboard-shop-voucher.listCodeTakhfifItem8') }}</th>
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
                                                        {{ __('dashboard-shop-voucher.listCodeTakhfifEnable') }}
                                                    </span>
                                                    <span class="badge badge-soft-pink d-none {{ $voucher->id }}">
                                                      {{ __('dashboard-shop-voucher.listCodeTakhfifDisable') }}
                                                    </span>
                                                    @else
                                                    <span class="badge badge-soft-success d-none {{ $voucher->id }}">
                                                        {{ __('dashboard-shop-voucher.listCodeTakhfifEnable') }}
                                                    </span>
                                                    <span class="badge badge-soft-pink show{{ $voucher->id }}">
                                                      {{ __('dashboard-shop-voucher.listCodeTakhfifDisable') }}
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
                            url: "{{url('admin-panel/shop/vouchers/delete')}}",
                            data: {
                                id: id,
                                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                            },
                            success: function(data) {
                                var url = document.location.origin + "/admin-panel/shop/vouchers";
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
