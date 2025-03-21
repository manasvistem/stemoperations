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
           <?php $revst = $this->Menu_model->get_reviewstarted($uid);
           if($revst){$piid = $revst[0]->piid;}else{$piid=0;}
           if($piid==0){?>
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Plan Review Task</h3>
                  <hr>
                  <form action="<?=base_url();?>Menu/planreview" method="post">
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
                                <option value="Roaster">Roaster</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Fortnightly">Fortnightly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Querterly">Querterly</option>
                                <option value="Yearly">Yearly</option>
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
                  <form action="<?=base_url();?>Menu/startreview" method="post">
                    <div class="was-validated">
                    <div class="form-group">
                        <input type="hidden" name="uida" value="<?=$uid?>">
                        <?php date_default_timezone_set("Asia/Kolkata"); ?>
                        <input type="datetime-local" name="startt" value="<?=date('Y-m-d H:i:s')?>" class="form-control" readonly>
                        <div class="invalid-feedback">Please provide Start Date Time.</div>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="mt-4">
                            <select class="form-control" name="reviewid" required="">
                                <?php $reviewid = $this->Menu_model->get_reviewid($uid);
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
                        <div class="invalid-feedback">Please provide Start Date Time.</div>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="mt-4">
                            <select class="form-control" id="statusid" name="statusid" required="">
                                <option value="">Select Status</option>
                                <?php $status = $this->Menu_model->get_status($uid);
                                foreach($status as $st){
                                ?>
                                <option value="<?=$st->id?>"><?=$st->name?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">Please Create Plan First.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mt-4">
                            <select class="form-control" name="spdid" required="" id="spdid">
                            </select>
                            <div class="invalid-feedback">Please Select Status First.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <a href="<?=base_url();?>Menu/AllReviewac"><button type="button" class="btn btn-outline-danger">Go to Action wise Review</button></a><br>
              </div>
              
              <div class="card p-3 mt-3">
                  <div class="was-validated">
                  <form action="<?=base_url();?>Menu/closereview" method="post">
                      <input type="hidden" id="rrid" name="rrid" value="<?=$revst[0]->rid;?>">
                      <?php 
                          $rid = $revst[0]->rid;
                          $gscount = $this->Menu_model->get_goalsbyrid($rid);
                          $gscount = $gscount[0]->cont;?>
                      <b class="text-danger mt-3">Are you sure you want to close review task ?</b>
                      <div class="form-group">
                        <textarea class="form-control mt-3" name="closeremark" placeholder="Review Close Final Remark..."  required=""></textarea>
                        <input type="datetime-local" name="closetdate" value="<?=date('Y-m-d H:i:s');?>" class="form-control mt-3" required="">
                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-danger" onclick="this.form.submit(); this.disabled = true;">Close Review</button>
                        </div>
                    </div>
                  </form>
                  <?php if($gscount>0){echo '<p class="font-italic text-danger mt-3">note: You Are Seted Goal on this Review.</p>';}else{?>
                  <center><button type="submit" class="btn btn-success" onclick="showgs()">Click for Goal Setting</button></center>
                  <p class="font-italic text-danger mt-3">note: Before Close Review You Need to Set Goal.</p>
                  <?php } ?>
                  </div>
              </div>
         </div>
     </div></div>
     <div class="col-sm col-md-6 col-lg-6 m-auto">
         <div class="card card-primary card-outline">
             <form action="<?=base_url();?>Menu/rtaskc" method="post">
              <div class="card-body box-profile" id="spddata">
              </div>
                  <div class="was-validated m-3">
                    <div class="form-group">
                        <textarea class="form-control" name="remark" placeholder="Review Remark..."  required=""></textarea>
                        <lable>Students participation in NSP</lable>
                        <select name="nsp" class="form-control">
                            <option>NO</option>
                            <option>Yes</option>
                        </select>
                    </div>
                    <hr>
                   <input type="hidden" name="adminuid" value="<?=$uid?>">
                   <input type="hidden" name="piuid" value="<?=$piid?>">
                   <input type="hidden" name="rid" value="<?=$revst[0]->rid;?>">
                   <center><h5>Create Task</h5></center>
                   <input type="datetime-local" name="ntdate" value="<?=date('Y-m-d H:i:s');?>" class="form-control" required="">
                   <lable>Select Task Type</lable>
                   <select id="ntaction" name="ntaction" class="form-control"  required="">
                       <option value="">Select Task Type</option>
                       <option>RTTP</option>
                       <option>MnE</option>
                       <option>DIY</option>
                       <option>Activation Call</option>
                       <option>Maintenance</option>
                   </select>
                   
                   <lable>Expected Status</lable>
                   <select class="form-control" id="exsid" name="exsid" required="">
                        <option value="">Select Status</option>
                        <?php $status = $this->Menu_model->get_status($uid);
                        foreach($status as $st){
                        ?>
                        <option value="<?=$st->id?>"><?=$st->name?></option>
                        <?php } ?>
                    </select>
                    
                    <lable>Expected Date</lable>
                    <input type="date" name="exdate" value="" class="form-control" required="" min="<?=date('Y-m-d');?>">
                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                    </div>
                    </div>
                    
                  </form>
              
     </div></div>
     
     
     <div class="col-sm col-md-12 col-lg-12 m-auto" id="GoalSetting">
         <div class="card card-danger card-outline">
             <div class="card-header"><center><b>Goal Setting</b></center></div>
             <form action="<?=base_url();?>Menu/GoalSetting" method="post">
             <input type="hidden" name="rrrid" value="<?=$rid;?>">
             <input type="hidden" name="gsuid" value="<?=$uid?>">
             <input type="hidden" name="gspiid" value="<?=$piid?>">
             <div class="card-body box-profile row was-validated">
                         <div class="col-lg-3 p-3 col-sm">
                             <lable>Target Date</lable>
                             <input type="datetime-local"  name="targetdt" min="<?=date('Y-m-d H:i:s');?>" class="form-control" required="">
                         </div>
                         <div class="col-lg-3 p-3 col-sm">
                             <lable>Call</lable>
                             <input type="number" name="tcall" class="form-control" required="">
                         </div>
                         <div class="col-lg-3 p-3 col-sm">
                             <lable>Email</lable>
                             <input type="number" name="email" class="form-control" required="">
                         </div>
                         <div class="col-lg-3 p-3 col-sm">
                             <lable>Utilisation</lable>
                             <input type="number" name="utilisation" class="form-control" required="">
                         </div>
                         <div class="col-lg-3 p-3 col-sm">
                             <lable>TTP</lable>
                             <input type="number" name="ttp" class="form-control" required="">
                         </div>
                         <div class="col-lg-3 p-3 col-sm">
                             <lable>M&E</lable>
                             <input type="number" name="mne" class="form-control" required="">
                         </div>
                         <div class="col-lg-3 p-3 col-sm">
                             <lable>DIY</lable>
                             <input type="number" name="diy" class="form-control" required="">
                         </div>
                         <div class="col-lg-3 p-3 col-sm">
                             <lable>Good School</lable>
                             <input type="number" name="goodschool" class="form-control" required="">
                         </div>
                         <div class="col-lg-3 p-3 col-sm">
                             <lable>Model School</lable>
                             <input type="number" name="modelschool" class="form-control" required="">
                         </div>
                         <div class="col-lg-3 p-3 col-sm">
                             <lable>Remark</lable>
                             <textarea name="gsremark" class="form-control" required=""></textarea>
                         </div>
                         <div class="col-lg-3 col-sm">
                             <button type="submit" class="btn btn-info mt-4" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                         </div>
                      </div>
                  </form>
             </div>
         </div>
     </div>
     
     
     <div class="col-sm col-md-12 col-lg-12 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <div class="table-responsive">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>								
                                            <th>Sr Number</th>
                                            <th>Plan Date</th>
                                            <th>Completed Date</th>
                                            <th>School Name</th></th>
                                            <th>Task Type</th>
                                            <th>Task Purpose</th>
                                            <th>Task Done By</th>
                                            <th>Action</th>
                                            <th>Purpose</th>
                                            <th>Remark</th>
                                            <th>Checklist</th>
                                            <th>Media</th>
                                            <th>Report</th>
                                        </tr>
                                    </thead>
                                
                                <tbody id="spdlogs">
                                    
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