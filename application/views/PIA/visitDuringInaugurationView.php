<div class="container">
    <div class="container-fluid">
        <h4 class="text-center">Inauguration During Visit Task</h4>
        <form name="meeting_inauguration" action="<?= base_url();?>/Menu/updateVisitInauguration" method="post">
            <!-- First Row -->
            <div class="row">
                <div class="col-md-12 text-center mb-3">
                    <label><strong>Take selfie at school</strong></label>
                    <input type="file" class="form-control" name="filname[]" id="imgInp" accept="image/*" capture required >
                    <input type="hidden" id="lat" name="lat">
                    <input type="hidden" id="lng" name="lng">
                    <input type="hidden" name="address" id="address">
                    <p id="locationText" class="text-success mt-2"></p>
        <!-- Hidden Fields to Store Latitude & Longitude -->
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
                </div>
                <div class="col-md-12 text-center mb-3">
                    <button type="button" class="btn btn-success" id="startTask">Start Task</button>
                    <span id="timer" class="text-danger" style="font-size: 18px; margin-left: 10px; display: none;">00:00:00</span>
                    <input type="hidden" name="elapsed_time" id="elapsedTime">
                </div>
            <!-- Two-Column Layout -->
            <div class="row" id="visitDuringInauguration" style="display:none;">
                <!-- Left Column -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label><strong>Pre Inauguration Decoration Photo-1</strong></label>
                        <input type="file" class="form-control" name="pre_inauguration_photo[]" accept="image/*" capture required>
                    </div>
                    <div class="mb-3">
                        <label><strong>During Inauguration Photo -1</strong></label>
                        <input type="file" class="form-control" name="during_inauguration_photo[]" accept="image/*" capture required>
                    </div>
                    <div class="mb-3">
                        <label><strong>Client feedback video -1</strong></label>
                        <input type="file" class="form-control" name="client_feedback_video[]" accept="video/*" capture required>
                    </div>
                    <div class="mb-3">
                        <label><strong>Add More Photos</strong></label>
                        <input type="file" class="form-control" name="more_photos[]" accept="image/*" capture required>
                    </div>
                    <div class="mb-3">
                        <label><strong>Select Not Working Model</strong></label>
                        <select name="NotWorkingModel" class="form-control" multiple>
                        <option value="">Select Not Working Model</option>
                            <?php foreach($getFactoryModelList as $key=>$val)
                            { ?>
                            <option value="<?php echo $val['id'];?>"><?php echo $val['model_name'];?></option>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <div class="mb-6">
                        <label><strong>Pre Inauguration Decoration Photo-2</strong></label>
                        <input type="file" class="form-control" name="pre_inauguration_photo[]" accept="image/*" capture required>
                    </div>
                    <div class="mb-3">
                        
                    </div>
                    <div class="mb-3">
                        <label><strong>Client feedback video -2</strong></label>
                        <input type="file" class="form-control" name="client_feedback_video[]" accept="video/*" capture required>
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="softCopyInaug[]" id="softCopyInaug">
                        <label class="form-check-label" for="softCopyInaug"><strong>Have you got a soft copy of the inauguration banner?</strong></label>
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="DIYMaterial[]" id="DIYMaterial">
                        <label class="form-check-label" for="DIYMaterial"><strong>Is DIY material arranged?</strong></label>
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="printInaug[]" id="printInaug">
                        <label class="form-check-label" for="printInaug"><strong>Have you printed the inauguration banner?</strong></label>
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="DIYCertificates[]" id="DIYCertificates">
                        <label class="form-check-label" for="DIYCertificates"><strong>Are DIY certificates printed?</strong></label>
                    </div>
                    <div class="mb-3">
                        <label><strong>Is Maintenance Required?</strong></label>
                        <div>
                            <input type="radio" name="maintenance" value="yes" id="maintenanceYes"> <label for="maintenanceYes">Yes</label>
                            <input type="radio" name="maintenance" value="no" id="maintenanceNo"> <label for="maintenanceNo">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="modal-footer" style="align:center;width:20%">
                <input type="submit" class="btn btn-primary w-100" value="Submit" id="submitButton">
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
      $(document).ready(function() {
          $('#submitButton').click(function(event) {
              var fileInput = $('#imgInp');
              if (fileInput.val() === '') {
                  alert('Please Select Your Picture.');
                  event.preventDefault();
                  return false;
              }
          });
          $('#end-time').on('change', function() {
              var startTime = $('#start-time').val();
              if (startTime === '') {
                  alert("Please Enter Start Time");
                  $('#end-time').val('');
              } else {
                  var endTime = $(this).val();
                  var startTimeMinutes = convertTimeToMinutes(startTime);
                  var endTimeMinutes = convertTimeToMinutes(endTime);
                  // Check if the difference is more than 90 minutes
                 if ((endTimeMinutes - startTimeMinutes) > 90 || (endTimeMinutes - startTimeMinutes) < 90) {
                      alert('Auto Task Max Time is Only 90 Minutes');
                      $('#end-time').val('');
                  }
              }
          });

          function convertTimeToMinutes(time) {
                          var timeParts = time.split(':');
                          var hours = parseInt(timeParts[0], 10);
                          var minutes = parseInt(timeParts[1], 10);
                          return (hours * 60) + minutes;
                      }

    });
</script>
<script type='text/javascript'>
$(document).ready(function () {
    var timerInterval;
    var seconds = 0;
    var isRunning = false;
    $("#startTask").click(function () {
        if (!isRunning) {
            $("#visitDuringInauguration").show();
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