<div class="container mt-5">
<?php
 if(!empty($TaskDetailMaster)){
foreach($TaskDetailMaster as $projectcode => $TaskDetails): ?>
    <h3 class="mb-4 text-center">Task Execution Images-<?php echo $projectcode;?></h3>
    <?php  foreach($TaskDetails as $stage => $tasks):  ?>
        <h4 class="mt-4 mb-3 text-primary text-uppercase"><?= ucfirst($tasks[0]['taskname'])." : ".ucfirst($stage) ?></h4>
        <div class="row">
            <?php foreach($tasks as $task): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="<?= base_url().$task['attachment_link']?>" class="card-img-top" alt="Task Image" style="width:100px;height:100px;">
                        <div class="card-body">
                            <p class="card-text mb-0 font-weight-bold"><?= $task['taskname'] ?></p>
                            <small class="text-muted">Uploaded: <?= date('d M Y, h:i A', strtotime($task['created_at'])) ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php endforeach; } 
else{ ?>
    <div class="card-body">
        <p class="card-text mb-0 font-weight-bold">No Data Found for the Task</p>
    </div>
<?php } ?>
