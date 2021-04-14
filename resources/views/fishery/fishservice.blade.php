@extends('layouts.newapp')

<style>
   .hlt, .trs{
        background-color: #a67b5b !important;
    }
    .stt{
        margin-left: 5% !important;
    }
    .hlt{
        padding-top: 15% !important;

    }
    .h3{
        font-family: 'Nunito' !important;
    }
</style>
@section('content')


<div class="w3-card-4 w3-padding-64 trs">
    <div class="stt">
        <div class="w3-container w3-brown w3-padding-64 w3-cell w3-mobile">
            <div class="container">
                <img src="/backimage/panabo2.jpg" class="w3-sepia-min" width="100%" height="777" alt="">
             </div>
          </div>

<div class="w3-container w3-cell w3-mobile hlt">
<div class="w3-container w3-padding-64 w3-white w3-card-4">
<div class="w3-left w3-padding-16">
    <h3>
       CAGRO Crop Sector Programs
    </h3>
    <button class="btn w3-brown btn-block w3-margin" style="width: 100%" data-toggle="modal" data-target="#tractorservice">
        <i class="far fa-plus-square"></i> Add Service
    </button>

</div>

<div class="modal fade" id="tractorservice">
    <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content w3-padding-32">

       <!-- Modal body -->
       <div class="modal-body w3-display-container">
           <div class="w3-center">
               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
           </div>

           <div class="w3-margin w3-padding-16">
               <form action="{{ route('fishserve.store')}}" method="POST" onsubmit="checkForm(this);">
                   @csrf
                   <p>
                       <label class="w3-text-teal">Fishery Program</label>
                       <input class="w3-input" type="text" name="service" required>
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

                function checkForm(form)
                  {
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










  <div class="table-responsive">
    <table class="table table-bordered w3-card-4">
      <thead>
        <tr class="w3-brown">
          <th>ID</th>
          <th>Service Description</th>

          <th>Created At</th>
          <th class="text-right">Action</th>


        </tr>
      </thead>
      <tbody>
          @foreach ($fishserve as $trs)


        <tr>
          <td>{{$trs->id}}</td>
          <td>{{$trs->description}}</td>

          <td>{{$trs->created_at}}</td>
          <td class="text-right">
            <a href="#trsedit{{$trs->id}}" type="button" class="btn btn-outline-warning"
                data-toggle="modal" title="Edit">
                <i class="fas fa-edit"></i>
            </a>
            <a href="{{ URL::to('/deletefisheryservices/'.$trs->id) }}" type="button"
                class="btn btn-outline-danger" onclick="return confirm('Do you really want to delete this Fishery Service Program?')"
                title="Delete">
                <i class="fas fa-eraser"></i>
            </a>

<div class="modal fade" id="trsedit{{$trs->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content w3-padding-32">




       <!-- Modal body -->
       <div class="modal-body w3-display-container">
        @php
        $a = $trs->id;
           $users = DB::table('fishservice')->where('id', $a)->get();
           foreach ($users as $u) {

           }

       @endphp
           <div class="w3-center">
               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
           </div>

           <div class="w3-margin w3-padding-16">
               <form action="{{url('/fishserviceedit/'.$u->id)}}" method="POST" onsubmit="checkFormz(this);">
                   @csrf
                   <p>

                       <label class="w3-text-teal w3-left">Fishery Program</label>
                       <br>
                       <input class="w3-input" type="text" name="service" value="{{$u->description}}" required>
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

                function checkFormz(form)
                  {
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

          </td>


        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

              </div>
          </div>
    </div>


</div>
@endsection
