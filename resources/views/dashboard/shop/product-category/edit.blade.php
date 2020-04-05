@extends('dashboard.layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol style="direction: ltr" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">داشبورد</a></li>
                    <li class="breadcrumb-item active">دسته بندی</li>
                </ol>
            </div>
            <h4 class="page-title">ویرایش دسته بندی</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
@include('dashboard.layouts.errors')




<div class="tab-content">

    <div class="tab-pane fade in show active" id="info" role="tabpanel">
        <form method="post" action="{{ route('product-category.update', ['id' => $category->id, 'shop' => $shop->english_name]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mt-0 header-title">ویرایش دسته بندی</h3>
                            <p class="text-muted mb-3">در این بخش میتوانید دسته بندی خود را ویرایش نمایید.</p><br>
                            <div class="row">

                                <div class="form-group mb-0 col-12">
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                                  class="fas fa-star required-star mr-1"></i>{{ __('dashboard-shop-product-category.editCategoryItem1') }} :</span></div>
                                        <input type="text" class="form-control inputfield" name="name" value="{{ old('name', $category->name) }}">
                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-category.editCategoryItem2') }}:</span></div>
                                        <select class="form-control inputfield" name="parent_id">
                                            @if($category->parent == null)
                                                <option value="null">{{ __('dashboard-shop-product-category.editCategoryItem2Main') }}</option>
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
                                        <input type="text" class="form-control inputfield" name="description" value="{{ old('description', $category->description) }}">
                                    </div>

                                    <div class="card mt-3 border">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">تصویر خدمت</h4>
                                            <a class="mr-2 font-15" href="" id="icon-delete" title="حذف آیکون" data-name="{{ $category->name }}" data-id="{{ $category->id }}"><i class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>

                                            <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="{{ $category->icon['original'] }}">
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->

                <!--end col-->
            </div>


            <div class="text-right mb-3">
                <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan rounded ">ثبت تغییرات</button><br>
            </div>
        </form>
    </div>
</div>

@endsection
@section('pageScripts')
<script src="{{ asset('/dashboard/assets/js/admin-product-category.js') }}"></script>
@if(session()->has('flashModal'))
    <script>
        $('#AddProductCategoryModal').modal('show');
    </script>
    @endif
    @stop
