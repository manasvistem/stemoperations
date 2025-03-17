<div class="container">
    <div class="container-fluid">
        <h4><center>Inauguration Pre Visit Task</center></h4>
        <form name="meeting_inauguration" id="meetingForm" action="<?= base_url();?>/Menu/updateVisitInauguration" method="post" enctype="multipart/form-data">
            <div class="mb-4 d-flex justify-content-center m-1">
                <label>Take selfie at schools</label>
                <input type="file" class="form-control" name="filname[]" accept="image/*" capture required>
            </div>
            <div id="faq_maint">
                <div class="mb-3">
                    <label>Pre Inaugurtion Decoration Photo-1</label>
                    <input type="file" class="form-control" name="clear_MSC_photo[]" accept="image/*" capture required>
                </div>
                <div class="mb-3">
                    <label>Pre Inaugurtion Decoration Photo-2</label>
                    <input type="file" class="form-control" name="clear_MSC_photo[]" accept="image/*" capture required>
                </div>
                <div class="mb-3">
                    <label>During Inauguration Photo -1</label>
                    <input type="file" class="form-control" name="student_model_demo[]" accept="video/*" capture required>
                </div>
                <div class="mb-3">
                    <label>Client feedback video -1</label>
                    <input type="file" class="form-control" name="student_model_demo[]" accept="video/*" capture required>
                </div>
                <div class="mb-3">
                    <label>Client feedback video -2/label>
                    <input type="file" class="form-control" name="student_model_demo[]" accept="video/*" capture required>
                </div>
                <div class="mb-3">
                    <label>Add More Photos/label>
                    <input type="file" class="form-control" name="student_model_demo[]" accept="video/*" capture required>
                </div>
                <div class="mb-3">
                    <label>Select Not Working Model</label>
                    <select name="NotWorkingModel" class="form-control">
                        <option value="">Select Not Working Model</option>
                        <?= $modelList; ?>
                    </select>       
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="softCopyInaug[]" id="softCopyInaug">
                    <label class="form-check-label" for="softCopyInaug">Have you got a soft copy of the inauguration banner?</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="printInaug[]" id="printInaug">
                    <label class="form-check-label" for="printInaug">Have you printed the inauguration banner?</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="DIYMaterial[]" id="DIYMaterial">
                    <label class="form-check-label" for="DIYMaterial">Is DIY material arranged?</label>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="DIYCertificates[]" id="DIYCertificates">
                    <label class="form-check-label" for="DIYCertificates">Are DIY certificates printed?</label>
                </div>
                <div class="mb-3 form-check">
                    <label class="form-check-label" for="DIYCertificates">Is Maintenance Required ?</label>
                    <input class="form-radio-input" type="radio" name="maintenance[]" id="DIYCertificates">Yes
                    <input class="form-radio-input" type="radio" name="maintenance[]" id="DIYCertificates">No
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>

<script>
     $(document).ready(function() {
        $('input[name="actionCompleted"]').on('change', function() {   
            var action =  $(this).val();
           if(action == "yes"){
            $("#purpose").show();
                $('input[name="purposeCompleted"]').on('change', function(){
                    var purpose =  $(this).val();
                    if(purpose == 'yes'){
                        $("#faq_maint").show();
                        $("#status").val("1");
                    }
                    else{
                        $("#faq_maint").hide();
                    }
                });
            }
            else{
                $("#purpose").hide();
                $("#faq_maint").hide();
            }
          });
        //  if(action == 'yes' && purpose == "yes"){
        //         $("#faq_maint").show();
        // }

    $("#maintenanceForm").submit(function (e) {
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


    })
</script>

