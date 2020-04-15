@extends('app.shop.1.layouts.master')
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
                <h2 class="breadcrumb-title">Compare</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Compare</li>
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
                <form action="#">

                    <!-- Compare Table -->
                    <div class="compare-table table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="first-column">Product</td>
                                    <td class="product-image-title">
                                        <a href="#" class="image"><img src="assets/images/product/1.jpg" alt="Compare Product"></a>
                                        <a href="#" class="category">Furniture</a>
                                        <a href="#" class="title">Rinosin title</a>
                                    </td>
                                    <td class="product-image-title">
                                        <a href="#" class="image"><img src="assets/images/product/2.jpg" alt="Compare Product"></a>
                                        <a href="#" class="category">Furniture</a>
                                        <a href="#" class="title">Macro title</a>
                                    </td>
                                    <td class="product-image-title">
                                        <a href="#" class="image"><img src="assets/images/product/3.jpg" alt="Compare Product"></a>
                                        <a href="#" class="category">Furniture</a>
                                        <a href="#" class="title">Oakley title</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first-column">Description</td>
                                    <td class="pro-desc"><p>Eye glasses are very important for thos whos have some difficult in their eye to see every hing clearly and perfectly</p></td>
                                    <td class="pro-desc"><p>Eye glasses are very important for thos whos have some difficult in their eye to see every hing clearly and perfectly</p></td>
                                    <td class="pro-desc"><p>Eye glasses are very important for thos whos have some difficult in their eye to see every hing clearly and perfectly</p></td>
                                </tr>
                                <tr>
                                    <td class="first-column">Price</td>
                                    <td class="pro-price">$295</td>
                                    <td class="pro-price">$275</td>
                                    <td class="pro-price">$395</td>
                                </tr>
                                <tr>
                                    <td class="first-column">Color</td>
                                    <td class="pro-color">Black</td>
                                    <td class="pro-color">Black</td>
                                    <td class="pro-color">Black</td>
                                </tr>
                                <tr>
                                    <td class="first-column">Stock</td>
                                    <td class="pro-stock">In Stock</td>
                                    <td class="pro-stock">In Stock</td>
                                    <td class="pro-stock">In Stock</td>
                                </tr>
                                <tr>
                                    <td class="first-column">Add to cart</td>
                                    <td class="pro-addtocart"><a href="#" class="add-to-cart" tabindex="0"><span>ADD TO CART</span></a></td>
                                    <td class="pro-addtocart"><a href="#" class="add-to-cart" tabindex="0"><span>ADD TO CART</span></a></td>
                                    <td class="pro-addtocart"><a href="#" class="add-to-cart" tabindex="0"><span>ADD TO CART</span></a></td>
                                </tr>
                                <tr>
                                    <td class="first-column">Delete</td>
                                    <td class="pro-remove"><button><i class="ion-trash-a"></i></button></td>
                                    <td class="pro-remove"><button><i class="ion-trash-a"></i></button></td>
                                    <td class="pro-remove"><button><i class="ion-trash-a"></i></button></td>
                                </tr>
                                <tr>
                                    <td class="first-column">Rating</td>
                                    <td class="pro-ratting">
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                    </td>
                                    <td class="pro-ratting">
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                    </td>
                                    <td class="pro-ratting">
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                        <i class="ion-star"></i>
                                    </td>
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
