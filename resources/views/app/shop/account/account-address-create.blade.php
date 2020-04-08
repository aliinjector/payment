@extends('app.shop.account.layouts.master')
@section('content')

<style media="screen">
  .alert-danger{
    background-color: #e35471;
    color: white;
    padding: 1em;
  }
</style>


        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">

                <h1 class="">اضافه کردن آدرس جدید</h1>
                <div class="">
                    <div class="">
                      @include('dashboard.layouts.errors')

                        <h6 class="">وارد کردن آدرس جدید</h6>
                        <div class="form-default">
                          <form action="{{ route('user-address.store') }}" id="submit" method="post">
                            @csrf
                                <div class="form-group">
                                    <label for="shopInputLastName" class="control-label">استان *</label>
                                    <input type="text" class="form-control" name="province" id="shopInputLastName" value="{{ old('province') }}">
                                </div>
                                <div class="form-group">
                                    <label for="shopInputFirstName" class="control-label">شهر *</label>
                                    <input type="text" class="form-control" name="city" id="shopInputFirstName" value="{{ old('city') }}">
                                </div>
                                <div class="form-group">
                                    <label for="shopInputLastName" class="control-label">کد پستی *</label>
                                    <input type="text" class="form-control" name="zip_code" id="shopInputLastName" value="{{ old('zip_code') }}">
                                </div>
                                <div class="form-group">
                                    <label for="shopCompanyName" class="control-label">نشانی *</label>
                                    <input type="text" class="form-control" name="address" id="shopCompanyName" value="{{ old('address') }}">
                                </div>

                                <div class="row tt-offset-21">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-success iranyekan">ثبت </button>
                                    </div>
                                </div>
                            </form>
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
