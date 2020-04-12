<!DOCTYPE html>
<html class="no-js" lang="fa">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    <meta charset="utf-8">
    <title>{{ __('register.title') }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Ali Rahmani">
    <meta name="description" content="فروشگاه ساز امید">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/dashboard/assets//images/favicon.ico">
    <!-- App css -->
    <link href="/dashboard/assets//css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets//css/icons.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets//css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets//css/style.css" rel="stylesheet" type="text/css">
    {!! ReCaptcha::htmlScriptTagJsApi() !!}

</head>

<body class="account-body accountbg">
<!-- Log In page -->
<div class="row vh-100">
    <div class="col-12 align-self-center">
        <div class="auth-page">
            <div class="card auth-card shadow-lg">
                <div class="card-body">
                    <div class="px-3">
                        <!--end auth-logo-box-->
                        <div class="text-center auth-logo-text">
                            <h4 class="mt-0 mb-3 mt-5"> {{ __('register.h4') }}</h4>
                            <p class="text-muted mb-0">{{ __('register.p') }}</p>
                        </div>
                        <!--end auth-logo-text-->
                        <form class="form-horizontal auth-form my-4"  method="post" action="{{ route('register', ['shop' => request()->shop])  }}">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="username">{{ __('register.firstName') }}</label>
                                <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-user"></i> </span>
                                    <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{old('firstName')}}" id="firstName" placeholder="مثال: علی">
                                    @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <!--end form-group-->
                            <div class="form-group">
                                <label for="username">{{ __('register.lastName') }}</label>
                                <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-user"></i> </span>
                                    <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="lastName"  value="{{old('lastName')}}" placeholder="مثال: رحمانی">
                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <!--end form-group-->

                            <div class="form-group">
                                <label for="useremail">{{ __('register.email') }}</label>
                                <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-mail"></i> </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value="{{old('email')}}" style="direction: ltr">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>


                            <!--end form-group-->
                            <div class="form-group">
                                <label for="userpassword">{{ __('register.password') }}</label>
                                <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-lock"></i> </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" >
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <!--end form-group-->
                            <div class="form-group">
                                <label for="conf_password">{{ __('register.password_confirmation') }}</label>
                                <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-lock-open"></i> </span>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  id="password_confirmation" >
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="mo_number">{{ __('register.mobile') }}</label>
                                    <div class="input-group mb-3"><span class="auth-form-icon"><i class="dripicons-phone"></i> </span>
                                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  id="mobile" placeholder="مثال: 09202020222">
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <!--end form-group-->
                            </div>
                            <!--end form-group-->
                            <div class="form-group row mt-4">
                                <div class="col-sm-12">
                                    <div class="custom-control custom-switch switch-success">
                                        <input type="checkbox" checked="checked" class="custom-control-input" id="customSwitchSuccess">
                                        <label style="display:none" class="custom-control-label text-muted" for="customSwitchSuccess">با عضویت <a href="#" class="text-primary">قوانین و شرایط استفاده</a> را قبول دارم.</label>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end form-group-->


                            <div class="form-group mb-0 row">

                                <div style="margin: auto" class="col-md-10">
                                    {!! htmlFormSnippet() !!}
                                </div>


                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">{{ __('register.registerBtn') }} <i class="fas fa-sign-in-alt ml-1"></i></button>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end form-group-->
                        </form>
                        <!--end form-->
                    </div>
                    <!--end /div-->
                    <div class="m-3 text-center text-muted">
                        <p class="">{{ __('register.have?') }}<a href="/login" class="text-primary ml-2">{{ __('register.loginPage') }}</a></p>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
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
