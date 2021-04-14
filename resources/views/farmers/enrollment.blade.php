@extends('farmers.include.app')

@section('content')

<div>
    <h1 class="w3-padding-64 text-center">Enrollment Request</h1>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
</div>

<div class="w3-row">
    <div class="w3-half w3-container w3-center w3-padding-64 w3-brown w3-card-4">

        <form action="{{ route('enrolstore')}}" method="POST"  onsubmit="checkForm(this);" class="w3-white w3-padding-64"
        style="width:75%; padding-left:15px;padding-right:15px; margin-left:12%">
            @csrf
                    <input type="text" name="farmer" value="{{Auth::user()->uuid}}" hidden>
                    <p style="display:none">
                    <label class="w3-text-teal">CAGRO Programs</label>
                    <select class="w3-select" name="program" required id="tract">
                    <option value="2" selected>Enroll at Crops</option>
                    </select>
                    </p>

                    <h2 class="w3-center">Enroll me at Crops program!</h2>

                        <div class="w3-center">
                            <img src="/backimage/lgu.png" height="68" width="68" alt="">
                            <img src="/backimage/da.png" height="68" width="68" alt="">
                            <img src="/backimage/agri.png" height="68" width="68" alt="">
                        </div>
                        <br><br>
                    <p style="display:block">
                        <label class="w3-text-teal w3-left">Choose Land Parcel</label>
                        <select class="w3-select w3-border" name="parcel" id="tract" required>
                            <option value="" selected>Choose you farm parcel.</option>
                            <?php
                               $reply = DB::table('farmparcel')->where('uuid', Auth::user()->uuid)->get();
                            foreach ($reply as $rep) {?>
                            <option value="{{$rep->location}}">@php
                                 $repz = DB::table('baranggay')->where('id', $rep->location)->get();
                                 foreach ($repz as $re) {
                                     echo $re->brgy;
                                 }
                            @endphp</option>

               <?php     } ?>
                        </select>
                    </p>
                    <input type="hidden" name="status" value="Uncheck" id="">
                  <br>
                <button type="submit" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:100%">
                    <i class="fas fa-paper-plane"></i> Submit
                </button>
        </form>
        <script>
            function checkForm(form)
              {
                form.submit1.disabled = true;
                form.submit1.value = "Please wait...";
                return true;
              }
            </script>

    </div>
<br><br><br><br><br>
    <div class="w3-half w3-container w3-padding-64 w3-light-grey w3-card-4">
        <img src="/backimage/lgu.png" height="323" width="323" alt="">
    </div>
</div>
  <div class="w3-row">
    <div class="w3-half w3-container w3-padding-64 w3-light-grey w3-card-4">

        <form action="{{ route('enrolstore')}}" method="POST"  onsubmit="checkForm(this);" class="w3-white w3-padding-64"
        style="width:75%; padding-left:15px;padding-right:15px; margin-left:12%">
            @csrf
                    <input type="text" name="farmer" value="{{Auth::user()->uuid}}" hidden>
                    <p style="display:none">
                    <label class="w3-text-teal">CAGRO Programs</label>
                    <select class="w3-select" name="program" required id="tract">
                    <option value="3" selected>Enroll at Fishery</option>
                    </select>
                    </p>

                    <h2 class="w3-center">Enroll me at Fish program!</h2>

                        <div class="w3-center">
                            <img src="/backimage/lgu.png" height="68" width="68" alt="">
                            <img src="/backimage/da.png" height="68" width="68" alt="">
                            <img src="/backimage/agri.png" height="68" width="68" alt="">
                        </div>
                        <br><br>
                    <p style="display:block">
                        <label class="w3-text-teal w3-left">Choose Land Parcel</label>
                        <select class="w3-select w3-border" name="parcel" id="tract" required>
                            <option value="" selected>Choose you farm parcel.</option>
                            <?php
                               $reply = DB::table('farmparcel')->where('uuid', Auth::user()->uuid)->get();
                            foreach ($reply as $rep) {?>
                            <option value="{{$rep->location}}">@php
                                 $repz = DB::table('baranggay')->where('id', $rep->location)->get();
                                 foreach ($repz as $re) {
                                     echo $re->brgy;
                                 }
                            @endphp</option>

               <?php     } ?>
                        </select>
                    </p>

                    <p>
                        <label class="w3-text-teal">If Fishery, please specify water resources</label>
                        <input type="text" class="w3-input w3-border" name="sources" id="hectare" required>
                       </p>

                    <input type="hidden" name="status" value="Uncheck" id="">
                  <br>
                <button type="submit" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:100%">
                    <i class="fas fa-paper-plane"></i> Submit
                </button>
        </form>
        <script>
            function checkForm(form)
              {
                form.submit1.disabled = true;
                form.submit1.value = "Please wait...";
                return true;
              }
            </script>
    </div>
    <div class="w3-half w3-container w3-padding-64 w3-brown w3-card-4">

        <form action="{{ route('enrolstore')}}" method="POST"  onsubmit="checkForm(this);" class="w3-white w3-padding-64"
        style="width:75%; padding-left:15px;padding-right:15px; margin-left:12%">
            @csrf
                    <input type="text" name="farmer" value="{{Auth::user()->uuid}}" hidden>
                    <p style="display:none">
                    <label class="w3-text-teal">CAGRO Programs</label>
                    <select class="w3-select" name="program" required id="tract">
                    <option value="4" selected>Enroll at Livestock</option>
                    </select>
                    </p>

                    <h2 class="w3-center">Enroll me at Livestock program!</h2>

                        <div class="w3-center">
                            <img src="/backimage/lgu.png" height="68" width="68" alt="">
                            <img src="/backimage/da.png" height="68" width="68" alt="">
                            <img src="/backimage/agri.png" height="68" width="68" alt="">
                        </div>
                        <br><br>
                    <p style="display:block">
                        <label class="w3-text-teal w3-left">Choose Land Parcel</label>
                        <select class="w3-select w3-border" name="parcel" id="tract" required>
                            <option value="" selected>Choose you farm parcel.</option>
                            <?php
                               $reply = DB::table('farmparcel')->where('uuid', Auth::user()->uuid)->get();
                            foreach ($reply as $rep) {?>
                            <option value="{{$rep->location}}">@php
                                 $repz = DB::table('baranggay')->where('id', $rep->location)->get();
                                 foreach ($repz as $re) {
                                     echo $re->brgy;
                                 }
                            @endphp</option>

               <?php     } ?>
                        </select>
                    </p>



                    <input type="hidden" name="status" value="Uncheck" id="">
                  <br>
                <button type="submit" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:100%">
                    <i class="fas fa-paper-plane"></i> Submit
                </button>
        </form>
        <script>
            function checkForm(form)
              {
                form.submit1.disabled = true;
                form.submit1.value = "Please wait...";
                return true;
              }
            </script>
    </div>
</div>

@endsection
