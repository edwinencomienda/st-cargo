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
                <img src="/backimage/harrow.jpg" class="w3-sepia-min" width="100%" height="100%" alt="">
             </div>
          </div>

<div class="w3-container w3-cell w3-mobile hlt">
<div class="w3-container w3-padding-64 w3-white w3-card-4">
<div class="w3-left w3-padding-16">
    <h3>
        CAGRO Tractor Service
    </h3>
    <button class="btn btn-outline-primary w3-margin" data-toggle="modal" data-target="#tractorservice">
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
               <form action="{{ route('trsadd')}}" method="POST">
                   @csrf
                   <p>
                       <label class="w3-text-teal">Tractor Service</label>
                       <input class="w3-input" type="text" name="service" required>
                   </p>

                   <p>
                       <label class="w3-text-teal">Price</label>
                       <input class="w3-input" type="number" name="price" required>
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









  <div class="table-responsive">
    <table class="table table-bordered w3-card-4">
      <thead>
        <tr class="w3-brown">
          <th>ID</th>
          <th>Service Description</th>
          <th>Price</th>
          <th>Created At</th>
          <th class="text-right">Action</th>


        </tr>
      </thead>
      <tbody>
          @foreach ($trservice as $trs)


        <tr>
          <td>{{$trs->id}}</td>
          <td>{{$trs->service}}</td>
          <td>{{$trs->price}}</td>
          <td>{{$trs->created_at}}</td>
          <td class="text-right">
            <a href="#trsedit{{$trs->id}}" type="button" class="btn btn-outline-warning"
                data-toggle="modal" title="Edit">
                <i class="fas fa-edit"></i>
            </a>
            <a href="#trsdel{{$trs->id}}" type="button" class="btn btn-outline-danger"
                data-toggle="modal" title="Delete">
                <i class="fas fa-eraser"></i>
            </a>
             @include('applied.include.trsedit')

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
