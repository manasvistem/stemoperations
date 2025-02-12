<!DOCTYPE html>
<html lang="en">
<head
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>School Time Line Planning | STEM APP | WebAPP</title>

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
.taskPerformence{
    color:white!important;
}
.card{
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
}
small{
  font-size: 10px;
  text-transform: capitalize;
  padding: 0px 6px;
}
.from-group {
  background: antiquewhite;
  padding: 6px;
  margin: 2px;
  border-radius:10px;
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
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif; ?>
       <div class="row p-3">
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <!-- <?php $spdtlc = $this->Menu_model->get_spdtlc($uid);?>
                  <b>Total School : <?=$spdtlc[0]->tspd?></b><br>
                  <b>Total School TimeLine Set : <?=$spdtlc[0]->tspdtl?></b> -->
                 
                  <h3 class="text-center">School Planning</h3>
                  <hr>
                  <div class="form-group">
                    <label>Select Client</label>
                    <select class="custom-select rounded-0" name="pcode" id="pcode" >
                    <option selected value="<?=$pcode?>"><?=$pcode?></option>
                    <?php 
                    $client = $this->Menu_model->get_pcbypiid1($uid);
                    $schoolname = $this->Menu_model->getSchoolNameBySid($sid);
    
                    $getMandEData = $this->Menu_model->getMandERequiredOrNot($pcode);
                    $getMandEStatus = $getMandEData[0]->answer;
             
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>School Name</label>
                    <select class="custom-select rounded-0" name="spd_id" id="spd_id">
                    <option selected value="<?=$sid?>"><?=$schoolname?></option>
                    
                    </select>
                </div>
                <div class="form-group">
                    <p id="noofschool"></p>             
                </div>
                
                  <div id="pdetail"></div>
                  <div id="AcademicCalendar"></div>
                  </div>
                </div>
              </div>
             
              <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Time Line Setting</h3>
                  <hr>
                  <div id="alldata">
                  <form action="<?=base_url();?>Menu/stimelineplanning" method="post">
                      <input type="hidden" value="<?=$uid?>" name="userid" id="userid">
                      <input type="hidden" name="uid" value="<?=$uid?>">
                      <input type="hidden" name="bdid" value="123">
                      <input type="hidden" value='<?= $pcode?>' name="projectcode" id="projectcode">
                      <input type="hidden" name="piid" id="piid" value="<?=$uid?>">
                      <input type="hidden" value='<?= $sid?>' name="sid" id="sid">
                    <div class="was-validated">

                     <div class="card p-2 mt-2">
                    <div class="from-group">
                        <lable>Academic  Year</lable>
                        <select class="form-control" name="academicyear" required>
                            <option disabled>Select Status</option>
                            <option value="<?= date("Y") -2; ?> - <?= date("Y")-1 ?>"><?= date("Y") -2; ?> - <?= date("Y")-1 ?></option>
                        </select>
                      </div>

                      <div class="from-group">
                        <lable>New Session Message*  </lable> 
                        <input type="date" min="<?= date("Y-m-d") ?>" max="" class="form-control" id="wmessage" name="wmessage" required>
                        <div class="text-right">
                        <i><small class="text-right targetdatebypm" id="wmessage_tar"></small></i> 
                        </div>
                      </div>
                      </div>

                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b2">
                        <lable>1st 5 Communication*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="communication1" name="communication1" required="">
                        <div class="text-right">
                        <i><small class="text-right targetdatebypm" id="communication1_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group" id="b2">
                        <lable>2nd 5 Communication*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="communication2" name="communication2" required="">
                        <div class="text-right">
                        <i><small class="text-right targetdatebypm" id="communication2_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group" id="b2">
                        <lable>3rd 5 Communication*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="communication3" name="communication3" required="">
                        <div class="text-right">
                        <i><small class="text-right targetdatebypm" id="communication3_tar"></small></i> 
                        </div>
                      </div>
                      </div>


                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b3">
                        <lable>1st 5 Calls for Utilisation*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="callsfu1" name="callsfu1" required="">
                        <div class="text-right">
                        <i><small class="text-right targetdatebypm" id="callsfu1_tar"></small></i> 
                        </div>
                      </div>

                      <div class="from-group" id="b3">
                        <lable>2nd 5 Calls for Utilisation*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="callsfu2" name="callsfu2" required="">
                        <div class="text-right">
                        <i><small class="text-right targetdatebypm" id="callsfu2_tar"></small></i> 
                        </div>
                      </div>
                      </div>

                  <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable>Report Type*</lable>
                        <select class="form-control"  name="reporttype" required>
                            <option value="8">Monthly</option>
                            <option value="4">Querterly</option>
                            <option value="1">Yearly</option>
                        </select>
                      
                      </div>
                      <div class="from-group">
                        <lable>FTTP</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" max="" class="form-control" id="fttp" name="fttp">
                        <div class="text-right">
                        <i><small class="text-right targetdatebypm" id="fttp_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group">
                        <lable>RTTP*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" max="" class="form-control" id="rttp" name="rttp" required>
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="rttp_tar"></small></i> 
                        </div>
                      </div>
                      </div>

                      

                      <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable>Maintenance*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" max="" class="form-control" id="maintenance" name="maintenance" required>
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="maintenance_tar"></small></i> 
                        </div>
                      </div>
                      <?php if($getMandEStatus == 'Yes'): ?>
                      <div class="from-group">
                        <lable>Base Line M&E</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" max="" class="form-control" id="blmne" name="blmne">
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="blmne_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group">
                        <lable>End Line M&E</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" max="" class="form-control" id="elmne" name="elmne">
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="elmne_tar"></small></i> 
                        </div>
                      </div>
                      <?php endif; ?>
                      <div class="from-group">
                        <lable>NSP</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" max="" class="form-control" id="nsp" name="nsp">
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="nsp_tar"></small></i> 
                        </div>
                      </div>
                     
                      </div>


                      <div class="card p-2 mt-2">
                        <div class="from-group" id="b13">
                          <lable>1st 5 Utilisation*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="utilisation1" name="utilisation1" required="">
                          <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="utilisation1_tar"></small></i> 
                        </div>
                        </div>
                        <div class="from-group" id="b13">
                          <lable>2nd 5 Utilisation*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="utilisation2" name="utilisation2" required="">
                          <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="utilisation2_tar"></small></i> 
                        </div>
                        </div>
                        <div class="from-group" id="b13">
                          <lable>3rd 5 Utilisation*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="utilisation3" name="utilisation3" required="">
                          <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="utilisation3_tar"></small></i> 
                        </div>
                        </div>
                      </div>


                    <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable>ZM Visit Readiness </lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="zmvisit" id="zmvisit" required>
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="zmvisit_tar"></small></i> 
                        </div>
                      </div>

                      <div class="from-group" id="b14">
                        <lable>PM Visit Readiness </lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="pmvisit" name="pmvisit" required="">
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="pmvisit_tar"></small></i> 
                        </div>
                      </div>
                      </div>
                   <!--    <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable>Other Department Call</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="otherdepartmentcall" id="otherdepartmentcall" required>
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="otherdepartmentcall_tar"></small></i> 
                        </div>
                      </div>

                   
                      <div class="from-group" id="b17">
                        <lable>Review with BD*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="bdreview" id="bdreview" required="">
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="bdreview_tar"></small></i> 
                        </div>
                      </div>
                      </div> -->

                      <div class="card p-2 mt-2">
                        <div class="from-group" id="b16">
                          <lable>1st 4 OutBond Communication*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="outBondcommunication1" id="outBondcommunication1" required="">
                          <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="outBondcommunication1_tar"></small></i> 
                        </div>
                        </div>
                        <div class="from-group" id="b16">
                          <lable>2nd 4 OutBond Communication*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="outBondcommunication2" id="outBondcommunication2" required="">
                          <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="outBondcommunication2_tar"></small></i> 
                        </div>
                        </div>
                        <div class="from-group" id="b16">
                          <lable>3rd 4 OutBond Communication*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="outBondcommunication3" id="outBondcommunication3" required="">
                          <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="outBondcommunication3_tar"></small></i> 
                        </div>
                        </div>
                      </div>

                     
                     <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable>CaseStudy*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" max="" class="form-control" id="casestudy" name="casestudy" required>
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="casestudy_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group">
                        <lable>DIY</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" max="" class="form-control" id="diy" name="diy">
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="diy_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group">
                        <lable>Client Engagement*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" max="" class="form-control" id="cengagement" name="cengagement" required>
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="cengagement_tar"></small></i> 
                        </div>
                      </div>
                      </div>

                      <hr>
                     <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable>Expected Status</lable>
                        <select class="form-control" name="status" required>
                            <option>Select Status</option>
                            <?php $status = $this->Menu_model->get_status(); foreach($status as $st){?>
                            <option value="<?=$st->id?>"><?=$st->name?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="from-group">
                        <lable>Expected Status Date</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="exstatusdt" id="exstatusdt" required>
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="exstatusdt_tar"></small></i> 
                        </div>
                      </div>
                      </div>
                    <!-- <hr> -->
                     <div class="card p-2 mt-2">
                     <div class="from-group" id="b17">
                        <lable>Summer Activity</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="summeractivity" id="summeractivity" required="">
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="summeractivity_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group" id="b17">
                        <lable>winter activity</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="winteractivity" id="winteractivity" required="">
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="winteractivity_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group" id="b17">
                        <lable>Online Activity</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="onlineactivity" id="onlineactivity" required="">
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="onlineactivity_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group" id="b17">
                        <lable>Webinar</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="webinar" id="webinar" required="">
                        <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="webinar_tar"></small></i> 
                        </div>
                      </div>
                     </div>


                         <div class="card p-2 mt-2">
                     <div class="from-group" id="b17">
                        <lable>Set Date for First Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="socialMediaPost1" name="socialMediaPost1" required="">
                         <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="socialMediaPost1_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group" id="b17">
                        <lable>Set Date for Second Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="socialMediaPost2" id="socialMediaPost2" required="">
                         <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="socialMediaPost2_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group" id="b17">
                        <lable>Set Date for Third Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="socialMediaPost3" name="socialMediaPost3" required="">
                         <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="socialMediaPost3_tar"></small></i> 
                        </div>
                      </div>
                      <div class="from-group" id="b17">
                        <lable>Set Date for Fourth Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="socialMediaPost4" name="socialMediaPost4"  required="">
                         <div class="text-right">
                          <i><small class="text-right targetdatebypm" id="socialMediaPost4_tar"></small></i> 
                        </div>
                      </div>
                     </div>
                     




                      <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mt-2" onclick="this.form.submit(); this.disabled = true;">Set Time Line</button>
                      </div>
                    
                    </div>
                    </form>
                    </div>
                  <hr>
                  </div>
                </div>
              </div>
              
              
           
              
          <div id="Alldata"></div>             
            
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>


// $('#pcode').on('change', function b() {
// document.getElementById("projectcode").value=this.value;
// });

// $('#spd_id').on('change', function b() {
// document.getElementById("sid").value=this.value;
// });



$(window).on("load", function() {
    var pcode = $("#pcode").val();
    var userid = $("#userid").val();

    $.ajax({
        url: '<?=base_url();?>Menu/getspdbyuserpcs12',
        type: "POST",
        data: {
            pcode: pcode,
            userid: userid
        },
        cache: false,
        success: function(result) {
            var spd_id = $("#spd_id").val();
            $.ajax({
                url: '<?=base_url();?>Menu/getTargetDateBYPM',
                type: "POST",
                data: {
                    pcode: pcode,
                    spd_id: spd_id
                },
                success: function(result) {
                    var responseData = JSON.parse(result);

                    console.log(responseData);
                    
                    $('.targetdatebypm').css({"background-color": "aqua"});

                    $('#wmessage').attr('max', responseData[0].wmessage);
                    $('#wmessage_tar').html('<b>PM Target Date -  '+ responseData[0].wmessage+'</b>');

                    $('#communication1').attr('max', responseData[0].communication1);
                    $('#communication1_tar').html('<b>PM Target Date - '+ responseData[0].communication1+'</b>');

                    $('#communication2').attr('max', responseData[0].communication2);
                    $('#communication2_tar').html('<b>PM Target Date - '+ responseData[0].communication2+'</b>');

                    $('#communication3').attr('max', responseData[0].communication3);
                    $('#communication3_tar').html('<b>PM Target Date - '+ responseData[0].communication3+'</b>');

                    $('#callsfu1').attr('max', responseData[0].callsfu1);
                    $('#callsfu1_tar').html('<b>PM Target Date - '+ responseData[0].callsfu1+'</b>');

                    $('#callsfu2').attr('max', responseData[0].callsfu2);
                    $('#callsfu2_tar').html('<b>PM Target Date - '+ responseData[0].callsfu2+'</b>');

                    $('#fttp').attr('max', responseData[0].fttp);
                    $('#fttp_tar').html('<b>PM Target Date - '+ responseData[0].fttp+'</b>');

                    $('#rttp').attr('max', responseData[0].rttp);
                    $('#rttp_tar').html('<b>PM Target Date - '+ responseData[0].rttp+'</b>');

                    $('#casestudy').attr('max', responseData[0].casestudy);
                    $('#casestudy_tar').html('<b>PM Target Date - '+ responseData[0].casestudy+'</b>');

                    $('#maintenance').attr('max', responseData[0].maintenance);
                    $('#maintenance_tar').html('<b>PM Target Date - '+ responseData[0].maintenance+'</b>');

                    $('#diy').attr('max', responseData[0].diy);
                    $('#diy_tar').html('<b>PM Target Date - '+ responseData[0].diy+'</b>');

                    $('#blmne').attr('max', responseData[0].blmne);
                    $('#blmne_tar').html('<b>PM Target Date - '+ responseData[0].blmne+'</b>');

                    $('#elmne').attr('max', responseData[0].elmne);
                    $('#elmne_tar').html('<b>PM Target Date - '+ responseData[0].elmne+'</b>');

                    $('#nsp').attr('max', responseData[0].nsp);
                    $('#nsp_tar').html('<b>PM Target Date - '+ responseData[0].nsp+'</b>');

                    $('#utilisation1').attr('max', responseData[0].utilisation1);
                    $('#utilisation1_tar').html('<b>PM Target Date - '+ responseData[0].utilisation1+'</b>');

                    $('#utilisation2').attr('max', responseData[0].utilisation2);
                    $('#utilisation2_tar').html('<b>PM Target Date - '+ responseData[0].utilisation2+'</b>');

                    $('#utilisation3').attr('max', responseData[0].utilisation3);
                    $('#utilisation3_tar').html('<b>PM Target Date - '+ responseData[0].utilisation3+'</b>');

                    $('#cengagement').attr('max', responseData[0].cengagement);
                    $('#cengagement_tar').html('<b>PM Target Date - '+ responseData[0].cengagement+'</b>');

                    $('#exstatusdt').attr('max', responseData[0].exstatusdt);
                    $('#exstatusdt_tar').html('<b>PM Target Date - '+ responseData[0].exstatusdt+'</b>');

                    $('#zmvisit').attr('max', responseData[0].zmvisit);
                    $('#zmvisit_tar').html('<b>PM Target Date - '+ responseData[0].zmvisit+'</b>');

                    $('#pmvisit').attr('max', responseData[0].pmvisit);
                    $('#pmvisit_tar').html('<b>PM Target Date - '+ responseData[0].pmvisit+'</b>');

                    // $('#otherdepartmentcall').attr('max', responseData[0].otherdcall);
                    // $('#otherdepartmentcall_tar').html('<b>PM Target Date - '+ responseData[0].otherdepartmentcall+'</b>');

                    $('#outBondcommunication1').attr('max', responseData[0].outbondc1);
                    $('#outBondcommunication1_tar').html('<b>PM Target Date - '+ responseData[0].outbondc1+'</b>');

                    $('#outBondcommunication2').attr('max', responseData[0].outbondc2);
                    $('#outBondcommunication2_tar').html('<b>PM Target Date - '+ responseData[0].outbondc2+'</b>');

                    $('#outBondcommunication3').attr('max', responseData[0].outbondc3);
                    $('#outBondcommunication3_tar').html('<b>PM Target Date - '+ responseData[0].outbondc3+'</b>');

                    // $('#bdreview').attr('max', responseData[0].bdreview);
                    // $('#bdreview_tar').html('<b>PM Target Date - '+ responseData[0].bdreview+'</b>');

                    $('#summeractivity').attr('max', responseData[0].summeractivity);
                    $('#summeractivity_tar').html('<b>PM Target Date - '+ responseData[0].summeractivity+'</b>');

                    $('#winteractivity').attr('max', responseData[0].winteractivity);
                    $('#winteractivity_tar').html('<b>PM Target Date - '+ responseData[0].winteractivity+'</b>');

                    $('#onlineactivity').attr('max', responseData[0].onlineactivity);
                    $('#onlineactivity_tar').html('<b>PM Target Date - '+ responseData[0].onlineactivity+'</b>');

                    $('#webinar').attr('max', responseData[0].webinar);
                    $('#webinar_tar').html('<b>PM Target Date - '+ responseData[0].webinar+'</b>');
                    
                    $('#socialMediaPost1').attr('max', responseData[0].socialMediaPost1);
                    $('#socialMediaPost1_tar').html('<b>PM Target Date - '+ responseData[0].socialMediaPost1+'</b>');
                    
                    $('#socialMediaPost2').attr('max', responseData[0].socialMediaPost2);
                    $('#socialMediaPost2_tar').html('<b>PM Target Date - '+ responseData[0].socialMediaPost2+'</b>');
                    
                    $('#socialMediaPost3').attr('max', responseData[0].socialMediaPost3);
                    $('#socialMediaPost3_tar').html('<b>PM Target Date - '+ responseData[0].socialMediaPost3+'</b>');
                    
                    $('#socialMediaPost4').attr('max', responseData[0].socialMediaPost4);
                    $('#socialMediaPost4_tar').html('<b>PM Target Date - '+ responseData[0].socialMediaPost4+'</b>');
                }
            });
        }
    });
});

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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>