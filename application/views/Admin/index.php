
<style>
  .card {
    padding:10px;
  }
</style>
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
        <div class="col-md-9">
          <!-- <h6 class="text-muted p-3">Filled Pills</h6> -->
          <div class="nav-align-top mb-6">
            <ul class="nav nav-pills mb-4 nav-fill" role="tablist">
              <?php  
                $getTodaysTaskCounts = $this->Menu_model->GetTodaysAllTaskCountByUid($uid, date("Y-m-d"), $user['dep_id']);
                $firstTab = true; // Track first tab
                
                foreach ($getTodaysTaskCounts as $getTodaysTaskCount):
                    $formatted_string = preg_replace("/[ \/'-]+/", "_", $getTodaysTaskCount->tasktype);
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
                endforeach; 
                ?>
              <!-- <li class="nav-item" role="presentation">
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
              </li> -->
            </ul>
            <div class="tab-content">
              <?php 
                $getTodaysTasks = $this->Menu_model->GetTodaysAllTaskByUid($uid, date('Y-m-d'));
                // echo $this->db->last_query();
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
                    <small class="text-light fw-medium"><?=$slct_type_of_task?> Task List</small>
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
                            <?=$taskname ?> - <?=$comments ?>
                          </p>
                          <small> <span id="countdown<?=$task_id;?>"></span> - <span id="status<?=$task_id;?>"></span> </small>
                        </a>
                        <script> checkCountDownTime("<?=$appointment_datetime;?>",<?=$task_id;?>);</script>
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
              <!-- <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                <p>
                  Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                  cupcake gummi bears cake chocolate.
                </p>
                <p class="mb-0">
                  Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
                  roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                  jelly-o tart brownie jelly.
                </p>
              </div> -->
            </div>
          </div>
        </div>
        <div class="col-md-3">
                <div class="card">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, illum.
                </div>
        </div>
      </div>
    </div>
  </div>







  <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-xxl-8 mb-6 order-0">
                  <div class="card">
                    <div class="d-flex align-items-start row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary mb-3">Congratulations John! 🎉</h5>
                          <p class="mb-6">
                            You have done 72% more sales today.<br />Check your new badge in your profile.
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-6">
                          <img
                            src="<?=base_url().'assets/img/man-with-laptop.png'?>"
                            height="175"
                            class="scaleX-n1-rtl"
                            alt="View Badge User" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="<?=base_url().'assets/img/chart-success.png'?>"
                                alt="chart success"
                                class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <p class="mb-1">Profit</p>
                          <h4 class="card-title mb-3">$12,628</h4>
                          <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                           
                              <img
                                src="<?=base_url().'assets/img/wallet-info.png'?>"
                                alt="wallet info"
                                class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <p class="mb-1">Sales</p>
                          <h4 class="card-title mb-3">$4,679</h4>
                          <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-6">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-lg-8">
                        <div class="card-header d-flex align-items-center justify-content-between">
                          <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Total Revenue</h5>
                          </div>
                          <div class="dropdown">
                            <button
                              class="btn p-0"
                              type="button"
                              id="totalRevenue"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalRevenue">
                              <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                              <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                          </div>
                        </div>
                        <div id="totalRevenueChart" class="px-3"></div>
                      </div>
                      <div class="col-lg-4 d-flex align-items-center">
                        <div class="card-body px-xl-9">
                          <div class="text-center mb-6">
                            <div class="btn-group">
                              <button type="button" class="btn btn-outline-primary">
                                <script>
                                  document.write(new Date().getFullYear() - 1);
                                </script>
                              </button>
                              <button
                                type="button"
                                class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">2021</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">2020</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">2019</a></li>
                              </ul>
                            </div>
                          </div>

                          <div id="growthChart"></div>
                          <div class="text-center fw-medium my-6">62% Company Growth</div>

                          <div class="d-flex gap-3 justify-content-between">
                            <div class="d-flex">
                              <div class="avatar me-2">
                                <span class="avatar-initial rounded-2 bg-label-primary"
                                  ><i class="bx bx-dollar bx-lg text-primary"></i
                                ></span>
                              </div>
                              <div class="d-flex flex-column">
                                <small>
                                  <script>
                                    document.write(new Date().getFullYear() - 1);
                                  </script>
                                </small>
                                <h6 class="mb-0">$32.5k</h6>
                              </div>
                            </div>
                            <div class="d-flex">
                              <div class="avatar me-2">
                                <span class="avatar-initial rounded-2 bg-label-info"
                                  ><i class="bx bx-wallet bx-lg text-info"></i
                                ></span>
                              </div>
                              <div class="d-flex flex-column">
                                <small>
                                  <script>
                                    document.write(new Date().getFullYear() - 2);
                                  </script>
                                </small>
                                <h6 class="mb-0">$41.2k</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                              <img src="<?=base_url().'assets/img/paypal.png'?>" alt="paypal" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <p class="mb-1">Payments</p>
                          <h4 class="card-title mb-3">$2,456</h4>
                          <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar flex-shrink-0">
                              <img src="<?=base_url().'assets/img/cc-primary.png'?>" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <p class="mb-1">Transactions</p>
                          <h4 class="card-title mb-3">$14,857</h4>
                          <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 mb-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title mb-6">
                                <h5 class="text-nowrap mb-1">Profile Report</h5>
                                <span class="badge bg-label-warning">YEAR 2022</span>
                              </div>
                              <div class="mt-sm-auto">
                                <span class="text-success text-nowrap fw-medium"
                                  ><i class="bx bx-up-arrow-alt"></i> 68.2%</span
                                >
                                <h4 class="mb-0">$84,686k</h4>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Order Statistics -->
                
                <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-6">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title mb-0">
                        
                      <?php 
                     
                      $spdCountDataByRoles = $this->Menu_model->GetSPDCountByRolesID($user['dep_id']);
                        // [name] => Total Schools
                        // [status_id] => total
                        // [total_count] => 2604

                        $total_counts = [];

                        foreach ($spdCountDataByRoles as $item) {
                            $total_counts[] = $item->total_count;
                        }
                        $total_count_wth_status  =  implode(',', $total_counts);

                      ?>

                        <h5 class="mb-1 me-2">School Details</h5>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn text-muted p-0"
                          type="button"
                          id="orederStatistics"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                          <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-6">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <h3 class="mb-1"><?=$spdCountDataByRoles[0]->total_count?></h3>
                          <small><?=$spdCountDataByRoles[0]->name?></small>
                        </div>
                        <div id="orderStatisticsChart11">
                        <canvas id="schoolChart"></canvas>
                        </div>
                      </div>
                      <ul class="p-0 m-0">
                       

                        <?php foreach($spdCountDataByRoles as $spdCountDataByRole){ ?>
                        <li class="d-flex align-items-center mb-5">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0" style="color: #315808 !important;"><?=$spdCountDataByRole->name?></h6>
                              <!-- <small>T-shirt, Jeans, Shoes</small> -->
                            </div>
                            <div class="user-progress">
                            <a href="<?=base_url().'Menu/SPD_Details_Data/'.$spdCountDataByRole->status_id;?>"> 
                              <h6 class="mb-0" style="color: #f700a6 !important;">
                              <?=$spdCountDataByRole->total_count?>
                              </h6>
                              </a>
                            </div>
                          </div>
                        </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-6">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="mb-1 me-2">Default Card</h5>
                      </div>
                    </div>
                    <div class="card-body">
                     
                     
                    </div>
                  </div>
                </div>


                <!--/ Order Statistics -->

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
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <hr>
          <div class="modal-body">

            <div class="row">
              <div class="col mb-6">
                <label for="nameWithTitle" class="form-label">Name</label>
                <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name">
              </div>
            </div>
            <div class="row g-6">
              <div class="col mb-0">
                <label for="emailWithTitle" class="form-label">Email</label>
                <input type="email" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx">
              </div>
              <div class="col mb-0">
                <label for="dobWithTitle" class="form-label">DOB</label>
                <input type="date" id="dobWithTitle" class="form-control">
              </div>
            </div>
            <hr>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>
        const ctx = document.getElementById('schoolChart').getContext('2d');
        
        const data = {
            labels: [
                "Total Schools", "Pending Schools", "New School", "TTP Done", "Utilization Initiated", 
                "Average School", "Good School", "Model School", "Inactive", "Client Readiness"
            ],
            datasets: [{
                label: 'School Status Distribution',
                data: [<?=$total_count_wth_status?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(201, 203, 207, 0.6)',
                    'rgba(0, 128, 128, 0.6)',
                    'rgba(128, 0, 128, 0.6)',
                    'rgba(0, 255, 255, 0.6)'
                ],
                borderWidth: 1
            }]
        };
        
        new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true
            }
        });
    </script>







