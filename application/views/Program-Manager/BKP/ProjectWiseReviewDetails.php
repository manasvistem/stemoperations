<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIA Review Details with Program Report | STEM LEARNING PVT LTD </title>
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
          
            <div class="card p-3 text-center text-right bg-info ">
              <h3> <i>PIA Review Details with Program</i> </h3>
              <h4> <i>Project Code : <?= $pcode ?></i> </h4>
            </div>
            <?php 
              // dd($getcslist);
              ?>
            <div class="card p-2">
              <div id="accordion">
                <div class="">
                  <div class="card">
                    <div class="card-header" id="headingOne" style="background: green" >
                      <div class="row">
                        <div class="col-md-12">
                          <h5 class="mb-0">
                            <a class="btn" style="color:white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne<?=$i?>">
                            <b>Project Review Details By PIA : </b>
                            </a>
                          </h5>
                        </div>
                      </div>
                    </div>
                    <div id="collapseOne"  class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <div class="card table-responsive">
                          <table id="example1" class="table table-striped">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">School Name</th>
                                <th scope="col"> PIA Name</th>

                                <th scope="col"> Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $l=1;
                                foreach($piaRevData as $revData){
                                  ?>
                              <tr>
                                <td><?= $l ?></td>
                              <td>
                              <a target="_BALNK" href="<?=base_url();?>Menu/SchoolReviewDetailsByID/<?= $revData->sid ?>">
                                <?= $this->Menu_model->getSchoolNameBySid($revData->sid)?>
                               </a>
                            </td>
                              <td><?php 
                              $userdata = $this->Menu_model->get_user_byid($revData->piid);
                              echo $userdata[0]->fullname;
                              ?></td>   
                              <td>
                              <a class="btn-success p-2" href="<?=base_url();?>Menu/ReviewDataApproved/Approved/PM/<?= $revData->sid ?>">
                                    Approve
                               </a> 
                               &nbsp;
                              <a class="btn-danger p-2" href="<?=base_url();?>Menu/ReviewDataApproved/Rejected/PM/<?= $revData->sid ?>">
                                    Reject
                               </a>
                              </td>
                              </tr>
                              <?php $l++; } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
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
      
          $("#example1").DataTable({
              "responsive": false, 
                  "lengthChange": true, 
                  "autoWidth": true,
                  "searching": true,
                  "ordering": true,
                  "info": true,
                  "paging": true,
                  "dom": 'Bfrtip', 
                  "buttons": [
              'copy', 'csv', 'excel', 'pdf', 'print'
            ]
          }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
         


      });
    </script>
  </body>
</html>