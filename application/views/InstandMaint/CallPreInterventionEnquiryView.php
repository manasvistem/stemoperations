<div class="container mt-4">
    <h4 class="text-center">Call (Pre - Intervention Enquiry for Installation)</h4>
    <form id="installationForm" method="post" action="<?php echo base_url();?>/Menu/updateCallPreIntervention">
    <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
    <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
    <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>


        <!-- Action Completed & Purpose Completed -->
        <div class="mb-3">
            <label><strong>Action Completed?</strong></label>
            <input type="radio" name="action_completed" value="yes"> Yes
            <input type="radio" name="action_completed" value="no"> No
        </div>
        <div class="mb-3">
            <label><strong>Purpose Completed?</strong></label>
            <input type="radio" name="purpose_completed" value="yes"> Yes
            <input type="radio" name="purpose_completed" value="no"> No
        </div>

        <!-- Form Fields - Select Boxes & Remarks -->
        <div id="callinterventionEnquiry" style="display: none;">
            <div class="mb-3">
                <label>1. Called the concerned person and shared schedule?</label>
                <select class="form-control w-25 question-select" name="called_person" data-target="remark_called_person">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <textarea class="form-control mt-2 remark-field" name="remark_called_person" id="remark_called_person" placeholder="Enter remarks..." style="display: none;"></textarea>
            </div>

            <div class="mb-3">
                <label>2. Verified school timings, key availability, and readiness?</label>
                <select class="form-control w-25 question-select" name="verified_school" data-target="remark_verified_school">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <textarea class="form-control mt-2 remark-field" name="remark_verified_school" id="remark_verified_school" placeholder="Enter remarks..." style="display: none;"></textarea>
            </div>

            <div class="mb-3">
                <label>3. Finalized and arranged transportation to schools?</label>
                <select class="form-control w-25 question-select" name="transportation" data-target="remark_transportation">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <textarea class="form-control mt-2 remark-field" name="remark_transportation" id="remark_transportation" placeholder="Enter remarks..." style="display: none;"></textarea>
            </div>

            <div class="mb-3">
                <label>4. Contacted the Particle Board vendor?</label>
                <select class="form-control w-25 question-select" name="particle_vendor" data-target="remark_particle_vendor">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <textarea class="form-control mt-2 remark-field" name="remark_particle_vendor" id="remark_particle_vendor" placeholder="Enter remarks..." style="display: none;"></textarea>
            </div>

            <div class="mb-3">
                <label>5. Extra person required? If yes, requested to school SPOC?</label>
                <select class="form-control w-25 question-select" name="extra_person" data-target="remark_extra_person">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <textarea class="form-control mt-2 remark-field" name="remark_extra_person" id="remark_extra_person" placeholder="Enter remarks..." style="display: none;"></textarea>
            </div>

            <div class="mb-3">
                <label>6. Planned travel to the concerned location?</label>
                <select class="form-control w-25 question-select" name="planned_travel" data-target="remark_planned_travel">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <textarea class="form-control mt-2 remark-field" name="remark_planned_travel" id="remark_planned_travel" placeholder="Enter remarks..." style="display: none;"></textarea>
            </div>

            <div class="mb-3">
                <label>7. Claimed advance on Hr-One?</label>
                <select class="form-control w-25 question-select" name="claimed_advance" data-target="remark_claimed_advance">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <textarea class="form-control mt-2 remark-field" name="remark_claimed_advance" id="remark_claimed_advance" placeholder="Enter remarks..." style="display: none;"></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <!-- Response Message -->
    <div id="responseMessage" class="mt-3 text-center"></div>
</div>
<script>
      $(document).ready(function() {
        $("#installationForm").submit(function (e) {
            e.preventDefault(); // Prevent default form submission
                $.ajax({
                    url: $(this).attr("action"), // Get action URL from form
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
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
</script>
<script>
$(document).ready(function () {
    // Form submission
    $("#installationForm").submit(function (event) {
        event.preventDefault();
        var formAction = $(this).attr("action");
        $.ajax({
            url: formAction,
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                $("#responseMessage").html('<div class="alert alert-success">Form Submitted Successfully!</div>');
            },
            error: function () {
                $("#responseMessage").html('<div class="alert alert-danger">Error in submission!</div>');
            }
        });
     });

    // Show/hide intervention questions
    $("input[name='action_completed'], input[name='purpose_completed']").on("change", function () {
        var action = $("input[name='action_completed']:checked").val();
        var purpose = $("input[name='purpose_completed']:checked").val();
        
        if (action === "yes" && purpose === "yes") {
            $("#callinterventionEnquiry").show();
        } else {
            $("#callinterventionEnquiry").hide();
        }
    });

    // Show remark textarea if "No" is selected
    $(".question-select").on("change", function () {
        var targetRemark = $(this).data("target");
        if ($(this).val() === "no") {
            $("#" + targetRemark).show();
        } else {
            $("#" + targetRemark).hide();
        }
    });
});
</script>
