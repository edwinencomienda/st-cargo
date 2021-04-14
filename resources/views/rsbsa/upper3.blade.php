<?php

$parttwo = DB::table('farmerparttwo')->where('uuid', $product->uuid)->get();
if (!$parttwo->isEmpty())  {
    foreach ($parttwo as $parttwo) { ?>



<div class="w3-row">
    <div class="w3-col s12  w3-black">
    <small>
    <b>&nbsp;&nbsp;PART II: FARM PROFILE</b></small>
    </div>

    </div>


    <div class="w3-row" style="padding-top:2px;padding-bottom:2px;padding-left:11px">
      <div class="w3-col s3" style="padding-top:2px;padding-bottom:2px;">
      <b>
      MAIN LIVELIHOOD
      </b></div>
      <div class="w3-col s3">
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="li1">&nbsp;&nbsp;&nbsp;
        <label><b>FARMER</b></label></div>

        <div class="w3-col s3">
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="li2">&nbsp;&nbsp;&nbsp;
        <label><b>FARMWORKER/LABORER</b></label></div>

        <div class="w3-col s3">
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="li3">&nbsp;&nbsp;&nbsp;
        <label><b>FISHERFOLK</b></label></div>

        @if ($parttwo->livelihood == "Farmer")
            <script>document.getElementById("li1").checked = true;</script>
        @endif

        @if ($parttwo->livelihood == "Farmworker/Laborer")
        <script>document.getElementById("li2").checked = true;</script>
        @endif

        @if ($parttwo->livelihood == "Fisherfolk")
        <script>document.getElementById("li3").checked = true;</script>
        @endif
    </div>



    <div class="w3-cell-row w3-border-top w3-border-black">
      <div class="w3-container w3-border-right w3-border-black w3-cell w3-cell-top" style="width:33.33%">
    <div class="w3-center">
    <small style="text-decoration:underline">
        <em>
        <b>   For farmers</b>

        </em>
        </small>
    </div><br>
    <div style="margin-bottom:11px">
      <b>Types of Farming Activity</b>
    </div>
    <div>
    <input class="w3-check w3-border w3-border-black" type="checkbox" id="fa1">&nbsp;&nbsp;&nbsp;
    <label>Rice</label>
    </div>

    <div>
    <input class="w3-check w3-border w3-border-black" type="checkbox" id="fa2">&nbsp;&nbsp;&nbsp;
    <label>Corn</label>
    </div>


    <div class="w3-row">
      <div class="w3-col s6">
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="fa3">&nbsp;&nbsp;&nbsp;
    <label>Other crops,:</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;please specify
    </div>
      <div class="w3-col s6 w3-dark-grey w3-center">
      <input class="w3-input w3-border-bottom w3-border-black" type="text" value="{{$parttwo->othercrop}}">
      </div>
    </div>


    <div class="w3-row">
      <div class="w3-col s6">
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="fa4">&nbsp;&nbsp;&nbsp;
    <label>Livestock,:</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;please specify
    </div>
      <div class="w3-col s6 w3-dark-grey w3-center">
      <input class="w3-input w3-border-bottom w3-border-black" type="text" value="{{$parttwo->livestock}}">
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col s6">
      <input class="w3-check w3-border w3-border-black" type="checkbox" id="fa5">&nbsp;&nbsp;&nbsp;
    <label>Poultry,:</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;please specify
    </div>
      <div class="w3-col s6 w3-dark-grey w3-center">
      <input class="w3-input w3-border-bottom w3-border-black" type="text" value="{{$parttwo->poultry}}">
      </div>
    </div>

    @if ($parttwo->farmactivity == "Rice")
    <script>document.getElementById("fa1").checked = true;</script>
    @endif

    @if ($parttwo->farmactivity == "Corn")
    <script>document.getElementById("fa2").checked = true;</script>
    @endif

    @if ($parttwo->farmactivity == "Others")
    <script>document.getElementById("fa3").checked = true;</script>
    @endif

    @if ($parttwo->farmactivity == "Livestock")
    <script>document.getElementById("fa4").checked = true;</script>
    @endif

    @if ($parttwo->farmactivity == "Poultry")
    <script>document.getElementById("fa5").checked = true;</script>
    @endif

      </div>



                <div class="w3-container w3-cell"  style="width:33.33%">
                <div class="w3-center">
                    <small style="text-decoration:underline">
                        <em>
                        <b>   For farmworkers</b>

                        </em>
                        </small>
                    </div><br>
                    <div style="margin-bottom:11px">
                      <b>Kind of work</b>
                    </div>
                    <div>
                    <input class="w3-check w3-border w3-border-black" type="checkbox" id="fm1">&nbsp;&nbsp;&nbsp;
                    <label>Land Preparation</label>
                    </div>

                    <div>
                    <input class="w3-check w3-border w3-border-black" type="checkbox" id="fm2">&nbsp;&nbsp;&nbsp;
                    <label>Planting/Transplanting</label>
                    </div>

                    <div>
                    <input class="w3-check w3-border w3-border-black" type="checkbox" id="fm3">&nbsp;&nbsp;&nbsp;
                    <label>Cultivation</label>
                    </div>

                    <div>
                    <input class="w3-check w3-border w3-border-black" type="checkbox" id="fm4">&nbsp;&nbsp;&nbsp;
                    <label>Harvesting</label>
                    </div>


                    <div>
                    <input class="w3-check w3-border w3-border-black" type="checkbox" id="fm5">&nbsp;&nbsp;&nbsp;
                    <label>Others, please specify:</label>
                    </div>

                    <div>
                    <input class="w3-input w3-border-bottom w3-border-black" type="text" value="{{$parttwo->otherwork}}">
                    </div>

                    @if ($parttwo->kindwork == "Land Preparation")
                    <script>document.getElementById("fm1").checked = true;</script>
                    @endif

                    @if ($parttwo->kindwork == "Planting/Transplanting")
                    <script>document.getElementById("fm2").checked = true;</script>
                    @endif

                    @if ($parttwo->kindwork == "Cultivation")
                    <script>document.getElementById("fm3").checked = true;</script>
                    @endif

                    @if ($parttwo->farmactivity == "Harvesting")
                    <script>document.getElementById("fm4").checked = true;</script>
                    @endif

                    @if ($parttwo->farmactivity == "Others")
                    <script>document.getElementById("fm5").checked = true;</script>
                    @endif
                 </div>




      <div class="w3-container w3-border-left w3-border-black w3-cell"  style="width:33.33%;">
      <div class="w3-center">
                    <small style="text-decoration:underline">
                        <em>
                        <b>   For fisherfolk</b>

                        </em>
                        </small>
                    </div><br>
          <div class="text-justify" style="font-size:13px">
          The Lending Conduit shall coordinate with the Bureau of Fisheries and Aquatic Resources (BFAR)
          in the issuance of a certification that fisherfolk-borrower under PUNLA/PLEA
          is registered under Municipal Fisherfolk Registration (FishR).
          </div><br>
    <div style="margin-bottom:11px">
    <b>Type of Fishing Activity</b>
    </div>

    <div class="w3-row">
          <div class="w3-col s6 w3-center">
          <input class="w3-check w3-border w3-border-black" type="checkbox" id="fi1">
        <label>Fish Capture</label>

          </div>

        <div class="w3-col s6 w3-center">
        <input class="w3-check w3-border w3-border-black" type="checkbox" id="fi2">
      <label>Fish Processing</label></div></div>
      <div class="w3-row">
          <div class="w3-col s6 w3-center">
          <input class="w3-check w3-border w3-border-black" type="checkbox" id="fi3">
        <label>Aquaculture</label>

          </div>

        <div class="w3-col s6 w3-center" style="margin-left:-7px">
        <input class="w3-check w3-border w3-border-black" type="checkbox" id="fi4">
      <label>Fish Vending</label></div></div>

      <div class="w3-row" style="margin-left:-15px">
      <div class="w3-col s6 w3-center">
        <input class="w3-check w3-border w3-border-black" type="checkbox" id="fi5">
      <label>Gleaning</label></div>

      <div class="w3-col s6 w3-center">

          </div>
       </div>

       <div class="w3-row" style="margin-left:45px">
      <div class="w3-col s7 w3-center">
        <input class="w3-check w3-border w3-border-black" type="checkbox" id="fi6">
      <label>Others, please specify:</label></div>

      <div class="w3-col s5 w3-center">
      &nbsp;&nbsp;&nbsp;&nbsp;
        <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
          </div>
       </div>
       <input class="w3-input w3-border-bottom w3-border-black" style="margin-bottom:3px;" type="text" value="{{$parttwo->otherfish}}">

      </div>

      </div>

    @if ($parttwo->fishwork == "Fish Capture")
    <script>document.getElementById("fi1").checked = true;</script>
    @endif

    @if ($parttwo->fishwork == "Aquaculture")
    <script>document.getElementById("fi3").checked = true;</script>
    @endif

    @if ($parttwo->fishwork == "Gleaning")
    <script>document.getElementById("fi5").checked = true;</script>
    @endif

    @if ($parttwo->fishwork == "Fish Vending")
    <script>document.getElementById("fi4").checked = true;</script>
    @endif

    @if ($parttwo->fishwork == "Fish Processing")
    <script>document.getElementById("fi2").checked = true;</script>
    @endif

    @if ($parttwo->fishwork == "Others")
    <script>document.getElementById("fi6").checked = true;</script>
    @endif

      <div class="w3-row w3-border-top w3-border-black">
      <div class="w3-col s4" style="padding-left:15px;padding-top:7px">
      <b>Gross Annual Income Last Year:
      </b>
      </div>
      <div class="w3-col s4">
      <table>
      <tr>
      <td> Farming:</td>
      <td>

      <input class="w3-input w3-border-bottom w3-border-black" style="margin-bottom:3px" type="text" value="{{$parttwo->farmgross}}">
      </td></tr></table>

       </div>
      <div class="w3-col s4">
      <table>
      <tr>
      <td>Non farming:</td>
      <td>

      <input class="w3-input w3-border-bottom w3-border-black"  style="margin-bottom:3px" type="text" value="{{$parttwo->nonfarmgrass}}">
      </td></tr></table>
      </div>

    </div>

    <div class="w3-brown" style="margin-top: 5px !important; ">
        <div class="w3-bar">
            <a href="#editparttwo{{$parttwo->id}}" class="w3-bar-item w3-button" data-toggle="modal" style="width:50%">
                <i class="fas fa-edit" style="font-size: 13px;"></i> Edit
            </a>

            <a href="#delparttwo{{$parttwo->id}}"  class="w3-bar-item w3-button w3-red" style="width:50%" data-toggle="modal">
                <i class="fas fa-eraser" style="font-size: 13px;"></i> Delete
            </a>


          </div>

    </div>
    @include('rsbsa.parttwoedit')
    </div>

    <?php }
} else { ?>
 @include('rsbsa.first3')

<?php }



?>
