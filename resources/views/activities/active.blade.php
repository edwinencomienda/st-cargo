
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


        <div class="w3-card">
            @include('consult.head')
            <div class="w3-row" id="SST" style="margin-top: -55px !important;z-index:-3 !important;">
                <div class="w3-col l12 s6" style="background-color:  #C0AB8E;">
                  <h1 class="text-right" id="jt" style="padding-right: 15px;">
                      <br><br>
                      <b style="font-size:22px;color:#61361e">ACTIVITY
                      <span style="font-size:32px;color:#f4f0bd">EVENTS</span></b>
                  </h1>
                </div>
              </div>
        </div>


        <main class="py-4" style="margin-top:-4% !important;">


            <div class="w3-row w3-card-4 w3-white">
                <div class="w3-half w3-container" style="width: 40% !important">

                    <div class="w3-center" id="qwe" style="margin-top: 35%">
                        <img src="/backimage/lgu.png" height="245" height="245" alt="">
                        <br><br>
                      <h1 style="font-size: 45px;">ACTIVITY AND EVENTS</h1>
                    </div>
                    <div class="w3-padding-32">
                        <?php $activity = DB::table('activity')->where('role', Auth::user()->role)->latest()->paginate(4);
                        foreach ($activity as $active){ ?>
                        <div id="{{$active->id}}" class="w3-container city w3-animate-opacity w3-card-4 w3-white"
                            style="display:none">
                            <div class="w3-center w3-padding-16"><img src="/backimage/lgu.png" height="75" width="75" alt=""></div>
            <div class="w3-padding-64 w3-center" >
                <?php
                if ( substr($active->visual,-3) == 'jpg'){ ?>
                <img class="w3-round w3-animate-fade" src="{{URL::to($active->visual)}}"
                width="500" height="500">;

            <?php }
                if (substr($active->visual,-3) == 'mp4') { ?>
                <video  width="500" height="500"controls>
                    <source src="{{URL::to($active->visual)}}" type="video/mp4">
                </video>

            <?php    }
            ?>

            <br><br>


            <a href="#edituser{{$active->id}}" type="button" class="btn btn-outline-warning"
                data-toggle="modal" class="w3-button w3-red">
                Edit <i class="fas fa-pen-square"></i>
            </a>

            <a href="#deleteuser{{$active->id}}" type="button" class="btn btn-outline-danger"
                data-toggle="modal" class="w3-button w3-brown">
                Delete <i class="fas fa-dumpster"></i>
            </a>
            <div class="text-left">
            @include('activities.edit')
            </div>
            </div>

            <div class="text-left" style="padding-left:24px;">
                <h2 class="w3-text-brown">Tittle: {{$active->title}}</h2>
                <h2 class="w3-text-brown">Where: {{$active->location}}</h2>
                <h2 class="w3-text-brown">When: {{$active->when}}</h2>

            </div>
            <br>
            <div style="padding-left: 24px;">
            {!! $active->content !!}

            {{$active->created_at}}
            <br>
            </div>
                        </div>
                     <?php } ?>
                    </div>
                </div>



                <div class="w3-half w3-half-1 w3-white w3-container" style="width: 60% !important">
                    <div class="w3-center w3-padding-16">
                        <img src="/backimage/da.png" height="111" width="111" alt="">
                    </div>

                    <h3 style="font-size: 24px; padding-top:64px;">CAGRO  Tutorials</h3>
            <br>


            <button type="button btn-block" class="btn w3-brown"
            data-toggle="modal" data-target="#myModal" style="width: 100%">
                <i class="far fa-file-image"></i>
                <i class="fas fa-plus" style="font-size: 27px;margin-right:-5px;"></i>Add
            </button>

        <div class="text-left">
            @include('activities.add')
        </div>
            <br>



            <div class="w3-card-4">
                <div class="table-responsive ert w3-padding-32">
                    <table class="table table-hover"
                    style="padding-left: 15px !important; padding-right:15px; !important"
                    id="tutor">
                    <thead>
                        <tr class="w3-brown">
                          <th>Id</th>
                          <th>Anouncement</th>
                          <th>Content</th>
                          <th>Title</th>
                          <th>Location</th>
                          <th>When</th>
                          <th>Infographics</th>
                          <th>Admin</th>
                          <th>Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="list" id="myTable">
                        <?php $activity = DB::table('activity')->where('role', Auth::user()->role)->latest()->paginate(4);
                          foreach ($activity as $active){ ?>


                        <tr>
                          <td>{{$active->id}}</td>
                          <td>@php
                            if ($active->role == 1) {
                                echo 'Machinery';
                            }
                            if ($active->role == 2) {
                                echo 'Crops';
                            }
                            if ($active->role == 3) {
                                echo 'Fishery';
                            }
                            if ($active->role == 4) {
                                echo 'Livestock';
                            }

                           @endphp</td>
                            <td>
                                ......{{substr($active->content, -57)}}</td>

                          <td>{{$active->title}}</td>
                          <td>{{$active->location}}</td>
                          <td>{{$active->when}}</td>

                          <td>
                        <?php
                            if ( substr($active->visual,-3) == 'jpg'){ ?>
                            <img class="w3-round w3-animate-fade" src="{{URL::to($active->visual)}}"
                            width="150" height="150">;

                        <?php }
                            if (substr($active->visual,-3) == 'mp4') { ?>
                            <video width="150" height="150" controls>
                                <source src="{{URL::to($active->visual)}}" type="video/mp4">
                                </video>';

                        <?php    }
                        ?>
                        </td>

                          <td>@php
                             $asst = DB::table('users')->where('role', Auth::user()->role)
                             ->where('uuid',$active->uuid)
                             ->get();
                      foreach ($asst as $key => $u)
                      {
                        echo $u->name;

                            }
                            @endphp
                            </td>
                          <td>{{$active->created_at}}</td>
                          <td style="overflow: hidden !important;">
                            <a href="javascript:void(0)" onclick="openCity(event, '{{$active->id}}')"
                                class="w3-button btn-block w3-teal w3-text-white tablink" title="Go Back!">
                                <i class="far fa-eye" style="font-size: 21px;"></i> See Activity
                            </a>
                            <a  href="{{ URL::to('/activity/delete/'.$active->id) }}"
                                onclick="return confirm('Do you really want to delete this?')"
                                class="w3-button btn-block w3-red">
                                Delete <i class="fas fa-dumpster"></i>
                            </a>
                          </td>

                        </tr>
                       <?php } ?>


                      </tbody>
                    </table>

                    <script>
                        function openCity(evt, cityName) {
                          var i, x, tablinks;
                          x = document.getElementsByClassName("city");
                          for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                            document.getElementById("qwe").style.display ="none";
                          }
                          tablinks = document.getElementsByClassName("tablink");
                          for (i = 0; i < x.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
                          }
                          document.getElementById(cityName).style.display = "block";
                          evt.currentTarget.className += " w3-red";
                        }
                        </script>
                    <br><br>

              </div>


            </div>
          <br>


                </div>
              </div>



        </main>


@push('scripts')

@endpush

    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
        @include('footer')
    </footer>
    </div>

@yield('scripts')

</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> --}}
<script>
 $(document).ready( function () {
    $.noConflict();
    var table = $('#tutor').DataTable();
    // $('#inventory').DataTable();
} );
</script>
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
