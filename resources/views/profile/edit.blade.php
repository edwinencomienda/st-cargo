
<div class="modal fade" id="editimage{{$p->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-card-4 w3-padding-64">
@php
      $a = $p->id;
                $users = DB::table('profpicture')->where('id', $a)->get();
                foreach ($users as $users) {
                }
@endphp


        <!-- Modal body -->
        <div class="modal-body">

            <div class="w3-center">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
            </div>

            <div class="w3-margin w3-padding-16">
                <form action="{{url('/editimage/'.$users->id)}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <p>

                        <input class="w3-input" type="text" value="{{Auth::user()->uuid}}" name="uuid" hidden>
                    </p>

                    <div class="w3-center">
                        <img src="{{URL::to($users->profpic)}}" width="145" height="145" alt="">
                        <input type="hidden" value="{{$users->profpic}}" name="oldlogo" id="">
                    </div>
                    <label class="w3-text-teal w3-left">Upload Image</label>
                    <input class="w3-input" type="file" name="files" required>



            </div>

        </div>
        <div class="w3-bar w3-card-4">
            <button type="submit" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                <i class="fas fa-paper-plane"></i> Submit
            </button>
            <button class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                <i class="fas fa-times-circle"></i> Cancel
            </button>
    </form>
</div>

        <!-- Modal footer -->


      </div>
    </div>
  </div>

{{-- end --}}



  {{-- for delete --}}
<!-- The Modal -->
<div class="modal" id="deleteimage{{$p->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">
            @php
            $a = $p->id;
               $picture = DB::table('profpicture')->where('id', $a)->get();
               foreach ($picture as $picture) {
               }

           @endphp
            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h2 class="h4-del w3-center">Do you Really want to Delete this? <br></h2>
               <img src="{{URL::to($picture->profpic)}}" width="145" height="145" alt="">
            </div>



        </div>

        <div class="w3-bar w3-card-4">
            <a href="{{ URL::to('/deleteimage/'.$picture->id) }}" type="button" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                <i class="fas fa-trash"></i> Delete
            </a>
            <button class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                <i class="fas fa-times-circle"></i> Cancel
            </button>
        </div>

      </div>
    </div>
  </div>

