<div class="container mt-4">
    <h4 class="text-center">Report Submission Form</h4>
    <form action="submit_report.php" method="post" enctype="multipart/form-data">
        <!-- Share Report Initiated first page Screenshot -->
        <div class="form-group">
            <label><strong>Share Report Initiated First Page Screenshot</strong></label>
            <input type="file" class="form-control" name="report_screenshot" accept="image/*" required>
        </div>

        <!-- View Letter, Photos, and Other Media during Visit -->
        <div class="form-group">
            <label><strong>View (Letter, Photos, and Other Media during Visit)</strong></label>
            <ul>
                <li><a href="letter.pdf" target="_blank">Letter</a></li>
                <li><a href="photo1.jpg" target="_blank">Photo 1</a></li>
                <li><a href="photo2.jpg" target="_blank">Photo 2</a></li>
                <li><a href="media.mp4" target="_blank">Other Media</a></li>
            </ul>
        </div>

        <!-- Share 2nd Status Report Screenshot (after 15 min) -->
        <div class="form-group">
            <label><strong>Share 2nd Status Report Screenshot (After 15 Minutes)</strong></label>
            <input type="file" class="form-control" name="status_report_screenshot" accept="image/*" required>
        </div>

        <!-- Upload Report -->
        <div class="form-group">
            <label><strong>Upload Report</strong></label>
            <input type="file" class="form-control" name="report_file" accept=".pdf,.doc,.docx,.xlsx" required>
        </div>

        <!-- Final Remark -->
        <div class="form-group">
            <label><strong>Final Remark</strong></label>
            <textarea class="form-control" name="final_remark" rows="4" placeholder="Enter your remarks here..." required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit Report</button>
        </div>

    </form>
</div>