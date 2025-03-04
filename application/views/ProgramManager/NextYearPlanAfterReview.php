<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Review Status | STEM LEARNING PVT LTD </title>
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
                <h3>Next Year Program Plan </h3>
              </div>
              <?php $getSchoolStatus = $this->Menu_model->get_status(); ?>
              <div class="form-box text-left card p-4">
                <form class="row g-3 was-validated" action="<?=base_url();?>Menu/submitNextYearPlan" method="post"  >
                  <div class="col-md-12">
                    <div class="formareabg">
                      <div class="card bg-primary text-center p-2">
                        <h4> <i>Project Code : </i>
                          <?= $pcode ?>
                          <?php 
                          $lastStatus = $this->Menu_model->getLastStatusofProject($pcode);
                          $getSchool = $this->Menu_model->getSchoolCountinProject($pcode);

                          $getallpIA = $this->Menu_model->getAllActivePiaList();

                          $getallInsta = $this->Menu_model->getAllActiveInstaList();

                          $getSchoolcnt = sizeof($getSchool);
                           ?>
                        </h4>
                      </div>
                      <input type="hidden" class="form-control" name="pcode" value="<?= $pcode ?>" redonly >
                      
                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Last Year Program Status is : <b> <?=$lastStatus ?></b>  </label>
                        <input type="hidden" name="lastyearProgramstatus[]" value="Last Year Program Status is:">
                      
                        <select name="lastyearProgramstatus[]" class="form-control" required aria-label="select example">
                          <option  selected value=''disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <input type="hidden" name="lastyearProgramstatus[]" value="<?=$lastStatus ?>">
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>

                  
                      <div class="mb-3">
                        <label for="pwd" class="form-label">Contact details & Data cleaning is required for the client program & when it should be done ?</label>
                        <input type="hidden" name="question2[]" value="Contact details & Data cleaning is required for the client program & when it should be done ?">
                        <input type="date" name="question2[]" class="form-control"  required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">More outbond Communication & visit should be done ?</label>
                        <input type="hidden" name="question3[]" value="More outbond Communication & visit should be done ?" >
                        <select class="form-control" id="question3" name="question3[]" required aria-label="select example">
                          <option selected value=''disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="mb-3 mt-3">
                        <input type="text" id="question3_3" name="question3[]" placeholder="Add Remarks" class="form-control" >
                      </div>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>


                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Is M&E Required for this program : </label>
                        <input type="hidden" name="isMandErequres[]" value="Is M&E Required for this program ?">
                        <select name="isMandErequres[]" class="form-control" required aria-label="select example">
                          <option  selected value=''disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>


                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Are there any other PIA included in this program?</label>
                        <input type="hidden" name="question5[]" value="Are there any other PIA included in this program?" >
                        <select class="form-control" id="question5" name="question5[]" required aria-label="select example">
                          <option selected value=''disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="mb-3 mt-3">
                        <select class="form-control" id="question5_5" name="question5[]" aria-label="select example">
                          <option selected value=''disabled>Select One</option>
                          <?php foreach($getallpIA as $pia): ?>
                          <option value="<?=$pia->id ?>"><?=$pia->fullname ?></option>
                          <?php endforeach; ?>
                        </select>
                     
                      </div>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>

                      
                      <div class="card p-2 mb-3 mt-3">
                        <label for="uname" class="form-label">Are there any Temporary PIA included in this program?</label>
                        <input type="hidden" name="question6[]" value="Are there any Temporary PIA included in this program?" >
                        <select class="form-control" id="question6" name="question6[]" required aria-label="select example">
                          <option selected value='' disabled >Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="mb-3 mt-3">
                        <label for="uname" class="form-label" id="question6_6_p"  >Enter Date When you close it ?</label>
                        <input type="date" id="question6_6" name="question6[]" placeholder="Add Temporary PIA Name" class="form-control" >
                      </div>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>


                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Are there any other Installation Person included in this program?</label>
                        <input type="hidden" name="question7[]" value="Are there any other Installation Person included in this program?" >
                        <select class="form-control" id="question7" name="question7[]" required aria-label="select example">
                          <option selected value='' disabled >Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="mb-3 mt-3">
                        <select class="form-control" id="question7_7" name="question7[]" aria-label="select example">
                          <option selected value=''disabled>Select One</option>
                          <?php foreach($getallInsta as $insta): ?>
                          <option value="<?=$insta->id ?>"><?=$insta->fullname ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>
                  
                      <div class="card p-2 mb-3 mt-3">
                        <label for="uname" class="form-label">Are there any Temporary Installation Person included in this program?</label>
                        <input type="hidden" name="question8[]" value="Are there any Temporary Installation Person included in this program?" >
                        <select class="form-control" id="question8" name="question8[]" required aria-label="select example">
                          <option selected value='' disabled >Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="mb-3 mt-3">
                        <label for="uname" class="form-label" id="question8_8_p"  >Enter Date When you close it ?</label>
                        <input type="date" id="question8_8" name="question8[]" placeholder="Type Temporary Installation Person"  class="form-control" >
                      
                      </div>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>

                      <?php 
                      $oparray  = [
                        1=>'New School',
                        2=>'TTP Done',
                        7=>'Inactive',
                        3=>'Utilization Initiated',
                        4=>'Average School',
                        5=>'Good School',
                        6=>'Model School',
                        8=>'Client Readiness'
                      ];

                   
                      $foundInactive = false;
                      $resultArray = [];
                      
                      foreach ($oparray as $key => $value) {
                          if ($value === $lastStatus) {
                              $foundInactive = true;
                          }
                          if ($foundInactive) {
                              $resultArray[$key] = $value;
                          }
                      }
                      ?>


                      <label for="uname" class="form-label">Program Status Conversion Target Date </label>
                      <input type="hidden" name="schoolStatus_name[]" value="Program Status Conversion Target Date">
                      <select onchange="generateTable()" class="form-control" required="" name="schoolStatus_name[]" id="schoolStatus">
                        <option selected="" value="" disabled="">Select Program Status</option>
                        <?php foreach($resultArray as $keys=>$opr){ ?>
                        <option value="<?=$keys ?>"><?=$opr ?></option>
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback">Example invalid select feedback</div>
                      <div id="tableContainer" class="mt-2" >
                        <table class="table table-striped table-bordered" cellspacing="0" id="statusTable"></table>
                        <div class="mb-3 mt-3">
                          <!-- <input type="date" id="clientreadiness" name="statusConversionDate[]" class="form-control" required> -->
                        </div>
                      </div>
                      <div class="mb-3 mt-3">
                      <label for="uname" class="form-label">Number of School in this Program : <b><?= $getSchoolcnt ?></b> </label><br>
                        <label for="uname" class="form-label">Is PM Visit Manadatory ? </label> 
                       
                        <input type="hidden" name="pMvisitMan[]" value="Is PM Visit Manadatory ?" >
                        <select id="pmVisit" name="pMvisitMan[]" class="form-control" required aria-label="select example">
                          <option selected value='' disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <!-- <input type="text" class="form-control"  required> -->
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>
                      <div class="mb-3 mt-3">
                        <input type="number" name="pMvisitMan[]" id="pMvisit" placeholder="Please Enter number of PM visit" class="form-control">
                      </div>
                      <div class="mb-3 mt-3" id="pMvisitdate" ></div>

                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Is PM Call Manadatory ?</label>
                        <input type="hidden" name="pmCallMan[]" value="Is PM Call Manadatory ?" >
                        <select id="pmcall" name="pmCallMan[]" class="form-control" required aria-label="select example">
                          <option selected value='' disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>
                      <div class="mb-3 mt-3">
                        <input type="number" id="pmcallnum" name="pmCallMan[]" placeholder="Please Enter number of PM Call" class="form-control" >
                      </div>
                      <div class="mb-3 mt-3" id="pmCallMandate" ></div>

                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Is ZM Call Manadatory ?</label>
                        <input type="hidden" name="zzmCallMan[]" value="Is PM visit Manadatory ?" >
                        <select id="zmcall" name="zzmCallMan[]" class="form-control" required aria-label="select example">
                          <option selected value='' disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                      </div>
                      <div class="mb-3 mt-3">
                        <input type="number" id="zmcallnum" name="zzmCallMan[]" placeholder="Please Enter number of ZM Call" class="form-control" >
                      </div>
                      <div class="mb-3 mt-3" id="zmcallnumdate" ></div>


                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Do you want to develope it in to upsell Program ? </label>
                        <input type="hidden" name="question1[]" value="Do you want to develope it in to upsell Program ?">
                        <select name="question1[]" class="form-control" required aria-label="select example">
                          <option  selected value=''disabled>Select One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
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
      $(document).ready(function() {

$("#zmcallnum").hide();
$("#zmcallnumdate").hide();
$("#pmcallnum").hide();
$("#pMvisit").hide();
$("#pMvisitdate").hide();
$("#question3_3").hide();
$("#question5_5").hide();
$("#question6_6").hide();
$("#question6_6_p").hide();
$("#question7_7").hide();
$("#question8_8").hide();
$("#question8_8_p").hide();

$('#question3').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue == 'Yes') {
        $("#question3_3").show();
    }
    if (selectedValue == 'No') {
        $("#question3_3").show();
    }
});
$('#question5').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue == 'Yes') {
        $("#question5_5").show();
    }
    if (selectedValue == 'No') {
        $("#question5_5").hide();
    }
});
$('#question6').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue == 'Yes') {
        $("#question6_6").show();
        $("#question6_6_p").show();
    }
    if (selectedValue == 'No') {
        $("#question6_6").hide();
        $("#question6_6_p").hide();
    }
});
$('#question7').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue == 'Yes') {
        $("#question7_7").show();
    }
    if (selectedValue == 'No') {
        $("#question7_7").hide();
    }
});
$('#question8').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue == 'Yes') {
        $("#question8_8_p").show();
        $("#question8_8").show();
    }
    if (selectedValue == 'No') {
        $("#question8_8").hide();
        $("#question8_8_p").hide();
    }
});


