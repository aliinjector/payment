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
                <h2 class="breadcrumb-title">لیست محصولات سبد خرید</h2>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
  @if(isset($products))
<div class="main-content-wrap section-ptb cart-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" class="cart-table">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">تصویر محصول</th>
                                    <th class="cart-product-name">محصول</th>
                                    <th class="plantmore-product-price">قیمت واحد کالا</th>
                                    <th class="plantmore-product-quantity">میزان تخفیف</th>
                                    <th class="plantmore-product-subtotal">تعداد</th>
                                    <th class="plantmore-product-remove">حذف</th>

                                </tr>
                            </thead>
                            <tbody>
                              <form action="{{ route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id]) }}" method="post">
                                  @csrf
                                  @foreach ($cart->cartProduct as $cartProduct)
                                  <tr>
                                    <td class="plantmore-product-thumbnail"><a href="{{ route('product', ['shop'=>$cartProduct->product->shop->english_name, 'slug'=>$cartProduct->product->slug, 'id' => $cartProduct->product->id]) }}"><img src="{{ asset($cartProduct->product->image['80,80'] ? $cartProduct->product->image['80,80'] : '/images/no-image.png') }}" alt=""></a></td>
                                    <td class="plantmore-product-name"><a href="{{ route('product', ['shop'=>$cartProduct->product->shop->english_name, 'slug'=>$cartProduct->product->slug, 'id' => $cartProduct->product->id]) }}">{{ $cartProduct->product->title }}</a>  <br><span>{{ !$cartProduct->color ? '' : $cartProduct->color->name}}</span></td>
                                    <td class="plantmore-product-price"><span class="amount">{{ number_format($cartProduct->product->price) }} تومان </span></td>
                                    <td>
                                        @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($cartProduct->product->off_price != null and $cartProduct->product->off_price_started_at < now() and $cartProduct->product->off_price_expired_at > now())
                                          {{ number_format($cartProduct->product->price-$cartProduct->product->off_price)}}
                                        @else
                                          0
                                            @endif
                                    </td>
                                    <td class="plantmore-product-quantity">

                                        <select class="form-control p-1" style="width: 65px;" autocomplete="off" tabindex="-1" name="{{ $cartProduct->product->id }}-{{ $cartProduct->id }}">
                                        @for ($i=1; $i < $cartProduct->product->amount; $i++)

                                            <option @if($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == $i) selected @endif value="{{ $i }}">
                                                {{ $i }}
                                              </option>

                                              @endfor

                                        </select>

                                    </td>


                                        <td>
                                        <a href="" class="text-danger amount" id="removeProduct" data-color="{{  !$cartProduct->color ? null : $cartProduct->color->id }}"  data-cart="{{ \Auth::user()->cart()->get()->first()->id }}" data-id="{{ $cartProduct->product->id }}" data-cartp="{{ $cartProduct->id }}"><i class="ion-close font-18"></i></a>
                                      </td>

                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->
@else

<h4 class="d-flex justify-content-center p-4">محصولی در سبد خرید شما وجود ندارد</h4>

@endif

@endsection
