<form action="your-controller-function-url" method="POST" class="p-4 border rounded shadow-sm bg-light">
  <h5 class="mb-3">MSC Utilization Follow-up</h5>

  <div class="mb-3">
    <label class="form-label">Action Taken?</label><br>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="action_taken" id="actionYes" value="Yes" onclick="document.getElementById('purposeSection').style.display = 'block'">
      <label class="form-check-label" for="actionYes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="action_taken" id="actionNo" value="No" onclick="document.getElementById('purposeSection').style.display = 'none'">
      <label class="form-check-label" for="actionNo">No</label>
    </div>
  </div>

  <div id="purposeSection" style="display: none;">
    <div class="mb-3">
      <label class="form-label">Purpose Completed?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="purpose_completed" id="purposeYes" value="Yes" onclick="document.getElementById('followUpForm').style.display = 'block'">
        <label class="form-check-label" for="purposeYes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="purpose_completed" id="purposeNo" value="No" onclick="document.getElementById('followUpForm').style.display = 'none'">
        <label class="form-check-label" for="purposeNo">No</label>
      </div>
    </div>

    <div id="followUpForm" style="display: none;">
      <div class="mb-3">
        <label class="form-label">Hi Ma'am, you used to share utilization but you are not sharing these days.</label>
        <textarea name="utilization_feedback" class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">I believe that Refresh training has been conducted and the PIA explained the concepts behind the models, to leverage you MSC knowledge.</label>
        <textarea name="training_feedback" class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Has PIA explained you the benefits of MSC? Have you faced any challenges during the training?</label>
        <textarea name="training_challenges" class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">We want to develop your school as Model School. Are you willing to support us?</label>
        <select name="support_model_school" class="form-select">
          <option value="">Select</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Do you know the parameters of Model Schools?</label>
        <select name="know_parameters" class="form-select">
          <option value="">Select</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Volunteering & DIY activity can be done in your school. When should we schedule it? What is the feasible time and day preferred by your school?</label>
        <textarea name="volunteering_schedule" class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Do you know the best practices of MSC usage?</label>
        <select name="know_best_practices" class="form-select">
          <option value="">Select</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Do you take our exhibits to classroom?</label>
        <select name="take_exhibits" class="form-select">
          <option value="">Select</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
      </div>
    </div>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

<script>
  // Add JavaScript fallback logic if needed
</script>