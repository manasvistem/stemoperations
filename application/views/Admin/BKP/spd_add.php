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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-md-12 col-12 m-auto">
            <!-- Default box -->
            
  													
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">School Profile Data (SPD)</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open('Menu/addspd')?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="sname">School Name</label>
                    <input type="text" class="form-control" name="sname" id="sname" placeholder="School Name" required>
                  </div>
                  <div class="form-group">
                    <label for="saddress">Address</label>
                    <input type="text" class="form-control" name="saddress" id="saddress" placeholder="School Address">
                  </div>
                  <div class="form-group">
                    <label for="slocation">Location</label>
                    <input type="text" class="form-control" name="slocation" id="slocation" placeholder="School Location">
                  </div>
                  <div class="form-group">
                    <label for="slanguage">Language</label>
                    <input type="text" class="form-control" name="slanguage" id="slanguage" placeholder="School Language">
                  </div>
                  <div class="form-group">
                    <label for="snoyear">Number of  Years</label>
                    <input type="text" class="form-control" name="snoyear" id="snoyear" placeholder="Number of  Years">
                  </div>
                  <div class="form-group">
                    <label for="sayear">Academic Year</label>
                    <input type="text" class="form-control" name="sayear" id="sayear" placeholder="Academic Year">
                  </div>
                  <div class="form-group">
                    <label for="std">STD</label>
                    <input type="text" class="form-control" name="std" id="std" placeholder="STD">
                  </div>
                  <div class="form-group">
                    <label for="boys">Boys</label>
                    <input type="text" class="form-control" name="boys" id="boys" placeholder="No of Boys">
                  </div>
                  <div class="form-group">
                    <label for="girls">Girls</label>
                    <input type="text" class="form-control" name="girls" id="girls" placeholder="No of Girls">
                  </div>
                  <div class="form-group">
                    <label for="total_students">Total Students</label>
                    <input type="text" class="form-control" name="total_students" id="total_students" placeholder="Total Students">
                  </div>
                  <div class="form-group">
                    <label for="total_teachers">Total Teachers</label>
                    <input type="text" class="form-control" name="total_teachers" id="total_teachers" placeholder="Total Teachers">
                  </div>
                  <div class="form-group">
                    <label for="timing">Timing</label>
                    <input type="text" class="form-control" name="timing" id="timing" placeholder="School Timing">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="website" id="website" placeholder="School Website">
                  </div>
                  
                  <div class="form-group">
                  <label for="status">Status</label>
                  <select class="custom-select rounded-0" name="status" id="status">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="status">Classroom Photo</label>
                  <input type="file" name="classroom" class="form-control-file">
                </div>
                <div class="form-group">
                  <label for="status">Request Letter</label>
                  <input type="file" name="Letter" class="form-control-file">
                </div>
                  
                  
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>
  </div>





<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">School Profile Data</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>School Name
                      <th>Address</th>
                      <th>Location</th>
                      <th>Language</th>
                      <th>Number of Years</th>
                      <th>Academic Year</th>
                      <th>STD</th>
                      <th>Boys</th>
                      <th>Girls</th>
                      <th>Total Students</th>
                      <th>Total Teachers</th>
                      <th>Timing</th>
                      <th>Website</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
      foreach($data as $d){
          ?>
                    <tr>
                        <td><?=$d->id?></td>
                        <td><?=$d->sname?></td>	
                        <td><?=$d->saddress?></td>
                        <td><?=$d->slocation?></td>
                        <td><?=$d->slanguage?></td>
                        <td><?=$d->snoyear?></td>
                        <td><?=$d->sayear?></td>
                        <td><?=$d->std?></td>
                        <td><?=$d->boys?></td>
                        <td><?=$d->girls?></td>
                        <td><?=$d->total_students?></td>
                        <td><?=$d->total_teachers?></td>
                        <td><?=$d->timing?></td>
                        <td><?=$d->website?></td>
                        <td><?=$d->status?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        
        
        
        

<!--<div class="container">
  <h2>User Detail</h2>            

  <table class="table">
    <thead>
      <tr>
      <th>id</th>
        <th>Fullname</th>
        <th>Username</th>
        <th>User Type</th>
        <th>Delete</th>
        <th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($data as $d){
          ?>
         <tr>
            <td><?=$d->id?></td>
            <td><?=$d->fullname?></td>
            <th><?=$d->user_name?></th>
            <th><?=$d->type?></th>
            <td><a href="<?=base_url()?>Menu/delete_user?id=<?=$d->id?>">Delete</a></td>
         </tr>
          
          <?php
      }
      ?>
    </tbody>
  </table>
</div>-->



          
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
