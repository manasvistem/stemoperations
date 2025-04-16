<form method="POST" id="mscForm">
<input type="hidden" name="taskId" value="<?php echo $taskId;?>">
    <!-- Action Taken -->
    <div class="mb-3">
      <label class="form-label">Action taken? (Yes/No)</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input action-radio" type="radio" name="action_taken" value="yes" id="actionYes">
        <label class="form-check-label" for="actionYes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input action-radio" type="radio" name="action_taken" value="no" id="actionNo">
        <label class="form-check-label" for="actionNo">No</label>
      </div>
    </div>

    <!-- Purpose Completed -->
    <div id="purposeSection" class="mb-3 hidden-section">
      <label class="form-label">Purpose Completed? (Yes/No)</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input purpose-radio" type="radio" name="purpose_completed" value="yes" id="purposeYes">
        <label class="form-check-label" for="purposeYes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input purpose-radio" type="radio" name="purpose_completed" value="no" id="purposeNo">
        <label class="form-check-label" for="purposeNo">No</label>
      </div>
    </div>

    <!-- Remaining Form Fields -->
    <div id="fieldsSection" class="hidden-section">

      <div class="mb-3">
        <label class="form-label">Hi Maam, you used to share utilization but you are not sharing these days.</label>
        <input type="text" name="utilization_comment" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">
          I believe that Refresh training has been conducted and the PIA explained the concepts behind the models, to leverage your MSC knowledge.
        </label>
        <select class="form-select" name="refresh_training">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">
          Has PIA explained you the benefits of MSC? Have you faced any challenges during the training?
        </label>
        <select class="form-select" name="msc_benefits">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">We want to develop your school as Model School. Are you willing to support us?</label>
        <select class="form-select" name="model_school_support">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Do you know the parameters of Model Schools?</label>
        <select class="form-select" name="model_school_parameters">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">
          Volunteering & DIY activity can be done in your school. What is the feasible time and day preferred by your school?
        </label>
        <input type="date" name="volunteer_schedule" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Every month we request you to share utilization.</label>
        <input type="text" name="monthly_utilization" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Do you know the best practices of MSC usage?</label>
        <select class="form-select" name="msc_practices">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Do you take our exhibits to classroom?</label>
        <select class="form-select" name="use_exhibits">
          <option value="">-- Select --</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.action-radio').change(function () {
        const actionVal = $('input[name="action_taken"]:checked').val();
        if (actionVal === 'yes') {
          $('#purposeSection').slideDown();
        } else {
          $('#purposeSection, #fieldsSection').slideUp();
          $('input[name="purpose_completed"]').prop('checked', false);
        }
      });

      $('.purpose-radio').change(function () {
        const purposeVal = $('input[name="purpose_completed"]:checked').val();
        if (purposeVal === 'yes') {
          $('#fieldsSection').slideDown();
        } else {
          $('#fieldsSection').slideUp();
        }
      });
    });
  </script>