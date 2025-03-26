
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<?php if($do==0){?>
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Manage Your Day</h3>
                  <hr>
                  <form action="<?=base_url();?>Menu/daysc" method="post" enctype="multipart/form-data">
                    <input type ="hidden" id="wffo_planner" value="<?php echo $user_day_start_from->userworkfrom;?>"/>
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?=$uid?>">
                        <center><b class="text-info">Today's Date : <?=date('d-m-Y');?> </b>
                        <?php date_default_timezone_set("Asia/Kolkata"); ?>
                        <input type="hidden" name="ustart" value="<?=date('Y-d-m H:i:s')?>">
                        <p>You Are Starting Day at <b><?=date('H:i:s');?></b><br><br>
                        <div class="mb-4">
                            <!-- <select class="form-control" name="wffo">
                                <option value="1">Work From Office</option>
                                <option value="2">Work From Field</option>
                                <option value="3">Work From Field+Office</option>
                            </select> -->
                            <select class="form-control" name="wffo" id="wffo" style="width:400px" required>
                              <option value="">Start Your Day</option>
                                <?php foreach($userdfrom as $udfrom){ ?>
                                <option value="<?= $udfrom->ID; ?>"><?= $udfrom->TYPE; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-4 d-flex justify-content-center">
                            <img class="border" id="blah" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="your image" style="width:150px;height:250px"/>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-info btn-rounded">
                                <label class="form-label text-white m-1" for="imgInp">Take Selfie</label>
                                <input type="file" class="form-control d-none" id="imgInp" name="filname" accept="image/*" capture required/>
                            </div>
                        </div>
                        <input type="hidden" id="lat" name="lat">
                        <input type="hidden" id="lng" name="lng">
                        <input type="hidden" name="do" value="<?=$do?>">
                    </div>
                    <div id="location">
                        <div id="map-container-google-3" class="z-depth-1-half map-container-3 p-3 m-3 border">
                          <iframe style="width:100%;height:200px;" id="mylocation" src="" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="form-group text-center">
                        <button type="submit" class="btn btn-success" id="submitButton" >Start Your Day</button>
                        <center>
                        <p id="goodmessage"></p>
                        </center>                        
                      </div>
                    </div>
                  </form>
            </div>
          </div>
      </div>   
     </div>
     <?php 
                $geturdata = $this->Menu_model->change_user_day_request($uid);
                $geturdatacnt = sizeof($geturdata);
                if($geturdatacnt > 0){ ?>
<hr>
<div class="card p-5">
<h5 class="bg-info p-2 text-center">Your Request to change the start your Days</h5>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Want To Start</th>
            <th>Message</th>
            <th>Approved By</th>
            <th>Approval Status</th>
            <th>Admin Message</th>  
        </tr>
    </thead>
    <tbody>
        <?php 
        $i=1;
        foreach ($geturdata as $row): ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php 
             $udetail = $this->Menu_model->get_userbyid($row->user_id);
             $username = $udetail[0]->name;
             echo $username;
            ?></td>
            <td><?php echo $row->date; ?></td>
            <td><?php 
            echo $this->Menu_model->userworkfrombyid($row->user_want_start)[0]->TYPE;
           ?></td>
            <td><?php echo $row->message; ?></td>
            <td><?php 
            if($row->apr_by == 0){
              echo "<span class='p-1 bg-warning'>Pending</span>";
            }else{
              $udetail = $this->Menu_model->get_userbyid($row->apr_by);
              $admidname = $udetail[0]->name;
              echo $admidname;
            }
            ?></td>
            <td><?php 
             if($row->apr_status == 0){
              echo "<span class='p-1 bg-warning'>Pending</span>";
            }elseif($row->apr_status == 1){
              echo "<span class='p-1 bg-success'>Approved</span>";
            }elseif($row->apr_status == 2){
              echo "<span class='p-1 bg-danger'>Reject</span>";
            }
            ?></td>
            <td><?php 
            if($row->amessage == ''){
              echo "<span class='p-1 bg-warning'>Pending</span>";
            }else{
              echo $row->amessage; 
            }
            ?></td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
</div>
               <?php } ?>
              </div>
            </div>
          </div>
        </div>
    </section>
    <?php } if($do==1){?>
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Manage Your Day</h3>
                  <hr>
                  <form action="<?=base_url();?>Menu/daysc" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?=$uid?>">
                        <center><b class="text-info">Today's Date : <?=date('d-m-Y');?> </b>
                        <p>You have Started your Day at <b><?=$ustart=$mdata[0]->ustart?></b></p>
                        <p>You have Started your Day from <b><?php if($mdata[0]->wffo==1){echo'Work From Office';}if($mdata[0]->wffo==2){echo'Work From Field';}if($mdata[0]->wffo==3){echo'Work From Field+Office';}?></b></p>
                        <p>You have Closing your Day at <b><?=$cdate=date('H:i:s');?></b></p>
                        <p>Time diffrence is <b><?=$this->Menu_model->timediff($ustart,$cdate);?></b></p>
                        <div class="mb-4 d-flex justify-content-center">
                            <img class="border" id="blah" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="your image" style="width:150px;height:250px"/>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-info btn-rounded">
                                <label class="form-label text-white m-1" for="imgInp">Take Selfie</label>
                                <input type="file" class="form-control d-none" id="imgInp" name="filname" accept="image/*" capture required/>
                            </div>
                        </div>
                        <input type="hidden" id="lat" name="lat">
                        <input type="hidden" id="lng" name="lng">
                        <input type="hidden" name="do" value="<?=$do?>">
                    </div>
                    <div id="location">
                        <div id="map-container-google-3" class="z-depth-1-half map-container-3 p-3 m-3 border">
                          <iframe style="width:100%;height:200px;" id="mylocation" src="" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-danger" onclick="this.form.submit(); this.disabled = true;">Close Your Day</button>
                    </div>
                    </div>
                    
                  </form>
            </div>
          </div>
      </div>   
     </div>     
    </section>
  <?php } if($do==2){?>
  <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Manage Your Day</h3>
                  <hr>
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?=$uid?>">
                        <center><b class="text-info">Today's Date : <?=date('d-m-Y');?> </b>
                        <p>You Are Started Day at <b><?=$mdata[0]->ustart?></b></p>
                        <p>You Are Closed Day at <b><?=$mdata[0]->uclose?></b></p>
                    </div>
            </div>
          </div>
      </div>   
     </div>     
    </section>
  <?php }?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php base_url();?>/assets/js/daymanagement_js.js"></script>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
</div>
<div class="modal fade" id="exampleModalReminder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-info text-center">
                <h5 class="modal-title" id="exampleModalLabel">Create a request to change the start your Days</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <p id="changemessage" class="text-danger text-center" ></p>
                <hr>
                <!-- <form action="<?=base_url();?>Management/SendRequestForDayStartChnage" method="post">
                <input type="hidden" id="user_want_start" name="user_want_start" class="form-control d-none" />
                <div class="form-group">
                <label>Write down why you want to change : </label>
                <textarea class="form-control" name="message" rows="3"></textarea>
                </div>
                <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Send Request</button>
                </div>
                </form> -->
                </div>
                </div>
                </div>
      </div>
      <script type='text/javascript'>
      document.getElementById("location").style.display = "none";
      imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
          blah.src = URL.createObjectURL(file);
          document.getElementById("location").style.display = "block";
        }
      }
      var x = document.getElementById("lat");
      var y = document.getElementById("lng");
      var z = document.getElementById("mylocation");
      $(document).ready(function(){
          if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
          x.value = "Geolocation is not supported by this browser.";
        }
      });
      function showPosition(position) {
        x.value = position.coords.latitude; 
        y.value = position.coords.longitude;
        var a = position.coords.latitude;
        var b = position.coords.longitude;
        mylocation.src = "https://maps.google.com/?q="+a+","+b+"&t=k&z=13&ie=UTF8&iwloc=&output=embed";
      }
      $('#lat').on('change', function() {
         document.getElementById("closebtn").disabled = true;
      });
    </script>
    <script>
      $(document).ready(function() {
          $('#submitButton').click(function(event) {
              var fileInput = $('#imgInp');
              if (fileInput.val() === '') {
                  alert('Please Select Your Picture.');
                  event.preventDefault();
                  return false;
              }
          });



          $('#end-time').on('change', function() {
              var startTime = $('#start-time').val();
              if (startTime === '') {
                  alert("Please Enter Start Time");
                  $('#end-time').val('');
              } else {
                  var endTime = $(this).val();
                  var startTimeMinutes = convertTimeToMinutes(startTime);
                  var endTimeMinutes = convertTimeToMinutes(endTime);
                  // Check if the difference is more than 90 minutes
                 if ((endTimeMinutes - startTimeMinutes) > 90 || (endTimeMinutes - startTimeMinutes) < 90) {
                      alert('Auto Task Max Time is Only 90 Minutes');
                      $('#end-time').val('');
                  }
              }
          });

          function convertTimeToMinutes(time) {
                          var timeParts = time.split(':');
                          var hours = parseInt(timeParts[0], 10);
                          var minutes = parseInt(timeParts[1], 10);
                          return (hours * 60) + minutes;
                      }

                      $('#end-time').on('change', function() {
        let endTime = $(this).val();

        if (endTime) {
            // Convert endTime to a Date object
            let endDateTime = new Date('1970-01-01T' + endTime + ':00');

            // Increment by 1 minute for start_tttpft
            // let startDateTime = new Date(endDateTime.getTime() + 1 * 60000);
            let startDateTime = new Date(endDateTime.getTime() + 0 * 60000);
            let startHours = ('0' + startDateTime.getHours()).slice(-2);
            let startMinutes = ('0' + startDateTime.getMinutes()).slice(-2);
            $('#start_tttpft').val(startHours + ':' + startMinutes);

            // Increment by 1 hour for end_tttpft
            let endTttPftDateTime = new Date(endDateTime.getTime() + 1 * 3600000);
            let endTttPftHours = ('0' + endTttPftDateTime.getHours()).slice(-2);
            let endTttPftMinutes = ('0' + endTttPftDateTime.getMinutes()).slice(-2);
            $('#end_tttpft').val(endTttPftHours + ':' + endTttPftMinutes);
        }
    });

   /* $('#wffo').on('change', function() {
              var wffo = $('#wffo').val();
              $.ajax({
                url:'<?=base_url();?>Menu/CheckuserDayAccardingPlanner',
                type: "POST",
                data: {
                  wffo: wffo,
                },
                cache: false,
                success: function a(result){
                  if(result !==''){
                    var recnt = <?= sizeof($geturdata); ?>;
                    var recntapr = <?= empty($geturdata[0]->apr_status) ? 0 : $geturdata[0]->apr_status; ?>;
                    if(recnt == 0){
                    var selectedText = $('#wffo option:selected').text();
                    $("#user_want_start").val(wffo);
                    var result ='You planed to start their day : <b>'+ result+'</b>';
                    var selectedText = ' But You want to start : <b>'+selectedText+'</b>';
                    var message = result+selectedText;
                    $("#changemessage").html(message);
                    $('#submitButton').prop('disabled', true);
                    $('#exampleModalReminder').modal('show');
                    }else{
                      if(recntapr == 0 || recntapr ==''){
                        $('#submitButton').prop('disabled', true);
                        $('#goodmessage').text("* Please Wait !, While Your Request was Approved.").css('color', 'red');
                      }else if(recntapr == 1){
                        $('#goodmessage').text("* You are able to change your day because your manager has approved your day change request.").css('color', 'green');
                        $('#submitButton').prop('disabled', false);
                      }else if(recntapr == 2){
                        $('#submitButton').prop('disabled', true);
                        $('#goodmessage').text("* You are not able to change your day because your manager has reject your day change request.").css('color', 'red');
                      }
                    }
                  }else{
                    // $('#goodmessage').text("* Good Plan As Your Days According to Planner.").css('color', 'green');
                    $('#submitButton').prop('disabled', false);
                  }
                }
                });
          }); */
      });
    </script>
<!-- ./wrapper -->
