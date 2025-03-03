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
                  <div class="card-header bg-primary"><h3>Add Temp Person for MSC Cleaning Process</h3></div>
              <div class="card-body box-profile">
                  <form action="<?=base_url();?>Menu/addtp" method="post">
                      <input type="hidden" value="<?=$uid?>" name="userid" id="userid">
                      <div class="form-group">
                        <?php $spd = $this->Menu_model->get_spdbypiid($uid); $tspd=sizeof($spd);?>
                        <label>You Have Total <?=$tspd?> School</label><br>
                        <?php 
                        $msccc = $this->Menu_model->get_mscccbypiid($uid);
                        
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
                            foreach($cname as $cname){?>
                             <option><?=$cname->clustername?></option>
                            <?php } ?>
                        </select>
                    </div>
                      
                      
                    <input type="hidden" value="<?=$uid?>" name="piaid">
                  <div class="form-group">
                    <label>Temp Persion Name</label>
                    <input type="text" class="form-control" name="person_name">
                  </div>
                  <div class="form-group">
                    <label>Mobile No</label>
                    <input type="text" class="form-control" name="phone_number">
                  </div>
                  <div class="form-group">
                    <label>Email ID</label>
                    <input type="text" class="form-control" name="email_address">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address">
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city">
                  </div>
                  <div class="form-group">
                    <label>District</label>
                    <input type="text" class="form-control" name="district">
                  </div>
                  <div class="form-group">
                    <label>State</label>
                    <input type="text" class="form-control" name="state">
                  </div>
                  <div class="form-group">
                    <label>Qulification</label>
                    <input type="text" class="form-control" name="qualification">
                  </div>
                  <div class="form-group">
                    <label>Remark</label>
                    <textarea class="form-control" name="remark" placeholder="Remark..."></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
             </form>
          </div></div>
          
      </div>   
     </div>     
    </section>
    
    <table class="table">
              <tr>
                <th>Person Name</th>
                <th>Mobile No</th>
                <th>Email ID</th>
                <th>Address</th>
                <th>City</th>
                <th>District</th>
                <th>State</th>
                <th>Qualification</th>
                <th>Remark</th>
                <th>Cluster</th>
                
              </tr>
              <?php
             // $mdata = $this->Menu_model->get_tpdetail($uid);
              foreach($mdata as $md){?>
                <tr>
                    <td><?=$md->person_names?></td>
                    <td><?=$md->phone_numbers?></td>
                    <td><?=$md->email_addresses?></td>
                    <td><?=$md->addresses?></td>
                    <td><?=$md->cities?></td>
                    <td><?=$md->districts?></td>
                    <td><?=$md->states?></td>
                    <td><?=$md->qualifications?></td>
                    <td><?=$md->remarks?></td>
                    <td><?=$md->cluster?></td>
                    
                </tr>
            <?php } ?>
            </table>
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>


</script>

          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<!-- ./wrapper -->
