@extends('app.shop.2.layouts.master')

@section('headerScripts')
  <link rel="stylesheet" href="{{ asset('/app/shop/2/css/register.css') }}" />

@endsection

@section('content')

    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                <h1 class="tt-title-subpages noborder">{{ __('app-shop-2-register.title') }}</h1>
                <div class="tt-login-form">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6">
                            <div class="tt-item">
                                <h2 class="tt-title"> {{ __('app-shop-2-register.subtitle') }}</h2>
                                <div class="form-default">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li style="color: white">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif



                                    <form action="{{ route('template.register', $shop->english_name) }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">

                                        <div class="form-group">
                                            <label for="loginInputName">{{ __('app-shop-2-register.formItem1') }} *</label>
                                            <input type="text" name="firstName" value="{{ old('firstName') }}" class="form-control @error('firstName') is-invalid @enderror" placeholder="{{ __('app-shop-2-register.formItem1ex') }}">
                                            @error('firstName')
                                            <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="loginLastName">{{ __('app-shop-2-register.formItem2') }} *</label>
                                            <input type="text" name="lastName"  value="{{ old('lastName') }}"  class="form-control  @error('lastName') is-invalid @enderror" placeholder="{{ __('app-shop-2-register.formItem2ex') }}">
                                            @error('lastName')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="loginLastName">{{ __('app-shop-2-register.formItem3') }} *</label>
                                            <input type="text" name="mobile" value="{{ old('mobile') }}"  class="form-control @error('mobile') is-invalid @enderror" placeholder="{{ __('app-shop-2-register.formItem3ex') }}">
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="loginInputEmail">{{ __('app-shop-2-register.formItem4') }} *</label>
                                            <input type="text" name="email" value="{{ old('email') }}"  class="form-control  @error('email') is-invalid @enderror" placeholder="{{ __('app-shop-2-register.formItem4ex') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="loginInputPassword">{{ __('app-shop-2-register.formItem5') }} *</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="loginInputPassword">{{ __('app-shop-2-register.formItem6') }} *</label>
                                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('app-shop-2-register.formItem6ex') }}" >
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>




                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="form-group">
                                                    <button class="btn btn-border tt-btn-addtocart" type="submit">{{ __('app-shop-2-register.formBtn') }}</button>
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
