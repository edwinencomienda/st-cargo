@extends('layouts.newapp')

<style>
    .profiling{
        margin-top: -2%;
        background-color:#dbb17a;
    }
    .p-2{
        padding-left: 64px !important;
        padding-right: 64px !important;
    }
    h1,h3{
        font-family: 'Nunito' !important;
    }
    #pfd{
        font-size: 64px;
    }
    .ff{
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
    #hjt{
        background-image: url('/backimage/panabo22.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@section('content')

<div class="container-fluid w3-brown ff "  style="margin-top: -4% !important; margin-bottom:-4% !important">

    <div class="w3-row ff">
        <div class="w3-display-container w3-container w3-twothird ff" id="hjt" style="height: 555px;">

<div class="w3-display-bottomleft w3-brown w3-padding-32 w3-card-4 " style="width:58%;">
<h1 style="padding-left: 25px !important; ">
    <img src="/backimage/agri.png" width="122" height="122" alt=""> CAGRO Dashboard
</h1>
<br>
<h3 style="padding-left: 25px !important; ">Name: &nbsp;{{Auth::user()->name}}</h3>
<h3 style="padding-left: 25px !important; ">
Email &nbsp;{{Auth::user()->email}}</h3>
</div>

        </div>
        <div class="w3-container w3-third ff">

           <div c lass="w3-padding-64 w3-center">
<br><br><br>
            <h2 class="w3-center">
                <img src="/backimage/lgu.png" height="115" width="115" alt="">
                <br> Research Sector Admin</h2>

            </div>

        </div>
      </div>

</div>


@endsection
