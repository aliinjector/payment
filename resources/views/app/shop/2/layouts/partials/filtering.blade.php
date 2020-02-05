<div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside" id="js-leftColumn-aside">
  <div class="tt-btn-col-close"><a href="#">{{ __('app-shop-2-category.bastan') }}</a></div>
  <div class="tt-collapse open tt-filter-detach-option">
    <div class="tt-collapse-content">
      <div class="filters-mobile">
        <div class="filters-row-select"></div>
      </div>
    </div>
  </div>
  @isset($category)
  <div class="tt-collapse">
    <h3 class="tt-collapse-title">{{ __('app-shop-2-category.zirDasteha') }}</h3>
    <div class="tt-collapse-content">
      <ul class="tt-list-row">

        <li class="active"><a href="#">{{ $category->name }} @if($shop->cat_image_status == 'enable')<img src="{{ $category->icon['45,45'] }}" alt=""> @endif</a></li>
        @foreach($subCategories as $subCategory)
        <li><a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}">{{ $subCategory->name }} @if($shop->cat_image_status == 'enable')<img src="{{ $category->icon['45,45'] }}" alt=""> @endif</a></li>
        @endforeach
      </ul>
    </div>
  </div>
@endisset

  <div class="tt-collapse">
    <h3 class="tt-collapse-title">تمامی دسته بندی ها</h3>
    <div class="tt-collapse-content">
      <ul class="tt-list-row">
        @foreach($shop->productCategories as $categorySingle)
        <li>
          <div class="d-flex justify-content-between p-3">
              <a href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$categorySingle->id]) }}">{{ $categorySingle->name }}</a>
              @if($shop->cat_image_status == 'enable')<img src="{{ $categorySingle->icon['45,45'] }}" alt=""> @endif
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="tt-collapse">
    <h3 class="tt-collapse-title">{{ __('app-shop-2-category.filterGheymat') }}</h3>
    <div class="tt-collapse-content">
      <form @if(isset($category)) action="{{ route('category', ['shop' => $shop->english_name,'categroyId' => $category->id ])}}"
      @elseif(isset($tag)) action="{{ route('tag', ['shop' => $shop->english_name,   'name' => $tag->name ])}}"
      @else action="{{ route('brand', ['shop' => $shop->english_name,'id' => $brand->id ])}}"
      @endif id="submit" method="get">

        <ul class="tt-list-row">
          <input type="text" id="available-price-1" class="w-100 p-2 byekan font-14" style="border:0; color:#2979FE !important; font-weight:bold;">
          <input type="hidden" id="available-price-min" name="minprice" value="@if(request()->minprice == null) 1000 @else {{ request()->minprice }} @endif">
          <input type="hidden" id="available-price-max" name="maxprice" value="@if(request()->maxprice == null) 100000000 @else {{ request()->maxprice }} @endif">
          <div id="mySlider"></div>
        </ul>
    </div>
  </div>

  <div class="tt-collapse">
    <h3 class="tt-collapse-title">{{ __('app-shop-2-category.filterType') }}</h3>
    <div class="tt-collapse-content">
      <div class="btn-group btn-group-toggle mb-4 flex-wrap" data-toggle="buttons">
        <label id="available-filter-1" for="available-filter-1" class="sort-btn col-3 rounded btn btn-outline-secondary @if(request()->type == '') active @endif border-left-0 iranyekan crouser bg-transparent"
          style="cursor:pointer; border: 1px solid!important;">
          <input class="d-none" type="radio" name="type" value="all" id="available-filter-1" @if(request()->type == '' or request()->type == 'all') checked="" @endif> {{ __('app-shop-2-category.filterTypeItem1') }}
        </label>
        <label id="available-filter-2" for="available-filter-2"
          class="sort-btn col-3  rounded btn btn-outline-secondary border-right-0  @if(request()->type == 'product') active @endif border-left-0 iranyekan bg-transparent"
          style="cursor:pointer;border: 1px solid!important">
          <input class="d-none" type="radio" name="type" value="product" id="available-filter-2" @if(request()->type == 'product') checked="" @endif> {{ __('app-shop-2-category.filterTypeItem2') }}
        </label>
        <label id="available-filter-3" for="available-filter-3"
          class="sort-btn col-3 rounded btn btn-outline-secondary border-right-0  @if(request()->type == 'file') active @endif border-left-0 iranyekan bg-transparent"
          style="cursor:pointer;border: 1px solid!important">
          <input class="d-none" type="radio" name="type" value="file" id="available-filter-3" @if(request()->type == 'file') checked="" @endif> {{ __('app-shop-2-category.filterTypeItem3') }}
        </label>
        <label id="available-filter-4" for="available-filter-4"
          class="sort-btn col-3 rounded btn btn-outline-secondary  border-right-0  @if(request()->type == 'service') active @endif iranyekan bg-transparent"
          style="cursor:pointer; border: 1px solid!important">
          <input class="d-none" type="radio" name="type" value="service" id="available-filter-4" @if(request()->type == 'service') checked="" @endif> {{ __('app-shop-2-category.filterTypeItem4') }}
        </label>
      </div>
    </div>
  </div>

  <div class="tt-collapse">
    <h3 class="tt-collapse-title">{{ __('app-shop-2-category.filterColor') }}</h3>
    <div class="tt-collapse-content">
      <ul class="tt-options-swatch options-middle">
        @foreach ($colors as $color)
        <li>
          <a class="options-color color-filter" data-color="{{ $color->code }}" style="background-color:#{{ $color->code }}">
          </a>
        </li>
        @endforeach
        <input id="color-input" type="hidden" name="color" value="">

      </ul>
    </div>
  </div>

  <div class="tt-collapse">
    <h3 class="tt-collapse-title">{{ __('app-shop-2-category.filterBrand') }}</h3>
    <div class="tt-collapse-content">
      <ul class="tt-list-row">
        @foreach($brands as $shopBrand)
        <li><a href="{{ route('brand', ['shop'=>$shop->english_name, 'name'=>$shopBrand->id]) }}">{{ $shopBrand->name }}</a></li>
        @endforeach
      </ul>
      <div class="show-more">
        <span class="toggle-show">+ {{ __('app-shop-2-category.bishtar') }}</span>
      </div>
    </div>
  </div>

  <div class="tt-collapse">
    <h3 class="tt-collapse-title">{{ __('app-shop-2-category.filterTag') }}</h3>
    <div class="tt-collapse-content">
      <ul class="tt-list-inline">
        @foreach($shopTags as $shopTag)
        <li><a href="{{ route('tag', ['shop'=>$shop->english_name, 'name'=>$shopTag->name]) }}">{{ $shopTag->name }}</a></li>
        @endforeach
      </ul>
    </div>
  </div>

</div>
