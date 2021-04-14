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

        <b style="font-size:32px;color:#61361e">LOANS</b>
        <b style="font-size:42px;color:#f4f0bd">REQUEST</b>
    </h1>
  </div>

</div>



{{-- <div class="">
<div class="w3-right" style="margin-right: 15px">
<div class="card-deck">
  <div class="card w3-brown shadow p-4 w3-leftbar">
    <div class="card-body text-center">
     <h1>
         <strong class="w3-text-sand">
        <i class="fab fa-ideal"></i>
         @php
       $users = DB::table('tractorrequest')->where('status', 'Uncheck')->count();
       echo $users;
         @endphp
</strong>
<br>
         Request To Approve
     </h1>
    </div>
  </div>
  <div class="card w3-brown shadow p-4 w3-leftbar">
    <div class="card-body text-center">
        <h1>
            <strong class="w3-text-sand">
           <i class="fab fa-ideal"></i>
            @php
          $users = DB::table('tractorrequest')->where('tractor_service', 1)->where('status', 'Uncheck')->count();
          echo $users;
            @endphp
   </strong>
   <br>
            Disk Plowing Request
        </h1>
    </div>
  </div>

  <div class="card w3-brown shadow p-4 w3-leftbar">
    <div class="card-body text-center">
        <h1>
            <strong class="w3-text-sand">
           <i class="fab fa-ideal"></i>
            @php
          $users = DB::table('tractorrequest')->where('tractor_service', 1)->where('status', 'Uncheck')->count();
          echo $users;
            @endphp
   </strong>
   <br>
            Disk Plowing Request
        </h1>
    </div>
  </div>

  <div class="card w3-brown shadow p-4 w3-leftbar">
    <div class="card-body text-center">
        <h1>
            <strong class="w3-text-sand">
           <i class="fab fa-ideal"></i>
            @php
          $users = DB::table('tractorrequest')->where('tractor_service', 2)->where('status', 'Uncheck')->count();
          echo $users;
            @endphp
   </strong>
   <br>
            Harrow Plowing Request
        </h1>
    </div>
  </div>

</div>
<br><br>
        </div>

<br><br> --}}
<div class="container-fluid w3-white w3-padding-64" style="margin-top:-5% !important">

    <div class="container-fluid mt-3 w3-padding-64">
        <div class="w3-center w3-padding-32">
            <img src="/backimage/lgu.png" width="118" height="118" alt="">
        </div>
            <h1>Request</h1>

            <br>

            <button class="btn btn-block w3-brown" data-toggle="modal" data-target="#adduser">
                <i class="fas fa-user-plus"></i>Add Request
            </button>
            @include('loans.add')
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Loan Request</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">All Request</a>
          </li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div id="home" class="container-fluid tab-pane w3-padding-32 active"><br>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
            <div id="test-list">

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

@foreach ($loan as $treq)

<li class="list-group-item" style="border: none !important;padding-left: 0 !important;padding-right:0 !important;">
<div class="">

<div class="w3-container w3-white w3-cell w3-mobile w3-card-4" style="width: 70% !important;margin-left:25% !important;">
    <div style="width:777px"></div>
        <div class="w3-row">
            <div class="w3-third w3-container w3-layout-middle">
      <br>
    <div class="w3-panel w3-sand text-center">
        <br><br><br>
      <h3>Please take time to read. <br>

      </h3>
      <br><br><br>
    </div>

  </div>
   <br>

<div class="w3-third w3-container  w3-padding-16">
    @php
    $first = DB::table('farmerprofile')
    ->select('lname', 'fname', 'mname')->where('uuid', $treq->farmer);
    $users = DB::table('employeeprofile')
    ->select('lname', 'fname', 'mname')
    ->union($first)
    ->where('uuid', $treq->farmer)
    ->get();
    foreach ($users as $u) {
    echo '<p class="req1">Name <span class="name w3-right">'. $u->lname . '; '.$u->fname . ' '. $u->mname . '</span></p>';
    }
    @endphp


  <p class="req1">Amount
      <span class="w3-right">
          {{$treq->amount}}
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

  <p class="req1">Approved on
    <span class="w3-right">
       {{$treq->approved_on}}
    </span>
</p>
<br>


  <br><br>
<div class="w3-bar w3-card-4">
  <a href="#approve{{$treq->id}}" class="w3-bar-item w3-button w3-sand w3-text-amber w3-padding-16" data-toggle="modal" title="Do You Wish to Approve It?"
      style="width:50%;">
      <i class="fas fa-clipboard-check" style="font-size: 18px;"></i>

  </a>
  <a href="#deleterequest{{$treq->id}}" class="w3-bar-item w3-button w3-text-sand w3-padding-16" data-toggle="modal" title="Do You Wish to Delete It?"
      style="width:50%;background-color:#e62200;">
      <i class="fas fa-trash" style="font-size: 18px;"></i>
  </a>
  @include('loans.loanrequest')
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
          {{-- </div>
        </div>
>
 --}}
    </div>
          <div id="menu1" class="container-fluid tab-pane fade"><br>
            <div id="home" class="container-fluid tab-pane w3-padding-32 active"><br>
                @include('loans.add')
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
                <div id="test-list12">

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

        <?php $loan = DB::table('loanrequest')->latest()->get();
foreach ($loan as $treq){

        ?>


    <li class="list-group-item" style="border: none !important;padding-left: 0 !important;padding-right:0 !important;">
    <div class="">

    <div class="w3-container w3-white w3-cell w3-mobile w3-card-4" style="width: 70% !important;margin-left:25% !important;">
        <div style="width:777px"></div>
            <div class="w3-row">
                <div class="w3-third w3-container w3-layout-middle">
          <br>
        <div class="w3-panel w3-sand text-center">
            <br><br><br>
          <h3>Please take time to read. <br>

          </h3>
          <br><br><br>
        </div>

      </div>
       <br>

    <div class="w3-third w3-container  w3-padding-16">
        @php
        $first = DB::table('farmerprofile')
        ->select('lname', 'fname', 'mname')->where('uuid', $treq->farmer);
        $users = DB::table('employeeprofile')
        ->select('lname', 'fname', 'mname')
        ->union($first)
        ->where('uuid', $treq->farmer)
        ->get();
        foreach ($users as $u) {
        echo '<p class="req1">Name <span class="name w3-right">'. $u->lname . '; '.$u->fname . ' '. $u->mname . '</span></p>';
        }
        @endphp


      <p class="req1">Amount
          <span class="w3-right">
              {{$treq->amount}}
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

      <p class="req1">Approved on
        <span class="w3-right">
           {{$treq->approved_on}}
        </span>
    </p>
    <br>


      <br><br>
    <div class="w3-bar">
      <a href="#deleterequest{{$treq->id}}" class="w3-bar-item w3-button w3-text-sand w3-padding-16" data-toggle="modal" title="Do You Wish to Delete It?"
          style="width:100%;background-color:#e62200;">
          <i class="fas fa-trash" style="font-size: 18px;"></i>
      </a>
      @include('loans.loanrequest')
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
    var monkeyList12 = new List('test-list12', {
    valueNames: ['name','tservice'],
    page: 5,
    pagination: true
    });

    </script>
          </div>

          <div id="menu2" class="container-fluid tab-pane fade"><br>
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
          </div>

        </div>
      </div>


</div>


</div>
    </div>

<br><br>

@endsection
