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
                                            <th>Date</th>
                                            <th>BD Name</th>
                                            <th>Admin Name</th>
                                            <th>School Name</th>
                                            <th>Remark</th>
                                            <th>Assign Task</th>
                                            <th>Expacted Date</th>
                                            <th>Expacted Status</th>
                                            <th>Review Time Status</th>
                                            <th>Current Status</th>
                                            <th>Detail</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach($mdata as $md){
                                            
                                            $sdatet=$md->sdatet;
                                            $sdatet = date('d-m-Y  h:i A', strtotime($sdatet));
                                        ?>
                                        
                                        

                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$sdatet?></td>
                                        <td><?=$md->bdname?></td>
                                        <td><?=$md->pstname?></td>
                                        <td><?=$md->sname?><?=$md->projectcode?></td>
                                        <td><?=$md->remark?></td>
                                        <td><?=$md->taction?> (<?=$md->tstaction?>)</td>
                                        <td><?=$md->exdate?></td>
                                        <td><?=$md->exname?></td>
                                        <td><?=$md->rtsname?></td>
                                        <td><?=$md->csname?></td>
                                        <td><?php if($rdata[0]->reviewtype=='School Self Review'){?>
                                        <p>Is School teachers are Added on WhatsApp Group?<br><b><?=$md->awg?></b></p>
                                        <p>What is Current Categories of school?<br><b><?=$md->categories?></b></p>
                                        <p>What is the Reason for This Categories?<br><b><?=$md->categreason?></b></p>
                                        <p>What kind of Relation you have build with this school?<br><b><?=$md->relation?></b></p>
                                        <p>Are you connected with teachers on social Media<br><b><?=$md->socialmedia?></b></p>
                                        <p>Is school participated in NSP?<br><b><?=$md->nsp?></b></p>
                                        <p>How many student participated in NSP?<br><b><?=$md->nspno?></b></p>
                                        <p>Is school Participated in webinar and Summer activity?<br><b><?=$md->summeractivity?></b></p>
                                        <p>How many students participated in Summer camp Activities?<br><b><?=$md->scno?></b></p>
                                        <p>Any Support required to school?<br><b><?=$md->support?></b></p>
                                        <p>Is DIY activity conducted in last academic year?<br><b><?=$md->diy?></b></p>
                                        <p>Is there any up sell opportunity from School?<br><b><?=$md->opportunity?></b></p>
                                        <p>Did you get case study from this school?<br><b><?=$md->casestudy?></b></p>
                                        <p>What kind of utilization you get from school?<br><b><?=$md->utilizationtype?></b></p>
                                        <p>Is school logs after april 2023 activity are as per your plan actions?<br><b><?=$md->logsactivity?></b></p>
                                        <?php } ?>
                                        <?php if($rdata[0]->reviewtype=='Program Self Review'){?>
                                        <p>Is program/project come in mandatory category?<br><b><?=$md->pcategory?></b></p>
                                        <p>Is case study generated for this project code?<br><b><?=$md->pcasestudy?></b></p>
                                        <p>What sort of reports are requested by BD for this project code?<br><b><?=$md->preports?></b></p>
                                        <p>Is there any up sell opportunity?<br><b><?=$md->psell?></b></p>
                                        <p>Is schools are located in Aspirational District?<br><b><?=$md->paspirational?></b></p>
                                        <p>Is WhatsApp Group created for program?<br><b><?=$md->pwg?></b></p>
                                        <p>Is Admin number added in WhatsApp group?<br><b><?=$md->pwga?></b></p>
                                        <?php } ?>
                                        </td>
                                    </tr></a>
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