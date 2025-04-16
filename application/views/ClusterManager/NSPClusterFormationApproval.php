<div class="container my-4">
  <div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white fw-semibold">
      Cluster Approval Request
    </div>
    <div class="card-body">

      <!-- Cluster Name -->
      <div class="mb-3">
        <label class="form-label fw-bold">Cluster Name:</label>
        <p class="form-control-plaintext"><?= $cluster_name; ?></p>
      </div>

      <!-- Venue -->
      <div class="mb-3">
        <label class="form-label fw-bold">Cluster Venue:</label>
        <p class="form-control-plaintext"><?= $cluster_venue; ?></p>
      </div>

      <!-- School List -->
      <div class="mb-3">
        <label class="form-label fw-bold">Schools in this Cluster:</label>
        <ul class="list-group">
          <?php foreach($schools as $school): ?>
            <li class="list-group-item"><?= $school->sname; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Approval Buttons -->
      <form method="POST" action="<?= base_url(); ?>Menu/processClusterApproval">
        <input type="hidden" name="cluster_id" value="<?= $cluster_id; ?>">

        <div class="d-flex gap-3 mt-4">
          <button type="submit" name="action" value="approve" class="btn btn-success w-25">Approve</button>
          <button type="submit" name="action" value="reject" class="btn btn-danger w-25">Reject</button>
        </div>
      </form>

    </div>
  </div>
</div>
