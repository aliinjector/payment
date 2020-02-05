@extends('app.shop.2.layouts.master')

@section('headerScripts')

@endsection

@section('content')


    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="tt-title-subpages"> سوالات متداول فروشگاه </h1>
                <div class="tt-box-faq-listing">
                    <div class="row">
                      @foreach($shopFaqs as $shopFaq)
                        <div class="col-sm-12 col-md-6">
                            <div class="tt-box-faq">
                            <h5 class="iranyekan"> - {{ $shopFaq->question }}</h5>
                                <p class="iranyekan" style="font-size: 17px;">{{ $shopFaq->answer }}.</p>
                            </div>
                        </div>
                      @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>


    @endsection

    @section('footerScripts')

    @endsection
