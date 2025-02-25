<div class="container mt-5">
    <h3 class="text-center mb-4"><?php echo $taskstatus ?>Pre-Inuguration Task</h3>
    
    <form action="<?php echo base_url();?>Menu1/updateTask" enctype="multipart/form-data"  method="post" name="visitMeeting" >
        <div class="mb-3">
            <label class="form-label fw-bold">Project Code</label>
            <input type="text" class="form-control" placeholder="Enter Project Code" value="" disabled required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">School Name</label>
            <input type="text" class="form-control" placeholder="Enter School Name" value="" disabled required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Address</label>
            <textarea class="form-control" rows="3" placeholder="Enter Address" value="" disabled required></textarea>
        </div>
        <div class="mb-3">
            <div class="form-check">Action Taken
                <label for="actionyes">Yes</label>
                <input type="radio"  id="ayes" name="action" value="ayes">
                <label for="actionno"> No</label>
                <input type="radio" id="ano" name="action" value="ano">
            </div>
            <div class="form-check">Purpose Achieved
                <label for="purposeachivedYes">Yes</label> 
                <input type="radio" id="pyes" name="purpose" value="pyes">
                <label for="purposeachivedNo">No</label> 
                <input type="radio" id="pno" name="purpose" value="pno">
            </div>
        </div>
        <div id="inaugurationModal" style="display: none; border: 1px solid #ccc; padding: 15px; margin: 10px; border-radius: 5px;">
         <h5>Event Inauguration Details</h5>
            <!-- Date Picker -->
            <div class="form-group">
              <label>Available Dates and Times:</label>
              <input type="datetime-local" class="form-control" name="eventStart" id="eventStart" required>
              <input type="datetime-local" class="form-control mt-2" name="eventEnd" id="eventEnd" required>
            </div>
    <!-- Number of Teachers -->
    <div class="form-group">
      <label>How many teachers will be available?</label>
      <input type="number" class="form-control" name="teacherCount" id="teacherCount" required>
    </div>
    
    <!-- Number of Students -->
    <div class="form-group">
      <label>How many students will be available?</label>
      <input type="number" class="form-control" name="studentCount" id="studentCount" required>
    </div>
    <div class="form-group">
      <label>What facilities (such as tables, chairs, etc.) will be provided by the school for the event?</label>
      <input type="text" class="form-control" name="facilities" id="facilities" required>
    </div>
    <!-- Additional Questions -->
    <div class="form-group">
      <label>Will students prepare a welcome song for guests?</label>
      <select class="form-control" name="welcomesong" name="welcomesong" id="welcomeSong">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>
    
    <div class="form-group">
      <label>Can we arrange a few students for model explanation?</label>
      <select class="form-control" id="modelExplanation" name="modelExplanation">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>
    
    <div class="form-group">
      <label>Will the school arrange snacks (Tea and Coffee) for guests?</label>
      <select class="form-control" id="snacks" name="snacks">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>
    
    <div class="form-group">
      <label>Will the school handle decoration (ribbons, materials)?</label>
      <select class="form-control" id="decoration" name="decoration">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>
    
    <div class="form-group">
      <label>Is a pre-visit required for preparation?</label>
      <select class="form-control" id="preVisit" name="preVisit">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
    </div>
    
    <!-- Pre-Visit Task (Hidden Initially) -->
    <div class="form-group" id="preVisitTask" style="display: none;">
    </div>
</div>
        </div>
        <input type="hidden" value="PreInaugurationVisit" name="taskname"/>
        <input type="hidden" value="2" name="task_id"/>
        <div class="text-center">
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </form>
</div>

<!-- Include Footer Here -->
<script>
$("document").ready(function(){
        $('input[name="action"]').on('change', function() {
            var action =  $('#ayes').val();
            $('input[name="purpose"]').on('change', function(){
              var purpose =  $('#pyes').val();
              if(purpose == 'pyes'){
                $("#inaugurationModal").show();
              }
       
            });
          });
           
         
         if(action == 'ayes' && purpose == "pyes"){
                $("#inaugurationModal").show();
        }
        

    // $('input[name="preVisit"]').on('change', function() {
    //  //to generate visit pre visit inauguration task 
    //        $.ajax({
    //             url:'<?=base_url();?>Menu1/createtask',
    //             type: "POST",
    //             data: {
    //             taskid: <?php echo $task_id;?>
    //             },
    //             cache: false,
    //             success: function a(result){
    //                 console.log(result);
    //             }
    //             });
    //     });
    });



</script>