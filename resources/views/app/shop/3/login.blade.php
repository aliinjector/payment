@extends('app.shop.3.layouts.master')

@section('content')




<!-- Page item Area -->
<div id="page_item_area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h3>حساب کاربری</h3>
      </div>
    </div>
  </div>
</div>


<!-- Login Page -->
<div class="login_page_area">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="create_account_area caa_pdngbtm">
          <h2 class="caa_heading">ایجاد یک حساب کاربری</h2>
          <div class="caa_form_area">
            <p>لطفاً آدرس ایمیل خود را وارد کنید تا یک حساب کاربری ایجاد کنید.
</p>
            <div class="caa_form_group">
              <div class="caf_form">
                <label>آدرس ایمیل</label>
                <div class="input-area"><input type="email" /></div>
              </div>
              <button class="btn btn-default acc_btn" type="submit" id="acc_Create">
                <span> <i class="fa fa-user btn_icon ml-2"></i>ایجاد یک حساب کاربری</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="create_account_area">
          <h2 class="caa_heading">قبلاً ثبت نام کرده اید؟</h2>
          <div class="caa_form_area">
            <div class="caa_form_group">
              <div class="login_email">
                <label>آدرس ایمیل</label>
                <div class="input-area"><input type="email" /></div>
              </div>
              <div class="login_password">
                <label>رمز عبور</label>
                <div class="input-area"><input type="password" /></div>
              </div>
              <p class="forgot_password">
                <a href="#" title="Recover your forgotten password" rel="">رمز عبور خود را فراموش کرده اید؟</a>
              </p>
              <button type="submit" id="acc_Login" class="btn btn-default acc_btn">
                <span> <i class="fa fa-lock btn_icon ml-2"></i>ورود</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
