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
            <h1 class="m-0">Dashboard</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            
            
    <div class="row card-group-row">
        <div class="col-lg-12 col-sm m-5">
            <form method="post" style="float:left;"><input type="date" min="" name="from" value=""> <input type="date" name="to" min="" value="" > <input type="submit" value="Filter" class=" btn-primary" ></form>
        </div>
        
        <!-- Col Close -->
        
        
        <!-- Col Close -->
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-3 card-group-row__col">
            <div class="card card-group-row__card card-shadow">
                <div class="p-2 d-flex flex-row align-items-center">
                    <div class="p-2">
                        <span class="border rounded-circle p-2 " style="font-size: 25px;"> 
                            <i class="fa-solid fa-book fa-fw"></i>
                        </span>
                    </div>
                    <a href="conversion_details" target="_blank" class="text-dark">
                        <strong>New School To FTTP Done
                        <span class="badge badge-success p-1">40</span>
                        </strong>
                    </a>
                </div>
            </div>
        </div><!-- Col Close -->
        
        <!-- Col Close -->
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-3 card-group-row__col">
            <div class="card card-group-row__card card-shadow">
                <div class="p-2 d-flex flex-row align-items-center">
                    <div class="p-2">
                        <span class="border rounded-circle p-2 " style="font-size: 25px;"> 
                            <i class="fa-solid fa-book fa-fw"></i>
                        </span>
                    </div>
                    <a href="conversion_details" target="_blank" class="text-dark">
                        <strong>FTTP Done To Active School
                        <span class="badge badge-success p-1">10</span>
                        </strong>
                    </a>
                </div>
            </div>
        </div><!-- Col Close -->
        
        <!-- Col Close -->
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-3 card-group-row__col">
            <div class="card card-group-row__card card-shadow">
                <div class="p-2 d-flex flex-row align-items-center">
                    <div class="p-2">
                        <span class="border rounded-circle p-2 " style="font-size: 25px;"> 
                            <i class="fa-solid fa-book fa-fw"></i>
                        </span>
                    </div>
                    <a href="conversion_details" target="_blank" class="text-dark">
                        <strong>Active School To Average School
                        <span class="badge badge-success p-1">20</span>
                        </strong>
                    </a>
                </div>
            </div>
        </div><!-- Col Close -->
        
         <!-- Col Close -->
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-3 card-group-row__col">
            <div class="card card-group-row__card card-shadow">
                <div class="p-2 d-flex flex-row align-items-center">
                    <div class="p-2">
                        <span class="border rounded-circle p-2 " style="font-size: 25px;"> 
                            <i class="fa-solid fa-book fa-fw"></i>
                        </span>
                    </div>
                    <a href="conversion_details" target="_blank" class="text-dark">
                        <strong>Average School To Good School
                        <span class="badge badge-success p-1">30</span>
                        </strong>
                    </a>
                </div>
            </div>
        </div><!-- Col Close -->
        
         <!-- Col Close -->
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-3 card-group-row__col">
            <div class="card card-group-row__card card-shadow">
                <div class="p-2 d-flex flex-row align-items-center">
                    <div class="p-2">
                        <span class="border rounded-circle p-2 " style="font-size: 25px;"> 
                            <i class="fa-solid fa-book fa-fw"></i>
                        </span>
                    </div>
                    <a href="conversion_details" target="_blank" class="text-dark">
                        <strong>Good School To Model School
                        <span class="badge badge-success p-1">1</span>
                        </strong>
                    </a>
                </div>
            </div>
        </div><!-- Col Close -->
        
    </div>
</div>

</div>
<div class="row">
         
          <div class="col-lg-8 col-sm">
            <div class="card card-primary card-outline card-outline-tabs">
                <h4 class="p-3">Today's Task</h4>
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">
                        All <span class="badge badge-success">11</span>
                    </a>
                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">
                        Visit <span class="badge badge-success">2</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">
                        Calls <span class="badge badge-success">5</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">
                        Email <span class="badge badge-success">2</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-other" data-toggle="pill" href="#custom-tabs-four-other" role="tab" aria-controls="custom-tabs-other" aria-selected="false">
                        Whatsapp<span class="badge badge-success">1</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-whatsapp-tab" data-toggle="pill" href="#custom-tabs-four-whatsapp" role="tab" aria-controls="custom-tabs-four-whatsapp" aria-selected="false">
                        Other <span class="badge badge-success">1</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">ABCD</div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">EFG</div>
                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">HIJ</div>
                  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                      KLM
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-other" role="tabpanel" aria-labelledby="custom-tabs-four-other">
                      QRS
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-whatsapp" role="tabpanel" aria-labelledby="custom-tabs-four-whatsapp-tab">
                     
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            </div>
            <div class="col-lg-4 col-sm">
            <div class="card card-primary card-outline card-outline-tabs">
                <h5 class="p-3">Other Activity</h5><hr>
              <div class="card-header p-0 border-bottom-0"> </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="table-responsive">
                            <div class="table-responsive">     
                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr><th>Sr Number</th> </tr>
                                    </thead>
                                    <tbody>
                  <?php 
                    $dot=$this->Menu_model->get_otask();
                    foreach($dot as $d){ 
                    $id = $d->from_user;
                    $user=$this->Menu_model->get_user_byid($id);
                    ?>
                    <tr><td><div><i class="fa fa-thumb-tack" aria-hidden="true"></i> <b>   <?=$d->remark?></b></div><div class="text-right">Task assign by <?=$user[0]->fullname;?></div>
                    <div><?=$d->tdate?></div>
                    </td></tr>
                  <?php } ?>
                  </tbody>
                                </table>
                            </div>
                        </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
</div>
            
            
            
            
          </div>
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
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

<script>
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>
