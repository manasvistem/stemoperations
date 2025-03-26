<?php $this->load->view('nav'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
 <?php 
//  dd($missingRecords);
 ?>
  <div class="card">
  <h5 class="card-header text-center">
        <?php if ($this->session->flashdata('success_message')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <?= $this->session->flashdata('success_message'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_message')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <?= $this->session->flashdata('error_message'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
      </h5>
    <h3 class="card-header text-center">Missing User In SPD</h3>
    <hr>
    <div class="table-responsive text-nowrap">
      <table class="table" id="example">
        <thead class="thead-dark">
          <tr>
            <th>S No.</th>
            <th>SID</th>
            <th>School Name</th>
            <th>PIA</th>
            <th>Installation Person</th>
            <th>PRO Name</th>
            <th>Zonel Head</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php $i=1;  foreach ($spdData as $record) {  ?>
          <tr>
            <td><?=$i?></td>
            <td><?=$record->id;?></td>
            <td><?=$record->sname;?></td>
            <td><?php 
            if($record->pi_id == ''){
                echo "<span class='bg-warning text-white p-1'>NA</span>";
            }else{
                $userData = $this->Menu_model->getPIABYID($record->pi_id);
                $fullname = $userData[0]->fullname;
                echo $fullname;
            }
            ?></td>   
            <td><?php 
            if($record->ins_id == ''){
                echo "<span class='bg-warning text-white p-1'>N/A</span>";
            }else{
                $userData = $this->Menu_model->getPIABYID($record->ins_id);
                $fullname = $userData[0]->fullname;
                echo $fullname;
            }
            ?></td>   
            <td><?php 
            if($record->pro_id == ''){
                echo "<span class='bg-warning text-white p-1'>NA</span>";
            }else{
                $userData = $this->Menu_model->getPIABYID($record->pro_id);
                $fullname = $userData[0]->fullname;
                echo $fullname;
            }
            ?></td>   
            <td><?php 
            if($record->zh_id == ''){
                echo "<span class='bg-warning text-white p-1'>NA</span>";
            }else{
                $userData = $this->Menu_model->getPIABYID($record->zh_id);
                $fullname = $userData[0]->fullname;
                echo $fullname;
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