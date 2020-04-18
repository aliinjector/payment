@extends('app.shop.4.layouts.master')

@section('content')

    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="/user-cart">سبد خرید</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">لیست محصولات سبد خرید</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
            @if(isset($products))
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">تصویر محصول</th>
                                            <th class="pro-title">محصول</th>
                                            <th class="pro-price">قیمت واحد کالا</th>
                                            <th class="pro-quantity">تعداد</th>
                                            <th class="pro-subtotal">میزان تخفیف</th>
                                            <th class="pro-remove">حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <form action="{{ route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id]) }}" method="post">
                                          @csrf
                                          @foreach ($cart->cartProduct as $cartProduct)
                                        <tr>
                                            <td class="pro-thumbnail"><a href="{{ route('product', ['shop'=>$cartProduct->product->shop->english_name, 'slug'=>$cartProduct->product->slug, 'id' => $cartProduct->product->id]) }}"><img class="img-fluid" src="{{ asset($cartProduct->product->image['80,80'] ? $cartProduct->product->image['80,80'] : '/images/no-image.png') }}" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="{{ route('product', ['shop'=>$cartProduct->product->shop->english_name, 'slug'=>$cartProduct->product->slug, 'id' => $cartProduct->product->id]) }}">{{ $cartProduct->product->title }}</a></td>
                                            <td class="pro-price"><span>{{ number_format($cartProduct->product->price) }} تومان </span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input type="text" value="1"></div>
                                                <select class="form-control p-1" style="width: 65px;" autocomplete="off" tabindex="-1" name="{{ $cartProduct->product->id }}-{{ $cartProduct->id }}">
                                            @for ($i=1; $i < $cartProduct->product->amount; $i++)

                                                    <option @if($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == $i) selected @endif value="{{ $i }}">
                                                        {{ $i }}
                                                      </option>
                                            </td>
                                            <td class="pro-subtotal"><span>
                                              @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($cartProduct->product->off_price != null and $cartProduct->product->off_price_started_at < now() and $cartProduct->product->off_price_expired_at > now())
                      													{{ number_format($cartProduct->product->price-$cartProduct->product->off_price)}}
                      												@else
                      													0
                      														@endif</span></td>
                                                  <td>
                                                      <a class="pro-remove" href="" class="text-danger" id="removeProduct" data-color="{{  !$cartProduct->color ? null : $cartProduct->color->id }}"  data-cart="{{ \Auth::user()->cart()->get()->first()->id }}" data-id="{{ $cartProduct->product->id }}" data-cartp="{{ $cartProduct->id }}"><i class="fa fa-trash"></i><i class="fa fa-trash-o"></i></a>
                                                  </td>
                                        </tr>

                                    	  @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>

                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Enter Your Coupon Code" required />
                                        <button class="btn btn-sqr">Apply Coupon</button>
                                    </form>
                                </div>
                                <div class="cart-update">
                                    <a href="#" class="btn btn-sqr">Update Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Cart Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>$230</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td>$70</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">$300</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="checkout.html" class="btn btn-sqr d-block">Proceed Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->
		@endsection
