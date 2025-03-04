<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STEM Oppration | WebAPP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/jqvmap.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/daterangepicker.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/summernote-bs4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <style>.scrollme { overflow-x: auto; }
  
.custom-border {
  border: 4px solid rgba(255, 255, 255, 0.8);
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php require('nav.php');?>
  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">PIA REPORT CARD</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4></h4>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid p-3"></div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="card col-12 p-3">
                
                <div class="row">
                            <?php $pia = $this->Menu_model->get_user_pia(); foreach($pia as $pi){?>
                                  <div class="card carder col-lg-3 col-md-6 col-sm">
                                      <div class="upper mt-2">
                                        <img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400_opt_1/74063a9784377.560d9ef3da55d.jpg" class="img-fluid">
                                      </div>
                                        <div class="d-flex justify-content-center profile text-center mt-n4">
                                          <div class="d-flex justify-content-center align-items-center rounded-circle custom-border" style="width: 100px; height: 100px;">
                                            <img src="https://startup.telangana.gov.in/wp-content/uploads/2021/07/male-placeholder-1000x960.jpg" class="rounded-circle" width="80">
                                          </div>
                                        </div>
                                      <div class="mt-2 text-center">
                                        <h4 class="mb-0 text-secondary"><?=$pi->fullname?></h4>
                                        <span class="text-muted d-block mb-2"><?=$pi->dep_name?></span>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center mt-2 mb-2 px-4">
                                          <div class="stats">
                                            <h6 class="mb-0"><i class="fa fa-clock-o text-secondary" aria-hidden="true"></i></h6>
                                            <span>05:15</span>
                                          </div>
                                          <div class="stats">
                                            <h6 class="mb-0"><i class="fa fa-tasks text-danger" aria-hidden="true"></i></h6>
                                            <span>17</span>
                                          </div>
                                          <div class="stats">
                                            <h6 class="mb-0"><i class="fa fa-star text-warning" aria-hidden="true"></i></h6>
                                            <span>25</span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                
                            <?php } ?>    
                    </div>            
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Footer -->
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
</div>
<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
<script>$.widget.bridge('uibutton',$.ui.button)</script>
<script src="<?=base_url();?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url();?>assets/js/Chart.min.js"></script>
<script src="<?=base_url();?>assets/js/sparkline.js"></script>
<script src="<?=base_url();?>assets/js/jquery.vmap.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>
<script src="<?=base_url();?>assets/js/daterangepicker.js"></script>
<script src="<?=base_url();?>assets/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?=base_url();?>assets/js/summernote-bs4.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.overlayScrollbars.min.js"></script>
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
<script src="<?=base_url();?>assets/js/adminlte.js"></script>
<script src="<?=base_url();?>assets/js/dashboard.js"></script>
<script>
    $("#example1").DataTable({
      "responsive": false,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>
