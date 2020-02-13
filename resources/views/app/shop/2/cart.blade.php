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
                     <th>خصوصیات محصول</th>
                     <th>{{ __('app-shop-2-cart.cartTableItem5') }}</th>
                  </tr>
                  <form action="{{ route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id]) }}" method="post">
                     @csrf
                     @if(\Auth::user()->cart()->get()->first() != null)
                     @foreach ($cart->cartProduct as $cartProduct)
                     <tr>
                        <td>
                           <h2 class="tt-title"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$cartProduct->product->id]) }}" target="_blank">{{ $cartProduct->product->title }}</a></h2>
                           <ul class="tt-list-description">
                              <li>{{ !$cartProduct->color ? '' : $cartProduct->color->name}}</li>
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
                           <div class="tt-price">{{ number_format($cartProduct->product->price) }}</div>
                        </td>
                        <td>
                           <div class="tt-price subtotal">
                              @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($cartProduct->product->off_price == null) 0
                              @else {{ number_format($cartProduct->product->price-$cartProduct->product->off_price)}}
                              @endif
                           </div>
                        </td>
                        <td>
                           <div class="detach-quantity-desctope">
                              <div class="tt-input-counter style-01"><span class="minus-btn"></span>
                                 <input name="{{ $cartProduct->product->id }}-{{ $cartProduct->id }}" type="text" @if($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == 1)
                                 value="1" @elseif($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == 1)
                                 value="1" @elseif($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == 2)
                                 value="2" @elseif($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == 3)
                                 value="3" @elseif($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == 4)
                                 value="4"
                                 @else
                                 value="5"
                                 @endif size="5"> <span class="plus-btn"></span>
                              </div>
                           </div>
                        </td>
                        <td>

                        @if ($cartProduct->specification != null)
                        @foreach($cartProduct->specification as $specificationId)
                          @foreach($specificationItems->where('id', $specificationId)->unique('id') as $specificationItem)
                          {{ $specificationItem->specification->name }} :  {{ $specificationItem->name }} <br>
                          @endforeach
                        @endforeach
                      @endif

                      </td>
                        <td>
                           <a href="" id="removeProduct" data-cartp="{{ $cartProduct->id }}" class="tt-btn-close" data-color="{{  !$cartProduct->color ? null : $cartProduct->color->id }}" data-cart="{{ \Auth::user()->cart()->get()->first()->id }}" data-id="{{ $cartProduct->product->id }}"></a>
                        </td>
                     </tr>
                     @endforeach
                   @endif
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
