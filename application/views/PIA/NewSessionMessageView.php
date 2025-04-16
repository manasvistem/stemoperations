<style>
  #creativeForm {
    background-color: #f9f9fb;
    border: 1px solid #dee2e6;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  }

  #creativeForm .form-label {
    font-weight: 500;
    color: #343a40;
  }

  #creativeForm .form-control,
  #creativeForm .form-select {
    border-radius: 10px;
    box-shadow: none;
    transition: border-color 0.3s, box-shadow 0.3s;
  }

  #creativeForm .form-control:focus,
  #creativeForm .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.2);
  }

  .hidden-section {
    display: none;
  }

  .btn-primary {
    border-radius: 8px;
    padding: 8px 20px;
    font-weight: 500;
  }

  .mb-3 {
    margin-bottom: 1.5rem !important;
  }
</style>

<form method="POST" enctype="multipart/form-data" id="creativeForm" action="<?php echo base_url();?>Menu/updateNewSessionMessage">
  <input type="hidden" name="taskId" value="<?php echo $taskId;?>">
  <!-- Select Date -->
  <div class="mb-3">
    <label class="form-label">Select Date</label>
    <input type="date" class="form-control" name="selected_date" required>
  </div>
  <!-- Creative done by PIA -->
  <div class="mb-3">
    <label class="form-label">Creative done by PIA (Yes/No)</label>
    <select class="form-select" name="pia_creative" id="piaCreative">
      <option value="">-- Select --</option>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <!-- File upload for PIA Creative -->
  <div class="mb-3 hidden-section" id="piaFileSection">
    <label class="form-label">Upload file (PIA Creative)</label>
    <input type="file" class="form-control" name="pia_file">
  </div>

  <!-- Creative taken from STEM DB -->
  <div class="mb-3">
    <label class="form-label">Creative taken from STEM database (Yes/No)</label>
    <select class="form-select" name="stem_creative" id="stemCreative">
      <option value="">-- Select --</option>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <!-- File upload for STEM DB -->
  <div class="mb-3 hidden-section" id="stemFileSection">
    <label class="form-label">Upload file (STEM Creative)</label>
    <input type="file" class="form-control" name="stem_file">
  </div>

  <!-- Screenshot Upload -->
  <div class="mb-3">
    <label class="form-label">Upload screenshot of message shared</label>
    <input type="file" class="form-control" name="screenshot_file" accept="image/*">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://code.jquery.com/5-3.7.1.min.js"></script>
<script>
  $(document).ready(function () {
    $('#piaCreative').change(function () {
      if ($(this).val() === 'yes') {
        $('#piaFileSection').slideDown();
      } else {
        $('#piaFileSection').slideUp();
      }
    });

    $('#stemCreative').change(function () {
      if ($(this).val() === 'yes') {
        $('#stemFileSection').slideDown();
      } else {
        $('#stemFileSection').slideUp();
      }
    });
  });
</script>
