<!-- Include external header -->
<!--#include virtual="header.html" -->

<div class="container mt-4">
  <h4 class="mb-3">MSC Teacher Feedback Form</h4>

  <!-- Action Completed Radio -->
   <form name="" action="<?php echo base_url()?>Menu/UpdatePostRTTPVisit" method="POST">
  <div class="form-group">
    <label>Action Completed?</label><br>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="actionCompleted" id="actionYes" value="yes">
      <label class="form-check-label" for="actionYes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="actionCompleted" id="actionNo" value="no">
      <label class="form-check-label" for="actionNo">No</label>
    </div>
  </div>

  <!-- Purpose Completed Radio -->
  <div class="form-group">
    <label>Purpose Completed?</label><br>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="purposeCompleted" id="purposeYes" value="yes">
      <label class="form-check-label" for="purposeYes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="purposeCompleted" id="purposeNo" value="no">
      <label class="form-check-label" for="purposeNo">No</label>
    </div>
  </div>

  <div id="formSection">
    <div class="form-group">
      <label>1. Have you prepared the RTTP report within 48 Hours?</label>
      <select class="form-control">
        <option>Yes</option>
        <option>No</option>
      </select>
    </div>

    <div class="form-group">
      <label>2. Are there any new teachers? If yes, are the teachers added to the Whatsapp group?</label>
      <select class="form-control">
        <option>Yes</option>
        <option>No</option>
      </select>
    </div>

    <div class="form-group">
      <label>3. How well maintained is the MSC? Does the MSC require Maintenance?</label>
      <textarea class="form-control"></textarea>
    </div>

    <div class="form-group">
      <label>4. Are the teachers aware about client visits? If yes, are they well prepared to demonstrate the models with conceptual clarity and live examples?</label>
      <select class="form-control">
        <option>Yes</option>
        <option>No</option>
      </select>
      <textarea class="form-control mt-2"></textarea>
    </div>

    <div class="form-group">
      <label>5. Have you explained the importance of sharing utilization regularly with best practice and model school transformation?</label>
      <select class="form-control">
        <option>Yes</option>
        <option>No</option>
      </select>
      <textarea class="form-control mt-2"></textarea>
    </div>

    <div class="form-group">
      <label>6. Are the students as well, actively using MSC exhibits independently?</label>
      <select class="form-control">
        <option>Yes</option>
        <option>No</option>
      </select>
    </div>

    <div class="form-group">
      <label>7. How often teachers encourage students for peer-to-peer learning?</label>
      <textarea class="form-control"></textarea>
    </div>

    <div class="form-group">
      <label>8. How effectively the models are utilized in a unique way?</label>
      <textarea class="form-control"></textarea>
    </div>

    <div class="form-group">
      <label>9. What are the changes in students academic performance and skills enhancement?</label>
      <textarea class="form-control"></textarea>
    </div>

    <div class="form-group">
      <label>10. Are the teachers familiarized with our cross products and do they understand the benefits?</label>
      <textarea class="form-control"></textarea>
    </div>

    <div class="form-group">
      <label>11. Are the teachers educated about JustLearning Community? If yes, how much registration is completed?</label>
      <textarea class="form-control"></textarea>
    </div>

    <div class="form-group">
      <label>12. Are the students able to develop math & science projects with MSC assistance?</label>
      <select class="form-control">
        <option>Yes</option>
        <option>No</option>
      </select>
    </div>

    <div class="form-group">
      <label>13. Are the teachers active on social media? If yes, what social platform they often use?</label>
      <select class="form-control">
        <option>Yes</option>
        <option>No</option>
      </select>
      <textarea class="form-control mt-2"></textarea>
    </div>

    <div class="form-group">
      <label>Add New teacher contact details</label>
      <input type="text" class="form-control mb-2" placeholder="Teacher Name">
      <input type="number" class="form-control mb-2" placeholder="Mobile Number" maxlength="10">
      <input type="email" class="form-control" placeholder="Email ID">
    </div>

    <button class="btn btn-primary">Submit</button>
  </div>
</div>

<!-- Include external footer -->
<!--#include virtual="footer.html" -->

<script>
  // Toggle form visibility
  document.getElementById('formSection').style.display = 'none';
  document.querySelectorAll('input[name="actionCompleted"]').forEach(radio => {
    radio.addEventListener('change', () => {
      const actionYes = document.getElementById('actionYes').checked;
      const purposeYes = document.getElementById('purposeYes').checked;
      document.getElementById('formSection').style.display = (actionYes && purposeYes) ? 'block' : 'none';
    });
  });
  document.querySelectorAll('input[name="purposeCompleted"]').forEach(radio => {
    radio.addEventListener('change', () => {
      const actionYes = document.getElementById('actionYes').checked;
      const purposeYes = document.getElementById('purposeYes').checked;
      document.getElementById('formSection').style.display = (actionYes && purposeYes) ? 'block' : 'none';
    });
  });
</script>