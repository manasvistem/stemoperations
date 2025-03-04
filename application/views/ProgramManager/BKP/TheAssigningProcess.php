<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STEM Oppration | WebAPP</title>
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
      tr td:first-child {
      color:rgb(237, 2, 132); /* Light red for first td */
      font-weight: 600;
      }
      tr td:nth-child(2) {
      color: black; /* Text color */
      }
      select#choices-multiple-remove-button {
      height: 200px;
      }
      lable {
      font-weight: 700;
      }
      label.mt-2 {
            color: navy;
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
            <?php if ($this->session->flashdata('pending_message')): ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?= $this->session->flashdata('pending_message'); ?>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success_message')): ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?= $this->session->flashdata('success_message'); ?>
            </div>
            <?php endif; ?>
            <?php
              if ($this->session->flashdata('error_message')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong> <?php echo $this->session->flashdata('error_message'); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>
            <?php  

              $request_type = $reqData[0]->request_type;
              $color_code = $reqData[0]->color_code;
              $request_code = $reqData[0]->request_code;
              ?>
            <div class="row mb-2">
              <div class="col-sm-12 text-center bg-primary p-2">
                <h2 class="m-0">The Assigning Process for </h2>
                <h5 class="m-0"><?=$request_type?></h5>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <?php 
        //   dd($bdr);
          $sales_cid = $bdr[0]->sales_cid;
          $targetd = $bdr[0]->targetd;
           ?>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <table class="table table-sm">
                    <tbody>
                      <tr class="table-primary">
                        <td>Request Type</td>
                        <td><?= $bdr[0]->request_type; ?></td>
                      </tr>
                      <tr class="table-secondary">
                        <td>Request Name</td>
                        <td><?= $bdr[0]->bd_name; ?></td>
                      </tr>
                      <tr class="table-success">
                        <td>Request Date</td>
                        <td><?= $bdr[0]->sdatet; ?></td>
                      </tr>
                      <tr class="table-warning">
                        <td>Target Date</td>
                        <td><?= $targetd; ?></td>
                      </tr>
                      <tr class="table-info">
                        <td>Request No Of School</td>
                        <td><?= $bdr[0]->noofschool; ?></td>
                      </tr>
                      <tr class="table-primary">
                        <td>Identification Type</td>
                        <td><?= $bdr[0]->idetype; ?></td>
                      </tr>
                      <tr class="table-secondary">
                        <td>Type of School</td>
                        <td><?= $bdr[0]->schooltype; ?></td>
                      </tr>
                      <tr class="table-success">
                        <td>Location</td>
                        <td><?php 
                          if($bdr[0]->vlocation == ''){
                              echo "<span class='bg-danger p-1'>N/A</span>";
                          }else{
                              echo $bdr[0]->vlocation;
                          }
                          ?></td>
                      </tr>
                      <tr class="table-warning">
                        <td>Attach NGO Letter (only pdf)</td>
                        <td><?php 
                          $ngoletter = $bdr[0]->ngoletter;
                          if($ngoletter == 'uploads/day/'){
                            echo "<span class='bg-danger p-1'>N/A</span>";
                          }else{
                            echo "<a href='https://stemapp.in/".$ngoletter."' target='BLANK' class='bg-success p-1'>view</a>";
                          }
                          ?></td>
                      </tr>
                      <tr class="table-info">
                        <td>School Letter Required</td>
                        <td><?= $bdr[0]->sletter; ?></td>
                      </tr>
                      <tr class="table-primary">
                        <td>DM/DEO Letter Required</td>
                        <td><?= $bdr[0]->dmletter; ?></td>
                      </tr>
                      <tr class="table-secondary">
                        <td>Client Validation</td>
                        <td><?= $bdr[0]->svalidation; ?></td>
                      </tr>
                      <tr class="table-warning">
                        <td>Request Reamrks</td>
                        <td><?= $bdr[0]->remark; ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="card" id="assing-process-image-card">
                    <img src="https://i.ibb.co/qYR5vk80/122222222.png" id="assing-process-image"  class="img-fluide" alt="assing-process-image">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card card-form col-md-12" style="background:#dcf3ffed">
                    <div class="card-header bg-info">Assign To</div>
                    <div class="col-lg-12 card-body">
                      <?=form_open('Menu/BDRequestAssignToProcess')?>
                      <input type="hidden" id="tid" value="<?=$reqID;?>" name="reqID">
                      <input type="hidden" id="request_code" value="<?=$request_code;?>" name="request_code">
                      <input type="hidden" id="sales_cid" value="<?=$sales_cid;?>" name="sales_cid">
                      <input type="hidden" name="uid" value="<?=$user['id']?>">
                      <select id="choices-multiple-remove-button" required name="assignto[]" class="form-control" multiple>
                        <?php $pia=$this->Menu_model->get_user();
                          foreach($pia as $pia){if($pia->dep_id==2){?>
                        <option value="<?=$pia->id?>"><?=$pia->fullname?></option>
                        <?php }} ?>
                      </select>
                      <small id="total_userfind"></small><br>
                      <small id="selected_userfind"></small>
                      <hr>
                      <div id="selected-inputs"></div>
                      <hr>
                      <lable>Expected Date</lable>
                      <input type="date" class="form-control" max="<?=$targetd;?>" name="exdate" required>
                      <hr>
                      <lable>Reamrks</lable>
                      <textarea class="form-control" name="remark" id="remark" required placeholder="Remark"></textarea>
                      <hr>
                      <lable><b>ZM Approval</b></lable>
                      <br>
                      <input type="radio" name="zmapr" value="1">
                      <label for="html">Required</label><br>
                      <input type="radio" name="zmapr" value="0">
                      <label for="0">not Required</label><br>
                    </div>
                    <center>
                      <button type="submit" style="width:100px;" class="btn btn-primary mt-3" id="requestsubmit">Submit</button>
                    </center>
                    </form>
                  </div>
                </div>
              </div>
              <input type="hidden" value="<?= $bdr[0]->noofschool; ?>" id="target_noofschool">
            </div>
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
    <script src="<?=base_url();?>assets/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?=base_url();?>assets/js/dashboard.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      $(document).ready(function () {
        // $("#assing-process-image-card").hide();
        var optionCount = $('#choices-multiple-remove-button').find('option').length;
         $("#total_userfind").text('Total User : '+ optionCount);

            var target_noofschool = $("#target_noofschool").val();
            $('#choices-multiple-remove-button').on('change', function() {
                       var selectedOptions = $(this).find('option:selected');
                       var selectedOptions_lenth = selectedOptions.length;
                      $("#selected_userfind").text('selected user : '+ selectedOptions_lenth);
                      if (selectedOptions.length > target_noofschool) {

                            alert('You can select only '+target_noofschool+' user at a time due to the number of school requests.');
                            selectedOptions = selectedOptions.slice(-target_noofschool); 
                            // Reset the selected options in the dropdown
                            $('#choices-multiple-remove-button').val();
                            $('#choices-multiple-remove-button').val(selectedOptions);

                            var selectedOptions = $(this).find("option:selected"); // Get selected options
                            var optionCount = selectedOptions.length; // Count selected options
                            $("#selected_userfind").text("Selected Users: " + optionCount);

                      }else{
                        var selectedOptions = $(this).find("option:selected"); // Get selected options
                        var optionCount = selectedOptions.length; // Count selected options
                        $("#selected_userfind").text("Selected Users: " + optionCount);
                      }
                  });
      });
    </script>
    <script>
  $(document).ready(function() {
    $('#choices-multiple-remove-button').change(function() {
      // Clear previous inputs
      $('#selected-inputs').empty();
      $("#assing-process-image-card").show();
      // Loop through selected options
      $('#choices-multiple-remove-button option:selected').each(function() {
        var optionText = $(this).text(); // Get option text
        var optionValue = $(this).val(); // Get option value

        // Create a label with option text
        var label = $('<label>', {
          text: optionText+' (Research Tasks)',
          class: 'mt-2'
        });

        // Create a number input field
        var inputField = $('<input>', {
          type: 'number',
          name: 'assign_task[]',
          class: 'form-control mt-2',
          placeholder: 'Enter Number of Research Tasks',
          'data-option-value': optionValue,
          required: true 
        });

        // Append label and input field to the selected-inputs div
        $('#selected-inputs').append(label).append(inputField);
      });
    });


    $('#requestsubmit').click(function(e) {
    let total = 0;
    // Iterate through each input field and sum the values
    $('#selected-inputs input[name="assign_task[]"]').each(function() {
      let value = $(this).val();
      if(value) { // Check if value is not empty
        total += parseFloat(value);
      }
    });
    var target_noofschool = $("#target_noofschool").val();
    if(total > target_noofschool){
        alert('you want to create a total of task : ' + total+ ' but the bd only wants '+target_noofschool+' school');
        return false;
    } if(total < target_noofschool){
        alert('you want to create a total of task : ' + total+ ' but the bd wants '+target_noofschool+' school, Please increase the number of task.');
        return false;
    }else if(total == target_noofschool){
        return true;
    }
    // Show the total sum in an alert
   
 


  });



  });
</script>
  </body>
</html>