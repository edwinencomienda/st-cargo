
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        h1,h2,h3,h4,h5{
            font-family: 'Nunito';
        }
        a:hover{
            text-decoration: none !important;
        }
    </style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-brown w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">
      <img src="/backimage/agri.png" height="85" width="85" alt="">
  </span>

</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-brown w3-animate-left" style="z-index:3;width:400px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/backimage/agri.png" class="w3-circle w3-margin-right" width="88" height="88">
    </div>
    <div class="w3-col s8 w3-bar w3-right" style="font-size: 18px;">
      <span>Welcome, <strong>{{Auth::user()->name}}</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>

      <a href="{{ route('logout') }}" class="w3-bar-item w3-button"
      data-toggle="tooltip" data-placement="bottom" title=" {{ __('Logout') }}"  onclick="event.preventDefault();
      document.getElementById('logout-form').submit();" >
        <i class="fas fa-sign-out-alt"></i>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <br><br>
    </div>
    <br><br><br>
    <div class="w3-card-4 w3-padding-64" style="padding-left:15px !important; padding-right:15px;">

        <h3><i class='fas fa-envelope-open-text'></i> &nbsp;&nbsp;{{Auth::user()->name}}</h3>
        <h3><i class='fa fa-users-cog'></i>&nbsp;&nbsp;{{Auth::user()->email}}</h3>
<br><br>
        <?php
            $product = DB::table('users')->where('uuid', Auth::user()->uuid)->get();
            foreach ($product as $prs) { ?>

                <a href="{{ URL::to("/rsbsa/".$prs->id) }}" type="button" class="btn btn-block w3-white"
                 title="RSBSA Profile">
                    <i class="fas fa-user-tie" style="font-size: 22px"></i> See RSBSA Profile
                </a>
          <?php  } ?>


    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h3><a class="" href="{{route('farmers')}}"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a></h3>
    <h3><a class="" href="{{route('farm.act')}}"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;Activity</a></h3>
   <h3> <a class="" href="{{route('farm.tut')}}"><i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;&nbsp;&nbsp;Tutorials</a></h3>
   <h3> <a class="" href="{{route('farm.bill')}}"><i class="fas fa-money-bill"></i>&nbsp;&nbsp;&nbsp;&nbsp;Bill</a></h3>
   <h3> <a class="" href="{{route('farmcrop.reviewing')}}"><i class="fas fa-chalkboard"></i>&nbsp;&nbsp;&nbsp;&nbsp;Review</a></h3>

    <h3><i class="fa fa-tachometer-alt"></i> &nbsp;&nbsp;Dashboard</h3>
  </div>
  <div class="w3-bar-block" style="font-size: 18px;">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
  </div>


</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:400px;margin-top:82px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:122px">

    <h5><b><i class="fa fa-tachometer-alt"></i> My Dashboard</b></h5>
    <h5><b><i></i></b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-brown w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
            @php
            $users = DB::table('reply')->where('farmer', Auth::user()->uuid)->count();
            echo $users;
              @endphp
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Support</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-brown w3-padding-16">
        <div class="w3-left"><i class="fa fa-crow w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
            @php
            $users = DB::table('animalrequest')->where('farmer', Auth::user()->uuid)->count();
            echo $users;
            @endphp
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Livestock Request</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-brown w3-padding-16">
        <div class="w3-left"><i class="fa fa-fish w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
            @php
            $users = DB::table('fishrequest')->where('farmer', Auth::user()->uuid)->count();
            echo $users;
            @endphp
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Fishery Request</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-brown w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-seedling w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
            @php
            $users = DB::table('croprequest')->where('farmer', Auth::user()->uuid)->count();
            echo $users;
            @endphp
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Crop Request</h4>
      </div>
    </div>
  </div>



<div class="w3-center">
    <div class="w3-left">

