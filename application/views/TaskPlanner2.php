<?php $this->load->view('nav'); ?>
<style>
  .card {
  padding:10px;
  }
  .bg-primary{
  color:white!important;
  }
  .planerdflex {
  align-items: center;
  justify-content: center;
  display: flex;
  }
  div#plantimerBox {
    background: darkslategray;
    color: white;
}
.plantime-timer-text  {
    font-size: 24px;
}
span.badge.bg-primary {
    margin: 2px;
}
span.badge.badge-light.text-dark {
    font-weight: 700;
}
div#taskplanning_loader {
    height: 100%;
}
.was-validated .form-select:valid, .form-select.is-valid {
  background-image: none !important;
  /* height: 150px!important; */
}
.was-validated .form-select:invalid, .form-select.is-invalid {
  background-image: none !important;
}
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
  
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
  <div class="row">
  <div class="col-md-6"></div>
  <div class="col-md-6" style="text-align: right;">
        <span><i class="menu-icon tf-icons bx bx-error-circle" data-bs-toggle="modal" data-bs-target="#exLargeModalPlannerDocuments"></i></span>
    </div>
  </div>
   
<h5 class="card-header text-center">
  <?php if ($this->session->flashdata('success_message')): ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <?= $this->session->flashdata('success_message'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error_message')): ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <?= $this->session->flashdata('error_message'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('pending_message')): ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <?= $this->session->flashdata('pending_message'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>
</h5>
<?php
// Start Common Function 
 $allTaskAtctions = $this->Menu_model->getAlltasktype($user['dep_id']); 
//End Common Function 

  $totalttaskdata = $this->Menu_model->getUserTotalTaskTimeForTodays($uid,$adate);
  $totalttasktime = $totalttaskdata[0]->ttime;

  $taskplanmincount    = 0;
  $lunchtime           = 30;      // Lunch Time 45 Miniute
  $autoTasktime        = 90;  // 90 Minutes For Auto Task
  $topp                = 60; // 60 Minutes For Tommorow Planner Planning
  $texpense_time       = $lunchtime + $autoTasktime + $topp; // totol expense time
  $nine_hours_planning = 540; // 9 hours Planning = 9* 60 = 540 Minutes 
  $userplanetime = $nine_hours_planning - $texpense_time; // total plan time  - 345 minutes
  $plannerremTime = $userplanetime - $taskplanmincount; 
  $plrequest    = $this->Menu_model->GetTodaysPlannerRequest($uid);
  $plrequestcnt = sizeof($plrequest);
  if($plrequestcnt > 0){
  $apr_time       = $plrequest[0]->apr_time;
  $request_time   = $plrequest[0]->created_at;
  
  $req_datetime1  = new DateTime($request_time);
  $req_datetime2  = new DateTime($apr_time);
  // Calculate the difference in request approved
  $req_interval   = $req_datetime1->diff($req_datetime2);
  // Get the difference in hours and minutes in request approved
  $apr_hours      = $req_interval->h + ($req_interval->days * 24); // Total hours
  $apr_minutes    = $req_interval->i; // Remaining minutes
  $reqlateapr     = "$apr_hours hours and $apr_minutes minutes";
  $tsk_initialTime    = $apr_time;
  $tsk_dateTime       = new DateTime($tsk_initialTime);
  $tsk_dateTime->modify('+60 minutes');
  $tskinittime        = $tsk_dateTime->format('Y-m-d H:i:s');
  $alertmessage = 'Your Planner request approved time is : '.$apr_time .', and user planner time is 1 hour. Based on this time, user need to plan the task after '.$tskinittime .'.';
  if(!is_null($apr_time)):
  $dateTime = new DateTime($apr_time);
  $dateTime->modify('+60 minutes');
  $newTime = $dateTime->format('Y-m-d H:i:s');
  $todaysDateTime = date("Y-m-d") . ' 10:00:00';
  $todaysDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $todaysDateTime); // Corrected format string
  $apr_times = $apr_time;
  $apr_time = new DateTime($apr_time);
  $interval = $todaysDateTime->diff($apr_time);
  
  // Get the difference in total minutes
  $diffInMinutes = ($interval->h * 60) + $interval->i;
  
  $rmautoTasktime = 30;
  
  $plannerremTime = $plannerremTime - $diffInMinutes;
  //$plannerremTime = $plannerremTime + $rmautoTasktime;
  $userplanetime = $userplanetime - $diffInMinutes;
  // $userplanetime = $userplanetime + $rmautoTasktime;
  endif;
  }
  $checkHalfDayLeave = checkHalfDayLeave($uid,$adate);
  
  if(sizeof($checkHalfDayLeave) == 1){
  
      $userplaetime = $userplaetime/2;
      $plannerremTime = $plannerremTime/2;
  
  }
  if($totalttasktime >= $plannerremTime){

   
  
   
    $hours_tasktime = floor($totalttasktime / 60);
    $remainingMinutes_tasktime = $totalttasktime % 60;
    $timetexts =  "$hours_tasktime hours and $remainingMinutes_tasktime minutes";
    $timecolor = "green";
  }else{
    $remaintaktimeis = $plannerremTime - $totalttasktime;
    $hours_tasktime = floor($totalttasktime / 60);;
    $remainingMinutes_tasktime = $totalttasktime % 60;
    $timetexts = "$hours_tasktime hours and $remainingMinutes_tasktime minutes";
    $timecolor = "red";
  }
  ?>
<div card="card card3444 text-center">
  <center>
    <div class="text-effect p-2" data-content="<?= $timetexts ?>" style="background:green;color:white;">
      <span class="text-uppercase">Planned Time : <?= $timetexts ?></span>
    </div>
    <?php if($timecolor == "red"){ ?>
    <div class="text-effect1 mb-1 mt-1">
      <span class="text-capitalize font-weight-bold">
      <?php 
        $hours_tasktime = floor($remaintaktimeis / 60);;
        $remainingMinutes_tasktime = $remaintaktimeis % 60;
        $remaintaktime_is = "$hours_tasktime hours and $remainingMinutes_tasktime minutes";
         echo "<mark> Remaining Time to Enable Task Approval Feature :<span class='remening_time_cnt'> ".$remaintaktime_is."<span></mark>";
        ?></span>
    </div>
    <?php } ?>
  </center>
</div>
<style>
  /* .text-effect{
  color: <?= $timecolor; ?>;
  font-family: 'Dosis', sans-serif;
  font-size:24px;
  font-weight: 700;
  text-align: center;
  position: relative;
  }
  .remening_time_cnt{color:red;}
  mark{background:yellow;padding:4px;}
  @media only screen and (max-width: 990px){
  .text-effect{ font-size: 24px; }
  }
  @media only screen and (max-width: 767px){
  .text-effect{ font-size: 22px; }
  }
  @media only screen and (max-width: 576px){
  .text-effect{ font-size: 20px; }
  } */
</style>
<marquee class="p-2 mt-1" width="100%"  onMouseOver="this.stop()" onMouseOut="this.start()" behavior="left" bgcolor="pink">
  <h6> Lunch Time : <?= $lunchtime ?>  Miniute || Auto Task Time : <?= $autoTasktime?> Minutes || Tommorow Planner Planning : <?=$topp ?>  Minutes || 9 hours Planning = 9* 60 = 540 Minutes || Total Time For (Lunch + Auto Task + Tommorow Planner) : <?=$texpense_time?>  Minutes || Task Planner Should be <?php echo 540 - $texpense_time;?> Minutes</h6>
</marquee>
<marquee class="p-2 mt-1" width="100%"  onMouseOver="this.stop()" onMouseOut="this.start()" behavior="left" bgcolor="pink">
  <small><span><?= $alertmessage; ?></span></small>
</marquee>.
<div class="card bg-primary"  style="margin-top: 1px;">
  <div class="row">
    <div class="col-md-4 planerdflex">
      <?php
        $aptime = $this->Menu_model->GetTodaysAutoTaskANDPlanningTime($uid,date("Y-m-d"));
        $aptimecnt = sizeof($aptime);
        if($aptimecnt > 0){
          $start_tttpft = $aptime[0]->start_tttpft;
          $end_tttpft = $aptime[0]->end_tttpft;
          $timeArray = explode(':', $start_tttpft);
          // Assign the components to variables
          $phours = $timeArray[0];
          $pminutes = $timeArray[1];
          $pseconds = $timeArray[2];
          ?>
      <div class="mt-3">
        <p><b> <span id="yndpt">Todays Planner Time is :</span> <?=$start_tttpft; ?></b></p>
      </div>
      <?php } ?>
    </div>
    <div class="col-md-4 planerdflex">
      <strong> Plan Date : <?=$adate ?></strong>
    </div>
    <div class="col-md-4 planerdflex">
      <?php 
        $adatess        = date("Y-m-d");
        $next_date      = date('Y-m-d', strtotime('+1 day', strtotime($adatess)));
        $user_day       = $this->Menu_model->get_daystarted($uid,date("Y-m-d"));
        if(sizeof($user_day) > 0){
          $pinitiate_time = $user_day[0]->planner_initiate_time;
        ?>
      <strong> Planner Initiated Time : <?=$pinitiate_time ?></strong>
      <?php } ?>
    </div>
  </div>
