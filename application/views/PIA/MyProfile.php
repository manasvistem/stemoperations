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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<?php include 'addlog.php';?>
  

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
              <h4><?php $uid=$user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); $did[0]->dep_name;?></h4>
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
          <div class="col-sm col-md-4 col-lg-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?=base_url();?><?=$mydetail[0]->photo?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?=$mydetail[0]->fullname?></h4>
                      <p class="text-secondary mb-1"><?=$mydetail[0]->dep_name?></p>
                      <p class="text-muted font-size-sm"><?=$mydetail[0]->email?></p>
                      <p class="text-muted font-size-sm"><?=$mydetail[0]->phoneno?></p>
                        <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-primary" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary" style="background-color: #25d366;" href="#!" role="button"><i class="fab fa-whatsapp"></i></a>
                        
                        <hr>
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">This Year Task</i></h6>
                        <?php foreach($mytd1 as $td1){?>
                        <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><?=$td1->cont?> <?=$td1->action?></a>
                        <?php } ?>
                        
                        <hr>
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">This Year Sub Task</i></h6>
                        <?php foreach($mytd2 as $td2){?>
                        <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><?=$td2->cont?> <?=$td2->tt?> (<?=$td2->stt?>)</a>
                        <?php } ?>
                    </div>
                  </div>
              </div>
              
              
              
                
            </div>
          </div>
          
          <div class="col-sm col-md-8 col-lg-8">
           <div class="row">   
              <div class="col-sm col-md-12 col-lg-12">
                  <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                         <p><b>Working State : <?=$mydetail[0]->state?><hr>
                         Working District : <?=$mydetail[0]->district?></b></p>
                     </div>
                 </div>
              </div>
             <div class="col-sm col-md-12 col-lg-6">
                 <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                         <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Total School</i><?=$mydetail[0]->spd?></h6>
                          <small>New School (<?=$mydetail[0]->news?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->news?>%" aria-valuenow="<?=$mydetail[0]->news?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>TTP Done (<?=$mydetail[0]->ttps?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->ttps?>%" aria-valuenow="<?=$mydetail[0]->ttps?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Utilization Initiated (<?=$mydetail[0]->uis?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->uis?>%" aria-valuenow="<?=$mydetail[0]->uis?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Average School (<?=$mydetail[0]->avs?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->avs?>%" aria-valuenow="<?=$mydetail[0]->avs?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Good School (<?=$mydetail[0]->gos?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->gos?>%" aria-valuenow="<?=$mydetail[0]->gos?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Model School (<?=$mydetail[0]->mos?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->mos?>%" aria-valuenow="<?=$mydetail[0]->mos?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Inactive (<?=$mydetail[0]->ins?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->ins?>%" aria-valuenow="<?=$mydetail[0]->ins?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Client Readiness (<?=$mydetail[0]->crs?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->crs?>%" aria-valuenow="<?=$mydetail[0]->crs?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                     </div>
                 </div>
             </div> 
             <div class="col-sm col-md-12 col-lg-6">
                 <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                         <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Total Project</i><?=$mydetail[0]->pcode?></h6>
                         <small>Program Initiation (<?=$mydetail[0]->news?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->news?>%" aria-valuenow="<?=$mydetail[0]->news?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Active Program (<?=$mydetail[0]->ttps?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->ttps?>%" aria-valuenow="<?=$mydetail[0]->ttps?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Average Program (<?=$mydetail[0]->uis?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->uis?>%" aria-valuenow="<?=$mydetail[0]->uis?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Good Program (<?=$mydetail[0]->avs?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->avs?>%" aria-valuenow="<?=$mydetail[0]->avs?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Model Program (<?=$mydetail[0]->gos?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->gos?>%" aria-valuenow="<?=$mydetail[0]->gos?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Inactive Program (<?=$mydetail[0]->mos?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->mos?>%" aria-valuenow="<?=$mydetail[0]->mos?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                          <small>Client Readiness (<?=$mydetail[0]->ins?>) </small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$mydetail[0]->ins?>%" aria-valuenow="<?=$mydetail[0]->ins?>" aria-valuemin="0" aria-valuemax="<?=$mydetail[0]->spd?>"></div>
                          </div>
                     </div>
                 </div>
             </div>
            </div> 
            
       </div>
              <!-- /.card-header -->
              
  </div>
  
                                <div class="table-responsive card p-5">
                                <h4><center>Academic Calendar</center></h4><hr>
                                    <table id="example5" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <tr>
                                            <th>SN</th>
                                            <th>Store Date</th>
                                            <th>PIA Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>State</th>
                                            <th>Type</th>
                                            <th>Remark</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach($myac as $ac){?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td><?=$ac->sdatet?></td>
                                        <td><?=$ac->fullname?></td>
                                        <td><?=$ac->fdate?></td>
                                        <td><?=$ac->todate?></td>
                                        <td><?=$ac->state?></td>
                                        <td><?=$ac->type?></td>
                                        <td><?=$ac->remark?></td>
                                    </tr></a>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table> 
                            </div>
  
  
  
  
  
  
  
                            <div class="table-responsive card p-5">
                                <h4><center>Program Review</center></h4><hr>
                                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <tr>
                                            <th>S.No.</th>
                                            <th>Date</th>
                                            <th>BD Name</th>
                                            <th>Admin Name</th>
                                            <th>School Name</th>
                                            <th>Remark</th>
                                            <th>Is program/project come in mandatory category?</th>
                                            <th>Is case study generated for this project code?</th>
                                            <th>What sort of reports are requested by BD for this project code?</th>
                                            <th>Is there any up sell opportunity?</th>
                                            <th>Is schools are located in Aspirational District?</th>
                                            <th>Is WhatsApp Group created for program?</th>
                                            <th>Is Admin number added in WhatsApp group?</th>
                                            
                                             

                                            
                                            
                                            
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach($myprd as $md){
                                            $sdatet=$md->sdatet;
                                            $sdatet = date('d-m-Y  h:i A', strtotime($sdatet));
                                        ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$sdatet?></td>
                                        <td><?=$md->bdname?></td>
                                        <td><?=$md->pstname?></td>
                                        <td><?=$md->sname?><?=$md->projectcode?></td>
                                        <td><?=$md->remark?></td>
                                        <td><?=$md->pcategory?></td>
                                        <td><?=$md->pcasestudy?></td>
                                        <td><?=$md->preports?></td>
                                        <td><?=$md->psell?></td>
                                        <td><?=$md->paspirational?></td>
                                        <td><?=$md->pwg?></td>
                                        <td><?=$md->pwga?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table> 
                            </div>
                        
                        
                            <div class="table-responsive card p-5">
                                <h4><center>School Review</center></h4><hr>
                                    <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <tr>
                                            <th>S.No.</th>
                                            <th>Date</th>
                                            <th>BD Name</th>
                                            <th>Admin Name</th>
                                            <th>School Name</th>
                                            <th>Remark</th>
                                            <th>Assign Task</th>
                                            <th>Expacted Date</th>
                                            <th>Expacted Status</th>
                                            <th>Review Time Status</th>
                                            <th>Current Status</th>
                                            <th>Is School teachers are Added on WhatsApp Group?</th>
                                            <th>What is Current Categories of school?</th>
                                            <th>What is the Reason for This Categories?</th>
                                            <th>What kind of Relation you have build with this school?</th>
                                            <th>Are you connected with teachers on social Media</th>
                                            <th>Is school participated in NSP?</th>
                                            <th>How many student participated in NSP?</th>
                                            <th>Is school Participated in webinar and Summer activity?</th>
                                            <th>How many students participated in Summer camp Activities?</th>
                                            <th>Any Support required to school?</th>
                                            <th>Is DIY activity conducted in last academic year?</th>
                                            <th>Is there any up sell opportunity from School?</th>
                                            <th>Did you get case study from this school?</th>
                                            <th>What kind of utilization you get from school?</th>
                                            <th>Is school logs after april 2023 activity are as per your plan actions?</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;
                                        foreach($mysrd as $md){
                                            $sdatet=$md->sdatet;
                                            $sdatet = date('d-m-Y  h:i A', strtotime($sdatet));
                                        ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$sdatet?></td>
                                        <td><?=$md->bdname?></td>
                                        <td><?=$md->pstname?></td>
                                        <td><?=$md->sname?><?=$md->projectcode?></td>
                                        <td><?=$md->remark?></td>
                                        <td><?=$md->taction?> (<?=$md->tstaction?>)</td>
                                        <td><?=$md->exdate?></td>
                                        <td><?=$md->exname?></td>
                                        <td><?=$md->rtsname?></td>
                                        <td><?=$md->csname?></td>
                                        <td><?=$md->awg?></td>
                                        <td><?=$md->categories?></td>
                                        <td><?=$md->categreason?></td>
                                        <td><?=$md->relation?></td>
                                        <td><?=$md->socialmedia?></td>
                                        <td><?=$md->nsp?></td>
                                        <td><?=$md->nspno?></td>
                                        <td><?=$md->summeractivity?></td>
                                        <td><?=$md->scno?></td>
                                        <td><?=$md->support?></td>
                                        <td><?=$md->diy?></td>
                                        <td><?=$md->opportunity?></td>
                                        <td><?=$md->casestudy?></td>
                                        <td><?=$md->utilizationtype?></td>
                                        <td><?=$md->logsactivity?></td>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table> 
                            </div>
  
                        <div class="table-responsive card p-5">
                                <h4><center>Pending Task</center></h4><hr>
                                    <table id="example3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>	
                                            <th>Assign By</th>	
                                            <th>Assign To</th>	
                                            <th>Assign Date</th>
                                            <th>Plan Date</th>
                                            <th>Assign to Plan TimeDiff</th>
                                            <th>Pending From TimeDiff</th>
                                            <th>Project Code</th>	
                                            <th>School Name</th>	
                                            <th>Task Type</th>	
                                            <th>Purpose</th>	
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $i=1;
                                      
                                           foreach($mytd4 as $ttd){
                                           $fuser = $ttd->from_user;
                                           $fuser=$this->Menu_model->get_user_byid($fuser);
                                           $cdate=date('Y-m-d H:i:s');
                                           ?>
                                           
                                           <tr>
                                           <td><?=$i++?></td>
                                           <td><?=$fuser[0]->fullname?></td>
                                           <td><?=$ttd->fullname?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->sdatet));?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->plandate));?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->sdatet,$ttd->plandate)?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->plandate,$cdate)?></td>
                                           <td><?=$ttd->project_code?></td>
                                           <td><?=$ttd->sname?></td>
                                           <td><?=$ttd->task_type?></td>
                                           <td><?=$ttd->task_subtype?></td>
                                           <td><?=$ttd->name?></td>
                                           
                                           </tr>
                                       <?php } ?>
                                  </tbody>
                                </table>
  </div>
  
  
  
  
  
                        <div class="table-responsive card p-5">
                                <h4><center>Completed Task</center></h4><hr>
                                    <table id="example4" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>	
                                            <th>Assign By</th>	
                                            <th>Assign To</th>	
                                            <th>Assign Date</th>
                                            <th>Plan Date</th>
                                            <th>Assign to Plan TimeDiff</th>
                                            <th>Initiated Date</th>
                                            <th>Plan to Initiated TimeDiff</th>
                                            <th>Completed Date</th>	
                                            <th>Initiated to Completed TimeDiff</th>
                                            <th>Project Code</th>	
                                            <th>School Name</th>	
                                            <th>Task Type</th>	
                                            <th>Purpose</th>	
                                            <th>Status</th>	
                                            <th>Action Taken</th>
                                            <th>Purpose Achieved</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $i=1;
                                      
                                           foreach($mytd3 as $ttd){
                                           $fuser = $ttd->from_user;
                                           $fuser=$this->Menu_model->get_user_byid($fuser);
                                           ?>
                                           
                                           <tr>
                                           <td><?=$i++?></td>
                                           <td><?=$fuser[0]->fullname?></td>
                                           <td><?=$ttd->fullname?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->sdatet));?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->plandate));?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->sdatet,$ttd->plandate)?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->initiateddt));?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->plandate,$ttd->initiateddt)?></td>
                                           <td><?=date('d-m-Y h:i A', strtotime($ttd->donet));?></td>
                                           <td><?=$this->Menu_model->timediff($ttd->initiateddt,$ttd->donet)?></td>
                                           <td><?=$ttd->project_code?></td>
                                           <td><?=$ttd->sname?></td>
                                           <td><?=$ttd->task_type?></td>
                                           <td><?=$ttd->task_subtype?></td>
                                           <td><?=$ttd->name?></td>
                                           <td><?=$ttd->actiontaken?></td>
                                           <td><?=$ttd->purpose?></td>
                                           <td><?=$ttd->remark?></td>
                                           </tr>
                                       <?php } ?>
                                  </tbody>
                                </table> 
                            </div>
                        </div>
 
                </fieldset>
            </div>
        </div>
    </div>
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
<script src="<?=base_url();?>assets/js/myjs.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

<script>
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    $("#example4").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
    $("#example5").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>