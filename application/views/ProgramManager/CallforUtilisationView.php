<!-- MSC Feedback Form - Part 2 -->
<div class="modal-body overflow-auto p-3" style="max-height: 80vh;">
  <form action="<?php echo base_url();?>Menu/UpdateCallforUtilisation" method="POST" class="p-3 border rounded bg-light">
    <input type="hidden" name="taskId" value="<?php echo $taskId;?>">
    <h5 class="mb-3">Utilisation Feedback</h5>
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

    <div class="mb-3" id="purpose_section" style="display: none;">
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
    <div id="msc_section" style="display: none;">
    <div class="mb-3">
  <label class="form-label fw-semibold text-wrap">I am sure you are happy with the MSC installation but, I fear that the MSC is not being used.</label>
  <input type="text" name="mscUsageComment" class="form-control">
</div>

<div class="mb-3">
  <label class="form-label fw-semibold text-wrap" style="max-width: 100%;">
    Do you know that MSC exhibits can also help you to explain concepts & it will save your time? Don't you agree to this?
  </label>
  <select name="agreeConceptHelp" class="form-select">
    <option value="">--Select--</option>
    <option value="yes">Yes</option>
    <option value="no">No</option>
  </select>
</div>

<div class="mb-3">
  <label class="form-label fw-semibold text-wrap" style="max-width: 100%;">
    Do you know that MSC exhibits helps you to connect & catch more attention of students during lectures?
  </label>
  <select name="agreeAttention" class="form-select">
    <option value="">--Select--</option>
    <option value="yes">Yes</option>
    <option value="no">No</option>
  </select>
</div>

<div class="mb-3">
  <label class="form-label fw-semibold text-wrap" style="max-width: 100%;">
    Were there any challenges you faced during training? Is there any difficulty in understanding our models/exhibits?
  </label>
  <select name="trainingChallenges" class="form-select">
    <option value="">--Select--</option>
    <option value="yes">Yes</option>
    <option value="no">No</option>
  </select>
</div>

<div class="mb-3">
  <label class="form-label fw-semibold text-wrap" style="max-width: 100%;">
    Do you have model school videos? We are here to handhold you & request your support as we have to report to donors and through this frequent utilization sharing, we can convert your school to Model School. Don’t you agree?
  </label>
  <select name="modelSchoolVideos" class="form-select">
    <option value="">--Select--</option>
    <option value="yes">Yes</option>
    <option value="no">No</option>
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
</div>

<script>
  const actionRadios = document.querySelectorAll('input[name="action_taken"]');
  const purposeSection = document.getElementById('purpose_section');
  const purposeRadios = document.querySelectorAll('input[name="purpose_completed"]');
  const mscSection = document.getElementById('msc_section');

  function updateVisibility() {
    const action = document.querySelector('input[name="action_taken"]:checked')?.value;
    const purpose = document.querySelector('input[name="purpose_completed"]:checked')?.value;

    // Reset visibility
    purposeSection.style.display = 'none';
    mscSection.style.display = 'none';

    if (action === 'Yes') {
      purposeSection.style.display = 'block';

      if (purpose === 'Yes') {
        mscSection.style.display = 'block';
      }
    }
  }

  actionRadios.forEach(el => el.addEventListener('change', updateVisibility));
  purposeRadios.forEach(el => el.addEventListener('change', updateVisibility));
</script>
