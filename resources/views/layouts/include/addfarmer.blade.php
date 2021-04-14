

<div class="modal fade" id="addfarmer">
    <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content w3-padding-32">

       <!-- Modal body -->
       <div class="modal-body w3-display-container">
           <div class="w3-center">
               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
           </div>

           <div class="w3-margin w3-padding-16">
               <form action="{{ route('adduser')}}" method="POST" name="adduse" onsubmit="return checkForm(this);">
                   @csrf
                   <p>
                       <label class="w3-text-teal">Name</label>
                       <input class="w3-input" type="text" name="name" id="name">

                       <div class="alert alert-danger alert-dismissible" style="display: none" id="name1">

                        <strong id="mess1"></strong>
                      </div>
                   </p>

                   <p>
                       <label class="w3-text-teal">Email</label>
                       <input class="w3-input" type="email" name="email">

                       <div class="alert alert-danger alert-dismissible" style="display: none" id="email">
                        <strong id="mess2"></strong>
                      </div>
                   </p>

                   <p>
                       <label class="w3-text-teal">Password</label>
                       <input class="w3-input" name="password" type="password">


                       <div class="alert alert-danger alert-dismissible" style="display: none" id="password">
                        <strong id="mess3"></strong>
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
           </div>

           </div>

       </div>



     </div>
    </div>
    </div>



    <script>
        function checkForm(form) // Submit button clicked
       {
        var names = document.forms["adduse"]["name"].value;
        var email = document.forms["adduse"]["email"].value;
        var password = document.forms["adduse"]["password"].value;
        // var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        // var passw= ;



        if (names == "") {
            document.getElementById("name1").style.display = 'block';
            document.getElementById('mess1').innerHTML = 'Name must be atleast 7 characters! Example: Firstname Last Name';
        return false;
    }

    if (email == "") {
            document.getElementById("email").style.display = 'block';
            document.getElementById('mess2').innerHTML = 'Required! Invalid Email';
        return false;
    }



    if (password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/)) {
        document.getElementById("password").style.display = 'block';
        document.getElementById('mess3').innerHTML = 'Password Correct';
        return true;

    }
    else{
        document.getElementById("password").style.display = 'block';
        document.getElementById('mess3').innerHTML = 'Password must have One Capital Letter <br> 1 Number <br>One Special Character <br>At least 8 characters! <br> Example F4rmer1#';
        return false;
    }

         form.submit1.disabled = true;
         form.submit1.value = "Please wait...";
         return true;
       }
     </script>
