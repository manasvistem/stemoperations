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
            <h1 class="m-0">Add Old School Detail</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12 m-auto">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url();?>Menu/oldschooldata" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                            <div class="col-lg-4 p-3">
                              <div class="form-group">
                                <label>Project Code*</label>
                                <input type="text" list="procode" name="indata[0]" class="form-control"/>
                                <datalist id="procode">
                                    <?php foreach($procode as $d){ if($d->client_name==''){?>
                                    <option value="<?=$d->projectcode?>"><?=$d->projectcode?></option>
                                    <?php }} ?>
                                </datalist>
                              </div>
                              <div class="form-group">
                                <label>School Name*</label>
                                <input type="text" class="form-control" name="indata[1]" placeholder="School Name" required>
                              </div>
                              <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" name="indata[26]" placeholder="Email Address" required>
                              </div>
                              <div class="form-group">
                                <label>Address*</label>
                                <textarea class="form-control" name="indata[2]" placeholder="Address" required></textarea>
                              </div>
                              <div class="form-group">
                                <label>State*</label>
                                <input type="text" list="state" name="indata[3]" id="statename" class="form-control"/>
                                <datalist id="state">
                                    <?php foreach($state as $d){ ?>
                                    <option value="<?=$d->statename?>"><?=$d->statename?></option>
                                    <?php } ?>
                                </datalist>
                              </div>
                              <div class="form-group">
                                <label>City*</label>
                                <select id="cityname" name="indata[4]" class="form-control">
                                    
                                </select>
                              </div>
                              <div class="form-group">
                                <label>District*</label>
                                <select name="indata[27]" class="form-control">
                                    <option>District name</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>School Status*</label>
                                <input type="text" class="form-control" name="indata[5]" value="Average School" placeholder="" readonly>
                              </div>
                              
                        </div>
                        
                        <div class="col-lg-4 p-3">
                            <div class="form-group">
                                <label>Previous School Status*</label>
                                <select class="custom-select rounded-0" name="indata[6]" >
                                    <option value="">Select Status</option>
                                    <?php foreach($status as $d){?>
                                    <option value="<?=$d->id?>"><?=$d->name?></option>
                                    <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" name="indata[7]" placeholder="Principa Name" required>
                                <input type="text" class="form-control" name="indata[8]" placeholder="Principal Mobile No" required>
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" name="indata[24]" placeholder="Science Teacher Name" required>
                                <input type="text" class="form-control" name="indata[25]" placeholder="Science Teacher No" required>
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" name="indata[22]" placeholder="Mathematics Teacher Name" required>
                                <input type="text" class="form-control" name="indata[23]" placeholder="Mathematics Teacher No" required>
                              </div>
                              <div class="form-group">
                                <label>Zone*</label>
                                <select class="custom-select rounded-0" name="indata[9]">
                                    <option value="">Select Zone</option>
                                    <?php foreach($reg as $d){?>
                                    <option value="<?=$d->id?>"><?=$d->name?></option>
                                    <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="noofschool">Google Location</label>
                                <input type="text" class="form-control" name="indata[10]" placeholder="Number of Schools">
                              </div>
                              <div class="form-group">
                                <label for="location">Language</label>
                                <input type="text" class="form-control" name="indata[11]" placeholder="Location / Village">
                              </div>
                              <div class="form-group">
                                <label for="city">Number of Years*</label>
                                <input type="text" class="form-control" name="indata[12]" placeholder="Number of Years" required>
                              </div>
                                  
                        </div>
                        <div class="col-lg-4 p-3">
                            <div class="form-group">
                                <label>Started Academic Year</label>
                                <select name="indata[13]" class="form-control"/>
                                    <option value="2015-16">2014-15</option>
                                    <option value="2015-16">2015-16</option>
                                    <option value="2015-16">2016-17</option>
                                    <option value="2017-18">2017-18</option>
                                    <option value="2018-19">2018-19</option>
                                    <option value="2019-20">2019-20</option>
                                    <option value="2020-21">2020-21</option>
                                    <option value="2021-22">2021-22</option>
                                    <option value="2021-22">2022-23</option>
                                </select>
                              </div>
                            <div class="form-group">
                                <label>STD</label>
                                <select name="indata[14]" class="form-control"/>
                                    <option value="6th to 8th">6th to 8th</option>
                                    <option value="6th to 10th">6th to 10th</option>
                                    <option value="6th to 12th">6th to 12th</option>
                                    <option value="9th to 10th">9th to 10th</option>
                                    <option value="9th to 12th">9th to 12th</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="infrastructure">Total Boys</label>
                                <input type="text" class="form-control" name="indata[15]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="infrastructure">Total Girls</label>
                                <input type="text" class="form-control" name="indata[16]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="infrastructure">Total Students</label>
                                <input type="text" class="form-control" name="indata[17]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="infrastructure">Total Teachers</label>
                                <input type="text" class="form-control" name="indata[18]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="infrastructure">Timing</label>
                                <input type="text" class="form-control" name="indata[19]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="infrastructure">Website</label>
                                <input type="text" class="form-control" name="indata[20]" placeholder="">
                              </div>
                              <div class="form-group">
                                <input type="hidden" class="form-control" name="indata[21]" value="<?=$user['id']?>">
                              </div>
                        </div>
                    </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('#statename').on('change', function b() {
var statename = document.getElementById("statename").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getcity',
type: "POST",
data: {
statename: statename
},
cache: false,
success: function a(result){
$("#cityname").html(result);
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

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>
</body>
</html>
