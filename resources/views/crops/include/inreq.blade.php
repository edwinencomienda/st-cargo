<style>
    h4{
        font-size: 18px !important;
        font-family: 'Nunito' !important;
    }
    label{
        color: black !important;
        font-size: 14px;
    }

    input[type="text"]{
        border-bottom: .8 px black !important;
    }

   tr, td{
        font-size: 14px !important;
    }
</style>


{{-- For APPROVAL --}}

<!-- The Modal -->
<div class="modal fade"  id="approve{{$treq->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <!-- Modal Header -->


        <!-- Modal body -->
        <div class="modal-body">
            @php
            $a = $treq->id;
               $trs = DB::table('croprequest')->where('id', $a)->get();
               foreach ($trs as $tr) {
               }
            @endphp

            <div class="w3-center w3-padding-32">
                <img src="/backimage/lgu.png" width="115" height="115" alt="">
            </div>

            <div class="w3-row">
                <div class="w3-half w3-container w3-padding-32">


                    <ul class="w3-ul w3-card-4  w3-padding-32" style="padding-left: 5px;padding-right:5px;">
                        <li class="w3-display-container">
                            <h3>Farmer's Name</h3>
                             <span class="w3-button w3-transparent w3-display-right">

                                <?php
                                $first = DB::table('farmerprofile')
                                ->select('lname', 'fname', 'mname')->where('uuid', $treq->farmer);
                                $users = DB::table('employeeprofile')
                                ->select('lname', 'fname', 'mname')
                                ->union($first)
                                ->where('uuid', $treq->farmer)
                                ->get();
                                foreach ($users as $key => $u) { ?>
                                <h3>{{$u->lname . ", ".$u->fname . " " . $u->mname}}</h3>';
                               <?php } ?>

                              </span>
                        </li>

                        <li class="w3-display-container">
                            <h3>Crop Request</h3>
                            <span class="w3-button w3-transparent w3-display-right">
                                <?php $tser = DB::table('cropproduct')
                                ->where('id', $treq->program)->get();
                                foreach ($tser as $key => $t) {
                                }?>

                                 <h3>{{$t->products}}</h3></span>
                        </li>


                        <li class="w3-display-container">
                            <h3>Quantity </h3>
                             <span class="w3-button w3-transparent w3-display-right">
                                 <h3>{{$treq->quantity}}</h3></span>
                        </li>

                        <li class="w3-display-container">
                            <h3>Request Date</h3>
                             <span class="w3-button w3-transparent w3-display-right">
                                 <h3>
                                     @php
                                    $date  = \Carbon\Carbon::parse($treq->created_at);
                                    echo $date->toDayDateTimeString();
                                    @endphp</h3>
                                    </span>
                        </li>

                        <li class="w3-display-container">
                            <h3>Date to be ready:</h3>
                             <span class="w3-button w3-transparent">
                                 <h3>
                                   Please set the date for the appointment.</h3>
                            </span>
                        </li>

                    </ul>
                    <br>


                    <h3>Farmer's Land Parcel</h3>
                    <?php $c=1;?>
                    <?php $tser = DB::table('farmparcel')
                    ->where('id', $treq->program)->get();
                    foreach ($tser as $key => $fmp) {
                    ?>
                    <ul class="w3-ul w3-card-4  w3-padding-32" style="padding-left: 5px;padding-right:5px;">
                        Parcel No. <?php echo $c;?>
                        <li class="w3-display-container">
                            <h3>Location</h3>
                            <span class="w3-button w3-transparent w3-display-right">
                                <?php $ha = DB::table('baranggay')
                                ->where('id', $fmp->location)->get();
                                foreach ($ha as $h) {
                                }?>

                                 <h3>{{$h->brgy}}</h3></span>
                        </li>
                        @if ($fmp->ownership == "Registered Owner")

                        <input class="w3-check" type="checkbox" id="rown" checked>
                        <label> Registered Owner</label>

                        &nbsp;
                        <input class="w3-check" type="checkbox" id="othe">
                        <label> Others</label>
                        <input type="text" style="border-top: none; border-right:none;border-left:none; width:33%;"
                        value="{{$fmp->otherown}}">
                        <br>

                        <input class="w3-check" type="checkbox" id="tenantss">
                        <label> Tenant</label>
                        <p>
                            &nbsp;&nbsp;
                             Name of Land Owner:  <input type="text" style="border-top: none; border-right:none;border-left:none;
                             width:52%;"
                             value="{{$fmp->tenant}}">
                        </p>
                        <br>


                        <input class="w3-check" type="checkbox" id="les">
                        <label> Lessee</label>
                        <p>
                            &nbsp;&nbsp;
                             Name of Land Owner:  <input type="text" style="border-top: none;
                             border-right:none;border-left:none; width:52%;"
                             value="{{$fmp->lesse}}">
                        </p>

                        @endif

                        @if ($fmp->ownership == "Others")

                        <input class="w3-check" type="checkbox" id="rown">
                        <label> Registered Owner</label>

                        &nbsp;
                        <input class="w3-check" type="checkbox" id="othe" checked>
                        <label> Others</label>
                        <input type="text" style="border-top: none; border-right:none;border-left:none; width:33%;"
                        value="{{$fmp->otherown}}">
                        <br>

                        <input class="w3-check" type="checkbox" id="tenantss">
                        <label> Tenant</label>
                        <p>
                            &nbsp;&nbsp;
                             Name of Land Owner:  <input type="text" style="border-top: none; border-right:none;border-left:none;
                             width:52%;"
                             value="{{$fmp->tenant}}">
                        </p>
                        <br>


                        <input class="w3-check" type="checkbox" id="les">
                        <label> Lessee</label>
                        <p>
                            &nbsp;&nbsp;
                             Name of Land Owner:  <input type="text" style="border-top: none;
                             border-right:none;border-left:none; width:52%;"
                             value="{{$fmp->lesse}}">
                        </p>

                        @endif

                        @if ($fmp->ownership == "Tenant")

                        <input class="w3-check" type="checkbox" id="rown">
                        <label> Registered Owner</label>

                        &nbsp;
                        <input class="w3-check" type="checkbox" id="othe">
                        <label> Others</label>
                        <input type="text" style="border-top: none; border-right:none;border-left:none; width:33%;"
                        value="{{$fmp->otherown}}">
                        <br>

                        <input class="w3-check" type="checkbox" id="tenantss" checked>
                        <label> Tenant</label>
                        <p>
                            &nbsp;&nbsp;
                             Name of Land Owner:  <input type="text" style="border-top: none; border-right:none;border-left:none;
                             width:52%;"
                             value="{{$fmp->tenant}}">
                        </p>
                        <br>


                        <input class="w3-check" type="checkbox" id="les">
                        <label> Lessee</label>
                        <p>
                            &nbsp;&nbsp;
                             Name of Land Owner:  <input type="text" style="border-top: none;
                             border-right:none;border-left:none; width:52%;"
                             value="{{$fmp->lesse}}">
                        </p>

                        @endif

                        @if ($fmp->ownership == "Lessee")

                        <input class="w3-check" type="checkbox" id="rown">
                        <label> Registered Owner</label>

                        &nbsp;
                        <input class="w3-check" type="checkbox" id="othe">
                        <label> Others</label>
                        <input type="text" style="border-top: none; border-right:none;border-left:none; width:33%;"
                        value="{{$fmp->otherown}}">
                        <br>

                        <input class="w3-check" type="checkbox" id="tenantss">
                        <label> Tenant</label>
                        <p>
                            &nbsp;&nbsp;
                             Name of Land Owner:  <input type="text" style="border-top: none; border-right:none;border-left:none;
                             width:52%;"
                             value="{{$fmp->tenant}}">
                        </p>
                        <br>


                        <input class="w3-check" type="checkbox" id="les" checked>
                        <label> Lessee</label>
                        <p>
                            &nbsp;&nbsp;
                             Name of Land Owner:  <input type="text" style="border-top: none;
                             border-right:none;border-left:none; width:52%;"
                             value="{{$fmp->lesse}}">
                        </p>

                        @endif

                        <table class="w3-table w3-bordered">
                            <h5 class="w3-center">Animals-Crops in Parcel</h5>
                            <tr>
                                <td>Animals/Crops</td>
                                <td>Size</td>
                                <td>Total</td>
                                <td>Farm  Type</td>
                            </tr>
                            <?php $ani = DB::table('parcelanimal')
                            ->where('uuid', $fmp->uuid)
                            ->where('parcel', $fmp->id)
                            ->get();
                            foreach ($ani as $a) {?>

                            <tr>
                                <td>{{$a->animal}}</td>
                                <td>{{$a->size}}</td>
                                <td>{{$a->heads}}</td>
                                <td>{{$a->farmtype}}</td>
                            </tr>
                            <?php    }?>
                        </table>

                    </ul>
                    <?php $c++;?>
                <?php } ?>


                </div>
                <div class="w3-half w3-container w3-card-4" style="background-color:	#cdb090; ">
