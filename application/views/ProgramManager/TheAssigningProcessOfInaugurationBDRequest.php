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
                  <td>Target Date</td>
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
                <tr class="table-secondary">
                  <td>School Name (sid)</td>
                  <?php $spdData =  $this->Menu_model->get_school_detailbyid($bdr[0]->sid);?>
                  <td><?= $spdData[0]->sname.' ( '.$spdData[0]->id.' ) '; ?></td>
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
              $schoolData   = $this->Menu_model->get_school_detailbyid($bdr[0]->sid);
              $schoolname   = $schoolData[0]->sname;
              $pi_id        = $schoolData[0]->pi_id;
              $ins_id       = $schoolData[0]->ins_id;
                 if($assignstatus == 0){
                ?>
            <div class="card p-3" style="background:#dcf3ffed">
              <hr>
              <div class="mb-4" id="inauguration_Card">
                <center>
                  <lable><b>Inauguration Task</b></lable>
                </center>
                <hr>
                <?=form_open('Menu/BDRequestAssignToProcessInauguration')?>
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" id="tid" value="<?=$reqID;?>" name="reqID">
                    <input type="hidden" id="request_code" value="<?=$request_code;?>" name="request_code">
                    <input type="hidden" id="sales_cid" value="<?=$sales_cid;?>" name="sales_cid">
                    <input type="hidden" name="uid" value="<?=$user['id']?>">
                    <div class="col-md-12 card flexwrapcontent">
                      <div class="mb-1 p-2">
                        <select id="AssignTo" name="assignto" class="form-select" required>
                          <?php $pia=$this->Menu_model->get_user();
                            foreach($pia as $pia){if($pia->dep_id==2){
                              if($pi_id !== $pia->id){
                                $selected = '';
                                continue;
                              }else{
                               $selected = 'selected';
                              }
                              ?>
                          <option value="<?=$pia->id?>" <?=$selected?> ><?=$pia->fullname?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
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
                    <center><button type="submit" class="btn btn-primary mt-3" id="requestsubmit">Assign Inauguration Task</button></center>
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
                  <!-- <img src="<?=site_url()?>assets/img/assigning_process_done1.webp" alt="assigning_process_done" height="300" class="img-fluid"> -->
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