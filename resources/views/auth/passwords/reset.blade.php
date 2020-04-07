<!DOCTYPE html>
<html class="no-js" lang="fa">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    <meta charset="utf-8">
    <title>امید شاپ - بازیابی رمز عبور</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Ali Rahmani">
    <meta name="description" content="راهکار های نوین پرداخت پین پی">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/dashboard/assets//images/favicon.ico">
    <!-- App css -->
    <link href="/dashboard/assets//css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets//css/icons.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets//css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets//css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="account-body accountbg">
<!-- Log In page -->
<div class="row vh-100">
    <div class="col-12 align-self-center">
        <div class="auth-page">
            <div class="card auth-card shadow-lg">
                <div class="card-body">
                    @if (session('status'))
                        <div style="margin-top: 20px;" class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="px-3">
                        <div class="auth-logo-box">
                            <a href="/" class="logo logo-admin"><img src="/dashboard/assets//images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                        </div>
                        <!--end auth-logo-box-->
                        <div class="text-center auth-logo-text">
                            <h4 class="mt-0 mb-3 mt-5">بازیابی رمز عبور امید شاپ</h4>
                            <p class="text-muted mb-0">جهت یازیابی رمز عبور، لطفا اطلاعات زیر را تکمیل نمایید:</p>
                        </div>
                        <!--end auth-logo-text-->
                        <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">آدرس ایمیل:</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{!!  $email ?? old('email') !!} " required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور جدید:</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تایید رمز عبور جدید:</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <!--end form-group-->
                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">تغییر رمز عبور <i class="fas fa-sign-in-alt ml-1"></i></button>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end form-group-->
                        </form>
                        <!--end form-->
                    </div>
                    <!--end /div-->
                    <br>
                    <div class="m-3 text-center text-muted">
                        <p class=""> <a href="/login" class="text-primary ml-2">پنل ورود به سیستم</a></p>
                        <p class="">حساب کاربری ندارید؟ <a href="/register" class="text-primary ml-2">جهت عضویت کلیک نمایید</a></p>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->

            <!--end account-social-->
        </div>
        <!--end auth-page-->
    </div>
    <!--end col-->
</div>
<!--end row-->
<!-- End Log In page -->
<!-- jQuery  -->
<script src="/dashboard/assets//js/jquery.min.js"></script>
<script src="/dashboard/assets//js/bootstrap.bundle.min.js"></script>
<script src="/dashboard/assets//js/metisMenu.min.js"></script>
<script src="/dashboard/assets//js/waves.min.js"></script>
<script src="/dashboard/assets//js/jquery.slimscroll.min.js"></script>
<!-- App js -->
<script src="/dashboard/assets//js/app.js"></script>
</body>

</html>

