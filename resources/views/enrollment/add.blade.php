
<style>
    input {


       height: 44px !important;
       padding: 5px 5% !important;

       }
       input:focus, input.form-control:focus {
       outline:none !important;
       outline-width: 0 !important;
       box-shadow: none;
       -moz-box-shadow: none;
       -webkit-box-shadow: none;
       }
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

<div class="modal fade" id="adduser">
<div class="modal-dialog modal-dialog-centered">
 <div class="modal-content w3-padding-32">

   <!-- Modal body -->
   <div class="modal-body w3-display-container">
       <div class="w3-center">
           <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
       </div>

       <div class="w3-margin w3-padding-16">
           <form action="{{ route('enrolstore')}}" method="POST"  onsubmit="checkForm(this);">
               @csrf
               <p>
                <label class="w3-text-teal">Select Farmer</label>
                <select class="w3-select" name="farmer" required id="tract">
                <option value="" disabled selected>Farmer</option>
                    <?php

                       $users = DB::table('users')->where('role',6)->get();
                       foreach ($users as $users) { ?>
                       <option value="{{$users->uuid}}" id="lk">{{$users->name}}</option>
                <?php } ?>
                  </select>
               </p>



               <p>
                <label class="w3-text-teal">CAGRO Programs</label>
                <select class="w3-select" name="program" required id="tract">
                <option value="" disabled selected>Please Choose Program</option>
                <option value="2">Enroll at Crops</option>
                <option value="3">Enroll at Fishery</option>
                <option value="4">Enroll at Livestocks</option>
                </select>
               </p>

               <p>
                <label class="w3-text-teal">If Fishery, please specify water resources</label>
                <input type="text" class="w3-input" name="source" id="hectare">
               </p>


<input type="hidden" name="status" value="Uncheck" id="">


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
function checkForm(form)
  {
    form.submit1.disabled = true;
    form.submit1.value = "Please wait...";
    return true;
  }
</script>
