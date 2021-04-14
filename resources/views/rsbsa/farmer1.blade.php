
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

<div class="modal fade" id="addfarmerprof">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
 <div class="modal-content w3-padding-32">

   <!-- Modal body -->
   <div class="modal-body w3-display-container">
       <div class="w3-center">
           <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
       </div>

       <div class="w3-margin w3-padding-16">
           <form action="{{ route('rsbsadd')}}" method="POST" enctype="multipart/form-data" onsubmit="checkFormfa(this);">
               @csrf


                <input class="w3-input" type="hidden" name="uuid" value="{{$product->uuid}}" required>

               <p>
                   <label class="w3-text-teal">Picture</label>
                   <input class="w3-input" type="file" name="idpicture" required>
               </p>


               <p>
                <label class="w3-text-teal">Enrollment</label>
                <select class="w3-select" name="farm_exi" required>
                 <option value="" disabled selected>Choose Enrollment</option>
                 <option value="New">New </option>
                 <option value="Existing">Existing</option>
               </select>
            </p>


            <p>
                <label class="w3-text-teal">Reference No</label>
                <input class="w3-input" type="text" name="ref_no" required>
               </p>


               <p>
                <label class="w3-text-teal">First Name</label>
                <input class="w3-input" type="text" name="fname" required>
               </p>



               <p>
                <label class="w3-text-teal">Middle Name</label>
                <input class="w3-input" type="text" name="mname">
               </p>

               <p>
                <label class="w3-text-teal">Last Name</label>
                <input class="w3-input" type="text" name="lname" required>
               </p>

               <p>
                <label class="w3-text-teal">Name Extension</label>
                <input class="w3-input" type="text" name="exname">
               </p>

               <p>
                   <label class="w3-text-teal">Gender</label>
                   <select class="w3-select" name="gender" required>
                    <option value="" disabled selected>Choose your Gender</option>
                    <option value="Male">Male </option>
                    <option value="Female">Female</option>
                  </select>
               </p>

               <p>
                   <label class="w3-text-teal">House/Purok/Street Number</label>
                   <input class="w3-input" name="houseno" type="text" required>
               </p>

               <p>
                <label class="w3-text-teal">House/Purok/Street</label>
                <input class="w3-input" name="street" type="text" required>
            </p>

               <p>
                <label class="w3-text-teal">Barangay</label>
                <select class="w3-select" name="brgy" required>
                 <option value="" disabled selected>Choose your Barangay</option>
                 <?php
                 $brgy = DB::table('baranggay')->get();

                foreach ($brgy as $brgy) { ?>
                 <option value="{{$brgy->id}}">{{$brgy->brgy}}</option>';
             <?php   }
             ?>

               </select>
            </p>

            <p>
                <label class="w3-text-teal">City</label>
                <input class="w3-input" name="city" type="text"  value="Panabo" readonly required>
            </p>

            <p>
                <label class="w3-text-teal">Province</label>
                <input class="w3-input" name="province" type="text"  value="Davao del Norte" readonly required>
            </p>

            <p>
                <label class="w3-text-teal">Contact Number</label>
                <input class="w3-input" name="contact" type="text" required>
            </p>

            <p>
                <label class="w3-text-teal">Birthday</label>
                <input class="w3-input" name="birthdate" type="date"  required>
            </p>

            <p>
                <label class="w3-text-teal">Place of Birth</label>
                <input class="w3-input" name="birthplace" type="text"  required>
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
  function checkFormfa(form)
  {

    form.submit1.disabled = true;
    form.submit1.value = "Please wait...";
    return true;
  }
</script>
