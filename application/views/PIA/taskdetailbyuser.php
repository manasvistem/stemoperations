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
                  <form class="p-3" method="POST" action="../taskdetailbyuser/<?=$depid?>"><input type="date" name="sdate" class="mr-2" value="<?php echo date('Y-m-d'); ?>"><input type="date" name="edate" class="mr-2" value="<?php echo date('Y-m-d'); ?>">
                    <button type="submit" class="bg-primary text-light">Filter</button><a class="ml-3" href="../taskdetailbyuser/<?=$depid?>">All Task</a></form>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="container body-content">
        <div class="page-header">
            <div class="form-group">
                <fieldset>
                     <form method='POST'>
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <div class="pdf-viwer">
                                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                          <th>S.No</th>
                                          <th>Assign To</th>
                                          <th>Total Task</th>
                                          <th>Plan</th>
                                          <th>Unplan</th>
                                          <th>Completed</th>
                                          <th>UnCompleted</th>
                                          <th>Call Assign</th>
                                          <th>Call Plan</th>
                                          <th>Call Completed</th>
                                          <th>Utilisation Assign</th>
                                          <th>Utilisation Plan</th>
                                          <th>Utilisation Completed</th>
                                          <th>TTP Assign</th>
                                          <th>TTP Plan</th>
                                          <th>TTP Completed</th>
                                          <th>M&E Assign</th>
                                          <th>M&E Plan</th>
                                          <th>M&E Completed</th>
                                          <th>DIY Assign</th>
                                          <th>DIY Plan</th>
                                          <th>DIY Completed</th>
                                          <th>NSP Assign</th>
                                          <th>NSP Plan</th>
                                          <th>NSP Completed</th>
                                          <th>Report Assign</th>
                                          <th>Report Plan</th>
                                          <th>Report Completed</th>
                                          <th>Whatsapp Assign</th>
                                          <th>Whatsapp Plan</th>
                                          <th>Whatsapp Completed</th>
                                          <th>Email Assign</th>
                                          <th>Email Plan</th>
                                          <th>Email Completed</th>
                                          <th>Other Assign</th>
                                          <th>Other Plan</th>
                                          <th>Other Completed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $i=1;
                                      if($all==1){$ttbu=$this->Menu_model->get_ttbyuser($uid);}
                                      else{$ttbu=$this->Menu_model->get_ttbyuserd($uid,$sdate,$edate);}
                                      
                                          $tt = $ttbu[0]->tt;
                                          $tplan = $ttbu[0]->tplan;
                                          if($tplan==''){$tplan=0;}
                                          $tdone = $ttbu[0]->tdone;
                                          if($tdone==''){$tdone=0;}
                                          $nplan = $tt-$tplan;
                                          $ndone = $tt-$tdone;
                                            $call=0;
                                            $pcall=0;
                                            $dcall=0;
                                            $ttp=0;
                                            $pttp=0;
                                            $dttp=0;
                                            $mne=0;
                                            $pmne=0;
                                            $dmne=0;
                                            $uti=0;
                                            $puti=0;
                                            $duti=0;
                                            $diy=0;
                                            $pdiy=0;
                                            $ddiy=0;
                                            $nsp=0;
                                            $pnsp=0;
                                            $dnsp=0;
                                            $report=0;
                                            $preport=0;
                                            $dreport=0;
                                            $whatsapp=0;
                                            $pwhatsapp=0;
                                            $dwhatsapp=0;
                                            $email=0;
                                            $pemail=0;
                                            $demail=0;
                                            $other=0;
                                            $pother=0;
                                            $dother=0;
                                            if($all==1){$sdate=date('Y-m-d');$edate=date('Y-m-d');
                                       $ttbyutt=$this->Menu_model->get_ttbyutt($uid);}
                                       else{$ttbyutt=$this->Menu_model->get_ttbyuttd($uid,$sdate,$edate);}
                                       foreach($ttbyutt as $tut){
                                        if($tut->task_type=='Call'){$call++;};
                                        if($tut->task_type=='Call'){if($tut->plan==1){$pcall++;}};
                                        if($tut->task_type=='Call'){if($tut->tdone==1){$dcall++;}};
                                        if($tut->task_type=='Visit'){$ttp++;};
                                        if($tut->task_type=='Visit'){if($tut->plan==1){$pttp++;}};
                                        if($tut->task_type=='Visit'){if($tut->tdone==1){$dttp++;}};
                                        if($tut->task_type=='mne'){$mne++;};
                                        if($tut->task_type=='mne'){if($tut->plan==1){$pmne++;}};
                                        if($tut->task_type=='mne'){if($tut->tdone==1){$dmne++;}};
                                        if($tut->task_type=='Utilisation'){$uti++;};
                                        if($tut->task_type=='Utilisation'){if($tut->plan==1){$puti++;}};
                                        if($tut->task_type=='Utilisation'){if($tut->tdone==1){$duti++;}};
                                        if($tut->task_type=='diy'){$diy++;};
                                        if($tut->task_type=='diy'){if($tut->plan==1){$pdiy++;}};
                                        if($tut->task_type=='diy'){if($tut->tdone==1){$ddiy++;}};
                                        if($tut->task_type=='nsp'){$nsp++;};
                                        if($tut->task_type=='nsp'){if($tut->plan==1){$pnsp++;}};
                                        if($tut->task_type=='nsp'){if($tut->tdone==1){$dnsp++;}};
                                        if($tut->task_type=='report'){$report++;};
                                        if($tut->task_type=='report'){if($tut->plan==1){$preport++;}};
                                        if($tut->task_type=='report'){if($tut->tdone==1){$dreport++;}};
                                        if($tut->task_type=='whatsapp'){$whatsapp++;};
                                        if($tut->task_type=='whatsapp'){if($tut->plan==1){$pwhatsapp++;}};
                                        if($tut->task_type=='whatsapp'){if($tut->tdone==1){$dwhatsapp++;}};
                                        if($tut->task_type=='email'){$email++;};
                                        if($tut->task_type=='email'){if($tut->plan==1){$pemail++;}};
                                        if($tut->task_type=='email'){if($tut->tdone==1){$demail++;}};
                                        if($tut->task_type=='other'){$other++;};
                                        if($tut->task_type=='other'){if($tut->plan==1){$pother++;}};
                                        if($tut->task_type=='other'){if($tut->tdone==1){$dother++;}};
                                       }
                                          
                                      ?>
                                      
                                      
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$fullname?></td>
                                        <td><?=$tt?></td>
                                        <td><?=$tplan?></td>
                                        <td><?=$nplan?></td>
                                        <td><?=$tdone?></td>
                                        <td><?=$ndone?></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/Call/<?=$uid?>"><?=$call?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/Call/<?=$uid?>"><?=$pcall?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/Call/<?=$uid?>"><?=$dcall?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/Utilisation/<?=$uid?>"><?=$uti?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/Utilisation/<?=$uid?>"><?=$puti?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/Utilisation/<?=$uid?>"><?=$duti?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/Visit/<?=$uid?>"><?=$ttp?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/Visit/<?=$uid?>"><?=$pttp?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/Visit/<?=$uid?>"><?=$dttp?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/mne/<?=$uid?>"><?=$mne?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/mne/<?=$uid?>"><?=$pmne?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/mne/<?=$uid?>"><?=$dmne?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/diy/<?=$uid?>"><?=$diy?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/diy/<?=$uid?>"><?=$pdiy?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/diy/<?=$uid?>"><?=$ddiy?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/nsp/<?=$uid?>"><?=$nsp?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/nsp/<?=$uid?>"><?=$pnsp?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/nsp/<?=$uid?>"><?=$dnsp?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/report/<?=$uid?>"><?=$report?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/report/<?=$uid?>"><?=$preport?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/report/<?=$uid?>"><?=$dreport?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/whatsapp/<?=$uid?>"><?=$whatsapp?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/whatsapp/<?=$uid?>"><?=$pwhatsapp?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/whatsapp/<?=$uid?>"><?=$dwhatsapp?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/email/<?=$uid?>"><?=$email?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/email/<?=$uid?>"><?=$pemail?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/email/<?=$uid?>"><?=$demail?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/other/<?=$uid?>"><?=$other?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/other/<?=$uid?>"><?=$pother?></a></td>
                                        <td><a class="text-secondary" href="../taskTracker/<?=$sdate?>/<?=$edate?>/other/<?=$uid?>"><?=$dother?></a></td>
                                    </tr>
                                  </tbody>
                                </table>
                                    
                                </div>  
                            </div>
                        </div>
                    </form>            <!--END OF FORM ^^-->
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
