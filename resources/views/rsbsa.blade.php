

<?php

// $q = $f->id;
// // $q = $_REQUEST['id'];
// // $q = $request->route('rsbsa')
// $uss = DB::table('users')->where('id', $q)->get();
// foreach ($uss as $uss) {
//     $tl = $uss->uuid;
   ?>



<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href=" {{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/brand.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">

    <script defer src="{{ asset('fontawesome/js/brand.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome/js/solid.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome/js/fontawesome.js') }}"></script>
<style>
   input[type="text"]{
       font-size: 16px !important;
   }

   a:hover{
       text-decoration: none !important;
   }
  /* td, th{
       border: solid .5px !important;
       border-left: none !important;
       padding-left: 12px !important;
       /* padding-right: 4px !important; */

/* input[type=text]{
    border-color: black !important;
} */
#wert{
    font-size: 12px !important;
}
</style>
</head>
<body style="background-color: #ffff !important">
    <br><br>
   <div>
    @include('layouts.nav2')

   </div>
    @include('rsbsa.upper1')
    @include('rsbsa.upper2')
    @include('rsbsa.upper3')

    <?php
        $fms = DB::table('farmerprofile')->where('uuid', $product->uuid)->get();
        if ($fms->count()<0) {
            echo 'Profile Form';
        }
        else {
            foreach ($fms as $fms) { ?>

<br>
<div class="container w3-center"> <hr style="border:dashed black 2px;width:100%"></div>

<div class="container w3-border w3-border-black" style="padding-left:0;padding-right:0">
<div class="w3-row">

  <div class="w3-col s9 w3-center">
<h4 class="text-center w3-padding-16">
<b>Registry System for Basic Sectors in Agriculture (RSBA) ENROLLMENT CLIENT'S COPY</b></h4>
</div>

  <div class="w3-col s3  w3-center">
  <div class="w3-row">
  <div class="w3-col s4 w3-center">

  <img src="/backimage/da.png" width="100%" alt="">
  </div>
  <div class="w3-col s8 w3-center">
  <p class="w3-small" style="margin-bottom:0;font-size:15px">
  <input class="w3-input" type="text">
  <label> <small>CERTIFIED BY</small> </label></p>

  <p class="w3-small" >
  <input class="w3-input" type="text" style="margin-top:-23px">
  <label> <small>DATE</small></label></p>

  </div>
</div>
  </div>

  </div>
  <i>Reference/Control No.:</i></small>
 <input type="text" style="border-top:none;
border-right:none;border-left:none;border-color:black .5px;width:35%" value="{{$fms->ref_no}}">
<br>
<br>


<div class="w3-row">
  <div class="w3-col s6  w3-center">
  <p class="w3-center">
  <input class="w3-input w3-border-bottom w3-border-black" type="text" style="width:95%" value="{{$fms->lname}}">
  <label><small><b>SURNAME</b></small></label></p>
  </div>

  <div class="w3-col s6 w3-center">
  <p>
  <input class="w3-input w3-border-bottom w3-border-black" type="text" value="{{$fms->fname}}">
  <label><small><b>FIRST NAME</b></small></label></p>
  </div>
</div>






<div class="w3-row">
<div class="w3-col s6  w3-center">
  <p class="w3-center">
  <input class="w3-input w3-border-bottom w3-border-black" type="text" style="width:95%" value="{{$fms->mname}}">
  <label><small><b>MIDDLE NAME</b></small></label></p>
  </div>

   <div class="w3-col s2 w3-center">
  <p class="w3-center">
  <input class="w3-input w3-border-bottom w3-border-black" type="text" value="{{$fms->exname}}">
  <label><small class="w3-center"><b>EXTENSION</b></small></label></p>
  </div>
</div>

</div>
<br>
<?php  }


}
?>
</div>
       <h5 class="text-center"><b>THIS FORM IS NOT FOR SALE</b></h5>
<!--
</div> -->



<?php

