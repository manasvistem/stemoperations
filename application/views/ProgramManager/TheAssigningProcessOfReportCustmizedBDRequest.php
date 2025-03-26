<?php $this->load->view('nav'); ?>
<style>
  .scrollme {
  overflow-x: auto;
  }
  tr td:first-child {
  color:rgb(237, 2, 132); /* Light red for first td */
  font-weight: 600;
  }
  tr td:nth-child(2) {
  color: black; /* Text color */
  }
  select#select_pia_radio {
  height: 200px;
  }
  lable {
  font-weight: 700;
  }
  label.mt-2 {
  color: navy;
  }
  label {
  font-weight: 700;
  }
  .flexwrapcontent{align-items: center; justify-content: center; display: flex ; }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <?php  
      $request_type = $reqData[0]->request_type;
      $color_code = $reqData[0]->color_code;
      $request_code = $reqData[0]->request_code;
      
       ?>
    <div class="card">
      <h5 class="card-header text-center">
        The Assigning Process for <span class="text-primary"><?=$request_type?></span>
      </h5>
      <hr>
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
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <table class="table table-sm">
              <tbody>
                <tr class="table-primary">
                  <td>Request Type</td>
                  <td><?= $bdr[0]->request_type; ?></td>
                </tr>
                <tr class="table-secondary">
                  <td>Request Name</td>
                  <td><?= $bdr[0]->bd_name; ?></td>
                </tr>
                <tr class="table-success">
                  <td>Request Date</td>
                  <td><?= $bdr[0]->sdatet; ?></td>
                </tr>
                <tr class="table-warning">
                  <td> Target Date</td>
                  <td><?= $bdr[0]->fdate; ?></td>
                </tr>
                <tr class="table-warning">
                  <td>Complete Target Date</td>
                  <td><?= $bdr[0]->targetd; ?></td>
                </tr>
              
                <tr class="table-primary">
                  <td>Client Name (CID)</td>
                  <td><?= $bdr[0]->cname.' ('.$bdr[0]->sales_cid.')'; ?></td>
                </tr>
                <tr class="table-primary">
                  <td>Project Code</td>
                  <td><?= $bdr[0]->project_code; ?></td>
                </tr>

                <tr class="table-warning">
                  <td>Request Reamrks</td>
                  <td><?= $bdr[0]->remark; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <?php
              $assignstatus = $bdr[0]->assignstatus;
              $sales_cid    = $bdr[0]->sales_cid;
                 if($assignstatus == 0){
                   
                ?>
            <div class="card p-3" style="background:#dcf3ffed">
              <hr>
              <div class="mb-4" id="inauguration_Card">
                <center>
                  <lable><b><?=$request_type?> Task</b></lable>
                </center>
                <hr>
                <?=form_open('Menu/BDRequestAssignToProcessReportCustmized')?>
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" id="tid" value="<?=$reqID;?>" name="reqID">
                    <input type="hidden" id="request_code" value="<?=$request_code;?>" name="request_code">
                    <input type="hidden" id="sales_cid" value="<?=$sales_cid;?>" name="sales_cid">
                    <input type="hidden" name="uid" value="<?=$user['id']?>">

                    <?php 

                     $bdtaskData  =  $this->Menu_model->GetBDRCallEventsTaskBYBDRID($reqID);
                     $k=1;
                     foreach($bdtaskData as $bdtaskDatas):
                    ?>

                <div class="row">
                    <div class="col-md-6 card flexwrapcontent1">
                        <div class="card-body">
                        <input type="hidden" value="<?=$bdtaskDatas->id?>" name="task_id[]" required>
                        <lable><?=$bdtaskDatas->call_visit?></lable>
                      
                        </div>
                    </div>

                    <div class="col-md-6 card flexwrapcontent1">
                      <div class="mb-1 p-2">
                        <lable>Select PIA</lable>
                        <select id="AssignTo_<?=$k;?>" name="assignto[]" class="form-control" required >
                          <option value="">Select PIA</option>
                          <?php $pia=$this->Menu_model->get_user();
                            foreach($pia as $pia){if($pia->dep_id==2){?>
                          <option value="<?=$pia->id?>"><?=$pia->fullname?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
        </div>
        <hr>

                    <?php $k++; endforeach; ?>
                    <hr>
                    <div class="mb-4">
                      <lable>Appointment Date Time</lable>
                      <input type="datetime-local" class="form-control" 
                        max="<?= date('Y-m-d\TH:i', strtotime($bdr[0]->targetd)); ?>" 
                        name="exdate" required>
                    </div>
                    <div class="mb-4">
                      <lable>Reamrks</lable>
                      <textarea class="form-control" name="remark" id="remark" required placeholder="Remark"></textarea>
                    </div>
                    <center><button type="submit" class="btn btn-primary mt-3" id="requestsubmit">Assign <?=$request_type?> Task</button></center>
                  </div>
                </div>
                </form>
              </div>
              <hr>
            </div>
            <?php }else{ ?>
            <div class="card p-3" style="background:#dcf3ffed">
              <?php $bdr_status = $bdr[0]->status;
                if($bdr_status == 1){
                ?>
              <div class="card p-5">
                <h4 class="text-center p-2">Assigning Process Done</h4>
                <div class="text-center">
                  <img src="<?=site_url()?>assets/img/assigning_process_done1.webp" alt="assigning_process_done" height="290" >
                </div>
              </div>
              <?php } ?>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" value="<?= $bdr[0]->noofschool; ?>" id="target_noofschool">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
  

  });
  
</script>
<?php $this->load->view('footer'); ?>