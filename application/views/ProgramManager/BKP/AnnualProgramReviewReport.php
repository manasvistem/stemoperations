<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Annual Program Review Report | STEM LEARNING PVT LTD </title>
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
    .autoTaskbyPm,.autoTasksuccess,.autoTaskerror{
        padding:6px 8px;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
    }
    .autoTasksuccess{
        color:white;
        background:green;
    }
    .autoTaskerror{
        color:white;
        background:red;
    }

    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php require('nav.php');?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid ">
            <div class="card  p-1 text-right bg-dark text-white">
              <a href='<?=base_url();?>Menu/StartProgrramReview' traget="_blank" ><i>Go to Progrram Review</i></a>
            </div>
            <div class="card p-3 text-center text-right bg-dark ">
              <h3> <i>Annual Program Review Report</i> </h3>
              <h5><i>
                <?php if(isset($spcode)): ?>
                <?= 'Project Code - '.$spcode ?>
                <?php endif; ?>
              </i></h5>
              <h6><i>
              <?php if(isset($syear)): ?>
                <?= 'Year - '.$syear ?>
                <?php endif; ?>
              </i></h6>
            </div>
            <div class="card p-3">
              <form class="row g-3" action="<?=base_url();?>Menu/AnnualProgramReviewReport" method="post"  >
                <div class="form-group mb-2">
                  <select  name="year" id="year" class="form-control">
                    <option disabled selected>Select Year</option>
                    <?php foreach($ally as $y){?>
                    <option><?=$y->year?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <select name="pcode" id="pcode" class="form-control selectpiker">
                  </select>
                  <!-- <p id="noofproject"></p> -->
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <button class="btn btn-primary" type="submit">Check Report</button>
                </div>
              </form>
            </div>
            <div class="card p-2">
              <?php 
                $result = [];
                foreach ($annualpro as $item) {
                    $sid = $item->sid;
                
                    if (!array_key_exists($sid, $result)) {
                        $result[$sid] = [];
                    }
                    $result[$sid][] = $item;
                }
                ?>
              <div id="accordion">
                <?php 
                  $i=1;  foreach ($result as $spdh => $spd) {
                      $reviewdonecount = sizeof($result);
                   
                      $rt = $this->Menu_model->get_school_detailbyid($spdh);
                    //   $autotaskByPm = $this->Menu_model->getAutoTaskByPM($spcode,$spdh);
                        $yesArray = array();
                        $noArray = array();
                        foreach ($spd as $object) {
                            if ($object->checklist === 'Yes') {
                                $yesArray[] = $object;
                            } else {
                                $noArray[] = $object;
                            }
                        }
                  
                  ?>

                        <input type="hidden" id="scount" value="<?=$reviewdonecount?>">

                <form id="programreviewform" action="<?=base_url();?>Menu/ProgramReviewByPm" method="post" onsubmit="return validateForm()" >
                  <div class="was-validated">
                    <div class="card">
                      <?php
                        if ($reviewdonecount !== 0) {
                            // $background_color = "background:green;color:white;";
                            // $margin = "margin: 4px 10px;";
                            // $color = "color:#fff;";
                            // $style = $background_color . $margin. $color;
                            $comStaus = "<b> - Complete</b>";
                            
                        }else{
                            // $background_color = "background: rgba(" . rand(200, 255) . ", " . rand(100, 255) . ", " . rand(0, 255) . ", 0.8);";
                            // $margin = "margin: 4px 10px;";
                            // $style = $background_color . $margin;
                            $comStaus = '';
                        }
                        ?>
                      <div class="card-header" id="headingOne<?=$i?>" style="background: rgb(<?= rand(200,255) ?> <?= rand(100,255) ?> <?= rand(0,255) ?> / 0.7); margin: 4px 10px;" >
                        <div class="row">
                          <div class="col-md-12">
                            <h5 class="mb-0">
                              <a class="btn" data-toggle="collapse" data-target="#collapseOne<?=$i?>" aria-expanded="true" aria-controls="collapseOne<?=$i?>">
                              <b>School Name : </b><?= $rt[0]->sname ?>  <?= $comStaus ?>
                              </a>
                            </h5>
                          </div>
                        </div>
                      </div>
                      <?php
                        //    if($i==1){$show = 'show';}else{$show ='';}
                            ?>
                      <div id="collapseOne<?=$i?>" class="collapse" aria-labelledby="headingOne<?=$i?>" data-parent="#accordion">
                        <div class="card-body">
                          <div class="card table-responsive">
                            <!-- <div class="card p-1 text-center bg-success">
                                <h6>Here is Data which 'checklist' set to 'Yes'</h6>
                            </div> -->
                            <table id="example<?=$i?>" class="table table-striped">
                            <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Remarks </th>
                                        <th scope="col">Check List</th>
                                        <!-- <th scope="col">Is Autotask </th> -->
                                    </tr>
                                </thead>
                              <tbody>
                                <?php 
                                $l=1;
                                foreach($spd as $yes){
                                  ?>
                                <tr>
                                  <td><?= $l ?></td>
                                  <td><?= $yes->question?></td>
                                  <td><?= $yes->value?>
                                </td>
                                  <td><?= $yes->remarks?></td>
                                  <td><?= $yes->checklist?></td>
                                  <!-- <td><?= $yes->is_autotask?></td> -->
                                </tr>
                                <?php $l++; } ?>
                              </tbody>
                            </table>
                            <!-- <div class="card p-1 text-center bg-warning text-white">
                                <h6>Here is Data which 'checklist' set to 'No'</h6>
                            </div>
                            <table class="table table-striped">
                            <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Remarks </th>
                                        <th scope="col">Check List</th>
                                        <th scope="col">Is Autotask </th>
                                    </tr>
                                </thead>
                              <tbody>
                                <?php 
                                $j=1;
                                foreach($noArray as $yes){
                                  ?>
                                <tr>
                                  <td><?= $j ?></td>
                                  <td><?= $yes->question?></td>
                                  <td><?= $yes->value?></td>
                                  <td><?= $yes->remarks?></td>
                                  <td><?= $yes->checklist?></td>
                                  <td><?= $yes->is_autotask?></td>
                                </tr>
                                <?php $j++; } ?>
                              </tbody>
                            </table> -->
                            <!-- <div class="card p-1 text-center bg-primary text-white">
                                <h6>Auto Task Assign After Review</h6>
                            </div>
                            <table class="table table-striped">
                            <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Task Name</th>
                                        <th scope="col">School Name </th>
                                        <th scope="col">Remarks </th>
                                        <th scope="col">Assign User Name </th>
                                        <th scope="col">Is Autotask </th>
                                        <th scope="col">Completed </th>
                                        <th scope="col">Created Date </th>
                                    </tr>
                                </thead>
                              <tbody>
                                <?php 
                                $j=1;
                                foreach($autotaskByPm as $auto){
                                  ?>
                                <tr>
                                  <td><?= $j ?></td>
                                  <td><?= $auto->taskname?></td>
                                  <td><?= $rt[0]->sname ?></td>
                                  <td><?= $auto->remarkByPm?></td>
                                  <td><?php
                                   $userdttld = $this->Menu_model->get_user_byid($auto->user_id);
                                   echo $userdttld[0]->fullname;
                                  ?></td>
                                  <td><?php 
                                  if($auto->autoTaskbyPm == 1){
                                    echo "<span class='autoTaskbyPm autoTasksuccess'>Yes</span>";
                                  }
                                  ?></td>
                                  <td><?php
                                    if($auto->completed == 1){
                                        echo "<span class='autoTasksuccess'>Yes</span>";
                                      }else{
                                        echo "<span class='autoTaskerror'>Pending</span>";
                                      }
                                  ?></td>
                                  <td><?= $auto->created_at?></td>
 
                                </tr>
                                <?php $j++; } ?>
                              </tbody>
                            </table> -->
                        
                          </div>
                </form>
                </div>
                </div>
                </div>
                </div>
                <?php $i++; } ?>
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
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
      
           $("#pcode").hide();
                 $('#year').on('change', function c() {
         var year = document.getElementById("year").value;
      
         $.ajax({
         url:'<?=base_url();?>Menu/donereviewspcodebyyear',
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
    <script>
$( document ).ready(function() {
var scount = $("#scount").val();
for(var i = 1; i <= scount; i++)
    {
        var str = 'example'+i+'_wrapper';
    $("#example"+i).DataTable({
        "responsive": false, 
            "lengthChange": false, 
            "autoWidth": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "paging": false,
            "dom": 'Bfrtip', 
            "buttons": [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    }).buttons().container().appendTo('#'+str+' .col-md-6:eq(0)');
    }

});
</script>
  </body>
</html>