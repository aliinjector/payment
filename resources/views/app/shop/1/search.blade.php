@extends('app.shop.1.layouts.master')
@section('content')
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
@if(isset($products[0]))
        @else
<div class="d-flex justify-content-center align-items-center" style="height:80vh">
<h4>
محصولی یافت نشد
</h4>
</div>
        @endif
         <div class="row p-5">
           <div class="col-lg-3">
           <div class="card e-co-product" style="max-width: 18rem;">
             <h5 class="text-dark pr-3 border-btm font-weight-500 m-4">فیلتر بر اساس نوع کالا</h5>
               <div class="card-body d-flex justify-content-center text-primary">
                <form action="{{ route('tag', ['shop' => $shop->english_name,'name' => $tagName]) }}" id="submit" method="get">
                 <div class="btn-group btn-group-toggle mb-4 flex-wrap" data-toggle="buttons">
                 <label id="available-filter-1" for="available-filter-1" class="border-top-down-radius-0 btn btn-outline-secondary @if(request()->type == '') active @endif border-left-0 iranyekan crouser" style="cursor:pointer">
                     <input type="radio" name="type" value="all" id="available-filter-1" @if(request()->type == 'all') checked="" @endif> همه
                 </label>
                 <label id="available-filter-2" for="available-filter-2" class="border-top-down-radius-0 btn btn-outline-secondary border-right-0  @if(request()->type == 'product') active @endif border-left-0 iranyekan" style="cursor:pointer">
                     <input type="radio" name="type" value="product" id="available-filter-2" @if(request()->type == 'product') checked="" @endif> فیزیکی
                 </label>
                 <label id="available-filter-3" for="available-filter-3" class="border-top-down-radius-0 btn btn-outline-secondary border-right-0  @if(request()->type == 'file') active @endif border-left-0 iranyekan" style="cursor:pointer">
                     <input type="radio" name="type" value="file" id="available-filter-3" @if(request()->type == 'file') checked="" @endif> فایل
                 </label>
                 <label id="available-filter-4" for="available-filter-4" class="border-top-down-radius-0 btn btn-outline-secondary  border-right-0  @if(request()->type == 'service') active @endif iranyekan" style="cursor:pointer">
                     <input type="radio" name="type" value="service" id="available-filter-4" @if(request()->type == 'service') checked="" @endif> خدماتی
                 </label>
             </div>
                 </div>
             </div>
           </div>

           <div class="col-lg-9 d-flex flex-wrap">
             <div class="row d-flex justify-content-center mr-2">
               <h6 class="iranyekan text-dark">مرتب سازی بر اساس :</h6>
               <div class="btn-group btn-group-toggle mb-4 flex-wrap" data-toggle="buttons">
               <label id="available-order-1" for="available-order-1" class="btn btn-outline-orange  @if(request()->sortBy['field'] == '' or request()->sortBy['field'] == 'created_at')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold" style="cursor:pointer">
                   <input type="radio" class="available-order-1" id="available-order-1" name="sortBy[field]" value="created_at" @if(request()->sortBy['field'] == '' or request()->sortBy['field'] == 'created_at') checked="" @endif> جدید ترین ها
                   <input type="radio" class="available-order-1" name="sortBy[orderBy]" value="desc" checked="">
               </label>
               <label id="available-order-2" for="available-order-2" class="btn btn-outline-orange @if(request()->sortBy['field'] == 'price'  and request()->sortBy['orderBy'] == 'asc')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold" style="cursor:pointer">
                   <input type="radio" class="available-order-2" id="available-order-2" name="sortBy[field]" value="price" @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'asc') checked="" @endif> ارزان ترین ها
                   <input type="radio" class="available-order-2" name="sortBy[orderBy]" value="asc">
               </label>
               <label id="available-order-3" for="available-order-3" class="btn btn-outline-orange  @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'desc')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold" style="cursor:pointer">
                   <input type="radio" class="available-order-3" id="available-order-3" name="sortBy[field]" value="price" @if(request()->sortBy['field'] == 'price' and request()->sortBy['orderBy'] == 'desc') checked="" @endif> گران ترین ها
                   <input type="radio" class="available-order-3" name="sortBy[orderBy]" value="desc">
               </label>
               <label id="available-order-4" for="available-order-4" class="btn btn-outline-orange @if(request()->sortBy['field'] == 'buyCount')  active @endif border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold" style="cursor:pointer">
                   <input type="radio" class="available-order-4" id="available-order-4" name="sortBy[field]" value="buyCount" @if(request()->sortBy['field'] == 'buyCount') checked="" @endif> پرفروش ترین ها
                   <input type="radio" class="available-order-4" name="sortBy[orderBy]" value="desc">
               </label>

           </div>
             </div>
           </form>
           <div class="row col-lg-12">

                @foreach ($products as $product)

                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}"><img src="{{ $product->image['250,250'] }}" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}" class="product-title">{{ $product->title }}</a>
                                <div class="d-flex justify-content-between my-2 byekan">
                                    <p class="product-price byekan">{{  number_format($product->price) }} تومان  <span class="ml-2 byekan"></span></p>

                                </div>
                                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}">
                                    <a target="_blank" href="{{ route('compare', ['shop'=>$shop->english_name]) }}"><i style="color: #15939D;float: left;font-size: 18px;margin-top: 6px;" class="fa fa-balance-scale"></i></a>
                                    <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> خرید </button>
                            </a>

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    @endforeach
                    <div class="col-lg-12 d-flex justify-content-center">
                        {{-- {!! $products->render() !!} --}}
                    </div>
                    </div>

                    </div>

                  </div>


@endsection
@section('pageScripts')
  <script type="text/javascript">
  $(document).ready(function() {
      $('#available-filter-1').click(function() {
        setInterval("$('#submit').submit()",700);
      });
      $('#available-filter-2').click(function() {
          setInterval("$('#submit').submit()",700);
      });
      $('#available-filter-3').click(function() {
        setInterval("$('#submit').submit()",700);
      });
      $('#available-filter-4').click(function() {
        setInterval("$('#submit').submit()",700);
      });
      $('#available-order-1').click(function() {
        $('.available-order-1').attr('checked', true);
        setInterval("$('#submit').submit()",700);
      });
      $('#available-order-2').click(function() {
        $('.available-order-2').attr('checked', true);
        setInterval("$('#submit').submit()",700);
      });
      $('#available-order-3').click(function() {
        $('.available-order-3').attr('checked', true);
        setInterval("$('#submit').submit()",700);
      });
      $('#available-order-4').click(function() {
        $('.available-order-4').attr('checked', true);
        setInterval("$('#submit').submit()",700);
      });
  });
  </script>
@stop
