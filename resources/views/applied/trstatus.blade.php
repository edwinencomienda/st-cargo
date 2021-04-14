@extends('layouts.secondapp')

<style>
     @import url('https://fonts.googleapis.com/css?family=Orbitron');

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

        <b style="font-size:32px;color:#61361e">TRACTOR</b>
        <b style="font-size:42px;color:#f4f0bd">REQUEST</b>
    </h1>
  </div>

</div>



    <div class="w3-padding-64 bst">
        <div class="w3-row">
          <div class="w3-col gst" style="width:350px;margin-right:15px;">
            @include('applied.include.trinc')
          </div>



      <div class="w3-white w3-rest" style="margin-right: 15px; padding-left:15px;">
                <div class="w3-center w3-padding-32">
                    <img src="/backimage/lgu.png" width="118" height="118" alt="">
                </div>
                    <h1 style="padding-left: 15px !important;">Status</h1>
                    <h4 style="padding-left: 15px !important;"><em>Status of the tractor request.</em></h4>
           <br>


          <br>


<div class="container-fluid mt-3" style="width: 100% !important">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link  w3-padding-8 active" data-toggle="tab" href="#home" title="All Checked Request">
            <i class="fas fa-clipboard-check" style="font-size: 18px;"></i>
            All Request
            <sup>
                <span class="w3-badge w3-red w3-padding-16">
                @php
                $users = DB::table('tractorrequest')->count();
                echo $users;
                  @endphp
                  </span>
                </sup>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1" title="Approved Request">
            <i class="fas fa-thumbs-up" style="font-size: 18px;"></i>
            Approved
            <sup>
                <span class="w3-badge w3-red w3-padding-16">
                @php
                $users = DB::table('tractorrequest')->where('approved', 'Approved')->count();
                echo $users;
                  @endphp
                  </span>
                </sup>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2" title="Disapproved Request">Disapproved Request
            <sup>
                <span class="w3-badge w3-red w3-padding-16">
                @php
                $users = DB::table('tractorrequest')->where('approved', 'Disapproved')->count();
                echo $users;
                  @endphp
                  </span>
                </sup>
        </a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container-fluid tab-pane active"><br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
        <div id="test-list">

              <div class="input-group mb-3" style="width:55%;">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <h3>All Status</h3>
                  </span>
                </div>
                <input type="search" class="fuzzy-search form-control w3-border"
                placeholder="Search....." style="height: 55px !important;font-size:24px !important;">
              </div>
<ul class="list list-group list-group-flush">

@foreach ($str as $treq)

<li class="list-group-item w3-brown" style="border: none !important;padding-left: 0 !important;padding-right:0 !important;">
<div class="w3-card-4">


              <div class="w3-container w3-cell w3-mobile"
              style="padding-left: 0 !important;padding-right:0 !important; width:30% !important;">
                  <div class="w3-center">
                      <br>
                      <div style="width: 524"></div>
                      <?php
                             $pic = DB::table('profpicture')->where('uuid', $treq->uuid)->limit(1)->get();
                             if ($pic->count()<0) {
                                foreach ($pic as $key => $p) { ?>
                               <img src="/backimage/da2.png" class="w3-circle" width="224" height="224" alt="">
                         <?php   }
                             }
                             else {
                                foreach ($pic as $key => $p) { ?>
                                <img src="{{URL::to($p->profpic)}}"
                                 width="224" height="224"alt="" style="border-radius: 333px;">

                            <?php }
                             }

                           ?>
                            </div>
                </div>

                <div class="w3-container w3-white w3-cell w3-mobile" style="width: 70% !important">
                  {{-- <div style="width:777px"></div> --}}
<div class="w3-row">
<div class="w3-third w3-container w3-layout-middle">
  <br>
<div class="w3-panel w3-sand text-center">
    <br><br><br>
  <h3>Please take time to read. <br>
      Baranggay: {{$treq->brgylocation}}
  </h3>
  <br><br><br>
</div>

</div>
<br>
@php
$first = DB::table('farmerprofile')
->select('lname', 'fname', 'mname')->where('uuid', $treq->uuid);
$users = DB::table('employeeprofile')
->select('lname', 'fname', 'mname')
->union($first)
->where('uuid', $treq->uuid)
->get();
foreach ($users as $key => $u) {
// echo '<br>'. $u->lname;
}
@endphp
<div class="w3-third w3-container  w3-padding-16">
<p class="req1">Name <span class="name w3-right">{{$u->lname . ', '.$u->fname . ' ' . $u->mname}}</span></p>
<p class="req1">Tractor Service
  <span class="tservice w3-right">
      <?php $tser = DB::table('tractorservice')
      ->where('id', $treq->tractor_service)->get();
      foreach ($tser as $key => $t) {
      }?>
      {{$t->service}}
  </span>
