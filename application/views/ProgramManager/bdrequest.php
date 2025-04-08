<?php $this->load->view('nav'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <?php 
    $colors = [
      "School Identification" => "#FFDDC1",
      "Report" => "#D4E157",
      "New client school visit" => "#FFAB91",
      "Inauguration" => "#A5D6A7",
      "Demo" => "#90CAF9",
      "OnBoardVisit" => "#F48FB1",
      "School Maintenance" => "#CE93D8",
      "New Client Report" => "#FFCC80",
      "On Board Client School Visit" => "#B3E5FC",
      "Select Request Type" => "#FFECB3",
      "DIY" => "#E1BEE7",
      "RTTP" => "#C5E1A5",
      "Employee Engagement" => "#F8BBD0",
      "MnE" => "#B39DDB"
    ];
    
    ?>
  <div class="card">
    <h5 class="card-header text-center">BD REQUEST</h5>
    <hr>
    <div class="table-responsive text-nowrap">
      <table class="table" id="example">
        <thead class="thead-dark">
          <tr>
            <th>S No.</th>
            <th>Type of Request</th>
            <th>Total Request</th>
            <th>Pending</th>
            <th>Open</th>
            <th>Close</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php $i=1; foreach($bdrcount as $d){
            $bgColor = isset($colors[$d->request_type]) ? $colors[$d->request_type] : "#FFFFFF"; 
            ?>
          <tr style="background-color:<?=$bgColor?>">
            <td><?=$i?></td>
            <td><?=$d->request_type?></td>
            <td><a href="<?=base_url();?>Menu/BDREQUEST_DATA/<?=$d->rysn?>/1"><?=$d->cnt?></a></td>
            <td><a href="<?=base_url();?>Menu/BDREQUEST_DATA/<?=$d->rysn?>/2"><?=$d->pending?></a></td>
            <td><a href="<?=base_url();?>Menu/BDREQUEST_DATA/<?=$d->rysn?>/3"><?=$d->open?></a></td>
            <td><a href="<?=base_url();?>Menu/BDREQUEST_DATA/<?=$d->rysn?>/4"><?=$d->closed?></a></td>
          </tr>
          <?php $i++;} ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>