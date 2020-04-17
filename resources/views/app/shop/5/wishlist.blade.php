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
                <h2 class="breadcrumb-title">لیست علاقه مندی ها</h2>
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
                @if(isset($wishlistProducts))
                <form action="#" class="cart-table">
                    <div class=" table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">تصویر محصول</th>
                                    <th class="cart-product-name">محصول</th>
                                    <th class="plantmore-product-price">قیمت واحد کالا</th>
                                    <th class="plantmore-product-stock-status">میزان تخفیف</th>
                                    <th class="plantmore-product-add-cart plantmore-product-remove">سبد خرید</th>
                                    <th class="plantmore-product-add-cart plantmore-product-remove">حذف</th>

                                </tr>
                            </thead>
                            <tbody>
                                  @foreach ($wishlistProducts as $product)
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}"><img src="{{ asset($product->image['80,80'] ? $product->image['80,80'] : '/images/no-image.png') }}" alt=""></a></td>
                                    <td class="plantmore-product-name"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}">{{ $product->title }}</a></td>
                                    <td class="plantmore-product-price"><span class="amount">{{ number_format($product->price) }} {{ __('app-shop-1-cart.tooman') }} </span></td>
                                    <td class="plantmore-product-stock-status"><span class="in-stock">@if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now())
                                       {{ number_format($product->price-$product->off_price)}}
                                    @else
                                      0
                                        @endif</span></td>
                                    <td class="plantmore-product-add-cart"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}">اضافه کردن به سبد خرید</a></td>
                                    <td class="plantmore-product-remove"><a href="#"><i class="ion-close ml-1" style="color:#e97730"></i>{{ __('app-shop-account-wishlist.hazf') }}</a></td>
                                </tr>
                                      @endforeach

                            </tbody>
                        </table>
                    </div>
                </form>
                @else

                <h4 class="d-flex justify-content-center p-4">محصولی در لیست شما وجود ندارد</h4>

                @endif
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->
@endsection
