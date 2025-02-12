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
<?php require('addpop.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                  <h4><?php $uid= $user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); $did[0]->dep_name;?></h4> 
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <p class="text-primary m-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Dashboard Data Analysis
    
  </p>
<div class="collapse" id="collapseExample">
  <div class="m-1">
    
<!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
<?php 

    $action = 'Call';
    $calltask=$this->Menu_model->get_tdetailbyaction($uid,$action,$tdate);
    
    $action = 'Visit';
    $visittask=$this->Menu_model->get_tdetailbyaction($uid,$action,$tdate);
        
    $wgtdata=$this->Menu_model->get_wgtdata($uid);
    $allwgt = sizeof($wgtdata);
    
    $wgsdata=$this->Menu_model->get_wgsdata($uid);
    $allswgt = sizeof($wgsdata);
    
    $wgpdata=$this->Menu_model->get_wgpdata($uid);
    $allpwgt = sizeof($wgpdata);                             

?>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        
            <hr>
            <center><h5 class="text-info">Funnel Managment</h5></center>
            <hr>
            
            
            <div class="row">
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">Status Wise  SPD</h6></center><hr>
                <div id="piechart3d1" style="width: 100%;height: 300px; margin-left:-70px;margin-top:-50px"></div>
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
                  
                  <div class="text-center" style="margin-top:-150px; font-size:12px;">
                  <hr>
                  <?php
                  $status = $this->Menu_model->get_SPDbypistatusw($uid);
                  foreach ($status as $st) {?>
                  <a href="<?=base_url();?>Menu/SGraph1/<?=$st->stid?>/1"><b style="color:<?=$st->sclr?>;"><?=$st->name?> - <?=$st->cont?></b></a><br>
                  <?php } ?>
                  <a href="<?=base_url();?>Menu/SGraph1/4/1"><b>View All</b></a>
                  </div>
              </div>
              <a href="SMGraphs" class="small-box-footer bg-info"><b class="text-white">More Graphs <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            
            
            
            
            
            
           <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 class="text-info">City Wise SPD</h6></center><hr>
                <div id="chart_div41" style="width: 120px; height: 600px; margin-left:-70px;margin-top:-30px;"></div>
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
            height: 130,
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
                  
                  <div class="text-center" style="margin-top:-460px;">
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
            
            </div>
            
            
            <hr>
            <center><h6 style="color:#00756C;">Task Managment</h6></center>
            <hr>
            
            
            <hr>
            <center><h6 style="color:#0E4959;">Day Managment</h6></center>
            <hr>
            
            
            <hr>
            <center><h6 style="color:#8E2379;">Responsibility</h6></center>
            <hr>
            
            <div class="row">
            <div class="col-lg-3 col-6">
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h6 style="color:#8E2379;">Holiday Planner</h6></center><hr>
                <div id="piechart3d3" style="width: 100%;height: 300px; margin-left:-70px;margin-top:-50px"></div>
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
                          $status = $this->Menu_model->get_pig1($uid);
                          foreach ($status as $st) {
                            $statusName = $st->type."(" . $st->cont . ")";
                            echo "data.addRow(['$statusName', $st->cont, '$st->type', '$uid']);";
                          }
                          ?>
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
                              window.location.href = '<?=base_url();?>Menu/PIRGraph1/' + stid + '/' + code;
                            }
                          });
                          chart.draw(data, options);
                        }
                  </script>
                  
                  <div class="text-center" style="margin-top:-150px;font-size:12px;">
                  <hr>
                  
                  <?php
                  $status = $this->Menu_model->get_pig1($uid);
                  foreach ($status as $st) {?>
                  <b><?=$st->type?> - <?=$st->cont?></b><br>
                  <?php } ?>
                  <b><a href="<?=base_url();?>Menu/PIRGraph1/1/1">View All</a></b>
                  </div>
              </div>
              <a href="#" class="small-box-footer" style="background-color:#8E2379;"><b style="color:#FFFFFF;">More info <i class="fas fa-arrow-circle-right"></i></b></a>
            </div>
            </div>
            
            </div>
            
          
            
          
             
          
        <!-- /.row (main row) -->
        </div></div></div></div></div></div>
        
