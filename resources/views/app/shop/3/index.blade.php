@extends('app.shop.3.layouts.master')

@section('content')



 				@foreach($slideshows as $slideshow)
				<div class="single_slide" style="background-image: url({{ $slideshow->image['original'] }}); background-size: cover; background-position: center ;">
					<div class="container">
						<div class="single-slide-item-table">
							<div class="single-slide-item-tablecell">
								<div class="slider_content text-right slider-animated-3">
									<h1 class="animated"><a href="{{ $slideshow->url }}" >{!! $slideshow->title !!}</a></h1>
									<h4 class="animated">{!! $slideshow->description !!}</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
					@endforeach
			</div>
		</section>
		<!-- End Slider Area -->

		<!--  Promo ITEM STRAT  -->
		<section id="promo_area" class="section_padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12">
						<a href="#">
							<div class="single_promo">
								<img src="img/promo/1.jpg" alt="">
								<div class="box-content">
									<h3 class="title">Men</h3>
									<span class="post">2018 Collection</span>
								</div>
							</div>
						</a>
					</div><!--  End Col -->

					<div class="col-lg-4 col-md-6 col-sm-12">
						<a href="#">
							<div class="single_promo">
								<img src="img/promo/2.jpg" alt="">
								<div class="box-content">
									<h3 class="title">Shoe</h3>
									<span class="post">2018 Collection</span>
								</div>
							</div>
						</a>

						<a href="#">
							<div class="single_promo">
								<img src="img/promo/4.jpg" alt="">
								<div class="box-content">
									<h3 class="title">Watch</h3>
									<span class="post">2018 Collection</span>
								</div>
							</div>
						</a>

					</div><!--  End Col -->

					<div class="col-lg-4 col-md-6 col-sm-12">
						<a href="#">
							<div class="single_promo">
								<img src="img/promo/3.jpg" alt="">
								<div class="box-content">
									<h3 class="title">Women</h3>
									<span class="post">2018 Collection</span>
								</div>
							</div>
						</a>
					</div><!--  End Col -->

				</div>
			</div>
		</section>
		<!--  Promo ITEM END -->


		<!-- Start product Area -->
		<section id="product_area" class="section_padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="section_title">
							<h2>دسته بندی <span>محصولات</span></h2>
							<div class="divider"></div>
						</div>
					</div>
				</div>

				<div class="text-center">
					<div class="product_filter">
						<ul>
							<li class=" active filter" data-filter="all">آخرین محصولات</li>
							<li class="filter" data-filter=".sale">پرفروش ترین ها</li>
							<li class="filter" data-filter=".bslr">پربازدید ترین ها</li>
							<li class="filter" data-filter=".ftrd">محصولات دارای تخفیف</li>
						</ul>
					</div>

					<div class="product_item">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6 mix sale">
								<div class="single_product">
									<div class="product_image">
										<img src="img/product/1.jpg" alt=""/>
										<div class="new_badge">New</div>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>
									</div>

									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<span class="price">$123.00</span>

									</div>
								</div>

							</div> <!-- End Col -->

							<div class="col-lg-3 col-md-4 col-sm-6  mix ftrd">
								<div class="single_product">
									<div class="product_image">
										<img src="img/product/2.jpg" alt=""/>
										<div class="new_badge">New</div>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>
									</div>

									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<span class="price">$123.00</span>
									</div>
								</div>
							</div> <!-- End Col -->

							<div class="col-lg-3 col-md-4 col-sm-6  mix">
								<div class="single_product">
									<div class="product_image">
										<img src="img/product/3.jpg" alt=""/>
										<div class="new_badge">New</div>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>
									</div>

									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<span class="price">$123.00</span>
									</div>
								</div>
							</div> <!-- End Col -->

							<div class="col-lg-3 col-md-4 col-sm-6  mix sale bslr">
								<div class="single_product">
									<div class="product_image">
										<img src="img/product/4.jpg" alt=""/>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>
									</div>

									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<span class="price">$123.00</span>
									</div>
								</div>
							</div> <!-- End Col -->

							<div class="col-lg-3 col-md-4 col-sm-6  mix ftrd">
								<div class="single_product">
									<div class="product_image">
										<img src="img/product/5.jpg" alt=""/>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>
									</div>

									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<span class="price">$123.00</span>
									</div>
								</div>
							</div> <!-- End Col -->

							<div class="col-lg-3 col-md-4 col-sm-6 mix sale bslr">
								<div class="single_product">
									<div class="product_image">
										<img src="img/product/6.jpg" alt=""/>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>
									</div>

									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<span class="price">$123.00</span>
									</div>
								</div>
							</div> <!-- End Col -->

							<div class="col-lg-3 col-md-4 col-sm-6 mix sale bslr">
								<div class="single_product">
									<div class="product_image">
										<img src="img/product/7.jpg" alt=""/>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>
									</div>

									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<span class="price">$123.00</span>
									</div>
								</div>
							</div> <!-- End Col -->

							<div class="col-lg-3 col-md-4 col-sm-6 mix sale bslr">
								<div class="single_product">
									<div class="product_image">
										<img src="img/product/8.jpg" alt=""/>
										<div class="box-content">
											<a href="#"><i class="fa fa-heart-o"></i></a>
											<a href="#"><i class="fa fa-cart-plus"></i></a>
											<a href="#"><i class="fa fa-search"></i></a>
										</div>
									</div>

									<div class="product_btm_text">
										<h4><a href="#">Product Title</a></h4>
										<div class="p_rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<span class="price">$123.00</span>
									</div>
								</div>
							</div> <!-- End Col -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End product Area -->

		<!-- Special Offer Area -->
		<div class="special_offer_area gray_section">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="special_img text-left">
							<img src="img/special.png" width="370" alt="" class="img-responsive">
							<span class="off_baudge text-center">30% <br /> Off</span>
						</div>
					</div>

					<div class="col-md-7 text-left">
						<div class="special_info">
							<h3>Men Collection 2018</h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum</p>
							<a href="#" class="btn main_btn">Shop Now</a>
						</div>
					</div>
				</div>

			</div>
		</div> <!-- End Special Offer Area -->

		<!-- Start Featured product Area -->
		<section id="featured_product" class="featured_product_area section_padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="section_title">
							<h2>محصولات <span> ویژه</span></h2>
							<div class="divider"></div>
						</div>
					</div>
				</div>

				<div class="row text-center">
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/product/1.jpg" alt=""/>
								<div class="box-content">
									<a href="#"><i class="fa fa-heart-o"></i></a>
									<a href="#"><i class="fa fa-cart-plus"></i></a>
									<a href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>

							<div class="product_btm_text">
								<h4><a href="#">Product Title</a></h4>
								<span class="price">$123.00</span>
							</div>
						</div>
					</div> <!-- End Col -->

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/product/2.jpg" alt=""/>
								<div class="box-content">
									<a href="#"><i class="fa fa-heart-o"></i></a>
									<a href="#"><i class="fa fa-cart-plus"></i></a>
									<a href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>

							<div class="product_btm_text">
								<h4><a href="#">Product Title</a></h4>
								<div class="p_rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<span class="price">$123.00</span>
							</div>
						</div>
					</div> <!-- End Col -->

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/product/3.jpg" alt=""/>
								<div class="box-content">
									<a href="#"><i class="fa fa-heart-o"></i></a>
									<a href="#"><i class="fa fa-cart-plus"></i></a>
									<a href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>

							<div class="product_btm_text">
								<h4><a href="#">Product Title</a></h4>
								<div class="p_rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<span class="price">$123.00</span>
							</div>
						</div>
					</div> <!-- End Col -->

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/product/4.jpg" alt=""/>
								<div class="box-content">
									<a href="#"><i class="fa fa-heart-o"></i></a>
									<a href="#"><i class="fa fa-cart-plus"></i></a>
									<a href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>

							<div class="product_btm_text">
								<h4><a href="#">Product Title</a></h4>
								<div class="p_rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<span class="price">$123.00</span>
							</div>
						</div>
					</div> <!-- End Col -->

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/product/5.jpg" alt=""/>
								<div class="box-content">
									<a href="#"><i class="fa fa-heart-o"></i></a>
									<a href="#"><i class="fa fa-cart-plus"></i></a>
									<a href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>

							<div class="product_btm_text">
								<h4><a href="#">Product Title</a></h4>
								<div class="p_rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<span class="price">$123.00</span>
							</div>
						</div>
					</div> <!-- End Col -->

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/product/6.jpg" alt=""/>
								<div class="box-content">
									<a href="#"><i class="fa fa-heart-o"></i></a>
									<a href="#"><i class="fa fa-cart-plus"></i></a>
									<a href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>

							<div class="product_btm_text">
								<h4><a href="#">Product Title</a></h4>
								<div class="p_rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<span class="price">$123.00</span>
							</div>
						</div>
					</div> <!-- End Col -->

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/product/7.jpg" alt=""/>
								<div class="box-content">
									<a href="#"><i class="fa fa-heart-o"></i></a>
									<a href="#"><i class="fa fa-cart-plus"></i></a>
									<a href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>

							<div class="product_btm_text">
								<h4><a href="#">Product Title</a></h4>
								<div class="p_rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<span class="price">$123.00</span>
							</div>
						</div>
					</div> <!-- End Col -->

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="img/product/8.jpg" alt=""/>
								<div class="box-content">
									<a href="#"><i class="fa fa-heart-o"></i></a>
									<a href="#"><i class="fa fa-cart-plus"></i></a>
									<a href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>

							<div class="product_btm_text">
								<h4><a href="#">Product Title</a></h4>
								<div class="p_rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<span class="price">$123.00</span>
							</div>
						</div>
					</div> <!-- End Col -->
				</div>
			</div>
		</section>
		<!-- End Featured Products Area -->

		<!-- Testimonials Area -->
		<section id="testimonials" class="testimonials_area section_padding" style="background: url(img/testimonial-bg.jpg); background-size: cover; background-attachment: fixed;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div id="testimonial-slider" class="owl-carousel">
							<div class="testimonial">
								<div class="pic">
									<img src="img/testimonial/1.jpg" alt="">
								</div>
								<div class="testimonial-content">
									<p class="description">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										Vivamus sed accumsan diam. Suspendisse molestie nibh at
										tempor mollis. Integer aliquet facilisis
									</p>
									<h3 class="testimonial-title">williamson</h3>
									<small class="post"> - Themesvila</small>
								</div>
							</div>

							<div class="testimonial">
								<div class="pic">
									<img src="img/testimonial/2.jpg" alt="">
								</div>
								<div class="testimonial-content">
									<p class="description">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										Vivamus sed accumsan diam. Suspendisse molestie nibh at
										tempor mollis. Integer aliquet facilisis
									</p>
									<h3 class="testimonial-title">kristiana</h3>
									<small class="post"> - Themesvila</small>
								</div>
							</div>


							<div class="testimonial">
								<div class="pic">
									<img src="img/testimonial/3.jpg" alt="">
								</div>
								<div class="testimonial-content">
									<p class="description">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										Vivamus sed accumsan diam. Suspendisse molestie nibh at
										tempor mollis. Integer aliquet facilisis
									</p>
									<h3 class="testimonial-title">williamson</h3>
									<small class="post"> - Themesvila</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> <!-- End STestimonials Area -->

        <!--  Blog -->
        <section id="blog_area" class="section_padding">
            <div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="section_title">
							<h2>بازخورد <span>مشتریان</span></h2>
							<div class="divider"></div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single_blog">
							<div class="single_blog_img">
								<img src="img/blog/1.jpg" alt="">
								<div class="blog_date text-center">
									<div class="bd_day"> 25</div>
									<div class="bd_month">Aug</div>
								</div>
							</div>

							<div class="blog_content">
								<h4 class="post_title"><a href="#">Integer euismod dui non auctor</a> </h4>
								<ul class="post-bar">
									<li><i class="fa fa-user"></i> Admin</li>
									<li><i class="fa fa-comments-o"></i> <a href="#">2 comments</a></li>
									<li><i class="fa fa-heart-o"></i> <a href="#">4 like</a></li>
								</ul>
								<p>Proin in blandit lacus. Nam pellentesque tortor eget dui feugiat venenatis ....</p>
							</div>
						</div>
					</div> <!--  End Col -->

					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single_blog">
							<div class="single_blog_img">
								<img src="img/blog/2.jpg" alt="">
								<div class="blog_date text-center">
									<div class="bd_day"> 25</div>
									<div class="bd_month">Aug</div>
								</div>
							</div>

							<div class="blog_content">
								<h4 class="post_title"><a href="#">Integer tempor urna a condimentum</a> </h4>
								<ul class="post-bar">
									<li><i class="fa fa-user"></i> Admin</li>
									<li><i class="fa fa-comments-o"></i> <a href="#">2 comments</a></li>
									<li><i class="fa fa-heart-o"></i> <a href="#">4 like</a></li>
								</ul>

								<p>Proin in blandit lacus. Nam pellentesque tortor eget dui feugiat venenatis ....</p>
							</div>
						</div>
					</div> <!--  End Col -->

					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single_blog">
							<div class="single_blog_img">
								<img src="img/blog/3.jpg" alt="">
								<div class="blog_date text-center">
									<div class="bd_day"> 25</div>
									<div class="bd_month">Aug</div>
								</div>
							</div>

							<div class="blog_content">

								<h4 class="post_title"><a href="#">Vivamus velit est iaculis id tempus</a> </h4>
								<ul class="post-bar">
									<li><i class="fa fa-user"></i> Admin</li>
									<li><i class="fa fa-comments-o"></i> <a href="#">2 comments</a></li>
									<li><i class="fa fa-heart-o"></i> <a href="#">4 like</a></li>
								</ul>
								<p>Proin in blandit lacus. Nam pellentesque tortor eget dui feugiat venenatis ....</p>
							</div>
						</div>
					</div> <!--  End Col -->

				</div>
            </div>
        </section>
        <!--  Blog end -->


        <!--  Process -->
		<section class="process_area section_padding gradient_section">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-process">
							<!-- process Icon -->
							<div class="picon"><i class="fa fa-truck"></i></div>
							<!-- process Content -->
							<div class="process_content">
								<h3>free shipping</h3>
								<p>Lorem ipsum dummy</p>
							</div>
						</div>
					</div>	<!-- End Col -->

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-process">
							<!-- process Icon -->
							<div class="picon"><i class="fa fa-money"></i></div>
							<!-- process Content -->
							<div class="process_content">
								<h3>Cash On Delivery</h3>
								<p>Lorem ipsum dummy</p>
							</div>
						</div>
					</div>	<!-- End Col -->

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-process">
							<!-- process Icon -->
							<div class="picon"><i class="fa fa-headphones "></i></div>
							<!-- process Content -->
							<div class="process_content">
								<h3>Support 24/7</h3>
								<p>Lorem ipsum dummy</p>
							</div>
						</div>
					</div>	<!-- End Col -->

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-process">
							<!-- process Icon -->
							<div class="picon"><i class="fa fa-clock-o"></i></div>
							<!-- process Content -->
							<div class="process_content">
								<h3>Opening All Week</h3>
								<p>Lorem ipsum dummy</p>
							</div>
						</div>
					</div>	<!-- End Col -->

				</div>
			</div>
		</section>
        <!--  End Process -->

        <!--  Brand -->
		<section id="brand_area" class="text-center">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="brand_slide owl-carousel">
							<div class="item text-center"> <a href="#"><img src="img/brand/1.png" alt="" class="img-responsive" /></a> </div>
							<div class="item text-center"> <a href="#"><img src="img/brand/2.png" alt="" class="img-responsive" /></a> </div>
							<div class="item text-center"> <a href="#"><img src="img/brand/3.png" alt="" class="img-responsive" /></a> </div>
							<div class="item text-center"> <a href="#"><img src="img/brand/4.png" alt="" class="img-responsive" /></a> </div>
							<div class="item text-center"> <a href="#"><img src="img/brand/5.png" alt="" class="img-responsive" /></a> </div>
							<div class="item text-center"> <a href="#"><img src="img/brand/6.png" alt="" class="img-responsive" /></a> </div>
							<div class="item text-center"> <a href="#"><img src="img/brand/7.png" alt="" class="img-responsive" /></a> </div>
							<div class="item text-center"> <a href="#"><img src="img/brand/8.png" alt="" class="img-responsive" /></a> </div>
							<div class="item text-center"> <a href="#"><img src="img/brand/9.png" alt="" class="img-responsive" /></a> </div>
						</div>
					</div>
				</div>
			</div>
		</section>
        <!--   Brand end  -->



@endsection
