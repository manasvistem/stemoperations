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
            <h1 class="m-0">Task Tracker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4>HI! <?php echo $fullname=$user['fullname']; $uid=$user['id'];?> ( <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    <div class="card">
        
       
              
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="container body-content">
        <div class="page-header"><h3 class="text-center"><center><b>Task Detail <br>(from <?=$sd?> to <?=$ed?>)</b></center></h3>
            <div class="form-group">
                <fieldset>
                     <form method='POST'>
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <div class="pdf-viwer">
                                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Pending Task to be Schedule</th>
                                            <th>Total Task Assign/Planned</th>
                                            <th>Total Task Pending</th>
                                            <th>Total Task Completed</th>
                                            <th>Call Assign/Planned</th>
                                            <th>Call Pending</th>
                                            <th>Call Completed</th>
                                            <th>Email Assign/Planned</th>
                                            <th>Email Pending</th>
                                            <th>Email Completed</th>
                                            <th>Whatsapp Assign/Planned</th>
                                            <th>Whatsapp Pending</th>
                                            <th>Whatsapp Completed</th>
                                            <th>FTTP Assign/Planned</th>
                                            <th>FTTP Pending</th>
                                            <th>FTTP Completed</th>
                                            <th>RTTP Assign/Planned</th>
                                            <th>RTTP Pending
                                            <th>RTTP Completed
                                            <th>M&E Assign/Planned
                                            <th>M&E Pending</th>
                                            <th>M&E Completed</th>
                                            <th>DIY Assign/Planned</th>
                                            <th>DIY Pending</th>
                                            <th>DIY Completed</th>
                                            <th>Utilisation Assign/Planned</th>
                                            <th>Utilisation Pending</th>
                                            <th>Utilisation Completed</th>
                                            <th>Report Assign/Planned</th>
                                            <th>Report Pending</th>
                                            <th>Report Completed</th>
                                            <th>Other Assign/Planned</th>
                                            <th>Other Pending</th>
                                            <th>Other Completed</th>
                                            <th>Action Taken Yes</th>
                                            <th>Action Taken No</th>
                                            <th>Purpose Achieved Yes</th>
                                            <th>Purpose Achieved No</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      
                                        $alluser=$this->Menu_model->get_user();
                                        foreach($alluser as $au){
                                        $auid = $au->id;
                                        $auser=$this->Menu_model->get_user_byid($auid);
                                        $ttd=$this->Menu_model->get_bwdtdetailbyuser($auid,$sd,$ed);
                                        foreach($ttd as $ttd){
                                        if($ttd->ac>0 || $ttd->ab>0){
                                        ?>
                                           <tr>
                                           <td><?=$sd?> to <?=$ed?></a></td>
                                           <td><?=$auser[0]->fullname?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/1"><?=$ttd->ab?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/2"><?=$ttd->ac?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/3"><?=$ttd->ad?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/4"><?=$ttd->ae?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/5"><?=$ttd->a?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/6"><?=$ttd->b?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/7"><?=$ttd->c?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/8"><?=$ttd->d?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/9"><?=$ttd->e?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/10"><?=$ttd->f?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/11"><?=$ttd->g?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/12"><?=$ttd->h?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/13"><?=$ttd->i?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/14"><?=$ttd->j?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/15"><?=$ttd->k?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/16"><?=$ttd->l?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/17"><?=$ttd->m?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/18"><?=$ttd->n?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/19"><?=$ttd->o?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/20"><?=$ttd->p?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/21"><?=$ttd->q?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/22"><?=$ttd->r?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/23"><?=$ttd->s?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/24"><?=$ttd->t?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/25"><?=$ttd->u?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/26"><?=$ttd->v?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/27"><?=$ttd->w?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/29"><?=$ttd->x?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/30"><?=$ttd->y?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/31"><?=$ttd->z?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/32"><?=$ttd->za?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/33"><?=$ttd->zb?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/33"><?=$ttd->zc?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/34"><?=$ttd->zd?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/35"><?=$ttd->ze?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/36"><?=$ttd->zf?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/37"><?=$ttd->zg?></a></td>
                                           <td><a href="<?=base_url();?>/Menu/DTTDetail/<?=$auid?>/<?=$sd?>/38"><?=$ttd->zh?></a></td>
                                           </tr>
                                       <?php }}}?>
                                  </tbody>
                                </table>
                                    
                                </div>  
                            </div>
                        </div>
                    </form>            <!--END OF FORM ^^-->
                </fieldset>
            </div>
            <hr />
        </div>
    </div></div>
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