<style>
        .container {
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
        <h4 class="text-center">During FTTP Visit Task</h4>
        <form name="fttpVisitForm" action="<?= base_url();?>Menu/UpdateFTTPDuringVisit"  method="POST" >
            <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
            <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
            <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>    
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
                <!-- Sessions with Start/Stop Buttons -->
                <div class="mb-3">
                    <label class="form-label"><strong>Running 1st Session</strong></label>
                    <button type="button" id="start_session1" class="btn btn-primary session-btn" data-session="1">Start Session</button>
                    <input type="hidden" name="session_time_1st" value=""/>
                    <textarea class="form-control mt-2" name="session_1_remark" placeholder="Session Remark 1"></textarea>
                        <input type="hidden" name="session_1_start_time">
                        <input type="hidden" name="session_1_end_time">
                        <input type="hidden" name="session_1_duration">
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>Running 2nd Session</strong></label>
                    <button type="button" id="start_session2" class="btn btn-primary session-btn" data-session="2" disabled>Start Session</button>
                    <input type="hidden" name="session_time_2nd" value=""/>
                    <textarea class="form-control mt-2" name="session_2_remark" placeholder="Session Remark 2"></textarea>
                    <input type="hidden" name="session_2_start_time">
                    <input type="hidden" name="session_2_end_time">
                    <input type="hidden" name="session_2_duration">
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>Running 5th Session</strong></label>
                    <button type="button" id="start_session5" class="btn btn-primary session-btn" data-session="5" disabled>Start Session</button>
                    <input type="hidden" name="session_time_3rd" value=""/>
                    <textarea class="form-control mt-2" name="session_5_remark" placeholder="Session Remark 5"></textarea>
                    <input type="hidden" name="session_5_start_time">
                    <input type="hidden" name="session_5_end_time">
                    <input type="hidden" name="session_5_duration">
                   
                </div>
                <!-- Teacher Reviews -->
                <div class="mb-3">
                    <label class="form-label"><strong>1st Teacher Review</strong></label>
                    <textarea class="form-control" name="teacher_review_1" placeholder="Write your review here"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>2nd Teacher Review</strong></label>
                    <textarea class="form-control" name="teacher_review_2" placeholder="Write your review here"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>3rd Teacher Review</strong></label>
                    <textarea class="form-control" name="teacher_review_3" placeholder="Write your review here"></textarea>
                </div>
            </div>
            <div class="col-md-6">
            <div class="mb-3">
                    <label class="form-label"><strong>Running 3rd Session</strong></label>
                    <button type="button"  id="start_session3" class="btn btn-primary session-btn" data-session="3" disabled>Start Session</button>
                    <textarea class="form-control mt-2" name="session_3_remark" placeholder="Session Remark-3"></textarea>
                    <input type="hidden" name="session_3_start_time">
                    <input type="hidden" name="session_3_end_time">
                    <input type="hidden" name="session_3_duration">
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>Running 4th Session</strong></label>
                    <button type="button" id="start_session4"  class="btn btn-primary session-btn" data-session="4" disabled>Start Session</button>
                    <textarea class="form-control mt-2" name="session_4_remark" placeholder="Session Remark-4"></textarea>
                    <input type="hidden" name="session_4_start_time">
                    <input type="hidden" name="session_4_end_time">
                    <input type="hidden" name="session_4_duration">
                </div>
                <!-- File Uploads -->
                <div class="mb-3">
                    <label class="form-label"><strong>Teachers Attendance Sheet (Add photo)</strong></label>
                    <input type="file" class="form-control" name="attendance_sheet" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>FTTP Completion Letter</strong></label>
                    <input type="file" class="form-control" name="completion_letter" accept=".pdf">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Completed My Task (Take Selfie with School)</strong></label>
                    <input type="file" class="form-control" name="completed_selfie" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Add More Media</strong></label>
                    <input type="file" class="form-control" name="additional_media[]" accept="image/*" multiple>
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
            let sessionTimes = {}; // Store session times

$(".session-btn").click(function() {
    let sessionId = $(this).data("session");
    let button = $(this);
    let currentTime = new Date().getTime(); // Get current timestamp

    if (button.text() === "Start Session") {
        // Store start time
        sessionTimes[sessionId] = currentTime;
        $("input[name='session_" + sessionId + "_start_time']").val(currentTime);

        // Update button text and style
        button.text("Stop Session").removeClass("btn-primary").addClass("btn-danger");

    } else {
        // Calculate session duration
        let startTime = sessionTimes[sessionId];
        let endTime = currentTime;
        let duration = Math.floor((endTime - startTime) / 1000); // Convert milliseconds to seconds

        // Store values in hidden fields
        $("input[name='session_" + sessionId + "_end_time']").val(endTime);
        $("input[name='session_" + sessionId + "_duration']").val(duration);

        // Reset button
        button.text("Start Session").removeClass("btn-danger").addClass("btn-primary").prop("disabled", true);

        // Enable next session button
        let nextSessionId = sessionId + 1;
        $("#start_session" + nextSessionId).prop("disabled", false);
    }
});
    });
</script>
<script>
    $(document).ready(function() {
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