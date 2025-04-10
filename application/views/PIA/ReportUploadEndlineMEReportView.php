<div class="container mt-4">
  <form name="reportendlineMEreport" method="POST" action="<?php echo base_url();?>Menu/updateEndlineMEreview" enctype="multipart/form-data">
    <!-- Share Report Initiated first page Screenshot -->
     <input type="hidden" value="<?php echo $taskId;?>" name="taskId">

    <div class="mb-3">
      <label class="form-label fw-bold">Share Report Initiated - First Page Screenshot</label>
      <input type="file" class="form-control" name="initial_screenshot" accept="image/*,application/pdf" required>
    </div>

    <!-- View Letters, Photos, Media -->
    <div class="mb-3">
      <label class="form-label fw-bold">View (Letter, Photos, and Other Media during M&E Visit)</label><br>
      <a href="media_link_here" class="btn btn-outline-info" target="_blank">View Documents</a>
    </div>

    <!-- Share 2nd Status Report Screenshot -->
    <div class="mb-3">
      <label class="form-label fw-bold">Share 2nd Status Report Screenshot (after 30 Minutes)</label>
      <input type="file" class="form-control" name="second_screenshot" accept="image/*,application/pdf" required>
    </div>

    <!-- Upload Final Report -->
    <div class="mb-3">
      <label class="form-label fw-bold">Upload Report</label>
      <input type="file" class="form-control" name="final_report" accept="image/*,application/pdf" required>
    </div>

    <!-- Final Remark -->
    <div class="mb-3">
      <label class="form-label fw-bold">Final Remark</label>
      <textarea class="form-control" name="final_remark" rows="4" placeholder="Enter final remark here..."></textarea>
    </div>

    <!-- Submit -->
    <div class="text-end">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>

  </form>
</div>