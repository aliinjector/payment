@extends('app.shop.2.layouts.master')
@section('content')

<style media="screen">
	.ui-slider-range {
		background-color: #2979fe !important;
	}

	.btn-outline-secondary.active,
	.btn-outline-secondary:active,
	.btn-outline-secondary:hover,
	.btn-outline-secondary:not(:disabled):not(.disabled).active,
	.btn-outline-secondary:not(:disabled):not(.disabled):active,
	.btn-secondary.active,
	.btn-secondary.disabled,
	.btn-secondary.focus,
	.btn-secondary:active,
	.btn-secondary:disabled,
	.btn-secondary:focus,
	.btn-secondary:hover,
	.btn-secondary:not(:disabled):not(.disabled).active,
	.btn-secondary:not(:disabled):not(.disabled):active,
	.open>.dropdown-toggle.btn-secondary,
	.show>.btn-outline-secondary.dropdown-toggle,
	.show>.btn-secondary.dropdown-toggle,
	a.bg-secondary:focus,
	a.bg-secondary:hover,
	button.bg-secondary:focus,
	button.bg-secondary:hover {
		background-color: #2879fe !important;
		color: #f3f6f7 !important;
	}

	.btn-outline-secondary {
		color: #2879fe !important;
	}

	.ui-state-default,
	.ui-widget-content .ui-state-default,
	.ui-widget-header .ui-state-default {
		background-color: grey !important;
	}

	.bg-transparent {
		background-color: transparent !important;
	}

	.sort-btn {
		padding: 5px 55px 4px !important;
		margin: 3px;
	}
