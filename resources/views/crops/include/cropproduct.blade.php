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
           $tr = DB::table('cropproduct')->where('id', $a)->get();
           foreach ($tr as $tr) {
           }

            @endphp

           <div class="w3-margin w3-padding-16">

               <form action="{{ url('/cropproducts/update/'.$inv->id)}}" method="POST"  onsubmit="checkFormna(this);">
                   @csrf

                   <p>
                    <label class="w3-text-teal w3-left">Crops Program</label>
                    <select class="w3-select" name="crop_program" required id="tract">
                    <option value="{{$tr->crop_program}}" selected>
                     <?php
                        $users = DB::table('cropservice')->where('id', $tr->crop_program)->get();
                        foreach ($users as $use) {
                            echo $use->crop_detail;
                        }
                     ?>
                     </option>
                        <?php
                           $users = DB::table('cropservice')->get();
                           foreach ($users as $users) { ?>
                           <option value="{{$users->id}}" id="lk">{{$users->crop_detail}}</option>
                        <?php } ?>
                    </select>
                   </p>
                   <p>
                       <label class="w3-text-teal w3-left">Crop Product</label>
                       <input class="w3-input" type="text" name="products" value="{{$tr->products}}"  required>
                   </p>


<input type="hidden" name="uuid" value="{{Auth::user()->uuid}}" id="">

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
    <script>
    function checkFormna(form)
    {
      form.submit1.disabled = true;
      form.submit1.value = "Please wait...";
      return true;
    }
  </script>
