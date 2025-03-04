<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STEM Oppration | WebAPP</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      .scrollme {
    overflow-x: auto;
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  

  <!-- Navbar -->
  <?php require('nav.php');?>
  <!-- /.navbar -->
<?php include 'addlog.php';?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">School Graph</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4>HI! <?=$user['fullname']?> ( <?php $uid=$user['id']; $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row p-3">
           
    
      
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Status', 'No of School'],
          <?php $spdstatus = $this->Menu_model->get_SPDbypistatusw($uid); foreach($spdstatus as $spds){ ?>
          
          
          ['<?=$spds->name?> (<?=$spds->cont?>)',     <?=$spds->cont?>],
          
          <?php } ?>
        ]);

        var options = {
          title: 'Status Wise School',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pichrt3d1'));
        chart.draw(data, options);
      }
      
      
      
      google.charts.setOnLoadCallback(drawChart1);
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['City', 'No of School'],
          <?php $spdscity = $this->Menu_model->get_SPDbypicityw($uid); foreach($spdscity as $spds){ ?>
          
          
          ['<?=$spds->city?> (<?=$spds->cont?>)',  <?=$spds->cont?>],
          
          <?php } ?>
        ]);

        var options = {
          title: 'City Wise School',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pichrt3d2'));
        chart.draw(data, options);
      }
      
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['client', 'No of School'],
          <?php $spdclient = $this->Menu_model->get_SPDbypiclientw($uid); foreach($spdclient as $spds){ ?>
          
          
          ['<?=$spds->client?> (<?=$spds->cont?>)',     <?=$spds->cont?>],
          
          <?php } ?>
        ]);

        var options = {
          title: 'client Wise School',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pichrt3d3'));
        chart.draw(data, options);
      }
      
      
      google.charts.setOnLoadCallback(drawChart3);
      function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ['state', 'No of School'],
          <?php $spdsstate = $this->Menu_model->get_SPDbypistatew($uid); foreach($spdsstate as $spds){ ?>
          
          
          ['<?=$spds->state?> (<?=$spds->cont?>)',     <?=$spds->cont?>],
          
          <?php } ?>
        ]);

        var options = {
          title: 'state Wise School',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pichrt3d4'));
        chart.draw(data, options);
      }
      
      
      
      
      google.charts.setOnLoadCallback(drawChart4);
      function drawChart4() {
        var data = google.visualization.arrayToDataTable([
          ['project_year', 'No of School'],
          <?php $client_handoverproject_year = $this->Menu_model->get_SPDbypisyearw($uid); foreach($client_handoverproject_year as $client_handover){ ?>
          
          
          ['<?=$client_handover->project_year?> (<?=$client_handover->cont?>)',     <?=$client_handover->cont?>],
          
          <?php } ?>
        ]);

        var options = {
          title: 'year Wise School',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pichrt3d5'));
        chart.draw(data, options);
      }
      
      
      google.charts.setOnLoadCallback(drawChart5);
      function drawChart5() {
        var data = google.visualization.arrayToDataTable([
          ['project_year', 'No of School'],
          <?php $client_handoverproject_year = $this->Menu_model->get_SPDbypipyearw($uid); foreach($client_handoverproject_year as $client_handover){ ?>
          
          
          ['<?=$client_handover->project_year?> (<?=$client_handover->cont?>)',     <?=$client_handover->cont?>],
          
          <?php } ?>
        ]);

        var options = {
          title: 'year Wise project',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pichrt3d6'));
        chart.draw(data, options);
      }
      
      
      google.charts.setOnLoadCallback(drawChart6);
      function drawChart6() {
        var data = google.visualization.arrayToDataTable([
          ['total_teachers', 'No of School'],
          <?php $spdtotal_teachers = $this->Menu_model->get_SPDbypisteacherw($uid); foreach($spdtotal_teachers as $spdt){ ?>
          
          
          ['<?=$spdt->total_teachers?> (<?=$spdt->cont?>)',     <?=$spdt->cont?>],
          
          <?php } ?>
        ]);

        var options = {
          title: 'teacher Wise school',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pichrt3d7'));
        chart.draw(data, options);
      }
      
      
      google.charts.setOnLoadCallback(drawChart7);
      function drawChart7() {
        var data = google.visualization.arrayToDataTable([
          ['total_students', 'No of School'],
          <?php $spdtotal_students = $this->Menu_model->get_SPDbypisstudentw($uid); foreach($spdtotal_students as $spds){ ?>
          
          
          ['<?=$spds->total_students?> (<?=$spds->cont?>)',     <?=$spdt->cont?>],
          
          <?php } ?>
        ]);

        var options = {
          title: 'student Wise school',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pichrt3d8'));
        chart.draw(data, options);
      }
      
      
      
      
    </script>
    
    
<?php
$start_date = new DateTime('2023-04-01');
$end_date = new DateTime('2024-05-01');
$interval = new DateInterval('P1M');
$period = new DatePeriod($start_date, $interval, $end_date);
$colors = ['red', 'blue', 'green', 'yellow', 'orange', 'purple', 'pink', 'brown', 'gray', 'black', 'white', 'cyan', 'magenta', 'teal', 'lavender'];

?>


  <?php
$start_date = new DateTime('2023-04-01');
$end_date = new DateTime('2024-05-01');
$interval = new DateInterval('P1M');
$period = new DatePeriod($start_date, $interval, $end_date);
$colors = ['red', 'blue', 'green', 'yellow', 'orange', 'purple', 'pink', 'brown', 'gray', 'black', 'white', 'cyan', 'magenta', 'teal', 'lavender'];
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<div class="col-sm-6">
   
<h3 class="m-0">month wise Action</h3>
</div>

<canvas id="stackChart1" class="col-12 mt-50" width="600" height="400"></canvas>

<script>
    const data1 = {
        labels: ['April 2023', 'May 2023', 'June 2023', 'July 2023', 'August 2023', 'September 2023', 'October 2023', 'November 2023', 'December 2023', 'January 2024', 'February 2024', 'March 2024'],
        datasets: [
            <?php $i=0;$action = $this->Menu_model->get_actionbypia($uid); foreach($action as $ac){?>
            {
                label: '<?=$ac->action?>',
                data: [
                    <?php
                    foreach ($period as $date) {
                        $y = $date->format('Y');
                        $m = $date->format('n');
                        $tcount = $this->Menu_model->get_apiabyym($uid,$y,$m,$ac->action);?>
                        <?=$tcount[0]->cont?>,
                    <?php } ?>
                ],
                backgroundColor: '<?=$colors[$i % count($colors)]?>',
            },
            <?php $i++;} ?>  
        ],
    };

    const config1 = {
        type: 'bar',
        data: data1,
        options: {
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true,
                    beginAtZero: true,
                },
            },
        },
    };

    const ctx1 = document.getElementById('stackChart1').getContext('2d');
    const stackChart1 = new Chart(ctx1, config1);
</script>
<div class="col-sm-6">
   
<h3 class="m-0">Action wise Actiontacken yes Purpose yes</h3>
</div>


<!-- Create a second canvas for the second chart -->
<canvas id="stackChart2"class="col-12 mt-50" width="600" height="400"></canvas>

<script>
    const data2 = {
        labels: ['April 2023', 'May 2023', 'June 2023', 'July 2023', 'August 2023', 'September 2023', 'October 2023', 'November 2023', 'December 2023', 'January 2024', 'February 2024', 'March 2024'],
        datasets: [
            <?php $i=0;$action = $this->Menu_model->get_actionbypia($uid); foreach($action as $ac){?>
            {
                label: '<?=$ac->action?>',
                data: [
                    <?php
                    foreach ($period as $date) {
                        $y = $date->format('Y');
                        $m = $date->format('n');
                        $tcount = $this->Menu_model->get_apiaapbyym($uid,$y,$m,$ac->action);?>
                        <?=$tcount[0]->cont?>,
                    <?php } ?>
                ],
                backgroundColor: '<?=$colors[$i % count($colors)]?>',
            },
            <?php $i++;} ?>  
        ],
    };

    const config2 = {
        type: 'bar',
        data: data2,
        options: {
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true,
                    beginAtZero: true,
                },
            },
        },
    };

    const ctx2 = document.getElementById('stackChart2').getContext('2d');
    const stackChart2 = new Chart(ctx2, config2);
