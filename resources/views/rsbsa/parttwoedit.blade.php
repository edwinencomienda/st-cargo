
<style>

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

<div class="modal fade" id="editparttwo{{$parttwo->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content w3-padding-32">

<!-- Modal body -->
<div class="modal-body w3-display-container">
    <div class="w3-center">
        <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
    </div>


    @php

    $pts = $parttwo->id;
      $pt = DB::table('farmerparttwo')->where('id', $pts)->get();
      foreach ($pt as $pt) {
      }

   @endphp
    <div class="w3-margin w3-padding-16">
        <form action="{{url('/updatersbsa3/'.$parttwo->id)}}" method="POST">
             @csrf

            <input type="hidden" name="uuid" value="{{$product->uuid}}" id="">
            <p>
             <label class="w3-text-teal">Main Livelihood</label>
             <select class="w3-select" name="livelihood" required>
              <option value="{{$pt->livelihood}}"  selected>{{$pt->livelihood}}</option>
              <option value="Farmer">Farmer</option>
              <option value="Farmworker/Laborer">Farmworker/Laborer </option>
              <option value="Fisherfolk">Fisherfolk</option>
            </select>
         </p>

         <p>
             <label class="w3-text-teal">Farm Activity</label>
             <select class="w3-select" name="farmactivity" required>
              <option value="{{$pt->farmactivity}}" selected>{{$pt->farmactivity}}</option>
              <option value="Rice">Rice</option>
              <option value="Corn">Corn</option>
              <option value="Fisherfolk">Fisherfolk</option>
              <option value="Other Crops">Other Crops</option>
              <option value="Livestock">Livestock</option>
              <option value="Poultry">Poultry</option>
            </select>
         </p>


            <p>
                <label class="w3-text-teal">If Other Crops, Please Specify:</label>
                <input class="w3-input" type="text" name="othercrop" value="{{$pt->othercrop}}">
            </p>

            <p>
                <label class="w3-text-teal">If Livestock, Please Specify</label>
                <input class="w3-input" name="livestock" type="text" value="{{$pt->livestock}}">
            </p>


            <p>
             <label class="w3-text-teal">If Poultry, Please Specify</label>
             <input class="w3-input" name="poultry" type="text" value="{{$pt->poultry}}">
            </p>

            <p>
             <label class="w3-text-teal">Work Activity</label>
             <select class="w3-select" name="kindwork">
              <option value="{{$pt->kindwork}}" selected>{{$pt->kindwork}}</option>
              <option value="Land Preparation">Land Preparation</option>
              <option value="Planting/Transplanting">Planting/Transplanting</option>
              <option value="Cultivation">Cultivation</option>
              <option value="Harvesting">Harvesting</option>
              <option value="Others">Others</option>

            </select>
         </p>

         <p>
             <label class="w3-text-teal">If Other Work Activity, Please Specify</label>
             <input class="w3-input" name="otherwork" type="text" value="{{$pt->otherwork}}">
            </p>

            <p>
             <label class="w3-text-teal">Fishing Activity</label>
             <select class="w3-select" name="fishwork">
              <option value="{{$pt->fishwork}}" selected>{{$pt->fishwork}}</option>
              <option value="Fish Capture">Fish Capture</option>
              <option value="Aquaculture">Aquaculture</option>
              <option value="Gleaning">Gleaning</option>
              <option value="Fish Processing">Fish Processing</option>
              <option value="Fish Vending">Fish Vending</option>
              <option value="Others">Other Fish Activity</option>

            </select>
         </p>

         <p>
             <label class="w3-text-teal">If Other Fish Activity, Please Specify</label>
             <input class="w3-input" name="otherfish" type="text" value="{{$pt->otherfish}}">
            </p>

            <p>
             <label class="w3-text-teal">Farming Gross Income:</label>
             <input class="w3-input" name="farmgross" type="number" required value="{{$pt->farmgross}}">
            </p>

            <p>
             <label class="w3-text-teal">Non-Farming Gross Income:</label>
             <input class="w3-input" name="nonfarmgross" type="number" required value="{{$pt->nonfarmgrass}}">
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
<div class="modal" id="delparttwo{{$parttwo->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">
            @php
            $gh = $parttwo->id;
               $fps = DB::table('farmerparttwo')->where('id', $gh)->get();
               foreach ($fps as $fps) {
               }

           @endphp
            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you really want to delete these personal information? <br></h4>
               <h4 class="h4-del">Livelihood  {{$fps->livelihood}}<br></h4>


           @php

               $fpl = DB::table('farmerprofile')->where('uuid', $product->uuid)->get();
               foreach ($fpl as $fpl) {
               }

           @endphp
                <h4 class="h4-del">Name:
                {{$fpl->lname}}, {{$fpl->fname}}, {{$fpl->mname}}
                <br></h4>
            </div>



        </div>

        <div class="w3-bar w3-card-4">
            <a href="{{ URL::to('/delrsbsa3/'.$fps->id) }}" type="button" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                <i class="fas fa-trash"></i> Delete
            </a>
            <button class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                <i class="fas fa-times-circle"></i> Cancel
            </button>
        </div>

      </div>
    </div>
  </div>

