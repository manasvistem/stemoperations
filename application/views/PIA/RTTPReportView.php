<form action="Menu/UpdateRTTPReport" method="post" enctype="multipart/form-data">
  <div class="container mt-4">
    <h5 class="mb-3">Share Report</h5>

    <!-- First Page Screenshot Upload -->
    <div class="form-group">
      <label for="firstScreenshot">Share Report Initiated First Page Screenshot</label>
      <input type="file" class="form-control-file" id="firstScreenshot" name="first_screenshot" accept="image/*" required>
    </div>

    <!-- View Buttons -->
    <div class="form-group">
      <label>View Files from Visit</label><br>
      <a href="your_link_to_letter.pdf" target="_blank" class="btn btn-outline-primary btn-sm mb-1">View Letter</a>
      <a href="your_link_to_photos.zip" target="_blank" class="btn btn-outline-success btn-sm mb-1">View Photos</a>
      <a href="your_link_to_media.zip" target="_blank" class="btn btn-outline-info btn-sm mb-1">View Media</a>
    </div>

    <!-- Second Screenshot Upload -->
    <div class="form-group">
      <label for="secondScreenshot">Share 2nd Status Report Screenshot (After 15 Minutes)</label>
      <input type="file" class="form-control-file" id="secondScreenshot" name="second_screenshot" accept="image/*">
    </div>

    <!-- Upload PDF Report -->
    <div class="form-group">
      <label for="pdfReport">Upload Report (PDF)</label>
      <input type="file" class="form-control-file" id="pdfReport" name="report_pdf" accept="application/pdf">
    </div>

    <!-- Final Remark -->
    <div class="form-group">
      <label for="finalRemark">Final Remark</label>
      <textarea class="form-control" id="finalRemark" name="final_remark" rows="4" placeholder="Enter your final remarks here..."></textarea>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
