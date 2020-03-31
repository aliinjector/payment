@extends('app.shop.2.layouts.master')
@section('content')
	<link rel="stylesheet" href="{{ asset('/app/shop/2/css/category.css') }}" />
	<style media="screen">
	@media only screen and (max-width: 1025px) {
		.btn-off-price{
			    margin-top: 58px!important;
		}
		.btn-rate-ig{
			margin-top: 35px!important;
		}
		}
	</style>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
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
			<div class="row">
				@if(\Request::route()->getName() != 'search')

				@include('app.shop.2.layouts.partials.filtering')

				<div class="col-md-12 col-lg-9 col-xl-9">
					<div class="content-indent container-fluid-custom-mobile-padding-02">

						@include('app.shop.2.layouts.partials.ordering')
@endif
						<div class="tt-product-listing row tt-col-three" id="tt-product-listing">
							@foreach($productsPaginate->where('status', 'enable') as $product)
							<div class="col-5 col-md-2 tt-col-item p-2">
								<div class="tt-product thumbprod-center">
									<div class="tt-image-box" style="height: 30vh!important;">
										<form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="myForm{{ $product->id }}">
											@csrf
											<input type="hidden" name="productID" value="{{ $product->id }}">

											<a href="javascript:{}" onclick="document.getElementById('myForm{{ $product->id }}').submit();" class="tt-btn-wishlist submit" data-tooltip="{{ __('app-shop-2-category.afzoodanBeAlaghemandiHa') }}" data-tposition="left"></a>
										</form>

										<form action="{{ route('compare.store', ['shop'=>$shop->english_name]) }}" method="post" id="compareForm{{ $product->id }}">
											@csrf
											<input type="hidden" name="productID" value="{{ $product->id }}">

											<a href="javascript:{}" onclick="document.getElementById('compareForm{{ $product->id }}').submit();" class="tt-btn-compare" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"></a>
										</form>
										<a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}"><span class="tt-img"><img class="col-12" src="{{ asset($product->image['250,250'] ? $product->image['250,250'] : '/images/no-image.png') }}" data-src="{{ asset($product->image['250,250'] ? $product->image['250,250'] : '/images/no-image.png') }}"
												  alt=""></span><span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-25-01.jpg" alt=""></span></a>
									</div>

									<div @if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now()) class="tt-description {{ (int)$product->avgRating != 0 ? 'btn-rate-ig' : '' }}" @else class="tt-description btn-off-price {{ (int)$product->avgRating != 0 ? 'btn-rate-ig' : '' }}" @endif>
										<div class="tt-row">

											<ul class="tt-add-info">
												<li><a href="#">{{ $product->productCategory->name }}</a></li>
											</ul>
											<div class="tt-rating">
												@for ($i = 1; $i <= (int)$product->avgRating; $i++)
													<i class="icon-star"></i>
													@endfor
											</div>
										</div>
										@php
										$stringCut = substr($product->title, 0, 25);
    								$endPoint = strrpos($stringCut, ' ');
    								//if the string doesn't contain any space then it will cut without word basis.
    								$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
										$string .= '...';

										@endphp
										<h2 class="tt-title"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}">{{ strlen($product->title) >= 25 != 0 ?
     $string :  $product->title }}</a></h2>
										@if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now())
												<div class="tt-price byekan" style="color: #999;"><del class="byekan font-16">{{ number_format($product->price) }} <span class="text-dark" style="color: #999!important">{{ __('app-shop-1-category.tooman') }}</span></del></div>
												<div class="tt-price byekan" style="">{{ number_format($product->off_price) }} <span class="iranyekan" style="">تومان</span> </div>
														<br />
												@else
													<div class="tt-price byekan">{{ number_format($product->price) }} <span class="iranyekan">تومان</span> </div>
														@endif
										<div class="tt-product-inside-hover">
											@auth
											<button @if($product->colors->count() != 0) data-col="true" @endif class="tt-btn-addtocart thumbprod-button-bg"><i class="mdi mdi-cart mr-1"></i>
										<a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}" class="text-white">
											مشاهده محصول
											</a>
														</button>
											@endauth
											<div class="tt-row-btn">
												<a href="#" class="tt-btn-wishlist"></a>
												<a href="#" class="tt-btn-compare"></a>
											</div>
											<div class="col-lg-12 d-flex justify-content-center">
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-12 d-flex justify-content-center mr-3 pr-5 py-5">
		{!! $productsPaginate->render() !!}
</div>

@endsection

@section('footerScripts')
	<script src="{{ asset('/app/shop/2/js/category.js') }}"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="/app/shop/2/js/jquery-ui.js"></script>
	<script src="/app/shop/2/js/jquery.ui.slider-rtl.js"></script>
	@if(\Request::route()->getName() != 'search')

	<script>
	$(document).ready(function() {
		$("#mySlider").slider({isRTL: true, range: true,
	    min: {{ $minPriceProduct }},
	    max: {{ $maxPriceProduct }},
          values: [@if(request()->minprice != null){{request()->minprice}} @else {{ $minPriceProduct }} @endif, @if(request()->maxprice != null){{request()->maxprice}} @else {{ $maxPriceProduct }} @endif],
	    slide: function(event, ui) {
	      if (isNaN(ui.values[0]) == true || isNaN(ui.values[1]) == true) {
	        $("#available-price-1").val(" از " +{{ $minPriceProduct }}  + " تومان " + " - " + " تا " +{{ $maxPriceProduct }}  + " تومان ");
	        $("#available-price-min").val({{ $minPriceProduct }});
	        $("#available-price-max").val({{ $maxPriceProduct }});
	      } else {
	        $("#available-price-1").val(" از " + ui.values[0] + " تومان " + " - " + " تا " + ui.values[1] + " تومان ");
	        $("#available-price-min").val(ui.values[0]);
	        $("#available-price-max").val(ui.values[1]);
	      }
	    }
	  });
	  if (isNaN($("#mySlider").slider("values", 0)) == true || isNaN($("#mySlider").slider("values", 1)) == true) {
	    $("#available-price-1").val(" از " +{{ $minPriceProduct }}  + " تومان " + " - " + " تا " +{{ $maxPriceProduct }}  + " تومان ");
	  } else {
	    $("#available-price-1").val(" از " + $("#mySlider").slider("values", 0).toLocaleString('en') + " تومان " +
	      " - " + " تا " + $("#mySlider").slider("values", 1).toLocaleString('en') + " تومان ");
	  }

	});
	</script>
@endif
@endsection
