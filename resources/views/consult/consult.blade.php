@extends('consult.newapp')

<style>
    .fttp{
        margin-top: -5%;
        padding-top:88px;
        padding-left: 35px;
        padding-right: 35px;
        background-color: #ad7948;
    }

    .center {
  text-align: center;
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
.jlop{
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-right: 1px;
    width: 355px !important;
}
.dsty{

    width: 178 px !important;
    height:777px;
    padding-left: 0 !important;
    padding-right: 0 !important;
    border: solid 1px;
    border-color: #4CAF50;
    border-top: none;
    border-bottom: none;
    border-left: none;
}

.ffs{
    height: 777px;
    overflow: auto !important;
    position: relative;
    margin-left: 11px;
    margin-right: 11px;

}

</style>

@section('content')
<div class="w3-row ">
    <div class="w3-col w3-light-gray ffs" style="width:350px">
   @include('consult.ins')

    </div>


    <div class="w3-rest w3-white ffs"  style="padding-left: 55px;padding-right: 55px;">



    <h1 class="w3-padding-16">
        <img src="/backimage/lgu.png" height="115" width="115" alt="">
            Farmer's Concerns
        </h1>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<div>



      <br><br><br>
      <hr>Raw Message <hr>
<ul class="w3-ul w3-border list" id="myList" style="width:100%">

    <?php $cq =1 ;?>
    <?php
     $read = DB::table('consultation')->where('role', Auth::user()->role)->where('reading', 'Unread')->latest()->get();
     foreach ($read as $con) {
    ?>

    <li class="w3-card" style="overflow: hidden">
        <p>
<h3 class="name">
    <span class="w3-button w3-brown">
     <?php echo $cq;?>
    </span>
   From: &nbsp;&nbsp;&nbsp;@php
   $const = DB::table('farmerprofile')->where('uuid', $con->farmer)->get();
   foreach ($const as $cot) {
       # code...
       if (!$const->isEmpty()) {
           echo $cot->lname . ', ' . $cot->fname . ' '. $cot->mname;
       }
       else {
           //
           echo 'No Name';
       }  }
   @endphp
@endphp
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="text-center">
    Subject: &nbsp;&nbsp;&nbsp; {{$con->title}}
</span>
<span class="w3-right">
    Date:  {{$con->created_at}}

    <a href="{{ URL::to('/convo/consultation/'.$con->id) }}" class="w3-hover-opacity"
    onclick="openImg12('giba{{$con->id}}');" title="Click to Read Message">
        <i class="fas fa-envelope-open"></i>
      </a>
&nbsp;
      <a  href="{{ URL::to('/delete/consultation/'.$con->id) }}"
        onclick="return confirm('Do you really want to delete this message?')"
        class="w3-button w3-red"><i class="fas fa-dumpster"></i>
    </a>

    </span>
</h3>


                              </p>
                          </li>
                          <?php $cq++;?>
                          <?php } ?>

                        </ul>


                    </div>


<br>
<hr>All Message <hr>
{{-- Read --}}
<div id="test-list">
    <div class="w3-row w3-section ">
        <div class="w3-col w3-brown w3-center w3-padding-8" style="width:50px;height:55px !important;
        padding-top:15px !important">
            <i class="fas fa-search" style="font-size: 22px;"></i></div>
          <div class="w3-rest w3-border w3-border-teal"
           style="width: 424px !important;height:55px !important; ">
            <input class="fuzzy-search w3-input w3-border" name="first" type="text" placeholder="Search Name Here"
            style="height:55px !important;">
          </div>
      </div>
<ul class="w3-ul w3-border list" id="myList" style="width:100%">
<?php $c = 1;?>
<?php
     $rd = DB::table('consultation')
     ->where('role', Auth::user()->role)
     ->where('reading', 'Read')
     ->latest()->get();
    //  if(empty($rd)){
        foreach ($rd as $con){    ?>

    <li class="w3-card">

        <p>

<h3 class="name">
    <span class="w3-button w3-brown">
        <?php echo $c;?>
       </span>

      From: &nbsp;&nbsp;&nbsp;@php
      $const = DB::table('farmerprofile')->where('uuid', $con->farmer)->get();
      foreach ($const as $cot) {
          # code...
          if (!$const->isEmpty()) {
              echo $cot->lname . ', ' . $cot->fname . ' '. $cot->mname;
          }
          else {
              //
              echo 'No Name';
          }  }
      @endphp
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="text-center">
    Subject: &nbsp;&nbsp;&nbsp; {{$con->title}}
</span>
<span class="w3-right">
    Date:  {{$con->created_at}}

    <a href="{{ URL::to('/convo/consultation/'.$con->id) }}" class="w3-hover-opacity"
        onclick="openImg12('giba{{$con->id}}');" title="Click to Read Message">
            <i class="fas fa-envelope-open"></i>
          </a>
&nbsp;
      <a  href="{{ URL::to('/delete/consultation/'.$con->id) }}"
        onclick="return confirm('Do you really want to delete this message?')"
        class="w3-button w3-red">
        Delete <i class="fas fa-dumpster"></i>
    </a>

    </span>
</h3>


                              </p>
                          </li>


                          <?php $c++;?>
                         <?php } ?>


                        </ul>
    <div class="d-flex justify-content-center mb-3">
        <div class="p-2">
            <ul class="pagination">
            </ul>
            </div>
        </div>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
<script>
var monkeyList = new List('test-list', {
valueNames: ['name'],
page: 15,
pagination: true
});

</script>




    </div>
  </div>

@endsection
