

<div class="modal fade" id="edituser{{$dis->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
     <div class="modal-content w3-padding-32">

       <!-- Modal body -->
       <div class="modal-body w3-display-container">
           <div class="w3-center">
               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
           </div>

           @php
           $a = $dis->id;
           $tr = DB::table('disposaltractor')->where('id', $a)->get();
           foreach ($tr as $tr) {
           }

            @endphp
           <div class="w3-margin w3-padding-16 text-left">
               <form action="{{url('/disposaltractor/'.$tr->id)}}"  method="POST">
                   @csrf
                   <p>
                       <label class="w3-text-teal" hidden>Tractor Service</label>
                   </p>

    <input class="w3-input" type="text" name="name" value="{{$tr->service_type}}" hidden required>



               @if ($tr->service_type == 1)
               <p>
                <label class="w3-text-teal">Tractor Machine</label>
                <select class="w3-select" name="tractor_name" required id="tract">


                    <?php

                       $rrr = DB::table('trinventory')->where('service_type',1)->get();
                       foreach ($rrr as $rr) { ?>
                       <option value="{{$rr->tractor_name}}" id="lk">{{$rr->tractor_name}}</option>
                <?php } ?>
                  </select>
               </p>

                @endif
                @if ($tr->service_type == 2)
               <p>
                <label class="w3-text-teal">Tractor Machine</label>
                <select class="w3-select" name="tractor_name" required id="tract">

                    <?php

                       $users = DB::table('trinventory')->where('service_type',2)->get();
                       foreach ($users as $users) { ?>
                       <option value="{{$users->tractor_name}}" id="lk">{{$users->tractor_name}}</option>
                <?php } ?>
                  </select>
               </p>
               @endif

               <p>
                <label class="w3-text-teal">Quantity</label>
                <input class="w3-input" type="number" name="quantity" value="{{$tr->quantity}}" style="width: 88%;"required>
               </p>

               <input type="text" value="{{$tr->service_type}}" name="trserve" hidden>
<input type="text" value="Unreturn" name="unreturn" hidden>
                       <input class="w3-input" name="admin" value="{{Auth::user()->uuid }}" type="hidden" required>
<input type="text" name="status" value="Unreturn" hidden>

                   <br>

                   <div class="d-flex justify-content-center mb-3">
                    <div class="p-2"  style="width:50%">
                        <button type="submit" class="w3-button w3-teal" name="submit1" style="width:100%">
                            <i class="fas fa-paper-plane"></i> Submit
                        </button>

                    </form>
                    </div>
                    <div class="p-2"  style="width:50%">
                        <button class=" w3-button w3-red" data-dismiss="modal" style="width:100%">
                            <i class="fas fa-times-circle"></i> Cancel
                        </button>
                    </div>

                  </div>

           </div>

       </div>



     </div>
    </div>
    </div>




  {{-- for delete --}}
<!-- The Modal -->
<div class="modal fade" id="deleteuser{{$dis->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body text-left">

            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you Really want to Delete: <br></h4>
               <h4 class="h4-del">{{$tr->farmer}}?</h4>
              </div>



            <div class="d-flex justify-content-center mb-3">
                <div class="p-2"  style="width:100%">
                    <a href="{{ URL::to('/deletedispose/'.$tr->id) }}" type="button"
                        class="w3-button w3-teal" name="submit1" style="width:100%">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                </div>
                <div class="p-2"  style="width:100%">
                    <button class="w3-button w3-red" data-dismiss="modal" style="width:88%">
                        <i class="fas fa-times-circle"></i> Cancel
                    </button>
                </div>

              </div>


        </div>



      </div>
    </div>
  </div>




