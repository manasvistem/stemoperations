<form name="reviewReportEndlineME" class="container mt-4 p-4 border rounded shadow bg-white" action="<?php echo base_url();?>Menu/updateEndlineMEreview">
  <h4 class="mb-4 fw-bold text-center">M&E Report Review</h4>

  <!-- View Photos/Videos/M&E Letter -->
  <div class="mb-3">
    <label class="form-label fw-semibold">View (Photos / Videos / M&E Letter)</label>
    <div>
      <a href="#" class="btn btn-outline-primary btn-sm" target="_blank">View</a>
    </div>
  </div>

  <!-- View Baseline M&E Report -->
  <div class="mb-3">
    <label class="form-label fw-semibold">View (Baseline M&E Report)</label>
    <div>
      <a href="#" class="btn btn-outline-primary btn-sm" target="_blank">View</a>
    </div>
  </div>

  <!-- Correction Needed -->
  <div class="mb-3">
    <label class="form-label fw-semibold">IsEndline M&E Report need to be corrected? If Yes , then reassign report task to PIA</label>
    <select class="form-select" name="correction_required">
      <option value="">Select</option>
      <option value="yes">Yes (Reassign task to PIA)</option>
      <option value="no">No</option>
    </select>
  </div>

  <!-- Star Rating -->
  <div class="mb-3">
    <label class="form-label fw-semibold">Star Rating</label>
    <select class="form-select" name="star_rating">
      <option value="">Select Rating</option>
      <option value="1">⭐</option>
      <option value="2">⭐⭐</option>
      <option value="3">⭐⭐⭐</option>
      <option value="4">⭐⭐⭐⭐</option>
      <option value="5">⭐⭐⭐⭐⭐</option>
    </select>
  </div>

  <!-- Final Remark -->
  <div class="mb-3">
    <label class="form-label fw-semibold">Final Remark</label>
    <textarea class="form-control" name="final_remark" rows="4" placeholder="Enter your remarks here..."></textarea>
  </div>

  <!-- Submit Button -->
  <div class="text-end">
    <button type="submit" class="btn btn-success">Submit</button
