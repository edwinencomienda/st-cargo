<style>
    .h4-del{
        font-family: 'Nunito' !important;
        font-size:22px !important;
    }
</style>
  {{-- diri --}}
  <div class="modal fade" id="addimage{{$pro->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-card-4 w3-padding-64">
@php
      $a = $pro->id;
                $users = DB::table('users')->where('id', $a)->get();
                foreach ($users as $use) {
                }
@endphp


        <!-- Modal body -->
        <div class="modal-body">

            <div class="w3-center">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
            </div>

            <div class="w3-margin w3-padding-16">
                <form action="{{route('imageadd')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <p>

                        <input class="w3-input" type="text" value="{{$use->uuid}}" name="uuid" >
                    </p>


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



