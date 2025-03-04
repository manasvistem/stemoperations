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
    
<form class="p-3" method="POST" action="<?=base_url();?>/Menu/NextDayPlan">
    <input type="date" name="sdate" class="mr-2" value="<?=$sd?>">
    <input type="date" name="edate" class="mr-2" value="<?=$ed?>">
    <button type="submit" class="bg-primary text-light">Filter</button>
</form>
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
                                            <th>Name</th>
                                            <th>Plan Time</th>
                                            <th>Project Code</th>
                                            <th>School Name</th>
                                            <th>Task Type</th>
                                            <th>Purpose</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;
                                        date_default_timezone_set("Asia/Kolkata");
                                        $nextdate = date('Y-m-d', strtotime('+1 day')); 
                                        $nxtdtask=$this->Menu_model->get_nxtdtaskplan('1',$sd,$ed);
                                        $nxtdreport=$this->Menu_model->get_nxtdreportplan('1',$sd,$ed);
                                        $nxtdsummer=$this->Menu_model->get_nxtdsummerplan('1',$sd,$ed);
                                        $nxtdcuriculum=$this->Menu_model->get_nxtdcuriculumplan('1',$sd,$ed);
                                        $nxtdreview=$this->Menu_model->get_nxtdreviewplan('1',$sd,$ed);
                                        
                                        foreach($nxtdtask as $md){
                                            $startt = $md->plandate;
                                            $startt = date('d-m-Y  h:i A', strtotime($startt));
                                        ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->fullname?></td>
                                        <td><?=$startt?></td>
                                        <td><?=$md->project_code?></td>
                                        <td><?=$md->sname?></td>
                                        <td><?=$md->task_type?></td>
                                        <td><?=$md->taskname?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    
                                    
                                    <?php foreach($nxtdreport as $md){
                                            $startt = $md->plan;
                                            $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->fullname?></td>
                                        <td><?=$startt?></td>
                                        <td></td>
                                        <td></td>
                                        <td>Report Writing</td>
                                        <td><?=$md->tasktype?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    
                                    <?php foreach($nxtdsummer as $md){
                                            $startt = $md->plandt;
                                            $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->fullname?></td>
                                        <td><?=$startt?></td>
                                        <td></td>
                                        <td></td>
                                        <td>Summer Activity</td>
                                        <td><?=$md->task_type?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    
                                    
                                    <?php foreach($nxtdcuriculum as $md){
                                            $startt = $md->sdatet;
                                            $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->fullname?></td>
                                        <td><?=$startt?></td>
                                        <td></td>
                                        <td></td>
                                        <td>Curiculum Activity</td>
                                        <td><?=$md->standard?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    
                                    
                                    <?php foreach($nxtdreview as $md){
                                            $startt = $md->plant;
                                            $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->fullname?></td>
                                        <td><?=$startt?></td>
                                        <td></td>
                                        <td></td>
                                        <td>Review</td>
                                        <td><?=$md->reviewtype?></td>
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