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
            <h1 class="m-0">Check List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4> <?php $uid=$user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id);  $did[0]->dep_name;?> </h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row p-3">
          <div class="col-md-3">
            <!-- Profile Image -->
        <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">School Detail</h3>
          <input type="hidden" id="tid" value="<?=$mid?>">
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-2">
            <?php if($page=='page1'){?>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                      <lable>Project Code</lable><br>
                      <a href="../../school_detail/<?=$spd[0]->id?>"><b><?=$task[0]->project_code?></b></a>
                  </li>
                  <li class="list-group-item">
                    <lable>School Name</lable><br>
                    <a href="../../school_detail/<?=$spd[0]->id?>"><b><?=$spd[0]->sname?></b></a>
                  </li>
                  <li class="list-group-item">
                    <lable>PIA</lable><br>
                    <b><?=$user['fullname']?></b>
                  </li>
                  <form action="<?=base_url();?>Menu/updatespd" method="post">
                     <input type="hidden" name="spdid" value="<?=$spd[0]->id?>">
                     <input type="hidden" name="sutid" value="<?=$mid?>">
                     <input type="hidden" name="supage" value="<?=$page?>">
                  
                  <li class="list-group-item">
                    <lable>Address</lable><br>
                    <textarea type="text" name="schaddress" class="form-control" required>
                        <?=$spd[0]->saddress?>
                    </textarea>
                  </li>
                  <li class="list-group-item">
                    <lable>City</lable><br>
                    <b><?=$spd[0]->scity?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>State</lable><br>
                    <b><?=$spd[0]->sstate?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>School Pin-Code</lable><br>
                    <input type="text" name="schpinno" class="form-control" value="<?=$spd[0]->spincode?>" required>
                  </li>
                  <li class="list-group-item">
                    <lable>School Language</lable><br>
                    <input type="text" name="schlang" class="form-control" value="<?=$spd[0]->slanguage?>" required>
                  </li>
                  <center><input type="submit" class="btn-info mt-2"></center>
                  </form>
                  <?php 
                  $sid = $spd[0]->id;
                  $scd=$this->Menu_model->get_school_contact($sid);
                  foreach($scd as $scd){?>
                  <li class="list-group-item">
                    <lable>Contact</lable><br>
                    <b><?=$scd->contact_name?></b><br>
                    <b><?=$scd->designation?></b><br>
                    <b><?=$scd->contact_no?></b><br>
                    <b><?=$scd->email?></b>
                    <span>
                        <a id="clinka" href="tel:+91<?=$scd->contact_no?>" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://stemlearning.in/opp/assets/image/icon/call.png" style="height:30px;"></a>
                        <a id="wlinka" href="https://wa.me/91<?=$scd->contact_no?>" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://stemlearning.in/opp/assets/image/icon/whatsapp.png" style="height:30px;"></a>
                        <a id="wglinka" href="https://wa.me/91<?=$scd->contact_no?>" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://stemlearning.in/opp/assets/image/icon/whatsapp.png" style="height:30px;"></a>
                        <a id="glinka" href="" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://mailmeteor.com/logos/assets/PNG/Gmail_Logo_512px.png" style="height:20px;"></a>
                    </span>
                  </li>
                  <?php }?>
                </ul>
                  
            
            
            <?php }else{ ?>
            
            
            
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                      <lable>Project Code</lable><br>
                      <a href="../../school_detail/<?=$spd[0]->id?>"><b><?=$task[0]->project_code?></b></a>
                  </li>
                  <li class="list-group-item">
                    <lable>School Name</lable><br>
                    <a href="../../school_detail/<?=$spd[0]->id?>"><b><?=$spd[0]->sname?></b></a>
                  </li>
                  <li class="list-group-item">
                    <lable>PIA</lable><br>
                    <b><?=$user['fullname']?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>Address</lable><br>
                    <b><?=$spd[0]->saddress?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>City</lable><br>
                    <b><?=$spd[0]->scity?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>State</lable><br>
                    <b><?=$spd[0]->sstate?></b>
                  </li>
                  <?php 
                  $sid = $spd[0]->id;
                  $sd=$this->Menu_model->get_school_contact($sid);
                  foreach($sd as $sd){?>
                  <li class="list-group-item">
                    <lable>Contact</lable><br>
                    <b><?=$sd->contact_name?></b><br>
                    <b><?=$sd->designation?></b><br>
                    <b><?=$sd->contact_no?></b><br>
                    <b><?=$sd->email?></b>
                    <span>
                        <a id="clink" href="tel:+91<?=$sd->contact_no?>" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://stemlearning.in/opp/assets/image/icon/call.png" style="height:30px;"></a>
                        <a id="wlink" href="https://wa.me/91<?=$sd->contact_no?>" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://stemlearning.in/opp/assets/image/icon/whatsapp.png" style="height:30px;"></a>
                        <a id="wglink" href="<?=$spd[0]->wanamelink?>" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://stemlearning.in/opp/assets/image/icon/whatsapp.png" style="height:30px;"></a>
                        <a id="glink" href="" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://mailmeteor.com/logos/assets/PNG/Gmail_Logo_512px.png" style="height:20px;"></a>
                    </span>
                  </li>
                  <?php }?>
                </ul>
                <?php } ?>
            <!-- /.card -->
            </div></div></div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?=$pagename?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body box-profile">
    
                <form action="<?=base_url();?>Menu/call_checklist" method="post" enctype="multipart/form-data">
                <input type="hidden" name="uid" value="<?=$uid?>">
                <input type="hidden" name="ctid" id="ctid" value="<?=$tid?>">
                <input type="hidden" name="checklist" id="checklist" value="<?=$page?>">
                <div class="">
                    <span><b>Action Completed?</b></span>
                    <input type="radio" id="actionyes" name="actontaken" Value="yes"> 
                    <label for="actionyes">YES</label>
                    <input type="radio" id="actionno" name="actontaken" Value="no"> 
                    <label for="actionno">NO</label>
                </div>
                <textarea type="text" class="form-control" id="actionnoremark" name="actionnoremark" placeholder="Remark" style="display:none"></textarea>
                <div class="" id="actionyesremark" name="actionyesremark" style="display:none">
                    <span><b>Purpose Completed?</b></span>
                    <input type="radio" id="purposeyes" name="purposetaken" Value="yes"> 
                    <label for="purposeyes">YES</label>
                    <input type="radio" id="purposeno" name="purposetaken" Value="no"> 
                    <label for="purposeno">NO</label>
                </div>
                <textarea type="text" class="form-control" id="purposenoremark" name="purposenoremark" placeholder="Remark" style="display:none"></textarea>
                <div class="" id="purposeyesremark" name="purposeyesremark" style="display:none">
                    
                     
                     <ul class="list-group list-group-unbordered mb-3">
                        <?php
                        $i=1;
                        foreach($pagedata as $d){?>
                      <li class="list-group-item">
                        <b><?=$i?>. <?=$d->question?></b>
                        <input type="hidden" name="que[]" value="<?=$d->id?>">
                        <?php if($d->optional==1){?>
                        <div class="form-group clearfix mt-2">
                          <div class="icheck-primary d-inline">
                                <div> 
                                    <input type="radio" name="tab<?=$i?>" checked="checked" class="tab-input" value="<?=$d->option1?>"> <?=$d->option1?> 
                                    <input type="radio" name="tab<?=$i?>" class="tab-input" value="<?=$d->option2?>"> <?=$d->option2?>
                                </div>
                          </div>
                        </div>
                        <?php } ?>
                        <?php if($d->selection==1){?>
                        <div class="form-group clearfix mt-2">
                            <select class="form-control" id="sel<?=$i?>" name="sel[]">
                                <option><?=$d->selection1?></option>
                                <option><?=$d->selection2?></option>
                                <option><?=$d->selection3?></option>
                                <option><?=$d->selection4?></option>
                                <option><?=$d->selection5?></option>
                            </select>
                        </div>
                        <?php } ?>
                        <?php if($d->remark==1){?>
                        <div class="form-group clearfix mt-2">
                               <input type="text" class="form-control" id="remat<?=$i?>" name="remat[]">
                        </div>
                        <?php } ?>
                        <?php if($d->datein==1){?>
                        <div class="form-group clearfix mt-2">
                                <input type="date" class="form-control" id="datein<?=$i?>" name="datein[]">
                        </div>
                        <?php } ?>
                        <?php if($d->attachment==1){?>
                        <div class="form-group clearfix mt-2">
                                <input type="file" class="form-control file-input" name="attac[]" id="attac<?=$i?>">
                        <section class="progress-area"></section>
                        <section class="uploaded-area"></section>
                        </div>
                        <?php } ?>
                        <?php if($d->star==1){?>
                        <div class="form-group clearfix mt-2">
                           <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                          </div>
                        </div>
                        <?php } ?>
                      </li><?php $i++; } ?>
                    </ul>
                    <textarea id="finalremark" name="finalremark" rows="4" cols="50" placeholder="Final Remark"></textarea>
                </div>
                <input type="submit" class="btn-info mt-2">
               </form>
            </div>
            <!-- /.card -->
            
  </div>
  

