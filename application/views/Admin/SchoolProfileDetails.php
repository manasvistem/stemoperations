
<style>
  .card {
  padding:10px;
  }
  .school_title{
  color: #ff00d1fc;
  }
  .school_project_code{
  color: #ff0000fc;
  }
</style>
<!-- Content wrapper -->
<div class="content-wrapper" style="background: aliceblue;">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card" style="min-height: 100vh;">
      <h5 class="card-header-text text-center">
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
      <?php 
        $data = $spdData[0];
        
        // Assign values to individual variables
        $school_id        = $data->id;
        $sname            = $data->sname;
        $sales_cid        = $data->sales_cid;
        $sdate            = $data->sdate;
        $project_code     = $data->project_code;
        $clientname       = $data->clientname;
        $saddress         = $data->saddress;
        $sdistrict        = $data->sdistrict;
        $tehshil          = $data->tehshil;
        $scity            = $data->scity;
        $sstate           = $data->sstate;
        $szone            = $data->szone;
        $slocation        = $data->slocation;
        $sregion          = $data->sregion;
        $slanguage        = $data->slanguage;
        $spincode         = $data->spincode;
        $snoyear          = $data->snoyear;
        $sayear           = $data->sayear;
        $totalutilization = $data->totalutilization;
        $waname           = $data->waname;
        $wanamelink       = $data->wanamelink;
        $status           = $data->status;
        $pstatus          = $data->pstatus;
        $std              = $data->std;
        $boys             = $data->boys;
        $girls            = $data->girls;
        $total_students   = $data->total_students;
        $total_teachers   = $data->total_teachers;
        $timing           = $data->timing;
        $website          = $data->website;
        $cid              = $data->cid;
        $zh_id            = $data->zh_id;
        $spoc_id          = $data->spoc_id;
        $pi_id            = $data->pi_id;
        $ins_id           = $data->ins_id;
        $bd_id            = $data->bd_id;
        $pro_id           = $data->pro_id;
        $sales_co         = $data->sales_co;
        $admin_id         = $data->admin_id;
        $backdrop         = $data->backdrop;
        $zh_apr           = $data->zh_apr;
        $pm_apr           = $data->pm_apr;
        $fm_apr           = $data->fm_apr;
        $bd_apr           = $data->bd_apr;
        $rremark          = $data->rremark;
        $model_type       = $data->model_type;
        $spdident         = $data->spdident;
        $process          = $data->process;
        $oldystaus        = $data->oldystaus;
        $updateddt        = $data->updateddt;
        $purstatus        = $data->purstatus;
        $lystatus         = $data->lystatus;
        $idebypi          = $data->idebypi;
        $tampmpid         = $data->tampmpid;
        $sales_cid        = $data->sales_cid;
        $pi_name          = $data->pi_name;
        $insta_name       = $data->insta_name;
        $pro_name         = $data->pro_name;
        $admin_name       = $data->admin_name;
        
        ?>
      <style>
        .school-logo{
        align-items: center;
        justify-content: center;
        display: flex;
        height: 100%;
        }
        .school-holder-card{
        min-height: 240px;
        }
        p.card-text {
        color: rebeccapurple!important;
        }
        .card-new-contact-details {
        width: 100%;
        align-items: right;
        justify-content: right;
        display: flex;
        }
      </style>
      <div class="row">
        <div class="col-md-3">
          <div class="school-logo">
            <img src="<?=base_url()?>assets/img/project-png-image_1533113.jpg" 
              alt="user-avatar" class="d-block w-px-150 h-px-150 rounded-circle imgpreviewPrf" id="item-img-output">
          </div>
        </div>
        <div class="col-md-6">
          <div class="crad p-1">
            <h3 class="text-center school_title"><?=$sname;?></h3>
            <h5 class="text-center school_project_code"><?=$project_code;?></h5>
            <p class="text-center text-info"><?=$saddress?></p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="school-logo">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                Analysis
            </button>
          </div>
        </div>
      </div>
      <hr>
      <div class="p-2">
        <div class="row">
          <div class="col-md-4">
            <div class="card border border-info">
              <div class="card-body">
                <h5 class="card-title text-center text-info">School Profile Details</h5>
                <hr>
                <table class="table table-striped scchool-profile-table">
                  <tbody>
                    <tr>
                      <th scope="col" class="text-info text-nowrap"> <i class='bx bxs-graduation' ></i> School Name</th>
                      <td><?=$sname;?></td>
                    </tr>
                    <tr>
                      <th scope="col" class="text-info text-nowrap"><i class='bx bxs-crown' ></i> project code</th>
                      <td><?=$project_code;?></td>
                    </tr>
                    <tr>
                      <th scope="col" class="text-info text-nowrap"> <i class='bx bxs-crown' ></i> client name</th>
                      <td><?=$clientname;?></td>
                    </tr>
                    <tr>
                      <th scope="col" class="text-info  text-nowrap"><i class='bx bx-stats' ></i> School Status</th>
                      <td><?= $this->Menu_model->GetStatusByID($status)[0]->name;?></td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-md">
                  <div class="accordion mt-4" id="accordionExample">
                    <div class="card accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button type="button" class="accordion-button collapsed text-warning" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
                        View More Details
                        </button>
                      </h2>
                      <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body" style="padding: 0; margin: 0;">
                          <div class="table-responsive text-nowrap">
                            <table class="table table-striped scchool-profile-table">
                              <tbody>
                                <tr>
                                  <th scope="col" class="text-info"><i class='bx bx-purchase-tag-alt'></i> standard</th>
                                  <td><?php if($std == ''){echo "N/A";}else{echo $std;} ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info" class="text-info"><i class='bx bxs-time'></i> timing</th>
                                  <td><?php if($timing == ''){echo "N/A";}else{echo $timing;} ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info" class="text-info"><i class='bx bxl-internet-explorer'></i> website</th>
                                  <td><?php if($website == ''){echo "N/A";}else{echo $website;} ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info" class="text-info"><i class='bx bx-map' ></i> Map Location</th>
                                  <td><?php if($slocation == ''){echo "N/A";}else{ ?><a href="<?=$slocation;?>" target="_BLANK"> <i class='bx bx-map'></i> view</a> <?php } ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info" class="text-info"><i class='bx bx-map-pin'></i> State</th>
                                  <td><?php if($sstate == ''){echo "N/A";}else{echo $sstate;} ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info" class="text-info"><i class='bx bx-map-pin'></i> district</th>
                                  <td><?php if($sdistrict == ''){echo "N/A";}else{echo $sdistrict;} ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info"><i class='bx bx-map-pin'></i> city</th>
                                  <td><?php if($scity == ''){echo "N/A";}else{echo $scity;} ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info"><i class='bx bx-pin' ></i> pin code</th>
                                  <td><?php if($spincode == ''){echo "N/A";}else{echo $spincode;} ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info"><i class='bx bx-map-alt'></i> zone</th>
                                  <td><?php if($szone == ''){echo "N/A";}else{echo $szone;} ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info"><i class='bx bx-timer' ></i> Academic Year</th>
                                  <td><?php if($sayear == ''){echo "N/A";}else{echo $sayear;} ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info"><i class='bx bxl-whatsapp'></i> Whatsgroup Name</th>
                                  <td><?php if($wanamelink == ''){echo "N/A";}else{ ?><a href="<?=$wanamelink;?>" target="_BLANK"> <i class='bx bxl-whatsapp'></i> <?=$waname?></a> <?php } ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info"><i class='bx bxs-leaf'></i> language</th>
                                  <td><?php if($slanguage == ''){echo "N/A";}else{echo $slanguage;} ?></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="text-info"><i class='bx bxs-calendar' ></i> Create Date</th>
                                  <td><?php if($sdate == ''){echo "N/A";}else{echo $sdate;} ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-3">
                <div class="card text-center border border-info">
                  <div class="card-body">
                    <div class="school-logo">
                      <img src="<?=base_url()?>assets/img/created-by-ai-8672131_1280.webp" 
                        alt="user-avatar" class="d-block w-px-50 h-px-50 rounded-circle imgpreviewPrf" id="item-img-output">
                    </div>
                    <hr>
                    <h5 class="card-title text-info">Total Student</h5>
                    <p class="card-text">
                      <?php if($total_students == ''){echo "N/A";}else{echo $total_students;} ?>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border border-info">
                  <div class="card-body">
                    <div class="school-logo">
                      <img src="<?=base_url()?>assets/img/boys-school-student-vector.jpg" 
                        alt="user-avatar" class="d-block w-px-50 h-px-50 rounded-circle imgpreviewPrf" id="item-img-output">
                    </div>
                    <hr>
                    <h5 class="card-title text-info">Total Boys</h5>
                    <p class="card-text">
                      <?php if($boys == ''){echo "N/A";}else{echo $boys;} ?>    
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border border-info">
                  <div class="card-body">
                    <div class="school-logo">
                      <img src="<?=base_url()?>assets/img/girls-happy-little-wearing-hat-301430351.webp" 
                        alt="user-avatar" class="d-block w-px-50 h-px-50 rounded-circle imgpreviewPrf" id="item-img-output">
                    </div>
                    <hr>
                    <h5 class="card-title text-info">Total Girls</h5>
                    <p class="card-text">
                      <?php if($girls == ''){echo "N/A";}else{echo $girls;} ?>        
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border border-info">
                  <div class="card-body">
                    <div class="school-logo">
                      <img src="<?=base_url()?>assets/img/school-man-teacher-with-book-and-green-board-design-free-vector.jpg" 
                        alt="user-avatar" class="d-block w-px-50 h-px-50 rounded-circle imgpreviewPrf" id="item-img-output">
                    </div>
                    <hr>
                    <h5 class="card-title text-info">Total Teacher</h5>
                    <p class="card-text">
                      <?php if($total_teachers == ''){echo "N/A";}else{echo $total_teachers;} ?>      
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <hr>
              </div>
              <div class="col-md-3">
                <div class="card text-center border border-info school-holder-card">
                  <div class="card-body">
                    <div class="school-logo">
                      <img src="<?=base_url()?>assets/img/holding-banner.jpg" 
                        alt="user-avatar" class="d-block w-px-50 h-px-50 rounded-circle imgpreviewPrf" id="item-img-output">
                    </div>
                    <hr>
                    <h5 class="card-title text-info">PIA Name</h5>
                    <p class="card-text"><?php if($pi_name == ''){echo "N/A";}else{echo $pi_name;} ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border border-info school-holder-card">
                  <div class="card-body">
                    <div class="school-logo">
                      <img src="<?=base_url()?>assets/img/maintenance-concept-illustration_114360-30146.avif" 
                        alt="user-avatar" class="d-block w-px-50 h-px-50 rounded-circle imgpreviewPrf" id="item-img-output">
                    </div>
                    <hr>
                    <h5 class="card-title text-info">Installation Person</h5>
                    <p class="card-text"><?php if($insta_name == ''){echo "N/A";}else{echo $insta_name;} ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border border-info school-holder-card">
                  <div class="card-body">
                    <div class="school-logo">
                      <img src="<?=base_url()?>assets/img/successful-professional-business-man-with-crossed-arms-flat-illustration-on-white-background-free-vector.jpg" 
                        alt="user-avatar" class="d-block w-px-50 h-px-50 rounded-circle imgpreviewPrf" id="item-img-output">
                    </div>
                    <hr>
                    <h5 class="card-title text-info">PRO Name</h5>
                    <p class="card-text"><?php if($pro_name == ''){echo "N/A";}else{echo $pro_name;} ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border border-info school-holder-card">
                  <div class="card-body">
                    <div class="school-logo">
                      <img src="<?=base_url()?>assets/img/admin-mens.avif" 
                        alt="user-avatar" class="d-block w-px-50 h-px-50 rounded-circle imgpreviewPrf" id="item-img-output">
                    </div>
                    <hr>
                    <h5 class="card-title text-info">ADMIN</h5>
                    <p class="card-text"><?php if($admin_name == ''){echo "N/A";}else{echo $admin_name;} ?></p>
                  </div>
                </div>
              </div>
              <?php // dd($spdcData); ?>
              <div class="col-md-12 mt-2">
                <hr>
                <div class="card shadow-none bg-transparent border border-info">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <h5 class="card-title text-info text-center">School Contact Details</h5>
                      </div>
                      <div class="col-md-6">
                        <div class="card-new-contact-details">
                          <span class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">
                          Add New Contact Details
                          </span>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="card">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-striped" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
                          <thead class="thead-dark">
                            <tr>
                              <th>#</th>
                              <th><i class='bx bxs-user-circle' ></i> Contact Name</th>
                              <th><i class='bx bxl-sketch' ></i> designation</th>
                              <th><i class='bx bxs-phone-call'></i> contact no</th>
                              <th><i class='bx bxs-envelope' ></i> email</th>
                              <th><i class='bx bxs-purchase-tag-alt' ></i> Main</th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            <?php $i=1; foreach($spdcData as $cData){?>
                            <tr>
                              <td><?=$i;?></td>
                              <td><?php  if($cData->contact_name == ''){echo "N/A";}else{echo $cData->contact_name;} ?></td>
                              <td><?php  if($cData->designation == ''){echo "N/A";}else{echo $cData->designation;} ?></td>
                              <td><?php  if($cData->contact_no == ''){echo "N/A";}else{echo $cData->contact_no;} ?></td>
                              <td><?php  if($cData->email == ''){echo "N/A";}else{echo $cData->email;} ?></td>
                              <td><?php 
                                if($cData->main == 1){
                                    echo "<span class='p-1 border border-success'>Main</span>";
                                }else{
                                    echo "<span class='p-1 border border-danger'>No</span>";
                                }
                                ?></td>
                            </tr>
                            <?php $i++; } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 mt-2">
                <div class="card border border-primary1">
                  <div class="card-body">
                    <h5 class="card-title text-info text-center">Recent Activity</h5>
                    <hr>
                    <div class="mt-4">
                      <div class="list-group list-group-flush">
                        <?php 
                          $recenttaskDatascnt =  sizeof($recenttaskDatas);
                          if($recenttaskDatascnt > 0){
                          foreach($recenttaskDatas as $recenttaskData){?>
                        <a href="javascript:void(0);" class="list-group-item list-group-item-action"><i class="bx bx-purchase-tag-alt me-3"></i>
                        <span><?=$recenttaskData->tasktype;?></span> - 
                        <?=$recenttaskData->taskname;?> - 
                        <span>By - <?=$recenttaskData->task_username;?></span> -  
                        <span><?=$recenttaskData->appointment_datetime;?></span> - 
                        <?php if($recenttaskData->task_status == 0){
                          echo "<span class='bg-warning p-1 text-white'>Pending<span>";
                          }else if($recenttaskData->task_status == 1){
                          echo "<span class='bg-success p-1 text-white'>Complete<span>";
                          } ?>
                        </a>
                        <?php }}else{ ?>
                        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                        <i class="bx bx-purchase-tag-alt me-3"></i> No activity in this school.
                        </a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-2">
        <div class="card mb-6">
          <hr>
          <h3 class="card-header text-center text-info">Task Details</h3>
          <div class="card-body" style="background:#faebd75c;">
            <div class="row">
              <!-- Custom content with heading -->
              <div class="col-lg-12">
                <div class="mt-4">
                  <div class="list-group list-group-horizontal-md text-md-center" role="tablist">
                    <a class="list-group-item list-group-item-action" id="home-list-item" data-bs-toggle="list" href="#horizontal-home" aria-selected="false" role="tab" tabindex="-1">All</a>
                    <a class="list-group-item list-group-item-action" id="profile-list-item" data-bs-toggle="list" href="#horizontal-profile" aria-selected="false" role="tab" tabindex="-1">Complete</a>
                    <a class="list-group-item list-group-item-action active" id="messages-list-item" data-bs-toggle="list" href="#horizontal-messages" aria-selected="true" role="tab">Pending</a>
                  </div>
                  <div class="tab-content px-0 mt-0">
                    <div class="tab-pane fade" id="horizontal-home" role="tabpanel" aria-labelledby="home-list-item">
                      <div class="card border border-info">
                        <h3 class="card-title text-center text-info">All Task</h3>
                        <hr>
                        <table class="table table-striped" id="example">
                          <thead class="thead-dark">
                            <tr>
                              <th>S No.</th>
                              <th>School Name</th>
                              <th>Task Type</th>
                              <th>Task Name</th>
                              <th>Task User</th>
                              <th>Target Date</th>
                              <th>Target Status</th>
                              <th>Comments</th>
                              <th>Task Status</th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            <?php $i=1; foreach($taskDatas as $taskData){
                              if($taskData->task_status == 1){continue;}
                              ?>
                            <tr>
                              <td><?=$i?></td>
                              <td><?=$taskData->sname?></td>
                              <td><?=$taskData->tasktype?></td>
                              <td><?=$taskData->taskname?></td>
                              <td><?=$taskData->task_username?></td>
                              <td><?=$taskData->target_date?></td>
                              <td><?=$taskData->target_status?></td>
                              <td><?=$taskData->comments?></td>
                              <td><?php 
                                if($taskData->task_status == 0){
                                echo "<span class='bg-warning p-1 text-white'>Pending<span>";
                                }else if($taskData->task_status == 1){
                                echo "<span class='bg-success p-1 text-white'>Complete<span>";
                                }
                                ?></td>
                            </tr>
                            <?php $i++;} ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="horizontal-profile" role="tabpanel" aria-labelledby="profile-list-item">
                      <div class="card border border-success">
                        <h3 class="card-title text-center text-info">Complete Task</h3>
                        <hr>
                        <table class="table table-striped" id="example1">
                          <thead class="thead-dark">
                            <tr>
                              <th>S No.</th>
                              <th>School Name</th>
                              <th>Task Type</th>
                              <th>Task Name</th>
                              <th>Task User</th>
                              <th>Target Date</th>
                              <th>Target Status</th>
                              <th>Comments</th>
                              <th>Task Status</th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            <?php $i=1; foreach($taskDatas as $taskData){
                              if($taskData->task_status == 0){continue;}
                              ?>
                            <tr>
                              <td><?=$i?></td>
                              <td><?=$taskData->sname?></td>
                              <td><?=$taskData->tasktype?></td>
                              <td><?=$taskData->taskname?></td>
                              <td><?=$taskData->task_username?></td>
                              <td><?=$taskData->target_date?></td>
                              <td><?=$taskData->target_status?></td>
                              <td><?=$taskData->comments?></td>
                              <td><?php 
                                if($taskData->task_status == 0){
                                echo "<span class='bg-warning p-1 text-white'>Pending<span>";
                                }else if($taskData->task_status == 1){
                                echo "<span class='bg-success p-1 text-white'>Complete<span>";
                                }
                                ?></td>
                            </tr>
                            <?php $i++;} ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade active show" id="horizontal-messages" role="tabpanel" aria-labelledby="messages-list-item">
                      <div class="card border border-info">
                        <h3 class="card-title text-center text-info">Pending Task</h3>
                        <hr>
                        <table class="table table-striped" id="example2">
                          <thead class="thead-dark">
                            <tr>
                              <th>S No.</th>
                              <th>School Name</th>
                              <th>Task Type</th>
                              <th>Task Name</th>
                              <th>Task User</th>
                              <th>Target Date</th>
                              <th>Target Status</th>
                              <th>Comments</th>
                              <th>Task Status</th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            <?php $i=1; foreach($taskDatas as $taskData){
                              if($taskData->task_status == 1){continue;}
                              ?>
                            <tr>
                              <td><?=$i?></td>
                              <td><?=$taskData->sname?></td>
                              <td><?=$taskData->tasktype?></td>
                              <td><?=$taskData->taskname?></td>
                              <td><?=$taskData->task_username?></td>
                              <td><?=$taskData->target_date?></td>
                              <td><?=$taskData->target_status?></td>
                              <td><?=$taskData->comments?></td>
                              <td><?php 
                                if($taskData->task_status == 0){
                                echo "<span class='bg-warning p-1 text-white'>Pending<span>";
                                }else if($taskData->task_status == 1){
                                echo "<span class='bg-success p-1 text-white'>Complete<span>";
                                }
                                ?></td>
                            </tr>
                            <?php $i++;} ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Custom content with heading -->
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
    </div>
    <div class="mt-4">
      <!-- Modal -->
      <div class="modal fade" id="fullscreenModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalFullTitle">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>
                Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum
                at eros.
              </p>
              <p>
                Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                lacus vel augue laoreet rutrum faucibus dolor auctor.
              </p>
              <p>
                Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus
                auctor fringilla.
              </p>
              <p>
                Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum
                at eros.
              </p>
              <p>
                Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                lacus vel augue laoreet rutrum faucibus dolor auctor.
              </p>
              <p>
                Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus
                auctor fringilla.
              </p>
              <p>
                Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum
                at eros.
              </p>
              <p>
                Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                lacus vel augue laoreet rutrum faucibus dolor auctor.
              </p>
              <p>
                Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus
                auctor fringilla.
              </p>
              <p>
                Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum
                at eros.
              </p>
              <p>
                Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                lacus vel augue laoreet rutrum faucibus dolor auctor.
              </p>
              <p>
                Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus
                auctor fringilla.
              </p>
              <p>
                Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum
                at eros.
              </p>
              <p>
                Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                lacus vel augue laoreet rutrum faucibus dolor auctor.
              </p>
              <p>
                Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus
                auctor fringilla.
              </p>
              <p>
                Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum
                at eros.
              </p>
              <p>
                Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                lacus vel augue laoreet rutrum faucibus dolor auctor.
              </p>
              <p>
                Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus
                auctor fringilla.
              </p>
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
    <!-- Modal -->
    <div class="mt-4">
      <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth" aria-labelledby="offcanvasBothLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
          <div class="text-center">
            <img src="<?=base_url()?>assets/img/contact-center-abstract-concept_335657-3032.avif" width="300" alt="pendingtasklist">
          </div>
          <hr>
          <center>
            <h5 id="offcanvasBothLabel" class="offcanvas-title">
              Add New Contact Details
            </h5>
          </center>
          <hr>
          <form action="<?=base_url().'Menu/AddNewContactDetailsInSPD'?>" method="post">
            <div class="row">
              <div class="col-md-12">
                <input type="hidden" id="sid" name="sid" value="<?=$school_id?>">
                <div>
                  <label for="defaultFormControlInput1" class="form-label">Contact Name</label>
                  <input type="text" name="contact_name" class="form-control" id="defaultFormControlInput1" placeholder="Name" aria-describedby="defaultFormControlHelp">
                </div>
                <div>
                  <label for="defaultFormControlInput2" class="form-label">Designation</label>
                  <input type="text" class="form-control" name="designation" id="defaultFormControlInput2" placeholder="Principal / Teacher" aria-describedby="defaultFormControlHelp">
                </div>
                <div>
                  <label for="defaultFormControlInput3" class="form-label">Contact Number</label>
                  <input type="text" class="form-control" name="contact_no" id="defaultFormControlInput3" placeholder="+91 ----------" aria-describedby="defaultFormControlHelp">
                </div>
                <div>
                  <label for="defaultFormControlInput4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="defaultFormControlInput4" placeholder="email@mail.com" aria-describedby="defaultFormControlHelp"> 
                </div>
                <!-- <div class="mb-4">
                  <label for="defaultSelect" class="form-label">Select Primary/Alternate</label>
                  <select id="defaultSelect" name="main" class="form-select">
                    <option value="1">Primary</option>
                    <option value="0">Alternate</option>
                  </select>
                  </div> -->
              </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Add New Contact</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- jQuery (Required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      $('#userslsctstate').on('change', function() {
          var userslsctstate = $(this).val();
          $.ajax({
              url: '<?=base_url();?>Menu/GetDistrictINState',
              type: "POST",
              data: {
                  userslsctstate: userslsctstate
              },
              cache: false,
              success: function a(result) {
                  $('#select_district').html(result);
              }
          });
      });
      $('#select_district').on('change', function() {
          var selectdistrict = $(this).val();
          $.ajax({
              url: '<?=base_url();?>Menu/GetCityInDistrict',
              type: "POST",
              data: {
                  selectdistrict: selectdistrict
              },
              cache: false,
              success: function a(result) {
                  $('#select_city').html(result);
              }
          });
      });
  });
</script>
