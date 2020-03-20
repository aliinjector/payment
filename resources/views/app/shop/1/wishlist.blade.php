@extends('app.shop.1.layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 p-5">
        <div class="card p-4">
            @if(isset($wishlistProducts))

            <div class="card-body font-18">
                <h4 class="header-title mt-0">علاقه مندی ها</h4>
                <p class="mb-4 text-muted">لیست محصولات مورد علاقه شما</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">{{ __('app-shop-1-cart.cartTableItem1') }}</th>
                                <th class="border-bottom-0">{{ __('app-shop-1-cart.cartTableItem2') }}</th>
                                <th class="border-bottom-0">{{ __('app-shop-1-cart.cartTableItem3') }}</th>
                                <th class="d-flex justify-content-around border-bottom-0">{{ __('app-shop-1-cart.cartTableItem5') }}</th>
                            </tr>
                        </thead>
                        <tbody class="">
                                @foreach ($wishlistProducts as $product)
                                <tr>
                                    <td><img src="{{ $product->image['80,80'] }}" alt="" height="52">
                                        <p class="d-inline-block align-middle mb-0"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}" target="_blank"
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
                </div>
                <div class="d-flex input-group-append justify-content-end">

                </div>

                <!--end row-->
            </div>
            @else

            <h4 class="d-flex justify-content-center p-4">محصولی در لیست شما وجود ندارد</h4>

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
  <script>
        $(document).on('click', '#removeProduct', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var wishlist = $(this).data('wishlist');
            var shop = $(this).data('shop');
            swal("آیا اطمینان دارید؟", {
                    dangerMode: true,
                    buttons: ["انصراف", "حذف"],
                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "post",
                            url: "{{url($shop->english_name.'/wishlist/remove')}}",
                            data: {
                                id: id,
                                wishlist: wishlist,
                                shop: shop,
                                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    } else {
                        swal("متوقف شد", "عملیات شما متوقف شد :)", "error");
                    }
                });
        });
    </script>

@include('sweet::alert')
@stop
