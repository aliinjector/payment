@extends('app.shop.layouts.master')
@section('content')
<link rel="stylesheet" href="/app/shop/assets/css/jquery-ui.css" />
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
            <h4 class="page-title iranyekan">فروشگاه {{ $shop->name }}</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
</div>
@if($products->count() == null)
<div class="d-flex justify-content-center align-items-center" style="height:80vh">
    <div class="col-12 row">
      <div class="col-6">
        @include('app.shop.layouts.filtering')
      </div>
      <div class="col-6">
        <h4>
            هیچ محصولی در این دسته بندی وجود ندارد
        </h4>
      </div>
    </div>
</div>
@else
<h2 class="line-throw line-height-none"><span> محصولات دسته بندی</span></h2>
<div class="row p-5">
@include('app.shop.layouts.filtering')
<div class="col-lg-9">
    <div class="row d-flex mr-2">
        <h6 class="iranyekan text-dark">مرتب سازی بر اساس :</h6>
        <div class="btn-group btn-group-toggle mb-4 flex-wrap d-inline" data-toggle="buttons">
            <label id="available-order-1" for="available-order-1"
              class="btn btn-outline-orange  @if(request()->sortBy['field'] == '' or request()->sortBy['field'] == 'created_at')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
              style="cursor:pointer">
                <input type="radio" class="available-order-1" id="available-order-1" name="sortBy[field]" value="created_at" @if(request()->sortBy['field'] == '' or request()->sortBy['field'] == 'created_at') checked="" @endif> جدید
                    ترین ها
                    <input type="radio" class="available-order-1" name="sortBy[orderBy]" value="desc" checked="">
            </label>
            <label id="available-order-2" for="available-order-2"
              class="btn btn-outline-orange @if(request()->sortBy['field'] == 'price'  and request()->sortBy['orderBy'] == 'asc')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
              style="cursor:pointer">
                <input type="radio" class="available-order-2" id="available-order-2" name="sortBy[field]" value="price" @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'asc') checked="" @endif> ارزان
                    ترین ها
                    <input type="radio" class="available-order-2" name="sortBy[orderBy]" value="asc">
            </label>
            <label id="available-order-3" for="available-order-3"
              class="btn btn-outline-orange  @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'desc')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
              style="cursor:pointer">
                <input type="radio" class="available-order-3" id="available-order-3" name="sortBy[field]" value="price" @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'desc') checked="" @endif> گران
                    ترین ها
                    <input type="radio" class="available-order-3" name="sortBy[orderBy]" value="desc">
            </label>
            <label id="available-order-4" for="available-order-4" class="btn btn-outline-orange @if(request()->sortBy['field'] == 'buyCount')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold"
              style="cursor:pointer">
                <input type="radio" class="available-order-4" id="available-order-4" name="sortBy[field]" value="buyCount" @if(request()->sortBy['field'] == 'buyCount') checked="" @endif> پرفروش ترین ها
                    <input type="radio" class="available-order-4" name="sortBy[orderBy]" value="desc">
            </label>
        </div>
    </div>
    </form>
    <div class="row col-lg-12">
        @foreach ($productsPaginate as $product)
        <div class="col-lg-3 row">
            <div class="card e-co-product min-height-60 col-lg-12">
                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}"><img src="{{ $product->image['250,250'] }}" alt="" class="img-fluid"></a>
                <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}" class="product-title">{{ $product->title }}</a>
                    <div class="d-flex justify-content-between my-2 byekan">
                        @if($product->off_price != null)
                            <p class="product-price byekan">{{ number_format($product->off_price) }} تومان <span class="ml-2 byekan"></span><span class="ml-2"><del class="byekan font-16">{{ number_format($product->price) }} تومان</del></span>
                            </p>
                            @else
                            <p class="product-price byekan">{{ number_format($product->price) }} تومان <span class="ml-2 byekan"></span>
                                @endif
                    </div>
                    <a target="_blank" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                @if(\Auth::user())
                    <form action="{{ route('user-cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i>
                            @if($product->type == 'file') دریافت فایل
                                @else اضافه به سبد خرید
                                @endif</button>
                    </form>
                    @endif
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        @endforeach
        <div class="col-lg-12 d-flex justify-content-center">
            {!! $productsPaginate->render() !!}
        </div>
    </div>
</div>
</div>
@endif

@endsection
@section('pageScripts')
<script>
    $(document).on('click', '#ttttt', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var test = $(this).data('test');
        $.ajax({
            type: "post",
            url: "{{url('dashboard/product-category/delete')}}",
            data: {
                id: id,
                test: test,
                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
            },
            success: function(data) {
                var url = document.location.origin + "/dashboard/product-category";
                location.href = url;
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#available-filter-1').click(function() {
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-filter-2').click(function() {
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-filter-3').click(function() {
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-filter-4').click(function() {
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-order-1').click(function() {
            $('.available-order-1').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-order-2').click(function() {
            $('.available-order-2').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-order-3').click(function() {
            $('.available-order-3').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-order-4').click(function() {
            $('.available-order-4').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-price-min').click(function() {
            $('.available-price-min').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
        $('#mySlider').click(function() {
            $('.available-price-max').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
    });
</script>
<script src="/app/shop/assets/js/jquery-ui.js"></script>
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
<script>
   $(function() {

     $('.list-group-item').on('click', function() {
       $('.glyphicon', this)
         .toggleClass('glyphicon-chevron-right')
         .toggleClass('glyphicon-chevron-down');
     });

   });
</script>
@endsection
