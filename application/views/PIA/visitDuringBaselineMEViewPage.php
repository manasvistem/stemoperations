<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>Menu/updateVisitDuringME">
    <input type="hidden" value="<?php echo $taskId;?>" name="taskId">
    <div class="container mt-4 mb-5 p-4 border rounded shadow bg-white">
        <h4 class="mb-4 fw-bold text-center">Baseline M&E Activity Form</h4>
        <!-- Take Selfie with School -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Take Selfie with School (with Location)</label>
            <input type="file" accept="image/*" capture="environment" class="form-control" name="selfie" id="imgInp">
            <input type="hidden" name="address" id="address">
            <p id="locationText" class="text-success mt-2"></p>
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
        </div>
        <!-- Start My Task -->
        <div class="mb-3">
            <button type="button" class="btn btn-success" id="startTaskBtn">Start My Task</button>
        </div>

        <!-- Task Content -->
        <div id="taskContent" class="d-none mt-4">
            <div class="row g-3">
                <!-- ... all your existing input fields go here ... -->
                <div class="row g-3">
                    <!-- Session Videos -->
                    <div class="col-md-6">
                        <label class="form-label">Running 1st Session</label>
                        <input type="file" accept="image/*" class="form-control" name="session1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Running 2nd Session</label>
                        <input type="file" accept="image/*" class="form-control" name="session2">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Running 3rd Session</label>
                        <input type="file" accept="image/*" class="form-control" name="session3">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Running 4th Session</label>
                        <input type="file" accept="image/*" class="form-control" name="session4">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Running 5th Session</label>
                        <input type="file" accept="image/*" class="form-control" name="session5">
                    </div>
                    <!-- Teacher Reviews -->
                    <div class="col-md-6">
                        <label class="form-label">1st Teacher Review</label>
                        <input type="text" class="form-control" name="teacher_review1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2nd Teacher Review</label>
                        <input type="text" class="form-control" name="teacher_review2">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3rd Teacher Review</label>
                        <input type="text" class="form-control" name="teacher_review3">
                    </div>
                    <!-- Student Reviews -->
                    <div class="col-md-6">
                        <label class="form-label">1st Student Review</label>
                        <input type="text" class="form-control" name="student_review1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">2nd Student Review</label>
                        <input type="text" class="form-control" name="student_review2">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">3rd Student Review</label>
                        <input type="text" class="form-control" name="student_review3">
                    </div>
                    <!-- M&E Letter -->
                    <div class="col-md-6">
                        <label class="form-label">Upload Baseline M&E Letter</label>
                        <input type="file" class="form-control" name="baseline_letter">
                    </div>
        
                    <!-- Call with Reporting Manager -->
                    <div class="col-md-6 d-flex align-items-end">
    <a href="tel:<?php echo $contact_no; ?>" class="btn btn-outline-primary w-100">
        <i class="bi bi-telephone-forward-fill me-2"></i> Call Reporting Manager
    </a>
</div>
        
                    <!-- Final Selfie After Completion -->
                    <div class="col-md-6">
                        <label class="form-label">Completed My Task (Take Selfie with School)</label>
                        <input type="file" accept="image/*" capture="environment" class="form-control" name="completed_selfie">
                    </div>
        
                    <!-- Add More Media -->
                    <div class="col-12 mt-3">
                        <label class="form-label fw-semibold">Add More Media</label>
                        <input type="file" class="form-control" name="additional_media[]" multiple>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="col-12 mt-4 text-center">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#startTaskBtn').on('click', function () {
            $('#taskContent').removeClass('d-none').hide().fadeIn();
            $('html, body').animate({
                scrollTop: $("#taskContent").offset().top
            }, 500);
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
