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

    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">

            <h1 class="tt-title-subpages noborder my-4">تغییر رمز عبور</h1>
            <div class="tt-shopping-layout">
                <div class="tt-wrapper">
                    @include('dashboard.layouts.errors')

                    <div class="form-default">
                        <form action="{{ route('user-panel.change-password.store', $user->id ) }}" id="submit" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('put') }}
                            <div class="form-group">
                                <label for="shopInputFirstName" class="control-label">رمز عبور قعلی </label>
                                <input type="password" class="form-control" name="old_password">
                            </div>
                            <div class="form-group">
                                <label for="shopInputLastName" class="control-label">رمز عبور جدید </label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="shopInputLastName" class="control-label">تکرار رمز عبور جدید </label>
                                <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation">
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
    <script src="/app/shop/1/assets/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="/app/shop/2/css/rtl.css">
    <link rel="stylesheet" href="/app/shop/2/css/custom.css">
    @toastr_js
    @toastr_render
    @include('sweet::alert')
    @yield('footerScripts')
    <script src="{{url('stats/script.js')}}"></script>

@endsection
