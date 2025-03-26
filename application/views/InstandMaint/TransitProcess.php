<div class="wrapper">

  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->
<!-- Main content -->

    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Transit Process</h3><hr>
                   <?php $deliveryv = $this->Menu_model->get_delv($uid); foreach($deliveryv as $dv){?>
                        <div class="border border-2 card col-lg-12 col-sm p-3 text-center">
                            <b><?=$pcode=$dv->projectcode?></b><hr>
                            <?php $plog = $this->Menu_model->get_spdlogic($pcode); ?>
                            <b><?=$plog[0]->cp_name?></b><hr>
                            <b><?=$plog[0]->cp_mno?></b><hr>
                            <b><?=$plog[0]->loginfo?></b><hr>
                            <b><?=$plog[0]->recipinfo?></b><hr>
                            <?php $dewaybill = $this->Menu_model->get_dewaybill($pcode);?>
                            <a href="https://stemfactory.in/<?=$dewaybill[0]->ewaybill?>">e-Way Bill Part 1</a><hr>
                            <a href="https://stemfactory.in/<?=$dewaybill[0]->ewaybill2?>">e-Way Bill Part 2</a><hr>
                            
                            <img class="card" src="https://stemfactory.in/<?=$dv->receipt?>">
                            <img class="card" src="https://stemfactory.in/<?=$dv->photo1?>">
                            <img class="card" src="https://stemfactory.in/<?=$dv->photo2?>">
                            <img class="card" src="https://stemfactory.in/<?=$dv->photo3?>">
                            <img class="card" src="https://stemfactory.in/<?=$dv->photo4?>">
                            <img class="card" src="https://stemfactory.in/<?=$dv->photo5?>">
                        </div>
                    <?php } ?>
                  
                </div>   
            </div>      
          </div>   
        </div>     
    </section>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

</script>

          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
                   </div></div>