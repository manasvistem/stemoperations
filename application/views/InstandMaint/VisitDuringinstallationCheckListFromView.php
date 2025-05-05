<div class="modal-body" id="MaintenanceModal">
          <div class="mb-3">
            <label class="form-label">Start Your Journey</label>
            <div class="form-check form-check-inline">
              <a href="<?php echo base_url()?>/Menu/visitDuringInstallationTask/<?php echo $taskId;?>/<?php echo  date('jnYGis');?>" target="_blank" class="btn btn-primary" id="startyourjourney">
                <i class="bi bi-play-fill"></i> Start Your Journey
              </a>
              <input type="hidden" value="" name="start_time">
            </div>

          </div>
        </div>
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

        $("#startyourjourney").click(function(){

        })
    })
</script>

