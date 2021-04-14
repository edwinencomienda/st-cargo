@extends('layouts.newapp')

<style>
    .glts{
        padding-left: 3%;
        padding-right: 3%;
        background-color: #F0EAD6;

    }
    .stt{
        font-size: 35px;
        font-family: 'Nunito';
    }
    .slo{
        border-radius: 5px;
    }
    .w3-col{
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
</style>


@section('content')
@include('layouts.include.managhead')

<div class="w3-padding-64 w3-marin-32 w3-card-4 glts">




    <div class="w3-center" id="stick">
        <div class="container">
            <div class="w3-row">
                <div class="w3-half w3-container w3-brown w3-card w3-padding-32">
                    <img src="/backimage/lgu.png" class="mx-auto d-block" width="107" height="115" alt="">

                </div>
                <div class="w3-half w3-container w3-card-4 w3-white w3-padding-32">
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
                <div class="w3-half w3-container w3-brown w3-padding-16">
                    <br>
                    <img src="/backimage/lgu.png" class="mx-auto d-block" width="107" height="115" alt="" style="margin-bottom: 4px;">
    <br><br>
                </div>
                <div class="w3-half w3-container w3-white w3-padding-32 w3-card-4">
                  <br>
                  <div class="w3-panel w3-leftbar" >
                    <p class="w3-padding-8"> <strong>Email:</strong>  <strong class="w3-right"> {{$f->email}}</strong>
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





    <div class="w3-white w3-padding-16 w3-card-4 slo" style="padding-left:16px;padding-right:16px;">

        <div class="w3-marginLeft-8 w3-padding-32">
            <h2 class="stt" >CAGRO Farmer</h2>


                <div class="d-flex mb-3">
                    <div class="p-2" style="padding: 0, 0, 0, 0 !important">
                        <button type="button" class="btn w3-brown"
                        data-toggle="modal" data-target="#addfarmer" style="margin-left: 25px;z-index:2">
                            <i class="far fa-file-image"></i>
                            <i class="fas fa-plus" style="font-size: 27px;margin-right:-5px;"></i>Add
                        </button>
                        @include('layouts.include.addfarmer')
                    </div>

                    <div class="p-2 flex-fill">
                        <form action="{{ route('web.find') }}" method="GET">
                            @csrf
                    <div class="input-group mb-3 input-group-lg" style="width: 55%;">
                        <input type="text" class="w3-input w3-border w3-padding-16 form-control" name="query" style="height:55px !important;"
                        placeholder="Search the Nickname Or Email here....." value="{{ request()->input('query') }}">
                        <span class="text-danger">@error('query'){{ $message }} @enderror</span>

                        {{-- <input class="w3-input w3-border w3-padding-16 form-control"
                        type="text" id="myInput" name="q" placeholder="Search for names.."
                         style="height:55px !important;"> --}}
                        <span class="input-group-text w3-brown">
                            <button type="submit" class="btn w3-white" title="Search">
                                <i class="fas fa-search-plus"></i>
                               Search
                            </button>
                        </span>
                      </div>
                    </form>
                    </div>

                  </div>
                  {{-- end flex --}}

                  @if(isset($countries))
                  <div class="table-responsive" id="demo_info">
                    <table class="table table-bordered w3-padding-32 w3-card-4" id="datable">
                      <thead>
                        <tr class="w3-brown">
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
                @if(count($countries) > 0)
                @foreach ($countries as $f)
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
                                data-toggle="modal" title="Edit" style="margin-bottom: 3px; float:right;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#farmdel{{$f->id}}" type="button" class="btn btn-outline-danger"
                                data-toggle="modal" title="Delete" style="float: right;">
                                <i class="fas fa-eraser"></i>
                            </a>

                            @include('layouts.include.farmcrud')
                        </td>
                    </tr>
                @endforeach
                @else

                       <tr><td colspan="8">No result found!</td></tr>
                    @endif
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $countries->links('pagination::bootstrap-4') !!}
                    </div>
                </div>



                @else


<div class="table-responsive" id="demo_info">
    <table class="table table-bordered w3-padding-32 w3-card-4" id="datable">
      <thead>
        <tr class="w3-brown">
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

<?php $ftps = DB::table('users')->where('role', 6)->latest()->paginate(5);
foreach ($ftps as $f) { ?>
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
                data-toggle="modal" title="Edit" style="margin-bottom: 3px; float:right;">
                <i class="fas fa-edit"></i>
            </a>
            <a href="#farmdel{{$f->id}}" type="button" class="btn btn-outline-danger"
                data-toggle="modal" title="Delete" style="float: right;">
                <i class="fas fa-eraser"></i>
            </a>

            @include('layouts.include.farmcrud')
        </td>
    </tr>
    <?php }?>


    </table>


    <div class="d-flex justify-content-center">
        {!! $ftps->links('pagination::bootstrap-4') !!}
    </div>

    @endif
</div>
 </div>


 </div>






 @endsection
