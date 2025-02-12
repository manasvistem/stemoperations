<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="wi$dth=device-wi$dth, initial-scale=1">
  <title>STEM APP | WebAPP</title>
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
.vertical-text {
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    writing-mode: vertical-lr;
    transform: rotate(180deg);
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
            <h1 class="m-0">Task start but not complete section</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4></h4>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
    <div class="container-fluid">
        <div class="card col-12 p-4 text-center">
                <?php foreach($mdata as $md){$piid=$md->piid;?>
                  <div class="col-12 p-3 text-center card card-primary card-outline">
                      <h4><b><?=$md->fullname?></b> has <b><?=$md->task_count?></b> task plan but not start section</h4>
                  </div>
                  <div class="row">
                      <?php $aai=1; $cdatet = date('Y-m-d H:i:s'); $data = $this->Menu_model->get_TaskSBNC1($piid); foreach($data as $dt){$ltid=$dt->ltid;?>
                      <div class="col-lg-3 col-sm p-3 text-center card card-primary card-outline">
                          School Name<br><b><?=$dt->sname?></b><hr>
                          Current Status<br><b><?=$dt->cstatus?></b><hr> 
                          Last Year Status<br><b><?=$dt->lystatus?></b><hr>
                          <?php if($ltid!=''){ $ltask = $this->Menu_model->get_taskdetailbyid($ltid);?>
                          Last Task By<br><b><?=$ltask[0]->fullname?></b>
                          Last Task Action<br><b><?=$ltask[0]->action?></b>
                          Last Task Remark<br><b><?=$ltask[0]->remark?></b><hr>
                          Last Task Date<br><b><?=$tdt=$ltask[0]->donet?></b><hr>
                          Time Diff<br><b><?=$this->Menu_model->timediff($tdt,$cdatet);?></b>
                          <?php } else {echo "No Data"; } ?>
                          <hr><button class="btn btn-default" id="Reminder<?=$aai?>" value="<?=$dt->tid?>">Reminder</button>
                      </div>
                      <?php $aai++;} ?>
                  </div>
                  <?php } ?>
                  </div>
            </div>
        </div>
    </div>
</section>

  <div id="doaction1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="modal-standard-title1">Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?=form_open('Menu/Reminder')?>
                    <input type="hidden" name="uid" value="<?=$uid?>">
                    <input type="hidden" id="tid" name="tid">
                    <textarea name="remark" placeholder="Remark..." class="form-control"></textarea>
                    <input type="submit" class="mt-2 bg-danger">
                </form>
            </div>
</div></div></div>     

        </div>
      </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$('[id^="Reminder"]').on('click', function() {
    $('#doaction1').modal('show');
    document.getElementById("tid").value = this.value;
    document.getElementById("username").value = document.getElementById("user").value;;
});

</script>
    
    
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
<script src="<?=base_url();?>assets/js/summernote-bs4.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.overlayScrollbars.min.js"></script>
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
<script src="<?=base_url();?>assets/js/adminlte.js"></script>
<script src="<?=base_url();?>assets/js/dashboard.js"></script>
<script>
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>