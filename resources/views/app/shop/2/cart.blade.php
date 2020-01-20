@extends('app.shop.2.layouts.master')
@section('headerScripts')
@endsection
@section('content')
<div id="tt-pageContent">
   <div class="container-indent">
      <div class="container">
         <h3 class="noborder text-center iranyekan">{{ __('app-shop-2-cart.cart') }}</h3>
         @isset($products)
         <div class="tt-shopcart-table-02">
            <table>
               <tbody>
                  <tr>
                     <th>{{ __('app-shop-2-cart.cartTableItem1') }}</th>
                     <th>{{ __('app-shop-2-cart.cartTableItem2') }}</th>
                     <th>{{ __('app-shop-2-cart.cartTableItem3') }}</th>
                     <th>{{ __('app-shop-2-cart.cartTableItem4') }}</th>
                     <th>{{ __('app-shop-2-cart.cartTableItem5') }}</th>
                  </tr>
                  <form action="{{ route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id]) }}" method="post">
                     @csrf
                     @foreach ($products as $product)
                     <tr>
                        <td>
                           <h2 class="tt-title"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}" target="_blank">{{ $product->title }}</a></h2>
                           <ul class="tt-list-description">
                              <li>Color: Green</li>
                           </ul>
                           <ul class="tt-list-parameters">
                              <li>
                                 <div class="tt-price">320 {{ __('app-shop-2-cart.tooman') }}</div>
                              </li>
                              <li>
                                 <div class="detach-quantity-mobile"></div>
                              </li>
                              <li>
                                 <div class="tt-price subtotal">320 {{ __('app-shop-2-cart.tooman') }}</div>
                              </li>
                           </ul>
                        </td>
                        <td>
                           <div class="tt-price">{{ number_format($product->price) }}</div>
                        </td>
                        <td>
                           <div class="tt-price subtotal">
                              @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($product->off_price == null) 0
                              @else {{ number_format($product->price-$product->off_price)}}
                              @endif
                           </div>
                        </td>
                        <td>
                           <div class="detach-quantity-desctope">
                              <div class="tt-input-counter style-01"><span class="minus-btn"></span>
                                 <input name="{{ $product->id }}" type="text" @if($product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $product->id)->first()->quantity == 1)
                                 value="1" @elseif($product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $product->id)->first()->quantity == 1)
                                 value="1" @elseif($product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $product->id)->first()->quantity == 2)
                                 value="2" @elseif($product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $product->id)->first()->quantity == 3)
                                 value="3" @elseif($product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $product->id)->first()->quantity == 4)
                                 value="4"
                                 @else
                                 value="5"
                                 @endif size="5"> <span class="plus-btn"></span>
                              </div>
                           </div>
                        </td>
                        <td>
                           <a href="" id="removeProduct" class="tt-btn-close" data-cart="{{ \Auth::user()->cart()->get()->first()->id }}" data-id="{{ $product->id }}"></a>
                        </td>
                     </tr>
                     @endforeach
               </tbody>
            </table>
            <div class="tt-shopcart-btn d-flex input-group-append justify-content-end iranyekan">
            <button type="submit" style="background-color:#2879FE!important;" class="btn">{{ __('app-shop-2-cart.sabtVaEdame') }}</button>
            </form>
            </div>
         </div>
         @endisset
      </div>
   </div>
</div>
@endsection
@section('footerScripts')
@endsection
