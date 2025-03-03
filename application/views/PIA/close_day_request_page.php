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
                  $getDayCloseRequest = $this->Menu_model->GetDayCloseRequest($uid,$tdate);
                  $getDayCloseRequescnt = sizeof($getDayCloseRequest);

                  if($getDayCloseRequescnt  == 0){ ?>
                <form action="<?=base_url();?>Menu/dayscRequest" method="post" enctype="multipart/form-data">
                  <center>
                    <div class="row">
                      <div class="col">

                      <?php    
                    $gecurAutoTaskTime = sizeof($gecurAutoTaskTime);
                    $message = ($gecurAutoTaskTime) ? "selected" : "disabled";
                    ?>

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

                   
                    <input type="hidden" name="autotasktimeisset" value="<?=$gecurAutoTaskTime?>">
                    <?php
                    if($gecurAutoTaskTime == 0){  ?>
                      <hr class="hrclass" style="width: 600px;"/>
                    <div class="card">
              <div class="card-body" id="mainboxAutoTask1">
                <h5><i> Today's Auto Task and Planned Time </i></h5>
                <hr/>
               
                <div class="row">
                  
                <div class="col-sm-6 col-sm mt-3">
                <marquee class="p-2 mt-1" width="100%"  onMouseOver="this.stop()" onMouseOut="this.start()" behavior="left" bgcolor="pink">
                  <h6> Auto task time should be between 4:00 PM to 7:00 PM and maximum duration of 90 minutes. </h6>
                </marquee>

                  <div class="form-group">
                    <label for="start-time">Enter Start Time</label>
                    <input type="time" id="start-time" name="startautotasktime" class="form-control is-invalid" required>
                  </div>

                  <div class="form-group">
                    <label for="end-time">Enter End Time</label>
                    <input type="time" id="end-time" name="endautotasktime" class="form-control is-invalid" required>
                  </div>
                  </div>
                  <div class="col-sm-6 col-sm mt-3">
                  <marquee class="p-2 mt-1" width="100%"  onMouseOver="this.stop()" onMouseOut="this.start()" behavior="left" bgcolor="pink">
                  <h6>Plan Your day for Today,You will get max 1 hour to plan all the tasks for the day.</h6>
                </marquee>
                      <div class="form-group">
                        <label for="end-time">Today's Planner Time start.</label>
                        <input type="time" readonly id="start_tttpft" name="start_tttpft" class="form-control is-invalid" required>
                      </div>

                      <div class="form-group">
                        <label for="end-time">Today's Planner Time End.</label>
                        <input type="time" readonly id="end_tttpft" name="end_tttpft" class="form-control is-invalid" required>
                      </div>
                  </div>
                </div>
              </div>
            </div>
    <?php } ?>