<!-- Bootstrap CSS -->
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

<!-- NSP Registration Sharing Form -->
<form id="nspForm" method="POST" action="<?= base_url(); ?>Menu/submitNspinfomation">
    <input type="hidden" name="taskId" value="<?php echo $taskId;?>">
  <!-- Share NSP link -->
  <div class="mb-3">
    <label class="form-label">Can you share NSP registration link with teachers?</label>
    <select class="form-select" name="can_share" id="canShare" required>
      <option value="">-- Select --</option>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <label class="form-label">NSP Registration Link</label>
  <!-- School Dropdown -->
  <div class="mb-3" id="schoolSelection" style="display: none;">
    <label class="form-label">Select School</label>
    <select class="form-select" name="school_id" id="schoolSelect" required>
      <option value="">-- Loading Schools --</option>
    </select>
  </div>

  <!-- Teacher Info -->
  <div id="teacherInfo" class="teacher-info d-none">
    <h6>Teacher Details</h6>
    <ul class="list-group" id="teacherList"></ul>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
  $(document).ready(function () {
    // On change of "can share" dropdown
    $('#canShare').change(function () {
      const val = $(this).val();
      if (val === 'yes') {
        $('#schoolSelection').slideDown();
        loadSchools();
      } else {
        $('#schoolSelection').slideUp();
        $('#teacherInfo').addClass('d-none');
      }
    });

    // Load schools via AJAX
    function loadSchools() {
      $.ajax({
        url: '<?= base_url(); ?>Menu/getSchoolsForNsp',
        type: 'GET',
        dataType: 'json',
        success: function (schools) {
          let options = `<option value="">-- Select School --</option>`;
          schools.forEach(s => {
            options += `<option value="${s.id}">${s.sname} (${s.szone_name})</option>`;
          });
          $('#schoolSelect').html(options);
        },
        error: function () {
          alert("Failed to load schools");
        }
      });
    }

    // On school selection, load teachers
    $('#schoolSelect').change(function () {
      const schoolId = $(this).val();
      if (schoolId) {
        $.ajax({
          url: '<?= base_url(); ?>Menu/getTeachersBySchool/' + schoolId,
          type: 'GET',
          dataType: 'json',
          success: function (teachers) {
            if (teachers.length) {
              $('#teacherList').html('');
              teachers.forEach(t => {
                $('#teacherList').append(`
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                      <strong>${t.contact_name}</strong><br>
                      <small>${t.contact_no}</small>
                    </div>
                    <a href="https://wa.me/91${t.contact_no}" target="_blank" class="whatsapp-icon">
                      <i class="bi bi-whatsapp" style="color:#25D366; font-size: 1.4rem;"></i>
                    </a>
                  </li>
                `);
              });
              $('#teacherInfo').removeClass('d-none');
            } else {
              $('#teacherInfo').addClass('d-none');
            }
          },
          error: function () {
            alert("Unable to load teachers");
          }
        });
      }
    });

  });
</script>
