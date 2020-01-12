@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

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
                                        <th class="border-top-0">قیمت واحد کالا</th>
                                        <th class="border-top-0">قیمت جمع کالا</th>
                                        <th class="border-top-0">روش پرداخت</th>
                                        <th class="border-top-0">روش ارسال</th>
                                        <th class="border-top-0">زمان سفارش</th>
                                    </tr>
                                    <!--end tr-->
                                </thead>
                                <tbody class="font-18">
                                    @foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->products() as $product)
                                    <tr class="byekan">
                                        <td><a href="{{ route('product', ['shop'=>$product->shop->english_name, 'id'=>$product->id]) }}" target="_blank"><img src="{{ $product->image['200,100']}}" alt="user"></a></td>
                                        <td><a href="{{ route('product', ['shop'=>$product->shop->english_name, 'id'=>$product->id]) }}" target="_blank">{{ $product->title }}</a></td>
                                        <td>{{ $purchase->cart()->withTrashed()->where('user_id' , $purchase->user->id)->where('status' , 1)->get()->first()->cartProduct->where('product_id' , $product->id)->first()->quantity }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>{{ number_format($purchase->cart()->withTrashed()->where('user_id' , $purchase->user->id)->where('status' , 1)->get()->first()->cartProduct->where('product_id' , $product->id)->first()->total_price) }}</td>
                                        <td><span class="badge badge-pill badge-soft-primary font-15 font-weight-bolder p-3 show4">
                                                {{ $purchase->payment_method == "online_payment" ? "پرداخت آنلاین" : "پرداخت نقدی ( حضوری )" }}
                                            </span></td>
                                        <td><span class="badge badge-pill badge-soft-primary font-15 font-weight-bolder p-3 show4">
                                              @if($purchase->shipping =="quick_way")
                                                ارسال سریع
                                              @elseif($purchase->shipping =="posting_way")
                                                ارسال پستی
                                              @else
                                                دریافت حضوری
                                              @endif
                                            </span></td>
                                        <td class="d-flex justify-content-lg-end align-items-center h-25vh" style="direction: ltr">{{ jdate($purchase->created_at) }}
                                            @if($product->type == 'file')
                                                <div class="icon-show">
                                                    <a href="{{ route('file-download', ['shop'=>$purchase->product()->first()->shop()->first()->english_name, 'id'=>$purchase->product()->first()->id]) }}" id="downloadFile"><i
                                                          class="fa fa-download text-success mr-1 button font-15"></i>
                                                    </a>
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
<script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
@stop
