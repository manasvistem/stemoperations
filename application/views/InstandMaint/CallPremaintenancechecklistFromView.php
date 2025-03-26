<!-- Bootstrap Modal -->
<div class="modal fade" id="maintenanceModal" tabindex="-1" aria-labelledby="maintenanceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="maintenanceModalLabel">Maintenance Checklist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="callPreMaintenanceForm">
          <!-- Action Completed -->
          <div class="mb-3">
            <label class="form-label">Action Completed?</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="actionCompleted" value="yes" id="actionYes">
              <label class="form-check-label" for="actionYes">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="actionCompleted" value="no" id="actionNo">
              <label class="form-check-label" for="actionNo">NO</label>
            </div>
          </div>

          <!-- Purpose Completed (Initially Hidden) -->
          <div class="mb-3" id="purposeSection" style="display: none;">
            <label class="form-label">Purpose Completed?</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="purposeCompleted" value="yes" id="purposeYes">
              <label class="form-check-label" for="purposeYes">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="purposeCompleted" value="no" id="purposeNo">
              <label class="form-check-label" for="purposeNo">NO</label>
            </div>
          </div>

          <!-- Additional Fields (Initially Hidden) -->
          <div id="additionalFields" style="display: none;">
            <div class="mb-3 form-check">
              <input class="form-check-input" type="checkbox" name="requestNote" id="requestNote">
              <label class="form-check-label" for="requestNote">Share Request Maintenance Note prior.</label>
            </div>

            <div class="mb-3 form-check">
              <input class="form-check-input" type="checkbox" name="letterFormat" id="letterFormat">
              <label class="form-check-label" for="letterFormat">Is the Maintenance letter format ready for the school to give post maintenance completion?</label>
            </div>

            <div class="mb-3 form-check">
              <input class="form-check-input" type="checkbox" name="checklistForm" id="checklistForm">
              <label class="form-check-label" for="checklistForm">Do you have the maintenance Check-list form?</label>
            </div>

            <div class="mb-3 form-check">
              <input class="form-check-input" type="checkbox" name="kitReady" id="kitReady">
              <label class="form-check-label" for="kitReady">Do you have the basic maintenance kit ready?</label>
            </div>

            <div class="mb-3">
              <label class="form-label">Did you receive confirmation & date from school for maintenance? Did you inform the date to Operations?</label>
              <textarea class="form-control" name="confirmationDetails" rows="2" placeholder="Enter details"></textarea>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>

        <!-- Success Message -->
        <div id="formMessage" class="mt-3"></div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery & Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function () {
    var modal = new bootstrap.Modal($('#maintenanceModal'));
    modal.show();

    // Handle Dynamic Visibility
    $("input[name='actionCompleted']").change(function () {
      if ($("#actionYes").is(":checked")) {
        $("#purposeSection").fadeIn();
      } else {
        $("#purposeSection, #additionalFields").fadeOut();
      }
    });

    $("input[name='purposeCompleted']").change(function () {
      if ($("#purposeYes").is(":checked")) {
        $("#additionalFields").fadeIn();
      } else {
        $("#additionalFields").fadeOut();
      }
    });

    // AJAX Form Submission
    $("#callPreMaintenanceForm").submit(function (event) {
      event.preventDefault();

      $.ajax({
        url: "<?=base_url()?>Menu/updatePreMaintenance",
        type: "POST",
        data: $(this).serialize(),
        success: function (response) {
            if(response =='success'){
                $("#formMessage").html('<div class="alert alert-success">Form submitted successfully!</div>');
          setTimeout(function () {
            modal.hide(); // Hide modal after submission
          }, 2000);
            }
            else{
                //some error;
            }
          
        },
        error: function () {
          $("#formMessage").html('<div class="alert alert-danger">Error submitting form. Please try again.</div>');
        }
      });
    });
  });
</script>
