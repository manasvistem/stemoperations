<div class="container mt-5">
    <h3 class="text-center mb-4"><?php // echo $taskstatus ?>Pre-Inauguration Task</h3>
    
    <form action="<?php echo base_url()?>Menu/PreInaugurationCallUpdate" enctype="multipart/form-data"  method="post" name="preInauguration" id="preInauguration">
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
            <div class="form-check">I Purpose Achieved
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
              <input type="datetime-local" class="form-control" name="eventDate[]" id="eventStart" required>
              <input type="datetime-local" class="form-control mt-2" name="eventDate[]" id="eventEnd" required>
            </div>
    <!-- Number of Teachers -->
    <div class="form-group">
      <label>How many teachers will be available ?</label>
      <input type="number" class="form-control" name="teacherCount" id="teacherCount" required>
    </div>
    
    <!-- Number of Students -->
    <div class="form-group">
      <label>How many students will be available ?</label>
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
    <!-- <div class="form-group" id="preVisitTask" style="display: none;"></div> -->

  </div>
        <input type="hidden" value="PreInaugurationVisit" name="taskname"/>
        <input type="hidden" value="<?php echo $taskId;?>" name="taskId"/>
        <div class="text-center">
            <button type="submit" class="btn btn-dark" id="preInaugurationSubmit">Submit</button>
        </div>
    </form>
</div>

<!-- Include Footer Here -->
<script>
$("document").ready(function(){
  var action = '';   var purpose  = ''
        $('input[name="action"]').on('change', function() {
               action       = $('input[name="action"]:checked').val()
              $('input[name="purpose"]').on('change', function(){
                  purpose  =  $('input[name="purpose"]:checked').val()
                  if(purpose == 'pyes'){
                    $("#inaugurationModal").show();
                  }
            });
         if(action == 'ayes' && purpose == "pyes"){
                $("#inaugurationModal").show();
        }
      });

  $("#preInauguration").submit(function (e) {
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
    
    

  });


</script>