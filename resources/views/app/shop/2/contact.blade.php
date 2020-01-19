@extends('app.shop.2.layouts.master')

@section('headerScripts')

@endsection

@section('content')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>


    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                <div class="contact-map">
                  <div id="map"></div>
                  <input name="lat" value="{{ $shop->shopContact->lat }}" type="hidden" id="lat"><br>
                  <input name="lng" value="{{ $shop->shopContact->lng }}" type="hidden" id="lng">
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

        //map//Set up some of our variables.
        var map; //Will contain map object.
        var marker = false; ////Has the user plotted their location marker?

        //Function called to initialize / create the map.
        //This is called when the page has loaded.
        function initMap() {

            //The center location of our map.

            var centerOfMap = new google.maps.LatLng({{ $shop->shopContact->lat ? $shop->shopContact->lat : '35.6969331' }}, {{ $shop->shopContact->lng ? $shop->shopContact->lng : '51.2796073' }});

            //Map options.
            var options = {
              center: centerOfMap, //Set center.
              zoom: 15 //The zoom value.
            };

            //Create the map object.
            map = new google.maps.Map(document.getElementById('map'), options);

            //Listen for any clicks on the map.
            google.maps.event.addListener(map, 'click', function(event) {
                //Get the location that the user clicked.
                var clickedLocation = event.latLng;
                //If the marker hasn't been added.
                if(marker === false){
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                        draggable: true //make it draggable
                    });
                    //Listen for drag events!
                    google.maps.event.addListener(marker, 'dragend', function(event){
                        markerLocation();
                    });
                } else{
                    //Marker has already been added, so just change its location.
                    marker.setPosition(clickedLocation);
                }
                //Get the marker's location.
                markerLocation();
            });
        }

        //This function will get the marker's current location and then add the lat/long
        //values to our textfields so that we can save the location.
        function markerLocation(){
            //Get location.
            var currentLocation = marker.getPosition();
            //Add lat and lng values to a field that we can save.
            document.getElementById('lat').value = currentLocation.lat(); //latitude
            document.getElementById('lng').value = currentLocation.lng(); //longitude
        }


        //Load the map when the page has finished loading.
        google.maps.event.addDomListener(window, 'load', initMap);
</script>
		@endsection
