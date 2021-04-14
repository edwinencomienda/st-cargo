
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
     <script type='text/javascript'
     src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer>
   </script>
    {{-- <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AhHREYUjN0uuPaFJKN3XfMYVET5NJuobFCjooJWG14RBlpRugFQehru07ZelMQIy' async defer></script> --}}



</head>
<body onload="GetMap();">
    @include('layouts.sidebar')



      {{-- sa main na ni --}}
      <div id="main">
        @include('layouts.nav')
      </div>

        <div class="w3-card">
            @include('consult.head')
        </div>


           <div class="w3-row">
               @foreach ($parcel as $parc)

<br><br>
            <div class="picture w3-col w3-white w3-padding-64" style="width:350px; display:none; margin-left:5px; margin-right:5px; padding-left:15px; padding-right:15px;" id="f{{$parc->id}}">
                <button onclick="this.parentElement.style.display='none'"
                class="w3-button w3-transparent w3-brown btn-block">&times;</button>
                <br><br>

                <div class="w3-center">
                <img src="/backimage/lgu.png" height="115" width="115" alt="">
                </div>
                <h3>Owner: <span class="w3-right" style="font-size: 15px;"> @php
                    $bgt = DB::table('farmerprofile')->where('uuid', $parc->uuid)->get();
                    foreach ($bgt as $bg) {
                    echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
                    }
                    @endphp </span>
                </h3>
                <h3>
                    Location: <span class="w3-right" style="font-size: 15px;"> @php
                    $bgt = DB::table('baranggay')->where('id', $parc->location)->get();
                    foreach ($bgt as $bg) {
                    echo $bg->brgy;
                    }
                    @endphp
                    </span>

                </h3>
                <h3>
                    Hectare: <span class="w3-right" style="font-size: 15px;">{{$parc->hectare}} </span>
                </h3>
                <br><br>
                <h2 class="w3-center">Animals/Commodity</h2>
                <ul class="w3-ul w3-card-4" style="width:50%">
                    <?php
                    $bst = DB::table('parcelanimal')->where('uuid', $parc->uuid)->where('parcel', $parc->id)->get();
                   foreach ($bst as $bs) { ?>
                    <li>{{$bs->animal}}</li>
                    <?php   }
                    ?>
                </ul>

            </div>
            @endforeach

            <div class="w3-rest w3-green">
                <div id="myMap" style="width:100%;height:800px;">

                    <script type="text/javascript">
                     var map = null, infobox, dataLayer;



                        function GetMap()
                        {
                         // Seting Map Options
                         map = new Microsoft.Maps.Map(document.getElementById("myMap"),
                            {
                          credentials: "AhHREYUjN0uuPaFJKN3XfMYVET5NJuobFCjooJWG14RBlpRugFQehru07ZelMQIy",
                          center: new Microsoft.Maps.Location(7.283558704381619, 125.67193961115535), // Kordinat bener meriah
                          mapTypeId: Microsoft.Maps.MapTypeId.aerial,
                          zoom: 13
                         });

                         //Create window infobox in the middle of pin (not displayed)
                         infobox = new Microsoft.Maps.Infobox(map.getCenter(), {
                          visible: false
                         });
                         //Assign infobox on variabel map
                         infobox.setMap(map);

                         AddData();
                        }

                       function AddData() {
                           //Create Pin
                        var pin1 = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(7.283558704381619, 125.67193961115535));
                           //Store metadata on pushpin
                        pin1.metadata = {
                          title: 'CAGRO MAIN OFFICE',
                          description: '<div><h5>PANABO CITY HALL<h5></div>'
                        };
                         // Add handling event click on pushpin
                        Microsoft.Maps.Events.addHandler(pin1, 'click', pushpinClicked);
                       //Set entity pushpin on map
                        map.entities.push(pin1);



<?php
foreach ($parcel as $parc)
{
?>
                        //For location parcel in city
                        var <?php echo 'f' . $parc->id; ?> = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location('{{$parc->latt}}', '{{$parc->longi}}'),{color: 'red'});
                        <?php echo 'f' . $parc->id; ?>.metadata = {
                          title: 'Parcel of Farmer',
                          description: '@php $bgt = DB::table("farmerprofile")->where("uuid",$parc->uuid)->get();foreach ($bgt as $bg) {echo $bg->lname . " ". $bg->fname . ", " . $bg->mname; }@endphp <br><button class="w3-button btn-block w3-brown" onclick="openImg(\'f<?php echo $parc->id; ?>\');">Click</button>'

                         };

                        Microsoft.Maps.Events.addHandler(<?php echo 'f' . $parc->id; ?>, 'click', pushpinClicked);
                        map.entities.push(<?php echo 'f' . $parc->id; ?>);
<?php }?>

                       }

                        function pushpinClicked(e) {


                                //To ensure whether infobox have metadata to be displayed
                               if (e.target.metadata) {
                                  //Add metadata pushpin on option infobox
                                   infobox.setOptions({
                                       location: e.target.getLocation(),
                                       title: e.target.metadata.title,
                                       description: e.target.metadata.description,
                                       visible: true
                                   });
                               }
                           }

  function openImg(imgName) {
  var i, x;
  x = document.getElementsByClassName("picture");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(imgName).style.display = "block";
}
                       </script>


                </div>
            </div>
          </div>









    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>
    {{-- </div> --}}
</body>
</html>

