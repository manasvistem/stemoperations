
<div class="wrapper">
      <!-- Preloader -->
      <!-- Navbar -->
     
      <!-- /.navbar -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
   
        <!-- /.content-header -->
        <section class="content">
          <div class="container-fluid">
            <div class="row p-3">
              <div class="col-sm col-md-12 col-lg-12 m-auto">
                <?php if ($this->session->flashdata('success_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> <?php echo $this->session->flashdata('success_message'); ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error_message')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong> <?php echo $this->session->flashdata('error_message'); ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif; ?>
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="bg-warning colapsboxsha text-center mt-2 mb-2">
                      <h3 class="text-white">Yesterday Day Close Request</h3>
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
                              <thead class="bg-primary text-white">
                                <tr>
                                  <th scope="col" class="text-white">#</th>
                                  <th scope="col" class="text-white">Name</th>
                                  <th scope="col" class="text-white">Date</th>
                                  <th scope="col" class="text-white">Request Reason</th>
                                  <th scope="col" class="text-white">Approved By</th>
                                  <th scope="col" class="text-white">Approved Remarks</th>
                                  <th scope="col" class="text-white">Approved Date</th>
                                  <th scope="col" class="text-white">Approvel Status</th>
                                  <th scope="col" class="text-white">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $j =1;
                                foreach($getreqData as $data){ ?>
                                <tr>
                                  <th><?= $j ?></th>
                                  <td><?= $this->Menu_model->get_userbyid($data->user_id)[0]->fullname ?></td>
                                  <td><?= $data->created_at ?></td>
                                  <td><?= $data->why_did_you ?></td>
                                  <td><?= $this->Menu_model->get_userbyid($data->approved_by)[0]->fullname ?></th>
                                  <td><?= $data->approved_remarks ?></td>
                                  <td><?= $data->approved_date ?></td>
                                  <td>
                                    <?php
                                    if($data->approved_status == ''){ ?>
                                    <span class="p-1 bg-warning text-white mr-2">Pending</span>
                                    <?php }else if($data->approved_status == 'Approved'){ ?>
                                    <span class="p-1 bg-success text-white mr-2">Approved</span>
                                    <?php }else{ ?>
                                    <span class="p-1 bg-danger text-white mr-2">Reject</span>
                                    <?php }?>
                                  </td>
                                 
                                  <td>
                                    
                                    <?php
                                    if($data->approved_status == ''){ ?>
                                    
                                    <div>
                                      <p><a href="<?=base_url();?>Menu/YesterdayCloseRequestApprove/<?= $data->id?>/Approved" class="btn btn-success mr-2" onclick="return confirm('Are you sure you want to Approved id?');" >Approve</a></p>
                                      <p><button type="button" class="btn btn-primary"  onclick="Reject(<?= $j ?>,<?= $data->id?>,'Reject')">Reject</button></p>
                                    </div>
                                    
                                    <?php }else if($data->approved_status == 'Approved'){ ?>
                                    <span class="p-1 bg-success text-white mr-2">Approved</span>
                                    <?php }else{ ?>
                                    <span class="p-1 bg-danger text-white mr-2">Reject</span>
                                    <?php }?>
                                    
                                  </td>
                                </tr>
                                <?php $j++; } ?>
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
                            <form action="<?=base_url();?>Menu/YesterdayCloseRequestReject" method="post" >
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
        
        <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
      <!-- </section> -->
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type='text/javascript'>
        function RejectButton(mid,id,val){
        $('#exampleModalCenter'+mid).modal('show');
        $('#exampleModalCenter'+mid+' #rejectid').val(id);
        }
        
        function Reject(mid,id,val){
        // alert(mid);
        // alert('#exampleModalCenterdata'+mid);
        $('#exampleModalCenterdata').modal('show');
        $('#rejectid').val(id);
        // $('#exampleModalCenterdata'+mid).modal('show');
        // $('#exampleModalCenterdata'+mid+' #rejectid').val(id);
        }
        </script>
   