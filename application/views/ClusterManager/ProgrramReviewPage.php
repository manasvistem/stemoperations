<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Program Review Page |   STEM </title>
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
      tr td:first-child {
      font-weight: 600;
      }
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php require('nav.php');?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid ">
            <div class="card p-4">
              <div class=" card p-2">
                <center>
                  <h3>Program Review </h3>
                  <hr width="40%">
                  <i>
                    <h5><i>Project Code : <u><?= $projectcode ?></i></u></h5>
                    <h6><i>Year : <u><?= $year ?></i></u></h6>
                  </i>
                </center>
              </div>
              <div class="text-center timerbg mt-2 mb-4">
                <div class="timerbgrt">
                  <div id="timer">00:00:00</div>
                </div>
              </div>
              <?php if ($this->session->flashdata('success_message')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> <?php echo $this->session->flashdata('success_message'); ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif; ?>
              <div class="formbody p-2">
                <?php   $spds = $this->Menu_model->get_spdbypc($projectcode);

                    // echo "<pre>";
                    // print_r($spds);
               
                  ?>
                <div id="accordion">
                  <?php 
                    $last_element = end($spds);
                    // dd($last_element->id);
                    $i=1;  foreach ($spds as $spdh => $spd) {
                        $reviewdone = $this->Menu_model->getProgramReviewSchool($projectcode,$spd->id);
                        $reviewdonecount = sizeof($reviewdone);
                      ?>
                  <form id="programreviewform" action="<?=base_url();?>Menu/ProgramReviewByPm" method="post" onsubmit="return validateForm()" >
                    <div class="was-validated">
                      <div class="card">
                        <?php
                          if ($reviewdonecount !== 0) {
                              $background_color = "background:green;color:white;";
                              $margin = "margin: 4px 10px;";
                              $style = $background_color . $margin;
                              $comStaus = "<b> - Complete</b>";
                              $colors = "color:white;";
                              }else{
                              $background_color = "background: rgba(" . rand(200, 255) . ", " . rand(100, 255) . ", " . rand(0, 255) . ", 0.8);";
                              $margin = "margin: 4px 10px;";
                              $margin = "color:white;";
                              $style = $background_color . $margin;
                              $comStaus = '';
                          }
                          ?>
                        <div class="card-header" id="headingOne<?=$i?>" style="<?= $background_color;?>"  >
                          <div class="row">
                            <div class="col-md-12">
                              <h5 class="mb-0">
                                <a class="btn" style="<?=$colors ?>" data-toggle="collapse" data-target="#collapseOne<?=$i?>" aria-expanded="true" aria-controls="collapseOne<?=$i?>">
                                <b>School Name : </b><?=$spd->sname ?>  <?= $comStaus ?>
                                </a>
                              </h5>
                            </div>
                          </div>
                        </div>
                        <?php if($i==1){$show = 'show';}else{$show ='';} ?>
                        <!-- <input type="hidden" name="school[<?=$i?>]" value="school_<?=$i?>" > -->
                        <?php if($reviewdonecount == 0){?>
                        <div id="collapseOne<?=$i?>" class="collapse<?= $show ?>" aria-labelledby="headingOne<?=$i?>" data-parent="#accordion">
                          <div class="card-body">
                            <div class="card table-responsive">
                              <table class="table table-striped">
                                <tbody>
                                  <?php 
                                    $insr=0;$fttpr=0;$montr=0;$mner=0;$diyr=0;$rttpr=0;$mainr=0;$annr=0;$uti=0;
                                    $sid = $spd->id;
                                    
                                    // echo "sid is".$sid;
                                    
                                     $slog=$this->Menu_model->get_schoollogs($sid);
                                        foreach($slog as $sl){
                                            if($sl->task_type=='Utilisation'){$uti++;}
                                        }
                                    $type = 'Upload Installation Report';
                                    $ins = $this->Menu_model->get_reportbysid($sid,$type);
                                    if(sizeof($ins)>0){$insr++;}
                                    $type = 'Upload FTTP Report';
                                    $fttp = $this->Menu_model->get_reportbysid($sid,$type);
                                    if(sizeof($fttp)>0){$fttpr++;}
                                    $type = 'Annual Report';
                                    $ann = $this->Menu_model->get_reportbysid($sid,$type);
                                    if(sizeof($ann)>0){$annr++;}
                                    $type = 'Upload Maintenance Report';
                                    $main = $this->Menu_model->get_reportbysid($sid,$type);
                                    if(sizeof($main)>0){$mainr++;}
                                    $type = 'Upload RTTP Report';
                                    $rttp = $this->Menu_model->get_reportbysid($sid,$type);
                                    if(sizeof($rttp)>0){$rttpr++;}
                                    $type = 'Upload DIY Report';
                                    $diy = $this->Menu_model->get_reportbysid($sid,$type);
                                    if(sizeof($diy)>0){$diyr++;}
                                    $type = 'Upload M&E Report';
                                    $mne = $this->Menu_model->get_reportbysid($sid,$type);
                                    if(sizeof($mne)>0){$mner++;}
                                    $type = 'Monthly';
                                    $mont = $this->Menu_model->get_reportbysid($sid,$type);
                                    if(sizeof($mont)>0){$montr++;}
                                    $pi = $spd->pi_id;
                                    $pi = $this->Menu_model->get_user_byid($pi);
                                    $zh = $spd->zh_id;
                                    $zh = $this->Menu_model->get_user_byid($zh);
                                      
                                    ?>
                                  <tr>
                                    <td>Project Code</td>
                                    <td><?= $projectcode ?></td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="projectcodename[]" readonly placeholder="Is this Project Code Name right or not"  value="Is this Project Code Name right or not" >
                                        <select required class="form-control form-control-sm"  name="projectcodename[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?= $projectcode ?>" name="projectcodename[]" >
                                        <textarea required class="form-control mt-1" name='projectcodename[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Project Year</td>
                                    <td><?= $year ?></td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="projectyear[]" readonly placeholder="Is this Project Year right or not"  value="Is this Project Year right or not" >
                                        <select required class="form-control form-control-sm"  name="projectyear[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?= $year ?>" name="projectyear[]" >
                                        <textarea required class="form-control mt-1" name='projectyear[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>School Name</td>
                                    <td><?=$spd->sname?></td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="sname<?=$i?>[]" readonly placeholder="Is this School name is right or not" value="Is this School name is right or not"  >
                                        <select required class="form-control form-control-sm"  name="sname<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input  type="hidden" value="<?=$spd->id?>" name="sid">
                                        <?php if($last_element->id == $spd->id){ ?>
                                        <input  type="hidden" value="endprogram" name="endprogram">
                                        <?php } ?>
                                        <input  type="hidden" value="<?=$spd->sname?>" name="sname<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="sname<?=$i?>" name='sname<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Program Manager</td>
                                    <td>Vikash Panchal</td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="programmname<?=$i?>[]" readonly placeholder="Is this Program Manager name is right or not" value="Is this Program Manager name is right or not" >
                                        <select required class="form-control form-control-sm"  name="programmname<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="Vikash Panchal" name="programmname<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="programmname<?=$i?>" name='programmname<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>PIA Name</td>
                                    <td><?=$pi[0]->fullname?></td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="pianame<?=$i?>[]" readonly placeholder="Is this PIA name is right or not"  value="Is this PIA name is right or not" >
                                        <select required class="form-control form-control-sm"  name="pianame<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$pi[0]->fullname?>" name="pianame<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="pianame<?=$i?>" name='pianame<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Zonal Head Name</td>
                                    <td><?=$zh[0]->fullname?></td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="zonalHead<?=$i?>[]" readonly placeholder="Is this Zonal Head name is right or not" value="Is this Zonal Head name is right or not" >
                                        <select required class="form-control form-control-sm"  name="zonalHead<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$zh[0]->fullname?>" name="zonalHead<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="zonalHead<?=$i?>" name='zonalHead<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>School Address</td>
                                    <td><?=$spd->saddress?></td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="schoolAddress<?=$i?>[]" readonly placeholder="Is this School Address is right or not" value="Is this School Address is right or not" >
                                        <select required class="form-control form-control-sm"  name="schoolAddress<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$spd->saddress?>" name="schoolAddress<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="schoolAddress<?=$i?>" name='schoolAddress<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>School City</td>
                                    <td><?=$spd->scity?></td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="schoolCity<?=$i?>[]" readonly placeholder="Is this School City is right or not" value="Is this School City is right or not">
                                        <select required class="form-control form-control-sm"  name="schoolCity<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$spd->scity?>" name="schoolCity<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="schoolCity<?=$i?>" name='schoolCity<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>School State</td>
                                    <td><?=$spd->sstate?></td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="schoolState<?=$i?>[]" readonly placeholder="Is this School State is right or not" value="Is this School State is right or not" >
                                        <select required class="form-control form-control-sm"  name="schoolState<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$spd->sstate?>" name="schoolState<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="schoolState<?=$i?>" name='schoolState<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr class='iso'>
                                    <td>Installtion</td>
                                    <td>
                                      <span> <?=$insr?></span>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a class="schoolinfoa1 text-center" target="_BLANK" href="<?=base_url();?>Menu/ProgramReviewTaskDetails/Installtion/<?=$sid?>">ℹ️</a>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="installtion<?=$i?>[]" readonly placeholder="Installtion Report uploaded or not" value="Installtion Report uploaded or not" >
                                        <select required class="form-control form-control-sm"  name="installtion<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$insr?>" name="installtion<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="installtion<?=$i?>" name='installtion<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>FTTP</td>
                                    <td>
                                      <span> <?=$fttpr ?></span>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a class="schoolinfoa1 text-center" target="_BLANK" href="<?=base_url();?>Menu/ProgramReviewTaskDetails/FTTP/<?=$sid?>">ℹ️</a>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="fTTP<?=$i?>[]" readonly placeholder="Total FTTP " value="Total FTTP" >
                                        <select required class="form-control form-control-sm"  name="fTTP<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$fttpr?>" name="fTTP<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="fTTP<?=$i?>" name='fTTP<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Total Utilisation</td>
                                    <td>
                                      <span><?=$uti?></span>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a class="schoolinfoa1 text-center" target="_BLANK" href="<?=base_url();?>Menu/ProgramReviewTaskDetails/Utilisation/<?=$sid?>">ℹ️</a>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="utilisation<?=$i?>[]" readonly placeholder="Total Utilisation" value="Total Utilisation" >
                                        <select required class="form-control form-control-sm"  name="utilisation<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$uti?>" name="utilisation<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="utilisation<?=$i?>" name='utilisation<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Maintenance</td>
                                    <td>
                                      <span> <?=$mainr?></span>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a class="schoolinfoa1 text-center" target="_BLANK" href="<?=base_url();?>Menu/ProgramReviewTaskDetails/Maintenance/<?=$sid?>">ℹ️</a>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="maintenance<?=$i?>[]" readonly placeholder="Total Maintenance" value="Total Maintenance" >
                                        <select required class="form-control form-control-sm"  name="maintenance<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$mainr?>" name="maintenance<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="maintenance<?=$i?>" name='maintenance<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>RTTP</td>
                                    <td>
                                      <span> <?=$rttpr?></span>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a class="schoolinfoa1 text-center" target="_BLANK" href="<?=base_url();?>Menu/ProgramReviewTaskDetails/RTTP/<?=$sid?>">ℹ️</a>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="rttpr<?=$i?>[]" readonly placeholder="Total RTTP" value="Total RTTP" >
                                        <select required class="form-control form-control-sm"  name="rttpr<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$rttpr?>" name="rttpr<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="rttpr<?=$i?>" name='rttpr<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>M&E</td>
                                    <td>
                                      <?=$mner?>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a class="schoolinfoa1 text-center" target="_BLANK" href="<?=base_url();?>Menu/ProgramReviewTaskDetails/M_AND_E/<?=$sid?>">ℹ️</a>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="mande<?=$i?>[]" readonly placeholder="Total M&E" value="Total M&E" >
                                        <select required class="form-control form-control-sm"  name="mande<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$mner?>" name="mande<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="mande<?=$i?>" name='mande<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>DIY</td>
                                    <td>
                                      <span><?=$diyr?></span>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a class="schoolinfoa1 text-center" target="_BLANK" href="<?=base_url();?>Menu/ProgramReviewTaskDetails/DIY/<?=$sid?>">ℹ️</a>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="diy<?=$i?>[]" readonly placeholder="Total DIY" value="Total DIY" >
                                        <select required class="form-control form-control-sm"  name="diy<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$diyr?>" name="diy<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="diy<?=$i?>" name='diy<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Monthly Report</td>
                                    <td>
                                      <span> <?=$montr?></span>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a class="schoolinfoa1 text-center" target="_BLANK" href="<?=base_url();?>Menu/ProgramReviewTaskDetails/Monthly/<?=$sid?>">ℹ️</a>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="monthlyReport<?=$i?>[]" readonly placeholder="Total Monthly Report" value="Total Monthly Report" >
                                        <select required class="form-control form-control-sm"  name="monthlyReport<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$montr?>" name="monthlyReport<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="monthlyReport<?=$i?>" name='monthlyReport<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Annual Report</td>
                                    <td>
                                      <?=$annr?>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <a class="schoolinfoa1 text-center" target="_BLANK" href="<?=base_url();?>Menu/ProgramReviewTaskDetails/AnnualReport/<?=$sid?>">ℹ️</a>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" name="annualReport<?=$i?>[]" readonly placeholder="Total Annual Report" value="Total Annual Report" >
                                        <select required class="form-control form-control-sm"  name="annualReport<?=$i?>[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <input type="hidden" value="<?=$annr?>" name="annualReport<?=$i?>[]">
                                        <textarea required class="form-control mt-1" id="annualReport<?=$i?>" name='annualReport<?=$i?>[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>


                                  <tr>
                                    <td>Is the program delivered in this school is as per timeline good ?</td>
                                    <td>
                                     <input type="hidden" name="programdelivered[]" value="Is the program delivered in this school is as per timeline good?" >
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <select required class="form-control form-control-sm"  name="programdelivered[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <textarea required class="form-control mt-1" name='programdelivered[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>Is this Active School or Inactive School ?</td>
                                    <td>
                                     <input type="hidden" name="schoolStatus[]" value="Is this Active School or Inactive School" >
                                     <?php 
                                        $spdtlc = $this->Menu_model->getSchoolStatsBySID($sid);
                                        echo $spdtlc;
                                       ?>
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <select required class="form-control form-control-sm"  name="schoolStatus[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <textarea required class="form-control mt-1" name='schoolStatus[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>


                                  <tr>
                                    <td>Status Update ? </td>
                                    <td colspan="2">
                                     <input type="hidden" name="schoolStatus<?=$i?>[]" value="Status Update ? " >
                                     <?php  if($spdtlc =='Inactive'){ ?>
                                     <select onchange="generateTable(<?=$i?>)" class="form-control" required="" name="schoolStatus<?=$i?>[]" id="schoolStatus<?=$i?>">
                                     <option selected="" value="" disabled="">Select School Status</option>
                                    <?php 
                                  
                                      //  $get_status = $this->Menu_model->get_status();
                                    
                                      //  $inactiveIndex = -1;
                                      //  foreach ($get_status as $index => $item) {
                                      //      if ($item->name === $spdtlc) {
                                      //          $inactiveIndex = $index;
                                      //          break;
                                      //      }
                                      //  }
                                      //  if ($inactiveIndex !== -1) {
                                      //      $array = array_slice($get_status, $inactiveIndex);
                                      //  }

                                  
                                      $oparray  = [
                                        1=>'New School',
                                        2=>'TTP Done',
                                        7=>'Inactive',
                                        3=>'Utilization Initiated',
                                        4=>'Average School',
                                        5=>'Good School',
                                        6=>'Model School',
                                        8=>'Client Readiness'
                                      ];

                   
                                          $foundInactive = false;
                                          $resultArray = [];
                      
                                          foreach ($oparray as $key => $value) {
                                              if ($value === $spdtlc) {
                                                  $foundInactive = true;
                                              }
                                              if ($foundInactive) {
                                                  $resultArray[$key] = $value;
                                              }
                                          }
                                foreach($resultArray as $keys=>$opr){
                                        ?>
                                      <option value="<?=$keys ?>"><?=$opr ?></option>
                                       <?php } ?>
                                     </select>
                                     <?php  }
                                     $mappings = [];

                                          // Loop through the array to create mappings
                                          foreach ($array as $index => $item) {
                                              $mappings[$item->id] = [];
                                              foreach ($array as $innerIndex => $innerItem) {
                                                  if ($innerIndex >= $index) {
                                                      $mappings[$item->id][] = $innerItem->name;
                                                  }
                                              }
                                          }
                                          // Convert mappings array to JSON format
                                          $jsonMappings = json_encode($mappings, JSON_PRETTY_PRINT);
                                     ?>
                                     <div id="tableContainer<?=$i?>" class="mt-2" >
                                      <table class="table table-striped table-bordered" cellspacing="0" id="statusTable<?=$i?>"></table>
                                    </div>
                                    </td>
                                  </tr>
   <tr>
                                    <td>Is the any offline activity done in this school ?</td>
                                     <td>
                                     <input type="hidden" name="offlineactivity[]" value="Is the any offline activity done in this school." >
                                    
                                    <!--<span class="bg-info p-2">Installation</span>-->
                                    <!--<span class="bg-info p-2">FTTP</span>-->
                                    <!--<span class="bg-info p-2">Base Line M&E</span>-->
                                    <!--<span class="bg-info p-2">RTTP</span>-->
                                    <!--<span class="bg-info p-2">Mintenance</span> <br/><br/>-->
                                    <!--<span class="bg-info p-2">DIY</span>-->
                                    <!--<span class="bg-info p-2">End Line M&E</span>-->
                                    
                                     </td>
                              <td>
                                      <div class="form-group">
                                        <select required class="form-control form-control-sm" id="offlineactivity"  name="offlineactivity[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                         
                                         <select id="offlineactivity" class="form-control mt-1" name="offlineactivity[]" multiple="multiple">
                                           <option value="" selected>Choose</option>
                                            <option value="Installation">Installation</option>
                                            <option value="FTTP">FTTP</option>
                                            <option value="Base Line M&E">Base Line M&E</option>
                                            <option value="RTTP">RTTP</option>
                                            <option value="Mintenance">Mintenance</option>
                                            <option value="DIY">DIY</option>
                                            <option value="End Line M&E">End Line M&E</option>
                                        </select>  
                                        
                                        <!--<textarea class="form-control mt-1" id="offlineactivityText" name='offlineactivity[]' placeholder="type your remark" rows="1"></textarea>-->
                                     
                                     
                                      </div>
                                      
                                    </td>
                                  </tr>

        
                                  <tr>
                                    <td>In this Ready School for Client visit or not ?</td>
                                    <td>
                                     <input type="hidden" name="schoolClientvisit[]" value="Is this School Client visit or not." >
                                    </td>
                                    <td>
                                      <div class="form-group">
                                        <select required class="form-control form-control-sm" id="schoolClientvisit"  name="schoolClientvisit[]" >
                                          <option selected disabled value='' > Select Yes or No </option>
                                          <option value="Yes"> Yes</option>
                                          <option value="No"> No </option>
                                        </select>
                                        <textarea class="form-control mt-1" id="schoolClientvisittext" name='schoolClientvisit[]' placeholder="type your remark" rows="1"></textarea>
                                      </div>
                                    </td>
                                  </tr>





                                </tbody>
                              </table>
                              <div class="col-12 text-center mb-2">
                                <button class="btn btn-primary" onclick="return confirm('Are you sure you would like to Submit this form ?');"  type="submit">Review Done</button>
                              </div>
                            </div>
                  </form>
                  </div>
                  </div>
                  <?php } ?>
                  </div>
                  </div>
                  <?php $i++; } ?>
                </div>
              
              </div>
              <!-- </form> -->
            </div>
          </div>
          <br><br>
        </div>
        </section>
      </div>
      <footer class="main-footer text-center">
        <strong>Copyright &copy; 2021-2022 <a href="<?=base_url();?>">Stemlearning</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0
        </div>
      </footer>
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

          $("#schoolClientvisittext").hide();

          $('#schoolClientvisit').change(function() {
              var selectedValue = $(this).val();
              if (selectedValue == 'Yes') {
                $("#schoolClientvisittext").show();
              }
              if (selectedValue == 'No') {
                $("#schoolClientvisittext").hide();
              }
          });
          $("#offlineactivityText").hide();

          $('#offlineactivity').change(function() {
              var selectedValue = $(this).val();
              if (selectedValue == 'Yes') {
                $("#offlineactivityText").show();
              }
              if (selectedValue == 'No') {
                $("#offlineactivityText").hide();
              }
          });

       function generateTable(id) {
          var selectedOption = document.getElementById("schoolStatus"+id).value;
          var table = document.getElementById("statusTable"+id);
          table.innerHTML = ""; // Clear previous table content
      
          // Define mappings based on selected option
          var mappings = {
              "1": ["New School","TTP Done","Inactive","Utilization Initiated","Average School","Good School","Model School","Client Readiness"],
              "2": ["TTP Done","Inactive","Utilization Initiated","Average School","Good School","Model School","Client Readiness"],
              "7": ["Inactive","Utilization Initiated","Average School","Good School","Model School","Client Readiness"],
              "3": ["Utilization Initiated","Average School","Good School","Model School","Client Readiness"],
              "4": ["Average School","Good School","Model School","Client Readiness"],
              "5": ["Good School","Model School","Client Readiness"],
              "6": ["Model School","Client Readiness"],
              "8": ["Client Readiness"],
          };
      
          // Generate table rows based on mappings
          var statusList = mappings[selectedOption];
          if (statusList) {
            for (var i = 0; i < statusList.length - 1; i++) { 
              var sname = statusList[i + 1].toString().toLowerCase().replace(/\s+/g, '');
              var row = table.insertRow();
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              cell1.innerHTML = statusList[i];
              cell2.innerHTML = statusList[i + 1];
              cell3.innerHTML = '<input type="hidden" name="schoolStatus'+id+'[]" value="' + statusList[i] + ' to ' + statusList[i + 1] + '"><input type="date" min="<?= date("Y-m-d");?>" class="form-control" name="schoolStatus'+id+'[]" required id="stat_' + i + '" >';
            }
          } else {
              table.innerHTML = "<tr><td colspan='3'>No mapping found for selected option</td></tr>";
          }
      
          // if (statusList == "Client Readiness") {
          //     var row = table.insertRow();
          //     var cell1 = row.insertCell(0);
          //     var cell2 = row.insertCell(1);
          //     cell1.innerHTML = statusList[0];
          //     cell2.innerHTML = '<input type="hidden" name="statusConversionName'+id+'[]" value="' + statusList[0] + '"><input type="date" class="form-control" name="statusConversionDate'+id+'[]" required >';
          // }
      }
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
      
      function validateForm() {
        var inputplantime = $("#timer").text();
        if(inputplantime !==''){
        var plantime = '<input type="hidden" name="programreviewtime[]" value="Program Review Time"/>';
        var plantime1 = '<input type="hidden" name="programreviewtime[]" value="'+inputplantime+'"/>';
        $("#programreviewform").append(plantime);
        $("#programreviewform").append(plantime1);
        }else{
            return false;
        }
      }
    </script>
  </body>
</html>