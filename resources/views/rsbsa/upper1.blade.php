
<?php

$farms = DB::table('farmerprofile')->where('uuid', $product->uuid)->get();
if (!$farms->isEmpty())  {
    foreach ($farms as $farms) { ?>

{{-- naa sulod ni --}}
<div class="container w3-border w3-border-black" style="width:68% ;padding-top:0;padding-right:0;padding-left:0">

    <div class="w3-row" style="padding-left:17px;padding-bottom:0" >
      <div class="w3-col w3-border-right w3-border-black s9"  style="padding-top:0;padding-right:0">
      <div class="w3-row">
                <div class="w3-col s8" style="padding-top:12px;padding-right:0">

                <h1 style="font-weight:388; font-size:28px;w3-padding-right:0"><b>
                    ANI AT KITA <br>
                    RSBSA ENROLLMENT FORM</b></h1>
                    <small>
                    REGISTRY SYSTEM FOR BASIC SECTORS IN AGRICULTURAL (RSBA)
                    </small>
                <br>


                    </div>

      <div class="w3-col s4 w3-border w3-border-black" style="height:100px">
      <div class="w3-row">
      <div class="w3-col s4 w3-center">

      <img src="/backimage/da.png" width="100%" alt="">
      </div>
      <div class="w3-col s8 w3-center">
      <p class="w3-small" style="margin-bottom:0;font-size:15px">
      <input class="w3-input" type="text">
      <label> <small>CERTIFIED BY</small> </label></p>

      <p class="w3-small" >
      <input class="w3-input" type="text" style="margin-top:-23px">
      <label> <small>DATE</small></label></p>

      </div>
    </div>
      </div>
    </div>
      <br><br>

    <div class="w3-row">
      <div class="w3-col s8">
      <small><b>
      ENROLLMENT:</b></small> &nbsp; &nbsp; &nbsp; &nbsp;



      <div class="form-check-inline">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" value="" id="exx1">New
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" value="" id="exx2">Existing
      </label>
    </div>

    @if ($farms->farm_exi == "New")
    <script> document.getElementById("exx1").checked = true;</script>
    @endif

    @if ($farms->farm_exi == "Existing")
    <script> document.getElementById("exx2").checked = true;</script>
    @endif

    <br><br>
    <small><i>
    Reference/Control No.:</i></small> <input type="text" value="{{$farms->ref_no}}" style="border-top:none;
    border-right:none;border-left:none;border-color:black;width:66%">


      </div>
      <div class="w3-col s4 w3-right">
      <img src="/backimage/ani.png" class="w3-right w3-margin-right" alt="" width="60%"></div>
    </div>
      </div>




      <div class="w3-col s3  w3-center" style="margin-top:0">
        <img src="{{URL::to($farms->idpicture)}}" width="280" height="280" alt="">

      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col s12 w3-black w3-left" style="padding:6px"><small><b>
      PART I: PERSONAL INFORMATION
      </b>
      </small>
      </div>

    </div>

    <div class="w3-row" style="padding-right:0 !important;
            padding-left:0 !important;">
      <div class="w3-col s12">
                        <div class="w3-row">
                        <div class="w3-col s6 w3-center">
                                <p class="text-center" style="padding-bottom:0;margin-bottom:0">
                                <input class="w3-input w3-border-bottom w3-border-black w3-center" type="text"
                                style="width:93%" value="{{strtoupper($farms->lname)}}">
                                <small><label>
                                <b>SURNAME</b></label></small></p>

                                <input class="w3-input  w3-input w3-center w3-border-bottom w3-border-black" type="text"
                                style="width:93%" value="{{strtoupper($farms->mname)}}">
                                <small><label><b>MIDDLE NAME</b></label></small>

                        </div>



                        <div class="w3-col s6 w3-center" style="padding-left:0;padding-right:0">
                        <input class="w3-input w3-border-bottom w3-border-black w3-center" type="text"
                        value="{{strtoupper($farms->fname)}}">
                        <small><label>
                                <b>FIRST NAME</b></label></small>

    <div class="w3-row" style="padding-right:0">
    <div class="w3-col s5 w3-center">
    <input class="w3-input  w3-input w3-border-bottom w3-border-black"
    value="{{strtoupper($farms->exname)}}" type="text">
                                <small><label>
                                <b>EXTENSION</b></label></small>
                                </div>
                                <br>
    <div class="w3-col s6 w3-border-left w3-border-top w3-border-black w3-margin-left" style="margin-left:40px !important;
    padding-top:26px;padding-bottom:4px">

    <small><b>
      SEX:</b></small>
    &nbsp;

@if ($farms->gender)
  @if ($farms->gender == "Male")
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="" checked>Male
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="">Female
    </label>
    &nbsp;
  &nbsp;
  &nbsp;&nbsp;
  &nbsp;
  &nbsp;
  </div>
@endif

@if ($farms->gender == 'Female')
<div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="">Male
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="" checked>Female
    </label>
    &nbsp;
  &nbsp;
  &nbsp;&nbsp;
  &nbsp;
  &nbsp;
  </div>
@endif
@else
<div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="">Male
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="">Female
    </label>
    &nbsp;
  &nbsp;
  &nbsp;&nbsp;
  &nbsp;
  &nbsp;
  </div>

@endif


    </div>
    </div>


                        </div>
                        </div>
      </div>

    </div>
    <!--
    djfdgkfjh -->

    <div class="w3-cell-row w3-border-top w3-border-black"  style="padding-left:0;padding-right:0">
    <div class="w3-col s12" style="padding-left:0;padding-right:0">
    <div class="w3-row" style="padding-top:8px">

            <div class="w3-col s4" style="padding-left:15px">

            <table>
            <tr>
            <td>
            <b>ADDRESS</b>&nbsp;
            <br>
            </td>
            <td class="w3-center">
            <input class="w3-large" type="text" value="{{$farms->houseno}}">

            <small>HOUSE/LOT/BLDG NO. </small>
            </td>
            </tr>
            </table>

            </div>

            <div class="w3-col s4 w3-center">
            <p class="w3-center"><input class="w3-large" type="text"
                value="{{$farms->street}}" style="width:90%"><br>
            <small>HOUSE/LOT/BLDG </small></p>
            </div>

            <div class="w3-col s4 w3-center">
               <?php
                $brgay = DB::table('baranggay')->where('id', $farms->brgy)->get();
                foreach ($brgay as $p) { ?>
               <p class="w3-center"><input class="w3-large" type="text" value="{{$p->brgy}}" style="width:90%"><br><small>BARANGGAY </small></p>
             <?php  }
           ?>

            </div>
    </div>

    <div class="w3-row" style="padding-top:8px">

            <div class="w3-col s4" style="padding-left:15px">

            <table>
            <tr>
            <td>
            <b>&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;</b>&nbsp;
            <br>
            </td>
            <td class="w3-center">
            <input class="w3-large"
            value="{{$farms->city}}" type="text">
            <small>MUNCIPALITY/CITY </small>
            </td>
            </tr>
            </table>

            </div>

            <div class="w3-col s4 w3-center">
            <p class="w3-center"><input class="w3-large" type="text"
                value="{{$farms->province}}" style="width:90%"><br>
            <small>PROVINCE </small></p>
            </div>

            <div class="w3-col s4 w3-center">
            <p class="w3-center"><input class="w3-large" type="text" value="XI"
                style="width:90%"><br>
            <small>REGION</small></p>
            </div>
    </div>
    </div>
      </div>


                        <div class="w3-cell-row w3-border-top w3-border-black">

                        <div class="w3-container w3-border-right w3-border-black w3-cell" style="width:50%;padding-left:0;
                        padding-right:0">

    <div class="w3-row" style="padding-top:5px;padding-bottom:5px;">
      <div class="w3-col s5" style="padding-top:5px;padding-bottom:5px;padding-left:15px">
      <b>CONTACT NUMBER:</b></div>
      <div class="w3-col s7" style="padding-bottom:5px;">
      <input class="w3-input w3-border-black"
      value="{{$farms->contact}}" type="text">
      </div>
    </div>

    <div class="w3-row w3-border-top w3-border-black"
    style="padding-left:15px">
      <div class="w3-col s6 w3-border-right w3-border-black" style="padding-top:5px;padding-bottom:5px;">
      <b>DATE OF BIRTH:</b>


      <div class="w3-bar">

     <input class="w3-padding-8 w3-border w3-border-black" type="text"
     value="{{substr(strval( $farms->birthdate ), 5,1)}}" style="width:24px;text-align:center !important;
     color:black !important;font-size:18px;
     padding-left:4px;padding-right:4px;margin-left:8px;">

<input class="w3-padding-8 w3-border w3-border-black" type="text"
value="{{substr(strval( $farms->birthdate ), 6,1)}}" style="width:24px;text-align:center !important;color:black !important;font-size:18px;
padding-left:4px;padding-right:4px;margin-left:3px;">


<input class="w3-padding-8 w3-border w3-border-black" type="text"
value="{{substr(strval( $farms->birthdate ), 8,1)}}" style="width:24px;text-align:center !important;color:black !important;font-size:18px;
padding-left:4px;padding-right:4px;margin-left:3px;">


<input class="w3-padding-8 w3-border w3-border-black" type="text"
value="{{substr(strval( $farms->birthdate ), 9,1)}}" style="width:24px;text-align:center !important;color:black !important;font-size:18px;
padding-left:4px;padding-right:4px;margin-left:3px;">


<input class="w3-padding-8 w3-border w3-border-black" type="text"
value="{{substr(strval( $farms->birthdate ), 0,-9)}}" style="width:24px;text-align:center !important;color:black !important;font-size:18px;
padding-left:4px;padding-right:4px;margin-left:3px;">


<input class="w3-padding-8 w3-border w3-border-black" type="text"
value="{{substr(strval( $farms->birthdate ), 1,-8)}}" style="width:24px;text-align:center !important;color:black !important;font-size:18px;
padding-left:4px;padding-right:4px;margin-left:3px;">


<input class="w3-padding-8 w3-border w3-border-black" type="text"
value="{{substr(strval( $farms->birthdate ), 2,-7)}}" style="width:24px;text-align:center !important;color:black !important;font-size:18px;
padding-left:4px;padding-right:4px;margin-left:3px;">


<input class="w3-padding-8 w3-border w3-border-black" type="text"
value="{{substr(strval( $farms->birthdate ), 3,-6)}}" style="width:24px;text-align:center !important;color:black !important;font-size:18px;
padding-left:4px;padding-right:4px;margin-left:3px;">

    </div>

    <div class="w3-bar">
      <div class="w3-bar-item" style="width:15px">M</div>
      <div class="w3-bar-item" style="width:15px">M</div>
      <div class="w3-bar-item" style="width:15px">D</div>
      <div class="w3-bar-item" style="width:15px">D</div>
      <div class="w3-bar-item" style="width:15px">Y</div>
      <div class="w3-bar-item" style="width:15px">Y</div>
      <div class="w3-bar-item" style="width:15px">Y</div>
      <div class="w3-bar-item" style="width:15px">Y</div>




    </div>

      </div>


      <div class="w3-col s6"style="padding-top:5px;">
     &nbsp; &nbsp; &nbsp;<b>PLACE OF BIRTH:</b>
     <br>{{$farms->birthplace}}
      </div>
    </div>


    <div class="w3-brown">
    <div class="w3-bar">
        <a href="#editone{{$farms->id}}" class="w3-bar-item w3-button" data-toggle="modal" style="width:50%">
            <i class="fas fa-edit" style="font-size: 13px;"></i> Edit
        </a>

        <a href="#delone{{$farms->id}}"  class="w3-bar-item w3-button w3-red" style="width:50%" data-toggle="modal">
            <i class="fas fa-eraser" style="font-size: 13px;"></i> Delete
        </a>


      </div>

</div>
@include("rsbsa.rsedit")
@include('rsbsa.farmer1')



<?php }
} else { ?>
 @include('rsbsa.first')

<?php }



?>
