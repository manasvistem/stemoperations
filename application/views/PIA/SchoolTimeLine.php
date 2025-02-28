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
                  <?php $spdtlc = $this->Menu_model->get_spdtlc($uid);?>
                  
                  <b>Total School : <?=$spdtlc[0]->tspd?></b><br>
                  <b>Total School TimeLine Set : <?=$spdtlc[0]->tspdtl?></b>
                  <h3 class="text-center">School Planning</h3>
                  <hr>
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
                
                  <div id="pdetail"></div>
                  <div id="AcademicCalendar"></div>
                  </div>
                </div>
              </div>
              <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Time Line Setting</h3>
                  <hr>
                  <div id="alldata">
                  <form action="<?=base_url();?>Menu/stimeline" method="post">
                      <input type="hidden" value="<?=$uid?>" name="userid" id="userid">
                      <input type="hidden" name="uid" value="<?=$uid?>">
                      <input type="hidden" name="bdid" value="123">
                      <input type="hidden" name="projectcode" id="projectcode">
                      <input type="hidden" name="piid" id="piid" value="<?=$uid?>">
                      <input type="hidden" name="sid" id="sid">
                    <div class="was-validated">
                      <div class="from-group">
                        <lable>New Session Message*</lable>
                        <?php foreach ($week as $weekNumber => $month) {?>
                        <?php } ?>
                        <input type="date" max="" class="form-control" id="wmessage" name="wmessage" required="">
                      </div>
                      <div class="from-group">
                        <lable>15 Communication*</lable>
                        <input type="date" max="" class="form-control" id="communication" name="communication" required="">
                      </div>
                      <div class="from-group">
                        <lable>10 Calls for Utilisation*</lable>
                        <input type="date" max="" class="form-control" id="callsfu" name="callsfu" required="">
                      </div>
                      <div class="from-group">
                        <lable>Report Type*</lable>
                        <select class="form-control"  name="reporttype" required="">
                            <option value="8">Monthly</option>
                            <option value="4">Querterly</option>
                            <option value="1">Yearly</option>
                        </select>
                      </div>
                      <div class="from-group">
                        <lable>FTTP</lable>
                        <input type="date" max="" class="form-control" id="fttp" name="fttp">
                      </div>
                      <div class="from-group">
                        <lable>RTTP*</lable>
                        <input type="date" max="" class="form-control" id="rttp" name="rttp" required="">
                      </div>
                      <div class="from-group">
                        <lable>CaseStudy*</lable>
                        <input type="date" max="" class="form-control" id="casestudy" name="casestudy" required="">
                      </div>
                      <div class="from-group">
                        <lable>Maintenance*</lable>
                        <input type="date" max="" class="form-control" id="maintenance" name="maintenance" required="">
                      </div>
                      <div class="from-group">
                        <lable>DIY</lable>
                        <input type="date" max="" class="form-control" id="diy" name="diy">
                      </div>
                      <div class="from-group">
                        <lable>Base Line M&E</lable>
                        <input type="date" max="" class="form-control" id="blmne" name="blmne">
                      </div>
                      <div class="from-group">
                        <lable>End Line M&E</lable>
                        <input type="date" max="" class="form-control" id="elmne" name="elmne">
                      </div>
                      <div class="from-group">
                        <lable>NSP</lable>
                        <input type="date" max="" class="form-control" id="nsp" name="nsp">
                      </div>
                      <div class="from-group">
                        <lable>15 Utilisation*</lable>
                        <input type="date" max="" class="form-control" id="utilisation" name="utilisation" required="">
                      </div>
                        <input type="hidden" max="" class="form-control" id="otherdvisit" name="otherdvisit" required="">
                        <input type="hidden" max="" class="form-control"  id="otherdcall" name="otherdcall" required="">
                        <input type="hidden" max="" class="form-control" id="outbondc" name="outbondc" required="">
                        <input type="hidden" max="" class="form-control" id="bdreview" name="bdreview" required="">
                      <div class="from-group">
                        <lable>Client Engagement*</lable>
                        <input type="date" max="" class="form-control" id="cengagement" name="cengagement" required="">
                      </div>
                      <div class="from-group">
                        <lable>Expected Status Date</lable>
                        <input type="date" class="form-control" name="exstatusdt" required="">
                        <input type="hidden" class="form-control" name="replacement" required="">
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
              
              
               <table class="table">
                      <tr>
                          <th>SNo</th>
                          <th>Date</th>
                          <th>Project Code</th>
                          <th>School Name</th>
                      </tr>
                      <?php $ptl = $this->Menu_model->get_stimeline($uid); $i=1; foreach($ptl as $ptl){?>
                      <tr>
                          <td><?=$i++?></td>
                          <td><?=$ptl->sdatet?></td>
                          <td><?=$ptl->projectcode?></td>
                          <td><?=$ptl->sname?></td>
                      </tr>
                      <?php } ?>
                  </table>
              
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


