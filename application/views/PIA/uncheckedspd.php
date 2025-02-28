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
            <h1 class="m-0">Search School</h1>
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

<div class="container-fluid p-3">
    <form action="<?=base_url();?>Menu/schooldata" method="POST" target="_blank">
    <select class="ml-2" name="user_id" id="user_id">
        <option>All</option>
        <?php $du=$this->Menu_model->get_user(); foreach($du as $d){ if($d->id==$uid){?>
        <option value="<?=$d->id?>"><?=$d->fullname?></option>
        <?php }} ?>
    </select>
    <select class="ml-2" name="status" id="status">
        <option>All</option>
        <option>New School</option>
        <option>FTTP Done</option>
        <option>Active School</option>
        <option>Average School</option>
        <option>Good School</option>
        <option>Model School</option>
    </select>
    <input class="ml-2" type="date" name="fdate" id="fdate">
    <input class="ml-2" type="date" name="tdate" id="tdate">
    <select class="ml-2" name="type" id="type">
        <option>Created</option>
        <option>Planner</option>
    </select>
    <input type="submit">
    </form>
</div>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">School Profile Data</h3>
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
                                            
                                                  <th>S.NO.</th>
                                                  <th>Project Code</th>
                                                  <th>School Name</th>
                                                  <th>Address</th>
                                                  <th>City</th>
                                                  <th>Tehshil</th>
                                                  <th>District</th>
                                                  <th>State</th>
                                                  <th>Zone</th>
                                                  <th>Google Location</th>
                                                  <th>Language</th>
                                                  <th>Academic Year</th>
                                                  <th>Whatsapp Group</th>
                                                  <th>STD</th>
                                                  <th>Boys</th>
                                                  <th>Girls</th>
                                                  <th>Students</th>
                                                  <th>Teachers</th>
                                                  <th>Timing</th>
                                                  <th>Website</th>
                                                  <th>Current Status</th>
                                                  <th>Previous Status</th>
                                                  <th>Total Utilization</th>
                                                  <th>Uploded Utilization</th>
                                                  <th>Uploded Report</th>
                                                  <th>Uploded Media</th>
                                                  
                                                  

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($spd as $d){ if($d->zh_apr==0){
                                      $this->load->model('Menu_model');
                                      $sid = $d->id;
                                      $uti=$this->Menu_model->get_utic($sid);
                                      $media=$this->Menu_model->get_media($sid);
                                      $report=$this->Menu_model->get_report($sid);
                                      
                                      $u = sizeof($uti);
                                      $m = sizeof($media);
                                      $r = sizeof($report);
                                      
                                      if($d->totalutilization>$u){$color="text-danger";}elseif($d->totalutilization<$u){$color="text-success";}
                                      else{$color="text-primary";}
                                      
                                      $stid = $d->status;
                                      $stid=$this->Menu_model->get_statusbyid($stid);
                                      
                                      $pstid = $d->pstatus;
                                      $pstid = $this->Menu_model->get_statusbyid($pstid);
                                      
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->project_code?></td>
                                        <td><a href="school_detail/<?=$d->id?>"><?=$d->sname?></a></td>	
                                        <td><?=$d->saddress?></td>
                                        <td><?=$d->sdistrict?></td>
                                        <td><?=$d->tehshil?></td>
                                        <td><?=$d->scity?></td>
                                        <td><?=$d->sstate?></td>
                                        <td><?=$d->szone?></td>
                                        <td><?=$d->slocation?></td>
                                        <td><?=$d->slanguage?></td>
                                        <td><?=$d->sayear?></td>
                                        <td><a href="<?=$d->wanamelink?>" target="_blank"><?=$d->waname?></a></td>
                                        <td><?=$d->std?></td>
                                        <td><?=$d->boys?></td>
                                        <td><?=$d->girls?></td>
                                        <td><?=$d->total_students?></td>
                                        <td><?=$d->total_teachers?></td>
                                        <td><?=$d->timing?></td>
                                        <td><?=$d->website?></td>
                                        <td><?=$stid[0]->name?></td>
                                        <td><?=$pstid[0]->name?></td>
                                        <td><?=$d->totalutilization?></td>
                                        <td><a class="<?=$color?>" href="../getUtilization/<?=$d->id?>"><?=$u?></a></td>
                                        <td><a href="../getReport/<?=$d->id?>"><?=$r?></a></td>
                                        <td><a href="../getMedia/<?=$d->id?>"><?=$m?></a></td>
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
