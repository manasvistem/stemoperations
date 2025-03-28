<?php $this->load->view('nav'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <style>
        h3.card-header.text-center {
    background: aliceblue;
}
    </style>


<?php 
// echo "<pre>";
// print_r($timelineDatas);

?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h3 class="card-header text-center">Factory and Installation Timeline Data</h3>
    <hr>
    <div class="table-responsive text-nowrap">
      <?php
        $timelineDatascnt =  sizeof($timelineDatas);
        if($timelineDatascnt > 0){
        ?>
      <table id="example1" class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Timeline Added By</th>
            <th>Project Code</th>
            <th>Artwork Upload Date (Factory)</th>
            <th>Artwork Approval Date (Sales)</th>
            <th>Printing Date (Factory)</th>
            <th>Particle Board Purchase Date (Factory)</th>
            <th>Packing Date (Factory)</th>
            <th>Dispatch Date (Factory)</th>
            <th>Delivery Date (Factory)</th>
            <th>Transit Process (Factory)</th>
            <th>Pre Installation Call Both (Operation)</th>
            <th>Installation Date (Operation)</th>
            <th>Installation Report Date (Operation)</th>
            <th>Remark</th>
            <th>Created Date</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $i = 1; 
            foreach($timelineDatas as $timelineData) {
            ?>
          <tr>
            <td><?= $i ?></td>
            <td><?= $timelineData->timline_by?></td>
            <td><?= $timelineData->project_code?></td>
            <td><?= $timelineData->dud?></td>
            <td><?= $timelineData->dad?></td>
            <td><?= $timelineData->pd?></td>
            <td><?= $timelineData->pbpd?></td>
            <td><?= $timelineData->pad?></td>
            <td><?= $timelineData->disd?></td>
            <td><?= $timelineData->delivery_date?></td>
            <td><?= $timelineData->transit_process?></td>
            <td><?= $timelineData->pre_install_call?></td>
            <td><?= $timelineData->insd?></td>
            <td><?= $timelineData->insrd?></td>
            <td><?= $timelineData->cremark?></td>
            <td><?= $timelineData->sdatet?></td>
          </tr>
          <?php 
            $i++; 
            } 
            ?>
        </tbody>
      </table>
      <?php } ?>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>