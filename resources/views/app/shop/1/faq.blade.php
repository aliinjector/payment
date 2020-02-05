@extends('app.shop.1.layouts.master')
@section('content')
<link href="/app/shop/1/assets/css/faq.css" rel="stylesheet" type="text/css">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="container">
                <br />
                <br />
                <br />

                <div class="alert alert-warning alert-dismissible font-15" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">بستن</span></button>در این بخش لیست سوالات متدوالی که ممکن است برای کاربران پیش بیاید را مشاهده میکنید.
                    اگر سوال شما در این بخش وجود ندارد به ما اطلاع دهید
                </div>

                <br />

                <div class="" id="accordion">
                  @foreach($shopFaqs as $shopFaq)
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-header">
                                <a class="accordion-toggle" data-toggle="collapse"  href="#faq-{{ $shopFaq->id }}">{{ $shopFaq->question }}</a>
                            </h4>
                        </div>
                        <div id="faq-{{ $shopFaq->id }}" class="panel-collapse collapse in">
                            <div class="card-block font-14 font-weight-normal p-3">
                              {{ $shopFaq->answer }}
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@section('pageScripts')
<script src="/app/shop/1/assets/js//modernizr.js"></script>

@stop
