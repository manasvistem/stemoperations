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
            <h1 class="m-0">MONITORING & EVALUATION </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User Detail</a></li>
              <li class="breadcrumb-item active">Logout</li>
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
        <div class="row p-3">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Project Code</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Date</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>School Name</b> <a class="float-right">13,287</a>
                  </li>
                  <li class="list-group-item">
                    <b>M&E Team Name</b> <a class="float-right">13,287</a>
                  </li>
                  <li class="list-group-item">
                    <b>State</b> <a class="float-right">13,287</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-right">13,287</a>
                  </li>
                  <li class="list-group-item">
                    <b>Principal Name</b> <a class="float-right">13,287</a>
                  </li>
                  <li class="list-group-item">
                    <b>Principal N0</b> <a class="float-right">13,287</a>
                  </li>
                  <li class="list-group-item">
                    <b>Teacher Name</b> <a class="float-right">13,287</a>
                  </li>
                  <li class="list-group-item">
                    <b>Teacher No</b> <a class="float-right">13,287</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
            
            </div>
          <!-- /.col -->
          <div class="col-md-9">
  													
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">2nd MONITORING & EVALUATION CHECKLIST</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open('Menu/addspd')?>
                <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                    <?php
                    $i=1;
                    $j=1;
                    foreach($data as $d){
                        if($d->page == '2m&e'){
                    ?>
                  <li class="list-group-item">
                    <b><?=$j;?>. <?=$d->question?></b>
                    <div class="form-group clearfix mt-2">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary<? echo $i;?>" name="r<?=$d->id?>" value="YES" checked>
                        <label for="radioPrimary<? echo $i;?>">Yes</label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary<? echo $i+1;?>" name="r<?=$d->id?>" value="NO">
                        <label for="radioPrimary<? echo $i+1;?>">No</label>
                      </div>
                      <div class="form-group text-center">
                        <label>Detail/Remark</label>
                        <textarea class="form-control" rows="3" placeholder="Remark..." ></textarea>
                      </div>
                    </div>
                
                  </li><?php $j++;}$i=$i+2;} ?>
                  
                </ul>
                
                <div class="form-group">
                        <label>Comments / Concern Area: (Filled by M&E Team)</label>
                        <textarea class="form-control" rows="3" placeholder="Remark..." ></textarea>
                      </div>

              </div>
              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
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
<script src="<?=base_url();?>assets/js/myjs.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>
</body>
</html>
