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
    <div class="w3-col w3-light-gray ffs" style="width:350px"> @include('consult.ins')

    </div>


    <div class="w3-rest w3-white ffs"  style="padding-left: 55px;padding-right: 55px;">
        <h1 class="w3-padding-32">
            Sent Items
        </h1>
        <div class="w3-container" id="replied">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<div id="test-list1">
        <div class="w3-row w3-section ">

            <div class="w3-col w3-brown w3-center w3-padding-8" style="width:50px;height:55px !important;
            padding-top:15px !important">
                <i class="fas fa-search" style="font-size: 22px;"></i></div>
              <div class="w3-rest w3-border w3-border-teal" style="width: 224px !important;height:55px !important; ">
                <input class="fuzzy-search w3-input w3-border" name="first" type="text" placeholder="Search" style="height:55px !important;">
              </div>
          </div>

        <ul class="w3-ul w3-border list" style="width:100%">
        @foreach ($reply as $re)


        <li class="w3-card" style="overflow: hidden">
            <p class="name w3-text-teal">
<h3>
From: &nbsp;&nbsp;&nbsp; @php
$const = DB::table('farmerprofile')->where('uuid', $re->farmer)->get();
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
Subject: &nbsp;&nbsp;&nbsp; {{$re->anstitle}}
</span>
<span class="w3-right">
Date:  {{$re->created_at}}

<a href="javascript:void(0)" class="w3-hover-opacity" onclick="openImg1('re{{$re->id}}');" title="Click to Read Message">
<i class="fas fa-envelope-open"></i>
</a>
&nbsp;
<a  href="{{ URL::to('/delete/reply/'.$re->id) }}"
    onclick="return confirm('Do you really want to delete this message?')"
    class="w3-button w3-red">
    Delete <i class="fas fa-dumpster"></i>
</a>

</span>
</h3>


            </p>
        </li>


        @endforeach


      </ul>
<div class="d-flex justify-content-center mb-3">
<div class="p-2">
<ul class="pagination">
</ul>
</div>
</div>
</div>
</div>
<script>
var monkeyList = new List('test-list1', {
valueNames: ['name'],
page: 15,
pagination: true
});
</script>
{{-- </div> --}}

<?php $reply = DB::table('reply')->get();
foreach ($reply as $re) { ?>
<div id="re{{$re->id}}" class="picture w3-display-container" style="display:none">



<div class="w3-padding-32">

    <h3>
    Sending to: &nbsp;&nbsp;&nbsp;@php
    $const = DB::table('farmerprofile')->where('uuid', $re->farmer)->get();
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
<?php $cons = DB::table('consultation')->where('id',$re->conid)

->get();
foreach ($cons as $co) {
    # code...

?><br>
    Concern Subject {{$co->title}} <br>
    Date Received: {{$co->created_at}} <br>

<?php } ?>
    Date Replied: {{$re->created_at}} <br>
    </h3>
    <br>
    <hr>
<br>
<h3>
Replied from: CAGRO Staff! <br>
Subject: {{$re->anstitle}} <br>
</h3>

<div class="w3-center">
    <?php
    if ( substr($re->ansvisual,-3) == 'jpg'){ ?>
    <img class="w3-round w3-animate-fade" src="{{URL::to($re->ansvisual)}}"
    style="width:50%;">';

<?php }
    if (substr($re->ansvisual,-3) == 'mp4') { ?>
    <video width="550" height="440" controls>
        <source src="{{URL::to($re->ansvisual)}}" type="video/mp4">
        </video>';

<?php    }
?>
<br>

<a href="javascript:void(0)" onclick="gstr('re{{$re->id}}')"
    class="w3-button w3-teal w3-text-white" title="Go Back!">
    <i class="fas fa-fast-backward" style="font-size: 24px;"></i> Go Back
</a>


<a  href="{{ URL::to('/delete/reply/'.$re->id) }}"
    onclick="return confirm('Do you really want to delete this message?')"
    class="w3-button w3-red">
    Delete <i class="fas fa-dumpster"></i>
</a>
</div>

<div>
{!! $re->ansproblem !!}
</div>

<div>
    <h3>
        Yours truly, <br>
        CAGRO Staff.
    </h3>
</div>

</div>


</div>
<?php } ?>
<script>
function openImg1(imgName1) {
  var i, x;
  x = document.getElementsByClassName("picture");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";

  }
document.getElementById(imgName1).style.display = "block";
document.getElementById('replied').style.display = "none";
}
function gstr(imgName1) {
document.getElementById(imgName1).style.display = "none";
document.getElementById('replied').style.display = "block";
}
</script>




</div>
  </div>




@endsection
