
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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    {{-- <link href="{{ asset('css/infinite.css') }}" rel="stylesheet"> --}}

    {{-- Font Awesome --}}
    {{-- CSS links --}}

    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href=" {{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/brand.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">

    <script defer src="{{ asset('fontawesome/js/brand.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome/js/solid.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome/js/fontawesome.js') }}"></script>

    <style>
        body{
            background-color: #9c917d;
            font-family: 'Nunito';
        }
        a{
            text-decoration: none !important;
            font-family: 'Nunito' !important;

        }

        a::hover{
            text-decoration: none !important;
            font-family: 'Nunito' !important;
        }
        .w3-nav1{
            padding-right: 22px;
            padding-left: 22px;
        }

        .header-side{
            height: 43px;
            background-color: #bfb4ac !important;
        }

        .profimage{
            border-radius: 100%;
            padding: 4px 4px 4px 4px;
            margin-left: 15% !important;
            margin-right: 15% !important;
            width: auto;
            height: auto;
        }
        h3{
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
            font-size: 22px !important;
            font-family: 'Nunito' !important;
        }
        h4{
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
            font-size: 12px !important;
            font-family: 'Nunito' !important;
        }
        label{
            text-align: left !important;
            font-family: 'Nunito' !important;
            color: #b1b1;
        }
        .elf-t{
            font-family: 'Nunito' !important;
            padding-left: 15px;
        }

        .mapside{
            width: 14% !important;


            /* z-index: 1; */
        }




    </style>
<script type='text/javascript'>
 function GetMaps() {
        var map = new Microsoft.Maps.Map('#myMap', {
            credentials: 'AhHREYUjN0uuPaFJKN3XfMYVET5NJuobFCjooJWG14RBlpRugFQehru07ZelMQIy',
            center: new Microsoft.Maps.Location(7.283432811888474, 125.67202466216035),
            zoom: 15
        });

        //Create a font pushpin of a truck. "&#xf0d1;" => "\uf0d1". List of icon hex values: http://fontawesome.io/3.2.1/cheatsheet/
        var pin = createFontPushpin(map.getCenter(), '\uf494 ', 'FontAwesome', 30, 'red');

        //Add the pushpin to the map
        map.entities.push(pin);
    }

    function createFontPushpin(location, text, fontName, fontSizePx, color) {
        var c = document.createElement('canvas');
        var ctx = c.getContext('2d');

        //Define font style
        var font = fontSizePx + 'px ' + fontName;
        ctx.font = font

        //Resize canvas based on sie of text.
        var size = ctx.measureText(text);
        c.width = size.width;
        c.height = fontSizePx;

        //Reset font as it will be cleared by the resize.
        ctx.font = font;
        ctx.textBaseline = 'top';
        ctx.fillStyle = color;

        ctx.fillText(text, 0, 0);

        return new Microsoft.Maps.Pushpin(location, {
            icon: c.toDataURL(),
            anchor: new Microsoft.Maps.Point(c.width / 2, c.height / 2) //Align center of pushpin with location.
        });
    }
</script>


   <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMaps' async defer></script>
   <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AhHREYUjN0uuPaFJKN3XfMYVET5NJuobFCjooJWG14RBlpRugFQehru07ZelMQIy' async defer></script>
</head>
</head>
<body>
    @include('layouts.sidebar')

      {{-- sa main na ni --}}
 <div id="main"> @include('layouts.nav')</div>
 <div id="app"></div>
<div class="w3-card">@include('consult.head')</div>


<main class="py-4 container-fluid w3-container-display">
            {{-- @yield('content') --}}

            <div class="w3-bar-block w3-green w3-display-right mapside" >
                <div class="w3-bar-item">London</div>
                <div class="w3-bar-item">Paris</div>
                <div class="w3-bar-item">Tokyo</div>
              </div>
              <div style="font-family:FontAwesome;position:absolute;color:transparent;">Preload font, otherwise we may end up trying to use it before it is available.</div>
            <div id="myMap" style="position:relative;width:100%;height:1100px;"></div>


 </main>




    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
        footer
    </footer>
    </div>



</body>
@yield('scripts')
</html>

<style>
     input {
            border-top:none !important;
            border-left: none !important;
            border-right: none !important;
            border-bottom: solid !important;
            border-bottom-color: #bc986a !important;
            height: 44px !important;
            padding: 5px 5% !important;

            }
            input:focus, input.form-control:focus {
            outline:none !important;
            outline-width: 0 !important;
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            }
            .modal-content{
                padding-left: 34px;
                padding-right: 34px;
            }
            .w3-btn{
                font-family: 'Nunito' !important;
            }
</style>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-card-4">
        <div class="modal-header" style="border: none !important">
            <button type="button" class=" w3-card close w3-teal btn btn-success" data-dismiss="modal"
            style="margin-right:-12% !important">
            &times;
            </button>
          </div>
      <!-- Modal body -->
        <div class="modal-body w3-display-container">
            <div class="w3-center">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="89px" height="89px" alt="">

                <form action="{{ route('profpic')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <br><br>

                        <input class="w3-input" value="{{ Auth::user()->uuid }}" name="uuid" type="text" readonly hidden>
                        <br>

                    <label class="w3-left w3-text-teal">Select Image</label>
                    <input class="w3-input" type="file" name="files" required>
            </div>
            <div class="modal-footer" style="border: none !important">
                <div class="w3-bar w3-card-4">
                    <button type="submit" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                        <i class="fas fa-paper-plane"></i> Submit
                    </button>
                    <button class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                        <i class="fas fa-times-circle"></i> Cancel
                    </button>
                </form>
                  </div>

              </div>
        </div>
      </div>
    </div>
  </div>
