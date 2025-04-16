<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
  .whatsapp-icon {
    color: #25D366;
    font-size: 1.4rem;
    cursor: pointer;
  }
  .teacher-info {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border: 1px solid #dee2e6;
  }
</style>

<form id="nspForm" method="POST" action="<?php echo base_url();?>Menu/submitNspSharing">
  <!-- Share NSP link -->
  <div class="mb-3">
    <label class="form-label">Can you share NSP registration link with teachers?</label>
    <select class="form-select" name="can_share" id="canShare" required>
      <option value="">-- Select --</option>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <!-- NSP Registration list (Zone-wise schools) -->
  <div class="mb-3" id="schoolSelection" style="display: none;">
    <label class="form-label">Select School (PIA Zone Wise)</label>
    <select class="form-select" name="school_id" id="schoolSelect" required>
      <option value="">-- Select School --</option>
      <option value="school1">Alpha Public School (Zone 1)</option>
      <option value="school2">Beta High School (Zone 2)</option>
      <option value="school3">Gamma Academy (Zone 3)</option>
    </select>
  </div>

  <!-- Teacher Info (dynamic based on school selection) -->
  <div id="teacherInfo" class="teacher-info d-none">
    <h6>Teacher Details</h6>
    <ul class="list-group" id="teacherList">
      <!-- Filled by JS -->
    </ul>
  </div>
  <!-- Submit Button -->
  <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>

<!-- jQuery for dynamic behavior -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  const teacherData = {
    school1: [
      { name: "Mr. Rajesh", phone: "9876543210" },
      { name: "Ms. Neha", phone: "9123456789" }
    ],
    school2: [
      { name: "Mr. Amit", phone: "9001122334" }
    ],
    school3: [
      { name: "Ms. Pooja", phone: "9810012345" },
      { name: "Mr. Arjun", phone: "8899007766" }
    ]
  };

  $('#canShare').change(function () {
    if ($(this).val() === 'yes') {
      $('#schoolSelection').slideDown();
    } else {
      $('#schoolSelection').slideUp();
      $('#teacherInfo').addClass('d-none');
    }
  });

  $('#schoolSelect').change(function () {
    const schoolId = $(this).val();
    const teachers = teacherData[schoolId] || [];

    if (teachers.length) {
      $('#teacherList').html('');
      teachers.forEach(t => {
        $('#teacherList').append(`
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <strong>${t.name}</strong><br>
              <small>${t.phone}</small>
            </div>
            <a href="https://wa.me/91${t.phone}" target="_blank" class="whatsapp-icon">
              <i class="bi bi-whatsapp"></i>
            </a>
          </li>
        `);
      });
      $('#teacherInfo').removeClass('d-none');
    } else {
      $('#teacherInfo').addClass('d-none');
    }
  });
</script>
