
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
           <form action="{{ route('fishstore')}}" method="POST"  onsubmit="checkForm(this);">
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

               <div class="w3-row">
                <div class="w3-container w3-half">
                    <p>
                        <label class="w3-text-teal">Select Fish Program</label>
                        <select class="w3-select" name="program" required id="program">
                        <option value="" disabled selected>Fish Program</option>
                            <?php

                               $users = DB::table('fishservice')->get();
                               foreach ($users as $users) { ?>
                               <option value="{{$users->id}}" id="lk">{{$users->description}}</option>
                        <?php } ?>
                          </select>
                       </p>



                  </div>

                <div class="w3-container w3-half">
                    <p id="one" style="display: none;">
                        <label class="w3-text-teal">Marine Fishing Program</label>
                        <select class="w3-select" name="products">
                        <option value="" disabled selected>Fishing Program</option>
                            <?php

                               $users = DB::table('fishproduct')->where('fish_program',1)->get();
                               foreach ($users as $users) { ?>
                               <option value="{{$users->id}}" id="lk">{{$users->products}}</option>
                        <?php } ?>
                          </select>
                       </p>

                       <p id="two"  style="display: none;">
                        <label class="w3-text-teal">Inland Fishing Program</label>
                        <select class="w3-select" name="products">
                        <option value="" disabled selected>Fish Program</option>
                            <?php

                            $users = DB::table('fishproduct')->where('fish_program',2)->get();
                               foreach ($users as $users) { ?>
                               <option value="{{$users->id}}" id="lk">{{$users->products}}</option>
                        <?php } ?>
                          </select>
                       </p>

                       <p id="three"  style="display: none;">
                        <label class="w3-text-teal">Boat Program</label>
                        <select class="w3-select" name="products">
                        <option value="" disabled selected>Boat Program</option>
                            <?php

                        $users = DB::table('fishproduct')->where('fish_program',3)->get();
                               foreach ($users as $users) { ?>
                               <option value="{{$users->id}}" id="lk">{{$users->products}}</option>
                        <?php } ?>
                          </select>
                       </p>



                </div>

              </div>


              <script src="{{ asset('js/app.js') }}" defer></script>
              <script>
              $( "#program" ).change(function() {
              var own = $( "#program option:selected" ).val();
              if (own == 1) {
                  $('#one').show();

                  $('#two').hide();
                  $('#three').hide();
                  $('#four').hide();


              }
              if (own == 2) {
                $('#one').hide();

                $('#two').show();
                $('#three').hide();
                $('#four').hide();
              }

              if (own == 3) {
                $('#one').hide();

                $('#two').hide();
                $('#three').show();
                $('#four').hide();
                //  $('#activity').hide();
              }

            //   if (own == 4) {
            //     $('#one').hide();

            //     $('#two').hide();
            //     $('#three').hide();
            //     $('#four').show();
            //     //  $('#activity').hide();
            //   }


              });
     </script>

<p>
    <label class="w3-text-teal">Quantity</label>
    <input class="w3-input" name="quantity" id="hectare" required>
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
