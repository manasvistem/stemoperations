
<div class="modal-body" id="MaintenanceModal">
    <form id="maintenanceForm" method="post" action="updateDuringFTTPVisitPage">
        <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
        <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
        <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>
        <input type="hidden" name="status" id="status" value="">
      <div class="mb-3">
        <label class="form-label">Start Your Journey  : <?php echo date('d-m-y h:i:s');?></label>
        <div class="form-check form-check-inline">
        <a href="<?php echo base_url()?>Menu/duringFTTPVisitPage/<?php echo $taskId;?>/<?php echo date('d-m-y h:i:s');?>" target="_blank" class="btn btn-primary" id="startyourjourney">
           <i class="bi bi-play-fill"></i> Start 
        </a>
        <input type="hidden" name="starttime" value="<?php echo $starttime; ?>"/>

        </div>
      </div>
    </div>
    </form>
  </div>
</div>
<script>
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
</script>
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
