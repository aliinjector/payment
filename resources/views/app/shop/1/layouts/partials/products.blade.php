@extends('app.shop.1.layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/app/shop/1/assets/css/category.css') }}" />
<style media="screen">
  .off-btn{
    position: relative;bottom: 28px;
  }
  .btn-off-price{
    bottom:10px;
  }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div>
              @if($errors->any())
              <div class="alert alert-danger p-5">
                 <p><strong>متاسفانه خطایی پیش آمده:</strong></p>
                 <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                 </ul>
              </div>
              @endif
            </div>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
<div class="row">
    <div class="col-sm-12">
      <div class="col-sm-3 mt-3">
          <form class="card card-sm" action="{{ route('search', $shop->english_name) }}" method="post">
              @csrf
              <div class="card-body row no-gutters align-items-center">
                  <div class="col-auto">
                      <i style="color: #F68712!important;" class="fas fa-search h4 text-body"></i>
                  </div>
                  <!--end of col-->
                  <div class="col">
                      <input class="form-control form-control-lg form-control-borderless" name="queryy" type="search" placeholder="{{ __('app-shop-1-index.searchPlaceholder') }}...">
                  </div>
                  <!--end of col-->
                  <div class="col-auto">
                      <button class="btn bg-blue-omid text-white rounded" type="submit">{{ __('app-shop-1-index.jostojoo') }}</button>
                  </div>
                  <!--end of col-->
              </div>
          </form>
          <!--end page-title-box-->
      </div>
        <div class="page-title-box">
            <h4 class="page-title iranyekan">{{ __('app-shop-1-category.forooshgah') }} {{ substr($shop->name, 0, 100) }}</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
</div>
<h2 class="line-throw line-height-none"><span> @if(\Request::route()->getName() == 'category'){{ __('app-shop-1-category.mahsoolatDasteBandi') }} {{ $category->name }} @elseif(\Request::route()->getName() == 'tag') محصولات تگ {{ $tag->name }}  @else محصولات برند {{ $brand->name }} @endif</span></h2>
<div class="row p-5">

    @include('app.shop.1.layouts.partials.filtering')
    <div class="col-lg-9">

      @include('app.shop.1.layouts.partials.ordering')

        </form>
        <div class="row col-lg-12 {{ $products->count() == null ? 'd-flex justify-content-center mt-4' : '' }}">
            @if($products->count() != null)

                @foreach ($productsPaginate->where('status', 'enable') as $product)
                  @php
                  $stringCut = substr($product->title, 0, 25);
                  $endPoint = strrpos($stringCut, ' ');
                  //if the string doesn't contain any space then it will cut without word basis.
                  $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                  $string .= '...';

                  @endphp
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3 row">
                    <div class="card e-co-product min-height-60 col-lg-12">
                        <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}"><img src="{{ $product->image['250,250'] }}" alt="" class="img-fluid"></a>
                        <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}" class="product-title">{{ strlen($product->title) >= 25 != 0 ? $string :  $product->title }} </a>

                            <div class="d-flex justify-content-between my-2 byekan">
                                @if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now())
                                    <p class="product-price mb-5 byekan">{{ number_format($product->off_price) }} <span class="text-dark">{{ __('app-shop-1-category.tooman') }}</span> <span class="ml-2 byekan"></span>
                                      <br />
                                      <span class="ml-2"><del class="byekan font-16">{{ number_format($product->price) }} <span class="text-dark">{{ __('app-shop-1-category.tooman') }}</span></del></span>
                                    </p>
                                    @else
                                    <p class="product-price mb-5 byekan min-width-se" style="width: 200px;z-index:100000">{{ number_format($product->price) }} <span class="text-dark">{{ __('app-shop-1-category.tooman') }} </span><span class="ml-2 byekan"></span>
                                        @endif
                            </div>
                            {{-- <ul class="tt-options-swatch options-middle">
                              @php
                              $i = 0;
                               @endphp
                              @foreach($product->colors as $color)
              								<li class="color-sel color-select {{ $i == 0 ? 'active' : '' }}">
              									<a class="options-color p-3 border" data-color="{{ $color->id }}" style="background-color:#{{ $color->code }}; height:auto; width:20px" >
              									</a>
              								</li>
                              @php
                              $i ++;
                               @endphp
              								@endforeach
              							</ul> --}}
                            <form action="{{ route('compare.store', ['shop'=>$shop->english_name]) }}" method="post" id="compareForm{{ $product->id }}">
                                @csrf
                                <a href="javascript:{}" title="افزودن به مقایسه" onclick="document.getElementById('compareForm{{ $product->id }}').submit();"   data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" @if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now()) class="fa fa-balance-scale off-btn" @else class="fa fa-balance-scale"  @endif></i></a>
                                  <input type="hidden" name="productID" value="{{ $product->id }}">
                            </form>
                            <form action="{{ route('wishlist.store', ['shop'=>$shop->english_name]) }}" method="post" id="wishlistForm{{ $product->id }}">
                                @csrf
                                <input type="hidden" name="productID" value="{{ $product->id }}">

                              <a href="javascript:{}" title="افزودن به علاقه مندی ها" onclick="document.getElementById('wishlistForm{{ $product->id }}').submit();" data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #F68712;float: left;font-size: 18px;margin-top: 6px;" @if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now()) class="fas fa-heart m-2 off-btn" @else class="fas fa-heart m-2" @endif></i></a>
                            </form>

                            @if(\Auth::user())
                            <button type="submit" @if($product->off_price != null and $product->off_price_started_at < now() and $product->off_price_expired_at > now()) class="btn btn-cart btn-sm waves-effect waves-light iranyekan  p-2 px-2 mt-n5 btn-off-price" @else class="btn btn-cart btn-sm waves-effect waves-light iranyekan  p-2 px-2"  @endif><i class="mdi mdi-cart mr-1"></i>
                              <a href="{{ route('product', ['shop'=>$shop->english_name, 'slug'=>$product->slug, 'id' => $product->id]) }}" class="text-white">
                                  مشاهده محصول
                                </a>
                                 </button>

                            @endif
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                @endforeach
                @else
                <h5 class="byekan text-danger" style="font-size: 30px!important">{{ __('app-shop-1-category.noProduct') }} !!</h5>
                @endif
                <div class="col-lg-12 d-flex justify-content-center">
                    {!! $productsPaginate->render() !!}
                </div>
        </div>
    </div>
