@extends('farmers.include.app')

<style>
    * {
  margin: 0;
  padding: 0;
}

body {
  background: #333;
}
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  /* margin: 0 4px; */
  font-size: 15px;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
.jlop{
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-right: 1px;
    width: 355px !important;
}

li{
    margin-left: 15%;
    margin-right:15%;
}

#list, li{
    display:inline;
}


</style>



@section('content')
<br><br>
<h2 style="padding-left: 25px">Tutorials</h2>
<br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<div class="w3-row">
    <div id="test-list">
        <div class="w3-row w3-section ">
            <div class="w3-col w3-brown w3-center w3-padding-8" style="width:50px;height:55px !important;
            padding-top:15px !important">
                <i class="fas fa-search" style="font-size: 22px;"></i></div>
              <div class="w3-rest w3-border w3-border-teal"
               style="width: 424px !important;height:55px !important; ">
                <input class="fuzzy-search w3-input w3-border" name="first" type="text" placeholder="Search Name Here"
                style="height:55px !important;">
              </div>
          </div>
<br><br>
<ul class="list-group list">
    <?php $c=1;?>
    <?php
 $rd = DB::table('tutorials')->get();

    foreach ($rd as $con){    ?>
        <li class="list-group-item" style="margin-bottom: 21px;">

            <div class="w3-row">
                <div class="w3-light-grey w3-container w3-twothird">
                    <div class="w3-padding-32">
                        <sup><?php echo $c;?></sup>
                        <h1 class="title w3-padding-64">{{$con->title}}</h1>
                        <div class="w3-padding-16" style="height: 234px !important; overflow:scroll">

                            <h3 class="w3-padding-32">{!! $con->content !!}</h3>
                        </div>
                        <br><br>

                    </div>
                </div>

                <div class="w3-container w3-third w3-padding-64">

                    <a  href="{{ URL::to('/tutorialfulldetails/'.$con->id) }}" type="button" class="w3-button w3-teal" >
                        Go See it <i class="fas fa-eye"></i>
                    </a>

                </div>

              </div>

        </li>
        <?php $c++;?>
        <?php } ?>

        </ul>
        <div class="d-flex justify-content-center mb-3">
            <div class="p-2">
                <ul class="pagination">
                </ul>
                </div>
            </div>
      </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script>
            var monkeyList = new List('test-list', {
            valueNames: ['name', 'title', 'location'],
            page: 3,
            pagination: true
            });
        </script>
</div>
</div>





  {{-- <a  href="{{ URL::to('/activity/events/fulldetais/'.$con->id) }}"

    class="w3-button w3-teal w3-right">
    Go See it <i class="fas fa-eye"></i>
</a> --}}



@endsection

