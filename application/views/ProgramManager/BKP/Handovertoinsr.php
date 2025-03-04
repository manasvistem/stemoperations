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
              <div class="card-body box-profile">
                
                
                <?php 
                    $client = $this->Menu_model->get_clientbyid($pid);
                    $bdid=$client[0]->bd_id;
                    $pcode=$client[0]->projectcode;
                    $bddata = $this->Menu_model->get_bdnamebyid($bdid);
                    $bdyear = $this->Menu_model->get_yearbybd($bdid);
                    $mdata = $this->Menu_model->get_Programbypcode($pcode);
                    $fgtask = $this->Menu_model->get_fmtaskAssing($pcode);
                    $joincall = $this->Menu_model->get_joincallpcode($pcode);
                    if($joincall){
                        $cdate = date('Y-m-d');
                        $dud = $joincall[0]->dud;
                        $dudc = $this->Menu_model->timediff($dud,$cdate);
                        $dad = $joincall[0]->dad;
                        $dadc = $this->Menu_model->timediff($dad,$cdate);
                        $pd = $joincall[0]->pd;
                        $pdc = $this->Menu_model->timediff($pd,$cdate);
                        $pbpd = $joincall[0]->pbpd;
                        $pbpdc = $this->Menu_model->timediff($pbpd,$cdate);
                        $pad = $joincall[0]->pad;
                        $padc = $this->Menu_model->timediff($pad,$cdate);
                        $disd = $joincall[0]->disd;
                        $disdc = $this->Menu_model->timediff($disd,$cdate);
                        $insd = $joincall[0]->insd;
                        $insdc = $this->Menu_model->timediff($insd,$cdate);
                        $insrd = $joincall[0]->insrd;
                        $insrdc = $this->Menu_model->timediff($insrd,$cdate);
                ?>
                
                  <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info">
                        <b>BD Name : <?=$bddata[0]->name?> | Client Name : <?=$client[0]->client_name?> | Project Code : <?=$pcode?> | Project Code : <?=$pcode?> | Total School : <?=$mdata[0]->tspd?> | PIA Involve : <?=$mdata[0]->pia?> | IMP Involve : <?=$mdata[0]->imp?></b>
                  </div>
                  
                  
                  <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4>Handover Process</h4></center>
                  </div>
                  
                  
                  <div class="row p-3 text-center">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border bg-success">
                            <a href="<?=base_url();?>Menu/HandoverForm/<?=$pid?>">
                            <b>Handover to PM</b><hr>
                            <b><?=$client[0]->htpm?></b><hr>
                            <b><?=$bddata[0]->name?></b></a>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border bg-success">
                            <b>Handover to Account</b><hr>
                            <b><?=$client[0]->htac?></b><hr>
                            <b><?=$bddata[0]->name?></b></a>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border bg-success">
                            <b>Project code Created</b><hr>
                            <b><?=$client[0]->sdatet?></b><hr>
                            <b>Account_Omkar</b></a>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Join Call</b><hr>
                            <b><?=$joincall[0]->startt?></b><hr>
                            <b><?=$joincall[0]->closet?></b><hr>
                            <b>Vikash Panchal</b><hr>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                          <b>PIA Assign</b><hr>
                          <b><?=$client[0]->sdatet?></b><hr>
                          <b>Vikash Panchal</b><hr>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border bg-success">
                          <b>Handover to FM</b><hr>
                          <b><?=$client[0]->sdatet?></b><hr>
                          <b>Vikash Panchal</b><hr>
                      </div>
                  </div>
                  
                  
                  <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4><a target="_blank" href="<?=base_url();?>Menu/DesignProcess/<?=$pid?>">Design Process (<?=$dud?>)</a></h4></center>
                  </div>
                  <div class="row p-3 text-center">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info bg-success">
                            <b>Design Process</b><hr>
                            <?php $fgtask = $this->Menu_model->get_fmtaskAssing($pcode);?>
                            <b><?=$fgtask[0]->assign_dt?></b><hr>
                            <b>Rajib Dutta</b><hr>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Design Approve By BD<br>(<?=$dad?>)</b><hr>
                            <?php $dbdapr = $this->Menu_model->get_designstart($pid);?>
                            <b><?=$dbdapr[0]->sdatet?></b><hr>
                            <b><?=$bddata[0]->name?></b><hr>
                            
                            
                      </div>
                  </div>
                  
                  
                  <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><a target="_blank" href="<?=base_url();?>Menu/PrintingProcess/<?=$pid?>"><h4>Printing Process (<?=$pd?>)</h4></a></center>
                  </div>
                  <div class="row p-3">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                          <b>Backdrop Printing</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                          <b>User Manual Printing</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                          <b>Training Manual Printing</b>
                      </div>
                  </div>
                  
                  
                  <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4>Purchase Process (<?=$pbpd?>)</h4></center>
                  </div>
                  <div class="row p-3">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Purchase Inisated</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Partical Board Delivered</b>
                      </div>
                  </div>
                  
                  <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4>Packing Process  (<?=$pad?>)</h4></center>
                  </div>
                  <div class="row p-3">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Preparing</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Packing</b>
                      </div>
                  </div>
                  
                  <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4>Pre Installation Process</h4></center>
                  </div>
                  <div class="row p-3">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>School Readiness Call</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Installation Scheduling Call</b>
                      </div>
                  </div>
                  
                  
                  
                  
                    <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4>Dispace Process (<?=$disd?>)</h4></center>
                    </div>
                    <div class="row p-3">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Dispace Process</b>
                      </div>
                    </div> 
                    
                    
                    <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4>Dilivery Process (<?=$disd?>)</h4></center>
                    </div>
                    <div class="row p-3">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Logistic Info Updated</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>eWay Bill Generated</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Dilivery Process</b>
                      </div>
                    </div> 
                    
                    
                    <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4>Transit Process</h4></center>
                    </div>
                    <div class="row p-3">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Train info to Installation Person</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Recive by Installation Person</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Lodaed in tempo with etimated begdet</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>start Journey</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Unloding</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Diliver in School</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Close Journey</b>
                      </div>
                    </div> 
                    
                    
                    <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4>Installation Process (<?=$insd?>)</h4></center>
                    </div>
                    <div class="row p-3">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Installation Visit</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Add More Photo</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Report Upload  (<?=$insrd?>)</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Installation Review</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>School Added in SPD</b>
                      </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4>RID Detail</h4></center>
                    </div>
                    <div class="row p-3">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Total Repair</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Total Replacement</b>
                      </div>
                    </div> 
                    
                    
                    <div class="col-lg-12 col-md-12 col-sm p-3 rounded border border-info p-3">
                        <center><h4>RID Detail</h4></center>
                    </div>
                    <div class="row p-3">
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Total Repair</b>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm p-3 rounded border border-info">
                            <b>Total Replacement</b>
                      </div>
                    </div>              
                                            
                            </div>
                        </div>
                        
                        
                        <?php }else{
                        echo "<div class='p-3 col-4 m-auto'><h2>First You Need to Take Join Call</h2></div>";
                    } ?>
                    
                    
              </div>
     </div></div>
    </section>
    
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