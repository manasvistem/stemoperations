<?php $uid=$user['id'];?>


<div id="add_note" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-standard-title1"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <div class="card card-form col-md-12">
                            <div class="row no-gutters">
                                <div class="col-lg-12 card-form__body card-body">
                                        <?=form_open('Menu/addcont')?>
                                        <input type="hidden" id="id" name="sid">
                                        <div class="row md-12 p-3">
                                                <div class="form-group clearfix mt-2">
                                                    <b>Action Completed?</b><br>
                                                  <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary14" name="r7" value="YES" checked>
                                                    <label for="radioPrimary14">Yes</label>
                                                  </div>
                                                  <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary15" name="r7" value="NO">
                                                    <label for="radioPrimary15">No</label>
                                                  </div>
                                                </div>
                                            <select class="custom-select rounded-0" name="action_id" id="action_id">
                                                <option>Select Action</option>
                                                <option value="1">Call</option>
                                                <option value="4">Visit</option>
                                                <option value="2">Email</option>
                                                <option value="5">Whatsapp</option>
                                            </select>
                                        </div>
                                        <div class="row md-12 p-3" id="test1" style="display: none;">
                                             <label>Attach Call Recored</label>
                                             <input type="file" class="form-control-file" id="callrecord" required>
                                        </div>
                                        <div class="row md-12 p-3" id="test2" style="display: none;">
                                        2
                                        </div>
                                        <div class="row md-12 p-3" id="test3" style="display: none;">
                                            <label>Attach Email Screenshot</label>
                                            <input type="file" class="form-control-file" id="callrecord" required>
                                        </div>
                                        <div class="row md-12 p-3" id="test4" style="display: none;">
                                            <label>Attach Whatsapp Media</label>
                                            <input type="file" class="form-control-file" id="callrecord" multiple required>
                                        </div>
                                        <div class="col-12 col-md-12 mb-3">
                                            <label for="validationSample04">Status</label>
                                            <select type="text" class="form-control" id="status" name="status" placeholder="State" required>
                                                <option value="1">New School</option>
                                                <option value="8">FTTP Done</option>
                                                <option value="2">Active School</option>
                                                <option value="3">Average School</option>
                                                <option value="6">Good School</option>
                                                <option value="9">Model School</option>
                                            </select>
                                            <div class="invalid-feedback">Please provide a valid state.</div>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-12 col-md-12 mb-3">
                                            <label for="to_user">Remark</label>
                                            <select type="text" class="form-control" id="testdata" name="testdata" placeholder="State" required>
                                            </select>
                                        </div>
                                        
                                        <div class="col-12 col-md-12 mb-12">
                                                    <label for="remark_msg">Remarks</label>
                                                    <textarea type="text" class="form-control" readonly="readonly"  name="remark_msg" id="remark_msg"  required="">

                                                    </textarea>
                                                    <div class="invalid-feedback">.</div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>

                                                  
                                            </div>
                                                 <div style="display:none;" id="next_action_form" class="form-row row">

                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="validationSample04">Next Action Date</label>
                                                        <input type="datetime-local" class="form-control" id="action_date" name="action_date">
                                                    </div>

                                                 <div class="col-12 col-md-12 mb-12">
                                                    <label for="validationSample03">Assign to</label>
                                                    <select type="text" class="form-control" name="assign_to" id="id_creator"  required="">
                                                            <option value=""></option>
                                                    </select>
                                                </div>

                                                 <div class="col-12 col-md-6 mb-3">
                                                    <label for="nextaction">Action Type</label>
                                                    <select type="text" class="form-control" id="nextaction" name="nextaction" placeholder="State" required="">
                                                        <option>Select Action</option>
                                                        <option value="1">Call</option>
                                                        <option value="4">Visit</option>
                                                        <option value="2">Email</option>
                                                        <option value="5">Whatsapp</option>
                                                        <option value="5">Other</option>
                                                    </select>
                                                </div>

                                                 <div class="col-12 col-md-6 mb-3">
                                                    <label for="nextpurpose">Purpose</label>
                                                    <select type="text" class="form-control" id="nextpurpose" name="nextpurpose" placeholder="State" required="">

                                                    </select>
                                                    
                                                </div>

                                                 <div class="col-12 col-md-12 mb-12">
                                                    <label for="next_action_remark">Next Action Remark</label>
                                                    <select type="text" class="form-control"  name="next_action_remark" id="next_action_remark" required="">

                                                    </select>
                                                </div>

                                                     <div class="col-12 col-md-12 mb-12">
                                                    <label for="next_action_remark_msg">Next Action Remark</label>
                                                    <textarea type="text" class="form-control"  name="next_action_remark_msg" id="next_action_remark_msg" placeholder="State" required="">

                                                    </textarea>
                                                </div>
                                                </div>



                                            </div>
                                        </div>
                                        <button type="button" id="" style="display:none;float:left;" onclick="$('#next_action_form').hide();$('.next_action_form_submit').hide();$('#next_action_form_button').show();$('#prev_action').show();" class="btn btn-primary next_action_form_submit"><< Last Action </button>
                                        <button type="Submit" onclick="$('.next_action_form_submit').hide();$('.next_action_form_submit_loading').show();"  style="display:none;float:right;" class="btn btn-success next_action_form_submit">Submit</button>
                                        <button type="button" onclick="$('.next_action_form_submit').show();$('.next_action_form_submit_loading').hide();"  style="display:none;float:right;" class="btn btn-success next_action_form_submit_loading">Loading......</button>
                                        <button type="button" id="next_action_form_button" onclick="$('#next_action_form').show();$('.next_action_form_submit').show();$('#next_action_form_button').hide();$('#prev_action').hide();" class="btn btn-primary">Next Action >></button>

                                    
                                    
                                </form>
                                </div>
                            </div>
                        </div>
                </div> <!-- // END .modal-body -->
                
