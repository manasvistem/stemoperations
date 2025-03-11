
<div class="wrapper">

  <!-- Preloader -->
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    
<form class="p-3" method="POST" action="<?=base_url();?>/Menu/ReviewReport">
    <input type="date" name="sdate" class="mr-2" value="<?=$sd?>">
    <input type="date" name="edate" class="mr-2" value="<?=$ed?>">
    <select name="adid">
        <option value="<?=$uid?>"><?=$user['fullname']?></option>
    </select>
    <select name="piid">
        <option value="0">All</option>
        <?php $pia = $this->Menu_model->get_user_bydep('2');
        foreach($pia as $pi){
        ?>
        <option value="<?=$pi->id?>"><?=$pi->fullname?></option>
        <?php } ?>
    </select>
    <button type="submit" class="bg-primary text-light">Filter</button>
</form>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
     <div class="col-sm col-md-12 col-lg-12 m-auto">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                 <div class="table-responsive">
                            <div class="table-responsive">
                                <div class="pdf-viwer">
                                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <tr>
                                            <th>Detail</th>
                                            <th>S.No.</th>
                                            <th>Start Date</th>
                                            <th>Close Date</th>
                                            <th>Review Time</th>
                                            <th>BD Name</th>
                                            <th>No of School</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach($mdata as $md){
                                            $startt=$md->startt;
                                            $closet=$md->closet;
                                        $nstartt = date('d-m-Y  h:i A', strtotime($startt));
                                        $ncloset = date('d-m-Y  h:i A', strtotime($closet));
                                        
                                        ?>
                                    
                                    <tr>
                                        <td><a href="ReviewDetailM/<?=$md->rid?>">Show Detail</a></td>
                                        <td><?=$i?></td>
                                        <td><?=$nstartt?></td>
                                        <td><?=$ncloset?></td>
                                        <td><?=$tdiff = $this->Menu_model->timediff($startt,$closet);?></td>
                                        <td><?=$md->bdname?></td>
                                        <td><?=$md->totalc?></td>
                                    </tr></a>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table> 
                            </div>
                        </div>
                    </form>   
                  
                  
                  
                  
              </div>
     </div></div>
    </section>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>



</script>

          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

