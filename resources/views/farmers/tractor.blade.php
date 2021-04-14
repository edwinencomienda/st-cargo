
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="{{ asset('fontawesome/js/brand.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome/js/solid.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome/js/fontawesome.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">


    <!-- Fontawesome5 -->

    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href=" {{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/brand.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">


    <style>
        h1,h2,h3,h4,h5{
            font-family: 'Nunito';
        }
    </style>
</head>
<body>
    @include('farmers.include.nav')


      {{-- sa main na ni --}}



<style>
    input{
        border: solid .8px !important;
    }
</style>
<div class="w3-row w3-padding-64">
    <div class="w3-half w3-container w3-padding-64">
     <div class="w3-center w3-padding-64">
        <h1>Request</h1>
        <img src="/backimage/lgu.png" height="115" width="115" alt="">
     </div>
    </div>
    <div class="w3-half w3-container">

        <div class="container w3-padding-64 w3-white">

@if(Session::has('success'))
<div class="alert alert-success">
{{Session::get('success')}}
</div>
@endif



<form action="{{ route('trradd')}}" method="POST"  onsubmit="checkForm(this);">
    @csrf
    <input type="hidden" name="uuid" value="{{Auth::user()->uuid}}" id="">


    <p style="display:block">
        <label class="w3-text-teal w3-left">Choose Land Parcel</label>
        <select class="w3-select w3-border" name="brgylocation">
            <option value="" selected>Choose you farm parcel.</option>
            <?php
               $reply = DB::table('farmparcel')->where('uuid', Auth::user()->uuid)->get();
            foreach ($reply as $rep) {?>
            <option value="{{$rep->id}}">@php
                 $repz = DB::table('baranggay')->where('id', $rep->location)->get();
                 foreach ($repz as $re) {
                     echo $re->brgy;
                 }
            @endphp</option>

<?php     } ?>
        </select>
    </p>




    <div class="w3-row">
     <div class="w3-container w3-half">
         <p>
             <label class="w3-text-teal">Tractor Service</label>
             <select class="w3-select" name="tractor_service" required id="tract">
             <option value="" disabled selected>Tractor Service</option>
                 <?php

                    $users = DB::table('tractorservice')->get();
                    foreach ($users as $users) { ?>
                    <option value="{{$users->id}}" id="lk">{{$users->service}}</option>
             <?php } ?>
               </select>
            </p>


       </div>

     <div class="w3-container w3-half">
         <p>
             <label class="w3-text-teal">Price</label>
             <input class="w3-input" name="number" readonly id="price"
             oninput="LengthConverter(this.value)" onchange="LengthConverter(this.value)">
         </p>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
  $( "#tract" ).change(function() {
 var sel = $( "#tract option:selected" ).val();
 if (sel == 1) {
      var d ="<?php $d = DB::table('tractorservice')->where('id', 1)->get();  foreach ($d as $d){ echo $d->price; } ?>"
     $('#price').val(d);
     $('#hectare').val("");
     $('#pay').val("");
 }
     if (sel == 2) {
     // var ab = document.getElementById('tract').value;
      var d ="<?php $d = DB::table('tractorservice')->where('id', 2)->get();  foreach ($d as $d){ echo $d->price; } ?>"
     $('#price').val(d);
     $('#hectare').val("");
     $('#pay').val("");
 }

  });

     </script>
   </div>






   <div class="w3-row">
     <div class="w3-container w3-half">
         <p>
             <label class="w3-text-teal">Hectare</label>
             <input class="w3-input" name="hectare" id="hectare"
             oninput="LengthConverter(this.value)" onchange="LengthConverter(this.value)">
            </p>


       </div>

     <div class="w3-container w3-half">
         <p>
             <label class="w3-text-teal">Total Amount</label>
             <input class="w3-input" name="payamount" readonly id="pay">
         </p>
     </div>
   </div>

   <script>

         function LengthConverter(valNum) {
            var t = document.getElementById("price").value;
             document.getElementById("pay").value =valNum * t;
         }
   </script>

<input type="hidden" name="approved" value="{{"Waiting"}}" id="">

<input type="hidden" name="status" value="{{"Uncheck"}}" id="">


    <br>
    <button type="submit" class="w3-bar-item w3-button w3-brown" name="submit1" style="width:100%">
        <i class="fas fa-paper-plane"></i> Submit
    </button>
</form>




        </div>
    </div>
  </div>






<script>
function checkForm(form)
  {
    form.submit1.disabled = true;
    form.submit1.value = "Please wait...";
    return true;
  }
</script>




    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>



</body>
</html>

