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
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <form action="<?=base_url();?>Menu/IDSPDChange" method="post">
                    <div class="form-group">
                        <label>Select Request Identification</label>
                        <select class="custom-select rounded-0" id="rid" required>
                        <option value="">Select Request Identification</option>
                        <?php $isenti = $this->Menu_model->get_bdrequestall();
                        foreach($isenti as $is){ if($is->rysn=='SSCHOOLID'){?>
                        <option value="<?=$is->id?>"><?=$is->cname?> (<?=$is->bd_name?>) (<?=$is->sdatet?>) (<?=$is->noofschool?>)</option>
                        <?php }} ?>
                        </select>
                  </div>
                  <div class="form-group">
                        <label>Select Sechool</label>
                        <select class="custom-select rounded-0" id="spd" name="sid" required></select>
                  </div>
                  
                  <div class="col card p-3">
                      <lable><center><b>New School Detail</b></center></lable><hr>
                    <input type="hidden" name="uuid" value="<?=$uid?>">
                    <lable>School Name</lable>
                    <input type="text" class="form-control" name="sname" required="">
                    <lable>Language</lable>
                    <input type="text" class="form-control" name="slanguage" required="">
                    <lable>Standard</lable>
                    <input type="text" class="form-control" name="std" required="">
                    <lable>Total Teachers</lable>
                    <input type="text" class="form-control" name="total_teachers" required="">
                    <lable>Total Student</lable>
                    <input type="text" class="form-control" name="total_students" required="">
                    <lable>Boys</lable>
                    <input type="text" class="form-control" name="boys" required="">
                    <lable>Girls</lable>
                    <input type="text" class="form-control" name="girls" required="">
                    <lable>Address</lable>
                    <input type="text" class="form-control" name="saddress" required="">
                    <lable>Pincode</lable>
                    <input type="text" class="form-control" name="spincode" required="">
                    <lable>City</lable>
                    <input type="text" class="form-control" name="scity" required="">
                    <lable>State</lable>
                    <input type="text" class="form-control" name="sstate" required="">
                    <lable>School Principal Name</lable>
                    <input type="text" class="form-control" name="contact_name" required="">
                    <lable>Contact No</lable>
                    <input type="number" class="form-control" name="contact_no" required="">
                </div>
                
                <?php $du=$this->Menu_model->get_user(); ?>
                <div class="form-group">
                    <label>Installation Person</label>
                    <select class="custom-select rounded-0" name="ins" id="ins" required>
                    <option value="">Select Installation Person</option>
                    <?php foreach($du as $d){ if($d->dep_id==4){?>
                    <option value="<?=$d->id?>"><?=$d->fullname?></option>
                    <?php }} ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>PIA</label>
                    <select class="custom-select rounded-0" name="pi" required>
                        <option value="">Select Installation Person</option>
                        <?php foreach($du as $d){ if($d->dep_id==2){?>
                        <option value="<?=$d->id?>"><?=$d->fullname?></option>
                        <?php }} ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
             </form>
          </div>
          </div>
      </div>   
     </div>     
    </section>
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>


$('#rid').on('change', function c() {
var rid = document.getElementById("rid").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getspdbyrid',
type: "POST",
data: {
rid: rid
},
cache: false,
success: function a(result){
$("#spd").html(result);
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