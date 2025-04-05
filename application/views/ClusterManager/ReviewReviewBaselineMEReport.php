<div class="container mt-4 mb-5 p-4 border rounded shadow-sm bg-light">
  <form action="submitBaselineReportReview" method="POST">

    <!-- View Media Button -->
    <div class="mb-3">
      <label class="form-label fw-semibold">View (Photos / Videos / M&E Letter)</label><br>
      <a href="path_to_media.zip" class="btn btn-sm btn-primary me-2" target="_blank">View Media</a>
    </div>

    <!-- View Baseline Report -->
    <div class="mb-3">
      <label class="form-label fw-semibold">View (Baseline M&E Report)</label><br>
      <a href="path_to_baseline_report.pdf" class="btn btn-sm btn-secondary" target="_blank">View Report</a>
    </div>

    <!-- Correction Required? -->
    <div class="mb-3">
      <label class="form-label fw-semibold">
        Is Baseline M&E Report need to be corrected? <br>
        <small class="text-muted">If Yes, then reassign report task to PIA</small>
      </label><br>
      <input type="radio" name="correction_required" value="yes" id="correction_yes"> <label for="correction_yes">Yes</label>
      <input type="radio" name="correction_required" value="no" id="correction_no" class="ms-3"> <label for="correction_no">No</label>
    </div>

    <!-- Reject/Reassign Button -->
    <div class="mb-3" id="reject_section" style="display: none;">
      <button type="button" class="btn btn-danger">Reassign to PIA</button>
    </div>

    <!-- Star Rating -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Star Rating</label>
      <div class="star-rating">
        <input type="radio" name="rating" value="5" id="5"><label for="5">★</label>
        <input type="radio" name="rating" value="4" id="4"><label for="4">★</label>
        <input type="radio" name="rating" value="3" id="3"><label for="3">★</label>
        <input type="radio" name="rating" value="2" id="2"><label for="2">★</label>
        <input type="radio" name="rating" value="1" id="1"><label for="1">★</label>
      </div>
    </div>

    <!-- Final Remark -->
    <div class="mb-3">
      <label class="form-label fw-semibold">Final Remark</label>
      <textarea class="form-control" name="final_remark" rows="3"></textarea>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-success w-100">Submit</button>

  </form>
</div>

<!-- Star Rating & Conditional JS -->
<style>
  .star-rating {
    direction: rtl;
    display: inline-flex;
    font-size: 1.5rem;
  }

  .star-rating input {
    display: none;
  }

  .star-rating label {
    color: #ddd;
    cursor: pointer;
  }

  .star-rating input:checked ~ label {
    color: gold;
  }

  .star-rating label:hover,
  .star-rating label:hover ~ label {
    color: gold;
  }
</style>

<script>
  // Show/hide the reassign section based on radio input
  document.addEventListener("DOMContentLoaded", function () {
    const yesRadio = document.getElementById("correction_yes");
    const noRadio = document.getElementById("correction_no");
    const rejectSection = document.getElementById("reject_section");

    function toggleRejectSection() {
      if (yesRadio.checked) {
        rejectSection.style.display = "block";
      } else {
        rejectSection.style.display = "none";
      }
    }

    yesRadio.addEventListener("change", toggleRejectSection);
    noRadio.addEventListener("change", toggleRejectSection);
  });
</script>
