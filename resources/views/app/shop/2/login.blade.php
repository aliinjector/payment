@extends('app.shop.2.layouts.master')

@section('headerScripts')
<style media="screen">
.btn {
    font-family: iranyekan!important;
    border: none !important;
    color: #fff !important;
    font-size: 14px !important;
    line-height: 1 !important;
    font-weight: 400 !important;
    letter-spacing: .03em !important;
    position: relative !important;
    outline: 0 !important;
    padding: 6px 31px 4px !important;
    display: inline-flex !important;
    justify-content: center !important;
    align-items: center !important;
    text-align: center !important;
    height: 40px !important;
    cursor: pointer !important;
    border-radius: 6px !important;
    transition: color .2s linear, background-color .2s linear !important;
}
.tt-btn-addtocart {


    background-color: #2879fe!important;
    color: #fff!important;
    padding: 3px 16px 9px!important;
    border-radius: 6px!important;
    transition: .2s linear!important;
}

</style>
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
                                <h2 class="tt-title">ورود</h2>درصورتی که حساب کاربری دارید، فرم را تکمیل نمایید
                                <div class="form-default form-top">
                                    <form method="POST" action="{{ route('login') }}" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label for="loginInputName">آدرس ایمیل *</label>
                                            <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="آدرس ایمیل خودرا وارد نمایید">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="loginInputEmail">رمز عبور *</label>
                                            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="رمز عبور خودرا وارد نمایید">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-auto mr-auto">
                                                <div class="form-group">
                                                    <button style="color: black" class="btn btn-border tt-btn-addtocart" type="submit">ورود</button>
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

                        <div class="col-xs-12 col-md-6">
                            <div class="tt-item">
                                <h2 class="tt-title">مشتری جدید</h2>
                                <p>جهت خرید و تسهیل در روند پیگیری سفارشات میبایست در فروشگاه عضو شوید.</p>
                                <div class="form-group"><a href="{{ route('template.register.show' , $shop->english_name) }}" style="color: black" class="btn btn-top btn-border tt-btn-addtocart">ایجاد حساب کاربری</a></div>
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
