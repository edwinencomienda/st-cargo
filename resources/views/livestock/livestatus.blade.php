@extends('layouts.secondapp')

<style>
    .card-columns{
        padding-left: 54px;
        padding-right: 54px;
    }

 .clock, #clock {
  font-family: 'Orbitron', sans-serif !important;
  color: #66ff99;
  font-size: 56px;
  text-align: center;
  padding-top: 20px;
  padding-bottom: 20px;
}
.req1{
    font-size: 18px !important;
    border-bottom: solid .5px #d6c194;
}
.bst{
    background-color:#d6c194;
}
.gst{
  padding-left: 88px;
  /* width: 88% !important; */
}
b, h1, p{
    font-family: 'Nunito' !important;
}

.w3-cell{
    padding-left: 56px;
    padding-right: 56px;
}

.pagination {
  display: inline-block;

}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  /* margin: 0 4px; */
  font-size: 15px;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

</style>





@section('content')


<div class="w3-row">
  <div class="w3-col l12 s6" style="background-color:  #C0AB8E;">
    <h1 class="text-right" id="jt" style="padding-right: 15px;">
        <br><br><br>

        <b style="font-size:32px;color:#61361e">LIVESTOCK</b>
        <b style="font-size:42px;color:#f4f0bd">REQUEST</b>
    </h1>
  </div>

</div>





