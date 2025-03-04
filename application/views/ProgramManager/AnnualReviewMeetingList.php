<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Review Meeting List And Status | STEM LEARNING PVT LTD </title>
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
              <div class="card p-2 bg-dark text-center">
                <h3>Annaul Review Meeting Status</h3>
              </div>

              <div class="card table-responsive">
              <div class="card p-2 bg-warning text-center">
                <h3>Pending Meeting</h3>
              </div>
              <?php
               $pendingcount =  sizeof($meetDataPending);
               if($pendingcount > 0){
               ?>
              <table id="example1" class="table table-striped">
                            <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Host Name</th>
                                        <th scope="col">Project Code</th>
                                        <th scope="col">Meeting Link </th>
                                        <th scope="col">Join Meeting</th>
                                        <!--<th scope="col">Go to Program Timeline</th>-->
                                        <th scope="col">Start Date & Time</th>         
                                        <!-- <th scope="col">End Date & Time</th>          -->
                                        <th scope="col">Remarks</th>         
                                        <th scope="col">Status</th>       
                                        <th scope="col">Recorded Call Link </th> 
                                        <th scope="col">Created At</th>         
                                        <!-- <th scope="col">Actions</th>          -->
                                    </tr>
                                </thead>
                              <tbody>
                                <?php $i=1; foreach($meetDataPending as $pdata): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>
                                    <?php
                                    $userData = $this->Menu_model->get_user_byid($pdata->uid);
                                     ?>
                                     <b><?= $userData[0]->fullname ?></b>
                                     </td>
                                    <td><?= $pdata->projectcode ?></td>
                                    <td><?php
                                      
                                     $pattern = '/(https?:\/\/\S+)/';
                                    // Replace the URLs with anchor tags
                                    $result = preg_replace($pattern, '<a href="$1">$1</a>', $pdata->meetinglink);
                                     echo $result;
                                     
                                     ?></td>
                                    <td>
                                        <?php
                                        $pattern = '/https?:\/\/\S+/';
                                        preg_match_all($pattern, $pdata->meetinglink, $matches);
                                        $link = $matches[0][0];
                                     ?>
                                     <b><a href="<?= $link ?>" target="_BLANK">Join</a></b>
                                     </td>
                                     <!--<td>-->
                                     <!--   <b><a href="<?=base_url();?>Menu/ProgramPlanningTimeLine?pcode=<?= $pdata->projectcode ?>" target="_BLANK">Go to Program Timeline Page</a></b>-->
                                     <!--</td>-->
                                    <td><?= $pdata->start ?></td>
                                    <!-- <td><?= $pdata->end ?></td> -->
                                    <td><?= $pdata->remark ?></td>
                                    <td><?php
                                    if($pdata->status == 0){echo '<button type="button" class="btn btn-warning">Pending</button>';}else{echo '<button type="button" class="btn btn-success">Success</button>';}
                                     ?></td>
                                     
                                     <td><?php
                                    if($pdata->recorded_call_link == ''){ ?>
                                  
                                        <a target="_BLANK" class="bg-warning p-2 m-1" href ="<?=base_url();?>Menu/RecordedCallAddLink?pcode=<?=$pdata->projectcode ?>">Update&nbsp;Link</a>
                                    <?php }else{ ?>
                                       <a target="_BLANK" class="bg-success p-2 m-1"  href ="<?= $pdata->recorded_call_link ?>"><?= $pdata->recorded_call_link ?></a>
                                   <?php }
                                    ?>
                                     </td>
                                     
                                     
                                    <td><?= $pdata->created_at ?></td>
                                    <!-- <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?=$i?>" >Close</button>
                                    <div class="modal fade" id="exampleModalCenter<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Close Meeting of : <?= $pdata->projectcode ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form class="row g-3 was-validated" action="<?=base_url();?>Menu/CloseAnnaualReviewMeeting" method="post"  >
                                            <div class="col-md-12">
                                                <div class="formareabg">
                                                <input type="hidden" class="form-control" name="pcode" value="<?= $pdata->projectcode ?>" redonly >
                                                
                                                <div class="mb-3 mt-3">
                                                    <label for="uname" class="form-label">Meeting Consuming Time (in Minutes):</label>
                                                    <input type="number" name="meetingconsuming" class="form-control" placeholder="type meeting time in minute" required >
                                                    <div class="invalid-feedback">Please Add Meeting Remark</div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="uname" class="form-label">Add Meeting Remark:</label>
                                                    <textarea name="meetingremark" class="form-control" id="" cols="30" rows="4" required placeholder="Add Add Meeting Remark Here !" ></textarea>
                                                    <div class="invalid-feedback">Please Add Meeting Remark</div>
                                                </div>
                                                
                                                <div class="mb-3 mt-3" id="zmcallnumdate" ></div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    </td> -->
                                </tr>
                                <?php $i++; endforeach; ?>
                    </tbody>
    </table>
    <?php } ?>
            </div>



            <div class="card table-responsive">
              <div class="card p-2 bg-success text-center">
                <h3>Success Meeting</h3>
              </div>
              <?php
                $successcount =  sizeof($meetDataSuccess);
               if($successcount > 0){
               ?>
              <table id="example2" class="table table-striped">
                            <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Host Name</th>
                                        <th scope="col">Project Code</th>
                                        <th scope="col">Meeting Link </th>
                                        <th scope="col">Start Date & Time</th>         
                                         <th scope="col">End Date & Time</th>          
                                        <th scope="col">Remarks</th>         
                                        <th scope="col">Close Remarks</th>         
                                        <!-- <th scope="col">Consuming Time</th>          -->
                                        <th scope="col">Status</th>         
                                        <th scope="col">Recorded Call Link </th>         
                                        <th scope="col">Created At</th>         
                                       
                                    </tr>
                                </thead>
                              <tbody>
                                <?php $i=1; foreach($meetDataSuccess as $pdata): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>
                                    <?php
                                    $userData = $this->Menu_model->get_user_byid($pdata->uid);
                                     ?>
                                     <b><?= $userData[0]->fullname ?></b>
                                     </td>
                                    <td>
                                    <a href="<?=base_url();?>Menu/CheckProgramTimelineData" class="nav-link">
                                    <?= $pdata->projectcode ?>
                                    </a>
                                       
                                    </td>
                                    <td><?php
                                      
                                     $pattern = '/(https?:\/\/\S+)/';
                                    // Replace the URLs with anchor tags
                                    $result = preg_replace($pattern, '<a href="$1">$1</a>', $pdata->meetinglink);
                                     echo $result;
                                     
                                     ?></td>
                                  
                                    
                                    <td><?= $pdata->start ?></td>
                                     <td><?= $pdata->end ?></td> 
                                    <td><?= $pdata->remark ?></td>
                                    <td><?= $pdata->closeremarks ?></td>
                                    <!-- <td><?= $pdata->consumetime ?> Minutes </td> -->
                                    <td><?php
                                    if($pdata->status == 0){echo '<button type="button" class="btn btn-warning">Pending</button>';}else{echo '<button type="button" class="btn btn-success">Complete</button>';}
                                     ?></td>
                                     
                                      <td><?php
                                    if($pdata->recorded_call_link == ''){ ?>
                                  
                                        <a target="_BLANK" class="bg-warning p-2 m-1" href ="<?=base_url();?>Menu/RecordedCallAddLink?pcode=<?=$pdata->projectcode ?>">Update&nbsp;Link</a>
                                    <?php }else{ ?>
                                       <a target="_BLANK" href ="<?= $pdata->recorded_call_link ?>"><?= $pdata->recorded_call_link ?></a>
                                   <?php }
                                    ?>
                                     </td>
                                     
                                     
                                      <td><?= $pdata->created_at ?></td>
                                 
                                </tr>
                                <?php $i++; endforeach; ?>
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

    $("#example2").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    </script>
  </body>
</html>