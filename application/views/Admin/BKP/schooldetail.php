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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<?php include 'addlog.php';?>
  

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
       <div class="row p-3">
          <div class="col-sm col-md-8 col-lg-8">
            <?php foreach($data as $d){ ?>
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                
                <div class="row">
                    <div class="col-sm col-lg-6"><h4><?=$d->sname?></h4></div>
                    <div class="col-sm col-lg-3"><button type="button" id="add_act" class="btn btn-light"><i class="fa fa-plus"></i> Activity Update</button></div>
                    <div class="col-sm col-lg-3"><button type="button" id="add_wag" class="btn btn-light" value="<?=$d->id?>"><img src="<?=base_url();?>assets/image/icon/whatsapp.png" style="height:30px;"> Group Update</button></div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm col-lg-4">Total Logs:</div>
                    <div class="col-sm col-lg-8">Total Logs:<hr></div>
                
                    <div class="col-sm col-lg-4">Assigned to:</div>
                    <div class="col-sm col-lg-8">Assigned to:</div>
                <hr>
                    <div class="col-sm col-lg-4">Status Details:</div>
                    <div class="col-sm col-lg-8">
                        <span class="badge badge-primary">New School &nbsp;<span class="badge badge-success">1</span></span>
                        <span class="badge badge-primary">FTTP Done &nbsp;<span class="badge badge-success">1</span></span>
                        <span class="badge badge-primary">Active School &nbsp;<span class="badge badge-success">1</span></span>
                        <span class="badge badge-primary">Average School &nbsp;<span class="badge badge-success">1</span></span>
                        <span class="badge badge-success">Good School &nbsp;<span class="badge badge-primary">1</span></span>
                        <span class="badge badge-success">Model School &nbsp;<span class="badge badge-primary">1</span></span>
                    </div>
                <hr>
                    <div class="col-sm col-lg-4">Email:</div>
                    <div class="col-sm col-lg-8"><?=$d->email?></div>
                <hr>
                    <div class="col-sm col-lg-4">Phone:</div>
                    <div class="col-sm col-lg-8"><?=$d->contact_no?>
                        <span class="company_contact contact{{cc2.id}}">
                            <a href="" target="_blank" style="padding:7px;border-radius:20px;">
                                <img src="<?=base_url();?>assets/image/icon/call.png" style="height:30px;">
                            </a>
                            <a href="" target="_blank" style="padding:7px;border-radius:20px;">
                                <img src="<?=base_url();?>assets/image/icon/whatsapp.png" style="height:30px;">
                            </a>
                                            </span>
                    </div>
                <hr>
                    <div class="col-sm col-lg-4">Website:</div>
                    <div class="col-sm col-lg-8"><?=$d->website?></div>
                <hr>
                    <div class="col-sm col-lg-4">Address:</div>
                    <div class="col-sm col-lg-8"><?=$d->saddress?></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <?php } ?>
          
          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <div class="row">
                    <div class="col-sm col-lg-9"><h4>Latest Image</h4></div>
                    <div class="col-sm col-lg-3"><button type="button" id="add_act" class="btn btn-light"><i class="fa fa-plus"></i> Read More</button></div>
                </div>
                <hr>
                  <?php foreach($wgd as $d){ ?>
                  <a href="<?=base_url();?><?=$d->filepath?>" target="_blank"><img src="<?=base_url();?><?=$d->filepath?>" width="100px" height="100px" class="p-2"></a>
                  <?php } ?>
              </div>
          </div>
            
            </div>
          <!-- /.col -->
          <div class="col-sm col-md-4 col-lg-4 showdata">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <div class="row">
                    <div class="col-sm col-lg-5"><h4>Contact</h4></div>
                    <div class="col-sm col-lg-7"><button type="button" id="add_cont" class="btn btn-light" value="<?=$d->id?>" style="float:right;"><i class="fa fa-plus"></i> Add Contact</button></div>
                </div><hr>
                <?php foreach($dataa as $d){ ?>
                    <div class="col-sm">Name : <?=$d->contact_name?></div>
                    <div class="col-sm">Designation : <?=$d->designation?></div>
                    <div class="col-sm">Contact No : <?=$d->contact_no?></div>
                    <div class="col-sm">Email : <?=$d->email?></div><hr>
                <?php } ?>
              </div>
              </div>
              <!-- /.card-header -->
              
              
            </div>
            <!-- /.card -->
  </div>
  
  
  <div class="col-12">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Logs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="container body-content">
        <div class="page-header">
            <div class="form-group">
                <fieldset>
                    <form action="" class="form-group" method="post">
                        <div class="table-responsive">
                            <div class="table-responsive">                            

                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            								
                                                  <th>Sr Number</th>
                                                  <th>Remarks</th>
                                                  <th>Current Action</th>
                                                  <th>Next Action</th>
                                                  <th>Next Action Date</th>
                                                  <th>Action Taken</th>
                                                  <th>createddate</th>
                                                  <th>Updated Date</th>
                                                  <th>Updated By</th>
                                                  <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($data as $d){ ?>
                                    <tr>
                                        <td><?=$d->id?></td>
                                        <td><a href="school_detail/<?=$d->id?>"><?=$d->sname?></a></td>	
                                        <td><?=$d->saddress?></td>
                                        <td><?=$d->slocation?></td>
                                        <td><?=$d->slanguage?></td>
                                        <td><?=$d->snoyear?></td>
                                        <td><?=$d->sayear?></td>
                                        <td><?=$d->std?></td>
                                        <td><?=$d->boys?></td>
                                        <td><?=$d->girls?></td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </form>            <!--END OF FORM ^^-->
                </fieldset>
            </div>
            <hr />
        </div>
    </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </div>
          <!-- /.col -->
  
  </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


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
<script src="<?=base_url();?>assets/js/myjs.js"></script>

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
