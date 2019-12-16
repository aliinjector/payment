

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>فروشگاه امید الکترونیک</title>
      <link rel="shortcut icon" href="favicon.ico">
      <meta name="format-detection" content="telephone=no">
      <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <link rel="stylesheet" href="/app/shop/2/css/style.css">
      <link href="/app/shop/2/font/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="/app/shop/1/assets/css/jquery-ui.css" />
      <script src="/app/shop/1/assets/js/jquery.min.js"></script>
      <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
      @yield('headerScripts')
      <style>
         .tt-desctop-menu {
         display: block !important;
         }
         .dropdown-menu {
         width: 130px !important;
         display: none !important;
         }
         .dropdown-submenu {
         position: relative;
         width: 130px !important;
         }
         .dropdown-submenu>.dropdown-menu {
         top: -33px !important;
         width: 130px !important;
         right: 72% !important;
         -webkit-border-radius: 0 6px 6px 6px;
         -moz-border-radius: 0 6px 6px;
         border-radius: 0 6px 6px 6px;
         }
         .dropdown-submenu:hover>.dropdown-menu {
         display: block !important;
         }
         .dropdown:hover>.dropdown-menu {
         display: block !important;
         }
         .dropdown-submenu.pull-left {
         float: none;
         }
         .toast-message {
         font-size: 20px;
         }
         .btn {
         font-family: iranyekan !important;
         border: none !important;
         color: #fff !important;
         font-size: 14px !important;
         line-height: 1 !important;
         font-weight: 400 !important;
         letter-spacing: .03em !important;
         position: relative !important;
         outline: 0 !important;
         padding: 6px 31px 4px !important;
         display: inline-flex !important;
         justify-content: center !important;
         align-items: center !important;
         text-align: center !important;
         height: 40px !important;
         cursor: pointer !important;
         border-radius: 6px !important;
         transition: color .2s linear, background-color .2s linear !important;
         }
         .tt-btn-addtocart {
         background-color: #2879fe !important;
         color: #fff !important;
         padding: 3px 16px 9px !important;
         border-radius: 6px !important;
         transition: .2s linear !important;
         }
      </style>
      @toastr_css
   </head>
   <body>
      <div id="loader-wrapper">
         <div id="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
         </div>
      </div>
      <header id="tt-header">
         <!-- tt-top-panel -->
         @includeWhen($shop->special_offer == 'enable','app.shop.2.layouts.partials.special_offer', ['special_text' => $shop->special_offer_text])
         <!-- /tt-top-panel -->
         <!-- tt-mobile menu -->
         <nav class="panel-menu mobile-main-menu">
            <ul>
               <li>
                  <a href="/{{ $shop->english_name }}">صفحه اصلی فروشگاه</a>
                  <ul>
                     <li>
                        <a href="/{{ $shop->english_name }}">HOME STYLES</a>
                        <ul>
                           <li><a href="index.html">Home — Example 1 <span class="tt-badge tt-fatured">Popular</span></a></li>
                           <li><a href="index-02.html">Home — Example 2</a></li>
                           <li><a href="index-03.html">Home — Example 3</a></li>
                           <li><a href="index-04.html">Home — Example 4 <span class="tt-badge tt-fatured">Popular</span></a></li>
                           <li><a href="index-05.html">Home — Example 5</a></li>
                           <li><a href="index-06.html">Home — Example 6</a></li>
                           <li><a href="index-07.html">Home — Example 7</a></li>
                           <li><a href="index-08.html">Home — Example 8</a></li>
                           <li><a href="index-09.html">Home — Example 9</a></li>
                           <li><a href="index-10.html">Home — Example 10</a></li>
                           <li><a href="index-11.html">Home — Example 11</a></li>
                           <li><a href="index-12.html">Home — Example 12</a></li>
                           <li><a href="index-13.html">Home — Example 13</a></li>
                           <li><a href="index-14.html">Home — Example 14</a></li>
                           <li><a href="index-15.html">Home — Example 15</a></li>
                           <li><a href="index-16.html">Home — Example 16 <span class="tt-badge tt-fatured">Popular</span></a></li>
                           <li><a href="index-17.html">Home — Example 17</a></li>
                           <li><a href="index-18.html">Home — Example 18</a></li>
                           <li><a href="index-19.html">Home — Example 19 <span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-20.html">Home — Example 20 <span class="tt-badge tt-new">New</span></a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="index.html">HOME SKINS <span class="tt-badge tt-sale">HOT</span></a>
                        <ul>
                           <li><a href="index-skin-beer.html">Beer Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-bikes.html">Bikes Shop<span class="tt-badge tt-fatured">Popular</span></a></li>
                           <li><a href="index-skin-books.html">Books shop</a></li>
                           <li><a href="index-skin-books02.html">Books Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-care.html">Care Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-carsshop.html">Cars Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-coffee.html">Coffee Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-comic-books.html">Comic Books Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-cookware.html">Cookware Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-food.html">Food Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-furniture.html">Furniture Shop</a></li>
                           <li><a href="index-skin-furniture02.html">Furniture Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-handmade.html">Handmade Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-lingerie.html">Lingerie Shop</a></li>
                           <li><a href="index-skin-oneproducts.html">One Products Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-phones.html">Phones Shop<span class="tt-badge tt-fatured">Popular</span></a></li>
                           <li><a href="index-skin-snowboards.html">Snowboards Shop<span class="tt-badge tt-fatured">Popular</span></a></li>
                           <li><a href="index-skin-shirts.html">دسته بندی Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-tea.html">Tea Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-tools.html">Tools Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-watches.html">Watches Shop<span class="tt-badge tt-new">New</span></a></li>
                           <li><a href="index-skin-wallets.html">Wallets Shop<span class="tt-badge tt-new">New</span></a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="listing-left-column.html">SHOP</a>
                  <ul>
                     <li>
                        <a href="listing-left-column.html">LISTING STYLES</a>
                        <ul>
                           <li><a href="listing-left-column.html">Listing With Left Sidebar</a></li>
                           <li><a href="listing-right-column.html">Listing With Right Sidebar</a></li>
                           <li><a href="listing-not-sidebar.html">Listing Not Sidebar</a></li>
                           <li><a href="listing-not-sidebar-full-width.html">Listing Not Sidebar Full Width</a></li>
                           <li><a href="listing-metro.html">Listing Metro</a></li>
                           <li><a href="listing-left-column-with-block.html">Listing With Custom HTML Block</a></li>
                           <li><a href="listing-collection.html">Listing Collection</a></li>
                           <li><a href="lookbook.html">Look Book</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="product.html">PRODUCT PAGE STYLES</a>
                        <ul>
                           <li><a href="product.html">Product Example 1</a></li>
                           <li><a href="product-02.html">Product Example 2</a></li>
                           <li><a href="product-03.html">Product Example 3</a></li>
                           <li><a href="product-04.html">Product Example 4</a></li>
                           <li><a href="product-variable.html">Product Layout</a></li>
                           <li><a href="product-three-columns.html">Three Columns</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="product-variable.html">PRODUCT PAGE TYPES</a>
                        <ul>
                           <li><a href="product.html">Standard Product</a></li>
                           <li><a href="product-variable.html">Variable Product</a></li>
                           <li><a href="product-04.html">Grouped Product</a></li>
                           <li><a href="product-label-new.html">New Product</a></li>
                           <li><a href="product-label-sale.html">Sale Product</a></li>
                           <li><a href="product-label-out-of-stock.html">Out Of Stock Product</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="shopping_cart_02.html">OTHER PAGES</a>
                        <ul>
                           <li><a href="shopping_cart_02.html">Cart</a></li>
                           <li><a href="shopping_cart_01.html">Cart With Right Col</a></li>
                           <li><a href="account.html">Account</a></li>
                           <li><a href="account_address.html">Account Address</a></li>
                           <li><a href="account_address_fields.html">Account Address Fields</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="blog-listing-without-col.html">BLOG</a>
                  <ul>
                     <li>
                        <a href="blog-listing-without-col.html">BLOG STYLE</a>
                        <ul>
                           <li><a href="blog-listing-without-col.html">Standard Without Sidebar</a></li>
                           <li><a href="blog-listing-col-left.html">Standard With Left Sidebar</a></li>
                           <li><a href="blog-listing-col-right.html">Standard With Right Sidebar</a></li>
                           <li><a href="blog-masonry-col-2.html">Two Colums</a></li>
                           <li><a href="blog-masonry-col-3.html">Three Colums</a></li>
                           <li><a href="blog-masonry-col-3-filter.html">Three Colums With Filter</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="blog-single-post.html">POST TYPE</a>
                        <ul>
                           <li><a href="blog-single-post.html">Standard</a></li>
                           <li><a href="blog-single-post-gallery.html">Gallery</a></li>
                           <li><a href="blog-single-post-link.html">Link</a></li>
                           <li><a href="blog-single-post-quote.html">Quote</a></li>
                           <li><a href="blog-single-post-video.html">Video</a></li>
                           <li><a href="blog-single-post-audio.html">Audio</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="portfolio-col-grid-four.html">PORTFOLIO</a>
                  <ul>
                     <li>
                        <a href="portfolio-col-grid-four.html">BOXED GRID</a>
                        <ul>
                           <li><a href="portfolio-col-grid-two.html">Two Colums</a></li>
                           <li><a href="portfolio-col-grid-three.html">Three Colums</a></li>
                           <li><a href="portfolio-col-grid-four.html">Four Colums</a></li>
                           <li><a href="portfolio-col-grid-four-without-filter.html">Four Colums Without Filter</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="portfolio-col-wide-three.html">BOXED STYLES</a>
                        <ul>
                           <li><a href="portfolio-col-wide-two.html">Two Colums</a></li>
                           <li><a href="portfolio-col-wide-three.html">Three Colums</a></li>
                           <li><a href="portfolio-col-wide-four.html">Four Colums</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="about.html">PAGES</a>
                  <ul>
                     <li>
                        <a href="about.html">About Example 1</a>
                        <ul>
                           <li><a href="about.html">منو 1</a></li>
                           <li>
                              <a href="about.html">منو 1</a>
                              <ul>
                                 <li><a href="about.html">منو 2</a></li>
                                 <li>
                                    <a href="about.html">منو 2</a>
                                    <ul>
                                       <li><a href="about.html">منو 3</a></li>
                                       <li><a href="about.html">منو 3</a></li>
                                       <li><a href="about.html">منو 3</a></li>
                                       <li>
                                          <a href="about.html">منو 3</a>
                                          <ul>
                                             <li>
                                                <a href="about.html">منو 4</a>
                                                <ul>
                                                   <li><a href="about.html">منو 5</a></li>
                                                   <li><a href="about.html">منو 5</a></li>
                                                   <li><a href="about.html">منو 5</a></li>
                                                   <li><a href="about.html">منو 5</a></li>
                                                   <li><a href="about.html">منو 5</a></li>
                                                </ul>
                                             </li>
                                             <li><a href="about.html">منو 4</a></li>
                                          </ul>
                                       </li>
                                       <li><a href="about.html">منو 3</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="about.html">منو 2</a></li>
                                 <li><a href="about.html">منو 2</a></li>
                              </ul>
                           </li>
                           <li><a href="about.html">منو 1</a></li>
                           <li><a href="about.html">منو 1</a></li>
                           <li><a href="about.html">منو 1</a></li>
                        </ul>
                     </li>
                     <li><a href="about-02.html">About Example 2</a></li>
                     <li><a href="contact.html">Contacts Example 1</a></li>
                     <li><a href="contact-02.html">Contacts Example 2</a></li>
                     <li><a href="services.html">Services</a></li>
                     <li><a href="faq.html">FAQ</a></li>
                     <li><a href="coming-soon.html">Coming Soon</a></li>
                     <li><a href="page404.html">Page 404</a></li>
                     <li><a href="typography.html">Typography</a></li>
                     <li><a href="gift-cart.html">Gift Cart</a></li>
                     <li>
                        <a href="compare.html">Compare</a>
                        <ul>
                           <li><a href="compare.html">Compare 01</a></li>
                           <li><a href="compare-02.html">Compare 02</a></li>
                        </ul>
                     </li>
                     <li><a href="wishlist.html">Wishlist</a></li>
                     <li>
                        <a href="empty-search.html">Empty</a>
                        <ul>
                           <li><a href="empty-cart.html">Empty Cart</a></li>
                           <li><a href="empty-search.html">Empty Search</a></li>
                           <li><a href="empty-wishlist.html">Empty Wishlist</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="listing-left-column.html">WOMEN</a>
                  <ul>
                     <li>
                        <a href="listing-left-column.html">TOPS</a>
                        <ul>
                           <li><a href="listing-left-column.html">Blouses &amp; Shirts</a></li>
                           <li><a href="listing-left-column.html">Dresses <span class="tt-badge tt-new">New</span></a></li>
                           <li>
                              <a href="listing-left-column.html">Tops &amp; دسته بندی</a>
                              <ul>
                                 <li><a href="listing-left-column.html">منو 1</a></li>
                                 <li>
                                    <a href="listing-left-column.html">منو 1</a>
                                    <ul>
                                       <li><a href="listing-left-column.html">منو 2</a></li>
                                       <li>
                                          <a href="listing-left-column.html">منو 2</a>
                                          <ul>
                                             <li><a href="listing-left-column.html">منو 3</a></li>
                                             <li><a href="listing-left-column.html">منو 3</a></li>
                                             <li><a href="listing-left-column.html">منو 3</a></li>
                                             <li>
                                                <a href="listing-left-column.html">منو 3</a>
                                                <ul>
                                                   <li>
                                                      <a href="listing-left-column.html">منو 4</a>
                                                      <ul>
                                                         <li><a href="listing-left-column.html">منو 5</a></li>
                                                         <li><a href="listing-left-column.html">منو 5</a></li>
                                                         <li><a href="listing-left-column.html">منو 5</a></li>
                                                         <li><a href="listing-left-column.html">منو 5</a></li>
                                                         <li><a href="listing-left-column.html">منو 5</a></li>
                                                      </ul>
                                                   </li>
                                                   <li><a href="listing-left-column.html">منو 4</a></li>
                                                   <li><a href="listing-left-column.html">منو 4</a></li>
                                                   <li><a href="listing-left-column.html">منو 4</a></li>
                                                   <li><a href="listing-left-column.html">منو 4</a></li>
                                                </ul>
                                             </li>
                                             <li><a href="listing-left-column.html">منو 3</a></li>
                                          </ul>
                                       </li>
                                       <li><a href="listing-left-column.html">منو 2</a></li>
                                       <li><a href="listing-left-column.html">منو 2</a></li>
                                       <li><a href="listing-left-column.html">منو 2</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="listing-left-column.html">منو 1</a></li>
                                 <li><a href="listing-left-column.html">منو 1</a></li>
                                 <li><a href="listing-left-column.html">منو 1</a></li>
                              </ul>
                           </li>
                           <li><a href="listing-left-column.html">Sleeveless Tops</a></li>
                           <li><a href="listing-left-column.html">Sweaters</a></li>
                           <li><a href="listing-left-column.html">Jackets</a></li>
                           <li><a href="listing-left-column.html">Outerwear</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="listing-left-column.html">BOTTOMS</a>
                        <ul>
                           <li><a href="listing-left-column.html">Trousers <span class="tt-badge tt-fatured">Fatured</span></a></li>
                           <li><a href="listing-left-column.html">Jeans</a></li>
                           <li><a href="listing-left-column.html">Leggings</a></li>
                           <li><a href="listing-left-column.html">Jumpsuit &amp; Shorts</a></li>
                           <li><a href="listing-left-column.html">Skirts</a></li>
                           <li><a href="listing-left-column.html">Tights</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="listing-left-column.html">ACCESSORIES</a>
                        <ul>
                           <li><a href="listing-left-column.html">Jewellery</a></li>
                           <li><a href="listing-left-column.html">Hats</a></li>
                           <li><a href="listing-left-column.html">Scarves &amp; Snoods</a></li>
                           <li><a href="listing-left-column.html">Belts</a></li>
                           <li><a href="listing-left-column.html">Bags</a></li>
                           <li><a href="listing-left-column.html">Shoes</a></li>
                           <li><a href="listing-left-column.html">Sunglasses <span class="tt-badge tt-sale">Sale 15%</span></a></li>
                        </ul>
                     </li>
                     <li><a href="listing-left-column.html">SPECIALS</a></li>
                  </ul>
               </li>
               <li>
                  <a href="listing-right-column.html">MEN</a>
                  <ul>
                     <li>
                        <a href="listing-right-column.html">TOPS</a>
                        <ul>
                           <li><a href="listing-right-column.html">Blouses &amp; Shirts</a></li>
                           <li><a href="listing-right-column.html">Dresses <span class="tt-badge tt-new">New</span></a></li>
                           <li>
                              <a href="listing-right-column.html">Tops &amp; دسته بندی</a>
                              <ul>
                                 <li><a href="listing-right-column.html">منو 1</a></li>
                                 <li>
                                    <a href="listing-right-column.html">منو 1</a>
                                    <ul>
                                       <li><a href="listing-right-column.html">منو 2</a></li>
                                       <li>
                                          <a href="listing-right-column.html">منو 2</a>
                                          <ul>
                                             <li><a href="listing-right-column.html">منو 3</a></li>
                                             <li><a href="listing-right-column.html">منو 3</a></li>
                                             <li><a href="listing-right-column.html">منو 3</a></li>
                                             <li>
                                                <a href="listing-right-column.html">منو 3</a>
                                                <ul>
                                                   <li>
                                                      <a href="listing-right-column.html">منو 4</a>
                                                      <ul>
                                                         <li><a href="listing-right-column.html">منو 5</a></li>
                                                         <li><a href="listing-right-column.html">منو 5</a></li>
                                                         <li><a href="listing-right-column.html">منو 5</a></li>
                                                         <li><a href="listing-right-column.html">منو 5</a></li>
                                                         <li><a href="listing-right-column.html">منو 5</a></li>
                                                      </ul>
                                                   </li>
                                                   <li><a href="listing-right-column.html">منو 4</a></li>
                                                   <li><a href="listing-right-column.html">منو 4</a></li>
                                                   <li><a href="listing-right-column.html">منو 4</a></li>
                                                   <li><a href="listing-right-column.html">منو 4</a></li>
                                                </ul>
                                             </li>
                                             <li><a href="listing-right-column.html">منو 3</a></li>
                                          </ul>
                                       </li>
                                       <li><a href="listing-right-column.html">منو 2</a></li>
                                       <li><a href="listing-right-column.html">منو 2</a></li>
                                       <li><a href="listing-right-column.html">منو 2</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="listing-right-column.html">منو 1</a></li>
                                 <li><a href="listing-right-column.html">منو 1</a></li>
                                 <li><a href="listing-right-column.html">منو 1</a></li>
                              </ul>
                           </li>
                           <li><a href="listing-right-column.html">Sleeveless Tops</a></li>
                           <li><a href="listing-right-column.html">Sweaters</a></li>
                           <li><a href="listing-right-column.html">Jackets</a></li>
                           <li><a href="listing-right-column.html">Outerwear</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="listing-right-column.html">BOTTOMS</a>
                        <ul>
                           <li><a href="listing-right-column.html">Trousers <span class="tt-badge tt-fatured">Fatured</span></a></li>
                           <li><a href="listing-right-column.html">Jeans</a></li>
                           <li><a href="listing-right-column.html">Leggings</a></li>
                           <li><a href="listing-right-column.html">Jumpsuit &amp; shorts</a></li>
                           <li><a href="listing-right-column.html">Skirts</a></li>
                           <li><a href="listing-right-column.html">Tights</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="listing-right-column.html">ACCESSORIES</a>
                        <ul>
                           <li><a href="listing-right-column.html">Jewellery</a></li>
                           <li><a href="listing-right-column.html">Hats</a></li>
                           <li><a href="listing-right-column.html">Scarves &amp; Snoods</a></li>
                           <li><a href="listing-right-column.html">Belts</a></li>
                           <li><a href="listing-right-column.html">Bags</a></li>
                           <li><a href="listing-right-column.html">Shoes</a></li>
                           <li><a href="listing-right-column.html">Sunglasses <span class="tt-badge tt-sale">Sale 15%</span></a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li><a href="index-rtl.html">RTL</a></li>
            </ul>
            <div class="mm-navbtn-names">
               <div class="mm-closebtn">Close</div>
               <div class="mm-backbtn">Back</div>
            </div>
         </nav>
         <!-- tt-mobile-header -->
         <div class="tt-mobile-header">
            <div class="container-fluid">
               <div class="tt-header-row">
                  <div class="tt-mobile-parent-menu">
                     <div class="tt-menu-toggle" id="js-menu-toggle"><i class="icon-03"></i></div>
                  </div>
                  <!-- search -->
                  <div class="tt-mobile-parent-search tt-parent-box"></div>
                  <!-- /search -->
                  <!-- cart -->
                  <div class="tt-mobile-parent-cart tt-parent-box"></div>
                  <!-- /cart -->
                  <!-- account -->
                  <div class="tt-mobile-parent-account tt-parent-box"></div>
                  <!-- /account -->
                  <!-- currency -->
                  <div class="tt-mobile-parent-multi tt-parent-box"></div>
                  <!-- /currency -->
               </div>
            </div>
            <div class="container-fluid tt-top-line">
               <div class="row">
                  <div class="tt-logo-container">
                     <!-- mobile logo -->
                     <a class="tt-logo tt-logo-alignment" href="/{{ $shop->english_name }}"><img class="tt-retina" src="{{ $shop->logo['original'] }}" alt=""></a>
                     <!-- /mobile logo -->
                  </div>
               </div>
            </div>
         </div>
         <!-- tt-desktop-header -->
         <div class="tt-desktop-header">
            <div class="container">
               <div class="tt-header-holder">
                  <div class="tt-obj-logo obj-aligment-center">
                     <!-- logo -->
                     <a class="tt-logo tt-logo-alignment" href="/{{ $shop->english_name }}"><img class="tt-retina" src="{{ $shop->logo['original'] }}" alt=""><span style="padding: 10px">{{ $shop->name }}</span></a>
                     <!-- /logo -->
                  </div>
                  <div class="tt-obj-options obj-move-right tt-position-absolute">
                     <!-- tt-search -->
                     <div class="tt-desctop-parent-search tt-parent-box">
                        <div class="tt-search tt-dropdown-obj">
                           <button class="tt-dropdown-toggle" data-tooltip="جستجو" data-tposition="bottom"><i class="icon-f-85"></i></button>
                           <div class="tt-dropdown-menu">
                              <div class="container">
                                 <form action="{{ route('search', $shop->english_name) }}" method="post">
                                    <div class="tt-col">
                                       @csrf
                                       <input type="text" name="queryy" class="tt-search-input" placeholder="نام محصول یا سازنده ...">
                                       <button class="tt-btn-search" type="submit"></button>
                                    </div>
                                    <div class="tt-col">
                                       <button class="tt-btn-close icon-g-80"></button>
                                    </div>
                                    <div class="tt-info-text">دنبال چه میگردید</div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /tt-search -->
                     <!-- tt-cart -->
                     @auth
                     <div class="tt-desctop-parent-cart tt-parent-box">
                        <div class="tt-cart tt-dropdown-obj" data-tooltip="سبد خرید" data-tposition="bottom">
                           <button class="tt-dropdown-toggle"><i class="icon-f-39"></i> <span class="tt-badge-cart ml-1">
                           @if(\Auth::user()->cart()->get()->count() != 0) {{ \Auth::user()->cart()->get()->first()->products()->count() }}
                           @else 0
                           @endif
                           </span>
                           </button>
                           <div class="tt-dropdown-menu">
                              <div class="tt-mobile-add">
                                 <h6 class="tt-title">سبد خرید</h6>
                                 <button class="tt-close">بستن</button>
                              </div>
                              <div class="tt-dropdown-inner">
                                 <div class="tt-cart-layout">
                                    <!-- layout emty cart -->
                                    <!-- <a href="empty-cart.html" class="tt-cart-empty">
                                       <i class="icon-f-39"></i>
                                       <p>No Products in the Cart</p>
                                       </a> -->
                                    <div class="tt-cart-content">
                                       <div class="tt-cart-list">
                                          <form action="{{ route('purchase-list',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id]) }}" method="post">
                                             @csrf
                                             @foreach ($products as $product)
                                             <div class="tt-item border-bottom p-3">
                                                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}" target="_blank">
                                                   <div class="tt-item-img"><img src="{{ $product->image['80,80'] }}" data-src="{{ $product->image['80,80'] }}" alt=""></div>
                                                   <div class="tt-item-descriptions">
                                                      <h2 class="tt-title">{{ $product->title }}</h2>
                                                      <ul class="tt-add-info">
                                                         <li>زرد</li>
                                                      </ul>
                                                      <div class="tt-quantity"> <input class="border-0" name="{{ $product->id }}" type="text" value="{{ $product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $product->id)->first()->quantity }}"> عدد</div>
                                                      <br />
                                                      <div class="tt-price">{{ number_format($product->price) }} تومان</div>
                                                   </div>
                                                </a>
                                                <div class="tt-item-close">
                                                   <a href="" id="removeProduct" class="tt-btn-close" data-cart="{{ \Auth::user()->cart()->get()->first()->id }}" data-id="{{ $product->id }}"></a>
                                                </div>
                                             </div>
                                             @endforeach
                                       </div>
                                       <div class="tt-cart-btn">
                                       <div class="tt-item bg-primary"><button type="submit" class="btn">تسویه حساب</button></div>
                                       <div class="tt-item" style="background-color: currentColor;"><a
                                          href="{{ route('user-cart' , ['shop' => $shop->english_name]) }}" class="btn btn-border tt-hidden-desctope">مشاهده سبد
                                       خرید</a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     </form>
                     @endauth
                     <!-- /tt-cart -->
                     <!-- tt-account -->
                     <div class="tt-desctop-parent-account tt-parent-box">
                        <div class="tt-account tt-dropdown-obj">
                           <button class="tt-dropdown-toggle" data-tooltip="حساب کاربری" data-tposition="bottom"><i class="icon-f-94"></i></button>
                           <div class="tt-dropdown-menu">
                              <div class="tt-mobile-add">
                                 <button class="tt-close">بستن</button>
                              </div>
                              <div class="tt-dropdown-inner">
                                 <ul>
                                    @auth()
                                    <li><a href="{{ route('wishlist' , ['shop' => $shop->english_name]) }}"><i class="icon-n-072"><span class="tt-badge-cart">
                                       @if(\Auth::user()->wishlist()->get()->count() != 0) {{ \Auth::user()->wishlist()->get()->first()->products()->count() }}
                                       @else 0
                                       @endif
                                       </span></i>علاقه مندی ها</a>
                                    </li>
                                    <li><a href=""><i class="icon-f-94"></i>پنل کاربری</a></li>
                                    <li><a href="{{ route('user-address.index') }}"><i class="fa fa-address-card ml-2"></i>آدرس ها</a></li>
                                    <li><a href="{{ route('user.purchased.list') }}"><i class="icon-f-47"></i>لیست سفارشات</a></li>
                                    <li><a href="{{ route('logout') }}"><i class="icon-f-77"></i>خروج</a></li>
                                    @endauth
                                    @guest()
                                    <li><a href="{{ route('template.login.show', $shop->english_name) }}"><i class="icon-f-76"></i>ورود</a></li>
                                    <li><a href="{{ route('template.register.show', $shop->english_name) }}"><i class="icon-f-94"></i>عضویت</a></li>
                                    @endguest
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     @auth()
                     <p>{{ Auth::user()->firstName}} عزیز، خوش آمدی</p>
                     @endauth
                     <!-- /tt-account -->
                     <!-- tt-langue and tt-currency -->
                     <div style="display:none" class="tt-desctop-parent-multi tt-parent-box">
                        <div class="tt-multi-obj tt-dropdown-obj">
                           <button class="tt-dropdown-toggle" data-tooltip="Settings" data-tposition="bottom"><i class="icon-f-79"></i></button>
                           <div class="tt-dropdown-menu">
                              <div class="tt-mobile-add">
                                 <button class="tt-close">بستن</button>
                              </div>
                              <div class="tt-dropdown-inner">
                                 <ul>
                                    <li class="active"><a href="#">انگلیسی</a></li>
                                    <li><a href="#">انگلیسی</a></li>
                                    <li><a href="#">انگلیسی</a></li>
                                    <li><a href="#">انگلیسی</a></li>
                                 </ul>
                                 <ul>
                                    <li class="active"><a href="#"><i class="icon-h-59"></i>تومان</a></li>
                                    <li class="active"><a href="#"><i class="icon-h-59"></i>USD - US Dollar</a></li>
                                    <li><a href="#"><i class="icon-h-60"></i>EUR - Euro</a></li>
                                    <li><a href="#"><i class="icon-h-61"></i>GBP - British Pound Sterling</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /tt-langue and tt-currency -->
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="tt-header-holder">
                  <div class="tt-obj-menu obj-aligment-center">
                     <!-- tt-menu -->
                     <div class="collapse navbar-collapse">
                        <div class="tt-desctop-menu tt-menu-small">
                           <nav>
                              <ul class="pb-4 font-wight-bold">
                                 <li class="dropdown"><a class="iranyekan" href="/{{ $shop->english_name }}" style="font-size: 17px!important;">صفحه اصلی</a></li>
                                 @foreach ($shopCategories->where('parent_id' , null) as $shopCategory)
                                 <div class="dropdown mx-3" style="top:30px!important">
                                    <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategory->id]) }}">
                                    <button class="btn dropdown-toggle iranyekan f-em1-5 font-weight-normal" style="color:
                                       #465f73!important;background-color:transparent;font-size: 17px!important;">
                                    {{ $shopCategory->name }}
                                    </button>
                                    </a>
                                    @if($shop->menu_show == "nestead_menu")
                                    @if($shopCategory->children()->exists())
                                    <ul class="dropdown-menu multi-level font-16" role="menu" aria-labelledby="dropdownMenu" style="top:30px!important;
                                       width: 14%!important;">
                                       @foreach ($shopCategory->children()->get() as $subCategory)
                                       @if (!$subCategory->children()->exists())
                                       <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}" class="font-weight-bold iranyekan" style="color: #465f73!important; font-size:16px">
                                          <li class="dropdown-item dropdown-submenu">{{ $subCategory->name }}
                                          </li>
                                       </a>
                                       @else
                                       <li class="dropdown-submenu">
                                          <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}" class="dropdown-item pointer-crouser" style="color: #465f73!important;"
                                             tabindex="-1">{{ $subCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></a>
                                          <ul class="dropdown-menu multi-level font-16 mr-4" role="menu" aria-labelledby="dropdownMenu" style="top:30px!important;width: 100%!important;">
                                             @foreach ($subCategory->children()->get() as $subSubCategory)
                                             @if (!$subSubCategory->children()->exists())
                                             <a tabindex="-1" href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id]) }}">
                                                <li class="dropdown-item">{{ $subSubCategory->name }}</li>
                                             </a>
                                             @else
                                             <li class="dropdown-submenu">
                                                <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id]) }}" class="dropdown-item pointer-crouser" style="color: #465f73!important;"
                                                   tabindex="-1">{{ $subSubCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></a>
                                                <ul class="dropdown-menu multi-level font-16" role="menu" aria-labelledby="dropdownMenu" style="top:30px!important;width: 100%!important;right: 85px!important;">
                                                   @foreach ($subSubCategory->children()->get() as $subSubSubCategory)
                                                   <a tabindex="-1" href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id]) }}">
                                                      <li class="dropdown-item">{{ $subSubSubCategory->name }}</li>
                                                   </a>
                                                   @endforeach
                                                </ul>
                                                @endif
                                             </li>
                                             @endforeach
                                          </ul>
                                       </li>
                                       @endif
                                       @endforeach
                                    </ul>
                                    @endif
                                    @endif
                                 </div>
                                 @endforeach
                              </ul>
                           </nav>
                        </div>
                     </div>
                     <!-- /tt-menu -->
                  </div>
               </div>
            </div>
         </div>
         <!-- /tt-desktop-header -->
         <!-- stuck nav -->
         <div class="tt-stuck-nav" id="js-tt-stuck-nav">
            <div class="container">
               <div class="tt-header-row">
                  <div class="tt-stuck-parent-menu"></div>
                  <div class="tt-stuck-parent-search tt-parent-box"></div>
                  <div class="tt-stuck-parent-cart tt-parent-box"></div>
                  <div class="tt-stuck-parent-account tt-parent-box"></div>
                  <div class="tt-stuck-parent-multi tt-parent-box"></div>
               </div>
            </div>
         </div>
      </header>
      @yield('content')
      <footer id="tt-footer">
         <div class="tt-footer-col tt-color-scheme-01 d-none-print">
            <div class="container">
               <div class="row">
                  <div class="col-md-3 col-lg-3 col-xl-3">
                     <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">دسته بندی ها</h4>
                        <div class="tt-collapse-content">
                           <ul class="tt-list">
                              <li><a href="listing-collection.html">دسته بندی</a></li>
                              <li><a href="listing-collection.html">دسته بندی</a></li>
                              <li><a href="listing-collection.html">دسته بندی</a></li>
                              <li><a href="listing-collection.html">دسته بندی</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3 d-none-print">
                     <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">سایر صفحات </h4>
                        <div class="tt-collapse-content">
                           <ul class="tt-list">
                              <li><a href="account_order.html">سفارشات</a></li>
                              <li><a href="page404.html">علاقه مندی ها</a></li>
                              <li><a href="login.html">ورود</a></li>
                              <li><a href="{{ route('template.contact', $shop->english_name) }}">درباره ما و تماس</a></li>
                              <li><a href="create-account.html">سوالات متداول</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6 d-none-print">
                     <div class="tt-newsletter">
                        <div class="tt-mobile-collapse">
                           <h4 class="tt-collapse-title">عضویت در خبرنامه</h4>
                           <div class="tt-collapse-content">
                              <p>جهت عضویت در سیستم خبرنامه، آدرس ایمیل خودرا در فرم زیر وارد نموده و برروی گزینه عضویت کلیک نمایید.</p>
                              <form class="form-inline form-default" method="post" novalidate="novalidate" action="{{ route('subscribe', $shop->id) }}">
                                 <div class="form-group">
                                    @csrf
                                    <input type="email" name="email" class="form-control" placeholder="آدرس ایمیل">
                                    <button type="submit" class="btn">عضویت</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <ul class="tt-social-icon d-none-print">
                        <li>
                           <a class="icon-g-64" target="_blank" href="http://www.facebook.com/"></a>
                        </li>
                        <li>
                           <a class="icon-h-58" target="_blank" href="http://www.twitter.com/"></a>
                        </li>
                        <li>
                           <a class="icon-g-66" target="_blank" href="http://www.google.com/"></a>
                        </li>
                        <li>
                           <a class="icon-g-67" target="_blank" href="http://www.instagram.com/"></a>
                        </li>
                        <li>
                           <a class="icon-g-70" target="_blank" href="#"></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="tt-footer-custom">
            <div class="container d-none-print">
               <div class="tt-row">
                  <div class="tt-col-left">
                     <div class="tt-col-item tt-logo-col">
                        <!-- logo -->
                        <a class="tt-logo tt-logo-alignment" href="index.html"><img src="{{ $shop->logo['original'] }}" alt=""></a>
                        <!-- /logo -->
                     </div>
                     <div class="tt-col-item">
                        <!-- copyright -->
                        <div class="tt-box-copyright"> تمامی حقوق محفوظ است. &copy; فروشگاه امید</div>
                        <!-- /copyright -->
                     </div>
                  </div>
                  <div class="tt-col-right">
                     <div class="tt-col-item">
                        <!-- payment-list -->
                        <ul class="tt-payment-list">
                           <li><a href="page404.html"><span class="icon-Stripe"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span
                              class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span></span></a></li>
                           <li><a href="page404.html"><span class="icon-paypal-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span
                              class="path6"></span></span></a></li>
                           <li><a href="page404.html"><span class="icon-visa"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span></a></li>
                           <li><a href="page404.html"><span class="icon-mastercard"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span
                              class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span
                              class="path13"></span></span></a></li>
                           <li><a href="page404.html"><span class="icon-discover"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span
                              class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span
                              class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span></span></a></li>
                           <li><a href="page404.html"><span class="icon-american-express"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span
                              class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span></span></a></li>
                        </ul>
                        <!-- /payment-list -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <div id="tt-boxedbutton">
         <div class="rtlbutton boxbutton-js d-none-print">
            <div class="box-btn">نوع نمایش</div>
            <div class="box-description">مشاهده بصورت&nbsp;<strong>باکس</strong></div>
            <div class="box-disable">غیرفعال کردن</div>
         </div>
         <div class="rtlbutton-color">
            <div class="box-btn"><img src="/app/shop/2/images/custom/rtlbutton-color.png" alt=""></div>
            <div class="box-description">
               <span class="box-title byekan">رنگ</span>
               <ul>
                  <li class="active">
                     <a href="#" class="colorswatch1"></a>
                  </li>
                  <li data-color="02">
                     <a href="#" class="colorswatch2"></a>
                  </li>
                  <li data-color="03">
                     <a href="#" class="colorswatch3"></a>
                  </li>
                  <li data-color="04">
                     <a href="#" class="colorswatch4"></a>
                  </li>
                  <li data-color="05">
                     <a href="#" class="colorswatch5"></a>
                  </li>
                  <li data-color="06">
                     <a href="#" class="colorswatch6"></a>
                  </li>
                  <li data-color="07">
                     <a href="#" class="colorswatch7"></a>
                  </li>
                  <li data-color="08">
                     <a href="#" class="colorswatch8"></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!-- modal (AddToCartProduct) -->
      <div class="modal fade" id="modalAddToCartProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
               </div>
               <div class="modal-body">
                  <div class="tt-modal-addtocart mobile">
                     <div class="tt-modal-messages"><i class="icon-f-68"></i> Added to cart successfully!</div>
                     <a href="#" class="btn-link btn-close-popup">CONTINUE SHOPPING</a> <a href="shopping_cart_02.html" class="btn-link">VIEW CART</a> <a
                        href="page404.html" class="btn-link">PROCEED TO CHECKOUT</a>
                  </div>
                  <div class="tt-modal-addtocart desctope">
                     <div class="row">
                        <div class="col-12 col-lg-6">
                           <div class="tt-modal-messages"><i class="icon-f-68"></i> Added to cart successfully!</div>
                           <div class="tt-modal-product">
                              <div class="tt-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-01.jpg" alt=""></div>
                              <h2 class="tt-title"><a href="product.html">عنوان محصول</a></h2>
                              <div class="tt-qty">QTY: <span>1</span></div>
                           </div>
                           <div class="tt-product-total">
                              <div class="tt-total">TOTAL: <span class="tt-price">تومان 324</span></div>
                           </div>
                        </div>
                        <div class="col-12 col-lg-6">
                           <a href="#" class="tt-cart-total">
                              There are 1 items in your cart
                              <div class="tt-total">TOTAL: <span class="tt-price">تومان 324</span></div>
                           </a>
                           <a href="#"
                              class="btn btn-border btn-close-popup">CONTINUE SHOPPING</a> <a href="shopping_cart_02.html" class="btn btn-border">VIEW CART</a> <a href="#" class="btn">PROCEED TO CHECKOUT</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- modal (quickViewModal) -->
      <div class="modal fade" id="ModalquickView" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
               </div>
               <div class="modal-body">
                  <div class="tt-modal-quickview desctope">
                     <div class="row">
                        <div class="col-12 col-md-5 col-lg-6">
                           <div class="tt-mobile-product-slider arrow-location-center">
                              <div><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-01.jpg" alt=""></div>
                              <div><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-01-02.jpg" alt=""></div>
                              <div><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-01-03.jpg" alt=""></div>
                              <div><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/product/product-01-04.jpg" alt=""></div>
                              <!--
                                 //video insertion template
                                 <div>
                                     <div class="tt-video-block">
                                         <a href="#" class="link-video"></a>
                                         <video class="movie" src="/app/shop/2/video/video.mp4" poster="video/video_img.jpg"></video>
                                     </div>
                                 </div> -->
                           </div>
                        </div>
                        <div class="col-12 col-md-7 col-lg-6">
                           <div class="tt-product-single-info">
                              <div class="tt-add-info">
                                 <ul>
                                    <li><span>SKU:</span> 001</li>
                                    <li><span>Availability:</span> 40 in Stock</li>
                                 </ul>
                              </div>
                              <h2 class="tt-title">Cotton Blend Fleece Hoodie</h2>
                              <div class="tt-price"><span class="new-price">تومان 29</span> <span class="old-price"></span></div>
                              <div class="tt-review">
                                 <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-half"></i> <i class="icon-star-empty"></i></div>
                                 <a href="#">(1 Customer Review)</a>
                              </div>
                              <div class="tt-wrapper">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
                              <div class="tt-swatches-container">
                                 <div class="tt-wrapper">
                                    <div class="tt-title-options">SIZE</div>
                                    <form class="form-default">
                                       <div class="form-group">
                                          <select class="form-control">
                                             <option>21</option>
                                             <option>25</option>
                                             <option>36</option>
                                          </select>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="tt-wrapper">
                                    <div class="tt-title-options">COLOR</div>
                                    <form class="form-default">
                                       <div class="form-group">
                                          <select class="form-control">
                                             <option>Red</option>
                                             <option>Green</option>
                                             <option>Brown</option>
                                          </select>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="tt-wrapper">
                                    <div class="tt-title-options">TEXTURE:</div>
                                    <ul class="tt-options-swatch options-large">
                                       <li><a class="options-color" href="#"><span class="swatch-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/custom/texture-img-01.jpg" alt=""> </span><span
                                          class="swatch-label color-black"></span></a></li>
                                       <li class="active"><a class="options-color" href="#"><span class="swatch-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/custom/texture-img-02.jpg" alt=""> </span><span
                                          class="swatch-label color-black"></span></a></li>
                                       <li><a class="options-color" href="#"><span class="swatch-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/custom/texture-img-03.jpg" alt=""> </span><span
                                          class="swatch-label color-black"></span></a></li>
                                       <li><a class="options-color" href="#"><span class="swatch-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/custom/texture-img-04.jpg" alt=""> </span><span
                                          class="swatch-label color-black"></span></a></li>
                                       <li><a class="options-color" href="#"><span class="swatch-img"><img src="/app/shop/2/images/loader.svg" data-src="/app/shop/2/images/custom/texture-img-05.jpg" alt=""> </span><span
                                          class="swatch-label color-black"></span></a></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="tt-wrapper">
                                 <div class="tt-row-custom-01">
                                    <div class="col-item">
                                       <div class="tt-input-counter style-01"><span class="minus-btn"></span>
                                          <input type="text" value="1" size="5"> <span class="plus-btn"></span>
                                       </div>
                                    </div>
                                    <div class="col-item"><a href="#" class="btn btn-lg"><i class="icon-f-39"></i>اضافه به سبد خرید</a></div>
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
      <!-- modalVideoProduct -->
      <div class="modal fade" id="modalVideoProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-video">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
               </div>
               <div class="modal-body">
                  <div class="modal-video-content"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- modal (ModalSubsribeGood) -->
      <div class="modal fade" id="ModalSubsribeGood" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-xs">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
               </div>
               <div class="modal-body">
                  <div class="tt-modal-subsribe-good"><i class="icon-f-68"></i> باموفقیت وارد شدید</div>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal (newsletter) -->
      <script async src="/app/shop/2/js/bundle.js"></script>
      <script src="/app/shop/1/assets/js/jquery-ui.js"></script>
      <script src="/app/shop/1/assets/js/sweetalert.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {

         });
      </script>
      <a href="#" class="tt-back-to-top d-none-print" id="js-back-to-top">بالا</a>
   </body>
   <link rel="stylesheet" href="/app/shop/2/css/rtl.css">
   <link rel="stylesheet" href="/app/shop/2/css/custom.css">
   @toastr_js
   @toastr_render
   @include('sweet::alert')
   @yield('footerScripts')
   <script src="{{url('stats/script.js')}}"></script>
   <script>
      $(document).on('click', '#removeProduct', function(e) {
          e.preventDefault();
          var id = $(this).data('id');
          var cart = $(this).data('cart');
          swal("آیا اطمینان دارید؟", {
                  dangerMode: true,
                  buttons: ["انصراف", "حذف"],

              })
              .then(function(isConfirm) {
                  if (isConfirm) {
                      $.ajax({
                          type: "post",
                          url: "{{url('user-cart/remove')}}",
                          data: {
                              id: id,
                              cart: cart,
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
