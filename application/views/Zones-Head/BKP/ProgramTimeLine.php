<!DOCTYPE html>
<html lang="en">
<head
  <meta charset="utf-8">
  <meta name="viewport" content="wi$dth=device-wi$dth, initial-scale=1">
  <title>STEM APP | WebAPP</title>

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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/buttons.bootstrap4.min.css">
  <style>
      .scrollme {
    overflow-x: auto;
}
  </style>
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
              <h4></h4>
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
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  
                  <?php $client = $this->Menu_model->get_pendingprogramtimeline();?>
                  <h3 class="text-center">Program Planning</h3>
                  <hr>
                  <b>Pending for Planning <?=sizeof($client)?></b><hr>
                    <div class="form-group">
                        <label>Select Program</label>
                        <select class="custom-select rounded-0" name="pcode" id="pcode" >
                        <option value="">Select Program</option>
                        <?php foreach($client as $c){?>
                        <option value="<?=$c->projectcode?>"><?=$c->projectcode?></option>
                        <?php } ?>
                        </select>
                    </div>
                    
                  <hr>
                  <div id="pdetail"></div>
                  </div>
                </div>
              </div>
              
              
              <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Time Line Setting</h3>
                  <hr>
                  <div id="alldata">
                  <form action="<?=base_url();?>Menu/ptimeline" method="post">
                      <input type="hidden" name="uid" value="<?=$uid?>">
                      <input type="hidden" name="bdid" value="123">
                      <input type="hidden" name="projectcode" id="projectcode">
                      <input type="hidden" name="piid" id="piid">
                    <div class="was-validated">
                      <div class="from-group" id="b1">
                        <lable>New Session Message*</lable>
                        <?php foreach ($week as $weekNumber => $month) {?>
                        <?php } ?>
                        <input type="date" class="form-control" name="wmessage" required="">
                      </div>
                      <div class="from-group" id="b2">
                        <lable>15 Communication*</lable>
                        <input type="date" class="form-control" name="communication" required="">
                      </div>
                      <div class="from-group" id="b3">
                        <lable>10 Calls for Utilisation*</lable>
                        <input type="date" class="form-control" name="callsfu" required="">
                      </div>
                      <div class="from-group" id="b4">
                        <lable>Report Type*</lable>
                        <select class="form-control"  name="reporttype" required="">
                            <option value="8">Monthly</option>
                            <option value="4">Querterly</option>
                            <option value="1">Yearly</option>
                        </select>
                      </div>
                      <div class="from-group" id="b5">
                        <lable>FTTP</lable>
                        <input type="date" class="form-control" name="fttp">
                        <input type="hidden" class="form-control" name="replacement">
                      </div>
                      <div class="from-group" id="b6">
                        <lable>RTTP*</lable>
                        <input type="date" class="form-control" name="rttp" required="">
                      </div>
                      <div class="from-group" id="b7">
                        <lable>CaseStudy*</lable>
                        <input type="date" class="form-control" name="casestudy" required="">
                      </div>
                      <div class="from-group" id="b8">
                        <lable>Maintenance*</lable>
                        <input type="date" class="form-control" name="maintenance" required="">
                      </div>
                      <div class="from-group" id="b9">
                        <lable>DIY</lable>
                        <input type="date" class="form-control" name="diy">
                      </div>
                      <div class="from-group" id="b10">
                        <lable>Base Line M&E</lable>
                        <input type="date" class="form-control" name="blmne">
                      </div>
                      <div class="from-group" id="b11">
                        <lable>End Line M&E</lable>
                        <input type="date" class="form-control" name="elmne">
                      </div>
                      <div class="from-group" id="b12">
                        <lable>NSP</lable>
                        <input type="date" class="form-control" name="nsp">
                      </div>
                      <div class="from-group" id="b13">
                        <lable>15 Utilisation*</lable>
                        <input type="date" class="form-control" name="utilisation" required="">
                      </div>
                      <div class="from-group" id="b14">
                        <lable>ZM Visit 10% each</lable>
                        <input type="date" class="form-control" name="otherdvisit" required="">
                      </div>
                      <div class="from-group" id="b14">
                        <lable>PM Visit 10% each</lable>
                        <input type="date" class="form-control" name="otherdvisit" required="">
                      </div>
                      <div class="from-group" id="b15">
                        <lable>Other Department Call*</lable>
                        <input type="date" class="form-control"  name="otherdcall" required="">
                      </div>
                      <input type="hidden" class="form-control" name="outbondc" required="">
                      <div class="from-group" id="b17">
                        <lable>Review with BD*</lable>
                        <input type="date" class="form-control" name="bdreview" required="">
                      </div>
                      <div class="from-group" id="b18">
                        <lable>Client Engagement*</lable>
                        <input type="date" class="form-control" name="cengagement" required="">
                      </div>
                      
                      <div class="from-group">
                        <lable>Expected Status Date</lable>
                        <input type="date" class="form-control" name="exstatusdt" required="">
                      </div>
                      
                      <div class="from-group">
                        <lable>Expected Status</lable>
                        <select class="form-control" name="status" required="">
                            <option>Select Status</option>
                            <?php $status = $this->Menu_model->get_status(); foreach($status as $st){?>
                            <option value="<?=$st->id?>"><?=$st->name?></option>
                            <?php } ?>
                        </select>
                      </div>
                      
                      <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mt-2" onclick="this.form.submit(); this.disabled = true;">Set Time Line</button>
                      </div>
                    
                    </div>
                    </form>
                    </div>
                  <hr>
                  </div>
                </div>
              </div>
              
<div id="Alldata"></div>  

            
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </div>
          <!-- /.col -->
          </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

document.getElementById("b5").style.display = "none";

$('#pcode').on('change', function b() {
var pcode = this.value;
document.getElementById("projectcode").value=pcode;
    $.ajax({
    url:'<?=base_url();?>Menu/getpdetail',
    type: "POST",
    data: {
        pcode: pcode
    },
    cache: false,
    success: function a(result){
    $("#pdetail").html(result);
    }
    });
});



$('#pcode').on('change', function b() {
var pcode = this.value;
    $.ajax({
    url:'<?=base_url();?>Menu/getpyear',
    type: "POST",
    data: {
        pcode: pcode
    },
    cache: false,
    success: function a(result){
        
        if(result=='2023-24'){
            document.getElementById("b5").style.display = "none";
        }else{
            document.getElementById("b5").style.display = "block";
        }
    
    }
    });
});






$('#pcode').on('change', function b() {
var pcode = this.value;
document.getElementById("projectcode").value=pcode;
    $.ajax({
    url:'<?=base_url();?>Menu/getpalldata',
    type: "POST",
    data: {
        pcode: pcode
    },
    cache: false,
    success: function a(result){
    $("#Alldata").html(result);
    }
    });
});







</script>  
    
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