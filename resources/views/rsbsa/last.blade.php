

<div class="container w3-border w3-border-black w3-padding-8"
style="padding-left: 0; padding-right:0;">
<button class="w3-btn w3-block w3-brown" data-toggle="modal" data-target="#parce">
    <b><i class="fas fa-address-book"></i> Add PARCEL</b> </button>

    @include('rsbsa.last1')
<br><br>
{{-- sa taas ni diria --}}
<div class="w3-cell-row w3-padding-8">
    <div class="w3-container w3-cell" style="padding-left: 25px;">
        <strong>No. of Farm  Parcels: <input type="text" style="width: 35%; border-top:none;border-left:none;border-right:none;"></strong>
    </div>

    <div class="w3-container w3-cell w3-cell-middle">
     <strong>Agrarian Reform Beneficiary:</strong>
    </div>

    <div class="w3-container w3-cell w3-cell-bottom">
        <div class="w3-row-padding">
            <div class="w3-half">

              <input class="w3-check" type="checkbox">
              <label>&nbsp;Yes</label>

            </div>
            <div class="w3-half">
                <input class="w3-check" type="checkbox">
                <label>&nbsp;No</label>
            </div>
          </div>
    </div>
    </div>
{{-- sa taas ni diri --}}

<div class="w3-cell-row w3-border-bottom w3-border-top w3-border-black" style="padding-left: 0; padding-right:0;">

    <div class="w3-container w3-white w3-cell" style="width: 50%;padding-left: 0; padding-right:0;">
        <div class="w3-cell-row" style="padding-left: 0; padding-right:0;">

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">
<br><br>
             <h5 id="wert"><strong>FARM PARCEL NO.</strong></h5>
<br><br>
            </div>

            <div class="w3-container w3-cell-middle w3-border-right w3-border-black w3-center w3-white w3-cell" style="width: 80%">
                <h5 id="wert"><strong>FARM LAND DESCRIPTION</strong></h5>
            </div>
        </div>
    </div>

    <div class="w3-container w3-green w3-cell" style="width: 50%;padding-left: 0; padding-right:0;">
        <div class="w3-cell-row" style="padding-left: 0; padding-right:0;">

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert">
                <br>
                <strong>
                    CROP/COMMODITY <br>
                </strong>
                <em class="w3-center">(Rice/Corn/HVC/
                   Livestock/Poultry/
                  Agrifishery)</em>
            </h5>

            </div>

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert"><strong>SIZE (ha.)</strong></h5>

            </div>

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">
            <h5 id="wert">
                <strong>
                    NO. OF HEAD <br>
                </strong>
                <em>
                    (For Livestock and Poultry)
                </em>
            </h5>
            </div>

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert">
                <strong>
                    FARM TYPE

                    <br>**

                    </strong>
            </h5>
            </div>

            <div class="w3-container
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert">
                <br>
                <strong>
                    ORGANIC PRACTIONER <br>
                    (Y/N)
                </strong>

            </h5>
<br><br>
            </div>





        </div>
    </div>
</div>

{{-- part 2 --}}



<div class="w3-cell-row w3-border-bottom w3-border-top w3-border-black" style="padding-left: 0; padding-right:0;">
    <div class="w3-container w3-white w3-cell" style="width: 50%;padding-left: 0; padding-right:0;">
        <div class="w3-cell-row" style="padding-left: 0; padding-right:0;">

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">
<br><br>
             <h5 id="wert"><strong>&nbsp;</strong></h5>
<br><br>
            </div>

            <div class="w3-container w3-border-right w3-border-black w3-white w3-cell" style="width: 80%">
               <br>
                <p id="wert text-left">
                    <label class="w3-left">Location (Baranggay/Muncipality)</label>
                    <input class="w3-input" type="text" style="width:100%">
                </p>
                <p>Total Farm Area:
                    <input type="text" style="border-top: none; border-right:none;border-left:none;">ha. <p>

           <br>
        <p>Ownership Document No.
            <input type="text" style="border-top: none; border-right:none;border-left:none;width:100%">
       </p>


       <input class="w3-check" type="checkbox">
       <label> Registered Owner</label>

