
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


    <style>
        h1,h2,h3,h4,h5{
            font-family: 'Nunito';
        }
    </style>
</head>
<body>
    @include('farmers.include.nav')

    <div class="w3-row">
        <div class="w3-half w3-container w3-padding-32">
            <?php
            if ( substr($reply->visual,-3) == 'jpg'){ ?>
            <img class="w3-round w3-animate-fade" src="{{URL::to($reply->visual)}}"
            width="100%" height="auto">

        <?php }
            if (substr($reply->visual,-3) == 'mp4') { ?>
            <video width="100%" height="100%" controls>
                <source src="{{URL::to($reply->visual)}}" type="video/mp4">
                </video>

        <?php    }
        ?>
        </div>
        <div class="w3-half w3-container w3-padding-32">

         <div class="w3-row w3-padding-64 w3-card-4" style="padding-left:24px;">
            {!! $reply->content !!}
         </div>
<br><br>
<div class="w3-row w3-card-4">
  <div class="w3-half w3-container w3-white w3-padding-64" style="padding-left: 24px;">
    <h2>{{$reply->title}}</h2>
  </div>
  <div class="w3-half w3-brown w3-containe w3-padding-64" style="padding-left: 24px;
  ">
    <h2>
        {{$reply->caption}}
    </h2>
  </div>
</div>
        </div>
      </div>



    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>



</body>
</html>

