<!-- External header.php should be included before this -->

<div class="container mt-4">
  <form id="rttpForm" name="rttpForm" method="POST" action="<?php echo base_url();?>Menu/submit_rttp_form">
    
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

    <!-- Purpose Completed (shown if action is Yes) -->
    <div class="mb-3 d-none" id="purposeSection">
      <label class="form-label fw-bold">Purpose Completed?</label><br>
      <select class="form-select" name="purpose_completed" id="purposeCompleted">
        <option value="">Select</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>

    <!-- Full Form (shown if purpose is Yes) -->
    <div id="mainForm" class="d-none">

      <div class="mb-3">
        <label class="form-label">1. When can RTTP be scheduled?</label>
        <input type="date" class="form-control" name="rttp_date">
      </div>

      <div class="mb-3">
        <label class="form-label">2. What is the available time for RTTP?</label>
        <input type="time" class="form-control" name="rttp_time">
      </div>

      <div class="mb-3">
        <label class="form-label">3. Does the students have any queries related to MSC and our other offerings?</label>
        <select class="form-select" name="student_queries">
          <option value="">Select</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">4. Teachers using the exhibits as per the syllabus?</label>
        <select class="form-select" name="teachers_using_exhibits">
          <option value="">Select</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">5. How do Teachers best practice to our exhibits?</label>
        <select class="form-select" name="teachers_best_practice">
          <option value="">Select</option>
          <option value="in_class">In Class</option>
          <option value="outside_class">Outside Class</option>
          <option value="school">School</option>
          <option value="msc">MSC</option>
          <option value="other">Other</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">6. (If yes, acknowledge. If no, then share Best Practice video and RTTP agenda)</label>
        <textarea class="form-control" name="acknowledge_or_share" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">7. Do you know that MSC can assist you for syllabus quick revision?</label>
        <select class="form-select" name="msc_assist_revision">
          <option value="">Select</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">8. Do you know that MSC can complement E-Learning?</label>
        <select class="form-select" name="msc_complement_elearning">
          <option value="">Select</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">9. Does students practice peer to peer learning with the help of the exhibits?</label>
        <select class="form-select" name="peer_learning">
          <option value="">Select</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">10. Can DIY Activity be Scheduled for students?</label>
        <select class="form-select" name="diy_schedule">
          <option value="">Select</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">11. If yes, What time can we conduct the DIY activity for the students?</label>
        <input type="time" class="form-control" name="diy_time">
      </div>

      <div class="mb-3">
        <label class="form-label">12. Can the students arrange for basic, easy-to-use materials for DIY activity?</label>
        <select class="form-select" name="students_materials">
          <option value="">Select</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>

      <!-- Remark -->
      <div class="mb-3">
        <label class="form-label fw-bold">Remark</label>
        <textarea class="form-control" name="remark" rows="3" placeholder="Enter remarks..."></textarea>
      </div>

      <!-- Submit -->
      <div class="text-end">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </form>
</div>

<!-- External footer.php should be included after this -->

<script>
  // Show Purpose section based on Action Completed
  $('input[name="action_completed"]').change(function () {
    const actionVal = $(this).val();
    if (actionVal === 'yes') {
      $('#purposeSection').removeClass('d-none');
    } else {
      $('#purposeSection').addClass('d-none');
      $('#mainForm').addClass('d-none');
    }
  });

  // Show Main Form based on Purpose Completed
  $('#purposeCompleted').change(function () {
    const purposeVal = $(this).val();
    if (purposeVal === 'yes') {
      $('#mainForm').removeClass('d-none');
    } else {
      $('#mainForm').addClass('d-none');
    }
  });
</script>
