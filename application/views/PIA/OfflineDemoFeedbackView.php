<style>
 .form-label, .col-form-label {
    text-wrap: auto;
    color: cadetblue;
    font-weight: 600;
    font-size: 14px;
}
.project_color{
    color: #ca00ff;
}
.task_color{
    color:rgb(13, 0, 255);
}
.school_color{
    color:rgb(255, 0, 132);
}
</style>

<div class="modal-body" id="visitDuringBaseline">
  <?php
    $getAllTaskActions = $this->Menu_model->GetTaskActionDetails($tasktypeid);
    $checkTaskCurrentStages = $this->Menu_model->CheckTaskCurrentStages($tasktypeid, $taskId);
    $stageCount = sizeof($checkTaskCurrentStages);


    $taskDetails    = $this->Menu_model->GetTBLTaskDetailsByTaskId($taskId);
    $taskname       = $taskDetails[0]->taskname;
    $sname          = $taskDetails[0]->sname;
    $sid            = $taskDetails[0]->sid;
    $rsid           = $taskDetails[0]->rsid;
    $project_code   = $taskDetails[0]->project_code;
    $status_id      = $taskDetails[0]->status_id;

    // dd($taskDetails);

  ?>

    <div class="text-center">
        <h3 class="task_color text-capitalize"><?=$taskname?></h3>
        <h5 class="project_color"><?= $project_code; ?></h5>
        <h6 class="school_color text-capitalize"><?= $sname; ?></h6>
    </div>
  <hr>
  
  <form action="<?= base_url() ?>Menu/OfflineDemoFeedbackSubmit" enctype="multipart/form-data" method="post">
    <input type="hidden" name="taskId" id="taskId" value="<?= $taskId ?>"/>
    <div class="mb-3 text-center">

    <?php foreach($checkTaskCurrentStages as $taskstage) { ?>
      <div class="form-group mb-4">
        <label class="form-label"><?= $taskstage->taskdetails ?></label>
        <input class="form-control text-capitalize" type="hidden" name="main_task_id[]" value="<?= $taskstage->id ?>" placeholder="" required>
        <input class="form-control" type="text" name="main_task_remarks[]" placeholder="" required>
      </div>
    <?php } ?>
      <hr>
      <div class="form-check form-check-inline">
        <button type="submit" class="btn btn-success upload-btn" id="uploadBtn">Submit Feedback</button>
      </div>
    </div>
  </form>
</div>

<script>
  // Add any JavaScript functionality here if needed
</script>
