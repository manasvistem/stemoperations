<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stem Operation App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  

  <!-- Navbar -->
  <?php require('nav.php');?>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    
    <section class="content">
      <div class="container-fluid">
     <div class="col-sm col-md-12 col-lg-12 m-auto">
    <div class="row">
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Holidays Plan</h6></center><hr>
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
            
            
            
            
            
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Holidays Check</h6></center><hr>
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
            
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Holidays State Plan</h6></center><hr>
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
            
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Holidays Type Days</h6></center><hr>
                <div id="piechart3d4" style="width: 100%;height: 300px; margin-top:-70px;"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                  <script type="text/javascript">
                        google.charts.load("current", { packages: ['corechart'] });
                        google.charts.setOnLoadCallback(drawChart12);
                        function drawChart12() {
                          var data = new google.visualization.DataTable();
                          data.addColumn('string', 'Status');
                          data.addColumn('number', 'Plan');
                          <?php $status = $this->Menu_model->get_HoliDaysType(); foreach($status as $st){?>
                           data.addRow(['<?=$st->type?>', <?=$st->cont?>]);
                          <?php } ?>
                          var options = {
                            is3D: true,
                            legend: 'none',
                            backgroundColor: 'transparent'
                          };
                          var chart = new google.visualization.PieChart(document.getElementById('piechart3d4'));
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
                  <?php $status = $this->Menu_model->get_HoliDaysType(); foreach($status as $st){?>
                  <a href="#"><b><?=$st->type?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  </div>
              </div>
              <a href="<?=base_url();?>Menu/SGraph1/4/1" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
          </div>
        </div>
        </section>
    
    
    
    
    
    
    
    
    
    
    <section class="content">
      <div class="container-fluid">
     <div class="col-sm col-md-12 col-lg-12 m-auto">
         <div class="card card-primary card-outline">
             <center><h5 class="p-3">Check Academic Calendar</h5></center><hr>
              <div class="card-body box-profile">
                 <div class="table-responsive">
                            <div class="table-responsive">
                                <div class="pdf-viwer">
                                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
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
                                    </tr></a>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table> 
                            </div>
                        </div>
                    </form>   
                  
                  
                  
                  
              </div>
     </div></div>
    </section>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>



</script>

          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021-2022 <a href="<?=base_url();?>">Stemlearning</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url();?>assets/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url();?>assets/js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url();?>assets/js/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url();?>assets/js/jquery.vmap.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url();?>assets/js/moment.min.js"></script>
<script src="<?=base_url();?>assets/js/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url();?>assets/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url();?>assets/js/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url();?>assets/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/js/jszip.min.js"></script>
<script src="<?=base_url();?>assets/js/pdfmake.min.js"></script>
<script src="<?=base_url();?>assets/js/vfs_fonts.js"></script>
<script src="<?=base_url();?>assets/js/buttons.html5.min.js"></script>
<script src="<?=base_url();?>assets/js/buttons.print.min.js"></script>
<script src="<?=base_url();?>assets/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

<script>
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>