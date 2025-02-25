<style>
  body, html {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    background-color: #FFEBEE;
  }
  .content-wrapper {
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
  .container-fluid {
    flex-grow: 1;
  }
  .card {
    width: 100%;
    max-width: 600px; /* Adjust as needed */
    margin: auto;
    background-color: #fff;
    border: none;
    border-radius: 12px;
  }
  .form-control {
    height: 48px;
    border: 2px solid #eee;
    border-radius: 10px;
  }
  .form-control:focus {
    box-shadow: none;
    border: 2px solid #039BE5;
  }
</style>
<!-- jQuery (Load this first) -->

<div class="content-wrapper">
  <div class="container-fluid">
    <h1 class="m-0 text-center">Task List</h1>
  </div>
  <section class="content">
    <div class="table-responsive-md">
        <table id="taskTable"  class="table table-bordered table-striped table-hover w-70" >
            <thead class="thead-dark">
                <tr>
                    <th>Task Name</th>
                    <th>Task Type</th>
                    <th>Task Duration</th>
                    <th>Added By</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($tasksdata)) { ?>
                    <?php foreach ($tasksdata as $key => $val) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($val['task_name']); ?></td>
                            <td><?php echo htmlspecialchars($val['task_type']); ?></td>
                            <td><?php echo htmlspecialchars($val['task_duration']); ?></td>
                            <td><?php echo htmlspecialchars($val['created_by']); ?></td>
                            <td>
                                  <!-- Action buttons or links can go here -->
                                  <a href="addEditMasterTask/<?=$val['task_id']?>" class="btn btn-primary">Edit</a>
                                  <a href="deleteTasks/<?=$val->user_id?>" class="btn btn-danger" onclick=" return confirmDelete()">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4" class="text-center">No tasks available</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

</div>
<div>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function(){
        $('#taskTable').DataTable({
            "paging": true,         // Enables pagination
            "searching": true,      // Enables search box
            "ordering": true,       // Enables sorting
            "lengthMenu": [5, 10, 25, 50], // Show entries dropdown
            "pageLength": 20,        // Default page length
            "language": {
                "search": "Search Tasks:",
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ tasks"
            }
        });
    });
</script>

