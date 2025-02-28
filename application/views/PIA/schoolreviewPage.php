<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> School Review Page |   STEM </title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
    <style>
      .textcenter{justify-content: center;}.selectdatebox.text-right {width: 100%;background: rgb(122 217 255 / 0.17);justify-content: right;display: flex;padding: 5px;align-items: center;justify-content: center;display: flex;height: 90px;}.set-date-form{box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px;padding:5px;}.bgtimebackground{border-radius: 24px;}.caution{background: white;padding: 5px;font-weight: 600;}.text-center.timerbg {background: #000;color: white;margin-top: 20px;padding: 8px;font-size: 16px;}.col-md-6.chartareabg {align-content: right;justify-content: right;display: flex;}#chart_div {align-content: right;justify-content: right;display: flex;}.watchtimer {width: 100%;margin-top: 70px;align-content: center;justify-content: center;display: flex;}.chartareabgset{min-height:220px;background: antiquewhite;margin-top: 10px;}.chartareabg12 {align-content: center;text-align: center;justify-content: center;display: flex;flex-wrap: wrap-reverse;margin-top: 70px;font-size: 22px;font-weight: 600;}.text-center.timerbg {color: white;font-size: 16px;width: 100%;}.planedSchoolTaskName {list-style-type: none;padding: 10px;line-height: 33px;}.planedSchoolTaskName .planedSchoolTaskName1{padding: 2px;margin: 8px;align-content: center;justify-content: center;display: flex;}.selectdatebox1{background: rgb(122 217 255 / 0.17);padding: 12px;}.totaltasktime {font-size: 22px;}.flex-wrap {flex-wrap: wrap !important;}.d-flex {display: flex !important;}.main_area .icon_sty {max-height: 120px;width: 158px;width: 164px;margin-bottom: 25px;cursor: pointer;text-decoration: none;color: black;box-shadow: rgb(0 0 0 / 5%) 0px 0px 0px 1px;padding: 10px 0px;margin: 5px;}.mhs_sty_mps{display: flex !important;align-items: center;justify-content: center;}.mhs_sty_mps_task :hover{background: rgb(122 217 255 / 0.17);transition:0.4 ease-in-out;}h6.p-2.bg-gray34.text-center.bgtimebackground {background: #005c0b;color: white;}
      label.form-label {
      width: 100%;
      background: #ededed;
      }
      .box-shadow{
      box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
      background: blanchedalmond;
      }
      .schooolinfo1{
      color:green;
      }
      #preview {
      width: 100%;
      max-width: 300px;
      margin: 10px 0;
      box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      }
      a.collapse-class {
      background: azure;
      padding: 2px 10px;
      border-radius: 10px;
      color: #d700c6;
      box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
      }
      .schoolinfoa{
        padding: 6px;
    background: blueviolet;
    color: white;
    margin-top: 10px;
      }
      .schoolinfoa:hover{
        color: #fff;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
        background:navy;
      }
      .card-header:first-child {
    background: bisque;
}
.showdtldpage{
    position: relative;
}
a.schoolinfoa1.text-right {
    position: absolute;
    right: 0;
}
.addremoveColumns{
    padding:10px;
}
.addremoveColumns:hover{
    cursor: pointer;
}
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php require('nav.php');?>
      <?php 
        $getSchoolStatus = $this->Menu_model->get_status();
        $ss = $getschoolinfo[0]->status;
        $status=$this->Menu_model->get_statusbyid($ss);
        $pi=$getschoolinfo[0]->pi_id;
        $pi=$this->Menu_model->get_user_byid($pi);
        
        
        
        $saddress = $getschoolinfo[0]->saddress;
        $sdistrict = $getschoolinfo[0]->sdistrict;
        $sstat = $getschoolinfo[0]->sstate;
        
          $call=0;
          $visit=0;
          $uti=0;
          $what=0;
          $email=0;
          $report=0;
          $slog=$this->Menu_model->get_schoollogs($sid);
          foreach($slog as $sl){
              if($sl->task_type=='Call'){$call++;}
              if($sl->task_type=='Visit'){$visit++;}
              if($sl->task_type=='Utilisation'){$uti++;}
              if($sl->task_type=='Whatsapp'){$what++;}
              if($sl->task_type=='Email'){$email++;}
              if($sl->task_type=='Report'){$report++;}
          }
        
         foreach($spddtld as $d){
              $pcode = $d->project_code;
              $sname = $d->sname;
              $sid = $d->id;
              $pi = $d->pi_id;
              $zh = $d->zh_id;
              $ins = $d->ins_id;
              $pin=$this->Menu_model->get_user_byid($pi);
              $zhn=$this->Menu_model->get_user_byid($zh);
              $insn=$this->Menu_model->get_user_byid($ins);
              $program=$this->Menu_model->get_clientbypc($pcode);
              $programid=$program[0]->id;
              $status1 = 'New School';
              $status2 = 'FTTP Done';
              $status3 = 'Active School';
              $status4 = 'Average School';
              $status5 = 'Good School';
              $status6 = 'Model School';
              $status7 = 'Client Readines';
          }
        
          $getSchoolZoneByid=$this->Menu_model->getSchoolZoneByid($d->szone);
         
        ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid ">
            <?php   
            
             // Output grouped data
            //  dd($groupedData);
             
             ?>
             
                
              
            <div class="card p-4">
              <div class=" card p-2">
              <div class="text-right mt-2">
              
                    <a class="schoolinfoa" target="_BLANK" href="<?=base_url();?>Menu/school_detail/<?=$sid?>">School Detail</a>
                </div>
              <center>
                <h3>School Review </h3>
               
                  <hr width="40%">
                
               
                  <i>
                    <h4><i>School Name :  <u><?= $d->sname ?></i></u></h4>
                    <h5><i>Project Code : <u><?= $d->project_code ?></i></u></h5>
                    <h6><i>Year : <u><?= $d->sayear ?></i></u></h6>
                  </i>
                
                </center>
                
              </div>

              <div class="text-center timerbg mt-2 mb-4">
            <div class="timerbgrt">
              <!-- <p>Time Spent in Review:</p> -->
              <div id="timer">00:00:00</div>
            </div>
          </div>


              <div class="form-box text--center card p-4">
                <form class="row g-3" id="schoolreviewform" action="<?=base_url();?>Menu/SchoolReviewByPIA" enctype="multipart/form-data" method="post" onsubmit="return validateForm()" >
                  <div class="col-md-12">
                    <div class="box-shadow p-2 m-1">
                    <input type="hidden" name="sid" value="<?=$sid ?>">
                    <input type="hidden" name="projectcode" value="<?=$d->project_code ?>">
                      <p> <i><b>It is right Project Code :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $d->project_code ?></i></span> </p>
                      <input type="hidden" name="projectCode_Q" value="It is right Project Code">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="pr1" value="Yes"  name="projectCode_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="pr1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="pr2" value="No"  name="projectCode_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="pr2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" class="form-control" value="<?= $d->project_code ?>" id="projectCode" name="projectCode_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is right School Academic Year :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $d->sayear ?></i></span> </p>
                      <input type="hidden" name="schoolAcademicYear_Q" value="It is right School Academic Year">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="syear1" value="Yes"  name="schoolAcademicYear_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="syear1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="syear2" value="No"  name="schoolAcademicYear_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="syear2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" class="form-control" value="<?= $d->sayear ?>" id="schoolAcademicYear" name="schoolAcademicYear_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is right School Name :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $getschoolinfo[0]->sname ?></i></span> </p>
                      <input type="hidden" name="schoolName_Q" value="It is right School Namer">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" value="Yes"  name="schoolName_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" value="No"  name="schoolName_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" class="form-control" value="<?= $getschoolinfo[0]->sname ?>" id="schoolName" name="schoolName_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p><i><b>School address are right or not :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $saddress ?> </i></span> </p>
                      <input type="hidden" name="schoolAddress_Q" value="School address are right or not">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline5" value="Yes" name="schoolAddress_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline5">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline6" value="No" name="schoolAddress_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline6">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" class="form-control" value="<?= $saddress ?>" id="schoolAddress" name="schoolAddress_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p><i><b>School Pin Code are right or not :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?php if($d->spincode ==''){echo "NA";}else{echo $d->spincode; } ?> </i></span> </p>
                      <input type="hidden" name="schoolPincode_Q" value="School Pin Code are right or not">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="spincode1" value="Yes" name="schoolPincode_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="spincode1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="spincode2" value="No" name="schoolPincode_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="spincode2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" class="form-control" value="<?= $d->spincode ?>" id="schoolPincode" name="schoolPincode_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>School District are Right or Not :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $sdistrict ?> </i></span> </p>
                      <input type="hidden" name="schoolDistrict_Q" value="School District are Right or Not">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline7" value="Yes" name="schoolDistrict_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline7">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline8" value="No" name="schoolDistrict_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline8">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?= $sdistrict ?>" class="form-control" id="schoolDistrict" name="schoolDistrict_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>School State are Right or Not :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $sstat ?> </i></span> </p>
                      <input type="hidden" name="schoolState_Q" value="School State are Right or Not">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline9" value="Yes" name="schoolState_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline9">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline10" value="No" name="schoolState_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline10">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?= $sstat ?>" class="form-control" id="schoolState" name="schoolState_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>School Tehshil are Right or Not :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $d->tehshil ?> </i></span> </p>
                      <input type="hidden" name="schoolTehshil_Q" value="School Tehshil are Right or Not">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="tehshil1" value="Yes" name="schoolTehshil_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="tehshil1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="tehshil2" value="No" name="schoolTehshil_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="tehshil2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?= $d->tehshil ?>" class="form-control" id="schoolTehshil" name="schoolTehshil_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>School Google Map Location are Right or Not :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?php if($d->slocation == 'NA'){echo 'NA';}else{echo "<a href='$d->slocation' target='_blank' >$d->slocation</a>";} ?> </i></span> </p>
                      <input type="hidden" name="schoolLocation_Q" value="School Google Map Location are Right or Not">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="slocation1" value="Yes" name="schoolLocation_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="slocation1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="slocation2" value="No" name="schoolLocation_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="slocation2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?= $d->slocation ?>" class="form-control" id="schoolLocation" name="schoolLocation_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>School Language are Right or Not :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $d->slanguage  ?> </i></span> </p>
                      <input type="hidden" name="schoolLanguage_Q" value="School Language are Right or Not">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="slanguage1" value="Yes" name="schoolLanguage_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="slanguage1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="slanguage2" value="No" name="schoolLanguage_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="slanguage2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?= $d->slanguage ?>" class="form-control" id="schoolLanguage" name="schoolLanguage_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Right Contact Number :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$d->contact_no?></i></span> </p>
                      <input type="hidden" name="schoolContact_Q" value="It is Right Contact Number">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb21" value="Yes" name="schoolContact_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb21">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb22" value="No" name="schoolContact_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb22">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$d->contact_no?>" class="form-control" id="schoolContact" name="schoolContact_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Right Email Address :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?php if($d->email ==''){echo "NA";}else{echo $d->email; } ?></i></span> </p>
                      <input type="hidden" name="schoolEmailAddress_Q" value="It is Right Email Address">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb23" value="Yes" name="schoolEmailAddress_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb23">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb24" value="No" name="schoolEmailAddress_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb24">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$d->email?>" class="form-control" id="schoolEmailAddress" name="schoolEmailAddress_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Right Website :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$d->website?></i></span> </p>
                      <input type="hidden" name="schoolWebsite_Q" value="It is Right Website">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb25" value="Yes" name="schoolWebsite_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb25">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb26" value="No" name="schoolWebsite_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb26">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$d->website?>" class="form-control" id="schoolWebsite" name="schoolWebsite_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Whatsapp Group Name :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$d->waname?></i></span> </p>
                      <input type="hidden" name="schoolWaname_Q" value="It is Whatsapp Group Name">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="waname1" value="Yes" name="schoolWaname_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="waname1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="waname2" value="No" name="schoolWaname_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="waname2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$d->waname?>" class="form-control" id="schoolWaname" name="schoolWaname_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Whatsapp Group Link :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><a href="<?=$d->wanamelink?>" target="_blank"><?=$d->wanamelink?></a></i></span> </p>
                      <input type="hidden" name="schoolWanameLink_Q" value="It is Whatsapp Group Link">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="wanamelink1" value="Yes" name="schoolWanameLink_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="wanamelink1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="wanamelink2" value="No" name="schoolWanameLink_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="wanamelink2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$d->wanamelink?>" class="form-control" id="schoolWanameLink" name="schoolWanameLink_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Right total Teachers in School :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$d->total_teachers?></i></span> </p>
                      <input type="hidden" name="schooltotalTeachers_Q" value="It is Right total Teachers in School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="total_teachers1" value="Yes" name="schooltotalTeachers_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="total_teachers1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="total_teachers2" value="No" name="schooltotalTeachers_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="total_teachers2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$d->total_teachers?>" class="form-control" id="schooltotalTeachers" name="schooltotalTeachers_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Right total Student in School :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$d->total_students?></i></span> </p>
                      <input type="hidden" name="schooltotalStudents_Q" value="It is Right total Student in School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="total_students1" value="Yes" name="schooltotalStudents_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="total_students1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="total_students2" value="No" name="schooltotalStudents_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="total_students2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$d->total_students?>" class="form-control" id="schooltotalStudents" name="schooltotalStudents_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Right total Boys in School :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$d->boys?></i></span> </p>
                      <input type="hidden" name="schooltotalBoys_Q" value="It is Right total Boys in School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="boys1" value="Yes" name="schooltotalBoys_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="boys1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="boys2" value="No" name="schooltotalBoys_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="boys2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$d->boys?>" class="form-control" id="schooltotalBoys" name="schooltotalBoys_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Right total Girls in School :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$d->girls?></i></span> </p>
                      <input type="hidden" name="schooltotalGirls_Q" value="It is Right total Girls in School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="girls1" value="Yes" name="schooltotalGirls_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="girls1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="girls2" value="No" name="schooltotalGirls_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="girls2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$d->girls?>" class="form-control" id="schooltotalGirls" name="schooltotalGirls_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Right School Timing :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$d->timing?></i></span> </p>
                      <input type="hidden" name="schoolTiming_Q" value="It is Right School Timing">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="timing1" value="Yes" name="schoolTiming_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="timing1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="timing2" value="No" name="schoolTiming_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="timing2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$d->timing?>" class="form-control" id="schoolTiming" name="schoolTiming_name" >
                      </div>
                    </div>
                    <!-- <div class="box-shadow p-2 m-1">
                      <p> <i><b>Installation Report are upload or not :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$d->timing?></i></span> </p>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="schoolInsReport1" value="Yes" name="schoolInsReport_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="schoolInsReport1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="schoolInsReport2" value="No" name="schoolInsReport_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="schoolInsReport2">No</label>
                      </div>
                      <div class="mt-2">
                      <div class="row">
                        <div class="col">
                          <input type="file" class="form-control-file" id="schoolInsReport" name="schoolInsReport"  accept="image/*,application/pdf" onchange="previewFile()" >
                            <p class="p-2" id="fileError1"></p>
                        </div>
                            <div class="col">
                                <div id="preview1"></div>
                                
                        </div>
                        
                        </div>
                      </div>
                      </div> -->
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Right Zone of School :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$getSchoolZoneByid[0]->name?></i></span> </p>
                      <input type="hidden" name="schoolZone_Q" value="It is Right Zone of School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="szone1" value="Yes" name="schoolZone_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="szone1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="szone2" value="No" name="schoolZone_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="szone2">No</label>
                      </div>
                      <div class="mt-2">
                        <select class="form-control" name="schoolZone_name" id="schoolZone">
                          <option selected disabled>Select School Status</option>
                          <?php foreach($getSchoolZone as $ss){ ?>
                          <option value="<?= $ss->id ?>"><?= $ss->name ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <p> <i><b>It is Current Status :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $status[0]->name?> </i></span> </p>
                      <input type="hidden" name="schoolStatus_Q" value="It is Current Status">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline3" value="Yes" name="schoolStatus_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline4" value="No" name="schoolStatus_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline4">No</label>
                      </div>
                      <div class="mt-2">
                        <select class="form-control" name="schoolStatus_name" id="schoolStatus">
                          <option selected disabled>Select School Status</option>
                          <?php foreach($getSchoolStatus as $ss){ ?>
                          <option value="<?= $ss->id ?>"><?= $ss->name ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1">
                      <div class="tect-center card p-3">
                        <h5>School Contact Person Detail</h5>
                      </div>

                    

                      <?php 
                      
                    //   echo "<pre>";
                    //   print_r($dtc);
                    //   die;
                      foreach ($dtc as $key => $value): ?>
                       
                      <div class="form-group">
                        <div class="row">
                          <div class="col">
                            <label>Contact Name:</label>
                            <input type="text" class="custom-control" name="contact_name[]" value="<?php echo $value->contact_name; ?>">
                          </div>
                          <div class="col">
                            <label>Designation:</label>
                            <input type="text" class="custom-control" name="designation[]" value="<?php echo $value->designation; ?>">
                          </div>
                          <div class="col">
                            <label>Contact Number:</label>
                            <input type="text" class="custom-control" name="contact_no[]" value="<?php echo $value->contact_no; ?>">
                          </div>
                          <div class="col">
                            <label>Email:</label>
                            <input type="text" class="custom-control" name="email[]" value="<?php echo $value->email; ?>">
                          </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="col text-right mt-3">
                            <span> <strong>Add More Contact Details :</strong> </span>
                            <span class="addremoveColumns bg-primary" width="40px" onclick="addColumns()">+</span>
                            <span class="addremoveColumns bg-danger" width="40px" onclick="removeColumns()">-</span>
                        </div>
                        <div class="row" id="schoolContactGroup" >
                            
                        </div>
                      </div>
                    
                    </div>
                    <div class="box-shadow p-2 m-1" style="width:100%;" >
                      <p> <i><b>It is Right Instaltion Person Name :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?php if($insn){echo $insn[0]->fullname;}?> </i></span> </p>
                      <input type="hidden" name="schoolInstaltionPerson_Q" value="It is Right Instaltion Person Name">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb15" value="Yes" name="schoolInstaltionPerson_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb15">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb16" value="No" name="schoolInstaltionPerson_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb16">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?php if($insn){echo $insn[0]->fullname;}?>" class="form-control" id="schoolInstaltionPerson" name="schoolInstaltionPerson_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1" style="width:100%;" >
                      <p> <i><b>It is Right PIA Person Name :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$pin[0]->fullname?></i></span> </p>
                      <input type="hidden" name="schoolPIAPerson_Q" value="It is Right PIA Person Name">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb17" value="Yes" name="schoolPIAPerson_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb17">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb18" value="No" name="schoolPIAPerson_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb18">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$pin[0]->fullname?>" class="form-control" id="schoolPIAPerson" name="schoolPIAPerson_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1" style="width:100%;" >
                      <p> <i><b>It is Right Zonal Head Person Name :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$zhn[0]->fullname?></i></span> </p>
                      <input type="hidden" name="schoolZonalHead_Q" value="It is Right Zonal Head Person Name">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb19" value="Yes" name="schoolZonalHead_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb19">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb20" value="No" name="schoolZonalHead_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb20">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$zhn[0]->fullname?>" class="form-control" id="schoolZonalHead" name="schoolZonalHead_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1" style="width:100%;" >
                      <p class="showdtldpage"> <i><b>School Total Call :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $call ?> </i></span> 
                      <a class="schoolinfoa1 text-right" target="_BLANK" href="<?=base_url();?>Menu/SchoolReviewTaskDetails/Call/<?=$sid?>">ℹ️</a>
                    </p>
                      <input type="hidden" name="schoolCall_Q" value="School Total Call">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb1" value="Yes" name="schoolCall_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb1">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb2" value="No" name="schoolCall_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb2">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?= $call ?>" class="form-control" id="schoolCall" name="schoolCall_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1" style="width:100%;" >
                     
                    <p class="showdtldpage"> <i><b>School Total visit :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $visit ?> </i></span>
                        <a class="schoolinfoa1 text-right" target="_BLANK" href="<?=base_url();?>Menu/SchoolReviewTaskDetails/Visit/<?=$sid?>">ℹ️</a>
                    </p>
                     <input type="hidden" name="schoolVisit_Q" value="School Total visit">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb3" value="Yes" name="schoolVisit_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb3">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb4" value="No" name="schoolVisit_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb4">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" class="form-control" value="<?= $visit ?>" id="schoolVisit" name="schoolVisit_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1" style="width:100%;" >
                      <p class="showdtldpage"> <i><b>School Total Email :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $email ?> </i></span>
                      <a class="schoolinfoa1 text-right" target="_BLANK" href="<?=base_url();?>Menu/SchoolReviewTaskDetails/Email/<?=$sid?>">ℹ️</a>
                    </p>
                      <input type="hidden" name="schoolEmail_Q" value="School Total Email">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb5" value="Yes" name="schoolEmail_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb5">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb6" value="No" name="schoolEmail_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb6">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" class="form-control" value="<?= $visit ?>" id="schoolEmail" name="schoolEmail_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1" style="width:100%;" >
                      <p class="showdtldpage"> <i><b>School Total Report :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $report ?> </i></span>
                      <a class="schoolinfoa1 text-right" target="_BLANK" href="<?=base_url();?>Menu/SchoolReviewTaskDetails/Report/<?=$sid?>">ℹ️</a>
                    </p>
                      <input type="hidden" name="schoolReport_Q" value="School Total Report">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb7" value="Yes" name="schoolReport_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb7">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb8" value="No" name="schoolReport_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb8">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" class="form-control" value="<?= $report ?>" id="schoolReport" name="schoolReport_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1" style="width:100%;" >
                      <p class="showdtldpage"> <i><b>School Total Communication :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $what ?> </i></span>
                      <a class="schoolinfoa1 text-right" target="_BLANK" href="<?=base_url();?>Menu/SchoolReviewTaskDetails/Communication/<?=$sid?>">ℹ️</a>
                    </p>
                      <input type="hidden" name="schoolCommunication_Q" value="School Total Communication">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb9" value="Yes" name="schoolCommunication_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb9">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb10" value="No" name="schoolCommunication_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb10">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" class="form-control" value="<?= $what ?>" id="schoolCommunication" name="schoolCommunication_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1" style="width:100%;" >
                      <p class="showdtldpage"> <i><b>School Total Utilisation :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= $uti ?> </i></span>
                      <a class="schoolinfoa1 text-right" target="_BLANK" href="<?=base_url();?>Menu/SchoolReviewTaskDetails/Utilisation/<?=$sid?>">ℹ️</a>
                    </p>
                      <input type="hidden" name="schoolUtilisation_Q" value="School Total Utilisation">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb11" value="Yes" name="schoolUtilisation_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb11">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb12" value="No" name="schoolUtilisation_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb12">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?= $uti ?>" class="form-control" id="schoolUtilisation" name="schoolUtilisation_name" >
                      </div>
                    </div>
                    <div class="box-shadow p-2 m-1" style="width:100%;" >
                      <p class="showdtldpage"> <i><b>Total Log in School :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?= sizeof($slog) ?> </i></span>
                      <a class="schoolinfoa1 text-right" target="_BLANK" href="<?=base_url();?>Menu/SchoolReviewTaskDetails/TotalLoginSchool/<?=$sid?>">ℹ️</a>
                    </p>
                      <input type="hidden" name="schoolLog_Q" value="Total Log in School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb13" value="Yes" name="schoolLog_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb13">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb14" value="No" name="schoolLog_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb14">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=sizeof($slog) ?>" class="form-control" id="schoolLog" name="schoolLog_name" >
                      </div>
                     </div>
                    <!-- <hr>
                    <div class="box-shadow p-2 m-1">
                      <div class="text-center card p-3">
                        <h6>Status Conversion</h6>
                      </div>
                      <p> <i><b>How Many New School to FTTP Done in this School :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$this->Menu_model->get_sconversion($status1,$status2,$sid);?></i></span> </p>
                      <input type="hidden" name="newSchooltoFTTP_Q" value="How Many New School to FTTP Done in this School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb27" value="Yes" name="newSchooltoFTTP_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb27">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb28" value="No" name="newSchooltoFTTP_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb28">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$this->Menu_model->get_sconversion($status1,$status2,$sid);?>" class="form-control" id="newSchooltoFTTP" name="newSchooltoFTTP_name" >
                      </div>
                      <hr>
                      <p> <i><b>How Many FTTP Done to Active School :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$this->Menu_model->get_sconversion($status2,$status3,$sid);?></i></span> </p>
                      <input type="hidden" name="fTTPDonetoActiveSchool_Q" value="How Many FTTP Done to Active School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb29" value="Yes" name="fTTPDonetoActiveSchool_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb29">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb30" value="No" name="fTTPDonetoActiveSchool_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb30">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$this->Menu_model->get_sconversion($status2,$status3,$sid);?>" class="form-control" id="fTTPDonetoActiveSchool" name="fTTPDonetoActiveSchool_name" >
                      </div>
                      <hr>
                      <p> <i><b>How Many Active to Average School  :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$this->Menu_model->get_sconversion($status3,$status4,$sid);?></i></span> </p>
                      <input type="hidden" name="activetoAverageSchool_Q" value="How Many Active to Average School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb31" value="Yes" name="activetoAverageSchool_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb31">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb32" value="No" name="activetoAverageSchool_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb32">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$this->Menu_model->get_sconversion($status3,$status4,$sid);?>" class="form-control" id="activetoAverageSchool" name="activetoAverageSchool_name" >
                      </div>
                      <hr>
                      <p> <i><b>How Many Average to Good School  :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$this->Menu_model->get_sconversion($status4,$status5,$sid);?></i></span> </p>
                      <input type="hidden" name="averagetoGoodSchool_Q" value="How Many Average to Good School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb33" value="Yes" name="averagetoGoodSchool_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb33">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb34" value="No" name="averagetoGoodSchool_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb34">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$this->Menu_model->get_sconversion($status4,$status5,$sid);?>" class="form-control" id="averagetoGoodSchool" name="averagetoGoodSchool_name" >
                      </div>
                      <hr>
                      <p> <i><b>How Many Good to Model School  :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$this->Menu_model->get_sconversion($status5,$status6,$sid);?></i></span> </p>
                      <input type="hidden" name="goodtoModelSchool_Q" value="How Many Good to Model School">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb35" value="Yes" name="goodtoModelSchool_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb35">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb36" value="No" name="goodtoModelSchool_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb36">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$this->Menu_model->get_sconversion($status5,$status6,$sid);?>" class="form-control" id="goodtoModelSchool" name="goodtoModelSchool_name" >
                      </div>
                      <hr>
                      <p> <i><b>How Many Model to Client Readines :</b> &nbsp;&nbsp;  <span class="schooolinfo1"><?=$this->Menu_model->get_sconversion($status6,$status7,$sid);?></i></span> </p>
                      <input type="hidden" name="modeltoClientReadines_Q" value="How Many Model to Client Readines">
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb37" value="Yes" name="modeltoClientReadines_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb37">Yes</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="cb38" value="No" name="modeltoClientReadines_Checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="cb38">No</label>
                      </div>
                      <div class="mt-2">
                        <input type="text" value="<?=$this->Menu_model->get_sconversion($status6,$status7,$sid);?>" class="form-control" id="modeltoClientReadines" name="modeltoClientReadines_name" >
                      </div>
                    </div>
                    <br> -->
                  
                    <div id="accordion" style="width:100%;" >
                        <div class="card">
                            <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Have you uploaded the Installation Report?
                                </a>
                            </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                            
                               <div class="box-shadow p-2 m-1">
                               
                    
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="file1" value="Yes" name="installationReport_Checkbox" class="custom-control-input">
                                    <label class="custom-control-label" for="file1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="file2" value="No" name="installationReport_Checkbox" class="custom-control-input">
                                    <label class="custom-control-label" for="file2">No</label>
                                </div>
                                <div class="mt-2">
                                <div class="row" id="fileInput1div" >
                                        <div class="col">
                                        <label for="fileInput">Add Installation Report</label>
                                        <input type="file" class="form-control-file" id="fileInput1" size="20" name="installationReport"  accept="image/*,application/pdf" onchange="previewFile()" >
                                        <p class="p-2" id="fileError1"></p>
                                        </div>
                                        <div class="col">
                                        <div id="preview"></div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                            </div>
                        </div>


                  </div>
                  <div class="col-12 text-center mt-4">
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <br><br>
          <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer text-center">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
          $("#schoolName").hide();
          $("#schoolStatus").hide();
          $("#schoolAddress").hide();
          $("#schoolDistrict").hide();
          $("#schoolState").hide();
          $("#schoolCall").hide();
          $("#schoolVisit").hide();
          $("#schoolEmail").hide();
          $("#schoolReport").hide();
          $("#schoolCommunication").hide();
          $("#schoolUtilisation").hide();
          $("#schoolLog").hide();
          $("#schoolInstaltionPerson").hide();
          $("#schoolPIAPerson").hide();
          $("#schoolZonalHead").hide();
          $("#schoolContact").hide();
          $("#schoolEmailAddress").hide();
          $("#schoolWebsite").hide();
        //   $("#newSchooltoFTTP").hide();
        //   $("#fTTPDonetoActiveSchool").hide();
        //   $("#activetoAverageSchool").hide();
        //   $("#averagetoGoodSchool").hide();
        //   $("#goodtoModelSchool").hide();
        //   $("#modeltoClientReadines").hide();
          $("#projectCode").hide();
          $("#schoolAcademicYear").hide();
          $("#schoolZone").hide();
          $("#schoolTehshil").hide();
          $("#schoolLocation").hide();
          $("#schoolLanguage").hide();
          $("#schoolPincode").hide();
          $("#schoolWaname").hide();
          $("#schoolWanameLink").hide();
          $("#schooltotalTeachers").hide();
          $("#schooltotalStudents").hide();
          $("#schooltotalBoys").hide();
          $("#schooltotalGirls").hide();
          $("#schoolTiming").hide();
          $("#schoolInsReport").hide();
          $("#fileInput1div").hide();
      
          $('input[type=radio][name=schoolName_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolName").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolName").show();
                 $('#schoolName').attr("placeholder", "Please Enter School Name");
              }
          });
      
          $('input[type=radio][name=schoolStatus_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolStatus").hide();
              }
              else if (this.value === 'No') {               
                 $("#schoolStatus").show();
              }
          });
          $('input[type=radio][name=schoolAddress_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolAddress").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolAddress").show();
                 $('#schoolAddress').attr("placeholder", "Please Enter School Address");
              }
          });
          $('input[type=radio][name=schoolDistrict_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolDistrict").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolDistrict").show();
                 $('#schoolDistrict').attr("placeholder", "Please Enter School District");
              }
          });
          $('input[type=radio][name=schoolState_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolState").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolState").show();
                 $('#schoolState').attr("placeholder", "Please Enter State of School");
              }
          });
          $('input[type=radio][name=schoolCall_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolCall").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolCall").show();
                 $('#schoolCall').attr("placeholder", "Please Enter No of Call in this School");
              }
          });
          $('input[type=radio][name=schoolVisit_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolVisit").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolVisit").show();
                 $('#schoolVisit').attr("placeholder", "Please Enter No of Visit in this School");
              }
          });
          $('input[type=radio][name=schoolEmail_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolEmail").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolEmail").show();
                 $('#schoolEmail').attr("placeholder", "Please Enter No of Email in this School");
              }
          });
          $('input[type=radio][name=schoolReport_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolReport").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolReport").show();
                 $('#schoolReport').attr("placeholder", "Please Enter No of Report in this School");
              }
          });
          $('input[type=radio][name=schoolCommunication_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolCommunication").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolCommunication").show();
                 $('#schoolCommunication').attr("placeholder", "Please Enter No of Communication in this School");
              }
          });
          $('input[type=radio][name=schoolUtilisation_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolUtilisation").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolUtilisation").show();
                 $('#schoolUtilisation').attr("placeholder", "Please Enter No of Utilisation in this School");
              }
          });
          $('input[type=radio][name=schoolLog_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolLog").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolLog").show();
                 $('#schoolLog').attr("placeholder", "Please Enter No of Log in this School");
              }
          });
          $('input[type=radio][name=schoolInstaltionPerson_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolInstaltionPerson").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolInstaltionPerson").show();
                 $('#schoolInstaltionPerson').attr("placeholder", "Please Enter Name Of Instaltion Person");
              }
          });
          $('input[type=radio][name=schoolPIAPerson_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolPIAPerson").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolPIAPerson").show();
                 $('#schoolPIAPerson').attr("placeholder", "Please Enter PIA Name");
              }
          });
          $('input[type=radio][name=schoolZonalHead_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolZonalHead").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolZonalHead").show();
                 $('#schoolZonalHead').attr("placeholder", "Please Enter Zonal Head Name");
              }
          });
          $('input[type=radio][name=schoolContact_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolContact").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolContact").show();
                 $('#schoolContact').attr("placeholder", "Please Enter School Contact Number");
              }
          });
          $('input[type=radio][name=schoolEmailAddress_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolEmailAddress").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolEmailAddress").show();
                 $('#schoolEmailAddress').attr("placeholder", "Please Enter School Email Address");
              }
          });
          $('input[type=radio][name=schoolWebsite_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolWebsite").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolWebsite").show();
                 $('#schoolWebsite').attr("placeholder", "Please Enter School Website URL");
              }
          });
        //   $('input[type=radio][name=newSchooltoFTTP_Checkbox]').change(function() {
        //       if (this.value === 'Yes') {
        //           $("#newSchooltoFTTP").hide();
        //       }
        //       else if (this.value === 'No') {
        //          $("#newSchooltoFTTP").show();
        //          $('#newSchooltoFTTP').attr("placeholder", "Please Enter New School to FTTP Done count in this School");
        //       }
        //   });
        //   $('input[type=radio][name=fTTPDonetoActiveSchool_Checkbox]').change(function() {
        //       if (this.value === 'Yes') {
        //           $("#fTTPDonetoActiveSchool").hide();
        //       }
        //       else if (this.value === 'No') {
        //          $("#fTTPDonetoActiveSchool").show();
        //          $('#fTTPDonetoActiveSchool').attr("placeholder", "Please Enter FTTP Done to Active School count in this School");
        //       }
        //   });
        //   $('input[type=radio][name=activetoAverageSchool_Checkbox]').change(function() {
        //       if (this.value === 'Yes') {
        //           $("#activetoAverageSchool").hide();
        //       }
        //       else if (this.value === 'No') {
        //          $("#activetoAverageSchool").show();
        //          $('#activetoAverageSchool').attr("placeholder", "Please Enter Active to Average School count in this School");
        //       }
        //   });
        //   $('input[type=radio][name=averagetoGoodSchool_Checkbox]').change(function() {
        //       if (this.value === 'Yes') {
        //           $("#averagetoGoodSchool").hide();
        //       }
        //       else if (this.value === 'No') {
        //          $("#averagetoGoodSchool").show();
        //          $('#averagetoGoodSchool').attr("placeholder", "Please Enter Average to Good School count in this School");
        //       }
        //   });
        //   $('input[type=radio][name=goodtoModelSchool_Checkbox]').change(function() {
        //       if (this.value === 'Yes') {
        //           $("#goodtoModelSchool").hide();
        //       }
        //       else if (this.value === 'No') {
        //          $("#goodtoModelSchool").show();
        //          $('#goodtoModelSchool').attr("placeholder", "Please Enter Good to Model School count in this School");
        //       }
        //   });
        //   $('input[type=radio][name=modeltoClientReadines_Checkbox]').change(function() {
        //       if (this.value === 'Yes') {
        //           $("#modeltoClientReadines").hide();
        //       }
        //       else if (this.value === 'No') {
        //          $("#modeltoClientReadines").show();
        //          $('#modeltoClientReadines').attr("placeholder", "Please Enter Model to Client Readines count in this School");
        //       }
        //   });
          $('input[type=radio][name=projectCode_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#projectCode").hide();
              }
              else if (this.value === 'No') {
                 $("#projectCode").show();
                 $('#projectCode').attr("placeholder", "Please Enter Project Code of this School");
              }
          });
          $('input[type=radio][name=schoolAcademicYear_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolAcademicYear").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolAcademicYear").show();
                 $('#schoolAcademicYear').attr("placeholder", "Please Enter School Academic Year of this School");
              }
          });
          $('input[type=radio][name=schoolZone_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolZone").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolZone").show();
                 }
          });
          $('input[type=radio][name=schoolTehshil_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolTehshil").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolTehshil").show();
                 $('#schoolAcademicYear').attr("placeholder", "Please Enter School Tehshil Name");
                 }
          });
          $('input[type=radio][name=schoolLocation_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolLocation").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolLocation").show();
                 $('#schoolLocation').attr("placeholder", "Please Add School Google Map Location");
                 }
          });
          $('input[type=radio][name=schoolLanguage_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolLanguage").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolLanguage").show();
                 $('#schoolLanguage').attr("placeholder", "Please Add School Language");
                 }
          });
          $('input[type=radio][name=schoolPincode_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolPincode").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolPincode").show();
                 $('#schoolPincode').attr("placeholder", "Please Enter School Pin Code");
                 }
          });
          $('input[type=radio][name=schoolWaname_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolWaname").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolWaname").show();
                 $('#schoolWaname').attr("placeholder", "Please Enter Whatsapp Group Name of these School");
                 }
          });
          $('input[type=radio][name=schoolWanameLink_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolWanameLink").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolWanameLink").show();
                 $('#schoolWanameLink').attr("placeholder", "Please Enter Whatsapp Group Link of these School");
                 }
          });
          $('input[type=radio][name=schooltotalTeachers_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schooltotalTeachers").hide();
              }
              else if (this.value === 'No') {
                 $("#schooltotalTeachers").show();
                 $('#schooltotalTeachers').attr("placeholder", "Please Enter Total Teacher in these School");
                 }
          });
          $('input[type=radio][name=schooltotalStudents_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schooltotalStudents").hide();
              }
              else if (this.value === 'No') {
                 $("#schooltotalStudents").show();
                 $('#schooltotalStudents').attr("placeholder", "Please Enter Total Student in these School");
                 }
          });
          $('input[type=radio][name=schooltotalBoys_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schooltotalBoys").hide();
              }
              else if (this.value === 'No') {
                 $("#schooltotalBoys").show();
                 $('#schooltotalBoys').attr("placeholder", "Please Enter Total Boys in these School");
                 }
          });
      
          $('input[type=radio][name=schooltotalGirls_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schooltotalGirls").hide();
              }
              else if (this.value === 'No') {
                 $("#schooltotalGirls").show();
                 $('#schooltotalGirls').attr("placeholder", "Please Enter Total Girls in these School");
                 }
          });
          $('input[type=radio][name=schoolTiming_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolTiming").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolTiming").show();
                 $('#schoolTiming').attr("placeholder", "Please Enter Timing of these School");
                 }
          });
          $('input[type=radio][name=schoolInsReport_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#schoolInsReport").hide();
              }
              else if (this.value === 'No') {
                 $("#schoolInsReport").show();
                 $('#schoolInsReport').attr("placeholder", "Please Enter Timing of these School");
                 }
          });
          $('input[type=radio][name=installationReport_Checkbox]').change(function() {
              if (this.value === 'Yes') {
                  $("#fileInput1div").hide();
              }
              else if (this.value === 'No') {
                 $("#fileInput1div").show();
               
                 }
          });
      });
    </script>
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
      function previewFile() {
      const fileInput = document.getElementById('fileInput1');
      const preview = document.getElementById('preview');
      
      while (preview.firstChild) {
      preview.removeChild(preview.firstChild);
      }
      
      const file = fileInput.files[0];
      const reader = new FileReader();
      
      reader.addEventListener('load', function () {
      if (file.type.startsWith('image')) {
          const img = document.createElement('img');
          img.src = reader.result;
          img.style.maxWidth = '100%';
          preview.appendChild(img);
      } else if (file.type === 'application/pdf') {
          const embed = document.createElement('embed');
          embed.src = reader.result;
          embed.width = '100%';
          embed.height = '400px'; // Adjust height as needed
          preview.appendChild(embed);
      } else {
          const p = document.createElement('p');
          p.textContent = 'Unsupported file type';
          preview.appendChild(p);
      }
      });
      
      if (file) {
      reader.readAsDataURL(file);
      }
      }
      
      function validateForm() {

        var inputplantime = $("#timer").text();
        if(inputplantime !==''){
        var plantime = '<input type="hidden" name="schoolreviewtime" value="'+inputplantime+'"/>';
        $("#schoolreviewform").append(plantime);
        }

        var radios = document.getElementsByName('installationReport_Checkbox');
        var checkedValue = null;
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                checkedValue = radios[i].value;
                break;
            }
        }
             if (checkedValue === 'No') {
                 const fileInput = document.getElementById('fileInput1');
                        const file = fileInput.files[0];
                        if (!file) {
                        alert('Please Add Installation Report');
                        $("#fileError1").text("Please Add Installation Report *");
                        $("#fileError1").css("color", "red");;
                        return false;
                         }else{
                            return true;
                         }
                 }

      }
      
      $(document).ready(function() {
    var startTime = new Date().getTime(); // Get the current timestamp in milliseconds

    setInterval(function() {
        var currentTime = new Date().getTime(); // Get the current timestamp in milliseconds
        var elapsedTime = currentTime - startTime; // Calculate the elapsed time in milliseconds

        // Convert milliseconds to hours, minutes, and seconds
        var hours = Math.floor(elapsedTime / (1000 * 60 * 60));
        var minutes = Math.floor((elapsedTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((elapsedTime % (1000 * 60)) / 1000);

        // Add leading zeros if necessary
        hours = (hours < 10) ? "0" + hours : hours;
        minutes = (minutes < 10) ? "0" + minutes : minutes;
        seconds = (seconds < 10) ? "0" + seconds : seconds;

        // Display the elapsed time in the format HH:MM:SS
        $('#timer').text(hours + ":" + minutes + ":" + seconds);
    }, 1000); // Update the timer every second (1000 milliseconds)
});

function addColumns() {
    var newRow = document.createElement('div');
    newRow.className = 'row';
    newRow.innerHTML = `
        <div class="col">
            <label>Contact Name:</label>
            <input type="text" class="custom-control" name="contact_name[]" value="">
        </div>
        <div class="col">
            <label>Designation:</label>
            <input type="text" class="custom-control" name="designation[]" value="">
        </div>
        <div class="col">
            <label>Contact Number:</label>
            <input type="text" class="custom-control" name="contact_no[]" value="">
        </div>
        <div class="col">
            <label>Email:</label>
            <input type="text" class="custom-control" name="email[]" value="">
        </div>
    `;

    document.getElementById('schoolContactGroup').appendChild(newRow);
}

        function removeColumns() {
            var rows = document.getElementById('schoolContactGroup').getElementsByClassName('row');
            // if (rows.length > 1) {
                rows[rows.length - 1].remove();
            // }
        }
    </script>
  </body>
</html>