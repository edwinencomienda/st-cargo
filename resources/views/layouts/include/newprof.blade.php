

<div class="modal" id="editprof{{$employee->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content w3-padding-32">

        <!-- Modal body -->
        <div class="modal-body w3-display-container">
            <div class="w3-center">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
            </div>

            @php
             $a = $employee->id;
                $emp = DB::table('employeeprofile')->where('id', $a)->get();
                foreach ($emp as $emp) {
                }

            @endphp

            <div class="w3-margin w3-padding-16">
                <form action="{{url('/editprofile/'.$emp->id)}}" method="POST">
                    @csrf
                    <input class="w3-input" type="hidden"
                    value="{{$emp->uuid}}" name="uuid" required>
                    <p>
                        <label class="w3-text-teal">First Name</label>
                        <input class="w3-input" type="text"
                        value="{{$emp->fname}}" name="fname" required>
                    </p>

                    <p>
                        <label class="w3-text-teal">Middle Name</label>
                        <input class="w3-input" type="text"
                        name="mname" value="{{$emp->mname}}" required>
                    </p>

                    <p>
                        <label class="w3-text-teal">Last Name</label>
                        <input class="w3-input" type="text"
                         name="lname" value="{{$emp->lname}}" required>
                    </p>

                    <p>
                        <label class="w3-text-teal">Birthdate</label>
                        <input class="w3-input" type="date"
                         name="birth_date" value="{{$emp->birth_date}}" required>
                    </p>

                    <p>
                        <label class="w3-text-teal">Undergraduate Program</label>
                        <input class="w3-input" name="undergrad" value="{{$emp->undergrad}}" type="text" required>
                    </p>
                    <p>
                        <label class="w3-text-teal">Masteral Program</label>
                        <input class="w3-input" name="graduate" value="{{$emp->graduate}}" type="text" required>
                    </p>
                    <p>
                        <label class="w3-text-teal">Doctoral Program</label>
                        <input class="w3-input" name="postgrad" value="{{$emp->postgrad}}" type="text" required>
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
<div class="modal" id="deleteprof{{$employee->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">
            @php
            $la = $employee->id;
               $e = DB::table('employeeprofile')->where('id', $la)->get();
               foreach ($e as $e) {
               }

           @endphp

            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you Really want to Delete: <br></h4>
               <h4 class="h4-del">{{$e->fname}}, {{$e->mname}} {{$e->lname}}?</h4>
              </div>

            <div class="w3-bar w3-card-4">
                <a href="{{ URL::to('/deleteprofile/'.$e->id) }}" type="button" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
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

