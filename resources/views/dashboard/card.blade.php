@extends('dashboard.layouts.master')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">کارت های بانکی شما</a></li>
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
                    <h4 class="title-text mt-0">تعداد کل کارت های بانکی شما</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۲ </h3><i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد کارت های تایید شده</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۲</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">کارت های در انتظار تایید </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۰ </h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">کارت های تایید نشده </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۰</h3><i class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->


<div class="row">


    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="media"><img src="/images/banks/sepah.png" height="90" class="mr-3" alt="کارت بانکی">
                    <div class="media-body align-self-center">
                        <div class="mb-2">
                            <span class="badge badge-primary px-3">بانک سپه</span>
                            <span class="ml-2 text-muted">تاریخ افزودن:۹۸/۵/۲۹</span>
                        </div>
                        <br><span class="font-18 d-block font-weight-normal text-center">5892101028096325</span>
                        <br><span style="display: inline;float: right;" class="font-13 d-inline font-weight-normal text-left">علی رحمانی</span>
                        <span style="display: inline;float: left;" class="font-13 d-inline font-weight-normal text-right">تاریخ انقضا: ۱۴۰۰/۱۰</span>
                    </div>                    <!--end media body-->
                </div>
                <!--end media-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>



    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="media"><img src="/images/banks/mellat.png" height="90" class="mr-3" alt="کارت بانکی">
                    <div class="media-body align-self-center">
                        <div class="mb-2">
                            <span class="badge badge-primary px-3">بانک ملت</span>
                            <span class="ml-2 text-muted">تاریخ افزودن:۹۸/۵/۲۹</span>
                        </div>
                        <br><span class="font-18 d-block font-weight-normal text-center">6104337862241047</span>
                        <br><span style="display: inline;float: right;" class="font-13 d-inline font-weight-normal text-left">علی رحمانی</span>
                        <span style="display: inline;float: left;" class="font-13 d-inline font-weight-normal text-right">تاریخ انقضا: ۱۴۰۰/۱۱</span>
                    </div>                    <!--end media body-->
                </div>
                <!--end media-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>




</div>


    <!--end row-->

@endsection


@section('pageScripts')
@stop
