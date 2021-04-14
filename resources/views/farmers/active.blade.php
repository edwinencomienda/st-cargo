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

</style>



@section('content')
<br><br>
<h2 style="padding-left: 25px">CAGRO Activity and Event</h2>
<br><br>

<div class="w3-row">
    <div class="w3-half w3-container" style="overflow: scroll !important;">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

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
            <ul class="list-group list">
                <?php $c=1;?>
                <?php
     $rd = DB::table('activity')->get();
    //  if(empty($rd)){
        foreach ($rd as $con){    ?>
              <li class="list-group-item w3-card-4 w3-light-grey" style="margin-bottom: 21px;">
                <div class="d-flex">
                    <div class="p-2  flex-fill"><?php echo $c;?>
                        <span class="title">{{$con->title}}</span></div>
                    <div class="p-2 flex-fill w3-right">
                        <span class="location" style="text-align: right">{{$con->location}} on {{$con->when}}</span>
                    </div>
                    <div class="p-2  flex-fill" style="float: right !important" >
                        <a  href="{{ URL::to('/activity/events/fulldetais/'.$con->id) }}"

                            class="w3-button w3-teal w3-right">
                            Go See it <i class="fas fa-eye"></i>
                        </a>
                    </div>
                  </div>
            </li>
            <?php $c++;?>
   <?php     } ?>

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

    <div class="w3-half w3-container w3-display-container">
      <?php
       $reply = DB::table('activity')->where('when', NOW())->get();
       if (!$reply->isEmpty()) {
        foreach ($reply as $re) { ?>
  <?php
  if ( substr($reply->visual,-3) == 'jpg'){ ?>
  <img class="w3-round w3-animate-fade" src="{{URL::to($reply->visual)}}"
  width="100%" height="auto">

<?php }
  if (substr($reply->visual,-3) == 'mp4') { ?>
  <video width="100%" height="100%" controls>
      <source src="{{URL::to($reply->visual)}}" type="video/mp4">
      </video>

      <p class="w3-padding-32 w3-display-bottomright w3-brown" style="padding-left: 15px; padding-right:15px;">
        {{$repy->title}} <br>
        {{!! $reply->content !!}} <br>

        <a  href="{{ URL::to('/activity/events/fulldetais/'.$reply->id) }}"

            class="w3-button w3-teal w3-right">
            Go See it <i class="fas fa-eye"></i>
        </a>

     </p>

<?php    }
?>
       <?php }
       }
       else { ?>
        <img src="/backimage/saging.jpg" class="w3-opacity-min" alt="">
        <p class="w3-padding-32 w3-display-bottomright w3-brown" style="padding-left: 15px; padding-right:15px;">No event is happening today. <br>
             See Event list for details.</p>
    <?php   }
        ?>
    </div>
  </div>






@endsection