</div></div></div>

<!-- User details -->
<div id="add_whatsapp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-standard-title1"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <div class="card card-form col-md-12">
                            <div class="row no-gutters">

                                <div class="col-lg-12 card-form__body card-body">
                                    
   <div >
   <center><h5>Add Whatsapp Activity</h5></center><hr>
   <form action="<?=base_url();?>Menu/addwag" method="post" enctype="multipart/form-data">
   <input type="hidden" id="wsid" name="sid">
   <select class="form-control  p-3  mt-2" name="year">
       <option>Select Year</option>
       <option>2022-23</option>
       <option>2022-24</option>
   </select>
   <input type="Date" id="wsid" name="sid">
   <label>Attach Whatsapp Media</label>
   <input type="file" class="form-control-file" name="waimage[]" id="waimage" multiple required>
   <select id="sel" class="form-control  p-3  mt-2">
        <option>Peer to Peer Teaching & Learning</option>
        <option>MSC exhibits brought to Classroom</option>
        <option>Students taken to MSC</option>
        <option>Student Learning concepts Independently with MSC exhibits</option>
        <option>Project Created with the help of MSC exhibits</option>
        <option>Teacher to teacher Knowledge Transfer</option>
        <option>Exhibits outside Classroom and MSC</option>
        <option>Other</option>
   </select>
   <textarea id="remark" name="remark" class="form-control  p-3  mt-2" placeholder="Remark" readonly></textarea>
   <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
   </form>
  </div>
  
  </div>
                            </div>
                        </div>
                </div> <!-- // END .modal-body -->
                
                </div></div></div>
                
                
                
 
  <!-- User details -->
  <div id="add_contact" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-standard-title1"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <div class="card card-form col-md-12">
                            <div class="row no-gutters">

                                <div class="col-lg-12 card-form__body card-body">
                                    
   <div >
   <center><h5>Add Contact Detail</h5></center><hr>
   <?=form_open('Menu/addcont')?>
   <input type="hidden" id="sid" name="sid">
   <input type="hidden" name="uid" value="<?=$uid?>">
   <input type="text" name="contact_name" class="form-control p-3 mt-2" placeholder="Name">
   <input type="text" name="designation" class="form-control  p-3  mt-2" placeholder="Designation">
   <input type="text" name="contact_no" class="form-control  p-3  mt-2" placeholder="Contact No">
   <input type="text" name="email" class="form-control  p-3  mt-2" placeholder="Email">
   <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
   </form>
  </div>
  
  </div>
                            </div>
                        </div>
                </div> <!-- // END .modal-body -->
                
                </div></div></div>


