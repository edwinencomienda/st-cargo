
<style>
    .kkt{
        margin-top: -5%;
        padding-left: 115px;
        padding-top: 18px;
        background-color: #bea873;
    }
     #jt{
        padding-top: -35px !important;
        padding-right: 24px;
        font-family: 'Nunito' !important;

    }
    b{
        font-family: 'Nunito' !important;
    }
</style>


  <div class="w3-row  kkt">
    <div class="w3-container w3-third w3-white" style="padding-left: 0 !important;padding-right: 0 !important;">


            <ul class="nav nav-tabs">
                <li class="nav-item {{ (request()->routeIs('profilemanage')) ? 'w3-sand' : '' }}">
                  <a class="nav-link" href="{{ route('profilemanage') }}">
                    <button class="btn w3-padding-8 w3-btn-large">
                        <i class="fas fa-people-carry" style="font-size: 25px;"></i> Employee
                    </button>
                  </a>
                </li>
                <li class="nav-item {{ (request()->routeIs('ssss')) ? 'w3-sand' : '' }}">
                  <a class="nav-link" href="{{ route('ssss') }}">
                    <button class="btn w3-padding-8 w3-btn-large">
                        <i class="fas fa-person-booth" style="font-size: 25px;"></i> Farmer
                    </button>
                  </a>
                </li>

              </ul>
            {{-- </div> --}}
{{--
                    &nbsp;
                    <a href="{{ route('profilemanage') }}" class="sidebtn" style="font-size: 21px;">
                        <button class="btn btn-outline-secondary w3-padding-8 w3-round-large">
                            <i class="fas fa-people-carry" style="font-size: 25px;color:white;"></i>Employee
                        </button>
                    </a>

                    <a href="{{ route('ssss') }}" class="sidebtn" style="font-size: 21px;">
                        <button class="btn btn-outline-secondary w3-padding-8 w3-round-large">
                            <i class="fas fa-person-booth" style="font-size:25px;color:white;"></i>Farmer
                        </button>
                        </a> --}}

      </div>

    <div class="w3-container w3-twothird">
        <h1 class="text-right" id="jt">
            <b style="font-size:32px;color:#61361e">PROFILE</b>
            <b style="font-size:42px;color:#f4f0bd">MANAGEMENT</b></h1>

        </div>
  </div>
