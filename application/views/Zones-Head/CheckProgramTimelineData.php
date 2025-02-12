<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Timeline Data | STEM LEARNING PVT LTD </title>
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
      <?php if ($this->session->flashdata('success_message')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong> <?php echo $this->session->flashdata('success_message'); ?></strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>
        <div class="content-header">
          <div class="container-fluid ">
            <div class="card p-4">
              <div class="card p-2 bg-info text-center">
                <h3>Program Timeline Data</h3>
              </div>

              <div class="card table-responsive">
              <?php
               $gettimelinecount =  sizeof($gettimeline);
               if($gettimelinecount > 0){
               ?>
              <table id="example1" class="table table-striped">
                            <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Project Code</th>
                                        <th scope="col">WelCome Message</th>
                                        <th scope="col">1st 5 Communication</th>
                                        <th scope="col">2nd 5 Communication</th>
                                        <th scope="col">3rd 5 Communication</th>
                                        <th scope="col">1st 5 Calls for Utilisation</th>
                                        <th scope="col">2nd 5 Calls for Utilisation</th>
                                        <th scope="col">Report Type</th>
                                        <th scope="col">FTTP</th>
                                        <th scope="col">RTTP</th>
                                        <th scope="col">Replacement</th>
                                        <th scope="col">Maintenance</th>
                                       <th scope="col">Base Line M&E</th>
                                       <th scope="col">End Line M&E</th>
                                        <th scope="col">NSP</th>
                                         <th scope="col">1st 5 Utilisation</th>
                                        <th scope="col">2nd 5 Utilisation</th>
                                        <th scope="col">3rd 5 Utilisation</th>
                                        <th scope="col">Other Department Call</th>
                                        <th scope="col">1st 4 OutBond Communication</th>
                                        <th scope="col">2nd 4 OutBond Communication</th>
                                        <th scope="col">3rd 4 OutBond Communication</th>
                                        <th scope="col">Review with BD</th>
                                        <th scope="col">CaseStudy</th>
                                        <th scope="col">DIY</th>
                                        <th scope="col">Client Engagement</th>
                                        <th scope="col">Expected Status</th>
                                        <th scope="col">Expected Status Date</th>
                                       <th scope="col">ZM Visit 10% each</th>
                                        <th scope="col">PM Visit 10% each</th>
                                        <th scope="col">Summer Activity</th>
                                        <th scope="col">winter activity</th>
                                        <th scope="col">Online Activity</th>
                                        <th scope="col">Webinar</th>
                                        <th scope="col">socialMediaPost1</th>
                                        <th scope="col">socialMediaPost2</th>
                                        <th scope="col">socialMediaPost3</th>
                                        <th scope="col">socialMediaPost4</th>
                                    </tr>
                                </thead>
                              <tbody>
                              <?php 
                                    $i = 1; 
                                    foreach($gettimeline as $pdata) {
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $pdata->projectcode ?></td>
                                        <td><?= $pdata->wmessage ?></td>
                                        <td><?= $pdata->communication1 ?></td>
                                        <td><?= $pdata->communication2 ?></td>
                                        <td><?= $pdata->communication3 ?></td>
                                        <td><?= $pdata->callsfu1 ?></td>
                                        <td><?= $pdata->callsfu2 ?></td>
                                        <td><?php
                                        if($pdata->reporttype ==8){
                                            echo "Monthly";
                                        }
                                        if($pdata->reporttype ==4){
                                            echo "Quarterly";
                                        }
                                        if($pdata->reporttype ==1){
                                            echo "Yearly";
                                        }
                                        
                                        ?></td>
                                        <td><?= $pdata->fttp ?></td>
                                        <td><?= $pdata->rttp ?></td>
                                        <td><?= $pdata->replacement ?></td>
                                        <td><?= $pdata->maintenance ?></td>
                                        <td><?= $pdata->blmne ?></td>
                                        <td><?= $pdata->elmne ?></td>
                                        <td><?= $pdata->nsp ?></td>
                                        <td><?= $pdata->utilisation1 ?></td>
                                        <td><?= $pdata->utilisation2 ?></td>
                                        <td><?= $pdata->utilisation3 ?></td>
                                        <td><?= $pdata->otherdcall ?></td>
                                        <td><?= $pdata->outbondc1 ?></td>
                                        <td><?= $pdata->outbondc2 ?></td>
                                        <td><?= $pdata->outbondc3 ?></td>
                                        <td><?= $pdata->bdreview ?></td>
                                        <td><?= $pdata->casestudy ?></td>
                                        <td><?= $pdata->diy ?></td>
                                        <td><?= $pdata->cengagement ?></td>
                                       <td><?= $pdata->status ?></td>
                                       <td><?= $pdata->exstatusdt ?></td>
                                       <td><?= $pdata->zmvisit ?></td>
                                       <td><?= $pdata->pmvisit ?></td>
                                       <td><?= $pdata->summeractivity ?></td>
                                        <td><?= $pdata->winteractivity ?></td>
                                        <td><?= $pdata->onlineactivity ?></td>
                                        <td><?= $pdata->webinar ?></td>
                                        <td><?= $pdata->socialMediaPost1 ?></td>
                                        <td><?= $pdata->socialMediaPost2 ?></td>
                                        <td><?= $pdata->socialMediaPost3 ?></td>
                                        <td><?= $pdata->socialMediaPost4 ?></td>
                                    </tr>
                                <?php 
                                    $i++; 
                                    } 
                                ?>
                            </tbody>
                        </table>
                        <?php } ?>
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
           $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    </script>
  </body>
</html>