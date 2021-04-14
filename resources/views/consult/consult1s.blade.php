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

}
.fgh{
    font-size: 18px !important;
}
.city{
    padding-left: 0;
    padding-right: 0;
}

</style>

@section('content')
<div class="fttp">
    <div class="w3-row">
        <div class="w3-col w3-white dsty w3-bar-block w3-light-grey w3-card"  style="width:250px">
<div class="w3-brown" style="height: 55px;">

</div>

            <div class="w3-center w3-padding-64">
                <img src="/backimage/lgu.png" height="115" width="115" alt="">
            </div>
            <button type="button" class="btn btn-lg btn-block w3-teal w3-padding-16" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-bullhorn" style="font-size: 17px;"></i>
                <i class="fas fa-plus" style="font-size: 17px;"></i>Add
              </button>
               @include('consult.add')
            <div class="w3-sand">
                <button class="w3-bar-item w3-padding-32 w3-card-4 w3-button tablink" onclick="openLink(event, 'Fade')"
                style="font-size: 21px;">
                    <i class="fas fa-inbox"></i>
                    <sup>
                        <span class="w3-badge w3-red w3-padding-16">
                        @php
                        $users = DB::table('consultation')->where('reading', 'Unread')->count();
                        echo $users;
                          @endphp
                          </span>
                        </sup>
                         &nbsp;Inbox
                </button>
            </div>

            <div class="w3-sand">
                <button class="w3-bar-item w3-button w3-card-4 w3-padding-32 tablink"
                onclick="openLink(event, 'Left')" style="font-size: 21px;">
                <i class="fas fa-paper-plane"></i>&nbsp; Sent Item</button>

            </div>


            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Zoom')">Zoom</button>
        </div>


        <div class="w3-rest w3-white w3-card-4 ffs">
<div id="pana">
@include('consult.consults')
</div>

            <div id="Fade" class="w3-container city w3-animate-opacity" style="display:none">

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

                    <div class="w3-container" id="gibasa">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<div>
    <div class="w3-row w3-section ">
        <div class="w3-col w3-brown w3-center w3-padding-8" style="width:50px;height:55px !important;
        padding-top:15px !important">
            <i class="fas fa-search" style="font-size: 22px;"></i></div>
          <div class="w3-rest w3-border w3-border-teal"
           style="width: 224px !important;height:55px !important; ">
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

    <a href="javascript:void(0)" class="w3-hover-opacity"
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
                          <?php } ?>

                        </ul>


                    </div>


<br>
<hr>All Message <hr>
{{-- Read --}}
<div id="test-list">

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

    <a href="javascript:void(0)" class="w3-hover-opacity"
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
page: 5,
pagination: true
});

</script>






                    </div>



                  </div><br>
                  <br>

@foreach ($cons as $co)
                <div id="giba{{$co->id}}" class="picture w3-display-container" style="display:none">
                   <div class="w3-left">
                    <h3>
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
    <input type="hidden" value="Read" name="read">
<button  type="submit" onclick="giba('giba{{$co->id}}')"
    class="w3-button w3-teal w3-text-white" title="Go Back!">
    <i class="fas fa-fast-backward" style="font-size: 24px;"></i> Go Back
</button>

</form>
 <a href="#reply{{$con->id}}" class="w3-button w3-sand" data-toggle="modal">
        Reply <i class="far fa-comment-dots"></i></i>
    </a>

<a  href="{{ URL::to('/delete/consultation/'.$con->id) }}"
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

<a href="javascript:void(0)" onclick="basa('giba{{$co->id}}')"
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
function openImg12(imgName12) {
var i, x;
x = document.getElementsByClassName("picture");
for (i = 0; i < x.length; i++) {
  x[i].style.display = "none";
}
document.getElementById(imgName12).style.display = "block";
document.getElementById('gibasa').style.display = "none";
}

function giba(imgName12) {
document.getElementById(imgName12).style.display = "none";
document.getElementById('gibasa').style.display = "block";
}


</script>

            </div>
              <div id="Left" class="w3-container city w3-animate-opacity" style="display:none">


                @include('consult.replying')



              </div>


     <div id="Zoom" class="w3-container city w3-animate-fade" style="display:none">
        <h2>Zoom in</h2>

        <p>It is the center of the Greater Tokyo Area, and the most populous metropolitan area in the world.</p>
      </div>

        </div>
        <script>
            function openLink(evt, animName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("city");
                for (i = 0; i < x.length; i++) {
                  x[i].style.display = "none";


                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < x.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
                }
                document.getElementById(animName).style.display = "block";
                evt.currentTarget.className += " w3-red";
                document.getElementById("pana").style.display = "none";
              }
              </script>

      </div>
<br><br>
</div>
@endsection
