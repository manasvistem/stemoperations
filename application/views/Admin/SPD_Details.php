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
    <div class="container">
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
            <th>Name</th>
            <th>Count</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php $i=1; foreach($spdCountDataByRoles as $value){ ?>
          <tr>
            <td><?=$i?></td>
            <td style="color: #f10060;"><?=$value->name?></td>
            <td>
                <a href="<?=base_url().'Menu/SPD_Details_Data/'.$value->status_id;?>"><?=$value->total_count?></a>
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