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

<!-- Bootstrap (Make sure Bootstrap JS is also included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<div class="content-wrapper">
  <div class="content-header text-center">
    <h1 class="m-0 text-center">Add Task</h1>
  </div>
  <?php if($warning_message){ ?><div class="alert alert-warning" role="alert"><?php echo $warning_message;?></div>
           <?php }
            else if($success_message){ ?><div class="alert alert-success" role="alert"><?php echo $success_message; ?></div>
            <?php }?>
  <section class="content">
    <form name ="addMasterTasks" action="submitMasterTask" method="post">
    <div class="container-fluid d-flex justify-content-center align-items-center">
  <div class="row w-100">
    <div class="col-md-8">
      <div class="card card-primary card-outline p-4">
        <div class="card-body">
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Task Name" name="taskname" value="<?php echo $task_name;?>" required >
          </div>
          <?php 
          
          ?>
          <div class="form-group">
            <select name="tasktype" class="form-control">
                <option value="">Select Task Type</option>
                <?php foreach($taskType as $tasktypekey=>$tasktypevalue){ 
                  if(isset($taskType) && $tasktypevalue['id']== $task_type){
                    ?>
                        <option value="<?php echo $tasktypevalue['id'];?>" selected="selected">
                          <?php echo $tasktypevalue['taskType'];?>
                        </option>
                    <?php } else{ ?>
                        <option value="<?php echo $tasktypevalue['id'];?>"><?php echo $tasktypevalue['taskType'];?></option>
                    <?php    }  ?>
                <?php } ?>
            </select>
            <!-- <input class="form-control" type="text" placeholder="Task Type" name="tasktype" value=""> -->
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-auto">
                <input class="form-control w-100" type="number" name="hours" id="hours" min="0" max="23" placeholder="Hours" value="<?php echo $hours; ?>" required>
              </div>
              <div class="col-auto">
                <input class="form-control w-100" type="number" name="minutes" id="minutes" min="0" max="59" value="<?php echo $minutes; ?>" placeholder="Minutes">
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block confirm-button form-control w-100" style="width:50% !important" type="submit">Submit</button>
        </div>
    

</form>
  </section>
</div>
<div>
<script>
    $(document).ready(function(){
       $("#hours, #minutes").on("input", function() {
        let hours = parseInt($("#hours").val(), 10) || 0;
        let minutes = parseInt($("#minutes").val(), 10) || 0;

        // Ensure minutes do not exceed 59
        if (minutes >= 60) {
            let extraHours = Math.floor(minutes / 60);
            hours += extraHours;
            minutes = minutes % 60;
        }

        // Set the corrected values
        $("#hours").val(hours);
        $("#minutes").val(minutes);
    });
});
   document.getElementById("task-duration").addEventListener("input", function () {
    let input = this.value.toLowerCase().replace(/\s+/g, ""); // Remove spaces
    let minutes = 0;

    let match = input.match(/(\d+)h/); // Match hours
    if (match) minutes += parseInt(match[1]) * 60;

    match = input.match(/(\d+)m/); // Match minutes
    if (match) minutes += parseInt(match[1]);

    let hours = Math.floor(minutes / 60);
    let mins = minutes % 60;
    
    this.value = (hours > 0 ? hours + "h " : "") + (mins > 0 ? mins + "m" : "");
  });
</script>

