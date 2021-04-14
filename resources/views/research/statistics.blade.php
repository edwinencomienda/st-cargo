
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
        h1,h2,h3,h4,h5{
            font-family: 'Nunito';
        }

        a:hover{
            text-decoration: none !important;
        }
    </style>
</head>
<body>
    @include('layouts.sidebar')

      {{-- sa main na ni --}}
      <div id="main">
        @include('layouts.nav')
        {{-- @include('consult.header') --}}
      </div>

<br><br><br>
<div class="w3-padding-64 w3-center"><img src="/backimage/lgu.png" height="125" width="125" alt=""></div>


<div class="container-fluid mt-3">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Farmer and Farmer's Parcel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">Baranggay Reports</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
      </li> --}}
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">


      <div id="home" class="container-fluid tab-pane active"><br>

        <h3>Farmer and Parcel</h3>

        <br>

        <div class="w3-row">
            <div class="w3-half w3-container">
                <div id="piechart_3d" style="width: 900px; height: 500px;">
                    <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                            ['Farmers', 'Total'],
                            <?php
                            $product = DB::table('users')->where('role', 6)->count();

                            echo "['Farmer',     $product],"; ?>

                            <?php
                            $p = DB::table('farmparcel')->count();

                            echo "['Parcel',     $p],"; ?>



                          ]);

                          var options = {
                            title: 'My Daily Activities',
                            is3D: true,
                          };

                          var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                          chart.draw(data, options);
                        }
                      </script>

                </div>
            </div>

<div class="w3-half w3-container">
 <div class="w3-panel w3-brown w3-padding-64">
    <?php
    $product = DB::table('users')->where('role', 6)->count();

    echo  $product; ?>
    <br><hr><br>
    Total Farmer

</div>
<br>

<div class="w3-panel w3-light-grey w3-padding-64">
    <?php
    $p = DB::table('farmparcel')->count();

    echo $p; ?>
    <br><hr><br>
    Total Lot Parcels occupied.
</div>
            </div>
          </div>
      </div>


      <div id="menu1" class="container-fluid tab-pane fade"><br>

<div class="w3-row">
  <div class="w3-half w3-container">
    <h2>Baranggay Report</h2>
    <table class="w3-table w3-bordered">
    <tr>
      <th></th>
      <th>Baranggay</th>
      <th>Total Parcels</th>
      <th>Total Hectares</th>
      <th>Average</th>
    </tr>
    <?php
    $t = 1;
    $pss = DB::table('baranggay')->get();
       foreach ($pss as $p) {
    ?>
    <tr>
      <td>{{$t}}</td>
      <td>{{$p->brgy}}</td>
      <td>
        <?php

    $g = DB::table('farmparcel')->where('location', $p->id)->count();
     echo $g;
    ?>
      </td>
      <td>
        <?php

$g = DB::table('farmparcel')->where('location', $p->id)->sum('hectare');
 echo $g;
?>
      </td>
      <td>
        <?php

$g = DB::table('farmparcel')->where('location', $p->id)->avg('hectare');
 echo $g;
?>
      </td>
    </tr>
<?php $t++; } ?>
</table>

  </div>
  <div class="w3-half w3-container">
    <h2>Farmer and Parcel</h2>
  </div>
</div>

      </div>



      <div id="menu2" class="container-fluid tab-pane fade"><br>
        <table class="w3-table w3-bordered">
    <tr>
      <th></th>
      <th>Baranggay</th>
      <th>Total Parcels</th>
      <th>Total Hectares</th>
      <th>Average</th>
    </tr>
    <?php
    $t = 1;
    $pss = DB::table('baranggay')->get();
       foreach ($pss as $p) {
    ?>
    <tr>
      <td>{{$t}}</td>
      <td>{{$p->brgy}}</td>
      <td>
        <?php

    $g = DB::table('farmparcel')->where('location', $p->id)->count();
     echo $g;
    ?>
      </td>
      <td>
        <?php

$g = DB::table('farmparcel')->where('location', $p->id)->sum('hectare');
 echo $g;
?>
      </td>
      <td>
        <?php

$g = DB::table('farmparcel')->where('location', $p->id)->avg('hectare');
 echo $g;
?>
      </td>
    </tr>
<?php $t++; } ?>
</table>

      </div>




    </div>
  </div>


    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>

</body>
</html>

