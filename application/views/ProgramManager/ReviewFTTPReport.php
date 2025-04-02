<form id="reviewForm">
    <div>
        <label>View FTTP Letter, Attendance, Newly Added Teachers Contact, Add Remark</label>
        <a href="fttp_letter_page.php" target="_blank">Go to Page</a>
        <button type="button" onclick="downloadFile('fttp_letter.pdf')">Download</button>
    </div>
    
    <div>
        <label>View RTTP Report (Downloadable and Can Be Sent for Corrections)</label>
        <a href="rttp_report_page.php" target="_blank">Go to Page</a>
        <button type="button" onclick="downloadFile('rttp_report.pdf')">Download</button>
    </div>
    
    <div>
        <label>Star Rating to PIA</label>
        <input type="number" name="pia_rating" min="1" max="5">
    </div>
    
    <button type="submit">Submit</button>
</form>

<script>
function downloadFile(filename) {
    window.location.href = filename;
}

$(document).ready(function() {
    $('#reviewForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            url: 'submit_review.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('Form submitted successfully!');
                $('#reviewForm')[0].reset();
                location.reload();
            },
            error: function() {
                alert('Error submitting form');
            }
        });
    });
});
</script>