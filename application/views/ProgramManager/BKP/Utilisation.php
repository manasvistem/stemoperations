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


.circle-image img{

	border: 6px solid #fff;
    border-radius: 100%;
    padding: 0px;
    top: -28px;
    position: relative;
    width: 70px;
    height: 70px;
    border-radius: 100%;
    z-index: 1;
    background: #e7d184;
    cursor: pointer;

}


.dot {
      height: 18px;
    width: 18px;
    background-color: blue;
    border-radius: 50%;
    display: inline-block;
    position: relative;
    border: 3px solid #fff;
    top: -48px;
    left: 186px;
    z-index: 1000;
}

.name{
	margin-top: -21px;
	font-size: 18px;
}


.fw-500{
	font-weight: 500 !important;
}


.start{

	color: green;
}

.stop{
	color: red;
}


.rate{

	border-bottom-right-radius: 12px;
	border-bottom-left-radius: 12px;

}



.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}


.buttons{
	top: 36px;
    position: relative;
}


.rating-submit{
	border-radius: 15px;
	color: #fff;
	    height: 49px;
}


.rating-submit:hover{
	
	color: #fff;
}
</style>
  
  <style>
      input[name="extra-checkbox"] + input[name="extra-info-text"] {display: none;}
      input[name="extra-checkbox"]:checked + input[name="extra-info-text"] {display: inline;}
      
      .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
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
            <h1 class="m-0">Utilisation</h1>
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
        <div class="row p-3">
          <div class="col-md-3">
            <!-- Profile Image -->
        <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">School Detail</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-2">
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                      <lable>Project Code</lable><br>
                      <b><?=$task[0]->project_code?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>School Name</lable><br>
                    <b><?=$spd[0]->sname?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>Person</lable><br>
                    <b><?=$user['fullname']?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>Address</lable><br>
                    <b><?=$spd[0]->saddress?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>City</lable><br>
                    <b><?=$spd[0]->scity?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>State</lable><br>
                    <b><?=$spd[0]->sstate?></b>
                  </li>
                  <?php 
                  $sid = $spd[0]->id;
                  $sd=$this->Menu_model->get_school_contact($sid);
                  foreach($sd as $sd){?>
                  <li class="list-group-item">
                    <lable>Contact</lable><br>
                    <b><?=$sd->contact_name?></b><br>
                    <b><?=$sd->designation?></b><br>
                    <b><?=$sd->contact_no?></b><br>
                    <b><?=$sd->email?></b>
                  </li>
                  <?php }?>
                </ul>
            <!-- /.card -->
            </div></div></div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Utilisation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                   <div class="card-body box-profile">
                    <div class="row">
                    <?php $i=1; foreach($wgd as $wg){?>
                    <div class="col-sm col-lg-4">
                           <?php $ext = pathinfo($wg->filepath, PATHINFO_EXTENSION); if($ext=='mp4'){?>
                           <a href="<?=base_url();?><?=$wg->filepath?>" target="_blank">
                              <video class="embed-responsive-item img-thumbnail" src="<?=base_url();?><?=$wg->filepath?>" height="300" muted controls></video>
                              
                           </a>
                           <?php }else{?>
                           <a href="<?=base_url();?><?=$wg->filepath?>" target="_blank">
                              <img src="<?=base_url();?><?=$wg->filepath?>"  class="img-thumbnail" width="100%">
                           </a>
                           <?php }?>
                        </div>
                       <?php }?>
                     </div>  
                            
                   
            </div>
            <!-- /.card -->
            
            <div class="entry">

  </div>
  </div>
  

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('#sel').on('change', function a() { 
 var sel = this.value;
 if(sel=='Other'){
     document.getElementById("remark").readOnly = false;
 }else{
 document.getElementById("remark").value = sel;}
});


$('input[name=r1]').on('change', function() {
   var data = $('input[name=r1]:checked').val();
   if(data=='YES')
   {
       document.getElementById("remark").style.display = "none";
   }else{
       document.getElementById("remark").style.display = "block";
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