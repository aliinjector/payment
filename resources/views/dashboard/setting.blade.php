@extends('dashboard.layouts.master')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">تنظیمات و پروفایل کاربری</a></li>
                        <li class="breadcrumb-item active">داشبورد امید شاپ</li>
                    </ol>
                </div>
                <h4 class="page-title">داشبورد اصلی</h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
        <!-- end page title end breadcrumb -->
        @include('dashboard.layouts.errors')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body met-pro-bg">
                        <div class="met-profile">
                            <div class="row">
                                <div class="col-lg-4 mb-3 mb-lg-0 align-self-center">
                                    <div class="met-profile-main">
                                        <div class="met-profile-main-pic"><img style="width: 100px;" src="{{ asset(\Auth::user()->avatar) }}" alt="" class="rounded-circle"></div>
                                        <div class="met-profile_user-detail">
                                            <h5 class="met-user-name"> {{ \Auth::user()->firstName . ' ' . \Auth::user()->lastName }} </h5>
                                            <p class="mb-0 met-user-name-post">عضو از تاریخ :  {{ jdate(\Auth::user()->created_at) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4 ml-auto">
                                    <ul class="list-unstyled personal-detail">
                                        <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i><b>تلفن همراه </b>: {{ \Auth::user()->mobile }}</li>
                                        <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i><b>آدرس ایمیل </b>: {{ \Auth::user()->email }}</li>
                                        <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i><b>شهر: </b>{{ \Auth::user()->userInformation->city }}</li>
                                    </ul>
                                    <a href="{{ route('UserInformation.index') }}"><button type="submit" class="btn btn-info btn-sm">تغییر اطلاعات هویتی</button></a>
                                    {{-- <a href="{{ route('setting.user-panel') }}"><button type="submit" class="btn btn-danger btn-sm">تغییر اطلاعات کاربری</button></a> --}}
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
                    <div class="card-body" style="height: 715px;">

                        <form method="POST" action="{{ route('setting.update', \Auth::user()->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                            <!--end form-group-->
                            <div class="form-group">
                                <label for="setEmail">آدرس ایمیل</label>
                                <input type="email" class="form-control" value="{{ \Auth::user()->email }}" id="setEmail" disabled>
                            </div>
                            <!--end form-group-->
                            <div class="form-group">
                                <label for="setPassword">رمز عبور فعلی</label>
                                <input type="password" class="form-control" name="current-password" id="current-password">
                            </div>

                            <div class="form-group">
                                <label for="setPassword">رمز عبور جدید</label>
                                <input type="password" class="form-control" name="new-password" id="new-password">
                            </div>

                            <div class="form-group">
                                <label for="setPassword">تایید رمز عبور </label>
                                <input type="password" class="form-control" name="new-password_confirmation" id="new-password_confirmation">
                            </div>
                            <center><button type="submit" name="password" class="btn btn-success" style="margin-top: 263px;">ثبت تنظیمات</button></center>

                            <!--end form-group-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
          </form>

            <!--end col-->

            <!--end col-->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('user-panel.update', \Auth::user()->id ) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                            <!--end form-group-->

                            <!--end form-group-->
                            <div class="form-group">
                                <label for="setPassword">نام</label>
                                <input type="text" class="form-control" name="firstName" id="current-password" value={{ old('firstName',  \Auth::user()->firstName ) }}>
                            </div>

                            <div class="form-group">
                                <label for="setPassword">نام خانوادگی</label>
                                <input type="text" class="form-control" name="lastName" id="new-password" value={{ old('lastName',  \Auth::user()->lastName) }}>
                            </div>
                            <div class="form-group">
                                <label for="setEmail">آدرس ایمیل</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email',  \Auth::user()->email) }}" id="setEmail">
                            </div>
                            <div class="form-group">
                                <label for="setPassword">شماره موبایل </label>
                                <input type="text" class="form-control" name="mobile" id="new-password_confirmation" value={{ old('mobile',  \Auth::user()->mobile ) }}>
                            </div>
                            <div class="form-group">
                              <div class="card mt-3">
                                  <div class="card-body">
                                      <h4 class="mt-0 header-title">آواتار</h4>
                                      <input type="file" id="input-file-now" name="avatar" class="dropify" data-default-file="{{ asset(\Auth::user()->avatar) }}">
                                  </div>
                                  <center><button type="submit" name="update" class="btn btn-success">ثبت تنظیمات</button></center>

                              </div>
                            </div>
                            <!--end form-group-->
                    </div>
                    <!--end card-body-->
                </div>

                <!--end card-->
            </div>
        </div>


    </form>
    <!--end form-->


    <!--end row-->
        <div style="display: none" class="row">
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
                                        <label style="font-family: iranyekan;" class="btn btn-outline-light btn-sm active">
                                            <input style="" type="radio" name="options" id="option1" > فعال</label>
                                        <label style="font-family: iranyekan;" class="btn btn-outline-light btn-sm">
                                            <input style="" type="radio" name="options" id="option4" checked="checked"> غیرفعال</label>
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
                                        <label style="font-family: iranyekan;" class="btn btn-outline-light btn-sm active">
                                            <input style="font-family: iranyekan!important;" type="radio" name="options" id="option1" > فعال</label>
                                        <label style="font-family: iranyekan;" class="btn btn-outline-light btn-sm">
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
                                <div class="setting-detail" >
                                    <h3 class="mb-0 mt-0">فعالسازی API</h3>
                                    <p class="text-muted mb-0"> جهت ارتباط با سیستم پرداخت یاری با سیستم های مدیریت محتوی نیازمند فعالسازی این گزینه میباشد.</p>
                                </div>
                                <div class="mt-2">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label style="font-family: iranyekan;" class="btn btn-outline-light btn-sm active">
                                            <input style="font-family: iranyekan!important;" type="radio" name="options" id="option1" > فعال</label>
                                        <label style="font-family: iranyekan;" class="btn btn-outline-light btn-sm">
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
  <script type="text/javascript">


      $(document).ready(function(){
        $('.dropify-clear').addClass('d-none');
    });

  </script>
@stop
