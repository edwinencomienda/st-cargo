<style>
    .h4-del{
        font-family: 'Nunito' !important;
        font-size:22px !important;
    }
</style>

 <div class="modal" id="addprofile{{$pro->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content w3-padding-32">

        <!-- Modal body -->
        <div class="modal-body w3-display-container">
            <div class="w3-center">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
            </div>

            @php
             $a = $pro->id;
                $users = DB::table('users')->where('id', $a)->get();
                foreach ($users as $users) {
                }

            @endphp
            <div class="w3-margin w3-padding-16">
                <form action="{{route('empadd')}}" method="POST">
                    @csrf
                    <input class="w3-input" type="hidden"
                    value="{{$users->uuid}}" name="uuid" required>
                    <p>
                        <label class="w3-text-teal">First Name</label>
                        <input class="w3-input" type="text"
                         name="fname" required>
                    </p>

                    <p>
                        <label class="w3-text-teal">Middle Name</label>
                        <input class="w3-input" type="text"
                        name="mname" required>
                    </p>

                    <p>
                        <label class="w3-text-teal">Last Name</label>
                        <input class="w3-input" type="text"
                         name="lname" required>
                    </p>

                    <p>
                        <label class="w3-text-teal">Birthdate</label>
                        <input class="w3-input" type="date"
                         name="birth_date" required>
                    </p>

                    <p>
                        <label class="w3-text-teal">Undergraduate Program</label>
                        <input class="w3-input" name="undergrad" type="text" required>
                    </p>
                    <p>
                        <label class="w3-text-teal">Masteral Program</label>
                        <input class="w3-input" name="graduate" type="text" required>
                    </p>
                    <p>
                        <label class="w3-text-teal">Doctoral Program</label>
                        <input class="w3-input" name="postgrad" type="text" required>
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

{{-- end --}}