{{-- Reschedule --}}
  <div class="modal fade" id="resched{{$dis->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
     <div class="modal-content w3-padding-32">

       <!-- Modal body -->
       <div class="modal-body w3-display-container">
           <div class="w3-center">
               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
           </div>

           @php
           $a = $dis->id;
           $tr = DB::table('disposaltractor')->where('id', $a)->get();
           foreach ($tr as $tr) {
           }

            @endphp
           <div class="w3-margin w3-padding-16 text-left">
               <form action="{{url('/resched/'.$tr->id)}}"  method="POST">
                   @csrf
                   <p>
                      <h2 class="w3-center">Reschedule the  Service</h2>
                      <br><br>
                      <label class="w3-text-teal"><b>New Date</b></label>
                      <input class="w3-input w3-border w3-light-grey" type="date" name="delivery_date"
                      style="width:88%">

                   </p> <br>

                   <div class="d-flex justify-content-center mb-3">
                    <div class="p-2"  style="width:50%">
                        <button type="submit" class="w3-button w3-teal" name="submit1" style="width:100%">
                            <i class="fas fa-paper-plane"></i> Submit
                        </button>

                    </form>
                    </div>
                    <div class="p-2"  style="width:50%">
                        <button class=" w3-button w3-red" data-dismiss="modal" style="width:100%">
                            <i class="fas fa-times-circle"></i> Cancel
                        </button>
                    </div>

                  </div>

           </div>

       </div>



     </div>
    </div>
    </div>






    {{-- return --}}

  <div class="modal fade" id="return{{$dis->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
     <div class="modal-content w3-padding-32">

       <!-- Modal body -->
       <div class="modal-body w3-display-container">
           <div class="w3-center">
               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
           </div>

           @php
           $a = $dis->id;
           $tr = DB::table('disposaltractor')->where('id', $a)->get();
           foreach ($tr as $tr) {
           }

            @endphp
           <div class="w3-margin w3-padding-16 text-left">
               <form action="{{url('/return/'.$tr->id)}}"  method="POST">
                   @csrf
                   <p>
                      <h2 class="w3-center">Return the Machine.</h2>
                      <h3 class="text-center">Return the {{$dis->tractor}}</h3>
                      <h3 class="text-center">Quantity {{$dis->quantity}}</h3>

                      <br><br>
                      <input class="w3-input" name="admin" value="{{Auth::user()->uuid }}" type="hidden" required>
                      <input type="text" name="status" value="Return" hidden>
                   </p><br>

                   <div class="d-flex justify-content-center mb-3">
                    <div class="p-2"  style="width:50%">
                        <button type="submit" class="w3-button w3-teal" name="submit1" style="width:100%">
                            <i class="fas fa-paper-plane"></i> Submit
                        </button>

                    </form>
                    </div>
                    <div class="p-2"  style="width:50%">
                        <button class=" w3-button w3-red" data-dismiss="modal" style="width:100%">
                            <i class="fas fa-times-circle"></i> Cancel
                        </button>
                    </div>

                  </div>

           </div>

       </div>



     </div>
    </div>
    </div>




    {{-- notify --}}



  <div class="modal fade" id="info{{$dis->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
     <div class="modal-content w3-padding-32">

       <!-- Modal body -->
       <div class="modal-body w3-display-container">
           <div class="w3-center">
               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
           </div>

           @php
           $a = $dis->id;
           $tr = DB::table('disposaltractor')->where('id', $a)->get();
           foreach ($tr as $tr) {
           }


            @endphp

           <div class="w3-margin w3-padding-16 text-left">
               <form action="{{ route('infome')}}"  method="POST"  onsubmit="checkForm(this);">
                   @csrf

                   <h1 class="w3-center">
                        Send Notifications
                   </h1>

                   <input type="text" name="farmer" value="{{$tr->farmer}}" id="farmer" hidden>
               <p hidden>
                   <label class="w3-text-teal w3-left">Title:</label>
                   <input class="w3-input" type="text" name="anstitle" value="Admins Notifications"  required>
               </p>


                   <p>
                    <label class="w3-text-teal w3-left">Content</label>
                    <br><br>
                    <textarea class="form-control" id="ansproblem{{$tr->id}}" name="ansproblem" style="width:100%">

                    </textarea>

                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script>
                    CKEDITOR.replace( 'ansproblem{{$tr->id}}' );
                    </script>
                </p>

                   <p>

                    <input class="w3-input" name="role" value="{{Auth::user()->role }}" type="hidden" required>

                      <input class="w3-input" name="admin" value="{{Auth::user()->uuid }}" type="hidden" required>

                   </p><br>

                   <div class="d-flex justify-content-center mb-3">
                    <div class="p-2"  style="width:50%">
                        <button type="submit" class="w3-button w3-teal" name="submit1" style="width:100%">
                            <i class="fas fa-paper-plane"></i> Submit
                        </button>

                    </form>
                    </div>
                    <div class="p-2"  style="width:50%">
                        <button class=" w3-button w3-red" data-dismiss="modal" style="width:100%">
                            <i class="fas fa-times-circle"></i> Cancel
                        </button>
                    </div>

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
