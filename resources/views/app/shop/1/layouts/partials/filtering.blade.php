<div class="@if($products->count() == null) col-lg-12 @else col-lg-3 @endif">
    <div class="card e-co-product" style="max-width: 18rem;">
        <h5 class="text-dark pr-3 border-btm font-weight-500 m-4">فیلتر بر اساس نوع کالا</h5>
        <div class="card-body d-flex justify-content-center text-primary">
            <form action="{{ route('category', ['shop' => $shop->english_name,'categroyId' => $category]) }}" id="submit" method="get">
                <div class="btn-group btn-group-toggle mb-4 flex-wrap" data-toggle="buttons">
                    <label id="available-filter-1" for="available-filter-1" class="border-top-down-radius-0 btn btn-outline-secondary @if(request()->type == '') active @endif border-left-0 iranyekan crouser" style="cursor:pointer">
                        <input type="radio" name="type" value="all" id="available-filter-1" @if(request()->type == '' or request()->type == 'all') checked="" @endif> همه
                    </label>
                    <label id="available-filter-2" for="available-filter-2" class="border-top-down-radius-0 btn btn-outline-secondary border-right-0  @if(request()->type == 'product') active @endif border-left-0 iranyekan"
                      style="cursor:pointer">
                        <input type="radio" name="type" value="product" id="available-filter-2" @if(request()->type == 'product') checked="" @endif> فیزیکی
                    </label>
                    <label id="available-filter-3" for="available-filter-3" class="border-top-down-radius-0 btn btn-outline-secondary border-right-0  @if(request()->type == 'file') active @endif border-left-0 iranyekan"
                      style="cursor:pointer">
                        <input type="radio" name="type" value="file" id="available-filter-3" @if(request()->type == 'file') checked="" @endif> فایل
                    </label>
                    <label id="available-filter-4" for="available-filter-4" class="border-top-down-radius-0 btn btn-outline-secondary  border-right-0  @if(request()->type == 'service') active @endif iranyekan"
                      style="cursor:pointer">
                        <input type="radio" name="type" value="service" id="available-filter-4" @if(request()->type == 'service') checked="" @endif> خدماتی
                    </label>
                </div>
                <h5 class="text-dark pr-1 border-btm font-weight-500 m-2">فیلتر بر اساس قیمت کالا</h5>
                <input type="text" id="available-price-1" class="w-100 p-2 iranyekan font-14" style="border:0; color:#F68712 !important; font-weight:bold;">
                <input type="hidden" id="available-price-min" name="minprice" value="@if(request()->minprice == null) 1000 @else {{ request()->minprice }} @endif">
                <input type="hidden" id="available-price-max" name="maxprice" value="@if(request()->maxprice == null) 100000000 @else {{ request()->maxprice }} @endif">
                </h5>
                <div id="mySlider"></div>
        </div>
    </div>
    <div class="card p-3 align-items-start iranyekan font-15" style="max-width: 18rem;">
        <h5 class="text-dark pr-1 border-btm font-weight-500 m-2" style="width: 90%;">دسته بندی نتایج</h5>
        <div class="border-0">
            <div class="list-group list-group-root well border-0">
                @foreach($categories as $category)
                <a href="#item-{{$category->id}}" class="border-0 iranyekan p-0 py-1 @if( Request::is('*/category/'.$category->id)) font-weight-bolder text-dark @endif" data-toggle="collapse">
                <i class="fa fa-angle-left light-dark-text-color font-12 mr-2"></i>{{ $category->name }}
                </a>
                <div
                  class="list-group collapse border-0  @if( Request::is('*/category/'.$category->id)) show @elseif($category->children()->exists() and App\Http\Controllers\Shop\CategoryController::getAllSubCategories($category->id)->where('id' , (int)Request::segment(3))->count() != 0) show @endif"
                id="item-{{$category->id}}">
                @foreach ($category->children()->get() as $subCategory)
                <a @if($shop->menu_show == 'nestead_box') href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subCategory->id]) }}"
                    @else href="#item-{{$category->id}}-{{$subCategory->id}}"
                    @endif class="border-0 iranyekan dark-text-color p-2" @if($shop->menu_show != 'nestead_box') data-toggle="collapse"
                        @endif>
                            <i class="fa fa-angle-down light-dark-text-color font-12 mr-2"></i> {{ $subCategory->name}} </br>
                </a>
                <div
                  class="list-group collapse border-0 @if(App\Http\Controllers\Shop\CategoryController::getAllSubCategories($subCategory->id)->where('id' , (int)Request::segment(3))->count() != 0) show @elseif($shop->menu_show == 'nestead_box') show @endif"
                id="item-{{$category->id}}-{{$subCategory->id}}">
                @foreach ($subCategory->children()->get() as $subSubCategory)
                <a @if($shop->menu_show == 'nestead_box') href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubCategory->id]) }}"
                    @else href="#item-{{$category->id}}-{{$subCategory->id}}-{{$subSubCategory->id}}"
                    @endif class="border-0 iranyekan dark-text-color p-2 mr-5" @if($shop->menu_show != 'nestead_box') data-toggle="collapse"
                        @endif ><i class="fa fa-angle-down light-dark-text-color font-12 mr-2"></i>{{ $subSubCategory->name}}</a>
                <div
                  class="list-group collapse border-0 @if(App\Http\Controllers\Shop\CategoryController::getAllSubCategories($subSubCategory->id)->where('id' , (int)Request::segment(3))->count() != 0) show @elseif($shop->menu_show == 'nestead_box') show @endif"
                id="item-{{$category->id}}-{{$subCategory->id}}-{{$subSubCategory->id}}">
                @foreach ($subSubCategory->children()->get() as $subSubSubCategory)
                <a @if($shop->menu_show == 'nestead_box') href="{{ route('category', ['shop'=>$shop->english_name, 'categroyId'=>$subSubSubCategory->id]) }}"
                    @else href="#item-{{$category->id}}-{{$subCategory->id}}-{{$subSubCategory->id}}-{{$subSubSubCategory->id}}"
                    @endif class="border-0 iranyekan dark-text-color p-2 mr-5 pr-4" @if($shop->menu_show != 'nestead_box') data-toggle="collapse" @endif>{{ $subSubSubCategory->name}}
                </a>
                <div class="list-group collapse border-0" id="item-{{$category->id}}-{{$subCategory->id}}-{{$subSubCategory->id}}-{{$subSubSubCategory->id}}">
                    @foreach ($subSubSubCategory->children()->get() as $subSubSubSubCategory)
                    <a href="#" class="border-0 iranyekan dark-text-color p-2 mr-5  pr-5">{{ $subSubSubSubCategory->name}}
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
