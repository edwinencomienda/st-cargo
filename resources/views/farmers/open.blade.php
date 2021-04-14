@extends('farmers.app')

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

    <div class="w3-rest w3-white ffs" style="padding-left: 55px;padding-right: 55px;">

<br><br><br><br>
        <h1 class="text-center">
            {{$convo->title}}
        </h1>
        <h2>
            From:
            @php
                $cdd = DB::table('users')->where('uuid', $convo->farmer)->get();
                foreach ($cdd as $cd) {
                    echo $cd->email;
                }
            @endphp
        </h2>

        <h3>
            Concern:

           @php
            if ($convo->role == 1) {
                echo 'Applied and Machinery Concern';
            }
            if ($convo->role == 2) {
                echo 'Crops Concern';
            }
            if ($convo->role == 3) {
                echo 'Fishery Concern';
            }
            if ($convo->role == 4) {
                echo 'Livestock Concern';
            }

           @endphp

        </h3>

        <div class="container w3-center w3-padding-32">
            <div class="d-flex justify-content-center mb-3">
                <div class="p-2">
                    <form action="{{url('/readme/'.$convo->id)}}" method="POST">
                        @csrf
                            <input type="hidden" value="Read" name="read">
                        <button  type="submit" class="w3-button w3-white" title="Go Back!">
                            <i class="fas fa-fast-backward" style="font-size: 24px;"></i> Go Back
                        </button>

                        </form>
                </div>

                <div class="p-2 ">

                    <a href="#reply{{$convo->id}}" class="w3-button w3-sand" data-toggle="modal">
                    Reply <i class="far fa-comment-dots"style="font-size: 24px;"></i></i>
                   </a>
                   <div class="w3-left">@include('consult.reply')</div>
                 </div>
                <div class="p-2">
                    <a  href="{{ URL::to('/delete/consultation/'.$convo->id) }}"
                        onclick="return confirm('Do you really want to delete this message?')"
                        class="w3-button w3-red">
                        Delete <i class="fas fa-dumpster"></i>
                    </a>
                </div>

              </div>
            <?php
            if ( substr($convo->visual,-3) == 'jpg'){ ?>
            <img class="w3-round w3-animate-fade" src="{{URL::to($convo->visual)}}"
            style="width:50%;">';

        <?php }
            if (substr($convo->visual,-3) == 'mp4') { ?>
            <video width="550" height="440" controls>
                <source src="{{URL::to($convo->visual)}}" type="video/mp4">
                </video>';

        <?php    }
        ?>
        </div>

        <h3>Content</h3>
        Date: {{$convo->created_at}}
        <h3>

            {!! $convo->problem !!}
        </h3>
<br><br>
<div class="container-fluid w3-light-gray" style="height:3px"></div>
<br><br>

<?php
   $reply = DB::table('reply')
   ->where('conid', $convo->id)
   ->where('farmer', $convo->farmer)
   ->get();
//     if ($reply->count()<0) {
//         foreach ($reply as  $rep) {
//         echo '<div class="w3-panel w3-leftbar w3-sand w3-xxlarge w3-serif">
//   <p><i>"There are no reply/ies yet!"</i></p>
// </div>';
//         }

//     } else {
       foreach ($reply as $rep) {
     //   if($rep->count() > 0){ ?>
<br>
<h1>
To:  @php
$const = DB::table('farmerprofile')->where('uuid', $rep->farmer)->get();
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
</h1>

Concern Subject {{$convo->title}}
Date Received: {{$convo->created_at}} <br>
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
    </video>

<?php    }
?>




<br><br>
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

<?php
}
// else {
//     echo '1';
// }}
?>


    </div>
  </div>


@endsection
