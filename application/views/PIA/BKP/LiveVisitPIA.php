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
    

    
    <section class="content">
     <div class="container-fluid">
        <div class="col-sm col-md-12 col-lg-12 m-auto">
            <div class="card card-primary card-outline p-3">
                <center><h4>Live Pending Task</h4></center><hr>
                <div class="row">
                <?php date_default_timezone_set("Asia/Kolkata");
                    $aai=1; $date = date('Y-m-d', strtotime('+0 day'));
                    $nxtdtask=$this->Menu_model->get_livevisitpendingpia($date);
                foreach($nxtdtask as $md){$tid = $md->tid;?>
                
                <div class="col-lg-2 col-md-3 col-sm-12 bg-danger card p-3 border border-white text-center"><b>
                   <?=$md->sname?><hr>
                   <?=$md->fullname?><hr>
                   <?=$md->que?><hr>
                   <?=$md->tasktime?><hr></b>
                   <button class="btn btn-default" id="Reminder<?=$aai?>" value="<?=$tid?>">Reminder</button>
                </div>
                          
                <?php $aai++;} ?>
                </div>
            </div>
        </div>
     </div>
    </section>
    
    
    
    <section class="content">
      <div class="container-fluid">
        <div class="col-sm col-md-12 col-lg-12 m-auto">
            <div class="card card-primary card-outline p-3">
                
            <center><h4>Today's All Pending Task</h4></center><hr>
            <div class="row">
                <?php 
                     
                    $nxtdtask=$this->Menu_model->get_livevisitpia('1',$date);
                    $aai=1;
                    foreach($nxtdtask as $md){
                        $plant = $md->plandate;
                        $plan = date('d-m-Y  h:i A', strtotime($plant));
                        $sid = $md->spd_id; echo '<br>';
                        $tid = $md->tid;
                        $page = $md->checklist;
                ?>
                
                <div class="col-12 card p-4"><?=$md->fullname?> | <?=$plant?> | <?=$md->project_code?> | <?=$md->sname?> | <?=$md->task_type?> | <?=$md->taskname?></div>
                    <div class="col-12 card p-4">
                        <?php $reminder = $this->Menu_model->get_Reminder($tid);
                          $appreciate = $this->Menu_model->get_Appreciate($tid);?>
                        <?php foreach($reminder as $rem){?>
                        <p><b>Reminder : <?=$rem->remark?></b></p>
                        <?php } ?>
                        <?php foreach($appreciate as $appr){?>
                        <p><b>Appreciate : <?=$appr->remark?></b></p>
                        <?php } ?>
                    </div>    
                    
                    <?php
                    $pagetask = $this->Menu_model->get_visitsubtask($page);
                    foreach($pagetask as $pt){ 
                    $que = $pt->que;
                    
                    $vu = $this->Menu_model->get_visitstupdate($sid,$tid,$que);
                    if(!$vu){
                        
                        $ttime=$this->Menu_model->get_visittasktime($page,$tid,$que);
                        $color="bg-danger";
                        $sdatet = "";
                        $url1="";$url2="";?>
                   <div class="col-lg-2 col-md-3 col-sm-12 <?=$color?> card p-3 border border-white"><center><b>
                       <?=$pt->que?><hr>
                       Expacted Time<br><?=$ttime[0]->tasktime?>
                       </b></center>
                   
                   
                   </div>   
                        
                <?php $aai++;}}} ?>
            </div>
        </div>
     </div>
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