</style>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside" id="js-leftColumn-aside">
					<div class="tt-btn-col-close"><a href="#">بستن</a></div>
					<div class="tt-collapse open tt-filter-detach-option">
						<div class="tt-collapse-content">
							<div class="filters-mobile">
								<div class="filters-row-select"></div>
							</div>
						</div>
					</div>
					<div class="tt-collapse">
						<h3 class="tt-collapse-title">زیر دسته بندی ها</h3>
						<div class="tt-collapse-content">
							<ul class="tt-list-row">
								<li class="active"><a href="#">{{ $category->name }}</a></li>
								@foreach($subCategories as $subCategory)
								<li><a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}">{{ $subCategory->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="tt-collapse">
						<h3 class="tt-collapse-title">فیلتر براساس قیمت</h3>
						<div class="tt-collapse-content">
							<form action="{{ route('category', ['shop' => $shop->english_name,'categroyId' => $category]) }}" id="submit" method="get">

								<ul class="tt-list-row">
									<input type="text" id="available-price-1" class="w-100 p-2 iranyekan font-14" style="border:0; color:#2979FE !important; font-weight:bold;">
									<input type="hidden" id="available-price-min" name="minprice" value="@if(request()->minprice == null) 1000 @else {{ request()->minprice }} @endif">
									<input type="hidden" id="available-price-max" name="maxprice" value="@if(request()->maxprice == null) 100000000 @else {{ request()->maxprice }} @endif">
									<div id="mySlider"></div>
								</ul>
						</div>
					</div>
					<div class="tt-collapse">
						<h3 class="tt-collapse-title">فیلتر بر اساس نوع کالا</h3>
						<div class="tt-collapse-content">
							<div class="btn-group btn-group-toggle mb-4 flex-wrap" data-toggle="buttons">
								<label id="available-filter-1" for="available-filter-1" class="sort-btn col-3 rounded btn btn-outline-secondary @if(request()->type == '') active @endif border-left-0 iranyekan crouser bg-transparent"
								  style="cursor:pointer; border: 1px solid!important;">
									<input class="d-none" type="radio" name="type" value="all" id="available-filter-1" @if(request()->type == '' or request()->type == 'all') checked="" @endif> همه
								</label>
								<label id="available-filter-2" for="available-filter-2"
								  class="sort-btn col-3  rounded btn btn-outline-secondary border-right-0  @if(request()->type == 'product') active @endif border-left-0 iranyekan bg-transparent"
								  style="cursor:pointer;border: 1px solid!important">
									<input class="d-none" type="radio" name="type" value="product" id="available-filter-2" @if(request()->type == 'product') checked="" @endif> فیزیکی
								</label>
								<label id="available-filter-3" for="available-filter-3"
								  class="sort-btn col-3 rounded btn btn-outline-secondary border-right-0  @if(request()->type == 'file') active @endif border-left-0 iranyekan bg-transparent"
								  style="cursor:pointer;border: 1px solid!important">
									<input class="d-none" type="radio" name="type" value="file" id="available-filter-3" @if(request()->type == 'file') checked="" @endif> فایل
								</label>
								<label id="available-filter-4" for="available-filter-4"
								  class="sort-btn col-3 rounded btn btn-outline-secondary  border-right-0  @if(request()->type == 'service') active @endif iranyekan bg-transparent"
								  style="cursor:pointer; border: 1px solid!important">
									<input class="d-none" type="radio" name="type" value="service" id="available-filter-4" @if(request()->type == 'service') checked="" @endif> خدماتی
								</label>
							</div>
						</div>
					</div>
					<div class="tt-collapse">
						<h3 class="tt-collapse-title">براساس رنگ</h3>
						<div class="tt-collapse-content">
							<ul class="tt-options-swatch options-middle">
								@foreach ($colors as $color)
								<li>
									<a class="options-color" data-color="{{ $color->code }}" style="background-color:#{{ $color->code }}">
									</a>
								</li>
								@endforeach
								<input id="color-input" type="hidden" name="color" value="">

							</ul>
						</div>
					</div>
					<div class="tt-collapse">
						<h3 class="tt-collapse-title">برند</h3>
						<div class="tt-collapse-content">
							<ul class="tt-list-row">
								@foreach($brands as $brand)
								<li class="ty-compact-list"><a href="#">{{ $brand->name }}</a></li>
								@endforeach
							</ul>
							<div class="show-more">
								<span class="toggle-show">+ بیشتر</span>
							</div>
						</div>
					</div>

					<div class="tt-collapse">
						<h3 class="tt-collapse-title">تگ ها</h3>
						<div class="tt-collapse-content">
							<ul class="tt-list-inline">
								@foreach($shopTags as $shopTag)
								<li><a href="{{ route('tag', ['shop'=>$shop->english_name, 'name'=>$shopTag->name]) }}">{{ $shopTag->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="tt-content-aside">
						<a href="listing-left-column.html" class="tt-promo-03"><img src="images/custom/listing_promo_img_07.jpg" alt=""></a>
					</div>
				</div>
				<div class="col-md-12 col-lg-9 col-xl-9">
					<div class="content-indent container-fluid-custom-mobile-padding-02">
						<div class="tt-filters-options" id="js-tt-filters-options">
							<h1 class="tt-title">{{ $category->name }} <span class="tt-title-total byekan">({{ $products->count() }})</span></h1>
							<div class="tt-btn-toggle"><a href="#">فیلتر</a></div>
							<div class="tt-sort d-flex">
								<select class="available-filter-1" name="sortBy[field]">
									<option value="created_at|desc" @if(request()->sortBy['field'] == 'created_at|desc') selected @endif>جدیدترین ها</option>
									<option value="buyCount|desc" @if(request()->sortBy['field'] == 'buyCount|desc') selected @endif>پرفروش ترین ها</option>
									<option value="price|asc" @if(request()->sortBy['field'] == 'price|asc') selected @endif>ارزان ترین ها</option>
									<option value="price|desc" @if(request()->sortBy['field'] == 'price|desc') selected @endif>گران ترین ها
									</option>
								</select>
								</form>
								<select>
									<option value="Show">تعداد</option>
									<option value="9">9</option>
									<option value="16">16</option>
									<option value="32">32</option>
								</select>
							</div>
							<div class="tt-quantity">
								<a href="#" class="tt-col-one" data-value="tt-col-one"></a>
								<a href="#" class="tt-col-two" data-value="tt-col-two"></a>
								<a href="#" class="tt-col-three" data-value="tt-col-three"></a>
								<a href="#" class="tt-col-four" data-value="tt-col-four"></a>
								<a href="#" class="tt-col-six" data-value="tt-col-six"></a>
							</div>
						</div>
						<div class="tt-product-listing row tt-col-three" id="tt-product-listing">
							@foreach($products as $product)
							<div class="col-5 col-md-2 tt-col-item p-2">
								<div class="tt-product thumbprod-center">
									<div class="tt-image-box" style="height: 30vh!important;">
										<form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="myForm{{ $product->id }}">
											@csrf
											<a href="javascript:{}" onclick="document.getElementById('myForm{{ $product->id }}').submit();" class="tt-btn-wishlist submit" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a>
										</form>

										<form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="compareForm{{ $product->id }}">
											@csrf

											<a href="javascript:{}" onclick="document.getElementById('compareForm{{ $product->id }}').submit();" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a>
										</form>
										<a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}"><span class="tt-img"><img class="col-12" src="images/loader.svg" data-src="{{ $product->image['250,250'] }}"
												  alt=""></span><span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-25-01.jpg" alt=""></span></a>
									</div>
									<div class="tt-description">
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
										<h2 class="tt-title"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}">{{ $product->title }}</a></h2>
										<div class="tt-price byekan">{{ number_format($product->price) }} <span class="iranyekan">تومان</span> </div>
										<div class="tt-product-inside-hover">
											@auth
											<form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
												@csrf
												<input type="hidden" name="product_id" value="{{$product->id}}">
												<button type="submit" class="tt-btn-addtocart thumbprod-button-bg"><i class="mdi mdi-cart mr-1"></i>
													@if($product->type == 'file') دریافت فایل
														@else اضافه به سبد خرید
														@endif</button>
											</form>
											@endauth
											<div class="tt-row-btn">
												<a href="#" class="tt-btn-wishlist"></a>
												<a href="#" class="tt-btn-compare"></a>
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

