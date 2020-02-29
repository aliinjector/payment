@extends('app.shop.1.layouts.master')
@section('content')

<div class="row">
    {{-- {{ dd($compareProducts) }} --}}
    <div class="col-sm-12">
        <div class="page-title-box">
        </div>
    </div>
</div>

<h2 class="line-throw"><span>مقایسه محصولات </span></h2>
@if($compareProducts->count() != null)

    <section style="direction: rtl" class="cd-products-comparison-table ">
        <header>
            <div class="actions">
            </div>
        </header>

        <div class="cd-products-table" style="overflow:initial!important;">
            <div class="features">
                <div class="top-info iranyekan">محصولات انتخاب شده</div>
                <ul class="cd-features-list">
                    @foreach($compareProducts[0]->features as $compareProductFeature)
                        <li style="list-style: none;">{{ $compareProductFeature->name }}</li>
                        @endforeach
                        <li style="list-style: none;">قیمت</li>
                </ul>
            </div>

            <div class="cd-products-wrapper">
                <ul class="cd-products-columns">
                    @foreach($compareProducts as $compareProduct)
                    <li class="product" style="list-style: none;">
                        <div class="top-info">
                            <a href="#" class="btn-link mt-3" id="removeProduct" data-shop="{{ $shop->english_name }}" data-compare="{{ \Auth::user()->compare->id }}" data-id="{{ $compareProduct->id }}"><i
                                  class="fa fa-trash font-18 p-1 my-4 text-danger"></i>
                            </a>
                            <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$compareProduct->slug]) }}"><img src="{{$compareProduct->image['250,250']}}" alt="product image" class="w-100" style="max-height:15vh">
                            </a>
                            <h3>
                                <a href="{{ route('product', ['shop'=>$shop->english_name, 'id'=>$compareProduct->slug]) }}">
                                    <div class="">
                                        {{ $compareProduct->title }}
                                    </div>
                                </a>
                            </h3>
                        </div>
                        <ul class="cd-features-list">
                            @foreach($compareProduct->features as $compareProductFeature)
                                <li style="list-style: none;">{{ $compareProductFeature->pivot->value == null ? 'تعیین نشده' : $compareProductFeature->pivot->value }} </li>
                                @endforeach
                                <li style="list-style: none;">{{ number_format($compareProduct->price) }} تومان</li>
                        </ul>
                    </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </section>
    @else
    <h5 class="byekan d-flex justify-content-center p-5 text-danger" style="font-size: 30px!important">{{ __('app-shop-1-category.noProduct') }} !!</h5>

    @endif






    @endsection
    @section('pageScripts')
    <script src="/app/shop/1/assets/js//modernizr.js"></script>
    <script src="/app/shop/1/assets/js//compare.js"></script>
    <script>
        $(document).on('click', '#removeProduct', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var compare = $(this).data('compare');
            var shop = $(this).data('shop');
            swal("آیا اطمینان دارید؟", {
                    dangerMode: true,
                    buttons: ["انصراف", "حذف"],

                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "post",
                            url: "{{url($shop->english_name.'/compare/remove')}}",
                            data: {
                                id: id,
                                compare: compare,
                                shop: shop,
                                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                            },
                            success: function(data) {
                                location.reload();

                            }
                        });
                    } else {
                        swal("متوقف شد", "عملیات شما متوقف شد :)", "error");
                    }
                });
        });
    </script>
    @stop