<!-- User details -->
  <div id="doaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-standard-title1"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <div class="card card-form col-md-12">
                            <div class="row no-gutters">
                                <div class="col-lg-12 card-form__body card-body">  
   <div >
   <center><h5>Create Plan</h5></center><hr>
           
   <?php
   date_default_timezone_set('Asia/Kolkata');
   $today = date('Y-m-d');
   $uid= $user['id'];
   ?>
   <?=form_open('Menu/setaction')?>
   <input type="hidden" id="taskid" name="taskid">
   <input type="hidden" id="uid" name="uid" value="<?=$uid?>">
   <input type="datetime-local" name="date" class="form-control p-3 mt-2 mb-2" placeholder="Date" min="<?=$today?>">
   <select type="text" class="form-control" id="action" name="action" required>
       <option value="">Select Action Type</option>
       <?php $this->load->model('Menu_model'); 
       $data=$this->Menu_model->get_action();
       foreach($data as $d){ 
       ?>
       <option value="<?=$d->name;?>"><?=$d->name;?></option>
       <?php } ?>
    </select>
   <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
   </form>
  </div>
  
  </div>
                            </div>
                        </div>
                </div> <!-- // END .modal-body -->
                
                </div></div></div>
 
  

  <!-- Script -->
  



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  
 $(document).ready(function(){	
     
     $('#other_action').click(function(){
    $('#doaction').modal('show');
    var id = document.getElementById("other_action").value;
    document.getElementById("taskid").value = id;
  });
  
 });
  
  
 </script>
 
 <script type='text/javascript'>
 
$('#sel').on('change', function a() { 
 var sel = this.value;
 if(sel=='Other'){
     document.getElementById("remark").readOnly = false;
 }else{
 document.getElementById("remark").value = sel;}
});
 
$('#action_id').on('change', function a() {
   var ab = this.value;
   if(ab=="1"){
    $("#test1").show();
    $("#test2").hide();
    $("#test3").hide();
    $("#test4").hide();
   }
   if(ab=="4"){
    $("#test1").hide();
    $("#test2").show();
    $("#test3").hide();
    $("#test4").hide();
   }
   if(ab=="2"){
    $("#test1").hide();
    $("#test2").hide();
    $("#test3").show();
    $("#test4").hide();
   }
   if(ab=="5"){
    $("#test1").hide();
    $("#test2").hide();
    $("#test3").hide();
    $("#test4").show();
   }
});

$('#testdata').on('change', function c() {
   var ab = this.value;
   document.getElementById("remark_msg").value = ab;
});

$('#status').on('change', function b() {
    var action_id = document.getElementById("action_id").value;
    var status_id = document.getElementById("status").value;
   
$.ajax({
url:'<?=base_url();?>Menu/mainremark',
type: "POST",
data: {
action_id: action_id,
status_id: status_id
},
cache: false,
success: function a(result){
$("#testdata").html(result);
}
});
});






$('#nextaction').on('change', function f() {
    var action_id = document.getElementById("nextaction").value;
   
$.ajax({
url:'<?=base_url();?>Menu/purpose',
type: "POST",
data: {
action_id: action_id
},
cache: false,
success: function a(result){
$("#nextpurpose").html(result);
}
});
});




$('#nextpurpose').on('change', function g() {
    var purpose_id = document.getElementById("nextpurpose").value;
   
$.ajax({
url:'<?=base_url();?>Menu/actionremark',
type: "POST",
data: {
purpose_id: purpose_id
},
cache: false,
success: function a(result){
$("#next_action_remark").html(result);
}
});
});



$('#next_action_remark').on('change', function c() {
   var ab = this.value;
   document.getElementById("next_action_remark_msg").value = ab;
});


</script>








<script type='text/javascript'>
  $(document).ready(function(){	
   $('#add_cont').click(function(){
    $('#add_contact').modal('show');
    var id = document.getElementById("add_cont").value;
    $.ajax({
     url:'<?=base_url();?>Menu/sd',
     method: 'post',
     data: {id: id},
     dataType: 'json',
     success: function(response){
       var len = response.length;
       $('#id,#suname,#sname,#semail').text('');
       if(len > 0){
         // Read values
         var id = response[0].id;
         var uname = response[0].sname;
         var name = response[0].slocation;
         var email = response[0].email;
 
         document.getElementById("sid").value = id;
         document.getElementById("suname").value = uname;
         document.getElementById("sname").value = name;
         document.getElementById("semail").value = email;
 
       }
 
     }
   });
  });
  
  
  $('#add_act').click(function(){
    $('#add_note').modal('show');
  });
  
  $('#add_wag').click(function(){
    $('#add_whatsapp').modal('show');
    var id = document.getElementById("add_wag").value;
    $.ajax({
     url:'<?=base_url();?>Menu/sd',
     method: 'post',
     data: {id: id},
     dataType: 'json',
     success: function(response){
       var len = response.length;
       $('#id,#suname,#sname,#semail').text('');
       if(len > 0){
         // Read values
         var id = response[0].id;
         var uname = response[0].sname;
         var name = response[0].slocation;
         var email = response[0].email;
 
         document.getElementById("wsid").value = id;
         document.getElementById("suname").value = uname;
         document.getElementById("sname").value = name;
         document.getElementById("semail").value = email;
 
       }
 
     }
   });
  });
  

 });
 
 
 $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});
 </script>