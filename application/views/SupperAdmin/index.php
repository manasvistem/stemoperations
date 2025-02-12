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
<?php $uid= $user['id'];?>

  <!-- Navbar -->
  <?php require('nav.php');?>
  <!-- /.navbar -->
<?php require('addlog.php');?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Dashboard</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
            
<?php
   $tdate = date('Y-m-d');
   $pic=0;
   $insc=0;
   $zhc=0;
   $pmct=0;
   $user=$this->Menu_model->get_user();
   foreach($user as $u){
       if($u->dep_id==2){$pic++;}
       if($u->dep_id==12){$pmct++;}
       if($u->dep_id==4){$insc++;}
       if($u->dep_id==11){$zhc++;}
   }
    $uti=$this->Menu_model->get_utigbds();
    $task=$this->Menu_model->get_taskassignbydate($tdate);
    $alltask = 0;
    $atplan = 0;
    $atclose=0;
    foreach($task as $task){if($task->to_user!=1 || $task->to_user!=2 || $task->to_user!=3 || $task->to_user!=4){
        $alltask++;
        if($task->plan){$atplan++;}
        $tid=$task->id;
        $ptask=$this->Menu_model->get_plantaskbytid($tid);
        if($ptask){
            if($task->plan && $ptask[0]->tdone=='1'){$atclose++;}
        }
    }}
    
    $task=$this->Menu_model->get_taskassignbydate($tdate);
    $zalltask = 0;
    $zatplan = 0;
    $zatclose=0;
    foreach($task as $task){if($task->to_user==2 || $task->to_user==3 || $task->to_user==4){
        $zalltask++;
        if($task->plan){$zatplan++;}
        $tid=$task->id;
        $ptask=$this->Menu_model->get_plantaskbytid($tid);
        if($ptask){
            if($task->plan && $ptask[0]->tdone=='1'){$zatclose++;}
        }
    }}
    
    $task=$this->Menu_model->get_taskassignbydate($tdate);
    $palltask = 0;
    $patplan = 0;
    $patclose=0;
    foreach($task as $task){if($task->to_user==1){
        $palltask++;
        if($task->plan){$patplan++;}
        $tid=$task->id;
        $ptask=$this->Menu_model->get_plantaskbytid($tid);
        if($ptask){
            if($task->plan && $ptask[0]->tdone=='1'){$patclose++;}
        }
    }}
           
$total = 0;
$new = 0;
$ftpdone = 0;
$active = 0;
$average = 0;
$good = 0;
$model = 0;
$inactive = 0;
$cready = 0;
$zh = 0;
$pm = 0;
$pmc = 0;
$reject = 0;
$tschool=0;
$Uncheck = 0;
foreach($spd as $d){
    $total++;
    if($d->status=='1'){$new++;}
    if($d->status=='2'){$ftpdone++;}
    if($d->status=='3'){$active++;}
    if($d->status=='4'){$average++;}
    if($d->status=='5'){$good++;}
    if($d->status=='6'){$model++;}
    if($d->status=='7'){$inactive++;}
    if($d->status=='8'){$cready++;}
    if($d->pm_apr=='1'){$pm++;}
    if($d->pm_apr=='3'){$pmc++;}
    if($d->pm_apr=='3' || $d->pm_apr=='1'){$tschool++;}
    if($d->pm_apr=='0'){$Uncheck++;}
 }
 
 $tpro=0;
 $pini=0;
 $pactive=0;
 $paverage=0;
 $pgood=0;
 $pmodel=0;
 $pinactive=0;
 $pcready=0;
 foreach($program as $pro){
     $tpro++;
    if($pro->status=='1'){$pini++;}
    if($pro->status=='2'){$pactive++;}
    if($pro->status=='3'){$paverage++;}
    if($pro->status=='4'){$pgood++;}
    if($pro->status=='5'){$pmodel++;}
    if($pro->status=='6'){$pinactive++;}
    if($pro->status=='7'){$pcready++;}
 }
 
 
