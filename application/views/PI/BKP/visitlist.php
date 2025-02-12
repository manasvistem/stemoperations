<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="wi$dth=device-wi$dth, initial-scale=1">
  <title>STEM HR APP</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>
<link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">

<!------------>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/summernote-bs4.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://stemlearning.in/opp/assets/css/buttons.bootstrap4.min.css">


<!------------------->


<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Datatable Dependency start -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>

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
            <h1 class="m-0">Check List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4> <?php $uid=$user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id);  $did[0]->dep_name;?> </h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row p-3">
            
            <div class="col-md-3">
            <!-- Profile Image -->
        <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">School Detail</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-2">
            <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                      <lable>Project Code</lable><br>
                      <a href="../../school_detail/<?=$spd[0]->id?>"><b><?=$task[0]->project_code?></b></a>
                  </li>
                  <li class="list-group-item">
                    <lable>School Name</lable><br>
                    <a href="../../school_detail/<?=$spd[0]->id?>"><b><?=$spd[0]->sname?></b></a>
                  </li>
                  <li class="list-group-item">
                    <lable>Person</lable><br>
                    <b><?=$user['fullname']?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>Address</lable><br>
                    <b><?=$spd[0]->saddress?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>City</lable><br>
                    <b><?=$spd[0]->scity?></b>
                  </li>
                  <li class="list-group-item">
                    <lable>State</lable><br>
                    <b><?=$spd[0]->sstate?></b>
                  </li>
                  <?php 
                  $sid = $spd[0]->id;
                  $sd=$this->Menu_model->get_school_contact($sid);
                  foreach($sd as $sd){?>
                  <li class="list-group-item">
                    <lable>Contact</lable><br>
                    <b><?=$sd->contact_name?></b><br>
                    <b><?=$sd->designation?></b><br>
                    <b><?=$sd->contact_no?></b><br>
                    <b><?=$sd->email?></b>
                    <span>
                        <a id="clink" href="" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://stemlearning.in/opp/assets/image/icon/call.png" style="height:30px;"></a>
                        <a id="wlink" href="" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://stemlearning.in/opp/assets/image/icon/whatsapp.png" style="height:30px;"></a>
                        <a id="wglink" href="" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://stemlearning.in/opp/assets/image/icon/whatsapp.png" style="height:30px;"></a>
                        <a id="glink" href="" target="_blank" style="padding:7px;border-radius:20px;">
                        <img src="https://mailmeteor.com/logos/assets/PNG/Gmail_Logo_512px.png" style="height:20px;"></a>
                    </span>
                  </li>
                  <?php }?>
                </ul>
        </div></div></div>
          
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?=$pagename?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body box-profile">
                <?php 
                
                $j = sizeof($vsitist);
                $l = sizeof($vstupdate);
                
                if($j!=$l){?>
                <form action="<?=base_url();?>Menu/visitupdate" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="useruid" value="<?=$uid?>">
                    <input type="hidden" name="tid" value="<?=$tid?>">
                    <input type="hidden" name="sid" value="<?=$sid?>">
                    <input type="hidden" name="pageno" value="<?=$page?>">
                    <input type="hidden" name="planid" value="<?=$mid?>">
                    <input type="hidden" name="quen" value="<?=$vsitist[$l]->que?>">
                    <?php $uptype=0; if($vsitist[$l]->photo=='1'){$uptype=1;}if($vsitist[$l]->video=='1'){$uptype=2;}?>
                    <input type="hidden" name="uptype" value="<?=$uptype?>">
                    <center>
                       <h3><?=$vsitist[$l]->que?></h3>
                       <?php if($vsitist[$l]->mcall=='1'){?>
                           <div class="mb-4 d-flex justify-content-center  m-1">
                                <label>Meeting Link</label>
                                <input type="text" class="form-control" name="mlink" required=""/>
                            </div>
                       <?php }?>
                       <?php if($vsitist[$l]->photo=='1'){?>
                           <div class="mb-4 d-flex justify-content-center m-1">
                                <label>Take Photo</label>
                                <input type="file" class="form-control" name="filname[]" accept="image/*" capture required=""/>
                            </div>
                            
                            
                       <?php if($page=='page57'){?>
                       <a href="<?=base_url();?>Menu/PurposeNotAchieved/<?=$tid?>/<?=$sid?>/<?=$page?>/<?=$mid?>"><b>Purpose Not Achieved</b></a><br>
                       <?php } ?>   
                            
                       <?php }?>
                       <?php if($vsitist[$l]->video=='1'){?>
                            <div class="mb-4 d-flex justify-content-center m-1">
                                <label>Take Video</label>
                                <input type="file" class="form-control" name="filname[]" accept="video/*" capture required=""/>
                            </div>
                       <?php }?>
                       <?php if($vsitist[$l]->addmp=='1'){?>
                            <div class="mb-4 d-flex justify-content-center m-1">
                                <label>Attach Media Files</label>
                                <input type="file" class="form-control" name="addmedia[]" multiple required=""/>
                            </div>
                       <?php }?>
                       
                       <?php if($vsitist[$l]->notworking=='1'){?>
                            <div class="mb-4 m-1 text-left col-lg-4 col-sm">
                                <?php $model = $this->Menu_model->get_modelfromf();?>
                                <select id="fgname" name="fgname" class="cpdid">
                                    <?php foreach($model as $mod){?>
                                    <option><?=$mod->model_name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-4 m-1 text-left col-lg-4 col-sm">
                                <select id="rrdetail" name="rrdetail" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="1">Repairing</option>
                                    <option value="2">to be Repaired</option>
                                    <option value="3">Replacement</option>
                                </select>
                            </div>
                            <div class="mb-4 m-1 text-left col-lg-4 col-sm" id="box1">
                                <div class="form-group">
                                    <label for="spd_id">Material Name</label>
                                    <select class="custom-select rounded-0" name="mtid" id="material">
                                        <option>Select Meterial</option>
                                        <?php $bgm = $this->Menu_model->get_umbag($uid); foreach($bgm as $bm){?>
                                        <option><?=$bm->material_name?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Material Qty</label>
                                    <input type="text" class="form-control rounded-0" name="mqty">
                                </div>
                               <lable>Repairing Video</lable>
                            </div>
                            <div class="mb-4 m-1 text-left col-lg-4 col-sm" id="box2">
                                 <lable>Part/Material Name</lable>
                                 <select type="text" class="form-control" id="pmname" name="pmname">
                                 </select>
                                 <lable>Model Video</lable>
                            </div>
                            <div class="mb-4 m-1 text-left col-lg-4 col-sm" id="box3">
                                <lable>Model Video</lable>
                            </div>
                            <input type="file" class="form-control" id="prerepair" name="prerepair" accept="video/*" capture required/>
                            <lable>Remark</lable>
                            <textarea type="text" class="form-control" name="remark"></textarea>
                            <a href="<?=base_url();?>Menu/noissues/<?=$tid?>/<?=$sid?>/<?=$page?>/<?=$mid?>"><b>No Issue</b></a>
                            <!--<div class="m-2 col-lg-5 col-sm" id="fgcode"> 
                                <input type="text" id="umcode" class="form-control">
                                <div id="fgfind"></div>
                                Scan Count : <input type="text" id="count" value="0" readonly class="form-control">
                                <div id="fgdata"></div>
                                <div id="img" class="m-2" >
                            </div>
                            </div>-->
                       <?php }?>
                       
                       
                       <?php if($vsitist[$l]->ttpnwm=='1'){?>
                            <div class="mb-4 m-1 text-left col-lg-4 col-sm">
                                <?php $model = $this->Menu_model->get_model();?>
                                <select id="fgdata" name="fgallnwcode[]" class="cpdid" multiple>
                                    <option>(a+b)2 - (a-b)2 = 4ab</option>
                                    <option>(a+b)2=a2+2ab+b2</option>
                                    <option>a(b+c)=ab+ac</option>
                                    <option>a2-b2=(a+b)(a-b)</option>
                                    <option>Action and reaction</option>
                                    <option>Animal Cell</option>
                                    <option>Archimedes screw</option>
                                    <option>Area of circle</option>
                                    <option>Area of parallelogram</option>
                                    <option>Area of rhombus</option>
                                    <option>Area of trapezium</option>
                                    <option>Area of triangle</option>
                                    <option>Centrifuge puzzle</option>
                                    <option>Circle and ball</option>
                                    <option>Colour shadow</option>
                                    <option>Conductor and insulators</option>
                                    <option>Cone run uphill</option>
                                    <option>Constellation viewer</option>
                                    <option>Corner mirror</option>
                                    <option>Coupled Pendulum</option>
                                    <option>Day and night</option>
                                    <option>DNA</option>
                                    <option>Ear and Eye</option>
                                    <option>Electric bell</option>
                                    <option>Electric maze</option>
                                    <option>Elliptical carom board</option>
                                    <option>Floating ball</option>
                                    <option>Floating fan</option>
                                    <option>Floating magnets</option>
                                    <option>Forces and types of friction</option>
                                    <option>Fun with magnet</option>
                                    <option>Funny mirrors</option>
                                    <option>Hand battery</option>
                                    <option>Hand pump</option>
                                    <option>Heat absorption</option>
                                    <option>Human Joints</option>
                                    <option>Human Torso</option>
                                    <option>infinity well</option>
                                    <option>Kaleidoscope</option>
                                    <option>KE PE and Bumpy Track</option>
                                    <option>Lateral shift</option>
                                    <option>Law of inertia</option>
                                    <option>Laws of reflection</option>
                                    <option>Lazy tube</option>
                                    <option>Lever</option>
                                    <option>Loop the loop track</option>
                                    <option>Magic water tap</option>
                                    <option>Magnetic effect of electric current</option>
                                    <option>Magnetic field tube and Immersible fluid</option>
                                    <option>Maxwell wheel</option>
                                    <option>Moment of inertia</option>
                                    <option>Newtons cradle</option>
                                    <option>Newtons disk</option>
                                    <option>Organ pipes</option>
                                    <option>Parking puzzle</option>
                                    <option>Periscope</option>
                                    <option>Persistence of vision</option>
                                    <option>Pin screen</option>
                                    <option>Plant Cell</option>
                                    <option>Pulley block</option>
                                    <option>Pythagoras</option>
                                    <option>Reflection and transmission</option>
                                    <option>Rock and minerals</option>
                                    <option>Rope puzzle</option>
                                    <option>Series and Parallel</option>
                                    <option>Shape of earth due to rotation</option>
                                    <option>Simple camera</option>
                                    <option>Simple motor</option>
                                    <option>Solar energy</option>
                                    <option>Sum of the angles of quadrilateral</option>
                                    <option>Sum of the angles of triangle</option>
                                    <option>Tangram</option>
                                    <option>Tornado</option>
                                    <option>Total internal reflection</option>
                                    <option>Tower of pisa</option>
                                    <option>Transverse waves pendulum</option>
                                    <option>Viscosity</option>
                                    <option>Wheel and axle</option>
                                    <option>Wind Mill</option>
                                    <option>Zeotrope</option>
                                </select>
                            </div>
                        <?php }?>
                       
                       <?php if($vsitist[$l]->schoolident=='1'){?>
                            <div class="mb-4 d-flex justify-content-center m-1">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="uuid" value="<?=$uid?>">
                                        <lable>School Name</lable>
                                        <input type="text" class="form-control" name="sname" required="">
                                        <lable>Language</lable>
                                        <input type="text" class="form-control" name="slanguage" required="">
                                        <lable>Standard</lable>
                                        <input type="text" class="form-control" name="std" required="">
                                        <lable>Total Teachers</lable>
                                        <input type="text" class="form-control" name="total_teachers" required="">
                                        <lable>Total Student</lable>
                                        <input type="text" class="form-control" name="total_students" required="">
                                        <lable>Boys</lable>
                                        <input type="text" class="form-control" name="boys" required="">
                                        <lable>Girls</lable>
                                        <input type="text" class="form-control" name="girls" required="">
                                        <lable>Address</lable>
                                        <input type="text" class="form-control" name="saddress" required="">
                                        <lable>Pincode</lable>
                                        <input type="text" class="form-control" name="spincode" required="">
                                        <lable>City</lable>
                                        <input type="text" class="form-control" name="scity" required="">
                                        <lable>State</lable>
                                        <input type="text" class="form-control" name="sstate" required="">
                                        <lable>School Principal Name</lable>
                                        <input type="text" class="form-control" name="contact_name" required="">
                                        <lable>Contact No</lable>
                                        <input type="number" class="form-control" name="contact_no" required="">
                                    </div>
                                </div>
                            </div>
                       <?php }?>
                       
                   <input type="hidden" id="lat" name="lat">
                   <input type="hidden" id="lng" name="lng">
                   
                   <input type="submit" class="btn-info mt-2" onclick="this.form.submit(); this.disabled = true;">
                   </center>
                   
                   <div id="location">
                        <div id="map-container-google-3" class="z-depth-1-half map-container-3 p-3 m-3 border">
                          <iframe style="width:100%;height:200px;" id="mylocation" src="" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </form>
                    
                <?php }else{ ?>
                    
                <form action="<?=base_url();?>Menu/call_checklist" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="actontaken" value="yes">
                    <input type="hidden" name="purposetaken" value="yes">
                    <input type="hidden" name="uid" value="<?=$uid?>">
                    <input type="hidden" name="ctid" id="ctid" value="<?=$tid?>">
                    <input type="hidden" name="checklist" id="checklist" value="<?=$page?>">
                     <ul class="list-group list-group-unbordered mb-3">
                        <?php
                        $i=1;
                        foreach($pagedata as $d){?>
                      <li class="list-group-item">
                        <b><?=$i?>. <?=$d->question?></b>
                        <input type="hidden" name="que[]" value="<?=$d->id?>">
                        <?php if($d->optional==1){?>
                        <div class="form-group clearfix mt-2">
                          <div class="icheck-primary d-inline">
                                <div> 
                                    <input type="radio" name="tab<?=$i?>" checked="checked" class="tab-input" value="<?=$d->option1?>"> <?=$d->option1?> 
                                    <input type="radio" name="tab<?=$i?>" class="tab-input" value="<?=$d->option2?>"> <?=$d->option2?>
                                </div>
                          </div>
                        </div>
                        <?php } ?>
                        <?php if($d->selection==1){?>
                        <div class="form-group clearfix mt-2">
                            <select class="form-control" id="sel<?=$i?>" name="sel[]">
                                <option><?=$d->selection1?></option>
                                <option><?=$d->selection2?></option>
                                <option><?=$d->selection3?></option>
                                <option><?=$d->selection4?></option>
                                <option><?=$d->selection5?></option>
                            </select>
                        </div>
                        <?php } ?>
                        <?php if($d->remark==1){?>
                        <div class="form-group clearfix mt-2">
                               <input type="text" class="form-control" id="remat<?=$i?>" name="remat[]">
                        </div>
                        <?php } ?>
                        <?php if($d->datein==1){?>
                        <div class="form-group clearfix mt-2">
                                <input type="date" class="form-control" id="datein<?=$i?>" name="datein[]">
                        </div>
                        <?php } ?>
                        <?php if($d->attachment==1){?>
                        <div class="form-group clearfix mt-2">
                        <input type="file" class="form-control file-input" name="attac[]" id="attac<?=$i?>">
                        <section class="progress-area"></section>
                        <section class="uploaded-area"></section>
                        </div>
                        <?php } ?>
                        <?php if($d->star==1){?>
                        <div class="form-group clearfix mt-2">
                           <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                          </div>
                        </div>
                        <?php } ?>
                      </li><?php $i++; } ?>
                    </ul>
                    <textarea id="finalremark" name="finalremark" rows="4" cols="50" placeholder="Final Remark"></textarea>
                </div>
                <input type="submit" class="btn-info mt-2" onclick="this.form.submit(); this.disabled = true;">
               </form>
            </div>
            <?php } ?>
            <!-- /.card -->
            
  </div>
  
            
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>            
<script type='text/javascript'>


document.getElementById("box1").style.display = "none";
document.getElementById("box2").style.display = "none";
document.getElementById("box3").style.display = "none";

$('#rrdetail').on('change', function() {
    var val = this.value;
    if(val=='1'){
        document.getElementById("box1").style.display = "block";
        document.getElementById("box2").style.display = "none";
        document.getElementById("box3").style.display = "none";
    }
    if(val=='2'){
        document.getElementById("box2").style.display = "block";
        document.getElementById("box1").style.display = "none";
        document.getElementById("box3").style.display = "none";
    }
    if(val=='3'){
        document.getElementById("box3").style.display = "block";
        document.getElementById("box2").style.display = "none";
        document.getElementById("box1").style.display = "none";
    }
});








$('#fgname').on('change', function g() {
var fgname = this.value;
$.ajax({
url:'<?=base_url();?>Menu/getpartmaterial',
type: "POST",
data: {
fgname: fgname
},
cache: false,
success: function a(result){
$("#pmname").html(result);
}
});
});



var x = document.getElementById("lat");
var y = document.getElementById("lng");
var z = document.getElementById("mylocation");
$(document).ready(function(){
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.value = "Geolocation is not supported by this browser.";
  }
});
function showPosition(position) {
  x.value = position.coords.latitude; 
  y.value = position.coords.longitude;
  var a = position.coords.latitude;
  var b = position.coords.longitude;
  mylocation.src = "https://maps.google.com/?q="+a+","+b+"&t=k&z=13&ie=UTF8&iwloc=&output=embed";
}

$('#umcode').on('change', function() {
var umcode = this.value;
$.ajax({
url:'<?=base_url();?>Menu/findfgcode',
type: "POST",
data: {
umcode: umcode
},
cache: false,
success: function(result){
    var result = result;
    if(result!=0){
            var dt = "<input name='fgallcode[]' class='form-control' type='text' value="+result+" readonly>";
            $('#fgdata').append(dt);
            document.getElementById("umcode").value = "";
            $("#fgfind").html("<p>Model Code Match<p>");
            document.getElementById("img").style.display = "block";
            var count = document.getElementById("count").value;
            count = parseInt(count)+1;
            document.getElementById("count").value= count;
            var count = document.getElementById("count").value;
            var fgc = document.getElementById("fgc").value;
            if(count==fgc){
                document.getElementById("fgcode").style.display = "none";
            }
    }else{$("#fgfind").html("<p>Model Code Not Match<p>");}
}
});
});


$('[id^="attac"]').prop('required', true);
$('[id^="datein"]').prop('required', true);
$('[id^="remat"]').prop('required', true);
$('[id^="sel"]').prop('required', true);
$('[id^="ansremark"]').prop('required', true);
document.getElementById("finalremark").required = true;


$('input[name=r1]').on('change', function() {
   var data = $('input[name=r1]:checked').val();
   if(data=='YES')
   {
       document.getElementById("remark").style.display = "none";
   }else{
       document.getElementById("remark").style.display = "block";
   }
});


</script>




   
            
            
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    </div></div></div>
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
<!-- ./wrapper -->

<!-- jQuery -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
<script>
$(document).ready(function(){
    var multipleCancelButton = new Choices('.cpdid', {
    removeItemButton: true, });
});
</script>
</body>
</html>
