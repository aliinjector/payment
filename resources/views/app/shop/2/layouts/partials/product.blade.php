<div class="tt-product thumbprod-center">
    <div style="height: 400px;display:flex;" class="tt-image-box">
        <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="مشاهده اجمالی" data-tposition="left"></a>
        <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name]) }}" method="post">
            @csrf

              <button type="submit" name="button" class="tt-btn-wishlist">
                ارسال
            {{-- <a href="#" class="tt-btn-wishlist" data-tooltip="افزودن به علاقه مندی" data-tposition="left"></a> --}}
          </button>
        </form>

        <a href="#" class="tt-btn-compare" data-tooltip="افزودن به مقایسه" data-tposition="left"></a>
        <a style="margin: auto;" href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}">
            <span class="tt-img">
                <img src="/app/shop/2/images/loader.svg" data-src="{{ $product->image['original'] }}" alt="">
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
            <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-half"></i> <i class="icon-star-empty"></i></div>
        </div>
        <h2 class="tt-title"><a href="">{{ $product->title }}</a></h2>
        <div class="tt-price mt-2">{{ number_format($product->price) }} تومان</div>
        <div class="tt-option-block">
            <ul class="tt-options-swatch">
                <li>
                    <a class="options-color tt-color-bg-03" href="#"></a>
                </li>
                <li>
                    <a class="options-color tt-color-bg-04" href="#"></a>
                </li>
                <li>
                    <a class="options-color tt-color-bg-05" href="#"></a>
                </li>
            </ul>
        </div>
        <div class="tt-product-inside-hover">
            @if(\Auth::user())
            <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan tt-btn-addtocart thumbprod-button-bg"><i class="mdi mdi-cart mr-1"></i>
                    @if($product->type == 'file') دریافت فایل
                        @else اضافه به سبد خرید
                        @endif</button>
            </form>
            @endif
            <div class="tt-row-btn">
                <a href="{{ route('wishlist.store', ['shop'=>$shop->english_name]) }}" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                <a href="#" class="tt-btn-wishlist"></a>
                <a href="#" class="tt-btn-compare"></a>
            </div>
        </div>
    </div>
</div>
