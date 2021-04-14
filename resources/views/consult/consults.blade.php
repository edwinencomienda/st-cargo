<div class="w3-row" id="">
    <div class="w3-col l12 s6" style="background-color:  #C0AB8E;">
      <h1 class="text-right" id="jt" style="padding-right: 15px;">
          <br><br><br>
          <b style="font-size:22px;color:#61361e">CONCERNS</b>
          <b style="font-size:32px;color:#f4f0bd">QUERIES</b>
      </h1>
    </div>
  </div>


<div class="w3-row-padding">
    <div class="w3-center w3-padding-64">
        <img src="/backimage/da2.png" height="88" width="88" alt="">
    </div>

    <div class="w3-container" id="fst">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<div>
<div class="w3-row w3-section ">
<div class="w3-col w3-brown w3-center w3-padding-8" style="width:50px;height:55px !important;
padding-top:15px !important">
<i class="fas fa-search" style="font-size: 22px;"></i></div>
<div class="w3-rest w3-border w3-border-teal" style="width: 224px !important;height:55px !important; ">
<input class="search w3-input w3-border" name="first" type="text" placeholder="Search"
style="height:55px !important;">
</div>
</div>

<ul class="w3-ul w3-border list" id="myList" style="width:100%">
<?php
$read = DB::table('consultation')->where('role', Auth::user()->role)->where('reading', 'Unread')->latest()->get();
foreach ($read as $con) {
?>

<li class="w3-card">
<p>
<h3 class="name">
From: &nbsp;&nbsp;&nbsp; @php
$const = DB::table('farmerprofile')->where('uuid', $con->farmer)->get();

if (!$const->isEmpty()) {
echo $const->lname . ', ' . $const->fname . ' '. $const->mname;
}
else {
//
echo 'No Name';
}
@endphp
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="text-center">
Subject: &nbsp;&nbsp;&nbsp; {{$con->title}}
</span>
<span class="w3-right">
Date:  {{$con->created_at}}

<a href="javascript:void(0)" class="w3-hover-opacity" onclick="openImg('{{$con->id}}');" title="Click to Read Message">
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
          <?php } ?>

        </ul>


    </div>


<br>
<hr>All Message <hr>
{{-- Read --}}
<div id="test-lista">

<ul class="w3-ul w3-border list" id="myList" style="width:100%">

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
From: &nbsp;&nbsp;&nbsp; @php
$const = DB::table('farmerprofile')->where('uuid', $con->farmer)->get();

if (!$const->isEmpty()) {
echo $const->lname . ', ' . $const->fname . ' '. $const->mname;
}
else {
//
echo 'No Name';
}
@endphp
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="text-center">
Subject: &nbsp;&nbsp;&nbsp; {{$con->title}}
</span>
<span class="w3-right">
Date:  {{$con->created_at}}

<a href="javascript:void(0)" class="w3-hover-opacity" onclick="openImg('{{$con->id}}');" title="Click to Read Message">
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
var monkeyListzz = new List('test-lista', {
valueNames: ['name'],
page: 5,
pagination: true
});

</script>


    </div>

</div><br>
<br>

@foreach ($cons as $co)
<div id="{{$co->id}}" class="picture w3-display-container" style="display:none">

 <div class="w3-left">
  <h3>
      From:  @php
      $const = DB::table('farmerprofile')->where('uuid', $co->farmer)->get();

          if (!$const->isEmpty()) {
              foreach ($const as $cst) {
                echo $cst->lname . ', ' . $cst->fname . ' '. $cst->mname;
              }

          }
          else {
              //
              echo 'No Name';
          }
   @endphp
   <br>
   Concern on:  @php
   if ($co->role == 1) {
       echo 'Applied and Machinery Concern';
   }
   if ($co->role == 2) {
       echo 'Crops Concern';
   }
   if ($co->role == 3) {
       echo 'Fishery Concern';
   }
   if ($co->role == 4) {
       echo 'Livestock Concern';
   }

  @endphp
  <br>
  Date Sent: {{$co->created_at}}
  </h3>
 </div>
