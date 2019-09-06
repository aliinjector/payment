@extends('dashboard.layouts.master')
@section('content')
    <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">احراز هویت</a></li>
                        <li class="breadcrumb-item active">داشبورد پین پی</li>
                    </ol>
                </div>
                <h4 class="page-title">تکمیل مدارک و احراز هویت </h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ol class="c-progress-steps">
                        <li class="c-progress-steps__step done "><span>ایجاد حساب کاربری</span></li>
                        <li class="c-progress-steps__step {{  $userInformation->status == 1 ? "current" : '' }} {{  $userInformation->status >= 2 ? "done" : '' }}"><span>تکمیل اطلاعات فردی و آپلود مدارک</span></li>
                        <li class="c-progress-steps__step {{  $userInformation->status == 2 ? "current" : '' }} {{  $userInformation->status >=  3 ? "done" : '' }}"><span>بررسی مدارک توسط پایان پی</span></li>
                        <li class="c-progress-steps__step  {{  $userInformation->status >=  4 ? "done" : '' }}"><span>تایید کاربر</span></li>
                    </ol>
                </div>
                <!--end card-body-->
            </div>
        </div>
        <!--end col-->
        <!--end col-->
    </div>


    <div class="alert icon-custom-alert alert-outline-pink b-round fade show" role="alert">
        <i class="mdi mdi-alert-outline alert-icon"></i>
        <div class="alert-text">
            حساب کاربری شما به دلیل عدم ارسال اطلاعات، غیرفعال میباشد. لطفا پس از وارد نمودن اطلاعات ذیل برروی گزینه ارسال کلیک نمایید. شایان ذکر است پس از ارسال اطلاعات، حساب کاربری شما به وضعیت در انتظار تایید قرار خواهد گرفت و پس از تایید پایان پی، حساب فعال میگردد.
        </div>

        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="mdi mdi-close text-danger"></i></span>
            </button>
        </div>
    </div>


    @include('dashboard.layouts.errors')


    <form method="post" enctype="multipart/form-data" action="{{ route('UserInformation.store') }}">
        ` @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">اطلاعات کاربری</h4>
                        <p class="text-muted mb-3">در این قسمت اطلاعات شخصی و هویتی خود را وارد نموده و مدارک درخواستی
                            را آپلود نمایید سپس منتظر تایید مدارک و اطلاعات توسط تیم پایان پی باشید.</p><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-text-input"
                                           class="col-sm-2 col-form-label text-center">نام</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="firstName" disabled
                                               value="{{ \Auth::user()->firstName }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="text-align: center" for="example-email-input"
                                           class="col-sm-2 col-form-label text-center">نام خانوادگی</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="lastName" disabled
                                               value="{{ \Auth::user()->lastName }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="text-align: center" for="example-email-input"
                                           class="col-sm-2 col-form-label text-center">نام پدر</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="fatherName"
                                               value="{{ old('fatherName', $userInformation->fatherName) }}"
                                               placeholder="مثال: رضا">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label text-center">تلفن
                                        همراه</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="mob"
                                               value="{{ \Auth::user()->mobile }}" disabled id="example-tel-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-week-input"
                                           class="col-sm-2 col-form-label text-center">شهر</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="city"
                                               value="{{ old('city', $userInformation->city) }}"
                                               placeholder=" مثال: تهران" id="example-week-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input"
                                           class="col-sm-2 col-form-label text-center">آدرس</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="address"
                                               value="{{ old('address', $userInformation->address) }}"
                                               placeholder="مثال: خیابان پاسداران - گلستان چهارم - پلاک ۲۱ - واحد ۱۱"
                                               id="example-datetime-local-input">
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label text-center">کد
                                        ملی</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nationalCode"
                                               value="{{ old('nationalCode', $userInformation->nationalCode) }}"
                                               placeholder="مثال: ۰۹۲۴۲۴۳۴۴۴" id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-center">شماره
                                        شناسنامه</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="shenasnamehCode"
                                               value="{{ old('shenasnamehCode', $userInformation->shenasnamehCode) }}"
                                               placeholder="مثال: ۰۹۲۴۲۴۳۴۴۴" id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-2 col-form-label text-center">تلفن
                                        ثابت</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="tel"
                                               value="{{ old('tel', $userInformation->tel) }}"
                                               placeholder="مثال: 02122222222" id="example-password-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-center">محل
                                        صدور</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="placeOfIssue"
                                               value="{{ old('placeOfIssue', $userInformation->placeOfIssue) }}"
                                               placeholder="مثال: تهران" id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-sm-2 col-form-label text-center">تاریخ
                                        تولد</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="birthDate"
                                               value="{{ old('birthDate', $userInformation->birthDate) }}"
                                               placeholder="مثال: ۱۳۶۶/۰۷/۲۷" id="example-date-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-week-input" class="col-sm-2 col-form-label text-center">کد
                                        پستی</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text " name="zipCode"
                                               value="{{ old('zipCode', $userInformation->zipCode) }}"
                                               placeholder="مثال: ۱۶۶۵۶۶۵۶۶" id="example-week-input">
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
        </div>


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">تصویر شناسنامه</h4>
                        <p class="text-muted mb-3">لطفا تصویر اسکن شده شناسنامه خود را آپلود نمایید.</p>
                        <div class="dropify-wrapper has-preview" style="height: 514px;">
                            <div class="dropify-message"><span class="file-icon"></span>
                                <p>با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید.</p>
                                <p class="dropify-error">خطا</p>
                            </div>
                            <div class="dropify-loader" style="display: none;"></div>
                            <div class="dropify-errors-container">
                                <ul></ul>
                            </div>
                            <input type="file" id="input-file-now-custom-3" name="shenasnamehPic" class="dropify" data-height="500" data-default-file="{{ $userInformation->shenasnamehPic }}">
                            <div class="dropify-preview" style="display: block;"><span class="dropify-render"><img src="{{ $userInformation->shenasnamehPic }}" style="max-height: 500px;"></span>
                                <div class="dropify-infos">
                                    <div class="dropify-infos-inner">
                                        <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner">تصویر شناسنامه شما</span></p>
                                        <p class="dropify-infos-message">جهت تغییر کلیک کنید</p>
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
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">تصویر کارت ملی</h4>
                        <p class="text-muted mb-3">لطفا تصویر اسکن شده کارت ملی خود را آپلود نمایید.</p>
                        <div class="dropify-wrapper has-preview" style="height: 514px;">
                            <div class="dropify-message"><span class="file-icon"></span>
                                <p>با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید.</p>
                                <p class="dropify-error">خطا</p>
                            </div>
                            <div class="dropify-loader" style="display: none;"></div>
                            <div class="dropify-errors-container">
                                <ul></ul>
                            </div>
                            <input type="file" id="input-file-now-custom-3" name="melliCardPic" class="dropify" data-height="500" data-default-file="{{ $userInformation->melliCardPic }}">
                            <div class="dropify-preview" style="display: block;"><span class="dropify-render"><img src="{{ $userInformation->melliCardPic }}" style="max-height: 500px;"></span>
                                <div class="dropify-infos">
                                    <div class="dropify-infos-inner">
                                        <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner">تصویر کارت ملی شما</span></p>
                                        <p class="dropify-infos-message">جهت تغییر کلیک کنید</p>
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
        </div>
        <div class="form-actions text-center  pb-3  ">
            <button style="font-family: iranyekan!important;" type="submit" class="btn btn-success">
                <i class="fa fa-check-square-o"></i> ارسال اطلاعات
            </button>
        </div>
    </form>
@endsection


@section('pageScripts')

    <script src="/dashboard/assets/js/dropify.min.js"></script>
    <script src="/dashboard/assets/js/jquery.form-upload.init.js"></script>
@stop
