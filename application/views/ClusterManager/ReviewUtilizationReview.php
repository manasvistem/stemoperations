 <form action="submit_form.php" method="post">
    
    <!-- View Photos and Videos -->
    <div class="mb-3">
      <label class="form-label">View Photos and Videos</label><br>
      <a href="path/to/photo.jpg" download class="btn btn-outline-primary btn-sm me-2" target="_blank">Download Photo</a>
      <a href="path/to/video.mp4" download class="btn btn-outline-secondary btn-sm" target="_blank">Download Video</a>
    </div>

    <!-- Star Rating -->
    <div class="mb-3">
      <label class="form-label">Ratings to Utilization</label>
      <div class="star-rating">
        <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
        <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
        <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
        <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
        <input type="radio" name="rating" value="5" id="star5"><label for="star5">★</label>
      </div>
    </div>

    <!-- PIA Remark -->
    <div class="mb-3">
      <label for="pia_remark" class="form-label">PIA Remark</label>
      <textarea class="form-control" id="pia_remark" name="pia_remark" rows="3" placeholder="Enter PIA Remark here..."></textarea>
    </div>

    <!-- Comment Dropdown -->
    <div class="mb-3">
      <label for="comment_select" class="form-label">Select Comment</label>
      <select class="form-select" id="comment_select" name="comment_select">
        <option value="">-- Select --</option>
        <option value="Not Good">Not Good</option>
        <option value="Good">Good</option>
        <option value="Good For Social Media">Good For Social Media</option>
        <option value="Good For Annual Report">Good For Annual Report</option>
        <option value="Good For Social Media and Annual Report">Good For Social Media and Annual Report</option>
        <option value="Other">Other</option>
      </select>
    </div>

    <!-- Other Textarea (Conditional) -->
    <div class="mb-3" id="other_comment_box" style="display:none;">
      <label for="other_comment" class="form-label">Other Comment</label>
      <textarea class="form-control" id="other_comment" name="other_comment" rows="2" placeholder="Enter custom comment..."></textarea>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
