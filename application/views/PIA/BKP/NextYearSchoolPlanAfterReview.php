<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Next Year School Plan After Review | STEM LEARNING PVT LTD </title>
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
            <?php if ($this->session->flashdata('error_message')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong> <?php echo $this->session->flashdata('error_message'); ?></strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>
            <div class="card p-4">
              <div class="card p-2 bg-dark text-center">
                <h3> <i>Next Year School Plan</i> </h3>
              </div>
              <?php $getSchoolStatus = $this->Menu_model->get_status(); ?>
              <div class="form-box text-left card p-4">
                <form id="submitNextYearSchoolPlan" enctype="multipart/form-data" class="row g-3 was-validated" action="<?=base_url();?>Menu/submitNextYearSchoolPlan" method="post"  >
                  <div class="col-md-12">
                    <div class="formareabg">
                      <div class="card bg-primary text-center p-2">
                        <h5> <i>
                          <b> Project Code : </b>
                          <?= $pcode ?>
                          </i>
                        </h5>
                        <h6> <i>
                          <b> School Name : </b>
                          <?php 
                            $sdata = $this->Menu_model->get_school_detailbyid($sid);
                            
                           
                            echo $sdata[0]->sname;
                            ?>
                          </i>
                        </h6>
                      </div>
                      <input type="hidden" class="form-control" name="pcode" value="<?= $pcode ?>" redonly >
                      <input type="hidden" class="form-control" name="sid" value="<?= $sid ?>" redonly >
                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Do you need Support ? </label>
                        <input type="hidden" name="question1[]" value="Do you need Support ?">
                        <select id="question1" name="question1[]" class="form-control" required aria-label="select example">
                          <option  selected value=''disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="mb-3 mt-3">
                          <textarea id="question1_1" name="question1[]" cols="30" placeholder="Type remark which type of Support you need ? " class="form-control"  rows="1"></textarea>
                        </div>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>
                      <div class="mb-3">
                        <label for="pwd" class="form-label">Did you change Contact details ?</label>
                        <input type="hidden" name="question2[]" value="Did you change Contact details ?">
                        <select name="question2[]" class="form-control" required aria-label="select example">
                          <option  selected value=''disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">If there any offline achieve done ?</label>
                        <input type="hidden" name="question3[]" value="If there any offline achieve done ?" >
                        <select class="form-control" id="question3" name="question3[]" required aria-label="select example">
                          <option selected value=''disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="mb-3 mt-3">
                          <input type="file" class="form-control" id="question3_3" name="question3_file" value="uplod file you have offline achieve done ?">
                          <p id="fileerror" style="color:red"></p>
                        </div>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>
                      <label for="uname" class="form-label">Status Conversion Target Date </label>
                      <input type="hidden" name="schoolStatus_name[]" value="Status Conversion Target Date">
                      <select onchange="generateTable()" class="form-control" required="" name="schoolStatus_name[]" id="schoolStatus">
                        <option selected="" value="" disabled="">Select School Status</option>
                        <option value="1">New School</option>
                        <option value="2">TTP Done</option>
                        <option value="7">Inactive</option>
                        <option value="3">Utilization Initiated</option>
                        <option value="4">Average School</option>
                        <option value="5">Good School</option>
                        <option value="6">Model School</option>
                        <option value="8">Client Readiness </option>
                      </select>
                      <div class="invalid-feedback">Example invalid select feedback</div>
                      <div id="tableContainer" class="mt-2" >
                        <table class="table table-striped table-bordered" cellspacing="0" id="statusTable"></table>
                      </div>

                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Spd cleaning after review ?</label>
                        <input type="hidden" name="question4[]" value="Spd cleaning after review ?" >
                        <select id="pmVisit" name="question4[]" class="form-control" required aria-label="select example">
                          <option selected value='' disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>

                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Is their any offline task done by April first?</label>
                        <input type="hidden" name="question5[]" value="Is their any offline task done by April first?" >
                        <select id="question5" name="question5[]" class="form-control" required aria-label="select example">
                          <option selected value='' disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>
                      <div class="mb-3 mt-3">
                      <input type="text" class="form-control" placeholder="Enter Task Name" id="question5_5" name="question5[]" >
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
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
      $(document).ready(function(){
      
          $("#question1_1").hide();
          $("#question3_3").hide();
          $("#question5_5").hide();
      
          $('#question1').change(function() {
              var val = $(this).val(); 
              // alert(val);
              if(val =='Yes'){
                  $("#question1_1").show();
              }else{
                  $("#question1_1").hide(); 
              }
          });
          $('#question3').change(function() {
              var val = $(this).val(); 
              if(val =='Yes'){
                  $("#question3_3").show();
              }else{
                  $("#question3_3").hide(); 
              }
          });
          $('#question5').change(function() {
              var val = $(this).val(); 
              if(val =='Yes'){
                  $("#question5_5").show();
              }else{
                  $("#question5_5").hide(); 
              }
          });
      
          $('#submitNextYearSchoolPlan').on('submit', function(event){
              var question3 = $('#question3').val();
              if(question3=='Yes'){
              var fileInput = $('#question3_3');
              var file = fileInput[0].files[0];
              // Check if a file is selected
                  if (!file) {
                      $('#fileerror').text('Please select a file.*');
                      event.preventDefault();
                      return false;
                  }
              }
          });
      
      });
      
      function generateTable() {
          var selectedOption = document.getElementById("schoolStatus").value;
          var table = document.getElementById("statusTable");
          table.innerHTML = ""; // Clear previous table content
      
          // Define mappings based on selected option
          var mappings = {
              "1": ["New School","TTP Done","Inactive","Utilization Initiated","Average School","Good School","Model School","Client Readiness"],
              "2": ["TTP Done","Inactive","Utilization Initiated","Average School","Good School","Model School","Client Readiness"],
              "7": ["Inactive","Utilization Initiated","Average School","Good School","Model School","Client Readiness"],
              "3": ["Utilization Initiated","Average School","Good School","Model School","Client Readiness"],
              "4": ["Average School","Good School","Model School","Client Readiness"],
              "5": ["Good School","Model School","Client Readiness"],
              "6": ["Model School","Client Readiness"],
              "8": ["Client Readiness"],
          };
      
          // Generate table rows based on mappings
          var statusList = mappings[selectedOption];
          if (statusList) {
            for (var i = 0; i < statusList.length - 1; i++) { 
              var sname = statusList[i + 1].toString().toLowerCase().replace(/\s+/g, '');
              var row = table.insertRow();
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              cell1.innerHTML = statusList[i];
              cell2.innerHTML = statusList[i + 1];
              cell3.innerHTML = '<input type="hidden" name="statusConversionName[]" value="' + statusList[i] + ' to ' + statusList[i + 1] + '"><input type="date" min="<?= date("Y-m-d");?>" class="form-control" name="statusConversionDate[]" required id="stat_' + i + '" >';
            }
          } else {
              table.innerHTML = "<tr><td colspan='3'>No mapping found for selected option</td></tr>";
          }
      
          if (statusList == "Client Readiness") {
              var row = table.insertRow();
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              cell1.innerHTML = statusList[0];
              cell2.innerHTML = '<input type="hidden" name="statusConversionName[]" value="' + statusList[0] + '"><input type="date" class="form-control" name="statusConversionDate[]" required >';
          }
      }
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
  </body>
</html>