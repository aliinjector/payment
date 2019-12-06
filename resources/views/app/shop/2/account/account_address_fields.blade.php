
@extends('app.shop.2.layouts.master')

@section('headerScripts')

@endsection

@section('content')

    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="tt-title-subpages noborder">ACCOUNT</h1>
                <div class="tt-shopping-layout">
                    <h2 class="tt-title">YOUR ADDRESS</h2>
                    <div class="tt-wrapper"><a href="#" class="btn">ADD A NEW ADDRESS</a>
                        <br><a href="account.html" class="tt-link-back"><i class="icon-h-46"></i> RETURN TO ACCOUNT PAGE</a></div>
                    <div class="tt-wrapper">
                        <h6 class="tt-title">ADD A NEW ADDRESS</h6>
                        <div class="form-default">
                            <form>
                                <div class="form-group">
                                    <label for="shopInputFirstName" class="control-label">FIRST NAME *</label>
                                    <input type="text" class="form-control" id="shopInputFirstName">
                                </div>
                                <div class="form-group">
                                    <label for="shopInputLastName" class="control-label">LAST NAME *</label>
                                    <input type="text" class="form-control" id="shopInputLastName">
                                </div>
                                <div class="form-group">
                                    <label for="shopCompanyName" class="control-label">COMPANY NAME</label>
                                    <input type="text" class="form-control" id="shopCompanyName">
                                </div>
                                <div class="form-group">
                                    <label for="shopCompanyName" class="control-label">COUNTRY *</label>
                                    <select class="form-control">
                                        <option>Country</option>
                                        <option>Country 02</option>
                                        <option>Country 03</option>
                                        <option>Country 04</option>
                                        <option>Country 05</option>
                                        <option>Country 06</option>
                                        <option>Country 07</option>
                                        <option>Country 08</option>
                                        <option>Country 09</option>
                                        <option>Country 10</option>
                                        <option>Country 11</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shopAddress" class="control-label">ADDRESS *</label>
                                    <input type="text" class="form-control" id="shopAddress">
                                </div>
                                <div class="form-group">
                                    <label for="shopTown" class="control-label">TOWN / CITY *</label>
                                    <input type="text" class="form-control" id="shopTown">
                                </div>
                                <div class="form-group">
                                    <label for="shopState" class="control-label">STATE / COUNTY *</label>
                                    <input type="text" class="form-control" id="shopState">
                                </div>
                                <div class="form-group">
                                    <label for="shopPostCode" class="control-label">POSTCODE / ZIP *</label>
                                    <input type="text" class="form-control" id="shopPostCode">
                                </div>
                                <div class="form-group">
                                    <label for="shopPhone" class="control-label">PHONE</label>
                                    <input type="text" class="form-control" id="shopPhone">
                                </div>
                                <div class="form-group">
                                    <label for="shopEmail" class="control-label">EMAIL ADDRESS *</label>
                                    <input type="text" class="form-control" id="shopEmail">
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="checkBox11" name="checkbox">
                                    <label for="checkBox11"><span class="check"></span> <span class="box"></span> Set as deafult address?</label>
                                </div>
                                <div class="row tt-offset-21">
                                    <div class="col-auto">
                                        <button type="submit" class="btn">ADD ADDRESS</button>
                                    </div>
                                    <div class="col-auto align-self-center">or <a href="#" class="tt-link">Cancel</a></div>
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
