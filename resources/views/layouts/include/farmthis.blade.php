<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src=" https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<style>
    strong{
        font-family: 'Nunito' !important;
    }
</style>

<div class="w3-center" id="stick">
    <div class="container">
        <div class="w3-row">
            <div class="w3-half w3-container w3-brown w3-card w3-padding-32">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="107" height="115" alt="">

            </div>
            <div class="w3-half w3-container w3-card-4 w3-padding-32">
                <div class="w3-panel w3-leftbar w3-sand w3-padding-16">

                    <p><i style="font-size: 24px">"Please Click the ID number."</i></p>
                  </div>
            </div>
          </div>

    </div>
</div>
@php
$farmer = DB::table('users')->where('role', 6)->get();

@endphp
@foreach ($farmer as $f)
<div class="press w3-animate-zoom" style="display: none" id="ff{{$f->id}}">
    <div class="container">
        <div class="w3-row">
            <div class="w3-half w3-container w3-brown w3-padding-32">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="107" height="115" alt="">

            </div>
            <div class="w3-half w3-container w3-card-4">
              <br>
              <div class="w3-panel w3-leftbar w3-sand w3-padding-16">
                <p> <strong>Email:</strong>  <strong class="w3-right"> {{$f->email}}</strong>
                <br><strong>Session Id:</strong>  <strong class="w3-right"> {{$f->uuid}}</strong>
                <br> <a href="{{ URL::to('/rsbsa/'.$f->id) }}" type="button" class="btn btn-outline-success w3-margin-16"
                 title="RSBSA Profile">
                    <i class="fas fa-user-tie" style="font-size: 22px"></i> See RSBSA Profile
                </a>
                </p>
              </div>
            </div>
          </div>

    </div>

</div>
@endforeach




<div class="table-responsive w3-padding-32" id="demo_info">
    <table class="table table-bordered w3-padding-32 w3-card-4" id="datable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Session Id</th>
          <th>Email</th>
          <th>Password</th>
          <th>Role</th>
          <th>Created</th>
          {{-- <th>Updated</th> --}}
          <th>Actions</th>
        </tr>
    </thead>
    @php
         $farmer = DB::table('users')->where('role', 6)->get();
    @endphp
@foreach ($farmer as $f)
    <tr>
        <td>
        <a href="javascript:void(0)"
         class="w3-bar-item w3-button w3-border-bottom test w3-hover-sepia"
         id="ff{{$f->id}}" onclick="news('ff{{$f->id}}');">
         {{ $f->id }}
        </a>

<script>
function news(ltsName) {
var is, xx;
xx = document.getElementsByClassName("press");
document.getElementById('stick').style.display = "none";
for (is = 0; is < xx.length; is++) {
xx[is].style.display = "none";
}
document.getElementById(ltsName).style.display = "block";
}
</script>
        </td>
        <td id="">{{ $f->name }}</td>
        <td id="">{{ $f->uuid }}</td>
        <td id="">{{ $f->email }}</td>
        <td id="">{{ $f->password }}</td>
        <td id="">
                    @php
                     if ($f->role == 1) {
                         echo 'Applied Sector Admin';
                     }
                     if ($f->role == 2) {
                         echo 'Crops Sector Admin';
                     }
                     if ($f->role == 3) {
                         echo 'Fishery Sector Admin';
                     }
                     if ($f->role == 4) {
                         echo 'Livestock Sector Admin';
                     }
                     if ($f->role == 5) {
                         echo 'Research Sector Admin';
                     }
                     if ($f->role == 6) {
                         echo 'Farmers';
                     }
                    @endphp
        </td>
        <td id="">{{ $f->created_at }}</td>
        {{-- <td id="">{{ $pro->updated_at }}</td> --}}
        <td id="">
            <a href="#farmcrud{{$f->id}}" type="button" class="btn btn-outline-warning"
                data-toggle="modal" title="Edit">
                <i class="fas fa-edit"></i>
            </a>
            <a href="#farmdel{{$f->id}}" type="button" class="btn btn-outline-danger"
                data-toggle="modal" title="Delete">
                <i class="fas fa-eraser"></i>
            </a>

            @include('layouts.include.farmcrud')
        </td>
    </tr>
@endforeach

    </table>

</div>
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src=" https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#datable').DataTable();
} );
</script>
