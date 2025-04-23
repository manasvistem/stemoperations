
<!-- Content wrapper -->
<div class="content-wrapper">
<style>
  .card-header.text-center {background: aliceblue;}
</style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card p-3">
    <div class="card-header text-center">
      <h3>Pending Task Planner Request</h3>
      <p> <?=$planner_date ?> </p>
    </div>
    <hr>
    <div class="container p-2" style="min-height: 50vh;background: beige;">
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
      <div class="table-responsive">
      <table id="example1" class="table table-striped" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Request Type</th>
                            <th scope="col">Task Count for Planning at Request Time</th>
                            <th scope="col">Current Time Task Count</th>
                            <th scope="col">Request Message</th>
                            <th scope="col">Approvel Status</th>
                            <th scope="col">Approvel By</th>
                            <th scope="col">Approved / Reject Remarks</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $j =1;
                            
                            foreach($getreqData as $pendatareg){
                              $request_user_id = $pendatareg->request_user_id;
                              $request_type    = $pendatareg->request_type;
                              if($request_type == 'Old Pending Task'){
                                  $getoldPendingTask = $this->Menu_model->get_OLDPendingTask($request_user_id);
                                  $getpendingTaskcnt = sizeof($getoldPendingTask);
                              }elseif($request_type == 'Plan But Not Initiated'){
                                $getPendingTask = $this->Menu_model->get_PendingTask($request_user_id);
                                $getpendingTaskcnt = sizeof($getPendingTask);
                              }
                              ?>
                          <tr>
                            <th><?= $j ?></th>
                            <td><?= $pendatareg->request_name ?></td>
                            <td><?= $pendatareg->created_at ?></td>
                            <td><?= $pendatareg->request_type ?></td>
                            <td><?= $pendatareg->task_count ?></td>
                            <td>
                              <a href="<?=base_url().'Menu/CheckUserPendingTaskList/'.$pendatareg->id.'/'.$pendatareg->request_user_id.'/'.$pendatareg->request_date?>" target="_BLANK"><?=$getpendingTaskcnt;?> Task</a>
                            </td>
                            <td><?= $pendatareg->request_remarks ?></td>
                            <td>
                              <?php
                                if($pendatareg->approved == 0){ ?>
                              <span class="p-1 bg-warning text-white mr-2">Pending</span>
                              <?php }else if($pendatareg->approved == 1){ ?>
                              <span class="p-1 bg-success text-white mr-2">Approved</span>
                              <?php }else if($pendatareg->approved == 2){ ?>
                              <span class="p-1 bg-danger text-white mr-2">Reject</span>
                              <?php }?>
                            </td>
                            <td><?php if($pendatareg->approved_message !== ''){echo $pendatareg->approved_by_name;}else{echo " <span class='p-1 bg-warning text-white mr-2'>Pending</span>";} ?></td>
                            <td><?php if($pendatareg->approved_message !== ''){echo $pendatareg->approved_message;}else{echo " <span class='p-1 bg-warning text-white mr-2'>Pending</span>";} ?></td>
                            <td>
                              <?php
                                if($pendatareg->approved ==0){ ?>
                              <div>
                                <p>
                                    <button type="button" class="btn btn-primary" onclick="Approve(<?= $j ?>,<?= $pendatareg->id?>,'Approve')">Approve</button>
                                </p>
                              </div>
                              <?php }else if($pendatareg->approved == 1){ ?>
                              <span class="p-1 bg-success text-white mr-2">Approved&nbsp;Successfully</span>
                              <?php }else if($pendatareg->approved == 2){ ?>
                              <span class="p-1 bg-danger text-white mr-2">Reject&nbsp;Successfully</span>
                              <?php }?>
                            </td>
                          </tr>
                          <?php $j++; } ?>
                        </tbody>
                      </table>
      </div>
    </div>
    <div class="mt-4">
      <!-- Modal -->
      <div class="modal fade" id="plannerRequestmodalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="plannerRequestmodalCenterTitlw">Planner Request</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                <form action="<?=base_url();?>Menu/PendingTaskPlannerRequestApproved" method="post">
                <input type="hidden" id="request_id" name="request_id" value="" class="form-control" required />
                <div class="mb-4">
                  <label for="defaultSelect" class="form-label">Select Approved / Reject</label>
                  <select id="defaultSelect" name="request_status" class="form-select" required>
                    <option value="">select</option>
                    <option value="1">Approved</option>
                    <!-- <option value="2">Reject</option> -->
                  </select>
                </div>
                <div>
                    <label for="exampleFormControlTextarea1" class="form-label">Remarks</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="remarks" rows="3"></textarea>
                </div>
                <hr>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-success mt-2" id="plannerRequestbtn">Submit</button>
                </div>
              </form>
                </div>
                <div class="col-md-6">
                    <img src="<?=base_url()?>assets/img/request-man.avif" width="100%" alt="planner request img not found">
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function Approve(mid,id,val){
        $('#plannerRequestmodalCenter').modal('show');
        $('#request_id').val(id);
     }
     $(document).ready(function () {
    $("#defaultSelect").change(function () {
        var selectedValue = $(this).val();
        var btn = $("#plannerRequestbtn");
  
        if (selectedValue == "1") {
            btn.text("Approve").removeClass("btn-danger").addClass("btn-success");
        } else if (selectedValue == "2") {
            btn.text("Reject").removeClass("btn-success").addClass("btn-danger");
        } else {
            btn.text("Submit").removeClass("btn-danger btn-success").addClass("btn-secondary");
        }
        
    });
  });
  
</script>
