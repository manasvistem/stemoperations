
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  

  <!-- Navbar -->
  <?php // require('nav.php');?>
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
    
<form class="p-3" method="POST" action="<?=base_url();?>/Menu/MyNextDayPlan">
    <input type="date" name="sdate" class="mr-2" value="<?=$sd?>">
    <button type="submit" class="bg-primary text-light">Filter</button>
</form>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
          <div class="col-sm col-md-6 col-lg-6 m-auto" id="contact">
              <div class="card card-primary card-outline">
                  <div class="card-header"><b><?=$user['fullname']?> Day Plan (<?=$sd?>)</b></div>
                  <div class="card-body box-profile">
                      
                      <?php $mts = $this->Menu_model->get_mytaskstatus($sd,$ed,$uid);
                      foreach($mts as $mts){?>
                      <button type="button" class="btn btn-info mt-2">
                           <?=$mts->name?> <span class="badge badge-light"><?=$mts->cont?></span></span>
                        </button>
                      <?php } ?>
                      
                      <hr>
                      
                      <?php $time='00:00:00'; $mtt = $this->Menu_model->get_mytasktime($sd,$ed,$uid);
                      foreach($mtt as $mtt){
                          
                      ?>
                        <button type="button" class="btn btn-primary mt-2">
                           <?=$mtt->action?> <span class="badge badge-light"><?=$mtt->cont?></span> <span class="badge badge-light"><?=$ttime=$mtt->ttime?></span>
                        </button>
                        
                        <?php
                        $time1 = new DateTime($ttime);
                        $time2 = new DateTime($time);
                        $interval = new DateInterval('PT' . $time2->format('H') . 'H' . $time2->format('i') . 'M' . $time2->format('s') . 'S');
                        $time1->add($interval);
                        $time = $time1->format('H:i:s');
                        } ?>
                        
                        <hr>
                        <button type="button" class="btn btn-success mt-2">
                           Total Time <span class="badge badge-light"><?=$time?></span>
                        </button>
                          </div>
                      </div>
                      
                  </div>  
              </div>
     </div></div>
    </section>
    
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

</script>

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