</script>
<div class="col-sm-6 mt-10">
   
<h3 class="m-0">Action wise Actiontacken yes Purpose no</h3>
</div>
<!-- Create a second canvas for the second chart -->
<canvas id="stackChart3"class="col-12 mt-50" width="600" height="400"></canvas>

<script>
    const data3 = {
        labels: ['April 2023', 'May 2023', 'June 2023', 'July 2023', 'August 2023', 'September 2023', 'October 2023', 'November 2023', 'December 2023', 'January 2024', 'February 2024', 'March 2024'],
        datasets: [
            <?php $i=0;$action = $this->Menu_model->get_actionbypia($uid); foreach($action as $ac){?>
            {
                label: '<?=$ac->action?>',
                data: [
                    <?php
                    foreach ($period as $date) {
                        $y = $date->format('Y');
                        $m = $date->format('n');
                        $tcount = $this->Menu_model->get_apiaatpbyym($uid,$y,$m,$ac->action);?>
                        <?=$tcount[0]->cont?>,
                    <?php } ?>
                ],
                backgroundColor: '<?=$colors[$i % count($colors)]?>',
            },
            <?php $i++;} ?>  
        ],
    };

    const config3 = {
        type: 'bar',
        data: data3,
        options: {
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true,
                    beginAtZero: true,
                },
            },
        },
    };

    const ctx3 = document.getElementById('stackChart3').getContext('2d');
    const stackChart3 = new Chart(ctx3, config3);
