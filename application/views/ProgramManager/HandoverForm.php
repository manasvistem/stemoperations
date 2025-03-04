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
     <div class="col-sm col-md-12 col-lg-12 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile row">
                        
                
                <form action="<?=base_url();?>Menu/handoverchange" method="post">
                <div class="card-body">
                    <div class="was-validated">
                    <div class="form-row">
                        <div class="col-lg-4 p-3">
                                <label>Client Name</label><br>
                                <lable><?=$md->client_name?></lable><br>
                              
                                <label>NGO / Mediator if any</label><br>
                                <lable><?=$md->mediator?></lable><br>
                              
                                <label>Number of Schools</label><br>
                                <lable><?=$md->noofschool?></label><br>
                                
                              
                                <label>Location / Village</label><br>
                                <lable><?=$md->location?></label><br>
                                
                              
                                <label>City</label><br>
                                <lable><?=$md->city?></label><br>
                                
                              
                                <label>State</label><br>
                                <lable><?=$md->state?></label><br>
                                
                            </div><div class="col-lg-4 p-3">
                              
                                <label>School Identification by</label><br>
                                <?=$md->spd_identify_by?><br>
                              
                                <label>School Infrastructure for MSC (platform)</label><br>
                                <?=$md->infrastructure?><br>
                            
                                <label>Contact Person</label><br>
                                <?=$md->contact_person?><br>
                              
                                <label>Contact Person Mobile No</label><br>
                                <?=$md->cp_mno?><br>
                              
                                <label>Alternate Contact Person</label><br>
                                <?=$md->acontact_person?><br>
                              
                                <label>Alternate Contact Person Mobile No</label><br>
                                <?=$md->acp_mno?><br>
                                
                            </div><div class="col-lg-4 p-3">
                                  
                                <label>Language on backdrop required by client for MSC</label><br>
                                <?=$md->language?><br>
                                
                              
                                <label>Expected Installation Date by Client/Sales Team</label><br>
                                <?=$md->expected_installation_date?><br>
                                
                              
                                <label>Project Tenure (Year)</label><br>
                                <?=$md->project_tenure?><br>
                                
                              
                                <label>Project Type</label><br>
                                <?=$md->project_type?><br>
                                
                              
                                <label for="comments">Special Requirements / Comments :</label><br>
                                <?=$md->comments?><br>
                                
                                <hr>
                                <ul>
                                <?php foreach($budget as $bud){?>
                                    <li><?=$bud->bname?></li>
                                <?php } ?>
                                </ul>
                                
                                
                              </div>
                              
                              
                              
                              
                              
                              
                              
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class="row" id="container">
                    <?php foreach($spdc as $spdc){?>
                        <?=$spdc->sname?>, <?=$spdc->saddress?>, <?=$spdc->scity?>, <?=$spdc->sstate?>, <?=$spdc->contact_name?>, <?=$spdc->contact_no?>
                    
                    <?php } ?>
                </div>
               
                
                
                
                
                
                
                
              </div>
     </div></div>
    </section>
    
<div class="modal fade" id="imagemodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" data-dismiss="modal">
    <div class="modal-content"  >              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview1" style="width: 100%;" >
      </div>
      </div>
  </div>
</div>
    
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$(function() {
		$('.pop1').on('click', function() {
			$('.imagepreview1').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal1').modal('show');   
		});	
		$('.pop2').on('click', function() {
			$('.imagepreview2').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal2').modal('show');   
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