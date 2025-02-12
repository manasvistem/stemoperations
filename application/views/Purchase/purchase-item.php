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
              <h4>HI! <?=$user['fullname']?> ( <?php $uid=$user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
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
                <h3 class="card-title">Purchase Item</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              
              <?=form_open('Menu/puritem')?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="project_code">Project Code</label>
                        <?php $pcode = $this->Menu_model->get_client();?>
                    
                    <select class="form-control" class="form-control" name="project_code" id="project_code" required>
                          <option value="">Select Project Code</option>
                            <?php foreach($pcode as $pcode){if($pcode->project_year=='2023-24'){?>
                            <option value="<?=$pcode->projectcode?>"><?=$pcode->projectcode?></option>
                            <?php }} ?>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="item_name">Item Name</label>
                    <select class="form-control" name="item_name" id="item_name">
                        <option value="">Select Item</option>
                        <option>Partical Board</option>
                        <option>Bottom Patti</option>
                        <option>Partical Board Cutting</option>
                        <option>Transportation</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="item_qty">Quantity</label>
                    <input type="text" class="form-control" name="item_qty" id="item_qty" >
                  </div>
                  <div class="form-group">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control" name="unit" id="unit" >
                  </div>
                  <div class="form-group">
                    <label for="rate">Unit Price</label>
                    <input type="text" class="form-control" name="rate" id="rate" >
                  </div>
                  <div class="form-group">
                    <label for="pay_tarms">Payment Tarms</label>
                    <select name="pay_tarms" id="pay_tarms" class="form-control" required>
                        <option>Select Payment Tarms</option>
                        <option value="cash">Cash</option>
                        <option value="NEFT">NEFT</option>
                        <option value="Gpay">Gpay</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="vendor_name">Vendor Name</label>
                    <input type="text" class="form-control" name="vendor_name" id="vendor_name" >
                  </div>
                  <div class="form-group">
                    <label for="v_mno">Vendor Mobile No</label>
                    <input type="text" class="form-control" name="v_mno" id="v_mno" >
                  </div>
                  <div class="form-group">
                    <label for="v_email">Vendor Email Id</label>
                    <input type="text" class="form-control" name="v_email" id="v_email" >
                  </div>
                  <div class="form-group">
                    <label for="v_address">Vendor Address</label>
                    <input type="text" class="form-control" name="v_address" id="v_address" >
                  </div>
                  <div class="form-group">
                    <label for="bank_name">Bank Name</label>
                    <input type="text" class="form-control" name="bank_name" id="bank_name" >
                  </div>
                  <div class="form-group" id="a_no">
                    <label for="account_no">Account No</label>
                    <input type="text" class="form-control" name="account_no" id="account_no" >
                  </div>
                  <div class="form-group" id="ifs">
                    <label for="ifsc">IfSC Code</label>
                    <input type="text" class="form-control" name="ifsc" id="ifsc" >
                  </div>
                  <div class="form-group">
                    <label for="del_tarms">Delivery Tarms</label>
                    <input type="text" class="form-control" name="del_tarms" id="del_tarms" >
                  </div>
                  <div class="form-group">
                    <label for="remark">Remark</label>
                    <textarea type="text" class="form-control" name="remark" id="remark" ></textarea>
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
<script>
            
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