<br><br>
        <div class="w3-row">

          <div class="w3-col gst" style="width:350px;margin-right:15px;">
            @include('applied.include.trinc')
          </div>
      <div class="w3-brown w3-rest" style="margin-right: 15px; padding-left:15px;padding-right:15px;">

            <div class="container-fluid mt-3 w3-padding-16 w3-white" style="width: 100% !important">

                <div class="w3-center w3-padding-32">
                    <img src="/backimage/lgu.png" width="118" height="118" alt="">
                </div>
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs container-fluid" style="width: 100% !important">
                  <li class="nav-item">
                    <a class="nav-link active" href="#home">All Request
                        <sup>
                            <span class="w3-badge w3-red w3-padding-16">
                            @php
                            $users = DB::table('animalrequest')->count();
                            echo $users;
                              @endphp
                              </span>
                            </sup>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#menu1">Poultry Request
                        <sup>
                            <span class="w3-badge w3-red w3-padding-16">
                            @php
                            $users = DB::table('animalrequest')->where('program',1)->count();
                            echo $users;
                              @endphp
                              </span>
                            </sup>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#menu2">Livestock Request
                        <sup>
                            <span class="w3-badge w3-red w3-padding-16">
                            @php
                            $users = DB::table('animalrequest')->where('program',2)->count();
                            echo $users;
                              @endphp
                              </span>
                            </sup>
                    </a>
                  </li>

                  {{-- <li class="nav-item">
                    <a class="nav-link" href="#menu3">Agroforestry
                        <sup>
                            <span class="w3-badge w3-red w3-padding-16">
                            @php
                            $users = DB::table('croprequest')->where('program',3)->count();
                            echo $users;
                              @endphp
                              </span>
                            </sup>
                    </a>
                  </li> --}}

                  {{-- <li class="nav-item">
                    <a class="nav-link" href="#menu4">Banana  <sup>
                        <span class="w3-badge w3-red w3-padding-16">
                        @php
                        $users = DB::table('croprequest')->where('program',4)->count();
                        echo $users;
                          @endphp
                          </span>
                        </sup></a>
                  </li> --}}

                </ul>

                <!-- Tab panes -->
                <div class="tab-content container-fluid" style="width: 100% !important">
                  <div id="home" class="container-fluid tab-pane active"><br>
                    <h2>All Livestock Request</h2>
                    @include('crops.include.cropreq')
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
                    <div id="test-list1">

                          <div class="input-group mb-3" style="width:55%;">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                  Search
                              </span>
                            </div>
                            <input type="search" class="fuzzy-search form-control w3-border"
                            placeholder="Search....." style="height: 55px !important;font-size:24px !important;">
                          </div>
       <ul class="list list-group list-group-flush">

       @foreach ($cropreq as $treq)

      <li class="list-group-item w3-white container-fluid w3-padding-16" style="border: none !important;padding-left: 0 !important;padding-right:0 !important;">
      <div class="">


                          <div class="w3-container w3-cell w3-mobile"
                          style="padding-left: 0 !important;padding-right:0 !important; width:30% !important;">

                           </div>

                            <div class="w3-container w3-white w3-cell w3-card-4 w3-mobile" style="width: 100% !important">

       <div class="w3-row w3-card-4 w3-padding-16">
          <div class="w3-third w3-container w3-layout-middle">
              <br>
            <div class="w3-panel w3-sand text-center">
                <br><br><br>
                <div style="width:777px"></div>
              <h3>Please take time to read. <br>
              </h3>
              <br><br><br>
            </div>

          </div>
           <br>

        <div class="w3-third w3-container  w3-padding-16">
          <?php
          $first = DB::table('farmerprofile')
          ->select('lname', 'fname', 'mname')->where('uuid', $treq->farmer);
          $users = DB::table('employeeprofile')
          ->select('lname', 'fname', 'mname')
          ->union($first)
          ->where('uuid', $treq->farmer)
          ->get();
          foreach ($users as $u) { ?>
          <p class="req1">Name <span class="name w3-right">{{$u->lname . ", ".$u->fname . " " . $u->mname}}</span></p>

          <?php }
          ?>
          <p class="req1">Crops Order
              <span class="tservice w3-right">
                  <?php $tser = DB::table('cropproduct')
                  ->where('id', $treq->products)->get();
                  foreach ($tser as $key => $t) {
                  }?>
                  {{$t->products}}
              </span>
          </p>

          <p class="req1">Quantity
              <span class="w3-right">
                  {{$treq->quantity}}
              </span>
          </p>

          <p class="req1">Status
              <span class="w3-right">

                  {{$treq->approved . ' - ' . $treq->status}}
              </span>
          </p>


      </div>

        <div class="w3-third w3-container">
          <p class="req1">Requested on
              <span class="w3-right">
                  @php
                  $date  = \Carbon\Carbon::parse($treq->created_at);
                  echo $date->toDayDateTimeString();
                  @endphp
              </span>
          </p>
      <br>
          <p class="req1">Ready on
              <span class="w3-right">
                  @if ($treq->date_delivery == "")
                      Please set appointment date!
                  @else
                  @php
                  $fdate  = \Carbon\Carbon::parse($treq->date_delivery);
                  echo $fdate->toDayDateTimeString();
                  @endphp
                  @endif

              </span>
          </p>

          <br><br>


          <a href="#deleterequest{{$treq->id}}" class="btn-block w3-button w3-text-sand w3-padding-16" data-toggle="modal" title="Do You Wish to Delete It?"
              style="width:50%;background-color:#e62200;width:100%">
              <i class="fas fa-trash" style="font-size: 18px;"></i>
          </a>
          <br>
          @include('crops.include.inreq')

        </div>
      <br>
      </div>


                          </div>
      </div>
                        </li>
      <br>
      @endforeach




                      </ul>
                      <div class="d-flex justify-content-center mb-3">
                          <div class="p-2">
                              <ul class="pagination w3-white">
                              </ul>
                              </div>
                          </div>
                    </div>

                    <script src="{{ asset('js/app.js') }}" defer></script>
      <script>
      var monkeyLists = new List('test-list1', {
      valueNames: ['name','tservice'],
      page: 15,
      pagination: true
      });

      </script>
      {{-- end ni diri sa mga row --}}


 </div>

                <div id="menu1" class="container-fluid tab-pane fade"><br>
                    <h2>Cereals Request</h2>

                    <div id="home" class="container-fluid tab-pane active"><br>
                        @include('crops.include.cropreq')
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
                        <div id="test-list2">

                              <div class="input-group mb-3" style="width:55%;">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      Search
                                  </span>
                                </div>
                                <input type="search" class="fuzzy-search form-control w3-border"
                                placeholder="Search....." style="height: 55px !important;font-size:24px !important;">
                              </div>
           <ul class="list list-group list-group-flush">

          <?php
               $cropreq = DB::table('animalrequest')->where('program', 1)->latest()->get();
