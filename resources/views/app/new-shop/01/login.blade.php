@extends('app.new-shop.01.master')

@section('headerScripts')

@endsection

@section('content')
    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                <h1 class="tt-title-subpages noborder">عضو این فروشگاه هستید؟</h1>
                <div class="tt-login-form">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="tt-item">
                                <h2 class="tt-title">مشتری جدید</h2>
                                <p>جهت خرید و تسهیل در روند پیگیری سفارشات میبایست در فروشگاه عضو شوید.</p>
                                <div class="form-group"><a href="#" class="btn btn-top btn-border">ایجاد حساب کاربری</a></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="tt-item">
                                <h2 class="tt-title">ورود</h2>درصورتی که حساب کاربری دارید، فرم را تکمیل نمایید
                                <div class="form-default form-top">
                                    <form id="customer_login" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="loginInputName">آدرس ایمیل *</label>
                                            <div class="tt-required">* فیلد الزامی</div>
                                            <input type="text" name="name" class="form-control" id="loginInputName" placeholder="Enter Username or E-mail">
                                        </div>
                                        <div class="form-group">
                                            <label for="loginInputEmail">رمز عبور *</label>
                                            <input type="text" name="passowrd" class="form-control" id="loginInputEmail" placeholder="Enter Password">
                                        </div>
                                        <div class="row">
                                            <div class="col-auto mr-auto">
                                                <div class="form-group">
                                                    <button class="btn btn-border" type="submit">ورود</button>
                                                </div>
                                            </div>
                                            <div class="col-auto align-self-end">
                                                <div class="form-group">
                                                    <ul class="additional-links">
                                                        <li><a href="#">رمز عبور خودرا فراموش کرده اید؟</a></li>
                                                    </ul>
                                                </div>
                                            </div>
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
		@endsection

		@section('footerScripts')

		@endsection
