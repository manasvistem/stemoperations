
<!-- Content wrapper -->
<div class="content-wrapper">
<style>
  .card-header.text-center {
  background: aliceblue;
  }
  .card-body {
  background: aliceblue;
  margin: 5px;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
  }
</style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card p-3">
    <div class="card-header text-center">
      <h3>Task Management</h3>
      <p> <?=$planner_date ?> </p>
      <p> <?=$planneruData[0]->fullname ?> </p>
    </div>
    <hr>
    <?php 
      $totalUserPlannedTaskTime = 0;
      
      // Iterate through the array and sum the task_time values
      foreach ($taskDatadatas as $task) {
          $totalUserPlannedTaskTime += $task->task_time;
      }
      
      
      // $totalUserPlannedTaskTime = 100;
      // Calculate hours and remaining minutes
      $userPlannedhours   = floor($totalUserPlannedTaskTime / 60);
      $userPlannedminutes = $totalUserPlannedTaskTime % 60;
      
      // Output the result
      $totleUserPlannedTimes              =  $userPlannedhours . " hours and " . $userPlannedminutes . " minutes.";
      $officialsPlanningTimes             =   " 9 hours";
      $officialsPlanningTimesinMinutes    =   540; // 9 hours Planning = 9* 60 = 540 Minutes 
      
      
      $lunchtime      = 30;                                                # Lunch Time 45 Miniute
      $autoTasktime   = 90;                                                #  90 Minutes For Auto Task
      $topp           = 60;                                                #  60 Minutes For Tommorow Planner Planning
      $texpense_time  = $lunchtime + $autoTasktime + $topp;                #  totol expense time
      $userplanetime  = $officialsPlanningTimesinMinutes - $texpense_time; #  total plan time  - 345 minutes
      $plannerremTime = $userplanetime - $totalUserPlannedTaskTime;
      
      
      $request    = $this->Menu_model->GetTodaysPlannerRequests($planner_user_id,$planner_date);
      
      $requestcnt = sizeof($request);
      if($requestcnt > 0){
      $apr_time       = $request[0]->apr_time;
      $request_time   = $request[0]->created_at;
      
      $req_datetime1  = new DateTime($request_time);
      $req_datetime2  = new DateTime($apr_time);
      // Calculate the difference in request approved
      $req_interval   = $req_datetime1->diff($req_datetime2);
      // Get the difference in hours and minutes in request approved
      $apr_hours      = $req_interval->h + ($req_interval->days * 24); // Total hours
      $apr_minutes    = $req_interval->i; // Remaining minutes
      $reqlateapr     = "$apr_hours hours and $apr_minutes minutes";
      
      
      
      
      if(!is_null($apr_time)){
      
          $tsk_initialTime    = $apr_time;
          $tsk_dateTime       = new DateTime($tsk_initialTime);
          $tsk_dateTime->modify('+60 minutes');
          $tskinittime        = $tsk_dateTime->format('Y-m-d H:i:s');
          
          $alertmessage = 'Planner request approved time is : '.$apr_time .', and user planner time is 1 hour. Based on this time, user need to plan the task after '.$tskinittime .'.';
      
      $dateTime = new DateTime($apr_time);
      $dateTime->modify('+60 minutes');
      $newTime = $dateTime->format('Y-m-d H:i:s');
      
      $todaysDateTime = $planner_date . ' 10:00:00';
      $todaysDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $todaysDateTime); // Corrected format string
      $apr_times = $apr_time;
      $apr_time = new DateTime($apr_time);
      $interval = $todaysDateTime->diff($apr_time);
      
      // Get the difference in total minutes
      $diffInMinutes = ($interval->h * 60) + $interval->i;
      $rmautoTasktime = 30;
      
      $plannerremTime = $plannerremTime - $diffInMinutes;
      // $plannerremTime = $plannerremTime + $rmautoTasktime;
      
      $userplanetime = $userplanetime - $diffInMinutes;
      // $userplanetime = $userplanetime + $rmautoTasktime;
      }
      }
      
      
    //   echo $userplanetime;
      
      // die;
      
      
      
      
      if($totalUserPlannedTaskTime  >=  $userplanetime){
          $plannerStatus                          = "Planner is on track";
          $remainingPlannedTime                   = abs($userplanetime - $totalUserPlannedTaskTime);
          $userremainingPlannedhours              = floor($remainingPlannedTime / 60);
          $userremainingPlannedminutes            = $remainingPlannedTime % 60;  
          $totleUserRemainingPlannePlannedTimes   =  $userremainingPlannedhours . " hours and " . $userremainingPlannedminutes . " minutes.";
          $class                                  = 'text-success';
          $borderClass                            = 'border-success';
          $textMessage                            = 'Extra';
          
      }else{
          $plannerStatus                          = "Planner is not on track";
          $remainingPlannedTime                   = $userplanetime - $totalUserPlannedTaskTime;
          $userremainingPlannedhours              = floor($remainingPlannedTime / 60);
          $userremainingPlannedminutes            = $remainingPlannedTime % 60;  
          $totleUserRemainingPlannePlannedTimes   =  $userremainingPlannedhours . " hours and " . $userremainingPlannedminutes . " minutes.";
          $class                                  = 'text-danger';
          $borderClass                            = 'border-danger';
          $textMessage                            = 'Remaining';
      }
      
      
      
      // echo $totalUserPlannedTaskTime;
      // echo "<br/>";
      // echo $userplanetime;
      
      if($totalUserPlannedTaskTime >= $userplanetime){    
          $background = 'bg-success';   
      }else{
          $background = 'bg-danger';
      }
      
      // dd($taskDatadatas);
      ?>


   
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



    <?php if($requestcnt > 0){ ?>
    <marquee class="p-2 mt-1" width="100%" onMouseOver="this.stop()" onMouseOut="this.start()" behavior="alternate" bgcolor="pink" scrollDelay="150">
      <h6><span><?= $alertmessage; ?></span></h6>
    </marquee>
    <?php } ?>
    <?php if ($totalUserPlannedTaskTime <= $userplanetime) { ?>         
    <marquee class="p-2 mt-1 <?=$background?>" onMouseOver="this.stop()" onMouseOut="this.start()" width="100%" behavior="alternate" bgcolor="pink" scrollDelay="150">
      <h6 class="text-white"> 
        <?php 
          $uprhours = floor($plannerremTime / 60);
          $uprremainingMinutes = $plannerremTime % 60;
          ?>
        <?= $uprhours ?> hour <?= $uprremainingMinutes ?> Minute remaining for task plan to enable Task Approval Function.
      </h6>
    </marquee>
    <?php } ?> 
    <marquee class="p-2 mt-1" width="100%" onMouseOver="this.stop()" onMouseOut="this.start()" behavior="alternate" bgcolor="pink" scrollDelay="150">
      <h6> 
        Lunch Time : <?= $lunchtime ?> Minutes || Auto Task Time : <?= $autoTasktime ?> Minutes || 
        Tomorrow Planner Planning : <?= $topp ?> Minutes || 9 hours Planning = 9 * 60 = 540 Minutes || 
        Total Time For (Lunch + Auto Task + Tomorrow Planner) : <?= $texpense_time ?> Minutes || 
        Task Planner Should be <?= 540 - $texpense_time ?> Minutes
      </h6>
    </marquee>
    <hr>
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row g-6">
        <div class="col-md-6 col-xl-4">
          <div class="card shadow-none bg-transparent border border-primary text-center">
            <div class="card-body">
              <h5 class="card-title text-primary">System Planning Time </h5>
              <p class="card-text text-primary">
                <?=$officialsPlanningTimes;?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card shadow-none bg-transparent border border-success text-center">
            <div class="card-body">
              <h5 class="card-title text-primary">User Planned Time </h5>
              <p class="card-text text-primary">
                <?=$totleUserPlannedTimes?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card shadow-none bg-transparent border <?=$borderClass?> text-center">
            <div class="card-body">
              <h5 class="card-title text-primary"><?=$textMessage?> Time</h5>
              <p class="card-text text-primary">
                <span class="<?=$class?>"><?=$totleUserRemainingPlannePlannedTimes?></span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php if($requestcnt > 0){ ?>
      <div class="row g-6 mt-1">
        <div class="col-md-6 col-xl-4">
          <div class="card shadow-none bg-transparent border border-primary text-center">
            <div class="card-body">
              <h5 class="card-title text-primary">Planner Request Time </h5>
              <p class="card-text text-primary">
                <span><?= $request_time; ?></span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card shadow-none bg-transparent border border-success text-center">
            <div class="card-body">
              <h5 class="card-title text-primary">Planner Approved Time </h5>
              <p class="card-text text-primary">
                <span><?= $apr_times; ?></span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card shadow-none bg-transparent border border-danger text-center">
            <div class="card-body">
              <h5 class="card-title text-primary">Late Approved Time</h5>
              <p class="card-text text-primary">
                <span><?= $reqlateapr; ?></spa>
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>


      <?php 
    $planSessionData  = $this->Menu_model->GetPlannerSessionByUidAndDate($planner_user_id,$planner_date);
    $planSessionmin   = $this->Menu_model->TodaysTotalsPlannerSessioninMinuteByUidAndDate($planner_user_id,$planner_date);
    ?>

<div class="row g-6 mt-1">
<div class="col-md-6 col-xl-6">
          <div class="card shadow-none bg-transparent border border-primary text-center">
            <div class="card-body">
              <h5 class="card-title text-primary">Planner Session </h5>
              <p class="card-text text-primary">
                <span><?= sizeof($planSessionData); ?></span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-6">
          <div class="card shadow-none bg-transparent border border-primary text-center">
            <div class="card-body">
              <h5 class="card-title text-primary">Time Consume on Planning</h5>
              <p class="card-text text-primary">
                <span><?= $planSessionmin; ?></spa>
              </p>
            </div>
          </div>
        </div>
</div>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <form action="<?=base_url();?>Menu/PlannerTaskApprovalDetailsPage/<?=$planner_date;?>/<?=$planner_user_id;?>" method="post" style="align-items: center; display: flex ; padding: 10px;">
            <div class="m-2">
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Select Date</label>
              <input class="form-control" type="date" name="planner_date" id="exampleFormControlReadOnlyInput1" value="<?=$planner_date;?>" required />
            </div>
            <div class="form-group text-center m-1 mt-4">
              <button type="submit" class="btn btn-success mt-2">Filter</button>
            </div>
          </form>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-3">
          <?php if($totalUserPlannedTaskTime >= $userplanetime){  ?>
          <form id="taskForm" action="<?=base_url();?>Menu/PlannerTaskApprovedOrReject" method="post" style="align-items: center; display: flex ; padding: 10px;">
            <div class="m-2">
              <input type="hidden" name="planner_date" value="<?=$planner_date;?>" />
              <input type="hidden" name="planner_user_id" value="<?=$planner_user_id;?>" />
              <label for="exampleFormControlReadOnlyInput1" class="form-label">Select Approve/Reject</label>
              <select class="form-control form-select formselect" aria-label="Default select example" name="status" required >
                <option selected="" value="">Select</option>
                <option value="1">Approve</option>
                <option value="2">Reject</option>
              </select>
            </div>
            <div class="form-group text-center m-1 mt-4">
              <button type="submit" class="btn btn-success mt-2" id="approve_reject_btn">Submit</button>
            </div>
            <?php }else{ ?>
            <div class="card shadow-none bg-transparent border text-center">
              <div class="card-body">
                <p class="card-text text-primary">
                  <span class="text-danger"> * User have not enough time to approve/reject task</spa>
                </p>
              </div>
            </div>
            <?php } ?>
        </div>
      </div>
    </div>
    <hr>
    <div class="container p-2" style="min-height: 50vh;background: beige;">
    <div class="table-responsive">
    <table class="table table-striped" id="example1_session_data">
    <thead class="thead-dark">
    <tr>
    <th>S No.</th>
    <th>School Name</th>
    <th>Task Type</th>
    <th>Task Name</th>
    <th>Appointment Date</th>
    <th>select by</th>
    <th>Task Status</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody class="table-border-bottom-0">
    <?php $i=1; foreach($taskDatadatas as $taskDatadata){?>
        <tr>
            <td><?=$i?></td>
            <td><?=$taskDatadata->sname?></td>
            <td><?=$taskDatadata->tasktype?></td>
            <td><?=$taskDatadata->taskname?></td>
            <td><?=$taskDatadata->appointment_datetime?></td>
            <td><?=$taskDatadata->selectby?></td>
            <td><?php 

           
            if($taskDatadata->approved_status == 0){
                echo "<span class='bg-warning p-1 text-white'>Pending<span>";
            }else if($taskDatadata->approved_status == 1){
                echo "<span class='bg-success p-1 text-white'>Approved<span>";
            }else if($taskDatadata->approved_status == 2){
                echo "<span class='bg-danger p-1 text-white'>Reject<span>";
            }
            ?></td>
            <td>
            <?php 
            if($taskDatadata->approved_status == 0){ ?>
            <div class="form-check">
                <input class="form-check-input select-checkbox" type="checkbox" name="task_id[]" value="<?=$taskDatadata->task_id;?>">
            </div>
            <?php }else if($taskDatadata->approved_status == 1){
                echo "<span class='bg-success p-1 text-white'>Approved<span>";
            }else if($taskDatadata->approved_status == 2){
                echo "<span class='bg-danger p-1 text-white'>Reject<span>";
            }
            ?></td>
        </tr>
    <?php $i++;} ?>
    </tbody>
    </table>
    
    </form>
    </div>


    <div class="card">
    <hr>
          <center>
            <button class="btn btn-info" id="printPage">Print Page</button> <br><br>
          </center>
    </div>

    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
    // Initialize DataTable
    var table = $('#example1_session_data').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'excelFlash', 'excel', 'pdf', 'print'],
        paging: true,
        pageLength: 10,
        ordering: true,
        searching: true,
        columnDefs: [
            { orderable: false, targets: 0 } // Disable sorting on the checkbox column
        ]
    });

    // Handle checkbox state across pagination
    table.on('page', function () {
        $('.select-checkbox').prop('checked', true);
        console.log("okay");
    });

    // Handle form submission
    $('#taskForm').on('submit', function(event) {
        // You can add custom validation or processing here if needed
        // event.preventDefault(); // Uncomment if you want to prevent default submission
    });
});



$(document).ready(function () {
    var table = $('#example1_session_data').DataTable(); // Initialize DataTable
    var selectedCheckboxes = new Set(); // Store selected checkboxes

    // Handle checkbox selection
    $(document).on('change', '.select-checkbox', function () {
        var value = $(this).val();
        if ($(this).is(':checked')) {
            selectedCheckboxes.add(value);
        } else {
            selectedCheckboxes.delete(value);
        }
    });

    // Restore checkboxes on page change
    table.on('draw', function () {
        $('.select-checkbox').each(function () {
            var value = $(this).val();
            if (selectedCheckboxes.has(value)) {
                $(this).prop('checked', true);
            }
        });
    });

    // Handle form submission
    $('#taskForm').on('submit', function () {
        // event
        // event.preventDefault();
        var btn = $('#approve_reject_btn');
        btn.prop('disabled', true).text('Please wait...');
        var selectedValues = Array.from(selectedCheckboxes);
        $('<input>').attr({
            type: 'hidden',
            name: 'selected_task_id',
            // value: JSON.stringify(selectedValues)
            value: selectedValues
        }).appendTo(this);
    });


    $("#printPage").click(function() {
              window.print();
          });
});


</script>
</script>
