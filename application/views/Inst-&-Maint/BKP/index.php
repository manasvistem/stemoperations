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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            
<?php $task=$this->Menu_model->get_taskassign_byuid($uid);
    $alltask = sizeof($task);
    $Call=0;
    $Ins=0;
    $PCall=0;
    $PDCall=0;
    $PIns=0;
    $PDIns=0;
    $Mai=0;
    $PMai=0;
    $PDMai=0;
    foreach($task as $task){
        if($task->task_type=='Call'){$Call++;}
        if($task->task_type=='Installation'){$Ins++;}
        if($task->task_type=='Maintenance'){$Mai++;}
        $tid=$task->id;
        $ptask=$this->Menu_model->get_plantaskbytid($tid);
        if($ptask){
            if($task->task_type=='Call'){$PCall++;}
            if($task->task_type=='Call' && $ptask[0]->tdone=='1'){$PDCall++;}
            if($task->task_type=='Installation'){$PIns++;}
            if($task->task_type=='Installation' && $ptask[0]->tdone=='1')
            {$PDIns++;}
            if($task->task_type=='Maintenance'){$PMai++;}
            if($task->task_type=='Maintenance' && $ptask[0]->tdone=='1')
            {$PDMai++;}
        }
    }
    
    $re=0;
    $red=0;
    
    $rep=$this->Menu_model->get_repairreq();
    foreach($rep as $rep){
        if($rep->status=='Open'){$re++;}
        if($rep->status=='Close'){$red++;}
    }
    $repl=$this->Menu_model->get_replacereq();
    $allrepl = sizeof($repl);
            
?>
            
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Installation</h3>
                <p>Done - <b><?=$PDIns?></b></p>
                <p>Assigned - <b><?=$Ins?></b></p>
                <p>Planed - <b><?=$PIns?></b></p>
                <p>To Be Planed - <b><?=$Ins-$PIns?></b></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Maintenance</h3>
                <p>Done - <b><?=$PDMai?></b></p>
                <p>Assigned - <b><?=$Mai?></b></p>
                <p>Planed - <b><?=$PMai?></b></p>
                <p>To Be Planed - <b><?=$Mai-$PMai?></b></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Call</h3>
                <p>Done - <b><?=$PDCall?></b></p>
                <p>Assigned - <b><?=$Call?></b></p>
                <p>Planed - <b><?=$PCall?></b></p>
                <p>To Be Planed - <b><?php echo $Call-$PCall;?></b></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Replacement</h3>
                <p>Done - <b><?=$allrepl?></b></p>
                <p>Pending - <b><?=$allrepl?></b></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Repair</h3>
                <p>Request - <b><?=$re?></b></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Repaired</h3>
                <p>Done - <b><?=$red?></b></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>School</h3>
                <p>Total Assign</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
        
    
            
          </div>
        <!-- /.row (main row) -->
        </div></div></div></div></div>
            
            
   
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
                    <a class="nav-link" id="custom-tabs-four-email-tab" data-toggle="pill" href="#custom-tabs-four-email" role="tab" aria-controls="custom-tabs-four-email" aria-selected="false">
                        Email <span class="badge badge-success"><?php $action = "Email"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-whatsapp-tab" data-toggle="pill" href="#custom-tabs-four-whatsapp" role="tab" aria-controls="custom-tabs-whatsapp" aria-selected="false">
                        Whatsapp<span class="badge badge-success"><?php $action = "Whatsapp"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-visit-tab" data-toggle="pill" href="#custom-tabs-four-visit" role="tab" aria-controls="custom-tabs-four-visit" aria-selected="false">
                        Visit <span class="badge badge-success"><?php $action = "Visit"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-utilisation-tab" data-toggle="pill" href="#custom-tabs-four-utilisation" role="tab" aria-controls="custom-tabs-utilisation" aria-selected="false">
                        Utilisation<span class="badge badge-success"><?php $action = "Utilisation"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-report-tab" data-toggle="pill" href="#custom-tabs-four-report" role="tab" aria-controls="custom-tabs-four-report" aria-selected="false">
                        Report <span class="badge badge-success"><?php $action = "Report"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
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
                                  Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) | Proposal(<?=$ted[0]->g?>)
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
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) | Proposal(<?=$ted[0]->g?>)
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
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) | Proposal(<?=$ted[0]->g?>)
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
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) |  Proposal(<?=$ted[0]->g?>)
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
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) |  Proposal(<?=$ted[0]->g?>)
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
                                      Total Task <?=$ted[0]->ab?> | Call(<?=$ted[0]->a?>) | Email(<?=$ted[0]->b?>) | Whatsapp(<?=$ted[0]->e?>) | Meeting(<?=$ted[0]->c+$ted[0]->d?>) |  Proposal(<?=$ted[0]->g?>)
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
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Whatsapp');
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
                          $time = date('h:i a', strtotime($time));
                      ?>
                        
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
                            $user=$this->Menu_model->get_user_byid($id);
                            $sid = $d->spd_id;
                            $spd=$this->Menu_model->get_spdbyid($sid);
                            $snme=$spd[0]->sname;
                            $ps=$spd[0]->project_code;
                            ?>
                          <li><a><strong class="text-secondary"><?=$d->task_type?> (<?=$d->task_subtype?>) | 
                          <?=$ps?> | <?=$snme?> | <?=$d->remark?> | 
                          task assign by <?=$user[0]->fullname?>
                          <button id="add_plan<?=$ai?>" value="<?=$d->id?>">Plan</button>
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
