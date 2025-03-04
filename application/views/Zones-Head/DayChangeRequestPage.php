      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <h4></h4>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
          <div class="container-fluid">
          <?php
          if ($this->session->flashdata('error_message')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong> <?php echo $this->session->flashdata('error_message'); ?></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>
        <?php
          if ($this->session->flashdata('success_message')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong> <?php echo $this->session->flashdata('success_message'); ?></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>
            <div class="row p-3">
              <div class="col-sm col-md-12 col-lg-12 m-auto">
                <?php if ($this->session->flashdata('action_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> <?php echo $this->session->flashdata('action_message'); ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif; ?>
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="bg-warning colapsboxsha text-center mt-2 mb-2">
                      <h3><i>Todays Team Day Change Approval Request</i></h3>
                    </div>
                    <?php
                      $utype = $this->Menu_model->get_userbyid($userid);
                      ?>
                    <div class="btn btn-primary colapsboxsha col-md-12 col-lg-12 mt-2 d-flex justify-content-between align-items-center" data-toggle="collapse" href="#collapseExample<?=$k?>" role="button" aria-expanded="false" aria-controls="collapseExample<?=$k?>">
                      Request :
                    </div>
                    <div class="collapse show mt-3" id="collapseExample<?=$k?>">
                      <div class="card card-body" style="background: azure;"  >
                        <div class="ApprovedStatus">
                          <!--<h4 class="ApprovedStatus Pending">Changes For Academic year 2024-24</h4> -->
                          <div class="table-responsive">
                            <table id="exampledata" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead class="thead-dark">
                                <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Date</th>
                                  <th>Want To Start</th>
                                  <th>Message</th>
                                  <th>Approved By</th>
                                  <th>Approval Status</th>
                                  <th>Admin Message</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $i=1;
                                  foreach ($daychangedata as $row): ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php 
                                    $udetail = $this->Menu_model->get_userbyid($row->user_id);
                                    $username = $udetail[0]->name;
                                    echo $username;
                                    ?></td>
                                  <td><?php echo $row->date; ?></td>
                                  <td><?php 
                                    echo $this->Menu_model->userworkfrombyid($row->user_want_start)[0]->TYPE;
                                    ?></td>
                                  <td><?php echo $row->message; ?></td>
                                  <td><?php 
                                    if($row->apr_by == 0){
                                      echo "<span class='p-1 bg-warning'>Pending</span>";
                                    }else{
                                      $udetail = $this->Menu_model->get_userbyid($row->apr_by);
                                      $admidname = $udetail[0]->name;
                                      echo $admidname;
                                    }
                                    ?></td>
                                  <td><?php 
                                    if($row->apr_status == 0){
                                     echo "<span class='p-1 bg-warning'>Pending</span>";
                                    }elseif($row->apr_status == 1){
                                     echo "<span class='p-1 bg-success'>Approved</span>";
                                    }elseif($row->apr_status == 2){
                                     echo "<span class='p-1 bg-danger'>Reject</span>";
                                    }
                                    ?></td>
                                  <td><?php 
                                    if($row->amessage == ''){
                                      echo "<span class='p-1 bg-warning'>Pending</span>";
                                    }else{
                                      echo $row->amessage; 
                                    }
                                    ?></td>
                                  <td>
                                    <?php
                                      if($row->apr_status == '0'){ ?>
                                    <div>
                                      <p><a href="<?=base_url();?>Menu/TodayDayStartapprove/<?= $row->id?>/Approve" class="btn btn-success mr-2" onclick="return confirm('Are you sure you want to Approved id?');" >Approve</a></p>
                                      <p><button type="button" class="btn btn-primary"  onclick="Reject(<?= $i ?>,<?= $row->id?>,'Reject')">Reject</button></p>
                                    </div>
                                    <?php }else if($row->apr_status == 1){ ?>
                                    <span class="p-1 bg-success mr-2">Approved</span>
                                    <?php }elseif($row->apr_status == 2){ ?>
                                    <span class="p-1 bg-danger mr-2">Reject</span>
                                    <?php }?>
                                  </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <br>
                      </div>
                    </div>
                    <div class="modal fade" id="exampleModalCenterdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Reject Remark</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="<?=base_url();?>Menu/TodaysDayChageReject" method="post" >
                              <input type="hidden" id="rejectid" value="" name="reject">
                              <div class="mb-3 mt-3">
                                <textarea id="rejectreamrk" name="rejectreamrk" cols="30" placeholder="Add Remark " class="form-control"  rows="4"></textarea>
                              </div>
                              <div class="form-group text-center">
                                <button type="submit" class="btn btn-success mt-2">Submit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type='text/javascript'>
          function RejectButton(mid,id,val){
          $('#exampleModalCenter'+mid).modal('show');
          $('#exampleModalCenter'+mid+' #rejectid').val(id);
          }
          
          function Reject(mid,id,val){
          $('#exampleModalCenterdata').modal('show');
          $('#rejectid').val(id);
          }
        </script>
        <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
      <!-- </section> -->
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    