<div class="w3-center w3-padding-64">
    <img src="/backimage/lgu.png" height="115" width="115" alt="">
</div>
<button type="button" class="btn btn-lg btn-block w3-teal w3-padding-16" data-toggle="modal" data-target="#myModal">
    <i class="fas fa-bullhorn" style="font-size: 17px;"></i>
    <i class="fas fa-plus" style="font-size: 17px;"></i>Add
  </button>
   @include('farmers.add')

   <br><br>


<div class="w3-hover-sand w3-light-grey">
    <a href="{{ route('farm.support') }}"
     class="w3-btn w3-block w3-left-align w3-padding-16 {{ (request()->routeIs('farm.support')) ? 'w3-white' : '' }}" style="font-size: 24px;">
     <i class="fas fa-paper-plane"></i>&nbsp; Received Answer
     </a>
 </div>


<div class="w3-hover-sand">
   <a href="{{ route('farm.thread') }}"
    class="w3-btn w3-block w3-left-align w3-padding-16 {{ (request()->routeIs('farm.thread')) ? 'w3-white' : '' }}" style="font-size: 24px;">
    <i class="fas fa-inbox"></i>
         &nbsp;Sent Thread
    </a>
</div>





 <div class="w3-hover-sand">
    <a href="{{ route('deldetails') }}"
     class="w3-btn w3-block w3-left-align w3-padding-16 {{ (request()->routeIs('deldetails')) ? 'w3-white' : '' }}" style="font-size: 24px;">
     <i class="fas fa-trash-restore"></i> &nbsp; Delete Details
     </a>
 </div>
