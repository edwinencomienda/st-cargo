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
     height: 300px;
     width: 450px;
     margin-left: -12px;

 }
 a:hover{
    opacity: 0.5;
 }

 button:hover{
    opacity: 0.5;
 }

 button:active{
    border-style:none;
    outline: none;
 }

 button:focus { outline: none; }

 .form-wrapper{
    display: flex;
}

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Outlets in Panabo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div  class="container">
                        <div  class="row justify-content-center">
                            <div class="col-md-10">

                            </div>
                            <div class="col-md-2">
                                <button style="text-align: center; margin-bottom: 10px" type="button" class="btn btn-success" data-toggle="modal" data-target="#addTran">
                                    <i class="fa fa-plus-square"></i></i>&nbsp; Add
                                </button>
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div style="font-weight: 700" class="card-header">Manage Outlets</div>
                                                <table class="table table-striped">
                                                    <thead class="thead-dark">
                                                        <tr style="font-size: 12px">
                                                        <th >Outlet ID</th>
                                                        <th >Outlet Name</th>
                                                        <th >Outlet Address</th>
                                                        <th >Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($outlets as $item)
                                                        <tr>
                                                            <td>{{$item->id}}</td>
                                                            <td>{{$item->outlet_name}}</td>
                                                            <td>{{$item->outlet_address}}</td>
                                                            <td style="text-align: right">
                                                                <div class="form-wrapper">
                                                                    <a href="{{ url('show_outlet/'.$item->id) }}" type="button" title="show" rel="tooltip" >
                                                                        <i class="fa fa-eye" style="color: #008B8B"></i>
                                                                    </a>&nbsp;&nbsp;
                                                                    <a href="{{ url('edit_outlet/'.$item->id) }}" type="button" title="edit" rel="tooltip" >
                                                                        <i class="fa fa-edit" style="color: #2d3c5c"></i>
                                                                    </a>
                                                                        <form action="{{ url('delete_outlet/'.$item->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <div>
                                                                            <button style="border-style:none; " type="submit"  title="Delete" rel="tooltip">
                                                                                <i class="fa fa-trash" style="color: red"></i>
                                                                            </button>
                                                                            </div>
                                                                        </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
</div>
<!--addTran-->
<div class="modal fade" id="addTran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div style="background: #008B8B; color: white" class="modal-header">
                Add Outlet
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('add_outlet')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="outlet_name">Outlet Name</label>
                                    <input type="text" name="outlet_name" class="form-control" id="outlet_name" placeholder="Outlet Name">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="outlet_address">Address</label>
                                    <input type="text" name="outlet_address" class="form-control" id="outlet_address" placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="outlet_longitude">Longitude</label>
                                <input type="text" name="outlet_longitude" class="form-control" id="outlet_longitude" placeholder="Longitude">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="outlet_latitude">Latitude</label>
                                    <input type="text" name="outlet_latitude" class="form-control" id="outlet_latitude" placeholder="Latitude">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="mapid">
                                            <script>
                                                var mapCenter = [7.30806, 125.68417];
                                                var mymap = L.map('mapid').setView([7.30806, 125.68417], 18);
                                                L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=yoCDRPICkTWVZbE2KbWQ', {
                                                    attribution: 'Map data &copy; <a href="<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a></a>',
                                                    maxZoom: 20,
                                                    id: 'mapbox/streets-v11',
                                                    tileSize: 512,
                                                    zoomOffset: -1,
                                                    accessToken: 'your.mapbox.access.token'
                                                    }).addTo(mymap);

                                                    setTimeout(function(){ mymap.invalidateSize()}, 500);
                                                    var marker = L.marker(mapCenter).addTo(mymap);
                                                    var theMarker = {};

                                                    mymap.on('click',function(e){
                                                    lat = e.latlng.lat.toString().substring(0, 10);;
                                                    lon = e.latlng.lng.toString().substring(0, 10);;


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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
