<div class="modal fade" id="maintenanceModal" tabindex="-1" aria-labelledby="maintenanceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="maintenanceModalLabel">Maintenance Checklist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="maintenanceForm">
          <div class="mb-3">
            <label class="form-label">Action Completed?</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="actionCompleted" value="yes">
              <label class="form-check-label">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="actionCompleted" value="no">
              <label class="form-check-label">NO</label>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Purpose Completed?</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="purposeCompleted" value="yes">
              <label class="form-check-label">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="purposeCompleted" value="no">
              <label class="form-check-label">NO</label>
            </div>
          </div>

          <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" id="requestNote">
            <label class="form-check-label" for="requestNote">Share Request Maintenance Note prior.</label>
          </div>

          <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" id="letterFormat">
            <label class="form-check-label" for="letterFormat">Is the Maintenance letter format ready for the school to give post maintenance completion?</label>
          </div>

          <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" id="checklistForm">
            <label class="form-check-label" for="checklistForm">Do you have the maintenance Check-list form?</label>
          </div>

          <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" id="kitReady">
            <label class="form-check-label" for="kitReady">Do you have the basic maintenance kit ready?</label>
          </div>

          <div class="mb-3">
            <label class="form-label">Did you receive confirmation & date from school for maintenance? Did you inform the date to Operations?</label>
            <textarea class="form-control" rows="2" placeholder="Enter details"></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Button to Trigger Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#maintenanceModal">
  Open Maintenance Modal
</button>
