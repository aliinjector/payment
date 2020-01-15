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
                            <li class="breadcrumb-item ">ویژگی های دسته بندی {{ $category->name }}</li>
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
                        <form action="{{ route('feature.store',['continue'=>1, 'cat_id' => $category->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">نام ویژگی :</span></div>
                                    <input type="text" class="form-control inputfield" name="name" placeholder="مثال: ورزشی">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">دسته بندی ویژگی:</span></div>
                                    <select class="form-control inputfield" name="productCat_id" id="">
                                        <option style="font-family: BYekan!important;" selected value="{{ $category->id }}">{{ $category->name }}
                                        </option>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">ویژگی های دسته بندی {{ $category->name }}</h4>
                        <p class="text-muted mb-4 font-13">در این بخش میتوانید ویژگی های هر دسته بندی را مشاهده کنید . همچنین میتوانید  برای دسته بندی های خود ویژگی های متعدد تعریف کنید و یا آن ها را ویرایش و یا حذف کنید. لازم بذکر میباشد که این ویژگی ها در هنگام مقایسه محصولات شما به نمایش در می آیند.</p>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="searchBox bg-dark" style="bottom:97%">
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
                                                    ویژگی
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="iranyekan">
                                          @php
                                            $id = 1;
                                          @endphp
                                            @foreach($categoryFeatures as $categoryFeature)
                                            <tr role="row" class="odd icon-hover hover-color">
                                                <td style="width:5%">{{ $id }}</td>
                                                <td class="d-flex justify-content-between">{{ $categoryFeature->name }}
                                                  <div class="d-none icon-show">
                                                  <a href="{{ route('feature.edit', ['productCategoryFeatureid'=>$categoryFeature->id , 'cat_id' => $category->id]) }}"><i
                                                     class="far fa-edit text-info mr-1 button font-18"></i>
                                                  </a>
                                                  <a href="" id="removeFeature" data-name="{{ $categoryFeature->name }}" data-id="{{ $categoryFeature->id }}"><i class="fa-trash-alt far text-danger"></i></a>
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
        $(document).on('click', '#removeFeature', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            swal(` ${'حذف ویژگی:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                    dangerMode: true,
                    icon: "warning",
                    buttons: ["انصراف", "حذف"],
                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "post",
                            url: "{{url('admin-panel/shop/categrory-managment/feature/delete')}}",
                            data: {
                                id: id,
                                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                            },
                            success: function(data) {
                                var url = document.location.origin + "/admin-panel/shop/categrory-managment/feature/?cat_id={{ $category->id }}";
                                location.href = url;
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
