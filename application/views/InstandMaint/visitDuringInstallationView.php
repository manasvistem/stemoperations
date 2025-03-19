<div class="container">
    <div class="container-fluid">
        <h4 class="text-center">Installtion During Visit Task</h4>
        <form name="installationForm" id="installationForm" action="<?= base_url();?>Menu/updateVisitDuringInstallation"  method="POST" enctype="multipart/form-data" >
            <!-- Image Upload Fields -->
            <div class="row">
                <div class="col-md-12 text-center mb-3">
                    <label><strong>Take Selfie with School</strong></label>
                    <input type="file" class="form-control" name="selfie" id="imgInp" accept="image/*" capture required >
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
                <div class="row" id="visitDuringInstallation" style="display:none;">
                <div class="col-md-6">
                    <label><strong>Pre MSC Room Wall Photo 1</strong></label>
                    <input type="file" class="form-control" name="pre_wall_photo_1" accept="image/*" required>
                    <label><strong>Pre MSC Room Wall Photo 2</strong></label>
                    <input type="file" class="form-control" name="pre_wall_photo_2" accept="image/*" required>
                    <label><strong>Pre MSC Room Wall Photo 3</strong></label>
                    <input type="file" class="form-control" name="pre_wall_photo_3" accept="image/*" required>
                    <label><strong>Pre MSC Room Wall Photo 4</strong></label>
                    <input type="file" class="form-control" name="pre_wall_photo_4" accept="image/*" required>
                    
                    <label><strong>Pre MSC Room Wide Angle Photo</strong></label>
                    <input type="file" class="form-control" name="pre_wide_angle" accept="image/*" required>
                    
                    <label><strong>Pre MSC Room Video</strong></label>
                    <input type="file" class="form-control" name="pre_MSC_video" accept="video/*" required>

                    <label><strong>Infra Completion Photo/Video</strong></label>
                    <input type="file" class="form-control" name="infra_completion" accept="video/*" required>
                    
                    <label><strong>Electrical Wiring Completion Photo/Video</strong></label>
                    <input type="file" class="form-control" name="electrical_wiring" accept="video/*" required>
                </div>
                
                <div class="col-md-6">
                    <label><strong>Backdrops Photo with Straight Angle and Visibility</strong></label>
                    <input type="file" class="form-control" name="backdrops_photo" accept="image/*" required>
                    
                    <label><strong>Gate Banner Photo with Logo Straight Angle and Visibility</strong></label>
                    <input type="file" class="form-control" name="gate_banner" accept="image/*" required>
                    
                    <label><strong>Safety Measures Backdrop Photo</strong></label>
                    <input type="file" class="form-control" name="safety_measures" accept="image/*" required>
                    
                    <label><strong>Unboxing Models Photo/Video</strong></label>
                    <input type="file" class="form-control" name="unboxing_models" accept="image/*,video/*" required>
                </div>
            
            <!-- Model Counting by Barcode Scanning -->
            <div class="row">
                <div class="col-md-12">
                    <label><strong>Model Counting by Barcode Scanning</strong></label>
                    <input type="text" class="form-control" name="barcode_scanning" required>
                </div>
            </div>
            
            <!-- Dropdowns and Yes/No Questions -->
            <div class="row">
                <div class="col-md-6">
                    <label><strong>Select Not Working Model</strong></label>
                    <select name="NotWorkingModel[]" class="form-control" multiple>
                        <option value="">Select Not Working Model</option>
                        <?php foreach($getFactoryModelList as $val) { ?>
                            <option value="<?php echo $val['id']; ?>"><?php echo $val['model_name']; ?></option>
                        <?php } ?>
                    </select>
                    
                    <label><strong>Upload 80 Models Stickers</strong></label>
                    <input type="file" class="form-control" name="80_models_stickers[]" accept="image/*" multiple required>
                    
                    <label><strong>1 Training Manual Book? (Yes/No)</strong></label>
                    <select name="training_manual" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    
                    <label><strong>80 Nos User Manual? (Yes/No)</strong></label>
                    <select name="user_manual" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    
                    <label><strong>Handbook Available? (Yes/No)</strong></label>
                    <select name="handbook" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label><strong>After MSC Setup Photos</strong></label>
                    <input type="file" class="form-control" name="after_msc_photo_1" accept="image/*" required>
                    <input type="file" class="form-control" name="after_msc_photo_2" accept="image/*" required>
                    <input type="file" class="form-control" name="after_msc_photo_3" accept="image/*" required>
                    <input type="file" class="form-control" name="after_msc_photo_4" accept="image/*" required>
                    <input type="file" class="form-control" name="after_msc_photo_5" accept="image/*" required>

                    <label><strong>After MSC Setup Video</strong></label>
                    <input type="file" class="form-control" name="after_msc_video" accept="video/*" required>
                    
                    <label><strong>Installation Completion Letter</strong></label>
                    <input type="file" class="form-control" name="completion_letter" accept="image/*,application/pdf" required>
                    
                    <label><strong>Call with Reporting Manager</strong></label>
                    <input type="text" class="form-control" name="call_with_manager" required>
                    
                    <label><strong>Completed My Task (Take Selfie with School)</strong></label>
                    <input type="file" class="form-control" name="completed_task_selfie" accept="image/*" required>
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
            $("#visitDuringInstallation").show();
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
<script type="text/javascript">  $(document).ready(function() {
        $("#installationForm").submit(function (e) {
          //  alert($(this).attr("action"));
          //  e.preventDefault(); // Prevent default form submission
                $.ajax({
                    url: $(this).attr("action"), // Get action URL from form
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
                    contentType: "application/json",
                    success: function (response) {
                        if (response.status == 'success') {
                            alert("Task updated successfully!");
                        //  $("#status").val("Updated"); // Update hidden field
                        // $("#dynamicStatus").text("Task Status: Updated"); // Update text
                            $("#modalCenter").hide();
                            setTimeout(function () {
                                location.reload(); // Reload the page to return to main view
                            }, 500);
                            } else {
                                alert("Error updating task. Try again.");
                            }
                    },
                    error: function () {
                        //error occurred
                    }
                });
    });
    });
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