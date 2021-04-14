<style>
    .h4-del{
        font-family: 'Nunito' !important;
        font-size:22px !important;
    }
</style>

 <div class="modal" id="farmcrud{{$f->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-32">

        <!-- Modal body -->
        <div class="modal-body w3-display-container">
            <div class="w3-center">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
            </div>

            @php
             $a = $f->id;
                $users = DB::table('users')->where('id', $a)->get();
                foreach ($users as $users) {
                }

            @endphp
            <div class="w3-margin w3-padding-16">
                <form action="{{url('/updateuser/'.$users->id)}}" method="POST" name="edduse"
                    onsubmit="return checkForms();" >
                 @csrf
                 {{-- onsubmit="return checkForms();" --}}
                    <p>
                        <label class="w3-text-teal">Username</label>
                        <input class="w3-input" type="text"
                        value="{{$users->name}}" name="name" required>

                        <div class="alert alert-danger alert-dismissible" style="display: none" id="name1s">
                            <strong id="messs1"></strong>
                        </div>
                    </p>

                    <p>
                        <label class="w3-text-teal">Email</label>
                        <input class="w3-input" type="email"
                        value="{{$users->email}}" name="email" required>

                        <div class="alert alert-danger alert-dismissible" style="display: none" id="emails">
                            <strong id="messs2"></strong>
                        </div>
                    </p>

                    <p>
                        <label class="w3-text-teal">Password</label>
                        <input class="w3-input" name="password" type="password" id="ps" required>

                       <div class="alert alert-danger alert-dismissible" style="display: none" id="p{{$users->id}}">
                        <strong id="m{{$users->id}}"></strong>
                      </div>
                    </p>

                    <p hidden>
                        <label class="w3-text-teal">Role</label>
                        <input class="w3-input" type="text" value="{{6}}" name="role">
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

  <script>
    function checkForms() // Submit button clicked
   {
    var namess = document.forms["edduse"]["name"].value;
    var emails = document.forms["edduse"]["email"].value;
    var passwords = document.forms["edduse"]["password"].value;
    // var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // var passw= ;
    var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;



if (passwords.match(decimal)) {
    // document.getElementById("<?php echo 'p'.$users->id; ?>").style.display = 'block';
    // document.getElementById("<?php echo 'm'.$users->id; ?>").innerHTML = 'Password Correct';
    alert('Correct Password!');
    return true;

}
else{
    // document.getElementById("<?php echo 'p'.$users->id; ?>").style.display = 'block';
    // document.getElementById("<?php echo 'm'.$users->id; ?>").innerHTML = 'Password must have One Capital Letter <br> 1 Number <br>One Special Character <br>At least 8 characters! <br> Example F4rmer1#';
    passwords.value = '';
   alert('Password must have:\n One Capital Letter  \n 1 Number, \n One Special Character, \n At least 8 characters! \n Example F4rmer1#');

    return false;
}

     form.submit1.disabled = true;
     form.submit1.value = "Please wait...";
     return true;
   }
 </script>

            </div>

            </div>

        </div>



      </div>
    </div>
  </div>


  {{-- for delete --}}
<!-- The Modal -->
<div class="modal" id="farmdel{{$f->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">

            <div class="w3-center w3-padding-32">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="85" height="85" alt="">
            </div>
            @php
            $a = $f->id;
               $users = DB::table('users')->where('id', $a)->get();
               foreach ($users as $users) {
               }

           @endphp
            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you Really want to Delete: <br></h4>
               <h4 class="h4-del">{{$users->email}}?</h4>
              </div>

            <div class="w3-bar w3-card-4">
                <a href="{{ URL::to('/deleteuser/'.$users->id) }}" type="button" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
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

