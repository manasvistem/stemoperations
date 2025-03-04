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
                  <?=form_open('Menu/taskassign')?>
                  <div class="form-group">
                    <label for="task_date">Date</label>
                    <input type="hidden" class="form-control" name="from_user" id="from_user" value="<?php echo $data['user']['id']; ?>">
                    <input type="date" class="form-control" name="task_date" id="task_date" >
                  </div>
                  
                  <div class="form-group">
                    <label for="task_type">Request for</label>
                    <select class="custom-select rounded-0" name="task_type" id="task_type">
                    <option>Select Request</option>
                    <option value="Installation">Installation</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Call">Call</option>
                    <option value="Email">Email</option>
                    <option value="Visit">Visit</option>
                    <option value="Visit">Whatsapp</option>
                    <option value="Other">Other</option>
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
                    <div id="test1">
                          <div class="form-group">
                            <label for="depatment">Department</label>
                            <select class="custom-select rounded-0" name="depatment" id="depatment">
                            <option value="">Select Department</option>
                            <?php foreach($dep as $d){ if($d->id=='4'){?>
                            <option value="<?=$d->id?>"><?=$d->dep_name?></option>
                            <?php }} ?>
                          </select>
                          </div>
                          <div class="form-group">
                            <label for="to_user">Person</label>
                            <select class="custom-select rounded-0" name="to_user" id="to_user">
                            <option value="">Select User</option>
                            <?php foreach($du as $d){ ?>
                            <option value="<?=$d->id?>"><?=$d->fullname?></option>
                            <?php } ?>
                          </select>
                          </div>
                        <div class="form-group">
                            <label>Project Code</label>
                            <select class="custom-select rounded-0" name="project_code" id="project_code">
                            <option value="">Select Project Code</option>
                            <?php foreach($pcode as $d){?>
                            <option value="<?=$d->project_code?>"><?=$d->project_code?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="spd_id">School Name</label>
                            <select class="custom-select rounded-0" name="spd_id" id="spd_id">
                            <option>Select School</option>
                            <?php foreach($spd as $d){?>
                            <option value="<?=$d->id?>"><?=$d->sname?></option>
                            <?php } ?>
                          </select>
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