</p>
<p class="req1">Hectare
  <span class="w3-right">
      {{$treq->hectare}}
  </span>
</p>

<p class="req1">Total Amount
  <span class="w3-right">
      {{$treq->payamount}}
  </span>
</p>

<p class="req1">Status
  <span class="w3-right">
      {{$treq->approved . ' and ' . $treq->status}}
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
<p class="req1">Service on
  <span class="w3-right">
      @php
      $tdate  = \Carbon\Carbon::parse($treq->delivery_date);
      echo $tdate->toDayDateTimeString();
      @endphp
  </span>
</p>

<br><br>
<div class="w3-bar w3-card-4">
<a href="#deleterequest{{$treq->id}}" class="w3-bar-item w3-button w3-text-sand w3-padding-16" data-toggle="modal" title="Do You Wish to Delete It?"
  style="width:100%;background-color:#e62200;">
  <i class="fas fa-trash" style="font-size: 18px;"></i>
</a>
@include('applied.include.trequest')
</div>
</div>

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
var monkeyList = new List('test-list', {
valueNames: ['name','tservice'],
page: 5,
pagination: true
});

</script>



    </div>
    {{-- end --}}
      <div id="menu1" class="container-fluid tab-pane fade"><br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
        <div id="test-list1">

              <div class="input-group mb-3" style="width:55%;">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                     <h3>Approved</h3>
                  </span>
                </div>
                <input type="search" class="fuzzy-search form-control w3-border"
                placeholder="Search....." style="height: 55px !important;font-size:24px !important;">
              </div>
<ul class="list list-group list-group-flush">

