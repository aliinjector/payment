@extends('app.shop.1.layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            @if(isset($products))

            <div class="card-body font-18">
                <h4 class="header-title mt-0">{{ __('app-shop-1-cart.cart') }}</h4>
                <p class="mb-4 text-muted">{{ __('app-shop-1-cart.cartDesc') }}.</p>
                <div class="table-responsive shopping-cart">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>{{ __('app-shop-1-cart.cartTableItem1') }}</th>
                                <th>{{ __('app-shop-1-cart.cartTableItem2') }}</th>
                                <th>{{ __('app-shop-1-cart.cartTableItem3') }}</th>
                                <th>{{ __('app-shop-1-cart.cartTableItem4') }}</th>
                                <th>{{ __('app-shop-1-cart.cartTableItem5') }}</th>
                            </tr>
                        </thead>
                        <tbody class="">

                            <form action="{{ route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id]) }}" method="post">
                                @csrf
                                @foreach ($cart->cartProduct as $cartProduct)
                                <tr>
                                    <td><img src="{{ $cartProduct->product->image['80,80'] }}" alt="" height="52">
                                        <p class="d-inline-block align-middle mb-0"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$cartProduct->product->id]) }}" target="_blank"
                                              class="d-inline-block align-middle mb-0 product-name">{{ $cartProduct->product->title }}</a>
                                            <br><span class="text-muted font-13">{{ !$cartProduct->color ? '' : $cartProduct->color->name}}</span></p>
                                    </td>
                                    <td>{{ number_format($cartProduct->product->price) }} {{ __('app-shop-1-cart.tooman') }} </td>
                                    <td>
                                        @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($cartProduct->product->off_price == null) 0
                                        @else {{ number_format($cartProduct->product->price-$cartProduct->product->off_price)}}
                                            @endif
                                    </td>
                                    <td>
                                        <select class="form-control col-lg-5 p-1" autocomplete="off" tabindex="-1" name="{{ $cartProduct->product->id }}">
                                            <option @if($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == 1) selected
                                                @endif value="1">۱</option>
                                            <option @if($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == 2) selected
                                                @endif value="2">۲</option>
                                            <option @if($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == 3) selected
                                                @endif value="3">۳</option>
                                            <option @if($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == 4) selected
                                                @endif value="4">۴</option>
                                            <option @if($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == 5) selected
                                                @endif value="5">۵</option>
                                        </select>

                                    </td>

                                    <td>
                                        <a href="" class="text-danger" id="removeProduct" data-color="{{  !$cartProduct->color ? null : $cartProduct->color->id }}"  data-cart="{{ \Auth::user()->cart()->get()->first()->id }}" data-id="{{ $cartProduct->product->id }}"><i class="mdi mdi-close-circle-outline font-18"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="d-flex input-group-append justify-content-end">
                    <button type="submit" class="btn bg-blue-omid mt-4 text-white rounded">{{ __('app-shop-1-cart.sabtVaEdame') }}</button>
                    </form>

                </div>

                <!--end row-->
            </div>
            @else

            <h4 class="d-flex justify-content-center p-4">{{ __('app-shop-1-cart.noProduct') }}</h4>

            @endif

            <!--end card-->
        </div>
        <!--end card-body-->
    </div>
    <!--end col-->
</div>


</div>
@endsection
@section('pageScripts')
  <script src="{{ asset('/app/shop/1/assets/js/cart.js') }}"></script>

@include('sweet::alert')
@stop
