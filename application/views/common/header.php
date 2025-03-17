<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STEM Oppration | WebAPP</title>
      <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/assets/img/favicon/favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
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
  </style>
</head>
