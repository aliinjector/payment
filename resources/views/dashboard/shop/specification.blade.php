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
                            <li class="breadcrumb-item ">خصوصیات</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <div class="text-right">
            <a href="#" data-toggle="modal" data-target="#AddProductCategoryModal" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded"><i class="fa fa-plus mr-2"></i>اضافه کردن خصوصیت </a>
        </div>
        @include('dashboard.layouts.errors')
        <div class="modal fade bd-example-modal-xl" id="AddProductCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">افزودن خصوصیت جدید</h5>
                        <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                        <form action="{{ route('specification.store', ['continue' => 1, 'shop' => $shop->english_name]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> <i class="fas fa-star required-star mr-1"></i>نام خصوصیت :</span></div>
                                    <input type="text" class="form-control inputfield" value="{{ old('name') }}" name="name" placeholder="مثال: سایز">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>نحوه نمایش خصوصیت :</span>
                                    </div>
                                    <select class="form-control inputfield" name="type" id="">
                                        <option style="font-family: iranyekan!important;" value="checkbox">
                                          چند انتخابی
                                        </option>
                                        <option style="font-family: iranyekan!important;" value="radio" selected="selected">
                                          تک انتخابی
                                        </option>
                                    </select>
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
        @foreach($specifications as $specification)
        <div class="modal fade bd-example-modal-xl" id="UpdateProductCategoryModal{{ $specification->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ویرایش خصوصیت</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                        <form action="{{ route('specification.update', ['id' => $specification->id, 'shop' => $shop->english_name]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>نام خصوصیت:</span></div>
                                    <input type="text" class="form-control inputfield" name="name" value="{{ old('name', $specification->name) }}">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>نحوه نمایش خصوصیت :</span>
                                    </div>
                                    <select class="form-control inputfield" name="type" id="">
                                        <option style="font-family: iranyekan!important;" value="checkbox">
                                          چند انتخابی
                                        </option>
                                        <option style="font-family: iranyekan!important;" value="radio">
                                          تک انتخابی
                                        </option>
                                    </select>
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
                        <h4 class="mt-0 header-title">لیست خصوصیات</h4>
                        <p class="text-muted mb-4 font-13">در این بخش میتوانید برای محصولات فروشگاه خود خصوصیات با انواع مختلف در نظر بگیرید مانند سایز , رنگ , نوع و ... همچنین قادر هستید برای خصوصیت تعیین شده قیمت مشخص کرده و در هنگام خرید به قیمت
                            اصلی کالا اضافه کنید.</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="searchBox bg-dark" style="margin-top: -15px;">
                                        <input type="text" id="myInputTextField" class="searchInput">
                                        <button class="searchButton" href="#">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                          aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شناسه
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نام خصوصیت
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نحوه نمایش خصوصیت
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="iranyekan">
                                                @php
                                                $id = 1;
                                                @endphp
                                                @foreach($specifications as $specification)
                                                <tr role="row" class="odd icon-hover hover-color">
                                                    <td>{{ $id }}</td>
                                                    <td>
                                                      {{ $specification->name }}
                                                    </td>
                                                    <td>{{ $specification->type == 'radio' ? 'تک انتخابی'  : 'چند انتخابی'}}
                                                        <div class="d-none icon-show">
                                                            <a href="{{ $specification->id }}" id="editBrand" title="ویرایش" data-toggle="modal" data-target="#UpdateProductCategoryModal{{ $specification->id }}"><i
                                                                  class="far fa-edit text-info mr-1 button font-15"></i>
                                                            </a>
                                                            <a href="" id="removeSpecification" title="حذف" data-name="{{ $specification->name }}" data-id="{{ $specification->id }}"><i class="far fa-trash-alt text-danger font-15"></i></a>
                                                            <a href="{{ route('specification-item.main', ['id' => $specification->id]) }}" title="گزینه ها"><i class="fa fa-tasks text-success mr-1 button font-17"></i>
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
    <script src="{{ asset('/dashboard/assets/js/admin-specification.js') }}"></script>

    @if(session()->has('flashModal'))
        <script>
            $('#AddProductCategoryModal').modal('show');
        </script>
        @endif
        @stop
