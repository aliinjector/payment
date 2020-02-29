<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ __('app-shop-2-layouts-master.pageTitle') }}</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="/app/shop/2/css/style.css">
    <link href="/app/shop/2/font/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/app/shop/2/css/pagination.css" rel="stylesheet">
    <link rel="stylesheet" href="/app/shop/1/assets/css/jquery-ui.css" />
    <script src="/app/shop/1/assets/js/jquery.min.js"></script>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    @yield('headerScripts')
    <link rel="stylesheet" href="{{ asset('/app/shop/2/css/master.css') }}" />
    <style media="screen">
    </style>
    @toastr_css
</head>

<body class="p-5">
<style media="screen">
  .alert-danger{
    background-color: #e35471;
    color: white;
    padding: 1em;
  }
</style>

    <div id="tt-pageContent">
      <div class="row justify-content-end">
      @if(\auth::user()->type == 'customer')
        <a href="{{ url('/'.$shop_name) }}">
          <button type="button" class="border-0 btn-warning p-2 rounded" style="
                font-size: 19px;
                padding-bottom: 7px!important;
                padding-top: 13px!important;
            ">
                    بازشگت به فروشگاه
                </button>
      </a>
    @else
      <a href="{{ route('dashboard.index') }}">
        <button type="button" class="border-0 btn-warning p-2 rounded" style="
              font-size: 19px;
              padding-bottom: 7px!important;
              padding-top: 13px!important;
          ">
                پنل مدیریت
              </button>
    </a>
    @endif
      <a href="{{ route('logout') }}">
        <button type="button" class="border-0 btn-danger mr-3 p-1 px-3 rounded" style="
              font-size: 18px;
          ">
                خروج از حساب<i class="fa fa-arrow-circle-left m-2"></i>
            </button>
    </a>
    </div>
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">

                <h1 class="tt-title-subpages noborder">اضافه کردن آدرس جدید</h1>
                <div class="tt-shopping-layout">
                    <div class="tt-wrapper">
                      @include('dashboard.layouts.errors')

                        <h6 class="tt-title">وارد کردن آدرس جدید</h6>
                        <div class="form-default">
                          <form action="{{ route('user-address.store') }}" id="submit" method="post">
                            @csrf
                                <div class="form-group">
                                    <label for="shopInputFirstName" class="control-label">شهر *</label>
                                    <input type="text" class="form-control" name="city" id="shopInputFirstName">
                                </div>
                                <div class="form-group">
                                    <label for="shopInputLastName" class="control-label">استان *</label>
                                    <input type="text" class="form-control" name="province" id="shopInputLastName">
                                </div>
                                <div class="form-group">
                                    <label for="shopInputLastName" class="control-label">کد پستی *</label>
                                    <input type="text" class="form-control" name="zip_code" id="shopInputLastName">
                                </div>
                                <div class="form-group">
                                    <label for="shopCompanyName" class="control-label">نشانی *</label>
                                    <input type="text" class="form-control" name="address" id="shopCompanyName">
                                </div>

                                <div class="row tt-offset-21">
                                    <div class="col-auto">
                                        <button type="submit" class="btn iranyekan">ثبت </button>
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
            </div>
        </div>
      </body>
      <link rel="stylesheet" href="/app/shop/2/css/rtl.css">
      <link rel="stylesheet" href="/app/shop/2/css/custom.css">
      @toastr_js
      @toastr_render
      @include('sweet::alert')
      @yield('footerScripts')
      <script src="{{url('stats/script.js')}}"></script>
      </html>
