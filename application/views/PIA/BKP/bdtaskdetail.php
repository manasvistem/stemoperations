<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STEM Oppration | WebAPP</title>
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
    <!-- DataTables -->
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
                <h1 class="m-0">BD Request</h1>
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
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <?php $date = date('Y-m-d H:i:s');?>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                  <div class="row mb-2">
              <?php  
              $request_type = $reqData[0]->request_type;
              $color_code = $reqData[0]->color_code;
              ?>
              <div class="col-sm-12 p-2 text-center" style="background-color:<?=$color_code;?>">
                <h3 class="m-0"><?=$request_type?></h3>
                <hr>
                <?php 
                if($code == 1){
                  echo "<h5>All</h5>";
                }else if($code == 2){
                  echo "<h5>Pending</h5>";
                }else if($code == 3){
                  echo "<h5>Open</h5>";
                }else if($code == 4){
                  echo "<h5>Close</h5>";
                }
                ?>
              </div>
            </div>
                    <div class="body-content">
                      <div class="page-header">
                        <div class="form-group">
                          <fieldset>
                            <form method='POST'>
                              <input type="hidden" value="<?=$uid?>" name="userid" id="userid">
                                <div class="table-responsive">
                                  <?php if($rtype=="Demo"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                      <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Complete Task</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td><?php if($d->startt!=''){echo 'You Have Planed';}else{?>
                                          <button type="button" id="plan_task<?=$i?>" value="<?=$d->rid?>">Click</button><?php }?>
                                        </td>
                                        </td>
                                        <td>
                                          <?php if($d->taskc=='1'){echo 'You Have Closed';}else{?>
                                          <button type="button" id="complete_task<?=$i?>" value="<?=$d->id?>">Click</button>
                                          <?php }?>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="Inauguration"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                      <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>Time Left</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>PM Remark</th>
                                        <th>Company Name</th>
                                        <th>Plan</th>
                                        <th>Final Complete Task</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $exdate = $d->exdate;?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$exdate?></td>
                                        <td><?=$this->Menu_model->timediff($date,$exdate);?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->pmremark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?php if($d->startt!=''){echo 'You Have Planed';}else{?>
                                          <button type="button" id="plan_inog<?=$i?>" value="<?=$d->rid?>">Click</button><?php }?>
                                        </td>
                                        <td>
                                          <?php if($d->taskc=='1'){echo 'You Have Closed';}else{?>
                                          <button type="button" id="complete_task<?=$i?>" value="<?=$d->id?>">Click</button>
                                          <?php }?>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="OnBoardClientVisit"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                      <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>Time Left</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>PM Remark</th>
                                        <th>Company Name</th>
                                        <th>Plan</th>
                                        <th>Final Complete Task</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $exdate = $d->exdate;?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$exdate?></td>
                                        <td><?=$this->Menu_model->timediff($date,$exdate);?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->pmremark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?php if($d->startt!=''){echo 'You Have Planed';}else{?>
                                          <button type="button" id="plan_inog<?=$i?>" value="<?=$d->rid?>">Click</button><?php }?>
                                        </td>
                                        <td>
                                          <?php if($d->taskc=='1'){echo 'You Have Closed';}else{?>
                                          <button type="button" id="complete_task<?=$i?>" value="<?=$d->id?>">Click</button>
                                          <?php }?>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="NCSV"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                      <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Complete Task</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td><?php if($d->startt!=''){echo 'You Have Planed';}else{?>
                                          <button type="button" id="plan_task<?=$i?>" value="<?=$d->rid?>">Click</button><?php }?>
                                        </td>
                                        </td>
                                        <td>
                                          <?php if($d->taskc=='1'){echo 'You Have Closed';}else{?>
                                          <button type="button" id="complete_task<?=$i?>" value="<?=$d->id?>">Click</button>
                                          <?php }?>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="OnBoardVisit"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                      <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Complete Task</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <td>
                                          <?php if($d->taskc=='1'){echo 'You Have Closed';}else{?>
                                          <button type="button" id="complete_task<?=$i?>" value="<?=$d->id?>">Click</button>
                                          <?php }?>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="Report"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                      <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Complete Task</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <td>
                                          <?php if($d->taskc=='1'){echo 'You Have Closed';}else{?>
                                          <button type="button" id="complete_task<?=$i?>" value="<?=$d->id?>">Click</button>
                                          <?php }?>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="SSCHOOLID"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                      <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>Time Left</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>PM Remark</th>
                                        <th>Company Name</th>
                                        <th>Plan</th>
                                        <th>Final Complete Task</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){
                                        $exdate = $d->exdate;?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$exdate?></td>
                                        <td><?=$this->Menu_model->timediff($date,$exdate);?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->pmremark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?php if($d->startt!=''){echo 'You Have Planed';}else{?>
                                          <button type="button" id="plan_task<?=$i?>" value="<?=$d->rid?>">Click</button><?php }?>
                                        </td>
                                        <td>
                                          <?php if($d->taskc=='1'){echo 'You Have Closed';}else{?>
                                          <button type="button" id="complete_task<?=$i?>" value="<?=$d->id?>">Click</button>
                                          <?php }?>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                  <?php if($rtype=="SMaintenance"){?>
                                  <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                      <thead class="thead-dark">
                                      <tr>
                                        <th>S No.</th>
                                        <th>Request Date</th>
                                        <th>Target Date</th>
                                        <th>BD Name</th>
                                        <th>Request Type</th>
                                        <th>Remark</th>
                                        <th>Company Name</th>
                                        <th>CP Name</th>
                                        <th>CP Mobile No</th>
                                        <th>Visit Date</th>
                                        <th>Visite Location</th>
                                        <th>Expectation</th>
                                        <th>Status</th>
                                        <th>Complete Task</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($bdr as $d){if($d->rysn==$rtype){?>
                                      <tr>
                                        <td><?=$i?></td>
                                        <td><?=$d->sdatet?></td>
                                        <td><?=$d->targetd?></td>
                                        <td><?=$d->bd_name?></td>
                                        <td><?=$d->request_type?></td>
                                        <td><?=$d->remark?></td>
                                        <td><?=$d->cname?></td>
                                        <td><?=$d->cpname?></td>
                                        <td><?=$d->cpmo?></td>
                                        <td><?=$d->visitdate?></td>
                                        <td><?=$d->vlocation?></td>
                                        <td><?=$d->expectation?></td>
                                        <td>
                                          <?php if($d->status=='Open'){?>
                                          <button formaction="<?=base_url();?>Menu/aclientp/<?=$d->id?>" class="form-control" type="submit">Assign</button>
                                          <?php }else{echo $d->status; }?>
                                        </td>
                                        <td>
                                          <?php if($d->taskc=='1'){echo 'You Have Closed';}else{?>
                                          <button type="button" id="complete_task<?=$i?>" value="<?=$d->id?>">Click</button>
                                          <?php }?>
                                        </td>
                                      </tr>
                                      <?php $i++;}} ?>
                                    </tbody>
                                  </table>
                                  <?php } ?>
                                </div>
                              </div>
                            </form>
                            <!--END OF FORM ^^-->
                          </fieldset>
                        </div>
                        <hr />
                    </div>
                  </div>
                </div>
                <div id="completetask" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modal-standard-title1"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <!-- // END .modal-header -->
                      <div class="modal-body">
                        <div class="card card-form col-md-12">
                          <div class="card-header bg-info">Complete Task</div>
                          <div class="col-lg-12 card-body">
                            <form action="<?=base_url();?>Menu/bdrclosrbypia" method="post" enctype="multipart/form-data">
                              <div class="was-validated">
                                <input type="hidden" id="tid" name="tid"  required="">
                                <input type="hidden" name="uid" value="<?=$user['id']?>"  required="">
                                <textarea type="text" class="form-control" name="cremark" placeholder="Task Closeing Remark"  required=""></textarea>
                                <div class="invalid-feedback">Please Write Task Closeing Remark</div>
                                <div class="valid-feedback">Looks good!</div>
                                <input type="file" class="form-control file-input" name="filname[]" multiple>
                                <section class="progress-area"></section>
                                <section class="uploaded-area"></section>
                              </div>
                              <button class="btn btn-primary" type="submit">Submit</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- // END .modal-body -->
              </div>
            </div>
          </div>
          <div id="plantask" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modal-standard-title1"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <!-- // END .modal-header -->
                <div class="modal-body">
                  <div class="card card-form col-md-12">
                    <div class="card-header bg-info">Plan Task</div>
                    <div class="col-lg-12 card-body">
                      <?=form_open('Menu/plansitask')?>
                      <input type="hidden" id="rid" name="rid">
                      <input type="hidden" name="uuid" value="<?=$user['id']?>">
                      <lable>No of School</lable>
                      <input type="number" name="noofschool" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- // END .modal-body -->
      </div>
    </div>
    </div>
    <div id="planinog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
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
    <div class="card-header bg-info">Plan Inauguration</div>
    <div class="col-lg-12 card-body">
    <?=form_open('Menu/plansinog')?>
    <input type="hidden" id="rid" name="rid">
    <input type="hidden" name="ingouid" value="<?=$user['id']?>">
    <lable>Select Project Code</lable>
    <div class="form-group">
    <label>Select Client</label>
    <select class="custom-select rounded-0" name="pcode" id="pcode" >
    <option value="">Select Client</option>
    <?php $client = $this->Menu_model->get_pcbypiid($uid);?>
    <?php foreach($client as $c){?>
    <option value="<?=$c->project_code?>"><?=$c->project_code?></option>
    <?php } ?>
    </select>
    </div>
    <div id="cllist">
    <div class="form-group">
    <select class="custom-select rounded-0" name="spdid" id="spd_id" multiple>
    </select>
    </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3" onclick="this.form.submit(); this.disabled = true;">Submit</button>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div> <!-- // END .modal-body -->
    </div></div></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
      $('#pcode').on('change', function b() {
      var pcode = document.getElementById("pcode").value;
      var userid = document.getElementById("userid").value;
          $.ajax({
          url:'<?=base_url();?>Menu/getspdbyuserpcs',
          type: "POST",
          data: {
          pcode: pcode,
          userid: userid
          },
          cache: false,
          success: function a(result){
          $("#spd_id").html(result);
          }
          });
      });
      
      $('[id^="complete_task"]').on('click', function() {
         var tid = this.value;
          $('#completetask').modal('show');
          document.getElementById("tid").value = tid;
      });
      
      $('[id^="plan_task"]').on('click', function() {
          var rid = this.value;
          $('#plantask').modal('show');
          document.getElementById("rid").value = rid;
      });
      
      
      $('[id^="plan_inog"]').on('click', function() {
          var rid = this.value;
          $('#planinog').modal('show');
          document.getElementById("rid").value = rid;
      });
      
      
      
      
      $('#region').on('change', function b() {
      var dep = document.getElementById("dep").value;
      var region = document.getElementById("region").value;
         
      $.ajax({
      url:'<?=base_url();?>Menu/getuserbydr',
      type: "POST",
      data: {
      dep: dep,
      region: region
      },
      cache: false,
      success: function a(result){
      $("#to_user").html(result);
      }
      });
      });
      
      
      $('#task_type').on('change', function c() {
      var tt = document.getElementById("task_type").value;
      $.ajax({
      url:'<?=base_url();?>Menu/getpitst',
      type: "POST",
      data: {
      tt: tt
      },
      cache: false,
      success: function a(result){
      $("#task_subtype").html(result);
      }
      });
      });
      
      $('#pcode').on('change', function b() {
      var pcode = document.getElementById("pcode").value;
      $.ajax({
      url:'<?=base_url();?>Menu/getspdbypcode',
      type: "POST",
      data: {
      pcode: pcode
      },
      cache: false,
      success: function a(result){
      $("#spd_id").html(result);
      }
      });
      });
    </script> 
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
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
        "buttons": ["csv", "excel", "pdf"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    </script>
  </body>
</html>