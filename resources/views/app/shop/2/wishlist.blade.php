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
                            <div class="tt-img"><img src="{{ $wishlistProduct->image['80,80'] }}" alt=""></div>
                            <div class="tt-description">
                                <h2 class="tt-title"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$wishlistProduct->id]) }}">{{ $wishlistProduct->title }}</a></h2>
                            </div>
                        </div>

                        <div class="tt-col-btn d-flex">

                          <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post" id="addToCartForm{{ $wishlistProduct->id }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$wishlistProduct->id}}">
                          <a href="javascript:{}" onclick="document.getElementById('addToCartForm{{ $wishlistProduct->id }}').submit();" class="tt-btn-addtocart"><i class="icon-f-39"></i>اضافه به سبد خرید</a>
                        </form>

                            <a class="btn-link mt-3" href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$wishlistProduct->id]) }}" data-target="#ModalquickView"><i class="icon-f-73"></i>مشاهده محصول</a>
                            <a href="#" class="btn-link mt-3" id="removeProduct" data-shop="{{ $shop->english_name }}" data-wishlist="{{ \Auth::user()->wishlist->id }}" data-id="{{ $wishlistProduct->id }}"><i class="icon-h-02"></i>{{ __('app-shop-account-wishlist.hazf') }}</a>

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
@endsection
