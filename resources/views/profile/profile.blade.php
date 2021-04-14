
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

        a::hover{
            text-decoration: none !important;
            font-family: 'Nunito' !important;
        }
        .w3-nav1{
            padding-right: 22px;
            padding-left: 22px;
        }
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


    </style>
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






        <div class="w3-content w3-margin-top" style="max-width:100% !important;">

            <!-- The Grid -->
            <div class="w3-row-padding">

              <!-- Left Column -->
              <div class="w3-third">

                <div class="w3-white w3-text-grey w3-card-4">
                  <div class="w3-display-container">
<?php  $profpic = DB::table('profpicture')->where('uuid',Auth::user()->uuid)
->orderBy('id','DESC')->take(1)->get();
foreach ($profpic as $p) {
    if($profpic->count() > 0){ ?>
       <img src="{{URL::to($p->profpic)}}" style="width:100%">
    <?php }

    else{ ?>
        <img src="/backimage/agri.png" style="width:100%">
   <?php } ?>

  <div class="w3-bar w3-padding-16 w3-center w3-display-bottomright w3-white w3-card-4"
  style="width: 28%;">
      <a href="#editimage{{$p->id}}" type="button" class="btn btn-outline-warning"
          data-toggle="modal" title="Edit">
          <i class="fas fa-edit" style="font-size: 16px;"></i>
      </a>
      <a href="#deleteimage{{$p->id}}" type="button" class="btn btn-outline-danger"
          data-toggle="modal" title="Delete">
          <i class="fas fa-eraser" style="font-size: 16px;"></i>
      </a>
      @include('profile.edit')
    </div>
<?php }?>

                    <div class="w3-display-bottomleft w3-container w3-brown">

                        <br>
                      <h2 class="w3-text-white">{{Auth::user()->name}}</h2>

                    </div>
                  </div>
                  <div class="w3-container">
<br>
                    <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
                        {{Auth::user()->email}}
                    </p>

                    <hr>

                    <?php  $emp = DB::table('employeeprofile')->where('uuid',Auth::user()->uuid)
                    ->orderBy('id','DESC')->take(1)->get();
                    if($emp->count() > 0){
                    foreach ($emp as $ep) {
                        ?>
                        <br> <p><i class="fas fa-user-tie"></i>
                            {{$ep->lname}}, {{$ep->fname}} {{$ep->mname}}</p>
                            <p><i class="fas fa-stopwatch-20"></i> @php
                                $date  = \Carbon\Carbon::parse($ep->birth_date);
                                echo $date->toDayDateTimeString();
                                @endphp</p>
                    <?php }}

                    else{ ?>
  <button type="button" class="btn w3-brown btn-block" data-toggle="modal" data-target="#myModal">
    <i class="fas fa-plus"></i> Add Profile
  </button>
   @include('profile.add')
<br>
<?php

}?>

                    </div>
                </div><br>

              <!-- End Left Column -->
              </div>

              <!-- Right Column -->
              <div class="w3-twothird">


                <div class="w3-container w3-card w3-white">
                  <h2 class="w3-text-grey w3-padding-16">
                      <i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
                  <div class="w3-container">

                    <?php  $emp = DB::table('employeeprofile')->where('uuid',Auth::user()->uuid)
                    ->orderBy('id','DESC')->take(1)->get();
                    foreach ($emp as $ep) { ?>

                    <h5 class="w3-opacity"><b><h3>
                       Doctorate Degree</h3></b></h5>
                    <h6 class="w3-text-teal">
                        <i class="fas fa-graduation-cap"></i> {{$ep->postgrad}}
                    </h6>
                    <hr>

                    <h5 class="w3-opacity"><b><h3>
                        Masteral Degree</h3></b></h5>
                     <h6 class="w3-text-teal">
                         <i class="fas fa-graduation-cap"></i> {{$ep->graduate}}
                     </h6>
                     <hr>

                     <h5 class="w3-opacity"><b><h3>
                        Undergraduate Degree</h3></b></h5>
                     <h6 class="w3-text-teal">
                         <i class="fas fa-graduation-cap"></i> {{$ep->undergrad}}
                     </h6>
                     <hr>
                     <div class="w3-bar w3-padding-16 w3-left  w3-white"
                     style="width: 28%;">
                         <a href="#editprof{{$ep->id}}" type="button" class="btn btn-outline-warning"
                             data-toggle="modal" title="Edit">
                             <i class="fas fa-edit" style="font-size: 16px;"></i>
                         </a>
                         <a href="#deleteprof{{$ep->id}}" type="button" class="btn btn-outline-danger"
                             data-toggle="modal" title="Delete">
                             <i class="fas fa-eraser" style="font-size: 16px;"></i>
                         </a>
                         @include('profile.edits')
                       </div>
                   <?php }?>
                  </div>
                </div>

              <!-- End Right Column -->
              </div>

            <!-- End Grid -->
            </div>

            <!-- End Page Container -->
          </div>


    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>
    </div>

@yield('scripts')

</body>
</html>


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