<script>
  $(document).ready(function() {
    // When an element with class 'taskperformaction' is clicked
    $('.taskperformaction').on('click', function() {
        var taskId = $(this).data('task_id'); // Retrieve the 'task_id' data
        $('#modalCenter').modal('show');
        $('#modalCenterTitle').text("Task ID IS = "+taskId);
        // console.log(taskId); // Log the task ID or use it as needed
        // alert(taskId);
    });



});
function handleReminderCreation() {
 
        $.ajax({
            url: '<?=base_url();?>Menu/CheckTaskPlanningTime',
            type: "POST",
            data: {
                'checkplantime': 'checkplantime'
            },
            cache: false,
            success: function a(result) {
                //	console.log(result);return false;
                if (result == 'false') {
                    var redURL = "<?=base_url();?>Menu/TaskPlanner2/<?= date("Y-m-d") ?>";
                    window.location.href = redURL;
                } else if (result == 'true') {

                    <?php 
          $todaydate = new DateTime();
          $todaydate->modify('+1 day');
          $tomorrowDate = $todaydate->format('Y-m-d');
          ?>
                    var redURL = "<?=base_url();?>Menu/TaskPlanner2/<?= $tomorrowDate; ?>";
                    window.location.href = redURL;
                }
            }
        });
}
</script>
