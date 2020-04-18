@extends('app.shop.3.layouts.master')
@section('content')


<!-- Page item Area -->
<div id="page_item_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h3>جزئیات محصول</h3>
				<h4 class="mt-4 text-light">{{ $product->title }}</h4>
			</div>
		</div>
	</div>
</div>

<!-- Product Details Area  -->
<div class="prdct_dtls_page_area">
	<div class="container">
		<div class="row">
			<!-- Product Details Image -->
			<div class="col-md-6 col-xs-12">
				<div class="pd_img fix">
					<a class="venobox" href="{{ asset($product->image['400,400'] ? $product->image['400,400'] : '/images/no-image.png') }}"><img src="{{ asset($product->image['400,400'] ? $product->image['400,400'] : '/images/no-image.png') }}" alt=""/></a>
				</div>
			</div>
			<!-- Product Details Content -->
			<div class="col-md-6 col-xs-12">
				<div class="prdct_dtls_content">
					<a class="pd_title" href="#">{{ $product->title }}</a>
					<div class="pd_price_dtls fix">
						<!-- Product Price -->

						@if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now())
						<div class="pd_price">
							<h2 class="old byekan">{{ number_format($product->off_price) }} تومان </h2>
							@else
							<h3 class="new byekan">{{ number_format($product->price) }}تومان </h3>
							@endif
						</div>
						<!-- Product Ratting -->
						<div class="pd_ratng">
							<div class="rtngs">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
							</div>
						</div>
					</div>
					<div class="pd_img_size fix">
						<h4>size:</h4>
						<a href="#">s</a>
						<a href="#">m</a>
						<a href="#">l</a>
						<a href="#">xl</a>
						<a href="#">xxl</a>
					</div>
					<div class="pd_clr_qntty_dtls fix">

					  @if($product->colors->count() != 0)
						<div class="pd_clr">
							<h4>انتخاب رنگ:</h4>
							@php
							$i = 0;
							 @endphp
							 @foreach($product->colors as $color)
								 <li class="color-sel color-select {{ $i == 0 ? 'active' : '' }}">
									<a class="options-color tt-border tt-color-bg-08" style="background-color:#{{ $color->code }}" data-color="{{ $color->id }}"></a>
							 </li>
							 @php
							 $i ++;
								@endphp
							 @endforeach
						</div>
						    @endif
						<div class="pd_qntty_area">
							<h4>quantity:</h4>
							<div class="pd_qty fix">
								<input value="1" name="qttybutton" class="cart-plus-minus-box" type="number">
							</div>
						</div>
					</div>
					<!-- Product Action -->
					<div class="pd_btn fix">

						@if(\Auth::user())

						<a class="btn btn-default acc_btn" href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}"><i
							class="fa fa-shopping-cart"></i>
						افزودن به سبد خرید</a>

						@endif

						<form action="{{ route('wishlist.store', ['shop'=>$shop->english_name]) }}"
							method="post" id="wishlistForm{{ $product->id }}"
							style="display:inline;">
							@csrf
							<input type="hidden" name="productID" value="{{ $product->id }}">

							<a class="btn btn-default acc_btn btn_icn" href="javascript:{}" title="افزودن به علاقه مندی ها"
							onclick="document.getElementById('wishlistForm{{ $product->id }}').submit();"
							data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}"
							data-tposition="left"><i class="fa fa-heart"></i></a>
						</form>

						<form action="{{ route('compare.store', ['shop'=>$shop->english_name]) }}"
							method="post" id="compareForm{{ $product->id }}"
							style="display:inline;">
							@csrf
							<input type="hidden" name="productID" value="{{ $product->id }}">

							<a class="btn btn-default acc_btn btn_icn" href="javascript:{}"
							onclick="document.getElementById('compareForm{{ $product->id }}').submit();"
							data-tooltip="{{ __('app-shop-3-category.afzoodanBeMoghayese') }}"
							data-tposition="left"><i
							class="fa fa-balance-scale"></i></a>
						</form>

					</div>
					<div class="pd_share_area fix">
						<h4>به اشتراک گذاری در:</h4>
						<div class="pd_social_icon">
							<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
							<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
							<a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a>
							<a class="google_plus" href="#"><i class="fa fa-google-plus"></i></a>
							<a class="tumblr" href="#"><i class="fa fa-tumblr"></i></a>
							<a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="pd_tab_area fix">
					<ul class="pd_tab_btn nav nav-tabs" role="tablist">

						<li>
							<a href="#reviews" role="tab" data-toggle="tab">نظرات</a>
						</li>

						<li>
							<a class="active" href="#description" role="tab" data-toggle="tab">توضیحات محصول</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade show active" id="description">
							<p> {!! $product->description  !!}</p>
						</div>

						<div role="tabpanel" class="tab-pane fade" id="reviews">
							<div class="pda_rtng_area fix">
								<h4>4.5 <span>(Overall)</span></h4>
								<span>Based on 9 Comments</span>
							</div>
							<div class="rtng_cmnt_area fix">
								<div class="single_rtng_cmnt">
									<div class="rtngs">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<span>(4)</span>
									</div>
									<div class="rtng_author">
										<h3>John Doe</h3>
										<span>11:20</span>
										<span>6 January 2017</span>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
								</div>

							</div>
							<div class="col-md-6 rcf_pdnglft">
								<div class="rtng_cmnt_form_area fix">
									<h3>Add your Comments</h3>
									<div class="rtng_form">
										<form action="#">
											<div class="input-area"><input type="text" placeholder="Type your name" /></div>
											<div class="input-area"><input type="text" placeholder="Type your email address" /></div>
											<div class="input-area"><textarea name="message" placeholder="Write a review"></textarea></div>
											<input class="btn border-btn" type="submit" value="Add Review" />
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Related Product Area -->
<div class="related_prdct_area text-center">
	<div class="container">
		<!-- Section Title -->
		<div class="rp_title text-center"><h3 style="color: #33d286; font-size:25px; margin-bottom:30px;">محصولات مشابه</h3></div>

		<div class="row">

			@forelse ($offeredProducts as $offeredProduct)
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="single_product">
					<div class="product_image">
						<a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$offeredProduct->slug, 'id' => $offeredProduct->id]) }}"><img
							src="{{ asset($offeredProduct->image['250,250'] ? $offeredProduct->image['250,250'] : '/images/no-image.png') }}"
							alt=""/></a>
							<div class="box-content">
								<a href="#"><i class="fa fa-heart-o"></i></a>
								<a href="#"><i class="fa fa-cart-plus"></i></a>
								<a href="#"><i class="fa fa-balance-scale"></i></a>
							</div>
						</div>

						<div class="product_btm_text">
							<h4>
								<a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$offeredProduct->slug, 'id' => $offeredProduct->id]) }}">{{ $offeredProduct->title }}</a>
							</h4>
							<span class="price">{{ number_format($offeredProduct->price) }}		تومان</span>
						</div>
					</div>
				</div>
				@empty
				<div class="align-items-center justify-content-center row w-100 text-danger my-5">
					<h4>
						هیچ محصولی در این فروشگاه وجود ندارد
					</h4>
				</div>
				@endforelse



			</div>
		</div>
	</div>

	@endsection
