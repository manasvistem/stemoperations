<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <button type="button" class="btn btn-primary ml-3" onclick="goBack()">Go Back</button>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <button type="button" class="btn btn-secondary ml-3" onclick="goForward()">Go Forward</button>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- Messages Dropdown Menu -->
      <?php 
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];$uid= $user['id'];
      ?>
      <h4>HI!  <?=$user['fullname']?></h4>
      <input type="hidden" id="ur_id" value="<?=$uid?>">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url();?>/Menu/Notification">
          <i class="far fa-bell"></i>
          <?php $notify=$this->Menu_model->get_notifybyid($uid);?>
          <span class="badge badge-warning navbar-badge"><?=sizeof($notify);?></span>
        </a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <img src="https://stemlearning.in/wp-content/uploads/2020/07/stem-new-logo-2-1.png" width="80%" class="p-3">
    <center><h5 class="text-white"><b>STEM Operation</b></h5></center>
    <hr>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url();?>assets/image/user/Team.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$user['fullname']?></a>
        </div>
      </div>
      
      
      <?php $hjlink = $this->Menu_model->get_hjoinlink();
        if($hjlink){
        $meetlink = $hjlink[0]->meetlink;?>
        <a href="<?=$meetlink?>" class="btn btn-primary" target="_blank">Handover Timeline Link</a>
      <?php } ?>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/Dashboard" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <!--
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/ChangeIDSPD" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Change Iden School</p>
            </a>
          </li>-->
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/CompetitionReport" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>NSP Report</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/Handovertoinsr/594" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Live Handover</p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/CreateJoinCallHI" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Handover Time Line</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/ProgramTimeLine" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Program Time Line</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/BDRequestBox" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>BD Requests</p>
            </a>
          </li>
          
          <li class="nav-item menu-open">
            <a href="<?=base_url();?>Menu/MeetingRequest" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Meeting Request</p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/ParticalBPApr" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Partical Board Apr</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/PaymentApr" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Payment Apr</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/Mytarget" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>My Target</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/LiveVisitPIA" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Live Visit PIA</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/LiveVisitIMP" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Live Visit IMP</p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/ReportVisitPIA" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Report Visit PIA</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/ReportVisitIMP" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Report Visit IMP</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/NextDayPlan" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Next Day Plan</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/SchoolReviewDetail" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>All School Review by PIA</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/ProgramReviewDetail" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>All Program Review by PIA</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/ShowAcademicCalendar" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Academic Calendar</p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/TeamDailyReport/<?=date('Y-m-d')?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Team Daily Report</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/DayStartCheck" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Day Start Check</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/DayCloseCheck" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Day Close Check</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/AllReviewPlaing" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>All Review</p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/reviewreport" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Review Report</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/PIAwiseSchoolDetail" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>PIA Wise Pending Detail</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/inspending" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Installation Pending</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/insreportpending" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Installation Report Pending</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/fttppending" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>FTTP Pending</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/fttpreportpending" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>FTTP Report Pending</p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/utilisationpending" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Utilisation Pending</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/createtask" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Create Task</p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/PIAwiseProgram" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>PIA wise Program</p>
            </a>
          </li>
          
          
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/CreateARTask" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Create Annual Review</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/CuriculumAssign" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Curiculum Assign</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/CuriculumAssignData" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Curiculum Assign Data</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/SchoolData" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>School Review</p>
            </a>
          </li>
          
          <!--<li class="nav-item">
            <a href="<?=base_url();?>Menu/SchoolData" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>School Report</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/validateOldSPD" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Validate School</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/CreateTask" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Create Task</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/handoverDetail" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Handover Detail</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/SchoolWithPC" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add School</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/dispatched" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dispatched</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/Report" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Report</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Approval
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           </li>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url();?>Menu/backdrop" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backdrop</p>
                </a>
              </li>
              </ul>
          </li>-->
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/Total_Handover" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Handover Detail</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/programs" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Programs Detail</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/UserTaskDetail" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>User Task Detail</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/UserPendingTask" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>User Pending Task</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/handoverDetail" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Handover Process</p>
            </a>
          </li>
          <!--<li class="nav-item">
            <a href="<?=base_url();?>Menu/changeinsp" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Change Ins Person</p>
            </a>
          </li>-->
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/backdrop" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Artwork</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/MaintenanceReport" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Ins-Main Request</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/MBagR" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Bag Request</p>
            </a>
          </li>
          
          
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/BDRequestCBox" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>BDR Complete Box</p>
            </a>
          </li>
          
           <li class="nav-item">
            <a href="<?=base_url();?>Menu/BDRequestPBox" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>BDR Pending Box</p>
            </a>
          </li>
          
          
          
          
          
           <li class="nav-item">
            <a href="<?=base_url();?>Menu/AcademicCalenderApprove" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Academic Calender Approve</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?=base_url();?>Menu/ShowPIAStatusWithAcadeCal" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>PIA Status With Academic Calender</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/StartProgrramReview" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Start Progrram Review</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url();?>Menu/AnnualProgramReviewReport" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Annual Program Review Report</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/ProgramReviewWithPIADetails" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>School Review By PIA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/AnnualReviewMeetingList" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Annual Program Review Meeting List</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/CheckProgramTimelineData" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Program Timeline Data</p>
            </a>
          </li>
          
          
          
          
          
          
          
           <li class="nav-item">
            <a href="<?=base_url();?>Menu/editProfile" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Edit Profile</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/logout" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      
      <hr><center><lable class="text-warning"><b>Alert!</b></lable></center><hr>
          <span id="alsmss"></span>
          <div class="alert alert-success" role="alert"><b><?=$notify[0]->msg;?></b></div>
    </div>
    <!-- /.sidebar -->
  </aside>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script> 
<script> 
function handleGeolocationError() {
   const bodyElement = document.querySelector("body");
   bodyElement.style.display = "none";
   alert('Error: Geolocation is not available or location services are turned off.');
}
function handleGeolocationSuccess(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    const contentDiv = document.getElementById("content");
    contentDiv.style.display = "block";
}
function getLocation() {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(handleGeolocationSuccess, handleGeolocationError);
    } else {
        const errorMessage = document.getElementById("error-message");
        errorMessage.style.display = "block";
    }
}
window.onload = getLocation;


function startCamera() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
        })
        .catch(function(error) {
             const bodyElement = document.querySelector("body");
             bodyElement.style.display = "none";
             alert('Error: Camera access permission denied.');
        });
}


$(document).ready(function() {
    trackLocation();
});

function trackLocation() {
    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          var ur_id = document.getElementById("ur_id").value;
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;
            $.ajax({
                url:'<?=base_url();?>Menu/store_location',
                 method: 'post',
                 data: {latitude: latitude, longitude: longitude, ur_id: ur_id},
                 success: function(result){
                }
            });
        },
        function (error) {
          console.error("Error getting location: " + error.message);
        }
      );
    } 
    else {console.error("Geolocation is not supported by this browser.");} 
}

function goBack() { window.history.back(); }
function goForward() { window.history.forward(); }



    var ur_id = document.getElementById("ur_id").value;;
    $.ajax({
    url:'<?=base_url();?>Menu/pmpopup',
     method: 'post',
     data: {ur_id: ur_id},
     success: function(result){
        var res = result;
        $("#alsmss").html(res);
    }
    });
    
</script>