
  <div class="container mt-4">
    <h5 class="mb-3">RTTP Summary and Feedback</h5>

    <!-- View RTTP Letter and Related Info -->
    <form action="Menu/submit_report_feedback" method="post" name="RTTPformreportReview">
    <div class="form-group">
      <label>RTTP Letter, Attendance, Teachers Contact</label><br>
      <a href="link_to_rttp_letter.pdf" target="_blank" class="btn btn-outline-primary btn-sm mb-1">View RTTP Letter</a>
      <a href="link_to_attendance.pdf" target="_blank" class="btn btn-outline-secondary btn-sm mb-1">View Attendance</a>
      <a href="link_to_teachers_contact.pdf" target="_blank" class="btn btn-outline-info btn-sm mb-1">View Teachers Contact</a>
      <textarea class="form-control mt-2" name="remark" rows="3" placeholder="Add Remark..."></textarea>
    </div>

    <!-- RTTP Report View & Download -->
    <div class="form-group">
      <label>RTTP Report</label><br>
      <a href="link_to_rttp_report.pdf" download class="btn btn-outline-success btn-sm mb-2">Download RTTP Report</a>
      <textarea class="form-control" name="correction_note" rows="3" placeholder="Add correction comments (if any)..."></textarea>
    </div>

    <!-- Star Rating to PIA -->
    <div class="form-group">
      <label>Star Rating to PIA</label>
      <select class="form-control w-25" name="pia_rating" required>
        <option value="">Select Rating</option>
        <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
        <option value="4">⭐⭐⭐⭐ Good</option>
        <option value="3">⭐⭐⭐ Average</option>
        <option value="2">⭐⭐ Needs Improvement</option>
        <option value="1">⭐ Poor</option>
      </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit Feedback</button>
  </div>
</form>
