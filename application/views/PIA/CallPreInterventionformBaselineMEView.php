<div class="container mt-4 mb-5 p-4 border rounded">
  <form action="updateCallMnEBaseline" method="POST" id="meForm">
  <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
    <!-- Action Completed -->
    <div class="mb-3">
      <label class="form-label fw-bold">Action Completed?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="action_completed" value="yes" id="actionYes">
        <label class="form-check-label" for="actionYes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="action_completed" value="no" id="actionNo">
        <label class="form-check-label" for="actionNo">No</label>
      </div>
    </div>

    <!-- Purpose Completed -->
    <div class="mb-3" id="purposeSection" style="display:none;">
      <label class="form-label fw-bold">Purpose Completed?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="purpose_completed" value="yes" id="purposeYes">
        <label class="form-check-label" for="purposeYes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="purpose_completed" value="no" id="purposeNo">
        <label class="form-check-label" for="purposeNo">No</label>
      </div>
    </div>

    <!-- Conditional Fields -->
    <div id="conditionalFields" style="display:none;">
      <div class="mb-3">
        <label class="form-label">1. Did you speak to the principal and informed about the M&E?</label>
        <select class="form-select" name="informed_principal">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">2. Did you confirm the date and time with school to conduct M&E?</label>
        <select class="form-select" name="confirm_date_time">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">3. Have you gone through the M&E Questionnaire and understood?</label>
        <select class="form-select" name="questionnaire_understood">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">4. Did you take a print of the questionnaires?</label>
        <select class="form-select" name="print_taken">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">5. Is the M&E Letter format ready for the school to give post M&E completion?</label>
        <select class="form-select" name="letter_ready">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <!-- Final Remark -->
      <div class="mb-3">
        <label class="form-label">Final Remark</label>
        <textarea class="form-control" name="final_remark" rows="3"></textarea>
      </div>
    </div>
    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary w-100">Submit</button>
  </form>
</div>
<script>
  $(document).ready(function () {
    $('input[name="action_completed"]').change(function () {
      if ($(this).val() === 'yes') {
        $('#purposeSection').show();
      } else {
        $('#purposeSection').hide();
        $('#conditionalFields').hide();
      }
    });

    $('input[name="purpose_completed"]').change(function () {
      if ($(this).val() === 'yes') {
        $('#conditionalFields').show();
      } else {
        $('#conditionalFields').hide();
      }
    });
  });
</script>
