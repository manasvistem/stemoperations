<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Start Progrram Review | STEM LEARNING PVT LTD </title>
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
    <style>
      .formareabg {
      padding: 40px;
      box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
      }
      .flex-wrap {flex-wrap: wrap !important;}.d-flex {display: flex !important;}.main_area .icon_sty {max-height: 120px;width: 158px;width: 164px;margin-bottom: 25px;cursor: pointer;text-decoration: none;color: black;box-shadow: rgb(0 0 0 / 5%) 0px 0px 0px 1px;padding: 10px 0px;margin: 5px;}.mhs_sty_mps{display: flex !important;align-items: center;justify-content: center;}.mhs_sty_mps_task :hover{background: rgb(122 217 255 / 0.17);transition:0.4 ease-in-out;}h6.p-2.bg-gray34.text-center.bgtimebackground {background: #005c0b;color: white;}
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php require('nav.php');?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid ">
            <div class="card  p-1 text-right bg-dark text-white">
              <a href='<?=base_url();?>Menu/AnnualProgramReviewReport' traget="_blank" ><i>Annual Program Review Report</i></a>
            </div>
            <?php if ($this->session->flashdata('success_message')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong> <?php echo $this->session->flashdata('success_message'); ?></strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>
            <div class="card p-4">
              <div class=" card p-3 text-right bg-dark text-center">
                <h3><i>Annual Program Review</i> </h3>
              </div>
              <div class="form-box text--center card p-4">
                <div class="text-right">
                  <a class="bg-gray p-1" href="<?=base_url();?>Menu/ProgramReviewStatus">Go To Program Review Status</a>
                </div>
                <form class="row g-3" action="<?=base_url();?>Menu/ProgramReviewSelectByPm" method="post"  >
                  <div class="col-md-6 offset-3">
                    <div class="formareabg">
                      <div class="form-group">
                        <select  name="year" id="year" class="form-control">
                          <option disabled selected>Select Year</option>
                          <?php foreach($ally as $y){?>
                          <option><?=$y->yearn?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="parent">
                        <select name="pcode" id="pcode" class="form-control selectpiker">
                        </select>
                      </div>
                      <div class="col-12 text-center">
                        <button class="btn btn-primary mt-5" type="submit">Start Review</button>
                      </div>
                    </div>
                  </div>
                </form>
                <p class="text-center p-3" id="noofproject" ></p>
              </div>
            </div>
            <!-- <div class="container">
              <div class="row">
                <div class="main_area text-center mt-4 taskplanfortodays">
                    <div class="bg-white d-flex flex-wrap p-4 border1 mhs_sty mps">
                      <?php  foreach($ally as $y){?>
                        <a href="javascript:void(0)" style="background: rgb(<?= rand(200,255) ?> <?= rand(100,255) ?> <?= rand(0,255) ?> / 0.7)" class="icon_sty">
                            <span class="p-1"><?=$y->yearn?></span>
                        </a>
                        <?php } ?>
                    </div>
                </div>
              </div>
              </div> -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-center">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
      
           $("#pcode").hide();
                 $('#year').on('change', function c() {
         var year = document.getElementById("year").value;
         $.ajax({
         url:'<?=base_url();?>Menu/reviewspcodebyyear',
         type: "POST",
         data: {
         year: year
         },
         cache: false,
         success: function a(result){
           $("#pcode").show();
         $("#pcode").html(result);
      
         var optionCount = $('#pcode').find('option').length;
                       $("#noofproject").text("Total Number of Project: " + optionCount);
                       $("#noofproject").css({"color": "green"});
      
         }
         });
         });
       });
    </script>
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
  </body>
</html>