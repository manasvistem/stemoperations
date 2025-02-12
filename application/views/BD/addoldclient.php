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
            <h1 class="m-0">Add Old Client</h1>
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
          <div class="col-lg-12 col-md-12 col-12 m-auto">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url();?>Menu/oldclientdata" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 p-3">
                              <div class="form-group">
                                <label>Project Code*</label>
                                <input type="text" list="procode" name="indata[]" class="form-control"/>
                                <datalist id="procode">
                                    <?php foreach($procode as $d){ if($d->client_name==''){?>
                                    <option value="<?=$d->projectcode?>"><?=$d->projectcode?></option>
                                    <?php }} ?>
                                </datalist>
                              </div>
                              <div class="form-group">
                                <label>Client Name*</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="" required>
                              </div>
                              <div class="form-group">
                                <label>NGO/Mediator Name</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label>Location / Village</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label>State*</label>
                                <input type="text" list="state" id="statename" name="indata[]" class="form-control"/>
                                <datalist id="state">
                                    <?php foreach($state as $d){ ?>
                                    <option value="<?=$d->statename?>"><?=$d->statename?></option>
                                    <?php } ?>
                                </datalist>
                              </div>
                              <div class="form-group">
                                <label>City*</label>
                                <select id="cityname" name="indata[]" class="form-control">
                                </select>
                              </div>
                        </div>
                        <div class="col-lg-4 p-3">
                              <div class="form-group">
                                <label>Number of School*</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="" required>
                              </div>
                              <div class="form-group">
                                <label>School Identification by</label>
                                <select class="form-control" name="indata[]" placeholder="">
                                    <option value="STEM Learning">STEM Learning</option>
                                    <option value="Client">Client</option>
                                    <option value="NA">NA</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>School Infrastructure for MSC (platform)</label>
                                <select class="form-control" name="indata[]" placeholder="">
                                    <option value="To be Provided by Client">To be Provided by Client</option>
                                    <option value="Get it done by School">Get it done by School</option>
                                    <option value="STEM to do">STEM to do</option>
                                    <option value="NA">NA</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Project Tenure*</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="" required>
                              </div>
                              <div class="form-group">
                                <label>MoU Signed Date</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label>Attech MoU</label>
                                <input type="file" class="form-control" name="indata[]" placeholder="">
                              </div>
                        </div>
                        <div class="col-lg-4 p-3">
                              <div class="form-group">
                                <label>Total Budget</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label>Attech Budget</label>
                                <input type="file" class="form-control" name="indata[]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label>GST Number</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label>Pan Number</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label>Work Order No</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label>Purchase Order No</label>
                                <input type="text" class="form-control" name="indata[]" placeholder="">
                              </div>
                        </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('#statename').on('change', function b() {
var statename = document.getElementById("statename").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getcity',
type: "POST",
data: {
statename: statename
},
cache: false,
success: function a(result){
$("#cityname").html(result);
}
});
});

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

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>
</body>
</html>
