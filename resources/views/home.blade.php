@extends('layouts.app')

@section('content')
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/view/home.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('css/map.css') }}" >

<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <!-- @foreach($locations as $location)
          <div>{{$location->location}} {{$location->latitude}} {{$location->longitude}}</div>
        @endforeach -->
        <div id="map"></div>
    </div>
    <script type="text/javascript">
      var currentlatitude;
      var currentlongitude;
      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else {
          x.innerHTML = "Geolocation is not supported by this browser.";
        }
      }
      function showPosition(position) {
        currentlatitude = position.coords.latitude;
        currentlongitude = position.coords.longitude;
      }

      function initMap() {
        var js_data = '<?php echo json_encode($locations); ?>';
        var js_obj_data = JSON.parse(js_data);

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: new google.maps.LatLng( currentlatitude, currentlongitude),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < js_obj_data.length; i++) {  
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(js_obj_data[i].latitude, js_obj_data[i].longitude),
            map: map
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent('<a href="/detail/' + js_obj_data[i].id + '">' + js_obj_data[i].location + ', ' + js_obj_data[i].event + '</a>');
              infowindow.open(map, marker);
            }
          })(marker, i));
        }   
      }
      getLocation();
      setTimeout(() => {
        this.initMap();
      }, 50);
    </script>
    <script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBl-94cl8p6yU-zxAP0HWKbAjF2Lr3AIQo&callback=initMap" 
        type="text/javascript" async defer></script>
    </div>
@endsection
