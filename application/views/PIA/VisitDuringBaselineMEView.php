
<div class="modal-body" id="visitDuringBaseline">
    <form id="BaselineMEvisit" method="post" action="">
        <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
    <div class="mb-3">
        <label class="form-label">Start Your Journey</label>
            <div class="form-check form-check-inline">
                <a href="<?php echo base_url()?>Menu/visitDuringBaselineME/<?php echo $taskId;?>" target="_blank" class="btn btn-primary" id="startyourjourney">
                    <i class="bi bi-play-fill"></i> Start
                </a>
                <input type="hidden" value="" name="start_time">

            </div>
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
   $(document).ready(function () {
    $('#notWorkingModel').change(function () {
        $('#selectedModelsContainer').empty(); // Clear previous selections
        $('#notWorkingModel option:selected').each(function () {
            let modelId   = $(this).val();
            let modelName = $(this).data('model');
            if (modelId) {
                let modelHtml = `
                <div class="selected-model mb-2" data-id="${modelId}">
                    <strong><span id="modelname">${modelName}</span></strong>
                        <select class="repair-replace form-control d-inline-block w-auto ml-2" name="modelreturntype">
                            <option value="">Select Action</option>
                            <option value="repairpart">Repair Part</option>
                            <option value="repairmaterial">Repair Material</option>
                            <option value="replace">Replace</option>
                        </select>
                        <div class="repair-part-options d-inline-block ml-2" style="display:none;">
                                    <select class="model-parts form-control w-auto" name="part_name_${modelName}[]" multiple>
                                    <option value="">Loading</option>
                                    </select>
                                    </div>
                                     <div class="repair-material-options d-inline-block ml-2" style="display:none;">
                                        <select class="model-material form-control w-auto" name="material_name_${modelName}[]" multiple>
                                        <option value="">Loading</option>
                                        </select>
                                        </div>
                </div>`;
                $('#selectedModelsContainer').append(modelHtml);
            }
        });
    });

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
