@extends('dashboard.layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol style="direction: ltr" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">داشبورد</a></li>
                    <li class="breadcrumb-item active">ویژگی های دسته بندی ها</li>
                </ol>
            </div>
            <h4 class="page-title">ویرایش ویژگی ها</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
@include('dashboard.layouts.errors')




<div class="tab-content">

    <div class="tab-pane fade in show active" id="info" role="tabpanel">
        <form method="post" action="{{ route('feature.update', ['productCategoryFeatureid'=>$productCategoryFeature->id , 'cat_id' => $category->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mt-0 header-title">ویرایش ویژگی ها</h3>
                            <p class="text-muted mb-3">در این بخش میتوانید ویژگی های دسته بندی مورد نظر خود را ویرایش نمایید.</p><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row py-4">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نام ویژگی</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control inputfield" name="name" value="{{ $productCategoryFeature->name }}">
                                        </div>
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">آیکون ویژگی</label>
                                        <div class="col-sm-10 mt-2">
                                            <input type="file" id="input-file-now" name="icon[]" class="dropify" data-default-file="{{ $productCategoryFeature->icon['original'] }}">
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
@stop