$farmpa = DB::table('farmparcel')->where('uuid', $product->uuid)->get();
if (!$farmpa->isEmpty())  { ?>


<div class="container w3-border w3-border-black w3-padding-8"
style="padding-left: 0; padding-right:0;">
<button class="w3-btn w3-block w3-brown" data-toggle="modal" data-target="#parcelss">
    <b><i class="fas fa-address-book"></i> Add PARCEL</b> </button>
    @include('rsbsa.addparcel')
{{-- sa taas ni diria --}}
<div class="w3-cell-row w3-padding-8">
    <div class="w3-container w3-cell" style="padding-left: 25px;">
        <strong>No. of Farm  Parcels:
         <input type="text" style="width: 35%; border-top:none;border-left:none;border-right:none;"
         value="<?php $data = DB::table('farmparcel')->where('uuid', $product->uuid)->count(); echo $data;?>">
         </strong>
    </div>

    <div class="w3-container w3-cell w3-cell-middle">
     <strong>Agrarian Reform Beneficiary:</strong>
    </div>


    <div class="w3-container w3-cell w3-cell-bottom">
        <div class="w3-row-padding">
        <?php $data = DB::table('farmparcel')->where('uuid', $product->uuid)->limit(1)->get();
        foreach ($data as $title) {?>

            <div class="w3-half">

              <input class="w3-check" type="checkbox" id="agd1">
              <label>&nbsp;Yes</label>

            </div>
            <div class="w3-half">
                <input class="w3-check" type="checkbox" id="agd2">
                <label>&nbsp;No</label>
            </div>
          </div>
          <?php }?>
    </div>
    </div>

    @if ($title->agrarian == "Yes")
        <script> document.getElementById("agd1").checked = true;</script>

    @else
        <script> document.getElementById("agd2").checked = true;</script>

    @endif
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

<?php $count = 1;?>
<?php foreach ($farmpa as $fmp) {  ?>
<div class="w3-cell-row w3-border-bottom w3-border-top w3-border-black" style="padding-left: 0; padding-right:0;">
    <div class="w3-container w3-white w3-cell" style="width: 50%;padding-left: 0; padding-right:0;">
        <div class="w3-cell-row" style="padding-left: 0; padding-right:0;">

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">
<br><br>
             <h5 id="wert"><strong>&nbsp; @php
                 echo $count;
             @endphp </strong></h5>


<br><br>
            </div>

            <div class="w3-container w3-border-right w3-border-black w3-white w3-cell" style="width: 80%">
               <br>
                <p id="wert text-left">
                    <label class="w3-left">Location (Baranggay/Muncipality)</label>
                    <?php
                    $bgt = DB::table('baranggay')->where('id', $fmp->location)->get();
                    foreach ($bgt as $bg) {?>
                        <input class="w3-input" type="text" style="width:100%"
                        value="{{$bg->brgy}}">
                <?php    }?>
                </p>
                <p>Total Farm Area:
                    <input type="text" style="border-top: none; border-right:none;border-left:none;"
                    value="{{$fmp->hectare}}">ha. <p>

           <br>
        <p>Ownership Document No.
            <input type="text" style="border-top: none; border-right:none;border-left:none;width:100%"
            value="{{$fmp->owner}}">
       </p>


  @if ($fmp->ownership == "Registered Owner")

<input class="w3-check" type="checkbox" id="rown" checked>
<label> Registered Owner</label>

&nbsp;
<input class="w3-check" type="checkbox" id="othe">
<label> Others</label>
<input type="text" style="border-top: none; border-right:none;border-left:none; width:33%;"
value="{{$fmp->otherown}}">
<br>

<input class="w3-check" type="checkbox" id="tenantss">
<label> Tenant</label>
<p>
    &nbsp;&nbsp;
     Name of Land Owner:  <input type="text" style="border-top: none; border-right:none;border-left:none;
     width:52%;"
     value="{{$fmp->tenant}}">
</p>
<br>


<input class="w3-check" type="checkbox" id="les">
<label> Lessee</label>
<p>
    &nbsp;&nbsp;
     Name of Land Owner:  <input type="text" style="border-top: none;
     border-right:none;border-left:none; width:52%;"
     value="{{$fmp->lesse}}">
</p>

@endif

@if ($fmp->ownership == "Others")

<input class="w3-check" type="checkbox" id="rown">
<label> Registered Owner</label>

&nbsp;
<input class="w3-check" type="checkbox" id="othe" checked>
<label> Others</label>
<input type="text" style="border-top: none; border-right:none;border-left:none; width:33%;"
value="{{$fmp->otherown}}">
<br>

<input class="w3-check" type="checkbox" id="tenantss">
<label> Tenant</label>
<p>
    &nbsp;&nbsp;
     Name of Land Owner:  <input type="text" style="border-top: none; border-right:none;border-left:none;
     width:52%;"
     value="{{$fmp->tenant}}">
</p>
<br>


<input class="w3-check" type="checkbox" id="les">
<label> Lessee</label>
<p>
    &nbsp;&nbsp;
     Name of Land Owner:  <input type="text" style="border-top: none;
     border-right:none;border-left:none; width:52%;"
     value="{{$fmp->lesse}}">
</p>

@endif

@if ($fmp->ownership == "Tenant")

<input class="w3-check" type="checkbox" id="rown">
<label> Registered Owner</label>

&nbsp;
<input class="w3-check" type="checkbox" id="othe">
<label> Others</label>
<input type="text" style="border-top: none; border-right:none;border-left:none; width:33%;"
value="{{$fmp->otherown}}">
<br>

<input class="w3-check" type="checkbox" id="tenantss" checked>
<label> Tenant</label>
<p>
    &nbsp;&nbsp;
     Name of Land Owner:  <input type="text" style="border-top: none; border-right:none;border-left:none;
     width:52%;"
     value="{{$fmp->tenant}}">
</p>
<br>


<input class="w3-check" type="checkbox" id="les">
<label> Lessee</label>
<p>
    &nbsp;&nbsp;
     Name of Land Owner:  <input type="text" style="border-top: none;
     border-right:none;border-left:none; width:52%;"
     value="{{$fmp->lesse}}">
</p>

@endif

@if ($fmp->ownership == "Lessee")

<input class="w3-check" type="checkbox" id="rown">
<label> Registered Owner</label>

&nbsp;
<input class="w3-check" type="checkbox" id="othe">
<label> Others</label>
<input type="text" style="border-top: none; border-right:none;border-left:none; width:33%;"
value="{{$fmp->otherown}}">
<br>

<input class="w3-check" type="checkbox" id="tenantss">
<label> Tenant</label>
<p>
    &nbsp;&nbsp;
     Name of Land Owner:  <input type="text" style="border-top: none; border-right:none;border-left:none;
     width:52%;"
     value="{{$fmp->tenant}}">
</p>
<br>


<input class="w3-check" type="checkbox" id="les" checked>
<label> Lessee</label>
<p>
    &nbsp;&nbsp;
     Name of Land Owner:  <input type="text" style="border-top: none;
     border-right:none;border-left:none; width:52%;"
     value="{{$fmp->lesse}}">
</p>

@endif


       <div class="w3-bar">
        <a href="#pars{{$fmp->id}}" type="button" class="w3-bar-item w3-block w3-button w3-brown"
        data-toggle="modal" style="width: 33.33333333333333%" >
        <i class="fas fa-edit"></i> Update Parcel
        </a>
        <a href="#delpars{{$fmp->id}}" class="w3-bar-item w3-block w3-button w3-red"
            data-toggle="modal" style="width: 33.33333333333333%">
            <i class="fas fa-trash-alt"></i> Delete Parcel
        </a>

        <a href="#paran{{$fmp->id}}" type="button" class="w3-bar-item w3-block w3-button w3-teal"
            data-toggle="modal" style="width: 33.33333333333333%" >
            <i class="fas fa-user-plus"></i> Add Products
            </a>
      </div>
      @include('rsbsa.editparcel')

            </div>
        </div>
    </div>


    <div class="w3-container w3-sand w3-cell" style="width: 50%;padding-left: 0; padding-right:0;">

        <?php
        $farmparcel = DB::table('parcelanimal')->where('parcel', $fmp->id)->where('uuid', $fmp->uuid)->get();
        foreach ($farmparcel as $fparcel) { ?>
        <div class="w3-cell-row w3-border-bottom w3-border-black" style="padding-left: 0; padding-right:0;">
            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert">
                <br>
                <strong>
                    &nbsp;
                    {{$fparcel->animal}}
                </strong>

            </h5>

            </div>

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert"><strong>{{$fparcel->size}}ha</strong></h5>

            </div>

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">
            <h5 id="wert">
                <strong>
                    &nbsp;
                    {{$fparcel->heads}}
                </strong>

            </h5>
            </div>

            <div class="w3-container w3-border-right w3-border-black
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert">
                <strong>
                    &nbsp;
                    {{$fparcel->farmtype}}
                </strong>
            </h5>
            </div>

            <div class="w3-container
            w3-cell-middle w3-center w3-white w3-cell" style="width: 20%">

            <h5 id="wert">
                <br>
                <strong>
                   &nbsp;
                   {{$fparcel->organi}}
                </strong>

            </h5>
<br><br>
            </div>

        </div>
        <div class="w3-bar">
            <a href="#anip{{$fparcel->id}}" type="button" class="w3-bar-item w3-block w3-button w3-brown"
            data-toggle="modal" style="width: 50%" >
            <i class="fas fa-edit"></i> Update Commodity
            </a>
            <a href="#anipdel{{$fparcel->id}}" class="w3-bar-item w3-block w3-button w3-red"
                data-toggle="modal" style="width: 50%">
                <i class="fas fa-trash-alt"></i> Delete Parcel
            </a>
          </div>
@include('rsbsa.anipars')
        <?php } ?>
        {{-- end loop --}}


    </div>
</div>
<?php $count++;?>
<?php } ?>
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


<?php
} else { ?>
 @include('rsbsa.last')

<?php }



?>






</div>

<h5 class="text-center"><b>THIS FORM IS NOT FOR SALE</b></h5>

<br><br>
</body>
</html>



