<form id="FTTPReviewCallForm">
    <div id="stage1">
        <label>Action Completed?</label>
        <input type="radio" name="action_completed" value="yes" id="action_yes"> Yes
        <input type="radio" name="action_completed" value="no" id="action_no"> No
    </div>
    
    <div id="stage2" style="display: none;">
        <label>Purpose Completed?</label>
        <input type="radio" name="purpose_completed" value="yes" id="purpose_yes"> Yes
        <input type="radio" name="purpose_completed" value="no" id="purpose_no"> No
    </div>
    
    <div id="stage3" style="display: none;">
        <label>1. What was the Duration of the TTP?</label>
        <input type="time" name="ttp_duration">
        
        <label>2. Does the teachers have any concerns related to MSC? If yes, have you resolved?</label>
        <textarea name="teacher_concern"></textarea>
        
        <label>3. Has the PIA taken Quality Photographs and Video of the training?</label>
        <select name="quality_media">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        
        <label>4. Has the PIA developed rapport with the teachers during TTP?</label>
        <select name="rapport_teachers">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        
        <label>5. Has the TTP Report been prepared within 48 hours?</label>
        <select name="ttp_report_48">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        
        <label>6. Has the PIA taken 1-2 teachers TTP experience testimonials via Video recording?</label>
        <select name="testimonial_video">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        
        <label>7. Rate the overall training quality?</label>
        <input type="number" name="training_quality" min="1" max="5">
        
        <label>8. Has he created the WhatsApp group?</label>
        <select name="whatsapp_group">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        
        <label>Final Remark</label>
        <textarea name="final_remark"></textarea>
    </div>
    
    <button type="submit">Submit</button>
</form>

<script>
$(document).ready(function() {
    $('input[name="action_completed"]').change(function() {
        if ($('#action_yes').is(':checked')) {
            $('#stage2').show();
        } else {
            $('#stage2, #stage3').hide();
        }
    });
    
    $('input[name="purpose_completed"]').change(function() {
        if ($('#purpose_yes').is(':checked')) {
            $('#stage3').show();
        } else {
            $('#stage3').hide();
        }
    });
    
    $('#FTTPReviewCallForm').submit(function(e) {
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
                $('#trainingForm')[0].reset();
                $('#myModal').modal('hide');
                location.reload();
            },
            error: function() {
                alert('Error submitting form');
            }
        });
    });
});
</script>