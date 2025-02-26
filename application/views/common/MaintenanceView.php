    <div class="modal-body" id="MaintenanceModal">
        <form id="maintenanceForm" method="post" action="<?php echo base_url()?>Menu/updateTask/22">
            <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
            <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
            <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>
            <input type="hidden" name="status" id="status" value="">
          <div class="mb-3">
            <label class="form-label">Action Completed ?</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="actionCompleted" value="yes">
              <label class="form-check-label">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="actionCompleted" value="no">
              <label class="form-check-label">NO</label>
            </div>
          </div>
          <div class="mb-3" id="purpose">
            <label class="form-label">Purpose Completed?</label>
                       <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="purposeCompleted" value="yes">
              <label class="form-check-label">YES</label>
            </div>
            <div class="form-check form-check-inline" >
              <input class="form-check-input" type="radio" name="purposeCompleted" value="no">
              <label class="form-check-label">NO</label>
            </div>
          </div>
        <div id="faq_maint" style="display:none;">
        <?php foreach($formdata as $key=>$val){ 
                foreach($val as $k=>$v){
                    if($k == 'taskaction' && $v=='Stage3'){ 
                        ?>
                        <div class="mb-3 form-check">
                            <label class="form-check-label" for="requestNote"><?php echo $val['taskdetails'];?></label>
                            <input class="form-check-input" type="checkbox" name="taskexe[]" id="requestNote" value="<?php echo $val['id']?>">
                        </div>
                        <?php
                    }
                } 
            } ?>
        <!--  <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Share Request Maintenance Note in prior.</label>
            <input class="form-check-input" type="checkbox" name="task" id="requestNote">
          </div>

          <div class="mb-3 form-check">
          <label class="form-check-label" for="letterFormat">Is the Maintenance letter format ready for the school to give post maintenance completion?</label>
            <input class="form-check-input" type="checkbox" id="letterFormat">
          </div>
          <div class="mb-3 form-check">
            <label class="form-check-label" for="checklistForm">Do you have the maintenance Check-list form?</label>
            <input class="form-check-input" type="checkbox" id="checklistForm">
          </div>
          <div class="mb-3 form-check">
            <label class="form-check-label" for="kitReady">Do you have the basic maintenance kit ready?</label>
            <input class="form-check-input" type="checkbox" id="kitReady">
          </div>

          <div class="mb-3">
            <textarea class="form-control" rows="2" placeholder="Enter details"></textarea>
            <label class="form-label">Did you receive confirmation & date from school for maintenance? Did you inform the date to Operations?</label>
          </div>-->
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

