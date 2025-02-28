<?php $this->load->view('nav'); ?>
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
                $getTodaysTaskCounts = $this->Menu_model->GetTodaysAllTaskCountByUid($uid, date("Y-m-d"), 'PIA');
                $firstTab = true; // Track first tab
            
                $count =0;
                foreach ($getTodaysTaskCounts as $getTodaysTaskCount):
                    $formatted_string = preg_replace("/[ \/'-]+/", "_", $getTodaysTaskCount->tasktype);
                    if($getTodaysTaskCount->task_count !=0){
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
                    }else{
                        $count++;
                    }
                endforeach;
                if($count>0){echo "No Tasks Found";}
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
                $getTodaysTasks = $this->Menu_model->GetTodaysAllTaskByUid($uid, date('Y-m-d'));
                $firstPane = true; // Track first tab content
                foreach ($getTodaysTaskCounts as $getTodaysTaskCount):
                    $slct_type_of_task = $getTodaysTaskCount->tasktype;
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
                          foreach($getTodaysTasks as $sctasklist){
                            $task_id              = $sctasklist->task_id;
                            $type_of_task         = $sctasklist->tasktype;
                            $appointment_datetime = $sctasklist->appointment_datetime;
                            $sname                = $sctasklist->sname;
                            $tasktype             = $sctasklist->tasktype;
                            $taskname             = $sctasklist->taskname;
                            $comments             = $sctasklist->comments;
                            $bd_idetype           = $sctasklist->bd_idetype;
                            $target_date          = $sctasklist->target_date;
                            $expected_date        = $sctasklist->expected_date;
                            $fwd_date             = $sctasklist->fwd_date;

                          if($slct_type_of_task == $type_of_task){ ?>
                        <a data-task_id="<?=$task_id;?>" href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start active mb-1 taskperformaction" >
                          <div class="d-flex justify-content-between w-100">
                            <h5 class="mb-1"><?=$sname.' - '.$taskname ?></h5>
                            <!-- <small> <span id="countdown1"></span> - <span id="status1"></span> </small> -->
                          </div>
                          <p class="mb-1">
                            <?=$taskname ?> ===== Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
                            cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                            cheesecake fruitcake.
                          </p>
                          <small> <span id="countdown<?=$task_id;?>"></span> - <span id="status<?=$task_id;?>"></span> </small>
                        </a>
                        <script> checkCountDownTime("<?=$fwd_date;?>",<?=$task_id;?>);</script>
                        <?php $i++; }   } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php 
                $firstPane = false; // Set to false after first iteration
                endforeach; 
                ?>
              <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                <p>
                  Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                  cupcake gummi bears cake chocolate.
                </p>
                <p class="mb-0">
                  Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
                  roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                  jelly-o tart brownie jelly.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    // When an element with class 'taskperformaction' is clicked
    $('.taskperformaction').on('click', function() {
        var taskId = $(this).data('task_id'); // Retrieve the 'task_id' data
        $('#modalCenter').modal('show');
        $('#modalCenterTitle').text("Task ID IS = "+taskId);
        console.log(taskId); // Log the task ID or use it as needed
        // alert(taskId);
    });
});
</script>
<?php $this->load->view('footer'); ?>