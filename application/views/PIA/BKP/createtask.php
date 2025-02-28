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
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4><?php $username=$user['fullname']; $uid=$user['id'];$rid=$user['region_id'];?>  <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); $did[0]->dep_name;?> </h4>
            </ol>
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
              <div class="card">
                  <div class="card-header bg-primary"><h3>Create Task</h3></div>
              <div class="card-body box-profile">
                  <form action="<?=base_url();?>Menu/piataskassign" method="post">
                    <input type="hidden" value="<?=$uid?>" name="userid" id="userid">
                  
                  <div class="form-group">
                    <label>Select Task</label>
                    <select class="custom-select rounded-0" name="task_type" id="task_type" >
                        <option value="gt7">School Activation</option>
                        <option value="gt10">Utilisation</option>
                        <option value="gt3">RTTP</option>
                        <option value="gt4">Baseline MnE</option>
                        <option value="gt4">EndLine MnE</option>
                        <option value="gt5">DIY</option>
                        <option value="gt8">Case Study</option>
                        <option value="gt9">Communication</option>
                        <option value="gt6">Maintenance</option>
                        <option value="gt13">MSC Cleaning and Maintenance</option>
                        <option value="gt12">School Visit</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Physical/Virtual</label>
                    <select class="custom-select rounded-0" name="PhVi">
                        <option>Physical</option>
                        <option>Virtual</option>
                    </select>
                </div>
                  
                <div class="form-group">
                    <label>Select Client</label>
                    <select class="custom-select rounded-0" name="pcode" id="pcode" >
                    <option value="">Select Client</option>
                    <?php $client = $this->Menu_model->get_pcbypiid($uid);?>
                    <?php foreach($client as $c){?>
                    <option value="<?=$c->project_code?>"><?=$c->project_code?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>School Name</label>
                    <select class="custom-select rounded-0" name="spd_id" id="spd_id"></select>
                </div>
                
                <div class="form-group">
                    <label>Single/Cluster</label>
                    <select class="custom-select rounded-0" name="sicl" id="sicl">
                        <option>Single</option>
                        <option>Cluster</option>
                    </select>
                </div>
                
                <div id="cllist">
                    <div class="form-group">
                        <select class="custom-select rounded-0" name="cllist[]" id="spd_id1" multiple>
                        </select>
                    </div>
                </div>
                
                  <div class="form-group">
                    <label>Remark</label>
                    <textarea class="form-control" name="remark" id="remark" placeholder="Remark..."></textarea>
                  </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
             </form>
          </div></div>
      </div>   
     </div>     
    </section>
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>


$("#cllist").show();
$("#cllist").hide();
      
$('#sicl').on('change', function b() {
    var sicl = this.value;
    if(sicl=='Cluster'){$("#cllist").show();}
    else{$("#cllist").hide();}
});



$('#pcode').on('change', function b() {
var pcode = document.getElementById("pcode").value;
var userid = document.getElementById("userid").value;
    $.ajax({
    url:'<?=base_url();?>Menu/getspdbyuserpcs',
    type: "POST",
    data: {
    pcode: pcode,
    userid: userid
    },
    cache: false,
    success: function a(result){
    $("#spd_id").html(result);
    }
    });
});




$('#pcode').on('change', function b() {
var pcode = document.getElementById("pcode").value;
var userid = document.getElementById("userid").value;
    $.ajax({
    url:'<?=base_url();?>Menu/getspdbyuserpcs',
    type: "POST",
    data: {
    pcode: pcode,
    userid: userid
    },
    cache: false,
    success: function a(result){
    $("#spd_id1").html(result);
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