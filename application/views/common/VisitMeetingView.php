<div class="container mt-5">
    <h3 class="text-center mb-4"><?php echo $taskstatus ?> Visit Task</h3>
    
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
            <label class="form-label fw-bold"><?php echo $taskstatus;?> Image</label>
            <div>
                <button type="button" class="btn btn-primary" onclick="captureLocation()" name="<?php echo $taskstatus;?>location">Start Image with Location</button>
            </div>
            <textarea name="remark_<?php echo $taskstatus;?>" type="text" class="form-control"> </textarea>
            <div class="mt-2" id="locationInfo"></div>
            <input type="hidden" name="<?php echo $taskstatus;?>_location" id="locationhiddenfield"  value="">
            <input type="file" class="form-control mt-2" name="<?php echo $taskstatus;?>Visit" accept="image/*" required>
            <input type="hidden" value="<?php echo $taskstatus;?>Visit" name="taskname"/>
            <input type="hidden" value="<?php echo $task_id;?>" name="task_id"/>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </form>
</div>

<!-- Include Footer Here -->

<script>
    function captureLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                document.getElementById("locationInfo").innerHTML = `Location: ${position.coords.latitude}, ${position.coords.longitude}`;
                document.getElementById("locationhiddenfield").value = `Location: ${position.coords.latitude}, ${position.coords.longitude}`;
            }, function(error) {
                document.getElementById("locationInfo").innerHTML = "Location access denied.";
            });
        } else {
            document.getElementById("locationInfo").innerHTML = "Geolocation is not supported by this browser.";
        }
    }
</script>