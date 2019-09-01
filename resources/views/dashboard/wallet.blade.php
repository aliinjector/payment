@extends('dashboard.layouts.master')
@section('content')


    <!-- Modal -->
    <div class="modal fade" id="CheckoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">درخواست تسویه حساب کیف پول شماره ۱</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group mb-0">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">مبلغ:</span></div>
                                <input type="text" class="form-control" placeholder="مثال: ۱۰۰۰۰۰">
                                <div class="input-group-append"><span class="input-group-text bg-light" id="basic-addon8"> ریال</span></div>
                            </div>

                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">واریز به:</span></div>
                                <select style="font-family: BYekan!important;" name="" id="">
                                    <option style="font-family: BYekan!important;" value="5892101028096325"> بانک سپه | شماره کارت: 5892101028096325</option>
                                    <option value="6104337862241047"> بانک ملت | شماره کارت: 6104337862241047</option>
                                </select>
                                <div class="input-group-append"><span class="input-group-text bg-light" id="basic-addon8"> به نام علی رحمانی</span></div>
                            </div>
                        </div>
                        <!--end form-group-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    <button type="button" class="btn btn-success">ثبت درخواست</button>
                </div>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">کیف های پول شما</a></li>
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
                        <h3 class="font-weight-bold">100,000 تومان </h3></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد کیف پول ها</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">1</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
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


    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="wallet-bal-usd">
                                <center><h4>نام کیف پول: کیف پول شماره ۱</h4></center> <br>
                                <h5 class="wallet-title m-0">موجودی فعلی این کیف پول:</h5>
                                <h3 class="text-center">۳۰۰ هزار تومان</h3></div>
                            <div  class="text-center pt-4">
                                <button class="btn btn-success btn-sm px-3">لیست تراکنش ها</button>
                                <button data-toggle="modal" data-target="#CheckoutModal" class="btn btn-danger btn-sm px-3">درخواست تسویه</button>
                                <!-- Button trigger modal -->


                                <br><br><span style="margin-top: 10px" class="text-muted font-12">آخرین بروزرسانی: امروز ۸ صبح</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
                <div class="card-body pt-0">
                    <ul class="list-group wallet-bal-crypto">
                        <li class="list-group-item align-items-center d-flex justify-content-between">
                            <div class="media"><i style="padding-left: 15px;" class="dripicons-cart card-eco-icon text-secondary align-self-center"></i>
                                <div class="media-body align-self-center">
                                    <div class="coin-bal">
                                        <h3 class="m-0">کد پایان پی:</h3>
                                        <p class="text-muted mb-0">۲۴۲۳۴۳۲۴</p>
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

    </div>

    <!--end row-->

@endsection


@section('pageScripts')
@stop