@endsection

@section('footerScripts')
<script>
	$(document).ready(function() {
		$('#available-filter-1').click(function() {
			setInterval("$('#submit').submit()", 700);
		});
		$('#available-filter-2').click(function() {
			setInterval("$('#submit').submit()", 700);
		});
		$('#available-filter-3').click(function() {
			setInterval("$('#submit').submit()", 700);
		});
		$('#available-filter-4').click(function() {
			setInterval("$('#submit').submit()", 700);
		});
	});
</script>
<script>
	$(document).ready(function() {
		$("#mySlider").slider({
			range: true,
			min: 1000,
			max: 100000000,
			values: [1000, 100000000],
			slide: function(event, ui) {
				if (isNaN(ui.values[0]) == true || isNaN(ui.values[1]) == true) {
					$("#available-price-1").val(" از " + 1000 + " تومان " + " - " + " تا " + 100000000 + " تومان ");
					$("#available-price-min").val(1000);
					$("#available-price-max").val(100000000);
				} else {
					$("#available-price-1").val(" از " + ui.values[0] + " تومان " + " - " + " تا " + ui.values[1] + " تومان ");
					$("#available-price-min").val(ui.values[0]);
					$("#available-price-max").val(ui.values[1]);
				}
			}
		});
		if (isNaN($("#mySlider").slider("values", 0)) == true || isNaN($("#mySlider").slider("values", 1)) == true) {
			$("#available-price-1").val(" از " + 1000 + " تومان " + " - " + " تا " + 100000000 + " تومان ");
		} else {
			$("#available-price-1").val(" از " + $("#mySlider").slider("values", 0) + " تومان " +
				" - " + " تا " + $("#mySlider").slider("values", 1) + " تومان ");
		}

	});
</script>
<script type="text/javascript">
	$('select').on('change', function() {
		setInterval("$('#submit').submit()", 800);
	});
	$('#available-price-min').click(function() {
		$('.available-price-min').attr('checked', true);
		setInterval("$('#submit').submit()", 800);
	});
	$('#mySlider').click(function() {
		$('.available-price-max').attr('checked', true);
		setInterval("$('#submit').submit()", 800);
	});
</script>
<script>
	if ($('.ty-compact-list').length > 5) {
		$('.ty-compact-list:gt(2)').hide();
		$('.show-more').show();
	}

	$('.show-more').on('click', function() {
		//toggle elements with class .ty-compact-list that their index is bigger than 2
		$('.ty-compact-list:gt(2)').toggle();
		//change text of show more element just for demonstration purposes to this demo
		$(this).text() !== 'بستن' ? $(this).text('بستن') : $(this).text(' بیشتر');
	});
</script>

<script>
	$(document).ready(function() {
		$(".options-color").click(function(e) {
			e.preventDefault();

			var color = $(this).data('color');
			$("#color-input").val(color);
			$('#submit').trigger('submit');
		});
	});
</script>

@endsection
