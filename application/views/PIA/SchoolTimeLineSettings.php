<?php $this->load->view('nav'); ?>
<style>
  .card {
  padding:10px;
  }
  .planerdflex{
    align-items: center;
    justify-content: center;
    display: flex;
  }
  /* .card {
  background: linear-gradient(
      45deg,
      oklch(0.93 0.08 120) 0%,
      oklch(0.93 0.08 240) 100%
    );

  background-size: 100% 100%;
  color: PaleVioletRed;

  animation: anim_bg 5s linear infinite;
}

@keyframes anim_bg {
  0% {
    filter: hue-rotate(0deg);
  }
  100% {
    filter: hue-rotate(360deg);
  }
} */

</style>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <h5 class="card-header text-center">
        <?php if ($this->session->flashdata('success_message')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <?= $this->session->flashdata('success_message'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_message')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <?= $this->session->flashdata('error_message'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
      </h5>
      <div class="text-center p-2" style="background: aliceblue;">
        <h3>School Time Line Setting</h3>
      </div>
      <hr>
      <?php 
            $project_code           =  $taskData[0]->project_code;
            $ctask_id               =  $taskData[0]->id;
            $appointment_datetime   =  $taskData[0]->appointment_datetime;
            $initiate_datetime      =  $taskData[0]->initiate_datetime;

            
        ?>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                <div class="text-center">
                        <br>
                      <img src="<?=base_url()?>assets/img/man-holding-clock-time-management-concept_23-2148823171.avif" width="250" alt="map-of-india-administrative-regions-image-not-found">
                </div>
                <hr>
                    <div class="mb-4">
                        <!-- <label for="defaultSelect" class="form-label">Default select</label> -->
                        <select id="pcode" class="form-select">
                            <option selected value="<?= $project_code?>"><?= $project_code?></option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="card planerdflex" id="taskplanning_loader">
                    <img src="<?=base_url()?>assets/assets/img/loader/loader.gif" width="100" alt="loader" >
                </div>
                <div class="cardProjectsDetails p-4" id="pdetail">
                    <?php 
                    $project_code   = $taskData[0]->project_code;
                    $selectby       = $taskData[0]->selectby;
                    $comments       = $taskData[0]->comments;

                    // dd($schoolData);
                    ?>
                    <div class="card">
                        <div class="text-center">
                            <h4>School Information</h4>
                            <p><?=$comments;?></p>
                            <?php $timelineAddedUserData =  $this->Menu_model->getPIABYID($timelineData[0]->uid); ?>
                            <p> <strong>Time Line Target Added By - </strong> <?=$timelineAddedUserData[0]->fullname;?></p>
                        </div>
                   
                    <hr>
        <table class="table table-bordered">
            <tbody>
                <?php
                // Sample data
                $data = $schoolData[0];

                // Define the labels and corresponding data keys
                $labels = [
                    'SID' => 'id',
                    'Project Code' => 'project_code',
                    'Client Name' => 'clientname',
                    'School Name' => 'sname',
                    'Address' => 'saddress',
                    'City' => 'scity',
                    'State' => 'sstate',
                    'Language' => 'slanguage',
                    'Pincode' => 'spincode',
                    'Boys' => 'boys',
                    'Girls' => 'girls',
                    'Total Students' => 'total_students',
                    'Total Teachers' => 'total_teachers',
                ];

                // Loop through the labels and create table rows
                foreach ($labels as $label => $key) {
                    echo "<tr>";
                    echo "<th>{$label}</th>";
                    echo "<td>{$data->$key}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
            
            <?php 

            // Accessing each property
            $academic_year          = $timelineData[0]->academic_year;
            $timline_added_uid      = $timelineData[0]->uid;
            $wmessage               = $timelineData[0]->wmessage;
            $communication1         = $timelineData[0]->communication1;
            $communication2         = $timelineData[0]->communication2;
            $communication3         = $timelineData[0]->communication3;
            $callsfu1               = $timelineData[0]->callsfu1;
            $callsfu2               = $timelineData[0]->callsfu2;
            $reporttype             = $timelineData[0]->reporttype;
            $casestudy              = $timelineData[0]->casestudy;
            $maintenance            = $timelineData[0]->maintenance;
            $replacement            = $timelineData[0]->replacement;
            $diy                    = $timelineData[0]->diy;
            $blmne                  = $timelineData[0]->blmne;
            $nsp                    = $timelineData[0]->nsp;
            $utilisation1           = $timelineData[0]->utilisation1;
            $utilisation2           = $timelineData[0]->utilisation2;
            $utilisation3           = $timelineData[0]->utilisation3;
            $zmvisit                = $timelineData[0]->zmvisit;
            $otherdcall             = $timelineData[0]->otherdcall;
            $outbondc1              = $timelineData[0]->outbondc1;
            $outbondc2              = $timelineData[0]->outbondc2;
            $outbondc3              = $timelineData[0]->outbondc3;
            $bdreview               = $timelineData[0]->bdreview;
            $pmvisit                = $timelineData[0]->pmvisit;
            $cengagement            = $timelineData[0]->cengagement;
            $fttp                   = $timelineData[0]->fttp;
            $rttp                   = $timelineData[0]->rttp;
            $elmne                  = $timelineData[0]->elmne;
            $exstatusdt             = $timelineData[0]->exstatusdt;
            $target_school_status   = $timelineData[0]->status;
            $pretargetdate          = $timelineData[0]->pretargetdate;
            $summeractivity         = $timelineData[0]->summeractivity;
            $winteractivity         = $timelineData[0]->winteractivity;
            $onlineactivity         = $timelineData[0]->onlineactivity;
            $webinar                = $timelineData[0]->webinar;
            $socialMediaPost1       = $timelineData[0]->socialMediaPost1;
            $socialMediaPost2       = $timelineData[0]->socialMediaPost2;
            $socialMediaPost3       = $timelineData[0]->socialMediaPost3;
            $socialMediaPost4       = $timelineData[0]->socialMediaPost4;

           
            ?>

                <div class="card" style="background: aliceblue;">
                <div id="alldata">
                  <form action="<?=base_url();?>Menu/StoreSchoolTimelinePlanning" method="post">
                      <input type="hidden" name="projectcode" value="<?=$schoolData[0]->project_code;?>">
                      <input type="hidden" name="sid" value="<?=$schoolData[0]->id?>">
                      <input type="hidden" name="task_id" value="<?=$task_id;?>">
                      <div class="was-validated">
                      <div class="form-group m-2" id="b4">
                          <label class="form-label">Select Academic Year</label>
                          <select class="form-control" name="academic_year" required>
                              <option value="<?= $academic_year; ?>"><?= $academic_year; ?></option>
                          </select>
                      </div>

                    <div class="card p-2 mt-2">
                      <div class="from-group m-2" id="b1">
                        <lable class="form-label">WelCome Message*</lable>
                        <?php foreach ($week as $weekNumber => $month) {?>
                        <?php } ?>
                        <input type="date"  class="form-control" max="<?=$wmessage?>" name="wmessage" required="">
                        <small class="text-danger"> PM Target Date: <?=$wmessage?></small>
                      </div>
                      </div>
                      <div class="card p-2 mt-2">
                      <div class="from-group m-2" id="b2">
                        <lable class="form-label">1st 5 Communication*</lable>
                        <input type="date"  class="form-control" name="communication1" max="<?=$communication1?>"  id="communication1" required="">
                        <small class="text-danger"> PM Target Date: <?=$communication1?></small>
                      </div>
                      <div class="from-group m-2" id="b2">
                        <lable class="form-label">2nd 5 Communication*</lable>
                        <input type="date"  class="form-control" name="communication2" max="<?=$communication2?>"  id="communication2" required="">
                        <small class="text-danger"> PM Target Date: <?=$communication2?></small>
                      </div>
                      <div class="from-group m-2" id="b2">
                        <lable class="form-label">3rd 5 Communication*</lable>
                        <input type="date"  class="form-control" name="communication3" max="<?=$communication3?>"  id="communication3" required="">
                        <small class="text-danger"> PM Target Date: <?=$communication3?></small>
                      </div>
                      </div>

                 

                      <div class="card p-2 mt-2">

                      <div class="form-group m-2" id="b4">
                      <div class="form-group m-2" id="b4">
                            <label class="form-label">Report Type*</label>
                            <select class="form-control" name="reporttype" id="reportTypeSelect" required>
                                <option value="">Select</option>
                                <?php 
                                $options = [
                                    8 => "Monthly",
                                    4 => "Quarterly",
                                    1 => "Yearly"
                                ];

                                if (!empty($reporttype) && isset($options[$reporttype])) {
                                    echo '<option value="' . $reporttype . '" selected>' . $options[$reporttype] . '</option>';
                                } else {
                                    foreach ($options as $value => $label) {
                                        echo '<option value="' . $value . '">' . $label . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <?php if (!empty($reporttype) && isset($options[$reporttype])) { ?>
                            <small class="text-danger"> PM Want to : <?=$options[$reporttype];?> - Report</small>
                            <?php } ?>
                        </div>

                      <div class="from-group m-2" id="b5">
                        <lable class="form-label">FTTP</lable>
                        <input type="date"  class="form-control" name="fttp" max="<?=$fttp?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$fttp?></small>
                       </div>
                      <div class="from-group m-2" id="b6">
                        <lable class="form-label">RTTP*</lable>
                        <input type="date"  class="form-control" name="rttp" max="<?=$rttp?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$rttp?></small>
                      </div>
                      <!-- <div class="from-group m-2" id="b5">
                        <lable class="form-label">Replacement</lable>
                        <input type="date"  class="form-control" name="replacement" max="<?=$replacement?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$replacement?></small>
                     </div> -->
                     </div>

                    
                     <div class="card p-2 mt-2">
                      <!-- <div class="from-group m-2" id="b8">
                        <lable class="form-label">Maintenance*</lable>
                        <input type="date"  class="form-control" name="maintenance" max="<?=$maintenance?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$maintenance?></small>
                      </div> -->
                      
                      <div class="from-group m-2" id="b10">
                        <lable class="form-label">Base Line M&E</lable>
                        <input type="date"  class="form-control" name="blmne" max="<?=$blmne?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$blmne?></small>
                      </div>
                      <div class="from-group m-2" id="b11">
                        <lable class="form-label">End Line M&E</lable>
                        <input type="date"  class="form-control" name="elmne" max="<?=$elmne?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$elmne?></small>
                      </div>
                     
                      <?php if($nsp !== ''): ?>
                      <div class="from-group m-2" id="b12">
                        <lable class="form-label">NSP</lable>
                        <input type="date"  class="form-control" name="nsp" max="<?=$nsp?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$nsp?></small>
                      </div>
                      </div>
                      <?php endif; ?>


                      <!-- <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable class="form-label">ZM Visit 10% each</lable>
                        <input type="date"   class="form-control" name="zmvisit" id="zmvisit" required>
                      </div>

                      <div class="from-group" id="b14">
                        <lable class="form-label">PM Visit 10% each</lable>
                        <input type="date"   class="form-control" id="pmvisit" name="pmvisit" required="">
                      </div>
                      </div>

                      <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable class="form-label">Other Department Call</lable>
                        <input type="date"   class="form-control" name="otherdepartmentcall" id="otherdepartmentcall" required>
                      </div>

                      <div class="from-group" id="b17">
                        <lable class="form-label">Review with BD*</lable>
                        <input type="date"   class="form-control" name="bdreview" id="bdreview" required="">
                      </div>
                      </div> -->




                      <div class="card p-2 mt-2">
                        <div class="from-group m-2" id="b13">
                          <lable class="form-label">1st 5 Utilisation*</lable>
                          <input type="date"  id="utilisation1" class="form-control" name="utilisation1" max="<?=$utilisation1?>" required="">
                          <small class="text-danger"> PM Target Date: <?=$utilisation1?></small>
                        </div>
                        <div class="from-group m-2" id="b13">
                          <lable class="form-label">2nd 5 Utilisation*</lable>
                          <input type="date"  class="form-control" id="utilisation2" name="utilisation2" max="<?=$utilisation2?>" required="">
                          <small class="text-danger"> PM Target Date: <?=$utilisation2?></small>
                        </div>
                        <div class="from-group m-2" id="b13">
                          <lable class="form-label">3rd 5 Utilisation*</lable>
                          <input type="date"  class="form-control" id="utilisation3" name="utilisation3" max="<?=$utilisation3?>" required="">
                          <small class="text-danger"> PM Target Date: <?=$utilisation3?></small>
                        </div>
                      </div>
                      <!-- <div class="card p-2 mt-2">
                      <div class="from-group" id="b15">
                        <lable class="form-label">Other Department Call*</lable>
                        <input type="date"  class="form-control"  name="otherdcall" max="<?=$otherdcall?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$otherdcall?></small>
                      </div>
                      </div> -->
                      <div class="card p-2 mt-2">
                        <div class="from-group m-2" id="b16">
                          <lable class="form-label">1st 4 OutBond Communication*</lable>
                          <input type="date"  class="form-control" name="outbondc1" id="outbondc1" max="<?=$outbondc1?>" required="">
                          <small class="text-danger"> PM Target Date: <?=$outbondc1?></small>
                        </div>
                        <div class="from-group m-2" id="b16">
                          <lable class="form-label">2nd 4 OutBond Communication*</lable>
                          <input type="date"  class="form-control" name="outbondc2" id="outbondc2" max="<?=$outbondc2?>" required="">
                          <small class="text-danger"> PM Target Date: <?=$outbondc2?></small>
                        </div>
                        <div class="from-group m-2" id="b16">
                          <lable class="form-label">3rd 4 OutBond Communication*</lable>
                          <input type="date"  class="form-control" name="outbondc3" id="outbondc3" max="<?=$outbondc3?>" required="">
                          <small class="text-danger"> PM Target Date: <?=$outbondc3?></small>
                        </div>
                      </div>
                     
                
                      <div class="card p-2 mt-2">
                      <div class="from-group m-2" id="b7">
                        <lable class="form-label">CaseStudy*</lable>
                        <input type="date"  class="form-control" name="casestudy" max="<?=$casestudy?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$casestudy?></small>
                      </div>
                      
                      <div class="from-group m-2" id="b9">
                        <lable class="form-label">DIY</lable>
                        <input type="date"  class="form-control" name="diy" max="<?=$diy?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$diy?></small>
                      </div>
                      <div class="from-group m-2" id="b18">
                        <lable class="form-label">Client Engagement*</lable>
                        <input type="date"  class="form-control" name="cengagement" max="<?=$cengagement?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$cengagement?></small>
                      </div>
                      </div>
                    
                      <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable class="form-label">Expected Status</lable>
                        <select class="form-control" name="status" required>
                            <?php 
                            $schoolstatus = $this->Menu_model->get_status(); 
                            foreach($schoolstatus as $st){
                                if($st->id == $target_school_status){
                                    $selectedStatus = 'selected';
                                    $disabledStatus='';
                                }else{
                                    $selectedStatus = '';
                                    $disabledStatus = 'disabled';
                                }
                                ?>
                            <option <?=$selectedStatus;?> <?= $disabledStatus; ?> value="<?=$st->id?>"><?=$st->name?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="from-group m-2">
                        <lable class="form-label">Expected Status Date</lable>
                        <input type="date"  class="form-control" name="exstatusdt" required>
                        <small class="text-danger"> PM Target Date: <?=$exstatusdt?></small>
                      </div>
                      </div>
              
                      
                     <div class="card p-2 mt-2">
                     <div class="from-group m-2" id="b17">
                        <lable class="form-label">Summer Activity</lable>
                        <input type="date"  class="form-control" name="summeractivity" id="summeractivity" max="<?=$summeractivity?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$summeractivity?></small>
                      </div>
                      <div class="from-group m-2" id="b17">
                        <lable class="form-label">winter activity</lable>
                        <input type="date"  class="form-control" name="winteractivity" id="winteractivity" max="<?=$winteractivity?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$winteractivity?></small>
                      </div>
                      <div class="from-group m-2" id="b17">
                        <lable class="form-label">Online Activity</lable>
                        <input type="date"  class="form-control" name="onlineactivity" id="onlineactivity" max="<?=$onlineactivity?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$onlineactivity?></small>
                      </div>
                      <div class="from-group m-2" id="b17">
                        <lable class="form-label">Webinar</lable>
                        <input type="date"  class="form-control" name="webinar" id="webinar" max="<?=$webinar?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$webinar?></small>
                      </div>
                     </div>
                     
                     
                    <div class="card p-2 mt-2">
                     <div class="from-group m-2" id="b17">
                        <lable class="form-label">Set Date for First Social Media Post</lable>
                        <input type="date"  class="form-control" name="socialMediaPost1" max="<?=$socialMediaPost1?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$socialMediaPost1?></small>
                      </div>
                      <div class="from-group m-2" id="b17">
                        <lable class="form-label">Set Date for Second Social Media Post</lable>
                        <input type="date"  class="form-control" name="socialMediaPost2" max="<?=$socialMediaPost2?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$socialMediaPost2?></small>
                      </div>
                      <div class="from-group m-2" id="b17">
                        <lable class="form-label">Set Date for Third Social Media Post</lable>
                        <input type="date"  class="form-control" name="socialMediaPost3" max="<?=$socialMediaPost3?>" required="">
                        <small class="text-danger"> PM Target Date: <?=$socialMediaPost3?></small>
                      </div>
                      <div class="from-group m-2" id="b17">
                        <lable class="form-label">Set Date for Fourth Social Media Post</lable>
                        <input type="date"  class="form-control" name="socialMediaPost4" max="<?=$socialMediaPost4?>"  required="">
                        <small class="text-danger"> PM Target Date: <?=$socialMediaPost4?></small>
                      </div>
                     </div>
                     
                     
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-success mt-2">Set School Time Line</button>
                    </div>
                    
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
     
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    var pcode  = $('#pcode').val();
    $("#taskplanning_loader").hide();

      

  });
  
</script>
<?php $this->load->view('footer'); ?>