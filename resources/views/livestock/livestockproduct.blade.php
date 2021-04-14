
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="{{ asset('fontawesome/js/brand.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome/js/solid.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome/js/fontawesome.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">


    <!-- Fontawesome5 -->

    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href=" {{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/brand.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        body{
            background-color: #9c917d;
            font-family: 'Nunito';
        }
        a{
            text-decoration: none !important;
            font-family: 'Nunito' !important;

        }

        a::hover{
            text-decoration: none !important;
            font-family: 'Nunito' !important;
        }
        .w3-nav1{
            padding-right: 22px;
            padding-left: 22px;
        }
        input {

            height: 44px !important;
            padding: 5px 5% !important;

            }
            input:focus, input.form-control:focus {
            outline:none !important;
            outline-width: 0 !important;
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            }
            .modal-content{
                padding-left: 34px;
                padding-right: 34px;
            }
            .w3-btn{
                font-family: 'Nunito' !important;
            }
        .header-side{
            height: 43px;
            background-color: #bfb4ac !important;
        }

        .profimage{
            border-radius: 100%;
            padding: 4px 4px 4px 4px;
            margin-left: 15% !important;
            margin-right: 15% !important;
            width: auto;
            height: auto;
        }
        h3{
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
            font-size: 22px !important;
            font-family: 'Nunito' !important;
        }
        h4{
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
            font-size: 12px !important;
            font-family: 'Nunito' !important;
        }
        label{
            text-align: left !important;
            font-family: 'Nunito' !important;
            color: #b1b1;
        }
        .elf-t{
            font-family: 'Nunito' !important;
            padding-left: 15px;
        }

  .hlt, .trs{
        background-color: #a67b5b !important;
    }

    .hlt{
        /* padding-top: 15% !important; */

    }
    .h3{
        font-family: 'Nunito' !important;
    }
    input[type=text]{
    height:55px !important;
}
td{
    color: black !important;
}
.rt{
    padding-right: 35px;
    padding-left: 35px;

}
    </style>
</head>
<body>
    @include('layouts.sidebar')



      {{-- sa main na ni --}}
      <div id="main">
        @include('layouts.nav')
      </div>

        <div class="w3-card">
            @include('consult.head')
        </div>


        <main class="py-4">



<div class="w3-card-4 w3-padding-64 trs">
    <div class="stt">





<div class="container-fluid  hlt">

<div class="w3-container w3-padding-64 w3-white w3-card-4">
<div class="w3-padding-16">

    <h1>
       Livestock Products
    </h1>
<br>




    <button class="btn  btn-block w3-brown w3-padding-16" data-toggle="modal" data-target="#tractorservice">
        <i class="far fa-plus-square"></i> Add Inventory
    </button>
    <br><br>

<div class="modal fade" id="tractorservice">
    <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content w3-padding-32">

       <!-- Modal body -->
       <div class="modal-body w3-display-container">
           <div class="w3-center">
               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
           </div>

           <div class="w3-margin w3-padding-16">
               <form action="{{ route('animpro.add')}}" method="POST"  onsubmit="checkForm(this);">
                   @csrf

                   <p>
                    <label class="w3-text-teal">Livestock Program</label>
                    <select class="w3-select" name="crop_program" required id="tract">
                    <option value="" disabled selected>Livestock Program</option>
                        <?php

                           $users = DB::table('animalservice')->get();
                           foreach ($users as $users) { ?>
                           <option value="{{$users->id}}" id="lk">{{$users->description}}</option>
                    <?php } ?>
                      </select>
                   </p>

                   <p>
                       <label class="w3-text-teal">Fish Product</label>
                       <input class="w3-input" type="text" name="products" required>
                   </p>


