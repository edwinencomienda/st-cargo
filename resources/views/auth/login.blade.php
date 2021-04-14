@extends('layouts.app')

@section('content')

<style>
input[type='text']{
            width: 70%;
        }
        input[type='password']{
            width: 100%;
        }
        input {
            border-top:none !important;
            border-left: none !important;
            border-right: none !important;
            border-bottom: solid !important;
            border-bottom-color: #bc986a !important;
            height: 44px !important;
            padding: 5px 5% !important;

            }
            input:focus, input.form-control:focus {
            outline:none !important;
            outline-width: 0 !important;
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            }
            div.form-item p.formLabel {
            position: absolute;
            left:26px;
            top:11px;
            transition:all .4s ease;
            color:#bbb;
            margin-left: 45px;
            }

            div#form{
            height:auto;
            background-color: #fff;
            margin:auto;
            border-radius: 5px;
            padding:20px;
            left:50%;
            top:11%;

            }
            hr{
                width: 50%;
                border: solid 1px green;

            }
            div.form-item{position: relative; display: block; margin-bottom: 40px;}

            div.form-item .form-style:focus{
            outline:none !important;
            outline-width: 0 !important;
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
                color:#58bff6; }
            .formTop{
                 top:-22px !important;
                 left:26px;
                 background-color: #fff;
                 padding:0 5px;
                 font-size: 14px;
                 color:#58bff6 !important;
                }
            .formStatus{color:#8a8a8a !important;}
            .container{
                margin-top: 5%;
                padding-top: 0;
                padding-left: 0;
                padding-right: 0;
                padding-bottom: 0;
            }
            .w3-display-container, .w3-row, .w3-half{

                padding-top: 0;
                padding-left: 0;
                padding-right: 0;
                padding-bottom: 0;
            }
            h1{
                font-family: 'Nunito';
                font-size: 33px;
            }
            .w3-display-middle{
                background-color:rgba(0,0,0,.5);
            }
            h4, h3{
                /* text-align: right !important; */
                color: black;
                font-family: 'Nunito';
                /* width: 27% !important; */
            }
            .w3-lit{
                background-image: url('/backimage/hf.png');
                background-position: center bottom;
                background-repeat: repeat-x;

            }
            .w3-sample{
                padding-left: 6%;
                padding-right: 6%;

                width: 80%;
                margin-left: 6%;
                margin-right: 6%;
                padding-top: 15%;
                width: 80%;

            }
</style>



<div class="container w3-margin-64 w3-card-4 w3-center">
    <div class="w3-row">
        <div class="w3-half w3-container w3-display-container" style="height: 600px;">
            <img class="w3-opacity-min" src="/backimage/paint2.jpg" width="100%" height="100%" alt="">
            <div class="w3-display-middle w3-card w3-round-xlarge w3-padding-32">
                <h1 class="w3-text-white w3-margin-16" >Department of Agriculture</h1>
                <img src="/backimage/da2.png" width="88px" height="88px" alt="" style="border-radius: 100px;">
                <img src="/backimage/lgu.png" width="88px" height="88px" alt="">

            </div>
        </div>
        <div class="w3-half w3-container w3-lit w3-white" style="height: 600px;">
        <br>
            <div class="w3-card-4 w3-white w3-sample">

                <div class="w3-center w3-margin-8">
                    <img src="/backimage/da.png" width="77px" height="77px" alt="">
                </div>
                <br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div id="formWrapper">
                        <div id="form">
                            <div id="logo"></div>


                            <div class="row">
                                <div class="col">
                                    <div class="form-item">
                                        <p class="formLabel" style="margin-left:-3% !important">
                                            <i class="fa fa-user-circle"></i>&nbsp;{{ __('E-Mail Address') }}
                                        </p>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-item">
                                        <p class="formLabel" style="margin-left:-3% !important">
                                            <i class="fa fa-user-secret"></i>&nbsp;{{ __('Password') }}
                                        </p>
                                        <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="form-check" style="margin-left:-57% !important">
                                <input class="form-check-input" type="checkbox" name="remember"
                                id="remember" {{ old('remember') ? 'checked' : '' }}
                                style="margin-top: -8px !important;" checked>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>

                            </div>


                            <br>
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                            <br>
                            <h5 class="w3-right">Not a member? <a href="{{route('registercustom')}}">Sign Up</a></h5>
                        </div>
                    </div>
                </form>
                <br>
              </div>
        </div>


      </div>
</div>
@endsection

<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function(){
      var formInputs = $('input[type="text"],input[type="password"],input[type="email"]');
      formInputs.focus(function() {
           $(this).parent().children('p.formLabel').addClass('formTop');
           $('div#formWrapper').addClass('darken-bg');
           $('div.logo').addClass('logo-active');
      });
      formInputs.focusout(function() {
        if ($.trim($(this).val()).length == 0){
        $(this).parent().children('p.formLabel').removeClass('formTop');
        }
        $('div#formWrapper').removeClass('darken-bg');
        $('div.logo').removeClass('logo-active');
      });
      $('p.formLabel').click(function(){
         $(this).parent().children('.form-style').focus();
      });
    });
    </script>
