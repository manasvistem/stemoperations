
<!-- Content wrapper -->
<div class="content-wrapper">
    <style>
    .card-header.text-center {
    background: aliceblue;
}
    </style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card p-3">
    <div class="card-header text-center">
        <h3>Planner Management</h3>
        <p> <?=$planner_date ?> </p>
    </div>
    <hr>
    <?php 
// dd($groupedData);
?>
    <div class="row">
      <div class="col-md-9"></div>
      <div class="col-md-3">
      <form action="<?=base_url();?>Menu/PlannerTaskApprovalPage" method="post" style="align-items: center; display: flex ; padding: 10px;">
       <div class="m-2">
          <label for="exampleFormControlReadOnlyInput1" class="form-label">Select Date</label>
          <input class="form-control" type="date" name="planner_date" id="exampleFormControlReadOnlyInput1" value="<?=$planner_date;?>" required />
        </div>
          <div class="form-group text-center m-1 mt-4">
            <button type="submit" class="btn btn-success mt-2">Filter</button>
          </div>
        </form>
      </div>
    </div>

    <?php $data = $groupedData; ?>
   
    <div class="container p-2" style="min-height: 50vh;background: beige;">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="example1">
            <thead class="thead-dark">
                <tr>
                    <th>Full Name</th>
                    <th>Total Task</th>
                    <th>Total Planned Time</th>

                    <?php
                    // Extract unique task types
                    $taskTypes = array();
                    foreach ($data as $userTasks) {
                        foreach ($userTasks as $task) {
                            $taskTypes[$task->tasktype] = true;
                        }
                    }
                    // Print unique task types as table headers
                    foreach (array_keys($taskTypes) as $taskType) {
                        echo "<th>$taskType</th>";
                    }
                    ?>
                    <th>View Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Initialize task count array for each user
                $taskCounts = array();
                foreach ($data as $userId => $userTasks) {
                    foreach ($userTasks as $task) {
                        $taskCounts[$userId][$task->tasktype] = (isset($taskCounts[$userId][$task->tasktype])) ? $taskCounts[$userId][$task->tasktype] + $task->task_count : $task->task_count;
                    }
                }

                // Print table rows
                foreach ($data as $userId => $userTasks) {
                    $user = $userTasks[0];
                    echo "<tr>";
                    echo "<td style='color: #e403d9 !important;'>" . htmlspecialchars($user->fullname) . "</td>";
                    echo "<td class='text-danger'>" . htmlspecialchars($user->total_task_count) . "</td>";
                    echo "<td class='text-danger'>" . $user->total_plan_task_time . "</td>";
                    foreach (array_keys($taskTypes) as $taskType) {
                        // echo "<td>" . (isset($taskCounts[$userId][$taskType]) ? $taskCounts[$userId][$taskType] : '0') . "</td>";

                        echo "<td>" . (isset($taskCounts[$userId][$taskType]) ? "<span class='text-success'>".$taskCounts[$userId][$taskType]."</span>" : "<span class='text-warning'>0</span>") . "</td>";
                    }

                    echo "<td><a href='".base_url()."Menu/PlannerTaskApprovalDetailsPage/$planner_date/$user->planner_user_id'>View</a</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
  </div>
</div>
