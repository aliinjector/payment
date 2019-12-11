@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "> لیست کاربران فروشگاه</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

        @include('dashboard.layouts.errors')


        <div class="row">
            <div class="col-lg-12">

                <!--end card-->

                <!--end row-->
            </div>
            <!--end col-->

        </div>



        <form method="post" enctype="multipart/form-data" action="{{ route('users.update', $user) }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">اطلاعات کاربری : {{ $user->firstName . ' ' . $user->lastName }}</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label text-center">نام</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="firstName" value="نیما" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نام خانوادگی</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="lastName" value="کریمی">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نام پدر</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="fatherName" value="" placeholder="مثال: رضا">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-center">تلفن
                                                همراه</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="mob" value="09121212111" id="example-tel-input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-week-input" class="col-sm-2 col-form-label text-center">شهر</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="city" value="" placeholder=" مثال: تهران" id="example-week-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">آدرس</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="address" value="" placeholder="مثال: خیابان پاسداران - گلستان چهارم - پلاک ۲۱ - واحد ۱۱" id="example-datetime-local-input">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label text-center">کد
                                                ملی</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="nationalCode" value="" placeholder="مثال: ۰۹۲۴۲۴۳۴۴۴" id="example-search-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-url-input" class="col-sm-2 col-form-label text-center">شماره
                                                شناسنامه</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="shenasnamehCode" value="" placeholder="مثال: ۰۹۲۴۲۴۳۴۴۴" id="example-url-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-center">تلفن
                                                ثابت</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="tel" value="" placeholder="مثال: 02122222222" id="example-password-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-url-input" class="col-sm-2 col-form-label text-center">محل
                                                صدور</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="placeOfIssue" value="" placeholder="مثال: تهران" id="example-url-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-date-input" class="col-sm-2 col-form-label text-center">تاریخ
                                                تولد</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="birthDate" value="" placeholder="مثال: ۱۳۶۶/۰۷/۲۷" id="example-date-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-week-input" class="col-sm-2 col-form-label text-center">کد
                                                پستی</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text " name="zipCode" value="" placeholder="مثال: ۱۶۶۵۶۶۵۶۶" id="example-week-input">
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="form-actions text-center  pb-3  ">
                                <button style="font-family: iranyekan!important;" type="submit" class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i> ارسال اطلاعات
                                </button>
                            </div>


            <!--end card-body-->
                        </div>

                        <!--end card-->
                    </div>
                    <!--end col-->
                </div></form>



    </div>
    <!-- Attachment Modal -->
    @endsection
    @section('pageScripts')
    <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
    <script src="/dashboard/assets/plugins/dropify/js/dropify.min.js"></script>
    <script src="/dashboard/assets/pages/jquery.form-upload.init.js"></script>


        @stop
