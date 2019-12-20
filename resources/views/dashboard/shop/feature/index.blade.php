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
                            <li class="breadcrumb-item ">ویژگی دسته بندی ها</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <div class="text-right mt-2">
            <a href="#" data-toggle="modal" data-target="#AddProductCategoryModal" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded"><i class="fa fa-plus mr-2"></i>اضافه کردن ویژگی جدید</a>
        </div>
        @include('dashboard.layouts.errors')
        <div class="modal fade bd-example-modal-xl" id="AddProductCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">افزودن ویژگی جدید</h5>
                        <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                        <form action="{{ route('feature.store', ['continue', 1]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">نام ویژگی :</span></div>
                                    <input type="text" class="form-control inputfield" name="name" placeholder="مثال: ورزشی">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">دسته بندی ویژگی:</span></div>
                                    <select class="form-control inputfield" name="productCat_id" id="">
                                        <option style="font-family: BYekan!important;" value="null">انتخاب دسته بندی
                                        </option>
                                        @foreach($productCategories as $productCategory)
                                        <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">
                                            @if($productCategory->parent()->exists()) {{ $productCategory->parent()->get()->first()->name }} >
                                                @endif {{ $productCategory->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">آیکون ویژگی</h4>
                                        <input type="file" id="input-file-now" name="icon" class="dropify">
                                    </div>
                                </div>
                            </div>
                            <!--end form-group-->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger rounded" data-dismiss="modal">انصراف</button>
                        <div class="group">
                            <button type="submit" name="action" value="justSave" class="btn btn-primary rounded">ثبت درخواست</button>
                            <button type="submit" name="action" value="saveAndContinue" class="btn btn-primary rounded">ثبت درخواست و ادامه </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach($productCategories as $productCategory)
        <div class="modal fade bd-example-modal-xl" id="ShowFeatureModal{{ $productCategory->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">نمایش ویژگی ها</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                        <div class="form-group mb-0">
                            @foreach ($productCategory->features as $feature)
                            <div class="input-group mt-3 mb-4">
                                <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">نام ویژگی :</span></div>
                                <input type="text" class="form-control inputfield" name="name" readonly value="{{ $feature->name }}">
                            </div>
                            @endforeach

                        </div>
                        <!--end form-group-->
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
                        <h4 class="mt-0 header-title">لیست ویژگی دسته بندی ها</h4>
                        <p class="text-muted mb-4 font-13">لیست تمامی دسته بندی ها همراه با ویژگی های آن ها در فروشگاه شما</p>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="searchBox">
                                        <input type="text" id="myInputTextField" class="searchInput">
                                        <button class="searchButton" href="#">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                      aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شناسه
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 15px;">نام
                                                    دسته بندی
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 205px;"> ویژگی های دسته بندی</th>
                                            </tr>
                                        </thead>
                                        <tbody class="iranyekan">
                                            @foreach($productCategories as $productCategory)
                                            <tr role="row" class="odd icon-hover hover-color">
                                                <td style="width:5%">{{ $productCategory->id }}</td>
                                                <td>{{ $productCategory->name }}</td>
                                                <td class="d-flex justify-content-end">
                                                  @if($productCategory->features->count() == 0)
                                                    <a href="{{ $productCategory->id }}" data-toggle="modal" class="btn btn-outline-secondary btn-sm font-14 font-weight-bolder iranyekan m-1"
                                                      data-target="#ShowFeatureModal{{ $productCategory->id }}"><i class="fas fa-eye ml-1"></i></a>
                                                    @else
                                                    <a href="{{ $productCategory->id }}" data-toggle="modal" class="btn btn-outline-secondary btn-sm font-14 font-weight-bolder iranyekan m-1"
                                                      data-target="#ShowFeatureModal{{ $productCategory->id }}"><i class="fas fa-eye ml-1"></i>مشاهده ویژگی ها</a>
                                                    @endif

                                                    <a class="btn btn-outline-pink btn-sm font-14 iranyekan m-1" href="{{ route('feature.edit', $productCategory->id) }}"><i class="fas fa-edit ml-1"></i>ویرایش ویژگی ها</a>
                                                    <div class="d-none icon-show">
                                                        {{-- <a href="{{ $productCategory->id }}" id="editCat" data-toggle="modal" data-target="#UpdateProductCategoryModal{{ $productCategory->id }}"><i
                                                          class="far fa-edit text-info mr-1 button font-15"></i>
                                                        </a> --}}
                                                        {{-- <a href="" id="removeCat" data-name="{{ $productCategory->name }}" data-id="{{ $productCategory->id }}"><i class="far fa-trash-alt text-danger font-15"></i></a> --}}
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
    <script src="/dashboard/assets/plugins/dropify/js/dropify.min.js"></script>
    <script src="/dashboard/assets/pages/jquery.form-upload.init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".dropify-clear").remove();
        });
    </script>
    <script>
        oTable = $('#datatable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object,
        $('#myInputTextField').keyup(function() {
            oTable.search($(this).val()).draw();
        })
    </script>
    <script>
        $(document).on('click', '#removeCat', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            swal(` ${'حذف دسته بندی:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                    dangerMode: true,
                    icon: "warning",
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
                        toastr.warning('لغو شد.', '', []);
                    }
                });
        });
    </script>

    <script>
        $(document).on('click', '#icon-delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            swal(` ${'حذف عکس دسته بندی:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                    dangerMode: true,
                    icon: "warning",
                    buttons: ["انصراف", "حذف"],
                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "post",
                            url: "{{url('dashboard/shop/product-category/icon/delete')}}",
                            data: {
                                id: id,
                                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                            },
                            success: function(data) {
                                $(".dropify-preview").addClass('d-none');
                            }
                        });
                    } else {
                        toastr.warning('لغو شد.', '', []);
                    }
                });
        });
    </script>

    @if(session()->has('flashModal'))
        <script>
            $('#AddProductCategoryModal').modal('show');
        </script>
        @endif
        @stop
