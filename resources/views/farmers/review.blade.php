
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

<div class="container-fluid w3-light-grey w3-padding-64">
<h1 class="w3-center">
    Request Review
</h1>
<br><br>
<div class="container w3-white w3-padding-64 w3-card-4">
    <h2>Enrollment Request</h2>

    <table class="w3-table-all w3-padding-16">
        <thead>
        <tr class="w3-brown">
            <td>Parcel</td>
            <td>Program</td>
            <td>Approved</td>
        </tr>
        </thead>
<?php
 $trservice = DB::table('enrollment')->where('farmer', Auth::user()->uuid)->latest()->get();
 foreach ($trservice as $trs) { ?>
<tr>
    <td>
        {{$trs->parcel}}
    </td>
    <td>
        @if ($trs->program = "")
            Waiting

        @else
            @if ($trs->program == 2)
                Crop Sector
            @endif

        @if ($trs->program == 3)
            Fishery Sector
        @endif

        @if ($trs->program == 4)
            Livestock Sector
        @endif

        @endif

    </td>
    <td>
        @if ($trs->status == "")
            Waiting
        @else
            {{$trs->status}}
        @endif
    </td>
</tr>
<?php }
?>

    </table>
    <br>
</div>

</div>




<div class="container-fluid w3-light-grey w3-padding-64">

    <div class="container w3-white w3-padding-64 w3-card-4">
        <h2>Crop Request</h2>

        <table class="w3-table-all w3-padding-16">
            <thead>
            <tr class="w3-brown">
                <td>Products</td>
                <td>Quantity</td>
                <td>Approved</td>
            </tr>
            </thead>
    <?php
     $trservice = DB::table('croprequest')->where('farmer', Auth::user()->uuid)->latest()->get();
     foreach ($trservice as $trs) { ?>
    <tr>
        <td>
            <span class="tservice">
                <?php $tser = DB::table('cropproduct')
                ->where('id', $trs->products)->get();
                foreach ($tser as $key => $t) {
                }?>
                {{$t->products}}
            </span>
        </td>
        <td>
           {{$trs->quantity}}
        </td>
        <td>
            @if ($trs->approved == "")
                Waiting
            @else
                {{$trs->approved}}
            @endif
        </td>
    </tr>
    <?php }
    ?>

        </table>
        <br>
    </div>

    </div>



    <div class="container-fluid w3-light-grey w3-padding-64">

        <div class="container w3-white w3-padding-64 w3-card-4">
            <h2>Fishery Request</h2>

            <table class="w3-table-all w3-padding-16">
                <thead>
                <tr class="w3-brown">
                    <td>Products</td>
                    <td>Quantity</td>
                    <td>Approved</td>
                </tr>
                </thead>
        <?php
         $trservice = DB::table('croprequest')->where('farmer', Auth::user()->uuid)->latest()->get();
         foreach ($trservice as $trs) { ?>
        <tr>
            <td>
                <span class="tservice">
                    <?php $tser = DB::table('fishproduct')
                    ->where('id', $trs->products)->get();
                    foreach ($tser as $key => $t) {
                    }?>
                    {{$t->products}}
                </span>
            </td>
            <td>
               {{$trs->quantity}}
            </td>
            <td>
                @if ($trs->approved == "")
                    Waiting
                @else
                    {{$trs->approved}}
                @endif
            </td>
        </tr>
        <?php }
        ?>

            </table>
            <br>
        </div>

        </div>



    <div class="container-fluid w3-light-grey w3-padding-64">

        <div class="container w3-white w3-padding-64 w3-card-4">
            <h2>Livestock Request</h2>

            <table class="w3-table-all w3-padding-16">
                <thead>
                <tr class="w3-brown">
                    <td>Products</td>
                    <td>Quantity</td>
                    <td>Approved</td>
                </tr>
                </thead>
        <?php
         $trservice = DB::table('animalrequest')->where('farmer', Auth::user()->uuid)->latest()->get();
         foreach ($trservice as $trs) { ?>
        <tr>
            <td>
                <span class="tservice">
                    <?php $tser = DB::table('animalproduct')
                    ->where('id', $trs->products)->get();
                    foreach ($tser as $key => $t) {
                    }?>
                    {{$t->products}}
                </span>
            </td>
            <td>
               {{$trs->quantity}}
            </td>
            <td>
                @if ($trs->approved == "")
                    Waiting
                @else
                    {{$trs->approved}}
                @endif
            </td>
        </tr>
        <?php }
        ?>

            </table>
            <br>
        </div>

        </div>



    <div class="container-fluid w3-light-grey w3-padding-64">

        <div class="container w3-white w3-padding-64 w3-card-4">
            <h2>Loan Request</h2>

            <table class="w3-table-all w3-padding-16">
                <thead>
                <tr class="w3-brown">
                    <td>Amount</td>
                    <td>Date Requested</td>
                    <td>Approved</td>
                </tr>
                </thead>
        <?php
         $trservice = DB::table('croprequest')->where('farmer', Auth::user()->uuid)->latest()->get();
         foreach ($trservice as $trs) { ?>
        <tr>
            <td>
                <span class="tservice">
                    <?php $tser = DB::table('fishproduct')
                    ->where('id', $trs->products)->get();
                    foreach ($tser as $key => $t) {
                    }?>
                    {{$t->products}}
                </span>
            </td>
            <td>
               {{$trs->quantity}}
            </td>
            <td>
                @if ($trs->approved == "")
                    Waiting
                @else
                    {{$trs->approved}}
                @endif
            </td>
        </tr>
        <?php }
        ?>

            </table>
            <br>
        </div>

        </div>










    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>
</body>
</html>

