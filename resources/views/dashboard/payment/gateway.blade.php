@extends('dashboard.layouts.master')
@section('content')



@foreach ($gateways as $gateway)
    <!-- Modal -->
<div class="modal fade" id="EditGatewayModal{{$gateway->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$gateway->id}}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">ویرایش درگاه پرداخت اینترنتی </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('gateway.update', $gateway->id) }}">
                            @csrf
                            {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">اطلاعات وبسایت</h4>
                                        <p class="text-muted mb-3">لطفا در این قسمت اطلاعات وبسایت خود را وارد نموده و برروی گزینه ارسال اطلاعات کلیک نمایید.</p><br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                           class="col-sm-2 col-form-label text-center">نام</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="name" value="{{ $gateway->name }}"
                                                               id="example-text-input">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label style="text-align: center" for="example-email-input"
                                                           class="col-sm-2 col-form-label text-center">کیف </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" style="font-family: BYekan!important;margin-right: 10px;" name="wallet_id" id="">
                                                            @foreach ($wallets as $wallet)
                                                                <option style="font-family: BYekan!important;" {{ $gateway->wallet_id == $wallet->id ? 'selected' : '' }} value="{{ $wallet->id }}">{{ $wallet->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-sm-2 col-form-label text-center">آدرس </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="url" value="{{ $gateway->name }}" id="example-search-input">
                                                        <input type="hidden" name="id" value="{{ $gateway->id }}" id="example-search-input">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label style="text-align: center" for="example-email-input"
                                                           class="col-sm-2 col-form-label text-center">دسته بندی </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" style="font-family: BYekan!important;margin-right: 10px;" name="category" id="">
                                                            <option style="font-family: BYekan!important;" >انتخاب دسته بندی</option>
                                                            <option style="font-family: BYekan!important;" {{ $gateway->category == 'سایت فروشگاهی' ? 'selected' : '' }} value="سایت فروشگاهی">سایت فروشگاهی</option>
                                                            <option style="font-family: BYekan!important;" {{ $gateway->category == 'سایت شخصی' ? 'selected' : '' }} value="سایت شخصی">سایت شخصی</option>
                                                            <option style="font-family: BYekan!important;" {{ $gateway->category == 'سایت اطلاع‌رسانی' ? 'selected' : '' }} value="سایت اطلاع‌رسانی">سایت اطلاع‌رسانی</option>
                                                            <option style="font-family: BYekan!important;" {{ $gateway->category == 'سایت خدمات آنلاین' ? 'selected' : '' }} value="سایت خدمات آنلاین">سایت خدمات آنلاین</option>
                                                            <option style="font-family: BYekan!important;" {{ $gateway->category == 'شبکه‌ی اجتماعی' ? 'selected' : '' }} value="شبکه‌ی اجتماعی">شبکه‌ی اجتماعی</option>
                                                            <option style="font-family: BYekan!important;" {{ $gateway->category == 'تالار گفتگو( فروم )' ? 'selected' : '' }} value="تالار گفتگو( فروم )">تالار گفتگو( فروم )</option>
                                                            <option style="font-family: BYekan!important;" {{ $gateway->category == 'سایت آرشیو' ? 'selected' : '' }} value="سایت آرشیو">سایت آرشیو</option>
                                                            <option style="font-family: BYekan!important;" {{ $gateway->category == 'وبلاگ' ? 'selected' : '' }} value="وبلاگ">وبلاگ</option>
                                                            <option style="font-family: BYekan!important;" {{ $gateway->category == 'وبسایت‌های بازی یا تفریحی' ? 'selected' : '' }} value="وبسایت‌های بازی یا تفریحی">وبسایت‌های بازی یا تفریحی</option>
                                                            <option style="font-family: BYekan!important;" {{ $gateway->category == 'وبسایت‌های علمی و دانشگاهی' ? 'selected' : '' }} value="وبسایت‌های علمی و دانشگاهی">وبسایت‌های علمی و دانشگاهی</option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-ld-12">



                                            <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-2 col-form-label text-center">توضیحات</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="description" id="description" cols="30" rows="3">{{$gateway->description}}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>


                        <div style="display: inline" class="modal-footer">
                            <a style="float:right;" class="btn btn-danger" href="{{ route('gateway.delete', $gateway->id) }}">حذف کارت</a>
                            <button type="submit" style="float:left;" class="btn btn-primary">ثبت ویرایش</button>
                        </div>

                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endforeach





    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">افزودن درگاه پرداخت اینترنتی جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('gateway.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">اطلاعات وبسایت</h4>
                                        <p class="text-muted mb-3">لطفا در این قسمت اطلاعات وبسایت خود را وارد نموده و برروی گزینه ارسال اطلاعات کلیک نمایید.</p><br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                           class="col-sm-2 col-form-label text-center">نام</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="name" placeholder="مثال: پایان پی"
                                                                id="example-text-input">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label style="text-align: center" for="example-email-input"
                                                           class="col-sm-2 col-form-label text-center">کیف </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" style="font-family: BYekan!important;margin-right: 10px;" name="wallet_id" id="">
                                                            @foreach ($wallets as $wallet)
                                                                <option style="font-family: BYekan!important;" value="{{ $wallet->id }}">{{ $wallet->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-sm-2 col-form-label text-center">آدرس </label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="url" placeholder="مثال: www.payanpay.ir" id="example-search-input">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label style="text-align: center" for="example-email-input"
                                                           class="col-sm-2 col-form-label text-center">دسته بندی </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" style="font-family: BYekan!important;margin-right: 10px;" name="category" id="">
                                                            <option style="font-family: BYekan!important;" >انتخاب دسته بندی</option>
                                                            <option style="font-family: BYekan!important;" value="سایت فروشگاهی">سایت فروشگاهی</option>
                                                            <option style="font-family: BYekan!important;" value="سایت شخصی">سایت شخصی</option>
                                                            <option style="font-family: BYekan!important;" value="سایت اطلاع‌رسانی">سایت اطلاع‌رسانی</option>
                                                            <option style="font-family: BYekan!important;" value="سایت خدمات آنلاین">سایت خدمات آنلاین</option>
                                                            <option style="font-family: BYekan!important;" value="شبکه‌ی اجتماعی">شبکه‌ی اجتماعی</option>
                                                            <option style="font-family: BYekan!important;" value="تالار گفتگو( فروم )">تالار گفتگو( فروم )</option>
                                                            <option style="font-family: BYekan!important;" value="سایت آرشیو">سایت آرشیو</option>
                                                            <option style="font-family: BYekan!important;" value="وبلاگ">وبلاگ</option>
                                                            <option style="font-family: BYekan!important;" value="وبسایت‌های بازی یا تفریحی">وبسایت‌های بازی یا تفریحی</option>
                                                            <option style="font-family: BYekan!important;" value="وبسایت‌های علمی و دانشگاهی">وبسایت‌های علمی و دانشگاهی</option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-ld-12">



                                            <div class="form-group row">
                                                <label for="example-url-input" class="col-sm-2 col-form-label text-center">توضیحات</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="description" id="description" cols="30" rows="3"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                        </div>



                        <div class="form-actions text-center  pb-3  ">
                            <button style="font-family: iranyekan!important;" type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> ارسال اطلاعات
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">درگاه های پرداخت اینترنتی شما</a></li>
                        <li class="breadcrumb-item active">داشبورد پین پی</li>
                    </ol>
                </div>
                <h4 class="page-title">داشبورد اصلی</h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">مجموع موجودی شما</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">{{ $gateways->sum('amount') }} تومان </h3></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>

        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد درگاه ها</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">{{ $gateways->count() }}</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تاریخ آخرین تسویه </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">1398/05/29 </h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">مجموع تسویه های شما </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">    100,301,000 تومان </h3></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->


@include('dashboard.layouts.errors')

    <div class="text-right mb-3">
        <button type="button" class="btn btn-dark waves-effect success" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">افزودن درگاه پرداخت اینترنتی</button>
    </div>

    <div class="row">

       @foreach ($gateways as $gateway)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="gateway-bal-usd">
                                    <center><h4>نام درگاه: {{ $gateway->name }}</h4></center> <br>
                                    <h5 class="gateway-title m-0">آدرس سایت:</h5>
                                    <h3 class="text-center">{{ $gateway->url }} </h3></div>
                                <div  class="text-center pt-4">
                                    <a href="{{ route('transactionReport.gateway', $gateway->id) }}"><button class="btn btn-success btn-sm px-3">لیست تراکنش ها</button></a>
                                    <a href="" data-toggle="modal" data-target="#EditGatewayModal{{$gateway->id}}"><span class="btn btn-danger btn-sm px-3"> ویرایش و حذف </span></a>

                                    <!-- Button trigger modal -->


                                    <br><br><span style="margin-top: 10px; font-family: BYekan!important;" class="text-muted font-12">آخرین بروزرسانی: {{ jdate($gateway->updated_at) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                    <div class="card-body pt-0">
                        <ul class="list-group gateway-bal-crypto">
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media"><i style="padding-left: 15px;" class="dripicons-cart card-eco-icon text-secondary align-self-center"></i>
                                    <div class="media-body align-self-center">
                                        <div class="coin-bal">
                                            <h3 class="m-0">کد پایان پی:</h3>
                                            <p class="text-muted mb-0">{{ $gateway->key }}</p>
                                        </div>
                                    </div>
                                    <!--end media body-->
                                </div><span class="badge badge-soft-purple">جهت استفاده در API</span></li>
                        </ul>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
       @endforeach




    </div>

    <!--end row-->

@endsection


@section('pageScripts')
@stop
