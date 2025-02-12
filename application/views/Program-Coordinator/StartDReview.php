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
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4></h4>
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
           <div class="card col-12 border border-info text-center p-3">
              <img src="<?=base_url();?><?=$mydetail[0]->photo?>" alt="Admin" class="rounded-circle m-auto p-3" width="150">
              <h4><?=$mydetail[0]->fullname?></h4>
              <p class="text-secondary mb-1"><?=$mydetail[0]->dep_name?></p>
              <p class="text-muted font-size-sm"><?=$mydetail[0]->email?></p>
              <p class="text-muted font-size-sm"><?=$mydetail[0]->phoneno?></p>
                <hr>
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Yesterday Task</i></h6>
                <?php foreach($mytd1 as $td1){?>
                <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><?=$td1->cont?> <?=$td1->action?></a>
                <?php } ?>
                <hr>
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">This Year Sub Task</i></h6>
                <?php foreach($mytd2 as $td2){?>
                <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><?=$td2->cont?> <?=$td2->tt?> (<?=$td2->stt?>)</a>
                <?php } ?>
            </div>
            <div class="card col-12 p-3">
                    <div class="card p-2">
                        <b>Today Start Review</b><hr>
                        <?php if($piadays){?>
                        <?=$piadays[0]->ustart?> | <?php if($piadays[0]->wffo=='1'){echo 'Office';}elseif($piadays[0]->wffo=='2'){echo 'Field';}else{echo 'Field+Office';}?>
                        <?php } ?>
                    </div>
                    
                    
                    <div class="card p-2">
                        <b>Yesterday Close Review</b><hr>
                        <?php if($piadayc){?>
                        <?=$piadayc[0]->ustart?> | <?=$piadayc[0]->uclose?> | <?php if($piadayc[0]->wffo=='1'){echo 'Office';}elseif($piadayc[0]->wffo=='2'){echo 'Field';}else{echo 'Field+Office';}?>
                        <?php } ?>
                    </div>
                    <div class="card p-3">
                        <b>Yesterday Task Review</b><hr>
                                          <?php $taskaypy = $this->Menu_model->get_TaskCheckaypy($piid,$ydate);
                                          if($taskaypy){ ?>
                                                <center><h4>Task With Action Taken Yes Purpose Yes</h4></center><br>
                                               <div class="row">
                                                <?php $i=1;
                                                foreach ($taskaypy as $md){
                                                    $startm = $md->initiateddt;
                                                    $closem = $md->donet;
                                                    $plandt = $md->plandate;
                                                    $timed = $this->Menu_model->timediff($startm, $closem);
                                                    $startm = date('h:i A', strtotime($startm));
                                                    $closem = date('h:i A', strtotime($closem)); ?>
                                                <div class="card m-auto col-sm col-lg-3 text-center p-3">
                                                    <?=$md->project_code?><hr>
                                                    <?=$md->sname?><hr>
                                                    <?=$md->action?><hr>
                                                    <b><?=$md->task_subtype?><hr></b>
                                                    <?=$plandt?><hr>
                                                    <?=$startm?><hr>
                                                    <?=$closem?><hr>
                                                    <?=$timed?><hr>
                                                    <?=$md->remark?>
                                                    
                                                        <?php if($md->action=='Call'){?>
                                                        <button id="add_plan<?=$md->tid?>" value="<?=$md->tid?>" type="button" class="btn btn-info">Review</button></td>
                                                        <?php } else{ ?>
                                                        
                                                        
                                                        <?php } ?>
                                                        
                                                        </div>
                                                
                                                <?php } ?>
                                                <?php } ?>
                                                
                                                
                                          <?php $taskaypy = $this->Menu_model->get_TaskCheckaypn($piid,$ydate);
                                          if($taskaypy){ ?>
                                                <center><h4>Task With Action Taken Yes Purpose No</h4></center><br>
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Compny Name</th>
                                                        <th>Action</th>
                                                        <th>Purpose</th>
                                                        <th>Action Plan</th>
                                                        <th>Action Start</th>
                                                        <th>Action Close</th>
                                                        <th>Action Time Diff</th>
                                                        <th>Remark</th>
                                                        <th>Review</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=1;
                                                foreach ($taskaypy as $md){
                                                    $startm = $md->initiateddt;
                                                    $closem = $md->donet;
                                                    $plandt = $md->plandate;
                                                    $timed = $this->Menu_model->timediff($startm, $closem);
                                                    $startm = date('h:i A', strtotime($startm));
                                                    $closem = date('h:i A', strtotime($closem)); ?>
                                                <tr>
                                                    <td><?=$md->sname?></td>
                                                    <td><?=$md->action?></td>
                                                    <td><?=$md->task_subtype?></td>
                                                    <td><?=$plandt?></td>
                                                    <td><?=$startm?></td>
                                                    <td><?=$closem?></td>
                                                    <td><?=$timed?></td>
                                                    <td><?=$md->remark?></td>
                                                    <td>
                                                        <?php if($md->action=='Call'){?>
                                                        <button id="add_plan<?=$md->tid?>" value="<?=$md->tid?>" type="button" class="btn btn-info">Review</button></td>
                                                        <?php } ?>
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                                </table>
                                                <br><hr>
                                                <?php } ?>
                    </div>
            </div>
                  
                  
                  
                  
                  
            </div>
          </div>
      </div>   
     </div>     
    </section>


<div id="doaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-standard-title1"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> <!-- // END .modal-header -->
        <div class="modal-body">
            <div class="card card-form col-md-12">
               <div class="card-header bg-info">Review Task</div>
               <h6 class="text-center mt-1" id="cmpname"></h6>
                <div class="col-lg-12 card-body">
                   <?=form_open('Menu/checkdaytask')?>
                   <input type="hidden" name="uuid"  id="uid" value="<?=$uid?>">
                   <input type="hidden" id="taskid" name="taskid">
                   <div class="from-group">
                        <div class="rating">
                            <input type="radio" name="rat" value="5" id="5"><label for="5">☆</label>
                            <input type="radio" name="rat" value="4" id="4"><label for="4">☆</label>
                            <input type="radio" name="rat" value="3" id="3"><label for="3">☆</label>
                            <input type="radio" name="rat" value="2" id="2"><label for="2">☆</label>
                            <input type="radio" name="rat" value="1" id="1"><label for="1">☆</label>
                        </div>
                        <textarea class="form-control" name="rremark" placeholder="Review Remark..." required=""></textarea>
                    </div>
                   <button type="submit" id="planbtn" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                   </form>
                </div>
                </div>
                    </div>
                </div>
        </div> <!-- // END .modal-body -->
        
</div></div></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('[id^="add_plan"]').on('click', function() {
    $('#doaction').modal('show');
    var tid = this.value;
    document.getElementById("taskid").value = tid;
    
});
</script>

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