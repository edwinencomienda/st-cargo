
<div class="modal fade" id="trsedit{{$inv->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content w3-padding-32">

           <!-- Modal body -->
           <div class="modal-body w3-display-container">
               <div class="w3-center">
                   <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
               </div>
               @php
               $a = $inv->id;
               $tr = DB::table('cropinventory')->where('id', $a)->get();
               foreach ($tr as $tr) {
               }
                @endphp


               <div class="w3-margin w3-padding-16">
                <form action="{{ url('/crop/updatingInventory/'.$tr->id)}}" method="POST">
                    @csrf

                       <div class="w3-row">
                        <div class="w3-container w3-half">
                            <p>
                                <label class="w3-text-teal w3-left">Select Crop Program</label>
                                <select class="w3-select" name="crop_program" required id="program">
                                <option value="{{$tr->crop_program}}" selected>
                                @php
                                    $users = DB::table('cropservice')->where('id', $tr->crop_program)->get();
                                    foreach ($users as $users){
                                        echo $users->crop_detail;
                                    }
                                @endphp
                                </option>
                                    <?php

                                       $users = DB::table('cropservice')->get();
                                       foreach ($users as $users) { ?>
                                       <option value="{{$users->id}}" id="lk">{{$users->crop_detail}}</option>
                                <?php } ?>
                                  </select>
                               </p>



                          </div>

                        <div class="w3-container w3-half">


                               <p id="two"  style="display: block;">
                                <label class="w3-text-teal w3-left">Crop Programs</label>
                                <select class="w3-select" name="products" id="stwo">
                                <option value="{{$tr->crop_product}}" selected>
                                @php
                                    $users = DB::table('cropproduct')->where('id', $tr->crop_product)->get();
                                    foreach ($users as $users){
                                        echo $users->products;
                                    }
                                @endphp
                                </option>
                                    <?php

                                    $users = DB::table('cropproduct')->get();
                                       foreach ($users as $users) { ?>
                                       <option value="{{$users->id}}" id="lk">{{$users->products}}</option>
                                <?php } ?>
                                  </select>
                               </p>
                        </div>

                      </div>


                      {{-- <script src="{{ asset('js/app.js') }}" defer></script>
                      <script>
                      $( "#program" ).change(function() {
                      var own = $( "#program option:selected" ).val();
                      if (own == 1) {
                          $('#one').show();

                          $('#two').hide();
                          $('#three').hide();
                          $('#four').hide();
                          $('#two').prop('disabled', true);

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

                      if (own == 4) {
                        $('#one').hide();

                        $('#two').hide();
                        $('#three').hide();
                        $('#four').show();
                        //  $('#activity').hide();
                      }


                      });
             </script> --}}

        <p>
            <label class="w3-text-teal w3-left">Quantity</label>
            <input class="w3-input" name="quantity" value="{{$tr->qty}}" id="hectare" required>
           </p>
        <input type="hidden" name="admin" value="{{Auth::user()->uuid}}" id="">


                       <br>

               <div class="d-flex justify-content-center mb-3">
                <div class="p-2"  style="width:50%">
                    <button type="submit" class="w3-button w3-teal" name="submit1" style="width:100%">
                        <i class="fas fa-paper-plane"></i> Submit
                    </button>


                </div>
                <div class="p-2"  style="width:50%">
                    <button class=" w3-button w3-red" data-dismiss="modal" style="width:100%">
                        <i class="fas fa-times-circle"></i> Cancel
                    </button>
                </div>

              </div>

            </form>

               </div>

           </div>



         </div>
        </div>
        </div>
