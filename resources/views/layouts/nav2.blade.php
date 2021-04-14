<style>
    .w3-dropdown-content{
        z-index: 8 !important;
        position: fixed;

    }
</style>
<div class="w3-bar w3-light-grey w3-border w3-top">

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


@switch(Auth::user()->role)
    @case(1)
    @case(2)
    @case(3)
    @case(4)
    @case(5)

    <div class="w3-dropdown-click w3-right">
      <button class="w3-button" onclick="myFunction()">
          <i class="fas fa-user-clock"></i>
      </button>
      <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border w3-center" style="right:0">
          <br>
        <a href="#" class="w3-bar-item w3-button"
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
       <a href="{{ route('profilemanage') }}" class="w3-bar-item w3-button w3-right" title="Go to Profile Management">
        <i class="fas fa-id-card-alt"></i>
       </a>

    <a href="{{ route('applied') }}" class="w3-bar-item w3-button w3-right"><i class="fa fa-home"></i></a>



    <script src="{{asset('js/app.js')}}"></script>
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
      </script>

        @break

    @case(6)
    <a href="{{ route('farmers') }}" class="w3-bar-item w3-button w3-right"
    data-toggle="tooltip" data-placement="bottom" title="Go back to your Dashboard!">
    <i class="fa fa-tachometer-alt"></i></a>
        @break
    @default

@endswitch




    @endguest
