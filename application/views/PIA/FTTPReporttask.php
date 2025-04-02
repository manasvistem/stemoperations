<form id="reportForm"  action="updateFTTPReport" method="POST">
    <div id="stage1">
        <label>Stage 1: Share Report Initiated first page Screenshot</label>
        <input type="file" name="report_initiated" accept=".pdf">
    </div>
    
    <div id="stage2">
        <label>Stage 2: View (Letter, Photos, and Other Media during Visit)</label>
        <input type="file" name="visit_media" multiple>
    </div>
    
    <div id="stage3">
        <label>Stage 3: Share 2nd Status Report Screenshot (after 15 Min)</label>
        <input type="file" name="status_report" accept="image/*">
    </div>
    
    <div id="stage4">
        <label>Stage 4: Upload Report</label>
        <input type="file" name="upload_report">
    </div>
    
    <div id="stage5">
        <label>Stage 5: Final Remark</label>
        <textarea name="final_remark"></textarea>
    </div>
    
    <button type="submit">Submit</button>
</form>

<script>
$(document).ready(function() {
    $('#reportForm').submit(function(e) {
        e.preventDefault();
        var formData    = new FormData(this);
        var formactionURL  = $(this).attr('action');

        $.ajax({
            url: formactionURL,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert('Report submitted successfully!');
                $('#reportForm')[0].reset();
            },
            error: function() {
                alert('Error submitting report');
            }
        });

    });
});
</script>