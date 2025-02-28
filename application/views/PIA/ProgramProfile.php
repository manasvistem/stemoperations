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
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4><?php $uid=$user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); $did[0]->dep_name;?></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
          <div class="col-sm col-md-4 col-lg-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="mt-3">
                      <h4><?=$program[0]->client_name?></h4>
                      <p class="text-secondary mb-1"><?=$pcode=$program[0]->projectcode?></p>
                      
                      <?php  
                      
                             $bdid = $program[0]->bd_id;
                             $bddata = $this->Menu_model->get_bdnamebyid($bdid);
                             $mdata= $this->Menu_model->get_Programbypcode($pcode);
                             $ptimeline= $this->Menu_model->get_programtimeline($pcode);
                             $cdate = date('Y-m-d H:i:s');
                      ?>
                      
                      <p class="text-muted font-size-sm"><?=$program[0]->mediator?></p>
                      <p class="text-muted font-size-sm"><?=$program[0]->noofschool?></p>
                      <p class="text-secondary mb-1"><?=$program[0]->location?></p>
                      <p class="text-muted font-size-sm"><?=$program[0]->city?></p>
                      <p class="text-muted font-size-sm"><?=$program[0]->state?></p>
                      
                      <hr>BD Involve<br><b><?=$bddata[0]->name?></b>
                      <hr>PIA Involve<br><b><?=$mdata[0]->pia?></b>
                      <hr>IMP Involve<br><b><?=$mdata[0]->imp?></b>
                      
                        <hr>
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">This Year Task</i></h6>
                        <?php foreach($programd1 as $pd1){?>
                        <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><?=$pd1->cont?> <?=$pd1->action?></a>
                        <?php } ?>
                        <hr>
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">This Year Sub Task</i></h6>
                        <?php foreach($programd2 as $pd2){?>
                        <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><?=$pd2->cont?> <?=$pd2->tt?> (<?=$pd2->stt?>)</a>
                        <?php } ?>
                    </div>
                  </div>
              </div>
              
              
              
                
            </div>
          </div>
          <div class="col-sm col-md-8 col-lg-8">
           <div class="row">   
              <div class="col-sm col-md-12 col-lg-12">
                  <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                         <p><b>Working State : <?=$pdetail[0]->state?><hr>
                         Working District : <?=$pdetail[0]->district?></b></p>
                     </div>
                 </div>
              </div>
             <div class="col-sm col-md-12 col-lg-6">
                 <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                         <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Total School</i><?=$pdetail[0]->spd?></h6>
                          <small>New School (<?=$pdetail[0]->news?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$pdetail[0]->news?>%" aria-valuenow="<?=$pdetail[0]->news?>" aria-valuemin="0" aria-valuemax="<?=$pdetail[0]->spd?>"></div>
                          </div>
                          <small>TTP Done (<?=$pdetail[0]->ttps?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$pdetail[0]->ttps?>%" aria-valuenow="<?=$pdetail[0]->ttps?>" aria-valuemin="0" aria-valuemax="<?=$pdetail[0]->spd?>"></div>
                          </div>
                          <small>Utilization Initiated (<?=$pdetail[0]->uis?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$pdetail[0]->uis?>%" aria-valuenow="<?=$pdetail[0]->uis?>" aria-valuemin="0" aria-valuemax="<?=$pdetail[0]->spd?>"></div>
                          </div>
                          <small>Average School (<?=$pdetail[0]->avs?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$pdetail[0]->avs?>%" aria-valuenow="<?=$pdetail[0]->avs?>" aria-valuemin="0" aria-valuemax="<?=$pdetail[0]->spd?>"></div>
                          </div>
                          <small>Good School (<?=$pdetail[0]->gos?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$pdetail[0]->gos?>%" aria-valuenow="<?=$pdetail[0]->gos?>" aria-valuemin="0" aria-valuemax="<?=$pdetail[0]->spd?>"></div>
                          </div>
                          <small>Model School (<?=$pdetail[0]->mos?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$pdetail[0]->mos?>%" aria-valuenow="<?=$pdetail[0]->mos?>" aria-valuemin="0" aria-valuemax="<?=$pdetail[0]->spd?>"></div>
                          </div>
                          <small>Inactive (<?=$pdetail[0]->ins?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$pdetail[0]->ins?>%" aria-valuenow="<?=$pdetail[0]->ins?>" aria-valuemin="0" aria-valuemax="<?=$pdetail[0]->spd?>"></div>
                          </div>
                          <small>Client Readiness (<?=$pdetail[0]->crs?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$pdetail[0]->crs?>%" aria-valuenow="<?=$pdetail[0]->crs?>" aria-valuemin="0" aria-valuemax="<?=$pdetail[0]->spd?>"></div>
                          </div>
                     </div>
                 </div>
             </div>
             
             <div class="col-sm col-md-12 col-lg-6">
                 <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                         <?php $spd = $this->Menu_model->get_spdbypc($pcode); foreach($spd as $spd){?>
                          <b><a target="_blank" href="<?=base_url();?>Menu/SchoolProfile/<?=$spd->id?>"><?=$spd->sname?> | <?=$spd->saddress?> | <?=$spd->scity?> | <?=$spd->sstate?></a></b><hr>
                          <?php } ?>
                     </div>
                  </div>  
             </div>
             
            </div> 
            
       </div>
              <!-- /.card-header -->
              
  </div>
  
                               
                <div class="card p-3 text-center">             
                <div class="row">            
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>WelCome Message</b><hr>
                     Targer Count<br><b><?=$pdetail[0]->spd*1?></b><hr>
                     Targer Date<br><b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>Outbond Communication</b><hr>
                     Targer Count<br><b><?=$tt=15?></b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'page52','Call'); $cont = $tdata[0]->cont;?>
                  <?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); $st = $date->format('Y-m-d');$tt=($pdetail[0]->spd*10);?>
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <a href="<?=base_url();?>Menu/PWTaskList/<?=$pid?>/page52/Call/<?=$tt?>">
                     <b>Calls for Activation</b><hr>
                     Targer Count<br><b><?=$tt?></b><hr>
                     Achieved Count<br><b><?=$cont?></b><hr>
                     <b><?=$st?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b></a>
                  </div>
                  
                  
                  <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'page5','Visit'); $cont = $tdata[0]->cont;?>
                  <?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); $st = $date->format('Y-m-d');?>
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>FTTP</b><hr>
                     Targer Count<br><b><?=$tt=($pdetail[0]->spd*1)?></b><hr>
                     Achieved Count<br><b><?=$cont?></b><hr>
                     <b><?=$st?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'page31','Visit'); $cont = $tdata[0]->cont;?>
                  <?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); $st = $date->format('Y-m-d');?>
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>RTTP</b><hr>
                     Targer Count<br><b><?=$tt=($pdetail[0]->spd*1)?></b><hr>
                     Achieved Count<br><b><?=$cont?></b><hr>
                     <b><?=$st?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>Report</b><hr>
                     Targer Count<br><b><?=$tt=($pdetail[0]->spd*$ptimeline[0]->reporttype)?></b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'page28','Visit'); $cont = $tdata[0]->cont;?>
                  <?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); $st = $date->format('Y-m-d');?>
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>DIY</b><hr>
                     Targer Count<br><b><?=$tt=($pdetail[0]->spd*1)?></b><hr>
                     Achieved Count<br><b><?=$cont?></b><hr>
                     <b><?=$st?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <?php $tdata = $this->Menu_model->get_pdtaskwise($pcode,'','Utilisation'); $cont = $tdata[0]->cont;?>
                  <?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); $st = $date->format('Y-m-d');?>
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>Utilisation</b><hr>
                     Targer Count<br><b><?=$tt=($pdetail[0]->spd*10)?></b><hr>
                     Achieved Count<br><b><?=$cont?></b><hr>
                     <b><?=$st?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>Maintenance</b><hr>
                     Targer Count<br><b><?=$tt=($pdetail[0]->spd*1)?></b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>Base Line M&E</b><hr>
                     Targer Count<br><b><?=$tt=($pdetail[0]->spd*1)?></b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>End Line M&E</b><hr>
                     Targer Count<br><b><?=$tt=($pdetail[0]->spd*1)?></b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>CaseStudy</b><hr>
                     Targer Count<br><b><?=$tt=($pdetail[0]->spd*1)?></b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>NSP</b><hr>
                     Targer Count<br><b><?=$tt=($pdetail[0]->spd*1)?></b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>RID</b><hr>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>BD Request</b><hr>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>PM Visit</b><hr>
                     Targer Count<br><b><?=$tt=(round(($pdetail[0]->spd*1)*.10))?></b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>ZM Visit</b><hr>
                     Targer Count<br><b><?=$tt=(round(($pdetail[0]->spd*1)*.10))?></b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>Review with BD</b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>Client Engagement</b><hr>
                     <b><?php $date = $ptimeline[0]->wmessage; $date = new DateTime($date); echo $st = $date->format('Y-m-d');?></b><hr>
                     <b><?=$this->Menu_model->timediff($st,$cdate)?></b>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>Holiday Activity</b><hr>
                  </div>
                  
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b>Webinar</b><hr>
                  </div>
                  
                </div>
            </div>



                               
                               
                               
                               
  
  
  
  
  
  
  
                            
  
                        <div class="table-responsive card p-5">
                                <h4><center>Pending Task</center></h4><hr>
                                    <table id="example3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>	
                                            <th>Assign By</th>	
                                            <th>Assign To</th>	
                                            <th>Assign Date</th>
                                            <th>Plan Date</th>
                                            <th>Assign to Plan TimeDiff</th>
                                            <th>Pending From TimeDiff</th>
                                            <th>Project Code</th>	
                                            <th>School Name</th>	
                                            <th>Task Type</th>	
                                            <th>Purpose</th>	
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $i=1;
                                      
                                           foreach($programd4 as $ttd){
                                           $fuser = $ttd->from_user;
                                           $fuser=$this->Menu_model->get_user_byid($fuser);
                                           $cdate=date('Y-m-d H:i:s');
                                           ?>
                                           
                                           <tr>
                                           <td><?=$i++?></td>
                                           <td><?=$fuser[0]->fullname?></td>
                                           <td><?=$ttd->fullname?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->sdatet));?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->plandate));?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->sdatet,$ttd->plandate)?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->plandate,$cdate)?></td>
                                           <td><?=$ttd->project_code?></td>
                                           <td><?=$ttd->sname?></td>
                                           <td><?=$ttd->task_type?></td>
                                           <td><?=$ttd->task_subtype?></td>
                                           <td><?=$ttd->name?></td>
                                           
                                           </tr>
                                       <?php } ?>
                                  </tbody>
                                </table>
  </div>
  
  <h3 class="card-title">Completed Task Logs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  
                  <button id="grid-view-btn" class="btn border">Grid View</button>
                  <button id="list-view-btn" class="btn border">Xls View</button>
                    <div class="container-fluid card p-5" id="data-container">
                        <div class="row text-center" id="grid-view">
                            <?php
                            $oldd = "";$newd="";
                            foreach($programd3 as $ttd){
                           $fuser = $ttd->from_user;
                           $fuser=$this->Menu_model->get_user_byid($fuser); if($oldd==''){$oldd = $gd->updateddate;} $newd = $gd->updateddate;?>
                            
                            
                                        <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                                        <div class="card p-3 border rounded border-success hover-div d-flex flex-column align-items-stretch h-100">
                                            <div class="custom-border-card">
                                            <span class="custom-border-text"><h5>Time Diff Between to Task : <?=$this->Menu_model->timediff($oldd, $newd);?></h5></span>
                                            <div class="card-body">
                                            
                                            Assign By<br><b><?=$gd->acname?></b><hr>
                                            Assign To<br><b><?=$gd->acname?></b><hr>
                                            Assign Date<br><b><?=$gd->acname?></b><hr>
                                            Plan Date<br><b><?=$gd->acname?></b><hr>
                                            Assign to Plan TimeDiff<br><b><?=$gd->acname?></b><hr>
                                            Assign to Plan TimeDiff<br><b><?=$gd->acname?></b><hr>
                                            Assign to Plan TimeDiff<br><b><?=$gd->acname?></b><hr>
                                            Assign to Plan TimeDiff<br><b><?=$gd->acname?></b><hr>
                                            Assign to Plan TimeDiff<br><b><?=$gd->acname?></b><hr>
                                            Assign to Plan TimeDiff<br><b><?=$gd->acname?></b><hr>
                                            Assign to Plan TimeDiff<br><b><?=$gd->acname?></b><hr>
                                            Plan to Initiated TimeDiff<br><b><?=$gd->acname?></b><hr>
                                            Completed Date<br><b><?=$gd->acname?></b><hr>
                                            Initiated to Completed TimeDiff<br><b><?=$gd->acname?></b><hr>
                                            Project Code<br><b><?=$gd->acname?></b><hr>	
                                            School Name<br><b><?=$gd->acname?></b><hr>	
                                            Task Type<br><b><?=$gd->acname?></b><hr>
                                            Purpose<br><b><?=$gd->acname?></b><hr>	
                                            Status<br><b><?=$gd->acname?></b><hr>
                                            Action Taken<br><b><?=$gd->acname?></b><hr>
                                            Purpose Achieved<br><b><?=$gd->acname?></b><hr>
                                            Remark<br><b><?=$gd->acname?></b><hr>             
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="rounded-circle bg-danger" style="position: absolute;
                                                bottom: -10px; left: 40%; transform: translateX(-50%); width: 20px; height: 20px;"></div>
                                            <div class="rounded-circle bg-danger" style="position: absolute;
                                                bottom: -10px; left: 60%; transform: translateX(-50%); width: 20px; height: 20px;"></div>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                                
                                
                            <?php $oldd = $gd->updateddate;} ?>
                        </div>
                        <div id="list-view" style="display: none;">
                            
                            <div class="table-responsive">
                            <div class="table-responsive">     
                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Action</th>
                                            <th>Before Status</th>
                                            <th>After Status</th>
                                            <th>Company Name</th>
                                            <th>Partner Type</th>
                                            <th>Task By</th>
                                            <th>Task Plan</th>
                                            <th>Task Initiated</th>
                                            <th>Time Diff</th>
                                            <th>Task Updated</th>
                                            <th>Time Diff</th>
                                            <th>Remark</th>
                                            <th>MOM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;
                            foreach ($gdata as $gd) {
                                ?>
                                
                                        <tr>
                                         <td><?=$i?></td>
                                         <td><b style="color:<?=$gd->aclr?>"><?=$gd->acname?></b></td>
                                         <td><b style="color:<?=$gd->bsclr?>"><?=$gd->bstatus?></b></td>
                                         <td><b style="color:<?=$gd->asclr?>"><?=$gd->astatus?></b></td>
                                         <td><a href="<?=base_url();?>Menu/CompanyDetails/<?=$gd->cid?>"><b style="color:<?=$gd->pclr?>"><?=$gd->compname?></b></a></td>
                                         <td><b style="color:<?=$gd->pclr?>"><?=$gd->pname?></b></td>
                                         <td><?=$gd->uname?></td>
                                         <td><?=$this->Menu_model->get_dformat($gd->appointmentdatetime)?></td>
                                         <td><?=$this->Menu_model->get_dformat($gd->initiateddt)?></td>
                                         <td><?=$this->Menu_model->timediff($gd->appointmentdatetime,$gd->initiateddt)?></td>
                                         <td><?=$this->Menu_model->get_dformat($gd->updateddate)?></td>
                                         <td><?=$this->Menu_model->timediff($gd->initiateddt,$gd->updateddate)?></td>
                                         <td><?=$gd->remarks?></td>
                                         <td><?=$gd->mom?></td>
                                     </tr>
                                     <?php $i++;} ?>
                                  </tbody>
                                </table>
                        </div>
                    </div>

                        <script>
                            document.getElementById("grid-view-btn").addEventListener("click", function () {
                                document.getElementById("grid-view").style.display = "block";
                                document.getElementById("list-view").style.display = "none";
                                document.getElementById("list-view-btn").classList.remove('btn-info');
                                document.getElementById("grid-view-btn").classList.add('btn-info');
                            });
                        
                            document.getElementById("list-view-btn").addEventListener("click", function () {
                                document.getElementById("grid-view").style.display = "none";
                                document.getElementById("list-view").style.display = "block";
                                document.getElementById("grid-view-btn").classList.remove('btn-info');
                                document.getElementById("list-view-btn").classList.add('btn-info');
                            });

                        </script>
                            </div>
                        </div>
 
                </fieldset>
            </div>
        </div>
    </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </div>
          <!-- /.col -->
  
  </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


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
    $("#example2").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    $("#example4").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
    $("#example5").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>