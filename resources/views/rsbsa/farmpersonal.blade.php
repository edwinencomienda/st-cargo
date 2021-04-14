
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

<div class="modal fade" id="farmpersonal">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
 <div class="modal-content w3-padding-32">

   <!-- Modal body -->
   <div class="modal-body w3-display-container">
       <div class="w3-center">
           <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
       </div>

       <div class="w3-margin w3-padding-16">
           <form action="{{ route('rsbsadd2')}}" method="POST"  onsubmit="checkForm12(this);">
               @csrf

               <input type="hidden" name="uuid" value="{{$product->uuid}}" id="">
        <p>
                <label class="w3-text-teal">Highest Education Attainment</label>
                <select class="w3-select" name="education" required>
                 <option value="" disabled selected>Choose Your Highest Education Attainment</option>
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
             <option value="" disabled selected>Are You PWD?</option>
             <option value="Yes">Yes, I am. </option>
             <option value="No">No, I am not. </option>

           </select>
    </p>

    <p>
        <label class="w3-text-teal">4P's  Program</label>
        <select class="w3-select" name="porpis" required>
         <option value="" disabled selected>Are you a member of 4P's?</option>
         <option value="Yes">Yes, I am. </option>
         <option value="No">No, I am not. </option>

       </select>
</p>


<p>
    <label class="w3-text-teal">IP's Program</label>
    <select class="w3-select" name="aypis" required>
     <option value="" disabled selected>Are you a member of IP's?</option>
     <option value="Yes">Yes, I am. </option>
     <option value="No">No, I am not. </option>

   </select>
</p>

               <p>
                   <label class="w3-text-teal">If Yes, please specify</label>
                   <input class="w3-input" type="text" name="ayp__detail">
               </p>

               <p>
                   <label class="w3-text-teal">Religion</label>
                   <input class="w3-input" name="religion" type="text" required>
               </p>

               <p>
                <label class="w3-text-teal">Civil Status</label>
                <select class="w3-select" name="status" required>
                 <option value="" disabled selected>What is your Status?</option>
                 <option value="Single">Single</option>
                 <option value="Married">Married </option>
                 <option value="Widowed">Widowed </option>
                 <option value="Separated">Separated</option>
               </select>
            </p>

            <p>
                <label class="w3-text-teal">Name of Spouse, If Married:</label>
                <input class="w3-input" name="spouse" type="text">
            </p>

            <p>
                <label class="w3-text-teal">Mother's Maiden Name</label>
                <input class="w3-input" name="mother" type="text" required>
            </p>

            <p>
                <label class="w3-text-teal">Governement ID?</label>
                <select class="w3-select" name="gov_id" required>
                 <option value="" disabled selected>Do You Have Government ID?</option>
                 <option value="Yes">Yes, I have.</option>
                 <option value="No">No I haven't. </option>

               </select>
            </p>
            <p>
                <label class="w3-text-teal">If you have ID, please Specify:</label>
                <input class="w3-input" name="gov_detail" type="text">
            </p>

            <p>
                <label class="w3-text-teal">Household Head</label>
                <select class="w3-select" name="househead" required>
                 <option value="" disabled selected>Are You the Household head?</option>
                 <option value="Yes">Yes, I am.</option>
                 <option value="No">No I am not. </option>

               </select>
            </p>
            <p>
                <label class="w3-text-teal">If No, Name of the Household head?</label>
                <input class="w3-input" name="nohousehead" type="text">
            </p>

            <p>
                <label class="w3-text-teal">Relationship of the Househead</label>
                <input class="w3-input" name="householdrel" type="text">
            </p>


            <p>
                <label class="w3-text-teal">Number of Household Living</label>
                <input class="w3-input" name="noofmen" type="text" required>
            </p>

            <p>
                <label class="w3-text-teal">Number of Men</label>
                <input class="w3-input" name="maleno" type="text">
            </p>

            <p>
                <label class="w3-text-teal">Number of Female</label>
                <input class="w3-input" name="femaleno" type="text">
            </p>

            <p>
                <label class="w3-text-teal">Farmer's Association/Cooperative</label>
                <select class="w3-select" name="coop" required>
                 <option value="" disabled selected>Are You a Member of Coop or Association?</option>
                 <option value="Yes">Yes, I am.</option>
                 <option value="No">No I am not. </option>

               </select>
            </p>
            <p>
                <label class="w3-text-teal">If Yes, Please Specify:</label>
                <input class="w3-input" name="coopdetail" type="text">
            </p>

            <p>
                <label class="w3-text-teal">Person to Notify In CAse of Emergency:</label>
                <input class="w3-input" name="emergency" type="text">
            </p>         <p>
                <label class="w3-text-teal">Contact Number</label>
                <input class="w3-input" name="contactno" type="text">
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




<script>

    function checkForm12(form)
      {
        form.submit1.disabled = true;
        form.submit1.value = "Please wait...";
        return true;
      }
    </script>
