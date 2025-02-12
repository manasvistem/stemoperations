<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="wi$dth=device-wi$dth, initial-scale=1">
    <title>Academic Calender Approval Request For PIA | STEM APP | WebAPP</title>
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
      .selectdatebox {
    align-items: right;
    justify-content: right;
    display: flex;
}

.ApprovedStatus{
    padding:6px 10px;
    border-radius:4px;
}
.ApprovedStatus.Pending{
   background:orange;
   color:white;
}
.ApprovedStatus.Reject{
   background:red;
   color:white;
}
.ApprovedStatus.approved{
   background:green;
   color:white;
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
            <div class="row mb-2">
              <div class="col-sm-12 col-lg-12 text-center p-3">
                <h1 class="m-0"><i>Academic Calender Approval Request For PIA</i></h1>
                <div class="text-right">
              <a class="schoolinfoa" target="_BLANK" href="<?=base_url();?>Menu/ShowPIAStatusWithAcadeCal">PIA Status</a>
              </div>
               </div>
             
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <section class="content">
          <div class="container-fluid">
            <?php if ($this->session->flashdata('approved_message')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> <?php echo $this->session->flashdata('approved_message'); ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('reject_message')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> <?php echo $this->session->flashdata('reject_message'); ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">

                    <?php 
                    foreach ($acpdata as $item) {
                          $userid = $item->piaid;
                          if (isset($useridCounts[$userid])) {
                              // Increment count if userid already exists in the array
                              $useridCounts[$userid]++;
                          } else {
                              // Initialize count to 1 if userid is encountered for the first time
                              $useridCounts[$userid] = 1;
                          }
                      }
                                      
                       ?>
                  </div>
                  <div id="accordion">
                    <?php $i=1;  foreach ($useridCounts as $userid => $count) { ?>
                    <div class="card">
                      <div class="card-header" id="headingOne<?=$i?>" style="background:green;color:white; margin: 4px 10px;"  >
                        <div class="row">
                          <div class="col-md-6">
                             <h5 class="mb-0">
                              <button class="btn text-white" data-toggle="collapse" data-target="#collapseOne<?=$i?>" aria-expanded="true" aria-controls="collapseOne<?=$i?>">
                              <?php 
                                $getRequestPiaName = $this->Menu_model->getRequestPiaName($userid);
                                ?>
                              <b>Request Name : </b><?=$getRequestPiaName ?>
                              <b>Total Request : </b><?= $count ?> 
                              </button>
                            </h5>
                          </div>
                        </div>
                      </div>
                      <div id="collapseOne<?=$i?>" class="collapse" aria-labelledby="headingOne<?=$i?>" data-parent="#accordion">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-striped">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Start Date</th>
                                  <th scope="col">End Date</th>
                                  <th scope="col">State</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Remark</th>
                                  <th scope="col">Approved Status</th>
                                  <th scope="col">Change Status</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php 

                        $uAcedata = $this->Menu_model->GetAcademickApprovalRequestForPIA($userid);
                        $i=1;
                              foreach($uAcedata as $data){ ?>
                                <tr>
                                  <td><?= $i ?></td>
                                  <td><?= $data->fdate ?></td>
                                  <td><?= $data->todate ?></td>
                                  <td><?= $data->state ?></td>
                                  <td><?= $data->type ?></td>
                                  <td><?= $data->remark ?></td>
                                  <td><?php 
                                  if($data->aprovebypm ==0 && $data->rejectbypm==0){
                                  echo "<span class='ApprovedStatus Pending'>Pending</span>";
                                  }else if($data->rejectbypm ==1 && $data->aprovebypm ==0){
                                    echo "<span class='ApprovedStatus Reject'>Reject</span>";
                                    }else if($data->aprovebypm ==1 && $data->rejectbypm ==0){
                                    echo "<span class='ApprovedStatus approved'>Approved</span>";
                                  }
                                  
                                  ?></td>
                                  <td>
                                  <button onclick="location.href = '<?=base_url();?>Menu/AcademicCalenderAppByPm/<?=$data->id; ?>/Approved';" type="button" class="btn btn-success">
                              Approved
                              </button>
                              <button onclick="location.href = '<?=base_url();?>Menu/AcademicCalenderAppByPm/<?=$data->id; ?>/Reject';"  type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalScrollable<?=$i?>">
                              Reject
                              </button>
                                  </td>
                                </tr>
                                <?php $i++; } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php $i++; } ?>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="container body-content">
                      <div class="page-header">
                        <?php $i=1; foreach($taskdata as $data){ ?>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle<?=$i?>" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle<?=$i?>">Reject Remark <?=$i?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body text-center">
                                <form action="<?=base_url();?>Menu/taskPlanRejected" method="post" >
                                  <div class="form-group">
                                    <input type="hidden" name="requuestid" value="<?= $data->id ?>">
                                    <textarea class="form-control" name="adminremarks" placeholder="Please Add Remark" rows="3"></textarea> <br>
                                    <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
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