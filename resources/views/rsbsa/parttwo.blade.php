
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

<div class="modal fade" id="parttwo">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
 <div class="modal-content w3-padding-32">

   <!-- Modal body -->
   <div class="modal-body w3-display-container">
       <div class="w3-center">
           <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
       </div>

       <div class="w3-margin w3-padding-16">
           <form action="{{ route('rsbsadd3')}}" method="POST"  onsubmit="checkFormpart(this);">
               @csrf

               <input type="hidden" name="uuid" value="{{$product->uuid}}" id="">
               <p>
                <label class="w3-text-teal">Main Livelihood</label>
                <select class="w3-select" name="livelihood" required id="livelihood">
                 <option value="" disable selected>What is your main livelihood?</option>
                 <option value="Farmer">Farmer</option>
                 <option value="Farmworker/Laborer" id="labor1">Farmworker/Laborer </option>
                 <option value="Fisherfolk" id="fish1">Fisherfolk</option>
               </select>
            </p>


<div id="farm1" style="display: none">
            <p id="farmerssss" style="display:none">
                <label class="w3-text-teal">Farm Activity</label>
                <select class="w3-select" name="farmactivity" id="farmact">
                 <option value="" disable selected>Farming</option>
                 <option value="Rice">Rice</option>
                 <option value="Corn">Corn</option>
                 <option value="Fisherfolk">Fisherfolk</option>
                 <option value="Other Crops" id="otherc">Other Crops</option>
                 <option value="Livestock" id="livestock">Livestock</option>
                 <option value="Poultry" id="poultry">Poultry</option>
               </select>
            </p>



               <p id="ot" style="display: none">
                   <label class="w3-text-teal">If Other Crops, Please Specify:</label>
                   <input class="w3-input" type="text" name="othercrop">
               </p>

               <p id="li" style="display: none">
                   <label class="w3-text-teal">If Livestock, Please Specify</label>
                   <input class="w3-input" name="livestock" type="text">
               </p>


               <p id="po" style="display: none">
                <label class="w3-text-teal">If Poultry, Please Specify</label>
                <input class="w3-input" name="poultry" type="text">
               </p>

 </div>

 <div style="display: none" id="act1">
               <p id="activity" style="display: none">
                <label class="w3-text-teal">Work Activity</label>
                <select class="w3-select" name="kindwork" id="kindworkzz">
                 <option value="" disable selected>Kind of Work</option>
                 <option value="Land Preparation">Land Preparation</option>
                 <option value="Planting/Transplanting">Planting/Transplanting</option>
                 <option value="Cultivation">Cultivation</option>
                 <option value="Harvesting">Harvesting</option>
                 <option value="Others">Others</option>

               </select>
            </p>

            <p id="otw" style="display: none">
                <label class="w3-text-teal">If Other Work Activity, Please Specify</label>
                <input class="w3-input" name="otherwork" type="text">
               </p>

        </div>


        <div style="display: none" id="fish1s">

               <p id="fishing" style="display: none">
                <label class="w3-text-teal">Fishing Activity</label>
                <select class="w3-select" name="fishwork" id="fishworkz">
                 <option value="" disable selected id="fishkw">Kind of Work</option>
                 <option value="Fish Capture">Fish Capture</option>
                 <option value="Aquaculture">Aquaculture</option>
                 <option value="Gleaning">Gleaning</option>
                 <option value="Fish Processing">Fish Processing</option>
                 <option value="Fish Vending">Fish Vending</option>
                 <option value="Others">Other Fish Activity</option>

               </select>
            </p>

            <p id="otfish" style="display: none">
                <label class="w3-text-teal">If Other Fish Activity, Please Specify</label>
                <input class="w3-input" name="otherfish" type="text">
               </p>

</div>


<script src="{{ asset('js/app.js') }}" defer></script>
<script>
$( "#livelihood" ).change(function() {
var sel = $( "#livelihood option:selected" ).val();
if (sel == "Farmer") {
    $('#farmerssss').show();
    $('#farm1').show();
    $('#activity').hide();
    $('#act1').hide();
    $('#fish1s').hide();

}
if (sel == "Farmworker/Laborer") {
    $('#activity').show();
    $('#act1').show();
    $('#farm1').hide();
   $('#fish1s').hide();
}

if (sel == "Fisherfolk") {
    $('#fishing').show();
    $('#fish1s').show();
    $('#act1').hide();
    $('#farm1').hide();
  //  $('#activity').hide();
}
});


//for farm
$( "#farmact" ).change(function() {
var sels = $( "#farmact option:selected" ).val();

switch (sels) {
    case "Other Crops":
            $('#ot').show();
            $('#li').hide();
            $('#po').hide();
        break;

    case "Livestock":
            $('#li').show();
            $('#ot').hide();
            $('#po').hide();
        break;

    case "Poultry":
            $('#po').show();
            $('#ot').hide();
            $('#li').hide();
        break;
    default:
            $('#po').hide();
            $('#ot').hide();
            $('#li').hide();
        break;
}
});


$( "#kindworkzz" ).change(function() {
var selsi = $( "#kindworkzz option:selected" ).val();

switch (selsi) {
    case "Others":
            $('#otw').show();

        break;
    default:
            $('#otw').hide();

        break;
}
});


$( "#fishworkz" ).change(function() {
var selsa = $( "#fishworkz option:selected" ).val();

switch (selsa) {
    case "Others":
            $('#otfish').show();

        break;
    default:
            $('#otfish').hide();

        break;
}
});


</script>


               <p>
                <label class="w3-text-teal">Farming Gross Income:</label>
                <input class="w3-input" name="farmgross" type="number" required>
               </p>

               <p>
                <label class="w3-text-teal">Non-Farming Gross Income:</label>
                <input class="w3-input" name="nonfarmgross" type="number" required>
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



<script>

    function checkFormpart(form)
      {
        form.submit1.disabled = true;
        form.submit1.value = "Please wait...";
        return true;
      }
    </script>
