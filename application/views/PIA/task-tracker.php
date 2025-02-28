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
            <h1 class="m-0">Task Tracker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4>HI! <?=$user['fullname']?> ( <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
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
        
        
        <?php
          $tus=$this->Menu_model->get_user_byid($touser);
          $p=0;
          $c=0;
          $a=0;
          $tt=sizeof($data);
          foreach($data as $d){
          $tid = $d->id;
          $fu = $d->from_user;
          $tu = $d->to_user;
          $fuser=$this->Menu_model->get_user_byid($fu);
          $tuser=$this->Menu_model->get_user_byid($tu);
          $plantask = $this->Menu_model->get_plantaskbytid($tid);
          $sid=$d->spd_id;
          $spd = $this->Menu_model->get_spdbyid($sid);
          
          if($d->plan==1){$p++;}
          if($d->plan==1 && $plantask[0]->tdone==1){$c++;}
          if($d->plan==1 && $plantask[0]->tdone==1 && $plantask[0]->actiontaken=='Yes'){$a++;}
          
          }
       ?>
              
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="container body-content">
        <div class="page-header">
            <div class="form-group">
                <div class="p-3">
                    <div class="row">
                    <div class="card col-3 p-2">
                        <h6>Task Type: <?=$tasktype?></h6>
                    </div>
                    <div class="card col-3 p-2">
                        <h6>From Date Type: <?=$sdate?></h6>
                    </div>
                    <div class="card col-3 p-2">
                        <h6>To Date Type: <?=$edate?></h6>
                    </div>
                    <div class="card col-3 p-2">
                        <h6>User Name: <?=$tus[0]->fullname?></h6>
                    </div>
                    </div>
                    <div class="row">
                    <div class="card col-3 p-2">
                        <h6>Total Task: <?=$tt?></h6>
                    </div>
                    <div class="card col-3 p-2">
                        <h6>Total Plan: <?=$p?></h6>
                    </div>
                    <div class="card col-3 p-2">
                        <h6>Total Unplan: <?=$tt-$p?></h6>
                    </div>
                    <div class="card col-3 p-2">
                        <h6>Total Completed: <?=$c?></h6>
                    </div>
                    </div>
                    <div class="row">
                    <div class="card col-3 p-2">
                    <h6>Total Incompleted: <?=$p-$c?></h6>
                    </div>
                    <div class="card col-3 p-2">
                        <h6>Action Taken Yes: <?=$a?></h6>
                    </div>
                    <div class="card col-3 p-2">
                        <h6>Action Taken No: <?=$c-$a?></h6>
                    </div>
                    </div>
                </div>
                <fieldset>
                     <form method='POST'>
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <div class="pdf-viwer">
                                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                          <th>S.No</th>
                                          <th>Assign By</th>
                                          <th>Assign To</th>
                                          <th>Assign Date</th>
                                          <th>Update Date</th>
                                          <th>Project Code</th>
                                          <th>School Name</th>
                                          <th>Task Type</th>
                                          <th>Purpose</th>
                                          <th>Plan</th>
                                          <th>Status</th>
                                          <th>Action Taken</th>
                                          <th>Remark</th>
                                          <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=0; foreach($data as $d){ 
                                      $i++;
                                      $tid = $d->id;
                                      $fu = $d->from_user;
                                      $tu = $d->to_user;
                                      $fuser=$this->Menu_model->get_user_byid($fu);
                                      $tuser=$this->Menu_model->get_user_byid($tu);
                                      $plantask = $this->Menu_model->get_plantaskbytid($tid);
                                      $sid=$d->spd_id;
                                      $spd = $this->Menu_model->get_spdbyid($sid);
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$fuser[0]->fullname?></td>
                                        <td><?=$tuser[0]->fullname?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->donet?></td>
                                        <td><?=$d->project_code?></td>
                                        <td><?=$spd[0]->sname?></td>
                                        <td><?=$d->task_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?php if($d->plan==1){echo 'Planed';}else{echo 'Not Plan';}?></td>
                                        <td><?php if($d->plan==1 && $plantask[0]->tdone==1){echo 'Close';}else{echo 'Open';}?></td>
                                        <td><?php if($d->plan==1 && $plantask[0]->tdone==1){echo $plantask[0]->actiontaken;}else{echo 'Open';}?></td>
                                        <td>Not Added</td>
                                        <td></td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                                    
                                </div>  
                            </div>
                        </div>
                    </form>            <!--END OF FORM ^^-->
                </fieldset>
            </div>
            <hr />
        </div>
    </div></div>
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
