<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STEM Operation | WebAPP</title>

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
            <h1 class="m-0">Program Box</h1>
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
    
<?php 
    $data = $this->Menu_model->get_mytotalprogram($uid);
    $data1 = $this->Menu_model->get_mytotalprogram1($uid);
    $data2 = $this->Menu_model->get_mytotalprogram2($uid);
    $data3 = $this->Menu_model->get_mytotalprogram3($uid);
?>


<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="card card-primary card-outline col-sm col-md-12 col-lg-12 m-auto p-3 text-center">
              <div class="row">
                  <?php 
                  
                  $allbd = $this->Menu_model->get_allbdbypia($uid);
                  foreach($allbd as $allbd){
                  $bdid=$allbd->bd_id;
                  $bddata = $this->Menu_model->get_bdnamebyid($bdid);
                  $bdyear = $this->Menu_model->get_yearbybd($bdid);?>
                  
                  <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info">
                        <b>BD Name : <?=$bddata[0]->name?> | No of Project : <?=$allbd->cont?> | Installation Pending : <?=$allbd->inspen?> | Installation Done : <?=$allbd->insdone?></b>
                  </div>
                    
                  <?php foreach($bdyear as $bdyear){?>
                  
                    <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info">
                        <b>BD Name : <?=$bddata[0]->name?> | <?=$bdyear->project_year?></b>
                    </div>
                      
                 <?php $mdata = $this->Menu_model->get_Programbypi($bdid,$uid);?>
                  
                  <?php foreach($mdata as $dt){ $pid=$dt->id; $cdate=date('Y-m-d H:i:s');
                      $pcode = $dt->projectcode;
                      $pcheck = $this->Menu_model->get_ProgramCheck($pcode);
                      if($pcheck){$color = "bg-danger"; $link="Handovertoinsr";}
                      else{$color = "bg-success"; $link="FinalProgram";}
                  ?>
                 <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                     <div class="card p-3 border rounded border-success hover-div d-flex flex-column align-items-stretch h-100 text-dark">
                     <a href="<?=base_url();?>Menu/ProgramProfile/<?=$pid?>">
                     Client Name<br><b><?=$dt->client_name?></b><hr>
                     Project Code<br><b><?=$dt->projectcode?></b><hr>
                     Total School<br><b><?=$dt->tspd?></b><hr>
                     PIA Involve<br><b><?=$dt->pia?></b><hr>
                     IMP Involve<br><b><?=$dt->imp?></b><hr>
                     Last Task Performed On<br><b><?=$updatedt=$dt->updatedt?></b><hr>
                     Time Diffrence<br><b><?=$this->Menu_model->timediff($cdate,$cdate);?></b><hr></a>
                      <div class="rounded-circle bg-danger" style="position: absolute;bottom: -10px; left: 40%; transform: translateX(-50%); width: 20px; height: 20px;"></div>
                      <div class="rounded-circle bg-danger" style="position: absolute;bottom: -10px; left: 60%; transform: translateX(-50%); width: 20px; height: 20px;"></div>
                 </div>
                 </div> 
                 <?php }}} ?>
                  
              </div>
            </div> 
     </div>     
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

<!-- jquery-validation -->
<script src="<?=base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?=base_url();?>assets/js/additional-methods.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

<script>
$(function() {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
});
</script>
</body>
</html>
