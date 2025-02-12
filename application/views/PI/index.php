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
                    $getSITask = $this->Menu_model->GetSchoolIdentificationTask($uid,date("Y-m-d"));
                    $getSITaskcnt = sizeof($getSITask);
                      if($getSITaskcnt > 0 ){
                      ?>
                      <li class="nav-item mb-1 mb-sm-0" role="presentation">
                       
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true">
                          <span class="d-none d-sm-block"><i class="tf-icons bx bx-home bx-sm me-1_5 align-text-bottom"></i> School Identification
                            <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1_5 pt-50"><?=$getSITaskcnt;?></span></span><i class="bx bx-home bx-sm d-sm-none"></i>
                        </button>
                      </li>
                      <?php } ?>
                      <li class="nav-item mb-1 mb-sm-0" role="presentation">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false" tabindex="-1">
                          <span class="d-none d-sm-block"><i class="tf-icons bx bx-user bx-sm me-1_5 align-text-bottom"></i> Profile</span><i class="bx bx-user bx-sm d-sm-none"></i>
                        </button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages" aria-controls="navs-pills-justified-messages" aria-selected="false" tabindex="-1">
                          <span class="d-none d-sm-block"><i class="tf-icons bx bx-message-square bx-sm me-1_5 align-text-bottom"></i> Messages</span><i class="bx bx-message-square bx-sm d-sm-none"></i>
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade active show" id="navs-pills-justified-home" role="tabpanel">
                      <div class="card-body">
                      <?php if($getSITaskcnt > 0 ){
                        $i=1;
                        foreach($getSITask as $si_task):
                        ?>

                 
                        <p class="demo-inline-spacing1">
                        <a class="btn btn-primary me-1 collapsed" data-bs-toggle="collapse" href="#collapseExample<?=$i?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <?=  $i.' = '.$si_task->sname?> 
                        </a>
                      </p>

                      <div class="collapse mb-2" id="collapseExample<?=$i?>" style="">
                        <div class="d-grid d-sm-flex p-4 border">
                          <img src="https://i.ibb.co/gZ2yLFn2/122222222.webp" alt="collapse-image" height="125" class="me-6 mb-sm-0 mb-2">
                          <span>
                           
                            <?php 
                            $getSIAllTask = $this->Menu_model->GetSchoolIdentificationALLTask($si_task->id);
                            foreach($getSIAllTask as $si_all_task):
                              $sname        =  $si_all_task->sname;
                              $task_status  =  $si_all_task->task_status;
                              if($task_status == 0){
                                  $bgcolor = '#ff6969;';
                              }else{
                                $bgcolor = '#438b1f;';
                              }
                              ?>
                              <span data="<?=$task_id?>" class=" p-2 text-white" data-bs-toggle="modal" data-bs-target="#modalCenter" style="background-color:<?=$bgcolor?>">
                                <?=$si_all_task->taskname?>
                              </span> 
                              <hr>
                            <?php
                            endforeach;
                            ?>
                          </span>
                        </div>
                      </div>



                        <?php 
                       $i++; endforeach;
                      } ?>

                 
                   
   
                    
                    </div>


                      </div>
                      <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                        <p>
                          Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
                          cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                          cheesecake fruitcake.
                        </p>
                        <p class="mb-0">
                          Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah
                          cotton candy liquorice caramels.
                        </p>
                      </div>
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

<div class="col-lg-4 col-md-6">
                      <small class="text-light fw-medium">Vertically centered</small>
                      <div class="mt-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                          Launch modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
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

<?php $this->load->view('footer'); ?>