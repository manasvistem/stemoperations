
<div class="modal-body" id="MaintenanceModal">
    <form id="maintenanceForm" method="post" action="">
        <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
        <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
        <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>
        <input type="hidden" name="status" id="status" value="">
      <div class="mb-3">
        <label class="form-label">Start Your Journey</label>
        <div class="form-check form-check-inline">
        <a href="<?php echo base_url()?>/Menu/visitDuringMaintenance/<?php echo $taskId;?>" target="_blank" class="btn btn-primary" id="startyourjourney">
           <i class="bi bi-play-fill"></i> Start Your Journey
        </a>
        <input type="hidden" value="" name="start_time">
        </div>
      </div>
      <!-- <div class="mb-3" id="purpose">
        <label class="form-label">Purpose Completed?</label>
                   <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="purposeCompleted" value="yes">
          <label class="form-check-label">Yes</label>
        </div>
        <div class="form-check form-check-inline" >
          <input class="form-check-input" type="radio" name="purposeCompleted" value="no">
          <label class="form-check-label">No</label>
        </div>
      </div> -->
    <div id="faq_maint" style="display:none;">
        <div class="mb-4 d-flex justify-content-center m-1">
            <label>Take selfie at schools</label>
            <input type="file" class="form-control" name="filname[]" accept="image/*" capture required=""/>
          </div>
        <div class="mb-3 form-check" id="selfiewithschool">
            <label class="form-check-label" for="requestNote">take selfie at schools</label>
            <input class="form-check-input" type="file" name="taskexe[]" id="requestNote" value="">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Start My task</label>
            <input class="form-check-input" type="file" name="taskexe[]" id="requestNote" value="">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Clear MSC room Photo 1</label>
            <input class="form-check-input" type="file" name="taskexe[]" id="requestNote" value="">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Clear MSC room Photo 2</label>
            <input class="form-check-input" type="file" name="taskexe[]" id="requestNote" value="">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Students Model demo video 1</label>
            <input class="form-check-input" type="file" name="taskexe[]" id="requestNote" value="">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Students Model demo video 2</label>
            <input class="form-check-input" type="file" name="taskexe[]" id="requestNote" value="">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Students Model demo video 3</label>
            <input class="form-check-input" type="file" name="taskexe[]" id="requestNote" value="">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Select Not working Model</label>
            <input class="form-check-input" type="file" name="taskexe[]" id="requestNote" value="">
            <select name="not_working_model" multiple>
                <?php foreach($getFactoryModelList as $key=>$val){
                    ?>
                    <option val="<?php echo $val['id'];?>"><?php echo $val['model_name'];?></option>
                <?php
                } ?>
            </select>
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Select Not working Model</label>
            <input class="form-check-input" type="file" name="taskexe[]" id="requestNote" value="">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">have you Got Soft copy of Inauguration Banner ?</label>
            <input class="form-check-input" type="checkbox" name="taskexe[]" id="requestNote" value="">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">have you Printed Inauguration banner?</label>
            <input class="form-check-input" type="checkbox" name="taskexe[]" id="requestNote" value="">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Is DIY Material arranged ?</label>
            <input class="form-check-input" type="checkbox" name="taskexe[]" id="requestNote" value="<?php echo $val['id']?>">
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Is DIY Certificates are printed ?</label>
            <input class="form-check-input" type="checkbox" name="taskexe[]" id="requestNote" value="<?php echo $val['id']?>">
        </div>

    <?php
    /* foreach($formdata as $key=>$val){ 
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
        }*/
         ?>
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
/*
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
  
});  */

$("#startyourjourney").click(function(){

})
})
</script>



    <!-- Start Button -->
