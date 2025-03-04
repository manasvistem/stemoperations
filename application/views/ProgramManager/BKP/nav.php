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
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
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
          <a href="#" class="d-block">User Name</a>
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
<style>
.bg-light,.bg-light>a,.card.card-outline-tabs{box-shadow:inset 4px 4px 7px rgba(55,84,170,.15),inset -4px -4px 10px #fff,0 0 2px rgba(255,255,255,.2)}.card,.card.card-outline-tabs,.small-box>.inner,table{transition:box-shadow .2s ease-in-out;padding:10px;background:#fff8dc}.card.card-outline-tabs{border-top:0}.bg-light,.bg-light>a{border-radius:0;transition:box-shadow .2s ease-in-out}.card{box-shadow:none}.card,.main-footer,.navbar-white,.small-box>.inner,table{box-shadow:inset 4px 4px 7px rgba(55,84,170,.15),inset -4px -4px 10px #fff,0 0 2px rgba(255,255,255,.2)}.navbar-white{background:#fff8dc}[class*=sidebar-dark-]{background:#3b1818;background:conic-gradient(from 180deg at 50% 50%,#220c0c,#220c0c,#0f0c22,#0c2215,#140c22,#220c13);animation:20s linear infinite spinGradient;transition:.2s ease-in-out}.nav-sidebar>.nav-item{box-shadow:rgba(60,64,67,.3) 0 1px 2px 0,rgba(60,64,67,.15) 0 2px 6px 2px}.fa-circle:before,.nav-sidebar .nav-item>.nav-link{font-size:13px;margin:-2px}#alsmss,span#alsmss{font-size:13px}#alsmss h5{font-size:15px}aside #mainlogo{filter:drop-shadow(0 0 1rem blue);animation:5s linear infinite spinGradient_image;transition:.2s}@keyframes spinGradient_image{0%{filter:drop-shadow(0 0 1rem #ff0f7b)}25%{filter:drop-shadow(0 0 1rem #fff95b)}50%{filter:drop-shadow(0 0 1rem #e60b09)}75%{filter:drop-shadow(0 0 1rem #59d102)}100%{filter:drop-shadow(0 0 1rem #6bdfdb)}}@keyframes spinGradient{0%{background:conic-gradient(from 90deg at 50% 50%,#220c0c,#220c0c,#0f0c22,#0c2215,#140c22,#220c13)}25%{background:radial-gradient(circle,#220c0c,#0f0c22,#0c2215,#140c22,#220c13)}100%,50%{background:conic-gradient(from 180deg at 50% 50%,#220c0c,#0f0c22,#0c2215,#140c22,#220c13,#220c0c)}75%{background:conic-gradient(from 270deg at 50% 50%,#220c0c,#0f0c22,#0c2215,#140c22,#220c13,#220c0c)}}body::-webkit-scrollbar{width:15px}body::-webkit-scrollbar-track{box-shadow:inset 0 0 6px rgba(0,0,0,.3)}body::-webkit-scrollbar-thumb{border-radius:15px;border:none;outline:0;background:#a8f268;background:linear-gradient(90deg,#a8f268 0,#f7025c 100%);background:-moz-linear-gradient(90deg,#a8f268 0,#f7025c 100%);background:-webkit-linear-gradient(90deg,#a8f268 0,#f7025c 100%)}@keyframes gradientAnimation_thumn{0%,100%{background-position:0 50%}50%{background-position:100% 50%}}
/*.card, .main-footer, .navbar-white, .small-box>.inner, table {*/
/*    background-image: url("https://raw.githubusercontent.com/mobalti/open-props-interfaces/refs/heads/main/ai-hero-chat-popover/assets/bg-gradient.jpg");*/
/*        background-position: center;*/
/*        background-repeat: no-repeat;*/
/*        background-size: cover;*/
/*}*/
.main-footer, .navbar-white,.card-body-addnewlead {
    background-image: url("https://raw.githubusercontent.com/mobalti/open-props-interfaces/refs/heads/main/ai-hero-chat-popover/assets/bg-gradient.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
}
.card-body-addnewlead {
    box-shadow: inset 4px 4px 7px rgba(55, 84, 170, 0.15), inset -4px -4px 10px white, 0px 0px 2px rgba(255, 255, 255, 0.2);
    transition: box-shadow 0.2s ease-in-out;
    border-radius: 20px;
}
.card-body-addnewlead:hover {
    color: #000000!important;
}
</style>