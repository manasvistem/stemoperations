<style>
  .form-label {
    font-weight: 600;
    color: #333;
  }
  .form-control {
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  .card {
    border-radius: 16px;
    background: #f9f9f9;
  }
  .btn-primary, .btn-success {
    border-radius: 8px;
    padding: 10px 20px;
    font-weight: bold;
  }
  #timer {
    font-size: 1.1rem;
    color: #007bff;
  }
  .text-muted {
    font-size: 0.85rem;
  }
</style>

<div class="container my-4">
  <form method="POST" action="<?= base_url();?>Menu/submitClusterRoundData" enctype="multipart/form-data" name="NSPClusterRound" >
      <input type="hidden" name="taskId" value="<?php echo $taskId;?>" />
    <div class="card shadow border-0">
      <div class="card-body">
        <!-- Selfie Upload -->
        <div class="mb-3">
                <div class="col-md-12 text-center mb-3">
                    <label><strong>Take Selfie with School</strong></label>
                    <input type="file" class="form-control" name="selfie" id="imgInp" accept="image/*" required >
                    <input type="hidden" name="address" id="address">
                    <p id="locationText" class="text-success mt-2"></p>
                    <!-- Hidden Fields to Store Latitude & Longitude -->
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                </div>
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
  <label class="form-label">NSP Started At:</label><br>  <input type="text" id="nspStartTime" class="form-control mt-2 d-none" name="start_time" readonly>

  <button type="button" id="startNSPBtn" class="btn btn-success">Start NSP</button>
  <p id="timer" class="text-primary fw-bold mt-2"></p>
</div>
<div id="nspFields" style="display: none;">
  <!-- All the rest of the fields go here, wrap them inside this div -->


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
          <?php 
                $schoolList = getSchoolListByTaskID($userId,$taskId);
                echo "<ul>";
                foreach($schoolList as $key=>$val){
                    echo "<input type='checkbox' name='schoolname' value='".$val['id']."' >".$val['sname']."<br>";
                }
                echo "</ul>";
            ?>
         
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
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    let nspStart;
let timerInterval;

$('#startNSPBtn').click(function () {
  const now = new Date();
  nspStart = now;
  const timeStr = now.toLocaleTimeString();
  $('#nspStartTime').val(timeStr).removeClass('d-none');
  $('#startNSPBtn').hide();
  $('#nspFields').fadeIn();

  // Start Timer
  timerInterval = setInterval(() => {
    const now = new Date();
    const diff = new Date(now - nspStart);
    const hrs = diff.getUTCHours().toString().padStart(2, '0');
    const mins = diff.getUTCMinutes().toString().padStart(2, '0');
    const secs = diff.getUTCSeconds().toString().padStart(2, '0');
    $('#timer').text(`⏱ NSP Duration: ${hrs}:${mins}:${secs}`);
  }, 1000);
});

});


</script>