<br><br>
 <div class="w3-center w3-padding-64">
  <?php
  if ( substr($co->visual,-3) == 'jpg'){ ?>
  <img class="w3-round w3-animate-fade" src="{{URL::to($co->visual)}}"
  style="width:50%;">';

<?php }
  if (substr($co->visual,-3) == 'mp4') { ?>
  <video width="550" height="440" controls>
      <source src="{{URL::to($co->visual)}}" type="video/mp4">
      </video>';

<?php    }
?>
<br>
<form action="{{url('/readme/'.$co->id)}}" method="POST">
@csrf
<input type="text" value="Read" name="read">
<button  type="submit" onclick="fstr('{{$co->id}}')"
class="w3-button w3-teal w3-text-white" title="Go Back!">
<i class="fas fa-fast-backward" style="font-size: 24px;"></i> Go Back
</button>

</form>
<a href="#reply{{$co->id}}" class="w3-button w3-sand" data-toggle="modal">
Reply <i class="far fa-comment-dots"></i></i>
</a>

<a  href="{{ URL::to('/delete/consultation/'.$co->id) }}"
onclick="return confirm('Do you really want to delete this message?')"
class="w3-button w3-red">
Delete <i class="fas fa-dumpster"></i>
</a>
@include('consult.reply')
 </div>

<div>
{!! $co->problem !!}
</div>

<h3>
Sincerly yours, <br>
From:  @php
$const = DB::table('farmerprofile')->where('uuid', $con->farmer)->get();

if (!$const->isEmpty()) {
echo $const->lname . ', ' . $const->fname . ' '. $const->mname;
}
else {
//
echo 'No Name';
}
@endphp

</h3>


<br>

<div class="w3-brown" style="height:15px"></div>
<h3 class="text-center w3-padding-32">
Your Reply <i class="fas fa-comment-dots"></i>
</h3>

<?php
$reply = DB::table('reply')->where('conid', $con->id)->latest()->get();
if ($reply->count()<0) {
foreach ($reply as  $rep) {
echo '<div class="w3-panel w3-leftbar w3-sand w3-xxlarge w3-serif">
<p><i>"There are no reply/ies yet!"</i></p>
</div>';
}

} else {
foreach ($reply as $rep) { ?>


<div class="w3-padding-32">

<h3>
Sending to: &nbsp;&nbsp;&nbsp; @php
$const = DB::table('farmerprofile')->where('uuid', $rep->farmer)->get();

if (!$const->isEmpty()) {
echo $const->lname . ', ' . $const->fname . ' '. $const->mname;
}
else {
//
echo 'No Name';
}
@endphp
Concern Subject {{$co->title}}
Date Received: {{$co->created_at}} <br>
Date Replied: {{$rep->created_at}} <br>
</h3>
<br>
<hr>
<br>
<h3>
Replied from: CAGRO Staff! <br>
Subject: {{$rep->anstitle}} <br>
</h3>

<div class="w3-center">
<?php
if ( substr($rep->ansvisual,-3) == 'jpg'){ ?>
<img class="w3-round w3-animate-fade" src="{{URL::to($rep->ansvisual)}}"
style="width:50%;">';

<?php }
if (substr($rep->ansvisual,-3) == 'mp4') { ?>
<video width="550" height="440" controls>
<source src="{{URL::to($rep->ansvisual)}}" type="video/mp4">
</video>';

<?php    }
?>
<br>

<a href="javascript:void(0)" onclick="fstr('{{$co->id}}')"
class="w3-button w3-teal w3-text-white" title="Go Back!">
<i class="fas fa-fast-backward" style="font-size: 24px;"></i> Go Back
</a>


<a  href="{{ URL::to('/delete/reply/'.$rep->id) }}"
onclick="return confirm('Do you really want to delete this message?')"
class="w3-button w3-red">
Delete <i class="fas fa-dumpster"></i>
</a>
</div>

<div>
{!! $rep->ansproblem !!}
</div>

<div>
<h3>
Yours truly, <br>
CAGRO Staff.
</h3>
</div>

</div>


<?php   }
}
?>

</div>
{{-- @else

@endif --}}
@endforeach
<br><br>
<script>
function openImg(imgName) {
var i, x;
x = document.getElementsByClassName("picture");
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";
}
document.getElementById(imgName).style.display = "block";
document.getElementById('fst').style.display = "none";
}

function fstr(imgName) {
document.getElementById(imgName).style.display = "none";
document.getElementById('fst').style.display = "block";
}


</script>
