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
      <div class="w3-brown w3-rest w3-padding-64" style="margin-right: 15px; padding-left:15px;padding-right:15px;">

                <div class="w3-center w3-padding-32">
                    <img src="/backimage/lgu.png" width="118" height="118" alt="">
                </div>

                    <h1>Request</h1>

           <br>
           @include('livestock.include.addreq')
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
              <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
              <div id="test-list">

                    <div class="input-group mb-3" style="width:55%;">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#adduser">
                                <i class="fas fa-user-plus"></i>Add Request
                            </button>
                        </span>
                      </div>
                      <input type="search" class="fuzzy-search form-control w3-border"
                      placeholder="Search....." style="height: 55px !important;font-size:24px !important;">
                    </div>
 <ul class="list list-group list-group-flush">

 @foreach ($lives as $treq)

<li class="list-group-item w3-brown" style="border: none !important;padding-left: 0 !important;padding-right:0 !important;">
<div class="">


                    <div class="w3-container w3-cell w3-mobile"
                    style="padding-left: 0 !important;padding-right:0 !important; width:30% !important;">

                     </div>

                      <div class="w3-container w3-white w3-cell w3-card-4 w3-mobile" style="width: 100% !important">

 <div class="w3-row">
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
    <p class="req1">Animal Order
        <span class="tservice w3-right">
            <?php $tser = DB::table('animalproduct')
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
<div class="w3-bar w3-padding-16">
    <a href="#approve{{$treq->id}}" class="w3-bar-item w3-button w3-sand w3-text-amber w3-padding-16" data-toggle="modal" title="Do You Wish to Approve It?"
        style="width:50%;">
        <i class="fas fa-clipboard-check" style="font-size: 18px;"></i>

    </a>
    <a href="#deleterequest{{$treq->id}}" class="w3-bar-item w3-button w3-text-sand w3-padding-16" data-toggle="modal" title="Do You Wish to Delete It?"
        style="width:50%;background-color:#e62200;">
        <i class="fas fa-trash" style="font-size: 18px;"></i>
    </a>
    <br>
    @include('livestock.include.inreq')
  </div>
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
var monkeyList = new List('test-list', {
valueNames: ['name','tservice'],
page: 5,
pagination: true
});

</script>







{{-- end ni diri sa mga row --}}
            </div>
      </div>
    </div>





<br><br>

@endsection
