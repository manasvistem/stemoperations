
<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
<style>
        .card-header.text-center {
    background: aliceblue;
}
    </style>
<div class="container-xxl flex-grow-1 container-p-y">

<?php 
// dd($timelineDatas);
?>
  
  <div class="card">
    <div class="card-header text-center">
      <h4>Program Timeline Data</h4>
      <h6><?=$timelineDatas[0]->project_code?></h6>
    </div>
    <hr>
    <div class="table-responsive text-nowrap">
      <table class="table" id="example">
        <thead class="thead-dark">
          <tr>
            <th>S No.</th>
            <th>School Name</th>
            <th>Task Type</th>
            <th>Task Name</th>
            <th>Task PM Target Date</th>
            <th>Task Appointment Date</th>
            <th>Task PI Target Date</th>
            <th>Target Status</th>
            <th>Task User</th>
            <th>Task Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php $i=1; foreach($timelineDatas as $timelineData){
            
            $time_line_id         = $timelineData->time_line_id;
            $appointment_datetime = $timelineData->appointment_datetime;
            $target_date          = $timelineData->target_date;

            $pi_time_line_id      = $timelineData->pi_time_line_id;
            $pi_target_date       = $timelineData->pi_target_date;
            
            ?>
          <tr>
            <td><?=$i?></td>
            <td><?=$timelineData->sname?></td>
            <td><?=$timelineData->tasktype?></td>
            <td><?=$timelineData->taskname?></td>
            <td><?=$timelineData->target_date?></td>
            <td>
            <?php 
              if($pi_target_date !== ''){
                echo $appointment_datetime;
              }else{
                echo $target_date;
              }
            ?>
          </td>
            <td><?=$timelineData->pi_target_date?></td>
            <td><?=$timelineData->target_status?></td>
            <td><?=$timelineData->task_username?></td>
            <td><?php 
            if($timelineData->task_status == 0){
              echo "<span class='bg-warning p-1 text-white'>Pending<span>";
            }else if($timelineData->task_status == 1){
              echo "<span class='bg-success p-1 text-white'>Complete<span>";
            }
            ?></td>
          </tr>
          <?php $i++;} ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
