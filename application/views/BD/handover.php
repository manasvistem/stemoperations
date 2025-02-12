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
            <h1 class="m-0">Handover to PM</h1>
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
                <h3 class="card-title">HANDOVER to Program Manager</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url();?>Menu/bdHandover" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 p-3">
                              <div class="form-group">
                                <label for="client_name">Client Name</label>
                                <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Client Name" required>
                              </div>
                              <div class="form-group">
                                <label for="mediator">NGO / Mediator if any</label>
                                <input type="text" class="form-control" name="mediator" id="mediator" placeholder="NGO / Mediator if any" required>
                              </div>
                              <div class="form-group">
                                <label for="noofschool">Number of Schools</label>
                                <input type="text" class="form-control" name="noofschool" id="noofschool" placeholder="Number of Schools" required>
                              </div>
                              <div class="form-group">
                                <label for="location">Location / Village</label>
                                <textarea class="form-control" name="location" id="location" placeholder="Location / Village" required></textarea>
                              </div>
                              <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
                              </div>
                              <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="state" id="state" placeholder="State" required>
                              </div>
                              <div class="form-group">
                                <label for="spd_identify_by">Are the schools to be Identified?</label>
                                <select class="form-control" name="are_spd_identify" id="are_spd_identify" placeholder="Are the schools to be Identified?">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="spd_identify_by">School Identification by</label>
                                <select class="form-control" name="spd_identify_by" id="spd_identify_by" placeholder="School Identification by" onchange="schoolFun()" required>
                                    <option>STEM</option>
                                    <option>Client</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="infrastructure">School Infrastructure for MSC (platform)</label>
                                <input type="text" class="form-control" name="infrastructure" id="infrastructure" placeholder="School Infrastructure for MSC (platform)" required>
                              </div>
                              <div class="form-group">
                                <label for="filname">Client logo shared with Operations</label>
                                <input type="file" class="form-control-file" id="filname" name="filname" required>
                              </div>
                        </div>
                        <div class="col-lg-6 p-3">
                            <div class="form-group">
                                <label for="contact_person">Contact Person</label>
                                <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person" required>
                              </div>
                              <div class="form-group">
                                <label for="cp_mno">Contact Person Mobile No</label>
                                <input type="text" class="form-control" name="cp_mno" id="cp_mno" placeholder="Contact Person Mobile No" required>
                              </div>
                              <div class="form-group">
                                <label for="acontact_person">Alternate Contact Person</label>
                                <input type="text" class="form-control" name="acontact_person" id="acontact_person" placeholder="Alternate Contact Person" required>
                              </div>
                              <div class="form-group">
                                <label for="acp_mno">Alternate Contact Person Mobile No</label>
                                <input type="text" class="form-control" name="acp_mno" id="acp_mno" placeholder="Alternate Contact Person Mobile No" required>
                              </div>
                              <div class="form-group">
                                <label for="language">Language on backdrop required by client for MSC</label>
                                <input type="text" class="form-control" name="language" id="language" placeholder="Language on backdrop required by client for MSC" required>
                              </div>
                              <div class="form-group">
                                <label for="expected_installation_date">Expected Installation Date by Client/Sales Team</label>
                                <input type="date" class="form-control" name="expected_installation_date" id="expected_installation_date" placeholder="Expected Installation Date by Client/Sales Team" required>
                              </div>
                              <div class="form-group">
                                <label for="project_tenure">Project Tenure (Year)</label>
                                <input type="number" class="form-control" name="project_tenure" id="project_tenure" placeholder="Project Tenure" required>
                              </div>
                              <div class="form-group">
                                <label for="project_type">Project Type</label>
                                <select id="projectt" onchange="prot()" class="form-control">
                                    <option>Select Project Type</option>
                                    <option>MSC</option>
                                    <option>Other</option>
                                </select>
                                <input type="text" class="form-control" name="project_type" id="project_type" placeholder="Project Type" required readonly>
                              </div>
                              <div class="form-group">
                                <label for="comments">Special Requirements / Comments :</label>
                                <textarea class="form-control" name="comments" id="comments" placeholder="Special Requirements / Comments" required></textarea>
                              </div>
                        </div>
                    </div>
                  
                </div>
                <div class="row" id="container">
                    <div id="mainsection" class="col-lg-12 col-sm p-3">
                        <div id="mainsection" class="row p-3">
                        <div class="col-lg-4 p-1 col-sm"><input type="text" class="form-control" name="sname[]" placeholder="School Name"></div>
                        <div class="col-lg-4 p-1 col-sm"><input type="text" class="form-control" name="saddress[]" placeholder="Address with Pincode"></div>
                        <div class="col-lg-4 p-1 col-sm"><input type="text" class="form-control" name="scity[]" placeholder="City"></div>
                        </div>
                        <div id="mainsection" class="row p-3">
                        <div class="col-lg-4 p-1 col-sm"><input type="text" class="form-control" name="sstate[]" placeholder="State"></div>
                        <div class="col-lg-4 p-1 col-sm"><input type="text" class="form-control" name="contact_name[]" placeholder="Contact Person"></div>
                        <div class="col-lg-4 p-1 col-sm"><input type="text" class="form-control" name="contact_no[]" placeholder="Contact No"></div>
                        </div><hr>
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
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>
function schoolFun() {
  var x = document.getElementById("noofschool").value;
  var ideby = document.getElementById("spd_identify_by").value;
  if(ideby=='Client'){
  for(var i=1;i<x;i++){
      var container = document.getElementById("container");
      var section = document.getElementById("mainsection");
      container.appendChild(section.cloneNode(true));
  }
  }
}

function prot(){
    var x = document.getElementById("projectt").value;
    if(x!='Other'){
        document.getElementById("project_type").value = x;
        document.getElementById("project_type").readOnly = true;
    }else{
        document.getElementById("project_type").value = '';
        document.getElementById("project_type").readOnly = false;
    }
}
      
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
