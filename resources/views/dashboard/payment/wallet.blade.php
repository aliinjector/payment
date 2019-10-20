@extends('dashboard.layouts.master')
@section('content')

@foreach ($wallets as $wallet)
    <!-- Modal -->
    <div class="modal fade" id="CheckoutModal{{$wallet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">درخواست تسویه حساب کیف پول شماره ۱</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('checkout.store') }}" class="form-horizontal">
                        @csrf
                        <div class="form-group mb-0">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">مبلغ:</span></div>
                                <input type="text" class="form-control"name="amount" placeholder="مثال: ۱۰۰۰۰۰">
                                <div class="input-group-append"><span class="input-group-text bg-light" id="basic-addon8"> تومان</span></div>
                            </div>

                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">واریز به:</span></div>
                                <input type="hidden" value="{{ $wallet->id }}" name="wallet_id" id="">
                                <select style="font-family: BYekan!important;" name="card_id" id="card_id">
                                    @foreach ($cards as $card)
                                        <option value="{{ $card->id }}"> {{ $card->bank->name }} | شماره کارت: {{ $card->number }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append"><span style="font-size: 11px" class="input-group-text bg-light" id="basic-addon8">{{ \Auth::user()->firstName . ' ' . \Auth::user()->lastName }}</span></div>
                            </div>
                        </div>
                        <!--end form-group-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                    <button type="submit" class="btn btn-primary">ثبت درخواست</button>
                </div>
                </form>

            </div>
        </div>
    </div>


@endforeach



    <!-- Modal -->
    <div class="modal fade" id="AddWalletModal" tabindex="-1" role="dialog" aria-labelledby="AddWalletModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">افزودن کیف پول</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ route('wallet.store') }}">
                        @csrf
                        <div class="form-group mb-0">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">نام کیف پول:</span></div>
                                <input type="text" class="form-control" name="name" placeholder="مثال: کیف پول سایت">
                            </div>
                        </div>
                        <!--end form-group-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    <button type="submit" class="btn btn-primary">ثبت درخواست</button>
                </div>
                </form>

            </div>
        </div>
    </div>




    <div style="text-align: center" class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">کیف های پول شما</a></li>
                        <li class="breadcrumb-item active">داشبورد پین پی</li>
                    </ol>
                </div>
                <h4 class="page-title">داشبورد اصلی</h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">مجموع موجودی شما</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">{{ number_format($wallets->sum('amount')) }} تومان </h3></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد کیف پول ها</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">{{ $wallets->count() }}</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تاریخ آخرین تسویه </h4>
                    <div class="d-flex justify-content-between">
{{--                        <h3 class="font-weight-bold"> {{ jdate($checkouts->where('status', 'انجام شده')->orderBy('updated_at', 'desc')->first()->value('updated_at')) }} </h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>--}}
                        <h3 class="font-weight-bold"> </h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">مجموع تسویه ها </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">  {{ number_format($checkouts->where('status', 'انجام شده')->sum('amount')) }} تومان </h3></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->


@include('dashboard.layouts.errors')

    <div class="text-right mb-3">
        <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-dark waves-effect success ">افزودن کیف پول</button><br>
    </div>

    <div class="row">

       @foreach ($wallets as $wallet)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="wallet-bal-usd">
                                    <center><h4>نام کیف پول: {{ $wallet->name }}</h4></center> <br>
                                    <h5 class="wallet-title m-0">موجودی فعلی این کیف پول:</h5>
                                    <h3 class="text-center">{{ number_format($wallet->amount) }} تومان</h3></div>
                                <div  class="text-center pt-4">
                                    <a href="{{ route('transactionReport.wallet', $wallet->id) }}"><button class="btn btn-success btn-sm px-3">لیست تراکنش ها</button></a>
                                    <button data-toggle="modal" data-target="#CheckoutModal{{$wallet->id}}" class="btn btn-danger btn-sm px-3">درخواست تسویه</button>
                                    <!-- Button trigger modal -->


                                    <br><br><span style="margin-top: 10px; font-family: BYekan!important;direction: ltr" class="text-muted font-12">آخرین بروزرسانی: {{ jdate($wallet->updated_at) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                    <div class="card-body pt-0">
                        <ul class="list-group wallet-bal-crypto">
                            <li class="list-group-item align-items-center d-flex justify-content-between">
                                <div class="media"><i style="padding-left: 15px;" class="dripicons-cart card-eco-icon text-secondary align-self-center"></i>
                                    <div class="media-body align-self-center">
                                        <div class="coin-bal">
                                            <h3 class="m-0">کد پایان پی:</h3>
                                            <p class="text-muted mb-0">{{ $wallet->key }}</p>
                                        </div>
                                    </div>
                                    <!--end media body-->
                                </div><span class="badge badge-soft-purple">جهت استفاده در API</span></li>
                        </ul>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
       @endforeach




    </div>

    <!--end row-->

@endsection


@section('pageScripts')
@stop