<br><br>
<div class="w3-card-4">
                 <?php
                     $fpro = DB::table('farmerprofile')->where('uuid', $treq->farmer)->get();
                     if ($fpro->count()<0) { ?>
 <div class="alert alert-success alert-dismissible w3-padding-64 w3-card-4">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h3><strong>You are Certified Panabo City Farmer!</strong></h3>
  <em>You can approve the request.</em>
</div>
                   <?php  } else { ?>
<div class="alert alert-warning alert-dismissible w3-padding-32">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
<h3><strong>Please take time to read</strong></h3>
<em>The farmer has not fill up his profile form. </em>
</div>

                  <?php  }

                 ?>
</div>


<div class="w3-card-4">
<?php
    $ppro = DB::table('farmerpersonal')->where('uuid', $treq->farmer)->get();
    if ($ppro->count()<0) { ?>
    <div class="alert alert-warning alert-info w3-padding-32">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h3><strong>Government ID</strong> <span class="w3-right"></span>{{$ppro->gov_id}}</h3> </h3>
        <h3><strong>ID Detail</strong> <span class="w3-right"></span>{{$ppro->gov_detail}}</h3> </h3>
      <em>The farmer is able for request. </em>
      </div>
<?php  } else { ?>
    <div class="alert alert-warning alert-dismissible w3-padding-32">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h3><strong>Farmer's Ciitizenship Profile is empty.</strong></h3>
      <em>The farmer does not fill up his form. </em>
      </div>
  <?php  }
  ?>
