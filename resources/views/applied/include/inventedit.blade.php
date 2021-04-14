<style>
    label{
        text-align: left !important;
    }
</style>

<div class="modal fade" id="trsedit{{$inv->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content w3-padding-32">

       <!-- Modal body -->
       <div class="modal-body w3-display-container text-left">
           <div class="w3-center">
               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
           </div>

           <div class="w3-center">
            @php
            $a = $inv->id;
            $tr = DB::table('trinventory')->where('id', $a)->get();
            foreach ($tr as $tr) {
            }

             @endphp
           <div class="w3-margin w3-padding-16">
               <form action="{{ url('/trinventory/update/'.$tr->id)}}" method="POST">
                   @csrf

                   <p>

                    <label class="w3-text-teal w3-left">Tractor Service</label>
                    <select class="w3-select" name="service_type" required id="tract">
                    <option value="{{$tr->service_type}}"  selected>
                       @if ($tr->service_type == 1)
                           Disk Plowing
                       @else
                           Harrow Plowing
                       @endif
                    </option>
                        <?php

                           $users = DB::table('tractorservice')->get();
                           foreach ($users as $users) { ?>
                           <option value="{{$users->id}}" id="lk">{{$users->service}}</option>
                    <?php } ?>
                      </select>
                   </p>

                   <p>
                       <label class="w3-text-teal w3-left">Tractor Name</label>
                       <input class="w3-input" type="text" name="tractor_name" value="{{$tr->tractor_name}}" required>
                   </p>

                   <p>
                       <label class="w3-text-teal w3-left">Tractor Model</label>
                       <input class="w3-input" type="text" name="tractor_model" value="{{$tr->tractor_model}}" required>
                   </p>

                <p>
                    <label class="w3-text-teal w3-left">Quantity</label>
                    <input class="w3-input" type="text" name="qty" value="{{$tr->qty}}" required>
                </p>

<input type="hidden" name="uuid" value="{{Auth::user()->uuid}}" id="">
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





