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
            <h1 class="m-0">Create Request</h1>
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
       <div class="row p-3">
          <div class="col-sm col-md-6 col-lg-6">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <?=form_open('Menu/taskrequest')?>
                  <div class="form-group">
                    <label for="task_date">Date</label>
                    <input type="hidden" class="form-control" name="from_user" id="from_user" value="<?php echo $data['user']['id']; ?>">
                    <input type="date" class="form-control" name="task_date" id="task_date" >
                  </div>
                  
                  <div class="form-group">
                    <label for="task_type">Request for</label>
                    <select class="custom-select rounded-0" name="task_type" id="task_type">
                    <option>Select Request</option>
                    <option value="Report">Client Report</option>
                    <option value="NVisit">New Client School Visit</option>
                    <option value="OnBoardVisit">On Board Client School Visit</option>
                    <option value="Demo">Online/Offline Demo</option>
                    <option value="Inauguration">Inauguration</option>
                    <option value="SchoolIdentification">School Identification</option>
                    <option value="SchoolIdentification">School Maintenance</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="remark">Remark</label>
                    <select class="custom-select rounded-0" name="remark" id="remark">
                    <option>Select Remark</option>
                    <option value="Urgent">Urgent</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea type="text" class="form-control" name="comment" id="comment" placeholder="Comment"></textarea>
                  </div>
                  
                
              </div>
              </div>
          </div>
          
          <div class="col-sm col-md-6 col-lg-6">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                    <div id="test1" style="display: none;">
                          <div class="form-group">
                            <label for="depatment">Department</label>
                            <select class="custom-select rounded-0" name="depatment" id="depatment">
                            <option>Select Department</option>
                            <?php foreach($dep as $d){ if($d->id=='1'){?>
                            <option value="<?=$d->id?>"><?=$d->dep_name?></option>
                            <?php }} ?>
                          </select>
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="to_user" value="1">
                          </div>
                        <div class="form-group">
                            <label for="c_id">Client</label>
                            <select class="custom-select rounded-0" name="c_id" id="c_id">
                            <option>Select Client</option>
                            <?php foreach($client as $d){?>
                            <option value="<?=$d->id?>"><?=$d->client_name?></option>
                            <?php } ?>
                          </select>
                          </div>
                    </div>
                    
                    <div id="test2" style="display: none;">
                        
                        <div class="form-group">
                            <label for="depatment">Department</label>
                            <select class="custom-select rounded-0" name="depatment" id="depatment">
                            <option>Select Department</option>
                            <?php foreach($dep as $d){ if($d->id=='12'){?>
                            <option value="<?=$d->id?>"><?=$d->dep_name?></option>
                            <?php }} ?>
                          </select>
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="to_user" value="1">
                          </div>
                            <div class="form-group">
                                <label for="cname">Client Name</label>
                                <input type="text" class="form-control" name="cname" id="cname" placeholder="Client Name">
                            </div>
                            <div class="form-group">
                                <label for="caddress">School Address</label>
                                <textarea type="text" class="form-control" name="caddress" id="caddress" placeholder="Client Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ccperson">Contact Person Name</label>
                                <input type="text" class="form-control" name="ccperson" id="ccperson" placeholder="Contact Person Name">
                            </div>
                            <div class="form-group">
                                <label for="ccpmno">Contact Person Mobile No</label>
                                <input type="text" class="form-control" name="ccpmno" id="ccpmno" placeholder="Contact Person Mobile No">
                            </div>
                            <div class="form-group">
                                <label for="visitdt">Visit Date Time</label>
                                <input type="datetime-local" class="form-control" name="visitdt" id="visitdt" >
                            </div>
                            
                            <div class="form-group">
                                <label for="expectation">Expectation</label>
                                <input type="text" class="form-control" name="expectation" id="expectation" placeholder="Expectation">
                            </div>
                    
                    </div>
                    <div id="test3" style="display: none;">
                        
                        <div class="form-group">
                            <label for="depatment">Department</label>
                            <select class="custom-select rounded-0" name="depatment" id="depatment">
                            <option>Select Department</option>
                            <?php foreach($dep as $d){ if($d->id=='12'){?>
                            <option value="<?=$d->id?>"><?=$d->dep_name?></option>
                            <?php }} ?>
                          </select>
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="to_user" value="1">
                          </div>
                            <div class="form-group">
                                <label for="cname">Client Name</label>
                                <input type="text" class="form-control" name="cname" id="cname" placeholder="Client Name">
                            </div>
                            <div class="form-group">
                                <label for="caddress">Client Address</label>
                                <textarea type="text" class="form-control" name="caddress" id="caddress" placeholder="Client Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ccperson">Contact Person Name</label>
                                <input type="text" class="form-control" name="ccperson" id="ccperson" placeholder="Contact Person Name">
                            </div>
                            <div class="form-group">
                                <label for="ccpmno">Contact Person Mobile No</label>
                                <input type="text" class="form-control" name="ccpmno" id="ccpmno" placeholder="Contact Person Mobile No">
                            </div>
                            <div class="form-group">
                                <label for="visitdt">Demo Date Time</label>
                                <input type="datetime-local" class="form-control" name="visitdt" id="visitdt" >
                            </div>
                            
                            <div class="form-group">
                                <label for="visitdt">Metting Type</label>
                                <select class="custom-select rounded-0" name="c_id" id="c_id">
                                    <option>Select Client</option>
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="expectation">Expectation</label>
                                <input type="text" class="form-control" name="expectation" id="expectation" placeholder="Expectation">
                            </div>
                    
                    </div>
                    <div id="test4" style="display: none;">
                        <div class="form-group">
                            <label for="depatment">Department</label>
                            <select class="custom-select rounded-0" name="depatment" id="depatment">
                            <option>Select Department</option>
                            <?php foreach($dep as $d){ if($d->id=='12'){?>
                            <option value="<?=$d->id?>"><?=$d->dep_name?></option>
                            <?php }} ?>
                          </select>
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="to_user" value="1">
                          </div>
                          <div class="form-group">
                            <label for="c_id">Client</label>
                            <select class="custom-select rounded-0" name="c_id" id="c_id">
                            <option>Select Client</option>
                            <?php foreach($client as $d){?>
                            <option value="<?=$d->id?>"><?=$d->client_name?></option>
                            <?php } ?>
                          </select>
                          </div>
                    
                    </div>
                    <div id="test5" style="display: none;">
                        <div class="form-group">
                            <label for="depatment">Department</label>
                            <select class="custom-select rounded-0" name="depatment" id="depatment">
                            <option>Select Department</option>
                            <?php foreach($dep as $d){ if($d->id=='12'){?>
                            <option value="<?=$d->id?>"><?=$d->dep_name?></option>
                            <?php }} ?>
                          </select>
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="to_user" value="1">
                          </div>
                          <div class="form-group">
                            <label for="c_id">Client</label>
                            <select class="custom-select rounded-0" name="c_id" id="c_id">
                            <option>Select Client</option>
                            <?php foreach($client as $d){?>
                            <option value="<?=$d->id?>"><?=$d->client_name?></option>
                            <?php } ?>
                          </select>
                          </div>
                    
                    </div>
                    
                    <div id="test6" style="display: none;">
                        <div class="form-group">
                            <label for="depatment">Department</label>
                            <select class="custom-select rounded-0" name="depatment" id="depatment">
                            <option>Select Department</option>
                            <?php foreach($dep as $d){ if($d->id=='12'){?>
                            <option value="<?=$d->id?>"><?=$d->dep_name?></option>
                            <?php }} ?>
                          </select>
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="to_user" value="1">
                          </div>
                       <div class="form-group">
                            <label for="tyschool">Type of School</label>
                            <input type="text" class="form-control" name="tyschool" id="tyschool" placeholder="Type of School">
                        </div>
                        <div class="form-group">
                            <label for="noschool">NO of School</label>
                            <input type="text" class="form-control" name="noschool" id="noschool" placeholder="NO of School">
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <textarea class="form-control" name="location" id="location" placeholder="Location"></textarea>
                        </div>
                    </div>
                    
                     
              </div>
              </div>
              
              <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">Submit</button>
             </form>
          </div> 
      </div>   
     </div>     
    </section>
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type='text/javascript'>
$('#task_type').on('change', function() {
   var ab = this.value;
   if(ab=="Report"){
    $("#test1").show();
    $("#test2").hide();
    $("#test3").hide();
    $("#test4").hide();
    $("#test5").hide();
    $("#test6").hide();
   }
   if(ab=="NVisit"){
    $("#test1").hide();
    $("#test2").show();
    $("#test3").hide();
    $("#test4").hide();
    $("#test5").hide();
    $("#test6").hide();
   }
   if(ab=="OnBoardVisit"){
    $("#test1").hide();
    $("#test2").hide();
    $("#test3").show();
    $("#test4").hide();
    $("#test5").hide();
    $("#test6").hide();
   }
   if(ab=="Demo"){
    $("#test1").hide();
    $("#test2").hide();
    $("#test3").hide();
    $("#test4").show();
    $("#test5").hide();
    $("#test6").hide();
   }
   if(ab=="Inauguration"){
    $("#test1").hide();
    $("#test2").hide();
    $("#test3").hide();
    $("#test4").hide();
    $("#test5").show();
    $("#test6").hide();
   }
   if(ab=="SchoolIdentification"){
    $("#test1").hide();
    $("#test2").hide();
    $("#test3").hide();
    $("#test4").hide();
    $("#test5").hide();
    $("#test6").show();
   }
   
   
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

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>
</body>
</html>