<div class="row m-1">
          <div class="col-lg-8 col-sm">
            <div class="card card-primary card-outline card-outline-tabs">
                <h4 class="p-3">Today's Planned Task</h4>
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                   <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">
                        All <span class="badge badge-success"><?php $dot=$this->Menu_model->get_plantask($uid,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                    
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-call-tab" data-toggle="pill" href="#custom-tabs-four-call" role="tab" aria-controls="custom-tabs-four-call" aria-selected="false">
                        Call <span class="badge badge-success"><?php $action = "Call"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-research-tab" data-toggle="pill" href="#custom-tabs-four-research" role="tab" aria-controls="custom-tabs-four-research" aria-selected="false">
                        Research <span class="badge badge-success"><?php $action = "Research"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-email-tab" data-toggle="pill" href="#custom-tabs-four-email" role="tab" aria-controls="custom-tabs-four-email" aria-selected="false">
                        Email <span class="badge badge-success"><?php $action = "Email"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-whatsapp-tab" data-toggle="pill" href="#custom-tabs-four-whatsapp" role="tab" aria-controls="custom-tabs-whatsapp" aria-selected="false">
                        Whatsapp<span class="badge badge-success"><?php $action = "Communication"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-visit-tab" data-toggle="pill" href="#custom-tabs-four-visit" role="tab" aria-controls="custom-tabs-four-visit" aria-selected="false">
                        Visit <span class="badge badge-success"><?php $action = "Visit"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-virtual-tab" data-toggle="pill" href="#custom-tabs-four-virtual" role="tab" aria-controls="custom-tabs-four-virtual" aria-selected="false">
                        Virtual <span class="badge badge-success"><?php $action = "Virtual"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-utilisation-tab" data-toggle="pill" href="#custom-tabs-four-utilisation" role="tab" aria-controls="custom-tabs-utilisation" aria-selected="false">
                        Utilisation<span class="badge badge-success"><?php $action = "Utilisation"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-CaseStudy-tab" data-toggle="pill" href="#custom-tabs-four-CaseStudy" role="tab" aria-controls="custom-tabs-CaseStudy" aria-selected="false">
                        CaseStudy<span class="badge badge-success"><?php $action = "CaseStudy"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-report-tab" data-toggle="pill" href="#custom-tabs-four-report" role="tab" aria-controls="custom-tabs-four-report" aria-selected="false">
                        Report <span class="badge badge-success"><?php $action = "Report"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-other-tab" data-toggle="pill" href="#custom-tabs-four-other" role="tab" aria-controls="custom-tabs-four-other" aria-selected="false">
                        School Identification <span class="badge badge-success"><?php $action = "Other"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-other-tab" data-toggle="pill" href="#custom-tabs-four-other" role="tab" aria-controls="custom-tabs-four-other" aria-selected="false">
                        Demo <span class="badge badge-success"><?php $action = "Other"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-other-tab" data-toggle="pill" href="#custom-tabs-four-other" role="tab" aria-controls="custom-tabs-four-other" aria-selected="false">
                        Inauguration <span class="badge badge-success"><?php $action = "Other"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-other-tab" data-toggle="pill" href="#custom-tabs-four-other" role="tab" aria-controls="custom-tabs-four-other" aria-selected="false">
                        School Visit <span class="badge badge-success"><?php $action = "Other"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-other-tab" data-toggle="pill" href="#custom-tabs-four-other" role="tab" aria-controls="custom-tabs-four-other" aria-selected="false">
                        Other <span class="badge badge-success"><?php $action = "Other"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                   </ul>
                
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <div class="card">
                            <div class="card-header bg-info" id="headingOne" data-toggle="collapse" data-target="#collapse0911" aria-expanded="true" aria-controls="collapse0911">
                                  <?php $ttbytime = $this->Menu_model->get_ttbytime($uid,$tdate,'09:00:00','11:00:00');
                                    $ted = $this->Menu_model->get_ttbytimed($uid,$tdate,'09:00:00','11:00:00');
                                  ?>
                                  <b>9:00 AM to 11:00 AM</b><br>
                                  Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) | Proposal(<?=$ted[0]->g?>) | Other(<?=$ted[0]->i?>)
                            </div>
                            <div id="collapse0911" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                  <?php 
                                  foreach($ttbytime as $tt){
                                  $taid = $tt->action;
                                  $time = $tt->sdatet;
                                  $time = date('h:i a', strtotime($time));
                              ?>
                                <div class="list-group-item list-group-item-action">
                                   <span class="mr-3 align-items-center">
                                      <i class="fa-solid fa-circle"></i>
                                   </span>
                                   <span class="flex"><?=$taid?> | 
                                       <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                       <small class="text-muted">Task Time:- <?=$time?></small>
                                    </span>
                                    <span class="p-3 <?=$tt->color?>"><?=$tt->name?></span>
                                    <span class="text-right"><i class="fa-solid fa-forward"></i></span>
                                </div>
                              <?php } ?>
                              </div>
                            </div>
                          </div>
                          
                         <div class="card">
                                <div class="card-header bg-light" id="headingTwo" data-toggle="collapse" data-target="#collapse1113" aria-expanded="false" aria-controls="collapse1113">
                                      <?php $ttbytime = $this->Menu_model->get_ttbytime($uid,$tdate,'11:00:00','13:00:00');
                                      $ted = $this->Menu_model->get_ttbytimed($uid,$tdate,'11:00:00','13:00:00');
                                      ?>
                                      <b>11:00 AM to 01:00 PM</b><br>
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) | Proposal(<?=$ted[0]->g?>) | Other(<?=$ted[0]->i?>)
                                </div>
                                <div id="collapse1113" class="collapse show"aria-labelledby="headingTwo" data-parent="#accordion">
                                  <div class="card-body">
                                   <?php 
                                      foreach($ttbytime as $tt){
                                      $taid = $tt->action;
                                      $taid=$this->Menu_model->get_action($taid);
                                      $time = $tt->sdatet;
                                      $time = date('h:i a', strtotime($time));
                                  ?>
                                    <div class="list-group-item list-group-item-action">
                                       <span class="mr-3 align-items-center">
                                          <i class="fa-solid fa-circle"></i>
                                       </span>
                                       <span class="flex"><?=$taid[0]->name?> | 
                                           <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                           <small class="text-muted">Task Time:- <?=$time?></small>
                                        </span>
                                        <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                        </span>
                                        <span class="text-right">
                                            <i class="fa-solid fa-forward"></i>
                                        </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div> 
                              <div class="card">
                                <div class="card-header bg-info" id="headingThree" data-toggle="collapse" data-target="#collapse1315" aria-expanded="false" aria-controls="collapse1315">
                                      <?php $ttbytime = $this->Menu_model->get_ttbytime($uid,$tdate,'13:00:00','15:00:00');
                                      $ted = $this->Menu_model->get_ttbytimed($uid,$tdate,'13:00:00','15:00:00');
                                      ?>
                                      <b>01:00 PM to 03:00 PM</b><br>
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) | Proposal(<?=$ted[0]->g?>) | Other(<?=$ted[0]->i?>)
                                </div>
                                <div id="collapse1315" class="collapse show"aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    <?php 
                                      foreach($ttbytime as $tt){
                                      $taid = $tt->action;
                                      $taid=$this->Menu_model->get_action($taid);
                                      $time = $tt->sdatet;
                                      $time = date('h:i a', strtotime($time));
                                  ?>
                                    <div class="list-group-item list-group-item-action">
                                       <span class="mr-3 align-items-center">
                                          <i class="fa-solid fa-circle"></i>
                                       </span>
                                       <span class="flex"><?=$taid[0]->name?> | 
                                           <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                           <small class="text-muted">Task Time:- <?=$time?></small>
                                        </span>
                                        <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                        </span>
                                        <span class="text-right">
                                            <i class="fa-solid fa-forward"></i>
                                        </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header bg-light" id="headingThree" data-toggle="collapse" data-target="#collapse1517" aria-expanded="false" aria-controls="collapse1517">
                                      <?php $ttbytime = $this->Menu_model->get_ttbytime($uid,$tdate,'15:00:00','17:00:00');
                                      $ted = $this->Menu_model->get_ttbytimed($uid,$tdate,'15:00:00','17:00:00');
                                      ?>
                                      <b>03:00 PM to 05:00 PM</b><br>
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) |  Proposal(<?=$ted[0]->g?>) | Other(<?=$ted[0]->i?>)
                                </div>
                                <div id="collapse1517" class="collapse show"aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    <?php 
                                      foreach($ttbytime as $tt){
                                      $taid = $tt->action;
                                      $taid=$this->Menu_model->get_action($taid);
                                      $time = $tt->sdatet;
                                      $time = date('h:i a', strtotime($time));
                                  ?>
                                    <div class="list-group-item list-group-item-action">
                                       <span class="mr-3 align-items-center">
                                          <i class="fa-solid fa-circle"></i>
                                       </span>
                                       <span class="flex"><?=$taid[0]->name?> | 
                                           <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                           <small class="text-muted">Task Time:- <?=$time?></small>
                                        </span>
                                        <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                        </span>
                                        <span class="text-right">
                                            <i class="fa-solid fa-forward"></i>
                                        </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="card">
                                <div class="card-header bg-info" id="headingThree" data-toggle="collapse" data-target="#collapse1719" aria-expanded="false" aria-controls="collapse1719">
                                      <?php $ttbytime = $this->Menu_model->get_ttbytime($uid,$tdate,'17:00:00','19:00:00');
                                      $ted = $this->Menu_model->get_ttbytimed($uid,$tdate,'17:00:00','19:00:00'); ?>
                                      <b>05:00 PM to 07:00 PM</b></br>
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) |  Proposal(<?=$ted[0]->g?>) | Other(<?=$ted[0]->i?>)
                                </div>
                                <div id="collapse1719" class="collapse show"aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    <?php 
                                      foreach($ttbytime as $tt){
                                      $taid = $tt->action;
                                      $taid=$this->Menu_model->get_action($taid);
                                      $time = $tt->sdatet;
                                      $time = date('h:i a', strtotime($time));
                                  ?>
                                    <div class="list-group-item list-group-item-action">
                                       <span class="mr-3 align-items-center">
                                          <i class="fa-solid fa-circle"></i>
                                       </span>
                                       <span class="flex"><?=$taid[0]->name?> | 
                                           <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                           <small class="text-muted">Task Time:- <?=$time?></small>
                                        </span>
                                        <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                        </span>
                                        <span class="text-right">
                                            <i class="fa-solid fa-forward"></i>
                                        </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="card">
                                <div class="card-header bg-light" id="headingThree" data-toggle="collapse" data-target="#collapse9121" aria-expanded="false" aria-controls="collapse9121">
                                      <?php $ttbytime = $this->Menu_model->get_ttbytime($uid,$tdate,'19:00:00','21:00:00'); 
                                      $ted = $this->Menu_model->get_ttbytimed($uid,$tdate,'19:00:00','21:00:00');
                                      ?>
                                      <b>19:00 PM to 21:00 PM</b><br>
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) |  Proposal(<?=$ted[0]->g?>) | Other(<?=$ted[0]->i?>)
                                </div>
                                <div id="collapse9121" class="collapse show"aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                   <?php 
                                      foreach($ttbytime as $tt){
                                      $taid = $tt->action;
                                      $taid=$this->Menu_model->get_action($taid);
                                      $time = $tt->sdatet;
                                      $time = date('h:i a', strtotime($time));
                                   ?>
                                    <div class="list-group-item list-group-item-action">
                                       <span class="mr-3 align-items-center">
                                          <i class="fa-solid fa-circle"></i>
                                       </span>
                                       <span class="flex"><?=$taid[0]->name?> | 
                                           <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                           <small class="text-muted">Task Time:- <?=$time?></small>
                                        </span>
                                        <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                        </span>
                                        <span class="text-right">
                                            <i class="fa-solid fa-forward"></i>
                                        </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                      
                      
                  </div>
                      
                  <div class="tab-pane fade" id="custom-tabs-four-call" role="tabpanel" aria-labelledby="custom-tabs-four-call-tab">
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Call');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $page = $tt->checklist;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <a href="callclist/<?=$page?>/<?=$tt->pid?>"><button value="<?=$tt->taskid?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button></a>
                      <?php $aai++;} ?>
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-four-research" role="tabpanel" aria-labelledby="custom-tabs-four-research-tab">
                      
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Research');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <button id="add_act<?=$aai?>" value="<?=$tt->taskid?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex">Research | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-four-email" role="tabpanel" aria-labelledby="custom-tabs-four-email-tab">
                      
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Email');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <button id="add_act<?=$aai?>" value="<?=$tt->taskid?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-four-whatsapp" role="tabpanel" aria-labelledby="custom-tabs-four-whatsapp-tab">
                      
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Communication');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <button id="add_act<?=$aai?>" value="<?=$tt->taskid?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                  </div>   
                      
                  <div class="tab-pane fade" id="custom-tabs-four-visit" role="tabpanel" aria-labelledby="custom-tabs-four-visit-tab">
                      
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Visit');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $page = $tt->checklist;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));?>
                        <div class="list-group-item list-group-item-action">
                            <a href="visitlist/<?=$page?>/<?=$tt->pid?>"><button value="<?=$tt->taskid?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button></a>
                      <?php $aai++;} ?>
                  </div>
                  
                  
                  
                  
                  <div class="tab-pane fade" id="custom-tabs-four-utilisation" role="tabpanel" aria-labelledby="custom-tabs-four-utilisation-tab">
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Utilisation');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <button id="add_act<?=$aai?>" value="<?=$tt->taskid?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-four-virtual" role="tabpanel" aria-labelledby="custom-tabs-four-utilisation-tab">
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Virtual');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <button id="add_act<?=$aai?>" value="<?=$tt->taskid?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                  </div>
                  
                  
                  
                  <div class="tab-pane fade" id="custom-tabs-four-CaseStudy" role="tabpanel" aria-labelledby="custom-tabs-four-CaseStudy-tab">
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'CaseStudy');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <button id="add_act<?=$aai?>" value="<?=$tt->taskid?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                  </div>
                  
                  
                  <div class="tab-pane fade" id="custom-tabs-four-report" role="tabpanel" aria-labelledby="custom-tabs-four-report-tab">
                      
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Report');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <button id="add_act<?=$aai?>" value="<?=$tt->taskid?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                      
                   </div>
                      
                   <div class="tab-pane fade" id="custom-tabs-four-other" role="tabpanel" aria-labelledby="custom-tabs-four-other-tab">
                      
                      
                  </div>
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
            
            
            <div class="card card-primary card-outline card-outline-tabs">
                <h4 class="p-3">Today's Completed Task</h4>
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                   <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">
                        All <span class="badge badge-success"><?php $dot=$this->Menu_model->get_plantasktd($uid,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                    
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-call-tab" data-toggle="pill" href="#custom-tabs-four-call" role="tab" aria-controls="custom-tabs-four-call" aria-selected="false">
                        Call <span class="badge badge-success"><?php $action = "Call"; $dot=$this->Menu_model->get_plantaskbyuatd($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-email-tab" data-toggle="pill" href="#custom-tabs-four-email" role="tab" aria-controls="custom-tabs-four-email" aria-selected="false">
                        Email <span class="badge badge-success"><?php $action = "Email"; $dot=$this->Menu_model->get_plantaskbyuatd($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  

                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-whatsapp-tab" data-toggle="pill" href="#custom-tabs-four-whatsapp" role="tab" aria-controls="custom-tabs-whatsapp" aria-selected="false">
                        Whatsapp<span class="badge badge-success"><?php $action = "Whatsapp"; $dot=$this->Menu_model->get_plantaskbyuatd($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-visit-tab" data-toggle="pill" href="#custom-tabs-four-visit" role="tab" aria-controls="custom-tabs-four-visit" aria-selected="false">
                        Visit <span class="badge badge-success"><?php $action = "Visit"; $dot=$this->Menu_model->get_plantaskbyuatd($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-utilisation-tab" data-toggle="pill" href="#custom-tabs-four-utilisation" role="tab" aria-controls="custom-tabs-utilisation" aria-selected="false">
                        Utilisation<span class="badge badge-success"><?php $action = "Utilisation"; $dot=$this->Menu_model->get_plantaskbyuatd($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-report-tab" data-toggle="pill" href="#custom-tabs-four-report" role="tab" aria-controls="custom-tabs-four-report" aria-selected="false">
                        Report <span class="badge badge-success"><?php $action = "Report"; $dot=$this->Menu_model->get_plantaskbyuatd($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-other-tab" data-toggle="pill" href="#custom-tabs-four-other" role="tab" aria-controls="custom-tabs-four-other" aria-selected="false">
                        Other <span class="badge badge-success"><?php $action = "Other"; $dot=$this->Menu_model->get_plantaskbyuatd($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                </ul>
                
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <div class="card">
                            <div class="card-header bg-info" id="headingOne" data-toggle="collapse" data-target="#collapse0911" aria-expanded="true" aria-controls="collapse0911">
                                  <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'09:00:00','11:00:00');
                                    $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'09:00:00','11:00:00');
                                  ?>
                                  <b>9:00 AM to 11:00 AM</b><br>
                                  Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->c?>) | Visit(<?=$ted[0]->d?>) | Utilisation(<?=$ted[0]->e?>) | Report(<?=$ted[0]->f?>) | Other(<?=$ted[0]->g?>)
                            </div>
                            <div id="collapse0911" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                  <?php
                                  foreach($ttbytime as $tt){
                                  $taid = $tt->action;
                                  $time = $tt->sdatet;
                                  $time = date('h:i a', strtotime($time));
                              ?>
                                <div class="list-group-item list-group-item-action">
                                   <span class="mr-3 align-items-center">
                                      <i class="fa-solid fa-circle"></i>
                                   </span>
                                   <span class="flex"><?=$taid?> | 
                                       <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                       <small class="text-muted">Task Time:- <?=$time?></small>
                                    </span>
                                    <span class="p-3 <?=$tt->color?>"><?=$tt->name?></span>
                                    <span class="text-right"><i class="fa-solid fa-forward"></i></span>
                                </div>
                              <?php } ?>
                              </div>
                            </div>
                          </div>
                          
                         <div class="card">
                                <div class="card-header bg-light" id="headingTwo" data-toggle="collapse" data-target="#collapse1113" aria-expanded="false" aria-controls="collapse1113">
                                      <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'11:00:00','13:00:00');
                                      $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'11:00:00','13:00:00');
                                      ?>
                                      <b>11:00 AM to 01:00 PM</b><br>
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->c?>) | Visit(<?=$ted[0]->d?>) | Utilisation(<?=$ted[0]->e?>) | Report(<?=$ted[0]->f?>) | Other(<?=$ted[0]->g?>)
                                </div>
                                <div id="collapse1113" class="collapse show"aria-labelledby="headingTwo" data-parent="#accordion">
                                  <div class="card-body">
                                   <?php 
                                      foreach($ttbytime as $tt){
                                      $taid = $tt->action;
                                      $taid=$this->Menu_model->get_action($taid);
                                      $time = $tt->sdatet;
                                      $time = date('h:i a', strtotime($time));
                                  ?>
                                    <div class="list-group-item list-group-item-action">
                                       <span class="mr-3 align-items-center">
                                          <i class="fa-solid fa-circle"></i>
                                       </span>
                                       <span class="flex"><?=$taid[0]->name?> | 
                                           <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                           <small class="text-muted">Task Time:- <?=$time?></small>
                                        </span>
                                        <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                        </span>
                                        <span class="text-right">
                                            <i class="fa-solid fa-forward"></i>
                                        </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div> 
                              <div class="card">
                                <div class="card-header bg-info" id="headingThree" data-toggle="collapse" data-target="#collapse1315" aria-expanded="false" aria-controls="collapse1315">
                                      <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'13:00:00','15:00:00');
                                      $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'13:00:00','15:00:00');
                                      ?>
                                      <b>01:00 PM to 03:00 PM</b><br>
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->c?>) | Visit(<?=$ted[0]->d?>) | Utilisation(<?=$ted[0]->e?>) | Report(<?=$ted[0]->f?>) | Other(<?=$ted[0]->g?>)
                                </div>
                                <div id="collapse1315" class="collapse show"aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    <?php 
                                      foreach($ttbytime as $tt){
                                      $taid = $tt->action;
                                      $taid=$this->Menu_model->get_action($taid);
                                      $time = $tt->sdatet;
                                      $time = date('h:i a', strtotime($time));
                                  ?>
                                    <div class="list-group-item list-group-item-action">
                                       <span class="mr-3 align-items-center">
                                          <i class="fa-solid fa-circle"></i>
                                       </span>
                                       <span class="flex"><?=$taid[0]->name?> | 
                                           <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                           <small class="text-muted">Task Time:- <?=$time?></small>
                                        </span>
                                        <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                        </span>
                                        <span class="text-right">
                                            <i class="fa-solid fa-forward"></i>
                                        </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header bg-light" id="headingThree" data-toggle="collapse" data-target="#collapse1517" aria-expanded="false" aria-controls="collapse1517">
                                      <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'15:00:00','17:00:00');
                                      $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'15:00:00','17:00:00');
                                      ?>
                                      <b>03:00 PM to 05:00 PM</b><br>
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->c?>) | Visit(<?=$ted[0]->d?>) | Utilisation(<?=$ted[0]->e?>) | Report(<?=$ted[0]->f?>) | Other(<?=$ted[0]->g?>)
                                </div>
                                <div id="collapse1517" class="collapse show"aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    <?php 
                                      foreach($ttbytime as $tt){
                                      $taid = $tt->action;
                                      $taid=$this->Menu_model->get_action($taid);
                                      $time = $tt->sdatet;
                                      $time = date('h:i a', strtotime($time));
                                  ?>
                                    <div class="list-group-item list-group-item-action">
                                       <span class="mr-3 align-items-center">
                                          <i class="fa-solid fa-circle"></i>
                                       </span>
                                       <span class="flex"><?=$taid[0]->name?> | 
                                           <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                           <small class="text-muted">Task Time:- <?=$time?></small>
                                        </span>
                                        <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                        </span>
                                        <span class="text-right">
                                            <i class="fa-solid fa-forward"></i>
                                        </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="card">
                                <div class="card-header bg-info" id="headingThree" data-toggle="collapse" data-target="#collapse1719" aria-expanded="false" aria-controls="collapse1719">
                                      <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'17:00:00','19:00:00');
                                      $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'17:00:00','19:00:00'); ?>
                                      <b>05:00 PM to 07:00 PM</b></br>
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->c?>) | Visit(<?=$ted[0]->d?>) | Utilisation(<?=$ted[0]->e?>) | Report(<?=$ted[0]->f?>) | Other(<?=$ted[0]->g?>)
                                </div>
                                <div id="collapse1719" class="collapse show"aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    <?php 
                                      foreach($ttbytime as $tt){
                                      $taid = $tt->action;
                                      $taid=$this->Menu_model->get_action($taid);
                                      $time = $tt->sdatet;
                                      $time = date('h:i a', strtotime($time));
                                  ?>
                                    <div class="list-group-item list-group-item-action">
                                       <span class="mr-3 align-items-center">
                                          <i class="fa-solid fa-circle"></i>
                                       </span>
                                       <span class="flex"><?=$taid[0]->name?> | 
                                           <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                           <small class="text-muted">Task Time:- <?=$time?></small>
                                        </span>
                                        <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                        </span>
                                        <span class="text-right">
                                            <i class="fa-solid fa-forward"></i>
                                        </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="card">
                                <div class="card-header bg-light" id="headingThree" data-toggle="collapse" data-target="#collapse9121" aria-expanded="false" aria-controls="collapse9121">
                                      <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'19:00:00','21:00:00'); 
                                      $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'19:00:00','21:00:00');
                                      ?>
                                      <b>19:00 PM to 21:00 PM</b><br>
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->c?>) | Visit(<?=$ted[0]->d?>) | Utilisation(<?=$ted[0]->e?>) | Report(<?=$ted[0]->f?>) | Other(<?=$ted[0]->g?>)
                                </div>
                                <div id="collapse9121" class="collapse show"aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                   <?php 
                                      foreach($ttbytime as $tt){
                                      $taid = $tt->action;
                                      $taid=$this->Menu_model->get_action($taid);
                                      $time = $tt->sdatet;
                                      $time = date('h:i a', strtotime($time));
                                   ?>
                                    <div class="list-group-item list-group-item-action">
                                       <span class="mr-3 align-items-center">
                                          <i class="fa-solid fa-circle"></i>
                                       </span>
                                       <span class="flex"><?=$taid[0]->name?> | 
                                           <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                           <small class="text-muted">Task Time:- <?=$time?></small>
                                        </span>
                                        <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                        </span>
                                        <span class="text-right">
                                            <i class="fa-solid fa-forward"></i>
                                        </span>
                                    </div>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                      
                      
                  </div>
                      
                  <div class="tab-pane fade" id="custom-tabs-four-call" role="tabpanel" aria-labelledby="custom-tabs-four-call-tab">
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Call');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <button id="comp_task<?=$aai?>" value="<?=$tt->id?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                            <input type="hidden" value="<?=$tt->id?>" id="tid">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-email" role="tabpanel" aria-labelledby="custom-tabs-four-email-tab">
                      
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Email');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <button id="comp_task<?=$aai?>" value="<?=$tt->id?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                            <input type="hidden" value="<?=$tt->id?>" id="tid">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                      
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-whatsapp" role="tabpanel" aria-labelledby="custom-tabs-four-whatsapp-tab">
                      
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Whatsapp');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
                        <div class="list-group-item list-group-item-action">
                            <button id="comp_task<?=$aai?>" value="<?=$tt->id?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                            <input type="hidden" value="<?=$tt->id?>" id="tid">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                     
                  </div>    
                      
                  <div class="tab-pane fade" id="custom-tabs-four-visit" role="tabpanel" aria-labelledby="custom-tabs-four-visit-tab">
                      
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Visit');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));?>
                        <div class="list-group-item list-group-item-action">
                            <button id="comp_task<?=$aai?>" value="<?=$tt->id?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                            <input type="hidden" value="<?=$tt->id?>" id="tid">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-four-utilisation" role="tabpanel" aria-labelledby="custom-tabs-four-utilisation-tab">
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Utilisation');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                        <div class="list-group-item list-group-item-action">
                            <button id="comp_task<?=$aai?>" value="<?=$tt->id?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                            <input type="hidden" value="<?=$tt->id?>" id="tid">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex"><?=$taid[0]->name?> | 
                               <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                               <small class="text-muted">Task Time:- <?=$time?></small>
                            </span>
                            <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                  </div>
                  
                   <div class="tab-pane fade" id="custom-tabs-four-report" role="tabpanel" aria-labelledby="custom-tabs-four-report-tab">
                      
                   </div>
                      
                   <div class="tab-pane fade" id="custom-tabs-four-other" role="tabpanel" aria-labelledby="custom-tabs-four-other-tab">
                      
                      
                  </div>
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
            
            </div>
            
            
            <div class="col-lg-4 col-sm">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header text-center bg-info"><b>Pending Task to be Schedule</b></div>
              <div class="card-header text-center bg-light"><b>
              <div class="card-body">
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                        <ul id="myUL">
                            <?php $ai=0;
                                $totalt=$this->Menu_model->get_pendingt($uid);
                                foreach($totalt as $d){
                                $id = $d->from_user;
                                $lstttid = $d->lstttid;
                                $user=$this->Menu_model->get_user_byid($id);
                                $sid = $d->spd_id;
                                $spd=$this->Menu_model->get_spdbyid($sid);
                                $snme=$spd[0]->sname;
                                $address=$spd[0]->saddress;
                                $city=$spd[0]->scity;
                                $state=$spd[0]->sstate;
                                $ps=$spd[0]->project_code;
                            ?>
                          <li class="mt-2"><a><strong class="text-secondary"><?=$d->task_type?>(<?=$d->task_subtype?>) | 
                          <?=$ps?> | <?=$snme?> | <?=$address?>,<?=$city?>,<?=$state?>| <?=$d->remark?> | task assign by <?=$user[0]->fullname?>
                          <hr>
                          <?php if($lstttid==''){?>
                          <button id="add_plan<?=$ai?>" value="<?=$d->id?>">Plan</button>
                          <?php }else{ echo '<b class="text-danger">Provisions Task Pending<b>';} ?>
                          </strong></a></li>
                            <?php $ai++;} ?>
                        </ul>
                  </div>
                </div>
            
            
          
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
              </div>
            </div>
            <!-- /.card -->
            
          </div>
        </div>
</div>
 </div>

<div id="doaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-standard-title1"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- // END .modal-header -->
            <div class="modal-body">
                <div class="card card-form col-md-12">
                   <div class="card-header bg-info">Create Plan</div>
                   <h6 class="text-center mt-1" id="cmpname"></h6>
                    <div class="col-lg-12 card-body">
                        <?php $today = date('Y-m-d H:i:s'); ?>
                       <?=form_open('Menu/setaction')?>
                       <input type="hidden" id="taskid" name="taskid">
                       <input type="hidden" value="<?=$uid?>" name="uid">
                       <lable>Select Date Time</lable>
                       <input type="datetime-local" name="date" class="form-control p-3 mt-2 mb-2" placeholder="Date" value="<?=$today?>">
                       <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                       </form>
                    </div>
                    </div>
                        </div>
                    </div>
            </div>
</div></div></div>
<script type="text/javascript">

$(document).ready(function(){

$('[id^="add_plan"]').on('click', function() {
    $('#doaction').modal('show');
    var tid = this.value;
    document.getElementById("taskid").value = tid;
    $.ajax({
         url:'<?=base_url();?>Menu/cctd',
         method: 'post',
         data: {tid: tid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           $('#cname').text('');
           if(len > 0){
             // Read values
             var cname = response[0].cname;
             document.getElementById("cmpname").innerHTML = cname;
           }
         }
       });
});
</script>
</div>
 </div>
        </div>
</div>


            

        </div>
</div>
        
    <style>

#myInput {
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 9px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>           
<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>             
            
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    </div></div></div>
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

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

<script>
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWi$dth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appen$dto('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>
