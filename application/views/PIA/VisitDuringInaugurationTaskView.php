<div class="container">
    <div class="container-fluid">
        <h4 class="text-center">Inauguration During Visit Task</h4>
        <form name="meeting_inauguration" action="<?= base_url();?>/Menu/updateVisitInauguration" method="post" enctype="multipart/form-data">
            <input type="hidden" name="taskId" value="<?php echo $taskId;?>">
            <!-- First Row -->
            <div class="row">
                <div class="col-md-12 text-center mb-3">
                    <label><strong>Take Selfie at school</strong></label>
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
            <!-- Two-Column Layout -->
            <div class="row" id="visitDuringInauguration" style="display:none;">
                <!-- Left Column -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label><strong>Pre Inaugurtion Decoration Photo-1</strong></label>
                        <input type="file" class="form-control" name="pre_inauguration_deco_photo1" accept="image/*" capture required>
                    </div>
                    <div class="mb-3">
                        <label><strong>Pre Inaugurtion Decoration Photo-2 </strong></label>
                        <input type="file" class="form-control" name="pre_inauguration_deco_photo2" accept="image/*" capture required>
                    </div>
                    <div class="mb-3">
                        <label><strong>During Inauguration Photo -1</strong></label>
                        <input type="file" class="form-control" name="during_inauguration_photo1" accept="image/*" capture required>
                    </div>
                   
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <div class="mb-6">
                        <label><strong>Client Feedback Video -1</strong></label>
                        <input type="file" class="form-control" name="client_feedback_video1" accept="image/*" capture required>
                    </div>
                    <div class="mb-3">
                        <label><strong>Client Feedback Video -2</strong></label>
                        <input type="file" class="form-control" name="client_feedback_video2" accept="video/*" capture required>
                    </div>
                    <div class="mb-3">
                        <label><strong>Add More Photos</strong></label>
                        <input type="file" class="form-control" name="add_more_photos[]" accept="images/*" capture required>
                    </div>
                   
                    <div class="mb-3">
                        <label><strong>Completed MY Task Image</strong></label>
                        <input type="file" class="form-control" name="completed_my_task" accept="image/*" capture required>
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
   $(document).ready(function () {
    $('#notWorkingModel').change(function () {
        $('#selectedModelsContainer').empty(); // Clear previous selections
        $('#notWorkingModel option:selected').each(function () {
            let modelId   = $(this).val();
            let modelName = $(this).data('model');
            if (modelId) {
                let modelHtml = `
                <div class="selected-model mb-2" data-id="${modelId}">
                    <strong><span id="modelname">${modelName}</span></strong>
                        <select class="repair-replace form-control d-inline-block w-auto ml-2" name="modelreturntype">
                            <option value="">Select Action</option>
                            <option value="repairpart">Repair Part</option>
                            <option value="repairmaterial">Repair Material</option>
                            <option value="replace">Replace</option>
                        </select>
                        <div class="repair-part-options d-inline-block ml-2" style="display:none;">
                                    <select class="model-parts form-control w-auto" name="part_name_${modelName}[]" multiple>
                                    <option value="">Loading</option>
                                    </select>
                                    </div>
                                     <div class="repair-material-options d-inline-block ml-2" style="display:none;">
                                        <select class="model-material form-control w-auto" name="material_name_${modelName}[]" multiple>
                                        <option value="">Loading</option>
                                        </select>
                                        </div>
                </div>`;
                $('#selectedModelsContainer').append(modelHtml);
            }
        });
    });

    // Handle Repair/Replace selection
    $(document).on('change', '.repair-replace', function () {
        let selectedAction      = $(this).val();
        let parentDiv           = $(this).closest('.selected-model');
        $(".repair-part-options").hide();
        if (selectedAction === 'repairpart') {
                var selectedModel = $(this).closest('.selected-model').find('span').text();
                loadModelParts(parentDiv.find('.model-parts'),selectedModel);
            }
            else if(selectedAction === 'repairmaterial'){
                var selectedModel = $(this).closest('.selected-model').find('span').text();
                loadModelMaterials(parentDiv.find('.model-material'),selectedModel);
                $(this).closest('.selected-model').append();
            }
            else {
                parentDiv.find('.repair-options').hide();
            }
    });

    // Load model parts via AJAX
    function loadModelParts(selectElement,selectedModel) {
        $.ajax({
            url: '<?php echo base_url()?>Menu/getModelPartList/', // Update with your actual controller method
            type: 'POST',
            dataType: 'json',
            data : { model_name: selectedModel },
            success: function (data) {
                selectElement.empty().append('<option value="">Select Part</option>');
                    $.each(data, function (key, value) {
                    selectElement.append('<option value="' + value.part_name + '">' + value.part_name + '</option>');
                    });
            }
        });
    }

    function loadModelMaterials(selectElement,selectedModel) {
        $.ajax({
            url: '<?php echo base_url()?>Menu/getModelMaterialList/', // Update with your actual controller method
            type: 'POST',
            dataType: 'json',
            data : { model_name: selectedModel },
            success: function (data) {
                selectElement.empty().append('<option value="" >Select Material</option>');
                    $.each(data, function (key, value) {
                    selectElement.append('<option value="' + value.material_name + '">' + value.material_name + '</option>');
                    });
            }
        });
    }
});

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