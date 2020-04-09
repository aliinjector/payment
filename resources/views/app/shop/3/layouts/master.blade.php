<!DOCTYPE HTML>
<html lang="en-US">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!! SEO::generate() !!}

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
	<link rel="stylesheet" href="/app/shop/3/css/animate.css" />
	<link rel="stylesheet" href="/app/shop/3/css/owl.theme.default.min.css" />
	<link rel="stylesheet" href="/app/shop/3/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="/app/shop/3/css/meanmenu.min.css" />
	<link rel="stylesheet" href="/app/shop/3/css/venobox.css" />
	<link rel="stylesheet" href="/app/shop/3/css/font-awesome.css" />
	<link rel="stylesheet" href="/app/shop/3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/app/shop/3/style.css" />
	<link rel="stylesheet" href="/app/shop/3/css/responsive.css" />
</head>
	<body class="omid-rtl">

	<!--  Preloader  -->

	<div class="preloader">
		<div class="status-mes">
			<div class="bigSqr">
				<div class="square first"></div>
				<div class="square second"></div>
				<div class="square third"></div>
				<div class="square fourth"></div>
			</div>
			<div class="text_loading text-center">درحال بارگذاری ... </div>
		</div>
	</div>


		<!--  Start Header  -->
		<header id="header_area">
			<div class="header_top_area">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="hdr_tp_left">
								<div class="call_area">
									<span class="single_con_add"><i class="fa fa-phone"></i> +0123456789</span>
									<span class="single_con_add"><i class="fa fa-envelope"></i> example@gmail.com</span>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6">
							<ul class="hdr_tp_right text-right">

								<li class="lan_area"><a href="#"><i class="fa fa-lock"></i></i> ورود</a>

								</li>
								<li class="currency_area"><a href="#"><i class="fa fa-gg ml-1"></i>عضویت</a>

								</li>
							</ul>
						</div>
					</div>
				</div>
			</div> <!--  HEADER START  -->

			<div class="header_btm_area">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-3">
							<a class="logo" href="{{ route('shop', $shop->english_name) }}"> <img alt="" src="{{ $shop->logo['200,100'] }}"></a>
							<a href="{{ route('shop', $shop->english_name) }}"><span class="mr-3">{{ $shop->name }}</span></a>
						</div><!--  End Col -->

						<div class="col-xs-12 col-sm-12 col-md-9 text-right">
							<div class="menu_wrap">
								<div class="main-menu">
									<nav>
										<ul>
											<li><a href="index-2.html">صفحه اصلی</a>
											</li>

											<li><a href="shop.html">خرید<i class="fa fa-angle-down"></i></a>
												<!-- Sub Menu -->
												<ul class="sub-menu omid-right">
													<li><a href="product-details.html">مشخصات محصول</a></li>
													<li><a href="cart.html">سبد خرید</a></li>
													<li><a href="checkout.html">تسویه حساب</a></li>
													<li><a href="wishlist.html">لیست علاقه مندی ها</a></li>
												</ul>
											</li>
											<li><a href="shop.html">مردانه <i class="fa fa-angle-down"></i></a>
												<!-- Mega Menu -->
												<div class="mega-menu mm-4-column mm-left">
													<div class="mm-column mm-column-link float-left">
														<h3>Men</h3>
														<a href="#">Blazers</a>
														<a href="#">Jackets</a>
														<a href="#">Collections</a>
														<a href="#">T-Shirts</a>
														<a href="#">jens pant’s</a>
														<a href="#">sports shoes</a>
													</div>

													<div class="mm-column mm-column-link float-left">
														<h3>Women</h3>
														<a href="#">Blazers</a>
														<a href="#">Jackets</a>
														<a href="#">Collections</a>
														<a href="#">T-Shirts</a>
														<a href="#">jens pant’s</a>
														<a href="#">sports shoes</a>
													</div>

													<div class="mm-column mm-column-link float-left">
														<h3>Jackets</h3>
														<a href="#">Blazers</a>
														<a href="#">Jackets</a>
														<a href="#">Collections</a>
														<a href="#">T-Shirts</a>
														<a href="#">jens pant’s</a>
														<a href="#">sports shoes</a>
													</div>

													<div class="mm-column mm-column-link float-left">
														<h3>jens pant’s</h3>
														<a href="#">Blazers</a>
														<a href="#">Jackets</a>
														<a href="#">Collections</a>
														<a href="#">T-Shirts</a>
														<a href="#">jens pant’s</a>
														<a href="#">sports shoes</a>
													</div>

												</div>
											</li>
											<li><a href="#">زنانه<i class="fa fa-angle-down"></i></a>
												<!-- Mega Menu -->
												<div class="mega-menu mm-3-column mm-left">
													<div class="mm-column mm-column-link float-left">
														<h3>Woment</h3>
														<a href="#">Blazers</a>
														<a href="#">Jackets</a>
														<a href="#">Collections</a>
														<a href="#">T-Shirts</a>
														<a href="#">jens pant’s</a>
														<a href="#">sports shoes</a>
													</div>

													<div class="mm-column mm-column-link float-left">
														<h3>T-Shirts</h3>
														<a href="#">Blazers</a>
														<a href="#">Jackets</a>
														<a href="#">Collections</a>
														<a href="#">T-Shirts</a>
														<a href="#">jens pant’s</a>
														<a href="#">sports shoes</a>
													</div>

													<div class="mm-column mm-column-link float-left">
														<h3>Jackets</h3>
														<a href="#">Blazers</a>
														<a href="#">Jackets</a>
														<a href="#">Collections</a>
														<a href="#">T-Shirts</a>
														<a href="#">jens pant’s</a>
														<a href="#">sports shoes</a>
													</div>

												</div>
											</li>

											<li><a href="#">بچه گانه <i class="fa fa-angle-down"></i></a>
												<!-- Sub Menu -->
												<ul class="sub-menu omid-right">
													<li><a href="left-sidebar-blog.html">Left Sidebar Blog</a></li>
													<li><a href="right-sidebar-blog.html">Right Sidebar Blog</a></li>
													<li><a href="full-width-blog.html">Full Width Blog</a></li>
													<li><a href="blog-details.html">Blog Details</a></li>
													<li><a href="about-us.html">About Us</a></li>
													<li><a href="contact.html">Contact Us</a></li>
													<li><a href="404.html">404 Page</a></li>
												</ul>
											</li>
											<li><a href="contact.html" class="mr-4">سایر دسته بندی ها</a></li>
										</ul>
									</nav>
								</div> <!--  End Main Menu -->

								<div class="mobile-menu text-right ">
									<nav>
										<ul>
											<li><a href="index-2.html">home</a></li>
											<li><a href="#">Shop</a>
												<!-- Sub Menu -->
												<ul>
													<li><a href="product-details.html">Product Details</a></li>
													<li><a href="cart.html">Cart</a></li>
													<li><a href="checkout.html">Checkout</a></li>
													<li><a href="wishlist.html">Wishlist</a></li>
												</ul>
											</li>
											<li><a href="#">Men</a>
												<ul>
													<li><a href="#">Blazers</a></li>
													<li><a href="#">Jackets</a></li>
													<li><a href="#">Collections</a></li>
													<li><a href="#">T-Shirts</a></li>
													<li><a href="#">jens pant’s</a></li>
													<li><a href="#">sports shoes</a></li>
												</ul>
											</li>

											<li><a href="#">Women</a>
												<ul>
													<li><a href="#">gagets</a></li>
													<li><a href="#">laptop</a></li>
													<li><a href="#">mobile</a></li>
													<li><a href="#">lifestyle</a></li>
													<li><a href="#">jens pant’s</a></li>
													<li><a href="#">sports items</a></li>
												</ul>
											</li>

											<li><a href="#">pages</a>
												<ul>
													<li><a href="blog.html">Blog</a></li>
													<li><a href="blog-details.html">Blog Details</a></li>
													<li><a href="about-us.html">About Us</a></li>
													<li><a href="contact.html">Contact Us</a></li>
													<li><a href="404.html">404 Page</a></li>
												</ul>
											</li>
											<li><a href="#">contact</a></li>
										</ul>
									</nav>
								</div> <!--  End mobile-menu -->

								<div class="right_menu">
									<ul class="nav justify-content-end">
										<li>
											<div class="search_icon">
												<i class="fa fa-search search_btn" aria-hidden="true"></i>
												<div class="search-box">
													<form action="#" method="get">
														<div class="input-group">
															<input type="text" class="form-control"  placeholder="enter keyword"/>
															<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
														</div>
													</form>
												</div>
											</div>
										</li>

										<li>
											<div class="cart_menu_area">
												<div class="cart_icon">
													<a href="#"><i class="fa fa-shopping-bag " aria-hidden="true"></i></a>
													<span class="cart_number">2</span>
												</div>


												<!-- Mini Cart Wrapper -->
												<div class="mini-cart-wrapper">
													<!-- Product List -->
													<div class="mc-pro-list fix">
														<div class="mc-sin-pro fix">
															<a href="#" class="mc-pro-image float-left"><img src="/app/shop/3/img/mini-cart/1.jpg" alt="" /></a>
															<div class="mc-pro-details fix">
																<a href="#">This is Product Name</a>
																<span>1x$25.00</span>
																<a class="pro-del" href="#"><i class="fa fa-times-circle"></i></a>
															</div>
														</div>
														<div class="mc-sin-pro fix">
															<a href="#" class="mc-pro-image float-left"><img src="/app/shop/3/img/mini-cart/2.jpg" alt="" /></a>
															<div class="mc-pro-details fix">
																<a href="#">This is Product Name</a>
																<span>1x$25.00</span>
																<a class="pro-del" href="#"><i class="fa fa-times-circle"></i></a>
															</div>
														</div>
													</div>
													<!-- Sub Total -->
													<div class="mc-subtotal fix">
														<h4>Subtotal <span>$50.00</span></h4>
													</div>
													<!-- Cart Button -->
													<div class="mc-button">
														<a href="#" class="checkout_btn">checkout</a>
													</div>
												</div>
											</div>

										</li>
									</ul>
								</div>
							</div>
						</div><!--  End Col -->
					</div>
				</div>
			</div>
		</header>
		<!--  End Header  -->


@yield('content')



		<!--  FOOTER START  -->
		<footer class="footer_area">
			<div class="ftr_btm_area">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="ftr_social_icon">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-google"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4">

						</div>

						<div class="col-sm-4">
							<div class="payment_mthd_icon text-right">
								<a target="_blank" href="http://omidshop.net"><p class="copyright_text text-center">&copy; قدرت گرفته از فروشگاه ساز امید</p></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--  FOOTER END  -->

		<script src="/app/shop/3/js/vendor/jquery-1.12.4.min.js"></script>
		<script src="/app/shop/3/js/bootstrap.min.js"></script>
		<script src="/app/shop/3/js/jquery.meanmenu.min.js"></script>
		<script src="/app/shop/3/js/jquery.mixitup.js"></script>
		<script src="/app/shop/3/js/jquery.counterup.min.js"></script>
		<script src="/app/shop/3/js/waypoints.min.js"></script>
		<script src="/app/shop/3/js/wow.min.js"></script>
		<script src="/app/shop/3/js/venobox.min.js"></script>
		<script src="/app/shop/3/js/owl.carousel.min.js"></script>
		<script src="/app/shop/3/js/main.js"></script>
	</body>


</html>
