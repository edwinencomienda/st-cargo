
<style>

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

<div class="modal fade" id="parce">
<div class="modal-dialog modal-dialog-centered">
 <div class="modal-content w3-padding-32">

   <!-- Modal body -->
   <div class="modal-body w3-display-container">
       <div class="w3-center">
           <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
       </div>

       <div class="w3-margin w3-padding-16">
           <form action="{{ route('farmparcel')}}" method="POST" name="adduse" onsubmit="return checkFormparcel(this);">
               @csrf

                   <input class="w3-input w3-border-brown" type="hidden" name="uuid" value="{{$product->uuid}}" required>



               <p>
                <label class="w3-text-teal">ARB?</label>
                <select class="w3-select" name="agrarian" required>
                 <option value="" disabled selected>Agrarian Beneficiary?</option>
                 <option value="Yes">Yes </option>
                 <option value="No">No</option>
               </select>
            </p>

            <p>
                <label class="w3-text-teal">Baranggay</label>
                <select class="w3-select" name="location" required>
                 <option value="" disabled selected>Please Choose Baranggay</option>
                 <?php
                 $bgt = DB::table('baranggay')->orderBy('brgy', 'asc')->get();

                foreach ($bgt as $bg) { ?>
                 <option value="{{$bg->id}}">{{$bg->brgy}}</option>';
             <?php   }
             ?>

                </select>
            </p>

               <p>
                   <label class="w3-text-teal">Total Hectare</label>
                   <input class="w3-input w3-border-brown" name="hectare" type="number" required>
               </p>

               <p>
                <label class="w3-text-teal">Ownership</label>
                <select class="w3-select" name="ownership" id="owners" required>
                 <option value="" disabled selected>Please Choose Ownership</option>
                 <option value="Registered Owner">Registered Owner </option>
                 <option value="Tenant">Tenant</option>
                 <option value="Lessee">Lessee</option>
                 <option value="Others">Others</option>
               </select>
            </p>


            <p id="tenant" style="display:none">
                <label class="w3-text-teal">If Tenant, Name of the Owner</label>
                <input class="w3-input w3-border-brown" name="tenant" type="text">
            </p>
            <p id="lesse" style="display: none">
                <label class="w3-text-teal">If lesse, Name of the Owner</label>
                <input class="w3-input w3-border-brown" name="lesse" type="text">
            </p>

            <p id="otherown" style="display: none">
                <label class="w3-text-teal">If Others, Please Specify</label>
                <input class="w3-input w3-border-brown" name="otherown" type="text">
            </p>

            <p>
                <label class="w3-text-teal">Ownership Number</label>
                <input class="w3-input w3-border-brown" name="owner" type="text" required>
            </p>




            <script src="{{ asset('js/app.js') }}" defer></script>
            <script>
            $( "#owners" ).change(function() {
            var own = $( "#owners option:selected" ).val();
            if (own == "Tenant") {
                $('#tenant').show();

                $('#lesse').hide();
                $('#otherown').hide();


            }
            if (own == "Lessee") {
                $('#lesse').show();

                $('#tenant').hide();
               $('#otherown').hide();
            }

            if (own == "Others") {
                $('#otherown').show();

                $('#tenant').hide();
                $('#lesse').hide();
              //  $('#activity').hide();
            }
            });
</script>
               <br>
               <div class="w3-bar w3-card-4">
                   <button type="submit" class="w3-bar-item w3-button w3-teal" name="myButton" style="width:50%">
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
   function checkFormparcel(form) // Submit button clicked
  {

         form.myButton.disabled = true;
         form.myButton.value = "Please wait...";
         return true;
       }
</script>
