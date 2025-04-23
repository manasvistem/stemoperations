
<!-- Content wrapper -->
 <style>
    .form-control {
    width: fit-content;
}
 </style>
<div class="content-wrapper">
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
  <h5 class="card-header text-center">
        <?php if ($this->session->flashdata('success_message')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <?= $this->session->flashdata('success_message'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_message')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <?= $this->session->flashdata('error_message'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
      </h5>
    <h3 class="card-header text-center" style="background: aliceblue;">Task Management</h3>
    <hr>
    <div class="table-responsive text-nowrap">
      <form action="<?=base_url()?>Menu/UpdatePlannerTaskAction" method="post">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th>S No.</th>
              <th>Task Type</th>
              <th>Task Action</th>
              <th>Task Time</th>
              <th>Status</th>
              <th>Perform By 1</th>
              <th>Perform By 2</th>
              <th>Perform By 3</th>
              <th>Perform By 4</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php $i=1; foreach($getAllTaskActions as $getAllTaskAction){ 
                
                $perform_by1 = $getAllTaskAction->perform_by;
                $perform_by_2 = $getAllTaskAction->perform_by_2;
                $perform_by_3 = $getAllTaskAction->perform_by_3;
                $perform_by_4 = $getAllTaskAction->perform_by_4;

                ?>
            <tr>
              <td><?=$i?></td>
              <td>
                <input type="hidden" name="task_id[]" value="<?=$getAllTaskAction->id?>">
                <?=$getAllTaskAction->tasktype?>
              </td>
              <td>
                <input type="text" class="form-control" name="taskname[]" value="<?=$getAllTaskAction->taskname?>" required />
              </td>
              <td>
                <input type="nummber" class="form-control" name="task_time[]" value="<?=$getAllTaskAction->task_time?>" required />
              </td>
              <td>
                <select class="form-control" name="status[]" required>
                  <option value="">select</option>
                  <option class='bg-success text-white p-1' value="1" <?= ($getAllTaskAction->status == '1') ? 'selected' : '' ?>>Active</option>
                  <option class='bg-warning text-white p-1' value="0" <?= ($getAllTaskAction->status == '0') ? 'selected' : '' ?>>Inactive</option>
                </select>
              </td>

              <td>
                    <select class="form-control" name="perform_by[]">
                        <option value="">Select</option>
                        <?php foreach ($getAllDepartments as $getAllDepartment): 
                            $selected1 = ($perform_by1 == $getAllDepartment->id) ? 'selected' : '';
                        ?>
                            <option value="<?= $getAllDepartment->id; ?>" <?= $selected1; ?>>
                                <?= htmlspecialchars($getAllDepartment->dep_name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
              <td>
                    <select class="form-control" name="perform_by_2[]">
                        <option value="">Select</option>
                        <?php foreach ($getAllDepartments as $getAllDepartment): 
                            $selected2 = ($perform_by_2 == $getAllDepartment->id) ? 'selected' : '';
                        ?>
                            <option value="<?= $getAllDepartment->id; ?>" <?= $selected2; ?>>
                                <?= htmlspecialchars($getAllDepartment->dep_name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
              <td>
                    <select class="form-control" name="perform_by_3[]">
                        <option value="">Select</option>
                        <?php foreach ($getAllDepartments as $getAllDepartment): 
                            $selected3 = ($perform_by_3 == $getAllDepartment->id) ? 'selected' : '';
                        ?>
                            <option value="<?= $getAllDepartment->id; ?>" <?= $selected3; ?>>
                                <?= htmlspecialchars($getAllDepartment->dep_name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
              <td>
                    <select class="form-control" name="perform_by_4[]">
                        <option value="">Select</option>
                        <?php foreach ($getAllDepartments as $getAllDepartment): 
                            $selected4 = ($perform_by_4 == $getAllDepartment->id) ? 'selected' : '';
                        ?>
                            <option value="<?= $getAllDepartment->id; ?>" <?= $selected4; ?>>
                                <?= htmlspecialchars($getAllDepartment->dep_name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>


            </tr>
            <?php $i++;} ?>
          </tbody>
        </table>
        <hr>
        <center>
          <button type="submit" class="btn btn-primary">Submit</button>
        </center>
      </form>
      <br>
      <br>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
   
  });
</script>
