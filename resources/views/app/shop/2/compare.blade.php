@extends('app.shop.2.layouts.master')

@section('headerScripts')

@endsection

@section('content')

    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                <h1 class="tt-title-subpages noborder">مقایسه محصولات</h1>
                <div class="tt-compare-table" id="tt-compare-table">
                  @foreach($compareProducts as $compareProduct)
                    <div class="tt-item border">
                        <div class="tt-image-box">
                            <div class="tt-row-custom">
                                <div class="tt-col">
                                    <div class="tt-label-location">
                                    </div>
                                </div>
                                <div class="tt-col">
                                    <a href="#" id="removeProductCompare" data-shop="{{ $shop->english_name }}" data-compare="{{ \Auth::user()->compare->id }}" data-id="{{ $compareProduct->id }}" class="tt-remove-item"></a>
                                </div>
                            </div>
                            <div class="tt-img">
                                <a href="product.html"><img src="images/product/product-01.jpg" alt=""></a>
                            </div>
                            <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$compareProduct->id]) }}"><img src="{{$compareProduct->image['250,250']}}" alt="product image">
                              </a>
                            <h2 class="tt-title"><a href="product.html">{{ $compareProduct->title }}</a></h2>
                            <div class="tt-price">{{ number_format($compareProduct->price) }}</div>
                        </div>
                        @foreach($compareProduct->features as $compareProductFeature)
                        <div class="tt-col tt-table-title">{{ $compareProductFeature->name }}</div>
                        <div class="tt-col js-description">{{ $compareProductFeature->pivot->value == null ? 'تعیین نشده' : $compareProductFeature->pivot->value }}</div>
                      @endforeach

                        <div class="tt-col"><a href="#" class="tt-btn-addtocart" data-toggle="modal" data-target="#modalAddToCartProduct"><i class="icon-f-39"></i>افزودن به سبد خرید</a></div>
                    </div>
                  @endforeach



                </div>
            </div>
        </div>
    </div>

		@endsection

		@section('footerScripts')
      <script src="/app/shop/1/assets/js//modernizr.js"></script>
      <script src="/app/shop/1/assets/js//compare.js"></script>
      <script>
          $(document).on('click', '#removeProductCompare', function(e) {
              e.preventDefault();
              var id = $(this).data('id');
              var compare = $(this).data('compare');
              var shop = $(this).data('shop');
              swal("آیا اطمینان دارید؟", {
                      dangerMode: true,
                      buttons: ["انصراف", "حذف"],

                  })
                  .then(function(isConfirm) {
                      if (isConfirm) {
                          $.ajax({
                              type: "post",
                              url: "{{url($shop->english_name.'/compare/remove')}}",
                              data: {
                                  id: id,
                                  compare: compare,
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
      <script type="text/javascript">
      $(window).on("load", function() {
          $('.slick-list').addClass("d-flex");
          $('.slick-list').addClass("justify-content-end");
      });
      </script>
		@endsection
