<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="/app/shop/assets/css/style.css" rel="stylesheet" type="text/css">
	<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

</head>

<body style="direction: rtl;text-align: right;">
	<div class="container">
		<div class="d-flex justify-content-end">

		<button class="btn byekan">
بازگشت
<i class="fa fa-arrow-left" aria-hidden="true"></i></button>
</div>

		@foreach ($wishlistProducts as $wishlistProduct)
		<div class="col-12">
			<!-- First product box start here-->
			<div class="prod-info-main prod-wrap clearfix">
				<div class="row">
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="product-image">
							<img src="{{ $wishlistProduct->image['410,270'] }}" alt="194x228" class="img-responsive mt-2" style="width:100%;">
							<span class="tag2 sale" style="font-size: 11px;font-family: byekan;font-weight: bolder;">
								{{ $wishlistProduct->amount <= 0 ? 'ناموجود' : 'موجود' }}
							</span>
						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="product-deatil">
							<h5 class="name">
								<a href="#">
									{{ $wishlistProduct->title }} <span>{{ $wishlistProduct->productCategory->name }}</span>
								</a>
							</h5>
							<p class="price-container">
								<span>{{ number_format($wishlistProduct->price) }}</span>
							</p>
							<span class="tag1"></span>
						</div>
						<div class="description">
							<p>{!! $wishlistProduct->description !!}</p>
						</div>
						<div class="product-info smart-form">
							<div class="row">
								<div class="col-md-12 d-flex">
									<form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post" id="addToCartForm{{ $wishlistProduct->id }}">
										@csrf
										<input type="hidden" name="product_id" value="{{$wishlistProduct->id}}">
										<a href="javascript:{}" onclick="document.getElementById('addToCartForm{{ $wishlistProduct->id }}').submit();" class="btn btn-success byekan"><i class="icon-f-39"></i>اضافه به سبد خرید</a>
									</form>
									<a class="btn btn-info byekan" target="_blank" href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$wishlistProduct->id]) }}" data-target="#ModalquickView"><i class="icon-f-73"></i>مشاهده محصول</a>
									<a href="#" class="btn btn-danger byekan" id="removeProduct" data-shop="{{ $shop->english_name }}" data-wishlist="{{ \Auth::user()->wishlist->id }}" data-id="{{ $wishlistProduct->id }}"><i class="icon-h-02"></i>{{ __('app-shop-account-wishlist.hazf') }}</a>

								</div>
								@if($wishlistProduct->avgRating != null)
								<div class="col-md-12">
									<div class="rating">امتیاز محصول:
										@for ($i = 1; $i <= (int)$wishlistProduct->avgRating; $i++)
										<label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
									@endfor

									</div>
								</div>
							@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end product -->



		</div>
		@endforeach

	</div>
</body>
<script src="/app/shop/1/assets/js/jquery.min.js"></script>
<script src="/app/shop/1/assets/js/sweetalert.min.js"></script>
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
</html>
