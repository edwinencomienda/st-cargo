@extends('layouts.newapp')

<style>
    .pmc{
        background-color: #F0EAD6;
    }
    .h2-2{
        font-family: 'Nunito' !important;
        font-size: 55px;
    }
    .btn{
        border: none !important;
    }
    table{
        padding-left:15px !important;
        padding-right: 15px !important;
    }
    .https{
        padding-left: 33px;
    }
    li{
        font-family: 'Nunito' !important;
        font-size: 15px !important;
    }
    .vtl{
        margin-top:-2%;
        padding-right: 64px !important;
        padding-left: 64px !important;
    }
    input[type=text]{
        height:55px !important;
    }
</style>

@section('content')




@include('layouts.include.managhead')
<div class="container-fluid w3-card-4 pmc w3-padding-64">


    {{-- for table --}}
    <div class="container-fluid w3-padding-32">

   @if(Session::has('success'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(Session::has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{Session::get('danger')}}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
    </div>
     @endif


        <div id="London" class="w3-container city">
            <div class="container w3-padding-16">

                <div>
                    <div class="w3-card w3-center" id="pix">

                          <div class="w3-row">
                            <div class="w3-half w3-container w3-padding-16 w3-white">
                                <div class="w3-card w3-padding-16" style="width:50%;margin-left:14%;">
                                    <img src="/backimage/lgu.png" alt="Person" style="width:40%">
                                    <div class="w3-container">
                                      <h4><b>Click the Id</b></h4>
                                      <p>Please Click the ID Below.</p>
                                    </div>
                                  </div>
                            </div>
                            <div class="w3-half w3-container w3-padding-64 w3-brown">
                                <div class="w3-panel w3-leftbar w3-sand w3-padding-32 w3-large">
                                    <p><i>"Please Click the ID Number Below!"</i></p>
                                  </div>
                            </div>
                          </div>

                    </div>
                </div>

                    @foreach ($users as $pro)

                        <div class="picture w3-animate-zoom w3-card-4" style="display: none" id="{{$pro->id}}">
                            <div class="w3-row w3-brown">
                                <div class="w3-half w3-container w3-padding-16 w3-white">
                                    <div class="w3-card-4 w3-display-container" style="width:80%;margin-left:14%;">
                                       <?php

                                            $uid = $pro->uuid;
                                            $db = new mysqli("localhost", "root", "", "cagropanabo");
                                            $query = $db->query("SELECT id, SUBSTRING(profpic,13) as pic FROM profpicture where uuid = '$uid'
                                             order by id DESC LIMIT 1");

                                            if($query->num_rows > 0){
                                            while($row = $query->fetch_assoc()){
                                            $imageURL = '/public/media'.$row["pic"];
                                            $id = $row["id"];
                                            ?>
                                            <img src="<?php echo $imageURL; ?>" class="img-responsive"
                                            width="100%" height="50%" alt="">
                                            <div class="w3-bar w3-padding-16 w3-center w3-display-bottomright w3-white w3-card-4"
                                            style="width: 28%;">
                                                <a href="#editimage<?php echo $id; ?>" type="button" class="btn btn-outline-warning"
                                                    data-toggle="modal" title="Edit">
                                                    <i class="fas fa-edit" style="font-size: 16px;"></i>
                                                </a>
                                                <a href="#deleteimage<?php echo $id; ?>" type="button" class="btn btn-outline-danger"
                                                    data-toggle="modal" title="Delete">
                                                    <i class="fas fa-eraser" style="font-size: 16px;"></i>
                                                </a>
                                                @include('applied.include.editimage')
                                              </div>
                                            <?php
                                        }
                                        }
                                        else{ ?>

                                        <div class="w3-padding-64">
                                        <img src="/backimage/lgu.png" alt="Person" style="width:40%;margin-left:30%;">
                                        <div class="w3-container w3-center">
                                            <a href="#addimage{{$pro->id}}" type="button" class="btn btn-outline-primary" data-toggle="modal">
                                                <i class="fas fa-plus"></i> Add Image

                                            </a>



                                            @include('layouts.include.addimage')
                                        </div>
                                        </div>



                                        <?php
                                    }
                                    ?>

                                      </div>


                                </div>
                                <div class="w3-half w3-container w3-padding-8">
                                    <div style="padding-top:4px;">
                                        <?php
                                        $a = $pro->uuid;
                                        $employee = DB::table('employeeprofile')->where('uuid', $pro->uuid)->get();
                                        if ($employee->count()>0) {

                                            foreach ($employee as $employee) { ?>
<ul class="list-group w3-white w3-card-4">
    <div class="w3-center w3-padding-32">
        <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
    </div>
    <li class="list-group-item d-flex justify-content-between align-items-center w3-text-brown">
      Name
      <span class="">{{$employee->lname}}, {{$employee->fname}} {{$employee->mname}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center w3-text-brown">
        Birthdate
        <span class="">{{$employee->birth_date}}</span>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center w3-text-brown">
        Bachelor's Degree
        <span class="">{{$employee->undergrad}}</span>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center w3-text-brown">
        Master's Degree
        <span class="">{{$employee->graduate}}</span>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center w3-text-brown">
        Doctoral Degree
        <span class="">{{$employee->postgrad}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center w3-text-brown">
        Actions:
        <span class="">
            <a href="#editprof{{$employee->id}}" type="button" class="btn btn-outline-warning"
                data-toggle="modal" title="Edit">
                <i class="fas fa-edit" style="font-size: 13px;"></i>
            </a>
            <a href="#deleteprof{{$employee->id}}" type="button" class="btn btn-outline-danger"
                data-toggle="modal" title="Delete">
                <i class="fas fa-eraser" style="font-size: 13px;"></i>
            </a>
            @include('layouts.include.newprof')
        </span>

    </li>
  </ul>
                                     <?php   }
                                        }
                                        else { ?>
<br><br><br><br>
<div class="d-flex justify-content-center mb-3">

    <div class="p-2 w3-padding-64 card w3-center">

        <a href="#addprofile{{$pro->id}}" type="button" class="btn btn-outline-primary" data-toggle="modal">
            <i class="fas fa-plus"></i> Add Profile
        </a>
        <i class='far fa-address-book' style='font-size:48px;color:red'></i>
    </div>

  </div>
                                      <?php  }

                                        ?>
                                    </div>

                                      @include('layouts.include.profile')
                                </div>
                              </div>

                        </div>
                    @endforeach
                </div>
<div class="w3-white w3-padding-32 vtl">

            <h2>CAGRO Employee</h2>

                <div class="input-group mb-3 input-group-lg" style="width: 55%;">
                    <div class="input-group-prepend">
                      <span class="input-group-text w3-brown">
                        <button class="btn w3-white" data-toggle="modal" data-target="#adduser">
                            <i class="fas fa-user-plus"></i>Add User
                        </button>
                        <div class="text-left">@include('layouts.include.adduse')</div>

                      </span>
                    </div>
                    <input type="text" class="form-control w3-border" id="myInput" placeholder="Search Here......">
                  </div>



            <div class="table-responsive w3-padding-32">
                <table class="table table-bordered w3-padding-32 w3-card-4">
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
                <tbody id="myTable">
            @foreach ($users as $pro)

                <tr>
                    <td>
                    <a href="javascript:void(0)"
                     class="w3-bar-item w3-button w3-border-bottom test w3-hover-sepia"
                     id="{{ $pro->id }}" onclick="openImg('{{ $pro->id }}');">
                     {{ $pro->id }}
                    </a>

<script>
    function openImg(imgName) {
var is, xx;
xx = document.getElementsByClassName("picture");
document.getElementById('pix').style.display = "none";
for (is = 0; is < xx.length; is++) {
xx[is].style.display = "none";
}
document.getElementById(imgName).style.display = "block";
}
</script>
                    </td>
                    <td id="">{{ $pro->name }}</td>
                    <td id="">{{ $pro->uuid }}</td>
                    <td id="">{{ $pro->email }}</td>
                    <td id="">{{ $pro->password }}</td>
                    <td id="">
                                @php
                                 if ($pro->role == 1) {
                                     echo 'Applied Sector Admin';
                                 }
                                 if ($pro->role == 2) {
                                     echo 'Crops Sector Admin';
                                 }
                                 if ($pro->role == 3) {
                                     echo 'Fishery Sector Admin';
                                 }
                                 if ($pro->role == 4) {
                                     echo 'Livestock Sector Admin';
                                 }
                                 if ($pro->role == 5) {
                                     echo 'Research Sector Admin';
                                 }
                                 if ($pro->role == 6) {
                                     echo 'Farmers';
                                 }
                                @endphp</td>
                    <td id="">{{ $pro->created_at }}</td>
                    {{-- <td id="">{{ $pro->updated_at }}</td> --}}
                    <td id="">
                        <a href="#edituser{{$pro->id}}" type="button" class="btn btn-outline-warning"
                            data-toggle="modal" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#deleteuser{{$pro->id}}" type="button" class="btn btn-outline-danger"
                            data-toggle="modal" title="Delete">
                            <i class="fas fa-eraser"></i>
                        </a>

                        @include('layouts.include.adduser')
                    </td>
                </tr>
            @endforeach
        </tbody>
                </table>
                <script src="{{ asset('js/app.js') }}" defer></script>
                <script>
                    $(document).ready(function(){
                      $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                    </script>
            </div>

          </div>
        </div>

</div>

@endsection
{{--
<script>
    function openCity(evt, cityName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("city");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " w3-red";
    }


    </script>
 --}}
