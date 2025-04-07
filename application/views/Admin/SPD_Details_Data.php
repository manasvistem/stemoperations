<?php $this->load->view('nav'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
<style>
        .card-header.text-center {
    background: aliceblue;
}
    </style>


<?php 
//  echo sizeof($spdDataByRoles);
// dd($spdDataByRoles);

?>


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="container p-3">
    <div class="card">
    <div class="card-header text-center">
      <h4>School Details</h4>
    </div>
    <hr>
    <div class="table-responsive text-nowrap">
      <table class="table table-striped" id="example">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Project Code</th>
            <th>School Name</th>
            <th>Address </th>
            <th>State </th>
            <th>District </th>
            <th>City </th>
            <th>Pin Code </th>
            <th>Academic Year</th>
            <th>School Status</th>
            <th>Language </th>
            <th>total students </th>
            <th>total Boys </th>
            <th>total Girls </th>
            <th>total Teacher </th>
            <th>timing </th>
            <th>standard </th>
            <th>PIA Name </th>
            <th>Installation Name </th>
            <th>PRO Name </th>
            <th>PM Approved</th>
            <th>View Details</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php $i=1; foreach($spdDataByRoles as $spdDataByRole){ ?>
          <tr>
            <td><?=$i?></td>
            <td><?=$spdDataByRole->project_code?></td>
            <td>
            <a href="<?=base_url().'Menu/SchoolProfileDetails/'?><?=$spdDataByRole->id?>">
                <?=$spdDataByRole->sname?>
            </a>
            </td>
            <td><?=$spdDataByRole->saddress?></td>
            <td><?=$spdDataByRole->ssate?></td>
            <td><?=$spdDataByRole->sdistrict?></td>
            <td><?=$spdDataByRole->scity?></td>
            <td><?=$spdDataByRole->spincode?></td>
            <td><?=$spdDataByRole->sayear?></td>
            <td><?=$spdDataByRole->school_status_name?></td>
            <td><?=$spdDataByRole->slanguage?></td>
            <td><?=$spdDataByRole->total_students?></td>
            <td><?=$spdDataByRole->boys?></td>
            <td><?=$spdDataByRole->girls?></td>
            <td><?=$spdDataByRole->total_teachers?></td>
            <td><?=$spdDataByRole->timing?></td>
            <td><?=$spdDataByRole->std?></td>
            <td><?=$spdDataByRole->pi_name?></td>
            <td><?=$spdDataByRole->insta_name?></td>
            <td><?=$spdDataByRole->pro_name?></td>
            <td><?php 
            
            $pm_apr = $spdDataByRole->pm_apr;
            if($pm_apr == 1){
                echo "<span class='p-1 bg-success text-white border border-success'>Approved</span>";
            }else if($pm_apr == 0){
                echo "<span class='p-1 bg-warning text-white border border-warning'>Pending</span>";
            }
            ?></td>
            <td>
                <a href="<?=base_url().'Menu/SchoolProfileDetails/'?><?=$spdDataByRole->id?>">
                    View
                </a>
            </td>
          </tr>
          <?php $i++;} ?>
        </tbody>
      </table>
    </div>
  </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>