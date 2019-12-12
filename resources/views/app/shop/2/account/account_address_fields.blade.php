@extends('app.shop.2.layouts.master-user')

@section('headerScripts')

@endsection

@section('content')

    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="tt-title-subpages noborder">اضافه کردن آدرس جدید</h1>
                <div class="tt-shopping-layout">
                    <div class="tt-wrapper">
                        <h6 class="tt-title">وارد کردن آدرس جدید</h6>
                        <div class="form-default">
                            <form>
                                <div class="form-group">
                                    <label for="shopInputFirstName" class="control-label">شهر *</label>
                                    <input type="text" class="form-control" id="shopInputFirstName">
                                </div>
                                <div class="form-group">
                                    <label for="shopInputLastName" class="control-label">استان *</label>
                                    <input type="text" class="form-control" id="shopInputLastName">
                                </div>
                                <div class="form-group">
                                    <label for="shopInputLastName" class="control-label">کد پستی *</label>
                                    <input type="text" class="form-control" id="shopInputLastName">
                                </div>
                                <div class="form-group">
                                    <label for="shopCompanyName" class="control-label">آدرس *</label>
                                    <input type="text" class="form-control" id="shopCompanyName">
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
