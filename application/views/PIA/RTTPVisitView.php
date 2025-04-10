
<div class="modal-body" id="RTTPModal">
    <form id="maintenanceForm" method="post" action="<?php echo base_url()?>Menu/updateDuringRTTPVisitPage">
        <input type="hidden" name="taskId" value="<?php echo $taskId; ?>"/>
        <input type="hidden" name="taskType" value="<?php echo $taskType; ?>"/>
        <input type="hidden" name="tasktypeid" value="<?php echo $tasktypeid; ?>"/>
        <input type="hidden" name="status" id="status" value="">
      <div class="mb-3">
        <label class="form-label">Start Your Journey  : <?php echo date('d-m-y h:i:s');?></label>
        <div class="form-check form-check-inline">
        <a href="<?php echo base_url()?>Menu/duringRTTPVisitPage/<?php echo $taskId;?>" target="_blank" class="btn btn-primary" id="startyourjourney">
           <i class="bi bi-play-fill"></i> Start 
        </a>
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
    

$("#startyourjourney").click(function(){

})
})
</script>



    <!-- Start Button -->
