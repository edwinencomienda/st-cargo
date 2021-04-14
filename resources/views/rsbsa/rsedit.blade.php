
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

<div class="modal" id="editone{{$farms->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content w3-padding-32">



    @php
    $a = $farms->id;
       $users = DB::table('farmerprofile')->where('id', $a)->get();
       foreach ($users as $users) {
       }

   @endphp

<!-- Modal body -->
<div class="modal-body w3-display-container">
    <div class="w3-center">
        <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
    </div>

    <div class="w3-margin w3-padding-16">
        <form action="{{url('/editrsbsa/'.$users->id)}}" method="POST" enctype="multipart/form-data"
            onsubmit="checkForm(this);">
            @csrf



            <input type="hidden" name="oldlogo" value="{{$users->idpicture}}" id="">
             <input class="w3-input" type="hidden" name="uuid" value="{{$product->uuid}}" required >

             <img src="{{URL::to($users->idpicture)}}" width="280" height="280" alt="">
<br><br>
             <input type="checkbox" class="w3-checkbox" name="retain" value="retain" id="retain" checked>
             <em class="w3-text-red"> Click to uncheck if you want to change the PHOTO!</em>


            <p id="image" style="display: none">
                <label class="w3-text-teal">Picture</label>
                <input class="w3-input" type="file" name="idpicture">
            </p>

<script src="{{ asset('js/app.js') }}" defer></script>
<script>
$("#retain").click(function(){
$("#image").toggle();
});
</script>

            <p>
                <label class="w3-text-teal">Enrollment</label>
                <select class="w3-select" name="farm_exi" required>
                 <option value="{{$users->farm_exi}}" selected>{{$users->farm_exi}}</option>
                 <option value="New">New </option>
                 <option value="Existing">Existing</option>
               </select>
            </p>


            <p>
                <label class="w3-text-teal">Reference No</label>
                <input class="w3-input" type="text" value="{{$users->ref_no}}" name="ref_no" required>
               </p>


            <p>
             <label class="w3-text-teal">First Name</label>
             <input class="w3-input" type="text" name="fname" value="{{$users->fname}}" required>
            </p>

            <p>
             <label class="w3-text-teal">Middle Name</label>
             <input class="w3-input" type="text" value="{{$users->mname}}"  name="mname">
            </p>

            <p>
             <label class="w3-text-teal">Last Name</label>
             <input class="w3-input" type="text" name="lname" value="{{$users->lname}}"  required>
            </p>

            <p>
             <label class="w3-text-teal">Name Extension</label>
             <input class="w3-input" type="text" name="exname" value="{{$users->exname}}" >
            </p>

            <p>
                <label class="w3-text-teal">Gender</label>
                <select class="w3-select" name="gender" required>

                 <option value="{{$users->gender}}"  selected>{{$users->gender}}</option>
                 <option value="Male">Male </option>
                 <option value="Female">Female</option>
               </select>
            </p>

            <p>
                <label class="w3-text-teal">House/Purok/Street Number</label>
                <input class="w3-input" name="houseno" type="text" value="{{$users->houseno}}"  required>
            </p>

            <p>
             <label class="w3-text-teal">House/Purok/Street</label>
             <input class="w3-input" name="street" type="text" value="{{$users->street}}"  required>
         </p>

            <p>
             <label class="w3-text-teal">Barangay</label>
             <select class="w3-select" name="brgy" required>

              <option value="{{$users->brgy}}"  selected>{{$users->brgy}}</option>
              <?php
              $brgy = DB::table('baranggay')->orderBy('brgy', 'asc')->get();

             foreach ($brgy as $brgy) { ?>
              <option value="{{$brgy->id}}">{{$brgy->brgy}}</option>';
          <?php   }
          ?>

            </select>
         </p>

         <p>
             <label class="w3-text-teal">City</label>
             <input class="w3-input" name="city" type="text"  value="{{$users->city}}" readonly required>
         </p>

         <p>
             <label class="w3-text-teal">Province</label>
             <input class="w3-input" name="province" type="text"   value="{{$users->province}}" readonly required>
         </p>

         <p>
             <label class="w3-text-teal">Contact Number</label>
             <input class="w3-input" name="contact" type="text"  value="{{$users->contact}}" required>
         </p>

         <p>
             <label class="w3-text-teal">Birthday</label>
             <input class="w3-input" name="birthdate" type="date"  value="{{$users->birthdate}}" required>
         </p>

         <p>
             <label class="w3-text-teal">Place of Birth</label>
             <input class="w3-input" name="birthplace" type="text"   value="{{$users->birthplace}}"required>
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

function checkForm(form)
  {
    form.submit1.disabled = true;
    form.submit1.value = "Please wait...";
    return true;
  }
</script>



  {{-- for delete --}}
<!-- The Modal -->
<div class="modal" id="delone{{$farms->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">
            @php
            $a = $farms->id;
               $picture = DB::table('farmerprofile')->where('id', $a)->get();
               foreach ($picture as $picture) {
               }

           @endphp
            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you Really want to Delete: <br></h4>
               <img src="{{URL::to($picture->idpicture)}}" width="145" height="145" alt="">
               <br><h4 class="h4-del">{{$picture->lname}}, {{$picture->fname}}, {{$picture->mname}}</h4>

            </div>



        </div>

        <div class="w3-bar w3-card-4">
            <a href="{{ URL::to('/delrsbsa1/'.$picture->id) }}" type="button" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                <i class="fas fa-trash"></i> Delete
            </a>
            <button class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                <i class="fas fa-times-circle"></i> Cancel
            </button>
        </div>

      </div>
    </div>
  </div>


