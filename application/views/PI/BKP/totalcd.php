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
            <h1 class="m-0">Handover to Account</h1>
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
        <div class="row">
          <div class="col-12">
           <div class="card">
            <form class="p-3" method="POST" action="totalcd">
                <select name="client" class="m-2">
                    <option value="">All</option>
                    <?php foreach($client as $c){?>
                        <option><?=$c->client_name?></option>
                    <?php }?>
                </select>
                <select name="zm" class="m-2">
                    <option value="">All</option>
                    <?php foreach($zmpi as $z){ if($z->dep_id=='11'){?>
                        <option value="<?=$z->id?>"><?=$z->fullname?></option>
                    <?php }}?>
                </select>
                <select name="pi" class="m-2">
                    <option value="">All</option>
                    <?php foreach($zmpi as $z){if($z->dep_id=='2'){?>
                        <option value="<?=$z->id?>"><?=$z->fullname?></option>
                    <?php }}?>
                </select>
                <select name="year" class="m-2">
                    <option value="">All</option>
                    <?php foreach($ally as $y){?>
                        <option><?=$y->yearn?></option>
                    <?php }?>
                </select>
            <button type="submit" class="bg-primary text-light">Filter</button>
            </form>
        </div>
<?php
$cname = '';
if(isset($_POST['client'])){
if($_POST['client']!=''){
$cname=$_POST['client'];
$pc = $this->Menu_model->get_pcbycname($cname);
}}
if(isset($_POST['zm'])){
if($_POST['zm']!=''){
$zm=$_POST['zm'];  
$pc = $this->Menu_model->get_pcbyzm($zm);
}}
if(isset($_POST['pi'])){
if($_POST['pi']!=''){
$pi=$_POST['pi'];  
$pc = $this->Menu_model->get_pcbypi($pi);
}}
if(isset($_POST['year'])){
if($_POST['year']!=''){
$year=$_POST['year'];
$pc = $this->Menu_model->get_pcbyyear($year);
}}
?>
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Client Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="container body-content">
        <div class="page-header">
            <center><h5>Client Name : <?php if(isset($_POST['client'])){echo $cname;}?></h5></center>
            <div class="form-group">
                <fieldset>
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                          <th>SNo.</th>
                                          <th>Client Name</th>
                                          <th>Project Code</th>
                                          <th>Project Year</th>
                                          <th>Total School</th>
                                          <th>Total School in App</th>
                                          <th>Installtion</th>
                                          <th>FTTP</th>
                                          <th>Maintenance</th>
                                          <th>RTTP</th>
                                          <th>M&E</th>
                                          <th>DIY</th>
                                          <th>Monthly Report</th>
                                          <th>Annual Report</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                      <?php 
                                      $i=1;
                                      if(isset($_POST['client']) OR isset($_POST['zm']) OR isset($_POST['pi']) OR isset($_POST['year'])){
                                      foreach($pc as $pc){
                                        $spdpc = $pc->projectcode;
                                        $tspd = $this->Menu_model->get_spdbypc($spdpc);
                                        $insr=0;
                                        $fttpr=0;
                                        $montr=0;
                                        $mner=0;
                                        $diyr=0;
                                        $rttpr=0;
                                        $mainr=0;
                                        $annr=0;
                                          foreach($tspd as $spd){
                                            $sid = $spd->id;
                                            $type = 'Installation';
                                            $ins = $this->Menu_model->get_reportbysid($sid,$type);
                                            if(sizeof($ins)>0){$insr++;}
                                            $type = 'FTTP';
                                            $fttp = $this->Menu_model->get_reportbysid($sid,$type);
                                            if(sizeof($fttp)>0){$fttpr++;}
                                            $type = 'Annual';
                                            $ann = $this->Menu_model->get_reportbysid($sid,$type);
                                            if(sizeof($ann)>0){$annr++;}
                                            $type = 'Maintenance';
                                            $main = $this->Menu_model->get_reportbysid($sid,$type);
                                            if(sizeof($main)>0){$mainr++;}
                                            $type = 'RTTP';
                                            $rttp = $this->Menu_model->get_reportbysid($sid,$type);
                                            if(sizeof($rttp)>0){$rttpr++;}
                                            $type = 'DIY';
                                            $diy = $this->Menu_model->get_reportbysid($sid,$type);
                                            if(sizeof($diy)>0){$diyr++;}
                                            $type = 'M&E';
                                            $mne = $this->Menu_model->get_reportbysid($sid,$type);
                                            if(sizeof($mne)>0){$mner++;}
                                            $type = 'Monthly';
                                            $mont = $this->Menu_model->get_reportbysid($sid,$type);
                                            if(sizeof($mont)>0){$montr++;}
                                              
                                          }
                                          
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$pc->client_name?></td>
                                        <td><a href="client_school/<?=$pc->id?>"><?=$pc->projectcode?></a></td>
                                        <td><?=$pc->project_year?></td>
                                        <td><?=$pc->noofschool?></td>
                                        <td><?=sizeof($tspd)?></td>
                                        <td><?=$insr?></td>
                                        <td><?=$fttpr?></td>
                                        <td><?=$mainr?></td>
                                        <td><?=$rttpr?></td>
                                        <td><?=$mner?></td>
                                        <td><?=$diyr?></td>
                                        <td><?=$montr?></td>
                                        <td><?=$annr?></td>
                                    </tr>
                                    <?php $i++;}} ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
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