<?php $farms = DB::table('farmerprofile')->where('uuid',  Auth::user()->uuid)->get();
if (!$farms->isEmpty())  {
    foreach ($farms as $fmp) { ?>
    <div class="w3-row w3-padding-64 w3-card-4 w3-brown">
        <div class="w3-third w3-container w3-padding-16">
            <img src="{{URL::to($fmp->idpicture)}}" width="255" height="255" alt="">
        </div>
        <div class=" w3-twothird w3-container">
            <div class="w3-container w3-cell">
               <h3>Name: {{$fmp->fname}} {{$fmp->mname}} {{$fmp->lname}}</h3>
               <h3>Sex: {{$fmp->gender}}</h3>
               <h3>Location: {{$fmp->houseno}} {{$fmp->street}}, {{$fmp->brgy}} {{$fmp->city}}</h3>
               <h3>Mobile Number: {{$fmp->contact}}</h3>
            </div>

              <div class="w3-container w3-cell">
                <h3>Birthdate:
                    @php
$date  = \Carbon\Carbon::parse($fmp->created_at);
echo $date->toDayDateTimeString();
@endphp
                </h3>
                <h3>Birth place: {{$fmp->birthplace}}</h3>
                <br><br>
                <?php
                $product = DB::table('users')->where('uuid', Auth::user()->uuid)->get();
                foreach ($product as $prs) { ?>

                    <a href="{{ URL::to("/rsbsa/".$prs->id) }}" type="button" class="btn btn-block w3-white"
                     title="RSBSA Profile">
                        <i class="fas fa-user-tie" style="font-size: 22px"></i> See RSBSA Profile
                    </a>
              <?php  } ?>
              </div>
        </div>
    </div>
  <?php  }}
    else { ?>
       <?php
       $product = DB::table('users')->where('uuid', Auth::user()->uuid)->get();
       foreach ($product as $prs) { ?>

           <a href="{{ URL::to("/rsbsa/".$prs->id) }}" type="button" class="btn btn-block w3-white"
            title="RSBSA Profile">
               <i class="fas fa-user-tie" style="font-size: 22px"></i> See RSBSA Profile
           </a>
     <?php  } ?>
  <?php  }?>




    </div>
</div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
          &nbsp;
      </div>
      <div class="w3-twothird">
        <h5>Request</h5>

        <table class="w3-table w3-striped w3-white">
            <tr class="w3-brown">
                <td class="text-center" colspan="3">
                  My Latest Fish Request
                </td>
            </tr>

            <?php
        $product = DB::table('fishrequest')
        ->where('farmer', Auth::user()->uuid)->limit(5)->latest()->get();
foreach ($product as $p) {?>
<tr>
            <td><i class="fa fa-fish w3-text-blue w3-large"></i>
               @php
        $fp = DB::table('fishproduct')
        ->where('id', $p->products)->get();
        foreach ($fp as $key => $f) {
            echo $f->products;
        }
               @endphp {{$p->quantity}}
            </td>
            <td>{{$p->approved}} and {{$p->status}} </td>
            <td><i>   @php
                $date  = \Carbon\Carbon::parse($p->created_at);
                echo $date->toDayDateTimeString();
                @endphp</i></td>
          </tr>
        <?php } ?>
        </table>
<br><br>
        <table class="w3-table w3-striped w3-white">
            <tr class="w3-brown">
                <td class="text-center " colspan="3">
                   My Latest Livestock Request
                </td>
            </tr>
            <?php
        $product = DB::table('animalrequest')
        ->where('farmer', Auth::user()->uuid)->limit(5)->latest()->get();
