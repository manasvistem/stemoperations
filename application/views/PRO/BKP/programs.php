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

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Handover to Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4>HI! <?=$user['fullname']?> ( <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
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
            <form class="p-3" method="POST" action="programs">
                <select name="year" id="year" class="m-2">
                    <option value="">All</option>
                    <?php foreach($ally as $y){?>
                        <option><?=$y->yearn?></option>
                    <?php }?>
                </select>
                <input list="pcode" class="m-2" name="pcode">
                <datalist id="pcode">
                </datalist>
            <button type="submit" class="bg-primary text-light">Filter</button>
            </form>
        </div>

    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Client Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <?php if(isset($_POST['pcode'])){$pcode = $_POST['pcode'];
                  $client = $this->Menu_model->get_clientbypc($pcode);
                  $cid = $client[0]->id;
                  $spd = $this->Menu_model->get_spdbypc($pcode);
                  $pmtask = $this->Menu_model->get_pmtaskbypc($pcode);
                  
                  $dpi = $this->Menu_model->get_dpidbypc($pcode);
                  $dins = $this->Menu_model->get_dinsdbypc($pcode);
                  $dzh = $this->Menu_model->get_dzhdbypc($pcode);
                  
                  
                  $repair = $this->Menu_model->get_repairreqbypc($pcode);
                  
                  $replace = $this->Menu_model->get_replacereqbypc($pcode);
                  
                  
                ?>
                <div class="row">
                    <div class="card p-3 col-lg-3 col-sm">
                        Client Name : <?=$client[0]->client_name;?><br>
                        NGO Name : <?=$client[0]->mediator;?><br>
                        BD Name : <?=$client[0]->mediator;?><br>
                        Project Code : <?=$client[0]->projectcode;?><br>
                        Project Year : <?=$client[0]->project_year;?><br>
                        No of School: <?=$client[0]->noofschool;?><br>
                        School Handover: <?=sizeof($spd);?><br>
                        <a href="ZipProject/<?=$cid?>">Download All Data</a>
                    </div>
                   
                    <div class="card p-3 col-lg-3 col-sm">
                        <center>Program Manager</center><hr><hr>
                        <a href="programtd/1/<?=$cid?>/1">Task Assign : <?=$pmtask[0]->a;?></a>
                        <a href="programtd/1/<?=$cid?>/1">Task Completed : <?=$pmtask[0]->b;?></a>
                        <a href="programtd/1/<?=$cid?>/1">Task Pending : <?=$pmtask[0]->a-$pmtask[0]->b;?></a>
                        <a href="programtd/1/<?=$cid?>/1">Action Yes : <?=$pmtask[0]->c;?></a>
                        <a href="programtd/1/<?=$cid?>/1">Action NO : <?=$pmtask[0]->d;?></a>
                    </div>
                    
                    <?php foreach($dzh as $dzh){
                        $zhid = $dzh->zh_id;
                        $zhname = $this->Menu_model->get_user_byid($zhid);
                        $zmtask = $this->Menu_model->get_zmbypc($pcode,$zhid);
                    ?>
                    <div class="card p-3 col-lg-3 col-sm">
                        <center>Zonal Head (<?=$zhname[0]->fullname?>)</center><hr><hr>
                        <a href="programtd/<?=$zhid?>/<?=$cid?>/1">Task Assign : <?=$zmtask[0]->a;?></a>
                        <a href="programtd/<?=$zhid?>/<?=$cid?>/2">Task Completed : <?=$zmtask[0]->b;?></a>
                        <a href="programtd/<?=$zhid?>/<?=$cid?>/3">Task Pending : <?=$zmtask[0]->a-$zmtask[0]->b;?></a>
                        <a href="programtd/<?=$zhid?>/<?=$cid?>/4">Action Yes : <?=$zmtask[0]->c;?></a>
                        <a href="programtd/<?=$zhid?>/<?=$cid?>/5">Action NO : <?=$zmtask[0]->d;?></a>
                    </div>
                    <?php }
                    foreach($dpi as $dpi){
                        $piid = $dpi->pi_id;
                        $piname = $this->Menu_model->get_user_byid($piid);
                        $pitask = $this->Menu_model->get_pibypc($pcode,$piid);
                    ?>
                    
                    <div class="card p-3 col-lg-3 col-sm">
                        <center>PIA (<?=$piname[0]->fullname?>)</center><hr><hr>
                        <a href="programtd/<?=$piid?>/<?=$cid?>/1">Task Assign : <?=$pitask[0]->a;?></a>
                        <a href="programtd/<?=$piid?>/<?=$cid?>/2">Task Completed : <?=$pitask[0]->b;?></a>
                        <a href="programtd/<?=$piid?>/<?=$cid?>/3">Task Pending : <?=$pitask[0]->a-$pitask[0]->b;?></a>
                        <a href="programtd/<?=$piid?>/<?=$cid?>/4">Action Yes : <?=$pitask[0]->c;?></a>
                        <a href="programtd/<?=$piid?>/<?=$cid?>/5">Action NO : <?=$pitask[0]->d;?></a>
                    </div>
                    <?php }
                    foreach($dins as $dins){
                        $insid = $dins->ins_id;
                        $insname = $this->Menu_model->get_user_byid($insid);
                        $instask = $this->Menu_model->get_insbypc($pcode,$insid);
                    ?>
                    <div class="card p-3 col-lg-3 col-sm">
                        <center>Inst&Main Person (<?=$insname[0]->fullname?>)</center><hr><hr>
                        <a href="programtd/<?=$insid?>/<?=$cid?>/1">Task Assign : <?=$instask[0]->a;?></a>
                        <a href="programtd/<?=$insid?>/<?=$cid?>/2">Task Completed : <?=$instask[0]->b;?></a>
                        <a href="programtd/<?=$insid?>/<?=$cid?>/3">Task Pending : <?=$instask[0]->a-$instask[0]->b;?></a>
                        <a href="programtd/<?=$insid?>/<?=$cid?>/4">Action Yes : <?=$instask[0]->c;?></a>
                        <a href="programtd/<?=$insid?>/<?=$cid?>/5">Action NO : <?=$instask[0]->d;?></a>
                    </div>
                    <?php } ?>
                </div>
                
                <center><h3 class="m-3">Program Detail</h3></center><hr>
                
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>SNo.</th>
                              <th>Date of Handover</th>
                              <th>Client Name</th>
                              <th>Project Code</th>
                              <th>Project Year</th>
                              <th>Total School</th>
                              <th>Date of Dispatch</th>
                              <th>Installtion</th>
                              <th>FTTP</th>
                              <th>Total Utilisation</th>
                              <th>Maintenance</th>
                              <th>RTTP</th>
                              <th>M&E</th>
                              <th>DIY</th>
                              <th>Monthly Report</th>
                              <th>Annual Report</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $i=1;
                          foreach($client as $pc){
                            $spdpc = $pc->projectcode;
                            $disdate = $this->Menu_model->get_dispatch($spdpc);
                            if($disdate){$disdate=$disdate[0]->dispatchdt;}else{$disdate='No Data Available';}
                            $tspd = $this->Menu_model->get_spdbypc($spdpc);
                            $insr=0;$fttpr=0;$montr=0;$mner=0;$diyr=0;$rttpr=0;$mainr=0;$annr=0;$uti=0;
                              foreach($tspd as $sp){
                                $sid = $sp->id;
                                 $slog=$this->Menu_model->get_schoollogs($sid);
                                    foreach($slog as $sl){
                                        if($sl->task_type=='Utilisation'){$uti++;}
                                    }
                                $type = 'Installation';
                                $ins = $this->Menu_model->get_reportbysid($sid,$type);
                                if(sizeof($ins)>0){$insr++;}
                                $type = 'FTTP';
                                $fttp = $this->Menu_model->get_reportbysid($sid,$type);
                                if(sizeof($fttp)>0){$fttpr++;}
                                $type = 'Annual Report';
                                $ann = $this->Menu_model->get_reportbysid($sid,$type);
                                if(sizeof($ann)>0){$annr++;}
                                $type = 'Maintenance';
                                $main = $this->Menu_model->get_reportbysid($sid,$type);
                                if(sizeof($main)>0){$mainr++;}
                                $type = 'RTTP';
                                $rttp = $this->Menu_model->get_reportbysid($sid,$type);
                                if(sizeof($rttp)>0){$rttpr++;}
                                $type = 'DIY';
                                $diy = $this->Menu_model->get_reportbysid($sid,$type);
                                if(sizeof($diy)>0){$diyr++;}
                                $type = 'M&E';
                                $mne = $this->Menu_model->get_reportbysid($sid,$type);
                                if(sizeof($mne)>0){$mner++;}
                                $type = 'Monthly';
                                $mont = $this->Menu_model->get_reportbysid($sid,$type);
                                if(sizeof($mont)>0){$montr++;}
                              }
                              if($insr!=0){
                          ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$pc->sdatet?></td>
                            <td><?=$pc->client_name?></td>
                            <td><a href="Programlogs/<?=$pc->id?>"><?=$pc->projectcode?></a></td>
                            <td><?=$pc->project_year?></td>
                            <td><a href="cschooldetail/<?=$pc->id?>"><?=sizeof($tspd)?></a></td>
                            <td><?=$disdate?></td>
                            <td><?=$insr?></td>
                            <td><?=$fttpr?></td>
                            <td><?=$uti?></td>
                            <td><?=$mainr?></td>
                            <td><?=$rttpr?></td>
                            <td><?=$mner?></td>
                            <td><?=$diyr?></td>
                            <td><?=$montr?></td>
                            <td><?=$annr?></td>
                        </tr>
                        <?php $i++;}} ?>
                      </tbody>
                    </table>
                </div>
                            
                            
                
                <center><h3 class="m-3">School Detail</h3></center><hr>
                
                <div class="table-responsive">
                   <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <tr>
                        <th>S.No</th>
                        <th>School Name</th>
                        <th>Program Manager</th>
                        <th>PIA</th>
                        <th>Zonal Head</th>
                        <th>School Address</th>
                        <th>School City</th>
                        <th>School State</th>
                        <th>Installtion</th>
                        <th>FTTP</th>
                        <th>Total Utilisation</th>
                        <th>Maintenance</th>
                        <th>RTTP</th>
                        <th>M&E</th>
                        <th>DIY</th>
                        <th>Monthly Report</th>
                        <th>Annual Report</th>
                    </tr>
                    <?php $i=1;foreach($spd as $spd){
                        $insr=0;$fttpr=0;$montr=0;$mner=0;$diyr=0;$rttpr=0;$mainr=0;$annr=0;$uti=0;
                        $sid = $spd->id;
                         $slog=$this->Menu_model->get_schoollogs($sid);
                            foreach($slog as $sl){
                                if($sl->task_type=='Utilisation'){$uti++;}
                            }
                        $type = 'Upload Installation Report';
                        $ins = $this->Menu_model->get_reportbysid($sid,$type);
                        if(sizeof($ins)>0){$insr++;}
                        $type = 'Upload FTTP Report';
                        $fttp = $this->Menu_model->get_reportbysid($sid,$type);
                        if(sizeof($fttp)>0){$fttpr++;}
                        $type = 'Annual';
                        $ann = $this->Menu_model->get_reportbysid($sid,$type);
                        if(sizeof($ann)>0){$annr++;}
                        $type = 'Upload Maintenance Report';
                        $main = $this->Menu_model->get_reportbysid($sid,$type);
                        if(sizeof($main)>0){$mainr++;}
                        $type = 'Upload RTTP Report';
                        $rttp = $this->Menu_model->get_reportbysid($sid,$type);
                        if(sizeof($rttp)>0){$rttpr++;}
                        $type = 'Upload DIY Repor';
                        $diy = $this->Menu_model->get_reportbysid($sid,$type);
                        if(sizeof($diy)>0){$diyr++;}
                        $type = 'Upload M&E Report';
                        $mne = $this->Menu_model->get_reportbysid($sid,$type);
                        if(sizeof($mne)>0){$mner++;}
                        $type = 'Monthly';
                        $mont = $this->Menu_model->get_reportbysid($sid,$type);
                        if(sizeof($mont)>0){$montr++;}
                        $pi = $spd->pi_id;
                        $pi = $this->Menu_model->get_user_byid($pi);
                        $zh = $spd->zh_id;
                        $zh = $this->Menu_model->get_user_byid($zh);
                    ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><a href="school_detail/<?=$spd->id?>" target="_blank"><?=$spd->sname?></a></td>
                        <td>Vikash Panchal</td>
                        <td><?=$pi[0]->fullname?></td>
                        <td><?=$zh[0]->fullname?></td>
                        <td><?=$spd->saddress?></td>
                        <td><?=$spd->scity?></td>
                        <td><?=$spd->sstate?></td>
                        <td><?=$insr?></td>
                        <td><?=$fttpr?></td>
                        <td><?=$uti?></td>
                        <td><?=$mainr?></td>
                        <td><?=$rttpr?></td>
                        <td><?=$mner?></td>
                        <td><?=$diyr?></td>
                        <td><?=$montr?></td>
                        <td><?=$annr?></td>
                    </tr>
                    <?php } ?>
                </table>
                </div>
                
                <center><h3 class="m-3">Task Detail</h3></center><hr>
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>								
                                <th>Sr Number</th>
                                <th>Task Assign By</th>
                                <th>Task Assign to</th>
                                <th>Task Assign Date</th>
                                <th>Task Plandate Date</th>
                                <th>Time Diff (Assign to Plandate)</th>
                                <th>Task Initiated Date</th>
                                <th>Time Diff (Plandate to Initiated)</th>
                                <th>Task Completed Date</th>
                                <th>Time Diff (Assign to Completed)</th>
                                <th>Project Code</th></th>
                                <th>School Name</th></th>
                                <th>Task Type</th>
                                <th>Task Purpose</th>
                                <th>Task Done By</th>
                                <th>Remark</th>
                                <th>Checklist</th>
                                <th>Media</th>
                                <th>Report</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;
                          $plog=$this->Menu_model->get_progprelogs($cid);
                          foreach ($plog as $pl){?>
                          <tr>
                            <td><?=$i?></td>
                            <td></td>
                            <td></td>
                            <td><?=$pl->sdatet?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?=$pcode?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?=$pl->remark?></td>
                            <td></td>
                        </tr>
                        <?php $i++;} ?>
                          <?php 
                          $slog=$this->Menu_model->get_taskbypcode($pcode);
                          foreach ($slog as $sl){
                              $sid = $sl->sid;
                              $tassignd = $sl->tassignd;
                              $tid = $sl->tid;
                              $plan=$this->Menu_model->get_plantaskbytid($tid);
                              $uid = $sl->to_user;
                              $user=$this->Menu_model->get_user_byid($uid);
                              $report=$this->Menu_model->get_reportbystid($tid,$sid);
                              
                              $fuser = $sl->from_user;
                              $fuser=$this->Menu_model->get_user_byid($fuser);
                              
                              
                              
                          ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$fuser[0]->fullname?></td>
                            <td><?=$user[0]->fullname?></td>
                            <td><?=$sl->tassignd?></td>
                            <td><?=$sl->plandate?></td>
                            <td><?=$this->Menu_model->timediff($sl->tassignd,$sl->plandate)?></td>
                            <td><?=$sl->initiateddt?></td>
                            <td><?=$this->Menu_model->timediff($sl->plandate,$sl->initiateddt)?></td>
                            <td><?=$sl->donet?></td>
                            <td><?=$this->Menu_model->timediff($sl->tassignd,$sl->donet)?></td>
                            <td><?=$pcode?></td>
                            <td><?=$sl->sname?></td>
                            <td><?=$sl->task_type?></td>
                            <td><?=$sl->task_subtype?></td>
                            <td><?=$user[0]->fullname?></td>
                            <td><?=$sl->remark?></td>
                            <td><?php if($sl->checklist!=''){?><a href="DownloadChecklist/<?=$sid?>/<?=$tid?>"><i class="fa fa-database" aria-hidden="true"></i></a><?php }?></td>
                            <td><?php if($sl->task_type=='Utilisation'){?><a href="ZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                            <td><?php if($sl->task_type=='Report'){?><a href="<?=base_url();?><?=$sl->filepath?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php }?>
                            </td>
                        </tr>
                        <?php $i++;} ?>
                      </tbody>
                    </table>
                </div>
                
                
                
                
                <center><h3 class="m-3">Replacement Detail</h3></center><hr>
                
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>								
                                <th>S No.</th>
                                <th>School Name</th>
                                <th>Model Name</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          <?php 
                          $i=1;
                          foreach ($replace as $rc){
                              
                          ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$rc->sname?></td>
                            <td><?=$rc->model_name?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                </div>
                
                <center><h3 class="m-3">Repair Detail</h3></center><hr>
                
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>								
                                <th>S No.</th>
                                <th>School Name</th>
                                <th>Model Name</th>
                                <th>Part Name</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          <?php 
                          $i=1;
                          foreach ($repair as $rr){
                              
                          ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$rr->sname?></td>
                            <td><?=$rr->model_name?></td>
                            <td><?=$rr->part_name?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                <?php } ?>
                  
                  
                  
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
    
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>    
$('#year').on('change', function c() {
var year = document.getElementById("year").value;
$.ajax({
url:'<?=base_url();?>Menu/pcodebyyear',
type: "POST",
data: {
year: year
},
cache: false,
success: function a(result){
$("#pcode").html(result);
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
