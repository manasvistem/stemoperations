<?php $this->load->view('nav'); ?>
<style>
  .card {
  padding:10px;
  }
  .card-body.text-center {
    background: aliceblue;
}
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
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
              
              $getAllAcadCalender = $this->Menu_model->GetAllAcadCalender();
              $arrreject = [];
              $arrapprove = [];
              $uAcedata = $this->Menu_model->GetAcademickApprovalRequestForPIA($uid);
         
              foreach($uAcedata as $req){
                if($req->rejectbypm ==1){
                $arrreject [$req->type] = $req->type;
                $arrreject [$req->type] = $req->rejectbypm;
                $arrreject [$req->state] = $req->state;
              }elseif($req->aprovebypm ==1){
                $arrapprove [$req->type] = $req->type;
                $arrapprove [$req->type] = $req->aprovebypm;
                $arrapprove [$req->state] = $req->state;
              }
              }
              ?>
      <div class="row">
            <div class="col-md-12">
                <div class="card-body text-center">
                    <h4>Academic Calendar</h4>
                </div>
            </div>
            <div class="col-md-12">
            <hr>
            <div class="mb-6">
                <div class="change-password-section" style="justify-content:right; display:flex;">
                  <span class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth" style="width: 200px;" >
                     Add Academic Calendar
                  </span>
                </div>
            </div>

            <hr>
            <div class="card">
            <div class="table-responsive">
                  <table class="table table-striped" id="example1">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">State</th>
                        <th scope="col">Type</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Approved Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;foreach($uAcedata as $data){ ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $data->fdate ?></td>
                        <td><?= $data->todate ?></td>
                        <td><?= $data->state ?></td>
                        <td><?= $data->type ?></td>
                        <td><?= $data->remark ?></td>
                        <td><?php 
                          if($data->aprovebypm ==0 && $data->rejectbypm==0){
                          echo "<span class='bg-warning p-1 text-white Pending'>Pending</span>";
                          }else if($data->rejectbypm ==1 && $data->aprovebypm ==0){
                            echo "<span class='bg-danger p-1 text-white Reject'>Reject</span>";
                            }else if($data->aprovebypm ==1 && $data->rejectbypm ==0){
                            echo "<span class='bg-success p-1 text-white approved'>Approved</span>";
                          }
                          
                          ?></td>
                      </tr>
                      <?php $i++; } ?>
                    </tbody>
                  </table>
                </div>
            </div>


            </div>

           
    <div class="mt-4">
      <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth" aria-labelledby="offcanvasBothLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
          <div class="text-center">
            <img src="<?=base_url()?>assets/img/ultimate-study-planner-tool-vector.jpg" width="200" alt="pendingtasklist">
          </div>
          <hr>
          <center>
            <h5 id="offcanvasBothLabel" class="offcanvas-title">Set Academic Calendar</h5>
          </center>
          <hr>
          <form action="<?=base_url().'Menu/setacalendar'?>" method="post">
          <div class="was-validated">
          <div class="form-group">
                        <label>Start Date</label>
                        <input type="hidden" class="form-control" name="piaid" value="<?=$uid?>">
                        <input type="date" class="form-control" name="fdate" required>
                      </div>
                      <div class="form-group">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="todate" required>
                      </div>
                      <div class="form-group">
                        <label>State</label>
                        <select class="form-select" name="state" required>
                        <option value="">Select</option>
                          <?php foreach($getStates as $getState){?>
                          <option value="<?=$getState->state_title?>"><?=$getState->state_title?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Select Holiday</label>
                          <select class="form-select" name="type" required>
                          <?php 
                          foreach($getAllAcadCalender as $atype){
                           $exists =  array_key_exists($atype->type, $arrapprove);
                           if($exists){
                            $disabled = 'disabled';
                           }else{
                            $disabled = '';
                           }
                            ?>
                         <option <?= $disabled ?> value="<?= $atype->type ?>" ><?= $atype->type ?></option>
                           <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Remark</label>
                        <textarea type="text" name="remark" class="form-control" placeholder="Remark..." required></textarea>
                      </div>
                      </div>
            <hr>
            <button type="submit" class="btn btn-success mb-2 d-grid w-100">Set Calendar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Cropper.js CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
<!-- jQuery (Required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Cropper.js JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
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