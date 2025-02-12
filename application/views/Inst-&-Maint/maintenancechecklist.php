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
  
  <link rel="stylesheet" href="<?=base_url();?>assets/css/select2.min.css">
  
  <style>
      input[name="extra-checkbox"] + input[name="extra-info-text"] {display: none;}
      input[name="extra-checkbox"]:checked + input[name="extra-info-text"] {display: inline;}
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
            <h1 class="m-0">Maintenance Checklist</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4>HI! <?=$user['fullname']?> ( <?php $uid=$user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?=form_open('Menu/installmodel')?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row p-3">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                      <lable><b>Project Code</b></lable>
                      <input type="text" name="indata[]" value="<?=$task[0]->project_code?>" class="form-control mt-1" readonly>
                  </li>
                  <li class="list-group-item">
                    <lable><b>Date</b></lable>
                    <input type="date" name="indata[]" class="form-control mt-1" value="<?=date('Y-m-d');?>" readonly>
                  </li>
                  <li class="list-group-item">
                    <lable><b>School Name</b></lable>
                    <input type="hidden" name="indata[]" value="<?=$spd[0]->id?>" class="form-control mt-1">
                    <input type="text" value="<?=$spd[0]->sname?>" class="form-control mt-1" readonly>
                  </li>
                  <li class="list-group-item">
                    <lable><b>Maintenance Person</b></lable>
                    <input type="hidden" name="indata[]" value="<?=$uid?>" class="form-control mt-1">
                    <input type="text" value="<?=$user['fullname']?>" class="form-control mt-1" readonly>
                  </li>
                  <li class="list-group-item">
                    <lable><b>Address</b></lable>
                    <input type="text" name="indata[]" value="<?=$spd[0]->saddress?>" class="form-control mt-1" readonly>
                  </li>
                  <li class="list-group-item">
                    <lable><b>City</b></lable>
                    <input type="text" name="indata[]" value="<?=$spd[0]->scity?>" class="form-control mt-1" readonly>
                  </li>
                  <li class="list-group-item">
                    <lable><b>State</b></lable>
                    <input type="text" name="indata[]" value="<?=$spd[0]->sstate?>" class="form-control mt-1" readonly>
                  </li>
                  
                  <li class="list-group-item">
                    <lable><b>Contact Name</b></lable>
                    <input type="text" name="indata[]" class="form-control mt-1" required>
                  </li>
                  <li class="list-group-item">
                    <lable><b>Designation</b></lable>
                    <select name="indata[]" class="form-control mt-1" required>
                        <option value="Principal"> Principal </option>
                        <option value="Teacher"> Teacher </option>
                    </select>
                  </li>
                  <li class="list-group-item">
                    <lable><b>Contact No</b></lable>
                    <input type="text" name="indata[]" class="form-control mt-1" required>
                  </li>
                  <li class="list-group-item">
                    <lable><b>Email ID</b></lable>
                    <input type="text" name="indata[]" class="form-control mt-1" required>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            
          
            
            </div>
          <!-- /.col -->
          <div class="col-md-9">
              
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Maintenance Checklist</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body box-profile">
                    
                    <?php foreach($model as $d){?>
                    <input type="hidden" name="model[]" value="<?=$d->model_name?>">
                               <?php  } ?>
                    
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm">
                    
                        <div class="form-group">
                            <label>Select Repair Model</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" data-placeholder="Select Model" data-dropdown-css-class="select2-purple" name="nwork[]">
                                 <?php foreach($model as $d){ ?>
                                    <option value="<?=$d->model_name?>"><?=$d->model_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        </div>
                        
                        
                        <div class="col-md-6 col-lg-6 col-sm">
                    
                        <div class="form-group">
                            <label>Select Replacement Model</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" data-placeholder="Select Model" data-dropdown-css-class="select2-purple" name="nwork[]">
                                 <?php foreach($model as $d){ ?>
                                    <option value="<?=$d->model_name?>"><?=$d->model_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        </div>
                    </div>
                <ul class="list-group list-group-unbordered mb-3">
                  
                    <?php
                    $i=1;
                    foreach($data as $d){
                        if($d->page == 'main'){
                    ?>
                  <li class="list-group-item">
                    <b><?=$i?>. <?=$d->question?></b>
                    <input type="hidden" name="que[]" value="<?=$d->id?>">
                    <div class="form-group clearfix mt-2">
                      <div class="icheck-primary d-inline">
                            <div> 
                                <input type="radio" name="tab<?=$i?>" checked="checked" class="tab-input" value="Yes"> Yes 
                                <input type="radio" name="tab<?=$i?>" class="tab-input" value="No"> No
                            </div>
                            <div class="tab" id="tab<?=$i?>"><textarea name="remark[]" rows="4" cols="50"></textarea></div>
                            <div class="tbl" id="tbl<?=$i?>"><input type="file" name="filname[]"></div>
                      </div>
                    </div>
                
                  </li><?php $i++; }} ?>
                  
                </ul>
              </div>
              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            
            <div class="entry">

  </div>
  </div>
  

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('input[name=r1]').on('change', function() {
   var data = $('input[name=r1]:checked').val();
   if(data=='YES')
   {
       document.getElementById("remark").style.display = "none";
       document.getElementById("filname").style.display = "block";
   }else{
       document.getElementById("remark").style.display = "block";
       document.getElementById("filname").style.display = "none";
   }
  
});



$(function () {
  $(".tab").hide();
  $(".tab-input").change(function () {
    if ($(this).val() == "No")
      $("#" + $(this).attr("name")).show();
    else
      $("#" + $(this).attr("name")).hide();
  });
});


$(function () {
    $('.select2').select2()
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})
   
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
<script src="<?=base_url();?>assets/js/myjs.js"></script>
<script src="<?=base_url();?>assets/js/select2.full.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.bootstrap-duallistbox.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>
</body>
</html>
