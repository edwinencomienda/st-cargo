
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

<form action="{{ route('livestockreq')}}" method="POST"  onsubmit="checkForm(this);">
    @csrf
    <input type="hidden" value="{{Auth::user()->uuid}}" name="farmer">

    <div class="w3-row">
     <div class="w3-container w3-half">
         <p>
             <label class="w3-text-teal">Livestock Program</label>
             <select class="w3-select" name="program" required id="program">
             <option value="" disabled selected>Livestock Program</option>
                 <?php

                    $users = DB::table('animalservice')->get();
                    foreach ($users as $users) { ?>
                    <option value="{{$users->id}}" id="lk">{{$users->description}}</option>
             <?php } ?>
               </select>
            </p>



       </div>

     <div class="w3-container w3-half">
         <p id="one" style="display: none;">
             <label class="w3-text-teal">Livestock Program</label>
             <select class="w3-select" name="products">
             <option value="" disabled selected>Poultry Program</option>
                 <?php

                    $users = DB::table('animalproduct')->where('animal_program',1)->get();
                    foreach ($users as $users) { ?>
                    <option value="{{$users->id}}" id="lk">{{$users->products}}</option>
             <?php } ?>
               </select>
            </p>

            <p id="two"  style="display: none;">
             <label class="w3-text-teal">Livestock Program</label>
             <select class="w3-select" name="products">
             <option value="" disabled selected>Livestock Program</option>
                 <?php

                 $users = DB::table('animalproduct')->where('animal_program',2)->get();
                    foreach ($users as $users) { ?>
                    <option value="{{$users->id}}" id="lk">{{$users->products}}</option>
             <?php } ?>
               </select>
            </p>

            <p id="three"  style="display: none;">
             <label class="w3-text-teal">Boat Program</label>
             <select class="w3-select" name="products">
             <option value="" disabled selected>Boat Program</option>
                 <?php

             $users = DB::table('fishproduct')->where('fish_program',3)->get();
                    foreach ($users as $users) { ?>
                    <option value="{{$users->id}}" id="lk">{{$users->products}}</option>
             <?php } ?>
               </select>
            </p>



     </div>

   </div>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <script>
   $( "#program" ).change(function() {
   var own = $( "#program option:selected" ).val();
   if (own == 1) {
       $('#one').show();

       $('#two').hide();
       $('#three').hide();
       $('#four').hide();


   }
   if (own == 2) {
     $('#one').hide();

     $('#two').show();
     $('#three').hide();
     $('#four').hide();
   }

   if (own == 3) {
     $('#one').hide();

     $('#two').hide();
     $('#three').show();
     $('#four').hide();
     //  $('#activity').hide();
   }

 //   if (own == 4) {
 //     $('#one').hide();

 //     $('#two').hide();
 //     $('#three').hide();
 //     $('#four').show();
 //     //  $('#activity').hide();
 //   }


   });
</script>

<p>
<label class="w3-text-teal">Quantity</label>
<input class="w3-input" name="quantity" id="hectare" required>
</p>
<input type="hidden" name="status" value="Uncheck" id="">


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

