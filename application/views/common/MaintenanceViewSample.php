
      
      <div class="modal-body">
        <form id="maintenanceForm">
          <div class="mb-3">
            <?php foreach($formdata as $key=>$val){
               ?>
               <h4>Task :<?php echo $key;?></h4>
               <?php
               $searchWord = "type";
               foreach($val as $k=>$v){ 
             //   echo $k;
                $temp = strpos($k, $searchWord);

echo $temp;
                    // if(strpos($k, $searchWord) !== false){
                    //         echo "====".$k."<br>";
                    // }
               // dd($v);
                ?>
                      <!--  <input class="form-check-input" type="<?php echo $v['type_radiobutton']; ?>" name="<?php echo $v['taskname'] ?>" value="yes"> -->
                <?php 
               }
            } exit;
            ?>
            <label class="form-label">Action Completed</label>
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
            <label class="form-label">Purpose Completed</label>
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
          <div class="mb-3 form-check">
            <label class="form-check-label" for="requestNote">Share Request Maintenance Note prior.</label>
            <input class="form-check-input" type="checkbox" id="requestNote">
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
    })
</script>

