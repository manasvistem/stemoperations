<!doctype html>
<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url() ?>assets/assets/"
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
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />
      
      <link rel="stylesheet" href="<?= base_url() ?>assets/assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/vendor/libs/apex-charts/apex-charts.css" />
    
  

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url() ?>assets/assets/vendor/js/helpers.js"></script>
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
            <a href="<?=base_url().'Menu/Dashboard'?>" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img class="img-fluid" style="width: 200px;" src="https://stemlearning.in/wp-content/uploads/2020/07/stem-new-logo-2-1.png" alt="">
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
              <?php if($dep_id == 2): ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Request</span></li>
              <li class="menu-item">
                <a href="<?=base_url().'Menu/BDREQUEST'?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-crown"></i>
                  <div class="text-truncate" data-i18n="Boxicons">REQUEST</div>
                </a>
            </li>
              <?php endif; ?>

          <?php if($dep_id == 12): ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Request</span></li>
              <li class="menu-item">
                <a href="<?=base_url().'Menu/BDREQUEST'?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-crown"></i>
                  <div class="text-truncate" data-i18n="Boxicons">BD REQUEST</div>
                </a>
              </li>
              <?php endif; ?>
         
            <?php if($dep_id == 2): ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text"></span></li>
            <li class="menu-item">
              <a href="Dashboard"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="MyNextDayPlan/<?=date('Y-m-d');?>"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="Sharetodaysplan">Share You Today's Plan</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="AddTempPerson"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="AddTempPerson">Add Temp Person</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="CreateGoals"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="CreateGoals">Create Goals</div>
              </a>
            </li>
            <?php endif; ?>
            <li class="menu-item">
              <a href="DayManagement" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="DayManagement">Day Management</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="TransitProcess"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="TransitProcess">Transit Process</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="MyDayDetail"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="MyDayDetail">Day Management Detail</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="NextDayPlan"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="NextDayPlan">Next Day Plan</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="CreateTask"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="CreateTask">Create Task</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="RequestAmount"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="RequestAmount">Request Amount</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="maintenanceBag"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="maintenanceBag">Maintenance Bag</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="editProfile"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="editProfile">Edit Profile</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="Logout"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
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
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search bx-md"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none ps-1 ps-sm-2"
                    placeholder="Search..."
                    aria-label="Search..." />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-4">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url() ?>assets/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?= base_url() ?>assets/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0"><?=$user['fullname']?></h6>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                        <?php // print_r($user['dep_id']); ?>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"> <i class="bx bx-cog bx-md me-3"></i><span>Settings</span> </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card bx-md me-3"></i
                          ><span class="flex-grow-1 align-middle">Billing Plan</span>
                          <span class="flex-shrink-0 badge rounded-pill bg-danger">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);">
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
           <script>
            $(document).ready(function(){
              let dept_name = $("#dept_name").val();
              console.log($dept_name);
            })
            </script>
