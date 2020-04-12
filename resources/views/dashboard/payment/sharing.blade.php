@extends('dashboard.layouts.master')
@section('content')

    <div class="modal fade" id="AddCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">افزودن تقسیم وجوه</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sharing.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group mb-0">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">انتخاب درگاه:</span></div>
                                <select class="form-control" val style="font-family: BYekan!important;" name="bank_id" id="">
                                    @foreach ($gateways as $gateway)
                                        <option  style="font-family: BYekan!important;" value="{{$gateway->id}}">{{ $gateway->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">شماره ملی شخص دریافت کننده:</span></div>
                                <input type="text" value="{{ old('meliCode') }}" class="form-control" name="meliCode"">
                            </div>

                            <div class="form-group mb-0 row mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">روش تسهیم:</span></div>
                                <div class="col-md-9">
                                    <div class="form-check-inline my-1">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="type" name="type" value="percentage" class="custom-control-input">
                                            <label class="custom-control-label" for="type">درصد</label>
                                        </div>
                                    </div>

                                    <div class="form-check-inline my-1">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="type" name="type" value="amount" class="custom-control-input">
                                            <label class="custom-control-label" for="type">مبلغ خاص</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">درصد ویا مبلغ اشتراک از هر تراکنش: (درصد یا ریال)</span></div>
                                <input type="text" value="{{ old('value') }}" class="form-control" name="value"">
                            </div>

                        </div>
                        <!--end form-group-->
                </div>
                <div style="display: inline" class="modal-footer">
                    <a style="float:right;" type="button" class="btn btn-secondary" data-dismiss="modal"">بستن</a>
                    <button type="submit" style="float:left;" class="btn btn-primary">افزودن تسهیم</button>
                </div>

                </form>

            </div>
        </div>
    </div>






    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">سیاست های تسهیم وجوه</a></li>
                        <li class="breadcrumb-item active">داشبورد امید شاپ</li>
                    </ol>
                </div>
                <h4 class="page-title">داشبورد اصلی</h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->


    @include('dashboard.layouts.errors')

    <div class="text-right mb-3">
        <button data-toggle="modal" data-target="#AddCardModal" type="submit" class="btn btn-dark waves-effect success ">افزودن سیاست تسهیم وجه</button><br>
    </div>

<div class="row">


{{--    @foreach ($wallets as $wallet)--}}
{{--        <div class="col-lg-4">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="wallet-bal-usd">--}}
{{--                                <center><h4>نام کیف پول: {{ $wallet->name }}</h4></center> <br>--}}
{{--                                <h5 class="wallet-title m-0">موجودی فعلی این کیف پول:</h5>--}}
{{--                                <h3 class="text-center">{{ number_format($wallet->amount) }} تومان</h3></div>--}}
{{--                            <div  class="text-center pt-4">--}}
{{--                                <a href="{{ route('transactionReport.wallet', $wallet->id) }}"><button class="btn btn-success btn-sm px-3">لیست تراکنش ها</button></a>--}}
{{--                                <button data-toggle="modal" data-target="#CheckoutModal{{$wallet->id}}" class="btn btn-danger btn-sm px-3">درخواست تسویه</button>--}}
{{--                                <!-- Button trigger modal -->--}}


{{--                                <br><br><span style="margin-top: 10px; font-family: BYekan!important;direction: ltr" class="text-muted font-12">آخرین بروزرسانی: {{ jdate($wallet->updated_at) }}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end card-body-->--}}
{{--                <div class="card-body pt-0">--}}
{{--                    <ul class="list-group wallet-bal-crypto">--}}
{{--                        <li class="list-group-item align-items-center d-flex justify-content-between">--}}
{{--                            <div class="media"><i style="padding-left: 15px;" class="dripicons-cart card-eco-icon text-secondary align-self-center"></i>--}}
{{--                                <div class="media-body align-self-center">--}}
{{--                                    <div class="coin-bal">--}}
{{--                                        <h3 class="m-0">کد امید شاپ:</h3>--}}
{{--                                        <p class="text-muted mb-0">{{ $wallet->key }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end media body-->--}}
{{--                            </div><span class="badge badge-soft-purple">جهت استفاده در API</span></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <!--end card-body-->--}}
{{--            </div>--}}
{{--            <!--end card-->--}}
{{--        </div>--}}
{{--        <!--end col-->--}}
{{--    @endforeach--}}





</div>


    <!--end row-->

@endsection


@section('pageScripts')
@stop
