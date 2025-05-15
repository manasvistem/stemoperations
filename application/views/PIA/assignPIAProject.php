<!-- Assuming external header is already included -->
<div class="container my-5">
<?php if ($this->session->flashdata('success_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> <?php echo $this->session->flashdata('success_message'); ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif; ?>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
          <h4>Assign New PIA</h4>
        </div>
        <div class="card-body">
          <form name="assignPIA" action="<?php echo base_url();?>Menu/updateNewPIAtoSChool" method="POST">
            <!-- Project Code Dropdown -->
            <div class="mb-4">
              <label for="project_code" class="form-label fw-bold">Project Code</label>
              <select id="project_code" name="project_code" class="form-select" onchange="getSchoolList(this.value)">
                <option value="">Select Project Code</option>
                <?php foreach ($projectCodes as $val) { ?>
                  <option value="<?= $val['projectcode'] ?>"><?= $val['projectcode'] ?></option>
                <?php } ?>
              </select>
            </div>

            <!-- School Dropdown -->
            <div class="mb-4">
              <label for="schoollist" class="form-label fw-bold">School Name</label>
              <select id="schoollist" name="schoollist" class="form-select" onchange="getCurrentPIA(this.value)">
                <option value="">Select School</option>
                <!-- Options will be populated via JS -->
              </select>
            </div>

            <!-- Current PIA Name -->
            <div class="mb-4">
              <label class="form-label fw-bold">Current PIA</label><span class="form-control" id="current_pia" name="current_pia"></span>
               <input class="form-dark" type="hidden" id="current_pia_id" name="current_pia_id" class="form-control" value="" readonly>
            </div>

            <!-- New PIA Dropdown -->
            <div class="mb-4">
              <label for="new_pia" class="form-label fw-bold">Assign New PIA</label>
              <select id="new_pia" name="new_pia" class="form-select">
                <option value="">Select New PIA</option>
                <?php foreach ($PIAList as $val) { ?>
                  <option value="<?= $val['id'] ?>"><?= $val['user_name'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-success px-4 py-2 rounded-pill">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function getSchoolList(projectCodeId) {
  if (!projectCodeId) return;
  $.ajax({
    url: '<?php echo base_url()?>Menu/getProjectSChools',
    method: 'POST',
    data: { project_code: projectCodeId },
    success: function (response) {
        const data = JSON.parse(response); // now parse manually
    let options = '<option value="">Select School</option>';
    $.each(data, function (index, item) {
      options += `<option value="${item.id}">${item.sname}</option>`;
    });
       $('#schoollist').html(options);
    },
    error: function () {
      alert('Error fetching schools.');
    }
  });
}
function getCurrentPIA(sid) {
  if (!sid) return;
  $.ajax({
    url: '<?php echo base_url();?>Menu/getProjectSChoolPIA',
    method: 'POST',
    dataType: 'json',
    data: { sid: sid },
    success: function (response) {
      $('#current_pia').html(response.pia_name);
      $('#current_pia_id').html(response.pia_id);

    },
    error: function () {
      alert('Error fetching PIA.');
    }
  });
}
</script>

<!-- Assuming external footer is already included -->
