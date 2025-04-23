<style>
  .camera-container {
    max-width: 450px;
    margin: auto;
    background: #fff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    text-align: center;
  }
  .camera-btn {
    background-color: #4e73df;
    color: white;
    border-radius: 30px;
    padding: 12px 25px;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
    font-size: 16px;
  }
  .camera-btn:hover {
    background-color: #2e59d9;
    transform: scale(1.05);
  }
  .form-control.d-none {
    display: none !important;
  }
  .preview-card {
    display: inline-block;
    margin: 10px;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  .preview-img, .preview-video {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
  }
  .preview-video {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #000;
  }
  .preview-pdf {
    width: 150px;
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    color: #333;
    font-size: 14px;
  }
  .upload-btn {
    margin-top: 20px;
    display: none;
  }
  .form-label, .col-form-label {
    font-size: 18px;
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
label.form-label.text-capitalize {
    text-wrap: unset;
}


span#takeSalifyBtn {
  white-space: normal;       /* Allows wrapping */
  word-break: break-word;    /* Prevents mid-word clipping */
  display: inline-flex;
  align-items: center;
  text-align: center;
  padding: 10px 20px;
  gap: 8px;
}

</style>

<div class="modal-body" id="visitDuringBaseline">
  <?php
    $getAllTaskActions = $this->Menu_model->GetTaskActionDetails($tasktypeid);
    $checkTaskCurrentStages = $this->Menu_model->CheckTaskCurrentStages($tasktypeid, $taskId);
    $stageCount = sizeof($checkTaskCurrentStages);
    $stageData = $checkTaskCurrentStages[0];

    $is_final_stage = ($stageCount == 1) ? "Yes" : "No";

    $taskDetailsData    = $this->Menu_model->GetTBLTaskDetailsByTaskId($taskId);
    $sname          = $taskDetailsData[0]->sname;
    $sid            = $taskDetailsData[0]->sid;
    $rsid           = $taskDetailsData[0]->rsid;
    $project_code   = $taskDetailsData[0]->project_code;
    $status_id      = $taskDetailsData[0]->status_id;
    $type_result = [];
    foreach ($stageData as $key => $value) {
      if (strpos($key, 'type_') === 0 && $value == 1) {
        $type_result[$key] = $value;
      }
    }

    $main_task_id = $stageData->id;
    $taskperformedby = $stageData->taskperformedby;
    $tasktype = $stageData->tasktype;
    $taskname = $stageData->taskname;
    $taskdetails = $stageData->taskdetails;
    $taskaction = $stageData->taskaction;

    $type_text = $stageData->type_text;
    $type_checkbox = $stageData->type_checkbox;
    $type_radiobutton = $stageData->type_radiobutton;
    $type_select = $stageData->type_select;
    $type_date = $stageData->type_date;
    $type_textarea = $stageData->type_textarea;
    $type_file = $stageData->type_file;
    $type_rating = $stageData->type_rating;

    $tasktime = $stageData->tasktime;
    $taskstatus = $stageData->taskstatus;

    // echo $main_task_id;
  ?>


  <div class="text-center">
        <h3 class="task_color"><?= $taskname ?></h3>
        <h5 class="project_color"><?= $project_code; ?></h5>
        <h6 class="school_color"><?= $sname; ?></h6>
    </div>

  <form action="<?= base_url() ?>Menu/NewClientReportSubmit" enctype="multipart/form-data" method="post">
    <input type="hidden" name="taskId" id="taskId" value="<?= $taskId ?>"/>
    <input type="hidden" name="stage_message" id="stage_message" value="<?= $is_final_stage ?>"/>
    <input type="hidden" name="main_task_id" id="main_task_id" value="<?= $main_task_id ?>"/>
    <div class="mb-3 text-center">
      <label class="form-label text-capitalize"><?= $taskdetails ?></label>

      <?php
      $multiple ='';
      $upload_name = 'start_jaurney';

      if ($main_task_id == 769) {
        $uploadBtn_message = "⬆️ Upload";
       if($main_task_id == 769){
            $uploadBtn_message = "⬆️ Upload";
            $takeSalify = "⬆️ Upload New Client Report";
        }
      ?>

    <div class="input-group-capture">
        <input type="file" class="form-control d-none" id="inputGroupFile02" name="<?=$upload_name;?>" <?=$multiple;?>>
        <hr>
        <!-- Capture Button -->
        <center><span class="camera-btn" id="takeSalifyBtn"><?= $takeSalify ?></span></center>
        <!-- Preview Area -->
        <div id="previewArea" class="mt-3"></div>
      </div>
      <hr>
      <div class="form-check form-check-inline">
        <button type="submit" class="btn btn-success upload-btn" id="uploadBtn"><?= $uploadBtn_message ?></button>
      </div>
      <?php } ?>
    </div>
  </form>
</div>

<script>
  const input = document.getElementById('inputGroupFile02');
  const previewArea = document.getElementById('previewArea');
  const uploadBtn = document.getElementById('uploadBtn');

  document.getElementById('takeSalifyBtn').addEventListener('click', () => {
    input.click();
  });

  input.addEventListener('change', (e) => {
    const files = e.target.files;
    previewArea.innerHTML = '';
    uploadBtn.style.display = 'inline-block';

    for (const file of files) {
      const fileType = file.type;
      const card = document.createElement('div');
      card.classList.add('preview-card');

      if (fileType.startsWith('image/')) {
        const img = document.createElement('img');
        img.classList.add('preview-img');
        img.file = file;
        card.appendChild(img);

        const reader = new FileReader();
        reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
        reader.readAsDataURL(file);
      } else if (fileType.startsWith('video/')) {
        const video = document.createElement('video');
        video.classList.add('preview-video');
        video.controls = true;
        const source = document.createElement('source');
        source.src = URL.createObjectURL(file);
        source.type = fileType;
        video.appendChild(source);
        card.appendChild(video);
      } else if (fileType === 'application/pdf') {
        const pdf = document.createElement('div');
        pdf.classList.add('preview-pdf');
        pdf.innerText = 'PDF';
        card.appendChild(pdf);
      } else {
        const fileInfo = document.createElement('div');
        fileInfo.classList.add('preview-pdf');
        fileInfo.innerText = `File: ${file.name}`;
        card.appendChild(fileInfo);
      }

      previewArea.appendChild(card);
    }
  });
</script>
