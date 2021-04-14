
<div class="modal fade" id="anip{{$fparcel->id}}" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content w3-padding-32">

    <!-- Modal body -->
    <div class="modal-body w3-display-container">

     @php
     $a = $fparcel->id;
        $fa = DB::table('parcelanimal')->where('id', $a)->get();
        foreach ($fa as $f) {
        }
    @endphp

        <div class="w3-center">
            <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
        </div>

        <div class="w3-margin w3-padding-16">
            <form action="{{url('/parsedit/'.$f->id)}}" method="POST" name="adduse"
                onsubmit="return checkFormparcelzzas(this);">
                @csrf

<input class="w3-input w3-border-brown" type="hidden" name="uuid" value="{{$product->uuid}}" required>
<input type="hidden" value="{{$f->parcel}}" name="parcel">


                <p>
                    <label class="w3-text-teal">Name of Crop/Commodity, example, Goat,Rice....</label>
                    <input class="w3-input w3-border-brown" name="animal" type="text" value="{{$f->animal}}" required>
                </p>

             <p>
                 <label class="w3-text-teal">Size of the Commodity</label>
                 <input class="w3-input w3-border-brown" name="size" type="number" value="{{$f->size}}" required>
             </p>
             <p>
                 <label class="w3-text-teal">Number of Commodity Count</label>
                 <input class="w3-input w3-border-brown" name="heads" type="number" value="{{$f->heads}}" required>
             </p>

             <p>
                <label class="w3-text-teal">Farm Type</label>
                <select class="w3-select" name="farmtype" required>
                 <option value="{{$f->farmtype}}" selected>{{$f->farmtype}}</option>
                 <option value="Irrigated">Irrigated</option>
                 <option value="Rainfed Upland">Rainfed Upland</option>
                 <option value="Rainfed Lowland">Rainfed Lowland</option>
               </select>
            </p>

            <p>
                <label class="w3-text-teal">Organic Practicioner</label>
                <select class="w3-select" name="organi" required>
                 <option value="{{$f->organi}}"  selected>Are you using Organic?</option>
                 <option value="Y">Yes</option>
                 <option value="N">No</option>

               </select>
            </p>




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
    function checkFormparcelzzas(form) // Submit button clicked
    {

          form.myButton.disabled = true;
          form.myButton.value = "Please wait...";
          return true;
        }
    </script>






  {{-- for delete --}}
<!-- The Modal -->
<div class="modal fade" id="anipdel{{$fparcel->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">
            @php
            $a = $fparcel->id;
               $picture = DB::table('parcelanimal')->where('id', $a)->get();
               foreach ($picture as $picture) {
               }

           @endphp
            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you Really want to Delete: <br></h4>



               <br><h4 class="h4-del">Parcel : {{$picture->animal}}/{{$picture->size}} ha. ?</h4>

            </div>



        </div>

        <div class="w3-bar w3-card-4">
            <a href="{{ URL::to('/parsdel/'.$picture->id) }}" type="button" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                <i class="fas fa-trash"></i> Delete
            </a>
            <button class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                <i class="fas fa-times-circle"></i> Cancel
            </button>
        </div>

      </div>
    </div>
  </div>
