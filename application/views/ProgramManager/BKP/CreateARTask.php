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
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4><?php $user['fullname']?>  <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); $did[0]->dep_name;?></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
    <?php $stage = $this->Menu_model->get_areviewstarted();
        if($stage){$piid = $stage[0]->piid;}else{$piid=0;}
        if($piid==0){
    ?>
    
    
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline"><div class="card-body box-profile">
                  <form action="<?=base_url();?>Menu/startar" method="post">
                  <div class="form-group">
                    <label>Date and Time</label>
                    <input type="datetime-local" class="form-control" name="sdate" value="<?=date('Y-m-d H:i:s')?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Select PIA</label>
                    <select class="custom-select rounded-0" name="piid">
                    <option value="">Select PIA</option>
                    <?php foreach($du as $d){if($d->dep_id=='2'){?>
                    <option value="<?=$d->id?>"><?=$d->fullname?></option>
                    <?php }} ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Start Review</button>
                  </div>
                </div>
              </div>
             </form>
          </div></div>
      </div>   
     </div>     
    </section>
    
    <?php } else{?>
    
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-12 col-lg-12 m-auto">
              <div class="card card-primary card-outline"><div class="card-body box-profile">
                  <?php 
                    $sd='2022-04-01';
                    $ed='2023-03-31';
                    $ardata = $this->Menu_model->get_ardata($piid);
                    $aruwadmin = $this->Menu_model->get_aruwadmin($piid);
                    $ardata1 = $this->Menu_model->get_utdetail($sd,$ed,$piid);
                    $fullname = $aruwadmin[0]->fullname;
                    $ardata2 = $this->Menu_model->get_userreportdetail($sd,$ed,$fullname);
                    $ar2data = $this->Menu_model->get_ar2data($piid);
                  ?>
                  <div class="row">
                      <div class="col-sm col-md-6 col-lg-6 m-auto">
                      <ul>
                          <li><label>PIA Name : <?=$aruwadmin[0]->fullname?></label></li>
                          <li><label>Zonal Manager : <?=$aruwadmin[0]->zfullname?></label></li>
                          <li><label>Total School : <?=$ardata[0]->ab?></label></li>
                          <li><label>Total Client : <?=$ardata[0]->tclient?></label></li>
                              <ul>
                                    <?php 
                                    $clientname  = $ardata[0]->clientname;
                                    $clientname = explode(',', $clientname);
                                    $l = sizeof($clientname);
                                    for($i=0;$i<$l;$i++){?>
                                    <li><?=$clientname[$i]?></li>
                                    <?php } ?>
                              </ul>
                          <li><label>Total Project : <?=$ardata[0]->tproject?></label></li>
                            <ul>
                                <?php 
                                $project  = $ardata[0]->project;
                                $project = explode(',', $project);
                                $l = sizeof($project);
                                for($i=0;$i<$l;$i++){?>
                                <li><?=$project[$i]?></li>
                                <?php } ?>
                            </ul>
                        <li><label>Total New schools : <?=$ardata[0]->nschool?></label></li>
                        <li><label>Total Old Schools : <?=$ardata[0]->oschool?></label></li>
                        <li><label>Total City : <?=$ardata[0]->cityc?></label></li>
                            <ul>
                                <?php 
                                $city  = $ardata[0]->city;
                                $city = explode(',', $city);
                                $l = sizeof($city);
                                for($i=0;$i<$l;$i++){?>
                                <li><?=$city[$i]?></li>
                                <?php } ?>
                            </ul>
                        <li><label>Total State : <?=$ardata[0]->statec?></label></li>
                            <ul>
                                <?php 
                                $state  = $ardata[0]->state;
                                $state = explode(',', $state);
                                $l = sizeof($state);
                                for($i=0;$i<$l;$i++){?>
                                <li><?=$state[$i]?></li>
                                <?php } ?>
                            </ul>
                      </ul>
                  </div>
                  <div class="col-sm col-md-6 col-lg-6 m-auto">
                  <ul>
                      <li><h4>Status Wise SPD Detail</h4></li>
                      <li><label>Total School : <?=$ardata[0]->ab?></label></li>
                      <li><label>New School : <?=$ardata[0]->a?></label></li>
                      <li><label>Inactive : <?=$ardata[0]->g?></label></li>
                      <li><label>active : <?=$ardata[0]->c+$ardata[0]->d+$ardata[0]->e+$ardata[0]->f+$ardata[0]->h?></label></li>
                      <li><label>Utilization Initiated : <?=$ardata[0]->c?></label></li>
                      <li><label>Average School : <?=$ardata[0]->d?></label></li>
                      <li><label>Good School : <?=$ardata[0]->e?></label></li>
                      <li><label>Model School : <?=$ardata[0]->f?></label></li>
                      <li><label>Client Readiness  : <?=$ardata[0]->h?></label></li>
                  </ul>
                  
                  <ul>
                      <li><h4>Task Detail</h4></li>
                      <li><a href="<?=base_url();?>/Menu/taskdetaildw/<?=$piid?>/<?=$sd?>/<?=$ed?>/Call"><label>Total Call : <?=$ardata1[0]->tcall?></label></a></li>
                      <li><a href="<?=base_url();?>/Menu/taskdetaildw/<?=$piid?>/<?=$sd?>/<?=$ed?>/Visit"><label>Total Visit : <?=$ardata1[0]->visit?></label></a></li>
                      <li><a href="<?=base_url();?>/Menu/taskdetaildw/<?=$piid?>/<?=$sd?>/<?=$ed?>/Utilisation"><label>Utilisation : <?=$ardata1[0]->utilisation?></label></a></li>
                      <li><a href="<?=base_url();?>/Menu/taskdetaildw/<?=$piid?>/<?=$sd?>/<?=$ed?>/Communication"><label>Outbond : <?=$ardata1[0]->outbond?></label></a></li>
                      <li><a href="<?=base_url();?>/Menu/taskdetaildw/<?=$piid?>/<?=$sd?>/<?=$ed?>/Report"><label>Report : <?=$ardata1[0]->report?></label></a></li>
                      <li><label>FTTP : <?=$ardata1[0]->fttp?></label></li>
                      <li><label>FTTP Report: <?=$ardata2[0]->ufttp?></label></li>
                      <li><label>RTTP : <?=$ardata1[0]->rttp?></label></li>
                      <li><label>RTTP Report: <?=$ardata2[0]->urttp?></label></li>
                      <li><label>M&E : <?=$ardata1[0]->mne?></label></li>
                      <li><label>M&E Report: <?=$ardata2[0]->umne?></label></li>
                      <li><label>DIY : <?=$ardata1[0]->diy?></label></li>
                      <li><label>DIY Report: <?=$ardata2[0]->udiy?></label></li>
                  </ul>
                  
                  <ul>
                      <li><h4>Task Detail</h4></li>
                      <li><label>Client Engagement Activity</label></li>
                      <li><label>Virtual Program</label></li>
                      <li><label>Report to govt. Officers</label></li>
                      <li><label>Other Activities</label></li>
                      <li><label>Total client visit</label></li>
                      <li><label>Total Demo</label></li>
                  </ul>
                  
                  <ul>
                      <li><h4>School Remark by PM</h4></li>
                      <?php foreach($ar2data as $ar2){?>
                      <li><label><?=$ar2->sname?></br><?=$ar2->remark?></label></li>
                      <?php } ?>
                  </ul>
                  
                  <?php $spd = $this->Menu_model->get_ar2spdbypiid($piid);
                  $spdc = $spd[0]->cont;
                  $spdr = $this->Menu_model->get_ar2spd($piid);
                  $spdrc = $spdr[0]->cont;
                  if($spdrc<$spdc){?>
                  <button id="add_plan<?=$piid?>" value="<?=$piid?>">Plan</button>
                  <?php } else {?>
                  <form action="<?=base_url();?>Menu/closear" method="post">
                  <div class="form-group">
                    <label>Date and Time</label>
                    <input type="datetime-local" class="form-control" name="cdate" value="<?=date('Y-m-d H:i:s')?>" readonly>
                    <input type="hidden" name="ppiid" value="<?=$piid?>" readonly>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Close Review</button>
                  </div>
             </form>
             <?php } ?>  
                  
      </div>   
     </div>     
    </section>
    
    <?php } ?>
    
    
  
