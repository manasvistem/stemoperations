<?php $this->load->view('nav'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
<style>
  h3.card-header.text-center {
  background: aliceblue;
  }
</style>
<?php 
  // dd($academiccalendar);
  ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h3 class="card-header text-center">Show Academic Calendar</h3>
    <hr>
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="small-box bg-light text-secondary">
          <div class="inner">
            <center>
              <h6 class="text-info">Holidays Plan</h6>
            </center>
            <hr>
            <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load("current", { packages: ['corechart'] });
              google.charts.setOnLoadCallback(drawChart12);
              function drawChart12() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Status');
                data.addColumn('number', 'Plan');
                <?php $status = $this->Menu_model->get_HoliPPIA();?>
                 data.addRow(['Total PIA', <?=$status[0]->pias?>]);
                 data.addRow(['Holidays Plan by PIA', <?=$status[0]->hplan?>]);
                var options = {
                  is3D: true,
                  legend: 'none',
                  backgroundColor: 'transparent'
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart3d1'));
                google.visualization.events.addListener(chart, 'select', function() {
                  var selection = chart.getSelection()[0];
                  if (selection) {
                    var stid = data.getValue(selection.row, 2);
                    var uuid = data.getValue(selection.row, 3);
                    var code = 1;
                    window.location.href = '<?=base_url();?>Menu/SGraph1/' + stid + '/' + code;
                  }
                });
                chart.draw(data, options);
              }
            </script>
            <div class="text-center" style="margin-top:-70px;">
              <hr>
              <?php $status = $this->Menu_model->get_HoliPPIA();?>
              <a href="#"><b>Total PIA - <?=$status[0]->pias?></b></a><br>
              <a href="#"><b>Holidays Plan by PIA - <?=$status[0]->hplan?></b></a><br>
            </div>
          </div>
          <a href="<?=base_url();?>Menu/SGraph1/4/1" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="small-box bg-light text-secondary">
          <div class="inner">
            <center>
              <h6 class="text-info">Holidays Check</h6>
            </center>
            <hr>
            <div id="piechart3d2" style="width: 100%;height: 300px; margin-top:-70px;"></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load("current", { packages: ['corechart'] });
              google.charts.setOnLoadCallback(drawChart12);
              function drawChart12() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Status');
                data.addColumn('number', 'Holidays');
                <?php $status = $this->Menu_model->get_HoliCheck();?>
                 data.addRow(['Checked', <?=$status[0]->cont1?>]);
                 data.addRow(['Not Check', <?=$status[0]->cont2?>]);
                var options = {
                  is3D: true,
                  legend: 'none',
                  backgroundColor: 'transparent'
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart3d2'));
                google.visualization.events.addListener(chart, 'select', function() {
                  var selection = chart.getSelection()[0];
                  if (selection) {
                    var stid = data.getValue(selection.row, 2);
                    var uuid = data.getValue(selection.row, 3);
                    var code = 1;
                    window.location.href = '<?=base_url();?>Menu/SGraph1/' + stid + '/' + code;
                  }
                });
                chart.draw(data, options);
              }
            </script>
            <div class="text-center" style="margin-top:-70px;">
              <hr>
              <?php $status = $this->Menu_model->get_HoliCheck();?>
              <a href="#"><b>Checked - <?=$status[0]->cont1?></b></a><br>
              <a href="#"><b>Not Check - <?=$status[0]->cont2?></b></a><br>
            </div>
          </div>
          <a href="<?=base_url();?>Menu/SGraph1/4/1" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="small-box bg-light text-secondary">
          <div class="inner">
            <center>
              <h6 class="text-info">Holidays State Plan</h6>
            </center>
            <hr>
            <div id="piechart3d3" style="width: 100%;height: 300px; margin-top:-70px;"></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load("current", { packages: ['corechart'] });
              google.charts.setOnLoadCallback(drawChart12);
              function drawChart12() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Status');
                data.addColumn('number', 'Plan');
                <?php $status = $this->Menu_model->get_HoliState();?>
                 data.addRow(['Total PIA', <?=$status[0]->cont1?>]);
                 data.addRow(['Holidays Plan by PIA', <?=$status[0]->cont2?>]);
                var options = {
                  is3D: true,
                  legend: 'none',
                  backgroundColor: 'transparent'
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart3d3'));
                google.visualization.events.addListener(chart, 'select', function() {
                  var selection = chart.getSelection()[0];
                  if (selection) {
                    var stid = data.getValue(selection.row, 2);
                    var uuid = data.getValue(selection.row, 3);
                    var code = 1;
                    window.location.href = '<?=base_url();?>Menu/SGraph1/' + stid + '/' + code;
                  }
                });
                chart.draw(data, options);
              }
            </script>
            <div class="text-center" style="margin-top:-70px;">
              <hr>
              <?php $status = $this->Menu_model->get_HoliState();?>
              <a href="#"><b>Total PIA - <?=$status[0]->cont1?></b></a><br>
              <a href="#"><b>Holidays Plan by PIA - <?=$status[0]->cont2?></b></a><br>
            </div>
          </div>
          <a href="<?=base_url();?>Menu/SGraph1/4/1" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <div class="pdf-viwer">
            <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead class="bg-dark text-white">
                
                <tr>
                  <th>SN</th>
                  <th>Store Date</th>
                  <th>PIA Name</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>State</th>
                  <th>Type</th>
                  <th>Remark</th>
                  <th>Approved</th>
                  <th>Reject/Delete</th>
                </tr>
               
              </thead>
              <tbody>
                <?php $i=1;
                  foreach($academiccalendar as $ac){?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$ac->sdatet?></td>
                  <td><?=$ac->fullname?></td>
                  <td><?=$ac->fdate?></td>
                  <td><?=$ac->todate?></td>
                  <td><?=$ac->state?></td>
                  <td><?=$ac->type?></td>
                  <td><?=$ac->remark?></td>
                  <td><button type="button" class="btn btn-success">Approved</button></td>
                  <td><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>
                </a>
                <?php $i++;} ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>