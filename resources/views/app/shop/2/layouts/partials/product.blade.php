<div class="tt-product thumbprod-center border p-2 image-box-card">
    <div class="tt-image-box" style="height: 30vh!important;">
        <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="wishlistForm{{ $product->id }}">
            @csrf

            <a href="javascript:{}" onclick="document.getElementById('wishlistForm{{ $product->id }}').submit();" class="tt-btn-wishlist submit" data-tooltip="{{ __('app-shop-2-layouts-partials-product.alagheMandiHa') }}" data-tposition="left"></a>
        </form>

        <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="compareForm{{ $product->id }}">
            @csrf

            <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $product->id }}').submit();" class="tt-btn-compare" data-tooltip="{{ __('app-shop-2-layouts-partials-product.moghayese') }}" data-tposition="left"></a>

        </form>

        <a style="margin: auto;" href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->slug]) }}">
            <span class="tt-img">
                <img src="/app/shop/2/images/loader.svg" data-src="{{ $product->image['250,250'] }}" alt="">
            </span>
            @if(0)
            <span class="tt-img-roll-over">
                <img src="/app/shop/2/images/loader.svg" data-src="/{{ $product->galleries[1]->filename }}" alt="">
            </span>
            @endif
        </a>
    </div>
    <div class="tt-description">
        <div class="tt-row">
            <ul class="tt-add-info m-2">
                <li><a href="#">{{ $product->productCategory->name }}</a></li>
            </ul>
            <div class="tt-rating">
                @for ($i = 1; $i <= (int)$product->avgRating; $i++)
                    <i class="icon-star"></i>
                    @endfor
            </div>

        </div>
        <h2 class="tt-title"><a href="">{{ $product->title }}</a></h2>
        <div class="tt-price mt-2">{{ number_format($product->price) }} {{ __('app-shop-2-layouts-partials-product.tooman') }}</div>
        <div class="tt-option-block">
            <ul class="tt-options-swatch">
              @php
              $i = 0;
               @endphp
                @foreach($product->colors as $color)
                    <li class="color-select {{ $i == 0 ? 'active' : '' }}">
                        <a class="options-color tt-border tt-color-bg-08" data-color="{{ $color->id }}" href="#" style="background-color:#{{ $color->code }}"></a>
                    </li>
                    @php
                    $i ++;
                     @endphp
                    @endforeach
            </ul>
        </div>
        <div class="tt-product-inside-hover">
            @if(\Auth::user())

            <button @if($product->colors->count() != 0) data-col="true" @endif class="tt-btn-addtocart thumbprod-button-bg"><i class="mdi mdi-cart mr-1"></i>
          <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->slug]) }}" class="text-white">
            مشاهده محصول
            </a>
                </button>
            @endif
            <div class="tt-row-btn">
              <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="wishlistForm{{ $product->id }}">
                  @csrf

                  <a href="javascript:{}" onclick="document.getElementById('wishlistForm{{ $product->id }}').submit();" class="tt-btn-wishlist submit" data-tooltip="{{ __('app-shop-2-layouts-partials-product.alagheMandiHa') }}" data-tposition="left"></a>
              </form>
              <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="compareForm{{ $product->id }}">
                  @csrf

                  <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $product->id }}').submit();" class="tt-btn-compare" data-tooltip="{{ __('app-shop-2-layouts-partials-product.moghayese') }}" data-tposition="left"></a>

              </form>

            </div>
        </div>
    </div>
</div>
