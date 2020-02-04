@inject('CategoryCTLR', 'App\Http\Controllers\Shop\CategoryController')
<div class="@if($products->count() != null) col-lg-3 @endif">
    <div class="card e-co-product" style="max-width: 30rem;">
        <h5 class="text-dark pr-3 border-btm font-weight-500 m-4">{{ __('app-shop-1-layouts-partials-filter.filterType') }}</h5>
        <div class="card-body d-flex justify-content-center text-primary">
            <form @if(isset($category)) action="{{ route('category', ['shop' => $shop->english_name,'categroyId' => $category->id ])}}"
            @elseif(isset($tag)) action="{{ route('tag', ['shop' => $shop->english_name,   'name' => $tag->name ])}}"
            @else action="{{ route('brand', ['shop' => $shop->english_name,'id' => $brand->id ])}}"
            @endif id="submit" method="get">
            <div class="btn-group btn-group-toggle mb-4 flex-wrap" data-toggle="buttons">
                <label id="available-filter-1" for="available-filter-1" class="border-top-down-radius-0 btn btn-outline-secondary @if(request()->type == '') active @endif border-left-0 iranyekan crouser" style="cursor:pointer">
                    <input type="radio" name="type" value="all" id="available-filter-1" @if(request()->type == '' or request()->type == 'all') checked="" @endif> {{ __('app-shop-1-layouts-partials-filter.filterTypeItem1') }}
                </label>
                <label id="available-filter-2" for="available-filter-2" class="border-top-down-radius-0 btn btn-outline-secondary border-right-0  @if(request()->type == 'product') active @endif border-left-0 iranyekan"
                  style="cursor:pointer">
                    <input type="radio" name="type" value="product" id="available-filter-2" @if(request()->type == 'product') checked="" @endif> {{ __('app-shop-1-layouts-partials-filter.filterTypeItem2') }}
                </label>
                <label id="available-filter-3" for="available-filter-3" class="border-top-down-radius-0 btn btn-outline-secondary border-right-0  @if(request()->type == 'file') active @endif border-left-0 iranyekan"
                  style="cursor:pointer">
                    <input type="radio" name="type" value="file" id="available-filter-3" @if(request()->type == 'file') checked="" @endif> {{ __('app-shop-1-layouts-partials-filter.filterTypeItem3') }}
                </label>
                <label id="available-filter-4" for="available-filter-4" class="border-top-down-radius-0 btn btn-outline-secondary  border-right-0  @if(request()->type == 'service') active @endif iranyekan" style="cursor:pointer">
                    <input type="radio" name="type" value="service" id="available-filter-4" @if(request()->type == 'service') checked="" @endif> {{ __('app-shop-1-layouts-partials-filter.filterTypeItem4') }}
                </label>
            </div>
            <h5 class="text-dark pr-1 border-btm font-weight-500 m-2">{{ __('app-shop-1-layouts-partials-filter.filterPrice') }}</h5>
            <input type="text" id="available-price-1" class="w-100 p-4 font-14 byekan" style="border:0; color:#15939D !important; font-weight:bold;">
            <input type="hidden" id="available-price-min"  name="minprice" value="@if(request()->minprice == null) 1000 @else {{ request()->minprice }} @endif">
            <input type="hidden" id="available-price-max"  name="maxprice" value="@if(request()->maxprice == null) 100000000 @else {{ request()->maxprice }} @endif">
            <div id="mySlider"></div>

            <h5 class="text-dark pr-1 border-btm font-weight-500 m-2  mt-5">{{ __('app-shop-1-layouts-partials-filter.filterColor') }}</h5>
            <ul class="tt-options-swatch options-middle">
                @foreach ($colors as $color)
                <li>
                    <a class="options-color border color-filtering" data-color="{{ $color->code }}" style="background-color:#{{ $color->code }}">
                    </a>
                </li>
                @endforeach
                <input id="color-input" type="hidden" name="color" value="">

            </ul>


            <h5 class="text-dark pr-1 border-btm font-weight-500 m-2  mt-5">تگ ها</h5>
            <ul class="tags iranyekan">
                @foreach($shopTags as $shopTag)
                <li><a href="{{ route('tag', ['shop'=>$shop->english_name, 'name'=>$shopTag->name]) }}" class="tag iranyekan" style="padding-top:0px!important">{{ $shopTag->name }}</a></li>
                @endforeach
            </ul>

            <h5 class="text-dark pr-1 font-weight-500 m-2  mt-5">برند ها</h5>
                @foreach($brands as $brand)
                <ul class="list-group font-15">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="text-color-orginal p-2" href="{{ route('brand', ['shop'=>$shop->english_name, 'name'=>$brand->id]) }}"> {{ $brand->name }} </a>
                        <span class="badge badge-primary badge-pill byekan bg-orange-omid">{{ $brand->products->count() }}</span>
                    </li>
                </ul>
                @endforeach

        </div>


    </div>
    <div class="card p-3 align-items-start iranyekan font-15" style="max-width: 30rem;">
        <h5 class="text-dark pr-1 border-btm font-weight-500 m-2" style="width: 90%;">{{ __('app-shop-1-layouts-partials-filter.dasteBandiHa') }}</h5>
        <div class="border-0">
            <div class="list-group list-group-root well border-0">
                @foreach($categories as $category)
                <a href="#item-{{$category->id}}" class="border-0 iranyekan p-0 py-1 @if( Request::is('*/category/'.$category->id)) font-weight-bolder text-dark @endif" data-toggle="collapse">
                <i class="fa fa-angle-left light-dark-text-color font-12 mr-2"></i>{{ $category->name }}
                @if($shop->cat_image_status == 'enable')<img src="{{ $category->icon['45,45'] }}" alt="">
                    @endif
                    </a>
                    <div
                      class="list-group collapse border-0  @if( Request::is('*/category/'.$category->id)) show @elseif($category->children()->exists() and $CategoryCTLR->getAllSubCategories($category->id)->where('id' , (int)Request::segment(3))->count() != 0) show @endif"
                    id="item-{{$category->id}}">
                    @foreach ($category->children()->get() as $subCategory)
                    <a @if($shop->menu_show == 'nestead_box') href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}"
                        @else href="#item-{{$category->id}}-{{$subCategory->id}}"
                        @endif class="border-0 iranyekan dark-text-color p-2" @if($shop->menu_show != 'nestead_box') data-toggle="collapse"
                            @endif>
                                <i class="fa fa-angle-down light-dark-text-color font-12 mr-2"></i> {{ $subCategory->name}}
                                @if($shop->cat_image_status == 'enable')<img src="{{ $category->icon['45,45'] }}" alt="">
                                    @endif </br>
                    </a>
                    <div
                      class="list-group collapse border-0 @if($CategoryCTLR->getAllSubCategories($subCategory->id)->where('id' , (int)Request::segment(3))->count() != 0) show @elseif($shop->menu_show == 'nestead_box') show @endif"
                    id="item-{{$category->id}}-{{$subCategory->id}}">
                    @foreach ($subCategory->children()->get() as $subSubCategory)
                    <a @if($shop->menu_show == 'nestead_box') href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id]) }}"
                        @else href="#item-{{$category->id}}-{{$subCategory->id}}-{{$subSubCategory->id}}"
                        @endif class="border-0 iranyekan dark-text-color p-2 mr-5" @if($shop->menu_show != 'nestead_box') data-toggle="collapse"
                            @endif ><i class="fa fa-angle-down light-dark-text-color font-12 mr-2"></i>{{ $subSubCategory->name}}
                            @if($shop->cat_image_status == 'enable')<img src="{{ $category->icon['45,45'] }}" alt="">
                                @endif</a>
                                <div
                                  class="list-group collapse border-0 @if($CategoryCTLR->getAllSubCategories($subSubCategory->id)->where('id' , (int)Request::segment(3))->count() != 0) show @elseif($shop->menu_show == 'nestead_box') show @endif"
                                id="item-{{$category->id}}-{{$subCategory->id}}-{{$subSubCategory->id}}">
                                @foreach ($subSubCategory->children()->get() as $subSubSubCategory)
                                <a @if($shop->menu_show == 'nestead_box') href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id]) }}"
                                    @else href="#item-{{$category->id}}-{{$subCategory->id}}-{{$subSubCategory->id}}-{{$subSubSubCategory->id}}"
                                    @endif class="border-0 iranyekan dark-text-color p-2 mr-5 pr-4" @if($shop->menu_show != 'nestead_box') data-toggle="collapse" @endif>{{ $subSubSubCategory->name}}
                                            @if($shop->cat_image_status == 'enable')<img src="{{ $category->icon['45,45'] }}" alt="">
                                                @endif
                                </a>
                                <div class="list-group collapse border-0" id="item-{{$category->id}}-{{$subCategory->id}}-{{$subSubCategory->id}}-{{$subSubSubCategory->id}}">
                                    @foreach ($subSubSubCategory->children()->get() as $subSubSubSubCategory)
                                    <a href="#" class="border-0 iranyekan dark-text-color p-2 mr-5  pr-5">{{ $subSubSubSubCategory->name}}
                                        @if($shop->cat_image_status == 'enable')<img src="{{ $category->icon['45,45'] }}" alt="">
                                            @endif
                                    </a>
                                    @endforeach
                                </div>
                                @endforeach
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
    @endforeach
</div>
</div>
</div>
</div>
