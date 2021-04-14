
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
<div class="w3-padding-64 w3-center"><img src="/backimage/lgu.png" height="125" width="125" alt=""></div>

<div class="container-fluid mt-3">

    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Tractor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">Crops</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2">Fishery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu3">Livestock</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

      <div id="home" class="container-fluid tab-pane active"><br>
        <div class="w3-row">
            <div class="w3-half w3-container">
                <br>
              <h2 class="w3-center">Daily Disposal</h2>
              <br>
              <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                <table class="table table-bordered w3-card-4 display" id="inventory">
                  <thead>
                    <tr class="w3-brown">
                            <th>ID</th>
                            <th>Farmer</th>
                            <th>Date Dispose</th>

                            <th>Products Name</th>
                            <th>Quantity</th>
                            <th>Status</th>

                          </tr>
                  </thead>
                  <tbody>
                    <?php $f = 1;?>
                    <?php

                    $reply = DB::table('disposaltractor')->where('tractor_status', 'Return')->orWhere('tractor_status', 'Unreturn')->whereDate('delivery_date', \Carbon\Carbon::now())->latest()->get();
                    foreach ($reply as $dis) { ?>
                          <tr>
                            <td>{{$f}}</td>
                            <td>
                                @php
                                $bgt = DB::table('farmerprofile')->where('uuid', $dis->farmer)->get();
                                foreach ($bgt as $bg) {
                                echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
                                }
                               @endphp
                            </td>

                            <td>
                                @php
                                $date  = \Carbon\Carbon::parse($dis->delivery_date);
                                echo $date->toDayDateTimeString();
                                @endphp
                            </td>


                            <td> @php
                                $sss = DB::table('tractorservice')->where('id', $dis->service_type)->get();
                                foreach ($sss as $key => $s) {
                                    echo $s->service;
                                }
                            @endphp - {{$dis->tractor}}</td>

                            <td>{{$dis->quantity}}</td>

                            <td>{{$dis->tractor_status}}</td>
                    </tr>
                        <?php $f++;
                     } ?>

                        </tbody>
                    </table>
                </div>

            </div>


            <div class="w3-half w3-container">
                <br>
              <h2 class="w3-center">Monthly Report</h2>
                <br>
              <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                <table class="table table-bordered w3-card-4 display" id="inventory">
                  <thead>
                    <tr class="w3-brown">
                            <th>ID</th>
                            <th>Farmer</th>
                            <th>Date Dispose</th>

                            <th>Products Name</th>
                            <th>Quantity</th>
                            <th>Status</th>

                          </tr>
                  </thead>
                  <tbody>
                    <?php $f = 1;?>
                    <?php

                    $reply = DB::table('disposaltractor')->where('tractor_status', 'Return')->orWhere('tractor_status', 'Unreturn')->whereMonth('delivery_date', \Carbon\Carbon::now()->month)->latest()->get();
                    foreach ($reply as $dis) { ?>
                          <tr>
                            <td>{{$f}}</td>
                            <td>
                                @php
                                $bgt = DB::table('farmerprofile')->where('uuid', $dis->farmer)->get();
                                foreach ($bgt as $bg) {
                                echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
                                }
                               @endphp
                            </td>

                            <td>
                                @php
                                $date  = \Carbon\Carbon::parse($dis->delivery_date);
                                echo $date->toDayDateTimeString();
                                @endphp
                            </td>


                            <td> @php
                                $sss = DB::table('tractorservice')->where('id', $dis->service_type)->get();
                                foreach ($sss as $key => $s) {
                                    echo $s->service;
                                }
                            @endphp - {{$dis->tractor}}</td>

                            <td>{{$dis->quantity}}</td>

                            <td>{{$dis->tractor_status}}</td>
                    </tr>
                        <?php $f++;
                     } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
      </div>


      <div id="menu1" class="container-fluid tab-pane fade"><br>
        <div class="w3-row">
            <div class="w3-half w3-container">
                <br>
              <h2 class="w3-center">Daily</h2>
              <br>
              <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                <table class="table table-bordered w3-card-4 display" id="inventory">
                  <thead>
                    <tr class="w3-brown">
                            <th>ID</th>
                            <th>Farmer</th>
                            <th>Date Dispose</th>

                            <th>Crops Name</th>
                            <th>Quantity</th>
                            <th>Status</th>

                          </tr>
                  </thead>
                  <tbody>
                    <?php $c1 = 1;?>
                    <?php

                    $reply = DB::table('cropdispose')->where('rendered', 'Delivered')->whereDate('delivery_date', \Carbon\Carbon::now())->latest()->get();
                    foreach ($reply as $dis) { ?>
                          <tr>
                            <td>{{$c1}}</td>
                            <td>
                                @php
                                $bgt = DB::table('farmerprofile')->where('uuid', $dis->farmer)->get();
                                foreach ($bgt as $bg) {
                                echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
                                }
                                                @endphp
                            </td>


                            <td>
                                @php
                                $date  = \Carbon\Carbon::parse($dis->delivery_date);
                                echo $date->toDayDateTimeString();
                                @endphp
                            </td>

                            <td>
                                {{$dis->products}} -
                                @php
                                $ttt = DB::table('cropproduct')->where('id', $dis->products)->get();
                                foreach ($ttt as $key => $t) {
                                    echo $t->products;
                                }
                            @endphp
                            </td>
                            <td>{{$dis->quantity}}</td>
                            <td>{{$dis->rendered}}</td>
                          </tr>
                         <?php
                        $c1++;
                        }?>

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="w3-half w3-container">
                <br>
                <h2 class="w3-center">Monthly</h2>
                <br>
                <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                  <table class="table table-bordered w3-card-4 display" id="inventory">
                    <thead>
                      <tr class="w3-brown">
                              <th>ID</th>
                              <th>Farmer</th>
                              <th>Date Dispose</th>

                              <th>Crops Name</th>
                              <th>Quantity</th>
                              <th>Status</th>

                            </tr>
                    </thead>
                    <tbody>
                      <?php $c1 = 1;?>
                      <?php

                      $reply = DB::table('cropdispose')->where('rendered', 'Delivered')->whereMonth('delivery_date', \Carbon\Carbon::now()->month)->latest()->get();
                      foreach ($reply as $dis) { ?>
                            <tr>
                              <td>{{$c1}}</td>
                              <td>
                                  @php
                                  $bgt = DB::table('farmerprofile')->where('uuid', $dis->farmer)->get();
                                  foreach ($bgt as $bg) {
                                  echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
                                  }
                                                  @endphp
                              </td>


                              <td>
                                  @php
                                  $date  = \Carbon\Carbon::parse($dis->delivery_date);
                                  echo $date->toDayDateTimeString();
                                  @endphp
                              </td>

                              <td>
                                  {{$dis->products}} -
                                  @php
                                  $ttt = DB::table('cropproduct')->where('id', $dis->products)->get();
                                  foreach ($ttt as $key => $t) {
                                      echo $t->products;
                                  }
                              @endphp
                              </td>
                              <td>{{$dis->quantity}}</td>
                              <td>{{$dis->rendered}}</td>
                            </tr>
                           <?php
                          $c1++;
                          }?>

                          </tbody>
                      </table>
                  </div>

            </div>
        </div>
    </div>



      <div id="menu2" class="container-fluid tab-pane fade"><br>
        <div class="w3-row">

            <div class="w3-half w3-container">
                <br>
                <h2 class="w3-center">Daily</h2>
                <br>
                <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                  <table class="table table-bordered w3-card-4 display" id="inventory">
                    <thead>
                      <tr class="w3-brown">
                              <th>ID</th>
                              <th>Farmer</th>
                              <th>Date Dispose</th>

                              <th>Crops Name</th>
                              <th>Quantity</th>
                              <th>Status</th>

                            </tr>
                    </thead>
                    <tbody>
                      <?php $c1 = 1;?>
                      <?php

                      $reply = DB::table('fishdispose')->where('rendered', 'Delivered')->whereDate('delivery_date', \Carbon\Carbon::now())->latest()->get();
                      foreach ($reply as $dis) { ?>
                            <tr>
                              <td>{{$c1}}</td>
                              <td>
                                  @php
                                  $bgt = DB::table('farmerprofile')->where('uuid', $dis->farmer)->get();
                                  foreach ($bgt as $bg) {
                                  echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
                                  }
                                                  @endphp
                              </td>


                              <td>
                                  @php
                                  $date  = \Carbon\Carbon::parse($dis->delivery_date);
                                  echo $date->toDayDateTimeString();
                                  @endphp
                              </td>

                              <td>
                                  {{$dis->products}} -
                                  @php
                                  $ttt = DB::table('fishproduct')->where('id', $dis->products)->get();
                                  foreach ($ttt as $key => $t) {
                                      echo $t->products;
                                  }
                              @endphp
                              </td>
                              <td>{{$dis->quantity}}</td>
                              <td>{{$dis->rendered}}</td>
                            </tr>
                           <?php
                          $c1++;
                          }?>

                          </tbody>
                      </table>
                  </div>


            </div>

            <div class="w3-half w3-container">
                <br>
              <h2 class="w3-center">Monthly</h2>
              <br>
              <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                <table class="table table-bordered w3-card-4 display" id="inventory">
                  <thead>
                    <tr class="w3-brown">
                            <th>ID</th>
                            <th>Farmer</th>
                            <th>Date Dispose</th>

                            <th>Crops Name</th>
                            <th>Quantity</th>
                            <th>Status</th>

                          </tr>
                  </thead>
                  <tbody>
                    <?php $c1 = 1;?>
                    <?php

                    $reply = DB::table('cropdispose')->where('rendered', 'Delivered')->whereMonth('delivery_date', \Carbon\Carbon::now()->month)->latest()->get();
                    foreach ($reply as $dis) { ?>
                          <tr>
                            <td>{{$c1}}</td>
                            <td>
                                @php
                                $bgt = DB::table('farmerprofile')->where('uuid', $dis->farmer)->get();
                                foreach ($bgt as $bg) {
                                echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
                                }
                                                @endphp
                            </td>


                            <td>
                                @php
                                $date  = \Carbon\Carbon::parse($dis->delivery_date);
                                echo $date->toDayDateTimeString();
                                @endphp
                            </td>

                            <td>
                                {{$dis->products}} -
                                @php
                                $ttt = DB::table('fishproduct')->where('id', $dis->products)->get();
                                foreach ($ttt as $key => $t) {
                                    echo $t->products;
                                }
                            @endphp
                            </td>
                            <td>{{$dis->quantity}}</td>
                            <td>{{$dis->rendered}}</td>
                          </tr>
                         <?php
                        $c1++;
                        }?>

                        </tbody>
                    </table>
                </div>

            </div>
          </div>
    </div>



      <div id="menu3" class="container-fluid tab-pane fade"><br>
        <div class="w3-row">
            <div class="w3-half w3-container">
                <br>
                <h2 class="w3-center">Daily</h2>
                <br>
                <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                  <table class="table table-bordered w3-card-4 display" id="inventory">
                    <thead>
                      <tr class="w3-brown">
                              <th>ID</th>
                              <th>Farmer</th>
                              <th>Date Dispose</th>

                              <th>Crops Name</th>
                              <th>Quantity</th>
                              <th>Status</th>

                            </tr>
                    </thead>
                    <tbody>
                      <?php $c1 = 1;?>
                      <?php

                      $reply = DB::table('livestockdispose')->where('rendered', 'Delivered')->whereDate('delivery_date', \Carbon\Carbon::now())->latest()->get();
                      foreach ($reply as $dis) { ?>
                            <tr>
                              <td>{{$c1}}</td>
                              <td>
                                  @php
                                  $bgt = DB::table('farmerprofile')->where('uuid', $dis->farmer)->get();
                                  foreach ($bgt as $bg) {
                                  echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
                                  }
                                                  @endphp
                              </td>


                              <td>
                                  @php
                                  $date  = \Carbon\Carbon::parse($dis->delivery_date);
                                  echo $date->toDayDateTimeString();
                                  @endphp
                              </td>

                              <td>
                                  {{$dis->products}} -
                                  @php
                                  $ttt = DB::table('animalproduct')->where('id', $dis->products)->get();
                                  foreach ($ttt as $key => $t) {
                                      echo $t->products;
                                  }
                              @endphp
                              </td>
                              <td>{{$dis->quantity}}</td>
                              <td>{{$dis->rendered}}</td>
                            </tr>
                           <?php
                          $c1++;
                          }?>

                          </tbody>
                      </table>
                  </div>

            </div>
            <div class="w3-half w3-container">
                <br>
              <h2 class="w3-center">Monthly</h2>
              <br>
              <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                <table class="table table-bordered w3-card-4 display" id="inventory">
                  <thead>
                    <tr class="w3-brown">
                            <th>ID</th>
                            <th>Farmer</th>
                            <th>Date Dispose</th>

                            <th>Crops Name</th>
                            <th>Quantity</th>
                            <th>Status</th>

                          </tr>
                  </thead>
                  <tbody>
                    <?php $c1 = 1;?>
                    <?php

                    $reply = DB::table('livestockdispose')->where('rendered', 'Delivered')->whereMonth('delivery_date', \Carbon\Carbon::now()->month)->latest()->get();
                    foreach ($reply as $dis) { ?>
                          <tr>
                            <td>{{$c1}}</td>
                            <td>
                                @php
                                $bgt = DB::table('farmerprofile')->where('uuid', $dis->farmer)->get();
                                foreach ($bgt as $bg) {
                                echo $bg->lname . ' '. $bg->fname . ', ' . $bg->mname;
                                }
                                                @endphp
                            </td>


                            <td>
                                @php
                                $date  = \Carbon\Carbon::parse($dis->delivery_date);
                                echo $date->toDayDateTimeString();
                                @endphp
                            </td>

                            <td>
                                {{$dis->products}} -
                                @php
                                $ttt = DB::table('cropproduct')->where('id', $dis->products)->get();
                                foreach ($ttt as $key => $t) {
                                    echo $t->products;
                                }
                            @endphp
                            </td>
                            <td>{{$dis->quantity}}</td>
                            <td>{{$dis->rendered}}</td>
                          </tr>
                         <?php
                        $c1++;
                        }?>

                        </tbody>
                    </table>
                </div>

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