foreach ($cropreq as $treq) { ?>


          <li class="list-group-item w3-white container-fluid w3-padding-16" style="border: none !important;padding-left: 0 !important;padding-right:0 !important;">
          <div class="">


                              <div class="w3-container w3-cell w3-mobile"
                              style="padding-left: 0 !important;padding-right:0 !important; width:30% !important;">

                               </div>

                                <div class="w3-container w3-white w3-cell w3-card-4 w3-mobile" style="width: 100% !important">

           <div class="w3-row w3-card-4 w3-padding-16">
              <div class="w3-third w3-container w3-layout-middle">
                  <br>
                <div class="w3-panel w3-sand text-center">
                    <br><br><br>
                    <div style="width:777px"></div>
                  <h3>Please take time to read. <br>
                  </h3>
                  <br><br><br>
                </div>

              </div>
               <br>

            <div class="w3-third w3-container  w3-padding-16">
              <?php
              $first = DB::table('farmerprofile')
              ->select('lname', 'fname', 'mname')->where('uuid', $treq->farmer);
              $users = DB::table('employeeprofile')
              ->select('lname', 'fname', 'mname')
              ->union($first)
              ->where('uuid', $treq->farmer)
              ->get();
              foreach ($users as $u) { ?>
              <p class="req1">Name <span class="name w3-right">{{$u->lname . ", ".$u->fname . " " . $u->mname}}</span></p>

              <?php }
              ?>
              <p class="req1">Crops Order
                  <span class="tservice w3-right">
                      <?php $tser = DB::table('cropproduct')
                      ->where('id', $treq->products)->get();
                      foreach ($tser as $key => $t) {
                      }?>
                      {{$t->products}}
                  </span>
              </p>

              <p class="req1">Quantity
                  <span class="w3-right">
                      {{$treq->quantity}}
                  </span>
              </p>

              <p class="req1">Status
                  <span class="w3-right">

                      {{$treq->approved . ' - ' . $treq->status}}
                  </span>
              </p>


          </div>

            <div class="w3-third w3-container">
              <p class="req1">Requested on
                  <span class="w3-right">
                      @php
                      $date  = \Carbon\Carbon::parse($treq->created_at);
                      echo $date->toDayDateTimeString();
                      @endphp
                  </span>
              </p>
          <br>
              <p class="req1">Ready on
                  <span class="w3-right">
                      @if ($treq->date_delivery == "")
                          Please set appointment date!
                      @else
                      @php
                      $fdate  = \Carbon\Carbon::parse($treq->date_delivery);
                      echo $fdate->toDayDateTimeString();
                      @endphp
                      @endif

                  </span>
              </p>

              <br><br>

              <a  href="{{ URL::to('/deletelivestockrequest/'.$treq->id) }}"
                onclick="return confirm('Do you really want to delete this Livestock Request program?')"
                class="w3-button w3-red">
                Delete <i class="fas fa-dumpster"></i>
            </a>
              <br>
              {{-- @include('livestock.include.inreq') --}}

            </div>
          <br>
          </div>


                              </div>
          </div>
                            </li>
          <br>
                         <?php } ?>




                          </ul>
                          <div class="d-flex justify-content-center mb-3">
                              <div class="p-2">
                                  <ul class="pagination w3-white">
                                  </ul>
                                  </div>
                              </div>
                        </div>

                        <script src="{{ asset('js/app.js') }}" defer></script>
          <script>
          var monkeyList2 = new List('test-list2', {
          valueNames: ['name','tservice'],
          page: 15,
          pagination: true
          });

          </script>
          {{-- end ni diri sa mga row --}}
        </div>
                </div>


                <div id="menu2" class="container-fluid tab-pane fade"><br>
                    <h2>Livestock Request</h2>

                    <div id="home" class="container-fluid tab-pane active"><br>
                        @include('crops.include.cropreq')
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
                        <div id="test-list3">

                              <div class="input-group mb-3" style="width:55%;">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      Search
                                  </span>
                                </div>
                                <input type="search" class="fuzzy-search form-control w3-border"
                                placeholder="Search....." style="height: 55px !important;font-size:24px !important;">
                              </div>
           <ul class="list list-group list-group-flush">

          <?php
               $cropreq1 = DB::table('animalrequest')->where('program', 2)->latest()->get();
               foreach ($cropreq1 as $treq) { ?>
          <li class="list-group-item w3-white container-fluid w3-padding-16" style="border: none !important;padding-left: 0 !important;padding-right:0 !important;">
          <div class="">
            <div class="w3-container w3-cell w3-mobile"
            style="padding-left: 0 !important;padding-right:0 !important; width:30% !important;"></div>


        <div class="w3-container w3-white w3-cell w3-card-4 w3-mobile" style="width: 100% !important">
           <div class="w3-row w3-card-4 w3-padding-16">
              <div class="w3-third w3-container w3-layout-middle">
                  <br>
                <div class="w3-panel w3-sand text-center">
                    <br><br><br>
                    <div style="width:777px"></div>
                  <h3>Please take time to read. <br>
                  </h3>
                  <br><br><br>
                </div>

              </div>
               <br>

            <div class="w3-third w3-container  w3-padding-16">
              <?php
              $first = DB::table('farmerprofile')
              ->select('lname', 'fname', 'mname')->where('uuid', $treq->farmer);
              $users = DB::table('employeeprofile')
              ->select('lname', 'fname', 'mname')
              ->union($first)
              ->where('uuid', $treq->farmer)
              ->get();
              foreach ($users as $u) { ?>
              <p class="req1">Name <span class="name w3-right">{{$u->lname . ", ".$u->fname . " " . $u->mname}}</span></p>

              <?php }
              ?>
              <p class="req1">Order
                  <span class="tservice w3-right">
                      <?php $tser = DB::table('cropproduct')
                      ->where('id', $treq->products)->get();
                      foreach ($tser as $key => $t) {
                      }?>
                      {{$t->products}}
                  </span>
              </p>

              <p class="req1">Quantity
                  <span class="w3-right">
                      {{$treq->quantity}}
                  </span>
              </p>

              <p class="req1">Status
                  <span class="w3-right">

                      {{$treq->approved . ' - ' . $treq->status}}
                  </span>
              </p>


          </div>

            <div class="w3-third w3-container">
              <p class="req1">Requested on
                  <span class="w3-right">
                      @php
                      $date  = \Carbon\Carbon::parse($treq->created_at);
                      echo $date->toDayDateTimeString();
                      @endphp
                  </span>
              </p>
          <br>
              <p class="req1">Ready on
                  <span class="w3-right">
                      @if ($treq->date_delivery == "")
                          Please set appointment date!
                      @else
                      @php
                      $fdate  = \Carbon\Carbon::parse($treq->date_delivery);
                      echo $fdate->toDayDateTimeString();
                      @endphp
                      @endif

                  </span>
              </p>

              <br><br>

              <a  href="{{ URL::to('/deletelivestockrequest/'.$treq->id) }}"
                onclick="return confirm('Do you really want to delete this Livestock Request program?')"
                class="w3-button w3-red">
                Delete <i class="fas fa-dumpster"></i>
            </a>


              <br>
              {{-- @include('livestock.include.inreq') --}}

            </div>
          <br>
          </div>


                              </div>
          </div>
                            </li>
          <br>
                         <?php } ?>




                          </ul>
                          <div class="d-flex justify-content-center mb-3">
                              <div class="p-2">
                                  <ul class="pagination w3-white">
                                  </ul>
                                  </div>
                              </div>
                        </div>

                        <script src="{{ asset('js/app.js') }}" defer></script>
          <script>
          var monkeyList2 = new List('test-list3', {
          valueNames: ['name','tservice'],
          page: 15,
          pagination: true
          });

          </script>
          {{-- end ni diri sa mga row --}}
        {{-- </div>
     </div> --}}



                </div>


                </div>
              </div>

              <script>
              $(document).ready(function(){
                $(".nav-tabs a").click(function(){
                  $(this).tab('show');
                });
              });
              </script>

           <br>
         </div>
         <br>
    </div>





<br><br>

@endsection
