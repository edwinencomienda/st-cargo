
<style>

    .modal-content{
        padding-left: 34px;
        padding-right: 34px;
    }
    .w3-btn{
        font-family: 'Nunito' !important;
    }
    .w-b{
        padding: 8px,8px,8px,8px !important ;
    }


</style>

<div class="modal fade" id="farmperson{{$personal->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content w3-padding-32">

    @php

     $fp = $personal->id;
       $fper = DB::table('farmerpersonal')->where('id', $fp)->get();
       foreach ($fper as $fper) {
       }

    @endphp

<!-- Modal body -->
<div class="modal-body w3-display-container">
    <div class="w3-center">
        <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
    </div>

    <div class="w3-margin w3-padding-16">
        <form action="{{url('/farmpersonal/'.$personal->id)}}" method="POST">
            @csrf

            <input type="hidden" name="uuid" value="{{$fper->uuid}}" id="">
     <p>
             <label class="w3-text-teal">Highest Education Attainment</label>
             <select class="w3-select" name="education" required>
              <option value="{{$fper->education}}" selected>{{$fper->education}}</option>
              <option value="None">None </option>
              <option value="Elementary">Elementary</option>
              <option value="High School">High School</option>
              <option value="Vocational">Vocational</option>
              <option value="College">College</option>
              <option value="Post Graduate">Post Graduate</option>
            </select>
     </p>

     <p>
         <label class="w3-text-teal">Person With Disability</label>
         <select class="w3-select" name="pwd" required>
          <option value="{{$fper->pwd}}pwd"  selected>{{$fper->pwd}}</option>
          <option value="Yes">Yes, I am. </option>
          <option value="No">No, I am not. </option>

        </select>
 </p>

 <p>
     <label class="w3-text-teal">4P's  Program</label>
     <select class="w3-select" name="porpis" required>
      <option value="{{$fper->porpis}}" selected>{{$fper->porpis}}</option>
      <option value="Yes">Yes, I am. </option>
      <option value="No">No, I am not. </option>

    </select>
</p>


<p>
 <label class="w3-text-teal">IP's Program</label>
 <select class="w3-select" name="aypis" required>
  <option value="{{$fper->aypis}}" selected>{{$fper->aypis}}</option>
  <option value="Yes">Yes, I am. </option>
  <option value="No">No, I am not. </option>

</select>
</p>

            <p>
                <label class="w3-text-teal">If Yes, please specify</label>
                <input class="w3-input" type="text" value="{{$fper->ayp_detail}}"  name="ayp__detail">
            </p>

            <p>
                <label class="w3-text-teal">Religion</label>
                <input class="w3-input" name="religion" value="{{$fper->religion}}" type="text" required>
            </p>

            <p>
             <label class="w3-text-teal">Civil Status</label>
             <select class="w3-select" name="status" required>
              <option value="{{$fper->status}}"  selected>{{$fper->status}}</option>
              <option value="Single">Single</option>
              <option value="Married">Married </option>
              <option value="Widowed">Widowed </option>
              <option value="Separated">Separated</option>
            </select>
         </p>

         <p>
             <label class="w3-text-teal">Name of Spouse, If Married:</label>
             <input class="w3-input" name="spouse" value="{{$fper->spouse}}" type="text">
         </p>

         <p>
             <label class="w3-text-teal">Mother's Maiden Name</label>
             <input class="w3-input" name="mother" value="{{$fper->mother}}" type="text" required>
         </p>

         <p>
             <label class="w3-text-teal">Governement ID?</label>
             <select class="w3-select" name="gov_id" required>
              <option value="{{$fper->gov_id}}"  selected>{{$fper->gov_id}}</option>
              <option value="Yes">Yes, I have.</option>
              <option value="No">No I haven't. </option>

            </select>
         </p>
         <p>
             <label class="w3-text-teal">If you have ID, please Specify:</label>
             <input class="w3-input" name="gov_detail" value="{{$fper->gov_detail}}" type="text">
         </p>

         <p>
             <label class="w3-text-teal">Are You the Household Head</label>
             <select class="w3-select" name="househead" required>
              <option value="{{$fper->househead}}"  selected>{{$fper->househead}}</option>
              <option value="Yes">Yes, I am.</option>
              <option value="No">No I am not. </option>

            </select>
         </p>
         <p>
             <label class="w3-text-teal">If No, Name of the Household head?</label>
             <input class="w3-input" name="nohousehead" value="{{$fper->nohousehead}}" type="text">
         </p>

         <p>
             <label class="w3-text-teal">Relationship of the Househead</label>
             <input class="w3-input" name="householdrel" value="{{$fper->householdrel}}" type="text">
         </p>


         <p>
             <label class="w3-text-teal">Number of Household Living</label>
             <input class="w3-input" name="noofmen" value="{{$fper->noofmen}}" type="text" required>
         </p>

         <p>
             <label class="w3-text-teal">Number of Men</label>
             <input class="w3-input" name="maleno" value="{{$fper->maleno}}" type="text">
         </p>

         <p>
             <label class="w3-text-teal">Number of Female</label>
             <input class="w3-input" name="femaleno" {{$fper->femaleno}} type="text">
         </p>

         <p>
             <label class="w3-text-teal">Farmer's Association/Cooperative</label>
             <select class="w3-select" name="coop" required>
              <option value="{{$fper->coop}}" selected>{{$fper->coop}}</option>
              <option value="Yes">Yes, I am.</option>
              <option value="No">No I am not. </option>

            </select>
         </p>
         <p>
             <label class="w3-text-teal">If Yes, Please Specify:</label>
             <input class="w3-input" name="coopdetail" value="{{$fper->coopdetail}}" type="text">
         </p>

         <p>
             <label class="w3-text-teal">Person to Notify In CAse of Emergency:</label>
             <input class="w3-input" name="emergency" value="{{$fper->emergency}}" type="text">
         </p>         <p>
             <label class="w3-text-teal">Contact Number</label>
             <input class="w3-input" name="contactno" value="{{$fper->contactno}}" type="text">
         </p>


            <br>
            <div class="w3-bar w3-card-4">
                <button type="submit" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                    <i class="fas fa-paper-plane"></i> Submit
                </button>
                <button class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                    <i class="fas fa-times-circle"></i> Cancel
                </button>
        </form>
    </div>

    </div>

</div>



</div>
</div>
</div>





  {{-- for delete --}}
<!-- The Modal -->
<div class="modal" id="farmpersondel{{$personal->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">
            @php
            $gh = $personal->id;
               $fps = DB::table('farmerpersonal')->where('id', $gh)->get();
               foreach ($fps as $fps) {
               }

           @endphp
            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you really want to delete these personal information? <br></h4>
               <h4 class="h4-del">Educational Background:  {{$fps->education}}<br></h4>
               <h4 class="h4-del">Religion Background:  {{$fps->religion}}<br></h4>

           @php

               $fpl = DB::table('farmerprofile')->where('uuid', $product->uuid)->get();
               foreach ($fpl as $fpl) {
               }

           @endphp
                <h4 class="h4-del">Name:
                {{$fpl->lname}}, {{$fpl->fname}}, {{$fpl->mname}}
                <br></h4>
            </div>



        </div>

        <div class="w3-bar w3-card-4">
            <a href="{{ URL::to('/delpersonfarm/'.$fps->id) }}" type="button" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                <i class="fas fa-trash"></i> Delete
            </a>
            <button class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                <i class="fas fa-times-circle"></i> Cancel
            </button>
        </div>

      </div>
    </div>
  </div>