?>
                                    
                                         
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light text-secondary">
              <div class="inner">
                  <?php $day = $this->Menu_model->get_daydbyad($tdate); ?>
                <center><h5>Team Detail</h5></center><hr>
                <p><a href="<?=base_url();?>/Menu/teamdetail">Total Person - <b><?=$day[0]->a?></b></p></a><hr>
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
                <center><h5>Task of Team</h5></center><hr>
                <p>Created - <b><?=$alltask?></b></p>
                <p>Task to be Plan - <b><?=$alltask-$atplan?></b></p>
                <p>Initiated - <b><?=$atplan?></b></p>
                <p>Close - <b><?=$atclose?></b></p>
                <p>Pending - <b><?=$alltask-$atclose?></b></p>
                <p><a href="<?=base_url();?>Menu/CreateTask" class="text-light">Create Task</a></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="totaltask" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light text-secondary">
              <div class="inner">
                <center><h5>ZH Task</h5></center><hr>
                <p>Created - <b><?=$zalltask?></b></p>
                <p>Task to be Plan - <b><?=$zalltask-$zatplan?></b></p>
                <p>Initiated - <b><?=$zatplan?></b></p>
                <p>Close - <b><?=$zatclose?></b></p>
                <p>Pending - <b><?=$zalltask-$zatclose?></b></p>
                <p><a href="<?=base_url();?>Menu/CreateTask" class="text-light">Create Task</a></p>
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
            <div class="small-box bg-light text-secondary">
              <div class="inner">
                <center><h5>PM Task</h5></center><hr>
                <p>Created - <b><?=$palltask?></b></p>
                <p>Task to be Plan - <b><?=$palltask-$patplan?></b></p>
                <p>Initiated - <b><?=$patplan?></b></p>
                <p>Close - <b><?=$patclose?></b></p>
                <p>Pending - <b><?=$palltask-$patclose?></b></p>
                <p><a href="<?=base_url();?>Menu/CreateTask" class="text-light">Create Task</a></p>
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
                  <?php foreach($bdr as $bdr){?>
                <center><h5>Request</h5></center><hr>
                <p><a href="bdrapending">Total Request - <b><?=$bdr->cont?></b></a></p>
                <p><a href="bdrapending">Pending for Assign - <b><?=$bdr->a?></b></a></p>
                <p><a href="bdrapending">Assign - <b><?=$bdr->b?></b></a></p>
                <p><a href="bdrapending">Pending - <b><?=$bdr->c?></b></a></p>
                <p><a href="bdrapending">Close - <b><?=$bdr->d?></b></a></p>
                <?php }?>
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
            <div class="small-box bg-light text-secondary">
              <div class="inner">
                <center><h5>Factory<br>Coordination</h5></center><hr>
                <p><a href="<?=base_url();?>Menu/handoverDetail" class="text-light">From BD <b>- 0</b></a></p>
                <p>Sent To FM <b>- 0</b></p>
                <p>Total Project <b>- 0</b></p>
                <p>PIA/ZH/Install Person Assign <b>- 0</b></p>
                <p>Designing <b>- 0</b></p>
                <p>Dispatch <b>- 0</b></p>
                <p>Replacement <b>- 0</b></p>
                <p>Maintenance bag Material Request <b>- </b>0</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="SchoolConversion" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light text-secondary">
              <div class="inner">
                <center><h5>Program</h5></center><hr>
                <p>Total Program - <b><?=$tpro?></b></p>
                <p>Program Activation - <b><?=$pini?></b></p>
                <p>Active Program - <b><?=$pactive?></b></p>
                <p>Average Program - <b><?=$paverage?></b></p>
                <p>Good Program - <b><?=$pgood?></b></p>
                <p>Model Program - <b><?=$pmodel?></b></p>
                <p>Inactive Program- <b><?=$pinactive?></b></p>
                <p>Client Readiness - <b><?=$pcready?></b></p>
                <p><a href="totalcd">Client Detail</a></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="ProgramDetail" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light text-secondary">
              <div class="inner">
                <center><h5>Program<br>Conversion</h5></center><hr>
                <p>Program Initiation to Active Program - <b>0</b></p>
                <p>Activation to Active Program - <b>0</b></p>
                <p>Active to Average Program - <b>0</b></p>
                <p>Average to Good Program - <b>0</b></p>
                <p>Good to Model Program - <b>0</b></p>
                <p>Model to Client Readiness - <b>0</b></p>
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
                <center><h5>School</h5></center><hr>
                    <a href="search_school" ><p>Total School - <b><?=$tschool;?></b></p></a>
                    <a href="School/NewSchool" ><p>New School - <b><?=$new;?></b></p></a>
                    <a href="School/FTTPDone" ><p>FTTP Done - <b><?=$ftpdone;?></b></p></a>
                    <a href="School/ActiveSchool" ><p>Active School - <b><?=$active;?></b></p></a>
                    <a href="School/AverageSchool" ><p>Average School - <b><?=$average;?></b></p></a>
                    <a href="School/GoodSchool" ><p>Good School - <b><?=$good;?></b></p></a>
                    <a href="School/ModelSchool" ><p>Model School - <b><?=$model;?></b></p></a>
                    <a href="School/InactiveSchool" ><p>Inactive School - <b><?=$inactive?></b></p></a>
                    <a href="School/ClientReadiness" ><p>Client Readiness - <b><?=$cready?></b></p></a>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="search_school" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          
          
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light text-secondary">
              <div class="inner">
                <center><h5>School<br>Conversion</h5></center><hr>
                <p>New to FTTP Done - <b>0</b></p>
                <p>FTTP Done to Active - <b>0</b></p>
                <p>Active to Average - <b>0</b></p>
                <p>Average to Good - <b>0</b></p>
                <p>Good to Model - <b>0</b></p>
                <p>Model to Client Readiness- <b></b></p>
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
                <center><h5>Utilisation</h5></center><hr>
                <p>Total Utilisation - <b><?=sizeof($uti)?></b></p>
                <p>Today's Utilisation - <b>0</b></p>
                <p>Project Utilisation received - <b>0</b></p>
                <p>Project Utilisation not received - <b>0</b></p>
                <p>School Utilisation received - <b>0</b></p>
                <p>School Utilisation not received - <b>0</b></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="totalutiyear" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light text-secondary">
              <div class="inner">
                <center><h5>User<br>Detail</h5></center><hr>
                <p><a  href="taskdetailbyuser/<?=2?>">PI - <b><?=$pic?></b></a></p>
                <p><a  href="taskdetailbyuser/<?=4?>">Ins&Main - <b><?=$insc?></b></a></p>
                <p><a  href="taskdetailbyuser/<?=11?>">Zonal Head - <b><?=$zhc?></b></a></p>
                <p><a  href="taskdetailbyuser/<?=1?>">Program Manager - <b><?=$pmct?></b></a></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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