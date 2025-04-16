<div class="container my-4">
  <form method="POST" enctype="multipart/form-data" name="NSPClusterRound" action="<?php echo base_url(); ?>Menu/submitClusterRoundData">
    <div class="card shadow border-0">
      <div class="card-body">
        <!-- Selfie Upload -->
        <div class="mb-3">
            <label class="form-label">Take Selfie with School</label>
            <input type="file" class="form-control" name="imgInp" id="imgInp" accept="image/*" capture="camera" required>
            <p id="locationText" class="text-success mt-2"></p>
                    <!-- Hidden Fields to Store Latitude & Longitude -->
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
            <small class="text-muted">Location and timestamp will be captured automatically.</small>
        </div>
        <!-- Pre Event Preparation Photos (DIY) -->
        <label class="form-label fw-semibold">Pre-Event Preparation Photos - DIY</label>
        <div class="mb-3 row g-3">
          <div class="col-md-6">
            <input type="file" class="form-control" name="diy_photo_1" required>
          </div>
          <div class="col-md-6">
            <input type="file" class="form-control" name="diy_photo_2" required>
          </div>
        </div>

        <!-- Pre Event Preparation Photos (Tinker) -->
        <label class="form-label fw-semibold">Pre-Event Preparation Photos - Tinker</label>
        <div class="mb-3 row g-3">
          <div class="col-md-6">
            <input type="file" class="form-control" name="tinker_photo_1" required>
          </div>
          <div class="col-md-6">
            <input type="file" class="form-control" name="tinker_photo_2" required>
          </div>
        </div>

        <!-- Start NSP Time -->
        <div class="mb-3">
          <label class="form-label">NSP Started At:</label>
          <input type="text" class="form-control" name="start_time" value="<?= date('H:i:s'); ?>" readonly>
        </div>

        <!-- Ongoing NSP Photos -->
        <label class="form-label fw-semibold">Ongoing NSP Photos</label>
        <div class="mb-3 row g-3">
          <div class="col-md-6">
            <input type="file" class="form-control" name="ongoing_photo_1" required>
          </div>
          <div class="col-md-6">
            <input type="file" class="form-control" name="ongoing_photo_2" required>
          </div>
        </div>

        <!-- School Selection -->
        <div class="mb-3">
          <label class="form-label">Select Participated School</label>
          <select class="form-select" name="school" required>
            <option value="">-- Select School --</option>
            <?php foreach($schools as $school): ?>
              <option value="<?= $school->id ?>"><?= $school->sname ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Category Selection -->
        <div class="mb-3">
          <label class="form-label">Select Category</label>
          <select class="form-select" name="category" required>
            <option value="">-- Select Category --</option>
            <option value="All">All</option>
            <option value="DIY">DIY</option>
            <option value="Tinker">Tinker</option>
          </select>
        </div>

        <!-- Judging Photos -->
        <label class="form-label fw-semibold">Winners & Judging Panel Photos</label>
        <div class="row g-3">
          <!-- DIY Winners -->
          <div class="col-md-6">
            <label class="form-label">DIY - 1st Place</label>
            <input type="file" class="form-control" name="diy_winner_1">
          </div>
          <div class="col-md-6">
            <label class="form-label">DIY - 2nd Place</label>
            <input type="file" class="form-control" name="diy_winner_2">
          </div>

          <!-- Tinker Winners -->
          <div class="col-md-4">
            <label class="form-label">Tinker - 1st Place</label>
            <input type="file" class="form-control" name="tinker_winner_1">
          </div>
          <div class="col-md-4">
            <label class="form-label">Tinker - 2nd Place</label>
            <input type="file" class="form-control" name="tinker_winner_2">
          </div>
          <div class="col-md-4">
            <label class="form-label">Tinker - 3rd Place</label>
            <input type="file" class="form-control" name="tinker_winner_3">
          </div>
        </div>

        <!-- Call with Reporting Manager -->
        <div class="mt-4 d-flex align-items-center">
          <label class="form-label me-3 mb-0 fw-semibold">Call with Reporting Manager:</label>
          <a href="tel:<?= $rm_phone ?>" class="btn btn-outline-success">
            <i class="bi bi-telephone-fill"></i> <?= $rm_phone ?>
          </a>
        </div>

        <!-- Add More Photos -->
        <div class="mt-4">
          <label class="form-label">Add More Photos</label>
          <input type="file" class="form-control" name="extra_photos[]" multiple>
        </div>

        <!-- Submit Button -->
        <div class="mt-4 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary w-25">Complete My Task</button>
        </div>

      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
   $(document).ready(function () {
    $("#imgInp").click(function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    var lat = position.coords.latitude;
                    var lon = position.coords.longitude;
                    // Store lat & lon in hidden fields
                    $("#latitude").val(lat);
                    $("#longitude").val(lon);
                    // Call Google Maps API to get address
                    var geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lon}&key=YOUR_GOOGLE_MAPS_API_KEY`;

                    $.getJSON(geocodeUrl, function (data) {
                        if (data.status === "OK") {
                            var address = data.results[0].formatted_address;
                            
                            // Store address in hidden field
                            $("#address").val(address);
                            
                            // Display location
                            $("#locationText").html("📍 Location Captured: " + address);
                        } else {
                            $("#locationText").html("📍 Location Captured: " + lat + ", " + lon);
                        }
                        
                    });
                },
                function (error) {
                    alert("Error getting location. Please enable GPS.");
                }
            );
        } else {
            alert("Geolocation is not supported by your browser.");
        }
    });
});


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap Icons (for phone icon) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