</div>
<?php
  $reqCount = sizeof($getreqData);
  $getAutoTaskTime = sizeof($getAutoTaskTime);
  $approvel_status = $getreqData[0]->approvel_status;
  $oldPendTaskcnt = sizeof($oldPendTask);
  
  
  
  if($adate == date("Y-m-d") && $getAutoTaskTime == 0 || $adate !== date("Y-m-d")){ 
      if($getAutoTaskTime !==1){
      ?>
<div class="justify-content-center col-lg-12 col-md-12 col-sm-4 col-sm m-auto p-3">
  <div class="card">
    <div class="card-body" id="mainboxAutoTask1">
      <div class="row">
        <div class="col-md-6 card">
          <center>
            <h5><i>First Set Auto Task Time </i></h5>
          </center>
          <hr/>
          <marquee class="p-2 mt-1" width="100%"  onMouseOver="this.stop()" onMouseOut="this.start()" behavior="left" bgcolor="pink">
            <h6> Auto task time should be between 4:00 PM to 7:00 PM and maximum duration of 90 minutes. </h6>
          </marquee>
          <form method="post" action="<?=base_url();?>Menu/updateAtotaskTime">
            <div class="was-validated">
              <input type="hidden" id="userid" value="<?=$uid?>" name="bdid" required="">
              <div class="col-md-12 col-sm mt-3">
                <input type="hidden" class="form-control" id="ttype" name="ttype" Value="Auto Task" required="">
                <input type="hidden" class="form-control" name="pdate" value="<?=$adate?>" required="">
                <input type="hidden" name="ntuid" value="<?=$uid?>" required="">
                <div class="form-group">
                  <label for="start-time">Enter Start Time</label>
                  <input type="time" id="start-time" name="startautotasktime" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="end-time">Enter End Time</label>
                  <input type="time" id="end-time" name="endautotasktime" class="form-control" required>
                </div>
                <hr>
                <?php 
                  if($adate !== date("Y-m-d")){ 
                   $userdfrom = $this->Menu_model->userworkfrom(); ?>
                <div class="form-group">
                  <label>Select Your Tomorrow  Day</label>
                  <select name="userworkfrom" class="form-control">
                    <?php foreach($userdfrom as $udfrom){ ?>
                    <option value="<?= $udfrom->ID; ?>"><?= $udfrom->TYPE; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <?php } ?>
                <hr>
                <marquee class="p-2 mt-1" width="100%"  onMouseOver="this.stop()" onMouseOut="this.start()" behavior="left" bgcolor="pink">
                  <h6> Todays is the Time to plan for check tomorrow. Its maximum of 1 hour. After Auto Task</h6>
                </marquee>
                <div class="form-group">
                  <label for="end-time">Today is the start time to plan for tomorrow.</label>
                  <input type="time" readonly id="start_tttpft" name="start_tttpft" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="end-time">Today is the end time to plan for tomorrow.</label>
                  <input type="time" readonly id="end_tttpft" name="end_tttpft" class="form-control" required>
                </div>
                <center><button class="btn btn-primary m-3" type="submit" id="autoplan_submit">Submit</button></center>
              </div>
          </form>
          </div>
        </div>
        <div class="col-md-6" style="align-items: center; justify-content: center; display: flex ;">
          <img src="https://stemapp.in/assets/image/autotask3.png" class="img-fluid" alt="auto task image">
        </div>
      </div>
    </div>
  </div>
  <?php }}else if($adate == date("Y-m-d") || $approvel_status == '' || $approvel_status =='Reject'){
    if($reqCount !== 1 && $adate == date("Y-m-d")){
        $getPendingTaskreq = $this->Menu_model->GetUserRequestForPendingTask($uid,$adate);
        $getPendingTaskreqcnt = sizeof($getPendingTaskreq);
        if($getPendingTaskreqcnt > 0){
            $getPendingTaskreqappr = $getPendingTaskreq[0]->approvel_status;
          }
          ?>
  <div class="card p-2 m-1 bg-dark text-center planerdflex">
    <h5 class="text-white"><i>If you want to plan task for today, you need to take approval first.</i></h5>
  </div>
  <form class="was-validated card p-2" action="<?=base_url();?>Menu/RequestForTodaysTaskPlan/<?=$adate ?>" method="post">
    <input type="hidden" value="<?= $adate?>" name="setdatebyuser">
    <input type="hidden" value="<?= $oldPendTaskcnt?>" name="taskcnt">
    <div class="row">
      <div class="col-md-12">
        <label for="validationServer04" class="form-label">
        Why would you want to set up todays planner?
        </label>
        <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" name="would_you_want" required>
          <option selected disabled value="">Choose...</option>
          <option value="Planning urgent tasks for today">Planning urgent tasks for today</option>
          <option value="Planning yesterday pending tasks">Planning yesterday's pending tasks</option>
          <option value="Not planned yesterday due to network issues">Not planned yesterday due to network issues</option>
          <option value="Not planned yesterday due to health issues">Not planned yesterday due to health issues</option>
          <option value="Not planned yesterday due to an urgent meeting">Not planned yesterday due to an urgent meeting</option>
          <option value="Forgot to set up the planner yesterday">Forgot to set up the planner yesterday</option>
        </select>
        <div id="validationServer04Feedback" class="invalid-feedback">
          * Please select a valid state.
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label for="requestForTodaysTaskPlan" class="form-label">Type Reason : </label>
      <textarea class="form-control" name="requestForTodaysTaskPlan" id="requestForTodaysTaskPlan" required rows="3"></textarea>
      <div class="invalid-feedback">* Invalid Message</div>
    </div>
    <div class="mb-3 text-center">
      <input type="submit" class="btn btn-warning" onclick="this.form.submit(); this.disabled = true;" value="Send Request">
    </div>
  </form>
  <?php if($oldPendTaskcnt > 0 && ($getPendingTaskreqappr !== '1')){ ?>
  <hr>
  <div class="card p-2 text-center bg-danger">
    <h3 class="text-white" style="margin: 0;">Yesterday's Pending Task </h3>
  </div>
  <hr>
  <div class="table-responsive">
    <table id="example10" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">School Name</th>
          <th scope="col">School Status</th>
          <th scope="col">Task Type</th>
          <th scope="col">Task Date</th>
          <th scope="col">Action Taken</th>
          <th scope="col">Purpose Taken</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; foreach($oldPendTask as $data){
          $sname = $data->sname;
          $taskname = $data->taskname;
          $school_status = $data->school_status;
          ?>
        <tr>
          <th><?=$i?></th>
          <td><?= $sname ?></td>
          <td><?= $school_status ?></td>
          <td><?= $taskname ?></td>
          <td><?= $data->appointment_datetime ?></td>
          <td><?=$data->actontaken ?></td>
          <td><?=$data->purpose_achieved ?></td>
        </tr>
        <?php $i++; } ?>
      </tbody>
    </table>
  </div>
  <?php } ?>
  <?php } 
    }
      if($reqCount == 1 && $approvel_status == '' || $approvel_status =='Reject' ){
      ?>
  <table class="table table-bordered table-dark">
  <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Date</th>
        <th scope="col">Request Type</th>
        <th scope="col">Request Message</th>
        <th scope="col">Approvel Status</th>
        <th scope="col">Remarks</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($getreqData as $data){ ?>
      <tr>
        <th>1</th>
        <td><?= $this->Menu_model->get_userbyid($data->user_id)[0]->fullname ?></td>
        <td><?= $data->created_at ?></td>
        <td><?= $data->would_you_want ?></td>
        <td><?= $data->request_remarks ?></td>
        <td>
          <?php
            if($data->approvel_status == ''){ ?>
          <span class="p-1 bg-warning mr-2">Pending</span>
          <?php }else if($data->approvel_status == 'Approved'){ ?>
          <span class="p-1 bg-success mr-2">Approved</span>
          <?php }else{ ?>
          <span class="p-1 bg-danger mr-2">Reject</span>
          <?php }?>
        </td>
        <td><?=$data->remarks ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php }else if($getAutoTaskTime ==1 && $reqCount == 1 && $approvel_status == 'Approved' || $adate !== date("Y-m-d")){   
    if($getAutoTaskTime == 1){ ?>
</div>
<section class="content-planner">
  <div class="card-container-fluid" id="backgroundchange">
    <br>
    <div class="col-md-12 plantimer text-center p-2 mb-2" id="plantimerBox">
      <div class="row">
        <div class="col-md-2 pllanerseesioncnt planerdflex">
          <h3 id="PlannerSessionStimer" class="text-white d-flex"></h3>
        </div>
        <div class="col-md-8 planerdflex plantime-timer-text">
          <span id="timer">00:00:00</span>
        </div>
        <div class="col-md-2 stopbtntimer planerdflex">
          <button type="button" class="btn btn-danger" id="stop">Stop Planning</button>
        </div>
      </div>
    </div>
    <center>
      <hr class="hrclass" style="width: 600px;"/>
    </center>
    <div class="row">
      <div class="justify-content-center col-md-8" id="planningStartbtn" >
        <div class="card" style="min-height:100px;align-items: center; justify-content: center; display: flex;" >
          <div class="planningTime">
            <button type="button" class="btn btn-primary" id="start">Start Planning</button>
          </div>
        </div>
        <div class="table-responsive">
          <?php $planSessionData  = $this->Menu_model->TodaysPlannerSession($uid); ?>
          <?php $planSessionmin  = $this->Menu_model->TodaysTotalsPlannerSessioninMinute($uid); ?>
          <p class="text-center" > <b>Today's Total Time Spent in Planning : <?=$planSessionmin; ?></b> </p>
          <table id="example1_session" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="thead-dark">
              <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>End Date</th>
                <th>Total Consume Time</th>
                <th>Total Task</th>
                <th>Average time per task</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i =1;
                $planSessionData  = $this->Menu_model->TodaysPlannerSession($uid);
                $planSessionDatacnt = sizeof($planSessionData);
                $ky = 1;
                foreach($planSessionData as $req){
                  $username =  $this->Menu_model->get_userbyid($req->user_id)[0]->fullname;
                
                  $total_task = $this->Menu_model->TotalTaskBetweenTime($req->user_id, $adate, $req->pstime, $req->pctime);
                  $total_taskcnt = sizeof($total_task);
                  
                  // Convert total time to seconds
                  $totaltime = $req->totaltime;
                  list($hours, $minutes, $seconds) = explode(":", $totaltime);
                  $totaltime_in_seconds = $hours * 3600 + $minutes * 60 + $seconds;
                  
                  $average_hours = $average_minutes = $average_seconds = 0;
                  
                  // Check to prevent division by zero
                  if ($total_taskcnt > 0) {
                      // Calculate average time per task
                      $average_time_per_task = $totaltime_in_seconds / $total_taskcnt;
                  
                      // Convert average time back to hours, minutes, and seconds
                      $average_hours = floor($average_time_per_task / 3600);
                      $average_minutes = floor(($average_time_per_task % 3600) / 60);
                      $average_seconds = round($average_time_per_task % 60);
                  }
                  
                  // Now you can safely use $average_hours, $average_minutes, and $average_seconds
                                    
                  if($i==8){
                    $ky=1;
                  }
                  ?>
              <tr class="cat<?=$ky;?>">
                <td><?=$i; ?></td>
                <td><?=$username ?></td>
                <td><?=$req->psdatetime ?></td>
                <td><?=$req->pstime ?></td>
                <td><?=$req->pctime ?></td>
                <td><?=$req->pcdatetime ?></td>
                <td><?=$req->totaltime ?></td>
                <td> <a href="<?=base_url();?>Menu/CheckPlanTaskBetweenTimes/<?=$req->pstime ?>/<?=$req->pctime ?>"> <?=$total_taskcnt?></a></td>
                <td><?= sprintf("%02d:%02d:%02d", $average_hours, $average_minutes, $average_seconds); ?></td>
              </tr>
              <?php $i++; $ky++; } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="justify-content-center col-lg-4 col-sm-4" id="planningStart1">
        <div class="card custom-card" style="height: 100%;">
          <div class="card-header custom-card-header text-center" style="padding: 10px;">
            <h5 class="text-success">Task Planner</h5>
            <hr>
          </div>
          <div class="card-body">
            <div class="form-check" id="note">
              <?php 
                $dayStartFrom = getUserDayStartStatus($uid);
                // var_dump($dayStartFrom[0]->wffo);
                $wffo = $dayStartFrom[0]->wffo;
                
                if($wffo == 1){
                    $daystartedFrom = 'Office';
                }elseif ($wffo == 2) {
                    $daystartedFrom = 'Field';
                }else{
                    $daystartedFrom = 'Field + Office';
                }
                
                ?>
              <span><strong>** (You started you day from <span style="color:blue;"><?=$daystartedFrom?></span>. Filters will be available accordingly..!!)</strong></span>
            </div>
            <!-- <br> -->
          
            <?php  
              $current_date = date("Y-m-d");
              $tomorrow_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
              if($adate == $tomorrow_date){
              
              } ?>
            <?php 
              $getPendingTask       = $this->Menu_model->get_PendingTask($uid);
              $getoldPendingTask    = $this->Menu_model->get_OLDPendingTask($uid);
              $getpendSize          = sizeof($getPendingTask);
              $getoldPendingTaskcnt = sizeof($getoldPendingTask);
              
              
              
              
              
              
              
              // $reviewCount = 0;
              
              
            
              
              if($planbutnotinitedcnt > 0 && $adate !== date("Y-m-d")){ ?>
            <?php
              $task_request_type  = 'Plan But Not Initiated';
              $plandate = date("Y-m-d");
              $getPBNI            = $this->Menu_model->GetCreatePlannerRequestByUser($uid,$task_request_type,date("Y-m-d"));
              $getPBNI_cnt        = sizeof($getPBNI);
              
              $getPBNI_approved   = $getPBNI[0]->approved;
              if($getPBNI_cnt > 0 && $getPBNI_approved == 0 || $getPBNI_approved == 2){ 
                $getPBNI_request_id       = $getPBNI[0]->id;
                $getPBNI_request_type       = $getPBNI[0]->request_type;
                $getPBNI_approved           = $getPBNI[0]->approved;
                $getPBNI_request_date       = $getPBNI[0]->request_date;
                $getPBNI_created_at         = $getPBNI[0]->created_at;
                $getPBNI_task_count         = $getPBNI[0]->task_count;
                $getPBNI_request_remarks    = $getPBNI[0]->request_remarks;
                $getPBNI_approved_by        = $getPBNI[0]->approved_by;
                $getPBNI_approved_date      = $getPBNI[0]->approved_date;
                $getPBNI_request_user_id    = $getPBNI[0]->request_user_id;
                $getPBNI_approved_message   = $getPBNI[0]->approved_message;
              
                 ?>
            <hr>
            <div class="card p-2">
              <label class="text-center text-danger">* You still have a total of <?=$getpendSize;?> pending tasks.</label>
              <hr>
              <table class="table" style="font-size: 13px;">
                <tr class="table-primary">
                  <td><strong>Request BY -</strong></td>
                  <td><?= $this->Menu_model->get_userbyid($getPBNI_request_user_id)[0]->fullname;?></td>
                </tr>
                <tr class="table-primary">
                  <td><strong>Request Date -</strong></td>
                  <td><?=$getPBNI_created_at;?></td>
                </tr>
                <tr class="table-secondary">
                  <td><strong>Request Type -</strong></td>
                  <td><?=$getPBNI_request_type;?></td>
                </tr>
                <tr class="table-success">
                  <td><strong>Task Count for Planning at Request Time -</strong></td>
                  <td><?=$getPBNI_task_count;?> Task</td>
                </tr>
                <tr class="table-success">
                  <td><strong>Check Task -</strong></td>
                  <td>
                    <a href="<?=base_url().'Menu/CheckUserPendingTaskList/'.$getPBNI_request_id.'/'.$getPBNI_request_user_id.'/'.$getPBNI_request_date?>" target="_BLANK"><?=$getpendSize;?> Task</a>
                  </td>
                </tr>
                <tr class="table-info">
                  <td><strong>Request Remarks -</strong></td>
                  <td><?=$getPBNI_request_remarks;?></td>
                </tr>
                <tr class="table-primary">
                  <td><strong>Request Status -</strong></td>
                  <td><?php 
                    if($getPBNI_approved == 0){echo "<span class='bg-warning p-1'>Pending</span>";}elseif($getPBNI_approved == 2){echo "<span class='bg-danger p-1'>Reject</span>";}
                    ?></td>
                </tr>
                <tr class="table-primary">
                  <td><strong>Send Reminder -</strong></td>
                  <td>
                    <span class="bg-primary p-1 create-a-reminder" data-toggle="modal" data-target="#exampleModalReminder" style="cursor: pointer;">
                    <i class="fa-solid fa-bell"></i> Send&nbsp;Reminder
                    </span>
                  </td>
                </tr>
                <?php if($getPBNI_approved == 2) { ?>
                <tr class="table-primary">
                  <td><strong>Rejected By -</strong></td>
                  <td><?= $this->Menu_model->get_userbyid($getPBNI_approved_by)[0]->fullname;?></td>
                </tr>
                <tr class="table-primary">
                  <td><strong>Rejected Date -</strong></td>
                  <td><?= $getPBNI_approved_date;?></td>
                </tr>
                <tr class="table-primary">
                  <td><strong>Manager Message -</strong></td>
                  <td><?= $getPBNI_approved_message;?></td>
                </tr>
                <?php } ?>
              </table>
              <?php 
                if($getPBNI_approved == 0){?>
                <hr>
              <label class="text-center text-danger">* Please wait for approval; otherwise, complete your pending tasks from the calendar page.</label>
              <?php }else if($getPBNI_approved == 2){ ?>
              <label class="text-center text-danger">* Your manager has rejected your request. Please complete your pending tasks on the calendar page.</label>
              <?php } ?>
            </div>
            <?php }else if($getPBNI_cnt == 0){ ?>
            <hr>
            <form class="card text-center" method="post" action="<?=base_url().'Menu/CreatePlannerRequest'?>">
              <div class="form-group">
                <input type="hidden" name="request_type" value="Plan But Not Initiated">
                <input type="hidden" name="oldPendTaskcnt" value="<?=$getpendSize;?>">
                <input type="hidden" name="oldPendTask_date" value="<?=$adate;?>">
                <label class="text-center text-danger">* You have total <?=$getpendSize;?> pending tasks. Create a request for approval to plan your tasks; otherwise, complete your pending tasks from the calendar page.</label>
                <textarea class="form-control" rows="3" name="task_request_remarks" placeholder="* Type reson for approval to plan your old pending tasks." required></textarea>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary mb-2" style="height: 35px;box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">Create Request</button>
            </form>
            <?php }else{?>
            <div class="form-check">
              <label class="form-check-label custom-radio-label">
              <input type="radio" class="form-check-input" name="types_filter_radio" value="Plan But Not Initiated" >
              <span style="color:red;" data-toggle="tooltip" data-placement="left" title="This filter is active due to If user have any Today's pending task (User Planned But Not Initiated) " >Today's Pending Task - Plan But Not Initiated (<?= $getpendSize; ?>)</span>
              </label>
            </div>
            <?php } ?>
            <?php } else{
              // $oldPendTaskcnt = 0;
              ?>

            <?php if($oldPendTaskcnt > 0){ 
              //$plandate = date("Y-m-d");
              $task_request_type  = 'Old Pending Task';
              $plandate = date("Y-m-d");
              
              $getOPTR            = $this->Menu_model->GetCreatePlannerRequestByUser($uid,$task_request_type,$plandate);
              //echo $this->db->last_query();
              $getOPTR_cnt        = sizeof($getOPTR);
              $getOPTR_approved             = $getOPTR[0]->approved;
              if($getOPTR_cnt > 0 && $getOPTR_approved == 0 || $getOPTR_approved == 2){
                $getOPTR_request_id         = $getOPTR[0]->id;
                $getOPTR_request_type       = $getOPTR[0]->request_type;
                $getOPTR_approved           = $getOPTR[0]->approved;
                $getOPTR_request_date       = $getOPTR[0]->request_date;
                $getOPTR_created_at         = $getOPTR[0]->created_at;
                $getOPTR_task_count         = $getOPTR[0]->task_count;
                $getOPTR_request_remarks    = $getOPTR[0]->request_remarks;
                $getOPTR_approved_by        = $getOPTR[0]->approved_by;
                $getOPTR_approved_date      = $getOPTR[0]->approved_date;
                $getOPTR_request_user_id    = $getOPTR[0]->request_user_id;
                $getOPTR_approved_message   = $getOPTR[0]->approved_message;
                
                  ?>
            <hr>
            <div class="card p-2">
              <label class="text-center text-danger">* You still have a total of <?=$oldPendTaskcnt;?> old pending tasks.</label>
              <table class="table" style="font-size: 13px;">
                <tr class="table-primary">
                  <td><strong>Request BY -</strong></td>
                  <td><?=  $this->Menu_model->get_userbyid($getOPTR_request_user_id)[0]->fullname;?></td>
                </tr>
                <tr class="table-primary">
                  <td><strong>Request Date -</strong></td>
                  <td><?=$getOPTR_created_at;?></td>
                </tr>
                <tr class="table-secondary">
                  <td><strong>Request Type -</strong></td>
                  <td><?=$getOPTR_request_type;?></td>
                </tr>
                <tr class="table-success">
                  <td><strong>Task Count for Planning at Request Time -</strong></td>
                  <td><?=$getOPTR_task_count;?> Task</td>
                </tr>
                <tr class="table-success">
                  <td><strong>Check Task -</strong></td>
                  <td>
                    <a href="<?=base_url().'Menu/CheckUserPendingTaskList/'.$getOPTR_request_id.'/'.$getOPTR_request_user_id.'/'.$getOPTR_request_date?>" target="_BLANK"><?=$oldPendTaskcnt;?> Task</a>
                  </td>
                </tr>
                <tr class="table-info">
                  <td><strong>Request Remarks -</strong></td>
                  <td><?=$getOPTR_request_remarks;?></td>
                </tr>
                <tr class="table-primary">
                  <td><strong>Request Status -</strong></td>
                  <td><?php 
                    if($getOPTR_approved == 0){echo "<span class='bg-warning p-1'>Pending</span>";}elseif($getOPTR_approved == 2){echo "<span class='bg-danger p-1'>Reject</span>";}
                    ?></td>
                </tr>
                <tr class="table-primary">
                  <td><strong>Send Reminder -</strong></td>
                  <td>
                    <span class="bg-primary p-1 create-a-reminder" data-toggle="modal" data-target="#exampleModalReminder" style="cursor: pointer;">
                    <i class="fa-solid fa-bell"></i> Send&nbsp;Reminder
                    </span>
                  </td>
                </tr>
                <?php if($getOPTR_approved == 2) { ?>
                <tr class="table-primary">
                  <td><strong>Rejected By -</strong></td>
                  <td><?= $this->Menu_model->get_userbyid($getOPTR_approved_by)[0]->fullname;?></td>
                </tr>
                <tr class="table-primary">
                  <td><strong>Rejected Date -</strong></td>
                  <td><?= $getOPTR_approved_date;?></td>
                </tr>
                </tr>
                <tr class="table-primary">
                  <td><strong>Rejected Message -</strong></td>
                  <td><?= $getOPTR_approved_message;?></td>
                </tr>
                <?php } ?>
              </table>
              <?php 
                if($getOPTR_approved == 0){?>
                <hr>
              <label class="text-center text-danger">* Please wait for approval.</label>
              <?php }else if($getOPTR_approved == 2){ ?>
              <label class="text-center text-danger">* Your manager has rejected your request.</label>
              <?php } ?>
            </div>
            <?php }else if($getOPTR_cnt == 0){ ?>
            <hr>
            <form class="card text-center" method="post" action="<?=base_url().'Menu/CreatePlannerRequest'?>">
              <div class="form-group">
                <input type="hidden" name="request_type" value="Old Pending Task">
                <input type="hidden" name="oldPendTaskcnt" value="<?=$oldPendTaskcnt;?>">
                <input type="hidden" name="oldPendTask_date" value="<?=$adate;?>">
                <label class="text-center text-danger">* You have total <?=$oldPendTaskcnt;?> old pending tasks. Create a request for approval to plan your tasks.</label>
                <textarea class="form-control" rows="3" name="task_request_remarks" placeholder="* Type reson for approval to plan your old pending tasks." required></textarea>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary mb-2" style="height: 35px;box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">Create Request</button>
            </form>
            <?php }else{?>
            <div class="form-check">
              <label class="form-check-label custom-radio-label">
              <input type="radio" class="form-check-input" name="types_filter_radio" value="Old Pending Task">
              <span style="color:red;" data-toggle="tooltip" data-placement="left" title="This filter is active due to If user have any old pending task (User Planned But Not Completed) ">Old Pending Task (<?= $getoldPendingTaskcnt; ?>)</span>
              </label>
            </div>
            <?php } ?>
            <?php }else{ ?>


              <?php 
                $nextDay1 = date('Y-m-d', strtotime($adate . ' +1 day'));
                $nextDay2   = date('Y-m-d', strtotime($adate . ' +4 days'));
                $nextDay2Data     = $this->Menu_model->get_PendingTaskForTodayNext2Days($uid,$nextDay2);
                $nextDay2Datacnt  = sizeof($nextDay2Data);
   
                if($nextDay2Datacnt > 0){
                ?>
                <div class="form-check">
                  <label class="form-check-label custom-radio-label" title="Target Date">
                    <input type="radio" class="form-check-input" name="types_filter_radio" value="Target Date">
                    <span class="text-danger" data-toggle="tooltip" data-placement="left">Target Date (<?= $nextDay2Datacnt;?>)</span>
                  </label>
                </div>
                <?php }else{ ?>

                <?php  if($dep_id == 12){ ?>
                  <hr>
                <div class="form-check">
                  <label class="form-check-label custom-radio-label" title="Time Line Setting">
                    <input type="radio" class="form-check-input" name="types_filter_radio" value="Time Line Setting">
                    <span class="text-danger" data-toggle="tooltip" data-placement="left">Time Line Setting</span>
                  </label>
                </div>
                <?php  } ?>

              
               <?php $getFilters = $this->Menu_model->GetActivePlannerFilter(); ?>
              <hr>
              <?php foreach($getFilters as $getFilter){?>
                <div class="form-check">
                  <label class="form-check-label custom-radio-label" title="<?=$getFilter->filter_description?>">
                    <input type="radio" class="form-check-input" name="types_filter_radio" value="<?=$getFilter->filter_name?>">
                    <span class="text-primary" data-toggle="tooltip" data-placement="left"><?=$getFilter->filter_name?></span>
                  </label>
                </div>
              <?php }?>
              <?php } ?>
          <?php  }
              }?>
            <hr>
            <div class="card-header boxshadownew text-center">
              <b>Let's Start Creating Task for <span id="tasktype"></span></b>
                <!-- <hr>
                  <div class="text-center">
                    <img src="<?=base_url()?>assets/img/taskplanner2.png" width="200" alt="pendingtasklist" style="filter: drop-shadow(0 0 0.75rem crimson);">
                  </div>
                <hr> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-4" id="planningStart2" >
          <div class="card" style="height: 100%;">
                    <div class="card-body">
                      
                    <div id="OldPendingTaskCard">
                        <div class="mb-4">
                        <label for="oldpendingTasksList" class="form-label">Select Task Type</label>
                        <?php 
                       $oldpendingTasks =  $this->Menu_model->get_OLDPendingTaskType($uid);
                       $oldpendingTask_count = sizeof($oldpendingTasks);
                       if($oldpendingTask_count > 0){ 
                       ?>
                        <select id="oldpendingTasksList" class="form-select">
                            <option>Select</option>
                            <?php foreach ($oldpendingTasks as $oldpendingTask) { ?>
                                <option value="<?= $oldpendingTask->tasktype; ?>">
                                    <?= $oldpendingTask->tasktype; ?> (<?= $oldpendingTask->task_count; ?>)
                                </option>
                            <?php } ?>
                        </select>
                          <?php }?>
                      </div>
                      <div class="text-center">
                        <img src="<?=base_url()?>assets/img/pendingtasklist.jpg" width="200" alt="pendingtasklist">
                      </div>
                    </div>


                    <div id="todaysPendingTaskCard">
                        <div class="mb-4">
                        <label for="todayspendingTasksList" class="form-label">Select Task Type</label>
                        <?php 
                       $todaysoldpendingTasks =  $this->Menu_model->getTodaysPendingTaskType($uid);
                       $todaysoldpendingTask_count = sizeof($todaysoldpendingTasks);
                       if($todaysoldpendingTask_count > 0){ 
                       ?>
                        <select id="todayspendingTasksList" class="form-select">
                            <option>Select</option>
                            <?php foreach ($todaysoldpendingTasks as $todaysoldpendingTask) { ?>
                                <option value="<?= $todaysoldpendingTask->tasktype; ?>">
                                    <?= $todaysoldpendingTask->tasktype; ?> (<?= $todaysoldpendingTask->task_count; ?>)
                                </option>
                            <?php } ?>
                        </select>
                          <?php }?>
                      </div>

                      <div class="text-center">
                      <img src="<?=base_url()?>assets/img/pendingtasklist.jpg" width="200" alt="pendingtasklist">
                      </div>
                    </div>


                    <div id="projectCodeTaskCard">
                        <div class="mb-4">
                        <label for="projectCodeLists" class="form-label">Select Project Code</label>
                        <?php 
                       $projectCodeLists =  $this->Menu_model->GetProjectCodeByPiIDS($uid);
                       $projectCodeLists_count = sizeof($projectCodeLists);
                       if($projectCodeLists_count > 0){ 
                       ?>
                        <select id="projectCodeLists" class="form-select">
                            <option>Select</option>
                            <?php foreach ($projectCodeLists as $projectCodeList) { ?>
                                <option value="<?= $projectCodeList->project_code; ?>">
                                    <?= $projectCodeList->project_code; ?>
                                </option>
                            <?php } ?>
                        </select>
                          <?php }?>
                      </div>
                      <div class="text-center">
                      <img src="<?=base_url()?>assets/img/project_code.png" width="300" alt="projectCodeLists">
                      </div>
                    </div>


                    <div id="sPDOrSIDTaskCard">
                        <div class="mb-4">
                          <lable for="search_sid" class="form-label">Enter School Name Or SID</lable>
                          <?php $allSPDDatas = $this->Menu_model->GetAllSPDByUserID($uid); ?>
                          <input type="search" class="form-control" class="search" id="search_sid" placeholder="Search" list="data">
                          <datalist id="data">
                            <?php foreach($allSPDDatas as $allSPDData){ ?>
                            <option value="<?=$allSPDData->id?> - <?= $allSPDData->sname?>" />
                              <?php } ?>
                          </datalist>
                      </div>
                      <div class="text-center">
                      <img src="<?=base_url()?>assets/img/school.avif" width="300" alt="projectCodeLists">
                      </div>
                    </div>


                    <div id="school_status_Card">
                        <div class="mb-4">
                        <label for="school_status_list" class="form-label">Select Status</label>
                        <?php 
                       $school_status =  $this->Menu_model->get_status();
                       $school_status_cont = sizeof($school_status);
                       if($school_status_cont > 0){ 
                       ?>
                        <select id="school_status_list" class="form-select">
                            <option>Select</option>
                            <?php foreach ($school_status as $school_statuss) { ?>
                                <option value="<?= $school_statuss->id; ?>">
                                    <?= $school_statuss->name; ?>
                                </option>
                            <?php } ?>
                        </select>
                          <?php }?>
                      </div>
                      <div class="text-center">
                        <br>
                      <img src="<?=base_url()?>assets/img/status-icon-vector.jpg" width="200" alt="projectCodeLists">
                      </div>
                    </div>

                    <div id="school_task_action_card">
                        <div class="mb-4">
                        <label for="school_task_action_list" class="form-label">Select Task Action</label>
                        <?php 
                       $allTaskAtctions_cont = sizeof($allTaskAtctions);
                       if($allTaskAtctions_cont > 0){ 
                       ?>
                        <select id="school_task_action_list" class="form-select">
                            <option value="">Select</option>
                            <?php foreach ($allTaskAtctions as $allTaskAtction) { ?>
                                <option value="<?= $allTaskAtction->tasktype; ?>">
                                    <?= $allTaskAtction->tasktype; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php }?>
                        
                        <?php /*
                        <label for="school_status_list" class="form-label">Select Status</label>
                        <select id="school_status_list" class="form-select">
                            <option>Select</option>
                            <?php foreach ($school_status as $school_statuss) { ?>
                                <option value="<?= $school_statuss->id; ?>">
                                    <?= $school_statuss->name; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php */ ?>
                      </div>
                      <div class="text-center">
                        <br>
                      <img src="<?=base_url()?>assets/img/task_action.avif" width="200" alt="projectCodeLists">
                      </div>
                    </div>


                    <div id="school_region_card">
                        <div class="mb-4">
                        <label for="school_school_region_list" class="form-label">Select Region</label>
                        <?php 
                        
                       $getAllRegions =  $this->Menu_model->GetAllRegions();
                       $getAllRegions_cont = sizeof($getAllRegions);
                       if($getAllRegions_cont > 0){ 
                       ?>
                        <select id="school_school_region_list" class="form-select">
                            <option value="">Select</option>
                            <?php foreach ($getAllRegions as $getAllRegion) { ?>
                                <option value="<?= $getAllRegion->id; ?>">
                                    <?= $getAllRegion->name; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php }?>
                      </div>
                      <div class="text-center">
                        <br>
                      <img src="<?=base_url()?>assets/img/map-of-india-administrative-regions-india-map-vector.jpg" width="250" alt="map-of-india-administrative-regions-image-not-found">
                      </div>
                    </div>

                    <div id="school_zone_card">
                        <div class="mb-4">
                        <label for="school_school_zone_list" class="form-label">Select Zone</label>
                        <?php 
                       $getAllRegions =  $this->Menu_model->GetAllRegions();
                       $getAllRegions_cont = sizeof($getAllRegions);
                       if($getAllRegions_cont > 0){ 
                       ?>
                        <select id="school_school_zone_list" class="form-select">
                            <option value="">Select</option>
                            <?php foreach ($getAllRegions as $getAllRegion) { ?>
                                <option value="<?= $getAllRegion->id; ?>">
                                    <?= $getAllRegion->name; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php }?>
                      </div>
                      <div class="text-center">
                        <br>
                      <img src="<?=base_url()?>assets/img/map-of-india-administrative-regions-india-map-vector.jpg" width="250" alt="map-of-india-administrative-regions-image-not-found">
                      </div>
                    </div>

                    <div id="school_targte_date_card">
                    <div class="mb-4">
                        <label for="next2DaysPendingTasksList" class="form-label">Select Task Type</label>
                        <?php 
                        $nextDay2   = date('Y-m-d', strtotime($adate . ' +4 days'));
                       $next2DaysPendingTasks =  $this->Menu_model->get_PendingTaskForTodayNext2DaysTaskTypes($uid,$nextDay2);
                       $next2DaysPendingTasks_count = sizeof($next2DaysPendingTasks);
                       if($next2DaysPendingTasks_count > 0){ 
                       ?>
                        <select id="next2DaysPendingTasksList" class="form-select">
                            <option>Select</option>
                            <?php foreach ($next2DaysPendingTasks as $next2DaysPendingTask) { ?>
                                <option value="<?= $next2DaysPendingTask->tasktype; ?>">
                                    <?= $next2DaysPendingTask->tasktype; ?> (<?= $next2DaysPendingTask->task_count; ?>)
                                </option>
                            <?php } ?>
                        </select>
                          <?php }?>
                      </div>
                      <div class="text-center">
                        <br>
                      <img src="<?=base_url()?>assets/img/target_date.jpg" width="250" alt="map-of-india-administrative-regions-image-not-found">
                      </div>
                    </div>


                    <?php if($dep_id == 12){ ?>
                    <div id="timeline_settings_card">
                    <div class="mb-4">
                        <label for="timeline_settings_lists" class="form-label">Select Types of Timeline</label>
                        <?php 
                       $timelineTaskLists =  $this->Menu_model->get_task_action_list('Time Line',$uid);
                       
                       $timelineTaskListscnt = sizeof($timelineTaskLists);
                       if($timelineTaskListscnt > 0){ 
                       ?>
                        <select id="timeline_settings_lists" class="form-select">
                            <option>Select</option>
                            <?php foreach ($timelineTaskLists as $timelineTaskList) { ?>
                                <option value="<?= $timelineTaskList->tasktype; ?>">
                                    <?= $timelineTaskList->taskname; ?>
                                </option>
                            <?php } ?>
                        </select>
                          <?php }?>
                      </div>
                      <div class="text-center">
                        <br>
                      <img src="<?=base_url()?>assets/img/man-holding-clock-time-management-concept_23-2148823171.avif" width="250" alt="map-of-india-administrative-regions-image-not-found">
                      </div>
                    </div>
                    <?php } ?>




                    <div id="defaultTaskCard">
                        <h5 class="card-title">About Task Planner 2.0</h5>
                        <p class="card-text">
                          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum, est.
                        </p>
                        <!-- <p class="card-text">
                        Task Planner 2.0 is an advanced task management system designed for efficient planning and tracking of daily activities. It features an intuitive UI, smart reminders, and seamless collaboration tools to enhance productivity. Users can prioritize tasks, set deadlines, and monitor progress with real-time updates. With improved automation and analytics, Task Planner 2.0 ensures better workflow management for individuals and teams.
                        </p>
                        <hr>
                          <div class="text-center">
                            <img src="<?=base_url()?>assets/img/taskplanner2.png" width="200" alt="pendingtasklist" style="filter: drop-shadow(0 0 0.75rem crimson);">
                          </div>
                        <hr> -->
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                      
                    
                    
                    </div>
                  </div>
      </div>
      <div class="card col-lg-4 col-sm-4 p-2" id="content">
        <div class="card" id="taskplanningimg"  >
          <img src="https://stemapp.in/assets/image/planning1.jpg" alt="" >
        </div>
        <div class="card planerdflex" id="taskplanning_loader">
          <img src="<?=base_url()?>assets/assets/img/loader/loader.gif" width="100" alt="loader" >
        </div>
        <div class="card p-4" id="maintaskcard">
          <p id="demo" class="text-center text-danger font-weight-bold m-0 badge bg-label-danger p-2">Time Spent in Task Planning : 00:00:00</p>
          
          <form method="post" action="<?=base_url();?>Menu/PlanTaskUsingPlanner" id="myForm" >
            <div class="was-validated">

              <input type="hidden" id="pdate" value="<?=$adate?>" name="pdate" required=""> 
              <input type="hidden" readonly class="form-control" id="tptime" name="tptime" required="">

              <!-- <div class="form-group">
                <select class="form-control" id="getAvailableTime">
                  <option selected disabled>Get Available Time</option>
                  <option value="1">10:00 AM To 11:00 AM</option>
                  <option value="2">11:00 AM To 12:00 PM</option>
                  <option value="3">12:00 PM To 01:00 PM</option>
                  <option value="4">01:00 PM To 02:00 PM</option>
                  <option value="5">02:00 PM To 03:00 PM</option>
                  <option value="6">03:00 PM To 04:00 PM</option>
                  <option value="7">04:00 PM To 05:00 PM</option>
                </select>
                <div id="freeaslotDisplay" class="mt-2"></div>
                <div id="findbookedslot" class="mt-2"></div>
              </div> -->

              <hr>
              <div class="mb-4">
                  <label for="updatetasklists" class="form-label"> <span id="selectSpdTask">Select Task</span></label>
                  <select multiple="" name="updatetasklists[]" class="form-select" id="updatetasklists" required>
                  </select>
                  <small id="updatetasklists_text" class="font-weight-bold"></small>
                </div>
              <hr>
         
        
             
            <div id="task_action_card">
            <div class="mb-4">
                  <label for="taskTypeListByDepartmentID" class="form-label"><span>Select Task Type</span></label>
                 
                  <select id="taskTypeListByDepartmentID" name='task_action_type' class="form-select">
                            <option value="">Select</option>
                            <?php foreach ($allTaskAtctions as $allTaskAtction) {
                              // if($allTaskAtction->tasktype == 'Time Line'){
                              //   continue;
                              // }
                              
                              ?>
                                <option value="<?= $allTaskAtction->tasktype; ?>">
                                    <?= $allTaskAtction->tasktype; ?>
                                </option>
                            <?php } ?>
                        </select>
                </div>
              <hr>
              <div class="mb-4">
                  <label for="taskActionListByDepartmentID" class="form-label">Select Task Action</label>
                    <select id="taskActionListByDepartmentID" name='task_action_id' class="form-select">
                    </select>
                </div>
              <hr>
            </div>


              <input type="time" id="meeting-time" name="ptime" min="10:00" max="19:00" class="form-control" required=""> 
              <hr>
              <input type="hidden" class="form-control" value="" id="selectby" name="selectby">
              <input type="hidden" class="form-control" value="" id="check_data" name="check_data">
              <?php 
                if($timecolor == "red"){
                  $button_text = "Submit";
                }elseif($timecolor == "green"){
                  $button_text = "Request For Approval";
                }else{
                  $button_text = "Submit";
                }
                ?>
              <center><button class="btn btn-primary m-3" type="submit" id="planbtn1"><?= $button_text; ?></button></center>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php  if($plrequestcnt > 0){ 
      if(!is_null($apr_time)){
      ?>
      <hr>
    <div class="row mb-2 mt-2">
      <div class="col-md-4">
        <div class="card bg-primary text-white">
          <div class="card-body text-center">
            <h6 class="text-white">Planner Request Time :</h6>
            <span><?= $request_time; ?></span>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card bg-success text-white">
          <div class="card-body text-center">
            <h6 class="text-white">Planner Approved Time :</h6>
            <span><?php 
              if($apr_times == ''){
                echo 'Pending';
              }else{
                echo $apr_times;
              }
              ?></span>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card bg-danger text-white">
          <div class="card-body text-center">
            <h6 class="text-white">Late Approved Time:</h6>
            <span><?= $reqlateapr; ?></span>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <?php }} ?>
    <div class="card col-md-12 col-sm-12 border border-success" id="content">
      <div class="row mt-2">
        <div class="text-center"> <b><i>Total Time Spent in Task Planning : <?php echo $planSessionmin == '' ? "00:00:00" : $planSessionmin; ?></i></b></div>
        <div class="col-lg-4 col-sm-12">
          <center>
            <p class="m-auto" id="chart_div"></p>
          </center>
        </div>
        <div class="col-lg-4 col-sm-12" id="piechart1"></div>
        <div class="col-lg-4 col-sm-12" id="piechart2"></div>
      </div>
      <script>
        <?php 
          $totaltaktimep = $this->Menu_model->getUserTotalTaskTimeForTodays($uid,$adate); 
          $ttime = $totaltaktimep[0]->ttime; 
          $ttime = $ttime/60;
          $getPlannerSession = $this->Menu_model->GetPlannerSession($uid);
          $getPlannerSessioncnt = sizeof($getPlannerSession);
          if($getPlannerSessioncnt != 0){
          ?>
        var pageLoadTime = new Date().getTime() - 0;
        var x = setInterval(function() {
        var now = new Date().getTime();
        var timeSpent = now - pageLoadTime;
        var hours = Math.floor((timeSpent / 1000) / 3600);
        var minutes = Math.floor(((timeSpent / 1000) % 3600) / 60);
        var seconds = Math.floor((timeSpent / 1000) % 60);
        var formattedTimeSpent =
        (hours < 10 ? "0" : "") + hours + ":" +
        (minutes < 10 ? "0" : "") + minutes + ":" +
        (seconds < 10 ? "0" : "") + seconds;
        document.getElementById("demo").innerHTML = "Time Spent in Task Planning : " + formattedTimeSpent;
        document.getElementById("tptime").value=formattedTimeSpent;
        }, 1000);
        <?php
          }
          ?>
      </script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['gauge']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Planning', <?=$ttime?>]
        ]);
        var options = {
        redFrom: 0,
        redTo: 3,
        yellowFrom: 3,
        yellowTo: 6,
        greenFrom: 6,
        greenTo: 8,
        minorTicks: 4,
        max: 8
        };
        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
        chart.draw(data, options);
        }
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart2);
        function drawChart2() {
        var data = google.visualization.arrayToDataTable([
        ['Status', 'No of Task'],
        <?php $action = $this->Menu_model->GetTodaysTotalTaskActions($uid,$adate);
          foreach($action as $ac){?>
        ["<?=$ac->tasktype?> (<?=$ac->task_count?>)", <?=$ac->task_count?>],
        <?php } ?>
        ]);
        var options = {
        is3D: false,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
        }
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart4);
        function drawChart4() {
        var data = google.visualization.arrayToDataTable([
        ['Status', 'No of Task'],
        <?php $status = $this->Menu_model->GetTodaysTotalTaskStatus($uid,$adate);
          foreach($status as $st){?>
        ["<?=$st->name?> (<?=$st->task_count?>)", <?=$st->task_count?>],
        <?php } ?>
        ]);
        var options = {
        is3D: false,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
        }
      </script>
      <hr>
      <div>
        <style>
          .bg-beige{background: beige; padding: 5px;margin: 5px;}
        </style>
        <div id="accordion">
          <div class="card">
            <div class="text-center planerdflex p-2" style="color:white;background: beige;">
                <h5 style="padding: 0; margin: 0;">Tasks Planned for <span class="text-success"><?=$adate?></span></h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body" style="padding: 4px;"> 
              <div class="task-type-wise-data bg-beige">
                <hr>
                <?php $tted = $this->Menu_model->get_TodaysTaskTypes($uid,$adate);
                $badgeClasses = ["bg-primary", "bg-secondary", "bg-success", "bg-danger", "bg-warning", "bg-info", "bg-dark"];
                foreach ($tted as $index => $ted) { 
                    $badgeClass = $badgeClasses[$index % count($badgeClasses)]; // Cycle through classes
                ?>
                    <span class="badge <?= $badgeClass; ?>">
                        <?= $ted->tasktype; ?> 
                        <span class="badge bg-light text-dark"><?= $ted->event_count; ?></span>
                    </span>
                <?php } ?>
                <hr>
                </div>
                <?php /*
                <hr>
                <?php $tted = $this->Menu_model->get_TodaysTaskTypesAction($uid,$adate);
                $badgeClasses = ["bg-primary", "bg-secondary", "bg-success", "bg-danger", "bg-warning", "bg-info", "bg-dark"];
                foreach ($tted as $index => $ted) { 
                    $badgeClass = $badgeClasses[$index % count($badgeClasses)]; // Cycle through classes
                ?>
                    <span class="badge <?= $badgeClass; ?>">
                        <?= $ted->taskname; ?> 
                        <span class="badge bg-light text-dark"><?= $ted->event_count; ?></span>
                    </span>
                <?php } ?>
                <hr>
              <?php */ ?>


            <div class="status-wise-data bg-beige">
            <?php $tted = $this->Menu_model->get_TodaysTaskStatus($uid,$adate); 
              
                foreach ($tted as $index => $ted) { 
                    $badgeClass = $badgeClasses[$index % count($badgeClasses)]; // Cycle through classes
                ?>
                    <span class="badge <?= $badgeClass; ?>">
                        <?= $ted->name; ?> 
                        <span class="badge bg-light text-dark"><?= $ted->event_count; ?></span>
                    </span>
                <?php } ?>
            </div>



                <hr>
                <h5></h5>
                <?php $timeslot = $this->Menu_model->get_timeslot(); $jk=1; foreach($timeslot as $tl){
                  $t1 = $tl->time1;
                  $t2 = $tl->time2;
                  if($jk==8){
                    $jk=1;
                  }
                  ?>
                <div class="card border border-info m-2">
                  <div class="card-header cat<?=$jk;?>">
                      <div class="text-center" style="background: aliceblue; padding: 10px;">
                      <b><?=date("h:i A", strtotime($tl->time1));?> to <?=date("h:i A", strtotime($tl->time2));?></b>
                      </div>
                    </br>
                    <?php  $tted = $this->Menu_model->get_taskActionBetweenTime($uid,$adate,$t1,$t2); 
                    foreach ($tted as $index => $ted) { 
                    $badgeClass = $badgeClasses[$index % count($badgeClasses)]; // Cycle through classes
                    ?>
                    <span class="badge <?= $badgeClass; ?>">
                        <?= $ted->taskname; ?> 
                        <span class="badge bg-light text-dark"><?= $ted->event_count; ?></span>
                    </span>
                <?php } ?>

                    <hr>
                    <?php $status_ted = $this->Menu_model->get_taskStatusBetweenTime($uid,$adate,$t1,$t2); 
                      foreach ($status_ted as $index => $ted) { 
                        $badgeClass = $badgeClasses[$index % count($badgeClasses)]; // Cycle through classes
                        ?>
                        <span class="badge <?= $badgeClass; ?>">
                            <?= $ted->name; ?> 
                            <span class="badge bg-light text-dark"><?= $ted->event_count; ?></span>
                        </span>
                    <?php } ?>
                  </div>
                  <?php $totaltaktimep = $this->Menu_model->get_totaltaktimepbyh($uid,$adate,$t1,$t2);
                    // $ttime = $totaltaktimep[0]->ttime;.
                    $ttime = 540;
                    if($ttime>'120'){$bcolor="bg-success"; $msg="Great! You have been scheduled for full-time utilization.";}
                    elseif($ttime=='0'){$bcolor="bg-danger";$msg="Caution! Make sure to plan for this period.";}
                    else{$bcolor="bg-warning";$msg="Nice job! Consider planning additional tasks.";}
                    ?>
                  <div class="card-footer-planner p-2 text-center <?=$bcolor?> planerdflex" style="color: #000;"><b><?=$msg?></b></div>
                </div>
                <?php  $jk++; } ?>

           
                <?php if(sizeof($getplandt) > 0){ ?>
                <div class="card border border-info">
                  <div class="card-header">
                  <div class="text-center" style="background: aliceblue; padding: 10px;">
                    <b>AutoTask Time: <?=date("h:i A", strtotime($getplandt[0]->stime));?> to <?=date("h:i A", strtotime($getplandt[0]->etime));?></b>
                    </div>
                    </br>
                    <?php
                      $t1=$getplandt[0]->stime;
                      $t2=$getplandt[0]->etime;
                      
                      $autotaskLists = $this->Menu_model->GetTodaysTotalAutoTaskActions($uid,$adate,$t1,$t2);
                      foreach ($autotaskLists as $index => $autotaskList) { 
                        $badgeClass = $badgeClasses[$index % count($badgeClasses)]; // Cycle through classes
                        ?>
                        <span class="badge <?= $badgeClass; ?>">
                            <?= $autotaskList->tasktype; ?> 
                            <span class="badge bg-light text-dark"><?= $autotaskList->task_count; ?></span>
                        </span>
                    <?php } ?>
                    <hr>
                    <?php
                      $autotaskStatusLists = $this->Menu_model->GetTodaysTotalAutoTaskStatus($uid,$adate,$t1,$t2);
                      foreach ($autotaskStatusLists as $index => $autotaskStatusList) { 
                        $badgeClass = $badgeClasses[$index % count($badgeClasses)]; // Cycle through classes
                        ?>
                        <span class="badge <?= $badgeClass; ?>">
                            <?= $autotaskStatusList->name; ?> 
                            <span class="badge bg-light text-dark"><?= $autotaskStatusList->task_count; ?></span>
                        </span>
                    <?php } ?>
                  </div>
                  <?php
                    $totaltaktimep = $this->Menu_model->get_totaltaktimepbyh($uid,$adate,$t1,$t2);
                        // $ttime = $totaltaktimep[0]->ttime;
                        $ttime = 540;
                        if($ttime>'120'){$bcolor="bg-success"; $msg="Great! You have been scheduled for full-time utilization.";}
                        elseif($ttime=='0'){$bcolor="bg-danger";$msg="Caution! Make sure to plan for this period.";}
                        else{$bcolor="bg-warning";$msg="Nice job! Consider planning additional tasks.";}
                    ?>
                  <div class="card-footer-planner p-2 text-center <?=$bcolor?> planerdflex" style="color: #000;" ><b><?=$msg?></b></div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <hr>
          <center>
            <button class="btn btn-info" id="printPage">Print Page</button> <br><br>
            <p> <b> <span id="rtsyndp">Remaining Time to Start Your Next Days Planing:</span> <span  id="planertime"></span></b></p>
          </center>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" value="<?=$adate?>" id = "uplanedate">
  <input type="hidden" value="<?=$phours?>" id = "phours">
  <input type="hidden" value="<?=$pminutes?>" id = "pminutes">
  <input type="hidden" value="<?=$pseconds?>" id = "pseconds">
  <input type="hidden" value="<?=$totalttasktime?>" id = "totalttasktime">
  <input type="hidden" value="<?=$plannerremTime?>" id = "plannerremTime">
</section>
<?php  }
  }
  ?>


<!-- Modal Area -->

<!-- Extra Large Modal -->
<div class="modal fade" id="exLargeModalPlannerDocuments" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <img src="https://stemlearning.in/wp-content/uploads/2020/07/stem-new-logo-2-1.png" width="100" alt="logo">
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                 
                                <div class="card p-4" style="background: azure;">
                                <hr>
                                    <div class="text-center">
                                      <img src="http://localhost/stemoperations/assets/img/taskplanner2.png" width="200" alt="pendingtasklist" style="filter: drop-shadow(0 0 0.75rem crimson);">
                                    </div>
                                  <hr> 
                                  <p class="card-text">
                                    <strong>Task Planner 2.0</strong> is an advanced task management system designed for efficient planning and tracking of daily activities. It features an intuitive UI, smart reminders, and seamless collaboration tools to enhance productivity. Users can prioritize tasks, set deadlines, and monitor progress with real-time updates. With improved automation and analytics, Task Planner 2.0 ensures better workflow management for individuals and teams.
                                    </p>
                                    <p data-start="0" data-end="228"><strong data-start="0" data-end="20">Task Planner 2.0</strong> is a powerful task management system designed for seamless planning, tracking, and execution of tasks. It offers an intuitive UI, smart reminders, and real-time collaboration tools to enhance productivity.</p>
                                        <h3 data-start="230" data-end="253"><strong data-start="234" data-end="251">Key Features:</strong></h3>
                                        <p data-start="254" data-end="945">✅ <strong data-start="256" data-end="278">Advanced Filtering</strong> &ndash; Filter tasks based on priority, due dates, status, categories, and custom tags.<br data-start="360" data-end="363" /> ✅ <strong data-start="365" data-end="388" data-is-only-node="">Task Categorization</strong> &ndash; Organize tasks into projects, milestones, or personalized categories.<br data-start="460" data-end="463" /> ✅ <strong data-start="465" data-end="488">Automated Reminders</strong> &ndash; Get timely notifications for pending, overdue, and upcoming tasks.<br data-start="557" data-end="560" /> ✅ <strong data-start="562" data-end="583">Progress Tracking</strong> &ndash; Visualize task completion with real-time progress indicators.<br data-start="647" data-end="650" /> ✅ <strong data-start="652" data-end="679">Collaborative Workflows</strong> &ndash; Assign tasks, set dependencies, and track team contributions.<br data-start="743" data-end="746" /> ✅ <strong data-start="748" data-end="764">Custom Views</strong> &ndash; Toggle between list, kanban, and calendar views for better task management.<br data-start="842" data-end="845" /> ✅ <strong data-start="847" data-end="866">Powerful Search</strong> &ndash; Quickly locate tasks using keywords, filters, and advanced search queries.</p>
                                        <p data-start="947" data-end="1077" data-is-last-node="" data-is-only-node="">Task Planner 2.0 ensures streamlined task management with improved automation, smart insights, and an enhanced user experience! 🚀</p>

                                        <hr>
                                        <h3 data-start="0" data-end="35"><strong data-start="4" data-end="33">Old Pending Task &amp; Filter</strong></h3>
                                        <p data-start="37" data-end="237"><strong data-start="37" data-end="57">Old Pending Task</strong> &ndash; This feature helps users track and manage tasks that have been pending for a long time. It highlights overdue tasks, allowing users to take necessary actions to complete them.</p>
                                        <p data-start="239" data-end="466" data-is-last-node="" data-is-only-node=""><strong data-start="239" data-end="249">Filter</strong> &ndash; The filtering system enables users to sort tasks based on status, priority, category, due date, and more. It helps in quickly finding relevant tasks and improving productivity by focusing on the most critical work.</p>
                                        <hr>
                                        <h3 data-start="0" data-end="39"><strong data-start="4" data-end="37">Today's Pending Task &amp; Filter</strong></h3>
                                        <p data-start="41" data-end="187"><strong data-start="41" data-end="65">Today's Pending Task</strong> &ndash; Displays all tasks scheduled for today but not yet completed, helping users stay on track and prioritize urgent work.</p>
                                        <p data-start="189" data-end="353" data-is-last-node="" data-is-only-node=""><strong data-start="189" data-end="224">Filter - Plan But Not Initiated</strong> &ndash; This filter highlights tasks that have been planned but not yet started, ensuring better task management and timely execution.</p>
                                        <hr>

                                        <h3 data-start="0" data-end="31"><strong data-start="4" data-end="29">Project Code &amp; Filter</strong></h3>
                                        <hr>
                                        <p data-start="32" data-end="248"><strong data-start="32" data-end="48">Project Code</strong> &ndash; A unique identifier assigned to each project for easy tracking and management.<br data-start="129" data-end="132" /><strong data-start="132" data-end="142">Filter</strong> &ndash; Allows users to search tasks based on specific project codes to streamline workflow and organization.</p>
                                        <h3 data-start="250" data-end="280"><strong data-start="254" data-end="278">School Name &amp; Filter</strong></h3>
                                        <p data-start="281" data-end="500"><strong data-start="281" data-end="296">School Name</strong> &ndash; Refers to the educational institution associated with a particular task or project.<br data-start="382" data-end="385" /><strong data-start="385" data-end="395">Filter</strong> &ndash; Enables users to filter tasks related to a specific school for better task management and reporting.</p>
                                        <hr>
                                        <h3 data-start="502" data-end="527"><strong data-start="506" data-end="525">Status &amp; Filter</strong></h3>
                                        <p data-start="528" data-end="718"><strong data-start="528" data-end="538">Status</strong> &ndash; Indicates the current state of a task (e.g., Pending, In Progress, Completed).<br data-start="619" data-end="622" /><strong data-start="622" data-end="632">Filter</strong> &ndash; Helps users sort tasks based on their status to focus on pending or ongoing work.</p>
                                        <h3 data-start="720" data-end="747"><strong data-start="724" data-end="745">Category &amp; Filter</strong></h3>
                                        <hr>
                                        <p data-start="748" data-end="947"><strong data-start="748" data-end="760">Category</strong> &ndash; Groups tasks into different types such as Work, Personal, Urgent, etc.<br data-start="833" data-end="836" /><strong data-start="836" data-end="846">Filter</strong> &ndash; Allows users to filter tasks based on their category for better organization and prioritization.</p>
                                        <hr>
                                        <h3 data-start="949" data-end="979"><strong data-start="953" data-end="977">Task Action &amp; Filter</strong></h3>
                                        <p data-start="980" data-end="1183"><strong data-start="980" data-end="995">Task Action</strong> &ndash; Defines the specific action required to complete a task (e.g., Review, Approve, Follow-up).<br data-start="1089" data-end="1092" /><strong data-start="1092" data-end="1102">Filter</strong> &ndash; Helps users sort tasks based on action type to ensure smooth task execution.</p>
                                        <h3 data-start="1185" data-end="1210"><strong data-start="1189" data-end="1208">Region &amp; Filter</strong></h3>
                                        <hr>
                                        <p data-start="1211" data-end="1389"><strong data-start="1211" data-end="1221">Region</strong> &ndash; Represents the geographical area linked to a task or project.<br data-start="1285" data-end="1288" /><strong data-start="1288" data-end="1298">Filter</strong> &ndash; Enables users to filter tasks based on region, ensuring better regional task tracking.</p>
                                        <hr>
                                        <h3 data-start="1391" data-end="1415"><strong data-start="1395" data-end="1413">Zonal &amp; Filter</strong></h3>
                                        <p data-start="1416" data-end="1630" data-is-only-node="" data-is-last-node=""><strong data-start="1416" data-end="1425">Zonal</strong> &ndash; Specifies the zone or division associated with a task for administrative purposes.<br data-start="1510" data-end="1513" /><strong data-start="1513" data-end="1523">Filter</strong> &ndash; Allows users to filter tasks by zone to manage and monitor tasks efficiently across different locations.</p>

                                </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php require_once('planner.php');  ?>
<?php $this->load->view('footer'); ?>