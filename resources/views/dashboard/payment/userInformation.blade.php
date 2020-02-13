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
                        <li class="c-progress-steps__step  {{  $userInformation->status == 1 ? "current" : '' }} {{  $userInformation->status >= 2 ? "done" : '' }} "><span>تایید شماره همراه</span></li>
                        <li class="c-progress-steps__step {{  $userInformation->status == 2 ? "current" : '' }} {{  $userInformation->status >=  3 ? "done" : '' }}"><span>تایید ایمیل</span></li>
                        <li class="c-progress-steps__step {{  $userInformation->status == 3 ? "current" : '' }} {{  $userInformation->status >= 4 ? "done" : '' }}"><span>تکمیل اطلاعات فردی و آپلود مدارک</span></li>
                        <li class="c-progress-steps__step  {{  $userInformation->status >=  5 ? "done" : '' }}"><span>بررسی و تایید توسط امیدشاپ</span></li>
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



    <div class="row">
        <div class="col-xl-6 {{  $userInformation->status == 1 ? "" : 'comming-soon' }}">
            <form method="get" action="{{ route('verification.sms') }}">
                <div class="card">
                <div class="card-body ">
                    <h4 class="mt-0 header-title">مرحله اول: تایید شماره موبایل</h4>
                    <p class="text-muted mb-3">لطفا کد ارسال شده به شماره همراه خودرا وارد نمایید</p>
                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-sm-2 col-form-label text-center">شماره موبایل:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="mob" disabled
                                   value="{{ \Auth::user()->mobile }}" id="example-text-input">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label style="text-align: center" for="example-email-input"
                               class="col-sm-2 col-form-label text-center">کد تایید:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="mobileCode">
                        </div>
                    </div>


                    <div class="form-actions text-center pt-3 ">
                        <button style="font-family: iranyekan!important;" type="submit" class="btn btn-success">
                            <i class="fa fa-check-square-o"></i> اعتبار سنجی
                        </button>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
            </form>
        </div>
        <!--end col-->
        <div class="col-xl-6 {{  $userInformation->status == 2 ? "" : 'comming-soon' }}">
            <form method="get" action="{{ route('verification.email') }}">
                @csrf
                <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">مرحله دوم: تایید آدرس ایمیل</h4>
                    <p class="text-muted mb-3">لطفا کد ارسال شده به ایمیل خودرا وارد نمایید</p>
                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-sm-2 col-form-label text-center">آدرس ایمیل:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="firstName" disabled
                                   value="{{ \Auth::user()->email }}" id="example-text-input">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label style="text-align: center" for="example-email-input"
                               class="col-sm-2 col-form-label text-center">کد تایید:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="emailCode">
                        </div>
                    </div>


                    <div class="form-actions text-center  pt-3  ">
                        <button style="font-family: iranyekan!important;" type="submit" class="btn btn-success">
                            <i class="fa fa-check-square-o"></i> ارسال کد تایید ایمیل
                        </button>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
            </form>
        </div>
    </div>




    <form method="post" enctype="multipart/form-data" action="{{ route('UserInformation.store') }}">
         @csrf
        <div class="row {{  $userInformation->status == 3 ? "" : 'comming-soon' }}">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">مرحله سوم: اطلاعات کاربری</h4>
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
                    <div class="form-actions text-center  pb-3  ">
                        <button style="font-family: iranyekan!important;" type="submit" class="btn btn-success">
                            <i class="fa fa-check-square-o"></i> ارسال اطلاعات
                        </button>
                    </div>
                 </form>

    <!--end card-body-->
                </div>

                <!--end card-->
            </div>
            <!--end col-->
        </div>

        <div class="row {{  $userInformation->status == 3 ? "" : 'comming-soon' }}">
            <div class="col-xl-6">
                <form method="post" enctype="multipart/form-data" action="{{ route('ShensnamehUpload') }}">
                    @csrf
                    <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">مرحله چهارم: تصویر شناسنامه</h4>
                        <p class="text-muted mb-3">لطفا تصویر اسکن شده شناسنامه خود را آپلود نمایید.</p>
                        <input type="file" id="input-file-now" data-default-file="{{ $userInformation->shenasnamehPic }}" name="shenasnamehPic" class="dropify">

                        <div class="form-actions text-center  pt-3  ">
                            <button style="font-family: iranyekan!important;" type="submit" class="btn btn-success">
                                <i class="fa fa-check-square-o"></i> ارسال تصویر شناسنامه
                            </button>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
                </form>
            </div>
            <!--end col-->
            <div class="col-xl-6 {{  $userInformation->status == 3 ? "" : 'comming-soon' }}">
                <form method="post" enctype="multipart/form-data" action="{{ route('melliUpload') }}">
                    @csrf
                    <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">مرحله پنجم: تصویر کارت ملی</h4>
                        <p class="text-muted mb-3">لطفا تصویر اسکن شده کارت ملی خود را آپلود نمایید.</p>
                        <input type="file" id="input-file-now" data-default-file="{{ $userInformation->melliCardPic }}" name="melliCardPic" class="dropify">
                        <div class="form-actions text-center  pt-3  ">
                            <button style="font-family: iranyekan!important;" type="submit" class="btn btn-success">
                                <i class="fa fa-check-square-o"></i> ارسال تصویر کارت ملی
                            </button>
                    </div>
                    <!--end card-body-->
                </div>
                </form>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
      </div>


    <div class="row {{  $userInformation->status == 3 ? "" : 'comming-soon' }}">
        <div class="col-xl-12">
            <form method="post" enctype="multipart/form-data" action="{{ route('ShensnamehUpload') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">مرحله آخر: تصویر شناسنامه</h4>
                        <p class="text-muted mb-3">لطفا تصویر سلفی خود را با شناسنامه و کارت ملی ضمیمه نمایید.
                            <a href="">مشاهده فیلم آموزشی</a>
                        </p>
                        <input type="file" id="input-file-now" data-default-file="{{ $userInformation->personPic }}" name="personPic" class="dropify">
                        <div class="form-actions text-center  pt-3  ">
                            <button style="font-family: iranyekan!important;" type="submit" class="btn btn-success">
                                <i class="fa fa-check-square-o"></i> ارسال تصویر شناسنامه
                            </button>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </form>
        </div>
        <!--end col-->

        <!--end col-->
    </div>
    </div>




@endsection


@section('pageScripts')

@stop
