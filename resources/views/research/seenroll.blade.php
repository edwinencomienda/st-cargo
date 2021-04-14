
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="{{ asset('fontawesome/js/brand.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome/js/solid.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome/js/fontawesome.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">


    <!-- Fontawesome5 -->

    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href=" {{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/brand.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">



    @yield('css')
    <style>
        body{
            background-color: #9c917d;
            font-family: 'Nunito';
        }
        a{
            text-decoration: none !important;
            font-family: 'Nunito' !important;

        }
    </style>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AhHREYUjN0uuPaFJKN3XfMYVET5NJuobFCjooJWG14RBlpRugFQehru07ZelMQIy' async defer></script>
	<script type='text/javascript'>

let infobox,map;
function GetMap() {
    map = new Microsoft.Maps.Map('#myMap', {
        center: new Microsoft.Maps.Location('{{$product->latt}}', '{{$product->longi}}'),
        zoom: 22
    });
    //Get MAP Infomation
    let center = map.getCenter();

    //********************************************************************
    //infobox
    //********************************************************************
    infobox = new Microsoft.Maps.Infobox(center, {
        visible: false
    });
    infobox.setMap(map);//Add infobox to Map

    //********************************************************************
    //PushPin
    //********************************************************************
    let pin = new Microsoft.Maps.Pushpin(center, {
        color: 'red',

    });
    pin.metadata = {
        title: '@php $bgt = DB::table("farmerprofile")->where("uuid", $product->farmer)->get();foreach ($bgt as $bg) {echo $bg->lname . " ". $bg->fname . ", " . $bg->mname; }@endphp',
        description: '<div class="w3-card-4 w3-center">Details.</div>'
    };
    //PushPin:addEvent
    Microsoft.Maps.Events.addHandler(pin, 'click', pushpinClicked);
    map.entities.push(pin); //Add Pushpin to Map
}

function pushpinClicked(e) {
    //Make sure the infobox has metadata to display.

    // alert('Helo');
    document.getElementById('kol').style.display = "block";
    if (e.target.metadata) {

        //Set the infobox options with the metadata of the pushpin.
        infobox.setOptions({
            location: e.target.getLocation(),
            title: e.target.metadata.title,
            description: e.target.metadata.description,
            visible: true
        });

    }

}


    </script>
</head>
<body>
    @include('layouts.sidebar')



      {{-- sa main na ni --}}
      <div id="main">
        @include('layouts.nav')
      </div>

    <div id="app">

        </div>

        <div class="w3-card">
            @include('consult.head')
        </div>



          <div class="w3-row" style="padding-left: 45px;padding-right:45px;">

            <div  class="w3-col w3-white w3-padding-32" style="width:350px;display:none;margin-top:5%;margin-right:25px" id="kol">
               <div class="w3-center w3-padding-32">
                   <img src="/backimage/lgu.png" height="88" width="88" alt="">
               </div>
                <div class="w3-padding-64" style="padding-left: 15px; padding-right:15px;">
                    <h3>Owner: <span class="w3-right" style="font-size: 15px;"> @php
                        $bgt = DB::table('farmerprofile')->where('uuid', $product->farmer)->get();
                        foreach ($bgt as $bg) {
                        echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
                        }
                        @endphp </span>
                    </h3>
                    <h3>
                        Location: <span class="w3-right" style="font-size: 15px;"> @php
                        $bgt = DB::table('baranggay')->where('id', $product->parcel)->get();
                        foreach ($bgt as $bg) {
                        echo $bg->brgy;
                        }
                        @endphp
                        </span>

                    </h3>
                    <h3>
                        Program Enroll: <span class="w3-right" style="font-size: 15px;">
                            @switch($product->program)
                            @case(2)
                             Crops Sector
                                @break
                            @case(3)
                             Fishery Sector
                                @break
                            @case(4)
                             Livestock Sector
                                @break
                            @default
                               No Program Enroll
                        @endswitch
                    </span>
                    </h3>



                    <a href="{{route('map.enroll')}}" class="w3-button btn-block w3-brown">Go back to Enrollment's List</a>
                </div>
              </div>

            <div class="w3-rest w3-green">
                <div id="myMap" style="width:100%;height:800px;">
                </div>
            </div>

          </div>

    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>
    </div>



</body>
</html>
