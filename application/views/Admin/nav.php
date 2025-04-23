<!doctype html>
<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url() ?>assets/"
  data-template="vertical-menu-template-free"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Demo : Dashboard - Analytics | sneat - Bootstrap Dashboard PRO</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />
      
      <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/apex-charts/apex-charts.css" />
    
  

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url() ?>assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url() ?>assets/js/config.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" />
    <style>
  thead.thead-dark {
  background: black;
  color: white !important;
  }
  thead.thead-dark tr th {
  color: white !important;
  }
  .table:not(.table-borderless):not(.table-dark) > :not(caption) > *:not(.table-dark) > * {
    font-weight: 700;
}
.on-time { color: #28a745; /* Green text */ } .late { color: #dc3545; /* Red text */ }



/* NEW CSS BY DEEPAK */

.nav-align-top > .nav.nav-pills .nav-item { box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;background: ghostwhite; }

/* Extra small devices (phones) */
@media screen and (max-width: 576px) { 
  .d-none {
        display: block !important;
    }
    .bx-home:before {display:none!important; }
  }

/* Small devices (landscape phones) */
@media screen and (min-width: 577px) and (max-width: 768px) {
    .d-none {
        display: block !important; 
    }
    .bx-home:before {display:none!important; }
}

.home-page-card{
  padding: 10px;
}




</style>
<script>
    function checkCountDownTime(first_date, givenid) {
    var targetDate = new Date(first_date).getTime();

    function updateTimer() {
        var now = new Date().getTime();
        var diff = targetDate - now;
        var isPast = diff < 0; // Check if the date is in the past
        diff = Math.abs(diff); // Always take absolute value for calculations

        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((diff % (1000 * 60)) / 1000);

        var countdownText = [];
        if (days > 0) countdownText.push(days + " days");
        if (hours > 0) countdownText.push(hours + " hours");
        if (minutes > 0) countdownText.push(minutes + " minutes");
        if (seconds > 0) countdownText.push(seconds + " seconds");

        var countdownElement = document.getElementById("countdown" + givenid);
        var statusElement = document.getElementById("status" + givenid);

        if (isPast) {
            countdownElement.textContent = countdownText.join(", ");
            countdownElement.classList.add("late");
            statusElement.textContent = "Late";
            statusElement.classList.remove("on-time");
            statusElement.classList.add("late");
        } else {
            countdownElement.textContent = countdownText.join(", ");
            countdownElement.classList.add("on-time");
            statusElement.textContent = "On Time";
            statusElement.classList.remove("late");
            statusElement.classList.add("on-time");
        }
    }

    setInterval(updateTimer, 1000);
    updateTimer();
}

        // Start the countdown/countup
        // checkCountDownTime("2025-02-12 12:57:07",1);
    </script>
  </head>
  <body>
  <?php 

  $dep_id = $user['dep_id'];
  //dd($user);
  ?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="<?=base_url() ?>Menu/Dashboard" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img class="img-fluid" style="width: 200px;" src="https://stemlearning.in/wp-content/uploads/2020/07/stem-new-logo-2-1.png" alt="">
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>
          <div class="text-center mt-3">
                <span><?=$user['fullname'];?></span>
              </div>
            <hr class="bg-success">

          <ul class="menu-inner py-1">
            <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Request</span></li>
              <li class="menu-item">
                <a href="<?=base_url().'Menu/BDREQUEST'?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-crown"></i>
                  <div class="text-truncate" data-i18n="Boxicons">REQUEST</div>
                </a>
            </li> -->
           
            
            <li class="menu-item">
              <a href="<?=base_url() ?>Menu/Dashboard" 
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Request</span></li>
           
           
           
            <li class="menu-item">
              <a href="<?=base_url() ?>Menu/DayManagement"
                class="menu-link">
                <i class='bx bxs-sun' ></i> &nbsp;
                <div class="text-truncate" data-i18n="MyDayDetail">Day Management</div>
              </a>
            </li>


            <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='bx bxs-data' ></i>  &nbsp;
                  <div class="text-truncate" data-i18n="Form Elements">School Details</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?=base_url().'Menu/SPD_Details/'?>" class="menu-link">
                      <div class="text-truncate" data-i18n="Input groups"> <i class='bx bxl-mongodb' ></i> School List</div>
                    </a>
                  </li>
                </ul>
              </li>

          
            <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='bx bxs-timer' ></i> &nbsp;
                  <div class="text-truncate" data-i18n="Form Elements">Planner Management</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?=base_url().'Menu/TodaysPlannerRequest'?>" class="menu-link">
                      <div class="text-truncate" data-i18n="Input groups"><i class='bx bxl-mongodb' ></i> Todays Planner Request</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?=base_url().'Menu/PendingTaskPlannerRequest'?>" class="menu-link">
                      <div class="text-truncate" data-i18n="Input groups"><i class='bx bxl-mongodb' ></i> Pending Task Planner Request</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?=base_url().'Menu/PlannerTaskApprovalPage'?>" class="menu-link">
                      <div class="text-truncate" data-i18n="Input groups"><i class='bx bxl-mongodb' ></i> Planner Task Approval Page</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-item" style="">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='bx bxs-sun' ></i> &nbsp;
                  <div class="text-truncate" data-i18n="Form Elements">Day Management</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?=base_url().'Menu/YesterDayDaysCloseRequest'?>" class="menu-link">
                      <div class="text-truncate" data-i18n="Input groups"><i class='bx bxl-mongodb' ></i>  Day Close Request</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-item" style="">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div class="text-truncate" data-i18n="Form Elements">Check Time Line</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                <a href="<?=base_url().'Menu/CheckHandoverTimelinelineData'?>" class="menu-link">
                    <div class="text-truncate" data-i18n="Basic Inputs">Handover Timeline</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?=base_url().'Menu/CheckProgramTimelineData'?>" class="menu-link">
                    <div class="text-truncate" data-i18n="Input groups">Program Timeline</div>
                  </a>
                </li>
              </ul>
            </li>


              <li class="menu-item">
              <a href="<?=base_url() ?>Menu/TaskPlannerManagement"
                class="menu-link">
                <i class='bx bx-task'></i>&nbsp;
                <div class="text-truncate" data-i18n="MyDayDetail">Task Management</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="<?= base_url()?>Menu/logout" class="menu-link">
              <i class='bx bx-log-out-circle'></i> &nbsp;
                <div class="text-truncate" data-i18n="Logout">Logout</div>
              </a>
            </li>
             
              

           



           
       
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="bx bx-menu bx-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <!-- <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search bx-md"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none ps-1 ps-sm-2"
                    placeholder="Search..."
                    aria-label="Search..." />
                </div>
              </div> -->
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                 <?php /*
                <li class="nav-item lh-1 me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                </svg></li>
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-4">
                  <a class="github-button"  href="viewProfile" data-icon="octicon-star" data-size="large" data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    ><?php echo $user['user_name'];?></a>
                </li>
                */ ?>
                <?php 
                  $currentUserData  =  $this->Menu_model->get_user_byid($user['id']);
                  $userprofile      = $currentUserData[0]->photo;
                   ?>
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <?php if($userprofile ==''){ ?>
                        <img src="<?=base_url()?>assets/img/profile.jpg" 
                          alt="user-avatar" class="w-px-40 h-auto rounded-circle">
                        <?php }else{ ?>
                        <img src="<?=base_url().$userprofile;?>" 
                          alt="user-avatar" class="w-px-40 h-auto rounded-circle" />
                        <?php } ?>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <?php if($userprofile == ''){ ?>
                              <img src="<?=base_url()?>assets/img/profile.jpg" 
                                alt="user-avatar" class="w-px-40 h-auto rounded-circle">
                              <?php }else{ ?>
                              <img src="<?=base_url().$userprofile;?>" 
                                alt="user-avatar" class="w-px-40 h-auto rounded-circle" />
                              <?php } ?>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0"><?=$user['fullname']?></h6>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url().'Menu/AccountSettings'?>">
                        <i class="bx bx-user bx-md me-3"></i><span>My Profile & Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#basicModalSendReminder">
                        <i class="bx bx-bell bx-md me-3"></i><span>Send Reminder</span>
                      </a>
                    </li>
                    <?php 
                    $getnotifications =  $this->Menu_model->GetTodaysNotiifications($user['id'],date("Y-m-d"));
                    $getnotificationscnt = sizeof($getnotifications);
                    ?>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBothNotification" aria-controls="offcanvasBoth">
                        <i class="bx bx-bell bx-md me-3"></i><span>Notification 
                          (<span id="notifynavpage"><?= $getnotificationscnt;?></span></span> )
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url()?>/Menu/logout">
                        <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
          <!-- / Navbar -->