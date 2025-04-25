<div class="container mt-4 mb-5 p-4 border rounded shadow-sm bg-light">
  <form action="<?php base_url()?>Menu/updateBaselineMEReport" method="POST" enctype="multipart/form-data" name="reportInauguration">
  <input type="hidden" value="<?php echo $taskId;?>" name="taskId">
    <!-- View Media from M&E Visit -->
    <div class="mb-4">
        <?php $parentTaskId = getParentTaskId($taskId); ?>
      <label class="form-label fw-semibold">View (Letter, Photos and Other Media during Inauguration Visit)</label><br>
      <a href="<?php echo base_url() ?>Menu/taskExecutionImages/<?php echo $parentTaskId;?>"  class="btn btn-sm btn-secondary" target="_blank">View</a>
    </div>
    <!-- Report PDF Upload -->
    <div class="mb-4">
      <label class="form-label fw-semibold">Upload Final Report (PDF)</label>
      <input type="file" class="form-control" name="baseline_ME_pdf_report" accept="application/pdf" required>
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
