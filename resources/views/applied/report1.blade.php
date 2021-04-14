
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

      <div class="container-fluid mt-3">
        <div class="w3-center"><img src="/backimage/lgu.png" height="122" width="122" alt=""></div>
        <h2 class="w3-padding-32">Tractor Reports</h2>
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Unreturned Tractor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Return Tractor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Inventory Report</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">





          <div id="home" class="container-fluid tab-pane active"><br>
            <h3>Unreturn Tractor</h3>


            <div class="table-responsive w3-padding-32 w3-white w3-card-4" style="padding-left: 24px; padding-right:24px;">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Farmer</th>
                      <th>Tractor</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
<?php $c = 1;?>
<?php

$reply = DB::table('disposaltractor')->where('tractor_status', 'Unreturn')->latest()->get();
foreach ($reply as $tr) { ?>

                    <tr>
                        <td><?php echo $c;?></td>
                      <td>
                            @php
                                $name = DB::table('farmerprofile')->where('uuid', $tr->farmer)->get();
                                if ($name->count() < 0) {
                                    echo 'Unknown';
                                }
                                else {
                                    foreach ($name as $n) {
                                        echo $n->lname . ' '. $n->fname . ' ' . $n->mname;
                                }
                                }
                            @endphp
                    </td>


                      <td>
                        {{$tr->tractor}}
                      </td>
                      <td>{{$tr->quantity}}</td>
                      <td>{{$tr->tractor_status}}</td>
                      <td>
                        @php
                        $date  = \Carbon\Carbon::parse($tr->delivery_date);
                        echo $date->toDayDateTimeString();
                        @endphp

                      </td>
                    </tr>
                    <?php $c++;?>
                <?php } ?>
                  </tbody>
                </table>
              </div>



          </div>






          <div id="menu1" class="container-fluid tab-pane fade"><br>

            <div id="home" class="container-fluid tab-pane active"><br>
                <h3>Return Tractor</h3>


                <div class="table-responsive w3-padding-32 w3-white w3-card-4" style="padding-left: 24px; padding-right:24px;">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Farmer</th>
                          <th>Tractor</th>
                          <th>Quantity</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Date Return</th>
                        </tr>
                      </thead>
                      <tbody>
    <?php $c = 1;?>
    <?php

    $reply = DB::table('disposaltractor')->where('tractor_status', 'Return')->latest()->get();
    foreach ($reply as $tr) { ?>

                        <tr>
                            <td><?php echo $c;?></td>
                          <td>
                                @php
                                    $name = DB::table('farmerprofile')->where('uuid', $tr->farmer)->get();
                                    if ($name->count() < 0) {
                                        echo 'Unknown';
                                    }
                                    else {
                                        foreach ($name as $n) {
                                            echo $n->lname . ' '. $n->fname . ' ' . $n->mname;
                                    }
                                    }
                                @endphp
                        </td>


                          <td>
                            {{$tr->tractor}}
                          </td>
                          <td>{{$tr->quantity}}</td>
                          <td>{{$tr->tractor_status}}</td>
                          <td>
                            @php
                            $date  = \Carbon\Carbon::parse($tr->delivery_date);
                            echo $date->toDayDateTimeString();
                            @endphp

                          </td>
                          <td>
                            @php
                            $date  = \Carbon\Carbon::parse($tr->date_ret);
                            echo $date->toDayDateTimeString();
                            @endphp

                          </td>
                        </tr>
                        <?php $c++;?>
                    <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>

          </div>








          <div id="menu2" class="container-fluid tab-pane fade"><br>
            <h3>Inventory</h3>

            <div class="w3-row">
                <div class="w3-half w3-container">
                  &nbsp;
                </div>
                <div class="w3-half w3-container w3-brown w3-card-4 w3-padding-16">

                    <table class="w3-table w3-bordered">
                        <tr>
                          <th>Programs</th>
                          <th>Total Tractor</th>
                          <th>Unreturn</th>
                          <th>Left</th>
                        </tr>

                        <?php
                         $reply = DB::table('tractorservice')->get();
                         foreach ($reply as $es) {
                                ?>
                        <tr>
                          <td>{{$es->service}}</td>

                          <td>
                            @php

                            $users = DB::table('trinventory')->where('service_type',$es->id)->sum('qty');
                            echo $users;
                            @endphp
                          </td>

                          <td>
                            @php
                            $t = DB::table('disposaltractor')->where('service_type',$es->id)->where('tractor_status','Unreturn')->sum('quantity');
                            echo $t;
                            @endphp
                          </td>


                          <td>
                              @php

                                $g = DB::table('trinventory')->where('service_type',$es->id)->sum('qty')
                                -DB::table('disposaltractor')->where('service_type',$es->id)->where('tractor_status','Return')->sum('quantity')
                                -DB::table('disposaltractor')->where('service_type',$es->id)->where('tractor_status','Unreturn')->sum('quantity');
                                echo $g;
                              @endphp
                          </td>
                        </tr>

                   <?php } ?>
                      </table>


                </div>
              </div>
<br>
            <div class="table-responsive w3-padding-32 w3-white w3-card-4" style="padding-left: 24px; padding-right:24px;">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Service Description</th>
                      <th>Tractor Name</th>
                      <th>Tractor Model</th>
                      <th>Quantity</th>

                      <th>Date</th>

                    </tr>
                  </thead>
                  <tbody>
<?php $c = 1;?>
<?php

$reply = DB::table('trinventory')->latest()->get();
foreach ($reply as $tr) { ?>

                    <tr>
                        <td><?php echo $c;?></td>

                        <td>
                            @php
                            $sss = DB::table('tractorservice')->where('id', $tr->service_type)->get();
                            foreach ($sss as $key => $s) {
                                echo $s->service;
                            }
                        @endphp
                        </td>

                        <td>{{$tr->tractor_name}}</td>
                        <td>{{$tr->tractor_model}}</td>



                      <td>{{$tr->qty}}</td>

                      <td>
                        @php
                        $date  = \Carbon\Carbon::parse($tr->created_at);
                        echo $date->toDayDateTimeString();
                        @endphp

                      </td>

                    </tr>
                    <?php $c++;?>
                <?php } ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>





        </div>
      </div>















<br><br>




    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>

</body>
</html>

