<div class="container mt-5">
    <h3 class="text-center mb-4"><?php echo $taskstatus ?>Pre-Inuguration Visit Task</h3>
    <h2>Event Task Form</h2>

<!-- Start Journey Button -->
<button id="startJourney" name="startJourney" class="btn btn-primary mb-3">Start Journey</button>

<form id="eventForm" method="post" action="Menu1/updatetask">
    <!-- Take Selfie -->
    <div class="mb-3">
        <label class="form-label">Take Selfie at School:</label>
        <input type="file" class="form-control" id="selfie" name="" accept="image/*" capture="camera">
    </div>

    <!-- Start Task Button -->
    <div class="mb-3">
        <button type="button" id="startTask" class="btn btn-success">Start My Task</button>
        <span id="taskStartTime" name=" class="ms-2 text-muted"></span>
    </div>

    <!-- Image Inputs -->
    <div class="mb-3">
        <label class="form-label">Clear MSC Room - Photo 1:</label>
        <input type="file" name="" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
        <label class="form-label">Clear MSC Room - Photo 2:</label>
        <input type="file" name="" class="form-control" accept="image/*">
    </div>

    <!-- Video Inputs -->
    <div class="mb-3">
        <label class="form-label">Students Model Demo Video 1:</label>
        <input type="file"  name="" class="form-control" accept="video/*">
    </div>

    <div class="mb-3">
        <label class="form-label">Students Model Demo Video 2:</label>
        <input type="file" name="" class="form-control" accept="video/*">
    </div>

    <div class="mb-3">
        <label class="form-label">Students Model Demo Video 3:</label>
        <input type="file" name="" class="form-control" accept="video/*">
    </div>

    <!-- Select Not Working Model -->
    <div class="mb-3">
        <label class="form-label">Select Not Working Model:</label>
        <select class="form-control">
            <option value="">Select</option>
            <option value="Model 1">Model 1</option>
            <option value="Model 2">Model 2</option>
            <option value="Model 3">Model 3</option>
        </select>
    </div>

    <!-- Questions -->
    <div class="mb-3">
        <label class="form-label">Have you got a soft copy of the Inauguration Banner?</label>
        <select class="form-control">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Have you printed the Inauguration Banner?</label>
        <select class="form-control">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>

    <!-- Yes/No Fields -->
    <div class="mb-3">
        <label class="form-label">Is DIY Material arranged?</label>
        <select class="form-control">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Are DIY Certificates printed?</label>
        <select class="form-control">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    // Capture Task Start Time
    $("#startTask").on("click", function() {
        let currentTime = new Date().toLocaleString();
        $("#taskStartTime").text("Task Started at: " + currentTime);
    });
</script>

</div>