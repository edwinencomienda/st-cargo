
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


    <div class="w3-center w3-padding-64"><br><br><img src="/backimage/lgu.png" width="125" height="125" alt=""></div>




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
        <br><br>
        <div class="w3-half w3-container w3-brown w3-card-4 w3-padding-64 w3-right">

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

        <div class="w3-row">
            <br><br>

            <div class="w3-half w3-container ">
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


            <div class="w3-half w3-container">
                <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                    <table class="table table-bordered w3-card-4 display" id="inventory">
                      <thead>
                        <tr class="w3-brown">
                                <th>ID</th>

                                <th>Date Dispose</th>

                                <th>Machine Name</th>
                                <th>Quantity</th>

                                <th>Status</th>


                              </tr>
                      </thead>
                      <tbody>

                        <?php $d = 1;?>
                          <?php  $reply = DB::table('disposaltractor')->where('tractor_status', 'Return')->orWhere('tractor_status', 'Unreturn')->latest()->get();
                          foreach ($reply as $dis) { ?>

                              <tr>
                                <td>{{$d}}</td>


                                <td>{{$dis->delivery_date}}</td>
                                <td> @php
                                    $sss = DB::table('tractorservice')->where('id', $dis->service_type)->get();
                                    foreach ($sss as $key => $s) {
                                        echo $s->service;
                                    }
                                @endphp - {{$dis->tractor}}</td>

                                <td>{{$dis->quantity}}</td>

                                <td>{{$dis->tractor_status}}</td>

                                </tr>

                              <?php $d++;?>
                              <?php } ?>

                            </tbody>
                        </table>
                    </div>
            </div>


          </div>


      </div>



      <div id="menu1" class="container-fluid tab-pane fade"><br>
        <div class="w3-half w3-container w3-brown w3-card-4 w3-padding-16 w3-right">

            <table class="w3-table w3-bordered">
                <tr>
                  <th>Products</th>
                  <th>Total Products</th>
                  <th>Disposed</th>
                  <th>Left</th>
                </tr>

                <?php
                 $reply = DB::table('cropproduct')->latest()->get();
                 foreach ($reply as $es) {
                        ?>
                <tr>
                  <td>
                    @php
                    // $ttt = DB::table('cropproduct')->where('id', $es->crop_product)->get();
                    // foreach ($ttt as $key => $t) {
                    //     echo $t->products;
                    // }
                    echo $es->products;
                    @endphp
                  </td>

                  <td>
                    @php

                    $users = DB::table('cropinventory')->where('crop_product',$es->id)->sum('qty');
                    echo $users;
                    @endphp
                  </td>

                  <td>
                    @php
                    $t = DB::table('cropdispose')->where('products',$es->id)->where('rendered','Delivered')->sum('quantity');
                    echo $t;
                    @endphp
                  </td>


                  <td>
                      @php

                        $g = DB::table('cropinventory')->where('crop_product',$es->id)->sum('qty')
                        -DB::table('cropdispose')->where('products',$es->id)->where('rendered','Delivered')->sum('quantity');
                        // -DB::table('disposaltractor')->where('service_type',$es->id)->where('tractor_status','Unreturn')->sum('quantity');
                        echo $g;
                      @endphp
                  </td>
                </tr>

           <?php } ?>
              </table>


        </div>

        <div class="w3-row">
            <br><br>
            <div class="w3-half w3-container">
                <div class="table-responsive w3-padding-32 w3-white w3-card-4" style="padding-left: 24px; padding-right:24px;">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Program Description</th>
                          <th>Product Name</th>

                          <th>Quantity</th>

                          <th>Date</th>

                        </tr>
                      </thead>
                      <tbody>
    <?php $c = 1;?>
    <?php

    $reply = DB::table('cropinventory')->latest()->get();
    foreach ($reply as $tr) { ?>

                        <tr>
                            <td><?php echo $c;?></td>

                            <td>
                                @php
                  $sss = DB::table('cropservice')->where('id', $tr->crop_program)->get();
                  foreach ($sss as $key => $s) {
                      echo $s->crop_detail;
                  }
              @endphp
                            </td>

                            <td>
                                @php
                                $ttt = DB::table('cropproduct')->where('id', $tr->crop_product)->get();
                                foreach ($ttt as $key => $t) {
                                    echo $t->products;
                                }
                            @endphp
                            </td>
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

            <div class="w3-half w3-container">
                <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                    <table class="table table-bordered w3-card-4 display" id="inventory">
                      <thead>
                        <tr class="w3-brown">
                                <th>ID</th>

                                <th>Date Dispose</th>

                                <th>Crops Name</th>
                                <th>Quantity</th>
                                <th>Status</th>

                              </tr>
                      </thead>
                      <tbody>
                        <?php $c1 = 1;?>
                        <?php

                        $reply = DB::table('cropdispose')->where('rendered', 'Delivered')->latest()->get();
                        foreach ($reply as $dis) { ?>
                              <tr>
                                <td>{{$c1}}</td>


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
        <div class="w3-half w3-container w3-brown w3-card-4 w3-padding-16 w3-right">

            <table class="w3-table w3-bordered">
                <tr>
                  <th>Products</th>
                  <th>Total Products</th>
                  <th>Disposed</th>
                  <th>Left</th>
                </tr>

                <?php
                 $reply = DB::table('fishproduct')->latest()->get();
                 foreach ($reply as $es) {
                        ?>
                <tr>
                  <td>
                    @php
                    // $ttt = DB::table('cropproduct')->where('id', $es->crop_product)->get();
                    // foreach ($ttt as $key => $t) {
                    //     echo $t->products;
                    // }
                    echo $es->products;
                    @endphp
                  </td>

                  <td>
                    @php

                    $users = DB::table('fishinventory')->where('product',$es->id)->sum('qty');
                    echo $users;
                    @endphp
                  </td>

                  <td>
                    @php
                    $t = DB::table('fishdispose')->where('products',$es->id)->where('rendered','Delivered')->sum('quantity');
                    echo $t;
                    @endphp
                  </td>


                  <td>
                      @php

                        $g = DB::table('fishinventory')->where('product',$es->id)->sum('qty')
                        -DB::table('fishdispose')->where('products',$es->id)->where('rendered','Delivered')->sum('quantity');
                        // -DB::table('disposaltractor')->where('service_type',$es->id)->where('tractor_status','Unreturn')->sum('quantity');
                        echo $g;
                      @endphp
                  </td>
                </tr>

           <?php } ?>
              </table>
        </div>

        <div class="w3-row">
            <br><br>
            <div class="w3-half w3-container">
                <div class="table-responsive w3-padding-32 w3-white w3-card-4" style="padding-left: 24px; padding-right:24px;">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Program Description</th>
                          <th>Product Name</th>

                          <th>Quantity</th>

                          <th>Date</th>

                        </tr>
                      </thead>
                      <tbody>
    <?php $c = 1;?>
    <?php

    $reply = DB::table('fishinventory')->latest()->get();
    foreach ($reply as $tr) { ?>

                        <tr>
                            <td><?php echo $c;?></td>

                            <td>
                                @php
                  $sss = DB::table('fishservice')->where('id', $tr->program)->get();
                  foreach ($sss as $key => $s) {
                      echo $s->description;
                  }
              @endphp
                            </td>

                            <td>
                                @php
                                $ttt = DB::table('fishproduct')->where('id', $tr->product)->get();
                                foreach ($ttt as $key => $t) {
                                    echo $t->products;
                                }
                            @endphp
                            </td>




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
            <div class="w3-half w3-container">
                <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
                    <table class="table table-bordered w3-card-4 display" id="inventory">
                      <thead>
                        <tr class="w3-brown">
                                <th>ID</th>

                                <th>Date Dispose</th>

                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $e = 1;?>
                        <?php

                        $reply = DB::table('fishdispose')->where('rendered', 'Delivered')->latest()->get();
                        foreach ($reply as $dis) { ?>
                              <tr>
                                <td>{{$e}}</td>


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
                             <?php $e++;
                             } ?>

                            </tbody>
                        </table>
                    </div>

            </div>
          </div>


    </div>





    <div id="menu3" class="container-fluid tab-pane fade"><br>
        <div class="w3-half w3-container w3-brown w3-card-4 w3-padding-16 w3-right">

            <table class="w3-table w3-bordered">
                <tr>
                  <th>Products</th>
                  <th>Total Products</th>
                  <th>Disposed</th>
                  <th>Left</th>
                </tr>

                <?php
                 $reply = DB::table('animalproduct')->latest()->get();
                 foreach ($reply as $es) {
                        ?>
                <tr>
                  <td>
                    @php
                    // $ttt = DB::table('cropproduct')->where('id', $es->crop_product)->get();
                    // foreach ($ttt as $key => $t) {
                    //     echo $t->products;
                    // }
                    echo $es->products;
                    @endphp
                  </td>

                  <td>
                    @php

                    $users = DB::table('livestockinventory')->where('product',$es->id)->sum('qty');
                    echo $users;
                    @endphp
                  </td>

                  <td>
                    @php
                    $t = DB::table('livestockdispose')->where('products',$es->id)->where('rendered','Delivered')->sum('quantity');
                    echo $t;
                    @endphp
                  </td>


                  <td>
                      @php

                        $g = DB::table('livestockinventory')->where('product',$es->id)->sum('qty')
                        -DB::table('livestockdispose')->where('products',$es->id)->where('rendered','Delivered')->sum('quantity');
                        // -DB::table('disposaltractor')->where('service_type',$es->id)->where('tractor_status','Unreturn')->sum('quantity');
                        echo $g;
                      @endphp
                  </td>
                </tr>

           <?php } ?>
              </table>


        </div>

        <div class="w3-row">
            <br><br>
            <div class="w3-half w3-container">
                <div class="table-responsive w3-padding-32 w3-white w3-card-4" style="padding-left: 24px; padding-right:24px;">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Program Description</th>
                          <th>Product Name</th>

                          <th>Quantity</th>

                          <th>Date</th>

                        </tr>
                      </thead>
                      <tbody>
    <?php $c = 1;?>
    <?php

    $reply = DB::table('livestockinventory')->latest()->get();
    foreach ($reply as $tr) { ?>

                        <tr>
                            <td><?php echo $c;?></td>

                            <td>
                                @php
                  $sss = DB::table('animalservice')->where('id', $tr->program)->get();
                  foreach ($sss as $key => $s) {
                      echo $s->description;
                  }
              @endphp
                            </td>

                            <td>
                                @php
                                $ttt = DB::table('animalproduct')->where('id', $tr->product)->get();
                                foreach ($ttt as $key => $t) {
                                    echo $t->products;
                                }
                            @endphp
                            </td>




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
            <div class="w3-half w3-container">

  <div class="table-responsive" style="padding-left:15px; padding-right:15px;">
    <table class="table table-bordered w3-card-4 display" id="inventory">
      <thead>
        <tr class="w3-brown">
                <th>ID</th>

                <th>Date Dispose</th>

                <th>Products Name</th>
                <th>Quantity</th>
                <th>Status</th>

              </tr>
      </thead>
      <tbody>
        <?php $f = 1;?>
        <?php

        $reply = DB::table('livestockdispose')->where('rendered', 'Delivered')->latest()->get();
        foreach ($reply as $dis) { ?>
              <tr>
                <td>{{$f}}</td>


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
            <?php $f++;
         } ?>

            </tbody>
        </table>
    </div>

            </div>
          </div>


    </div>






    </div>
  </div>






    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>

</body>
</html>