foreach ($product as $pr) { ?>

       <tr>
            <td><i class="fa fa-crow w3-text-blue w3-large"></i>
                @php
                $fp = DB::table('animalproduct')
                ->where('id', $pr->products)->get();
                foreach ($fp as $key => $f) {
                    echo $f->products;
                }
                @endphp {{$pr->quantity}}
            </td>
            <td>{{$pr->approved}} and {{$pr->status}} </td>
            <td><i>
                @php
$date  = \Carbon\Carbon::parse($pr->created_at);
echo $date->toDayDateTimeString();
@endphp</i></td>
          </tr>
          <?php } ?>
        </table>

        <br><br>
        <table class="w3-table w3-striped w3-white">
            <tr class="w3-brown">
                <td class="text-center " colspan="3">
                   My Latest Crops Request
                </td>
            </tr>
            <?php
        $product = DB::table('animalrequest')
        ->where('farmer', Auth::user()->uuid)->limit(5)->latest()->get();
        foreach ($product as $pro) { ?>
          <tr>
            <td><i class="fa fa-seedling w3-text-blue w3-large"></i>
                @php
                $fp = DB::table('cropproduct')
                ->where('id', $pro->products)->get();
                foreach ($fp as $key => $f) {
                    echo $f->products;
                }
                @endphp {{$pro->quantity}}
            </td>
            <td>{{$pro->approved}} and {{$pro->status}}</td>
            <td><i> @php
                $date  = \Carbon\Carbon::parse($pro->created_at);
                echo $date->toDayDateTimeString();
                @endphp</i></td>
          </tr>
       <?php } ?>


        </table>

        <br><br>
        <table class="w3-table w3-striped w3-white">
            <tr class="w3-brown">
                <td class="text-center " colspan="3">
                   My Latest Tractor Request
                </td>
            </tr>
        <?php
        $product = DB::table('tractorrequest'
        )->where('uuid', Auth::user()->uuid)->limit(5)->latest()->get();
        foreach ($product as $prod) { ?>
          <tr>
            <td><i class="fa fa-tractor w3-text-blue w3-large"></i>
                @php
                $fp = DB::table('tractorservice')
                ->where('id', $prod->tractor_service)->get();
                foreach ($fp as $key => $f) {
                    echo $f->service;
                }
                @endphp
                </td>
            <td>{{$pro->approved}} and {{$pro->status}}</td>
            <td><i>
                @php
                $date  = \Carbon\Carbon::parse($prod->created_at);
                echo $date->toDayDateTimeString();
                @endphp
                </i></td>
          </tr> <?php } ?>

        </table>


      </div>
    </div>
  </div>
  <hr>



  <div class="w3-container">
    <h5>Latest Activities</h5>
    <div class="w3-row" style="padding-left: 0 !important;padding-right: 0 !important;">
    <?php
    $act = DB::table('activity')
    ->limit(2)->latest()->get();
    foreach ($act as $active) { ?>

  <div class="w3-col s4 w3-card-4" style="padding-left: 0 !important;padding-right: 0 !important; margin-right:25px; margin-bottom:15px;">
    <?php
    if ( substr($active->visual,-3) == 'jpg'){ ?>
    <img class="w3-round w3-animate-fade" src="{{URL::to($active->visual)}}"
    width="100%" height="277">

<?php }
    if (substr($active->visual,-3) == 'mp4') { ?>
    <video width="150" height="150" controls>
        <source src="{{URL::to($active->visual)}}" type="video/mp4">
        </video>

<?php    }
?>

<footer class="w3-brown"> &nbsp;</footer>
{{$active->title}}
  </div>

  <?php } ?>
</div>


    {{-- <button class="w3-button w3-dark-grey">More Activities  <i class="fa fa-arrow-right"></i></button> --}}
  </div>
  <hr>





  <div class="w3-container">
    <h5>Latest Tutorials</h5>
    <div class="w3-row" style="padding-left: 0 !important;padding-right: 0 !important;">
    <?php
    $act = DB::table('tutorials')
    ->limit(2)->latest()->get();
    foreach ($act as $active) { ?>

  <div class="w3-col s4 w3-card-4" style="padding-left: 0 !important;padding-right: 0 !important; margin-right:25px; margin-bottom:15px;">
    <?php
    if ( substr($active->visual,-3) == 'jpg'){ ?>
    <img class="w3-round w3-animate-fade" src="{{URL::to($active->visual)}}"
    width="100%" height="277">

<?php }
    if (substr($active->visual,-3) == 'mp4') { ?>
    <video width="150" height="150" controls>
        <source src="{{URL::to($active->visual)}}" type="video/mp4">
        </video>

<?php    }
?>

<footer class="w3-brown"> &nbsp;</footer>
{{$active->title}}
  </div>

  <?php } ?>
</div>


    {{-- <button class="w3-button w3-dark-grey">More Tutorial  <i class="fa fa-arrow-right"></i></button> --}}
  </div>
  <hr>





  <hr>


  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Agricultural Assistance</h5>
        <p>You can ask for recommendation for the loans</p>


      </div>

      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">Agricultural Requests</h5>
        <p> You can request agricultural products such as fish fingerling..</p>

      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Agricultural Billings</h5>

        <p>This is only the list of your billings, we cannot cater payments.</p>

      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
  @include('footer')
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
