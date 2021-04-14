
<style>
    a{
        font-size: 22px !important;
        font-family: 'Nunito' !important;

    }
    .wts{
        padding-top: 64px;
        padding-bottom: -2px;
    }
    .sd{
        margin-bottom: 32px;
    }
</style>
            <div class="w3-bar-block w3-card-4 wts text-center">
                <div class="w3-center w3-padding-8 w3-marginBottom-8">
                    <img src="/backimage/da2.png" class="w3-circle sd" width="85" height="85" alt="">
                    </div>

                    <br>


                    @switch(Auth::user()->role)
                        @case(1)
                        <a href="{{ route('trrequest') }}" class="w3-bar-item w3-button w3-brown text-left  {{ (request()->routeIs('trrequest')) ? 'w3-sand' : '' }}">

                            <button class="w3-button w3- w3-round-large">
                                <i class="fas fa-hands"></i>
                            </button> All Request
                        </a>

                        <a href="{{ route('trstatus') }}" class="w3-bar-item w3-button w3-brown text-left
                        {{ (request()->routeIs('trstatus')) ? 'w3-sand' : '' }}">

                            <button class="w3-button w3- w3-round-large">
                                <i class="fas fa-handshake"></i>
                            </button> Status
                        </a>

                            @break
                        @case(2)
                        <a href="{{ route('cropseed') }}" class="w3-bar-item w3-button w3-brown text-left  {{ (request()->routeIs('cropseed')) ? 'w3-sand' : '' }}">

                            <button class="w3-button w3- w3-round-large">
                                <i class="fas fa-hands"></i>
                            </button> All Request
                        </a>

                        <a href="{{ route('crop.status') }}" class="w3-bar-item w3-button w3-brown text-left
                        {{ (request()->routeIs('crop.status')) ? 'w3-sand' : '' }}">

                            <button class="w3-button w3- w3-round-large">
                                <i class="fas fa-handshake"></i>
                            </button> Status
                        </a>

                            @break

                            @case(3)
                        <a href="{{ route('fishrequest') }}" class="w3-bar-item w3-button w3-brown text-left  {{ (request()->routeIs('fishrequest')) ? 'w3-sand' : '' }}">

                            <button class="w3-button w3- w3-round-large">
                                <i class="fas fa-hands"></i>
                            </button> All Request
                        </a>

                        <a href="{{ route('fish.stat') }}" class="w3-bar-item w3-button w3-brown text-left
                        {{ (request()->routeIs('fish.stat')) ? 'w3-sand' : '' }}">

                            <button class="w3-button w3- w3-round-large">
                                <i class="fas fa-handshake"></i>
                            </button> Status
                        </a>

                            @break


                            @case(4)
                            <a href="{{ route('animalrequest') }}" class="w3-bar-item w3-button w3-brown text-left  {{ (request()->routeIs('animalrequest')) ? 'w3-sand' : '' }}">

                                <button class="w3-button w3- w3-round-large">
                                    <i class="fas fa-hands"></i>
                                </button> All Request
                            </a>

                            <a href="{{ route('animalstatus') }}" class="w3-bar-item w3-button w3-brown text-left
                            {{ (request()->routeIs('animalstatus')) ? 'w3-sand' : '' }}">

                                <button class="w3-button w3- w3-round-large">
                                    <i class="fas fa-handshake"></i>
                                </button> Status
                            </a>

                                @break






                        @default

                    @endswitch



              </div>
