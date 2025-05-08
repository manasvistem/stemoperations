<!-- Assuming Bootstrap CSS and external header are already included -->
<div class="container my-5">
  <form action="submit_school_form.php" method="POST">
    <div class="card shadow rounded-4">
      <div class="card-header bg-primary text-white text-center rounded-top-4">
        <h4 class="mb-0">School Entry Form</h4>
      </div>
      <div class="card-body">
        <!-- Layout 1: Basic School & Project Info -->
        <div class="mb-4">
          <h5 class="text-secondary border-bottom pb-2">Basic Information</h5>
          <div class="row g-3">
            <div class="col-md-4">
              <label for="sdate" class="form-label">Date</label>
              <input type="date" id="sdate" name="sdate" class="form-control" value="<?= date('Y-m-d'); ?>">
            </div>
            <div class="col-md-4">
              <label for="project_code" class="form-label">Project Code</label>
              <select id="project_code" name="project_code" class="form-select">
                <option value="">Select Project Code</option>
                <!-- Populate options dynamically -->
              </select>
            </div>
            <div class="col-md-4">
              <label for="clientname" class="form-label">Client Name</label>
              <select id="clientname" name="clientname" class="form-select">
                <option value="">Select Client</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="sname" class="form-label">School Name</label>
              <input type="text" id="sname" name="sname" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="saddress" class="form-label">Address</label>
              <textarea id="saddress" name="saddress" class="form-control" rows="2"></textarea>
            </div>
          </div>
        </div>

        <!-- Layout 2: Location Details -->
        <div class="mb-4">
          <h5 class="text-secondary border-bottom pb-2">Location & Details</h5>
          <div class="row g-3">
            <div class="col-md-3">
              <label for="sdistrict" class="form-label">District</label>
              <select id="sdistrict" name="sdistrict" class="form-select"></select>
            </div>
            <div class="col-md-3">
              <label for="tehshil" class="form-label">Tehsil</label>
              <select id="tehshil" name="tehshil" class="form-select"></select>
            </div>
            <div class="col-md-3">
              <label for="scity" class="form-label">City</label>
              <select id="scity" name="scity" class="form-select"></select>
            </div>
            <div class="col-md-3">
              <label for="sstate" class="form-label">State</label>
              <select id="sstate" name="sstate" class="form-select"></select>
            </div>
            <div class="col-md-3">
              <label for="szone" class="form-label">Zone</label>
              <select id="szone" name="szone" class="form-select"></select>
            </div>
            <div class="col-md-3">
              <label for="slocation" class="form-label">Location</label>
              <select id="slocation" name="slocation" class="form-select"></select>
            </div>
            <div class="col-md-3">
              <label for="sregion" class="form-label">Region</label>
              <select id="sregion" name="sregion" class="form-select"></select>
            </div>
            <div class="col-md-3">
              <label for="slanguage" class="form-label">Language</label>
              <select id="slanguage" name="slanguage" class="form-select"></select>
            </div>
            <div class="col-md-3">
              <label for="spincode" class="form-label">Pincode</label>
              <input type="text" id="spincode" name="spincode" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="snoyear" class="form-label">No. of Years</label>
              <input type="text" id="snoyear" name="snoyear" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="sayear" class="form-label">Academic Year</label>
              <input type="text" id="sayear" name="sayear" class="form-control">
            </div>
          </div>
        </div>

        <!-- Layout 3: Academic & Additional Info -->
        <div class="mb-4">
          <h5 class="text-secondary border-bottom pb-2">Academic & Status</h5>
          <div class="row g-3">
            <div class="col-md-3">
              <label for="totalutilization" class="form-label">Total Utilization</label>
              <input type="text" id="totalutilization" name="totalutilization" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="waname" class="form-label">WA Name</label>
              <input type="text" id="waname" name="waname" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="wanamelink" class="form-label">WA Name Link</label>
              <input type="text" id="wanamelink" name="wanamelink" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="status" class="form-label">Status</label>
              <input type="text" id="status" name="status" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="pstatus" class="form-label">PStatus</label>
              <input type="text" id="pstatus" name="pstatus" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="std" class="form-label">STD</label>
              <input type="text" id="std" name="std" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="boys" class="form-label">Boys</label>
              <input type="number" id="boys" name="boys" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="girls" class="form-label">Girls</label>
              <input type="number" id="girls" name="girls" class="form-control">
            </div>
            <div class="col-md-2">
              <label for="total_students" class="form-label">Total Students</label>
              <input type="number" id="total_students" name="total_students" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="total_teachers" class="form-label">Total Teachers</label>
              <input type="number" id="total_teachers" name="total_teachers" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="timing" class="form-label">Timing</label>
              <input type="text" id="timing" name="timing" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="website" class="form-label">Website</label>
              <input type="text" id="website" name="website" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="pi_id" class="form-label">PI ID</label>
              <input type="text" id="pi_id" name="pi_id" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="rremark" class="form-label">Remarks</label>
              <textarea id="rremark" name="rremark" class="form-control" rows="2"></textarea>
            </div>
          </div>
        </div>

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-success px-5 py-2 rounded-pill">Submit</button>
        </div>

      </div>
    </div>
  </form>
</div>
