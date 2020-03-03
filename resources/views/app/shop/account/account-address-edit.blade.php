@extends('app.shop.account.layouts.master')
@section('content')

<style media="screen">
    .alert-danger {
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

            <h1 class="tt-title-subpages noborder">ویرایش کردن آدرس</h1>
            <div class="tt-shopping-layout">
                <div class="tt-wrapper">
                    @include('dashboard.layouts.errors')

                    <h6 class="tt-title">ویرایش آدرس</h6>
                    <div class="form-default">
                        <form action="{{ route('user-address.update', $address->id ) }}" id="submit" method="post">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="shopInputFirstName" class="control-label">شهر *</label>
                                <input type="text" class="form-control" name="city" value="{{ $address->city }}">
                            </div>
                            <div class="form-group">
                                <label for="shopInputLastName" class="control-label">استان *</label>
                                <input type="text" class="form-control" name="province" value="{{ $address->province }}">
                            </div>
                            <div class="form-group">
                                <label for="shopInputLastName" class="control-label">کد پستی *</label>
                                <input type="text" class="form-control" name="zip_code" value="{{ $address->zip_code }}">
                            </div>
                            <div class="form-group">
                                <label for="shopCompanyName" class="control-label">نشانی *</label>
                                <input type="text" class="form-control" name="address" value="{{ $address->address }}">
                            </div>

                            <div class="row tt-offset-21">
                                <div class="col-auto">
                                    <button type="submit" class="btn iranyekan btn-success">ثبت </button>
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
  <link rel="stylesheet" href="/app/shop/2/css/rtl.css">
  <link rel="stylesheet" href="/app/shop/2/css/custom.css">
  @toastr_js
  @toastr_render
  @include('sweet::alert')
  @yield('footerScripts')
  <script src="{{url('stats/script.js')}}"></script>
@endsection
