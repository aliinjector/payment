@extends('app.shop.2.layouts.master')

@section('headerScripts')

@endsection

@section('content')

    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="tt-title-subpages noborder">ACCOUNT</h1>
                <div class="tt-shopping-layout">
                    <h2 class="tt-title">ORDER #001</h2><a href="account.html" class="tt-link-back"><i class="icon-e-19"></i> RETURN TO ACCOUNT PAGE</a>
                    <div class="tt-data">November 20, 2016</div>
                    <div class="tt-wrapper">
                        <div class="tt-table-responsive">
                            <table class="tt-table-shop-03">
                                <thead>
                                    <tr>
                                        <th>PRODUCT</th>
                                        <th>PRICE</th>
                                        <th>QUANTITY</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lorem ipsum dolor sit amet conse ctetur</td>
                                        <td>$100456</td>
                                        <td>1</td>
                                        <td>$100456</td>
                                    </tr>
                                    <tr>
                                        <td>Ut enim ad minim veniam, quis nostrud</td>
                                        <td>$100</td>
                                        <td>1</td>
                                        <td>$100</td>
                                    </tr>
                                    <tr>
                                        <td>Eexercitation ullamco laboris nisi ut aliquip ex ea</td>
                                        <td>$100</td>
                                        <td>1</td>
                                        <td>$100</td>
                                    </tr>
                                    <tr>
                                        <td>Commodo consequat</td>
                                        <td>$100</td>
                                        <td>1</td>
                                        <td>$100</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>SUBTOTAL</strong></td>
                                        <td>$300</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>INTERNATIONAL SHIPPING</strong></td>
                                        <td>$18</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>TOTAL</strong></td>
                                        <td><strong>$45</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tt-wrapper">
                        <div class="tt-shop-info">
                            <div class="tt-item">
                                <h6 class="tt-title">BILLING ADDRESS:</h6>
                                <div class="tt-description"><strong>Payment status: pendibg</strong>
                                    <p>Ut enim ad minim veniam, quis nostrud Eexercitation ullamco laboris nisi ut aliquip ex ea Commodo consequat</p>
                                </div>
                            </div>
                            <div class="tt-item">
                                <h6 class="tt-title">SHIPPING ADDRESS:</h6>
                                <div class="tt-description"><strong><a href="#">Payment status: pendibg</a></strong>
                                    <p>Ut enim ad minim veniam, quis nostrud Eexercitation ullamco laboris nisi ut aliquip ex ea Commodo consequat</p>
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
