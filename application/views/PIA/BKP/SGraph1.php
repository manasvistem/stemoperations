<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STEM Oppration | WebAPP</title>
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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      .scrollme {
    overflow-x: auto;
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  

  <!-- Navbar -->
  <?php require('nav.php');?>
  <!-- /.navbar -->
<?php include 'addlog.php';?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="card col-12  p-3 text-center">
              <center><h5>Status Wise School Graph</h5></center><hr>

          
<div class="row">
<div id="piechart3d3" style="width: 100%; height: 500px;"></div>
</div>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
        google.charts.load("current", { packages: ['corechart'] });
        google.charts.setOnLoadCallback(drawChart12);
        
        function drawChart12() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Status');
          data.addColumn('number', 'No of Company');
          data.addColumn('string', 'id');
          data.addColumn('string', 'uid');
        
          <?php
          $status = $this->Menu_model->get_SPDbypistatusw($uid);
          foreach ($status as $st) {
            $statusName = $st->name . " (" . $st->cont . ")";
            echo "data.addRow(['$statusName', $st->cont, '$st->stid', '$uid']);";
          }
          ?>
        
          var options = {
            is3D: true,
          };
        
          var chart = new google.visualization.PieChart(document.getElementById('piechart3d3'));
        
          google.visualization.events.addListener(chart, 'select', function() {
            var selection = chart.getSelection()[0];
            if (selection) {
              var stid = data.getValue(selection.row, 2);
              var uuid = data.getValue(selection.row, 3);
              var code = 1;
              // Redirect to another URL with stid and uuid as parameters
              window.location.href = '<?=base_url();?>Menu/SGraph1/' + stid + '/' + code;
            }
          });
        
          chart.draw(data, options);
        }
  </script>



      
          </div>
      </div>
    </section>
    
    
    
    <section class="content">
      <div class="container-fluid">
          <div class="card col-12  p-3 text-center">
              <div class="container">
                  <div class="row">
                      <button id="grid-view-btn" class="btn border">Grid View</button>
                      <button id="list-view-btn" class="btn border">Xls View</button>
                      <button id="tabular-view-btn" class="btn border">Tabular View</button>
                  </div>
                </div>
              <div class="container-fluid card p-5" id="data-container">
                <div class="row text-center" id="grid-view">
                    
                    
                    
                    <?php 
                         $mdata = $this->Menu_model->get_schoolbycode($uid,$stid,$code);
                         foreach($mdata as $dt){
                         $spdid = $dt->spdid;
                         $lasttask = $this->Menu_model->get_lasttask($spdid);
                         $taskdate = $lasttask[0]->taskdate;
                         $action = $lasttask[0]->action;
                         $taskby = $lasttask[0]->taskby;
                    ?>
                                     
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-4 filter-item">
                          <div class="card p-3 border rounded border-success hover-div d-flex flex-column align-items-stretch h-100 text-dark">
                                 Current Status<br><b><?=$dt->stname?></b><hr>
                                 School Name<br><b><?=$dt->sname?></b><hr>
                                 School Address<br><b><?=$dt->saddress?></b><hr>
                                 City<br><b><?=$dt->scity?></b><hr>
                                 State<br><b><?=$dt->sstate?></b><hr>
                                 Ins Name<br><b><?=$dt->insname?></b><hr>
                                 Pia Name<br><b><?=$dt->pianame?></b><hr>
                                 Project code<br><b><?=$dt->project_code?></b><hr>
                                 client Name<br><b><?=$dt->clientname?></b><hr>
                                 last action date<br><b><?=$taskdate?></b><hr>
                                 last action<br><b><?=$action?></b><hr>
                                 last action by<br><b><?=$taskby?></b><hr>
                                <div class="rounded-circle bg-danger" style="position: absolute;bottom: -10px; left: 40%; transform: translateX(-50%); width: 20px; height: 20px;"></div>
                                <div class="rounded-circle bg-danger" style="position: absolute;bottom: -10px; left: 60%; transform: translateX(-50%); width: 20px; height: 20px;"></div>
                          </div>
                        </div>
                       <?php } ?>
                    
                    
                        
                </div>
                <div id="list-view" style="display: none;">
                    	<div class="table-responsive" id="tbdata">
                    		<table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                				<thead>
                					<tr>
                						<th>S NO</th>
                						<th>Current Status</th>
                						<th>School Name</th>
                						<th>Address</th>
                						<th>City</th>
                						<th>State</th>
                						<th>Ins Name</th>
                						<th>Pia Name</th>
                						<th>Project code</th>
                						<th>client Name</th>
                						<th>last action date</th>
                						<th>last action</th>
                						<th>last action by</th>
                					
                                    </tr>
                				</thead>
                				<tbody>
                				    
                				    <?php 
                				    $i=1;
                                     $mdata = $this->Menu_model->get_schoolbycode($uid,$stid,$code);
                                     foreach($mdata as $dt){
                                         $spdid = $dt->spdid;
                                         $lasttask = $this->Menu_model->get_lasttask($spdid);
                                         $taskdate = $lasttask[0]->taskdate;
                                         $action = $lasttask[0]->action;
                                         $taskby = $lasttask[0]->taskby;
                                    ?>
                                    
                                    <tr>
                                         <td><?=$i++?></td>
                                         <td><?=$dt->stname?></td>
                                         <td><?=$dt->sname?></td>
                                         <td><?=$dt->saddress?></td>
                                         <td><?=$dt->scity?></td>
                                         <td><?=$dt->sstate?></td>
                                         <td><?=$dt->insname?></td>
                                         <td><?=$dt->pianame?></td>
                                         <td><?=$dt->project_code?></td>
                                         <td><?=$dt->clientname?></td>
                                         <td><?=$taskdate?></td>
                                         <td><?=$action?></td>
                                         <td><?=$taskby?></td>
                                    </tr>
                                    
                                    <?php } ?>
                				    
                				    
                				</tbody>
                    		</table> 
                    	</div>
                </div>
                <div id="tabular-view" style="display: none;">
                    <div class="card p-3 col-lg-4 col-sm m-auto bg-light">
                    <?php
                      $status = $this->Menu_model->get_SPDbypistatusw($uid);
                      foreach ($status as $st) {?>
                      <b><a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/<?=$code?>"><?=$st->name?> - <?=$st->cont?></a></b><hr>
                      <?php } ?>
                      <b><a href="<?=base_url();?>Menu/SGraph1/<?=$code?>">View All</a></b>
                      </div>
                </div>  
              
              
              
              
              
              
              
              
              
              
              
              <script>
                document.getElementById("grid-view-btn").addEventListener("click", function () {
                    document.getElementById("grid-view").style.display = "block";
                    document.getElementById("list-view").style.display = "none";
                    document.getElementById("tabular-view").style.display = "none";
                    document.getElementById("list-view-btn").classList.remove('btn-info');
                    document.getElementById("tabular-view-btn").classList.remove('btn-info');
                    document.getElementById("grid-view-btn").classList.add('btn-info');
                });
                document.getElementById("list-view-btn").addEventListener("click", function () {
                    document.getElementById("grid-view").style.display = "none";
                    document.getElementById("tabular-view").style.display = "none";
                    document.getElementById("list-view").style.display = "block";
                    document.getElementById("grid-view-btn").classList.remove('btn-info');
                    document.getElementById("tabular-view-btn").classList.remove('btn-info');
                    document.getElementById("list-view-btn").classList.add('btn-info');
                });
                document.getElementById("tabular-view-btn").addEventListener("click", function () {
                    document.getElementById("grid-view").style.display = "none";
                    document.getElementById("list-view").style.display = "none";
                    document.getElementById("tabular-view").style.display = "block";
                    document.getElementById("grid-view-btn").classList.remove('btn-info');
                    document.getElementById("list-view-btn").classList.remove('btn-info');
                    document.getElementById("tabular-view-btn").classList.add('btn-info');
                });
              </script>

          </div>
      </div>
    </section>

</div>
      </div>
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
<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
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
<script src="<?=base_url();?>assets/js/myjs.js"></script>

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