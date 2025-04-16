<style>
  #piaMessageForm {
    background-color: #f8f9fa;
    padding: 25px;
    border-radius: 12px;
    border: 1px solid #dee2e6;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
    max-width: 600px;
    margin: auto;
  }

  #piaMessageForm .form-label {
    font-weight: 600;
    color: #212529;
  }

  #piaMessageForm .form-control,
  #piaMessageForm .form-select {
    border-radius: 10px;
    transition: all 0.3s ease;
  }

  #piaMessageForm .form-control:focus,
  #piaMessageForm .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
  }

  #piaMessageForm button[type="submit"] {
    border-radius: 8px;
    padding: 10px 24px;
    font-weight: 500;
    transition: 0.3s ease;
  }

  #piaMessageForm button[type="submit"]:hover {
    background-color: #0b5ed7;
  }

  .mb-3 {
    margin-bottom: 1.5rem !important;
  }
</style>

<form method="POST" enctype="multipart/form-data" id="piaMessageForm" action="<?php echo base_url();?>Menu/updateReviewSessionMessage">  
  <input type="hidden" name="taskId" value="<?php echo $taskId;?>">

  <!-- Message shared by PIA (file upload) -->
  <div class="mb-3">
    <label class="form-label">Message shared by PIA</label>
    <input type="file" class="form-control" name="pia_message_file" required>
  </div>

  <!-- Is message appropriate? -->
  <div class="mb-3">
    <label class="form-label">Is the message appropriate?</label>
    <select class="form-select" name="message_appropriate" required>
      <option value="">-- Select --</option>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <!-- Did PIA add thoughts? -->
  <div class="mb-3">
    <label class="form-label">Has PIA added thoughts/effort to make it more relatable?</label>
    <select class="form-select" name="pia_extra_effort" required>
      <option value="">-- Select --</option>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <!-- Submit Button -->
  <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>