<?php
 $approve = DB::table('tractorrequest')->where('approved', 'Approved')->latest()->get();
 foreach ($approve as $treq){?>



<li class="list-group-item w3-brown" style="border: none !important;padding-left: 0 !important;padding-right:0 !important;">
<div class="w3-card-4">


              <div class="w3-container w3-cell w3-mobile"
              style="padding-left: 0 !important;padding-right:0 !important; width:30% !important;">
                  <div class="w3-center">
                      <br>
                      <div style="width: 524"></div>
                      <?php
                             $pic = DB::table('profpicture')->where('uuid', $treq->uuid)->limit(1)->get();
                             if ($pic->count()<0) {
                                foreach ($pic as $key => $p) { ?>
                               <img src="/backimage/da2.png" class="w3-circle" width="224" height="224" alt="">
                         <?php   }
                             }
                             else {
                                foreach ($pic as $key => $p) { ?>
                                <img src="{{URL::to($p->profpic)}}"
                                 width="224" height="224"alt="" style="border-radius: 333px;">

                            <?php }
                             }

                           ?>
                            </div>
                </div>

                <div class="w3-container w3-white w3-cell w3-mobile" style="width: 70% !important">
                  {{-- <div style="width:777px"></div> --}}
<div class="w3-row">
<div class="w3-third w3-container w3-layout-middle">
  <br>
<div class="w3-panel w3-sand text-center">
    <br><br><br>
  <h3>Please take time to read. <br>
      Baranggay: {{$treq->brgylocation}}
  </h3>
  <br><br><br>
</div>

</div>
<br>
@php
$first = DB::table('farmerprofile')
->select('lname', 'fname', 'mname')->where('uuid', $treq->uuid);
$users = DB::table('employeeprofile')
->select('lname', 'fname', 'mname')
->union($first)
->where('uuid', $treq->uuid)
->get();
foreach ($users as $key => $u) {
// echo '<br>'. $u->lname;
}
@endphp
<div class="w3-third w3-container  w3-padding-16">
<p class="req1">Name <span class="name w3-right">{{$u->lname . ', '.$u->fname . ' ' . $u->mname}}</span></p>
<p class="req1">Tractor Service
  <span class="tservice w3-right">
      <?php $tser = DB::table('tractorservice')
      ->where('id', $treq->tractor_service)->get();
      foreach ($tser as $key => $t) {
      }?>
      {{$t->service}}
  </span>
</p>
<p class="req1">Hectare
  <span class="w3-right">
      {{$treq->hectare}}
  </span>
</p>

<p class="req1">Total Amount
  <span class="w3-right">
      {{$treq->payamount}}
  </span>
</p>

<p class="req1">Status
  <span class="w3-right">
      {{$treq->approved . ' and ' . $treq->status}}
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
<p class="req1">Service on
  <span class="w3-right">
      @php
      $tdate  = \Carbon\Carbon::parse($treq->delivery_date);
      echo $tdate->toDayDateTimeString();
      @endphp
  </span>
</p>

<br><br>
<div class="w3-bar w3-card-4">
<a href="#deleterequest{{$treq->id}}" class="w3-bar-item w3-button w3-text-sand w3-padding-16" data-toggle="modal" title="Do You Wish to Delete It?"
  style="width:100%;background-color:#e62200;">
  <i class="fas fa-trash" style="font-size: 18px;"></i>
</a>
@include('applied.include.trequest')
</div>
</div>

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
var monkeyList1 = new List('test-list1', {
valueNames: ['name','tservice'],
page: 8,
pagination: true
});

</script>

      </div>

      {{-- end --}}
      <div id="menu2" class="container-fluid tab-pane fade"><br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
        <div id="test-listdis">

              <div class="input-group mb-3" style="width:55%;">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <h3>Disapproved</h3>
                  </span>
                </div>
                <input type="search" class="fuzzy-search form-control w3-border"
                placeholder="Search....." style="height: 55px !important;font-size:24px !important;">
              </div>
<ul class="list list-group list-group-flush">

<?php
 $disapprove = DB::table('tractorrequest')->where('approved', 'Disapproved')->latest()->get();
 foreach ($disapprove as $treq){?>



<li class="list-group-item w3-brown" style="border: none !important;padding-left: 0 !important;padding-right:0 !important;">
<div class="w3-card-4">


              <div class="w3-container w3-cell w3-mobile"
              style="padding-left: 0 !important;padding-right:0 !important; width:30% !important;">
                  <div class="w3-center">
                      <br>
                      <div style="width: 524"></div>
                      <?php
                             $pic = DB::table('profpicture')->where('uuid', $treq->uuid)->limit(1)->get();
                             if ($pic->count()<0) {
                                foreach ($pic as $key => $p) { ?>
                               <img src="/backimage/da2.png" class="w3-circle" width="224" height="224" alt="">
                         <?php   }
                             }
                             else {
                                foreach ($pic as $key => $p) { ?>
                                <img src="{{URL::to($p->profpic)}}"
                                 width="224" height="224"alt="" style="border-radius: 333px;">

                            <?php }
                             }

                           ?>
                            </div>
                </div>

                <div class="w3-container w3-white w3-cell w3-mobile" style="width: 70% !important">
                  {{-- <div style="width:777px"></div> --}}
<div class="w3-row">
<div class="w3-third w3-container w3-layout-middle">
  <br>
<div class="w3-panel w3-sand text-center">
    <br><br><br>
  <h3>Please take time to read. <br>
      Baranggay: {{$treq->brgylocation}}
  </h3>
  <br><br><br>
</div>

</div>
<br>
@php
$first = DB::table('farmerprofile')
->select('lname', 'fname', 'mname')->where('uuid', $treq->uuid);
$users = DB::table('employeeprofile')
->select('lname', 'fname', 'mname')
->union($first)
->where('uuid', $treq->uuid)
->get();
foreach ($users as $key => $u) {
// echo '<br>'. $u->lname;
}
@endphp
<div class="w3-third w3-container  w3-padding-16">
<p class="req1">Name <span class="name w3-right">{{$u->lname . ', '.$u->fname . ' ' . $u->mname}}</span></p>
<p class="req1">Tractor Service
  <span class="tservice w3-right">
      <?php $tser = DB::table('tractorservice')
      ->where('id', $treq->tractor_service)->get();
      foreach ($tser as $key => $t) {
      }?>
      {{$t->service}}
  </span>
</p>
<p class="req1">Hectare
  <span class="w3-right">
      {{$treq->hectare}}
  </span>
</p>

<p class="req1">Total Amount
  <span class="w3-right">
      {{$treq->payamount}}
  </span>
</p>

<p class="req1">Status
  <span class="w3-right">
      {{$treq->approved . ' and ' . $treq->status}}
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
<p class="req1">Service on
  <span class="w3-right">
      @php
      $tdate  = \Carbon\Carbon::parse($treq->delivery_date);
      echo $tdate->toDayDateTimeString();
      @endphp
  </span>
</p>

<br><br>
<div class="w3-bar w3-card-4">
<a href="#deleterequest{{$treq->id}}" class="w3-bar-item w3-button w3-text-sand w3-padding-16" data-toggle="modal" title="Do You Wish to Delete It?"
  style="width:100%;background-color:#e62200;">
  <i class="fas fa-trash" style="font-size: 18px;"></i>
</a>
@include('applied.include.trequest')
</div>
</div>

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
var monkeyList1yu = new List('test-listdis', {
valueNames: ['name','tservice'],
page: 8,
pagination: true
});

</script>


     </div>
    </div>
  </div>

      </div>







          </div>
    </div>

<br><br>

@endsection
