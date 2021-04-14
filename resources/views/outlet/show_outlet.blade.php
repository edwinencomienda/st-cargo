@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<!--Leaflet CSS-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

<!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
 integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
 crossorigin=""></script>
<style>
    #mapid
 {
     height: 400px;
     width: 645px;

 }

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="font-weight: 600; font-size: 20px" class="card-header">{{ $outlets->outlet_name }}</div>

                <div class="card-body">
                <h5>Address: {{ $outlets->outlet_address }}</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="mapid">
                                    <script>
                                        var mapCenter = [{{ $outlets->outlet_latitude }}, {{ $outlets->outlet_longitude }}];
                                          var mymap = L.map('mapid').setView([{{ $outlets->outlet_latitude }}, {{ $outlets->outlet_longitude }}], 15);
                                          L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=yoCDRPICkTWVZbE2KbWQ', {
                                            attribution: 'Map data &copy; <a href="<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a></a>',
                                            maxZoom: 50,
                                            id: 'mapbox/streets-v11',
                                            tileSize: 512,
                                            zoomOffset: -1,
                                            accessToken: 'your.mapbox.access.token'
                                            }).addTo(mymap);
                                            var marker = L.marker(mapCenter).addTo(mymap);
                                            var theMarker = {};

                                            mymap.on('click',function(e){
                                                lat = e.latlng.lat.toString().substring(0, 15);;
                                                lon = e.latlng.lng.toString().substring(0, 15);;

                                                theMarker = L.marker([lat,lon]).addTo(mymap);
                                                });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
