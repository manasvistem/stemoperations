
<div class="container">
    <div class="container-fluid">
        <h4 class="text-center">Inauguration During Visit Task</h4>
    <!-- Form Section (Initially Hidden) -->
    <form id="maintenanceForm"  enctype="multipart/form-data" method="POST">
        
        <h3 class="mt-4">Maintenance Checklist</h3>
        <!-- Selfie Upload with Timer -->
        <div class="mb-3">
            <label class="form-label">Take Selfie with School</label>
            <input type="file" class="form-control" name="imgInp" id="imgInp" accept="image/*" capture="camera" required>
            <p id="locationText" class="text-success mt-2"></p>
                    <!-- Hidden Fields to Store Latitude & Longitude -->
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
            <small class="text-muted">Location and timestamp will be captured automatically.</small>
        </div>
        <div class="col-md-12 text-center mb-3">
                    <button type="button" class="btn btn-success" id="startTask">Start Task</button>
                    <span id="timer" class="text-danger" style="font-size: 18px; margin-left: 10px; display: none;">00:00:00</span>
                    <input type="hidden" name="elapsed_time" id="elapsedTime">
                </div>

                <div class="row" id="visitDuringMaintenance" style="display:none;">
        <!-- Video Uploads -->
        <div class="mb-3">
            <label class="form-label">Pre-Maintenance MSC Photo/Video set-1</label>
            <input type="file" class="form-control" name="preMaintenance1" accept="video/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pre-Maintenance MSC Photo/Video set-2</label>
            <input type="file" class="form-control" name="preMaintenance2" accept="video/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">After Cleaning MSC Photo/Video set-1</label>
            <input type="file" class="form-control" name="afterCleaning1" accept="video/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">After Cleaning MSC Photo/Video set-2</label>
            <input type="file" class="form-control" name="afterCleaning2" accept="video/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">16 Plug Points Working Condition Video</label>
            <input type="file" class="form-control" name="plugPointsVideo" accept="video/*" required>
        </div>

        <!-- Dropdowns -->
        <div class="mb-3">
            <label class="form-label">37 Backdrops pictures with straight angle and visibility?</label>
            <select class="form-control" name="backdropsVisibility" required>
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">1 Training Manual Book?</label>
            <select class="form-control" name="trainingManual" required>
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">80 Nos User Manual?</label>
            <select class="form-control" name="userManual" required>
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <!-- Image Uploads -->
        <div class="mb-3">
            <label class="form-label">Gate Banner Logo with straight angle and visibility Photo</label>
            <input type="file" class="form-control" name="gateBanner" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Safety Measures Backdrop Photo</label>
            <input type="file" class="form-control" name="safetyPhoto" accept="image/*" required>
        </div>

        <!-- Dropdown Selection -->
        <div class="mb-3">
            <label class="form-label">Select Not Working Model</label>
            <select class="form-control" name="notWorkingModel" required>
                <option value="">Select Model</option>
                <option value="Model A">Model A</option>
                <option value="Model B">Model B</option>
                <option value="Model C">Model C</option>
            </select>
        </div>

        <!-- Call with Reporting Manager -->
        <div class="mb-3">
            <label class="form-label">Call With Reporting Manager</label>
            <a href="tel:+911234567890" class="btn btn-success">📞 Call</a>
            <textarea class="form-control mt-2" name="callDetails" placeholder="Enter call details"></textarea>
        </div>

        <!-- PDF Upload -->
        <div class="mb-3">
            <label class="form-label">Maintenance Letter (PDF)</label>
            <input type="file" class="form-control" name="maintenanceLetter" accept="application/pdf" required>
        </div>

        <!-- Multiple File Upload -->
        <div class="mb-3">
            <label class="form-label">Add More Media</label>
            <input type="file" class="form-control" name="additionalMedia[]" accept="image/*, video/*" multiple>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Submit</button>
        
</div>
    </form>

    <!-- Success Message -->
    <div id="formMessage" class="mt-3"></div>
</div></div>
    <!-- jQuery Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type='text/javascript'>
$(document).ready(function () {
    var timerInterval;
    var seconds = 0;
    var isRunning = false;
    $("#startTask").click(function () {
        if (!isRunning) {
            $("#visitDuringMaintenance").show();
            // Start the timer
            isRunning = true;
            $(this).prop("disabled", true);
           // $(this).text("Stop Task").removeClass("btn-success").addClass("btn-danger");
            $("#timer").show();

            timerInterval = setInterval(function () {
                seconds++;
                var hrs = Math.floor(seconds / 3600);
                var mins = Math.floor((seconds % 3600) / 60);
                var secs = seconds % 60;

                var formattedTime = 
                    (hrs < 10 ? "0" : "") + hrs + ":" +
                    (mins < 10 ? "0" : "") + mins + ":" +
                    (secs < 10 ? "0" : "") + secs;

                $("#timer").text(formattedTime);
                $("#elapsedTime").val(seconds); // Store elapsed time in hidden field
            }, 1000);
        } else {
            // Stop the timer
            isRunning = false;
            clearInterval(timerInterval);
            $(this).text("Start Task").removeClass("btn-danger").addClass("btn-success");
        }
    });
});
</script>
    <script>
        $(document).ready(function () {
            // Start button click event
            $("#startJourney").click(function () {
                $("#startSection").hide();
                $("#maintenanceForm").fadeIn();
            });

            // AJAX Form Submission
            $("#maintenanceForm").submit(function (event) {
                event.preventDefault();
                
                var formData = new FormData(this);

                $.ajax({
                    url: "<?= base_url() ?>Menu/visitDuringMaintenanceIM",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $("#formMessage").html('<div class="alert alert-success">Form submitted successfully!</div>');
                        $("#maintenanceForm").hide();
                    },
                    error: function () {
                        $("#formMessage").html('<div class="alert alert-danger">Error submitting form. Please try again.</div>');
                    }
                });
            });
        });
    </script>
    
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