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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Search School</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4>HI! <?=$user['fullname']?> ( <?php $uid=$user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="container-fluid p-3">
    <form action="<?=base_url();?>Menu/schooldata" method="POST" target="_blank">
    <select class="ml-2" name="user_id" id="user_id">
        <option>All</option>
        <?php $du=$this->Menu_model->get_user(); foreach($du as $d){ if($d->adminid==$uid){?>
        <option value="<?=$d->id?>"><?=$d->fullname?></option>
        <?php }} ?>
    </select>
    <select class="ml-2" name="status" id="status">
        <option>All</option>
        <option>New School</option>
        <option>FTTP Done</option>
        <option>Active School</option>
        <option>Average School</option>
        <option>Good School</option>
        <option>Model School</option>
    </select>
    <input class="ml-2" type="date" name="fdate" id="fdate">
    <input class="ml-2" type="date" name="tdate" id="tdate">
    <select class="ml-2" name="type" id="type">
        <option>Created</option>
        <option>Planner</option>
    </select>
    <input type="submit">
    </form>
</div>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">School Profile Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="container body-content">
        <div class="page-header">
            <div class="form-group">
                <fieldset>
                    <form action="" class="form-group" method="post">
                        <div class="table-responsive">
                            <div class="table-responsive">   
                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                                  <th>S.NO.</th>
                                                  <th>Review</th>
                                                  <th>Project Code</th>
                                                  <th>School Name</th>
                                                  <th>Address</th>
                                                  <th>City</th>
                                                  <th>Tehshil</th>
                                                  <th>District</th>
                                                  <th>State</th>
                                                  <th>Google Location</th>
                                                  <th>Language</th>
                                                  <th>Academic Year</th>
                                                  <th>Whatsapp Group</th>
                                                  <th>STD</th>
                                                  <th>Boys</th>
                                                  <th>Girls</th>
                                                  <th>Students</th>
                                                  <th>Teachers</th>
                                                  <th>Timing</th>
                                                  <th>Website</th>
                                                  <th>Current Status</th>
                                                  <th>Previous Status</th>
                                                  <th>PIA</th>
                                                  <th>Installtion Person</th>
                                                  <th>ZH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      
                                          $i=1;
                                          $data=$this->Menu_model->get_spdpi($pim,$sts);
                                          foreach($data as $d){
                                          $this->load->model('Menu_model');
                                          $sid = $d->id;
                                          $uti=$this->Menu_model->get_uti($sid);
                                          $media=$this->Menu_model->get_media($sid);
                                          $report=$this->Menu_model->get_report($sid);
                                          
                                          $u = sizeof($uti);
                                          $m = sizeof($media);
                                          $r = sizeof($report);
                                          $stid = $d->status;
                                          $stid=$this->Menu_model->get_statusbyid($stid);
                                          
                                          $pstid = $d->pstatus;
                                          $pstid = $this->Menu_model->get_statusbyid($pstid);
                                          
                                          
                                          $piid=$d->pi_id;
                                          $insid=$d->ins_id;
                                          $zhid=$d->zh_id;
                                          $pi=$this->Menu_model->get_user_byid($piid);
                                          $ins=$this->Menu_model->get_user_byid($insid);
                                          $zh=$this->Menu_model->get_user_byid($zhid);
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <th><button type="button" id="add_Rremark<?=$i?>" value="<?=$d->id?>">Click</button></th>
                                        <td><?=$d->project_code?></td>
                                        <td><a href="../../school_detail/<?=$d->id?>"><?=$d->sname?></a></td>	
                                        <td><?=$d->saddress?></td>
                                        <td><?=$d->sdistrict?></td>
                                        <td><?=$d->tehshil?></td>
                                        <td><?=$d->scity?></td>
                                        <td><?=$d->sstate?></td>
                                        <td><?=$d->slocation?></td>
                                        <td><?=$d->slanguage?></td>
                                        <td><?=$d->sayear?></td>
                                        <td><a href="<?=$d->wanamelink?>" target="_blank"><?=$d->waname?></a></td>
                                        <td><?=$d->std?></td>
                                        <td><?=$d->boys?></td>
                                        <td><?=$d->girls?></td>
                                        <td><?=$d->total_students?></td>
                                        <td><?=$d->total_teachers?></td>
                                        <td><?=$d->timing?></td>
                                        <td><?=$d->website?></td>
                                        <td><?=$stid[0]->name?></td>
                                        <td><?=$pstid[0]->name?></td>
                                        <td><?php if($piid==''){echo 'NA';}else{ echo $pi[0]->fullname;}?></td>
                                        <td><?php if($insid==''){echo 'NA';}else{ echo $ins[0]->fullname;}?></td>
                                        <td><?php if($zhid==''){echo 'NA';}else{ echo $zh[0]->fullname; }?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </form>            <!--END OF FORM ^^-->
                </fieldset>
            </div>
            <hr />
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
    
<div id="doaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-standard-title1"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <div class="card card-form col-md-12">
                        <div class="col-lg-12 card-body">
                           <?=form_open('Menu/pmsremark')?>
                           <input type="hidden" name="uid" value="<?=$uid?>">
                           <input type="hidden" name="sid" id="cmpid">
                           <input type="hidden" name="pi" value="<?=$pim?>">
                           <input type="hidden" name="status" value="<?=$sts?>">
                           <center>School Review</center><hr>
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="Status of Fttp/Rttp (done or pending)" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div> 
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="Status of Baseline/endline (done or pending)" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div> 
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="WhatsApp group creation (yes/no)" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="Activation status (yes/no)" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="Number of utilisation" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="Annual maintenance Status (yes/no)" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="Letters availablity" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="DIY Status" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="Case study" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="How often pia calls" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="9 communication sharing (cross check)" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="ques[]" value="Number of time outbound communication" readonly>
                    <textarea class="form-control" name="remark[]" required></textarea>
                    </div>
                    <div class="form-group">
                        <lable>Final Remark</lable>
                        <textarea class="form-control" name="rremark" required></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                </form>
                        </div>
                        </div>
                            </div>
                        </div>
                </div> <!-- // END .modal-body -->
</div></div></div>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$('[id^="add_Rremark"]').on('click', function() {
        var cmpid = this.value;
    $('#doaction').modal('show');
    document.getElementById("cmpid").value = cmpid;
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
