
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">


    <style>
        h1,h2,h3,h4,h5{
            font-family: 'Nunito';
        }
    </style>
</head>
<body>
    @include('farmers.include.nav')

    <h1 class="w3-padding-16" style="padding-left:25px;">Billing Records</h1>
    <div class="alert alert-warning" style="padding-left:25px;">
    <strong>Notice!</strong> The records shown here are all of your request. Thus, there are no records of payments listed. Thank you.</a>.
    </div>

    <div class="w3-row">
        <div class="w3-half w3-container w3-padding-brown w3-brown">

            <h1 class="w3-padding-16">Loan Request</h1>
                        <table id="mytable" class="table table-hover display w3-white w3-padding-32">
                            <thead>
                                <tr>
                                <th>Amount</th>
                                <th>Requested On</th>
                                <th>Approved On</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                     $reply = DB::table('loanrequest')->where('farmer', Auth::user()->uuid)->get();
                                   foreach ($reply as $re) { ?>

                            <tr>
                                <td>{{$re->amount}}</td>
                                <td>{{$re->created_at}}</td>
                                <td>{{$re->approved_on}}</td>
                            </tr>
                        <?php } ?>

                        </tbody>
                        </table>

        </div>
        <div class="w3-half w3-container w3-card-4">

            <h1 class="w3-padding-16">Tractor Request</h1>
            <table id="thistable" class="table table-hover display w3-white w3-padding-32">
                <thead>
                    <tr>
                    <th>Amount</th>
                    <th>Requested On</th>
                    <th>Approved On</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                       $reply = DB::table('tractorrequest')->where('uuid', Auth::user()->uuid)->get();
                       foreach ($reply as $re) { ?>

                <tr>
                    <td>{{$re->amount}}</td>
                    <td>{{$re->created_at}}</td>
                    <td>{{$re->approved_on}}</td>
                </tr>
            <?php } ?>

            </tbody>
            </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
            $.noConflict();
            $('#thistable').DataTable();
        } );
</script>



        </div>
      </div>




    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $.noConflict();
            $('#mytable').DataTable();
        } );
    </script>
</html>

