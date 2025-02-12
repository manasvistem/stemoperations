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
<?php require('addlog.php');?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                  <h4>HI!  <?=$user['fullname']?> ( <?php $uid= $user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4> 
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            
            
           
                        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          
        
        
    
            
          </div>
        <!-- /.row (main row) -->
            
            
   
<div class="row">
          <div class="col-lg-8 col-sm">
            <div class="card card-primary card-outline card-outline-tabs">
                <h4 class="p-3">Today's Task</h4>
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">
                        All <span class="badge badge-success"><?php $dot=$this->Menu_model->get_plantask($uid); echo $all = sizeof($dot);?></span>
                    </a>
                    
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-call-tab" data-toggle="pill" href="#custom-tabs-four-call" role="tab" aria-controls="custom-tabs-four-call" aria-selected="false">
                        Call <span class="badge badge-success"><?php $action = "Call"; $dot=$this->Menu_model->get_task($action); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-email-tab" data-toggle="pill" href="#custom-tabs-four-email" role="tab" aria-controls="custom-tabs-four-email" aria-selected="false">
                        Email <span class="badge badge-success"><?php $action = "Email"; $dot=$this->Menu_model->get_task($action); echo $all = sizeof($dot);?></span>
                    </a>
                  </li>
                  
                  
                </ul>
                
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <?php 
                        $dot=$this->Menu_model->get_plantask($uid);
                        $i=1;
                        foreach($dot as $d){  if($d->user_id==$uid){
                            $sid = $d->spd_id;
                            $tid = $d->taskid;
                            $sdata=$this->Menu_model->get_spdbyid($sid);
                            $task=$this->Menu_model->get_taskassign_byid($tid);
                            $userid = $task[0]->from_user;
                            $user=$this->Menu_model->get_user_byid($userid);
                            if($task[0]->task_type=='FTTP'){$page='checklist_1stTTP';}
                            elseif($task[0]->task_type=='TTP'){$page='checklist_TTP';}
                            elseif($task[0]->task_type=='FM&E'){$page='Checklist_MandE1st';}
                            elseif($task[0]->task_type=='M&E'){$page='Checklist_MandE';}
                            else{$page='#';};
                      ?>
                      <div>
                          <b><?=$i?>. <?=$task[0]->task_type?><br>
                          <a href="<?=$page?>/<?=$d->id?>"><?=$sdata[0]->sname?></a><br>
                          <?=$task[0]->remark?>
                          <?=$task[0]->comment?><br>
                          <small class="badge badge-secondary text-right">task assign by <?=$user[0]->fullname?></small>
                          </b>
                          <hr>
                      </div>
                      
                      <?php $i++;}} ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                      <?php 
                        $action = "Visit";
                        $dot=$this->Menu_model->get_task($action);
                        $i=1;
                        foreach($dot as $d){  if($d->user_id==$uid){
                            $sid = $d->spd_id;
                            $tid = $d->taskid;
                            $sdata=$this->Menu_model->get_spdbyid($sid);
                            $task=$this->Menu_model->get_taskassign_byid($tid);
                            $userid = $task[0]->from_user;
                            $user=$this->Menu_model->get_user_byid($userid);
                            if($task[0]->task_type=='FTTP'){$page='checklist_1stTTP';}
                            elseif($task[0]->task_type=='TTP'){$page='checklist_TTP';}
                            elseif($task[0]->task_type=='FM&E'){$page='Checklist_MandE1st';}
                            elseif($task[0]->task_type=='M&E'){$page='Checklist_MandE';}
                            else{$page='#';};
                      ?>
                      <div>
                          <b><?=$i?>. <?=$task[0]->task_type?><br>
                          <a href="<?=$page?>/<?=$d->id?>"><?=$sdata[0]->sname?></a><br>
                          <?=$task[0]->remark?>
                          <?=$task[0]->comment?><br>
                          <small class="badge badge-secondary text-right">task assign by <?=$user[0]->fullname?></small>
                          </b>
                          <hr>
                      </div>
                      
                      <?php $i++;}} ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-call" role="tabpanel" aria-labelledby="custom-tabs-four-call-tab">
                      <?php 
                        $action = "Call";
                        $dot=$this->Menu_model->get_task($action);
                        $i=1;
                        foreach($dot as $d){  if($d->user_id==$uid){
                            $sid = $d->spd_id;
                            $tid = $d->taskid;
                            $sdata=$this->Menu_model->get_spdbyid($sid);
                            $task=$this->Menu_model->get_taskassign_byid($tid);
                            $userid = $task[0]->from_user;
                            $user=$this->Menu_model->get_user_byid($userid);
                            if($task[0]->task_type=='FTTP'){$page='checklist_1stTTP';}
                            elseif($task[0]->task_type=='TTP'){$page='checklist_TTP';}
                            elseif($task[0]->task_type=='FM&E'){$page='Checklist_MandE1st';}
                            elseif($task[0]->task_type=='M&E'){$page='Checklist_MandE';}
                            else{$page='#';};
                      ?>
                      <div>
                          <b><?=$i?>. <?=$task[0]->task_type?><br>
                          <a href="<?=$page?>/<?=$d->id?>"><?=$sdata[0]->sname?></a><br>
                          <?=$task[0]->remark?>
                          <?=$task[0]->comment?><br>
                          <small class="badge badge-secondary text-right">task assign by <?=$user[0]->fullname?></small>
                          </b>
                          <hr>
                      </div>
                      
                      <?php $i++;}} ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-email" role="tabpanel" aria-labelledby="custom-tabs-four-email-tab">
                      <?php 
                        $action = "Email";
                        $dot=$this->Menu_model->get_task($action);
                        $i=1;
                        foreach($dot as $d){  if($d->user_id==$uid){
                            $sid = $d->spd_id;
                            $tid = $d->taskid;
                            $sdata=$this->Menu_model->get_spdbyid($sid);
                            $task=$this->Menu_model->get_taskassign_byid($tid);
                            $userid = $task[0]->from_user;
                            $user=$this->Menu_model->get_user_byid($userid);
                            if($task[0]->task_type=='FTTP'){$page='checklist_1stTTP';}
                            elseif($task[0]->task_type=='TTP'){$page='checklist_TTP';}
                            elseif($task[0]->task_type=='FM&E'){$page='Checklist_MandE1st';}
                            elseif($task[0]->task_type=='M&E'){$page='Checklist_MandE';}
                            else{$page='#';};
                      ?>
                      <div>
                          <b><?=$i?>. <?=$task[0]->task_type?><br>
                          <a href="<?=$page?>/<?=$d->id?>"><?=$sdata[0]->sname?></a><br>
                          <?=$task[0]->remark?>
                          <?=$task[0]->comment?><br>
                          <small class="badge badge-secondary text-right">task assign by <?=$user[0]->fullname?></small>
                          </b>
                          <hr>
                      </div>
                      
                      <?php $i++;}} ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-whatsapp" role="tabpanel" aria-labelledby="custom-tabs-four-whatsapp-tab">
                      <?php 
                        $action = "Whatsapp";
                        $dot=$this->Menu_model->get_task($action);
                        $i=1;
                        foreach($dot as $d){  if($d->user_id==$uid){
                            $sid = $d->spd_id;
                            $tid = $d->taskid;
                            $sdata=$this->Menu_model->get_spdbyid($sid);
                            $task=$this->Menu_model->get_taskassign_byid($tid);
                            $userid = $task[0]->from_user;
                            $user=$this->Menu_model->get_user_byid($userid);
                            if($task[0]->task_type=='FTTP'){$page='checklist_1stTTP';}
                            elseif($task[0]->task_type=='TTP'){$page='checklist_TTP';}
                            elseif($task[0]->task_type=='FM&E'){$page='Checklist_MandE1st';}
                            elseif($task[0]->task_type=='M&E'){$page='Checklist_MandE';}
                            else{$page='#';};
                      ?>
                      <div>
                          <b><?=$i?>. <?=$task[0]->task_type?><br>
                          <a href="<?=$page?>/<?=$d->id?>"><?=$sdata[0]->sname?></a><br>
                          <?=$task[0]->remark?>
                          <?=$task[0]->comment?><br>
                          <small class="badge badge-secondary text-right">task assign by <?=$user[0]->fullname?></small>
                          </b>
                          <hr>
                      </div>
                      
                      <?php $i++;}} ?>
                  </div>
                  
                  <div class="tab-pane fade" id="custom-tabs-report" role="tabpanel" aria-labelledby="custom-tabs-four-report-tab">
                      <?php 
                        $action = "Report";
                        $dot=$this->Menu_model->get_task($action);
                        $i=1;
                        foreach($dot as $d){  if($d->user_id==$uid){
                            $sid = $d->spd_id;
                            $tid = $d->taskid;
                            $sdata=$this->Menu_model->get_spdbyid($sid);
                            $task=$this->Menu_model->get_taskassign_byid($tid);
                            $userid = $task[0]->from_user;
                            $user=$this->Menu_model->get_user_byid($userid);
                            if($task[0]->task_type=='FTTP'){$page='checklist_1stTTP';}
                            elseif($task[0]->task_type=='TTP'){$page='checklist_TTP';}
                            elseif($task[0]->task_type=='FM&E'){$page='Checklist_MandE1st';}
                            elseif($task[0]->task_type=='M&E'){$page='Checklist_MandE';}
                            else{$page='#';};
                      ?>
                      <div>
                          <b><?=$i?>. <?=$task[0]->task_type?><br>
                          <a href="<?=$page?>/<?=$d->id?>"><?=$sdata[0]->sname?></a><br>
                          <?=$task[0]->remark?>
                          <?=$task[0]->comment?><br>
                          <small class="badge badge-secondary text-right">task assign by <?=$user[0]->fullname?></small>
                          </b>
                          <hr>
                      </div>
                      
                      <?php $i++;}} ?>
                  </div>
                  
                  
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
            
            
            
            
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  To Do List
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                    
                    <?php 
                        $i=1;
                        $dot=$this->Menu_model->get_taskassign();
                        foreach($dot as $d){ if($d->plan==0){
                        $id = $d->from_user;
                        if($d->to_user==$uid){
                        $user=$this->Menu_model->get_user_byid($id);
                        $sid = $d->spd_id;
                        $spd=$this->Menu_model->get_spdbyid($sid)
                      ?>
                      <li>
                          <span class="text">
                            <span class="handle">
                              <i class="fas fa-ellipsis-v"></i>
                              <i class="fas fa-ellipsis-v"></i>
                            </span>
                          <?=$i?>. <?=$d->task_type?><br>
                          <b><?=$spd[0]->sname?></b> | <?=$d->comment?><br>
                          task assign by <?=$user[0]->fullname?>
                          </span>
                          <small class="badge badge-secondary"><button type="button" id="other_action" class="btn btn-primary float-right" value="<?=$d->id?>">Plan Action</button></small>
                          
                      </li>
                      
                      <?php $i++;}}} ?>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
              </div>
            </div>
            <!-- /.card -->
            
            
            
            
            
            
            
            </div>
            <div class="col-lg-4 col-sm">
            <div class="card card-primary card-outline card-outline-tabs">
                <h5 class="p-3">Today's Task</h5><hr>
              <div class="card-header p-0 border-bottom-0"> </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="table-responsive">
                            <div class="table-responsive">     
                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr><th>Task</th> </tr>
                                    </thead>
                                    <tbody>
                  <?php 
                    $dot=$this->Menu_model->get_plantask($uid);
                    foreach($dot as $d){ if($d->tdone==0){
                    
                    ?>
                    <tr><td><div><i class="fa fa-thumb-tack" aria-hidden="true"></i> <b><?=$d->id?></b></div><div class="text-right">Task assign by </div>
                    
                    </td></tr>
                  <?php }} ?>
                  </tbody>
                                </table>
                            </div>
                        </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            
            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              
              
          </div>
        </div>
</div>
 </div>
        </div>
</div>
        
            
            
            
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

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


<script>
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>
