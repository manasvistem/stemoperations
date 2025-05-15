<!-- Assuming Bootstrap CSS and external header are already included -->
<div class="container my-5">
<?php if ($this->session->flashdata('success_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> <?php echo $this->session->flashdata('success_message'); ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif; ?>
  <form action="<?php echo base_url()?>Menu/updateSchoolData" method="POST">
    <div class="card shadow rounded-4">
      <div class="card-header bg-primary text-white text-center rounded-top-4">
        <h4 class="mb-0">School Entry Form</h4>
      </div>
      <div class="card-body">
        <!-- Layout 1: Basic School & Project Info -->
        <div class="mb-4">
          <h5 class="text-secondary border-bottom pb-2">Basic Information</h5>
          <div class="row g-3">
            <div class="col-md-4">
              <label for="sdate" class="form-label">Date</label>
              <input type="date" id="sdate" name="sdate" class="form-control" value="<?= $spddata['sdate'] ?>">
            </div>
            <div class="col-md-4">
              <label for="projectcode" class="form-label">Project Code</label>
              <select id="project_code" name="project_code" class="form-select" onchange="loadData()">
                <option value="">Select Project Code</option>
                <?php foreach($projectDetails as $key=>$val){ 
                    if($val['projectcode'] == $spddata['project_code']) {
                        $selected ="selected";
                    }
                    else{
                        $selected = "";
                    }
                    ?>
                    <option value="<?php echo $val['projectcode'];?>" <?=$selected?>><?php echo $val['projectcode'];?></option>
                    <!-- Populate options dynamically -->
                 <?php } ?>
              </select>
            </div>
            <div class="col-md-4">
              <label for="clientname" class="form-label">Client Name</label>
              <input type="text" class="form-control" value="<?php echo $spddata['clientname'];?>" name="clientname" id="clientname" disabled>
              <!-- <select id="clientname" name="clientname" class="form-select">
                <option value="">Select Client</option>
              </select> -->
            </div>
            <div class="col-md-4">
              <label for="saddress" class="form-label">PIA Name</label>
              <?php //dd($PIAList); ?>
              <select id="pia_list" name="pi_id" class="form-select" required>
                <option value="">Select PIA</option>
                <?php foreach($PIAList as $key=>$val){
                    if($val['id'] =  $spddata['pi_id']){
                        $selected = "selected";
                    }
                    else{
                        $selected = "";
                    }
                    ?>
                    <option value="<?php echo $val['id'];?>" <?=$selected;?>><?php echo $val['fullname'];?></option>
                    <!-- Populate options dynamically -->
                 <?php } ?>
              </select>
            </div>
            <div class="col-md-4">
              <label for="sname" class="form-label">School Name</label>
              <input type="text" id="sname" name="sname" class="form-control" value="<?php echo $sname;?>" required>
            </div>
            <div class="col-md-4">
              <label for="saddress" class="form-label">Address</label>
              <textarea id="saddress" name="saddress" class="form-control" rows="2" required><?php echo $saddress;?></textarea>
            </div>
          </div>
        </div>

        <!-- Layout 2: Location Details -->
        <div class="mb-4">
          <h5 class="text-secondary border-bottom pb-2">Location & Details</h5>
          <div class="row g-3">
          <div class="col-md-3">
              <label for="sregion" class="form-label">Region</label>
              <select id="sregion" name="sregion" class="form-select" required>
                   <option value="">Select Region</option>
                    <?php foreach($regions as $regionk=>$regionval) {
                         ?>
                         <option value="<?php echo $regionval->id;?>"><?php echo $regionval->name;?></option>
                         <?php  
                     }?>
              </select>
            </div>
          <div class="col-md-3">
              <label for="sstate" class="form-label">State</label>
              <select id="sstate" name="sstate" class="form-select" required>
              <option value="">Select State</option>
                    <?php foreach($states as $statek=>$stateval) {
                         ?>
                         <option value="<?php echo $stateval['id'];?>"><?php echo $stateval['statename'];?></option>
                         <?php  
                     }?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="scity" class="form-label">City</label>
              <select id="scity" name="scity" class="form-select" required>
              <option value="">Select City</option>
                    <?php foreach($cities as $cityk=>$cityval) {
                         ?>
                         <option value="<?php echo $cityval['id'];?>"><?php echo $cityval['cityname'];?></option>
                         <?php  
                     }?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="sdistrict" class="form-label">District</label>
                 <select id="sdistrict" name="sdistrict" class="form-select" required>
                    <option value="">Select District</option>
                    <?php foreach($districts as $diskey=>$disval) {
                         ?>
                         <option value="<?php echo $disval['id'];?>"><?php echo $disval['districtn'];?></option>
                         <?php  
                     }?>
                  </select>
            </div>
            <div class="col-md-3">
              <label for="tehshil" class="form-label">Tehsil</label>
              <input type="text" name="tehshil" value="" class="form-control" required/>
              <!-- <select id="tehshil" name="tehshil" class="form-select" required>
              <option value="">Select Tehsil</option>
                    <?php /* foreach($tehsils as $tehkey=>$tehval){
                         ?>
                         <option value="<?php echo $tehval['id'];?>"><?php echo $tehval['tehshiln'];?></option>
                         <?php  
                     } */?>
              </select> -->
            </div>
           
           
           
            <div class="col-md-3">
              <label for="slanguage" class="form-label">Language</label>
              <select id="slanguage" name="slanguage[]" class="form-select" multiple required>
              <option value="">Select Language</option>
                <?php foreach($languages as $languagesk=>$languagesval) {
                         ?>
                         <option value="<?php echo $languagesval['language_name'];?>"><?php echo $languagesval['language_name'];?></option>
                         <?php  
                     }?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="spincode" class="form-label">Pincode</label>
              <input type="text" inputmode="numeric" pattern="\d*"  id="spincode" name="spincode" class="form-control" maxlength="6">
            </div>
            <div class="col-md-3">
              <label for="snoyear" class="form-label">No. of Years</label>
              <input type="text" id="snoyear" name="snoyear" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="sayear" class="form-label">Academic Year</label>
              <input type="text" id="sayear" name="sayear" class="form-control">
            </div>
          </div>
        </div>
        <!-- Layout 3: Academic & Additional Info -->
        <div class="mb-4">
          <h5 class="text-secondary border-bottom pb-2">Academic</h5>
          <div class="row g-3">
            <div class="col-md-3">
              <label for="std" class="form-label">STD</label>
              <input type="text" id="std" name="std" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="boys" class="form-label">Boys</label>
              <input type="number" id="boys" name="boys" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="girls" class="form-label">Girls</label>
              <input type="number" id="girls" name="girls" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="total_students" class="form-label">Total Students</label>
              <input type="number" id="total_students" name="total_students" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="total_teachers" class="form-label">Total Teachers</label>
              <input type="number" id="total_teachers" name="total_teachers" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="timing" class="form-label">Timing</label>
              <input type="text" id="timing" name="timing" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="website" class="form-label">Website</label>
              <input type="text" id="website" name="website" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="rremark" class="form-label">Remarks</label>
              <textarea id="rremark" name="rremark" class="form-control" rows="2"></textarea>
            </div>
          </div>
        </div>
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-success px-5 py-2 rounded-pill">Submit</button>
        </div>

      </div>
    </div>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function loadData() {
    const selected_project = document.getElementById("project_code").value;
  // console.log(selected_project);return false;
      //  alert(selectedCode);return false;
        if (selected_project !== '') {
            $.ajax({
                url: '<?= base_url("Menu/getProjectDetails") ?>',
                method: 'POST',
                data: { project_code: selected_project },
                dataType: 'json',
                success: function(response) {
                    console.log(response); // Debug
                    $('#clientname').val(response.client_name);
                    $('#sayear').val(response.project_year);
                    $('#expected_installation_date').val(response.expected_installation_date);
                    $('#pstatus').val(response.pstatus);
                    $('#status').val(response.status);
                    $('#rremark').val(response.remark);
                    //$('#sdate').val(response.sdatet.split(' ')[0]); // Convert datetime to date
                    // Add others as needed
                },
                error: function(xhr) {
                    alert("Error fetching project details.");
                }
            });
        }
    // You can call your AJAX or update logic here
  }
</script>
<script>
$(document).ready(function(){
    $('#sregion').on('change', function(){
        var regionId = $(this).val();
        if(regionId !== '') {
            $.ajax({
                url: '<?= base_url("Menu/getStateList") ?>', // Change `yourcontroller` to actual controller name
                type: 'POST',
                data: {sregion: regionId},
                dataType: 'json',
                success: function(data) {
                    $('#sstate').html('<option value="">Select State</option>');
                    $.each(data, function(key, value) {
                        $('#sstate').append('<option value="' + value.id + '">' + value.statename + '</option>');
                    });
                },
                error: function() {
                    alert('Failed to fetch states');
                }
            });
        } else {
            $('#sstate').html('<option value="">Select State</option>');
        }
    });
});
</script>

