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
              <h4><?php $fullname=$user['fullname']; $uid=$user['id'];?> <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); $did[0]->dep_name;?></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    <div class="card">
        
      <div>
      <!--<form class="p-3" method="POST" action="<?=base_url();?>Menu/dailyreport"><input type="date" name="date" class="mr-2" max="<?=date('Y-m-d')?>">
      <button type="submit" class="bg-primary text-light">Filter</button></form>-->
      </div>
      
<?php 

$day = $this->Menu_model->new_daydbyad($date);

?>
              
              <!-- /.card-header -->
              <div class="card-body">
            <div class="form-group">
                <h3><center>Team Daily Report (<?=$date?>)</center></h3>
                <div class="col-12 mt-3">
                <center><h5>Team Detail</h5></center><hr>
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Total Team</th>
                            <th>Total Present</th>
                            <th>Total Work in Office</th>
                            <th>Total Work in Field</th>
                            <th>Total Work From Field+Office</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?=$date?></td>
                        <td><?=$day[0]->a?></a></td>
                        <td><?=$day[0]->b?></a></td>
                        <td><?=$day[0]->c?></a></td>
                        <td><?=$day[0]->d?></a></td>
                        <td><?=$day[0]->e?></a></td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>BD Name</th>
                            <th>Started Day @</th>
                            <th>Close Day @</th>
                            <th>Start to Close Time Difference</th>
                            <th>Total Working Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i=1;
                      $mdata = $this->Menu_model->get_teamdayd($date);
                        foreach($mdata as $dt){
                            $start=$dt->start;
                            $close=$dt->close;
                            $fullname = $dt->bdname;
                            $worktime = $this->Menu_model->get_worktime($date,$fullname);
                            $worktime = $worktime[0]->worktime;
                        ?>
                    <tr>
                         <td><?=$i?></td>
                         <td><?=$dt->bdname?></td>
                         <td><?=date('h:i A', strtotime($start));?></td>
                         <td><?php if($close){echo date('h:i A', strtotime($close));}?></td>
                         <td><?php if($close){echo $this->Menu_model->timediff($start,$close);}?></td>
                         <td><?=$worktime?> Mint</td>
                    </tr>
                     <?php $i++;} ?>
                  </tbody>
                </table>
                </div>
                
                
            <div class="col-12 mt-3">
            <center><h5>Team Task Detail</h5></center><hr>
            <div class="">
            <b>note: A (Assign/Planned) / C (Completed) / P (Pending)</b>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Total Task Assign/Planned</th>
                        <th>Total Task Pending</th>
                        <th>Total Task Completed</th>
                        <th>Call A/C/P</th>
                        <th>Email A/C/P</th>
                        <th>Visit A/C/P</th>
                        <th>Utilisation A/C/P</th>
                        <th>Report A/C/P</th>
                        <th>Communication A/C/P</th>
                        <th>Review A/C/P</th>
                        <th>OTask A/C/P</th>
                        <th>Action Taken Yes/No</th>
                        <th>Purpose Achieved Yes/No</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $tttd = $this->Menu_model->new_teamtotalt($date);
                        foreach($tttd as $ttd){?>
                <tr>
                    <td><?=$date?></td>
                    <td><?=$ttd->a?></td>
                    <td><?=$ttd->b?></td>
                    <td><?=$ttd->c?></td>
                    <td><?=$ttd->d?>/<?=$ttd->d-$ttd->dp?>/<?=$ttd->dp?></td>
                    <td><?=$ttd->e?>/<?=$ttd->e-$ttd->ep?>/<?=$ttd->ep?></a></td>
                    <td><?=$ttd->f?>/<?=$ttd->f-$ttd->fp?>/<?=$ttd->fp?></a></td>
                    <td><?=$ttd->g?>/<?=$ttd->g-$ttd->gp?>/<?=$ttd->gp?></a></td>
                    <td><?=$ttd->h?>/<?=$ttd->h-$ttd->hp?>/<?=$ttd->hp?></a></td>
                    <td><?=$ttd->i?>/<?=$ttd->i-$ttd->ip?>/<?=$ttd->ip?></a></td>
                    <td><?=$ttd->j?>/<?=$ttd->j-$ttd->jp?>/<?=$ttd->jp?></a></td>
                    <td><?=$ttd->k?>/<?=$ttd->k-$ttd->kp?>/<?=$ttd->kp?></a></td>
                    <td><?=$ttd->l?>/<?=$ttd->m?></td>
                    <td><?=$ttd->n?>/<?=$ttd->o?></td>
                </tr>
                <?php } ?>  
              </tbody>
            </table>
            </div></div>
            
            
            <div class="col-12 mt-3">
            <center><h5>Team Completed Task Detail</h5></center><hr>
            <div class="">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                                        <tr>
                                          <th>User Name</th>
                                          <th>Call</th>
                                          <th>Visit</th>
                                          <th>Utilisation</th>
                                          <th>Outbond</th>
                                          <th>Report</th>
                                          <th>Installation (Report)</th>
                                          <th>Maintence (Report)</th>
                                          <th>FTTP (Report)</th>
                                          <th>RTTP (Report)</th>
                                          <th>M&E (Report)</th>
                                          <th>DIY (Report)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $userd = $this->Menu_model->get_allusertaskdetail($date);
                                        foreach($userd as $userd){
                                            $fullname = $userd->fullname;
                                            $piid = $this->Menu_model->get_user_byfname($fullname);
                                            $piid = $piid[0]->id;
                                            $ureportd = $this->Menu_model->get_alluserreportdetail($date,$fullname); ?>
                                    <tr>
                                        <td><?=$userd->fullname?></td>
                                        <td><a href="<?=base_url();?>Menu/taskdetaildw/<?=$piid?>/<?=$date?>/<?=$date?>/Call"><?=$userd->tcall?></a></td>
                                        <td><a href="<?=base_url();?>Menu/taskdetaildw/<?=$piid?>/<?=$date?>/<?=$date?>/Visit"><?=$userd->visit?></td>
                                        <td><a href="<?=base_url();?>Menu/taskdetaildw/<?=$piid?>/<?=$date?>/<?=$date?>/Utilisation"><?=$userd->utilisation?></td>
                                        <td><a href="<?=base_url();?>Menu/taskdetaildw/<?=$piid?>/<?=$date?>/<?=$date?>/Communication"><?=$userd->outbond?></td>
                                        <td><a href="<?=base_url();?>Menu/taskdetaildw/<?=$piid?>/<?=$date?>/<?=$date?>/Report"><?=$userd->report?></td>
                                        <td><?=$userd->ins?> (<?=$ureportd[0]->uins?>)</td>
                                        <td><?=$userd->main?> (<?=$ureportd[0]->umain?>)</td>
                                        <td><?=$userd->fttp?> (<?=$ureportd[0]->ufttp?>)</td>
                                        <td><?=$userd->rttp?> (<?=$ureportd[0]->urttp?>)</td>
                                        <td><?=$userd->mne?> (<?=$ureportd[0]->umne?>)</td>
                                        <td><?=$userd->diy?> (<?=$ureportd[0]->udiy?>)</td>
                                    </tr> 
                                    <?php } ?>
                                  </tbody>
                </table>
            </div></div>
            
            
            <div class="col-12 mt-3">
            <center><h5>Team Completed Task Detail</h5></center><hr>
            <div class="">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Assigned Date</th>
                          <th>Planed Date</th>
                          <th>Initiated Date</th>
                          <th>Completed Date</th>
                          <th>PIA</th>
                          <th>Project Code</th>
                          <th>Client Name</th>
                          <th>School info</th>
                          <th>Action</th>
                          <th>Task Type</th>
                          <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i=0;
                      $mdata = $this->Menu_model->get_completedtask($date);
                      foreach($mdata as $d){
                      $i++; ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$d->assign?></td>
                        <td><?=$d->plandate?></td>
                        <td><?=$d->initiateddt?></td>
                        <td><?=$d->donet?></td>
                        <td><?=$d->pia?></td>
                        <td><?=$d->project_code?></td>
                        <td><?=$d->clientname?></td>
                        <td><a href="<?=base_url();?>Menu/school_detail/<?=$d->sid?>"><?=$d->sname?></br><?=$d->scity?>,<?=$d->sstate?></a></td>
                        <td><?=$d->action?></td>
                        <td><?=$d->stt?></td>
                        <td><?=$d->remark?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div></div>
            
            
            
            <div class="col-12 mt-3">
            <center><h5>Team Pending Task Detail</h5></center><hr>
            <div class="">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Assigned Date</th>
                          <th>Planed Date</th>
                          <th>PIA</th>
                          <th>Project Code</th>
                          <th>Client Name</th>
                          <th>School info</th>
                          <th>Action</th>
                          <th>Task Type</th>
                          <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i=0;
                      $mdata = $this->Menu_model->get_pendingtask($date);
                      foreach($mdata as $d){
                      $i++; ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$d->assign?></td>
                        <td><?=$d->plandate?></td>
                        <td><?=$d->pia?></td>
                        <td><?=$d->project_code?></td>
                        <td><?=$d->clientname?></td>
                        <td><a href="<?=base_url();?>Menu/school_detail/<?=$d->sid?>"><?=$d->sname?></br><?=$d->scity?>,<?=$d->sstate?></a></td>
                        <td><?=$d->action?></td>
                        <td><?=$d->stt?></td>
                        <td><?=$d->remark?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div></div>
            
            
            
            
            <div class="col-12 mt-3">
            <center><h5>Hi Alerts</h5></center><hr>
            <div class="">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Alert Date</th>
                          <th>Alert Type</th>
                          <th>Alert Store at</th>
                          <th>Alert Remove at</th>
                          <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i=0;
                      $mdata = $this->Menu_model->get_pendingtask($date);
                      foreach($mdata as $d){
                      $i++; ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$d->assign?></td>
                        <td><?=$d->plandate?></td>
                        <td><?=$d->pia?></td>
                        <td><?=$d->project_code?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div></div>
                
                
                
                </div>
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