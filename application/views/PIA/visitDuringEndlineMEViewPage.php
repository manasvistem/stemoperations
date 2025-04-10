  <div class="container">
    <form id="taskForm" method="POST" action="<?php echo base_url()?>Menu/updateVisitDuringMEEndline">
      <!-- Take Selfie with Location -->
      <div class="mb-3">
        <label class="form-label section-title">Take Selfie with School (with Location)</label>
        <input type="file" class="form-control" accept="image/*" capture="environment">
        <small class="text-muted" id="locationDisplay">Location: <span id="geoLocation">Fetching...</span></small>
      </div>

      <!-- Start Task Button -->
      <div class="mb-3 d-flex align-items-center justify-content-between">
        <button type="button" class="btn btn-primary" id="startTaskBtn">Start My Task</button>
        <div id="startTime" class="text-muted ms-3"></div>
      </div>

      <!-- Task Content (Initially Hidden) -->
      <div id="taskContent" class="hidden">
        <!-- Running Sessions -->
        <div class="section-title">Running Sessions</div>
        <div class="mb-2"><label>1st Session:</label><input type="file" class="form-control" accept="image/*"></div>
        <div class="mb-2"><label>2nd Session:</label><input type="file" class="form-control" accept="image/*"></div>
        <div class="mb-2"><label>3rd Session:</label><input type="file" class="form-control" accept="image/*"></div>
        <div class="mb-3"><label>4th Session:</label><input type="file" class="form-control" accept="image/*"></div>

        <!-- Teacher Reviews -->
        <div class="section-title">Teacher Reviews</div>
        <textarea class="form-control mb-2" placeholder="1st Teacher Review" name="teacher_review1"></textarea>
        <textarea class="form-control mb-2" placeholder="2nd Teacher Review" name="teacher_review2"></textarea>
        <textarea class="form-control mb-3" placeholder="3rd Teacher Review" name="teacher_review3"></textarea>

        <!-- Student Reviews -->
        <div class="section-title">Student Reviews</div>
        <textarea class="form-control mb-2" placeholder="1st Student Review" name="student_review1"></textarea>
        <textarea class="form-control mb-2" placeholder="2nd Student Review" name="student_review2"></textarea>
        <textarea class="form-control mb-3" placeholder="3rd Student Review" name="student_review3"></textarea>

        <!-- PDF Upload -->
        <div class="section-title">Upload Endline M&E Letter (PDF)</div>
        <input type="file" class="form-control mb-3" accept="application/pdf">

        <!-- Call with Reporting Manager -->
        <div class="section-title">Call with Reporting Manager</div>
        <div class="mb-3 d-flex align-items-center gap-2">
          <a href="tel:+1234567890" class="btn btn-outline-primary"><i class="bi bi-telephone"></i> Call</a>
          <input type="text" class="form-control" placeholder="Remark">
        </div>

        <!-- Completed Task Selfie -->
        <div class="section-title">Completed My Task (Take Selfie)</div>
        <input type="file" class="form-control mb-3" accept="image/*" capture="environment">

        <!-- Add More Media -->
        <div class="section-title">Add More Media</div>
        <input type="file" class="form-control mb-4" accept="image/*,video/*" multiple>

        <!-- Submit -->
        <button type="submit" class="btn btn-success w-100">Submit</button>
      </div>
    </form>
  </div>

  <script>
    // Toggle Start/Stop
    $('#startTaskBtn').click(function () {
      const isStarting = $(this).text() === 'Start My Task';
      $(this).text(isStarting ? 'Stop My Task' : 'Start My Task');
      $('#taskContent').toggleClass('hidden');
      if (isStarting) {
        const time = new Date().toLocaleTimeString();
        $('#startTime').text('Started at: ' + time);
      } else {
        $('#startTime').text('');
      }
    });

    // Get Location (Mockup Example)
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        $('#geoLocation').text(position.coords.latitude.toFixed(5) + ', ' + position.coords.longitude.toFixed(5));
      }, function () {
        $('#geoLocation').text('Location permission denied');
      });
    } else {
      $('#geoLocation').text('Geolocation not supported');
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
