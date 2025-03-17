<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                  <h4></h4> 
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<p class="text-primary m-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
    Dashboard Data Analysis
</p>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
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
      </h5>
      <div class="row">
        <div class="col-md-12">
          <!-- <h6 class="text-muted p-3">Filled Pills</h6> -->
          <div class="nav-align-top mb-6">
            <ul class="nav nav-pills mb-4 nav-fill" role="tablist">
              <?php  
           
               // $getTodaysTaskCounts = $this->Menu_model->GetTodaysAllTaskCountByUid($uid, date("Y-m-d"), $utype);
               // dd($getTodaysTaskCounts);
                $firstTab = true; // Track first tab
                $count = 0;
                foreach ($getTodaysTaskCounts as $getTodaysTaskCount){
                    $formatted_string = preg_replace("/[ \/'-]+/", "_", $getTodaysTaskCount->tasktype);
                   // if($getTodaysTaskCount->task_count !=0){
                ?>
              <li class="nav-item mb-1 mb-sm-0" role="presentation">
                <button type="button" 
                  class="nav-link <?= $firstTab ? 'active' : '' ?>" 
                  role="tab" 
                  data-bs-toggle="tab" 
                  data-bs-target="#<?= $formatted_string ?>" 
                  aria-controls="<?= $formatted_string ?>" 
                  aria-selected="<?= $firstTab ? 'true' : 'false' ?>" 
                  tabindex="-1">
                <span class="d-none d-sm-block">
                <i class="tf-icons bx bx-home bx-sm me-1.5 align-text-bottom"></i> 
                <?= $getTodaysTaskCount->tasktype ?>
                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1.5 pt-50">
                <?= $getTodaysTaskCount->task_count ?>
                </span>
                </span>
                <i class="bx bx-home bx-sm d-sm-none"></i>
                </button>
              </li>
              <?php 
                $firstTab = false; // Set to false after first iteration
                // }
                // else{
                //   $count ++;
                // }
               }
                ?>
              <li class="nav-item" role="presentation">
                <button type="button" class="nav-link" role="tab" 
                  data-bs-toggle="tab" 
                  data-bs-target="#navs-pills-justified-messages" 
                  aria-controls="navs-pills-justified-messages" 
                  aria-selected="false" 
                  tabindex="-1">
                <span class="d-none d-sm-block">
                <i class="tf-icons bx bx-message-square bx-sm me-1.5 align-text-bottom"></i> Messages
                </span>
                <i class="bx bx-message-square bx-sm d-sm-none"></i>
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <?php 
                $firstPane = true; // Track first tab content
                foreach ($getTodaysTaskCounts as $getTodaysTaskCount){
                    $slct_type_of_task = $getTodaysTaskCount->tasktype;
                    //echo  $getTodaysTaskCount->tasktype."<br>";
                    $formatted_string = preg_replace("/[ \/'-]+/", "_", $getTodaysTaskCount->tasktype);
                ?>
              <div class="tab-pane fade <?= $firstPane ? 'show active' : '' ?>" 
                id="<?= $formatted_string ?>" 
                role="tabpanel">
                <div class="row">
                  <div class="col-lg-12">
                    <small class="text-light fw-medium">Custom content</small>
                        <div class="mt-4">
                        <div class="list-group">
                        <?php 
                          $i=1;
                         // dd($getTodaysTasks);
                          foreach($getTodaysTasks as $sctasklist){
                            $task_id              = $sctasklist->task_id;
                            $appointment_datetime = $sctasklist->appointment_datetime;
                            $sname                = $sctasklist->sname;
                            $tasktype             = $sctasklist->tasktype;
                            $task_action          = $sctasklist->task_action;
                            $taskname             = $sctasklist->taskname;
                            $comments             = $sctasklist->comments;
                            $bd_idetype           = $sctasklist->bd_idetype;
                            $target_date          = $sctasklist->target_date;
                            $expected_date        = $sctasklist->expected_date;
                            $fwd_date             = $sctasklist->fwd_date;
                            // echo $slct_type_of_task;
                            // echo "<br>";
                            // echo $tasktype;
                          if($slct_type_of_task === $tasktype){ 
                            ?>
                          <a data-task_id="<?=$task_id;?>" class="list-group-item list-group-item-action flex-column align-items-start active mb-1 taskperformaction" >
                            <div class="d-flex justify-content-between w-100">
                            <input type="hidden" id="tasktype_<?=$task_id;?>"  name="tasktype" value="<?=$tasktype?>"/>
                            <input type="hidden" id="tasktype_id_<?=$task_id;?>" name="tasktype_id" value="<?= $task_action?>"/>
                            <h5 class="mb-1"><?=$sname.' - '.$taskname; ?></h5>
                           <small> <span id="countdown1"></span> - <span id="status1"></span> </small> 
                            </div>
                          <?php 
                         // dd($data);
                          ?>
                        <small> <span id="countdown<?=$task_id;?>"></span> - <span id="status<?=$task_id;?>"></span>  
                        </small>
                        </a>
                       <script> //  checkCountDownTime("<?=$fwd_date;?>",<?=$type_of_task;?>);</script> 
                        <?php $i++;
                          }
                        } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php 
              
                $firstPane = false; // Set to false after first iteration
                      }
                ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6">
  <!-- <small class="text-light fw-medium">Vertically centered</small> -->
  <div class="mt-4">
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
    Launch modal
    </button> -->
    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document" id="submodal">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
           <div class="modal-body" id="taskModal">
           </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <div class="card">
                            <div class="card-header bg-info" id="headingOne" data-toggle="collapse" data-target="#collapse0911" aria-expanded="true" aria-controls="collapse0911">
                                                                    <b>9:00 AM to 11:00 AM</b><br>
                                  Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Meeting(0) | Proposal(0) | Other(0)
                            </div>
                            <div id="collapse0911" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                                                </div>
                            </div>
                          </div>
                    </div>
      </div>
      <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <div class="card">
                            <div class="card-header bg-light" id="headingOne" data-toggle="collapse" data-target="#collapse0911" aria-expanded="true" aria-controls="collapse0911">
                                                                    <b>11:00 AM to 1:00 PM</b><br>
                                  Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Meeting(0) | Proposal(0) | Other(0)
                            </div>
                            <div id="collapse0911" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                                                </div>
                            </div>
                          </div>
                    </div>
      </div>
      <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <div class="card">
                            <div class="card-header bg-info" id="headingOne" data-toggle="collapse" data-target="#collapse0911" aria-expanded="true" aria-controls="collapse0911">
                                                                    <b>1:00 PM to 3:00 PM</b><br>
                                  Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Meeting(0) | Proposal(0) | Other(0)
                            </div>
                            <div id="collapse0911" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                                                </div>
                            </div>
                          </div>
                    </div>
      </div>
      <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <div class="card">
                            <div class="card-header bg-light" id="headingOne" data-toggle="collapse" data-target="#collapse0911" aria-expanded="true" aria-controls="collapse0911">
                                                                    <b>3:00 PM to 5:00 PM</b><br>
                                  Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Meeting(0) | Proposal(0) | Other(0)
                            </div>
                            <div id="collapse0911" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                                                </div>
                            </div>
                          </div>
                    </div>
      </div>
      <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <div class="card">
                            <div class="card-header bg-info" id="headingOne" data-toggle="collapse" data-target="#collapse0911" aria-expanded="true" aria-controls="collapse0911">
                                                                    <b>5:00 PM to 7:00 PM</b><br>
                                  Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Meeting(0) | Proposal(0) | Other(0)
                            </div>
                            <div id="collapse0911" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                                                </div>
                            </div>
                          </div>
                    </div>
      </div>
      
      </div>
      <div class="card card-primary card-outline card-outline-tabs">
                <h4 class="p-3">Today's Completed Task</h4>
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                   <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">
                        All <span class="badge badge-success">0</span>
                    </a>
                    
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-call-tab" data-toggle="pill" href="#custom-tabs-four-call" role="tab" aria-controls="custom-tabs-four-call" aria-selected="false">
                        Call <span class="badge badge-success">0</span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-email-tab" data-toggle="pill" href="#custom-tabs-four-email" role="tab" aria-controls="custom-tabs-four-email" aria-selected="false">
                        Email <span class="badge badge-success">0</span>
                    </a>
                  </li>
                  

                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-whatsapp-tab" data-toggle="pill" href="#custom-tabs-four-whatsapp" role="tab" aria-controls="custom-tabs-whatsapp" aria-selected="false">
                        Whatsapp<span class="badge badge-success">0</span>
                    </a>
                  </li>
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-visit-tab" data-toggle="pill" href="#custom-tabs-four-visit" role="tab" aria-controls="custom-tabs-four-visit" aria-selected="false">
                        Visit <span class="badge badge-success">0</span>
                    </a>
                  </li>
                  
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-utilisation-tab" data-toggle="pill" href="#custom-tabs-four-utilisation" role="tab" aria-controls="custom-tabs-utilisation" aria-selected="false">
                        Utilisation<span class="badge badge-success">0</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-report-tab" data-toggle="pill" href="#custom-tabs-four-report" role="tab" aria-controls="custom-tabs-four-report" aria-selected="false">
                        Report <span class="badge badge-success">0</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-other-tab" data-toggle="pill" href="#custom-tabs-four-other" role="tab" aria-controls="custom-tabs-four-other" aria-selected="false">
                        Other <span class="badge badge-success">0</span>
                    </a>
                  </li>
                </ul>
                
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <div class="card">
                            <div class="card-header bg-info" id="headingOne" data-toggle="collapse" data-target="#collapse0911" aria-expanded="true" aria-controls="collapse0911">
                                                                    <b>9:00 AM to 11:00 AM</b><br>
                                  Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Visit(0) | Utilisation(0) | Report(0) | Other(0)
                            </div>
                            <div id="collapse0911" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                                                </div>
                            </div>
                          </div>
                          
                         <div class="card">
                                <div class="card-header bg-light" id="headingTwo" data-toggle="collapse" data-target="#collapse1113" aria-expanded="false" aria-controls="collapse1113">
                                                                            <b>11:00 AM to 01:00 PM</b><br>
                                      Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Visit(0) | Utilisation(0) | Report(0) | Other(0)
                                </div>
                                <div id="collapse1113" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                  <div class="card-body">
                                                                     </div>
                                </div>
                              </div> 
                              <div class="card">
                                <div class="card-header bg-info" id="headingThree" data-toggle="collapse" data-target="#collapse1315" aria-expanded="false" aria-controls="collapse1315">
                                                                            <b>01:00 PM to 03:00 PM</b><br>
                                      Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Visit(0) | Utilisation(0) | Report(0) | Other(0)
                                </div>
                                <div id="collapse1315" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                                                      </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header bg-light" id="headingThree" data-toggle="collapse" data-target="#collapse1517" aria-expanded="false" aria-controls="collapse1517">
                                                                            <b>03:00 PM to 05:00 PM</b><br>
                                      Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Visit(0) | Utilisation(0) | Report(0) | Other(0)
                                </div>
                                <div id="collapse1517" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                                                      </div>
                                </div>
                              </div>
                              
                              <div class="card">
                                <div class="card-header bg-info" id="headingThree" data-toggle="collapse" data-target="#collapse1719" aria-expanded="false" aria-controls="collapse1719">
                                                                            <b>05:00 PM to 07:00 PM</b><br>
                                      Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Visit(0) | Utilisation(0) | Report(0) | Other(0)
                                </div>
                                <div id="collapse1719" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                                                      </div>
                                </div>
                              </div>
                              
                              <div class="card">
                                <div class="card-header bg-light" id="headingThree" data-toggle="collapse" data-target="#collapse9121" aria-expanded="false" aria-controls="collapse9121">
                                                                            <b>19:00 PM to 21:00 PM</b><br>
                                      Total Task 0 | Call(0) | Email(0) | Whatsapp(0) | Visit(0) | Utilisation(0) | Report(0) | Other(0)
                                </div>
                                <div id="collapse9121" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                                                     </div>
                                </div>
                              </div>
                      
                      
                  </div>
                      
                  <div class="tab-pane fade" id="custom-tabs-four-call" role="tabpanel" aria-labelledby="custom-tabs-four-call-tab">
                                        </div>
                  <div class="tab-pane fade" id="custom-tabs-four-email" role="tabpanel" aria-labelledby="custom-tabs-four-email-tab">
                      
                                            
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-whatsapp" role="tabpanel" aria-labelledby="custom-tabs-four-whatsapp-tab">
                      
                                           
                  </div>    
                      
                  <div class="tab-pane fade" id="custom-tabs-four-visit" role="tabpanel" aria-labelledby="custom-tabs-four-visit-tab">
                      
                                        </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-four-utilisation" role="tabpanel" aria-labelledby="custom-tabs-four-utilisation-tab">
                                        </div>
                  
                   <div class="tab-pane fade" id="custom-tabs-four-report" role="tabpanel" aria-labelledby="custom-tabs-four-report-tab">
                      
                   </div>
                      
                   <div class="tab-pane fade" id="custom-tabs-four-other" role="tabpanel" aria-labelledby="custom-tabs-four-other-tab">
                      
                      
                  </div>
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  
  function checkCountDownTime(first_date, givenid) {
    var targetDate = new Date(first_date).getTime();

    function updateTimer() {
        var now = new Date().getTime();
        var diff = targetDate - now;
        var isPast = diff < 0; // Check if the date is in the past
        diff = Math.abs(diff); // Always take absolute value for calculations

        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((diff % (1000 * 60)) / 1000);

        var countdownText = [];
        if (days > 0) countdownText.push(days + " days");
        if (hours > 0) countdownText.push(hours + " hours");
        if (minutes > 0) countdownText.push(minutes + " minutes");
        if (seconds > 0) countdownText.push(seconds + " seconds");

        var countdownElement = document.getElementById("countdown" + givenid);
        var statusElement = document.getElementById("status" + givenid);

        if (isPast) {
            countdownElement.textContent = countdownText.join(", ");
            countdownElement.classList.add("late");
            statusElement.textContent = "Late";
            statusElement.classList.remove("on-time");
            statusElement.classList.add("late");
        } else {
            countdownElement.textContent = countdownText.join(", ");
            countdownElement.classList.add("on-time");
            statusElement.textContent = "On Time";
            statusElement.classList.remove("late");
            statusElement.classList.add("on-time");
        }
    }

    setInterval(updateTimer, 1000);
    updateTimer();
}
  $(document).ready(function() {
    // When an element with class 'taskperformaction' is clicked
    // alert($(this).val());
    // return false;
    $("#modalCenterTitle").html();
    $('.taskperformaction').on('click', function() {
        var taskId      = $(this).data('task_id'); // Retrieve the 'task_id' data
        var tasktype    = $("#tasktype_"+taskId).val();
        var tasktype_id = $("#tasktype_id_"+taskId).val();
        //alert(taskId+"=="+tasktype+"=="+tasktype_id);return false;
        $.ajax({
                         url: '<?=base_url();?>Menu/taskExecution/',
                        type: "POST",
                        data: {
                               taskId       : taskId ,
                               tasktype     : tasktype,
                               tasktype_id  : tasktype_id
                              },
                        cache: false,
                        success: function (response){
                     // alert(response);
                          $('#modalCenter').modal('show');
                          $("#taskModal").html(response);
                        }
                });
       // $('#maintenanceModal').modal('show');
       // $('#modalCenterTitle').text("Task ID IS = "+taskId);
    });
});
</script>
<?php // $this->load->view('footer'); ?>
