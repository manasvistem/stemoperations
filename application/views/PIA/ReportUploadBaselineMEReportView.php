<div class="container mt-4 mb-5 p-4 border rounded shadow-sm bg-light">
  <form action="<?php echo base_url()?>Menu/updateBaselineMEReport" method="POST" enctype="multipart/form-data" name="BaselineMEReport">
    <!-- Report Initiated Screenshot Upload -->
    <div class="mb-4">
      <label class="form-label fw-semibold">Share Report Initiated First Page Screenshot</label>
      <input type="file" class="form-control" name="report_initiated_screenshot" accept="image/*" required>
    </div>

    <!-- View Media from M&E Visit -->
    <div class="mb-4">
      <label class="form-label fw-semibold">View (Letter, Photos and Other Media during M&E Visit)</label><br>
      <a href="path_to_media.zip" class="btn btn-sm btn-primary me-2" download>Download</a>
      <a href="path_to_media.zip" class="btn btn-sm btn-secondary" target="_blank">View</a>
    </div>

    <!-- Second Status Screenshot Upload -->
    <div class="mb-4">
      <label class="form-label fw-semibold">Share 2nd Status Report Screenshot (after 30 minutes)</label>
      <input type="file" class="form-control" name="second_status_screenshot" accept="image/*" required>
    </div>

    <!-- Report PDF Upload -->
    <div class="mb-4">
      <label class="form-label fw-semibold">Upload Report (PDF)</label>
      <input type="file" class="form-control" name="pdf_report" accept="application/pdf" required>
    </div>

    <!-- Final Remark -->
    <div class="mb-4">
      <label class="form-label fw-semibold">Final Remark</label>
      <textarea class="form-control" name="final_remark" rows="3" placeholder="Add your final comments..."></textarea>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-success w-100">Submit Report</button>
  </form>
</div>
