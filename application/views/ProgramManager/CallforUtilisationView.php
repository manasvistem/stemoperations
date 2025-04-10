<!-- MSC Feedback Form - Part 2 -->
<form action="<?php echo base_url();?>Menu/UpdateCallforUtilisation" method="POST" class="p-4 border rounded bg-light">
  <h5 class="mb-3">MSC Utilization Feedback</h5>

  <div class="mb-3">
    <label class="form-label d-block">Action taken?</label>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="action_taken" id="action_yes" value="Yes">
      <label class="form-check-label" for="action_yes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="action_taken" id="action_no" value="No">
      <label class="form-check-label" for="action_no">No</label>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label d-block">Purpose Completed?</label>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="purpose_completed" id="purpose_yes" value="Yes">
      <label class="form-check-label" for="purpose_yes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="purpose_completed" id="purpose_no" value="No">
      <label class="form-check-label" for="purpose_no">No</label>
    </div>
  </div>

  <div id="msc_section">
    <div class="mb-3">
      <label class="form-label">I am sure you're happy with the MSC installation but, I fear that the MSC is not being used.</label>
      <select class="form-select" name="msc_used">
        <option value="">Select</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Do you know that MSC exhibits can help explain concepts & save your time? Don't you agree?</label>
      <select class="form-select" name="save_time">
        <option value="">Select</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Do you know that MSC exhibits help connect & catch more attention of students during lectures?</label>
      <select class="form-select" name="student_attention">
        <option value="">Select</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Were there any challenges during training or difficulties in understanding models/exhibits?</label>
      <select class="form-select" name="training_challenges">
        <option value="">Select</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Do you have model school videos? Frequent utilization sharing helps us convert your school to Model School. Don't you agree?</label>
      <select class="form-select" name="model_school_videos">
        <option value="">Select</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">When will you start sharing photographs of utilization?</label>
      <input type="date" class="form-control" name="start_sharing_date">
    </div>

    <div class="mb-3">
      <label class="form-label">When shall we conduct maintenance & DIY activities at your school?</label>
      <input type="date" class="form-control" name="maintenance_date">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
  // Optional JS to show/hide msc_section
  document.querySelectorAll('input[name="action_taken"]').forEach(el => {
    el.addEventListener('change', function() {
      const section = document.getElementById('msc_section');
      section.style.display = this.value === 'Yes' ? 'block' : 'none';
    });
  });
</script>
