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
                    <?php  $tdate=date('Y-m-d'); $cdatet=date('Y-m-d H:m:s'); ?>
                    <div class="col-12">
                        <div class="card p-3 text-center border border-danger">
                            <h4>Live Task</h4><hr>
                            <div class="row">
                                <?php 
                                $piatask = $this->Menu_model->get_PIAwiseTask($tdate);
                                foreach($piatask as $piatask){
                                    $piaid = $piatask->piaid; 
                                $livetask = $this->Menu_model->get_pialivetask($tdate,$piaid);
                                foreach($livetask as $ltask){?>
                                <div  class="card p-3 col-3 border border-success">
                                    <b><?=$ltask->acname?></b><hr>
                                    <b><?=$ltask->stname?></b><hr>
                                    <b><?=$ltask->sname?></b><hr>
                                    <b><?=$ltask->uname?></b><hr>
                                    <b><?=$tdt=$ltask->plandate?></b>
                                    <b><?=$indt=$ltask->initiateddt?></b>
                                    <b><?=$this->Menu_model->timediff($tdt,$indt);?></b><hr>
                                    <b><?=$this->Menu_model->timediff($indt,$cdatet);?></b>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                    
                    
                    <hr>
                    <div class="col-12">
                            <?php  
                            $time1 = array('09:00:00', '11:00:00', '13:00:00','15:00:00','17:00:00','19:00:00');
                            $time2 = array('11:00:00', '13:00:00', '15:00:00','17:00:00','19:00:00','21:00:00');?>
                            <center><h3>Pending Task</h3></center>
                            
                        <?php for($i=0;$i<6;$i++){
                                $t1=$time1[$i];
                                $t2=$time2[$i];
                                $dt1= $tdate." ".$t1;
                                $dt2= $tdate." ".$t2;
                                $tt1 = date("h:i a", strtotime($t1));
                                $tt2 = date("h:i a", strtotime($t2)); ?>
                                <div class="card p-3">
                                    <center><h6><b>Task Between <?=$tt1?> to <?=$tt2?></b></h6></center><hr>
                                    <?php
                                    $action = $this->Menu_model->get_todaypaction($dt1,$dt2);
                                    foreach($action as $action){?>
                                    <div  class="card p-3">
                                        <b><?=$action->acname?> (<?=$tt1?> to <?=$tt2?> )</b><hr>
                                        <?php 
                                            $action = $action->acname;
                                            $status = $this->Menu_model->get_todaypstatus($dt1,$dt2,$action);
                                            foreach($status as $status){ $stid = $status->stid; ?>
                                                <div  class="card p-3 text-center">
                                                    <b><?=$status->stname?> (<?=$tt1?> to <?=$tt2?> )</b><hr>
                                                    <div class="row">
                                                        <?php $task = $this->Menu_model->get_todayptask($dt1,$dt2,$action,$stid); 
                                                        foreach($task as $task){?>
                                                        <div  class="card p-3 col-2 border border-danger">
                                                            <b><?=$task->sname?></b><hr>
                                                            <b><?=$task->uname?></b><hr>
                                                            <b><?=$tdt=$task->plandate?></b>
                                                            <b><?=$this->Menu_model->timediff($tdt,$cdatet);?></b>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>   
                                        <?php } ?>
                                </div>
                                <hr>
                            <?php } ?>
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


<div id="doaction2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="modal-standard-title1">Appreciate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?=form_open('Menu/Appreciate')?>
                    <input type="hidden" name="uuid" value="<?=$uid?>">
                    <input type="hidden" id="ttid" name="ttid">
                    <textarea name="remark" placeholder="Remark..." class="form-control"></textarea>
                    <input type="submit" class="mt-2 bg-success">
                </form>
            </div>
</div></div></div>
    
<div class="modal fade" id="imagemodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" data-dismiss="modal">
    <div class="modal-content"  >              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview1" style="width: 100%;" >
      </div>
      </div>
  </div>
</div>
    
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('[id^="Reminder"]').on('click', function() {
    $('#doaction1').modal('show');
    document.getElementById("tid").value = this.value;
    document.getElementById("username").value = document.getElementById("user").value;;
});

$('[id^="Appreciate"]').on('click', function() {
    document.getElementById("ttid").value = this.value;
    $('#doaction2').modal('show');
});

$(function() {
		$('.pop1').on('click', function() {
			$('.imagepreview1').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal1').modal('show');   
		});	
		$('.pop2').on('click', function() {
			$('.imagepreview2').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal2').modal('show');   
		});	
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