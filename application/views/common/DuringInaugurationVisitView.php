<div class="container mt-5">
    <h3 class="text-center mb-4"><?php echo $taskstatus ?>Pre-Inuguration Visit Task</h3>
    <h2>Event Task Form</h2>

<!-- Start Journey Button -->
<button id="startJourney" name="startJourney" class="btn btn-primary mb-3">Start Journey</button>

<form id="eventForm" method="post" action="Menu1/updatetask">
<div class="stage-1">
    <button id="start-journey">Start Journey</button>
</div>

<div class="stage-2" style="display: none;">
    <label for="selfie">Take Selfie at Schools:</label>
    <input type="file" id="selfie" accept="image/*">
</div>

<div class="stage-3" style="display: none;">
    <button id="start-task">Start My Task</button>
</div>

<div class="stage-4" style="display: none;">
    <label for="pre-inauguration-photo-1">Pre Inauguration Decoration Photo-1:</label>
    <input type="file" id="pre-inauguration-photo-1" name="pre-inauguration-photo-1" accept="image/*">
</div>

<div class="stage-5" style="display: none;">
    <label for="pre-inauguration-photo-2">Pre Inauguration Decoration Photo-2:</label>
    <input type="file" id="pre-inauguration-photo-2" name="pre-inauguration-photo-2" accept="image/*">
</div>

<div class="stage-6" style="display: none;">
    <label for="during-inauguration-photo-1">During Inauguration Photo-1:</label>
    <input type="file" id="during-inauguration-photo-1" name="during-inauguration-photo-1" accept="image/*">
</div>

<div class="stage-7" style="display: none;">
    <label for="client-feedback-video-1">Client Feedback Video-1:</label>
    <input type="file" id="client-feedback-video-1" name="client-feedback-video-1" accept="video/*">
</div>

<div class="stage-8" style="display: none;">
    <label for="client-feedback-video-2">Client Feedback Video-2:</label>
    <input type="file" id="client-feedback-video-2" name="client-feedback-video-2" accept="video/*">
</div>

<div class="stage-9" style="display: none;">
    <label for="add-more-photos">Add More Photos:</label>
    <input type="file" id="add-more-photos" name="multiple_photos" accept="image/*" multiple>
</div>

<div class="stage-10" style="display: none;">
    <label for="guest-name">Add Guest Name (Format: Guest Name, Company Name, Designation):</label>
    <input type="text" id="guest-name" name="guest_name" placeholder="Guest Name, Company Name, Designation">
</div>

<div class="stage-11" style="display: none;">
    <label>Call With Reporting Manager:</label>
    <input type="radio" id="call-yes" name="call-reporting-manager" value="yes"> Yes
    <input type="radio" id="call-no" name="call-reporting-manager" value="no"> No
</div>

<div class="stage-12" style="display: none;">
    <label for="selfie-completed-task">Completed My Task (Take Selfie):</label>
    <input type="file" id="selfie-completed-task" accept="image/*">
</div>

<script>
    // Add event listeners for buttons to display next stages
    document.getElementById('start-journey').addEventListener('click', function() {
        document.querySelector('.stage-2').style.display = 'block';
        this.style.display = 'none';
    });

    document.getElementById('start-task').addEventListener('click', function() {
        document.querySelector('.stage-4').style.display = 'block';
        document.querySelector('.stage-5').style.display = 'block';
        document.querySelector('.stage-6').style.display = 'block';
        document.querySelector('.stage-7').style.display = 'block';
        document.querySelector('.stage-8').style.display = 'block';
        document.querySelector('.stage-9').style.display = 'block';
        document.querySelector('.stage-10').style.display = 'block';
        document.querySelector('.stage-11').style.display = 'block';
        this.style.display = 'none';
    });
</script>

</form>

<script>
    // Capture Task Start Time
    $("#startTask").on("click", function() {
        let currentTime = new Date().toLocaleString();
        $("#taskStartTime").text("Task Started at: " + currentTime);
    });
</script>

</div>