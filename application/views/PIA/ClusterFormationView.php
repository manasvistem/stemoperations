<form method="POST" action="<?php echo base_url(); ?>Menu/sendClusterApproval" class="p-4 bg-white shadow rounded" id="clusterForm">
    <input type="hidden" name="taskId" value="<?php echo $taskId;?>">
    <input type="hidden" name="tasktype" value="<?php echo $tasktype;?>">
    <input type="hidden" name="tasktype_id" value="<?php echo $tasktype_id;?>">

  <!-- Name of Cluster -->
  <div class="mb-3">
    <label class="form-label fw-bold">Name of Cluster</label>
    <input type="text" class="form-control" name="cluster_name" placeholder="Enter cluster name" required>
  </div>
  <!-- Select Schools -->
  <div class="mb-3">
    <label class="form-label fw-bold">Select Schools</label>
    <select class="form-select" name="selected_schools[]" id="schoolSelect" multiple required>
      <!-- Dynamically load school options -->
      <?php foreach($schools as $school): ?>
        <option value="<?= $school->id; ?>"><?= $school->sname; ?> (<?= $school->szone; ?>)</option>
      <?php endforeach; ?>
    </select>
    <small class="text-muted">Hold Ctrl or Cmd to select multiple schools</small>
    <div id="schoolAddresses" class="mt-2 text-muted"></div>

  </div>
  <!-- Cluster Venue -->
  <div class="mb-3 mt-3">
  <label for="clusterLocation" class="form-label fw-bold">Cluster Location</label>
  <input type="text" id="clusterLocation" name="cluster_location" class="form-control" readonly>
</div>
  <!-- Submit Button -->
  <div class="text-end">
    <input type="hidden" name="sendForApproval" value="yes">
    <button type="submit"  class="btn btn-success">Send for Approval</button>
  </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  let schoolMap = {};

  $(document).ready(function () {
    function loadSchoolsByTaskId(taskId) {
      $.ajax({
        url: "<?= base_url('Menu/getSchoolListByTaskId') ?>/" + taskId,
        type: "GET",
        dataType: "json",
        success: function (response) {
          let schoolSelect = $('#schoolSelect');
          schoolSelect.empty();
          schoolMap = {};

          $.each(response, function (index, school) {
            schoolMap[school.sid] = school;
            schoolSelect.append(
              $('<option>', {
                value: school.sid,
                text: school.sname + ' (' + school.szone + ')'
              })
            );
          });
        }
      });
    }

    // Set your dynamic taskId here
    const taskId = '<?php echo $taskId;?>';
    loadSchoolsByTaskId(taskId);

    // On change of selection
    $('#schoolSelect').on('change', function () {
      let selectedIds = $(this).val();
      let output = '';

      if (selectedIds && selectedIds.length > 0) {
        selectedIds.forEach(function (sid, index) {
          let school = schoolMap[sid];
          if (school) {
            output += `
              <div class="form-check">
                <input class="form-check-input" type="radio" name="cluster_school" id="cluster_${sid}" value="${sid}" data-cluster="${school.sname}, ${school.saddress}, ${school.scity}, ${school.sstate}">
                <label class="form-check-label" for="cluster_${sid}">
                  <strong>${school.sname}</strong>: ${school.saddress}, ${school.scity}, ${school.sstate}
                </label>
              </div>
            `;
          }
        });
      }

      $('#schoolAddresses').html(output);
    });

    // On selecting a radio button, autofill the Cluster Location
    $(document).on('change', 'input[name="cluster_school"]', function () {
      const clusterValue = $(this).data('cluster');
      $('#clusterLocation').val(clusterValue);
    });

  });


$(document).ready(function () {
  $('#venueInput').on('input', function () {
    const query = $(this).val();
    if (query.length >= 2) {
      $.ajax({
        url: "<?php echo base_url(); ?>Menu/getVenueSuggestions",
        type: "GET",
        data: { keyword: query },
        success: function (data) {
          let suggestions = JSON.parse(data);
          let suggestionHTML = '';
          suggestions.forEach(function (venue) {
            suggestionHTML += `<a href="#" class="list-group-item list-group-item-action">${venue}</a>`;
          });
          $('#venueSuggestions').html(suggestionHTML).show();
        }
      });
    } else {
      $('#venueSuggestions').hide();
    }
  });
  $(document).on('click', '#venueSuggestions a', function (e) {
    e.preventDefault();
    $('#venueInput').val($(this).text());
    $('#venueSuggestions').hide();
  });

  $(document).click(function (e) {
    if (!$(e.target).closest('#venueInput, #venueSuggestions').length) {
      $('#venueSuggestions').hide();
    }
  });
});
</script>

