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
            <h1 class="m-0">Task Tracker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4>HI! <?php echo $fullname=$user['fullname']; $uid=$user['id'];?> ( <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    <div class="card">
        
        <div>
                  <form class="p-3" method="POST" action="<?=base_url();?>Menu/dailyreport"><input type="date" name="date" class="mr-2" max="<?=date('Y-m-d')?>" value="<?=$date?>">
                    <button type="submit" class="bg-primary text-light">Filter</button></form>
              </div>
<?php 
$plan=$this->Menu_model->get_plan($uid,$date);
$tp=sizeof($plan);

$plan1=$this->Menu_model->get_plan($uid,$date);

$pland=$this->Menu_model->get_plandone($uid,$date);
$pd=sizeof($pland);

$ptime=$this->Menu_model->get_plantime($uid,$date);

$petime=$this->Menu_model->get_planetime($uid,$date);

$nplan=$this->Menu_model->get_nextplan($uid);
$np=sizeof($nplan);

$task=$this->Menu_model->get_taska($uid,$date);
$ta=sizeof($task);

$self=0;
$other=0;
foreach($task as $t){
    $fu = $t->from_user;
    if($fu==$uid){$self++;}
    if($fu!=$uid){$other++;}
}

$v=0;
$o=0;
$Utilisation=0;
$Call=0;
$Report=0;
$Message=0;
$Review=0;
$Whatsapp=0;
foreach($plan as $p){
    $ac = $p->action;
    if($ac=='Visit'){$v++;}
    if($ac!='Visit'){$o++;}
    if($ac=='Call'){$Call++;};
    if($ac=='Report'){$Report++;};
    if($ac=='Message'){$Message++;};
    if($ac=='Review'){$Review++;};
    if($ac=='Whatsapp'){$Whatsapp++;};
    if($ac=='Utilisation'){$Utilisation++;};
}
if($v>0 && $o>0){$dtype="Office And Field";}
elseif($v==0 && $o>0){$dtype="Office";}
elseif($v>0 && $o==0){$dtype="Field";}
else{$dtype="NA";}

?>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="container body-content">
        <div class="page-header">
            <div class="form-group">
                <fieldset>
                    <center><h5>Daily Report</h5> (<?=$date?>)</center>
                     <table class="table m-2 table-sm table-bordered">
                         <tr>
                             <th>User Name</th>
                             <th>Activity Day Type</th>
                             <th>Total Task Assign</th>
                             <th>Assign it Self</th>
                             <th>Assign by Other</th>
                             <th>Total Task Plan for Next Day's</th>
                             <th>Total Task Plan for Today</th>
                             <th>Total Task Completed</th>
                             <th>Total Field Task</th>
                             <th>Total Office Task</th>
                             <th>Total Hours Plan</th>
                             <th>Total Hours Executed</th>
                         </tr>
                         <tr>
                             <td><?=$fullname?></td>
                             <td><?=$dtype?></td>
                             <td><?=$ta?></td>
                             <td><?=$self?></td>
                             <td><?=$other?></td>
                             <td><?=$np?></td>
                             <td><?=$tp?></td>
                             <td><?=$pd?></td>
                             <td><?=$v?></td>
                             <td><?=$o?></td>
                             <td><?=$ptime?></td>
                             <td><?=$petime?></td>
                         </tr>
                     </table>
                     
                     <hr>
                     <center><h5>Office Task Detail</h5></center>
                     <table class="table m-2 table-sm table-bordered">
                         <tr>
                             <th>Call</th>
                             <th>Other</th>
                         </tr>
                         <tr>
                             <td><?=$Call?></td>
                             <td>0</td>
                         </tr>
                     </table>
                     
                     <table class="table m-2 table-sm table-bordered">
                         <tr>
                             <th>User Name</th>
                             <th>Task Type</th>
                             <th>Purpose</th>
                             <th>Project</th>
                             <th>School</th>
                             <th>Planed Time</th>
                             <th>Execution Time</th>
                             <th>Time Diffrence</th>
                             <th>Early/Late</th>
                             <th>Task Time Taken</th>
                             <th>Action Taken</th>
                             <th>Remark</th>
                             <th>Support Link</th>
                         </tr>
                         <?php foreach($plan as $plan){if($plan->action!='Visit'){
                             $pc = $plan->project_code;
                             $sid = $plan->spd_id;
                             $tt = $plan->task_type;
                             $tst = $plan->task_subtype;
                             $at = $plan->actiontaken;
                             $tpt = $plan->plandate;
                             $tdt = $plan->donet;
                             $tid = $plan->taskid;
                             
                             $tdif = $this->Menu_model->timediff($tpt,$tdt);
                             $spd=$this->Menu_model->get_spdbyid($sid);
                             
                             $r = $this->Menu_model->get_wgbytid($tid);
                             if($r){$remark = $r[0]->remark;}
                             else{$remark="NA";}
                             
                             
                             if($tpt==$tdt){$oel='On Time';}
                             elseif($tpt>$tdt){$oel='Early';}
                             else{$oel='Late';}
                             
                             ?>
                         <tr>
                             <td><?=$fullname?></td>
                             <td><?=$tt?></td>
                             <td><?=$tst?></td>
                             <td><?=$pc?></td>
                             <td><?=$spd[0]->sname?></td>
                             <td><?=$tpt?></td>
                             <td><?=$tdt?></td>
                             <td><?=$tdif?></td>
                             <td><?=$oel?></td>
                             <td>10M</td>
                             <td><?=$at?></td>
                             <td><?=$remark?></td>
                             <td></td>
                         </tr>
                         <?php }}?>
                     </table>
                     
                     <hr>
                     <center><h5>Visit Task Detail</h5></center>
                     <table class="table m-2 table-sm table-bordered">
                         <tr>
                             <th>Installation</th>
                             <th>Maintenance</th>
                             <th>Total Repair</th>
                             <th>Total Replacement</th>
                         </tr>
                         <tr>
                             <td>0</td>
                             <td>0</td>
                             <td>0</td>
                             <td>0</td>
                         </tr>
                     </table>
                     <table class="table m-2 table-sm table-bordered">
                         <tr>
                             <th>User Name</th>
                             <th>Task Type</th>
                             <th>Purpose</th>
                             <th>Project</th>
                             <th>School</th>
                             <th>Start Time</th>
                             <th>Plan Time</th>
                             <th>Location Reach Time</th>
                             <th>Time Diffrence</th>
                             <th>Close Time</th>
                             <th>Task Time Taken</th>
                             <th>Total Repair</th>
                             <th>Total Replacement</th>
                             <th>Remark</th>
                             <th>Support Link</th>
                         </tr>
                         <?php foreach($plan1 as $plan1){if($plan1->action=='Visit'){
                             $pc = $plan1->project_code;
                             $sid = $plan1->spd_id;
                             $tt = $plan1->task_type;
                             $tst = $plan1->task_subtype;
                             $at = $plan1->actiontaken;
                             $tpt = $plan1->plandate;
                             $tdt = $plan1->donet;
                             $tid = $plan1->taskid;
                             
                             $tdif = $this->Menu_model->timediff($tpt,$tdt);
                             $spd=$this->Menu_model->get_spdbyid($sid);
                             
                             $r = $this->Menu_model->get_wgbytid($tid);
                             if($r){$remark = $r[0]->remark;}
                             else{$remark="NA";}
                             
                             
                             if($tpt==$tdt){$oel='On Time';}
                             elseif($tpt>$tdt){$oel='Early';}
                             else{$oel='Late';}
                         
                         
                         ?>
                         <tr>
                             <td><?=$fullname?></td>
                             <td><?=$tt?></td>
                             <td><?=$tst?></td>
                             <td><?=$pc?></td>
                             <td><?=$spd[0]->sname?></td>
                             <td>NA</td>
                             <td>NA</td>
                             <td>NA</td>
                             <td>6H</td>
                             <td><?=$at?></td>
                             <td></td>
                             <td></td>
                             <td><?=$remark?></td>
                             <td></td>
                         </tr>
                         <?php }}?>
                     </table>
                     
                     <center><h5>Total Repair Detail</h5></center>
                     <table class="table m-2 table-sm table-bordered">
                         <tr>
                             <th>Project</th>
                             <th>School</th>
                             <th>Model Name</th>
                         </tr>
                         <tr>
                             <td>NA</td>
                             <td>NA</td>
                             <td>0</td>
                         </tr>
                     </table>
                     
                     
                     <center><h5>Total Replacement Detail</h5></center>
                     <table class="table m-2 table-sm table-bordered">
                         <tr>
                             <th>Project</th>
                             <th>School</th>
                             <th>Model Name</th>
                         </tr>
                         <tr>
                             <td>NA</td>
                             <td>NA</td>
                             <td>0</td>
                         </tr>
                     </table>
                </fieldset>
            </div>
            <hr />
        </div>
    </div></div>
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
