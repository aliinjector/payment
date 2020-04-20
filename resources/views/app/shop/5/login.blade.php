@extends('app.shop.5.layouts.master')

@section('content')

    <!-- main-search start -->
    <div class="main-search-active">
        <div class="sidebar-search-icon">
            <button class="search-close"><span class="icon-close"></span></button>
        </div>
        <div class="sidebar-search-input">
            <form>
                <div class="form-search">
                    <input id="search" class="input-text" value="" placeholder="Search entire store here ..." type="search">
                    <button class="search-btn" type="button">
                        <i class="icon-magnifier"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- main-search start -->

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="breadcrumb-title">ورود و ثبت نام</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">صفحه اصلی</a></li>
                        <li class="breadcrumb-item active">ورود و ثبت نام</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb lagin-and-register-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <!-- login-register-tab-list start -->
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> ثبت نام کنید </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <div class="login-input-box">
                                                <input type="text" name="user-name" placeholder="User Name">
                                                <input type="password" name="user-password" placeholder="Password">
                                            </div>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>مرا به خاطر بسپار</label>
                                                    <a href="#">رمز عبور را فراموش کرده اید؟</a>
                                                </div>
                                                <div class="button-box">
                                                    <button class="login-btn btn" type="submit"><span>وارد شدن</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <div class="login-input-box">
                                                <input type="text" name="user-name" placeholder="نام کاربری">
                                                <input type="password" name="user-password" placeholder="رمزعبور">
                                                <input name="user-email" placeholder="Email" type="email">
                                            </div>
                                            <div class="button-box">
                                                <button class="register-btn btn" type="submit"><span>ثبت نام</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->

@endsection
