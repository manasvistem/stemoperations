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
            <div class="row mb-2">
              <div class="col-sm-12 text-center bg-primary p-2">
                <h1 class="m-0">BD Request</h1>
              </div>
            </div>
          </div>
        </div>
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="body-content">
                      <div class="page-header">
                        <div class="form-group">
                          <?php 
                          $colors = [
                            "School Identification" => "#FFDDC1",
                            "Report" => "#D4E157",
                            "New client school visit" => "#FFAB91",
                            "Inauguration" => "#A5D6A7",
                            "Demo" => "#90CAF9",
                            "OnBoardVisit" => "#F48FB1",
                            "School Maintenance" => "#CE93D8",
                            "New Client Report" => "#FFCC80",
                            "On Board Client School Visit" => "#B3E5FC",
                            "Select Request Type" => "#FFECB3",
                            "DIY" => "#E1BEE7",
                            "RTTP" => "#C5E1A5",
                            "Employee Engagement" => "#F8BBD0",
                            "MnE" => "#B39DDB"
                        ];
                          
                          ?>
                                <div class="table-responsive">
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Type of Request</th>
                                        <th>Total Request</th>
                                        <th>Pending</th>
                                        <th>Open</th>
                                        <th>Close</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdrcount as $d){
                                        $bgColor = isset($colors[$d->request_type]) ? $colors[$d->request_type] : "#FFFFFF"; 
                                        ?>
                                      <tr style="background-color:<?=$bgColor?>">
                                        <td><?=$i?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><a href="<?=base_url();?>Menu/bdrassign/<?=$d->rysn?>/1"><?=$d->cnt?></a></td>
                                        <td><a href="<?=base_url();?>Menu/bdrassign/<?=$d->rysn?>/2"><?=$d->pending?></a></td>
                                        <td><a href="<?=base_url();?>Menu/bdrassign/<?=$d->rysn?>/3"><?=$d->open?></a></td>
                                        <td><a href="<?=base_url();?>Menu/bdrassign/<?=$d->rysn?>/4"><?=$d->closed?></a></td>
                                      </tr>
                                      <?php $i++;} ?>
                                    </tbody>
                                  </table>
                                </div>
                        </div>
                        <hr />
                      </div>
                    </div>
                  </div>
                </div>
                <style>
                  table a{color: #000000!important;}
                  table a:hover{color:rgb(255, 0, 0)!important;}
                  tr{font-weight: 700;}
                </style>
                <div id="doaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modal-standard-title1"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <!-- // END .modal-header -->
                      <div class="modal-body">
                        <div class="card card-form col-md-12">
                          <div class="card-header bg-info">Assign To</div>
                          <div class="col-lg-12 card-body">
                            <?=form_open('Menu/bdrassignto')?>
                            <input type="hidden" id="tid" name="tid">
                            <input type="hidden" name="uid" value="<?=$user['id']?>">
                            <select id="choices-multiple-remove-button" name="assignto[]" class="form-control" multiple>
                              <?php $pia=$this->Menu_model->get_user();
                                foreach($pia as $pia){if($pia->dep_id==2){?>
                              <option value="<?=$pia->id?>"><?=$pia->fullname?></option>
                              <?php }} ?>
                            </select>
                            <lable>Expected Date</lable>
                            <input type="datetime-local" class="form-control" name="exdate">
                            <textarea class="form-control" name="remark" id="remark" placeholder="Remark"></textarea>
                            <lable><b>ZM Approval</b></lable>
                            <br>
                            <input type="radio" name="zmapr" value="1">
                            <label for="html">Required</label><br>
                            <input type="radio" name="zmapr" value="0">
                            <label for="0">not Required</label><br>
                          </div>
                          <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- // END .modal-body -->
              </div>
            </div>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script type="text/javascript">
            $('[id^="assign_to"]').on('click', function() {
                    var tid = this.value;
                $('#doaction').modal('show');
                document.getElementById("tid").value = tid;
            });
            
            
            $('#region').on('change', function b() {
            var dep = document.getElementById("dep").value;
            var region = document.getElementById("region").value;
               
            $.ajax({
            url:'<?=base_url();?>Menu/getuserbydr',
            type: "POST",
            data: {
            dep: dep,
            region: region
            },
            cache: false,
            success: function a(result){
            $("#to_user").html(result);
            }
            });
            });
            
            
            $('#task_type').on('change', function c() {
            var tt = document.getElementById("task_type").value;
            $.ajax({
            url:'<?=base_url();?>Menu/getpitst',
            type: "POST",
            data: {
            tt: tt
            },
            cache: false,
            success: function a(result){
            $("#task_subtype").html(result);
            }
            });
            });
            
            $('#pcode').on('change', function b() {
            var pcode = document.getElementById("pcode").value;
            $.ajax({
            url:'<?=base_url();?>Menu/getspdbypcode',
            type: "POST",
            data: {
            pcode: pcode
            },
            cache: false,
            success: function a(result){
            $("#spd_id").html(result);
            }
            });
            });
          </script> 
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
        "buttons": ["csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    </script>
  </body>
</html>