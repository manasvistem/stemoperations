<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Review Meeting | STEM LEARNING PVT LTD </title>
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
                <h3> Add Annaul Review Meeting</h3>
              </div>
              <?php 
              $getSchoolStatus = $this->Menu_model->get_status();
             
            //   echo "<pre>";
            //   print_r($getmeet);
            //   die;
              if(sizeof($getmeet) ==0):
              ?>
              <div class="form-box text-left card p-4">
                <form class="row g-3 was-validated" action="<?=base_url();?>Menu/SubmitProgramReviewMeeting" method="post"  >
                  <div class="col-md-12">
                    <div class="formareabg">
                      <div class="card bg-primary text-center p-2">
                        <h4> <i>Project Code : </i>
                          <?= $pcode ?>
                        </h4>
                      </div>
                      <input type="hidden" class="form-control" name="pcode" value="<?= $pcode ?>" redonly >
                      
                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Add Google Meeting Link:  </label>
                        <textarea name="meetinglink" class="form-control" id="" cols="30" rows="4" required placeholder="Add Google Meeting Link Here !" ></textarea>
                        <div class="invalid-feedback">Please Add Meeting Link</div>
                      </div>
                    
                      <div class="mb-3 mt-3" id="zmcallnumdate" ></div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
                <?php endif; ?>
                
                <br/>
                <?php 
                if(sizeof($getmeet) > 0):
                ?>
                
                 <form class="row g-3 was-validated" id="reviewForm2" action="<?=base_url();?>Menu/SubmitProgramReviewMeetingYes" method="post"  >
                  <div class="col-md-12">
                    <div class="formareabg">
                      <div class="card bg-primary text-center p-2">
                        <h4> <i>Project Code : </i>
                          <?= $pcode ?>
                        </h4>
                      </div>
                      <input type="hidden" class="form-control" name="pcode" value="<?= $pcode ?>" redonly >
                      
                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Has everybody has join in google meet :  </label> <br/>
                        <select name="haseverybody" id="haseverybody" class="form-select form-control" aria-label="Default select example">
                          <option value="" selected disabled>select one</option>
                          <option value="yes">Yes</option>
                        </select>
                         <div class="invalid-feedback">Please Add Meeting Link</div>
                      </div>
                    
                      <div class="mb-3 mt-3" id="zmcallnumdate" ></div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
                <?php 
                endif;
                ?>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    <script src="<?=base_url();?>assets/js/adminlte.js"></script>
    <script src="<?=base_url();?>assets/js/dashboard.js"></script>
    
    
       <script>
        $(document).ready(function() {
            $('#reviewForm2').on('submit', function(event) {
                val = $("#haseverybody").val();
              if(val == 'yes'){
                  return true;
              }else{
                  alert("If everyone has joined the Google Meet link, select Yes and submit");
                  return false;
              }
              
            });
        });
    </script>
    
    
    
    
  </body>
</html>