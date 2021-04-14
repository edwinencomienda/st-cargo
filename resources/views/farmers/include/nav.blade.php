<style>
    .header {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
}

#navbar {
  overflow: hidden;

}
    .w3-dropdown-content{
        z-index: 8 !important;
        position: fixed;

    }


#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #4CAF50;
  color: white;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 7;
}

.sticky + .content {
  padding-top: 60px;
}
</style>


<div class="w3-row w3-padding-64">

    <div class="w3-container w3-third">

      <h1 style="padding-left:35px;"><img src="/backimage/agri.png" height="188" width="188" alt=""> &nbsp;AgriAko</h1>

    </div>

    <div class="w3-container w3-twothird">
        <br><br>
      <h1 class="w3-right w3-text-brown" style="padding-right: 35px">

          DEPARTMENT OF AGRICULTURE <br>
         <div class="w3-right">
            {{-- <img src="/backimage/da.png"  height="88" width="88" alt=""></h1><br> --}}
            <img src="/backimage/da.png"  height="88" width="88" alt=""></h1>
         </div>

      <br>
      </div>
  </div>



  <div id="navbar" class="text-center w3-brown">
    <h3><a class="w3-hover-sand" href="{{route('farmers')}}"><i class="fa fa-home"></i> Home</a></h3>
    <h3><a class="w3-hover-sand" href="{{route('farm.act')}}"><i class="fas fa-calendar-check"></i> Activity</a></h3>
   <h3> <a class="w3-hover-sand" href="{{route('farm.tut')}}"><i class="fas fa-chalkboard-teacher"></i> Tutorials</a></h3>
   <h3> <a class="w3-hover-sand" href="{{route('farm.bill')}}"><i class="fas fa-money-bill"></i> Bill</a></h3>
   <h3> <a class="w3-hover-sand" href="{{route('farm.enroll')}}"><i class="fas fa-chalkboard"></i> Enrollment</a></h3>


    <h3><a class="w3-hover-sand" href="{{route('farmcrop.reviewing')}}"><i class="fas fa-search"></i> Review</a></h3>




  <h3> <a href="{{ route('logout') }}" class="w3-hover-sand w3-right w3-button"
    data-toggle="tooltip" data-placement="bottom" title=" {{ __('Logout') }}"  onclick="event.preventDefault();
    document.getElementById('logout-form').submit();" ><i class="fas fa-sign-out-alt"></i> Sign out</a></h3>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>



  <h3>  <a class="w3-hover-sand w3-right" href="{{route('farm.support')}}"><i class="fas fa-envelope"></i> Support</a></h3>

  <div class="w3-dropdown-hover w3-hover-sand w3-mobile w3-left">
    <button class="w3-button" style="font-size: 18px"><i class="fab fa-product-hunt"></i> Product Request <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-bar-block w3-brown w3-padding-16">

        <div class="w3-container w3-cell w3-left">
            <a href="{{route('farmcrop.req')}}" class="w3-hover-sand w3-mobile w3-left">
                <i class="fas fa-leaf"></i> Crop Request
            </a>
            <br>
            <a href="{{route('farmcrop.lives')}}" class="w3-hover-sand w3-mobile">
                <i class="fas fa-crow"></i> Livestock Request
            </a>
            <br>
            <a href="{{route('farmcrop.fish')}}" class="w3-hover-sand w3-mobile">
                <i class="fas fa-fish"></i> Fishery Request
            </a>
          </div>

          <div class="w3-container w3-cell">
            <div class="w3-center">
                <img src="/backimage/agri.png" height="111" width="111" alt="">
            </div>
          </div>
    </div>
  </div>

  <div class="w3-dropdown-hover w3-hover-sand w3-mobile w3-left">
    <button class="w3-button" style="font-size: 18px"><i class="fas fa-hands-helping"></i> Assistant Request <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-bar-block w3-brown w3-padding-16">

        <div class="w3-container w3-cell w3-left">
            <a href="{{route('farmcrop.loan')}}" class="w3-hover-sand w3-mobile w3-left">
                <i class="fas fa-hand-holding-usd"></i> Loan Request
            </a>
            <br>
            <a href="{{route('farmcrop.tractor')}}" class="w3-hover-sand w3-mobile">
                <i class="fas fa-tractor"></i> Tractor Request
            </a>
            <br>

          </div>

          <div class="w3-container w3-cell">
            <div class="w3-center">
                <img src="/backimage/agri.png" height="111" width="111" alt="">
            </div>
          </div>
    </div>
  </div>




  </div>


  <script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }
    </script>
