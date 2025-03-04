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
       <div class="row p-3">
           <?php $revst = $this->Menu_model->get_piareviewstarted($uid);
           if($revst){$piid = $revst[0]->piid;}else{$piid=0;}
           if($piid==0){?>
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Plan PIA Review Task</h3>
                  <hr>
                  <form action="<?=base_url();?>Menu/piaplanreview" method="post">
                    <div class="was-validated">
                    <div class="form-group">
                        <input type="hidden" name="uid" value="<?=$uid?>">
                        <?php date_default_timezone_set("Asia/Kolkata"); ?>
                        <lable>Review Start Date</lable>
                        <input type="datetime-local" name="plandate" value="<?=date('Y-m-d H:i:s')?>" class="form-control" required="">
                        
                        <div class="invalid-feedback">Please provide Plan Date Time.</div>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="mt-4">
                            <select class="form-control" name="reviewtype" required="" id="reviewtype">
                                <option>Weekly</option>
                            </select>
                        </div>
                        
                        <input type="checkbox" id="myCheckbox" onclick="myFunction()">
                        <label>Do You Want to Change Period Time Frame.</label><br>
                        
                        <lable>Review Period</lable>
                        <input type="date" name="fixdate" id="fixdate" value="<?=date('Y-m-d')?>"  class="form-control" required="">
                        <div class="mt-4">
                            <select class="form-control" name="piid" required="">
                                <?php $pi = $this->Menu_model->get_user();
                                 foreach($pi as $pi){if($pi->dep_id=='2'){?>
                                 <option value="<?=$pi->id?>"><?=$pi->fullname?></option>
                                 <?php }} ?>
                            </select>
                        </div>
                        <div class="mt-4">
                            <input type="text" name="meetlink" placeholder="Meeting Link" class="form-control" required="">
                            <div class="invalid-feedback">Please provide Meeting LInk.</div>
                        <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true;">Create Plan</button>
                    </div>
                    </div>
                  </form>
            </div>
          </div>
      </div> 
      
      <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Start Review Task</h3>
                  <hr>
                  <form action="<?=base_url();?>Menu/piastartreview" method="post">
                    <div class="was-validated">
                    <div class="form-group">
                        <input type="hidden" name="uida" value="<?=$uid?>">
                        <?php date_default_timezone_set("Asia/Kolkata"); ?>
                        <input type="datetime-local" name="startt" value="<?=date('Y-m-d H:i:s')?>" class="form-control" readonly>
                        <div class="invalid-feedback">Please provide Start Date Time.</div>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="mt-4">
                            <select class="form-control" name="reviewid" required="">
                                <?php $reviewid = $this->Menu_model->get_piareviewid($uid);
                                foreach($reviewid as $rev){
                                ?>
                                <option value="<?=$rev->rid?>"><?=$rev->fullname?> (<?=$rev->reviewtype?>) (<?=$rev->plant?>)</option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">Please Create Plan First.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true;">Srart Review</button>
                    </div>
                  </form>
            </div>
          </div>
      </div>
     </div>  
     <?php }else{ ?>
     <div class="col-sm col-md-6 col-lg-6 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h4 class="text-center"><?=$revst[0]->reviewtype;?> Review</h4>
                  <h5 class="text-center"><?=$revst[0]->fullname;?></h5>
                  <hr>
                    <div class="was-validated">
                        <div class="form-group">
                            <input type="hidden" name="uidaa" value="<?=$uid?>">
                            <input type="hidden" id="piid" value="<?=$revst[0]->piid;?>">
                            <?php date_default_timezone_set("Asia/Kolkata"); ?>
                            <input type="date" id="fdate" name="fdate" value="<?=$revst[0]->fixdate;?>" class="form-control" readonly>
                        </div>
                        <?php 
                            date_default_timezone_set("Asia/Kolkata");
                            $sd = date('Y-m-d');
                            $ed = $revst[0]->fixdate;
                            $piid = $revst[0]->piid;
                            
                            $pischool = $this->Menu_model->get_spdsbypi($piid);
                            $mydetail = $this->Menu_model->get_mydetail($piid);
                            $mytd1 = $this->Menu_model->get_mytdbwdate1($piid,$sd,$ed);
                            $mytd2 = $this->Menu_model->get_mytdbwdate2($piid,$sd,$ed);
                            
                        ?>
                        <hr>
                         <p><b>Working State : <?=$mydetail[0]->state?><hr>
                         Working District : <?=$mydetail[0]->district?></b></p>
                        <hr>
                            <?php foreach($pischool as $st){?>
                            <span class="badge badge-primary">Total School - <?=$st->a;?></span>
                            <span class="badge badge-secondary">New School - <?=$st->b;?></span>
                            <span class="badge badge-success">FTTP Done - <?=$st->c;?></span>
                            <span class="badge badge-danger">Utilization Initiated School - <?=$st->d;?></span>
                            <span class="badge badge-warning">Inactive School - <?=$st->h;?></span>
                            <span class="badge badge-info">Average School - <?=$st->e;?></span>
                            <span class="badge badge-primary">Good School - <?=$st->f;?></span>
                            <span class="badge badge-secondary">Model School - <?=$st->g;?></span>
                            <span class="badge badge-success">Client Readiness School - <?=$st->i;?></span>
                            <?php } ?>
                        <hr>
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">This Year Task</i></h6>
                        <?php foreach($mytd1 as $td1){?>
                        <a class="badge badge-primary" style="background-color: #3b5998;" href="#!" role="button"><?=$td1->cont?> <?=$td1->action?></a>
                        <?php } ?>
                        
                        <hr>
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">This Year Sub Task</i></h6>
                        <?php foreach($mytd2 as $td2){?>
                        <a class="badge badge-primary" style="background-color: #3b5998;" href="#!" role="button"><?=$td2->cont?> <?=$td2->tt?> (<?=$td2->stt?>)</a>
                        <?php } ?>
                        
                        
                 
                        
                    </div>
              
              <div class="card p-3 mt-3">
                  <div class="was-validated">
                  <form action="<?=base_url();?>Menu/piaclosereview" method="post">
                      <input type="hidden" id="rrid" name="rrid" value="<?=$revst[0]->rid;?>">
                      <b class="text-danger mt-3">Are you sure you want to close review task ?</b>
                      <div class="form-group">
                        <textarea class="form-control mt-3" name="closeremark" placeholder="Review Close Final Remark..."  required=""></textarea>
                        <input type="datetime-local" name="closetdate" value="<?=date('Y-m-d H:i:s');?>" class="form-control mt-3" required="">
                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-danger" onclick="this.form.submit(); this.disabled = true;">Close Review</button>
                        </div>
                    </div>
                  </form>
                  </div>
              </div>
         </div>
     </div></div>
     <div class="col-sm col-md-6 col-lg-6 m-auto">
         <div class="card card-primary card-outline">
             <form action="<?=base_url();?>Menu/rtaskc" method="post">
                  <div class="was-validated m-3">
                    <div class="form-group">
                        <lable>Goal 1</lable>
                        <textarea class="form-control" name="remark" placeholder="Goal 1..."  required=""></textarea>
                        <lable>Goal 2</lable>
                        <textarea class="form-control" name="remark" placeholder="Goal 2..."  required=""></textarea>
                        <lable>Goal 3</lable>
                        <textarea class="form-control" name="remark" placeholder="Goal 3..."  required=""></textarea>
                        <lable>Name of PIA</lable>
                        <input type="text" class="form-control" name="pia_name" required="">
                        <lable>Goals</lable>
                        <input type="text" class="form-control" name="remark" required="">
                        <lable>Total school</lable>
                        <input type="text" class="form-control" name="total_school" required="">
                        <lable>FTTP pending and dates</lable>
                        <input type="text" class="form-control" name="f_date" required="">
                        <lable>RTTP Pending and dates</lable>
                        <input type="text" class="form-control" name="r_date" required="">
                        <lable>Identification and dates</lable>
                        <input type="text" class="form-control" name="i_date" required="">
                        <lable>Inauguration and dates</lable>
                        <input type="text" class="form-control" name="in_date" required="">
                        <lable>Other Open Tickets and dates</lable>
                        <input type="text" class="form-control" name="t_date" required="">
                        <lable>Baseline pending and dates</lable>
                        <input type="text" class="form-control" name="bp_date" required="">
                        <lable>Endline Pending and dates</lable>
                        <input type="text" class="form-control" name="ep_date" required="">
                        <lable>Installation and readiness/pre-installation</lable>
                        <input type="text" class="form-control" name="remark" required="">
                        <lable>call status</lable>
                        <input type="text" class="form-control" name="pia_name" required="">
                        <lable>District report and dates</lable>
                        <input type="text" class="form-control" name="pia_name" required="">
                        <lable>Planning for revenue generation	Case study (give name client)</lable>
                        <input type="text" class="form-control" name="pia_name" required="">
                        <lable>Monthly report (give names of client)</lable>
                        <input type="text" class="form-control" name="pia_name" required="">
                        <lable>School review status</lable>
                        <input type="text" class="form-control" name="pia_name" required="">
                        <lable>Program Review status</lable>
                        <input type="text" class="form-control" name="pia_name" required="">
                        <lable>During FTTP status</lable>
                        <input type="text" class="form-control" name="pia_name" required="">
                        <lable>FTTP report status</lable>
                        <input type="text" class="form-control" name="pia_name" required="">
                        <lable>Installation report status</lable>
                        <input type="text" class="form-control" name="pia_name" required="">
                        
                    </div>
                    <hr>
                   <input type="hidden" name="adminuid" value="<?=$uid?>">
                   <input type="hidden" name="piuid" value="<?=$piid?>">
                   <input type="hidden" name="rid" value="<?=$revst[0]->rid;?>">
                   
                    </div>
                    
                    
                    
                  </form>
              
     </div></div>
     
     
     <div class="col-sm col-md-12 col-lg-12 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <div class="table-responsive">
                            <div class="table-responsive">
                                <div class="pdf-viwer">
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <tr>
                                            <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Plan Time</th>
                                            <th>Project Code</th>
                                            <th>School Name</th>
                                            <th>Task Type</th>
                                            <th>Purpose</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        $i=1;
                                        
                                        $nxtdtask=$this->Menu_model->get_nxtdtaskplan($piid,$sd,$ed);
                                        $nxtdreport=$this->Menu_model->get_nxtdreportplan($piid,$sd,$ed);
                                        $nxtdsummer=$this->Menu_model->get_nxtdsummerplan($piid,$sd,$ed);
                                        $nxtdcuriculum=$this->Menu_model->get_nxtdcuriculumplan($piid,$sd,$ed);
                                        $nxtdreview=$this->Menu_model->get_nxtdreviewplan($piid,$sd,$ed);
                                        
                                        foreach($nxtdtask as $md){
                                            $startt = $md->plandate;
                                            $startt = date('d-m-Y  h:i A', strtotime($startt));
                                        ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->fullname?></td>
                                        <td><?=$startt?></td>
                                        <td><?=$md->project_code?></td>
                                        <td><?=$md->sname?></td>
                                        <td><?=$md->task_type?></td>
                                        <td><?=$md->taskname?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    
                                    
                                    <?php foreach($nxtdreport as $md){
                                            $startt = $md->plan;
                                            $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->fullname?></td>
                                        <td><?=$startt?></td>
                                        <td></td>
                                        <td></td>
                                        <td>Report Writing</td>
                                        <td><?=$md->tasktype?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    
                                    <?php foreach($nxtdsummer as $md){
                                            $startt = $md->plandt;
                                            $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->fullname?></td>
                                        <td><?=$startt?></td>
                                        <td></td>
                                        <td></td>
                                        <td>Summer Activity</td>
                                        <td><?=$md->task_type?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    
                                    
                                    <?php foreach($nxtdcuriculum as $md){
                                            $startt = $md->sdatet;
                                            $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->fullname?></td>
                                        <td><?=$startt?></td>
                                        <td></td>
                                        <td></td>
                                        <td>Curiculum Activity</td>
                                        <td><?=$md->standard?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    
                                    
                                    <?php foreach($nxtdreview as $md){
                                            $startt = $md->plant;
                                            $startt = date('d-m-Y  h:i A', strtotime($startt));?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->fullname?></td>
                                        <td><?=$startt?></td>
                                        <td></td>
                                        <td></td>
                                        <td>Review</td>
                                        <td><?=$md->reviewtype?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    
                                    
                                    
                                    
                                  </tbody>
                                </table> 
                            </div>
                        </div>
                  
                  
                  
                  
              </div>
     </div></div>
     <?php } ?>
    </section>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>


document.getElementById("GoalSetting").style.display = 'none';
function showgs(){
    var abc = document.getElementById("GoalSetting").style.display;
    
    
    if (abc=='block') {
            document.getElementById("GoalSetting").style.display = 'none';
    } 
    else{
            document.getElementById("GoalSetting").style.display = 'block';
    }      
}


$('#reviewtype').on('change', function b() {
    
  var reviewtype = document.getElementById("reviewtype").value;
  var currentDate = new Date();
  
  if(reviewtype=='Weekly'){
      currentDate.setDate(currentDate.getDate() - 7);
  }
  if(reviewtype=='Fortnightly'){
      currentDate.setDate(currentDate.getDate() - 15);
  }
  if(reviewtype=='Monthly'){
      currentDate.setDate(currentDate.getDate() - 30);
  }
  if(reviewtype=='Querterly'){
      currentDate.setDate(currentDate.getDate() - 90);
  }
  if(reviewtype=='Yearly'){
      currentDate.setDate(currentDate.getDate() - 365);
  }

  var formattedDate = currentDate.toISOString().slice(0,10);
  document.getElementById("fixdate").value = formattedDate;
});

function myFunction() {
  var checkBox = document.getElementById("myCheckbox");
  if (checkBox.checked == true){
    document.getElementById("fixdate").readOnly = false;
  } else {
    document.getElementById("fixdate").readOnly = true;
  }
  
}

$('#statusid').on('change', function b() {
var stid = document.getElementById("statusid").value;
var piid = document.getElementById("piid").value;
var fdate = document.getElementById("fdate").value;
var rid = document.getElementById("rrid").value;
$.ajax({
url:'<?=base_url();?>Menu/getspdbybdnst',
type: "POST",
data: {
stid: stid,
piid: piid,
fdate: fdate,
rid: rid
},
cache: false,
success: function a(result){
$("#spdid").html(result);
}
});
});



$('#spdid').on('change', function b() {
var spdid = document.getElementById("spdid").value;
var fdate = document.getElementById("fdate").value;
$.ajax({
url:'<?=base_url();?>Menu/getspdlog',
type: "POST",
data: {
spdid: spdid,
fdate: fdate
},
cache: false,
success: function a(result){
$("#spddata").html(result);
}
});
});


$('#spdid').on('change', function b() {
var spdid = document.getElementById("spdid").value;
var fdate = document.getElementById("fdate").value;
$.ajax({
url:'<?=base_url();?>Menu/getspdlogs',
type: "POST",
data: {
spdid: spdid,
fdate: fdate
},
cache: false,
success: function a(result){
$("#spdlogs").html(result);
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