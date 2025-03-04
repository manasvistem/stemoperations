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
       <div class="row p-3">
           
     <div class="col-sm col-md-6 col-lg-6 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h4 class="text-center">Selse Open Ticket Review</h4>
                  <hr>
                    <div class="was-validated">
                    <div class="form-group">
                        <input type="hidden" name="uidaa" value="<?=$uid?>">
                        <?php date_default_timezone_set("Asia/Kolkata"); ?>
                        <div class="invalid-feedback">Please provide Start Date Time.</div>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="mt-4">
                            <select class="form-control" id="" name="" required="">
                                <option>On-Borded Client</option>
                                <option>New Client</option>
                            </select>
                            <div class="invalid-feedback">Please Create Plan First.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mt-4">
                            <select class="form-control" id="reqid" name="reqid" required="">
                                <option value="">Select Open Ticket</option>
                                <?php $status = $this->Menu_model->get_bdopenr();
                                foreach($status as $st){
                                ?>
                                <option value="<?=$st->id?>"><?=$st->rysn?>-<?=$st->bd_id?>-<?=$st->id?> (<?=$st->bd_name?> <?=$st->request_type?>)</option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">Please Create Plan First.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mt-4" id="reqdetail">
                            
                        </div>
                    </div>
                    </div>
              
     </div></div></div>
     
     
     <div class="col-sm col-md-6 col-lg-6 m-auto">
         <div class="card card-primary card-outline">
             <form action="<?=base_url();?>Menu/bdrreviewcomment" method="post">
                 <input type="text" class="form-control" name="rrid" id="rrid">
              <div class="card-body box-profile" id="spddata">
              </div>
                  <div class="was-validated m-3">
                    <div class="form-group">
                        <textarea class="form-control" name="rcomment" placeholder="Review Remark..."  required=""></textarea>
                    </div>
                    <hr>
                    
                    <lable>Request For Target Date Change</lable>
                    <input type="date" name="exdate" value="" class="form-control" required="" min="<?=date('Y-m-d');?>">
                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                    </div>
                    </div>
                    
                  </form>
              
     </div></div>
     
     
     
     
     
     <div class="col-sm col-md-12 col-lg-12 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <div class="table-responsive">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>								
                                          <th>S No.</th>
                                          <th>Task By</th>
                                          <th>Task Date</th>
                                          <th>Last Task Date</th>
                                          <th>Time Diff</th>
                                          <th>Detail</th>
                                        </tr>
                                    </thead>
                                
                                <tbody id="reqlogs">
                                    
                                </tbody>
                                </table>
                            </div>
                        </div>
                  
                  
                  
                  
              </div>
     </div></div>
    </section>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>






$('#reqid').on('change', function b() {
var reqid = this.value;

});



$('#reqid').on('change', function b() {
var reqid = this.value;
$.ajax({
url:'<?=base_url();?>Menu/getreqreqdetail',
type: "POST",
data: {
reqid: reqid
},
cache: false,
success: function a(result){
$("#reqdetail").html(result);
}
});
});


$('#reqid').on('change', function b() {
var reqid = this.value;
$.ajax({
url:'<?=base_url();?>Menu/getreqlogs',
type: "POST",
data: {
reqid: reqid
},
cache: false,
success: function a(result){
$("#reqlogs").html(result);
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