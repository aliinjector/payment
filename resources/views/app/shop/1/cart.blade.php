@extends('app.shop.1.layouts.master')
@section('content')
<div class="row p-5">
    <div class="col-lg-12">
      <div class="row">
          <div class="col-sm-12">
              <div class="page-title-box">
                  <div>
                    @if($errors->any())
                    <div class="alert alert-danger p-5">
                       <p><strong>متاسفانه خطایی پیش آمده:</strong></p>
                       <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                       </ul>
                    </div>
                    @endif
                  </div>
              </div>
              <!--end page-title-box-->
          </div>
          <!--end col-->
      </div>
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
                                <th>خصوصیت محصول</th>
                                <th>{{ __('app-shop-1-cart.cartTableItem5') }}</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <form action="{{ route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id]) }}" method="post">
                                @csrf
                                @foreach ($cart->cartProduct as $cartProduct)
                                <tr>
                                    <td><img src="{{ asset($cartProduct->product->image['80,80'] ? $cartProduct->product->image['80,80'] : '/images/no-image.png') }}" alt="" height="52">
                                        <p class="d-inline-block align-middle mb-0"><a href="{{ route('product', ['shop'=>$cartProduct->product->shop->english_name, 'slug'=>$cartProduct->product->slug, 'id' => $cartProduct->product->id]) }}" target="_blank"
                                              class="d-inline-block align-middle mb-0 product-name">{{ $cartProduct->product->title }}</a>
                                            <br><span class="text-muted font-13">{{ !$cartProduct->color ? '' : $cartProduct->color->name}}</span></p>
                                    </td>
                                    <td>{{ number_format($cartProduct->product->price) }} {{ __('app-shop-1-cart.tooman') }} </td>
                                    <td>
                                        @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($cartProduct->product->off_price != null and $cartProduct->product->off_price_started_at < now() and $cartProduct->product->off_price_expired_at > now())
                                          {{ number_format($cartProduct->product->price-$cartProduct->product->off_price)}}
                                        @else
                                          0
                                            @endif
                                    </td>
                                    <td>
                                        <select class="form-control p-1" style="width: 65px;" autocomplete="off" tabindex="-1" name="{{ $cartProduct->product->id }}-{{ $cartProduct->id }}">
                                    @for ($i=1; $i < $cartProduct->product->amount; $i++)

                                            <option @if($cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity == $i) selected @endif value="{{ $i }}">
                                                {{ $i }}
                                              </option>

                                              @endfor

                                        </select>

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
                                        <a href="" class="text-danger" id="removeProduct" data-color="{{  !$cartProduct->color ? null : $cartProduct->color->id }}"  data-cart="{{ \Auth::user()->cart()->get()->first()->id }}" data-id="{{ $cartProduct->product->id }}" data-cartp="{{ $cartProduct->id }}"><i class="mdi mdi-close-circle-outline font-18"></i></a>
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
