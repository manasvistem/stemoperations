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
              <center><h5 class="text-info">All Funnel Graph</h5></center><hr>
        </div>
      <div class="row">
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  </div>
              </div>
              <a href="<?=base_url();?>Menu/SGraph1/4/1" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">City Wise SPD</h6></center><hr>
                <div id="chart_div41" style="width: 100%; height: 600px;"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  
  <script type="text/javascript">
    google.charts.load("current", { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawChart41);
        function drawChart41() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'All Action');
          data.addColumn('number', 'Call');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn('number', 'Email');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn('number', 'Message');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn('number', 'Visit');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn('number', 'Whatsapp');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn('number', 'Report');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn('number', 'Utilisation');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn('number', 'Review');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn('number', 'Approval');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn('number', 'Other');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn('number', 'Research');
          data.addColumn({type: 'string', role: 'annotation'});
          data.addColumn({type: 'string', role: 'annotationText'});
        
          <?php
            $currentDate = new DateTime();
            $financialYear = ($currentDate->format('m') >= 4) ? $currentDate->format('Y') : ($currentDate->format('Y') - 1);
            for ($month = 4; $month <= 12; $month++) {
            $monthName = DateTime::createFromFormat('!m', $month)->format('F');
            $swtc = $this->Menu_model->get_apiabyym($uid,$month,$financialYear);
            foreach($swtc as $sw){ $url="https://stemoppapp.in/Menu"; ?>
              data.addRow(['<?=$monthName?> (<?=$sw->cont?>)',
              <?=$sw->a?>, '<?php if($sw->a == 0){echo "";}else{ echo $sw->a;}?>',
              <?=$sw->b?>, '<?php if($sw->b == 0){echo "";}else{ echo $sw->b;}?>',
              <?=$sw->c?>, '<?php if($sw->c == 0){echo "";}else{ echo $sw->c;}?>',
              <?=$sw->d?>, '<?php if($sw->d == 0){echo "";}else{ echo $sw->d;}?>',
              <?=$sw->e?>, '<?php if($sw->e == 0){echo "";}else{ echo $sw->e;}?>',
              <?=$sw->f?>, '<?php if($sw->f == 0){echo "";}else{ echo $sw->f;}?>',
              <?=$sw->g?>, '<?php if($sw->g == 0){echo "";}else{ echo $sw->g;}?>',
              <?=$sw->h?>, '<?php if($sw->h == 0){echo "";}else{ echo $sw->h;}?>',
              <?=$sw->i?>, '<?php if($sw->i == 0){echo "";}else{ echo $sw->i;}?>',
              <?=$sw->j?>, '<?php if($sw->j == 0){echo "";}else{ echo $sw->j;}?>',
              <?=$sw->k?>, '<?php if($sw->k == 0){echo "";}else{ echo $sw->k;}?>','<?=$url?>']);
              <?php }}?>
          var options_fullStacked = {
            legend: 'none',
            backgroundColor: 'transparent',
            isStacked: 'percent',
            height: 200,
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
        
          chart.draw(data, options_fullStacked);
        }
    
    
  </script>
                  
                  <div class="text-center" style="margin-top:-440px;">
                  <hr>
                  <?php
                    $lt =1;
                    $currentDate = new DateTime();
                    $financialYear = ($currentDate->format('m') >= 4) ? $currentDate->format('Y') : ($currentDate->format('Y') - 1);
                    for ($month = 4; $month <= 12; $month++) {
                    $monthName = DateTime::createFromFormat('!m', $month)->format('F');
                    $swtc = $this->Menu_model->get_apiabyym($uid,$month,$financialYear);
                    foreach($swtc as $sw){ if($lt<6){?>
                  <a href="<?=base_url();?>Menu/SGraph1/1/1"><b style="color:; font-size:12px"><?=$monthName?> - <?=$sw->cont?></b></a><br>
                  <?php $lt++;}}} ?>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-top:-70px;"></div>
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
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>; font-size:12px"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b style="font-size:12px;">View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b style="font-size:12px;" class="text-white">View Graph Detail <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </div>
      
      
      
      
      
      
      
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