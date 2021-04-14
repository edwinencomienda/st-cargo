<div class="w3-center w3-padding-64">
    <img src="/backimage/lgu.png" height="115" width="115" alt="">
</div>
<button type="button" class="btn btn-lg btn-block w3-teal w3-padding-16" data-toggle="modal" data-target="#myModal">
    <i class="fas fa-bullhorn" style="font-size: 17px;"></i>
    <i class="fas fa-plus" style="font-size: 17px;"></i>Add
  </button>
   @include('consult.add')

   <br><br>
<div class="w3-hover-sand">
   <a href="{{ route('consult') }}"
    class="w3-btn w3-block w3-left-align w3-padding-16 {{ (request()->routeIs('consult')) || (request()->routeIs('convos')) ? 'w3-white' : '' }}" style="font-size: 24px;">
    <i class="fas fa-inbox"></i>
    <sup>
        <span class="w3-badge w3-red w3-padding-16 w3-card-4">
        @php
        $users = DB::table('consultation')->where('reading', 'Unread')->where('role', Auth::user()->role)->count();
        echo $users;
          @endphp
          </span>
        </sup>
         &nbsp;Inbox
    </a>
</div>



<div class="w3-hover-sand w3-light-grey">
    <a href="{{ route('reply') }}"
     class="w3-btn w3-block w3-left-align w3-padding-16 {{ (request()->routeIs('reply')) ? 'w3-white' : '' }}" style="font-size: 24px;">
     <i class="fas fa-paper-plane"></i>&nbsp; Sent Item
     </a>
 </div>


 {{-- <div class="w3-hover-sand">
    <a href="{{ route('deldetails') }}"
     class="w3-btn w3-block w3-left-align w3-padding-16 {{ (request()->routeIs('deldetails')) ? 'w3-white' : '' }}" style="font-size: 24px;">
     <i class="fas fa-trash-restore"></i> &nbsp; Delete Details
     </a>
 </div> --}}
