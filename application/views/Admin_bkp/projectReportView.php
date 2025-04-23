<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- Your existing HTML -->
<div class="container mt-4">
    <h2 class="mb-4">Project List</h2>
    <table id="projectTable" class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Client Name</th>
                <th>Project ID</th>
                <th>Project Name</th>
                <th>No. of Schools</th>
                <th>State</th>
                <th>City</th>
                <th>Created On</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($projectData as $project): ?>
            <tr>
                <td><?= htmlspecialchars($project['client_name']) ?></td>
                <td><?php echo $project['projectcode_id']; ?></td>
                <td><?= htmlspecialchars($project['projectcode']) ?></td>
                <td>
                    <a target="_blank" href="<?php echo base_url()?>Menu/schoolList/<?=$project['projectcode_id']?>">
                        <?= $project['noofschool'] ?>
                    </a>
                </td>
                <td><?= $project['state'] ?></td>
                <td><?= $project['city'] ?></td>
                <td><?= $project['created_at'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTables -->
<script>
$(document).ready(function() {
    $('#projectTable').DataTable({
        "paging": true,
        "pageLength": 10,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
});
</script>
