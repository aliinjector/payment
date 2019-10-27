@extends('app.shop.layouts.master')
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
        <h2 class="line-throw line-height-none"><span>اخرین محصولات دسته بندی {{ $products[0]->productCategory()->get()->first()->name }}</span></h2>
        @else
<div class="d-flex justify-content-center align-items-center" style="height:80vh">
<h4>
    هیچ محصولی در این دسته بندی وجود ندارد

</h4>
</div>
        @endif
         <div class="row p-5">
           <div class="col-lg-3">
           <div class="card e-co-product" style="max-width: 18rem;">
             <h5 class="text-dark pr-3 border-btm font-weight-500 m-4">فیلتر بر اساس نوع کالا</h5>
               <div class="card-body d-flex justify-content-center text-primary">
                <form action="{{ route('shop.show.category', ['shop' => $shop->english_name,'categroyId' => $category]) }}" id="submit" method="get">
                 <div class="btn-group btn-group-toggle mb-4 flex-wrap" data-toggle="buttons">
                 <label id="available-filter-1" for="available-filter-1" class="border-top-down-radius-0 btn btn-outline-secondary active border-left-0 iranyekan crouser" style="cursor:pointer">
                     <input type="radio" name="type" value="all" id="available-filter-1" checked=""> همه
                 </label>
                 <label id="available-filter-2" for="available-filter-2" class="border-top-down-radius-0 btn btn-outline-secondary border-right-0 border-left-0 iranyekan" style="cursor:pointer">
                     <input type="radio" name="type" value="product" id="available-filter-2"> فیزیکی
                 </label>
                 <label id="available-filter-3" for="available-filter-3" class="border-top-down-radius-0 btn btn-outline-secondary border-right-0 border-left-0 iranyekan" style="cursor:pointer">
                     <input type="radio" name="type" value="file" id="available-filter-3"> فایل
                 </label>
                 <label id="available-filter-4" for="available-filter-4" class="border-top-down-radius-0 btn btn-outline-secondary border-right-0 iranyekan" style="cursor:pointer">
                     <input type="radio" name="type" value="service" id="available-filter-4"> خدماتی
                 </label>
             </div>
                 </div>
             </div>
           </div>


           <div class="col-lg-9 d-flex flex-wrap">
             <div class="row d-flex justify-content-center mr-2">
               <h6 class="iranyekan text-dark">مرتب سازی بر اساس :</h6>
               <div class="btn-group btn-group-toggle mb-4 flex-wrap" data-toggle="buttons">
               <label id="available-order-1" for="available-order-1" class="btn btn-outline-orange active border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold" style="cursor:pointer">
                   <input type="radio" id="available-order-1" name="orderby" value="new" id="option1" checked=""> جدید ترین ها
               </label>
               <label id="available-order-2" for="available-order-2" class="btn btn-outline-orange border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold" style="cursor:pointer">
                   <input type="radio" id="available-order-2" name="orderby" value="cheapest" id="option2"> ارزان ترین ها
               </label>
               <label id="available-order-3" for="available-order-3" class="btn btn-outline-orange border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold" style="cursor:pointer">
                   <input type="radio" id="available-order-3" name="orderby" value="expensive" id="option2 rounded"> گران ترین ها
               </label>
               <label id="available-order-4" for="available-order-4" class="btn btn-outline-orange border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold" style="cursor:pointer">
                   <input type="radio" id="available-order-4" name="orderby" value="bestselling" id="option3"> پرفروش ترین ها
               </label>
               <label id="available-order-5" for="available-order-5" class="btn btn-outline-orange border-0 rounded px-2 mx-2 iranyekan color-blue font-weight-bold" style="cursor:pointer">
                   <input type="radio" id="available-order-5" name="orderby" value="offer" id="option3"> دارای تخفیف
               </label>
           </div>
             </div>
           </form>

             <div class="row col-lg-12">

                @foreach ($products as $product)

                    <div class="col-lg-3 row">
                        <div class="card e-co-product min-height-60 col-lg-12">
                            <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}"><img src="{{ $product->image['250,250'] }}" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}" class="product-title">{{ $product->title }}</a>
                                <div class="d-flex justify-content-between my-2 byekan">
                                        @if($product->off_price != null)
                                    <p class="product-price byekan">{{  number_format($product->off_price) }} تومان  <span class="ml-2 byekan"></span><span class="ml-2"><del>{{  number_format($product->price) }} تومان</del></span>
                                    </p>
                                    @else
                                    <p class="product-price byekan">{{  number_format($product->price) }} تومان  <span class="ml-2 byekan"></span>
                                        @endif

                                </div>
                                @if(\Auth::user())


                                  <form action="{{ route('cart.add', ['shop'=>$shop->english_name, 'userID'=> \Auth::user()->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> @if($product->type == 'file') دریافت فایل  @else اضافه به سبد خرید @endif</button>
                                    </form>

                        @endif
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    @endforeach
                  <div class="col-lg-12 d-flex justify-content-center">
                      {!! $products->render() !!}
                  </div>
                  </div>

                  </div>


                </div>

    <!-- container -->



</div>
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
      setInterval("$('#submit').submit()",100);
    });
    $('#available-filter-2').click(function() {
        setInterval("$('#submit').submit()",100);
    });
    $('#available-filter-3').click(function() {
      setInterval("$('#submit').submit()",100);
    });
    $('#available-filter-4').click(function() {
      setInterval("$('#submit').submit()",100);
    });
    $('#available-order-1').click(function() {
      setInterval("$('#submit').submit()",100);
    });
    $('#available-order-2').click(function() {
      setInterval("$('#submit').submit()",100);
    });
    $('#available-order-3').click(function() {
      setInterval("$('#submit').submit()",100);
    });
    $('#available-order-4').click(function() {
      setInterval("$('#submit').submit()",100);
    });
    $('#available-order-5').click(function() {
      setInterval("$('#submit').submit()",100);
    });

}); </script>
@endsection
