@extends('dashboard.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">برند ها</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <div class="text-right">
            <a href="#" data-toggle="modal" data-target="#AddProductCategoryModal" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded"><i class="fa fa-plus mr-2"></i>اضافه کردن برند</a>
        </div>
        @include('dashboard.layouts.errors')
        <div class="modal fade bd-example-modal-xl" id="AddProductCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">افزودن برند جدید</h5>
                        <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                        <form action="{{ route('brand.store', ['continue' => 1, 'shop' => $shop->english_name]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140"  id="basic-addon7"> <i
                                       class="fas fa-star required-star mr-1"></i>نام برند :</span></div>
                                    <input type="text" class="form-control inputfield" value="{{ old('name') }}" name="name" placeholder="مثال: ورزشی">
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">آیکون برند</h4>
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
        @foreach($brands as $brand)
        <div class="modal fade bd-example-modal-xl" id="UpdateProductCategoryModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ویرایش برند</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                        <form action="{{ route('brand.update', ['id' => $brand->id, 'shop' => $shop->english_name]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                       class="fas fa-star required-star mr-1"></i>نام برند:</span></div>
                                    <input type="text" class="form-control inputfield" name="name" value="{{ old('name', $brand->name) }}">
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">آیکون برند</h4>
                                        <a class="mr-2 font-15" href="" id="icon-delete" title="حذف آیکون" data-name="{{ $brand->name }}" data-id="{{ $brand->id }}"><i class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>
                                        <input type="file" id="input-file-now" name="icon" class="dropify" data-default-file="{{ $brand->icon['original'] }}">
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
                        <h4 class="mt-0 header-title">لیست برند ها</h4>
                        <p class="text-muted mb-4 font-13">در این بخش میتوانید لیست تمامی برند های فروشگاه را مشاهده نمایید . همچنین در این بخش قادر خواهید بود که برند جدید به فروشگاه خود اضافه کنید یا آن ها را ویرایش کنید و یا حذف نمایید . لازم بذکر میباشد که در هنگام ساخت محصول جدید میتوانید برند مورد نظر خود را به محصول اختصاص دهید.</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="searchBox bg-dark" style="margin-top: -15px;">
                                        <input type="text" id="myInputTextField" class="searchInput">
                                        <button class="searchButton" href="#">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">

                                    <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                      aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شناسه
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">آیکون برند
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نام برند
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="iranyekan">
                                          @php
                                            $id = 1;
                                          @endphp
                                            @foreach($brands as $brand)
                                            <tr role="row" class="odd icon-hover hover-color">
                                                <td>{{ $id }}</td>
                                                <td>
                                                    @if($brand->icon == null) <img src="{{ asset('/dashboard/assets/images/img-na.png') }}" class="rounded w-27" alt="">
                                                    @endif <img src="{{ $brand->icon['250,250'] }}" class="rounded" alt="">
                                                </td>
                                                <td>{{ $brand->name }}
                                                  <div class="d-none icon-show">
                                                      <a href="{{ $brand->id }}" id="editBrand" title="ویرایش" data-toggle="modal" data-target="#UpdateProductCategoryModal{{ $brand->id }}"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                                      </a>
                                                      <a href="" id="removeBrand" title="حذف" data-name="{{ $brand->name }}" data-id="{{ $brand->id }}"><i class="far fa-trash-alt text-danger font-15"></i></a>
                                                      <a href="{{ route('brand', ['shop'=>$shop->english_name, 'categroyId'=>$brand->id]) }}" target="_blank"><i class="fa fa-eye text-success mr-1 button font-15"></i>
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
      <script src="{{ asset('/dashboard/assets/js/admin-brand.js') }}"></script>

      @if(session()->has('flashModal'))
          <script>
              $('#AddProductCategoryModal').modal('show');
          </script>
          @endif
        @stop