<div id="spdar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
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
                   <div class="card-header bg-info">Review</div>
                   <h6 class="text-center mt-1" id="cmpname"></h6>
                    <div class="col-lg-12 card-body">
                       <?=form_open('Menu/pmspdremark')?>
                       <input type="hidden" name="uid" value="<?=$uid?>" readonly>
                       <input type="hidden" name="piid" id="piid" readonly>
                       <input type="hidden" name="sid" id="sid" readonly>
                       <div class="card-header bg-info"><a id="snlink" target="_blank" href=""><lable id="sname"></lable></a></div>
                       <textarea name="remark" class="form-control" placeholder="Right You Remark"></textarea>
                       <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                       </form>
                    </div>
                    </div>
                        </div>
                    </div>
            </div>
</div></div></div>  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<<script type="text/javascript">

$('[id^="add_plan"]').on('click', function() {
    $('#spdar').modal('show');
    var piid = this.value;
    $.ajax({
         url:'<?=base_url();?>Menu/piidtoar',
         method: 'post',
         data: {piid: piid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           $('#sname').text('');
           if(len > 0){
             var sname = response[0].sname;
             var sid = response[0].sid;
             document.getElementById("sname").innerHTML = sname;
             document.getElementById("snlink").href = "school_detail/"+sid;
             document.getElementById("piid").value = piid;
             document.getElementById("sid").value = sid;
           }
         }
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
      "responsive": false, "lengthChange": false, "autoWi$dth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appen$dto('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>
