<section class="content">
    <div class="container-fluid">
      <div class="row p-3">
<?php
if($getDayCloseRequescnt > 0){
 $approved_status      = $getDayCloseRequest[0]->approved_status;
                  if($approved_status == '' || $approved_status == 'Reject'){
                  ?>
                  <h4><center>Close Day Request</center></h4>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead class="bg-primary">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Why Did You</th>
                        <th scope="col">Request Message</th>
                        <th scope="col">Approvel Status</th>
                        <th scope="col"><?= $approved_status ?> By</th>
                        <th scope="col"><?= $approved_status ?> Remarks</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($getDayCloseRequest as $data){ ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $this->Menu_model->get_userbyid($data->user_id)[0]->name ?></td>
                        <td><?= $data->req_date ?></td>
                        <td><?= $data->why_did_you ?></td>
                        <td><?= $data->req_remarks ?></td>
                        <td>
                          <?php
                            if($data->approved_status == 'Approved'){
                              echo "<span class='bg-success p-2'>Approved</span>";
                            }else if($data->approved_status == 'Reject'){
                                echo "<span class='bg-danger p-2'>Reject</span>";
                              }else{
                                echo "<span class='bg-warning p-2'>Pending</span>";
                              }
                            ?>
                        </td>
                        <td><?= $this->Menu_model->get_userbyid($data->approved_by)[0]->name ?></td>
                        <td><?= $data->approved_remarks ?></td>
                      </tr>
                      <?php $i++; } ?>
                    </tbody>
                  </table>
                </div>
                <?php }else{ ?>
                <div class="row p-3">
                  <div class="col-sm col-md-6 col-lg-6 m-auto">
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <h3 class=" bg-info p-2 text-center">Close Your Yesterday Day</h3>
                        <hr class="hrclass" style="width: 300px;"/>
                        <form action="<?=base_url();?>Menu/YesterdayDayClose" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input type="hidden" value="<?= $uystart_id ?>" name="req_id">
                            <input type="hidden" name="user_id" value="<?=$uid?>">
                            <center>
                            <b class="text-info">Today's Date : <?=date('d-m-Y');?> </b>
                            <hr class="hrclass" style="width: 300px;"/>
                            <p>You have Started your Day at <b><?=$uystart?></b></p>
                            <hr class="hrclass" style="width: 300px;"/>
                            <p>You are Closing your Day at <b><?=$cdate=date('H:i:s');?></b></p>
                            <hr class="hrclass" style="width: 300px;"/>
                            <p>Time diffrence is <b><?=$this->Menu_model->timediff($uystart,$cdate);?></b></p>
                            <hr class="hrclass" style="width: 300px;"/>
                            <div class="mb-4 d-flex justify-content-center">
                              <img class="border profileimgae" id="blah" src="https://uxwing.com/wp-content/themes/uxwing/download/peoples-avatars/user-profile-icon.png" alt="your image" style="width:250px;height:250px"/>
                            </div>
                            <div class="d-flex justify-content-center">
                              <div class="btn btn-info btn-rounded">
                                <label class="form-label text-white m-1" for="imgInp">Take Selfie</label>
                                <input type="file" class="form-control d-none" id="imgInp" name="filname" accept="image/*" capture required/>
                              </div>
                            </div>
                            <input type="hidden" id="lat" name="lat">
                            <input type="hidden" id="lng" name="lng">
                          </div>
                          <div id="location">
                            <div id="map-container-google-3" class="z-depth-1-half map-container-3 p-3 m-3 border">
                              <iframe style="width:100%;height:200px;" id="mylocation" src="" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <div class="form-group text-center">
                              <button type="submit" class="btn btn-danger" id="closebtn" onclick="this.form.submit(); this.disabled = true;">Close Your Day</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div><?php }
}
else{?>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 m-auto">
  <div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="blink">
        <h3 class="text-center">You forgot to close your day yesterday</h3>
      </div>
      <marquee class="p-2 mt-1" width="100%" behavior="alternate" bgcolor="pink">
        <h6> * Please submit a request to close yesterday's day and begin today's</h6>
      </marquee>
      <hr>
      <div class="row">
        <div class="col-md-3 text-center">
          <div class="card bg-success p-2">
            <p>You have Started your Day at </p>
            <hr>
            <b><?=$uystart ?></b>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="card bg-danger p-2">
            <p>But you have not closed your day yet.</p>
            <hr>
            <b>0000-00-00 00:00:00</b>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="card bg-warning p-2">
            <p>Time diffrence is </p>
            <hr>
            <b><?=$this->Menu_model->timediff($uystart,$ctdate);?></b>
          </div>
        </div>
      </div>
      <hr class="hrclass" style="width: 500px;"/>
      <?php          
      //   $getDayCloseRequest = $this->Menu_model->GetDayCloseRequest($uid,$tdate);
      //   dd($getDayCloseRequest);
      //   $getDayCloseRequescnt = sizeof($getDayCloseRequest);
       ?>
      <form action="<?=base_url();?>Menu/dayscRequest" method="post" enctype="multipart/form-data">
        <center>
          <div class="row">
            <div class="col">
              <label for="validationServer04" class="form-label">
              * Why did you not close your day yesterday?
              </label>
              <input type="hidden" value="<?= $uystart_id ?>" name="req_id">
              <select class="form-control is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" name="would_you_want" required style="width:500px;" >
                <option selected disabled value="">Choose...</option>
                <option <?=$message?> value="I was caught up with an urgent task and lost track of time.">I was caught up with an urgent task and lost track of time.</option>
                <option value="I encountered unexpected issues that took longer to resolve than planned.">I encountered unexpected issues that took longer to resolve than planned.</option>
                <option value="I had a personal emergency that required my immediate attention.">I had a personal emergency that required my immediate attention.</option>
                <option value="I forgot to update the system at the end of the day.">I forgot to update the system at the end of the day.</option>
                <option value="I had difficulty accessing the system due to technical issues.">I had difficulty accessing the system due to technical issues.</option>
                <option value="I had a backlog of work and wasn't able to finish everything on time.">I had a backlog of work and wasn't able to finish everything on time.</option>
                <option value="I was working late on a high-priority project and didn't get a chance to update the records.">I was working late on a high-priority project and didn't get a chance to update the records.</option>
                <option value="I was out of the office and unable to complete the update remotely.">I was out of the office and unable to complete the update remotely.</option>
                <option value="We forgot to set our next day planner.">We forgot to set our next day planner</option>
              </select>
              <div id="validationServer04Feedback" class="invalid-feedback">
                * Please select a valid state.
              </div>
            </div>
          </div>
          <div class="col1 text-center">
          <button type="submit" class="btn btn-danger">Create Request</button>
        </div>
      </form>

      <?php } ?>
</div>
</div>
</div>