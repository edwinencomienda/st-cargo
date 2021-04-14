
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


<div class="modal fade" id="pars{{$fmp->id}}" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered">
<div class="modal-content w3-padding-32">

<!-- Modal body -->
<div class="modal-body w3-display-container">

 @php
 $a = $fmp->id;
    $fa = DB::table('farmparcel')->where('id', $a)->get();
    foreach ($fa as $f) {
    }
@endphp

    <div class="w3-center">
        <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
    </div>

    <div class="w3-margin w3-padding-16">
        <form action="{{url('/editparcel/'.$f->id)}}" method="POST" name="adduse" onsubmit="return checkFormparcelzz(this);">
            @csrf

                <input class="w3-input w3-border-brown" type="hidden" name="uuid" value="{{$product->uuid}}" required>



            <p>
             <label class="w3-text-teal">ARB?</label>
             <select class="w3-select" name="agrarian" required>
              <option value="{{$f->agrarian}}" selected>{{$f->agrarian}}</option>
              <option value="Yes">Yes </option>
              <option value="No">No</option>
            </select>
         </p>

         <p>
             <label class="w3-text-teal">Baranggay</label>
             <select class="w3-select" name="location" required>
                <?php
                $bgt = DB::table('baranggay')->where('id', $f->location)->get();
                foreach ($bgt as $bg) {}?>
              <option value="{{$f->location}}" selected>{{$bg->brgy}}</option>
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
                <input class="w3-input w3-border-brown" name="hectare" type="number" value="{{$f->hectare}}" required>
            </p>

            <p>
             <label class="w3-text-teal">Ownership</label>
             <select class="w3-select" name="ownership" id="owners" required>
              <option value="{{$f->ownership}}" selected>{{$f->ownership}}</option>
              <option value="Registered Owner">Registered Owner </option>
              <option value="Tenant">Tenant</option>
              <option value="Lessee">Lessee</option>
              <option value="Others">Others</option>
            </select>
         </p>


         <p id="tenant" >
             <label class="w3-text-teal">If Tenant, Name of the Owner</label>
             <input class="w3-input w3-border-brown" name="tenant" type="text" value="{{$f->tenant}}">
         </p>
         <p id="lesse" >
             <label class="w3-text-teal">If lesse, Name of the Owner</label>
             <input class="w3-input w3-border-brown" name="lesse" type="text" value="{{$f->lesse}}">
         </p>

         <p id="otherown" >
             <label class="w3-text-teal">If Others, Please Specify</label>
             <input class="w3-input w3-border-brown" name="otherown" type="text" value="{{$f->otherown}}">
         </p>

         <p>
             <label class="w3-text-teal">Ownership Number</label>
             <input class="w3-input w3-border-brown" name="owner" type="text" required value="{{$f->owner}}">
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
function checkFormparcelzz(form) // Submit button clicked
{

      form.myButton.disabled = true;
      form.myButton.value = "Please wait...";
      return true;
    }
</script>






  {{-- for delete --}}
<!-- The Modal -->
<div class="modal" id="delpars{{$fmp->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">
            @php
            $a = $fmp->id;
               $picture = DB::table('farmparcel')->where('id', $a)->get();
               foreach ($picture as $picture) {
               }

           @endphp
            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you Really want to Delete: <br></h4>

               <?php
               $bgt = DB::table('baranggay')->where('id', $picture->location)->get();
               foreach ($bgt as $bg) {}?>

               <br><h4 class="h4-del">Parcel : {{$bg->brgy}}</h4>

            </div>



        </div>

        <div class="w3-bar w3-card-4">
            <a href="{{ URL::to('/delparcel/'.$picture->id) }}" type="button" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                <i class="fas fa-trash"></i> Delete
            </a>
            <button class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                <i class="fas fa-times-circle"></i> Cancel
            </button>
        </div>

      </div>
    </div>
  </div>





<div class="modal fade" id="paran{{$fmp->id}}" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content w3-padding-32">

    <!-- Modal body -->
    <div class="modal-body w3-display-container">

     @php
     $a = $fmp->id;
        $fa = DB::table('farmparcel')->where('id', $a)->get();
        foreach ($fa as $f) {
        }
    @endphp

        <div class="w3-center">
            <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
        </div>

        <div class="w3-margin w3-padding-16">
            <form action="{{route('parcelani')}}" method="POST" name="adduse"
                onsubmit="return checkFormparcelzza(this);">
                @csrf

                    <input class="w3-input w3-border-brown" type="hidden" name="uuid" value="{{$product->uuid}}" required>
<input type="hidden" value="{{$f->id}}" name="parcel">


                <p>
                    <label class="w3-text-teal">Name of Crop/Commodity, example, Goat, rice...</label>
                    <input class="w3-input w3-border-brown" name="animal" type="text"  required>
                </p>

             <p>
                 <label class="w3-text-teal">Size of the area used by commodity..</label>
                 <input class="w3-input w3-border-brown" name="size" type="number" required>
             </p>
             <p>
                 <label class="w3-text-teal">Number of Head Counts</label>
                 <input class="w3-input w3-border-brown" name="heads" type="number" required>
             </p>

             <p>
                <label class="w3-text-teal">Farm Type</label>
                <select class="w3-select" name="farmtype" required>
                 <option value="" disabled selected>Please Select Farm Type</option>
                 <option value="Irrigated">Irrigated</option>
                 <option value="Rainfed Upland">Rainfed Upland</option>
                 <option value="Rainfed Lowland">Rainfed Lowland</option>
               </select>
            </p>

            <p>
                <label class="w3-text-teal">Organic Practicioner</label>
                <select class="w3-select" name="organi" required>
                 <option value="" disabled selected>Are you using Organic?</option>
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
    function checkFormparcelzza(form) // Submit button clicked
    {

          form.myButton.disabled = true;
          form.myButton.value = "Please wait...";
          return true;
        }
    </script>
