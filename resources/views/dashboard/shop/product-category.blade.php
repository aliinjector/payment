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
                            <li class="breadcrumb-item "> دسته بندی </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <div class="text-right">
            <a href="#" data-toggle="modal" data-target="#AddProductCategoryModal" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded"><i class="fa fa-plus mr-2"></i>اضافه کردن دسته بندی</a>
        </div>
        @include('dashboard.layouts.errors')
        <div class="modal fade bd-example-modal-xl" id="AddProductCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">افزودن دسته بندی جدید</h5>
                        <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                        <form action="{{ route('product-category.store', ['continue', 1]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان دسته بندی :</span></div>
                                    <input type="text" class="form-control inputfield" name="name" placeholder="مثال: ورزشی">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">شاخه دسته بندی:</span></div>
                                    <select class="form-control inputfield" name="parent_id">
                                        <option selected value="null">دسته بندی اصلی</option>
                                        @foreach($categoires as $category)
                                        @unless($category->parent()->get()->first() != null and $category->parent()->get()->first()->parent()->get()->first() != null and
                                            $category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first() != null and
                                            $category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->exists() and
                                            !$category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->exists())
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endunless
                                            @endforeach
                                    </select>
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات دسته بندی :</span></div>
                                    <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد دسته بندی">
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">آیکون دسته بندی</h4>
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
        @foreach($categoires as $category)
        <div class="modal fade bd-example-modal-xl" id="UpdateProductCategoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ویرایش دسته بندی</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                        <form action="{{ route('product-category.update', $category->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان دسته بندی :</span></div>
                                    <input type="text" class="form-control inputfield" name="name" value="{{ $category->name }}">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">شاخه دسته بندی:</span></div>
                                    <select class="form-control inputfield" name="parent_id">
                                        @if($category->parent == null)
                                            <option value="null">دسته بندی اصلی</option>
                                            @endif
                                            @foreach($categoires as $singleCategory)
                                            @unless($singleCategory->parent()->get()->first() != null and $singleCategory->parent()->get()->first()->parent()->get()->first() != null and
                                                $singleCategory->parent()->get()->first()->parent()->get()->first()->parent()->get()->first() != null and
                                                $singleCategory->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->exists() and
                                                !$singleCategory->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->exists())
                                                <option value="{{ $singleCategory->id }}" @if($category->parent != null) @if($singleCategory->id == $category->parent->id) selected
                                                        @endif
                                                        @endif >{{ $singleCategory->name }}</option>
                                                @endunless
                                                @endforeach
                                    </select>
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات دسته بندی :</span></div>
                                    <input type="text" class="form-control inputfield" name="description" value="{{ $category->description }}">
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">آیکون دسته بندی</h4>
                                        <a class="mr-2 font-15" href="" id="icon-delete" title="حذف آیکون" data-name="{{ $category->name }}" data-id="{{ $category->id }}"><i class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>

                                        <input type="file" id="input-file-now" name="icon" class="dropify" data-default-file="{{ $category->icon['original'] }}">
                                    </div>
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
                        <h4 class="mt-0 header-title">لیست دسته بندی ها</h4>
                        <p class="text-muted mb-4 font-13">در این بخش میتوانید لیست تمامی دسته بندی های فروشگاه را مشاهده کنید. همچنین میتوانید زیر دسته ها و شاخه های اصلی که هر دسته بندی دارا میباشد را به تفکیک مشاهده نمایید.همچنین میتوانید دسته بندی مورنظر خود را حذف , ویرایش و یا محصولات این دسته بندی را ملاحظه کنید.</p>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="searchBox">
                                        <input type="text" id="myInputTextField" class="searchInput">
                                        <button class="searchButton" href="#">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">

                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شناسه
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">آیکون
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 15px;">نام
                                                    دسته بندی
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">شاخه دسته بندی</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 205px;">توضیحات</th>
                                            </tr>
                                        </thead>
                                        <tbody class="iranyekan">
                                          @php
                                            $id = 1;
                                          @endphp
                                            @foreach($categoires as $category)
                                            <tr role="row" class="odd icon-hover hover-color">
                                                <td style="width:5%">{{ $id }}</td>
                                                <td style="width:5%">
                                                    @if($category->icon == null) <img src="{{ asset('/dashboard/assets/images/img-na.png') }}" class="rounded w-100" alt="">
                                                        @endif <img src="{{ $category->icon['80,80'] }}" class="rounded" alt="">
                                                </td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    @if($category->parent()->exists() and !$category->parent()->get()->first()->parent()->exists())
                                                        {{ $category->parent()->get()->first()->name}}
                                                        @elseif($category->parent()->get()->first() != null and $category->parent()->get()->first()->parent()->exists() and
                                                            !$category->parent()->get()->first()->parent()->get()->first()->parent()->exists())
                                                            {{ $category->parent()->get()->first()->parent()->get()->first()->name}} > {{ $category->parent()->get()->first()->name}}
                                                            @elseif($category->parent()->get()->first() != null and $category->parent()->get()->first()->parent()->get()->first() != null and
                                                                $category->parent()->get()->first()->parent()->get()->first()->parent()->exists() and
                                                                !$category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->exists())
                                                                {{ $category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->name}} > {{ $category->parent()->get()->first()->parent()->get()->first()->name}} >
                                                                {{ $category->parent()->get()->first()->name}}
                                                                @elseif($category->parent()->get()->first() != null and $category->parent()->get()->first()->parent()->get()->first() != null and
                                                                    $category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first() != null and
                                                                    $category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->exists() and
                                                                    !$category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->exists())
                                                                    {{ $category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->name}} >
                                                                    {{ $category->parent()->get()->first()->parent()->get()->first()->parent()->get()->first()->name}} > {{ $category->parent()->get()->first()->parent()->get()->first()->name}} >
                                                                    {{ $category->parent()->get()->first()->name}}
                                                                    @else
                                                                    دسته بندی اصلی
                                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-between">
                                                    {{ $category->description }}
                                                    <div class="d-none icon-show">
                                                        <a href="{{ $category->id }}" id="editCat" data-toggle="modal" data-target="#UpdateProductCategoryModal{{ $category->id }}"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                                        </a>
                                                        <a href="" id="removeCat" data-name="{{ $category->name }}" data-id="{{ $category->id }}"><i class="far fa-trash-alt text-danger font-15"></i></a>
                                                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$category->id]) }}"><i class="fa fa-eye text-success mr-1 button font-15"></i>
                                                        </a>
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
    $( document ).ready(function() {
      $( ".dropify-clear" ).remove();
      });
    </script>
    <script>
        oTable = $('#datatable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
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
                            $( ".dropify-preview" ).addClass('d-none');
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
