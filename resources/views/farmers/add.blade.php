
<style>
    input {
       border-top:none !important;
       border-left: none !important;
       border-right: none !important;
       border-bottom: solid !important;
       border-bottom-color: #bc986a !important;
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

<div class="modal fade" id="myModal">
<div class="modal-dialog modal-dialog-centered modal-lg">
 <div class="modal-content w3-padding-32">

   <!-- Modal body -->
   <div class="modal-body w3-display-container">
       <div class="w3-center">
           <img src="/backimage/lgu.png" class="mx-auto d-block" width="55" height="55" alt="">
       </div>

       <div class="w3-margin w3-padding-16">
           <form action="{{ route('consultadd')}}" method="POST" enctype="multipart/form-data"
           onsubmit="checkForm(this);">
               @csrf
                <br><br>
              <input type="hidden" name="farmer" id="farmer" value="{{Auth::user()->uuid}}">

              <script src="{{ asset('js/app.js') }}" defer></script>
            <script>
             $( "#option" ).change(function() {
            var sel = $( "#option option:selected" ).val();
             $('#farmer').val(sel);


             });

                </script>
            </p>
               <p>
                   <label class="w3-text-teal">Title:</label>
                   <input class="w3-input" type="text" name="title" required>
               </p>
               <div class="w3-row">
                <div class="w3-half w3-container">
                    <p>
                        <label class="w3-text-teal">Address To:</label>
                        <select class="w3-select" name="role" required>
                           <option value="" selected>Please Select Office to address to:</option>
                           <option value="1">Applied Sector</option>
                           <option value="2">Crops Sector</option>
                           <option value="3">Fishery Sector</option>
                           <option value="4">Livestock Sector</option>
                        </select>
                    </p>
                </div>
                <div class="w3-half w3-container">
                    <p>
                        <label class="w3-text-teal">Please Upload a File</label>
                        <input class="w3-input" name="visual" type="file">
                    </p>
                </div>
              </div>
              <input type="text" name="reading" value="Unread" hidden>
              <p>
                <label class="w3-text-teal">Content</label>
                <textarea class="form-control" id="summary" name="summary">

                </textarea>

                <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                <script>
                CKEDITOR.replace( 'summary' );
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


<script>
    function checkForm(form)
      {
        form.submit1.disabled = true;
        form.submit1.value = "Please wait...";
        return true;
      }
    </script>