&nbsp;
       <input class="w3-check" type="checkbox">
       <label> Others</label>
       <input type="text" style="border-top: none; border-right:none;border-left:none; width:33%;">
       <br>

       <input class="w3-check" type="checkbox">
       <label> Tenant</label>
       <p>
           &nbsp;&nbsp;
            Name of Land Owner:  <input type="text" style="border-top: none; border-right:none;border-left:none;
            width:52%;">
       </p>
       <br>


       <input class="w3-check" type="checkbox">
       <label> Lessee</label>
       <p>
           &nbsp;&nbsp;
            Name of Land Owner:  <input type="text" style="border-top: none;
            border-right:none;border-left:none; width:52%;">
       </p>

            </div>
        </div>
    </div>

    <div class="w3-container w3-sand w3-cell" style="width: 50%;padding-left: 0; padding-right:0;">

        <div class="w3-cell-row w3-border-bottom w3-border-black" style="padding-left: 0; padding-right:0;">
            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert">
                <br>
                <strong>
                    &nbsp;
                </strong>

            </h5>

            </div>

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert"><strong>ha</strong></h5>

            </div>

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">
            <h5 id="wert">
                <strong>
                    &nbsp;
                </strong>

            </h5>
            </div>

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert">
                <strong>
                    &nbsp;
                </strong>
            </h5>
            </div>

            <div class="w3-container
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert">
                <br>
                <strong>
                   &nbsp;
                </strong>

            </h5>
<br><br>
            </div>
        </div>

        {{-- end loop --}}


    </div>
</div>


<div class="w3-cell-row">

    <div class="w3-container w3-cell w3-border-right w3-border-black">
        <div class="w3-cell-row">
            <div class="w3-container  w3-cell">
                <h5>
                    <strong>
                        OWNERSHIP DOCUMENT *
                    </strong>
                </h5>
<br> 1. Certificate of Land Transfer
<br> 2. Emancipation Patent
<br> 3. Individual Certificate of Land
 Ownership Award (CLOA)
<br> 4. Collective CLOA
<br> 5. Co-ownership CLOA
            </div>

            <div class="w3-container w3-cell">
               <br> 6. Agricultural sales patent
               <br> 7. Homestead patent
               <br> 8. Free Patent
               <br> 9. Certificate of Title or Regular Title
               <br> 10. Certificate of Ancestral Domain Title
               <br> 11. Certificate of Ancestral Land Title
               <br> 12. Tax Declaration
            </div>

        </div>
    </div>

    <div class="w3-container w3-cell w3-cell-middle">
     <h5 class="w3-center">
         <strong>FARM TYPE **</strong>
     </h5>
     <br>
  <br>   1 - Irrigated
   <br>  2 - Rainfed Upland
    <br> 3 - Rainfed Lowland
     <br><em>(NOTE: not applicable to agri-fishery</em>
    </div>

</div>

<div class="w3-border-top w3-border-black w3-padding-16" style="padding-left:15px;padding-right:15px;text-align:justify">
   &nbsp;&nbsp; I hereby declare that all information indicated above are true and correct, and that they may be used by Department of Agriculture for the purposes of
    registration to the Registry System for Basic Sectors in Agriculture (RSBSA) and other legitimate interests of the Department pursuant to its mandates
</div>

<div class="w3-border-top w3-border-black w3-padding-64" style="height: 125px;">

</div>

<div class="w3-black w3-padding w3-border-top w3-center">
    <h6>
        <strong>
            DATA PRIVACY POLICY
        </strong>
    </h6>
</div>

<div class="w3-padding-16" style="padding-left:15px;padding-right:15px;text-align:justify">
    &nbsp;&nbsp;The collection of personal information is for documentation, planning, reporting and processing purposes in availing agricultural related interventions.
   <br> Processed data shall only be shared to partner agencies for planning, reporting and other use in accordance to the mandate of the agency. This is in
    compliance with the Data Sharing Policy of the department.

<br>
&nbsp;&nbsp; You have the right to ask for a copy of your personal data that we hold about you as well as to ask for it to be corrected if you think it is wrong. To
do so, please contact < Contact Person and Contact Details >.
</div>

</div>{{-- </div> sa container ni --}}

