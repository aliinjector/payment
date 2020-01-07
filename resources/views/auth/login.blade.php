<!DOCTYPE html>
<html class="no-js" lang="fa">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    <meta charset="utf-8">
    <title>{{ __('login.title') }}</title>
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
                    <div class="px-3">
                        <div class="auth-logo-box">
                            <a href="/" class="logo logo-admin"><img src="/dashboard/assets//images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                        </div>
                        <!--end auth-logo-box-->
                        <div class="text-center auth-logo-text">
                            <h4 class="mt-0 mb-3 mt-5">{{ __('login.h4') }}</h4>
                            <p class="text-muted mb-0">{{ __('login.p') }}</p>
                        </div>
                        <!--end auth-logo-text-->
                            <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                <label for="username">{{ __('login.email') }}</label>
                                <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-user"></i> </span>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"  value="{{old('email')}}"  name="email" id="email" style="direction: ltr">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end form-group-->
                            <div class="form-group">
                                <label for="userpassword">{{ __('login.password') }}</label>
                                <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-lock"></i> </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="{{ __('login.password') }}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end form-group-->
                            <div class="form-group row mt-4">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-switch switch-success">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                        <label class="custom-control-label text-muted" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-sm-6 text-right"><a href="" class="text-muted font-12"><i class="dripicons-lock"></i> {{ __('login.forget') }}</a></div>
                                <!--end col-->
                            </div>
                            <!--end form-group-->
                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-round btn-block waves-effect waves-light iranyekan" type="submit">{{ __('login.lgoinBtn') }} <i class="fas fa-sign-in-alt ml-1"></i></button>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end form-group-->
                        </form>
                        <!--end form-->
                    </div>
                    <!--end /div-->
                    <div class="m-3 text-center text-muted">
                        <p class="">{{ __('login.nadarid') }}<a href="/register" class="text-primary ml-2">{{ __('login.signup') }}</a></p>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
            <div class="account-social text-center mt-4">
                <h6 class="my-4"> {{ __('login.with') }}</h6>
                <ul class="list-inline mb-4">
                    <li class="list-inline-item"><a href="" class=""><i class="fab fa-facebook-f facebook"></i></a></li>
                    <li class="list-inline-item"><a href="" class=""><i class="fab fa-twitter twitter"></i></a></li>
                    <li class="list-inline-item"><a href="" class=""><i class="fab fa-google google"></i></a></li>
                </ul>
            </div>
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
