<?php $this->load->view('nav'); ?>
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
        
        //dd($spdcData);
        
        ?>
      <style>
        .school-logo{
        align-items: center;
        justify-content: center;
        display: flex;
        height: 100%;
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
              <!-- <br>
              <span class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth" style="width: 100px;" >
                  Profile
              </span> -->
          </div>
        </div>
      </div>
      <hr>
      <div class="p-2">
        <div class="row">
          <div class="col-md-4">
            <div class="card border border-info">
              <div class="card-body">
                <h5 class="card-title text-center text-info">School Profile Details</h5> <hr>
                <table class="table table-striped scchool-profile-table">
                  <tbody>
                    <tr>
                      <th scope="col" class="text-info"> <i class='bx bxs-graduation' ></i> School Name</th>
                      <td><?=$sname;?></td>
                    </tr>
                    <tr>
                      <th scope="col" class="text-info"><i class='bx bxs-crown' ></i> project code</th>
                      <td><?=$project_code;?></td>
                    </tr>
                    <tr>
                      <th scope="col" class="text-info"> <i class='bx bxs-crown' ></i> client name</th>
                      <td><?=$clientname;?></td>
                    </tr>
                    <tr>
                      <th scope="col" class="text-info"><i class='bx bx-stats' ></i> School Status</th>
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
                      <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                          <table class="table table-striped scchool-profile-table">
                            <tbody>
                              <tr>
                                <th scope="col" class="text-info">standard</th>
                                <td><?php if($std == ''){echo "N/A";}else{echo $std;} ?></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info" class="text-info">timing</th>
                                <td><?php if($timing == ''){echo "N/A";}else{echo $timing;} ?></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info" class="text-info">website</th>
                                <td><?php if($website == ''){echo "N/A";}else{echo $website;} ?></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info" class="text-info">Map Location</th>
                                <td><a href="<?=$slocation;?>" target="_BLANK">view</a></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info" class="text-info">State</th>
                                <td><?php if($sstate == ''){echo "N/A";}else{echo $sstate;} ?></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info" class="text-info">district</th>
                                <td><?php if($sdistrict == ''){echo "N/A";}else{echo $sdistrict;} ?></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info">city</th>
                                <td><?php if($scity == ''){echo "N/A";}else{echo $scity;} ?></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info">pin code</th>
                                <td><?php if($spincode == ''){echo "N/A";}else{echo $spincode;} ?></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info">zone</th>
                                <td><?php if($szone == ''){echo "N/A";}else{echo $szone;} ?></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info">Academic Year</th>
                                <td><?php if($sayear == ''){echo "N/A";}else{echo $sayear;} ?></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info"> Whatsgroup Name</th>
                                <td><a href="<?=$wanamelink;?>" target="_BLANK"> <i class='bx bxl-whatsapp'></i> <?=$waname?></a></td>
                              </tr>
                              <tr>
                                <th scope="col" class="text-info">language</th>
                                <td><?php if($slanguage == ''){echo "N/A";}else{echo $slanguage;} ?></td>
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
              <?php // dd($spdcData); ?>
              <div class="col-md-12 mt-2">
                <hr>
                <div class="card shadow-none bg-transparent border border-info">
                  <div class="card-body">
                    <h5 class="card-title text-info text-center">School Contact Details</h5>
                    <hr>
                    <div class="card">
                      <table class="table table-striped" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
                        <thead class="thead-dark">
                          <tr>
                            <th>#</th>
                            <th>Contact Name</th>
                            <th>designation</th>
                            <th>contact no</th>
                            <th>email</th>
                            <th>Main</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                          <?php $i=1; foreach($spdcData as $cData){?>
                          <tr>
                            <td><?=$i;?></td>
                            <td><?= $cData->contact_name; ?></td>
                            <td><?= $cData->designation; ?></td>
                            <td><?= $cData->contact_no; ?></td>
                            <td><?php 
                              if($cData->email == ''){echo "N/A";}else{echo $cData->email;}
                              ?></td>
                            <td><?= $cData->main; ?></td>
                          </tr>
                          <?php $i++; } ?>
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
      <div class="mt-2">
        <div class="card mb-6">
          <hr>
          <h3 class="card-header text-center text-info">Task Details</h3>
          <div class="card-body">
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
                    <h3 class="card-title text-center text-info">All Task</h3> <hr>
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
                    <h3 class="card-title text-center text-info">Complete Task</h3> <hr>
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
                    <h3 class="card-title text-center text-info">Pending Task</h3> <hr>
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
      <br>
      <br>
      <br>
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
            <img src="<?=base_url()?>assets/img/reset-password.avif" width="300" alt="pendingtasklist">
          </div>
          <hr>
          <center>
            <h5 id="offcanvasBothLabel" class="offcanvas-title">Change Password</h5>
          </center>
          <hr>
          <form action="<?=base_url().'Menu/UpdatePassword'?>" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password32">Old Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" name="old_password" class="form-control" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password" required>
                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password32">New Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" class="form-control" name="new_password" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password" required>
                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password32">Confirm New Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" class="form-control" name="confirm_new_password" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password" required>
                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Change Password</button>
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
                          url:'<?=base_url();?>Menu/GetDistrictINState',
                          type: "POST",
                          data: {
                              userslsctstate: userslsctstate
                          },
                          cache: false,
                          success: function a(result){
                              $('#select_district').html(result);
                          }
                          });
                  });
                  $('#select_district').on('change', function() {
                  var selectdistrict = $(this).val();
                  $.ajax({
                          url:'<?=base_url();?>Menu/GetCityInDistrict',
                          type: "POST",
                          data: {
                              selectdistrict: selectdistrict
                          },
                          cache: false,
                          success: function a(result){
                              $('#select_city').html(result);
                          }
                          });
                  });
  });
  
  
  $(document).ready(function() {
    $("#upload").change(function(event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#item-img-output").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
    $("#reset-img").click(function() {
        $("#upload").val(""); // Clear file input
        $("#item-img-output").attr("src", "http://localhost/stemoperations/assets/assets/img/avatars/1.png");
    });
  });

</script>
<?php $this->load->view('footer'); ?>