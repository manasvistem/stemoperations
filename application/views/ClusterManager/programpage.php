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
            <h1 class="m-0">Program Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4>HI! <?=$user['fullname']?> ( <?php $uid=$user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
<?php
  $log=0; 
  foreach($spd as $s){ 
  $sid = $s->id;
  $sname=$s->sname;
  $slog=$this->Menu_model->get_schoollogs($sid);
  foreach($slog as $sl){$log++;}}?>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
          <div class="col-sm col-md-8 col-lg-8">
            <?php foreach($client as $d){ 
                
            ?>
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="row">
                    <div class="col-sm col-lg-4">Project Code:</div>
                    <div class="col-sm col-lg-8"><?=$d->projectcode?></div>
                    <div class="col-sm col-lg-4">Total Log:</div>
                    <div class="col-sm col-lg-8"><?=$log?></div>
                    <div class="col-sm col-lg-4">Year:</div>
                    <div class="col-sm col-lg-8"><?=$d->project_year?></div>
                    <div class="col-sm col-lg-4">Status Details:</div>
                    <div class="col-sm col-lg-8">
                        <?php foreach($pstatus as $st){
                            $pstatus = $st->name;
                            $color = $st->color;
                            ?>
                        <span class="badge <?=$color?>"><?=$pstatus?> &nbsp;<span class="badge bg-light">0</span></span>
                        <?php } ?>
                        <br><br>
                    </div>
                    
                    <div class="col-sm col-lg-4">Status Conversion:</div>
                    <div class="col-sm col-lg-8">
                        <span class="badge bg-primary">Project to Program Activation &nbsp;<span class="badge bg-light">0 Sec</span></span>
                        <span class="badge bg-secondary">Active  to Good Program &nbsp;<span class="badge bg-light">0 Sec</span></span>
                        <span class="badge bg-info">Good to Average Program &nbsp;<span class="badge bg-light">0 Sec</span></span>
                        <span class="badge bg-warning">Average to Model Program &nbsp;<span class="badge bg-light">0 Sec</span></span>
                        <span class="badge bg-success">Model to Client Readiness Program &nbsp;<span class="badge bg-light">0 Sec</span></span>
                        <br><br>
                    </div>
                

                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <?php } ?>
          
            </div>
          <!-- /.col -->
          <div class="col-sm col-md-4 col-lg-4 showdata">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <div class="row">
                    <div class="col-sm col-lg-5"><h4>Schools</h4></div>
                </div><hr>
                <?php foreach($spd as $s){ ?>
                    <div class="col-sm"><a href="../school_detail/<?=$s->id?>"><?=$s->sname?></a></div><hr>
                <?php } ?>
              </div>
              </div>
              <!-- /.card-header -->
              
              
            </div>
            <!-- /.card -->
  </div>
  
  
  <div class="col-12">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Logs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="container body-content">
        <div class="page-header">
            <div class="form-group">
                <fieldset>
                    <form action="" class="form-group" method="post">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            								
                                                  <th>Sr Number</th>
                                                  <th>School Name</th>
                                                  <th>Assign Date</th>
                                                  <th>Plan Date</th>
                                                  <th>Action Date</th>
                                                  <th>Action</th>
                                                  <th>Current Remark</th>
                                                  <th>Next Remark</th>
                                                  <th>Current Status</th>
                                                  <th>Next Status</th>
                                                  <th>Check list</th>
                                                  <th>Updated By</th>
                                                  <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $i=1; 
                                      foreach($spd as $s){ 
                                      $sid = $s->id;
                                      $sname=$s->sname;
                                      $slog=$this->Menu_model->get_schoollogs($sid);
                                      foreach($slog as $sl){
                                      $tid = $sl->taskid;
                                      $status = $sl->status;
                                      $plan=$this->Menu_model->get_plantaskbytid($tid);
                                      $task=$this->Menu_model->get_taskassign_byid($tid);
                                      $nstatus=$this->Menu_model->get_snextststus($status);
                                      $uid = $task[0]->to_user;
                                      $user=$this->Menu_model->get_user_byid($uid);
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$sname?></td>
                                        <td><?=$task[0]->task_date?></td>
                                        <td><?=$plan[0]->plandate?></td>
                                        <td><?=$sl->storedt?></td>
                                        <td><?=$sl->task_type?></td>
                                        <td><?=$sl->remark?></td>
                                        <td><?=$sl->remark?></td>
                                        <td><?=$status?></td>
                                        <td><?=$nstatus[0]->name?></td>
                                        <td><a href="../DownloadChecklist?sid=<?=$sid?>">Click</a></td>
                                        <td><?=$user[0]->fullname?></td>
                                        <td><?=$sl->status?></td>
                                    </tr>
                                    <?php $i++;}} ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </form>            <!--END OF FORM ^^-->
                </fieldset>
            </div>
            <hr />
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
</script>
</body>
</html>