@extends('app.shop.1.layouts.master')
@section('content')
  <style media="screen">
    .font-2em{
      font-size: 2em!important;
    }
    .text-light-blue{
      color:#15939D!important;
    }
    .text-light-orange{
        color:#F68712!important;
    }
  </style>

<div class="align-content-center font-18 iranyekan justify-content-around row" style="height: 50vh;">
    <div class="">
      <div class="text-light-blue border-bottom p-4">
        <div class="d-flex justify-content-around mt-4">
            <i class="fas fa-phone font-2em"></i>
        </div>
        <div class="p-3">
            شماره تماس
        </div>
      </div>
      <div class="d-flex justify-content-center p-4">
      {{ $shop->shopContact->tel}}
      </div>

    </div>
    <div class="">
      <div class="text-light-orange border-bottom p-4">
        <div class="d-flex justify-content-around mt-4">
            <i class="fas fa-address-card font-2em"></i>
        </div>
        <div class="p-3 d-flex justify-content-center">
            آدرس
        </div>
      </div>
      <div class="d-flex justify-content-center p-4">
        {{ $shop->shopContact->address }}
      </div>

    </div>
    <div class="">
      <div class="text-light-blue border-bottom p-4">
        <div class="d-flex justify-content-around mt-4">
            <i class="fas fa-envelope font-2em"></i>
        </div>
        <div class="p-3 d-flex justify-content-center">
            ایمیل
        </div>
      </div>
      <div class="d-flex justify-content-center p-4">
      {{ $shop->shopContact->shop_email}}
      </div>

    </div>
</div>

@endsection
@section('pageScripts')


@stop
