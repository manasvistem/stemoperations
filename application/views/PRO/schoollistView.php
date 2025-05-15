<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<div class="container mt-4">
    <?php if (!empty($schoolData)): ?>
        <?php
            // Extract project details from the first array entry
            $projectCode = $schoolData[0]['project_code'];
            $clientName  = $schoolData[0]['clientname'];
        ?>
        <div class="mb-4 p-3 bg-light border rounded">
            <h4 class="mb-1">Project Code: <strong><?= htmlspecialchars($projectCode) ?></strong></h4>
            <h5>Client Name: <strong><?= htmlspecialchars($clientName) ?></strong></h5>
        </div>
    <table id="schoolTable" class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>School ID</th>
                <th>School Name</th>
                <th>Total Students</th>
                <th>Total Teachers</th>
                <th>Total Tasks</th>
                <th>Address</th>
                <th>District</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php   
            foreach ($schoolData as $school): ?>
                <tr>
                <td><?= htmlspecialchars($school['id']) ?></td>
                    <td><?= htmlspecialchars($school['sname']) ?></td>
                    <td><?= htmlspecialchars($school['total_students']) ?></td>
                    <td><?= htmlspecialchars($school['total_teachers']) ?></td>
                    <td><a target='_blank' href='<?php echo base_url()?>Menu/schoolWiseTaskList/<?php echo $school['id'];?>' ><?= htmlspecialchars($school['total_tasks']) ?></a></td>
                    <td><?= htmlspecialchars($school['saddress']) ?></td>
                    <td><?= htmlspecialchars($school['sdistrict']) ?></td>
                    <td><?= htmlspecialchars($school['slocation']) ?></td>
                    <td><a href="<?= base_url('Menu/editSchoolDetails/' . $school['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p class="text-danger">No school data available.</p>
    <?php endif; ?>
</div>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- Initialize DataTables -->
<script>
$(document).ready(function() {
    $('#schoolTable').DataTable({
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
