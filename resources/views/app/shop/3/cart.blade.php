@extends('app.shop.3.layouts.master')
@section('content')


		<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h3>سبد خرید</h3>
					</div>
				</div>
			</div>
		</div>

		<!-- Cart Page -->
		    @if(isset($products))
		<div class="cart_page_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="cart_table_area table-responsive">
							<table class="table cart_prdct_table text-center">
								<thead>
									<tr>

										<th class="cpt_img">تصویر محصول</th>
										<th>محصول</th>
										<th class="cpt_pn">قیمت واحد کالا</th>
										<th class="cpt_t">میزان تخفیف</th>
										<th class="cpt_q">تعداد</th>
										<th class="cpt_p">خصوصیات</th>
										<th class="cpt_r">عملیات</th>
									</tr>
								</thead>
								<tbody>
									<form action="{{ route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id]) }}" method="post">
											@csrf
											@foreach ($cart->cartProduct as $cartProduct)
									<tr>

										<td><a href="#" class="cp_img"><img src="{{ asset($cartProduct->product->image['80,80'] ? $cartProduct->product->image['80,80'] : '/images/no-image.png') }}" alt="" height="52"></a></td>

										<td><a href="{{ route('product', ['shop'=>$cartProduct->product->shop->english_name, 'slug'=>$cartProduct->product->slug, 'id' => $cartProduct->product->id]) }}" target="_blank" class="cp_title">{{ $cartProduct->product->title }}</a></td>

										<td>
										<div class="pd_price">
									  <td>{{ number_format($cartProduct->product->price) }} تومان </td>
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
											<a class="btn btn-default cp_remove" href="" class="text-danger" id="removeProduct" data-color="{{  !$cartProduct->color ? null : $cartProduct->color->id }}"  data-cart="{{ \Auth::user()->cart()->get()->first()->id }}" data-id="{{ $cartProduct->product->id }}" data-cartp="{{ $cartProduct->id }}"><i class="fa fa-trash"></i><i class="mdi mdi-close-circle-outline font-18"></i></a>
									</td>

									</tr>
									  @endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8 col-xs-12 cart-actions cart-button-cuppon">
						<div class="row">
							<div class="col-sm-7">
								<div class="cart-action">
									<a href="#" class="btn border-btn">continiue shopping</a>
									<a href="#" class="btn border-btn">update shopping bag</a>
								</div>
							</div>

							<div class="col-sm-5">
								<div class="cuppon-wrap">
									<h4>Discount Code</h4>
									<p>Enter your coupon code if you have</p>
									<form action="#" class="cuppon-form">
										<input type="text" />
										<button class="btn border-btn">apply coupon</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-12 cart-checkout-process text-right">
						<div class="wrap">
							<p><span>Subtotal</span><span>$200.00</span></p>
							<h4><span>Grand total</span><span>$190.00</span></h4>
							<a href="checkout.html" class="btn border-btn">process to checkout</a>
						</div>
					</div>

				</div>
			</div>
		</div>


@endsection
