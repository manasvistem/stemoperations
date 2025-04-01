<div class="container mt-5">
    <h3 class="text-center mb-4">Call School Identification</h3>
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form name="schoolIdentificaion" action="updateSchoolIdentificationView" method="POST" >
                        <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
                        <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
                        <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>    
                        <div class="form-group">
                            <label>Action Completed?</label><br>
                            <input type="radio" name="action_completed" value="yes" id="action_yes"> Yes
                            <input type="radio" name="action_completed" value="no" id="action_no"> No
                        </div>
                        <div class="form-group" id="purpose_div" style="display: none;">
                            <label>Purpose Completed?</label><br>
                            <input type="radio" name="purpose_completed" value="yes" id="purpose_yes"> Yes
                            <input type="radio" name="purpose_completed" value="no" id="purpose_no"> No
                        </div>
                        <div id="details_section" style="display: none;">
                            <div class="form-group">
                                <label>School Name</label>
                                <input type="text" name="sname" class="form-control" value="ABC School" disabled>
                            </div>
                            <div class="form-group">
                                <label>Language</label>
                                <input type="text" name="language" class="form-control" value="English" disabled>
                            </div>
                            <div class="form-group">
                                <label>Standard</label>
                                <input type="text" name="standard" class="form-control" value="10th" disabled>
                            </div>
                            <div class="form-group">
                                <label>Can we have a Number of the Peon?</label>
                                <input type="number" name="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Total Teachers</label>
                                <input type="number" name="teachers" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Total Students</label>
                                <input type="number" name="students" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Boys</label>
                                <input type="number" name="boys" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Girls</label>
                                <input type="number" name="girls" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Pincode</label>
                                <input type="number" class="form-control" nam="pincode">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="city">
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" name="state">
                            </div>
                            <div class="form-group">
                                <label>School Principal Name</label>
                                <input type="text" class="form-control" name="principal">
                            </div>
                            <div class="form-group">
                                <label>Contact No</label>
                                <input type="text" class="form-control" name="contact_no">
                            </div>
                            <div class="form-group">
                                <label>DO/DM Letter Required?</label><br>
                                <input type="radio" name="do_dm_required" value="yes"> Yes
                                <input type="radio" name="do_dm_required" value="no"> No
                            </div>
                            <div class="form-group">
                                <label>Visit Required?</label><br>
                                <input type="radio" name="visit_required" value="yes" > Yes
                                <input type="radio" name="visit_required" value="no" > No
                            </div>
                            <div class="form-group">
                                <label>Any Other Information</label>
                                <textarea class="form-control" name="any_other_information"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('input[name="action_completed"]').change(function() {
                if ($(this).val() === 'yes') {
                    $('#purpose_div').show();
                } else {
                    $('#purpose_div').hide();
                    $('#details_section').hide();
                }
            });
            
            $('input[name="purpose_completed"]').change(function() {
                if ($(this).val() === 'yes') {
                    $('#details_section').show();
                } else {
                    $('#details_section').hide();
                }
            });
        });
        $("#schoolIdentificaion").submit(function (e) {
        e.preventDefault(); // Prevent default form submission
            $.ajax({
                url: $(this).attr("action"), // Get action URL from form
                type: "POST",
                data: $(this).serialize(), // Serialize form data
                success: function (response) {
                    if (response.status == 'success') {
                        alert("Task updated successfully!");
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
