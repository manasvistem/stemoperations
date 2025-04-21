<!-- Include Bootstrap & DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

    <!-- Button to Show Tasks -->
 
    <!-- Task Table (Initially Hidden) -->
    <div id="taskListContainer" >
        <h4 class="mb-3">Task List</h4>
        <table id="taskTable" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Task ID</th>
                    <th>Task Name</th>
                    <th>TaskType</th>
                    <th>Done By</th>
                    <th>Assigned By</th>
                    <th>Approved Status</th>
                    <th>Task Assigned Date</th>
                    <th>Target Date</th>
                    <th>Appointment Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;
              // dd($SchoolTaskList);
                foreach ($SchoolTaskList as $task): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><a href="<?= base_url('Menu/taskDetails/' . $task['id']) ?>" class="text-primary">
                                <?= htmlspecialchars($task['taskname']) ?> </a></td>
                        <td><?php echo htmlspecialchars($task['tasktype']); ?></td>
                        <td><?= $task['user_id'] ?></td>
                        <td><?= htmlspecialchars($task['assigned_by']) ?></td>
                        <td><?= ($task['approved_status']==1) ? 'Completed':'Not Done' ?></td>
                        <td><?= htmlspecialchars($task['task_assigned_date']) ?></td>
                        <td><?= htmlspecialchars($task['target_date']) ?></td>
                        <td><?= $task['appointment_datetime'];?></td>

                    </tr>
                <?php $i++; endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- JS Includes -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script to show/hide task table and initialize DataTables -->
<script>
$(document).ready(function() {
    $('#showTasksBtn').click(function() {
        $('#taskListContainer').slideToggle(); // Smooth toggle
        $('#taskTable').DataTable(); // Initialize DataTables only once
        $(this).hide(); // Hide the button after showing the list
    });
});
</script>
