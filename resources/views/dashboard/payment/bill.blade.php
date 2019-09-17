@extends('dashboard.layouts.master')
@section('content')


    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">پرداخت قبوض</a></li>
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
                    <h4 class="title-text mt-0">تعداد قبض های پرداخت شده</h4>
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
                    <h4 class="title-text mt-0">تعداد پرداختی های تایید نشده</h4>
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
                    <h4 class="title-text mt-0">تعداد قبض های در انتظار </h4>
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
                    <h4 class="title-text mt-0">پرداخت های ناموفق </h4>
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

    @include('dashboard.layouts.errors')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p class="mt-4 mb-4" style="text-align: center"><img class="text-center" src="/dashboard/assets/images/bills.PNG" alt=""></p>
                    <h4 class="mt-0 header-title">اطلاعات قبض</h4>
                    <p class="text-muted mb-3 pt-2">جهت پرداخت قبض، لطفا شناسه قبض و شناسه پرداخت را وارد نمایید</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">شناسه قبض:</label>
                                <div class="col-sm-10">
                                    <input class="form-control byekan" type="text" placeholder="مثال: 1234567899" >
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="example-search-input" class="col-sm-2 col-form-label text-right">شناسه پرداخت:</label>
                                <div class="col-sm-10">
                                    <input class="form-control byekan" type="search" placeholder="1234567899"">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button data-toggle="modal" data-target="#AddCardModal" type="submit" class="btn btn-dark waves-effect success ">بررسی و پرداخت</button><br>
                    </div>


                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>

    <!--end row-->

@endsection


@section('pageScripts')
@stop
