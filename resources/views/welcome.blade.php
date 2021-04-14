<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>City Agriculture of Panabo City</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        {{-- W3 Css --}}
        <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }

            .head-first{
                background-color: whitesmoke;
                background-image: url('/backimage/vege.jpg');
                height: 300px !important;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .box-file{
                height: 300px !important;
                background-image:linear-gradient(to right, #ffeeff 50% , #bc986a 50%) !important;
                margin-top: -15% !important;
            }
            .low-div{
                margin-top: -10% !important;
                /* background-image: url('/backimage/panabo.jpg'); */
                background-size: cover;
                background-position: center;
                height: 500px !important;
                padding-top: 0;
                padding-bottom: 0;
                padding-left: 0;
                padding-right: 0;
            }
            .car{
                background-color: #fff !important;
                padding-top: 0;
                padding-bottom: 0;
                padding-left: 0;
                padding-right: 0;
            }
            .w3-row, .w3-half{
                padding-top: 0;
                padding-bottom: 0;
                padding-left: 0;
                padding-right: 0;
            }
            h1{
                font-family: 'Nunito';
                color: #fff;
                font-size: 48px;
                padding-left: 48px;
                padding-right: 48px;
            }
            #design1{
                height: 2px;
                width: 61%;
                margin-right: 20%;
            }
            .bot-1{
                margin-top: -3%;
                background-color: #fde9cf;
                height: auto;
                padding-top: 111px !important;
            }
            .w3-panel{
                width:44% !important;
            }
            .card-mix{
                width: 111px !important;
                height: auto;
            }

            .des-2{
              height: 3px;
              width: 100%;
              background-color: #bc986a;
            }
            footer{
              height: 55px;
            }

        </style>
    </head>
    <body class="antialiased">



          @if (Route::has('login'))
          <div class="">
              @auth
              <div class=w3-top>
                  <div class="w3-bar w3-light-grey w3-border">
                      @if (Auth::user()->role == 1)
                      <a href="{{ route('applied') }}" class="w3-bar-item w3-button w3-right" title="HOME">
                        <i class="fa fa-home"></i>
                      </a>
                      @endif



                  </div>
                </div>

              @else

              <div class=w3-top>
                  <div class="w3-bar w3-light-grey w3-border">
                    <a href="{{ route('login') }}" class="w3-bar-item w3-button w3-right" title="LOG-IN">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ url('/registration/custom') }}" class="w3-bar-item w3-button w3-right" title="REGISTER">
                      <i class="fas fa-edit"></i>
                    </a>
                    @endif
                    @endauth
                  </div>
                </div>
          </div>
      @endif



      <div class="relative head-first flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
          <div class="w3-card w3-padding-48 w3-round-xlarge w3-center" style="background-color: rgba(0,0,0,.5);">
            <h1 class="w3-margin-48 w3-center">City Agriculture Office <br> of Panabo City</h1>
            <div class="w3-center">
                <div class="w3-brown w3-right" id="design1"></div>




            </div>
          </div>

        </div>



        <div class="container-fluid jumbotron low-div">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253257.97602697!2d125.50745507344996!3d7.33638540980374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f9445a6069e8ff%3A0x6d7c86d2af94b950!2sPanabo%2C%20Davao%20del%20Norte!5e0!3m2!1sen!2sph!4v1610162160968!5m2!1sen!2sph"
                width="100%" height="100%" frameborder="0" style="border:0;"
                allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

        </div>


            <div class="w3-display-container w3-mobile container-fluid w3-row w3-margin-48 w3-padding-64 bot-1">
                <br><br><br><br>
                <br><br><br>
                <br><br><br><br>
                <br><br><br>
                <br><br><br><br>
                <br><br><br>
                <div class="w3-display-middle">

                  <div class="w3-container  w3-cell w3-mobile">
                    <div class="w3-card-4 w3-white">
                      <img src="/backimage/fish.png" width="223px" height="223px" alt="">
                    </div>
                  </div>

                  <div class="w3-container  w3-cell w3-mobile">
                    <div class="w3-card-4 w3-white">
                      <img src="/backimage/crop.png" width="223px" height="223px" alt="">
                    </div>
                  </div>

                  <div class="w3-container  w3-cell w3-mobile">
                    <div class="w3-card-4 w3-white">
                      <img src="/backimage/livestock.png" width="223px" height="223px" alt="">
                    </div>
                  </div>

                  <div class="w3-container w3-cell w3-mobile">
                    <div class="w3-card-4 w3-white">
                      <img src="/backimage/assitance.png" width="223px" height="223px" alt="">
                    </div>
                  </div>

                  <br><br><br>
                  <div class="des-2"> &nbsp;</div>

                </div>

            </div>

            <footer class="w3-light-grey w3-border">

            </footer>
    </body>
</html>
