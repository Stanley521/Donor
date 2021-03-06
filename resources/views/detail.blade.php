@extends('layouts.app')

@section('content')
<script src="https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJN1t_tDeuEmsRUsoyG83frY4&fields=name,rating,formatted_phone_number&key=AIzaSyBl-94cl8p6yU-zxAP0HWKbAjF2Lr3AIQo"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/view/addevent.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('css/map.css') }}" >
<div class="card">
    <div class="card-header">{{ __('Event Detail') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div>{{$location->location}}</div>
        <div>{{$location->address}}</div>
        <div id="map"></div>
        <!-- <div>{{$location->latitude}}</div>
        <div>{{$location->longitude}}</div> -->
        
        <div>{{$location->event}}</div>
        <div>{{$location->description}}</div>
        <div>
            @if ($location->urgent == 0)
                This is not urgent
            @else
                This is urgent
            @endif
        </div>
        <div>{{$location->accessible_until}}</div>
        <div>{{$user->name}}</div>
        <div>{{$user->email}}</div>
        <div>{{$user->user_type}}</div>

    </div>
    <script type="text/javascript">
    function initMap() {
        var js_data = '<?php echo json_encode($location); ?>';
        var js_obj_data = JSON.parse(js_data);

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: new google.maps.LatLng( js_obj_data.latitude, js_obj_data.longitude),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker;

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(js_obj_data.latitude, js_obj_data.longitude),
            map: map
        });
    }
    setTimeout(() => {
        this.initMap();
    }, 50);
    </script>
    <script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBl-94cl8p6yU-zxAP0HWKbAjF2Lr3AIQo&callback=initMap" 
        type="text/javascript" async defer></script>
</div>
@endsection