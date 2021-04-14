<style>
    ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(200,200,200,1);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #fff; /* Change the color here */
            -webkit-box-shadow: inset 0 0 6px rgba(90,90,90,0.7);
        }
        .card-header{
            background-color: #C0AB8E !important;
        }
</style>


<div class="w3-sidebar w3-bar-block w3-card-4 w3-animate-left w3-brown"
style="margin-left:-16%;display:block;" id="mySidebar">
    <header class="header-side w3-side">
        &nbsp;
    </header>


    @guest

        @if (!Auth::user()->name())

        {{-- {{ __('Not Authorized')}} --}}
        @php
            return redirect()->route('login');
        @endphp
        @endif

        @else


        <div class="w3-margin w3-card-4 w3-center profimage w3-display-container w3-circle" style="width: 122px;">
            <?php
            $uuid = Auth::user()->uuid;
            $db = new mysqli("localhost", "root", "", "cagropanabo");
            $query = $db->query("SELECT SUBSTRING(profpic,13) as pic FROM profpicture where uuid = '$uuid' order by id DESC LIMIT 1");

            if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
            $imageURL = '/public/media'.$row["pic"];
            ?>

            <img src="<?php echo $imageURL; ?>" class="img-responsive" width="107" height="115" alt=""
            style="border-radius:100% !important;">
            {{-- <button type="button" class="btn btn-warning w3-display-bottomright"data-toggle="modal" data-target="#myModal">
            <i class="fas fa-camera-retro"></i>
            </button> --}}
            <?php
            }
            }
            else{ ?>
            <img src="/backimage/lgu.png" class="mx-auto d-block" width="107" height="115" alt="">
            <button type="button" class="btn btn-warning w3-display-bottomright"data-toggle="modal" data-target="#myModal">
            <i class="fas fa-camera-retro"></i>
            </button>

            <?php
            }
            ?>


    </div>

    <div class="w3-card w3-center w3-padding-16">
        <h3>agriAKO Dashboard</h3>
        <h4>  Welcome {{ Auth::user()->name }}!</h4>
    </div>

    @switch(Auth::user()->role)
        @case(1)

        <div class="w3-card w3-padding-16">
            <div class="elf-t w3-hover-sand {{ (request()->routeIs('applied')) ? 'w3-sand' : '' }}">
                <a href="{{ route('applied') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3-round-large w3-hover-sand"><i class="fas fa-home" style="font-size:22px;"></i>
                </button>Home
                </a>
            </div>


            <div class="elf-t w3-hover-sand {{ (request()->routeIs('consult')) || (request()->routeIs('reply')) || (request()->routeIs('deldetails')) ? 'w3-sand' : '' }}">
                <a href="{{ route('consult') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3-round-large w3-hover-sand">
                    <i class="far fa-envelope"></i>
                </button>Concerns
                </a>
            </div>
            {{-- {{ 'service/tractor' == request()->path() ? 'w3-sand' : ''}}  --}}
            <div class="elf-t w3-hover-sand {{ (request()->routeIs('trservice')) ? 'w3-sand' : '' }}">
                <a href="{{ route('trservice') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                    <i class="fab fa-servicestack"></i>
                </button>Tractor Service
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('active') || request()->routeIs('actfind')) ? 'w3-sand' : '' }}">
                <a href="{{ route('active') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                    <i class="fas fa-caravan"></i>
                </button>Event and Activity
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('tutor') || request()->routeIs('tutfind') ) ? 'w3-sand' : '' }}">
                <a href="{{ route('tutor') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                    <i class="fas fa-chalkboard-teacher"></i>
                </button>Tutorials
                </a>
            </div>



            <div id="accordion">
                <div class="w3-card-4">
                  <div class="card-header w3-hover-sand">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne"
                    style="font-size: 20px !important;font-family:Nunito;">
                      <h3>&nbsp;&nbsp;<i class="far fa-address-card" style="font-size: 21px;"></i>
                        &nbsp;&nbsp;Management
                    </h3>

                    </a>
                  </div>
                  <div id="collapseOne" class="collapse {{ (request()->routeIs('ssss') || request()->routeIs('profilemanage') || request()->routeIs('web.find')) ? 'show' : '' }} " data-parent="#accordion">
                    <div class="card-body">
                        <div class="elf-t w3-hover-sand {{ (request()->routeIs('ssss') || request()->routeIs('web.find') ) ? 'w3-sand' : '' }}">
                            <a href="{{ route('ssss') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-person-booth"></i>
                            </button>Farmer
                            </a>
                        </div>

                        <div class="elf-t w3-hover-sand {{ (request()->routeIs('profilemanage')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('profilemanage') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-people-carry"></i>
                            </button>Employee
                            </a>
                        </div>

                      </div>
                  </div>
                </div>

                <div class="w3-card-4">
                  <div class="card-header w3-hover-sand">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo"
                    style="font-size: 20px !important;font-family:Nunito;">

                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-tractor" style="font-size: 21px;"></i>
                            </button>Tractor Request

                  </a>
                  </div>
                  <div id="collapseTwo" class="collapse {{ (request()->routeIs('trrequest') || request()->routeIs('trstatus')  ) ? 'show' : '' }}" data-parent="#accordion">
                    <div class="card-body w3-brown">

                     <div class="elf-t w3-hover-sand {{ (request()->routeIs('trrequest')) ? 'w3-sand' : '' }}">
                        <a href="{{ route('trrequest') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-hands"></i>
                            </button>All Request
                            </a>
                        </div>

                        <div class="elf-t w3-hover-sand {{ (request()->routeIs('trstatus')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('trstatus') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-handshake"></i>
                                </button>Status
                                </a>
                            </div>




                    </div>
                  </div>
                </div>
                <div class="w3-card-4">
                  <div class="card-header w3-hover-sand">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree"
                    style="font-size: 20px !important;">

                        <button class="w3-button w3- w3-round-large w3-hover-sand">
                            <i class="fas fa-calculator" style="font-size: 21px;"></i>
                        </button>Inventory/Dispose
                    </a>
                  </div>
                  <div id="collapseThree" class="collapse {{ (request()->routeIs('trinventory') || request()->routeIs('dispose')) ? 'show' : '' }}" data-parent="#accordion">
                    <div class="card-body">

                        <div class="elf-t w3-hover-sand  {{ (request()->routeIs('trinventory')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('trinventory') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-truck-moving"></i>
                                </button>Inventory
                                </a>
                            </div>

                            <div class="elf-t w3-hover-sand  {{ (request()->routeIs('dispose')) ? 'w3-sand' : '' }}">
                                <a href="{{ route('dispose') }}" class="sidebtn" style="font-size: 21px;">
                                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                                        <i class="fab fa-hive"></i>
                                    </button>Disposal
                                    </a>
                                </div>
                    </div>
                  </div>



                </div>



                {{-- <div class="elf-t w3-hover-sand">
                    <a href="{{ route('trservice') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                        <i class="far fa-flag" style="font-size:21px"></i>
                    </button>Survey Map
                    </a>
                </div> --}}

                <div class="elf-t w3-hover-sand  {{ (request()->routeIs('applied.report')) ? 'w3-sand' : '' }}" >
                    <a href="{{ route('applied.report') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                        <i class="far fa-bookmark" style="font-size: 21px"></i>
                    </button>Reports
                    </a>
                </div>

              </div>


        </div>
    </div>

            @break


            {{-- Crops --}}
        @case(2)

        <div class="w3-card w3-padding-16">
            <div class="elf-t w3-hover-sand {{ (request()->routeIs('applied')) ? 'w3-sand' : '' }}">
                <a href="{{ route('applied') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3-round-large w3-hover-sand"><i class="fas fa-home" style="font-size:22px;"></i>
                </button>Home
                </a>
            </div>


            <div class="elf-t w3-hover-sand {{ (request()->routeIs('consult')) || (request()->routeIs('reply')) || (request()->routeIs('deldetails')) ? 'w3-sand' : '' }}">
                <a href="{{ route('consult') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3-round-large w3-hover-sand">
                    <i class="far fa-envelope"></i>
                </button>Concerns
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('loanr')) || (request()->routeIs('reply')) || (request()->routeIs('deldetails')) ? 'w3-sand' : '' }}">
                <a href="{{ route('loanr') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3-round-large w3-hover-sand">
                    <i class="fas fa-money-bill-wave"></i>
                </button>Loan Request
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('cropserve')) ? 'w3-sand' : '' }}">
                <a href="{{ route('cropserve') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                    <i class="fas fa-leaf"></i>
                </button>Crop Service
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('active') || request()->routeIs('actfind')) ? 'w3-sand' : '' }}">
                <a href="{{ route('active') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                    <i class="fas fa-caravan"></i>
                </button>Event and Activity
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('tutor') || request()->routeIs('tutfind') ) ? 'w3-sand' : '' }}">
                <a href="{{ route('tutor') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                    <i class="fas fa-chalkboard-teacher"></i>
                </button>Tutorials
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('enrollme')) ? 'w3-sand' : '' }}">
                <a href="{{ route('enrollme') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                    <i class="fas fa-school"></i>
                </button>Enrollments
                </a>
            </div>



            <div id="accordion">
                <div class="w3-card-4">
                  <div class="card-header w3-hover-sand">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne"
                    style="font-size: 20px !important;font-family:Nunito;">
                      <h3>&nbsp;&nbsp;<i class="far fa-address-card" style="font-size: 21px;"></i>
                        &nbsp;&nbsp;Management
                    </h3>

                    </a>
                  </div>
                  <div id="collapseOne" class="collapse {{ (request()->routeIs('ssss') || request()->routeIs('profilemanage') || request()->routeIs('web.find')) ? 'show' : '' }} " data-parent="#accordion">
                    <div class="card-body">
                        <div class="elf-t w3-hover-sand {{ (request()->routeIs('ssss') || request()->routeIs('web.find') ) ? 'w3-sand' : '' }}">
                            <a href="{{ route('ssss') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-person-booth"></i>
                            </button>Farmer
                            </a>
                        </div>

                        <div class="elf-t w3-hover-sand {{ (request()->routeIs('profilemanage')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('profilemanage') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-people-carry"></i>
                            </button>Employee
                            </a>
                        </div>

                      </div>
                  </div>
                </div>

                <div class="w3-card-4">
                  <div class="card-header w3-hover-sand">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo"
                    style="font-size: 20px !important;font-family:Nunito;">

                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-leaf"  style="font-size: 21px;"></i>

                            </button>Crops Request

                  </a>
                  </div>
                  <div id="collapseTwo" class="collapse {{ (request()->routeIs('cropseed') || request()->routeIs('crop.status')  ) ? 'show' : '' }}" data-parent="#accordion">
                    <div class="card-body w3-brown">

                     <div class="elf-t w3-hover-sand {{ (request()->routeIs('cropseed')) ? 'w3-sand' : '' }}">
                        <a href="{{ route('cropseed') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-hands"></i>
                            </button>All Request
                            </a>
                        </div>

                        <div class="elf-t w3-hover-sand {{ (request()->routeIs('crop.status')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('crop.status') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-handshake"></i>
                                </button>Status
                                </a>
                            </div>




                    </div>
                  </div>
                </div>
                <div class="w3-card-4">
                  <div class="card-header w3-hover-sand">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree"
                    style="font-size: 20px !important;">

                        <button class="w3-button w3- w3-round-large w3-hover-sand">
                            <i class="fas fa-calculator" style="font-size: 21px;"></i>
                        </button>Inventory/Dispose
                    </a>
                  </div>
                  <div id="collapseThree" class="collapse {{ (request()->routeIs('cropproducts') || request()->routeIs('crop.invent') || request()->routeIs('crop.dispose')) ? 'show' : '' }}" data-parent="#accordion">
                    <div class="card-body">
                        <div class="elf-t w3-hover-sand  {{ (request()->routeIs('cropproducts')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('cropproducts') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-leaf"></i>
                                </button>Crop Products
                                </a>
                            </div>


                        <div class="elf-t w3-hover-sand  {{ (request()->routeIs('crop.invent')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('crop.invent') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-truck-moving"></i>
                                </button>Inventory
                                </a>
                            </div>

                            <div class="elf-t w3-hover-sand  {{ (request()->routeIs('crop.dispose')) ? 'w3-sand' : '' }}">
                                <a href="{{ route('crop.dispose') }}" class="sidebtn" style="font-size: 21px;">
                                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                                        <i class="fab fa-hive"></i>
                                    </button>Disposal
                                    </a>
                                </div>
                    </div>
                  </div>



                </div>



                {{-- <div class="elf-t w3-hover-sand">
                    <a href="{{ route('trservice') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                        <i class="far fa-flag" style="font-size:21px"></i>
                    </button>Survey Map
                    </a>
                </div> --}}

                <div class="elf-t w3-hover-sand {{ (request()->routeIs('crop.report')) ? 'w3-sand' : '' }}">
                    <a href="{{ route('crop.report') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                        <i class="far fa-bookmark" style="font-size: 21px"></i>
                    </button>Reports
                    </a>
                </div>

              </div>


        </div>
    </div>


            @break

            @case(3)

        <div class="w3-card w3-padding-16">
            <div class="elf-t w3-hover-sand {{ (request()->routeIs('applied')) ? 'w3-sand' : '' }}">
                <a href="{{ route('applied') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3-round-large w3-hover-sand"><i class="fas fa-home" style="font-size:22px;"></i>
                </button>Home
                </a>
            </div>


            <div class="elf-t w3-hover-sand {{ (request()->routeIs('consult')) || (request()->routeIs('reply')) || (request()->routeIs('deldetails')) ? 'w3-sand' : '' }}">
                <a href="{{ route('consult') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3-round-large w3-hover-sand">
                    <i class="far fa-envelope"></i>
                </button>Concerns
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('loanr')) || (request()->routeIs('reply')) || (request()->routeIs('deldetails')) ? 'w3-sand' : '' }}">
                <a href="{{ route('loanr') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3-round-large w3-hover-sand">
                    <i class="fas fa-money-bill-wave"></i>
                </button>Loan Request
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('fishservices')) ? 'w3-sand' : '' }}">
                <a href="{{ route('fishservices') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                  <i class="fas fa-fish"></i>

                </button>Fishery Service
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('active') || request()->routeIs('actfind')) ? 'w3-sand' : '' }}">
                <a href="{{ route('active') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                    <i class="fas fa-caravan"></i>
                </button>Event and Activity
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('tutor') || request()->routeIs('tutfind') ) ? 'w3-sand' : '' }}">
                <a href="{{ route('tutor') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                    <i class="fas fa-chalkboard-teacher"></i>
                </button>Tutorials
                </a>
            </div>

            <div class="elf-t w3-hover-sand {{ (request()->routeIs('enrollme')) ? 'w3-sand' : '' }}">
                <a href="{{ route('enrollme') }}" class="sidebtn" style="font-size: 21px;">
                <button class="w3-button w3- w3-round-large w3-hover-sand">
                    <i class="fas fa-school"></i>
                </button>Enrollments
                </a>
            </div>



            <div id="accordion">
                <div class="w3-card-4">
                  <div class="card-header w3-hover-sand">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne"
                    style="font-size: 20px !important;font-family:Nunito;">
                      <h3>&nbsp;&nbsp;<i class="far fa-address-card" style="font-size: 21px;"></i>
                        &nbsp;&nbsp;Management
                    </h3>

                    </a>
                  </div>
                  <div id="collapseOne" class="collapse {{ (request()->routeIs('ssss') || request()->routeIs('profilemanage') || request()->routeIs('web.find')) ? 'show' : '' }} " data-parent="#accordion">
                    <div class="card-body">
                        <div class="elf-t w3-hover-sand {{ (request()->routeIs('ssss') || request()->routeIs('web.find') ) ? 'w3-sand' : '' }}">
                            <a href="{{ route('ssss') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-person-booth"></i>
                            </button>Farmer
                            </a>
                        </div>

                        <div class="elf-t w3-hover-sand {{ (request()->routeIs('profilemanage')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('profilemanage') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-people-carry"></i>
                            </button>Employee
                            </a>
                        </div>

                      </div>
                  </div>
                </div>

                <div class="w3-card-4">
                  <div class="card-header w3-hover-sand">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo"
                    style="font-size: 20px !important;font-family:Nunito;">

                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-fish"  style="font-size: 21px;"></i>

                            </button>Fish Request

                  </a>
                  </div>
                  <div id="collapseTwo" class="collapse {{ (request()->routeIs('fishrequest') || request()->routeIs('fish.stat')  ) ? 'show' : '' }}" data-parent="#accordion">
                    <div class="card-body w3-brown">

                     <div class="elf-t w3-hover-sand {{ (request()->routeIs('fishrequest')) ? 'w3-sand' : '' }}">
                        <a href="{{ route('fishrequest') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-hands"></i>
                            </button>All Request
                            </a>
                        </div>

                        <div class="elf-t w3-hover-sand {{ (request()->routeIs('fish.stat')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('fish.stat') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-handshake"></i>
                                </button>Status
                                </a>
                            </div>




                    </div>
                  </div>
                </div>
                <div class="w3-card-4">
                  <div class="card-header w3-hover-sand">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree"
                    style="font-size: 20px !important;">

                        <button class="w3-button w3- w3-round-large w3-hover-sand">
                            <i class="fas fa-calculator" style="font-size: 21px;"></i>
                        </button>Inventory/Dispose
                    </a>
                  </div>
                  <div id="collapseThree" class="collapse {{ (request()->routeIs('fishproduct') || request()->routeIs('fishinventory') ||request()->routeIs('fishdispose')) ? 'show' : '' }}" data-parent="#accordion">
                    <div class="card-body">
                        <div class="elf-t w3-hover-sand  {{ (request()->routeIs('fishproduct')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('fishproduct') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-fish"></i>
                                </button>Fishery Products
                                </a>
                            </div>


                        <div class="elf-t w3-hover-sand  {{ (request()->routeIs('fishinventory')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('fishinventory') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-truck-moving"></i>
                                </button>Inventory
                                </a>
                            </div>

                            <div class="elf-t w3-hover-sand  {{ (request()->routeIs('fishdispose')) ? 'w3-sand' : '' }}">
                                <a href="{{ route('fishdispose') }}" class="sidebtn" style="font-size: 21px;">
                                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                                        <i class="fab fa-hive"></i>
                                    </button>Disposal
                                    </a>
                                </div>
                    </div>
                  </div>



                </div>




                <div class="elf-t w3-hover-sand {{ (request()->routeIs('fish.fish')) ? 'w3-sand' : '' }}">
                    <a href="{{ route('fish.fish') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                        <i class="far fa-bookmark" style="font-size: 21px"></i>
                    </button>Reports
                    </a>
                </div>

              </div>


        </div>
    </div>

            @break

            @case(4)
            <div class="w3-card w3-padding-16">
                <div class="elf-t w3-hover-sand {{ (request()->routeIs('livestock')) ? 'w3-sand' : '' }}">
                    <a href="{{ route('livestock') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3-round-large w3-hover-sand"><i class="fas fa-home" style="font-size:22px;"></i>
                    </button>Home
                    </a>
                </div>


                <div class="elf-t w3-hover-sand {{ (request()->routeIs('consult')) || (request()->routeIs('reply')) || (request()->routeIs('deldetails')) ? 'w3-sand' : '' }}">
                    <a href="{{ route('consult') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3-round-large w3-hover-sand">
                        <i class="far fa-envelope"></i>
                    </button>Concerns
                    </a>
                </div>

                <div class="elf-t w3-hover-sand {{ (request()->routeIs('loanr')) || (request()->routeIs('reply')) || (request()->routeIs('deldetails')) ? 'w3-sand' : '' }}">
                    <a href="{{ route('loanr') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3-round-large w3-hover-sand">
                        <i class="fas fa-money-bill-wave"></i>
                    </button>Loan Request
                    </a>
                </div>

                <div class="elf-t w3-hover-sand {{ (request()->routeIs('anim.serve')) ? 'w3-sand' : '' }}">
                    <a href="{{ route('anim.serve') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                        <i class="fas fa-crow"></i>
                    </button>Livestock Service
                    </a>
                </div>

                <div class="elf-t w3-hover-sand {{ (request()->routeIs('active') || request()->routeIs('actfind')) ? 'w3-sand' : '' }}">
                    <a href="{{ route('active') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                        <i class="fas fa-caravan"></i>
                    </button>Event and Activity
                    </a>
                </div>

                <div class="elf-t w3-hover-sand {{ (request()->routeIs('tutor') || request()->routeIs('tutfind') ) ? 'w3-sand' : '' }}">
                    <a href="{{ route('tutor') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </button>Tutorials
                    </a>
                </div>

                <div class="elf-t w3-hover-sand {{ (request()->routeIs('enrollme')) ? 'w3-sand' : '' }}">
                    <a href="{{ route('enrollme') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                        <i class="fas fa-school"></i>
                    </button>Enrollments
                    </a>
                </div>



                <div id="accordion">
                    <div class="w3-card-4">
                      <div class="card-header w3-hover-sand">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne"
                        style="font-size: 20px !important;font-family:Nunito;">
                          <h3>&nbsp;&nbsp;<i class="far fa-address-card" style="font-size: 21px;"></i>
                            &nbsp;&nbsp;Management
                        </h3>

                        </a>
                      </div>
                      <div id="collapseOne" class="collapse {{ (request()->routeIs('ssss') || request()->routeIs('profilemanage') || request()->routeIs('web.find')) ? 'show' : '' }} " data-parent="#accordion">
                        <div class="card-body">
                            <div class="elf-t w3-hover-sand {{ (request()->routeIs('ssss') || request()->routeIs('web.find') ) ? 'w3-sand' : '' }}">
                                <a href="{{ route('ssss') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-person-booth"></i>
                                </button>Farmer
                                </a>
                            </div>

                            <div class="elf-t w3-hover-sand {{ (request()->routeIs('profilemanage')) ? 'w3-sand' : '' }}">
                                <a href="{{ route('profilemanage') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-people-carry"></i>
                                </button>Employee
                                </a>
                            </div>

                          </div>
                      </div>
                    </div>

                    <div class="w3-card-4">
                      <div class="card-header w3-hover-sand">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo"
                        style="font-size: 20px !important;font-family:Nunito;">

                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                        <i class="fas fa-crow"></i>

                                </button>Livestock Request

                      </a>
                      </div>
                      <div id="collapseTwo" class="collapse {{ (request()->routeIs('animalrequest') || request()->routeIs('animalstatus')  ) ? 'show' : '' }}" data-parent="#accordion">
                        <div class="card-body w3-brown">

                         <div class="elf-t w3-hover-sand {{ (request()->routeIs('animalrequest')) ? 'w3-sand' : '' }}">
                            <a href="{{ route('animalrequest') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large w3-hover-sand">
                                    <i class="fas fa-hands"></i>
                                </button>All Request
                                </a>
                            </div>

                            <div class="elf-t w3-hover-sand {{ (request()->routeIs('animalstatus')) ? 'w3-sand' : '' }}">
                                <a href="{{ route('animalstatus') }}" class="sidebtn" style="font-size: 21px;">
                                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                                        <i class="fas fa-handshake"></i>
                                    </button>Status
                                    </a>
                                </div>




                        </div>
                      </div>
                    </div>
                    <div class="w3-card-4">
                      <div class="card-header w3-hover-sand">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree"
                        style="font-size: 20px !important;">

                            <button class="w3-button w3- w3-round-large w3-hover-sand">
                                <i class="fas fa-calculator" style="font-size: 21px;"></i>
                            </button>Inventory/Dispose
                        </a>
                      </div>
                      <div id="collapseThree" class="collapse {{ (request()->routeIs('animpro.serve') || request()->routeIs('livestock.serve')|| request()->routeIs('livedispose.dispose')) ? 'show' : '' }}" data-parent="#accordion">
                        <div class="card-body">
                            <div class="elf-t w3-hover-sand  {{ (request()->routeIs('animpro.serve')) ? 'w3-sand' : '' }}">
                                <a href="{{ route('animpro.serve') }}" class="sidebtn" style="font-size: 21px;">
                                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                                        <i class="fas fa-crow"></i>
                                    </button>Livestock Products
                                    </a>
                                </div>


                            <div class="elf-t w3-hover-sand  {{ (request()->routeIs('livestock.serve')) ? 'w3-sand' : '' }}">
                                <a href="{{ route('livestock.serve') }}" class="sidebtn" style="font-size: 21px;">
                                    <button class="w3-button w3- w3-round-large w3-hover-sand">
                                        <i class="fas fa-truck-moving"></i>
                                    </button>Inventory
                                    </a>
                                </div>

                                <div class="elf-t w3-hover-sand  {{ (request()->routeIs('livedispose.dispose')) ? 'w3-sand' : '' }}">
                                    <a href="{{ route('livedispose.dispose') }}" class="sidebtn" style="font-size: 21px;">
                                        <button class="w3-button w3- w3-round-large w3-hover-sand">
                                            <i class="fab fa-hive"></i>
                                        </button>Disposal
                                        </a>
                                    </div>
                        </div>
                      </div>



                    </div>





                    <div class="elf-t w3-hover-sand {{ (request()->routeIs('live.dispose')) ? 'w3-sand' : '' }}">
                        <a href="{{ route('live.live') }}" class="sidebtn" style="font-size: 21px;">
                        <button class="w3-button w3- w3-round-large w3-hover-sand">
                            <i class="far fa-bookmark" style="font-size: 21px"></i>
                        </button>Reports
                        </a>
                    </div>

                  </div>


            </div>
        </div>

            @break



            @case(5)
            <div class="w3-card w3-padding-16">
                <div class="elf-t w3-hover-sand">
                    <a href="{{ route('research') }}" class="sidebtn" style="font-size: 21px;">
                    <button class="w3-button w3- w3-round-large"><i class="fas fa-home" style="font-size:22px;"></i>
                    </button>Home
                    </a>
                </div>

                <div id="accordion">
                    <div class="w3-card-4">
                      <div class="card-header w3-hover-sand">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne"
                        style="font-size: 20px !important;font-family:Nunito;">
                          <h3>&nbsp;&nbsp;<i class="far fa-address-card" style="font-size: 21px;"></i>
                            &nbsp;&nbsp;Management
                        </h3>

                        </a>
                      </div>
                      <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <div class="elf-t w3-hover-sand">
                                <a href="{{ route('ssss') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large">
                                    <i class="fas fa-person-booth"></i>
                                </button>Farmer
                                </a>
                            </div>

                            <div class="elf-t w3-hover-sand">
                                <a href="{{ route('profilemanage') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3- w3-round-large">
                                    <i class="fas fa-people-carry"></i>
                                </button>Employee
                                </a>
                            </div>

                          </div>
                      </div>
                    </div>

                    <div class="w3-card-4">
                      <div class="card-header w3-hover-sand">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo"
                        style="font-size: 20px !important;font-family:Nunito;">

                                <button class="w3-button w3-large">
                                    <i class="fas fa-map-signs" style="font-size: 21px;"></i>
                                </button>Map Surveys
                      </a>
                      </div>
                      <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                        <div class="card-body w3-brown">

                            <div class="elf-t w3-hover-sand ">
                                <a href="{{ route('map.list') }}" class="sidebtn" style="font-size: 21px;">
                                    <button class="w3-button w3-hover-sand w3-large">
                                        <i class="fas fa-list"></i>
                                    </button> &nbsp;Farmer's List
                                    </a>
                                </div>

                         <div class="elf-t w3-hover-sand">
                            <a href="{{ route('map.farmlist') }}" class="sidebtn" style="font-size: 21px;">
                                <button class="w3-button w3-hover-sand w3-large">
                                    <i class="fas fa-map-pin"></i>
                                </button> &nbsp;&nbsp;Farmer's Parcel
                                </a>
                            </div>

                            <div class="elf-t w3-hover-sand">
                                <a href="{{ route('map.enroll') }}" class="sidebtn" style="font-size: 21px;">
                                    <button class="w3-button  w3-hover-sand w3-large">
                                        <i class="fas fa-th-list"></i>
                                    </button> &nbsp;Enrollment List
                                    </a>
                                </div>


                                {{-- <div class="elf-t w3-hover-sand">
                                    <a href="{{ route('trstatus') }}" class="sidebtn" style="font-size: 21px;">
                                        <button class="w3-button w3-hover-sand w3-large">
                                            <i class="fas fa-handshake"></i>
                                        </button>Seedling Request
                                        </a>
                                    </div> --}}

        <button onclick="flip('dempo')" class="w3-button w3- w3-large w3-sand text-left w3-show" style="font-size: 21px; width:100%">
            <i class="fas fa-map-marked-alt"></i> &nbsp;&nbsp;Map Survey</button>

            <div id="dempo" class="w3-show">

                <div class="elf-t w3-hover-sand">
                    <a href="{{ route('map.thisroll') }}" class="sidebtn" style="font-size: 21px;">
                        <button class="w3-button w3-hover-sand w3-large">
                            <i class="fas fa-map-signs"></i>
                        </button>Enrollment Maps
                        </a>
                </div>

                    <div class="elf-t w3-hover-sand">
                        <a href="{{ route('map.cropmap') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3-hover-sand w3-large">
                                <i class="fas fa-map-signs"></i>
                            </button>Crops Maps
                            </a>
                    </div>

                    <div class="elf-t w3-hover-sand">
                    <a href="{{ route('map.fishmap') }}" class="sidebtn" style="font-size: 21px;">
                        <button class="w3-button w3-hover-sand w3-large">
                            <i class="fas fa-map-signs"></i>
                        </button>Fishery Maps
                        </a>
                    </div>

                    <div class="elf-t w3-hover-sand">
                        <a href="{{ route('map.livemap') }}" class="sidebtn" style="font-size: 21px;">
                            <button class="w3-button w3-hover-sand w3-large">
                                <i class="fas fa-map-signs"></i>
                            </button>Livestock Maps
                            </a>
                        </div>

            </div>

            </div>



                        </div>
                      </div>
                    </div>

                    <div class="w3-card-4">
                      <div class="card-header w3-hover-sand">
                        <a class="collapsed card-link show" data-toggle="collapse" href="#collapseThree"
                        style="font-size: 20px !important;">

                            <button class="w3-button w3- w3-round-large">
                                <i class="fas fa-calculator" style="font-size: 21px;"></i>
                            </button>Reports
                        </a>
                      </div>
                      <div id="collapseThree" class="collapse show" data-parent="#accordion">
                        <div class="card-body">

                            <div class="elf-t w3-hover-sand">
                                <a href="{{ url('/inventoryreports') }}" class="sidebtn" style="font-size: 21px;">
                                    <button class="w3-button w3- w3-round-large">
                                        <i class="fas fa-truck-moving"></i>
                                    </button>Inventory
                                    </a>
                                </div>

                                <div class="elf-t w3-hover-sand">
                                    <a href="{{ url('/monthanddatereports') }}" class="sidebtn" style="font-size: 21px;">
                                        <button class="w3-button w3- w3-round-large">
                                            <i class="fab fa-hive"></i>
                                        </button>Reports
                                        </a>
                                    </div>

                                    <div class="elf-t w3-hover-sand">
                                        <a href="{{ url('/statisticalreports') }}" class="sidebtn" style="font-size: 21px;">
                                            <button class="w3-button">
                                                <i class="fab fa-hive"></i>
                                            </button>Baranggay &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Statistics
                                            </a>
                                        </div>

                        </div>
                      </div>



                    </div>

                    {{-- <div class="elf-t w3-hover-sand">
                        <a href="{{ url('trservice') }}" class="sidebtn" style="font-size: 21px;">
                        <button class="w3-button w3- w3-round-large">
                            <i class="far fa-flag" style="font-size:21px"></i>
                        </button>Survey Map
                        </a>
                    </div> --}}



                  </div>


            </div>
        </div>

            @break


    @default
        @php
            return redirect()->route('login');
        @endphp
    @endswitch
        {{-- @if (Auth::user()->role == 1) --}}


        {{-- @endif --}}

    @endguest



  </div>

  <script>

    function w3_open() {
      document.getElementById("mySidebar").style.transitionDuration = "-1s";
      document.getElementById("main").style.transitionDuration = "-1s";
      document.getElementById("main").style.marginLeft = "16%";
      document.getElementById("mySidebar").style.marginLeft = "0%";
      document.getElementById("mySidebar").style.width = "16%";
      document.getElementById("navtops").style.paddingRight = "16%";

      document.getElementById("openNav").style.display = 'none';
      document.getElementById("close").style.display = 'block';
    }
    function w3_close() {
      document.getElementById("mySidebar").style.transitionDuration = "1s";
      document.getElementById("main").style.transitionDuration = "1s";
      // document.getElementById("main").style.animationDelay = "15s";


      document.getElementById("mySidebar").style.marginLeft = "-16%";
      document.getElementById("main").style.marginLeft = "0%";
      document.getElementById("navtops").style.paddingRight = "0%";

      // document.getElementById("mySidebar").style.display = "none";
      document.getElementById("openNav").style.display = "inline-block";
      document.getElementById("close").style.display = 'none';
    }
    </script>
