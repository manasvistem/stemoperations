<form action="<?= base_url('Menu/updateCallMEEndline') ?>" method="post" enctype="multipart/form-data" class="p-4 border rounded bg-white shadow-sm">
<input type="hidden" name="taskId" id="taskId" value="<?php echo $taskId;?>" >
<input type="hidden" name="tasktypeid" id="tasktypeid" value="<?php echo $tasktypeid;?>" >
  <!-- Action Completed -->
  <div class="mb-3">
    <label class="form-label fw-bold">Action Completed?</label>
    <div class="d-flex gap-3">
      <div class="form-check">
        <input class="form-check-input action-toggle" type="radio" name="action_completed" id="action_yes" value="yes">
        <label class="form-check-label" for="action_yes">YES</label>
      </div>
      <div class="form-check">
        <input class="form-check-input action-toggle" type="radio" name="action_completed" id="action_no" value="no">
        <label class="form-check-label" for="action_no">NO</label>
      </div>
    </div>
  </div>

  <!-- Purpose Completed -->
  <div id="purpose-section" class="mb-3 d-none">
    <label class="form-label fw-bold">Purpose Completed?</label>
    <div class="d-flex gap-3">
      <div class="form-check">
        <input class="form-check-input purpose-toggle" type="radio" name="purpose_completed" id="purpose_yes" value="yes">
        <label class="form-check-label" for="purpose_yes">YES</label>
      </div>
      <div class="form-check">
        <input class="form-check-input purpose-toggle" type="radio" name="purpose_completed" id="purpose_no" value="no">
        <label class="form-check-label" for="purpose_no">NO</label>
      </div>
    </div>
  </div>

  <!-- Detailed Questions -->
  <div id="form-section" class="d-none">

    <div class="mb-3">
      <label class="form-label">1. Did you speak to the principal and inform about the M&E?</label>
      <select class="form-select" name="q1" required>
        <option value="">Select</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">2. Did you confirm the date and time with school to conduct M&E?</label>
      <select class="form-select" name="q2" required>
        <option value="">Select</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">3. Have you gone through the M&E Questionnaire and understood?</label>
      <select class="form-select" name="q3" required>
        <option value="">Select</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">4. Did you take a print of the questionnaires?</label>
      <select class="form-select" name="q4" required>
        <option value="">Select</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label d-block">5. Is the M&E Letter format ready for the school to give post M&E completion?</label>
      <div class="d-flex gap-3 mb-2">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="q5_letter_ready" id="letter_yes" value="yes">
          <label class="form-check-label" for="letter_yes">YES</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="q5_letter_ready" id="letter_no" value="no">
          <label class="form-check-label" for="letter_no">NO</label>
        </div>
      </div>
      <!-- <input type="file" name="letter_file" class="form-control"> -->
    </div>

    <div class="mb-3">
      <label for="final_remark" class="form-label fw-bold">Final Remark</label>
      <textarea class="form-control" name="final_remark" id="final_remark" rows="3"></textarea>
    </div>
  </div>

  <div class="text-end">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

<script>
  $(document).ready(function() {
    $('.action-toggle').on('change', function() {
      if ($(this).val() === 'yes') {
        $('#purpose-section').removeClass('d-none');
      } else {
        $('#purpose-section, #form-section').addClass('d-none');
      }
    });

    $('.purpose-toggle').on('change', function() {
      if ($(this).val() === 'yes') {
        $('#form-section').removeClass('d-none');
      } else {
        $('#form-section').addClass('d-none');
      }
    });
  });
</script>
