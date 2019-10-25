@extends('app.shop.layouts.master')
@section('content')
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    {{--  <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "> دسته بندی </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>  --}}
                    <h4 class="page-title iranyekan">فروشگاه {{ $shop->name }}</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

</div>
@if(isset($products[0]))
        <h2 class="line-throw"><span>اخرین محصولات دسته بندی {{ $products[0]->productCategory()->get()->first()->name }}</span></h2>
        @else
<div class="d-flex justify-content-center align-items-center" style="height:80vh">
<h4>
    هیچ محصولی در این دسته بندی وجود ندارد

</h4>
</div>
        @endif
         <div class="row p-5">
                @foreach ($products as $product)

                    <div class="col-lg-3">
                        <div class="card e-co-product">
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
@endsection
@section('pageScripts')
@stop