</script>

    

<div class="col-sm-6 mt-10">
   
<h3 class="m-0">Action wise Actiontacken no Purpose no</h3>
</div>
<!-- Create a second canvas for the second chart -->
<canvas id="stackChart4"class="col-12 mt-50" width="600" height="400"></canvas>

<script>
    const data4 = {
        labels: ['April 2023', 'May 2023', 'June 2023', 'July 2023', 'August 2023', 'September 2023', 'October 2023', 'November 2023', 'December 2023', 'January 2024', 'February 2024', 'March 2024'],
        datasets: [
            <?php $i=0;$action = $this->Menu_model->get_actionbypia($uid); foreach($action as $ac){?>
            {
                label: '<?=$ac->action?>',
                data: [
                    <?php
                    foreach ($period as $date) {
                        $y = $date->format('Y');
                        $m = $date->format('n');
                        $tcount = $this->Menu_model->get_apiaatpurbyym($uid,$y,$m,$ac->action);?>
                        <?=$tcount[0]->cont?>,
                    <?php } ?>
                ],
                backgroundColor: '<?=$colors[$i % count($colors)]?>',
            },
            <?php $i++;} ?>  
        ],
    };

    const config4 = {
        type: 'bar',
        data: data4,
        options: {
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true,
                    beginAtZero: true,
                },
            },
        },
    };

    const ctx4 = document.getElementById('stackChart4').getContext('2d');
    const stackChart4 = new Chart(ctx4, config4);
</script>



<div class="col-sm-6 mt-10">
   
<h3 class="m-0">Tasks Complete on month wise school</h3>
</div>
<!-- Create a second canvas for the second chart -->
<canvas id="stackChart5"class="col-12 mt-50" width="600" height="400"></canvas>

<script>
    const data5 = {
        labels: ['April 2023', 'May 2023', 'June 2023', 'July 2023', 'August 2023', 'September 2023', 'October 2023', 'November 2023', 'December 2023', 'January 2024', 'February 2024', 'March 2024'],
        datasets: [
            <?php $i=0;$action = $this->Menu_model->get_actionbypia($uid); foreach($action as $ac){?>
            {
                label: '<?=$ac->action?>',
                data: [
                    <?php
                    foreach ($period as $date) {
                        $y = $date->format('Y');
                        $m = $date->format('n');
                        $tcount = $this->Menu_model->get_tcmws($uid,$y,$m,$ac->action);?>
                        <?=$tcount[0]->cont?>,
                    <?php } ?>
                ],
                backgroundColor: '<?=$colors[$i % count($colors)]?>',
            },
            <?php $i++;} ?>  
        ],
    };

    const config5 = {
        type: 'bar',
        data: data5,
        options: {
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true,
                    beginAtZero: true,
                },
            },
        },
    };

    const ctx5 = document.getElementById('stackChart5').getContext('2d');
    const stackChart5 = new Chart(ctx5, config5);
</script>
    
    
    
  </head>
  <div class="row">
    <div id="pichrt3d1" class="col-6 mt-50" style="width: 900px; height: 500px; "></div>
    <div id="pichrt3d2" class="col-6 mt-50" style="width: 900px; height: 500px;"></div>
    <div id="pichrt3d3" class="col-6 mt-50" style="width: 900px; height: 500px;"></div>
    <div id="pichrt3d4" class="col-6 mt-50" style="width: 900px; height: 500px;"></div>
    <div id="pichrt3d5" class="col-6 mt-50" style="width: 900px; height: 500px;"></div>
    <div id="pichrt3d6" class="col-6 mt-50" style="width: 900px; height: 500px;"></div>
    <div id="pichrt3d7" class="col-6 mt-50" style="width: 900px; height: 500px;"></div>
    <div id="pichrt3d8" class="col-6 mt-50" style="width: 900px; height: 500px;"></div>
   </div>    

           
           
           
          
  </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


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
<script src="<?=base_url();?>assets/js/myjs.js"></script>

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