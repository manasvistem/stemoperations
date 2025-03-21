<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stem Operation App</title>

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
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
     <div class="col-sm col-md-12 col-lg-12 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                 <div class="table-responsive">
                            <div class="table-responsive">
                                <div class="pdf-viwer">
                                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <tr>
                                            <th>S.No.</th>
                                            <th>Project Code</th>
                                            <th>School Name</th>
                                            <th>District</th>
                                            <th>State</th>
                                            <th>PIA</th>
                                            <th>Teacher Name</th>
                                            <th>Teacher Contact</th>
                                            <th>Science & Math Model Making</th>
                                            <th>TECH Quiz</th>
                                            <th>Tinkering</th>
                                            <th>Science & Math Model Making Student Details</th>
                                            <th>TECH Quiz Student Details</th>
                                            <th>Tinkering Student Details</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach($mdata as $md){
                                        ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->project_code?></td>
                                        <td><?=$md->sname?></td>
                                        <td><?=$md->sdistrict?></td>
                                        <td><?=$md->sstate?></td>
                                        <td><?php 
                                            $u=$this->Menu_model->get_user_byid($md->pi_id);
                                            echo $u[0]->fullname;
                                        ?></td>
                                        <td><?=$md->name?></td>
                                        <td><?=$md->contact?></td>
                                        <td><?=($md->model == 'YES')?'YES':'NO'?></td>
                                        <td><?=($md->quiz == 'YES')?'YES':'NO'?></td>
                                        <td><?=($md->tinker == 'YES')?'YES':'NO'?></td>
                                        <td>
                                        <?php if($md->model == 'YES'){
                                            ?>
                                            <div>
                                            <strong>Student 1 </strong></br>
                                            <strong>Name:</strong><?=$md->msname1?></br>
                                            <strong>Standard:</strong><?=$md->msstd1?></br>
                                            <strong>Parent Name:</strong><?=$md->mpname1?></br>
                                            <strong>Parent Contact:</strong><?=$md->mpcontact1?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 2 </strong></br>
                                            <strong>Name:</strong><?=$md->msname2?></br>
                                            <strong>Standard:</strong><?=$md->msstd2?></br>
                                            <strong>Parent Name:</strong><?=$md->mpname2?></br>
                                            <strong>Parent Contact:</strong><?=$md->mpcontact2?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 3 </strong></br>
                                            <strong>Name:</strong><?=$md->msname3?></br>
                                            <strong>Standard:</strong><?=$md->msstd3?></br>
                                            <strong>Parent Name:</strong><?=$md->mpname3?></br>
                                            <strong>Parent Contact:</strong><?=$md->mpcontact3?></br>
                                            </div>
                                            <?php
                                        } else {
                                            echo 'NA';
                                        }
                                        ?>
                                        </td>
                                        <td>
                                        <?php if($md->quiz == 'YES'){
                                            ?>
                                            <div>
                                            <strong>Student 1 </strong></br>
                                            <strong>Name:</strong><?=$md->tsname1?></br>
                                            <strong>Standard:</strong><?=$md->tsstd1?></br>
                                            <strong>Parent Name:</strong><?=$md->tpname1?></br>
                                            <strong>Parent Contact:</strong><?=$md->tpcontact1?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 2 </strong></br>
                                            <strong>Name:</strong><?=$md->tsname2?></br>
                                            <strong>Standard:</strong><?=$md->tsstd2?></br>
                                            <strong>Parent Name:</strong><?=$md->tpname2?></br>
                                            <strong>Parent Contact:</strong><?=$md->tpcontact2?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 3 </strong></br>
                                            <strong>Name:</strong><?=$md->tsname3?></br>
                                            <strong>Standard:</strong><?=$md->tsstd3?></br>
                                            <strong>Parent Name:</strong><?=$md->tpname3?></br>
                                            <strong>Parent Contact:</strong><?=$md->tpcontact3?></br>
                                            </div>
                                            <?php
                                        } else {
                                            echo 'NA';
                                        }
                                        ?>
                                        </td>
                                        <td>
                                        <?php if($md->tinker == 'YES'){
                                            ?>
                                            <div>
                                            <strong>Student 1 </strong></br>
                                            <strong>Name:</strong><?=$md->tisname1?></br>
                                            <strong>Standard:</strong><?=$md->tisstd1?></br>
                                            <strong>Parent Name:</strong><?=$md->tipname1?></br>
                                            <strong>Parent Contact:</strong><?=$md->tipcontact1?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 2 </strong></br>
                                            <strong>Name:</strong><?=$md->tisname2?></br>
                                            <strong>Standard:</strong><?=$md->tisstd2?></br>
                                            <strong>Parent Name:</strong><?=$md->tipname2?></br>
                                            <strong>Parent Contact:</strong><?=$md->tipcontact2?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 3 </strong></br>
                                            <strong>Name:</strong><?=$md->tisname3?></br>
                                            <strong>Standard:</strong><?=$md->tisstd3?></br>
                                            <strong>Parent Name:</strong><?=$md->tipname3?></br>
                                            <strong>Parent Contact:</strong><?=$md->tipcontact3?></br>
                                            </div>
                                            <?php
                                        } else {
                                            echo 'NA';
                                        }
                                        ?>
                                        </td>
                                    </tr>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table> 
                            </div>
                        </div>
                    </form>   
                  
                  
                  
                  
              </div>
     </div></div>
    </section>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>



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