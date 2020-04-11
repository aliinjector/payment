@extends('app.shop.3.layouts.master')
@section('content')


<!-- Page item Area -->
<div id="page_item_area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
      <h3>لیست علاقه مندی ها</h3>
      </div>
    </div>
  </div>
</div>

<!-- Wishlist Page -->
<div class="wishlist-page">
  <div class="container">
    <div class="table-responsive">
      @if(isset($wishlistProducts))
      <table class="table cart-table cart_prdct_table text-center">
        <thead>
          <tr>
              <th class="border-bottom-0">تصویر محصول</th>
              <th class="border-bottom-0">{{ __('app-shop-1-cart.cartTableItem1') }}</th>
              <th class="border-bottom-0">{{ __('app-shop-1-cart.cartTableItem2') }}</th>
              <th class="border-bottom-0">{{ __('app-shop-1-cart.cartTableItem3') }}</th>
              <th class="d-flex justify-content-around border-bottom-0">{{ __('app-shop-1-cart.cartTableItem5') }}</th>
          </tr>
        </thead>
        <tbody class="">
                @foreach ($wishlistProducts as $product)
                <tr>
                    <td><img src="{{ asset($product->image['80,80'] ? $product->image['80,80'] : '/images/no-image.png') }}" alt="" height="52"></td>
                          <td><p class="d-inline-block align-middle mb-0"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}" target="_blank"
                              class="d-inline-block align-middle mb-0 product-name">{{ $product->title }}</a>
                            <br></p>
                    </td>
                    <td>{{ number_format($product->price) }} {{ __('app-shop-1-cart.tooman') }} </td>
                    <td>
                        @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now())
                           {{ number_format($product->price-$product->off_price)}}
                        @else
                          0
                            @endif
                    </td>
                    <td class="d-flex justify-content-center">
                      <a class="btn bg-blue-omid text-white rounded m-1" target="_blank" href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}" data-target="#ModalquickView"><i class="icon-f-73"></i>مشاهده محصول</a>
                      <a href="#" class="btn btn-danger text-white rounded m-1" id="removeProduct" data-shop="{{ $shop->english_name }}" data-wishlist="{{ \Auth::user()->wishlist()->get()->where('shop_id', $shop->id)->first()->id }}" data-id="{{ $product->id }}"><i class="icon-h-02"></i>{{ __('app-shop-account-wishlist.hazf') }}</a>
                    </td>
                </tr>
                @endforeach

        </tbody>
      </table>

      @else

      <h4 class="d-flex justify-content-center p-4">محصولی در لیست شما وجود ندارد</h4>

      @endif


    </div>
  </div>
</div>


@endsection
