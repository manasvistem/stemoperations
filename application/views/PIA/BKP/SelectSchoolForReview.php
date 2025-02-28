<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Select School For Review | STEM LEARNING PVT LTD </title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <style>
      body{
      height: 100vh;
      width: 100%;
      margin: 0;
      background: #bdbdc9;
      }
      .formareabg {
      padding: 10px;
      box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
      }
      .textcenter{justify-content: center;}.selectdatebox.text-right {width: 100%;background: rgb(122 217 255 / 0.17);justify-content: right;display: flex;padding: 5px;align-items: center;justify-content: center;display: flex;height: 90px;}.set-date-form{box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px;padding:5px;}.bgtimebackground{border-radius: 24px;}.caution{background: white;padding: 5px;font-weight: 600;}.text-center.timerbg {background: #000;color: white;margin-top: 20px;padding: 8px;font-size: 16px;}.col-md-6.chartareabg {align-content: right;justify-content: right;display: flex;}#chart_div {align-content: right;justify-content: right;display: flex;}.watchtimer {width: 100%;margin-top: 70px;align-content: center;justify-content: center;display: flex;}.chartareabgset{min-height:220px;background: antiquewhite;margin-top: 10px;}.chartareabg12 {align-content: center;text-align: center;justify-content: center;display: flex;flex-wrap: wrap-reverse;margin-top: 70px;font-size: 22px;font-weight: 600;}.text-center.timerbg {color: white;font-size: 16px;width: 100%;}.planedSchoolTaskName {list-style-type: none;padding: 10px;line-height: 33px;}.planedSchoolTaskName .planedSchoolTaskName1{padding: 2px;margin: 8px;align-content: center;justify-content: center;display: flex;}.selectdatebox1{background: rgb(122 217 255 / 0.17);padding: 12px;}.totaltasktime {font-size: 22px;}.flex-wrap {flex-wrap: wrap !important;}.d-flex {display: flex !important;}.main_area .icon_sty {max-height: 120px;width: 158px;width: 164px;margin-bottom: 25px;cursor: pointer;text-decoration: none;color: black;box-shadow: rgb(0 0 0 / 5%) 0px 0px 0px 1px;padding: 10px 0px;margin: 5px;}.mhs_sty_mps{display: flex !important;align-items: center;justify-content: center;}.mhs_sty_mps_task :hover{background: rgb(122 217 255 / 0.17);transition:0.4 ease-in-out;}h6.p-2.bg-gray34.text-center.bgtimebackground {background: #005c0b;color: white;}
      .main_area .icon_sty {
      background: cadetblue;
      }
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php require('nav.php');?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid ">
            <div class="card p-4">
              <div class="card p-2 bg-dark text-center">
                <h3>Annual School Review </h3>
              </div>
              <?php 
                if ($this->session->flashdata('success_message')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> <?php echo $this->session->flashdata('success_message'); ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif; ?>
              <div class="form-box text-center card p-4">
                <div class="text-right">
                  <a class="bg-gray p-1" href="<?=base_url();?>Menu/SchoolReviewDetailsStatus">School Review Details</a>
                </div>
                <form class="row g-3" action="<?=base_url();?>Menu/schoolreviewPageForPIA" method="post"  >
                  <div class="col-md-6 offset-3">
                    <div class="formareabg">
                      <div class="parent text-left">
                        <center>
                          <lable> <strong>Select School For Review </strong></lable>
                          <br><br>
                        </center>
                        <select name="select" id="select" class="form-control selectpiker">
                        </select>
                      </div>
                      <div class="col-12 text-center">
                        <button class="btn btn-primary mt-5" type="submit">Start Review</button>
                      </div>
                    </div>
                  </div>
                </form>
                <p class="text-center p-3" id="noofschool" ></p>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
      
               var selectScStatus = $('#selectScStatus').val();
      
               $.ajax({
                   url: '<?=base_url();?>Menu/getAllSchoolinStatus',
                   type: "POST",
                   cache: false,
                   success: function a(result) {
                       $("#select").html(result);
                       var optionCount = $('#select').find('option').length;
                       $("#noofschool").text("Pending School for Review: " + optionCount);
                       $("#noofschool").css({"color": "red"});
                   }
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