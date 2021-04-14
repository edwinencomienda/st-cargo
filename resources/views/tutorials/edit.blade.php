
<style>
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
       .w-b{
           padding: 8px,8px,8px,8px !important ;
       }


</style>

<div class="modal fade" id="edituser{{$tutor->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
 <div class="modal-content w3-padding-32">

   <!-- Modal body -->
   <div class="modal-body w3-display-container">
       <div class="w3-center">
           <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
       </div>

 @php
       $a = $tutor->id;
          $users = DB::table('tutorials')->where('id', $a)->get();
          foreach ($users as $users) {
          }
@endphp

       <div class="w3-margin w3-padding-16">
           <form action={{url('/updatetutorial/'.$users->id)}} method="POST" enctype="multipart/form-data">
               @csrf
                <br><br>
<input type="hidden" name="oldlogo" value="{{$users->visual}}" id="">
                <div class="w3-right">
                    <?php
                    if ( substr($users->visual,-3) == 'jpg'){ ?>
                    <img class="w3-round w3-animate-fade" src="{{URL::to($users->visual)}}"
                    width="200" height="200">;

                <?php }
                    if (substr($users->visual,-3) == 'mp4') { ?>
                    <video  width="200" height="200"controls>
                        <source src="{{URL::to($users->visual)}}" type="video/mp4">
                    </video>

                <?php    }
                ?>
                </div>
            <input type="hidden" value="{{Auth::user()->role}}" name="role" value="{{$users->role}}" required>

            <input type="hidden" value="{{Auth::user()->uuid}}" name="uuid" value="{{$users->uuid}}" required>
               <p>

                   <input class="w3-input" type="text" name="title" value="{{$users->title}}" required>
                   <label class="w3-text-teal">Title:</label>
                   <br>
               </p>
               <div class="w3-row">
                <div class="w3-half w3-container">
                    <p>
                        <label class="w3-text-teal">Caption</label>
                        <input class="w3-input" type="text" name="caption" value="{{$users->caption}}" required>
                    </p>
                </div>
                <div class="w3-half w3-container">


                    <p id="image12" style="display: block">
                        <label class="w3-text-teal">Please Upload a File</label>
                        <input class="w3-input" name="visual" type="file" id="vis">
                    </p>

                    <p class="w3-right">

                        <input class="w3-check" type="checkbox" name="retain"
                        value="retain" id="retain" checked>
                        <label><em class="w3-text-red">Uncheck this if you want to change the phot or media.</em></label>
                    </p>


                </div>
              </div>



<br><br><br>
<p>
 <label class="w3-text-teal">Content</label>
<textarea name="editor1" class="ckeditor" id="editor1">
    {!! $users->content !!}
</textarea>

<script type="text/javascript">
   CKEDITOR.replace( 'editor1' );
   CKEDITOR.add
</script>
            </p>
               <br>

                   <button type="submit" class="w3-bar-item w3-button w3-teal w3-left" name="submit1" style="width:50%">
                       <i class="fas fa-paper-plane"></i> Submit
                   </button>
                   <button class="w3-bar-item w3-button w3-red w3-right" data-dismiss="modal" style="width:50%">
                       <i class="fas fa-times-circle"></i> Cancel
                   </button>
           </form>


       </div>

   </div>



 </div>
</div>
</div>




  {{-- for delete --}}
<!-- The Modal -->
<div class="modal" id="deleteuser{{$tutor->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">
            @php
            $a = $tutor->id;
               $users = DB::table('tutorials')->where('id', $a)->get();
               foreach ($users as $users) {
               }

           @endphp
            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you really want to delete this?<br></h4>
               <h4 class="h4-del">{{$users->title}}?</h4>
               <h4 class="h4-del">{{$users->caption}}?</h4>
               <div class="w3-center">
                <td>
                    <?php
                        if ( substr($tutor->visual,-3) == 'jpg'){ ?>
                        <img class="w3-round w3-animate-fade" src="{{URL::to($tutor->visual)}}"
                        width="250" height="250">;

                    <?php }
                        if (substr($tutor->visual,-3) == 'mp4') { ?>
                        <video width="250" height="250" controls>
                            <source src="{{URL::to($tutor->visual)}}" type="video/mp4">
                            </video>';

                    <?php    }
                    ?>
               </div>
              </div>


                {{-- <a href="{{ URL::to('/deletetutorial/'.$users->id) }}" type="button" class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                    <i class="fas fa-trash"></i> Delete
                </a>
                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                    <i class="fas fa-times-circle"></i> Cancel
                </a> --}}
                <a href="{{ URL::to('/deletetutorial/'.$users->id) }}" type="button" class="w3-bar-item w3-button w3-teal w3-left" name="submit1" style="width:50%">
                    <i class="fas fa-paper-plane"></i> Submit
                </a>
                <a href="javascript:void(0)"  class="w3-bar-item w3-button w3-red w3-right" data-dismiss="modal" style="width:50%">
                    <i class="fas fa-times-circle"></i> Cancel
                </a>

        </div>



      </div>
    </div>
  </div>


