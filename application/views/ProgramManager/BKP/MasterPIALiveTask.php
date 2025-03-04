<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stem Operation App</title>

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
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
     <div class="col-sm col-md-12 col-lg-12 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile row">
                 <div class="row">
                    <?php
                        $tdate=date('Y-m-d');
                        $cdatet=date('Y-m-d H:m:s');
                    ?>
                    <div class="col-12 card p-3 text-center border border-success">
                        <h4>Current Task</h4><hr>
                        <div class="row">
                        <?php
                            $aai=1;
                            $date = date('Y-m-d');
                            $Ltask = $this->Menu_model->get_MasterLive($date);
                            foreach($Ltask as $Ltask){
                            $mvid = $Ltask->mvid;
                            $tid = $Ltask->tid;
                            $pagen = $Ltask->pagen;
                            $MLtask = $this->Menu_model->get_MasterLbtid($tid);
                            $MLque = $this->Menu_model->get_Masterque($mvid);
                            $quen = $MLque[0]->que;
                            $sdatet = $MLque[0]->sdatet;
                            $dateTime = new DateTime($sdatet);
                            $interval = new DateInterval('PT05M');
                            $dateTime->sub($interval);
                            $result = $dateTime->format('Y-m-d H:i:s');
                            
                            $dateTime1 = new DateTime($result);
                            $dateTime2 = new DateTime($cdatet);
                            $timeDiff = $dateTime2->getTimestamp() - $dateTime1->getTimestamp();
                            $timeDiff = $timeDiff/60;
                            
                            if($timeDiff<=15){
                            $MLstask = $this->Menu_model->get_Mastersubtask($quen,$pagen);
                            if(!$MLstask){$apurpose='';}else{$apurpose=$MLstask[0]->que;}
                        ?>
                        
                        <div class="card p-3 col-lg-6 col-sm border border-danger">
                            Purpose<br><b><?=$MLtask[0]->task_subtype?></b><hr>
                            Action<br><b><?=$MLtask[0]->acname?></b><hr>
                            Action Purpose<br><b><?=$apurpose?></b><hr>
                            Current Status<br><b><?=$MLtask[0]->stname?></b><hr>
                            Project Code<br><b><?=$MLtask[0]->pcode?></b><hr>
                            School Name<br><b><?=$MLtask[0]->sname?></b><hr>
                            Task Assign By<br><b><?=$MLtask[0]->fname?></b><hr>
                            Task Assign To<br><b><?=$MLtask[0]->uname?></b><hr>
                            Task Execution Time<br><b><?=$result?></b><hr>
                            Execution to Current TimeDiff<br><b><?=$this->Menu_model->timediff($result,$cdatet);?></b>
                            <hr>
                            <button class="btn btn-danger" id="Reminder<?=$aai?>" value="<?=$mvid?>">Reminder</button>
                        </div>
                        <?php $aai++;}} ?>
                        
                        
                        
                        
                    </div> 
                        
                    </div>
                    
                    <div class="col-12 card p-3 text-center border border-danger">
                        <h4>OverDue Task</h4><hr>
                        <div class="row">
                            
                            <?php
                            $date = date('Y-m-d');
                            $Ltask = $this->Menu_model->get_MasterLive($date);
                            foreach($Ltask as $Ltask){
                            $mvid = $Ltask->mvid;
                            $tid = $Ltask->tid;
                            $pagen = $Ltask->pagen;
                            $MLtask = $this->Menu_model->get_MasterLbtid($tid);
                            $MLque = $this->Menu_model->get_Masterque($mvid);
                            $quen = $MLque[0]->que;
                            $sdatet = $MLque[0]->sdatet;
                            $dateTime = new DateTime($sdatet);
                            $interval = new DateInterval('PT05M');
                            $dateTime->sub($interval);
                            $result = $dateTime->format('Y-m-d H:i:s');
                            $dateTime1 = new DateTime($result);
                            $dateTime2 = new DateTime($cdatet);
                            $timeDiff = $dateTime2->getTimestamp() - $dateTime1->getTimestamp();
                            $timeDiff = $timeDiff/60;
                            
                            if($timeDiff>15){
                                
                            $MLstask = $this->Menu_model->get_Mastersubtask($quen,$pagen);
                            if(!$MLstask){$apurpose='';}else{$apurpose=$MLstask[0]->que;}
                        ?>
                        
                        <div class="card p-3 col-lg-2 col-sm border border-danger">
                            Purpose<br><b><?=$MLtask[0]->task_subtype?></b><hr>
                            Action<br><b><?=$MLtask[0]->acname?></b><hr>
                            Action Purpose<br><b><?=$apurpose?></b><hr>
                            Current Status<br><b><?=$MLtask[0]->stname?></b><hr>
                            Project Code<br><b><?=$MLtask[0]->pcode?></b><hr>
                            School Name<br><b><?=$MLtask[0]->sname?></b><hr>
                            Task Assign By<br><b><?=$MLtask[0]->fname?></b><hr>
                            Task Assign To<br><b><?=$MLtask[0]->uname?></b><hr>
                            Task Execution Time<br><b><?=$result?></b><hr>
                            Execution to Current TimeDiff<br><b><?=$this->Menu_model->timediff($result,$cdatet);?></b>
                        </div>
                        <?php }} ?>
                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <hr>
                    </div>
                            
                            
                </div>
            </div>
            
        </div>    
        
        
        
        
              </div>
     </div></div>
    </section>
    
<div id="doaction1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="modal-standard-title1">Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?=form_open('Menu/Reminder')?>
                    <input type="hidden" name="uid" value="<?=$uid?>">
                    <input type="hidden" id="tid" name="tid">
                    <textarea name="remark" placeholder="Remark..." class="form-control"></textarea>
                    <input type="submit" class="mt-2 bg-danger">
                </form>
            </div>
</div></div></div>


    
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('[id^="Reminder"]').on('click', function() {
    $('#doaction1').modal('show');
    var a = this.value;
    
    
    var arrayA = a.split(',');
    var b = parseInt(arrayA[0]);
    var c = parseInt(arrayA[1]);
    document.getElementById("tid").value = b;
    document.getElementById("mvid").value = c;
    document.getElementById("username").value = document.getElementById("user").value;
});

</script>

          
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