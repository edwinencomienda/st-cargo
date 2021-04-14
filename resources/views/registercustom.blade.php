
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


</head>
<body class="w3-light-grey">

<div class="w3-row" style="margin-top: 11%">
    <div class="w3-half w3-container" style="padding-top:111px">

<div class="w3-center">
<img src="/backimage/agri.png" width="88" height="88" alt="">
<h1>City Agriculture of Panabo City</h1>
<h3 class="w3-text-grey">City Agriculture of Panabo City</h3>
<h4 class="w3-text-grey"> City Government of Panabo.
  <br> New City Hall Building,
  Daan Maharlika National Highway. Barangay J.P Laurel,
  <br> Panabo City, Davao del Norte, 8105. Philippines</h4>
  <br>
  <img src="/backimage/da2.png" class="w3-circle" height="55" width="55" alt="">
  <img src="/backimage/lgu.png" height="55" width="55" alt="">
</div>
    </div>
    <div class="w3-half w3-container">

        @if(Session::has('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
         {{Session::get('danger')}}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
        </div>
         @endif

        <form method="POST" action="{{ route('registration') }}" name="adduse"
        class="w3-container w3-card-4 w3-light-grey w3-text-brown w3-margin" onsubmit="return checkForm(this);">
        @csrf
            <h2 class="w3-center w3-padding-64">Department of Agriculture
                <br><br><img src="/backimage/lgu.png" width="88" height="88" alt="">
            </h2>

            <div class="w3-row w3-section">
              <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                <div class="w3-rest">
                    <input id="name" type="text"
                    class="form-control" placeholder="Insert Your Name"
                    name="name" value="" required autocomplete="name" autofocus>
                    <div class="alert alert-danger" style="display: none" id="name1">
                        <strong>Error!</strong>
                        <b id="mess1"></b>
                      </div>

                </div>
            </div>



            <div class="w3-row w3-section">
              <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
                <div class="w3-rest">
                    <input id="email" type="email" placeholder="Insert your email"
                    class="form-control" name="email" required autocomplete="email">
                    <div class="alert alert-danger" style="display: none" id="email1">
                        <strong>Error!</strong>
                        <b id="mess2"></b>
                      </div>

                </div>
            </div>

            <div class="w3-row w3-section">
              <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-unlock-alt"></i></div>
                <div class="w3-rest">
                    <input id="password" type="password" placeholder="Insert Password as an example: Pas5w@rd1"
                     class="form-control" name="password"
                      autocomplete="new-password" required>
                    <div class="alert alert-danger" style="display: none" id="password1">
                        <strong>Error!</strong>
                        <b id="mess3"></b>
                      </div>

                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-unlock-alt"></i></div>
                  <div class="w3-rest">
                      <input id="password" type="password" placeholder="Confirm Password"
                      class="form-control " name="password2" required>
                      <div class="alert alert-danger" style="display: none" id="password2">
                          <strong>Error!</strong>
                          <b id="mess4"></b>
                        </div>

                  </div>
              </div>

<input type="text" name="role" value="6" hidden>

            <button class="w3-button w3-block w3-section w3-brown w3-ripple w3-padding"
            name="myButton">
            Register
            </button>
<br>
            </form>
    </div>
  </div>

  <script>
    function checkForm(form) // Submit button clicked
   {
    //  var names = document.forms["adduse"]["name"].value;
    //      var email = document.forms["adduse"]["email"].value;
    //      var password = document.forms["adduse"]["password"].value;
    //      var password2 = document.forms["adduse"]["password2"].value;
    //      // var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    //      // var passw= ;



    //      if (names == "") {
    //          document.getElementById("name1").style.display = 'block';
    //          document.getElementById('mess1').innerHTML = 'Name must be atleast 7 characters! Example: Firstname Last Name';
    //      return false;
    //  }

    //  if (email == "") {
    //          document.getElementById("email1").style.display = 'block';
    //          document.getElementById('mess2').innerHTML = 'Required! Invalid Email';
    //      return false;
    //  }

    //  if (password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/)) {
    //      document.getElementById("password1").style.display = 'block';
    //      document.getElementById('mess3').innerHTML = 'Password Correct';
    //      return true;

    //  }
    //  else{
    //      document.getElementById("password1").style.display = 'block';
    //      document.getElementById('mess3').innerHTML = 'Password must have One Capital Letter <br> 1 Number <br>One Special Character <br>At least 8 characters! <br> Example F4rmer1#';
    //      return false;
    //  }







          form.myButton.disabled = true;
          form.myButton.value = "Please wait...";
          return true;
        }
 </script>

</body>
</html>


