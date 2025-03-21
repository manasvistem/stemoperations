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
                <tr class="table-info">
                  <td>Request No Of School</td>
                  <td><?= $bdr[0]->noofschool; ?></td>
                </tr>
                <tr class="table-primary">
                  <td>Identification Type</td>
                  <td><?= $bdr[0]->idetype; ?></td>
                </tr>
                <tr class="table-secondary">
                  <td>Type of School</td>
                  <td><?= $bdr[0]->schooltype; ?></td>
                </tr>

                <tr class="table-success">
                  <td>Single / Multiple Location</td>
                  <td class="text-capitalize"><?= $bdr[0]->single_or_multi_location; ?></td>
                </tr>

                <tr class="table-success">
                  <td>Location Count</td>
                  <td><?= $bdr[0]->location_count; ?></td>
                </tr>

                <tr class="table-success">
                  <td>Location</td>
                  <td><?php 
                  $locations =  $this->Menu_model->GetBDRLocations($bdr[0]->id);
                  $lc =1;
                  foreach($locations as $location){
                    echo "<span class='bg-success p-1'>$location->location - $location->number_of_school</span> <hr/>";
                    $lc++; }
                  ?></td>
                </tr>


                
                <tr class="table-warning">
                  <td>Attach NGO Letter (only pdf)</td>
                  <td><?php 
                    $ngoletter = $bdr[0]->ngoletter;
                    if($ngoletter == 'uploads/day/'){
                      echo "<span class='bg-danger p-1'>N/A</span>";
                    }else{
                      echo "<a href='https://stemapp.in/".$ngoletter."' target='BLANK' class='bg-success p-1'>view</a>";
                    }
                    ?></td>
                </tr>
                <tr class="table-info">
                  <td>School Letter Required</td>
                  <td><?= $bdr[0]->sletter; ?></td>
                </tr>
                <?php if($bdr[0]->sletter == 'Yes'){ ?>
                <tr class="table-success">
                  <td>School Letter Request Draft</td>
                  <td><?php 
                    $school_request_draft = $bdr[0]->school_request_draft;
                    if($school_request_draft == 'uploads/day/'){
                      echo "<span class='bg-danger p-1'>N/A</span>";
                    }else{
                      echo "<a href='https://stemapp.in/".$school_request_draft."' target='BLANK' class='bg-success p-1'>view</a>";
                    }
                    ?></td>
                </tr>
                <tr class="table-success">
                  <td>School Letter Remarks</td>
                  <td><?=$bdr[0]->school_letter_remarks;?></td>
                </tr>
                <?php } ?>

                <tr class="table-primary">
                  <td>DM/DEO Letter Required</td>
                  <td><?= $bdr[0]->dmletter; ?></td>
                </tr>

                <?php if($bdr[0]->dmletter == 'Yes'){ ?>
                <tr class="table-success">
                  <td>DM Letter Remarks</td>
                  <td><?=$bdr[0]->dm_deo_letter_remarks;?></td>
                </tr>
                <?php } ?>
               
                <?php if($bdr[0]->dmletter == 'Yes'){ ?>
                <tr class="table-success">
                  <td>DM Letter Request Draft</td>
                  <td><?php 
                    $dm_deo_draft = $bdr[0]->dm_deo_draft;
                    if($dm_deo_draft == 'uploads/day/'){
                      echo "<span class='bg-danger p-1'>N/A</span>";
                    }else{
                      echo "<a href='https://stemapp.in/".$dm_deo_draft."' target='BLANK' class='bg-success p-1'>view</a>";
                    }
                    ?></td>
                </tr>
                <?php } ?>

          
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

          <?php if(sizeof($getSPDRequest) > 0){  ?>
            <div class="card card-form col-md-12" style="background:#dcf3ffed">
              <?=form_open('Menu/BDRequestAssignToProcess')?>
              <input type="hidden" id="tid" value="<?=$reqID;?>" name="reqID">
              <input type="hidden" id="request_code" value="<?=$request_code;?>" name="request_code">
              <input type="hidden" id="sales_cid" value="<?=$sales_cid;?>" name="sales_cid">
              <input type="hidden" name="uid" value="<?=$user['id']?>">
              <div class="card-body">
                <div class="mb-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-check">
                        <input name="select_pia_radio" class="form-check-input" type="radio" value="Single PIA" id="defaultRadio1">
                        <label class="form-check-label" for="defaultRadio1"> Single PIA </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-check">
                        <input name="select_pia_radio" class="form-check-input" type="radio" value="Multiple PIA" id="defaultRadio2">
                        <label class="form-check-label" for="defaultRadio2"> Multiple PIA </label>
                      </div>
                    </div>
                  </div>
                </div>
                <hr/>
                <div id="RequestDetailsImage">
                  <div class="card" id="assing-process-image-card">
                    <img src="https://i.ibb.co/qYR5vk80/122222222.png" id="assing-process-image"  class="img-fluid" alt="assing-process-image">
                  </div>
                </div>
                <div id="RequestDetails">
                <div class="mb-4">
                  <label for="defaultTaskSelect" >Select School</label>
                  <select id="defaultTaskSelect" class="form-select" name="school_id">
                    <option value="">Select</option>
                    <?php foreach($getSPDRequest as $getSPD):?>
                    <option value="<?=$getSPD->id?>"><?=$getSPD->sname?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-4">
                  <label for="AssignTo">Assign To</label>
                  <select id="AssignTo" name="assignto" class="form-select">
                    <option value="">Select</option>
                    <?php $pia=$this->Menu_model->get_user();
                      foreach($pia as $pia){if($pia->dep_id==2){?>
                    <option value="<?=$pia->id?>"><?=$pia->fullname?></option>
                    <?php }} ?>
                  </select>
                  <small id="total_userfind"></small><br>
                  <small id="selected_userfind"></small>
                </div>
                <div class="mb-4">
                  <div id="selected-inputs"></div>
                </div>
                <div class="mb-4">
                  <lable>Expected Date</lable>
                  <input type="datetime-local" class="form-control" 
                      max="<?= date('Y-m-d\TH:i', strtotime($bdr[0]->targetd)); ?>" 
                      name="exdate" required>
                </div>
                <div class="mb-4">
                  <lable>Reamrks</lable>
                  <textarea class="form-control" name="remark" id="remark" required placeholder="Remark"></textarea>
                </div>
                <div class="mb-4">
               <center> <lable><b>ZM Approval</b></lable></center>
                <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-check">
                        <input name="zmapr" value="1" class="form-check-input" type="radio" id="defaultRadio1zmapr">
                        <label class="form-check-label" for="defaultRadio1zmapr"> Required </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-check">
                        <input name="zmapr" value="0" class="form-check-input" type="radio" id="defaultRadio2zmapr">
                        <label class="form-check-label" for="defaultRadio2zmapr"> Not Required </label>
                      </div>
                    </div>
                  </div>
                </div>
                    <br>
                  <center>
                    <button type="submit" style="width:100px;" class="btn btn-primary mt-3" id="requestsubmit">Submit</button>
                    <br>
                  </center>
                </div>
              </div>
              </form>
            </div>
            <?php }else{
              $getDMLatterTaskcnt = sizeof($getDMLatterTask);
              // $getDMLatterTaskcnt = 0;
              ?>
              <?php if($getDMLatterTaskcnt > 0){
                      $getDMLatterTaskId = $getDMLatterTask[0]->id;
                ?>
             
                    <div class="card p-3" style="background:#dcf3ffed">
                    <hr>
                    <div class="mb-4" id="DM_DEO_Letter_Required_Card">
                      <center><lable><b>DM/DEO Letter Required</b></lable></center>
                      <hr>
                      <?=form_open('Menu/BDRequestAssignToProcessDMLatter')?>
                      <div class="row">
                        <div class="col-md-12">

                          <input type="hidden" id="tid" value="<?=$reqID;?>" name="reqID">
                          <input type="hidden" id="request_code" value="<?=$request_code;?>" name="request_code">
                          <input type="hidden" id="sales_cid" value="<?=$sales_cid;?>" name="sales_cid">
                          <input type="hidden" name="uid" value="<?=$user['id']?>">
      

                          <?php $dmlocations =  $this->Menu_model->GetBDRLocations($bdr[0]->id); ?>
                          <?php foreach($dmlocations as $dmlocation){ ?>
                            <input type="hidden" name="bdr_location_id[]" value="<?=$dmlocation->id;?>">
                            <div class="row mb-2">
                              <div class="col-md-6 card flexwrapcontent">
                                <?= $dmlocation->location .' - '. $dmlocation->number_of_school ?>
                              </div>
                              <div class="col-md-6 card flexwrapcontent">
                              <div class="mb-1 p-2">
                                  <select id="AssignTo" name="assignto[]" class="form-select" required>
                                    <option value="">Select PIA</option>
                                    <?php $pia=$this->Menu_model->get_user();
                                      foreach($pia as $pia){if($pia->dep_id==2){?>
                                    <option value="<?=$pia->id?>"><?=$pia->fullname?></option>
                                    <?php }} ?>
                                  </select>
                                  </div>
                              </div>
                            </div>
                            <?php } ?>
                            <hr>
                            <div class="mb-4">
                              <lable>Appointment Date</lable>
                              <input type="datetime-local" class="form-control" 
                                max="<?= date('Y-m-d\TH:i', strtotime($bdr[0]->targetd)); ?>" 
                                name="exdate" required>
                            </div>
                            <div class="mb-4">
                              <lable>Reamrks</lable>
                              <textarea class="form-control" name="remark" id="remark" required placeholder="Remark"></textarea>
                            </div>
                                <center><button type="submit" class="btn btn-primary mt-3" id="requestsubmit">Assign DM/DEO Task</button></center>
                        </div>
                      </div>
                      </form>
                    </div>
                    <hr>
                    </div>
                    <?php }else{ ?>
                      <div class="card p-3" style="background:#dcf3ffed">

                      <?php $bdr_status = $bdr[0]->status;
                      if($bdr_status == 0){
                      ?>

                        

                        <?=form_open('Menu/ClosedBDRequestAssignToProcess')?>
                        <input type="hidden" id="tid" value="<?=$reqID;?>" name="reqID">
                        <input type="hidden" id="request_code" value="<?=$request_code;?>" name="request_code">
                          <div class="mb-4 text-center"><br>
                              <lable>Assigning Proccess Closed Reamrks</lable> <hr>
                              <textarea class="form-control" name="remark" id="remark" required placeholder=" Remark"></textarea>
                            </div>
                                <center><button type="submit" class="btn btn-primary mt-3" id="requestsubmit">Closed Assigning Process</button></center>

                                </form>

                                <?php }else{ ?>
                                    <div class="card p-5">
                                    <h4 class="text-center p-2">Assigning Process Done    </h4>
                                    <div class="text-center">
                                        <!-- <img src="<?=site_url()?>assets/img/assigning_process_done1.webp" alt="assigning_process_done" height="300" class="img-fluid"> -->
                                    </div>
                                    </div>
                                <?php } ?>

                    </div>
                      
                   <?php } ?>
            <?php }  ?>






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
    $('#RequestDetails').fadeOut();
    $('#RequestDetailsImage').fadeIn();
  $('input[name="select_pia_radio"]').change(function() {
    $('#RequestDetailsImage').fadeOut();
    $('#RequestDetails').fadeIn();
    $('#DM_DEO_Letter_Required_Card').fadeOut();
    if ($('#defaultRadio2').is(':checked')) {
  
        $('#defaultTaskSelect').attr({
            'multiple': 'multiple',
            'name': 'school_id[]'
        });
        $('#AssignTo').attr({
            'multiple': 'multiple',
            'name': 'assignto[]'
        });
        $('#DM_DEO_Letter_Required_Card').fadeOut();
    } else {
        $('#defaultTaskSelect').removeAttr('multiple').attr('name', 'school_id');
        $('#AssignTo').removeAttr('multiple').attr('name', 'assignto');
        $('#DM_DEO_Letter_Required_Card').fadeIn();

    }
  });
  

  $('#AssignTo').change(function() {
   var selectSchool =  $("#defaultTaskSelect").val(); 
   if(selectSchool == ''){
    $('#AssignTo option:selected').prop('selected', false);
    alert('Please select school first'); 
    return false;
   }else{

    var filteredArraySchool = selectSchool.filter(function(value) {
        return value.trim() !== ''; // Remove blank values
    });
    var selectedSchoolcount = filteredArraySchool.length;

     // Clear previous inputs
  $('#selected-inputs').empty();
  $("#assing-process-image-card").show();
  // Loop through selected options
  $('#AssignTo option:selected').each(function() {
  
  if ($('#selected-inputs input[name="assign_number_of_school[]"]').length >= selectedSchoolcount) {
  $('#AssignTo option:selected').prop('selected', false); 
  $('#selected-inputs').html("");
  alert("* You can select only "+selectedSchoolcount+" PIA beacause of above you have select only "+selectedSchoolcount+" School");
    return false; // Stop adding more after 3 inputs
  }
  
    var optionText = $(this).text(); // Get option text
    var optionValue = $(this).val(); // Get option value
   if(optionValue !==''){
        // Create a label with option text
        var label = $('<label>', {
      text: optionText+' ',
      class: 'mt-2'
    });
  
    // Create a number input field
    var inputField = $('<input>', {
      type: 'number',
      name: 'assign_number_of_school[]',
      class: 'form-control mt-2',
      placeholder: 'Enter Number of School',
      'data-option-value': optionValue,
      required: true 
    });
    // Append label and input field to the selected-inputs div
    $('#selected-inputs').append(label).append(inputField);
   }
  });
   }
  });
  
  $('#requestsubmit').click(function(e) {
  let total = 0;
  // Iterate through each input field and sum the values
  $('#selected-inputs input[name="assign_number_of_school[]"]').each(function() {
  let value = $(this).val();
  if(value) { // Check if value is not empty
    total += parseFloat(value);
  }
  });


  var selectSchools =  $("#defaultTaskSelect").val(); 
  var filteredArraySchools = selectSchools.filter(function(value) {
        return value.trim() !== ''; // Remove blank values
    });
    var selectedSchoolcounts = filteredArraySchools.length;



// var target_noofschool = $("#target_noofschool").val();
if (total > selectedSchoolcounts) {
    alert('You want to assign number of schools: ' + total + " but above you have selected " + selectedSchoolcounts + " schools. Please decrease the number of schools.");
    return false;
} else if (total < selectedSchoolcounts) {
    alert('You want to assign number of schools: ' + total + " but above you have selected " + selectedSchoolcounts + " schools. Please increase the number of schools.");
    return false;
} else if (total == selectedSchoolcounts) {
    return true;
} else {
  alert("okay");
    return false;
}

  });
  
  
  
  
  
  
  
  
  
  
  
  
  });
  
</script>
<?php $this->load->view('footer'); ?>