<style>
    .w3-dropdown-content{
        z-index: 8 !important;
        position: fixed;

    }
</style>
<div class="w3-bar w3-light-grey w3-border w3-top w3-nav1"  id="navtops">
    <button id="openNav" class="w3-button w3-large" onclick="w3_open()">
        <i class="fas fa-caret-square-left"></i>
    </button>
    <button class="w3-bar-item w3-button w3-large"
    onclick="w3_close()" id="close" style="display: none">
    <i class="fas fa-caret-square-right"></i>
    </button>
    {{-- <a href="#" class="w3-bar-item w3-button"></a> --}}
    <!-- Authentication Links -->
    @guest



    @if (Route::has('login'))
    <a href="{{ route('login') }}" class="w3-bar-item w3-button w3-right" title="HOME">
        <i class="fa fa-home"></i> {{ __('Login') }}
    </a>
    @endif

    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="w3-bar-item w3-button w3-right" title="REGISTER">
        <i class="fas fa-edit"></i> {{ __('Register') }}
    </a>
    @endif

    @else






    <div class="w3-dropdown-click w3-right">
        <button class="w3-button" onclick="myFunction()">
            <i class="fas fa-user-clock"></i>
        </button>

        <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border w3-center" style="right:0">
            <br>
          <a href="{{ url('/myprofile/profiling') }}" class="w3-bar-item w3-button"
          data-toggle="tooltip" data-placement="bottom" title="See Your Profile!">
              <i class="fas fa-id-badge"></i></a>
          <a href="{{ route('logout') }}" class="w3-bar-item w3-button"
          data-toggle="tooltip" data-placement="bottom" title=" {{ __('Logout') }}"  onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
          <br>
        </div>
      </div>
      <script>
        function myFunction() {
          var x = document.getElementById("Demo");
          if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
          } else {
            x.className = x.className.replace(" w3-show", "");
          }
        }
        </script>

    <script src="{{asset('js/app.js')}}"></script>
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
      </script>

@switch(Auth::user()->role)
    @case(1)
  <a href="{{ route('applied') }}" class="w3-bar-item w3-button w3-right"><i class="fa fa-home"></i></a>
    @break

    @case(2)
    <a href="{{ route('crops') }}" class="w3-bar-item w3-button w3-right"><i class="fa fa-home"></i></a>
    @break

    @case(3)
    <a href="{{ route('fishery') }}" class="w3-bar-item w3-button w3-right"><i class="fa fa-home"></i></a>
    @break

    @default

@endswitch


    {{-- @if (Auth::user()->role == 1)
       @endif --}}

    @endguest
