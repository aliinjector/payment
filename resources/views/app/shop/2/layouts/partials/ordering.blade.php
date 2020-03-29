<div class="tt-filters-options" id="js-tt-filters-options">
  <h1 class="tt-title">@if(isset($category)) {{ $category->name }} @elseif(isset($tag)) {{ $tag->name }} @else {{ $brand->name }} @endif <span class="tt-title-total byekan">({{ $products->where('status', 'enable')->count() }})</span></h1>
  <div class="tt-btn-toggle"><a href="#">{{ __('app-shop-2-category.filter') }}</a></div>
  <div class="tt-sort d-flex">
    <select class="available-filter-1" name="sortBy[field]">
      <option value="created_at|desc" @if(request()->sortBy['field'] == 'created_at|desc') selected @endif>{{ __('app-shop-2-category.jadidtarinHa') }}</option>
      <option value="buyCount|desc" @if(request()->sortBy['field'] == 'buyCount|desc') selected @endif>{{ __('app-shop-2-category.porfrooshTarinHa') }}</option>
      <option value="price|asc" @if(request()->sortBy['field'] == 'price|asc') selected @endif>{{ __('app-shop-2-category.arzanTarinHa') }}</option>
      <option value="price|desc" @if(request()->sortBy['field'] == 'price|desc') selected @endif>{{ __('app-shop-2-category.geraanTarinHa') }}
      </option>
    </select>
    </form>
  </div>
  <div class="tt-quantity">
    <a href="#" class="tt-col-one" data-value="tt-col-one"></a>
    <a href="#" class="tt-col-two" data-value="tt-col-two"></a>
    <a href="#" class="tt-col-three" data-value="tt-col-three"></a>
    <a href="#" class="tt-col-four" data-value="tt-col-four"></a>
    <a href="#" class="tt-col-six" data-value="tt-col-six"></a>
  </div>
</div>
