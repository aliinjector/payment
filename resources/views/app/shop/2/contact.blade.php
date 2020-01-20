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
                <div class="contact-map">
                  <div id="map"></div>
                  </div>
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

            <script>

                var map = new GMaps({
                    el: '#map',
                    lat: 35.75030247466324,
                    lng: 51.430596795864744
                });
                map.addMarker({
                    lat: 35.75030247466324,
                    lng: 35.75030247466324,
                    title: 'Lima',
                    click: function(e) {
                        alert('You clicked in this marker');
                    }
                });

            </script>

		@endsection