$('#pmcall').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue == 'Yes') {
        $("#pmcallnum").show();
    } else {
        $("#pmcallnum").hide();
        $("#pmcallnumdate").hide();
    }
    $('#pmcallnum').on('keyup', function() {
        var valueEntered = parseInt($(this).val());
        $('#pmCallMandate').empty();

        $("#pmCallMandate").show();
        for (var i = 0; i < valueEntered; i++) {
            // Create a new input field
            var newInputField = $('<input>').attr({
                type: 'date',
                name: 'pmCallMandate[]',
                class: 'form-control',
                placeholder: 'Please Enter PM Call Date ' + (i + 1),
                required: true
            });
            // Append the new input field to #zmcallnumdate
            $('#pmCallMandate').append(newInputField).append('<br>');
        }
    });
});

$('#zmcall').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue == 'Yes') {
        $("#zmcallnum").show();

    } else {
        $("#zmcallnum").hide();
        $("#zmcallnumdate").hide();
    }
    $('#zmcallnum').on('keyup', function() {
        var valueEntered = parseInt($(this).val());
        $('#zmcallnumdate').empty();

        $("#zmcallnumdate").show();
        for (var i = 0; i < valueEntered; i++) {
            // Create a new input field
            var newInputField = $('<input>').attr({
                type: 'date',
                name: 'zzmCallManDate[]',
                class: 'form-control',
                placeholder: 'Please Enter ZM Call Date ' + (i + 1),
                required: true
            });

            // Append the new input field to #zmcallnumdate
            $('#zmcallnumdate').append(newInputField).append('<br>');
        }

    });

});
$('#pmVisit').change(function() {
    var selectedValue = $(this).val();
    if (selectedValue == 'Yes') {
        $("#pMvisit").show();

    } else {
        $("#pMvisit").hide();
        $("#pMvisitdate").hide();
    }
    $('#pMvisit').on('keyup', function() {
        var valueEntered = parseInt($(this).val());
        $('#pMvisitdate').empty();

        $("#pMvisitdate").show();
        for (var i = 0; i < valueEntered; i++) {
            // Create a new input field
            var newInputField = $('<input>').attr({
                type: 'date',
                name: 'pMvisitManDate[]',
                class: 'form-control',
                placeholder: 'Please Enter PM Visit Date ' + (i + 1),
                required: true
            });

            // Append the new input field to #zmcallnumdate
            $('#pMvisitdate').append(newInputField).append('<br>');
        }
    });
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
              cell3.innerHTML = '<input type="hidden" name="statusConversionName[]" value="' + statusList[i] + ' to ' + statusList[i + 1] + '"><input type="date" class="form-control" name="statusConversionDate[]" required id="stat_' + i + '" >';
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