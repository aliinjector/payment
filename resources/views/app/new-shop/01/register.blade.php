@extends('app.new-shop.01.master')

@section('headerScripts')

@endsection

@section('content')

    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                <h1 class="tt-title-subpages noborder">عضویت در فروشگاه</h1>
                <div class="tt-login-form">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6">
                            <div class="tt-item">
                                <h2 class="tt-title">اطلاعات کاربری</h2>
                                <div class="form-default">
                                    <form id="contactform" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="loginInputName">نام *</label>
                                            <div class="tt-required">* فیلد های الزامی</div>
                                            <input type="text" name="name" class="form-control" id="loginInputName" placeholder="Enter First Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="loginLastName">نام خانوادگی *</label>
                                            <input type="text" name="lastName" class="form-control" id="loginLastName" placeholder="Enter Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="loginInputEmail">آدرس ایمیل *</label>
                                            <input type="text" name="email" class="form-control" id="loginInputEmail" placeholder="Enter E-mail">
                                        </div>
                                        <div class="form-group">
                                            <label for="loginInputPassword">رمز عبور *</label>
                                            <input type="text" name="passowrd" class="form-control" id="loginInputPassword" placeholder="Enter Password">
                                        </div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="form-group">
                                                    <button class="btn btn-border" type="submit">ایجاد حساب کاربری</button>
                                                </div>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <div class="form-group">
                                                    <ul class="additional-links">
                                                        <li>و یا <a href="#">بازگشت به فروشگاه</a></li>
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
