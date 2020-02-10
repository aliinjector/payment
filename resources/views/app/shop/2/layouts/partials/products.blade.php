@extends('app.shop.2.layouts.master')
@section('content')
	<link rel="stylesheet" href="{{ asset('/app/shop/2/css/category.css') }}" />
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<div class="row">
				@include('app.shop.2.layouts.partials.filtering')

				<div class="col-md-12 col-lg-9 col-xl-9">
					<div class="content-indent container-fluid-custom-mobile-padding-02">

						@include('app.shop.2.layouts.partials.ordering')

						<div class="tt-product-listing row tt-col-three" id="tt-product-listing">
							@foreach($productsPaginate as $product)
							<div class="col-5 col-md-2 tt-col-item p-2">
								<div class="tt-product thumbprod-center">
									<div class="tt-image-box" style="height: 30vh!important;">
										<form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="myForm{{ $product->id }}">
											@csrf
											<a href="javascript:{}" onclick="document.getElementById('myForm{{ $product->id }}').submit();" class="tt-btn-wishlist submit" data-tooltip="{{ __('app-shop-2-category.afzoodanBeAlaghemandiHa') }}" data-tposition="left"></a>
										</form>

										<form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="compareForm{{ $product->id }}">
											@csrf

											<a href="javascript:{}" onclick="document.getElementById('compareForm{{ $product->id }}').submit();" class="tt-btn-compare" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"></a>
										</form>
										<a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}"><span class="tt-img"><img class="col-12" src="{{ $product->image['250,250'] }}" data-src="{{ $product->image['250,250'] }}"
												  alt=""></span><span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-25-01.jpg" alt=""></span></a>
									</div>

									<div class="tt-description">
										<div class="tt-row">
											<ul class="tt-options-swatch options-middle flex-row mb-2">
												@php
												$i = 0;
												 @endphp
												 @foreach($product->colors as $color)
													 <li class="color-select {{ $i == 0 ? 'active' : '' }}">
														<a class="options-color tt-border tt-color-bg-08" href="#" data-color="{{ $color->id }}" style="background-color:#{{ $color->code }}">
														</a>
												 </li>
												 @php
												 $i ++;
													@endphp
												 @endforeach

											</ul>
											<ul class="tt-add-info">
												<li><a href="#">{{ $product->productCategory->name }}</a></li>
											</ul>
											<div class="tt-rating">
												@for ($i = 1; $i <= (int)$product->avgRating; $i++)
													<i class="icon-star"></i>
													@endfor
											</div>
										</div>
										<h2 class="tt-title"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}">{{ $product->title }}</a></h2>
										<div class="tt-price byekan">{{ number_format($product->price) }} <span class="iranyekan">تومان</span> </div>
										<div class="tt-product-inside-hover">
											@auth

											<form @if(\Auth::user()->cart != null) action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id , 'id' => \Auth::user()->cart->id]) }}" @else action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" @endif method="post">
												@csrf

												<input type="hidden" name="product_id" value="{{$product->id}}">
												<button type="submit" @if($product->colors->count() != 0) data-col="true" @endif class="tt-btn-addtocart thumbprod-button-bg"><i class="mdi mdi-cart mr-1"></i>
													@if($product->type == 'file'){{ __('app-shop-2-category.daryafteFile') }}
														@else {{ __('app-shop-2-category.addToCart') }}
														@endif</button>
											</form>
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
@endsection
