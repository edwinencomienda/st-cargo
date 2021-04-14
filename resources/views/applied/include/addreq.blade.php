
<style>
    input {
       border-top:none !important;
       border-left: none !important;
       border-right: none !important;
       border-bottom: solid !important;
       border-bottom-color: #bc986a !important;
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
           <form action="{{ route('trradd')}}" method="POST"  onsubmit="checkForm(this);">
               @csrf
               <input type="hidden" name="uuid" value="{{Auth::user()->uuid}}" id="">

               <p>
                <label class="w3-text-teal">Location</label>
                <input class="w3-input" type="text" name="brgylocation" required>
               </p>


               <div class="w3-row">
                <div class="w3-container w3-half">
                    <p>
                        <label class="w3-text-teal">Tractor Service</label>
                        <select class="w3-select" name="tractor_service" required id="tract">
                        <option value="" disabled selected>Tractor Service</option>
                            <?php

                               $users = DB::table('tractorservice')->get();
                               foreach ($users as $users) { ?>
                               <option value="{{$users->id}}" id="lk">{{$users->service}}</option>
                        <?php } ?>
                          </select>
                       </p>


                  </div>

                <div class="w3-container w3-half">
                    <p>
                        <label class="w3-text-teal">Price</label>
                        <input class="w3-input" name="number" readonly id="price"
                        oninput="LengthConverter(this.value)" onchange="LengthConverter(this.value)">
                    </p>
                </div>
                <script src="{{ asset('js/app.js') }}" defer></script>
            <script>
             $( "#tract" ).change(function() {
            var sel = $( "#tract option:selected" ).val();
            if (sel == 1) {
                 var d ="<?php $d = DB::table('tractorservice')->where('id', 1)->get();  foreach ($d as $d){ echo $d->price; } ?>"
                $('#price').val(d);
                $('#hectare').val("");
                $('#pay').val("");
            }
                if (sel == 2) {
                // var ab = document.getElementById('tract').value;
                 var d ="<?php $d = DB::table('tractorservice')->where('id', 2)->get();  foreach ($d as $d){ echo $d->price; } ?>"
                $('#price').val(d);
                $('#hectare').val("");
                $('#pay').val("");
            }

             });

                </script>
              </div>






              <div class="w3-row">
                <div class="w3-container w3-half">
                    <p>
                        <label class="w3-text-teal">Hectare</label>
                        <input class="w3-input" name="hectare" id="hectare"
                        oninput="LengthConverter(this.value)" onchange="LengthConverter(this.value)">
                       </p>


                  </div>

                <div class="w3-container w3-half">
                    <p>
                        <label class="w3-text-teal">Total Amount</label>
                        <input class="w3-input" name="payamount" readonly id="pay">
                    </p>
                </div>
              </div>

              <script>

                    function LengthConverter(valNum) {
                       var t = document.getElementById("price").value;
                        document.getElementById("pay").value =valNum * t;
                    }
              </script>

<input type="hidden" name="approved" value="{{"Waiting"}}" id="">

<input type="hidden" name="status" value="{{"Uncheck"}}" id="">


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
