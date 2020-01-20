@extends('app.shop.1.layouts.master')
@section('content')
<link rel="stylesheet" href="/app/shop/1/assets/css/jquery-ui.css" />
<style>
    .just-padding {
        padding: 15px;
    }

    .list-group.list-group-root {
        padding: 0;
        overflow: hidden;
    }

    .list-group.list-group-root .list-group {
        margin-bottom: 0;
    }

    .list-group.list-group-root .list-group-item {
        border-radius: 0;
        border-width: 1px 0 0 0;
    }

    .list-group.list-group-root>.list-group-item:first-child {
        border-top-width: 0;
    }

    .list-group.list-group-root>.list-group>.list-group-item {
        padding-left: 30px;
    }

    .list-group.list-group-root>.list-group>.list-group>.list-group-item {
        padding-left: 45px;
    }

    .list-group-item .glyphicon {
        margin-right: 5px;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title iranyekan">{{ __('app-shop-1-category.forooshgah') }} {{ $shop->name }}</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
</div>

<h2 class="line-throw line-height-none"><span> {{ __('app-shop-1-category.mahsoolatDasteBandi') }}</span></h2>
<div class="row p-5">
    @include('app.shop.1.layouts.partials.filtering')
    <div class="col-lg-9">
        <div class="row d-flex mr-2">
            <h6 class="iranyekan text-dark">{{ __('app-shop-1-category.moratabSaziBaraasaase') }} :</h6>
            <div class="btn-group btn-group-toggle mb-4 flex-wrap d-inline" data-toggle="buttons">
                <label id="available-order-1" for="available-order-1"
                  class="btn btn-outline-orange  @if(request()->sortBy['field'] == '' or request()->sortBy['field'] == 'created_at')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
                  style="cursor:pointer">
                    <input type="radio" class="available-order-1" id="available-order-1" name="sortBy[field]" value="created_at" @if(request()->sortBy['field'] == '' or request()->sortBy['field'] == 'created_at') checked="" @endif>
                      {{ __('app-shop-1-category.jadidTarinha') }}
                        <input type="radio" class="available-order-1" name="sortBy[orderBy]" value="desc" checked="">
                </label>
                <label id="available-order-2" for="available-order-2"
                  class="btn btn-outline-orange @if(request()->sortBy['field'] == 'price'  and request()->sortBy['orderBy'] == 'asc')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
                  style="cursor:pointer">
                    <input type="radio" class="available-order-2" id="available-order-2" name="sortBy[field]" value="price" @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'asc') checked="" @endif>
                      {{ __('app-shop-1-category.arzaanTarinha') }}
                        <input type="radio" class="available-order-2" name="sortBy[orderBy]" value="asc">
                </label>
                <label id="available-order-3" for="available-order-3"
                  class="btn btn-outline-orange  @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'desc')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
                  style="cursor:pointer">
                    <input type="radio" class="available-order-3" id="available-order-3" name="sortBy[field]" value="price" @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'desc') checked="" @endif>
                      {{ __('app-shop-1-category.geraanTarinha') }}
                        <input type="radio" class="available-order-3" name="sortBy[orderBy]" value="desc">
                </label>
                <label id="available-order-4" for="available-order-4" class="btn btn-outline-orange @if(request()->sortBy['field'] == 'buyCount')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
                  style="cursor:pointer">
                    <input type="radio" class="available-order-4" id="available-order-4" name="sortBy[field]" value="buyCount" @if(request()->sortBy['field'] == 'buyCount') checked="" @endif> {{ __('app-shop-1-category.porFrooshTarinha') }}
                        <input type="radio" class="available-order-4" name="sortBy[orderBy]" value="desc">
                </label>
            </div>
        </div>
        </form>
        <div class="row col-lg-12 {{ $products->count() == null ? 'd-flex justify-content-center mt-4' : '' }}">
            @if($products->count() != null)
                @foreach ($productsPaginate as $product)
                <div class="col-lg-3 row">
                    <div class="card e-co-product min-height-60 col-lg-12">
                        <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}"><img src="{{ $product->image['250,250'] }}" alt="" class="img-fluid"></a>
                        <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}" class="product-title">{{ $product->title }}</a>
                            <div class="d-flex justify-content-between my-2 byekan">
                                @if($product->off_price != null)
                                    <p class="product-price byekan">{{ number_format($product->off_price) }} {{ __('app-shop-1-category.tooman') }} <span class="ml-2 byekan"></span><span class="ml-2"><del class="byekan font-16">{{ number_format($product->price) }} {{ __('app-shop-1-category.tooman') }}</del></span>
                                    </p>
                                    @else
                                    <p class="product-price byekan">{{ number_format($product->price) }} {{ __('app-shop-1-category.tooman') }} <span class="ml-2 byekan"></span>
                                        @endif
                            </div>
                            <form action="{{ route('compare.store', ['shop'=>$shop->english_name, 'productID'=>$product->id]) }}" method="post" id="compareForm{{ $product->id }}">
                                @csrf
                                <a href="javascript:{}" onclick="document.getElementById('compareForm{{ $product->id }}').submit();"  data-tooltip="{{ __('app-shop-2-category.afzoodanBeMoghayese') }}" data-tposition="left"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                            </form>
                            @if(\Auth::user())
                            <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                                    @if($product->type == 'file'){{ __('app-shop-1-category.daryafteFile') }}
                                        @else {{ __('app-shop-1-category.addToCart') }}
                                        @endif</button>
                            </form>
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
  <script src="/app/shop/1/assets/js/jquery-ui.js"></script>
  <script>
  $(document).ready(function() {
      $("#mySlider").slider({
          range: true,
          min: 1000,
          max: 100000000,
          values: [@if(request()->minprice != null){{request()->minprice}} @else 1000 @endif, @if(request()->maxprice != null){{request()->maxprice}} @else 100000000 @endif],
          slide: function(event, ui) {
            if(isNaN(ui.values[0]) == true || isNaN(ui.values[1]) == true){
              $("#available-price-1").val(" از " +  1000  + " تومان " + " - " + " تا " + 100000000 + " تومان ");
              $("#available-price-min").val(1000);
              $("#available-price-max").val(100000000);
            }
            else{
              $("#available-price-1").val(" از " +  ui.values[0]  + " تومان " + " - " + " تا " + ui.values[1] + " تومان ");
              $("#available-price-min").val(ui.values[0]);
              $("#available-price-max").val(ui.values[1]);
            }
          }
      });
      if(isNaN($("#mySlider").slider("values", 0)) == true || isNaN($("#mySlider").slider("values", 1)) == true){
        $("#available-price-1").val(" از " +  1000  + " تومان " + " - " + " تا " + 100000000 + " تومان ");
      }
      else{
        $("#available-price-1").val(" از "+ $("#mySlider").slider("values", 0) + " تومان " +
            " - " + " تا " + $("#mySlider").slider("values", 1) + " تومان ");
      }
  });
  </script>

@endsection
