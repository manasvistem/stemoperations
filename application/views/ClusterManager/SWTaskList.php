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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<?php include 'addlog.php';?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4><?php $uid=$user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); $did[0]->dep_name;?></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
          <div class="col-sm col-md-4 col-lg-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="mt-3">
                       <h4><?=$spd[0]->sname?></h4>
                      <p class="text-secondary mb-1"><?=$spd[0]->saddress?></p>
                      <p class="text-secondary mb-1"><?=$spd[0]->scity?></p>
                      <p class="text-secondary mb-1"><?=$spd[0]->sstate?></p>
                      <hr>
                        
                      <h4><?=$spd[0]->clientname?></h4>
                      <p class="text-secondary mb-1"><?=$pcode=$spd[0]->project_code?></p>
                      
                      <?php  
                             $program= $this->Menu_model->get_programbypc($pcode);
                             $bdid = $program[0]->bd_id;
                             $bddata = $this->Menu_model->get_bdnamebyid($bdid);
                             $ptimeline= $this->Menu_model->get_programtimeline($pcode);
                             $cdate = date('Y-m-d H:i:s');
                             $piid = $spd[0]->pi_id;
                             $piid= $this->Menu_model->get_user_byid($piid);
                             $indid = $spd[0]->ins_id;
                             $indid= $this->Menu_model->get_user_byid($indid);
                      ?>
                      
                      <hr>BD Involve<br><b><?=$bddata[0]->name?></b>
                      <hr>PIA Involve<br><b><?=$piid[0]->fullname?></b>
                      <hr>IMP Involve<br><b><?=$indid[0]->fullname?></b>
                      
                        <hr>
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">This Year Task</i></h6>
                        <?php foreach($programd1 as $pd1){?>
                        <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><?=$pd1->cont?> <?=$pd1->action?></a>
                        <?php } ?>
                        <hr>
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">This Year Sub Task</i></h6>
                        <?php foreach($programd2 as $pd2){?>
                        <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><?=$pd2->cont?> <?=$pd2->tt?> (<?=$pd2->stt?>)</a>
                        <?php } ?>
                    </div>
                  </div>
              </div>
              
              
              
                
            </div>
          </div>
          <div class="col-sm col-md-8 col-lg-8">
           <div class="row">   
             <div class="col-sm col-md-12 col-lg-12">
                               
                <div class="card p-3 text-center">             
                <div class="row">     
                
                 <?php $tasklist= $this->Menu_model->get_tdonebydet($sid,$page);foreach($tasklist as $tlist){?>
                  <div class="col-lg-3 col-md-6 col-sm p-3 bg-danger rounded border">
                     <b><?=$tlist->task_type?></b><hr>
                     <b><?=$tlist->action?></b><hr>
                  </div>
                  <?php } ?>
                  
                  
                </div>
                </div>



                               
      </div>
                </div></div>                         
                               
                               
  
  
  
  
  
  
  
                            
  
                        <div class="table-responsive card p-5">
                                <h4><center>Pending Task</center></h4><hr>
                                    <table id="example3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>	
                                            <th>Assign By</th>	
                                            <th>Assign To</th>	
                                            <th>Assign Date</th>
                                            <th>Plan Date</th>
                                            <th>Assign to Plan TimeDiff</th>
                                            <th>Pending From TimeDiff</th>
                                            <th>Project Code</th>	
                                            <th>School Name</th>	
                                            <th>Task Type</th>	
                                            <th>Purpose</th>	
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $i=1;
                                      
                                           foreach($programd4 as $ttd){
                                           $fuser = $ttd->from_user;
                                           $fuser=$this->Menu_model->get_user_byid($fuser);
                                           $cdate=date('Y-m-d H:i:s');
                                           ?>
                                           
                                           <tr>
                                           <td><?=$i++?></td>
                                           <td><?=$fuser[0]->fullname?></td>
                                           <td><?=$ttd->fullname?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->sdatet));?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->plandate));?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->sdatet,$ttd->plandate)?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->plandate,$cdate)?></td>
                                           <td><?=$ttd->project_code?></td>
                                           <td><?=$ttd->sname?></td>
                                           <td><?=$ttd->task_type?></td>
                                           <td><?=$ttd->task_subtype?></td>
                                           <td><?=$ttd->name?></td>
                                           
                                           </tr>
                                       <?php } ?>
                                  </tbody>
                                </table>
  </div>
  
  
  
  
  
                        <div class="table-responsive card p-5">
                                <h4><center>Completed Task</center></h4><hr>
                                    <table id="example4" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>	
                                            <th>Assign By</th>	
                                            <th>Assign To</th>	
                                            <th>Assign Date</th>
                                            <th>Plan Date</th>
                                            <th>Assign to Plan TimeDiff</th>
                                            <th>Initiated Date</th>
                                            <th>Plan to Initiated TimeDiff</th>
                                            <th>Completed Date</th>	
                                            <th>Initiated to Completed TimeDiff</th>
                                            <th>Project Code</th>	
                                            <th>School Name</th>	
                                            <th>Task Type</th>	
                                            <th>Purpose</th>	
                                            <th>Status</th>	
                                            <th>Action Taken</th>
                                            <th>Purpose Achieved</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $i=1;
                                      
                                           foreach($programd3 as $ttd){
                                           $fuser = $ttd->from_user;
                                           $fuser=$this->Menu_model->get_user_byid($fuser);
                                           ?>
                                           
                                           <tr>
                                           <td><?=$i++?></td>
                                           <td><?=$fuser[0]->fullname?></td>
                                           <td><?=$ttd->fullname?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->sdatet));?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->plandate));?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->sdatet,$ttd->plandate)?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->initiateddt));?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->plandate,$ttd->initiateddt)?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->donet));?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->initiateddt,$ttd->donet)?></td>
                                           <td><?=$ttd->project_code?></td>
                                           <td><?=$ttd->sname?></td>
                                           <td><?=$ttd->task_type?></td>
                                           <td><?=$ttd->task_subtype?></td>
                                           <td><?=$ttd->name?></td>
                                           <td><?=$ttd->actiontaken?></td>
                                           <td><?=$ttd->purpose?></td>
                                           <td><?=$ttd->remark?></td>
                                           </tr>
                                       <?php } ?>
                                  </tbody>
                                </table> 
                            </div>
                        </div>
 
                </fieldset>
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
<script src="<?=base_url();?>assets/js/myjs.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

<script>
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    $("#example4").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
    $("#example5").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>