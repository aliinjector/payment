@extends('app.shop.2.layouts.master')

@section('headerScripts')

@endsection

@section('content')
<div id="tt-pageContent">
    <div class="container-indent">
        <div class="container">
            <h1 class="tt-title-subpages noborder">{{ __('app-shop-account-wishlist.title') }}</h1>
            <div class="tt-wishlist-box" id="js-wishlist-removeitem">
                <div class="tt-wishlist-list">

                    @foreach ($wishlistProducts as $wishlistProduct)

                    <div class="tt-item">
                        <div class="tt-col-description">
                            <div class="tt-img"><img src="{{ asset($wishlistProduct->image['80,80'] ? $wishlistProduct->image['80,80'] : '/images/no-image.png') }}" alt=""></div>
                            <div class="tt-description">
                                <h2 class="tt-title"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$wishlistProduct->slug, 'id' => $wishlistProduct->id]) }}">{{ $wishlistProduct->title }}</a></h2>
                            </div>
                        </div>

                        <div class="tt-col-btn d-flex">
                            <a class="btn-link mt-3" href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$wishlistProduct->slug, 'id' => $wishlistProduct->id]) }}" data-target="#ModalquickView"><i class="icon-f-73"></i>مشاهده محصول</a>
                            <a href="#" class="btn-link mt-3" id="removeProductWishlist" data-shop="{{ $shop->english_name }}" data-wishlist="{{ \Auth::user()->wishlist()->get()->where('shop_id', $shop->id)->first()->id }}" data-id="{{ $wishlistProduct->id }}"><i class="icon-h-02"></i>{{ __('app-shop-account-wishlist.hazf') }}</a>

                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footerScripts')
  <script>
      $(document).on('click', '#removeProductWishlist', function(e) {
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
@endsection
