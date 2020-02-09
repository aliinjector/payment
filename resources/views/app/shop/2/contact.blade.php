@extends('app.shop.2.layouts.master')

@section('headerScripts')
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoByqe6LqHZ8GVyM9FemOp5kJegBGaOgM&callback=initMap" type="text/javascript"></script>
    <script src="/app/js/gmaps.js"></script>

    <style type="text/css">
        #map {
            width: 400px;
            height: 400px;
        }
    </style>



@endsection

@section('content')


    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                {{-- <div class="contact-map">
                  <iframe src="https://api.neshan.org/v2/static?key=web.onKnTdZAW1q6GOdUeazO1QChtptWRKTf7DD0RCBN&type=dreamy&zoom=10&center=35.671313,51.072476&width=1120&height=300&marker=red"></iframe>
                  </div> --}}
            </div>
        </div>





        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <div class="tt-contact02-col-list">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 ml-sm-auto mr-sm-auto">
                            <div class="tt-contact-info"><i class="tt-icon icon-f-93"></i>
                                <h6 class="tt-title">شماره تماس:</h6>{{ $shop->shopContact->tel}}</div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="tt-contact-info"><i class="tt-icon icon-f-24"></i>
                                <h6 class="tt-title">آدرس:</h6><address>{{ $shop->shopContact->address }}</address></div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="tt-contact-info"><i class="tt-icon icon-f-93"></i>
                                <h6 class="tt-title">ایمیل: </h6>{{ $shop->shopContact->shop_email}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

		@endsection

		@section('footerScripts')

		@endsection
