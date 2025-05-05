<style> .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #f9f9f9;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .form-group label {
            width: 40%;
            text-align: right;
            padding-right: 10px;
        }
        .form-group input {
            width: 55%;
            padding: 5px;
        }
        .modal-footer {
            text-align: center;
            margin-top: 20px;
        }
    </style> 
    <div class="container-fluid">
        <h4 class="text-center">School Identification Visit Task</h4>
        <form name="installationForm" action="<?= base_url();?>Menu/updateVisitDuringIdentification"  method="POST" >
            <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
            <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
            <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>  
            <input type="hidden" name="starttime" value="<?php echo $starttime;?>"/>  
        <!-- Image Upload Fields -->
            <div class="row">
                <div class="col-md-12 text-center mb-3">
                    <label><strong>Take Selfie with School</strong></label>
                    <input type="file" class="form-control" name="selfie" id="imgInp" accept="image/*" capture required >
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
                <div class="row" id="visitDuringIdentification" style="display:none;">
                <div class="col-md-6">
                    <label><strong>School Name</strong></label>
                    <input type="text" class="form-control" name="sname">
                    <label><strong>Language</strong></label>
                    <input type="text" class="form-control" name="language" >
                    <label><strong>Standard</strong></label>
                    <input type="text" class="form-control" name="standard" >
                    <label><strong>Can we have a Number of the Peon?</strong></label>
                    <input type="number" class="form-control" name="number" >
                    <label for="total_teachers"><strong>Total Teachers:</strong></label>
                    <input type="number" class="form-control" name="teachers" id="total_teachers" min="1" required>
                    <div id="teacher_fields"></div>
                    <label><strong>Total Students</strong></label>
                    <input type="number" class="form-control" name="total_students" >
                    <label><strong>Boys</strong></label>
                    <input type="number" class="form-control" name="boys">
                    <label><strong>Girls</strong></label>
                    <input type="text" class="form-control" name="girls" >
                </div>
                <div class="col-md-6">
                    <label><strong>Address</strong></label>
                    <input type="text" class="form-control" name="pincode">
                    <label><strong>Pincode</strong></label>
                    <input type="number" class="form-control" name="city">
                    <label><strong>City</strong></label>
                    <input type="text" class="form-control" name="state" >
                    <label><strong>State</strong></label>
                    <input type="text" class="form-control" name="principal" >

                    <label><strong>School Principal Name</strong></label>
                    <input type="text" class="form-control" name="principal">

                    <label><strong>Contact No</strong></label>
                    <input type="radio" name="do_dm_required" value="yes"> Yes
                    <input type="radio" name="do_dm_required" value="no"> No

                    <label>DO/DM Letter Required?</label>
                    <input type="radio" name="visit_required" value="yes">Yes
                    <input type="radio" name="visit_required" value="no"> No

                    <label>Visit Required?</</label><br>
                    <textarea class="form-control" name="any_other_information"></textarea>

                    <div class="form-group">
                        <label>Any Other Information</label><br>
                        <textarea class="form-control" name="any_other_information"></textarea>
                    </div>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="modal-footer" style="align:center;width:20%">
                <input type="submit" class="btn btn-primary w-100" value="Submit" id="submitButton">
            </div>
        </form>
    </div>
    </div></div>
    </div></div>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        console.log($("#start_time").val());
    // Function to check total students match
    function validateStudentCount() {
        let totalStudents = parseInt($("#total_students").val()) || 0;
        let boys = parseInt($("#boys").val()) || 0;
        let girls = parseInt($("#girls").val()) || 0;
        if (totalStudents !== boys + girls) {
            alert("Total students should match the sum of boys and girls!");
        }
    }
    $("#total_students, #boys, #girls").on("input", validateStudentCount);
});
      $(document).ready(function() {
        $("#total_teachers").on("input", function() {
        let totalTeachers = $(this).val();
        let teacherContainer = $("#teacher_fields");
        teacherContainer.empty(); // Clear previous fields
        for (let i = 1; i <= totalTeachers; i++) {
            teacherContainer.append(
                `<div class="form-group">
                    <label for="teacher_${i}">Teacher ${i} Name:</label>
                    <input type="text" id="teacher_${i}" name="teacher_names[]" class="form-control" required>
                </div>`
            );
        }
    });
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
            $("#visitDuringIdentification").show();
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