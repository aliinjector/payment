@extends('app.shop.5.layouts.master')
@section('content')

<!-- main-search start -->
<div class="main-search-active">
    <div class="sidebar-search-icon">
        <button class="search-close"><span class="icon-close"></span></button>
    </div>
    <div class="sidebar-search-input">
        <form>
            <div class="form-search">
                <input id="search" class="input-text" value="" placeholder="Search entire store here ..." type="search">
                <button class="search-btn" type="button">
                    <i class="icon-magnifier"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<!-- main-search start -->

<!-- breadcrumb-area start -->
<div class="breadcrumb-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="breadcrumb-title">Wish List</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Wish List page</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb wishlist-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" class="cart-table">
                    <div class=" table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="plantmore-product-price">Unit Price</th>
                                    <th class="plantmore-product-stock-status">Stock Status</th>
                                    <th class="plantmore-product-add-cart">add to cart</th>
                                    <th class="plantmore-product-remove">remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#"><img src="assets/images/cart/1.jpg" alt=""></a></td>
                                    <td class="plantmore-product-name"><a href="#">Nullam maximus</a></td>
                                    <td class="plantmore-product-price"><span class="amount">$23.39</span></td>
                                    <td class="plantmore-product-stock-status"><span class="in-stock">in stock</span></td>
                                    <td class="plantmore-product-add-cart"><a href="#">add to cart</a></td>
                                    <td class="plantmore-product-remove"><a href="#"><i class="ion-close"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#"><img src="assets/images/cart/2.jpg" alt=""></a></td>
                                    <td class="plantmore-product-name"><a href="#">Natus erro</a></td>
                                    <td class="plantmore-product-price"><span class="amount">$30.50</span></td>
                                    <td class="plantmore-product-stock-status"><span class="in-stock">in stock</span></td>
                                    <td class="plantmore-product-add-cart"><a href="#">add to cart</a></td>
                                    <td class="plantmore-product-remove"><a href="#"><i class="ion-close"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#"><img src="assets/images/cart/3.jpg" alt=""></a></td>
                                    <td class="plantmore-product-name"><a href="#">Sit voluptatem</a></td>
                                    <td class="plantmore-product-price"><span class="amount">$40.19</span></td>
                                    <td class="plantmore-product-stock-status"><span class="out-stock">out stock</span></td>
                                    <td class="plantmore-product-add-cart"><a href="#">add to cart</a></td>
                                    <td class="plantmore-product-remove"><a href="#"><i class="ion-close"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->
@endsection
