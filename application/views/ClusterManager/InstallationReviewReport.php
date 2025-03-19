<div class="container mt-4">
    <h4 class="text-center">Installation Report Form</h4>
    <form action="submit_installation.php" method="post" enctype="multipart/form-data">

        <!-- View Installation Letter, Checklist, Media -->
        <div class="form-group">
            <label><strong>View (Installation Letter, Checklist, Media)</strong></label>
            <ul>
                <li><a href="installation_letter.pdf" target="_blank">Installation Letter</a></li>
                <li><a href="checklist.pdf" target="_blank">Checklist</a></li>
                <li><a href="installation_media.jpg" target="_blank">Media</a></li>
            </ul>
        </div>

        <!-- View & Download RTTP Report -->
        <div class="form-group">
            <label><strong>View RTTP Report</strong></label>
            <div>
                <a href="rttp_report.pdf" download class="btn btn-success">Download RTTP Report</a>
                <button type="button" class="btn btn-warning" onclick="sendForCorrection()">Send for Correction</button>
            </div>
        </div>

        <!-- Star Rating for PIA -->
        <div class="form-group">
            <label><strong>Rate PIA</strong></label>
            <div class="star-rating">
                <input type="radio" name="rating" value="5" id="star5"><label for="star5">⭐</label>
                <input type="radio" name="rating" value="4" id="star4"><label for="star4">⭐</label>
                <input type="radio" name="rating" value="3" id="star3"><label for="star3">⭐</label>
                <input type="radio" name="rating" value="2" id="star2"><label for="star2">⭐</label>
                <input type="radio" name="rating" value="1" id="star1"><label for="star1">⭐</label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>

<script>
    function sendForCorrection() {
        alert("RTTP Report has been sent for correction.");
    }
</script>