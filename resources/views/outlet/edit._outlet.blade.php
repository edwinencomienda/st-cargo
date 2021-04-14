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
      height: 500px;
      width: 1050px;
      margin-left: -12px;

  }
</style>
@section('content')
<div class="container">
    <div class="col-md-14">
        <div class="card">
        <div class="card-header">Edit Outlet</div>
            <div class="card-body">

                <form action="{{ url('update_outlet/'.$outlets->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="outlet_name">Outlet Name</label>
                                <input type="text" name="outlet_name" class="form-control" id="outlet_name" placeholder="" value="{{ $outlets->outlet_name }}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="outlet_address">Address</label>
                                <input type="text" name="outlet_address" class="form-control" id="outlet_address" placeholder="" value="{{ $outlets->outlet_address }}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="outlet_latitude">Latitude</label>
                            <input type="text" name="outlet_latitude" class="form-control" id="outlet_latitude" placeholder="" value="{{ $outlets->outlet_latitude}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="outlet_longitude">Longitude</label>
                            <input type="text" name="outlet_longitude" class="form-control" id="outlet_longitude" placeholder="" value="{{ $outlets->outlet_longitude}}">
                            </div>
                        </div>
                    </div>
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
                                                maxZoom: 20,
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


                                                //Clear existing marker,

                                                if (theMarker != undefined) {
                                                    mymap.removeLayer(theMarker);
                                                };
                                                mymap.removeLayer(marker);
                                                $('#outlet_latitude').val(lat);
                                                $('#outlet_longitude').val(lon);

                                                    //Add a marker to show where you clicked.
                                                    theMarker = L.marker([lat,lon]).addTo(mymap);
                                                });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="align-items: baseline" class="modal-footer">
                        <button type="submit" class="btn btn-round btn-primary btn-success pull-right">Update</button>
                        <a href="{{ url('/home') }}" type="button" class="btn btn-round btn-secondary pull-right">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