<input type="hidden" name="uuid" value="{{Auth::user()->uuid}}" id="">
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
    <script>
    function checkForm(form)
    {
      form.submit1.disabled = true;
      form.submit1.value = "Please wait...";
      return true;
    }
  </script>









  <div class="table-responsive">
    <table class="table table-bordered w3-card-4 display" id="inventory">
      <thead>
        <tr class="w3-brown">
          <th>ID</th>
          <th>Crop Program</th>
          <th>Product Name</th>

          <th>Created At</th>
          <th class="text-right">Action</th>


        </tr>
      </thead>
      <tbody>
          @foreach ($lives as $inv)


        <tr>
          <td>{{$inv->id}}</td>

          <td>{{$inv->animal_program}}-
          @php
              $sss = DB::table('animalservice')->where('id', $inv->animal_program)->get();
              foreach ($sss as $key => $s) {
                  echo $s->description;
              }
          @endphp
             </td>

          <td>{{$inv->products}}</td>


          <td>
            @php
            $date  = \Carbon\Carbon::parse($inv->created_at);
            echo $date->toDayDateTimeString();
            @endphp

          </td>

          <td class="text-right">
            <a href="#trsedit{{$inv->id}}" type="button" class="btn btn-outline-warning"
                data-toggle="modal" title="Edit">
                <i class="fas fa-edit"></i>

            </a>

            <a href="{{ URL::to('/livestockdeletethis/'.$inv->id) }}"
                onclick="return confirm('Do you really want to delete this Livestock products?')" type="button" class="btn btn-outline-danger"
 title="Delete">
                <i class="fas fa-eraser"></i>
            </a>

            <div class="w3-left">

                <div class="modal fade" id="trsedit{{$inv->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                     <div class="modal-content w3-padding-32">

                       <!-- Modal body -->
                       <div class="modal-body w3-display-container">
                           <div class="w3-center">
                               <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
                           </div>

                           @php
                           $a = $inv->id;
                              $users = DB::table('animalproduct')->where('id', $a)->get();
                              foreach ($users as $u) {

                              }

                          @endphp
                           <div class="w3-margin w3-padding-16">
                               <form action="{{ url('/productsupdatelive/add/'.$u->id)}}" method="POST"  onsubmit="checkFormsa(this);">
                                   @csrf

                                   <p>
                                    <label class="w3-text-teal w3-left">Livestock Program</label>
                                    <select class="w3-select" name="crop_program" required id="tract">
                                        <option value="{{$u->animal_program}}" selected>
                                            <?php
                                               $users = DB::table('animalservice')->where('id', $u->animal_program)->get();
                                               foreach ($users as $use) {
                                                   echo $use->description;
                                               }
                                            ?>
                                            </option>
                                    {{-- <option value="" disabled selected>Fishery Program</option> --}}
                                        <?php

                                           $users = DB::table('animalservice')->get();
                                           foreach ($users as $users) { ?>
                                           <option value="{{$users->id}}" id="lk">{{$users->description}}</option>
                                    <?php } ?>
                                      </select>
                                   </p>

                                   <p>
                                       <label class="w3-text-teal w3-left">Fish Product</label>
                                       <input class="w3-input" type="text" value="{{$u->products}}" name="products" required>
                                   </p>


                <input type="hidden" name="uuid" value="{{Auth::user()->uuid}}" id="">
                     <br>
                           <div class="d-flex justify-content-center mb-3">
                            <div class="p-2"  style="width:50%">
                                <button type="submit" class="w3-button w3-teal" name="submit1" style="width:100%">
                                    <i class="fas fa-paper-plane"></i> Submit
                                </button>
                            </div>

                            <div class="p-2"  style="width:50%">
                                <button class=" w3-button w3-red" data-dismiss="modal" style="width:100%">
                                    <i class="fas fa-times-circle"></i> Cancel
                                </button>
                            </div>
                          </div>
                        </form>


                           </div>

                       </div>



                     </div>
                    </div>
                    </div>
                    <script>
                    function checkFormsa(form)
                    {
                      form.submit1.disabled = true;
                      form.submit1.value = "Please wait...";
                      return true;
                    }
                  </script>


                {{-- @include('crops.include.cropproduct') --}}
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

        </main>




    <footer  class="w3-bar w3-light-grey w3-border w3-card" style="margin-bottom: -3%">
       @include('footer')
    </footer>
    </div>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> --}}
<script>
 $(document).ready( function () {
    $.noConflict();
    var table = $('#inventory').DataTable();
    // $('#inventory').DataTable();
} );
</script>
</html>


<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-card-4">
        <div class="modal-header" style="border: none !important">
            <button type="button" class=" w3-card close w3-teal btn btn-success" data-dismiss="modal"
            style="margin-right:-12% !important">
            &times;
            </button>
          </div>
      <!-- Modal body -->
        <div class="modal-body w3-display-container">
            <div class="w3-center">
                <img src="/backimage/lgu.png" class="mx-auto d-block" width="89px" height="89px" alt="">

                <form action="{{ route('profpic')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <br><br>

                        <input class="w3-input" value="{{ Auth::user()->uuid }}" name="uuid" type="text" readonly hidden>
                        <br>

                    <label class="w3-left w3-text-teal">Select Image</label>
                    <input class="w3-input" type="file" name="files" required>
            </div>
            <div class="modal-footer" style="border: none !important">
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
