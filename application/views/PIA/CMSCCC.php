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
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4><?php $username=$user['fullname']; $uid=$user['id'];$rid=$user['region_id'];?>  <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); $did[0]->dep_name;?> </h4>
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
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card">
                  <div class="card-header bg-primary"><h3>Create Cluster for MSC Clean</h3></div>
              <div class="card-body box-profile">
                  <form action="<?=base_url();?>Menu/postmsccc" method="post">
                    <input type="hidden" value="<?=$uid?>" name="userid" id="userid">
                      <div class="form-group">
                        <?php $spd = $this->Menu_model->get_spdbypiid($uid); $tspd=sizeof($spd);?>
                        <label>You Have Total <?=$tspd?> School</label><br>
                        <?php $msccc = $this->Menu_model->get_mscccbypiid($uid);
                        
                        
                        if($msccc[0]->cont1>0){?>
                        <label>You Have Total <?=$msccc[0]->cont1?> Cluster</label><br>
                        <label>You Have Plan For <?=$msccc[0]->cont2?> Cluster</label><br>
                        <label>You Are Not Plan For <?=$msccc[0]->cont3?> Cluster</label><br>
                        <?php }else{?>
                            <label>How many Cluster Do you wan't to create</label>
                            <Input type="text" class="form-control" id="hmcr">
                        <?php } ?>
                      </div>
                      
                    <div class="form-group">
                        <label>Select Cluster</label>
                        <select class="custom-select rounded-0" name="cname">
                            <option>Select Cluster</option>
                            <?php 
                            $cname = $this->Menu_model->get_mscccbypia($uid);
                            foreach($cname as $cname){?>
                             <option><?=$cname->clustername?></option>
                            <?php } ?>
                        </select>
                    </div>
                   
                   
                   
                   
                    <div class="form-group">
                        <label>Select School</label>
                        <select class="custom-select rounded-0" name="spd[]" multiple>
                            <option>Select School</option>
                            <?php foreach($spd as $spd){
                            
                            ?>
                             <option value="<?=$spd->id?>"><?=$spd->sname?> (<?=$spd->scity?>) <?=$spd->sstate?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Target Date for Calling and Research (Temp Person)</label>
                         <Input type="Date" class="form-control" name="tpct" min="<?=date('Y-m-d')?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Cluster Start Date</label>
                         <Input type="Date" class="form-control" id="sdate" name="sdate" min="<?=date('Y-m-d')?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Cluster Close Date</label>
                        <input type="date" class="form-control" id="edate" name="edate" min="<?=date('Y-m-d')?>" >
                    </div>
                    
                    <div class="form-group">
                        <label>Remark</label>
                         <textarea class="form-control" name="remark"></textarea>
                    </div>
                    
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
             </form>
          </div></div>
      </div>   
     </div>     
    </section>
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('#hmcr').on('change', function b() {
    var userid = document.getElementById("userid").value;
    var hmcr = document.getElementById("hmcr").value;
    var sms= "Are you sure you want to create " +hmcr+ " cluster.";
    alert(sms);
    $.ajax({
    url:'<?=base_url();?>Menu/msccc',
    type: "POST",
    data: {
    userid: userid,
    hmcr: hmcr
    },
    cache: false,
    success: function a(result){
        location.reload();
    }
    }); 
});


$('#sdate').on('change', function b() {
    var sdate = document.getElementById("sdate").value;
    var addday = 8;
    $.ajax({
    url:'<?=base_url();?>Menu/addday',
    type: "POST",
    data: {
    sdate: sdate,
    addday: addday
    },
    cache: false,
    success: function a(result){
        var result = result;
        alert(result);
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

<!-- jquery-validation -->
<script src="<?=base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?=base_url();?>assets/js/additional-methods.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

<script>
$(function() {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
});
</script>
</body>
</html>