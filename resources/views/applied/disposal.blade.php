
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




        <main class="py-4" style="margin-bottom: -3%">

            <div class="w3-row w3-padding-64 w3-brown">
                <div class="w3-half w3-container w3-white w3-padding-64">
                 <h1><img src="/backimage/lgu.png" height="122" width="122" alt=""> CAGRO Machineries Disposal
                <sup> <span class="w3-badge w3-red w3-padding-16" title="Today's Request">
                    @php
                    $users = DB::table('disposaltractor')->where('delivery_date', Now())->count();
                    echo $users;
                      @endphp
                      </span></sup>
                </h1>

                </div>
                <div class="w3-half w3-container w3-brown">
                    <br><br><br><br>
                <div class="row w3-padding-32" style="padding-left:24px; padding-right:24px;">
                    <div class="w3-container w3-cell w3-mobile">
                        <div class="w3-card-4">

                            <header class="w3-container w3-white w3-padding-16">
                             <h3>Disk Plowing Left</h3>
                            </header>

                            <div class="w3-container w3-padding-16 text-center ">
                                <h3>
                                @php
                                $users = DB::table('trinventory')->where('service_type',1)->sum('qty')
                                -DB::table('disposaltractor')->where('service_type',1)->where('tractor_status','Return')->sum('quantity')
                                -DB::table('disposaltractor')->where('service_type',1)->where('tractor_status','Unreturn')->sum('quantity');
                                echo $users;
                                @endphp
                                </h3>
                            </div>
                            </div>

                      </div>
                      <div class="w3-container  w3-cell w3-mobile">
                        <div class="w3-card-4">

                            <header class="w3-container w3-white w3-padding-16">
                             <h3>Harrow Plowing Left</h3>
                            </header>

                            <div class="w3-container w3-padding-16 text-center ">
                                <h3>
                                @php
                                $users = DB::table('trinventory')->where('service_type',2)->sum('qty')
                                -DB::table('disposaltractor')->where('service_type',2)->where('tractor_status','Return')->sum('quantity')
                                -DB::table('disposaltractor')->where('service_type',2)->where('tractor_status','Unreturn')->sum('quantity');
                                echo $users;
                                @endphp
                                </h3>
                            </div>



                            </div>
                      </div>
                      <div class="w3-container w3-cell w3-mobile">
                        <div class="w3-card-4">

                            <header class="w3-container w3-white w3-padding-16">
                             <h3><i class="fas fa-calendar-day"></i> Today
                                <sup><span class="w3-badge w3-red">
                                @php
                                $users = DB::table('disposaltractor')->where('delivery_date', Now())->count();
                                echo $users;
                                  @endphp
                                  </span>
                                  </sup>
                             </h3>
                            </header>

                            <div class="w3-container w3-padding-16 text-center ">
                                <h3>
                                    <i class="fas fa-cart-plus"></i>All
                                    <sup><span class="w3-badge w3-red">
                                        @php
                              $users = DB::table('disposaltractor')->count();
                              echo $users;
                                @endphp
                                </span>
                            </sup>
                                </h3>
                            </div>
                            </div>
                      </div>



                </div>
                </div>
              </div>

<div class="w3-white w3-card-4 w3-padding-64">
@if(Session::has('error'))
<div class="w3-panel w3-display-container w3-pale-red w3-card-4 w3-padding-16" style="margin-left: 5%;margin-right:5%;">
    <span onclick="this.parentElement.style.display='none'"
    class="w3-button w3-display-topright">X</span>
    {{Session::get('error')}}
  </div>
@endif

@if(Session::has('success'))
<div class="w3-panel w3-display-container w3-pale-green w3-card-4 w3-padding-16" style="margin-left: 5%;margin-right:5%;">
    <span onclick="this.parentElement.style.display='none'"
    class="w3-button w3-display-topright">X</span>
    {{Session::get('success')}}
  </div>
@endif


  <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
    <table class="table table-bordered w3-card-4 display" id="inventory">
      <thead>
        <tr class="w3-brown">
                <th>ID</th>
                <th>Farmer</th>
                <th>Date Dispose</th>
                <th>Service Type</th>
                <th>Machine Name</th>
                <th>Quantity</th>
                <th>Administered</th>
                <th>Status</th>
                <th>Date Return</th>
                <th>Received By:</th>
                <th>Actions</th>
              </tr>
      </thead>
      <tbody>
        @foreach ($dispose as $dis)
              <tr>
                <td>{{$dis->id}}</td>
                <td>
                    {{-- {{$dis->farmer}} --}}
                    @php
$bgt = DB::table('farmerprofile')->where('uuid', $dis->farmer)->get();
foreach ($bgt as $bg) {
echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
}
                @endphp
                </td>

                <td>{{$dis->delivery_date}}</td>
                <td> @php
                    $sss = DB::table('tractorservice')->where('id', $dis->service_type)->get();
                    foreach ($sss as $key => $s) {
                        echo $s->service;
                    }
                @endphp</td>
                <td>{{$dis->tractor}}</td>
                <td>{{$dis->quantity}}</td>
                <td>@php
                     $bgt = DB::table('employeeprofile')->where('uuid', $dis->admin)->get();
foreach ($bgt as $bg) {
    echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
}
                @endphp</td>
                <td>{{$dis->tractor_status}}</td>
                <td>{{$dis->date_ret}}</td>
                <td>@php
                    $bgt = DB::table('employeeprofile')->where('uuid', $dis->admin_ret)->get();
foreach ($bgt as $bg) {
   echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
}
               @endphp</td>
               <td>
                <a href="#edituser{{$dis->id}}" type="button" class="btn w3-brown"
                    data-toggle="modal" title="Approve for Delivery" style="margin-bottom: 3px;">
                    <i class="fas fa-check-double"></i> Approve Delivery
                </a>
                <a href="#resched{{$dis->id}}" type="button" class="btn w3-brown"
                    data-toggle="modal" title="Return the Machinery" style="margin-bottom: 3px;">
                    <i class="fas fa-undo-alt"></i> Reschedule
                </a>

                <a href="#return{{$dis->id}}" type="button" class="btn w3-brown"
                    data-toggle="modal" title="Return the Machinery" style="margin-bottom: 3px;">
                    <i class="fas fa-undo-alt"></i> Return Machine
                </a>
<br>
                <a href="#info{{$dis->id}}" type="button" class="btn w3-brown"
                    data-toggle="modal" title="Send Support Message" style="margin-bottom: 3px;">
                    <i class="fas fa-comment"></i> Send Notificaation
                </a>


                <a href="#deleteuser{{$dis->id}}" type="button" class="btn w3-red"
                    data-toggle="modal" title="Delete">
                    <i class="fas fa-eraser"></i> Delete
                </a>
                @include('applied.include.disedit')
               </td>
              </tr>
              @endforeach

            </tbody>
        </table>
    </div>
</div>

        </main>


    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -1%">
       @include('footer')
    </footer>
    </div>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> --}}
<script>
 $(document).ready( function () {
    $.noConflict();
    var table = $('#inventory').DataTable();
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