</div>

@endsection
@section('pageScripts')
  <script src="{{ asset('/app/shop/1/assets/js/category.js') }}"></script>
  <link rel="stylesheet" href="/app/shop/1/assets/css/jquery-ui.css" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <link type="text/css" href="jquery.ui.slider-rtl.css" rel="stylesheet">
  <script src="/app/shop/1/assets/js/jquery-ui.js"></script>
  <script src="/app/shop/1/assets/js/jquery.ui.slider-rtl.js"></script>
  <script>
  $(document).ready(function() {
      $("#mySlider").slider({isRTL: true, range: true,
          min: {{ $minPriceProduct }},
          max: {{ $maxPriceProduct }},
          values: [@if(request()->minprice != null){{request()->minprice}} @else {{ $minPriceProduct }} @endif, @if(request()->maxprice != null){{request()->maxprice}} @else {{ $maxPriceProduct }} @endif],
          slide: function(event, ui) {
            if(isNaN(ui.values[0]) == true || isNaN(ui.values[1]) == true){
              $("#available-price-1").val(" از " + min + " تومان " + " - " + " تا " + max + " تومان ");
              $("#available-price-min").val(min);
              $("#available-price-max").val(max);
            }
            else{
              $("#available-price-1").val(" از " +  ui.values[0]  + " تومان " + " - " + " تا " + ui.values[1] + " تومان ");
              $("#available-price-min").val(ui.values[0]);
              $("#available-price-max").val(ui.values[1]);
            }
          }
      });
      if(isNaN($("#mySlider").slider("values", 0)) == true || isNaN($("#mySlider").slider("values", 1)) == true){
        $("#available-price-1").val(" از " + min + " تومان " + " - " + " تا " + max + " تومان ");
      }
      else{
        $("#available-price-1").val(" از "+ $("#mySlider").slider("values", 0).toLocaleString('en') + " تومان " +
            " - " + " تا " + $("#mySlider").slider("values", 1).toLocaleString('en') + " تومان ");
      }
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function() {
$('li.color-sel').click(function() {
  $(this).siblings("li").removeClass('active');
  $(this).addClass('active');
});
});
  </script>

  <script>
  if ($("#color-selection").length == 0){
  if ($("li.color-select").hasClass("active")) {
    var colorId = $("li.color-select > a").data('color');
   $("button.btn-add-to-cart").filter("[data-col='true']").append('<input type="hidden" id="color-selection" name="color" value="'+colorId+'">');
  }
  }

  //when the Add Field button is clicked
  $('.options-color').on('click', function() {
    var colorId = $(this).data('color');
  //Append a new row of code to the "#items" div
  if ($("#color-selection").length > 0){
    $("#color-selection").remove();
  }
    $("button.btn-add-to-cart").append('<input type="hidden" id="color-selection" name="color" value="'+colorId+'">');
  });

  </script>
  <script type="text/javascript">
  if ($('.ty-compact-list').length > 10) {
      $('.ty-compact-list:gt(10)').hide();
      $('.show-more').show();
  }

  $('.show-more').on('click', function() {
      //toggle elements with class .ty-compact-list that their index is bigger than 2
      $('.ty-compact-list:gt(10)').toggle();
      //change text of show more element just for demonstration purposes to this demo
      $(this).text() !== 'بستن' ? $(this).text('بستن') : $(this).text('موارد بیشتر');
  });

</script>

@endsection
