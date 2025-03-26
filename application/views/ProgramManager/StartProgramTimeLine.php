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
        <h3>Program Time Line Setting</h3>
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
                    
                </div>

            </div>
            <div class="col-md-6">
            
                <div class="card" style="background: aliceblue;">
                <div id="alldata">
                  <form action="<?=base_url();?>Menu/StoreProgramTimelinePlanning" method="post">
                      <input type="hidden" name="projectcode" value="<?=$project_code;?>">
                      <input type="hidden" name="task_id" value="<?=$task_id;?>">
                    <div class="was-validated">
                    <div class="card p-2 mt-2">
                      <div class="from-group" id="b1">
                        <lable class="form-label">WelCome Message*</lable>
                        <?php foreach ($week as $weekNumber => $month) {?>
                        <?php } ?>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="wmessage" required="">
                      </div>
                      </div>
                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b2">
                        <lable class="form-label">1st 5 Communication*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="communication1"  id="communication1" required="">
                      </div>
                      <div class="from-group" id="b2">
                        <lable class="form-label">2nd 5 Communication*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="communication2"  id="communication2" required="">
                      </div>
                      <div class="from-group" id="b2">
                        <lable class="form-label">3rd 5 Communication*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="communication3"  id="communication3" required="">
                      </div>
                      </div>

                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b3">
                        <lable class="form-label">1st 5 Calls for Utilisation*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="callsfu1" id="callsfu1" required="">
                      </div>

                      <div class="from-group" id="b3">
                        <lable class="form-label">2nd 5 Calls for Utilisation*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="callsfu2" id="callsfu2" required="">
                      </div>
                      </div>


                      <div class="card p-2 mt-2">

                      <div class="from-group" id="b4">
                        <lable class="form-label">Report Type*</lable>
                        <select class="form-control"  name="reporttype" required="">
                            <option value="">select</option>
                            <option value="8">Monthly</option>
                            <option value="4">Quarterly</option>
                            <option value="1">Yearly</option>
                        </select>
                      </div>
                      <div class="from-group" id="b5">
                        <lable class="form-label">FTTP</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="fttp" required="">
                       </div>
                      <div class="from-group" id="b6">
                        <lable class="form-label">RTTP*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="rttp" required="">
                      </div>
                      <div class="from-group" id="b5">
                        <lable class="form-label">Replacement</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="replacement" required="">
                     </div>
                     </div>

                    
                     <div class="card p-2 mt-2">
                      <div class="from-group" id="b8">
                        <lable class="form-label">Maintenance*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="maintenance" required="">
                      </div>
                      
                      <div class="from-group" id="b10">
                        <lable class="form-label">Base Line M&E</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="blmne" required="">
                      </div>
                      <div class="from-group" id="b11">
                        <lable class="form-label">End Line M&E</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="elmne" required="">
                      </div>
                     
                      <div class="from-group" id="b12">
                        <lable class="form-label">NSP</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="nsp" >
                      </div>
                      </div>


                      <!-- <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable class="form-label">ZM Visit 10% each</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" class="form-control" name="zmvisit" id="zmvisit" required>
                      </div>

                      <div class="from-group" id="b14">
                        <lable class="form-label">PM Visit 10% each</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" class="form-control" id="pmvisit" name="pmvisit" required="">
                      </div>
                      </div>

                      <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable class="form-label">Other Department Call</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" class="form-control" name="otherdepartmentcall" id="otherdepartmentcall" required>
                      </div>

                      <div class="from-group" id="b17">
                        <lable class="form-label">Review with BD*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" class="form-control" name="bdreview" id="bdreview" required="">
                      </div>
                      </div> -->




                      <div class="card p-2 mt-2">
                        <div class="from-group" id="b13">
                          <lable class="form-label">1st 5 Utilisation*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" id="utilisation1" class="form-control" name="utilisation1" required="">
                        </div>
                        <div class="from-group" id="b13">
                          <lable class="form-label">2nd 5 Utilisation*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="utilisation2" name="utilisation2" required="">
                        </div>
                        <div class="from-group" id="b13">
                          <lable class="form-label">3rd 5 Utilisation*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="utilisation3" name="utilisation3" required="">
                        </div>
                      </div>
                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b15">
                        <lable class="form-label">Other Department Call*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control"  name="otherdcall" required="">
                      </div>
                      </div>
                      <div class="card p-2 mt-2">
                        <div class="from-group" id="b16">
                          <lable class="form-label">1st 4 OutBond Communication*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="outbondc1" id="outbondc1" required="">
                        </div>
                        <div class="from-group" id="b16">
                          <lable class="form-label">2nd 4 OutBond Communication*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="outbondc2" id="outbondc2" required="">
                        </div>
                        <div class="from-group" id="b16">
                          <lable class="form-label">3rd 4 OutBond Communication*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="outbondc3" id="outbondc3" required="">
                        </div>
                      </div>
                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b17">
                        <lable class="form-label">Review with BD*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="bdreview" required="">
                      </div>
                      </div>
                      
                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b7">
                        <lable class="form-label">CaseStudy*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="casestudy" required="">
                      </div>
                      
                      <div class="from-group" id="b9">
                        <lable class="form-label">DIY</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="diy" required="">
                      </div>
                      <div class="from-group" id="b18">
                        <lable class="form-label">Client Engagement*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="cengagement" required="">
                      </div>
                      </div>
                    
                      <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable class="form-label">Expected Status</lable>
                        <select class="form-control" name="status" required>
                            <option value="">Select Status</option>
                            <?php $status = $this->Menu_model->get_status(); foreach($status as $st){?>
                            <option value="<?=$st->id?>"><?=$st->name?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="from-group">
                        <lable class="form-label">Expected Status Date</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="exstatusdt" required>
                      </div>
                      </div>
                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b14">
                        <lable class="form-label">ZM Visit 10% each</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="zmvisit" required="">
                      </div>
                      <div class="from-group" id="b14">
                        <lable class="form-label">PM Visit 10% each</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="pmvisit" required="">
                      </div>
                      </div>
                      
                     <div class="card p-2 mt-2">
                     <div class="from-group" id="b17">
                        <lable class="form-label">Summer Activity</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="summeractivity" id="summeractivity" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable class="form-label">winter activity</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="winteractivity" id="winteractivity" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable class="form-label">Online Activity</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="onlineactivity" id="onlineactivity" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable class="form-label">Webinar</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="webinar" id="webinar" required="">
                      </div>
                     </div>
                     
                     
                    <div class="card p-2 mt-2">
                     <div class="from-group" id="b17">
                        <lable class="form-label">Set Date for First Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="socialMediaPost1" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable class="form-label">Set Date for Second Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="socialMediaPost2" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable class="form-label">Set Date for Third Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="socialMediaPost3" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable class="form-label">Set Date for Fourth Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="socialMediaPost4"  required="">
                      </div>
                     </div>
                     
                     
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-success mt-2">Set Program Time Line</button>
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
    $("#pdetail").hide();
  $.ajax({
    url:'<?=base_url();?>Menu/getpdetail',
    type: "POST",
    data: {
        pcode: pcode
    },
    cache: false,
    success: function a(result){
    $("#taskplanning_loader").hide();
    $("#pdetail").fadeIn();
    $("#pdetail").html(result);
    }
    });

 





        // Event listener for change in communication1 date
        $('#communication1').on('change', function(){
        // Get the selected date in communication1
        var startDate = new Date($(this).val());
        // Calculate the date which is 4 days after selected date
        var endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 4);
        // Set the minimum selectable date in communication2 to 4 days after utilisation1
        $('#communication2').attr('min', endDate.toISOString().split('T')[0]);
    });
    // Event listener for change in communication2 date
    $('#communication2').on('change', function(){
        // Get the selected date in communication2
        var startDate = new Date($(this).val());
        // Calculate the date which is 4 days after selected date
        var endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 4);
        // Set the minimum selectable date in communication3 to 4 days after utilisation1
        $('#communication3').attr('min', endDate.toISOString().split('T')[0]);
    });

    // Event listener for change in utilisation1 date
    $('#utilisation1').on('change', function(){
        // Get the selected date in utilisation1
        var startDate = new Date($(this).val());
        // Calculate the date which is 4 days after selected date
        var endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 4);
        // Set the minimum selectable date in utilisation2 to 4 days after utilisation1
        $('#utilisation2').attr('min', endDate.toISOString().split('T')[0]);
    });
    // Event listener for change in utilisation2 date
    $('#utilisation2').on('change', function(){
        // Get the selected date in utilisation2
        var startDate = new Date($(this).val());
        // Calculate the date which is 4 days after selected date
        var endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 4);
        // Set the minimum selectable date in utilisation3 to 4 days after utilisation1
        $('#utilisation3').attr('min', endDate.toISOString().split('T')[0]);
    });

    // Event listener for change in callsfu1 date
    $('#callsfu1').on('change', function(){
        // Get the selected date in callsfu1
        var startDate = new Date($(this).val());
        // Calculate the date which is 4 days after selected date
        var endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 4);
        // Set the minimum selectable date in callsfu2 to 4 days after utilisation1
        $('#callsfu2').attr('min', endDate.toISOString().split('T')[0]);
    });
  
        // Event listener for change in outbondc1 date
        $('#outbondc1').on('change', function(){
        // Get the selected date in outbondc1
        var startDate = new Date($(this).val());
        // Calculate the date which is 4 days after selected date
        var endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 4);
        // Set the minimum selectable date in outbondc2 to 4 days after utilisation1
        $('#outbondc2').attr('min', endDate.toISOString().split('T')[0]);
    });
    // Event listener for change in outbondc2 date
    $('#outbondc2').on('change', function(){
        // Get the selected date in outbondc2
        var startDate = new Date($(this).val());
        // Calculate the date which is 4 days after selected date
        var endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 4);
        // Set the minimum selectable date in outbondc3 to 4 days after utilisation1
        $('#outbondc3').attr('min', endDate.toISOString().split('T')[0]);
    });

  });
  
</script>
<?php $this->load->view('footer'); ?>