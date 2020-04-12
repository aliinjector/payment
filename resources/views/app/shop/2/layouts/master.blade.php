<!DOCTYPE html>
<html lang="en">

<head>
  {!! SEO::generate() !!}

    <meta charset="utf-8">
    <title>{{ $shop->name }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="/app/shop/2/css/style.css">
    <link rel="stylesheet" href="/app/shop/2/css/alert.css">
    <link href="/app/shop/2/font/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/app/shop/2/css/pagination.css" rel="stylesheet">
    <link rel="stylesheet" href="/app/shop/1/assets/css/jquery-ui.css" />
    @toastr_css

    <script src="/app/shop/1/assets/js/jquery.min.js"></script>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    @yield('headerScripts')
    @if(\Request::route()->getName() != 'product')
    <link rel="stylesheet" href="{{ asset('/app/shop/2/css/master.css') }}" />
  @endif
    <style media="screen">

.btn-outline-primary:hover{
        color: transparent!important;
        background-color: transparent!important;
        border-color: #2879FE!important;
}
    .toast-message {
        font-size: 20px;
    }
    .border-btn-blue{
      border-bottom: 1px solid #2879FE!important;
      padding: 10px!important;
    }
    .color-btn-blue{
        color: #2879FE!important;
    }
    </style>
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
                  @foreach ($shopCategories->where('parent_id' , null)->take($shop->menu_show_count) as $shopCategory)
                    @if($shopCategory->children()->exists())
                    <li>
                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategory->id, 'name' => $shopCategory->name]) }}">{{ $shopCategory->name }}</a>
                        <ul>
                          @foreach ($shopCategory->children()->get() as $subCategory)
                            @if($subCategory->children()->exists())
                            <li>
                                <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id, 'name' => $subCategory->name]) }}">{{ $subCategory->name }}</a>
                                <ul>
                                  @foreach ($subCategory->children()->get() as $subSubCategory)
                                    @if($subSubCategory->children()->exists())
                                    <li>
                                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id, 'name' => $subSubCategory->name]) }}">{{ $subSubCategory->name }}</a>
                                        <ul>
                                          @foreach ($subSubCategory->children()->get() as $subSubSubCategory)
                                            @if($subSubSubCategory->children()->exists())
                                            <li>
                                                <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id, 'name' => $subSubSubCategory->name]) }}">{{ $subSubSubCategory->name }}</a>
                                                <ul>
                                                  @foreach ($subSubSubCategory->children()->get() as $subSubSubSubCategory)
                                                    <li><a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubSubCategory->id, 'name' => $subSubSubSubCategory->name]) }}">{{ $subSubSubSubCategory->name }}</a></li>
                                                  @endforeach
                                                </ul>
                                            </li>
                                          @else
                                            <li><a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id, 'name' => $subSubSubCategory->name]) }}">{{ $subSubSubCategory->name }}</a></li>
                                          @endif
                                          @endforeach
                                        </ul>
                                    </li>
                                  @else
                                    <li><a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id, 'name' => $subSubCategory->name]) }}">{{ $subSubCategory->name }}</a></li>
                                  @endif
                                  @endforeach
                            </ul>
                            </li>
                          @else
                            <li><a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id, 'name' => $subCategory->name]) }}">{{ $subCategory->name }}</a></li>
                          @endif
                          @endforeach
                        </ul>
                    </li>
                  @else
                  <li><a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategory->id, 'name' => $shopCategory->name]) }}">{{ $shopCategory->name }}</a></li>
                @endif
                @endforeach


                </ul>









                <div class="mm-navbtn-names">
                    <div class="mm-closebtn">بستن</div>
                    <div class="mm-backbtn">بازگشت</div>
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
                            <a class="tt-logo tt-logo-alignment" href="/{{ $shop->english_name }}"><img class="tt-retina" src="{{ $shop->logo['original'] }}" alt="" style="width:13vw;max-height:50px"></a>
                            <!-- /mobile logo -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- tt-desktop-header -->
            <div class="tt-desktop-header">
                <div class="container">
                    <div class="tt-header-holder">
                        <div class="tt-obj-logo obj-aligment-center" style="padding: 25px">
                            <!-- logo -->

                            <!-- /logo -->
                        </div>
                        <div class="tt-obj-options obj-move-right tt-position-absolute">
                            <!-- tt-search -->
                            <div class="tt-desctop-parent-search tt-parent-box">
                                <div class="tt-search tt-dropdown-obj">
                                    <button class="tt-dropdown-toggle" data-tooltip="{{ __('app-shop-2-layouts-master.jostojoo') }}" data-tposition="bottom"><i class="icon-f-85"></i></button>
                                    <div class="tt-dropdown-menu">
                                        <div class="container">
                                            <form action="{{ route('search', $shop->english_name) }}" method="post">
                                                <div class="tt-col">
                                                    @csrf
                                                    <input type="text" name="queryy" class="tt-search-input" placeholder="{{ __('app-shop-2-layouts-master.namMahsoolYaSazande') }} ...">
                                                    <button class="tt-btn-search" type="submit"></button>
                                                </div>
                                                <div class="tt-col">
                                                    <button class="tt-btn-close icon-g-80"></button>
                                                </div>
                                                <div class="tt-info-text">{{ __('app-shop-2-layouts-master.donbaleCheMigardid') }}</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /tt-search -->
                            <!-- tt-cart -->
                            @auth
                            <div class="tt-desctop-parent-cart tt-parent-box">
                                <div class="tt-cart tt-dropdown-obj" data-tooltip="{{ __('app-shop-2-layouts-master.cart') }}" data-tposition="bottom">
                                    <button class="tt-dropdown-toggle"><i class="icon-f-39"></i> <span class="tt-badge-cart ml-1">
                                      @if(\Auth::user()->cart()->get()->count() != 0) {{ \Auth::user()->cart()->get()->first()->cartProduct()->count() }}
                                                @else 0
                                                @endif
                                        </span>
                                    </button>
                                    <div class="tt-dropdown-menu">
                                        <div class="tt-mobile-add">
                                            <h6 class="tt-title">{{ __('app-shop-2-layouts-master.cart') }}</h6>
                                            <button class="tt-close">{{ __('app-shop-2-layouts-master.bastan') }}</button>
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
                                                            @isset($cart)
                                                              @if($cart->cartProduct != null)
                                                            @foreach ($cart->cartProduct as $cartProduct)
                                                            <div class="tt-item border-bottom p-3">
                                                                <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$cartProduct->product->slug,'id'=>$cartProduct->product->id]) }}" target="_blank">
                                                                    <div class="tt-item-img"><img src="{{ asset($cartProduct->product->image['80,80'] ? $cartProduct->product->image['80,80'] : '/images/no-image.png') }}" data-src="{{ asset($cartProduct->product->image['80,80'] ? $cartProduct->product->image['80,80'] : '/images/no-image.png') }}" alt=""></div>
                                                                    <div class="tt-item-descriptions">
                                                                        <h2 class="tt-title">{{ $cartProduct->product->title }}</h2>
                                                                        <ul class="tt-add-info">
                                                                            <li>{{ !$cartProduct->color ? '' : $cartProduct->color->name}}</li>
                                                                        </ul>
                                                                        <div class="tt-quantity"> <input class="border-0" name="{{ $cartProduct->product->id }}" type="text"
                                                                              value="{{ $cartProduct->product->carts()->where('user_id' , \auth::user()->id)->first()->cartProduct->where('product_id' , $cartProduct->product->id)->first()->quantity }}">
                                                                            {{ __('app-shop-2-layouts-master.adad') }}</div>
                                                                        <br />
                                                                        <div class="tt-price">{{ number_format($cartProduct->total_price) }} {{ __('app-shop-2-layouts-master.tooman') }}</div>
                                                                    </div>
                                                                </a>
                                                                <div class="tt-item-close">
                                                                    <a href="" id="removeProduct" class="tt-btn-close" data-color="{{  !$cartProduct->color ? null : $cartProduct->color->id }}" data-cart="{{ \Auth::user()->cart()->get()->first()->id }}" data-cartp="{{ $cartProduct->id }}" data-id="{{ $cartProduct->product->id }}"></a>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                          @endif
                                                          @endisset($cart)

                                                    </div>
                                                    <div class="tt-cart-btn">
                                                        <div class="tt-item"><a href="{{ route('user-cart' , ['shop' => $shop->english_name]) }}" style="color: white;"><button type="submit" class="btn btn-blue">مشاهده سبد خرید</a></button></div>
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
                                    <button class="tt-dropdown-toggle" data-tooltip="{{ __('app-shop-2-layouts-master.hesabKarbari') }}" data-tposition="bottom"><i class="icon-f-94"></i></button>
                                    <div class="tt-dropdown-menu">
                                        <div class="tt-mobile-add">
                                            <button class="tt-close">{{ __('app-shop-2-layouts-master.bastan') }}</button>
                                        </div>
                                        <div class="tt-dropdown-inner">
                                            <ul>
                                                @auth()
                                                <li><a href="{{ route('wishlist' , ['shop' => $shop->english_name]) }}"><i class="icon-n-072"><span class="tt-badge-cart">
                                                                @if(\Auth::user()->wishlist()->get()->where('shop_id', $shop->id)->count() != 0) {{ \Auth::user()->wishlist()->get()->where('shop_id', $shop->id)->first()->products()->count() }}
                                                                    @else 0
                                                                    @endif
                                                            </span></i>{{ __('app-shop-2-layouts-master.alagheMandiHa') }}</a>
                                                </li>
                                                <li><a href="{{ route('compare' , ['shop' => $shop->english_name]) }}"><i class="fa fa-adjust ml-1" style="font-size: 17px;"><span class="tt-badge-cart">
                                                                @if(\Auth::user()->compare()->get()->where('shop_id', $shop->id)->count() != 0) {{ \Auth::user()->compare()->get()->where('shop_id', $shop->id)->first()->products()->count() }}
                                                                    @else 0
                                                                    @endif
                                                            </span></i>مقایسه ها</a>
                                                </li>
                                                <li>
                                                  @if(\Auth::user()->id == $shop->user_id)
                                                    <a href="{{ route('dashboard.index') }}"><i class="icon-f-94"></i>پنل مدیریت</a>
                                                  @else
                                                    <a href="{{ route('user-panel.index') }}"><i class="icon-f-94"></i>{{ __('app-shop-2-layouts-master.panelKarbari') }}</a>
                                                  @endif
                                                </li>
                                                <li><a href="{{ route('user-address.index') }}"><i class="fa fa-address-card ml-2"></i>{{ __('app-shop-2-layouts-master.addressHa') }}</a></li>
                                                <li><a href="{{ route('user.purchased.list') }}"><i class="icon-f-47"></i>{{ __('app-shop-2-layouts-master.listSefaareshaat') }}</a></li>
                                                <li><a href="{{ route('logout') }}"><i class="icon-f-77"></i>{{ __('app-shop-2-layouts-master.khorooj') }}</a></li>
                                                @endauth
                                                @guest()
                                                <li><a href="{{ route('login') }}"><i class="icon-f-76"></i>{{ __('app-shop-2-layouts-master.vorood') }}</a></li>
                                                <li><a href="{{ route('register', ['shop' => $shop->english_name]) }}"><i class="icon-f-94"></i>{{ __('app-shop-2-layouts-master.ozviat') }}</a></li>
                                                @endguest
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @auth()
                            <p class="mt-0">{{ Auth::user()->firstName}} {{ __('app-shop-2-layouts-master.welcome') }}</p>
                          <span style="    font-size: 15px;">{{ $shop->name }}</span>
                            @endauth
                            <!-- /tt-account -->
                            <!-- tt-langue and tt-currency -->

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
                                        <li class="dropdown"><a class="" href="/{{ $shop->english_name }}"><img class="rounded" src="{{ $shop->logo['original'] }}" alt="" style="width:5vw"></a></li>
                                          <li class="dropdown"><a class="iranyekan" href="/{{ $shop->english_name }}" style="font-size: 17px!important;">{{ __('app-shop-2-layouts-master.safheAsli') }}</a></li>

                                      @if($shop->menu_show == "mega_menu")
                                          <div class="dropdown mx-3 hover-opacity">
                                              <a href="">
                                                  <button class="btn btn-primary-outline dropdown-toggle iranyekan f-em1-5 font-weight-normal text-white">
                                                  دسته بندی کالا ها
                                                  </button>
                                              </a>
                                              <ul class="dropdown-menu multi-level font-16 p-4" role="menu" aria-labelledby="dropdownMenu" style="right:8.5em!important;width: 265px!important;min-height: 50vh!important;">
                                                  @foreach ($shopCategories->where('parent_id' , null) as $subCategory)
                                                  @if (!$subCategory->children()->exists())
                                                  <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id, 'name' => $subCategory->name]) }}" style="color: #465f73!important;font-size: 17px;font-weight: 500;">
                                                      <li class="dropdown-item dropdown-submenu font-15 py-3">{{ $subCategory->name }}
                                                      </li>
                                                  </a>
                                                  @else
                                                  <li class="dropdown-submenu py-3" style="position: static;">
                                                      <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id, 'name' => $subCategory->name]) }}" class="dropdown-item pointer-crouser" style="width: 113%;font-size: 17px;font-weight: 500;" tabindex="-1"
                                                        class="li-color">{{ $subCategory->name }}</a>
                                                      <ul class="dropdown-menu font-16" style="width: 992px!important;min-height: 50vh!important;background-color: #FFFFFF;border-radius: 8px;margin-top: 12%;right:200px!important">
                                                          <div class="row">
                                                              @foreach ($subCategory->children()->get() as $subSubCategory)
                                                              <div class="col-lg-3">
                                                                  @if (!$subSubCategory->children()->exists())
                                                                  <a tabindex="-1" href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id, 'name' => $subSubCategory->name]) }}" style="font-size: 17px;font-weight: 500;">
                                                                      <li class="dropdown-item">{{ $subSubCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></li>
                                                                  </a>
                                                                  @else
                                                                  <li class="dropdown-submenu" style="background-color:#FFFFFF;">
                                                                      <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id, 'name' => $subSubCategory->name]) }}" class="dropdown-item pointer-crouser" style="font-weight: 500!important;font-size: 17px;"
                                                                        class="li-color">{{ $subSubCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></a>
                                                                  </li>
                                                                  @foreach($subSubCategory->children()->get() as $subSubSubCategory)
                                                                      <li class="dropdown-submenu p-2 text-left">
                                                                          <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id, 'name' => $subSubSubCategory->name]) }}" class="iranyekan" style="color: #4a5f73;font-size: 14px!important;">
                                                                              {{ $subSubSubCategory->name }}
                                                                          </a>
                                                                      </li>
                                                                      @endforeach
                                                                      @endif

                                                              </div>
                                                              @endforeach

                                                          </div>

                                                      </ul>
                                                  </li>
                                                  @endif
                                                  @endforeach
                                              </ul>
                                            </div>

                                          @else

                                            @inject('CategoryCTLR', 'App\Http\Controllers\Shop\CategoryController')
                                            @foreach ($shopCategories->where('parent_id' , null)->take($shop->menu_show_count) as $shopCategory)
                                            <div class="dropdown mx-3" style="top:95px!important">
                                                <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategory->id, 'name' => $shopCategory->name]) }}" class="font-weight-bold iranyekan">
                                                    <button class="btn dropdown-toggle iranyekan f-em1-5 font-weight-normal @if(Request::is('*/category/'.$shopCategory->id.'/*')) border-btn-blue @endif @if(Route::currentRouteName() == 'category' and $CategoryCTLR->getAllSubCategories($shopCategory->id)->contains('id', explode('/',url()->current())[5]))  border-btn-blue @endif" style="color:
                                       #465f73!important;background-color:transparent;font-size: 17px!important;">
                                                        {{ $shopCategory->name }}
                                                    </button>
                                                </a>
                                                @if($shop->menu_show == "nestead_menu")
                                                    @if($shopCategory->children()->exists())
                                                        <ul class="dropdown-menu multi-level font-16" role="menu" aria-labelledby="dropdownMenu" style="top:66px!important;
                                       width: 21%!important;z-index: 10000;">
                                                            @foreach ($shopCategory->children()->get() as $subCategory)
                                                            @if (!$subCategory->children()->exists())
                                                            <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id, 'name' => $subCategory->name]) }}" class="font-weight-bold iranyekan" style="color: #465f73; font-size:16px">
                                                                <li class="dropdown-item dropdown-submenu mx-2 @if(Request::is('*/category/'.$subCategory->id.'/*')) color-btn-blue @endif @if(Route::currentRouteName() == 'category' and $CategoryCTLR->getAllSubCategories($subCategory->id)->contains('id', explode('/',url()->current())[5])) color-btn-blue @endif">{{ $subCategory->name }}
                                                                </li>
                                                            </a>
                                                            @else
                                                            <li class="dropdown-submenu mx-2">
                                                                <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id, 'name' => $subCategory->name]) }}" class="dropdown-item pointer-crouser font-weight-bold iranyekan @if(Request::is('*/category/'.$subCategory->id.'/*')) color-btn-blue @endif @if(Route::currentRouteName() == 'category' and $CategoryCTLR->getAllSubCategories($subCategory->id)->contains('id', explode('/',url()->current())[5])) color-btn-blue @endif" style="color: #465f73; font-size:16px"
                                                                  tabindex="-1">{{ $subCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></a>
                                                                <ul class="dropdown-menu multi-level font-16 mr-4" role="menu" aria-labelledby="dropdownMenu" style="top:30px!important;width: 140%!important;">
                                                                    @foreach ($subCategory->children()->get() as $subSubCategory)
                                                                    @if (!$subSubCategory->children()->exists())
                                                                    <a tabindex="-1" href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id, 'name' => $subSubCategory->name]) }}" style="color: #465f73; font-size:16px" class="font-weight-bold iranyekan mr-2">
                                                                        <li class="dropdown-item dropdown-submenu mx-2 @if(Request::is('*/category/'.$subSubCategory->id.'/*')) color-btn-blue @endif @if(Route::currentRouteName() == 'category' and $CategoryCTLR->getAllSubCategories($subSubCategory->id)->contains('id', explode('/',url()->current())[5])) color-btn-blue @endif">{{ $subSubCategory->name }}</li>
                                                                    </a>
                                                                    @else
                                                                    <li class="dropdown-submenu mx-3">
                                                                        <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id, 'name' => $subSubCategory->name]) }}" class="dropdown-item pointer-crouser font-weight-bold iranyekan @if(Request::is('*/category/'.$subSubCategory->id.'/*')) color-btn-blue @endif @if(Route::currentRouteName() == 'category' and $CategoryCTLR->getAllSubCategories($subSubCategory->id)->contains('id', explode('/',url()->current())[5])) color-btn-blue @endif" style="color: #465f73;font-size:16px"
                                                                          tabindex="-1">{{ $subSubCategory->name }}<i class="fa fa-angle-left light-dark-text-color font-12 mr-1"></i></a>
                                                                        <ul class="dropdown-menu multi-level font-16" role="menu" aria-labelledby="dropdownMenu" style="top:30px!important;width: 140%!important;right: 160px!important;">
                                                                            @foreach ($subSubCategory->children()->get() as $subSubSubCategory)
                                                                            <a tabindex="-1" href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id, 'name' => $subSubSubCategory->name]) }}" style="color: #465f73;font-size:16px; display:block" class="font-weight-bold iranyekan">
                                                                                <li class="dropdown-item mx-3 @if(Request::is('*/category/'.$subSubSubCategory->id.'/*')) color-btn-blue @endif @if(Route::currentRouteName() == 'category' and $CategoryCTLR->getAllSubCategories($subSubSubCategory->id)->contains('id', explode('/',url()->current())[5])) color-btn-blue @endif">{{ $subSubSubCategory->name }}</li>
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
                                      @endif
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
                            <h4 class="tt-collapse-title">{{ __('app-shop-2-layouts-master.akharinDasteha') }}</h4>
                            <div class="tt-collapse-content">
                                <ul class="tt-list">
                                    @foreach($shop->ProductCategories as $catetory)
                                        @if($loop->iteration > 5)
                                            @break
                                            @endif
                                            <li><a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$catetory->id, 'name' => $catetory->name]) }}"> {{ $catetory->name }} </a></li>
                                            @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 d-none-print">
                        <div class="tt-mobile-collapse">
                            <h4 class="tt-collapse-title">{{ __('app-shop-2-layouts-master.saayerSafahaat') }} </h4>
                            <div class="tt-collapse-content">
                                <ul class="tt-list">
                                    <li><a href="{{ route('wishlist', $shop->english_name) }}">{{ __('app-shop-2-layouts-master.alagheMandiHa') }}</a></li>
                                    <li><a href="{{ route('login') }}">{{ __('app-shop-2-layouts-master.vorood') }}</a></li>
                                    <li><a href="{{ route('template.contact', $shop->english_name) }}">{{ __('app-shop-2-layouts-master.darbareMaVaTamas') }}</a></li>
                                    {{-- <li><a href="{{ route('faq.show', $shop->english_name) }}">سواالات متداول</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 d-none-print">
                        <div class="tt-newsletter">
                            <div class="tt-mobile-collapse">
                                <h4 class="tt-collapse-title">{{ __('app-shop-2-layouts-master.ozviatDarKhabarName') }}</h4>
                                <div class="tt-collapse-content">
                                    <p>{{ __('app-shop-2-layouts-master.ozviatDarKhabarNameDesc') }}.</p>
                                    <form class="form-inline form-default" method="post" novalidate="novalidate" action="{{ route('subscribe', $shop->id) }}">
                                        <div class="form-group">
                                            @csrf
                                            <input type="email" name="email" class="form-control" placeholder="{{ __('app-shop-2-layouts-master.email') }}">
                                            <button type="submit" class="btn">{{ __('app-shop-2-layouts-master.ozviat') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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

                            <div class="tt-box-copyright">

                                &copy; {{ __('app-shop-2-layouts-master.copyRight') }}.
                                <a target="_blank" href="https://omidshop.net">
                                    <span class="text-muted d-none d-sm-inline-block float-right">{{ __('app-shop-2-layouts-master.developer') }}</span>
                                </a>

                            </div>
                            <!-- /copyright -->
                        </div>
                    </div>
                    <div class="tt-col-right">
                        <div class="tt-col-item">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div style="display:none" id="tt-boxedbutton">
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
                    <div class="tt-modal-subsribe-good"><i class="icon-f-68"></i> {{ __('app-shop-2-layouts-master.baMovafaghiatVaredShodid') }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal (newsletter) -->


    <a href="#" class="tt-back-to-top d-none-print" id="js-back-to-top">{{ __('app-shop-2-layouts-master.up') }}</a>
</body>
@toastr_js
@toastr_render
<script src="/app/shop/1/assets/js/jquery.min.js"></script>
<script src="/app/shop/2/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="/app/shop/2/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/app/shop/2/js/bootstrap-select.min.js"></script>
<script async src="/app/shop/2/js/bundle.js"></script>
<script src="/app/shop/1/assets/js/jquery-ui.js"></script>
<script src="/app/shop/1/assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="/app/shop/2/css/rtl.css">
<link rel="stylesheet" href="/app/shop/2/css/custom.css">
<link href="/app/css/custom.css" rel="stylesheet" type="text/css">


@include('sweet::alert')
@yield('footerScripts')
<script>
    $(document).on('click', '#removeProduct', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var cart = $(this).data('cart');
        var color = $(this).data('color');
        var cartProductId = $(this).data('cartp');
        swal("آیا اطمینان دارید؟", {
                dangerMode: true,
                buttons: ["انصراف", "حذف"],

            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "{{url( $shop->english_name .'/user-cart/remove')}}",
                        data: {
                            id: id,
                            cart: cart,
                            color: color,
                            cartProductId: cartProductId,
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

    $('.hover-opacity').hover(
        function() {
            $('#tt-pageContent').addClass('opacity-lost')
        },
        function() {
            $('#tt-pageContent').removeClass('opacity-lost')
        }
    )
</script>

<script>
if ($("#color-selection").length == 0){
if ($("li.color-select").hasClass("active")) {
  var colorId = $("li.color-select > a").data('color');
  console.log(colorId);
  $("button.tt-btn-addtocart").filter("[data-col='true']").append('<input type="hidden" id="color-selection" name="color" value="'+colorId+'">');
}
}
//when the Add Field button is clicked
$('.options-color').on('click', function() {
  var colorId = $(this).data('color');
//Append a new row of code to the "#items" div
if ($("#color-selection").length > 0){
  $("#color-selection").remove();
}
  $("button.tt-btn-addtocart").append('<input type="hidden" id="color-selection" name="color" value="'+colorId+'">');
});

</script>

<script src="{{url('stats/script.js')}}"></script>


</html>
