<?php $this->load->view('nav'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
<style>
        .card-header.text-center {
    background: aliceblue;
}
    </style>
<div class="container-xxl flex-grow-1 container-p-y">
  
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
            <th>Target Date</th>
            <th>Target Status</th>
            <th>Task User</th>
            <th>Task Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php $i=1; foreach($timelineDatas as $timelineData){?>
          <tr>
            <td><?=$i?></td>
            <td><?=$timelineData->sname?></td>
            <td><?=$timelineData->tasktype?></td>
            <td><?=$timelineData->taskname?></td>
            <td><?=$timelineData->target_date?></td>
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
<?php $this->load->view('footer'); ?>