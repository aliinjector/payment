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

            <h1 class="tt-title-subpages noborder my-4">ویرایش اطلاعات کاربری</h1>
            <div class="tt-shopping-layout">
                <div class="tt-wrapper">
                    @include('dashboard.layouts.errors')

                    <h6 class="tt-title my-2">ویرایش اطلاعات</h6>
                    <div class="form-default">
                        <form action="{{ route('user-panel.update', $user->id ) }}" id="submit" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="shopInputFirstName" class="control-label">نام </label>
                                <input type="text" class="form-control" name="firstName" value="{{ old('city', $user->firstName) }}">
                            </div>
                            <div class="form-group">
                                <label for="shopInputLastName" class="control-label">نام خانوادگی </label>
                                <input type="text" class="form-control" name="lastName" value="{{ old('province', $user->lastName) }}">
                            </div>
                            <div class="form-group">
                                <label for="shopInputLastName" class="control-label">ایمیل </label>
                                <input type="text" class="form-control" name="email" value="{{ old('zip_code', $user->email) }}">
                            </div>
                            <div class="form-group">
                                <label for="shopCompanyName" class="control-label">موبایل </label>
                                <input type="text" class="form-control" name="mobile" value="{{ old('address', $user->mobile) }}">
                            </div>
                            <div class="form-group">
                              <div class="card mt-3">
                                  <div class="card-body">
                                      <h4 class="mt-0 header-title">آواتار</h4>
                                      <input type="file" id="input-file-now" name="avatar" class="dropify" data-default-file="{{ asset($user->avatar) }}">
                                  </div>
                              </div>
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
