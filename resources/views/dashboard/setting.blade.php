@extends('dashboard.layouts.master')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">تنظیمات و پروفایل کاربری</a></li>
                        <li class="breadcrumb-item active">داشبورد پین پی</li>
                    </ol>
                </div>
                <h4 class="page-title">داشبورد اصلی</h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body met-pro-bg">
                        <div class="met-profile">
                            <div class="row">
                                <div class="col-lg-4 mb-3 mb-lg-0 align-self-center">
                                    <div class="met-profile-main">
                                        <div class="met-profile-main-pic"><img src="/dashboard/assets/images/users/user-4.jpg" alt="" class="rounded-circle"> <span class="fro-profile_main-pic-change"><i class="fas fa-camera"></i></span></div>
                                        <div class="met-profile_user-detail">
                                            <h5 class="met-user-name">علی رحمانی</h5>
                                            <p class="mb-0 met-user-name-post">کاربر سطح طلایی</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4 ml-auto">
                                    <ul class="list-unstyled personal-detail">
                                        <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i><b>تلفن همراه </b>: ۰۹۲۰۱۰۱۰۳۲۸</li>
                                        <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i><b>آدرس ایمیل </b>: rahmani@rieco.ir</li>
                                        <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i><b>شهر</b> : تهران</li>
                                    </ul>
                                    <a href="{{ route('UserAuthentication.index') }}"><button type="submit" class="btn btn-info btn-sm">تغییر اطلاعات هویتی</button></a>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end f_profile-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <!--end form-group-->
                            <div class="form-group">
                                <label for="setEmail">آدرس ایمیل</label>
                                <input type="email" class="form-control" value="rahmani@rieco.ir" id="setEmail" disabled>
                            </div>
                            <!--end form-group-->
                            <div class="form-group">
                                <label for="setPassword">رمز عبور</label>
                                <input type="password" class="form-control" id="setPassword">
                            </div>
                            <!--end form-group-->
                            <button type="submit" class="btn btn-secondary btn-sm">ثبت تنظیمات</button>
                        </form>
                        <!--end form-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->

            <!--end col-->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 mb-3 header-title">تنظیمات اعلان ها (Notifications)</h4>
                        <div class="text-center"><img src="../assets/images/widgets/notify.svg" alt="" class="mb-3" height="115"></div>
                        <form class="ml-3">
                            <div class="custom-control custom-switch switch-success mb-2">
                                <input type="checkbox" class="custom-control-input" id="ICOnotify" checked="checked">
                                <label class="custom-control-label" for="ICOnotify">دریافت ایمیل هنگام پرداخت</label>
                            </div>
                            <div class="custom-control custom-switch switch-success mb-2">
                                <input type="checkbox" class="custom-control-input" id="ICOnotify" checked="checked">
                                <label class="custom-control-label" for="ICOnotify">دریافت پیامک هنگام پرداخت</label>
                            </div>
                            <div class="custom-control custom-switch switch-success mb-2">
                                <input type="checkbox" class="custom-control-input" id="notyfySound">
                                <label class="custom-control-label" for="notyfySound">دریافت ایمیل هنگام تسویه حساب</label>
                            </div>
                            <div class="custom-control custom-switch switch-success mb-2">
                                <input type="checkbox" class="custom-control-input" id="notyfySound">
                                <label class="custom-control-label" for="notyfySound">دریافت پیامک هنگام تسویه حساب</label>
                            </div>

                            <div class="custom-control custom-switch switch-success">
                                <input type="checkbox" class="custom-control-input" id="autoLockWallet" checked="checked">
                                <label class="custom-control-label" for="autoLockWallet">ارسال ایمیل لینک پرداخت فاکتور برای مشتری</label>
                            </div>
                        </form>
                        <!--end form-->
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
                        <div class="media setting-card"><span class="sett-card-icon set-icon-purple"><i class="mdi mdi-cellphone-iphone"></i></span>
                            <div class="media-body align-self-center">
                                <div class="setting-detail">
                                    <h3 class="mb-0 mt-0">ورود دو مرحله ای پیامکی</h3>
                                    <p class="text-muted mb-0">پس از وارد کردن رمز عبور، جهت ورود به اکانت نیاز به تایید توسط کد ارسال شده پیامکی میباشد.</p>
                                </div>
                                <div class="mt-2">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-light btn-sm active">
                                            <input style="font-family: iranyekan!important;" type="radio" name="options" id="option1" > فعال</label>
                                        <label class="btn btn-outline-light btn-sm">
                                            <input style="font-family: iranyekan!important;" type="radio" name="options" id="option4" checked="checked"> غیرفعال</label>
                                    </div>
                                    <!--end btn-group-->
                                </div>
                                <!--end /div-->
                            </div>
                            <!--end media body-->
                        </div>
                        <!--end media-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media setting-card"><span class="sett-card-icon set-icon-success"><i class="mdi mdi-google-chrome"></i></span>
                            <div class="media-body align-self-center">
                                <div class="setting-detail">
                                    <h3 class="mb-0 mt-0">گوگل Auth</h3>
                                    <p class="text-muted mb-0">پس از وارد کردن رمز عبور، جهت ورود به اکانت نیاز به تایید توسط کد نرم افزار گوگل Auth میباشد.</p>
                                </div>
                                <div class="mt-2">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-light btn-sm active">
                                            <input style="font-family: iranyekan!important;" type="radio" name="options" id="option1" > فعال</label>
                                        <label class="btn btn-outline-light btn-sm">
                                            <input style="font-family: iranyekan!important;" type="radio" name="options" id="option4" checked="checked"> غیرفعال</label>
                                    </div>
                                    <!--end btn-group-->
                                </div>
                                <!--end /div-->
                            </div>
                            <!--end media body-->
                        </div>
                        <!--end media-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media setting-card"><span class="sett-card-icon set-icon-danger"><i class="mdi mdi-database"></i></span>
                            <div class="media-body align-self-center">
                                <div class="setting-detail">
                                    <h3 class="mb-0 mt-0">فعالسازی API</h3>
                                    <p class="text-muted mb-0"> جهت ارتباط با سیستم پرداخت یاری با سیستم های مدیریت محتوی نیازمند فعالسازی این گزینه میباشد.</p>
                                </div>
                                <div class="mt-2">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-light btn-sm active">
                                            <input style="font-family: iranyekan!important;" type="radio" name="options" id="option1" > فعال</label>
                                        <label class="btn btn-outline-light btn-sm">
                                            <input style="font-family: iranyekan!important;" type="radio" name="options" id="option4" checked="checked"> غیرفعال</label>
                                    </div>
                                    <!--end btn-group-->
                                </div>
                                <!--end /div-->
                            </div>
                            <!--end media body-->
                        </div>
                        <!--end media-->
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
