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
</style>





@section('content')




<div class="w3-row">
  <div class="w3-col l12 s6" style="background-color:  #C0AB8E;">
    <h1 class="text-right" id="jt" style="padding-right: 15px;">
        <br><br><br>

        <b style="font-size:32px;color:#61361e">ENROLLMENT</b>
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
                    <h1>Request</h1>
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#adduser">
                    <i class="fas fa-user-plus"></i>Add Request
                </button>

           <br>
              @include('applied.include.addreq')

           <div class="container w3-padding-64">

            <ul class="list-group list-group-flush">

                @foreach ($trservice as $treq)


              <li class="list-group-item">


                    <div class="w3-container w3-brown w3-card-4 w3-cell w3-mobile w3-padding-64" style="width:40%;">
                  <div class="w3-center">
                  <?php
                         $pic = DB::table('profpicture')->where('uuid', $treq->uuid)->limit(1)->get();
                         if ($pic->count()<0) {
                            foreach ($pic as $key => $p) { ?>
                           <img src="/backimage/da2.png" class="w3-circle" width="224" height="224" alt="">
                     <?php   }
                         }
                         else {
                            foreach ($pic as $key => $p) { ?>
                            <img src="{{URL::to($p->profpic)}}" width="100%" height="333px" alt="">

                        <?php }
                         }

                       ?>
                        </div>
                    </div>
                      <div class="w3-container w3-card-4 w3-padding-64 w3-cell w3-mobile" style="width:60% !important;">

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

                        <ul class="w3-ul w3-card-4  w3-padding-32" style="padding-left: 5px;padding-right:5px;">
                            <li class="w3-display-container">
                                <h3>Farmer's Name</h3>
                                 <span class="w3-button w3-transparent w3-display-right">
                                     <h3>{{$u->lname . ', '.$u->fname . ' ' . $u->mname}}</h3></span>
                            </li>

                            <li class="w3-display-container">
                                <h3>Location</h3>
                                 <span class="w3-button w3-transparent w3-display-right">
                                     <h3>{{$treq->brgylocation}}</h3></span>
                            </li>

                            <li class="w3-display-container">
                                <h3>Tractor's Service</h3>
                                 <span class="w3-button w3-transparent w3-display-right">
                                     <?php $tser = DB::table('tractorservice')
                                     ->where('id', $treq->tractor_service)->get();
                                     foreach ($tser as $key => $t) {
                                     }?>
                                     <h3>{{$t->service}}</h3></span>
                            </li>

                            <li class="w3-display-container">
                                <h3>Hectare</h3>
                                 <span class="w3-button w3-transparent w3-display-right">
                                     <h3>{{$treq->hectare}}</h3></span>
                            </li>

                            <li class="w3-display-container">
                                <h3>Total Amount </h3>
                                 <span class="w3-button w3-transparent w3-display-right">
                                     <h3>Php. {{$treq->payamount}}</h3></span>
                            </li>

                            <li class="w3-display-container">
                                <h3>Request Date</h3>
                                 <span class="w3-button w3-transparent w3-display-right">
                                     <h3>
                                         @php
                                        $date  = \Carbon\Carbon::parse($treq->created_at);
                                        echo $date->toDayDateTimeString();
                                        @endphp</h3>
                                        </span>
                            </li>

                            <li class="w3-display-container">
                                <h3>Service Date</h3>
                                 <span class="w3-button w3-transparent w3-display-right">
                                     <h3>
                                         @php
                                        $tdate  = \Carbon\Carbon::parse($treq->delivery_date);
                                        echo $tdate->toDayDateTimeString();
                                        @endphp</h3>
                                        </span>
                            </li>

                            <li class="w3-display-container">
                                <h3>Approved and Status</h3>
                                 <span class="w3-button w3-transparent w3-display-right">
                                     <h3>
                                         {{$treq->approved . ' and ' . $treq->status}}
                                     </h3>
                                        </span>
                            </li>

                        </ul>
<br><br>
<div class="w3-bar w3-card-4">
    <a href="#approve{{$treq->id}}" class="w3-bar-item w3-button w3-text-amber w3-padding-16" data-toggle="modal" title="Do You Wish to Approve It?"
        style="width:50%;background-color:#cba46a">
        <i class="fas fa-edit" style="font-size: 18px;"></i>
    </a>
    <a href="#deleterequest{{$treq->id}}" class="w3-bar-item w3-button w3-text-sand w3-padding-16" data-toggle="modal" title="Do You Wish to Delete It?"
        style="width:50%;background-color:#e62200;">
        <i class="fas fa-trash" style="font-size: 18px;"></i>
    </a>
    @include('applied.include.trequest')
  </div>
                      </div>

              </li>
              @endforeach

            </ul>
<br><br>
            <div class="d-flex justify-content-center" style="font-size:24px!important;">
                {!! $trservice->links('pagination::bootstrap-4') !!}
            </div>
          </div>
          <br>

      </div>

          </div>
    </div>





<br><br>

@endsection
