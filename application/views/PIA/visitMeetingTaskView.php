<div class="container">
    <div class="container-fluid">
        <h4><center>Inauguration Pre Visit Task</center></h4>
        <form name="meeting_inauguration" id="meetingForm" action="<?= base_url();?>/Menu/updateVisitInauguration" method="post" enctype="multipart/form-data">
            
            <div class="mb-4 d-flex justify-content-center m-1">
                <label>Take selfie at schools</label>
                <input type="file" class="form-control" name="filname[]" accept="image/*" capture required>
            </div>

            <div class="form-group">
                        <input type="hidden" name="user_id" value="<?=$uid?>">
                        <center><b class="text-info">Today's Date : <?=date('d-m-Y');?> </b>
                        <?php date_default_timezone_set("Asia/Kolkata"); ?>
                        <input type="hidden" name="ustart" value="<?=date('Y-d-m H:i:s')?>">
                        <p>You Are Starting Day at <b><?=date('H:i:s');?></b><br><br>
                        <div class="mb-4">
                            <!-- <select class="form-control" name="wffo">
                                <option value="1">Work From Office</option>
                                <option value="2">Work From Field</option>
                                <option value="3">Work From Field+Office</option>
                            </select> -->
                            <select class="form-control" name="wffo" id="wffo" style="width:400px" required>
                              <option value="">Start Your Day</option>
                                <?php foreach($userdfrom as $udfrom){ ?>
                                <option value="<?= $udfrom->ID; ?>"><?= $udfrom->TYPE; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-4 d-flex justify-content-center">
                            <img class="border" id="blah" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="your image" style="width:150px;height:250px"/>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-info btn-rounded">
                                <label class="form-label text-white m-1" for="imgInp">Take Selfie</label>
                                <input type="file" class="form-control d-none" id="imgInp" name="filname" accept="image/*" capture required/>
                            </div>
                        </div>
                        <input type="hidden" id="lat" name="lat">
                        <input type="hidden" id="lng" name="lng">
                        <input type="hidden" name="do" value="<?=$do?>">
                    </div>
                                </div>
            <div id="faq_maint">
                <div class="mb-3">
                    <label>Clear MSC room Photo 1</label>
                    <input type="file" class="form-control" name="clear_MSC_photo[]" accept="image/*" capture required>
                </div>
                <div class="mb-3">
                    <label>Clear MSC room Photo 2</label>
                    <input type="file" class="form-control" name="clear_MSC_photo[]" accept="image/*" capture required>
                </div>
                <div class="mb-3">
                    <label>Students Model demo video 1</label>
                    <input type="file" class="form-control" name="student_model_demo[]" accept="video/*" capture required>
                </div>
                <div class="mb-3">
                    <label>Students Model demo video 2</label>
                    <input type="file" class="form-control" name="student_model_demo[]" accept="video/*" capture required>
                </div>
                <div class="mb-3">
                    <label>Students Model demo video 3</label>
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
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