</div>



<div class="w3-card-4">
    <?php
        $tpro = DB::table('farmerparttwo')->where('uuid', $treq->farmer)->get();
        if ($tpro->count()<0) { ?>
        <div class="alert alert-warning alert-info w3-padding-32">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h3><strong>Livelihood</strong> <span class="w3-right"></span>{{$ppro->livelihood}}</h3> </h3>
            <h3><strong>Farming Income</strong> <span class="w3-right"></span>{{$ppro->farmgross}}</h3> </h3>
            <h3><strong>Non Farming Income</strong> <span class="w3-right"></span>{{$ppro->nonfarmgrass}}</h3> </h3>

            <em>The farmer is able for the request. </em>
          </div>
    <?php  } else { ?>
        <div class="alert alert-warning alert-dismissible w3-padding-32">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h3><strong>Farmer's Livelihood Profile is empty!</strong></h3>
          <em>The farmer does not fill up his form. </em>
          </div>
      <?php  }
      ?>
    </div>

<div class="w3-card-4 w3-card-4 w3-white w3-padding-64" style="padding-left:15px !important;padding-right:15px !important;">
    <div class="w3-center"><img src="/backimage/da2.png" width="88" height="88" alt=""></div>

    <form action="{{url('/croprequest/approval/'.$tr->id)}}" method="POST"><br>
        @csrf


        <input class="w3-input" type="hidden" name="approvedby" value="{{Auth::user()->uuid}}" required>
        <p>
           <h4><label class="w3-text-teal">Approval</label></h4>
            <select class="w3-select" name="approved">
                <option value="" disabled selected>Do you wish to Approve it?</option>
                <option value="Approved">Approved</option>
                <option value="Disapproved">Disapproved</option>
                <option value="Waiting">Still Waiting.</option>
              </select>
        </p>

        <p>
            <h4 class="w3-text-teal"><label class="w3-text-teal">Date to be Ready</label></h4>
            <input type="date" class="w3-input" name="delivery_date" id="">
         </p>

        <p>
           <h4 class="w3-text-teal"><label class="w3-text-teal">Checking</label></h4>
            <select class="w3-select" name="status" required>
                <option value="" disabled selected>Did you check it?</option>
                <option value="Checked">Checked</option>
                <option value="Uncheck">Unchecked</option>
              </select>
        </p>

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

<br><br>

                </div>
              </div>
        </div>

        <!-- Modal footer -->


      </div>
    </div>
  </div>




  {{-- for delete --}}
<!-- The Modal -->
<div class="modal" id="deleterequest{{$treq->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w3-padding-16 w3-card-4">


        <!-- Modal body -->
        <div class="modal-body">
            @php
            // $ts = $treq->id;
            //    $users = DB::table('users')->where('id', $a)->get();
            //    foreach ($users as $users) {
            //    }

           @endphp
            <div class="w3-panel w3-leftbar w3-light-grey w3-large w3-padding-16">
               <h4 class="h4-del">Do you Really want to Delete Request of : <br></h4>
               <?php
               $first = DB::table('farmerprofile')
               ->select('lname', 'fname', 'mname')->where('uuid', $treq->farmer);
               $users = DB::table('employeeprofile')
               ->select('lname', 'fname', 'mname')
               ->union($first)
               ->where('uuid', $treq->farmer)
               ->get();
               foreach ($users as $key => $u) { ?>
               <h3>{{$u->lname . ", ".$u->fname . " " . $u->mname}}</h3>';
               <?php } ?>

              </div>

            <div class="w3-bar w3-card-4">
                <a href="{{ URL::to('/deletecroprequest/'.$tr->id) }}" type="button"
                    class="w3-bar-item w3-button w3-teal" name="submit1" style="width:50%">
                    <i class="fas fa-trash"></i> Delete
                </a>
                <a class="w3-bar-item w3-button w3-red" data-dismiss="modal" style="width:50%">
                    <i class="fas fa-times-circle"></i> Cancel
                </a>
            </div>

        </div>



      </div>
    </div>
  </div>
