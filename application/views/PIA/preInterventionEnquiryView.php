
<div class="container mt-4">
    <h4 class="text-center">Call- PreIntervention Enquiry</h4>
    
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
            <input type="checkbox" name="locationType" value="rural"> Rural
            <input type="checkbox" name="locationType" value="urban"> Urban
            <input type="checkbox" name="locationType" value="semi-urban"> Semi-Urban
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
            <label><strong>Can we have a number of the math/science teacher?</strong></label>
            <input type="number" class="form-control" name="teacherNumber" placeholder="Enter Teacher's Number">
        </div>

        <!-- Nearest Market -->
        <div class="mb-3">
            <label><strong>Nearest market for particle board and electric items?</strong></label>
            <input type="text" class="form-control" name="nearestMarket" placeholder="Enter Market Name">
        </div>

        <!-- Nearest Junction/City -->
        <div class="mb-3">
            <label><strong>Nearest junction/city/station for material delivery?</strong></label>
            <input type="text" class="form-control" name="nearestJunction" placeholder="Enter Junction/City Name">
        </div>

        <!-- Distance from Railway Station -->
        <div class="mb-3">
            <label><strong>Distance between railway station and school (in km)?</strong></label>
            <input type="number" class="form-control" name="distanceRailwaySchool" placeholder="Enter Distance">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </div>
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
    });
</script>