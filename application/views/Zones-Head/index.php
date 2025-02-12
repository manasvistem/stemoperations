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
                  <h4>HI!  <?=$user['fullname']?> ( <?php $uid= $user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4> 
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
        <div class="row m-1">
            
            
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light text-secondary">
              <div class="inner">
                  <?php $day = $this->Menu_model->get_daydbyad($tdate); ?>
                <center><h5>Team Detail</h5></center><hr>
                <p><a href="TeamDayDetail/<?=$tdate?>/1">Total Present - <b><?=$day[0]->b?></b></p></a><hr>
                <p><a href="TeamDayDetail/<?=$tdate?>/2">Total Work in Office - <b><?=$day[0]->c?></b></p></a><hr>
                <p><a href="TeamDayDetail/<?=$tdate?>/3">Total Work in Field - <b><?=$day[0]->d?></b></a></p><hr>
                <p><a href="TeamDayDetail/<?=$tdate?>/4">Total Work From Field+Office - <b><?=$day[0]->e?></b></a></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="TDayDetail/<?=$tdate?>/<?=$tdate?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h5>Today's Task Detail</h5></center><hr>
                <?php $ttd=$this->Menu_model->get_tdetailbyad($tdate);
                      foreach($ttd as $ttd){?>
                    <p><a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/1">Pending Task to be Schedule - <b><?=$ttd->ab?></b></p></a><hr>
                    <p><a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/2">Total Task Assign/Planned - <b><?=$ttd->ac?></b></p></a><hr>
                    <p><a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/3">Total Task Pending - <b><?=$ttd->ad?></b></p></a><hr>
                    <p><a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/4">Total Task Completed - <b><?=$ttd->ae?></b></p></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/5"><p>Call Assign/Planned- <b><?=$ttd->a?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/6"><p>Call Pending- <b><?=$ttd->b?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/7"><p>Call Completed- <b><?=$ttd->c?></b></a>
                    <a style="font-size:10px;color:red;margin-left:20px" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">Read More</a></p><hr>
                    <div class="collapse" id="collapse2">
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/8"><p>Email Assign/Planned- <b><?=$ttd->d?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/9"><p>Email Pending- <b><?=$ttd->e?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/10"><p>Email Completed- <b><?=$ttd->f?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/11"><p>Whatsapp Assign/Planned- <b><?=$ttd->g?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/12"><p>Whatsapp Pending- <b><?=$ttd->h?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/13"><p>Whatsapp Completed- <b><?=$ttd->i?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/14"><p>FTTP Assign/Planned- <b><?=$ttd->j?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/15"><p>FTTP Pending- <b><?=$ttd->k?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/16"><p>FTTP Completed- <b><?=$ttd->l?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/17"><p>RTTP Assign/Planned- <b><?=$ttd->m?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/18"><p>RTTP Pending- <b><?=$ttd->n?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/19"><p>RTTP Completed- <b><?=$ttd->o?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/20"><p>M&E Assign/Planned- <b><?=$ttd->p?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/21"><p>M&E Pending- <b><?=$ttd->q?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/22"><p>M&E Completed- <b><?=$ttd->r?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/23"><p>DIY Assign/Planned- <b><?=$ttd->s?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/24"><p>DIY Pending- <b><?=$ttd->t?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/25"><p>DIY Completed- <b><?=$ttd->u?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/26"><p>Utilisation Assign/Planned- <b><?=$ttd->v?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/27"><p>Utilisation Pending- <b><?=$ttd->w?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/28"><p>Utilisation Completed- <b><?=$ttd->x?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/29"><p>Report Assign/Planned- <b><?=$ttd->y?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/30"><p>Report Pending- <b><?=$ttd->z?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/31"><p>Report Completed- <b><?=$ttd->za?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/32"><p>Other Assign/Planned- <b><?=$ttd->zb?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/33"><p>Other Pending- <b><?=$ttd->zc?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/34"><p>Other Completed- <b><?=$ttd->zd?></b></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/35"><p>Action Taken Yes- <b><?=$ttd->ze?></b></p></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/36"><p>Action Taken No- <b><?=$ttd->zf?></b></p></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/37"><p>Purpose Achieved Yes- <b><?=$ttd->zg?></b></p></a><hr>
                    <a href="<?=base_url();?>/Menu/DTDetail/<?=$uid?>/<?=$tdate?>/<?=$tdate?>/38"><p>Purpose Achieved No- <b><?=$ttd->zh?></b></p></a>
                    <?php }?>
              </div></div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="TDetail/<?=$uid?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                    <center><h5>School Conversion</h5></center><hr>
                    <p><a href="#">New to FTTP Done - <b></b></p></a><hr>
                    <p><a href="#">FTTP Done to Active - <b></b></p></a><hr>
                    <p><a href="#">Inactive to Active - <b></b></p></a><hr>
                    <p><a href="#">Active to Average - <b></b></p></a><hr>
                    <p><a href="#">Average to Good - <b></b></p></a><hr>
                    <a href="#"><p>Good to Model - <b></b></a><hr>
                    <a href="#"><p>Model to Client Readiness - <b></b></a><hr>
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
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h5>Project Conversion</h5></center><hr>
                <p><a href="#">Project to Program Activation - <b></b></p></a><hr>
                <p><a href="#">Activation to Active Program - <b></b></p></a><hr>
                <p><a href="#">Active to Average Program - <b></b></p></a><hr>
                <p><a href="#">Average to Good Program - <b></b></p></a><hr>
                <p><a href="#">Good to Model Program - <b></b></p></a><hr>
                <p><a href="#">Model to Client Readiness - <b></b></p></a><hr>
                <a href="#"><p>- <b></b></a><hr>
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
            <div class="small-box bg-light text-secondary"> 
              <div class="inner">
                <center><h5>School Detail</h5></center><hr>
                <?php foreach($zhspd as $st){?>
                <p>Installed Pending - <b><?=$st->ab;?></b></a><hr>
                 <p><a href="zhschool/<?=$uid?>/0">Total School - <b><?=$st->a;?></b></p></a><hr>
                 <p><a href="zhschool/<?=$uid?>/1">New School - <b><?=$st->b;?></b></p></a><hr>
                 <p><a href="zhschool/<?=$uid?>/2">FTTP Done - <b><?=$st->c;?></b></p></a><hr>
                 <p><a href="zhschool/<?=$uid?>/3">Utilization Initiated School - <b><?=$st->d;?></b></p></a><hr>
                 <p><a href="zhschool/<?=$uid?>/7">Inactive School - <b><?=$st->h;?></b></p></a><hr>
                 <p><a href="zhschool/<?=$uid?>/4">Average School - <b><?=$st->e;?></b></p></a><hr>
                 <p><a href="zhschool/<?=$uid?>/5">Good School - <b><?=$st->f;?></b></a>
                 <a style="font-size:10px;color:red;margin-left:20px" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">Read More</a></p><hr>
                    <div class="collapse" id="collapse3">
                 <p><a href="zhschool/<?=$uid?>/6">Model School - <b><?=$st->g;?></b></p></a><hr>
                 <p><a href="zhschool/<?=$uid?>/8">Client Readiness School - <b><?=$st->i;?></b></p></a><hr>
                <?php } ?>
              </div></div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="SchoolData" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
             
          </div>
          <!-- ./col -->
          
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
                        All <span class="badge badge-success"><?php $dot=$this->Menu_model->get_plantask($uid,$tdate); 
                        $tot=$this->Menu_model->get_otbytouser($uid); $tot = sizeof($tot); $all = sizeof($dot);echo $all+$tot?></span>
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
                        Review<span class="badge badge-success"><?php $action = "Review"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-report-tab" data-toggle="pill" href="#custom-tabs-four-report" role="tab" aria-controls="custom-tabs-four-report" aria-selected="false">
                        Report <span class="badge badge-success"><?php $action = "Report"; $dot=$this->Menu_model->get_plantaskbyua($uid,$action,$tdate); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-other-tab" data-toggle="pill" href="#custom-tabs-four-other" role="tab" aria-controls="custom-tabs-four-other" aria-selected="false">
                        Other <span class="badge badge-success"><?php $action = "Other"; $dot=$this->Menu_model->get_otbytouser($uid); echo $all = sizeof($dot);?></span>
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
                  
                  
                  
                  
                  <div class="tab-pane fade" id="custom-tabs-four-utilisation" role="tabpanel" aria-labelledby="custom-tabs-four-utilisation-tab">
                      <?php 
                      $aai=0;
                      $ttdone=$this->Menu_model->get_ttdone($uid,$tdate,'Review');
                      foreach($ttdone as $tt){
                          $taid = $tt->action;
                          $taid=$this->Menu_model->get_action($taid);
                          $time = $tt->sdatet;
                          $time = date('h:i a', strtotime($time));
                      ?>
                      
                      <div class="list-group-item list-group-item-action">
                      <?php if($tt->task_subtype=='Utilisation Review'){?>
                              <a href="UReview/<?=$tt->pid?>"><span class="mr-3 align-items-center">
                                  <i class="fa-solid fa-circle"></i>
                               </span>
                               <span class="flex"><?=$tt->action?> | 
                                   <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                   <small class="text-muted">Task Time:- <?=$time?></small>
                                </span>
                                <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                </span>
                                <span class="text-right">
                                    <i class="fa-solid fa-forward"></i>
                                </span></a>
                      <?php } ?>
                      
                      
                            <?php if($tt->task_subtype=='Communication Review'){?>
                              <a href="CReview/<?=$tt->pid?>"><span class="mr-3 align-items-center">
                                  <i class="fa-solid fa-circle"></i>
                               </span>
                               <span class="flex"><?=$tt->action?> | 
                                   <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                   <small class="text-muted">Task Time:- <?=$time?></small>
                                </span>
                                <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                </span>
                                <span class="text-right">
                                    <i class="fa-solid fa-forward"></i>
                                </span></a>
                            <?php } ?>
                            
                            <?php if($tt->task_subtype=='Installation Report Review'){?>
                              <a href="InsReview/<?=$tt->pid?>"><span class="mr-3 align-items-center">
                                  <i class="fa-solid fa-circle"></i>
                               </span>
                               <span class="flex"><?=$tt->action?> | 
                                   <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                   <small class="text-muted">Task Time:- <?=$time?></small>
                                </span>
                                <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                </span>
                                <span class="text-right">
                                    <i class="fa-solid fa-forward"></i>
                                </span></a>
                            <?php } ?>
                            
                            
                            <?php if($tt->task_subtype=='Post FTTP Review'){?>
                              <a href="CReview/<?=$tt->pid?>"><span class="mr-3 align-items-center">
                                  <i class="fa-solid fa-circle"></i>
                               </span>
                               <span class="flex"><?=$tt->action?> | 
                                   <strong class="text-secondary mr-1"><?=$tt->sname?></strong><br>
                                   <small class="text-muted">Task Time:- <?=$time?></small>
                                </span>
                                <span class="p-3" style="color:<?=$tt->color?>;"><?=$tt->name?>
                                </span>
                                <span class="text-right">
                                    <i class="fa-solid fa-forward"></i>
                                </span></a>
                            <?php } ?>
                      
                      
                      
                      
                      
                        </div>
                        
                        
                        
                        
                      <?php  } ?>
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
                      <?php 
                      $ttdone=$this->Menu_model->get_otbytouser($uid);
                      foreach($ttdone as $tt){?>
                        <div class="list-group-item list-group-item-action">
                            <button id="add_act<?=$aai?>" value="<?=$tt->id?>" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                           <span class="mr-3 align-items-center">
                              <i class="fa-solid fa-circle"></i>
                           </span>
                           <span class="flex">Assign From  <?=$tt->fuser?> | Task Detail : <?=$tt->task?> | Task Date : <?=$tt->tadate?> | Target Date : <?=$tt->tdate?> |  Remark : <?=$tt->remark?>
                               
                            </span>
                            <span class="text-right">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                        </div></button>
                      <?php $aai++;} ?>
                      
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
                                      <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'11:00:00','13:00:00');
                                      $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'11:00:00','13:00:00');
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
                                      <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'13:00:00','15:00:00');
                                      $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'13:00:00','15:00:00');
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
                                      <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'15:00:00','17:00:00');
                                      $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'15:00:00','17:00:00');
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
                                      <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'17:00:00','19:00:00');
                                      $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'17:00:00','19:00:00'); ?>
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
                                      <?php $ttbytime = $this->Menu_model->get_ttbytimetd($uid,$tdate,'19:00:00','21:00:00'); 
                                      $ted = $this->Menu_model->get_ttbytimedtd($uid,$tdate,'19:00:00','21:00:00');
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
  font-size: 16px;
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

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

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


<script>
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>
