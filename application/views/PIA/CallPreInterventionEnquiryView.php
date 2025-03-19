
<div class="container mt-4">
    <h4 class="text-center">Call- PreIntervention Enquiry</h4>
    <form name="callpreintervention" id="callpreintervention" method="post" action="<?php echo base_url();?>/Menu/updateCallPreIntervention" >
    <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
    <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
    <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>
    <!-- Action Completed Section -->
    <div class="mb-3">
        <label><strong>Action Completed?</strong></label><br>
        <input type="radio" name="actionCompleted" value="yes" id="actionYes"> <label for="actionYes">Yes</label>
        <input type="radio" name="actionCompleted" value="no" id="actionNo"> <label for="actionNo">No</label>
    </div>

    <!-- Purpose Completed Section -->
    <div class="mb-3" id="purposeSection" style="display: none;">
        <label><strong>Purpose Completed?</strong></label><br>
        <input type="radio" name="purposeCompleted" value="yes" id="purposeYes"> <label for="purposeYes">Yes</label>
        <input type="radio" name="purposeCompleted" value="no" id="purposeNo"> <label for="purposeNo">No</label>
    </div>

    <!-- Hidden Form Section (Shown Only When Both Are YES) -->
    <div id="taskForm" style="display: none;">
        <h5 class="mt-3">Additional Details</h5>

        <!-- School Location Type -->
        <div class="mb-3">
            <label><strong>School is in:</strong></label><br>
            <select class="form-control" name="locationType">
                <option value="">Select Location Type</option>
                <option value="rural">Rural</option>
                <option value="urban">Urban</option>
                <option value="semi-urban">Semi-Urban</option>
            </select>
        </div>

        <!-- Wall Paint Condition -->
        <div class="mb-3">
            <label><strong>Is the room wall well painted?</strong></label>
            <select class="form-control" name="wallPaint">
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <!-- Whitewash Arrangement -->
        <div class="mb-3">
            <label><strong>If no, Can you arrange for the whitewash?</strong></label>
            <select class="form-control" name="whitewash">
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
                <option value="NA">N/A</option>
            </select>
        </div>

        <!-- Room Empty Check -->
        <div class="mb-3">
            <label><strong>Is the room empty?</strong></label>
            <select class="form-control" name="roomEmpty">
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <!-- Empty Room Photograph -->
        <div class="mb-3">
            <label><strong>If no, when can you share the empty room photograph?</strong></label>
            <select class="form-control" name="emptyRoomPhoto">
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
                <option value="NA">N/A</option>
            </select>
        </div>

        <!-- Infrastructure Readiness -->
        <div class="mb-3">
            <label><strong>Is infrastructure (platform & electric connection) ready?</strong></label>
            <select class="form-control" name="infrastructureReady">
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <!-- Peon Contact Number -->
        <div class="mb-3">
            <label><strong>Can we have a number of the peon?</strong></label>
            <input type="number" class="form-control" name="peonNumber" placeholder="Enter Peon's Number">
        </div>

        <!-- Math/Science Teacher Contact -->
        <div class="mb-3">
            <label><strong>Can we have a number of the Math teacher?</strong></label>
            <input type="number" class="form-control" name="math_teacher_contact" placeholder="Enter Math teacher's number">
        </div>

        <div class="mb-3">
            <label><strong>Can we have a number of the Science teacher?</strong></label>
            <input type="number" class="form-control" name="science_teacher_contact" placeholder="Enter Science teacher's number">
        </div>
        <div class="mb-3">
            <label><strong>Nearest market for particle board and other electric items?</strong></label>
            <input type="text" class="form-control" name="nearestMarket" placeholder="Nearest Market Name">
        </div>

        <!-- Nearest Junction/City -->
        <div class="mb-3">
            <label><strong>Nearest junction/city/station for material delivery?</strong></label>
            <input type="text" class="form-control" name="nearestJunction" placeholder="Enter Junction/City Name">
        </div>

        <!-- Distance from Railway Station -->
        <div class="mb-3">
            <label><strong>Distance between railway station and school (in km)?</strong></label>
            <input type="text" class="form-control" name="distanceRailwaySchool" placeholder="Enter Distance">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // When Action Completed is YES, show Purpose Completed options
        $('input[name="actionCompleted"]').change(function () {
            if ($(this).val() === "yes") {
                $("#purposeSection").show();
            } else {
                $("#purposeSection").hide();
                $("#taskForm").hide();
            }
        });

        // When Purpose Completed is YES, show the full form
        $('input[name="purposeCompleted"]').change(function () {
            if ($(this).val() === "yes") {
                $("#taskForm").show();
            } else {
                $("#taskForm").hide();
            }
        });

       
        $("#wallPaint").change(function () {
           // alert($(this).val()); return false;
            if ($(this).val() === "Yes") {
                $("#whitewash").val("NA"); // Auto-select "N/A"
            } else {
                $("#whitewash").val(""); // Reset selection if "No" is chosen
            }
        });

    });
    $("#callpreintervention").submit(function (e) {
     e.preventDefault(); // Prevent default form submission
        $.ajax({
            url: $(this).attr("action"), // Get action URL from form
            type: "POST",
            data: $(this).serialize(), // Serialize form data
            dataType: "json",
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
</script>