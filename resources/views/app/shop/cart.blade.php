@extends('app.shop.layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
          @if(isset($products))

            <div class="card-body font-18">
                <h4 class="header-title mt-0">سبد خرید </h4>
                <p class="mb-4 text-muted">لیست محصولات سبد خرید.</p>
                <div class="table-responsive shopping-cart">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>محصول</th>
                                <th>قیمت واحد کالا</th>
                                <th>میزان تخفیف</th>
                                <th>تعداد</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody class="">

                        <form  action="{{ route('purchaseList',['shop'=>$shop->english_name, 'userID' => \Auth::user()->id]) }}" method="post">
                          @csrf
                            @foreach ($products as $product)
                            <tr>
                                <td><img src="{{ $product->image['80,80'] }}" alt="" height="52">
                                    <p class="d-inline-block align-middle mb-0"><a href="" class="d-inline-block align-middle mb-0 product-name">{{ $product->title }}</a>
                                        <br><span class="text-muted font-13">رنگ قرمز</span></p>
                                </td>
                                <td>{{ number_format($product->price) }} تومان </td>
                                <td> @if(isset($discountedPrice)){{ number_format($voucherDiscount) }} @elseif($product->off_price == null) 0 @else {{ number_format($product->price-$product->off_price)}} @endif </td>
                                <td>

                                                <select class="form-control col-lg-5 p-1" autocomplete="off" tabindex="-1" name="{{ $product->id }}">
                                                  <option value="1">۱</option>
                                                  <option value="2">۲</option>
                                                  <option value="3">۳</option>
                                                  <option value="4">۴</option>
                                                  <option value="5">۵</option>
                                                </select>

                                </td>

                                <td>
                                    <a href="" class="text-danger" id="removeProduct" data-cart="{{ \Auth::user()->cart()->get()->first()->id }}" data-id="{{ $product->id }}"><i class="mdi mdi-close-circle-outline font-18"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="d-flex input-group-append justify-content-end">
                    <button type="submit" class="btn bg-blue-omid mt-4 text-white rounded">ثبت و ادامه</button>
                  </form>

                    </div>

                <!--end row-->
            </div>
          @else

            <h4 class="d-flex justify-content-center p-4">محصولی در سبد خرید شما وجود ندارد</h4>

          @endif

            <!--end card-->
        </div>
        <!--end card-body-->
    </div>
    <!--end col-->
</div>


</div>
@endsection
@section('pageScripts')
<script>
    $(document).on('click', '#removeProduct', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var cart = $(this).data('cart');
        swal("آیا اطمینان دارید؟", {
                dangerMode: true,
                buttons: ["انصراف", "حذف"],

            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "{{url('user-cart/remove')}}",
                        data: {
                            id: id,
                            cart: cart,
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
@include('sweet::alert')
@stop
