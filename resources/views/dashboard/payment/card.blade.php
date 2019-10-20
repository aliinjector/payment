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
                                <select class="form-control" val style="font-family: BYekan!important;" name="bank_id" id="">
                                    @foreach ($banks as $bank)
                                        <option  style="font-family: BYekan!important;" value="{{$bank->id}}">{{ $bank->name }}</option>
                                    @endforeach
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
                                    <option style="font-family: BYekan!important;" value="01">01</option>
                                    <option style="font-family: BYekan!important;" value="02">02</option>
                                    <option style="font-family: BYekan!important;" value="03">03</option>
                                    <option style="font-family: BYekan!important;" value="04">04</option>
                                    <option style="font-family: BYekan!important;" value="05">05</option>
                                    <option style="font-family: BYekan!important;" value="06">06</option>
                                    <option style="font-family: BYekan!important;" value="07">07</option>
                                    <option style="font-family: BYekan!important;" value="08">08</option>
                                    <option style="font-family: BYekan!important;" value="09">09</option>
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
                <div style="display: inline" class="modal-footer">
                    <a style="float:right;" type="button" class="btn btn-secondary" data-dismiss="modal"">بستن</a>
                    <button type="submit" style="float:left;" class="btn btn-primary">افزودن کارت</button>
                </div>

                </form>

            </div>
        </div>
    </div>





    @foreach ($cards as $card)
        <div class="modal fade" id="EditCardModal{{$card->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$card->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ویرایش کارت بانکی</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('card.update', $card->id) }}" method="post" class="form-horizontal">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">نام بانک:</span></div>
                                    <select class="form-control" val style="font-family: BYekan!important;" name="bank_id" id="">
                                        @foreach ($banks as $bank)
                                            <option style="font-family: BYekan!important;" {{ $bank->id == $card->bank->id ? 'selected' : '' }} value="{{ $bank->id }}"> {{ $bank->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">شماره کارت:</span></div>
                                    <input type="text" value="{{ old('number', $card->number ) }}" class="form-control" name="number" placeholder="مثال: 5892101028096666">
                                    <input type="hidden" value="{{ $card->id }}" class="form-control" name="id">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend"><span class="input-group-text bg-light" id="basic-addon7">تاریخ انقضا:</span></div>

                                    <select class="form-control" style="font-family: BYekan!important;" name="month" id="">
                                        <option style="font-family: BYekan!important;" > انتخاب ماه</option>
                                        <option {{ $card->month == '1' ? 'selected' : '' }} style="font-family: BYekan!important;" value="1">1</option>
                                        <option {{ $card->month == '2' ? 'selected' : '' }} style="font-family: BYekan!important;" value="2">2</option>
                                        <option {{ $card->month == '3' ? 'selected' : '' }} style="font-family: BYekan!important;" value="3">3</option>
                                        <option {{ $card->month == '4' ? 'selected' : '' }} style="font-family: BYekan!important;" value="4">4</option>
                                        <option {{ $card->month == '5' ? 'selected' : '' }} style="font-family: BYekan!important;" value="5">5</option>
                                        <option {{ $card->month == '6' ? 'selected' : '' }} style="font-family: BYekan!important;" value="6">6</option>
                                        <option {{ $card->month == '7' ? 'selected' : '' }} style="font-family: BYekan!important;" value="7">7</option>
                                        <option {{ $card->month == '8' ? 'selected' : '' }} style="font-family: BYekan!important;" value="8">8</option>
                                        <option {{ $card->month == '9' ? 'selected' : '' }}  style="font-family: BYekan!important;" value="9">9</option>
                                        <option {{ $card->month == '10' ? 'selected' : '' }} style="font-family: BYekan!important;" value="10">10</option>
                                        <option {{ $card->month == '11' ? 'selected' : '' }} style="font-family: BYekan!important;" value="11">11</option>
                                        <option {{ $card->month == '12' ? 'selected' : '' }} style="font-family: BYekan!important;" value="12">12</option>
                                    </select>

                                    <select class="form-control" style="font-family: BYekan!important;margin-right: 10px;" name="year" id="">
                                        <option style="font-family: BYekan!important;" > انتخاب سال</option>
                                        <option {{ $card->year == '1398' ? 'selected' : '' }} style="font-family: BYekan!important;" value="1398">1398</option>
                                        <option {{ $card->year == '1399' ? 'selected' : '' }} style="font-family: BYekan!important;" value="1399">1399</option>
                                        <option {{ $card->year == '1400' ? 'selected' : '' }} style="font-family: BYekan!important;" value="1400">1400</option>
                                        <option {{ $card->year == '1401' ? 'selected' : '' }} style="font-family: BYekan!important;" value="1401">1401</option>
                                        <option {{ $card->year == '1402' ? 'selected' : '' }} style="font-family: BYekan!important;" value="1402">1402</option>
                                        <option {{ $card->year == '1403' ? 'selected' : '' }} style="font-family: BYekan!important;" value="1403">1403</option>
                                        <option {{ $card->year == '1404' ? 'selected' : '' }} style="font-family: BYekan!important;" value="1404">1404</option>
                                        <option {{ $card->year == '1405' ? 'selected' : '' }} style="font-family: BYekan!important;" value="1405">1405</option>
                                    </select>


                                </div>


                            </div>
                            <!--end form-group-->
                    </div>
                    <div style="display: inline" class="modal-footer">
                        <a style="float:right;" class="btn btn-danger" href="{{ route('card.delete', $card->id) }}">حذف کارت</a>
                        <button type="submit" style="float:left;" class="btn btn-primary">ثبت ویرایش</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>


    @endforeach


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
                    <h4 class="title-text mt-0"> کل کارت ها</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold byekan">{{ $cards->count() }}</h3><i class="dripicons-card card-eco-icon text-secondary align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">  تایید شده</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold byekan">{{ $cards->where('status', 'تایید شده')->count() }}</h3><i class="dripicons-card card-eco-icon text-success align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0"> در انتظار تایید </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold byekan">{{ $cards->where('status', 'در انتظار تایید')->count() }}</h3><i class="dripicons-card card-eco-icon text-warning align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0"> تایید نشده </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold byekan">{{ $cards->where('status', 'تایید نشده')->count() }}</h3><i class="dripicons-card card-eco-icon text-danger align-self-center"></i></div>
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
                    <div class="media"><img src="{{ $card->bank->icon }}" height="90" class="mr-3" alt="کارت بانکی">
                        <div class="media-body align-self-center">
                            <div class="mb-2">
                                <span class="badge badge-primary px-3"> بانک {{ $card->bank->name}}</span>
                                <span class="ml-2 text-muted byekan">تاریخ افزودن:{{ jdate($card->created_at) }}</span>

                            </div>
                            <br><span style="font-size: 25px" class=" d-block font-weight-normal text-center">{{ $card->number }}</span>
                            <br><span style="display: inline;float: right;" class="font-13 d-inline font-weight-normal text-left">{{ \Auth::user()->firstName . ' ' . \Auth::user()->lastName  }}</span>
                            <span style="display: inline;float: left;" class="font-13 d-inline font-weight-normal text-right">تاریخ انقضا: {{ $card->year . '/' . $card->month}}</span>

                        </div>
                        <!--end media body-->
                    </div>

                    <div class="text-center">
                        <span class="badge badge-primary mt-3 text-center"> وضعیت: {{ $card->status}}</span>
                        <a href="" data-toggle="modal" data-target="#EditCardModal{{$card->id}}"><span class="badge badge-danger mt-3 text-center"> ویرایش و حذف </span></a>
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
