<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STEM Oppration | WebAPP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/jqvmap.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/daterangepicker.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/summernote-bs4.min.css">
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
  

  <?php require('nav.php');?>

  

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">BW Date Task Tracker</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4>HI! <?php echo $fullname=$user['fullname']; $uid=$user['id'];?> ( <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    <div class="card">
        
        <div>
                  <form class="p-3" method="POST" action="<?=base_url();?>Menu/BWDTASKTracking">
                      <input type="date" name="sdate" class="mr-2" value="<?=$sd?>">
                      <input type="date" name="edate" class="mr-2" value="<?=$ed?>">
                      
                      <select name="piid">
                          <option value="0">All</option>
                          <?php $pia = $this->Menu_model->get_user(); foreach($pia as $pi){?>
                          <option value="<?=$pi->id?>"><?=$pi->fullname?></option>
                          <?php } ?>
                      </select>
                      
                      <select name="action">
                          <option>All</option>
                          <?php $action = $this->Menu_model->get_action(); foreach($action as $ac){?>
                          <option><?=$ac->name?></option>
                          <?php } ?>
                      </select>
                      <button type="submit" class="bg-primary text-light">Filter</button>
              </div>
              
              
              
              <div class="card-body">
                    <div class="col-12">
                            <?php 
                            
                            if(isset($_POST["action"])){
                            $action = $_POST["action"];
                            $piid = $_POST["piid"];
                            
                            $time1 = array('09:00:00', '11:00:00', '13:00:00','15:00:00','17:00:00','19:00:00');
                            $time2 = array('11:00:00', '13:00:00', '15:00:00','17:00:00','19:00:00','21:00:00');?>
                            
                            
                        <?php for($i=0;$i<6;$i++){
                                $dt1=$time1[$i];
                                $dt2=$time2[$i];
                                $tt1 = date("h:i a", strtotime($dt1));
                                $tt2 = date("h:i a", strtotime($dt2)); ?>
                                <div class="card p-3">
                                    <center><h6><b>Task Between (<?=$action?>) <?=$sd?> to <?=$ed?> <?=$tt1?> to <?=$tt2?></b></h6></center><hr>
                                    
                                    <div class="row text-center">
                                        <?php $task = $this->Menu_model->get_BWDAWTask($sd,$ed,$dt1,$dt2,$action,$piid);
                                        foreach($task as $task){ ?>
                                            <div  class="card p-3 col-2 border border-danger">
                                                Project Code<br><b><?=$task->project_code?></b><hr>
                                                School Name<br><b><?=$task->sname?></b><hr>
                                                User Name<br><b><?=$task->uname?></b><hr>
                                                Action Taken<br><b><?=$task->actiontaken?></b><hr>
                                                Purpose Achive<br><b><?=$task->purpose?></b><hr>
                                                Assign Date<br><b><?=$task->task_date?></b><hr>
                                                Plan Date<br><b><?=$task->plandate?></b><hr>
                                                Initiated Date<br><b><?=$task->initiateddt?></b><hr>
                                                Completed Date<br><b><?=$task->donet?></b><hr>
                                                Remark<br><b><?=$task->remark?></b><hr>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    
                                    
                                    
                                    
                                </div>
                                <hr>
                            <?php }} ?>
                            
        </div>
    </div></div>
    </div>
              </div>
            </div>
           </div>
          </div>
      </div>
    </section>
    
    
  <footer class="main-footer">
    <strong>Copyright &copy; 2021-2022 <a href="<?=base_url();?>">Stemlearning</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?=base_url();?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url();?>assets/js/Chart.min.js"></script>
<script src="<?=base_url();?>assets/js/sparkline.js"></script>
<script src="<?=base_url();?>assets/js/jquery.vmap.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>
<script src="<?=base_url();?>assets/js/daterangepicker.js"></script>
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
