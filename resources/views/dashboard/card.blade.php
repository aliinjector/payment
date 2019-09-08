@extends('dashboard.layouts.master')
@section('content')


    <div class="modal fade" id="AddCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">افزودن کارت بانکی جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('card.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group mb-0">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">نام بانک:</span></div>
                                <select class="form-control" val style="font-family: BYekan!important;" name="bank" id="">
                                    <option style="font-family: BYekan!important;" value="sepah"> بانک سپه</option>
                                </select>
                            </div>

                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">شماره کارت:</span></div>
                                <input type="text" value="{{ old('number') }}" class="form-control" name="number" placeholder="مثال: 5892101028096666">
                            </div>

                            <div class="input-group mt-3">
                                <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">تاریخ انقضا:</span></div>

                                <select class="form-control" style="font-family: BYekan!important;" name="month" id="">
                                    <option style="font-family: BYekan!important;" > انتخاب ماه</option>
                                    <option style="font-family: BYekan!important;" value="1">1</option>
                                    <option style="font-family: BYekan!important;" value="2">2</option>
                                    <option style="font-family: BYekan!important;" value="3">3</option>
                                    <option style="font-family: BYekan!important;" value="4">4</option>
                                    <option style="font-family: BYekan!important;" value="5">5</option>
                                    <option style="font-family: BYekan!important;" value="6">6</option>
                                    <option style="font-family: BYekan!important;" value="7">7</option>
                                    <option style="font-family: BYekan!important;" value="8">8</option>
                                    <option style="font-family: BYekan!important;" value="9">9</option>
                                    <option style="font-family: BYekan!important;" value="10">10</option>
                                    <option style="font-family: BYekan!important;" value="11">11</option>
                                    <option style="font-family: BYekan!important;" value="12">12</option>
                                </select>

                                <select class="form-control" style="font-family: BYekan!important;margin-right: 10px;" name="year" id="">
                                    <option style="font-family: BYekan!important;" > انتخاب سال</option>
                                    <option style="font-family: BYekan!important;" value="1398">1398</option>
                                    <option style="font-family: BYekan!important;" value="1399">1399</option>
                                    <option style="font-family: BYekan!important;" value="1400">1400</option>
                                    <option style="font-family: BYekan!important;" value="1401">1401</option>
                                    <option style="font-family: BYekan!important;" value="1402">1402</option>
                                    <option style="font-family: BYekan!important;" value="1403">1403</option>
                                    <option style="font-family: BYekan!important;" value="1404">1404</option>
                                    <option style="font-family: BYekan!important;" value="1405">1405</option>
                                </select>


                            </div>


                        </div>
                        <!--end form-group-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    <button type="submit" class="btn btn-success">ثبت درخواست</button>
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
                        <li class="breadcrumb-item"><a href="">کارت های بانکی شما</a></li>
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
                    <h4 class="title-text mt-0">تعداد کل کارت های بانکی شما</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۲ </h3><i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد کارت های تایید شده</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۲</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">کارت های در انتظار تایید </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۰ </h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">کارت های تایید نشده </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۰</h3><i class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
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
        <button data-toggle="modal" data-target="#AddCardModal" type="submit" class="btn btn-dark waves-effect success ">افزودن کارت بانکی</button><br>
    </div>

<div class="row">


    @foreach ($cards as $card)
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="media"><img src="/images/banks/sepah.png" height="90" class="mr-3" alt="کارت بانکی">
                        <div class="media-body align-self-center">
                            <div class="mb-2">
                                <span class="badge badge-primary px-3"> بانک {{ $card->name}}</span>
                                <span class="ml-2 text-muted">تاریخ افزودن:{{ jdate($card->created_at) }}</span>
                            </div>
                            <br><span class="font-18 d-block font-weight-normal text-center">{{ $card->number }}</span>
                            <br><span style="display: inline;float: right;" class="font-13 d-inline font-weight-normal text-left">{{ \Auth::user()->firstName . ' ' . \Auth::user()->lastName  }}</span>
                            <span style="display: inline;float: left;" class="font-13 d-inline font-weight-normal text-right">تاریخ انقضا: ۱۴۰۰/۱۰</span>
                        </div>                    <!--end media body-->
                    </div>
                    <!--end media-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    @endforeach










</div>


    <!--end row-->

@endsection


@section('pageScripts')
@stop
