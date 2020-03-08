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
                            <li class="breadcrumb-item ">اپلیکیشن</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <div class="text-right">
            <form action="{{ route('application.applicatio-request') }}" method="post" id="apprequest">
                @csrf
                @if (\auth::user()->shop->tickets->where('title', 'درخواست اپلیکیشن')->count() > 0)
                <a href="javascript:$('#apprequest').submit();" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded mt-4 comming-soon"><i class="fa fa-plus mr-2"></i>شما قبلا درخواست اپلیکیشن را ارسال کرده اید</a>
              @else

                <a href="javascript:$('#apprequest').submit();" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded mt-4"><i class="fa fa-plus mr-2"></i>درخواست اپلیکیشن جدید</a>

                @endif

            </form>
        </div>
        @include('dashboard.layouts.errors')



        {{-- edit --}}
        <div class="modal fade bd-example-modal-xl" id="UpdateApplicationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ویرایش اطلاعات اپلیکیشن</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                        <form action="{{ route('application.update', ['id' => $appInformation->id, 'shop' => $shop->english_name]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>عنوان اپلیکیشن :</span></div>
                                    <input type="text" class="form-control inputfield" name="title" value="{{ $appInformation->title }}">
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>رنگ اول :</span></div>
                                    <input type="color" class="form-control inputfield" id="favcolor" name="color_1" value="{{ $appInformation->color_1 }}"><br><br>
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>رنگ دوم :</span></div>
                                    <input type="color" class="form-control inputfield" id="favcolor" name="color_2" value="{{ $appInformation->color_2 }}"><br><br>
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>رنگ سوم :</span></div>
                                    <input type="color" class="form-control inputfield" id="favcolor" name="color_3" value="{{ $appInformation->color_3 }}"><br><br>
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


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">اطلاعات اپلیکیشن شما</h4>
                        <p class="text-muted mb-4 font-13">در این بخش میتوانید اطلاعات اپلیکیشن اختصاصی فروشگاه خود را ملاحظه کنید. اگر تاکنون اقدام به دریافت اپلیکیشن نکرده اید میتوانید با کلیک بر روی گزینه درخواست اپلیکیشن , اپلیکیشن جدید خود را
                            دریافت کنید و یا برای تغییر آن گزینه ی درخواست اپلیکیشن جدید را انتخاب نمایید..</p>
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
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">عنوان اپلیکیشن
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending"> رنگ اول
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending"> رنگ دوم
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending"> رنگ سوم
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending"> قابلیت خرید از اپلیکیشن
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="iranyekan">

                                            <tr role="row" class="odd icon-hover hover-color">
                                                <td>1</td>
                                                <td>
                                                    {{ $appInformation->title }}
                                                </td>
                                                <td>
                                                    <div class="tt-collapse-content" style="display: block;">
                                                        <ul class="tt-options-swatch options-middle">
                                                            <li>
                                                                <a class="options-color tt-border tt-color-bg-08" href="#" style="background-color:#{{ $appInformation->color_1 }}"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tt-collapse-content" style="display: block;">
                                                        <ul class="tt-options-swatch options-middle">
                                                            <li>
                                                                <a class="options-color tt-border tt-color-bg-08" href="#" style="background-color:#{{ $appInformation->color_2 }}"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tt-collapse-content" style="display: block;">
                                                        <ul class="tt-options-swatch options-middle">
                                                            <li>
                                                                <a class="options-color tt-border tt-color-bg-08" href="#" style="background-color:#{{ $appInformation->color_3 }}"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    @csrf {{ method_field('put') }}
                                                    <button class="btn btn-link change" type="submit" data-id="{{ $appInformation->id }}" data-shop="{{ $shop->english_name }}">
                                                        @if($appInformation->sell == "enable")
                                                            <i class="fa fa-toggle-on text-success show{{ $appInformation->id }}"></i>
                                                            <i class="fa fa-toggle-off text-muted d-none {{ $appInformation->id }}"></i>
                                                            @else
                                                            <i class="fa fa-toggle-on text-success d-none {{ $appInformation->id }}"></i>
                                                            <i class="fa fa-toggle-off text-muted show{{ $appInformation->id }}"></i>
                                                            @endif
                                                    </button>
                                                    @if ($appInformation->sell == "enable")
                                                    <span class="badge badge-soft-success show{{ $appInformation->id }}">
                                                        {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusEnable') }}
                                                    </span>
                                                    <span class="badge badge-soft-pink d-none {{ $appInformation->id }}">
                                                        {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusDisable') }}
                                                    </span>
                                                    @else
                                                    <span class="badge badge-soft-success d-none {{ $appInformation->id }}">
                                                        {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusEnable') }}
                                                    </span>
                                                    <span class="badge badge-soft-pink show{{ $appInformation->id }}">
                                                        {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusDisable') }}
                                                    </span>
                                                    @endif

                                                    <div class="d-none icon-show">
                                                        <a href="{{ $appInformation->id }}" id="editAppInfo" title="ویرایش" data-toggle="modal" data-target="#UpdateApplicationModal"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

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
<script src="{{ asset('/dashboard/assets/js/admin-application.js') }}"></script>
@stop