<script type='text/javascript'>


let result = document.querySelector('#result');
document.body.addEventListener('change', function (e) {
    let target = e.target;
    let message;
    switch (target.id) {
        case 'actionno':
            $("#actionnoremark").show();
            $("#actionyesremark").hide();
            document.getElementById("actionnoremark").required = true;
            break;
        case 'actionyes':
            $("#actionyesremark").show();
            $("#actionnoremark").hide();
            break;
    }
    result.textContent = message;
});


$('#clink').click(function(){
    var tid = document.getElementById("tid").value;
    $.ajax({
         url:'<?=base_url();?>Menu/indtime',
         method: 'post',
         data: {tid: tid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           
         }
       });
  });
  
$('#clinka').click(function(){
    var tid = document.getElementById("tid").value;
    $.ajax({
         url:'<?=base_url();?>Menu/indtime',
         method: 'post',
         data: {tid: tid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           
         }
       });
  });
  
$('#wlinka').click(function(){
    var tid = document.getElementById("tid").value;
    $.ajax({
         url:'<?=base_url();?>Menu/indtime',
         method: 'post',
         data: {tid: tid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           
         }
       });
  });
  
$('#wlink').click(function(){
    var tid = document.getElementById("tid").value;
    $.ajax({
         url:'<?=base_url();?>Menu/indtime',
         method: 'post',
         data: {tid: tid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           
         }
       });
  });
  
  
  $('#wglink').click(function(){
    var tid = document.getElementById("tid").value;
    $.ajax({
         url:'<?=base_url();?>Menu/indtime',
         method: 'post',
         data: {tid: tid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           
         }
       });
  });
  
  $('#wglinka').click(function(){
    var tid = document.getElementById("tid").value;
    $.ajax({
         url:'<?=base_url();?>Menu/indtime',
         method: 'post',
         data: {tid: tid},
         dataType: 'json',
         success: function(response){
           var len = response.length;
           
         }
       });
  });


$(':radio[name="purposetaken"]').change(function() {
var purposetaken = $(this).filter(':checked').val();
    if(purposetaken=='no'){
        $("#purposenoremark").show();
        $("#purposeyesremark").hide();
        document.getElementById("purposenoremark").required = true;
    }
    if(purposetaken=='yes'){
        $("#purposeyesremark").show();
        $("#purposenoremark").hide();
        
        
       $('[id^="attac"]').prop('required', true);
       $('[id^="datein"]').prop('required', true);
       $('[id^="remat"]').prop('required', true);
       $('[id^="sel"]').prop('required', true);
       $('[id^="ansremark"]').prop('required', true);
       document.getElementById("finalremark").required = true;
       
    }
});


$('input[name=r1]').on('change', function() {
   var data = $('input[name=r1]:checked').val();
   if(data=='YES')
   {
       document.getElementById("remark").style.display = "none";
   }else{
       document.getElementById("remark").style.display = "block";
   }
  
});
   
</script>             
            
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    </div></div></div>
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
