<style>
    .h4-del{
        font-family: 'Nunito' !important;
        font-size:22px !important;
    }
</style>

 <div class="modal" id="edituser{{$pro->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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
                <form action="{{url('/updateuser/'.$users->id)}}" method="POST">

                    @csrf

                    <p>
                        <label class="w3-text-teal">Username</label>
                        <input class="w3-input" type="text"
                        value="{{$users->name}}" name="name" required>
                    </p>

                    <p>
                        <label class="w3-text-teal">Email</label>
                        <input class="w3-input" type="email"
                        value="{{$users->email}}" name="email" required>
                    </p>

                    <p>
                        <label class="w3-text-teal">Password</label>
                        <input class="w3-input" name="password" type="password" required>
                    </p>

                    <p hidden>
                        <label class="w3-text-teal">Role</label>
                        <input class="w3-input" type="text" value="{{Auth::user()->role}}" name="role">
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
<div class="modal" id="deleteuser{{$pro->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">

            <div class="w3-center w3-padding-32">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
            </div>

            @php
            $a = $pro->id;
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

