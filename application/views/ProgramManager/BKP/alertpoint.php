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
            <h1 class="m-0">Create Task</h1>
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
           <div class="col-sm col-md-12 col-lg-12 m-auto">
              <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                      <fieldset>
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <div class="pdf-viwer">
                      
                     <?php
                     $tdate = date('Y-m-d');
                     
                     
                        if($code=='1'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from client_handover where apr='2'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->client_name?></td>
                                    <td><?=$da->projectcode?></td>
                                    <td><?=$da->mediator?></td>
                                    <td><?=$da->project_year?></td>
                                </tr>
                           <?php }?>
                           </table>
                           <?php }?>
                           
                        <?php if($code=='2'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from client_handover where backdrop is null");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->client_name?></td>
                                    <td><?=$da->projectcode?></td>
                                    <td><?=$da->mediator?></td>
                                    <td><?=$da->project_year?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>   
                        
                        <?php if($code=='3'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from client_handover where apr='Reject'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->client_name?></td>
                                    <td><?=$da->projectcode?></td>
                                    <td><?=$da->mediator?></td>
                                    <td><?=$da->project_year?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        <?php if($code=='4'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("select * from replacereq LEFT join spd on spd.id = replacereq.sid WHERE tofm='1' and tostore='0'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->sdatet?></td>
                                    <td><?=$da->model_name?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        <?php if($code=='5'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("select * from replacereq LEFT join spd on spd.id = replacereq.sid WHERE tofm='1' and tostore='1' and closedt is null");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->sdatet?></td>
                                    <td><?=$da->model_name?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        <?php if($code=='6'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * FROM mbagqty LEFT JOIN user_detail ON user_detail.id=mbagqty.uid WHERE request='1' and pm='0' and qty>0");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->user_name?></td>
                                    <td><?=$da->material_name?></td>
                                    <td><?=$da->qty?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        <?php if($code=='7'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * FROM mbagqty LEFT JOIN user_detail ON user_detail.id=mbagqty.uid WHERE pm='1' and fm='0' and qty>0");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->user_name?></td>
                                    <td><?=$da->material_name?></td>
                                    <td><?=$da->qty?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        <?php if($code=='8'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from spd where status='7'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        <?php if($code=='9'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from plantask LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd on spd.id=plantask.spd_id where tdone='0'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->task_date?></td>
                                    <td><?=$da->to_user?></td>
                                    <td><?=$da->task_type?></td>
                                    <td><?=$da->task_subtype?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                    <td><?=$da->sdistrict?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        <?php if($code=='10'){?><table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <?php $i=1;$query=$this->db->query("SELECT * FROM task_assign LEFT JOIN spd ON spd.id=task_assign.spd_id where plan='0'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->task_date?></td>
                                    <td><?=$da->to_user?></td>
                                    <td><?=$da->task_type?></td>
                                    <td><?=$da->task_subtype?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                    <td><?=$da->sdistrict?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        
                        <?php if($code=='11'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id  LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd on spd.id=plantask.spd_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '09:00:00' and '11:00:00'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->task_date?></td>
                                    <td><?=$da->fullname?></td>
                                    <td><?=$da->task_type?></td>
                                    <td><?=$da->task_subtype?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                    <td><?=$da->sdistrict?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        
                        <?php if($code=='12'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id  LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd on spd.id=plantask.spd_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '11:00:01' and '13:00:00'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->task_date?></td>
                                    <td><?=$da->fullname?></td>
                                    <td><?=$da->task_type?></td>
                                    <td><?=$da->task_subtype?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                    <td><?=$da->sdistrict?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        
                        <?php if($code=='13'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id  LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd on spd.id=plantask.spd_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '13:00:01' and '15:00:00'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->task_date?></td>
                                    <td><?=$da->fullname?></td>
                                    <td><?=$da->task_type?></td>
                                    <td><?=$da->task_subtype?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                    <td><?=$da->sdistrict?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        <?php if($code=='14'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id  LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd on spd.id=plantask.spd_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '15:00:01' and '17:00:00'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->task_date?></td>
                                    <td><?=$da->fullname?></td>
                                    <td><?=$da->task_type?></td>
                                    <td><?=$da->task_subtype?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                    <td><?=$da->sdistrict?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        
                         <?php if($code=='15'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id  LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd on spd.id=plantask.spd_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '17:00:01' and '19:00:00'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->task_date?></td>
                                    <td><?=$da->fullname?></td>
                                    <td><?=$da->task_type?></td>
                                    <td><?=$da->task_subtype?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                    <td><?=$da->sdistrict?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                        <?php if($code=='16'){?><table class="table">
                            <?php $i=1;$query=$this->db->query("SELECT * from plantask LEFT JOIN user_detail on user_detail.id=plantask.user_id  LEFT JOIN task_assign ON task_assign.id=plantask.taskid LEFT JOIN spd on spd.id=plantask.spd_id WHERE cast(plandate AS DATE)='$tdate' and tdone=0 and cast(plandate AS TIME) BETWEEN '19:00:01' and '21:00:00'");
                            $data = $query->result();
                            foreach($data as $da){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$da->task_date?></td>
                                    <td><?=$da->fullname?></td>
                                    <td><?=$da->task_type?></td>
                                    <td><?=$da->task_subtype?></td>
                                    <td><?=$da->project_code?></td>
                                    <td><?=$da->sname?></td>
                                    <td><?=$da->saddress?></td>
                                    <td><?=$da->sdistrict?></td>
                                </tr>
                           <?php }?>
                           </table>
                        <?php }?>
                        
                  </div>
              </div>
      </div>   
     </div>     
    </section>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('#task_subtype').on('change', function() {
   var tst = this.value;
   var tt = document.getElementById("task_type").value;
   if(tt=="VISIT"){
       if(tst=="New Client"){
          $("#box1").show();
          $("#box2").hide(); 
       }
       if(tst=="Onboard Client" || tst=="Inauguration"){
          $("#box2").show();
          $("#box1").hide();
       }
   }
   if(tt=="TTP"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="M&E"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="DIY"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Maintenance"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Installation"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Call"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Email"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Whatsapp"){
      $("#box2").show();
      $("#box1").hide();
   }
   if(tt=="Other"){
      $("#box2").hide();
      $("#box1").hide();
   }
});

$('#region').on('change', function b() {
var dep = document.getElementById("dep").value;
var region = document.getElementById("region").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getuserbydr',
type: "POST",
data: {
dep: dep,
region: region
},
cache: false,
success: function a(result){
$("#to_user").html(result);
}
});
});


$('#task_type').on('change', function c() {
var tt = document.getElementById("task_type").value;
$.ajax({
url:'<?=base_url();?>Menu/gettst',
type: "POST",
data: {
tt: tt
},
cache: false,
success: function a(result){
$("#task_subtype").html(result);
}
});
});


$('#pcode').on('change', function b() {
var pcode = document.getElementById("pcode").value;
$.ajax({
url:'<?=base_url();?>Menu/getspdbypcode',
type: "POST",
data: {
pcode: pcode
},
cache: false,
success: function a(result){
$("#spd_id").html(result);
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
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>

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
