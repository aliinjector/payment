@extends('app.shop.2.layouts.master')

@section('headerScripts')

@endsection

@section('content')

    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="tt-title-subpages noborder">حساب کاربری</h1>
                <div class="tt-shopping-layout">
                    <h2 class="tt-title-border">نام:</h2>
                    <div class="tt-wrapper">
                        <h3 class="tt-title">ORDER HISTORY</h3>
                        <div class="tt-table-responsive">
                            <table class="tt-table-shop-01">
                                <thead>
                                    <tr>
                                        <th>ORDER</th>
                                        <th>DATE</th>
                                        <th>PAYMENT STATUS</th>
                                        <th>FULFILLMENT STATUS</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="shopping_order.html">#001</a></td>
                                        <td>November 20. 2016</td>
                                        <td>Processing</td>
                                        <td>Processing</td>
                                        <td>$40 fot 1 item</td>
                                    </tr>
                                    <tr>
                                        <td><a href="shopping_order.html">#001</a></td>
                                        <td>November 20. 2016</td>
                                        <td>Processing</td>
                                        <td>Processing</td>
                                        <td>$40 fot 1 item</td>
                                    </tr>
                                    <tr>
                                        <td><a href="shopping_order.html">#001</a></td>
                                        <td>November 20. 2016</td>
                                        <td>Processing</td>
                                        <td>Processing</td>
                                        <td>$40 fot 1 item</td>
                                    </tr>
                                    <tr>
                                        <td><a href="shopping_order.html">#001</a></td>
                                        <td>November 20. 2016</td>
                                        <td>Processing</td>
                                        <td>Processing</td>
                                        <td>$40 fot 1 item</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tt-wrapper">
                        <h3 class="tt-title">ACCOUNT DETAILS</h3>
                        <div class="tt-table-responsive">
                            <table class="tt-table-shop-02">
                                <tbody>
                                    <tr>
                                        <td>NAME:</td>
                                        <td>Lorem ipsum dolor sit AMET conse ctetur</td>
                                    </tr>
                                    <tr>
                                        <td>E-MAIL:</td>
                                        <td>Ut enim ad minim veniam, quis nostrud</td>
                                    </tr>
                                    <tr>
                                        <td>ADDRESS:</td>
                                        <td>Eexercitation ullamco laboris nisi ut aliquip ex ea</td>
                                    </tr>
                                    <tr>
                                        <td>ADDRESS 2:</td>
                                        <td>Commodo consequat. Duis aute irure dol</td>
                                    </tr>
                                    <tr>
                                        <td>COUNTRY:</td>
                                        <td>Lorem ipsum dolor sit amet conse ctetur</td>
                                    </tr>
                                    <tr>
                                        <td>ZIP:</td>
                                        <td>555</td>
                                    </tr>
                                    <tr>
                                        <td>PHONE:</td>
                                        <td>888888888</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><a href="#" class="btn btn-border">VIEW ADDRESS 2</a></div>
                </div>
            </div>
        </div>
    </div>

        @endsection

        @section('footerScripts')

        @endsection
