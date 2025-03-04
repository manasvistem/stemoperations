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
    

<?php
$total=0;
$new=0;
$ftpdone=0;
$active=0;
$average=0;
$good=0;
$model=0;
$inactive=0;
$cready=0;
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
}
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search School</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="container body-content">
        <div class="page-header">
            <div class="form-group">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Total School</th>
                        <th>New School</th>
                        <th>FTTP Done</th>
                        <th>Active School</th>
                        <th>Average School</th>
                        <th>Good School</th>
                        <th>Model School</th>
                        <th>Inactive</th>
                        <th>Client Readiness</th>
                    </tr>
                    <tr>
                        <td><?=$total?></td>
                        <td><?=$new?></td>
                        <td><?=$ftpdone?></td>
                        <td><?=$active?></td>
                        <td><?=$average?></td>
                        <td><?=$good?></td>
                        <td><?=$model?></td>
                        <td><?=$inactive?></td>
                        <td><?=$cready?></td>
                    </tr>
                    
                </table>
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
                                              <th>Current Status</th>
                                              <th>Address</th>
                                              <th>Dis</th>
                                              <th>State</th>
                                              <th>Total Call</th>
                                              <th>Total Visit</th>
                                              <th>Total Email</th>
                                              <th>Total Report</th>
                                              <th>Total Communication</th>
                                              <th>Total Utilisation</th>
                                              <th>PI Name</th>
                                              <th>ZH Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($spd as $d){
                                      $this->load->model('Menu_model');
                                      $piid = $d->pi_id;
                                      $zhid = $d->zh_id;
                                      $pi=$this->Menu_model->get_user_byid($piid);
                                      $zh=$this->Menu_model->get_user_byid($zhid);
                                      $sid = $d->id;
                                      $call=0;
                                        $visit=0;
                                        $uti=0;
                                        $what=0;
                                        $email=0;
                                        $report=0;
                                        $slog=$this->Menu_model->get_schoollogs($sid);
                                        foreach($slog as $sl){
                                            if($sl->task_type=='Call'){$call++;}
                                            if($sl->task_type=='Visit'){$visit++;}
                                            if($sl->task_type=='Utilisation'){$uti++;}
                                            if($sl->task_type=='Whatsapp'){$what++;}
                                            if($sl->task_type=='Email'){$email++;}
                                            if($sl->task_type=='Report'){$report++;}
                                        }
                                      $stid = $d->status;
                                      $stid=$this->Menu_model->get_statusbyid($stid);
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->project_code?></td>
                                        <td><a href="../school_detail/<?=$d->id?>"><?=$d->sname?></a></td>
                                        <td><?=$stid[0]->name?></td>
                                        <td><?=$d->saddress?></td>
                                        <td><?=$d->sdistrict?></td>
                                        <td><?=$d->sstate?></td>
                                        <td><?=$call?></td>
                                        <td><?=$visit?></td>
                                        <td><?=$email?></td>
                                        <td><?=$report?></td>
                                        <td><?=$what?></td>
                                        <td><?=$uti?></td>
                                        <td><?=$pi[0]->fullname?></td>
                                        <td><?=$zh[0]->fullname?></td>
                                    </tr>
                                    <?php $i++;} ?>
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
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('#user_id').on('change', function b() {
var user_id = document.getElementById("user_id").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getpcodebypiid',
type: "POST",
data: {
user_id: user_id
},
cache: false,
success: function a(result){
$("#pcode").html(result);
}
});
});

</script>   
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