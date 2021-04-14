
@php
     $reply = DB::table('farmerprofile')->where('uuid', Auth::user()->uuid)->get();
            if ($reply->count() > 0) {
                return redirect()->to('FarmersSectorDashboard')->send();
            
            //   echo '<script> Please g! </script>';
                    }
                    else {
                    echo '<script> alert("Please Fill your profile!"); " </script>';
                    }

@endphp


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
            /* border-top:none !important;
            border-left: none !important;
            border-right: none !important;
            border-bottom: solid !important;
            border-bottom-color: #bc986a !important; */
            height: 44px !important;
            padding: 5px 5% !important;
            border: solid .8px !important;

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

        .flts{
            padding-left: 11%;
            padding-right: 11%;
        }
    </style>
</head>
<body>


        <div class="w3-card">
            @include('consult.head')
        </div>

<br>
        <div class="container w3-white w3-padding-64 flts">

            <div class="w3-center w3-padding-64"><img src="/backimage/lgu.png" height="100" width="100" alt=""></div>


            <form action="{{ route('registwo.store')}}" method="POST" enctype="multipart/form-data" onsubmit="checkFormfa(this);">
                @csrf



                <div class="w3-row">
                    <div class="w3-half w3-container">
                        <p>
                            <label class="w3-text-teal">Picture</label>
                            <input class="w3-input" type="file" name="idpicture" required>
                        </p>
                    </div>
                    <div class="w3-half w3-container">
{{-- 
                <p>
                    <label class="w3-text-teal">Enrollment</label>
                    <select class="w3-select" name="farm_exi" required>
                     <option value="" disabled selected>Choose Enrollment</option>
                     <option value="New">New </option>
                     <option value="Existing">Existing</option>
                   </select>
                </p>


                <p>
                    <label class="w3-text-teal">Reference No</label>
                    <input class="w3-input" type="text" name="ref_no" required>
                   </p> --}}


                   <p>
                    <label class="w3-text-teal">First Name</label>
                    <input class="w3-input" type="text" name="fname">
                   </p>



                   <p>
                    <label class="w3-text-teal">Middle Name</label>
                    <input class="w3-input" type="text" name="mname">
                   </p>

                   <p>
                    <label class="w3-text-teal">Last Name</label>
                    <input class="w3-input" type="text" name="lname" required>
                   </p>

                   <p>
                    <label class="w3-text-teal">Name Extension</label>
                    <input class="w3-input" type="text" name="exname">
                   </p>

                    </div>
                  </div>



                 <input class="w3-input" type="hidden" name="uuid" value="{{Auth::user()->uuid}}" required>

                 <div class="w3-row">

                <p>
                    <label class="w3-text-teal">Gender</label>
                    <select class="w3-select" name="gender" required>
                     <option value="" disabled selected>Choose your Gender</option>
                     <option value="Male">Male </option>
                     <option value="Female">Female</option>
                   </select>
                </p>

                  </div>


                  <div class="w3-row">
                    <div class="w3-half w3-container">
                        <p>
                            <label class="w3-text-teal">House/Purok/Street Number</label>
                            <input class="w3-input" name="houseno" type="text" required>
                        </p>

                        <p>
                         <label class="w3-text-teal">House/Purok/Street</label>
                         <input class="w3-input" name="street" type="text" required>
                     </p>

                        <p>
                         <label class="w3-text-teal">Barangay</label>
                         <select class="w3-select" name="brgy" required>
                          <option value="" disabled selected>Choose your Barangay</option>
                          <?php
                          $brgy = DB::table('baranggay')->get();

                         foreach ($brgy as $brgy) { ?>
                          <option value="{{$brgy->id}}">{{$brgy->brgy}}</option>';
                      <?php   }
                      ?>

                        </select>
                     </p>


                    </div>
                    <div class="w3-half w3-container">
                        <p>
                            <label class="w3-text-teal">City</label>
                            <input class="w3-input" name="city" type="text"  value="Panabo" readonly required>
                        </p>

                        <p>
                            <label class="w3-text-teal">Province</label>
                            <input class="w3-input" name="province" type="text"  value="Davao del Norte" readonly required>
                        </p>

                        <p>
                            <label class="w3-text-teal">Contact Number</label>
                            <input class="w3-input" name="contact" type="text" required>
                        </p>

                        <p>
                            <label class="w3-text-teal">Birthday</label>
                            <input class="w3-input" name="birthdate" type="date"  required>
                        </p>

                        <p>
                            <label class="w3-text-teal">Place of Birth</label>
                            <input class="w3-input" name="birthplace" type="text"  required>
                        </p>

                    </div>
                  </div>



                <br>

                    <button type="submit" class="w3-bar-item w3-button w3-brown" name="submit1" style="width:100%">
                        <i class="fas fa-paper-plane"></i> Submit
                    </button>

            </form>



        </div>


<br><br>
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


<script>
    function checkFormfa(form)
    {

      form.submit1.disabled = true;
      form.submit1.value = "Please wait...";
      return true;
    }
  </script>
