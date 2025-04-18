<form action="<?= base_url('Menu/submitClusterApproval') ?>" method="post" id="clusterApprovalForm">
    <input type="hidden" name="taskId" value="<?php echo $taskId; ?>">
  <div class="container mt-5">
    <h3 class="mb-4">Cluster School Approval</h3>
    <!-- Project Code -->
    <div class="mb-3">
      <label for="projectCode" class="form-label fw-bold">Project Code</label>
      <input type="text" id="projectCode" name="project_code" class="form-control" value="<?php echo $taskDetails['project_code']; ?>" readonly>
    </div>

    <!-- Cluster Name -->
    <div class="mb-3">
      <label for="clusterLocation" class="form-label fw-bold">Cluster Name</label>
      <input type="text" id="clusterLocation" name="cluster_name" value="<?php echo $taskDetails['cluster_name'];?>" class="form-control" readonly>
    </div>

    <!-- School List -->
    <div class="mb-3">
      <label class="form-label fw-bold">Schools</label>
      <?php 
          $schoolList = getSchoolListByTaskID($userId,$taskId);
          echo "<ul>";
          foreach($schoolList as $key=>$val){
              echo "<li>".$val['sname']."</li>";
          }
          echo "</ul>";
      ?>
    </div>

    <!-- Cluster Venue -->
    <div class="mb-3">
      <label for="cluster_location" class="form-label fw-bold">Cluster Venue</label>
      <input type="text" id="cluster_location" name="cluster_location" class="form-control" value="<?php echo $taskDetails['cluster_location']; ?>" readonly>
    </div>

    <!-- Selected schools and radio button area -->
    <div class="mb-4" id="schoolAddresses">
      <!-- Dynamically populated by JS -->
    </div>

    <!-- Hidden fields -->
    <input type="hidden" name="task_id" value="<?php echo $taskId; ?>">
    <input type="hidden" name="action_type" id="action_type" value="">

    <!-- Action Buttons -->
    <div class="d-flex justify-content-end gap-2">
      <button type="button" class="btn btn-success" id="approveBtn">Approve</button>
      <button type="button" class="btn btn-danger" id="rejectBtn">Reject</button>
    </div>
  </div>
</form>

<script>
  let schoolMap = {};

  $(document).ready(function () {
    const taskId = "<?php echo $taskId; ?>";


    // Auto-fill cluster location
    $(document).on('change', 'input[name="cluster_school"]', function () {
      const clusterVal = $(this).data('cluster');
      $('#clusterLocation').val(clusterVal);
    });

    // Approve
    $('#approveBtn').on('click', function () {
      if (confirm("Are you sure you want to approve this cluster setup?")) {
        $('#action_type').val('approve');
        $('#clusterApprovalForm').submit();
      }
    });

    // Reject
    $('#rejectBtn').on('click', function () {
      if (confirm("Are you sure you want to reject this cluster setup?")) {
        $('#action_type').val('reject');
        $('#clusterApprovalForm').submit();
      }
    });
  });
</script>
