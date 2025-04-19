<div class="container mt-4">
    <h2 class="mb-4">Project List</h2>
    <table class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Client Name</th>
                <th>Project Name</th>
                <th>No. of Schools</th>
                <th>Status</th>
                <th>BD Name</th>
                <th>Created On</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td>
                    <a href="viewProject.php?id=<?= $project['id'] ?>">
                        <?= htmlspecialchars($project['project_name']) ?>
                    </a>
                </td>
                <td>
                    <a href="schoolList.php?project_id=<?= $project['id'] ?>">
                        <?= $project['school_count'] ?>
                    </a>
                </td>
                <td><a href="#"><?= $project['status'] ?></a></td>
                <td><a href="profile.php?user=<?= $project['bd_id'] ?>"><?= $project['bd_name'] ?></a></td>
                <td><a href="pia.php?id=<?= $project['pia_id'] ?>"><?= $project['pia_name'] ?></a></td>
                <td><a href="profile.php?user=<?= $project['cm_id'] ?>"><?= $project['cm_name'] ?></a></td>
                <td><a href="profile.php?user=<?= $project['pm_id'] ?>"><?= $project['pm_name'] ?></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
