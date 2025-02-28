<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STEM Operation | WebAPP</title>
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
            <h1 class="m-0">Curiculum Assign</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4><?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); $did[0]->dep_name;?></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <?php 
                     $custart = $this->Menu_model->get_curiculumstarted($uid);
                     if($custart){$piid = $custart[0]->piid;}else{$piid=0;}
                  
                  if($piid!=0){?>
                      <form action="<?=base_url();?>Menu/curiculumclose" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="pia" value="<?=$piid?>">
                      <div class="form-group">
                        <label>Date and Time</label>
                        <input type="datetime-local" class="form-control" name="cdate" value="<?=date('Y-m-d H:i:s')?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Select STANDARD</label>
                        <select class="custom-select rounded-0" name="standard">
                            <?php $std = $this->Menu_model->get_curiculumstandardn($uid);
                            foreach($std as $std){?>
                        <option><?=$std->standard?></option>
                        <?php } ?>
                      </select>
                      </div>
                      <div class="form-group">
                        <label>Select SUBJECTS</label>
                        <select class="custom-select rounded-0" name="subject">
                        <option>MATHS</option>
                        <option>SCIENCE</option>
                        <option>ENGLISH</option>
                        <option>EVS</option>
                      </select>
                      </div>
                      <div class="form-group">
                        <label>CONCEPT</label>
                        <textarea class="form-control" name="concept" placeholder="CONCEPT" ></textarea>
                      </div>
                      <div class="form-group">
                        <label>LEARNING OUTCOMES</label>
                        <textarea class="form-control" name="loutcomes" placeholder="LEARNING OUTCOMES" ></textarea>
                      </div>
                      <div class="form-group">
                        <label>TEACHING METHODOLOGHY</label>
                        <textarea class="form-control" name="tmethodologhy" placeholder="TEACHING METHODOLOGHY" ></textarea>
                      </div>
                      <div class="form-group">
                        <label>Reference Websites</label>
                        <textarea class="form-control" name="rwebsite" placeholder="Reference Websites" ></textarea>
                      </div>
                      <div class="form-group">
                        <label>Reference Video Link</label>
                        <textarea class="form-control" name="rvlink" placeholder="Reference Video Link" ></textarea>
                      </div>
                      <div class="form-group">
                        <label>Attechment</label>
                        <input type="file" class="form-control file-input" name="attechment[]" id="attechment" multiple >
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                 </form>
                  <?php }else{?>
                  
                  <form action="<?=base_url();?>Menu/curiculumstart" method="post">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="piid" value="<?=$uid?>" readonly>
                    <label>Date and Time</label>
                    <input type="datetime-local" class="form-control" name="sdate" value="<?=date('Y-m-d H:i:s')?>" readonly>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Start Curiculum</button>
                  </div>
             </form>
                  
                  <?php }?>
                  
                  
          </div></div> 
    
                        <div class="table-responsive">
                            <div class="table-responsive">                            

                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                                  <th>SNo</th>
                                                  <th>PIA</th>
                                                  <th>Assign at</th>
                                                  <th>STANDARD</th>
                                                  <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; 
                                      
                                      $mdata = $this->Menu_model->get_curiculumassign($uid);
                                      foreach($mdata as $d){
                                      ?>
                                      
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->fullname?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->standard?></td>
                                        <td><?=$d->remark?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table>
                                
                                
                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                                  <th>SNo</th>
                                                  <th>PIA</th>
                                                  <th>Start at</th>
                                                  <th>Close at</th>
                                                  <th>STANDARD</th>
                                                  <th>subject</th>
                                                  <th>concept</th>
                                                  <th>loutcomes</th>
                                                  <th>tmethodologhy</th>
                                                  <th>rwebsite</th>
                                                  <th>rvlink</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; 
                                      $mdata = $this->Menu_model->get_curicultaskd($uid);
                                      foreach($mdata as $d){
                                      ?>
                                      
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->standard?></td>
                                        <td><?=$d->startt?></td>
                                        <td><?=$d->closet?></td>
                                        <td><?=$d->standard?></td>
                                        <td><?=$d->subject?></td>
                                        <td><?=$d->concept?></td>
                                        <td><?=$d->loutcomes?></td>
                                        <td><?=$d->tmethodologhy?></td>
                                        <td><?=$d->rwebsite?></td>
                                        <td><?=$d->rvlink?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table>
                                
                                
                                
                            </div>
                        </div>
                    </div>
  
  </section>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('#task_subtype').on('change', function() {
   var tst = this.value;
   var tt = document.getElementById("task_type").value;
   if(tt=="VISIT"){
       if(tst=="New Client"){
          $("#box1").show();
          $("#box2").hide(); 
       }
       if(tst=="Onboard Client" || tst=="Inauguration"){
          $("#box2").show();
          $("#box1").hide();
       }
   }
   if(tt=="TTP"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="M&E"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="DIY"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Maintenance"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Installation"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Call"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Email"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Whatsapp"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Other"){
      $("#box2").hide();
      $("#box1").hide();
   }
});

$('#region').on('change', function b() {
var dep = document.getElementById("dep").value;
var region = document.getElementById("region").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getuserbydr',
type: "POST",
data: {
dep: dep,
region: region
},
cache: false,
success: function a(result){
$("#to_user").html(result);
}
});
});


$('#task_type').on('change', function c() {
var tt = document.getElementById("task_type").value;
$.ajax({
url:'<?=base_url();?>Menu/gettst',
type: "POST",
data: {
tt: tt
},
cache: false,
success: function a(result){
$("#task_subtype").html(result);
}
});
});


$('#pcode').on('change', function b() {
var pcode = document.getElementById("pcode").value;
$.ajax({
url:'<?=base_url();?>Menu/getspdbypcode',
type: "POST",
data: {
pcode: pcode
},
cache: false,
success: function a(result){
$("#spd_id").html(result);
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
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/js/adminlte.js"></script>

<!-- jquery-validation -->
<script src="<?=base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?=base_url();?>assets/js/additional-methods.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

<script>
$(function() {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
});
</script>
</body>
</html>
