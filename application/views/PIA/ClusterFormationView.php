<form method="POST" action="<?php echo base_url(); ?>Menu/sendClusterApproval" class="p-4 bg-white shadow rounded" id="clusterForm">
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
  </div>
  <!-- Cluster Venue -->
  <div class="mb-3 position-relative">
    <label class="form-label fw-bold">Cluster Venue Address</label>
    <input type="text" class="form-control" id="venueInput" name="cluster_venue" placeholder="Start typing venue..." autocomplete="off" required>
    <div id="venueSuggestions" class="list-group position-absolute w-100 z-3 shadow" style="display: none;"></div>
  </div>

  <!-- Submit Button -->
  <div class="text-end">
    <button type="submit" class="btn btn-success">Send for Approval</button>
  </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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

