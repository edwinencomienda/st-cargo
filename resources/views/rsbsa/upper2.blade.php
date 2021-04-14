<?php

$personal = DB::table('farmerpersonal')->where('uuid', $product->uuid)->get();
if (!$personal->isEmpty())  {
    foreach ($personal as $personal) { ?>


<div class="w3-row w3-border-top w3-border-black">
    <div class="w3-col s12 w3-center" style="padding-left:15px;padding-right:11px">
    <table>
    <tr>
    <td><b>RELIGION:</b></td>
    <td style="width:88%"><input class="w3-input w3-border-black" value="{{$personal->religion}}" type="text"></td>
    </tr>
    </table>
    <br>
    </div>

  </div>

  <div class="w3-row">
    <div class="w3-col s4" style="padding-left:15px;"><b> CIVIL STATUS:</b>
    </div>
    <div class="w3-col s4">
    <input class="w3-check w3-border w3-border-black" type="checkbox" id="c1">&nbsp;&nbsp;&nbsp;
  <label>Single</label>
  </div>
    <div class="w3-col s4">
    <input class="w3-check w3-border w3-border-black" type="checkbox" id="c2">&nbsp;&nbsp;&nbsp;
  <label>Married</label></div>
  </div>


  <div class="w3-row">
    <div class="w3-col s4" style="padding-left:15px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="w3-col s4">
    <input class="w3-check w3-border w3-border-black" type="checkbox" id="c3">&nbsp;&nbsp;&nbsp;
  <label>Widowed</label>
  </div>
    <div class="w3-col s4">
    <input class="w3-check w3-border w3-border-black" type="checkbox" id="c4">&nbsp;&nbsp;&nbsp;
  <label>Separated</label></div>
  </div>
  <br>

  @if ($personal->status == "Single")
 <script>
      document.getElementById("c1").checked = true;
 </script>
  @endif

  @if ($personal->status == "Married")
  <script>
       document.getElementById("c2").checked = true;
  </script>
   @endif

   @if ($personal->status == "Widowed")
   <script>
        document.getElementById("c3").checked = true;
   </script>
    @endif

    @if ($personal->status == "Separated")
    <script>
         document.getElementById("c4").checked = true;
    </script>
     @endif


  <div class="w3-row" style="margin-bottom:3px">
    <div class="w3-col s12" style="padding-left:15px;padding-right:-1px">
    <table>
    <tr>
    <td><b>NAME OF SPOUSE <br> IF MARRIED:</b></td>
    <td style="width:75%"><input class="w3-input w3-border-black "type="text" value="{{$personal->spouse}}"></td>
    </tr>
    </table>
    <br>
    </div>

  </div>

  <div class="w3-row w3-border-top w3-border-bottom w3-border-black w3-padding" style="margin-bottom:3px">
    <div class="w3-col s12" style="padding-right:-1px">
    <b>MOTHER'S <br> MAIDEN NAME:</b>
    <br> {{$personal->mother}}
    </div>

  </div>

  <div class="w3-row">
    <div class="w3-col s6" style="padding-left:15px;padding-top:5px">
    <b>HOUSEHOLD HEAD?</b></div>
    <div class="w3-col s6">
     <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="" id="h1">Yes
    </label>
  </div>
  &nbsp;&nbsp;&nbsp;
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" value="" id="h2">No
    </label>
  </div>
@if ($personal->househead == "Yes")
    <script> document.getElementById("h1").checked = true;</script>
@else
<script> document.getElementById("h2").checked = true;</script>
@endif

  </div>

  </div>

  <div class="w3-row" style="padding-left:15px;margin-bottom:3px">
    <div class="w3-col s12 text-right">
    <table>
    <tr>
    <td><br><br><p style="font-size:15px">If no, name of household head:</p>
    </td>
    <td  style="width:61%"> <input class="w3-input w3-border-bottom w3-border-black"value="{{$personal->nohousehead}}" type="text"></td>
    </tr>

    <tr>
    <td style="font-size:15px"> <br> Relationship:
    </td>
    <td  style="width:61%"> <input class="w3-input w3-border-bottom w3-border-black" value="{{$personal->householdrel}}" type="text"></td>
    </tr>

    </table>


    </div>

  </div>



  <br>
  <div class="w3-row">
    <div class="w3-col s6  w3-center"> <br> No. of living household members:</div>
    <div class="w3-col s6  w3-center" style="padding-right:14px;padding-left:-1%">
    <input class="w3-input w3-border-bottom w3-border-black" value="{{$personal->noofmen}}" type="text"style="100%" >
    </div>
  </div>

  <div class="w3-row" style="margin-bottom:14px">
    <div class="w3-col s3  w3-center"> <br> No. of males:</div>
    <div class="w3-col s3" style="padding-left:0;">
    <input class="w3-input w3-border-bottom w3-border-black" value="{{$personal->maleno}}" type="text" style="width:57%">

    </div>
    <div class="w3-col s3  w3-center"> <br> No. of females:</div>
    <div class="w3-col s3" style="padding-left:0">
    <input class="w3-input w3-border-bottom w3-border-black" type="text" value="{{$personal->femaleno}}" style="width:88%">

    </div>
    </div>

                     <!-- *************************** -->
                      </div>

  <!-- *********************** -->
                      <div class="w3-container w3-border-black w3-cell" style="width:50%;padding-top:11px;
                      padding-left:0;padding-right:0">
                      <strong class="w3-padding" style="padding-top:5px">HIGHEST FORMAL EDUCATION:</strong>
  <div class="w3-row w3-margin" style="margin-left:35px !important;">
  <div class="w3-col s4" style="padding-left:15px;">
  <input class="w3-check w3-border w3-border-black" type="checkbox" id="e1">&nbsp;&nbsp;&nbsp;
  <label>None</label>
  </div>
  <div class="w3-col s4">
  <input class="w3-check w3-border w3-border-black" type="checkbox" id="e2">&nbsp;&nbsp;&nbsp;
  <label>Elementary</label>
  </div>
  <div class="w3-col s4">
  <input class="w3-check w3-border w3-border-black" type="checkbox" id="e3">&nbsp;&nbsp;&nbsp;
  <label>High School</label></div>
  </div>

  <div class="w3-row w3-margin" style="margin-left:35px !important;">
  <div class="w3-col s4" style="padding-left:15px;">
  <input class="w3-check w3-border w3-border-black" type="checkbox" id="e4">&nbsp;&nbsp;&nbsp;
  <label>Vocational</label>
  </div>
  <div class="w3-col s4">
  <input class="w3-check w3-border w3-border-black" type="checkbox" id="e5">&nbsp;&nbsp;&nbsp;
  <label>College</label>
  </div>
  <div class="w3-col s4">
  <input class="w3-check w3-border w3-border-black" type="checkbox" id="e6">&nbsp;&nbsp;&nbsp;
  <label>Post Graduate</label></div>
  </div>

  @if ($personal->education == "None")
  <script> document.getElementById("e1").checked = true;</script>
  @endif

  @if ($personal->education == "Elementary")
  <script> document.getElementById("e2").checked = true;</script>
  @endif

  @if ($personal->education == "High School")
  <script> document.getElementById("e3").checked = true;</script>
  @endif

  @if ($personal->education == "Vocational")
  <script> document.getElementById("e4").checked = true;</script>
  @endif

  @if ($personal->education == "College")
  <script> document.getElementById("e5").checked = true;</script>
  @endif

  @if ($personal->education == "Post Graduate")
  <script> document.getElementById("e6").checked = true;</script>
  @endif

      <div class="w3-row w3-padding-16 w3-border-top w3-border-bottom w3-border-black" style="padding-left:0;padding-right:0">
      <table>
      <tr>
      <td style="padding-left:11px">
      <b>PERSON WITH  DISABILITY EDUCATION (PWD):</b>
      </td>

      <td style="padding-left:11px">
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="p1">
      <label>Yes</label>
      &nbsp;
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="p2">&nbsp;
      <label>No</label>
      </td>
      </tr>
      </table>

@if ($personal->pwd == "Yes")
<script> document.getElementById("p1").checked = true;</script>

@else
<script> document.getElementById("p2").checked = true;</script>

@endif

      </div>

      <div class="w3-row" style="padding-left:0;padding-right:0;padding-top:11px">
      <div class="w3-col s8">

      <b style="padding-left:15px; font-size:15px">4P's Beneficiary?:</b>


      </div>
      <div class="w3-col s4">
      &nbsp;&nbsp;
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="porpis1">
      <label>Yes</label>
      &nbsp;&nbsp;
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="porpis2">&nbsp;&nbsp;&nbsp;
      <label>No</label>
      </div>

      </div>
      @if ($personal->porpis == "Yes")
      <script> document.getElementById("porpis1").checked = true;</script>

      @else
      <script> document.getElementById("porpis2").checked = true;</script>

      @endif


      <div class="w3-row" style="padding-left:0;padding-right:0;padding-top:11px">
      <div class="w3-col s8" style="padding-left:15px; font-size:15px">

     Member of an  <b> Indigenous Group?:</b>


      </div>
      <div class="w3-col s4">
      &nbsp;&nbsp;
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="ip1">
      <label>Yes</label>
      &nbsp;&nbsp;
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="ip2">&nbsp;&nbsp;&nbsp;
      <label>No</label>
      </div>

      </div>

      @if ($personal->aypis == "Yes")
      <script> document.getElementById("ip1").checked = true;</script>

      @else
      <script> document.getElementById("ip2").checked = true;</script>

      @endif


      <div class="w3-row" style="padding-left:0;padding-right:0;padding-top:11px;padding-bottom:5px;">
      <div class="w3-col s4" style="padding-left:15px; font-size:15px">
    <br>
    If yes, please specify:


      </div>
      <div class="w3-col s8">
      <input class="w3-input w3-border-bottom w3-border-black" value="{{$personal->ayp_detail}}" type="text">

      </div>

      </div>






      <div class="w3-row w3-border-top w3-border-black" style="padding-left:0;padding-right:0;padding-top:11px">
      <div class="w3-col s8" style="padding-left:15px; font-size:15px">

     With <b> Government ID ?:</b>


      </div>
      <div class="w3-col s4">
      &nbsp;&nbsp;
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="g1">
      <label>Yes</label>
      &nbsp;&nbsp;
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="g2">&nbsp;&nbsp;&nbsp;
      <label>No</label>
      </div>

      @if ($personal->gov_id == "Yes")
      <script> document.getElementById("g1").checked = true;</script>

      @else
      <script> document.getElementById("g2").checked = true;</script>

      @endif


      <div class="w3-row w3-border-bottom w3-border-black" style="padding-left:0;padding-right:0;padding-top:11px;padding-bottom:5px;">
      <div class="w3-col s4" style="padding-left:15px; font-size:15px">
    <br>
    Specify number if yes:


      </div>
      <div class="w3-col s8">
      <input class="w3-input w3-border-bottom w3-border-black" value="gov_detail" type="text">

      </div>

      </div>


      <div class="w3-row w3-padding  w3-border-black" style="padding-left:0;padding-right:0">
      <table>
      <tr>
      <td style="padding-left:3px">
     Members of any <b>Farmer's Association/Cooperative</b>
      </td>

      <td style="padding-left:44px">
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="coop1">
      <label>Yes</label>
      &nbsp;&nbsp;&nbsp;
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="coop2">&nbsp;&nbsp;&nbsp;
      <label>No</label>
      </td>
      </tr>
      </table>

      </div>

      @if ($personal->coop == "Yes")
      <script> document.getElementById("coop1").checked = true;</script>

      @else
      <script> document.getElementById("coop2").checked = true;</script>

      @endif

      <div class="w3-row w3-border-bottom w3-border-black" style="padding-left:0;padding-right:0;padding-top:11px;padding-bottom:5px;">
      <div class="w3-col s4" style="padding-left:15px; font-size:15px">
    <br>
    If yes, specify:


      </div>
      <div class="w3-col s8">
      <input class="w3-input w3-border-bottom w3-border-black" value="{{$personal->coopdetail}}" type="text">

      </div>

      </div>



      <div class="w3-row" style="padding-left:0;padding-right:0;padding-top:11px;padding-bottom:5px;">
      <div class="w3-col s4" style="padding-left:15px; font-size:15px">

   <b>PERSON TO NOTIFY IN CASE OF EMERGENCY</b>:


      </div>
      <div class="w3-col s8">
      <input class="w3-input w3-border-bottom w3-border-black" value="{{$personal->emergency}}" type="text">

      </div>

      </div>


      <div class="w3-row" style="padding-left:0;padding-right:0;padding-top:11px;padding-bottom:5px;">
      <div class="w3-col s4" style="padding-left:15px; font-size:15px">
    <br>
   <b>CONTACT NUMBER</b>:


      </div>
      <div class="w3-col s8">
      <input class="w3-input w3-border-bottom w3-border-black" value="{{$personal->contactno}}" type="text">

      </div>

      </div>

      </div>
      {{-- diri --}}

    <div class="w3-brown" style="margin-top: 55px !important; ">
        <div class="w3-bar">
            <a href="#farmperson{{$personal->id}}" class="w3-bar-item w3-button" data-toggle="modal" style="width:50%">
                <i class="fas fa-edit" style="font-size: 13px;"></i> Edit
            </a>

            <a href="#farmpersondel{{$personal->id}}"  class="w3-bar-item w3-button w3-red" style="width:50%" data-toggle="modal">
                <i class="fas fa-eraser" style="font-size: 13px;"></i> Delete
            </a>


          </div>

    </div>
    @include('rsbsa.farmedit')
                      </div>
{{-- dilipwede --}}
                      </div>




<?php }
} else { ?>
 @include('rsbsa.first2')

<?php }



?>
