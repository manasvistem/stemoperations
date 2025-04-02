<form id="taskForm" action="updateFTTPVisit" method="POST">
    <div id="stage2">
        <label>Take Selfie with School</label>
        <input type="file" name="selfie_school" accept="image/*">
    </div>
    
    <div id="stage3">
        <label>Start My Task</label>
        <button type="button" id="startTask">Start</button>
        <input type="hidden" name="task_timer" id="task_timer">
    </div>
    
    <div id="sessions">
        <label>Running 1st Session</label>
        <button type="button" class="session-start" data-session="1">Start</button>
        <button type="button" class="session-pause" data-session="1">Pause</button>
        <button type="button" class="session-stop" data-session="1">Stop</button>
        <input type="hidden" name="session_1_timer" id="session_1_timer">
        
        <label>Running 2nd Session</label>
        <button type="button" class="session-start" data-session="2">Start</button>
        <button type="button" class="session-pause" data-session="2">Pause</button>
        <button type="button" class="session-stop" data-session="2">Stop</button>
        <input type="hidden" name="session_2_timer" id="session_2_timer">
        
        <label>Running 3rd Session</label>
        <button type="button" class="session-start" data-session="3">Start</button>
        <button type="button" class="session-pause" data-session="3">Pause</button>
        <button type="button" class="session-stop" data-session="3">Stop</button>
        <input type="hidden" name="session_3_timer" id="session_3_timer">
        
        <label>Running 4th Session</label>
        <button type="button" class="session-start" data-session="4">Start</button>
        <button type="button" class="session-pause" data-session="4">Pause</button>
        <button type="button" class="session-stop" data-session="4">Stop</button>
        <input type="hidden" name="session_4_timer" id="session_4_timer">
        
        <label>Running 5th Session</label>
        <button type="button" class="session-start" data-session="5">Start</button>
        <button type="button" class="session-pause" data-session="5">Pause</button>
        <button type="button" class="session-stop" data-session="5">Stop</button>
        <input type="hidden" name="session_5_timer" id="session_5_timer">
    </div>
    
    <div id="reviews">
        <label>1st Teacher Review</label>
        <textarea name="teacher_review_1"></textarea>
        
        <label>2nd Teacher Review</label>
        <textarea name="teacher_review_2"></textarea>
        
        <label>3rd Teacher Review</label>
        <textarea name="teacher_review_3"></textarea>
    </div>
    
    <div id="uploads">
        <label>Teachers Attendance Sheet (Add Photo)</label>
        <input type="file" name="attendance_sheet" accept="image/*">
        
        <label>FTTP Completion Letter</label>
        <input type="file" name="completion_letter" accept=".pdf">
        
        <label>Completed My Task (Take Selfie with School)</label>
        <input type="file" name="completed_selfie" accept="image/*">
        
        <label>Add More Media</label>
        <input type="file" name="additional_media[]" accept="image/*" multiple>
    </div>
    
    <button type="submit">Submit</button>
</form>

<script>
$(document).ready(function() {
    let timers = {};
    
    $('.session-start').click(function() {
        let session = $(this).data('session');
        timers[session] = Date.now();
    });
    
    $('.session-stop').click(function() {
        let session = $(this).data('session');
        let elapsed = Date.now() - timers[session];
        $('#session_' + session + '_timer').val(elapsed);
    });
    
    $('#taskForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: 'your_backend_endpoint.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert('Form submitted successfully!');
                $('#taskForm')[0].reset();
            },
            error: function() {
                alert('Error submitting form');
            }
        });
    });
});
</script>
