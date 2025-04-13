 <form action="<?php echo base_url();?>Menu/updateReviewUtilization" method="post">
 <input type="text" name="taskId" id="taskId" value="<?php echo $taskId;?>" >
 <input type="text" name="tasktypeid" id="tasktypeid" value="<?php echo $tasktypeid;?>" >
    <!-- View Photos and Videos -->
    <div class="mb-3">
      <label class="form-label">View Photos and Videos</label><br>
      <a href="path/to/photo.jpg" download class="btn btn-outline-primary btn-sm me-2" target="_blank">View/Download Photo</a>
      <a href="path/to/video.mp4" download class="btn btn-outline-secondary btn-sm" target="_blank"> View/Download Video</a>
    </div>

    <!-- Star Rating -->
    <div class="mb-3">
      <label class="form-label">Ratings to Utilization</label>
      <div>
        <label>Star Rating to PIA</label>
        <input type="number" name="pia_rating" min="1" max="5">
    </div>
    
    </div>

    <!-- PIA Remark -->
    <div class="mb-3">
      <label for="pia_remark" class="form-label">PIA Remark</label>
      <textarea class="form-control" id="pia_remark" name="pia_remark" rows="3" placeholder=""></textarea>
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
<script>
  $(document).ready(function() {
   let taskId       =  $("#taskId").val();
   let mainTask_id  =  $("#tasktypeid").val();
    $.ajax({
      url: '<?= base_url("Menu/getPIARemark") ?>',
      method: 'POST',
      data: { task_id: taskId , mainTask_id : mainTask_id },
      success: function(response) {
        $('#pia_remark').val(response);
      },
      error: function(xhr, status, error) {
        console.error("Error fetching PIA Remark:", error);
      }
    });
  });
</script>