$('#pcode').on('change', function b() {
document.getElementById("projectcode").value=this.value;
});

$('#spd_id').on('change', function b() {
document.getElementById("sid").value=this.value;
});



$('#pcode').on('change', function b() {
var pcode = document.getElementById("pcode").value;
var userid = document.getElementById("userid").value;
    $.ajax({
    url:'<?=base_url();?>Menu/getspdbyuserpcs1',
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
    $.ajax({
         url:'<?=base_url();?>Menu/getprogramtimelineforpi',
         method: 'post',
         data: {pcode: pcode},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           $('#wmessage').text('');
           if(len > 0){
             var wmessage = response[0].wmessage;
             
                var originalDate = wmessage;
                var dateParts = originalDate.split(' ');
                var wmessage = dateParts[0];
                
             var communication = response[0].communication;
             
                var originalDate = communication;
                var dateParts = originalDate.split(' ');
                var communication = dateParts[0];
             
             var callsfu = response[0].callsfu;
             
                var originalDate = callsfu;
                var dateParts = originalDate.split(' ');
                var callsfu = dateParts[0];
             
             var reporttype = response[0].reporttype;
             
                var originalDate = reporttype;
                var dateParts = originalDate.split(' ');
                var reporttype = dateParts[0];
             
             var casestudy = response[0].casestudy;
             
                var originalDate = casestudy;
                var dateParts = originalDate.split(' ');
                var casestudy = dateParts[0];
             
             var maintenance = response[0].maintenance;
             
                var originalDate = maintenance;
                var dateParts = originalDate.split(' ');
                var maintenance = dateParts[0];
             
             var replacement = response[0].replacement;
             
                var originalDate = replacement;
                var dateParts = originalDate.split(' ');
                var replacement = dateParts[0];
             
             var diy = response[0].diy;
             
                var originalDate = diy;
                var dateParts = originalDate.split(' ');
                var diy = dateParts[0];
             
             var blmne = response[0].blmne;
             
                var originalDate = blmne;
                var dateParts = originalDate.split(' ');
                var blmne = dateParts[0];
             
             var nsp = response[0].nsp;
             
                var originalDate = nsp;
                var dateParts = originalDate.split(' ');
                var nsp = dateParts[0];
             
             var utilisation = response[0].utilisation;
             
                var originalDate = utilisation;
                var dateParts = originalDate.split(' ');
                var utilisation = dateParts[0];
             
             var otherdvisit = response[0].otherdvisit;
             
                var originalDate = otherdvisit;
                var dateParts = originalDate.split(' ');
                var otherdvisit = dateParts[0];
             
             var otherdcall = response[0].otherdcall;
             
                var originalDate = otherdcall;
                var dateParts = originalDate.split(' ');
                var otherdcall = dateParts[0];
             
             var bdreview = response[0].bdreview;
             
                var originalDate = bdreview;
                var dateParts = originalDate.split(' ');
                var bdreview = dateParts[0];
             
             var cengagement = response[0].cengagement;
             
                var originalDate = cengagement;
                var dateParts = originalDate.split(' ');
                var cengagement = dateParts[0];
             
             var fttp = response[0].fttp;
             
                var originalDate = fttp;
                var dateParts = originalDate.split(' ');
                var fttp = dateParts[0];
             
             var rttp = response[0].rttp;
             
                var originalDate = rttp;
                var dateParts = originalDate.split(' ');
                var rttp = dateParts[0];
             
             var elmne = response[0].elmne;
             
                var originalDate = elmne;
                var dateParts = originalDate.split(' ');
                var elmne = dateParts[0];
             alert(wmessage);
             document.getElementById('wmessage').setAttribute('max', wmessage);
             document.getElementById('callsfu').setAttribute('max', callsfu);
             document.getElementById('fttp').setAttribute('max', fttp);
             document.getElementById('rttp').setAttribute('max', rttp);
             document.getElementById('casestudy').setAttribute('max', casestudy);
             document.getElementById('maintenance').setAttribute('max', maintenance);
             document.getElementById('diy').setAttribute('max', diy);
             document.getElementById('blmne').setAttribute('max', blmne);
             document.getElementById('elmne').setAttribute('max', elmne);
             document.getElementById('nsp').setAttribute('max', nsp);
             document.getElementById('utilisation').setAttribute('max', utilisation);
             document.getElementById('otherdvisit').setAttribute('max', otherdvisit);
             document.getElementById('otherdcall').setAttribute('max', otherdcall);
             document.getElementById('outbondc').setAttribute('max', outbondc);
             document.getElementById('bdreview').setAttribute('max', bdreview);
             document.getElementById('cengagement').setAttribute('max', cengagement);
             
           }
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