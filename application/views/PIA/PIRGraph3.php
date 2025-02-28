<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STEM Operation | WebAPP</title>

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
              <center><h5>State wise Holidays No of School</h5></center><hr>	
              
              
<div class="row">
<div id="chart_div41" style="width: 100%; height: 600px;"></div>
</div>
        
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawChart41);
        function drawChart41() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'All Action');
          data.addColumn('number', 'Total No of Days');
          <?php $swtc = $this->Menu_model->get_pig3($uid);
            foreach($swtc as $sw){?>
          data.addRow(['<?=$sw->state?>',<?=$sw->cont?>]);
          <?php } ?>
          var options_fullStacked = {
            isStacked: 'percent',
            height: 600,
            legend: {position: 'top', maxLines: 3},
            vAxis: {
              minValue: 0,
              ticks: [0, 0.3, 0.6, 0.9, 1]
            },
            annotations: {
              alwaysOutside: false,
              textStyle: {
                fontSize: 10,
              },
            },
          };
        
          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div41'));
          google.visualization.events.addListener(chart, 'select', function() {
            var selection = chart.getSelection();
            if (selection.length > 0) {
              var rowIndex = selection[0].row;
              var hyperlink = data.getValue(rowIndex, 23);
              if (hyperlink) {
                window.location.href = hyperlink;
              }
            }
          });
        
          chart.draw(data, {});
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
                         $mdata = $this->Menu_model->get_pigg1($uid);
                         foreach($mdata as $dt){?>          
                        <div class="col-sm-12 col-md-4 col-lg-4 mb-4 filter-item">
                          <div class="card p-3 border rounded border-success hover-div d-flex flex-column align-items-stretch h-100 text-dark">
                                 Start Date<br><b><?=$dt->fdate?></b><hr>
                                 End Date<br><b><?=$dt->todate?></b><hr>
                                 Type<br><b><?=$dt->type?></b><hr>
                                 State<br><b><?=$dt->state?></b><hr>
                                 Remark<br><b><?=$dt->remark?></b><hr>
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
                						<th>Start Date</th>
                						<th>End Date</th>
                						<th>Type</th>
                						<th>State</th>
                						<th>Remark</th>
                                    </tr>
                				</thead>
                				<tbody>
                				    
                				    <?php 
                				     $i=1;
                                     $mdata = $this->Menu_model->get_pigg1($uid);
                                     foreach($mdata as $dt){?>
                                    
                                    <tr>
                                         <td><?=$i++?></td>
                                         <td><?=$dt->fdate?></td>
                                         <td><?=$dt->todate?></td>
                                         <td><?=$dt->type?></td>
                                         <td><?=$dt->state?></td>
                                         <td><?=$dt->remark?></td>
                                    </tr>
                                    <?php } ?>
                				</tbody>
                    		</table> 
                    	</div>
                    	
                   <div id="tabular-view" style="display: none;">
                        <div class="card p-3 col-lg-4 col-sm m-auto bg-light">
                          <?php
                          $status = $this->Menu_model->get_pig1($uid);
                          foreach ($status as $st) {?>
                          <b><a href="<?=base_url();?>Menu/SGraph1//"><?=$st->type?> - <?=$st->cont?></a></b><hr>
                          <?php } ?>
                          <b><a href="<?=base_url();?>Menu/SGraph1/<?=$code?>">View All</a></b>
                    </div>
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
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/js/adminlte.js"></script>

<!-- jquery-validation -->
<script src="<?=base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?=base_url();?>assets/js/additional-methods.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

<script>
$(function() {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
});
</script>
</body>
</html>