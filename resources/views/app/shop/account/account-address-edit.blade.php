@extends('app.shop.2.layouts.master-user')

@section('headerScripts')
<style media="screen">
    .alert-danger {
      background-color: #e35471;
        color: white;
        padding: 1em;
    }
</style>
@endsection

@section('content')
{{-- {{ dd($address) }} --}}
<div id="tt-pageContent">
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

@endsection

@section('footerScripts')

@endsection
