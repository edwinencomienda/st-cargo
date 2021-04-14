<div class="modal fade" id="trsedit{{$trs->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content w3-padding-32">



       <!-- Modal body -->
       <div class="modal-body w3-display-container text-left">

           <div class="w3-center">
            @php
            $a = $trs->id;
            $tr = DB::table('tractorservice')->where('id', $a)->get();
            foreach ($tr as $tr) {
            }

             @endphp

               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
           </div>
           <div class="w3-margin w3-padding-16">
               <form action="{{url('/updatetractor/'.$tr->id)}}"  method="POST">
                   @csrf
                   <p>
                       <label class="w3-text-teal">Tractor Service</label>
                       <input class="w3-input" type="text" name="service" value="{{$tr->service}}" required>
                   </p>

                   <p>
                       <label class="w3-text-teal">Price</label>
                       <input class="w3-input" type="number" name="price" value="{{$tr->price}}" required>
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
<div class="modal fade" id="trsdel{{$trs->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body text-left">

            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you Really want to Delete: <br></h4>
               <h4 class="h4-del">{{$trs->service}}?</h4>
              </div>

            <div class="w3-bar w3-card-4">
                <a href="{{ URL::to('/deletetractor/'.$trs->id) }}" type="button" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                    <i class="fas fa-trash"></i> Delete
                </a>
                <button class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                    <i class="fas fa-times-circle"></i> Cancel
                </button>
            </div>

        </div>



      </div>
    </div>
  </div>





