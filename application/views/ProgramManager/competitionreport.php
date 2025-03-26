<div class="wrapper">

  <!-- Preloader -->
  

  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    

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
                                            <th>S.No.</th>
                                            <th>Project Code</th>
                                            <th>School Name</th>
                                            <th>District</th>
                                            <th>State</th>
                                            <th>PIA</th>
                                            <th>Teacher Name</th>
                                            <th>Teacher Contact</th>
                                            <th>Science & Math Model Making</th>
                                            <th>TECH Quiz</th>
                                            <th>Tinkering</th>
                                            <th>Science & Math Model Making Student Details</th>
                                            <th>TECH Quiz Student Details</th>
                                            <th>Tinkering Student Details</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach($mdata as $md){
                                        ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$md->project_code?></td>
                                        <td><?=$md->sname?></td>
                                        <td><?=$md->sdistrict?></td>
                                        <td><?=$md->sstate?></td>
                                        <td><?php 
                                            $u=$this->Menu_model->get_user_byid($md->pi_id);
                                            echo $u[0]->fullname;
                                        ?></td>
                                        <td><?=$md->name?></td>
                                        <td><?=$md->contact?></td>
                                        <td><?=($md->model == 'YES')?'YES':'NO'?></td>
                                        <td><?=($md->quiz == 'YES')?'YES':'NO'?></td>
                                        <td><?=($md->tinker == 'YES')?'YES':'NO'?></td>
                                        <td>
                                        <?php if($md->model == 'YES'){
                                            ?>
                                            <div>
                                            <strong>Student 1 </strong></br>
                                            <strong>Name:</strong><?=$md->msname1?></br>
                                            <strong>Standard:</strong><?=$md->msstd1?></br>
                                            <strong>Parent Name:</strong><?=$md->mpname1?></br>
                                            <strong>Parent Contact:</strong><?=$md->mpcontact1?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 2 </strong></br>
                                            <strong>Name:</strong><?=$md->msname2?></br>
                                            <strong>Standard:</strong><?=$md->msstd2?></br>
                                            <strong>Parent Name:</strong><?=$md->mpname2?></br>
                                            <strong>Parent Contact:</strong><?=$md->mpcontact2?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 3 </strong></br>
                                            <strong>Name:</strong><?=$md->msname3?></br>
                                            <strong>Standard:</strong><?=$md->msstd3?></br>
                                            <strong>Parent Name:</strong><?=$md->mpname3?></br>
                                            <strong>Parent Contact:</strong><?=$md->mpcontact3?></br>
                                            </div>
                                            <?php
                                        } else {
                                            echo 'NA';
                                        }
                                        ?>
                                        </td>
                                        <td>
                                        <?php if($md->quiz == 'YES'){
                                            ?>
                                            <div>
                                            <strong>Student 1 </strong></br>
                                            <strong>Name:</strong><?=$md->tsname1?></br>
                                            <strong>Standard:</strong><?=$md->tsstd1?></br>
                                            <strong>Parent Name:</strong><?=$md->tpname1?></br>
                                            <strong>Parent Contact:</strong><?=$md->tpcontact1?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 2 </strong></br>
                                            <strong>Name:</strong><?=$md->tsname2?></br>
                                            <strong>Standard:</strong><?=$md->tsstd2?></br>
                                            <strong>Parent Name:</strong><?=$md->tpname2?></br>
                                            <strong>Parent Contact:</strong><?=$md->tpcontact2?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 3 </strong></br>
                                            <strong>Name:</strong><?=$md->tsname3?></br>
                                            <strong>Standard:</strong><?=$md->tsstd3?></br>
                                            <strong>Parent Name:</strong><?=$md->tpname3?></br>
                                            <strong>Parent Contact:</strong><?=$md->tpcontact3?></br>
                                            </div>
                                            <?php
                                        } else {
                                            echo 'NA';
                                        }
                                        ?>
                                        </td>
                                        <td>
                                        <?php if($md->tinker == 'YES'){
                                            ?>
                                            <div>
                                            <strong>Student 1 </strong></br>
                                            <strong>Name:</strong><?=$md->tisname1?></br>
                                            <strong>Standard:</strong><?=$md->tisstd1?></br>
                                            <strong>Parent Name:</strong><?=$md->tipname1?></br>
                                            <strong>Parent Contact:</strong><?=$md->tipcontact1?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 2 </strong></br>
                                            <strong>Name:</strong><?=$md->tisname2?></br>
                                            <strong>Standard:</strong><?=$md->tisstd2?></br>
                                            <strong>Parent Name:</strong><?=$md->tipname2?></br>
                                            <strong>Parent Contact:</strong><?=$md->tipcontact2?></br><br>
                                            </div>
                                            <div>
                                            <strong>Student 3 </strong></br>
                                            <strong>Name:</strong><?=$md->tisname3?></br>
                                            <strong>Standard:</strong><?=$md->tisstd3?></br>
                                            <strong>Parent Name:</strong><?=$md->tipname3?></br>
                                            <strong>Parent Contact:</strong><?=$md->tipcontact3?></br>
                                            </div>
                                            <?php
                                        } else {
                                            echo 'NA';
                                        }
                                        ?>
                                        </td>
                                    </tr>
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
                                      </div></div>
