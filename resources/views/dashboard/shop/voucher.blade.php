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
            <a href="#" data-toggle="modal" data-target="#AddVoucherModal" class="btn btn-primary text-white d-inline-block text-right mb-4 font-weight-bold mt-3"><i class="fa fa-plus mr-2"></i>افزودن کد تخفیف</a>
        </div>


        @include('dashboard.layouts.errors')

        <div class="modal fade bd-example-modal-xl" id="AddVoucherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">افزودن کد تخفیف جدید</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll">
                        <form action="{{ route('vouchers.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">نام کد تخفیف:</span></div>
                                    <input type="text" class="form-control inputfield" name="name" placeholder="مثال: کد تخفیف 10000 تومانی">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات کد تخفیف :</span></div>
                                    <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد کد تخفیف مانند مناسبت آن">
                                </div>
                            </div>
                            <!--end form-group-->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                        <button type="submit" class="btn btn-primary">ثبت درخواست</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>

        @foreach($vouchers as $voucher)
        <div class="modal fade bd-example-modal-xl" id="UpdateProductCategoryModal{{ $voucher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ویرایش دسته بندی</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll">
                        <form action="{{ route('product-category.update', $voucher->id) }}" method="post" class="form-horizontal">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان دسته بندی :</span></div>
                                    <input type="text" class="form-control inputfield" name="name" value="{{ $voucher->name }}">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات دسته بندی :</span></div>
                                    <input type="text" class="form-control inputfield" name="description" value="{{ $voucher->description }}">
                                </div>
                            </div>
                            <!--end form-group-->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                        <button type="submit" class="btn btn-primary">ثبت درخواست</button>
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
                            <div class="col-sm-12">



                                <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 405px;">نام
                                                محصول
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">توضیحات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="byekan">
                                        @foreach($vouchers as $voucher)
                                        <tr role="row" class="odd icon-hover hover-color">
                                            <td>{{ $voucher->name }}</td>
                                            <td class="d-flex justify-content-between ">{{ $voucher->description }}
                                                <div class="d-none icon-show">
                                                <a href="{{ $voucher->id }}" id="editCat" data-toggle="modal" data-target="#UpdateremoveVoucherModal{{ $voucher->id }}"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                                </a>

                                                <a href="" id="removeVoucher" data-id="{{ $voucher->id }}" ><i class="far fa-trash-alt text-danger font-15"></i></a>
                                                <a href="{{ route('shop.show.category', ['shop'=>$shop->english_name, 'categroyId'=>$voucher->id]) }}"><i class="fa fa-eye text-success mr-1 button font-15"></i>
                                                </a>
                                            </div>
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
        swal("آیا اطمینان دارید؟", {
            dangerMode: true,
            buttons: ["انصراف", "حذف"],

          })
        .then(function(isConfirm) {
            if (isConfirm) {
        $.ajax({
            type: "post",
            url: "{{url('dashboard/shop/product-category/delete')}}",
            data: {
                id: id,
                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
            },
            success: function(data) {
                var url = document.location.origin + "/dashboard/shop/product-category";
                location.href = url;
            }
        });
    } else {
        swal("متوقف شد", "عملیات شما متوقف شد :)", "error");
    }
    });
    });

</script>
@stop
