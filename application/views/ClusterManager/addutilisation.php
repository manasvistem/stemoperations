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
            <h1 class="m-0">Add Old School Detail</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12 m-auto">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url();?>Menu/utilisationsubmit" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                            <div class="col-lg-12 p-3 m-auto">
                              <div class="form-group">
                                <label>Select Project Code*</label>
                                <input type="text" list="procode" id= "projcode" name="indata[0]" class="form-control"/>
                                <datalist id="procode">
                                    <?php foreach($spd as $d){ if($d->pi_id==$uid){?>
                                    <option value="<?=$d->project_code?>"><?=$d->project_code?></option>
                                    <?php }} ?>
                                </datalist>
                              </div>
                              <div class="form-group">
                                <label>Select School</label>
                                <select name="indata[1]" class="form-control" id="spd"/>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Academic Year</label>
                                <select name="indata[2]" class="form-control" id="year"/>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Select Activity Type</label>
                                <select name="indata[3]" class="form-control" id="type"/>
                                    <option>FTTP</option>
                                    <option>RTTP</option>
                                    <option>DIY</option>
                                    <option>Utilisation</option>
                                    <option>Other</option>
                                </select>
                              </div>
                              <div class="form-group" id="no" style="display: none;">
                                    <label>No of Utilisation</label>
                                    <input type="text" class="form-control" id="noofu">
                              </div>
                              <div class="form-group" id="adate">
                                <label for="client_name">Activity Date</label>
                                <input type="Date" class="form-control" name="indata[4]">
                              </div>
                              <div class="form-group" id="report">
                                  <select name="na[]" id="na1"><option>NA</option><option>YES</option></select>
                                <label>Attach Report</label>
                                <input type="file" class="form-control" name="filname[]" id="filname1" disabled>
                              </div>
                              <div class="form-group" id="photo">
                                <select name="na[]" id="na2"><option>NA</option><option>YES</option></select>
                                <label>Attach Photo</label>
                                <input type="file" class="form-control" name="waimage[]" id="filname2" multiple disabled>
                              </div>
                              <div class="form-group" id="video">
                                  <select name="na[]" id="na3"><option>NA</option><option>YES</option></select>
                                <label>Attach Video</label>
                                <input type="file" class="form-control" name="wavideo[]" id="filname3" multiple disabled>
                              </div>
                              <div id="uti">
                              </div>
                        </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>


$('#na1').on('change', function b() {
var na1 = document.getElementById("na1").value;
if(na1=='YES'){document.getElementById("filname1").disabled = false;}
else{document.getElementById("filname1").disabled = true;}
});

$('#na2').on('change', function c() {
var na2 = document.getElementById("na2").value;
if(na2=='YES'){document.getElementById("filname2").disabled = false;}
else{document.getElementById("filname2").disabled = true;}
});

$('#na3').on('change', function d() {
var na3 = document.getElementById("na3").value;
if(na3=='YES'){document.getElementById("filname3").disabled = false;}
else{document.getElementById("filname3").disabled = true;}
});



$('#type').on('change', function e() {
var type = document.getElementById("type").value;

if(type=='Utilisation'){
    $("#no").hide();
    $("#adate").show();
    $("#report").hide();
    $("#photo").show();
    $("#video").show();
    $("#remark").show();
}else{
    $("#no").hide();
    $("#adate").show();
    $("#report").show();
    $("#photo").show();
    $("#video").show();
    $("#remark").show();
}
});


$('#noofu').on('change', function f() {
var no = document.getElementById("noofu").value;
var container = document.getElementById("uti");
for(var i=0;i<no;i++){
    
    container.innerHTML += '<hr><div class="form-group" id="adate"><label for="client_name">Activity Date</label><input type="Date" class="form-control" name="udata[][0]"></div><div class="form-group"><label>Attach Photo</label><input type="file" class="form-control" name="waimage[]" multiple></div><div class="form-group"><label>Attach Video</label><input type="file" class="form-control" name="wavideo[]" multiple></div><div class="form-group"><textarea class="form-control" name="udata[][1]" placeholder="Remark"></textarea></div>';
}

});

$('#projcode').on('change', function a() {
var projcode = document.getElementById("projcode").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getspdbycode',
type: "POST",
data: {
projcode: projcode
},
cache: false,
success: function a(result){
$("#spd").html(result);
}
});
});


$('#projcode').on('change', function b() {
var projcode = document.getElementById("projcode").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getyearu',
type: "POST",
data: {
projcode: projcode
},
cache: false,
success: function a(result){
$("#year").html(result);
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
