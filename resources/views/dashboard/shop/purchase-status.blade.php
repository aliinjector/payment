@extends('dashboard.layouts.master')
@section('content')
<div class="card mt-4">
    <div class="card-body">
        @if($purchases->count() == 0)
            <div class="d-flex font-1-4em font-weight-bolder justify-content-around text-pink">
                متاسفانه سفارشی ثبت نشده است!!!
            </div>
            @endif
            @php $i=$purchases->count();
            @endphp
            @foreach ($purchases as $purchase)
            <div class="accordion" id="accordionExample{{$purchase->id}}">
                <div class="card border mb-0 shadow-none">
                    <div class="card-header p-0  d-flex justify-content-between align-items-center px-4 byekan" id="headingOne{{$purchase->id}}">
                        <h5 class="my-1">
                            <button class="btn btn-link text-dark collapsed byekan font-18" type="button" data-toggle="collapse" data-target="#collapseOne{{$purchase->id}}" aria-expanded="false" aria-controls="collapseOne">
                                سفارش شماره
                                @php echo $i
                                @endphp
                            </button>
                        </h5>
                        <div class="">
                            <div>
                                وضعیت سفارش : <span class="@if($purchase->status == 0) text-red @else text-green @endif">@if($purchase->status == 0) پرداخت نشده
                                    @else پرداخت شده
                                    @endif</span>
                            </div>
                            <div class="byekan mt-1">
                                {{ jdate($purchase->created_at) }}
                            </div>
                        </div>
                    </div>

                    <div id="collapseOne{{$purchase->id}}" class="collapse" aria-labelledby="headingOne{{$purchase->id}}" data-parent="#accordionExample{{$purchase->id}}" style="">
                        <div class="card-body">
                            <table class="table table-hover mb-0">
                                <thead class="thead-light">
                                    <tr class="iranyekan">
                                        <th class="border-top-0">محصول</th>
                                        <th class="border-top-0">نام</th>
                                        <th class="border-top-0">تعداد</th>
                                        <th class="border-top-0">رنگ</th>
                                        <th class="border-top-0">قیمت واحد کالا</th>
                                        <th class="border-top-0">قیمت جمع کالا</th>
                                        <th class="border-top-0">روش پرداخت</th>
                                        <th class="border-top-0">روش ارسال</th>
                                        <th class="border-top-0">خصوصیات محصول</th>
                                        <th class="border-top-0">زمان سفارش</th>
                                    </tr>
                                    <!--end tr-->
                                </thead>

                                <tbody class="font-18">
                                    @foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->cartProduct()->withTrashed()->get() as $product)
                                    <tr class="byekan">
                                        <td><a href="{{ route('product', ['shop' => $product->product()->withTrashed()->get()->first()->shop->english_name, 'slug'=>$product->product()->withTrashed()->get()->first()->slug, 'id' => $product->product()->withTrashed()->get()->first()->id]) }}" target="_blank"><img src="{{ $product->product()->withTrashed()->get()->first()->image['200,100']}}" alt="user"></a></td>
                                        <td><a href="{{ route('product', ['shop'=>$product->product()->withTrashed()->get()->first()->shop->english_name, 'slug'=>$product->product()->withTrashed()->get()->first()->slug, 'id'=>$product->product()->withTrashed()->get()->first()->id]) }}" target="_blank">{{ $product->product()->withTrashed()->get()->first()->title }}</a></td>
                                        <td>{{ $product->quantity }}</td>
                                        @if($product->color)
                                      <td>{{ $product->color->name }}</td>
                                        @else
                                          <td></td>
                                      @endif

                                        <td>{{ number_format($product->product()->withTrashed()->get()->first()->price) }}</td>
                                        <td>{{ number_format($product->total_price) }}</td>
                                        <td><span class="badge badge-pill badge-soft-primary font-15 font-weight-bolder p-3 show4">
                                                {{ $purchase->payment_method == "online_payment" ? "پرداخت آنلاین" : "پرداخت نقدی ( حضوری )" }}
                                            </span></td>
                                        <td><span class="badge badge-pill badge-soft-primary font-15 font-weight-bolder p-3 show4">
                                              @if($purchase->shipping =="quick_way")
                                                ارسال سریع
                                              @elseif($purchase->shipping =="posting_way")
                                                ارسال پستی
                                              @elseif($purchase->shipping =="person_way")
                                                دریافت حضوری
                                              @else
                                                __
                                              @endif
                                            </span></td>
                                            <td>
                                            @if($product->specification)
                                              @foreach ($shopSpecifications as $specification)
                                                @foreach ($product->specification as $specificationId)
                                                @foreach ($specification->items->where('id', $specificationId) as $item)
                                                {{ $item->specification->name }}  : {{ $item->name }} <br />
                                                @endforeach
                                                @endforeach
                                              @endforeach
                                          @endif
                                          </td>
                                        <td class="d-flex justify-content-lg-end align-items-center h-25vh" style="direction: ltr">{{ jdate($purchase->created_at) }}
                                            @if($product->product()->withTrashed()->get()->first()->type == 'file')
                                                <div class="icon-show">
                                                </div>
                                                @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                    <!--end tr-->
                                </tbody>
                            </table>
                        </div>
                        <div class="row d-flex justify-content-around p-4 text-white" style="background-color: #122272!important">
                            <div class="font-1-4em">
                                مشخصات سفارش دهنده : <br />
                                نام و نام خانوادگی : {{ $purchase->user->firstName . ' ' . $purchase->user->lastName }} <br />
                                تلفن : {{ $purchase->user->mobile }} <br />
                                آدرس : {{ $purchase->address }} <br />
                            </div>
                            <div class="font-1-4em">
                                جمع کل سفارش : <span class="byekan">{{ number_format($purchase->total_price) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php $i--
            @endphp
            @endforeach
    </div>
    <!--end card-body-->
</div>

@endsection
@section('pageScripts')
@stop
