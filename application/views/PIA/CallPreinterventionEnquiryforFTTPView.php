
    <div class="container mt-4">
    <div class="container-fluid">
        <h4 class="text-center">CALL Intervention Enquiry FTTP Task</h4>
        <form id="preInterventionEnquiryFTTP" action="<?php echo base_url()?>Menu/updatePreInterventionEnquiryFTTP" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
            <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
            <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>    
        <div class="mb-3">
                <label class="form-label">Action Completed?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="action_completed" value="yes" id="action_yes">
                    <label class="form-check-label" for="action_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="action_completed" value="no" id="action_no">
                    <label class="form-check-label" for="action_no">No</label>
                </div>
            </div>
            <div id="purposeSection" class="mb-3" style="display: none;">
                <label class="form-label">Purpose Completed?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="purpose_completed" value="yes" id="purpose_yes">
                    <label class="form-check-label" for="purpose_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="purpose_completed" value="no" id="purpose_no">
                    <label class="form-check-label" for="purpose_no">No</label>
                </div>
            </div>
            
            <div id="stage3" style="display: none;">
                <div class="mb-3">
                    <label class="form-label">1. Share the Pre-TTP video and attach Screenshot</label>
                    <input type="file" class="form-control" name="pre_ttp_video" accept=".mp4">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">2. Shared TTP agenda to Principal before FTTP on WhatsApp. Attach Screenshot?</label>
                    <input type="file" class="form-control" name="ttp_agenda">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">3. Is the School Principal's letter for successful training available with you?</label>
                    <input type="file" class="form-control" name="training_certificate" accept=".pdf">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">4. When can the teachers' training program be conducted?</label>
                    <input type="date" class="form-control" name="training_date">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">5. Share your Travel plan.</label>
                    <textarea class="form-control" name="travel_plan"></textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">6. What is the preferred language for training?</label>
                    <input type="text" class="form-control" name="training_language">
                </div>
                <div class="mb-3">
                    <label class="form-label">Final Remark</label>
                    <textarea class="form-control" name="final_remark"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script>
$(document).ready(function() {
    $('input[name="action_completed"]').change(function() {
        if ($('#action_yes').is(':checked')) {
            $('#purposeSection').show();
        } else {
            $('#purposeSection, #stage3').hide();
        }
    });
    
    $('input[name="purpose_completed"]').change(function() {
        if ($('#purpose_yes').is(':checked')) {
            $('#stage3').show();
        } else {
            $('#stage3').hide();
        }
    });
    
    // $('#preInterventionEnquiryFTTP').submit(function(e) {
    //     e.preventDefault();
    //     var formData        =  new FormData(this);
    //     var formactionURL   =  $(this).attr('action');
    //      $.ajax({
    //         url: formactionURL,
    //         type: 'POST',
    //         data: $(this).serialize(),
    //         contentType: false,
    //         success: function(response) {
    //           //  console.log(response); return false;
    //             if (response.status == 'success') {
    //                 alert("Task updated successfully!");
    //               //  $("#status").val("Updated"); // Update hidden field
    //                // $("#dynamicStatus").text("Task Status: Updated"); // Update text
    //                 $("#modalCenter").hide();
    //                       setTimeout(function () {
    //                       location.reload(); // Reload the page to return to main view
    //                   }, 500);
    //                 } else {
    //                     alert("Error updating task. Try again.");
    //                 }
    //         },
    //         error: function() {
    //             alert('Error submitting form');
    //         }
    //     });
    // });
});
</script>

