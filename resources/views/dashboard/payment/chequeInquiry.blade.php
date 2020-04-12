@extends('dashboard.layouts.master')
@section('content')


    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">استعلام چک</a></li>
                        <li class="breadcrumb-item active">داشبورد امید شاپ</li>
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
                    <h4 class="title-text mt-0">تعداد چک های استعلام شده</h4>
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
                    <h4 class="title-text mt-0"> زمان بندی شده</h4>
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
                    <h4 class="title-text mt-0"> پاس شده </h4>
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
                    <h4 class="title-text mt-0"> تمامی چک ها </h4>
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
                    <h4 class="mt-4 header-title">اطلاعات چک</h4>
                    <p class="text-muted mb-3 pt-2">جهت استعلام چک، لطفا شناسه‌ی استعلام ۱۶ رقمی را وارد نمایید</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">شناسه استعلام:</label>
                                    <div class="col-sm-10">
                                        <input class="form-control byekan" type="text" placeholder="مثال: 1234567899876543" >
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">تاریخ:</label>
                                <div class="col-sm-10">
                                    <input class="form-control byekan" type="text" placeholder="مثال: 1398/07/20" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button data-toggle="modal" data-target="#AddCardModal" type="submit" class="btn btn-dark waves-effect success ">استعلام و یادآوری</button><br>
                    </div>


                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <p class="mt-4 mb-4" style="text-align: right;display: inline"><img style="width: 635px;" class="" src="/images/sayyad.PNG" alt=""></p>
                        <p class="mt-4 mb-4" style="text-align: left; display: inline"><img class="" src="/images/chequestatus.PNG" alt=""></p>
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
