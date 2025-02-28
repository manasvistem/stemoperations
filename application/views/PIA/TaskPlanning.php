<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STEM Operation | WebAPP</title>

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
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  

  <!-- Navbar -->
  <?php require('nav.php');?>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Task</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4>HI! <?php echo $username=$user['fullname']; $uid=$user['id'];$rid=$user['region_id'];?> ( <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-sm-12 col-md-4 col-lg-4 mb-4 filter-item">
           <div class="card p-3 border rounded border-success hover-div d-flex flex-column align-items-stretch h-100 text-dark">
                 <div id="piechart3d1"></div>
                 <div id="piechart3d2"></div>
                 <div id="piechart3d3"></div>
                                         
<?php $colors = array('red','blue','green','yellow','purple','orange','pink','brown','cyan','magenta','teal','lime','violet','indigo','gray');?>
<?php $task = array('Welcome','Outbond','FTTP','RTTP','Call for Utilisation','Report','Case Study','Maintenance','DIY','BaseLine','EndLine','Utilisation');?>

<div style="width: 80%; margin: auto;">
   <canvas id="combinedChartID1"></canvas>
</div>  
                  
              
    <?php 
        $sd="2023-09-26";
        $ed=date('Y-m-d');?>


                 
                 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                  <script type="text/javascript">
                        google.charts.load("current", { packages: ['corechart'] });
                        google.charts.setOnLoadCallback(drawChart12);
                        function drawChart12() {
                          var data = new google.visualization.DataTable();
                          data.addColumn('string', 'Status');
                          data.addColumn('number', 'No of Company');
                          data.addColumn('string', 'id');
                          data.addColumn('string', 'uid');
                          <?php
                          $status = $this->Menu_model->get_ptcase1g1($uid);
                          foreach ($status as $st) {
                            $statusName = $st->name . " (" . $st->cont . ")";
                            echo "data.addRow(['$statusName', $st->cont, '$st->stid', '$uid']);"; }
                          ?>
                        
                          var options = {
                            title: 'Utilisation Not Received From Last 15 Days Status Wise',
                            is3D: true,
                          };
                        
                          var chart = new google.visualization.PieChart(document.getElementById('piechart3d1'));
                        
                          google.visualization.events.addListener(chart, 'select', function() {
                            var selection = chart.getSelection()[0];
                            if (selection) {
                              var stid = data.getValue(selection.row, 2);
                              var uuid = data.getValue(selection.row, 3);
                              var code = 1;
                              window.location.href = '<?=base_url();?>Menu/SGraph1/' + stid + '/' + code;
                            }
                          });
                          chart.draw(data, options);
                        }
                        
                        google.charts.setOnLoadCallback(drawChart2);
                        function drawChart2() {
                          var data = new google.visualization.DataTable();
                          data.addColumn('string', 'Status');
                          data.addColumn('number', 'No of Company');
                          data.addColumn('string', 'id');
                          data.addColumn('string', 'uid');
                          <?php
                          $status = $this->Menu_model->get_ptcase1g2($uid);
                          foreach ($status as $st) {
                            $statusName = $st->pyear . " (" . $st->cont . ")";
                            echo "data.addRow(['$statusName', $st->cont, '', '$uid']);"; }
                          ?>
                        
                          var options = {
                            title: 'Utilisation Not Received From Last 15 Days Year Wise',
                            is3D: true,
                          };
                        
                          var chart = new google.visualization.PieChart(document.getElementById('piechart3d2'));
                        
                          google.visualization.events.addListener(chart, 'select', function() {
                            var selection = chart.getSelection()[0];
                            if (selection) {
                              var stid = data.getValue(selection.row, 2);
                              var uuid = data.getValue(selection.row, 3);
                              var code = 1;
                              window.location.href = '<?=base_url();?>Menu/SGraph1/' + stid + '/' + code;
                            }
                          });
                          chart.draw(data, options);
                        }
                        
                        
                        google.charts.setOnLoadCallback(drawChart3);
                        function drawChart3() {
                          var data = new google.visualization.DataTable();
                          data.addColumn('string', 'Status');
                          data.addColumn('number', 'No of Company');
                          data.addColumn('string', 'id');
                          data.addColumn('string', 'uid');
                          <?php
                          $status = $this->Menu_model->get_ptcase1g3($uid);
                          foreach ($status as $st) {
                            $statusName = $st->pcode . " (" . $st->cont . ")";
                            echo "data.addRow(['$statusName', $st->cont, '', '$uid']);"; }
                          ?>
                        
                          var options = {
                            title: 'Utilisation Not Received From Last 15 Days Project Wise',
                            is3D: true,
                          };
                        
                          var chart = new google.visualization.PieChart(document.getElementById('piechart3d3'));
                        
                          google.visualization.events.addListener(chart, 'select', function() {
                            var selection = chart.getSelection()[0];
                            if (selection) {
                              var stid = data.getValue(selection.row, 2);
                              var uuid = data.getValue(selection.row, 3);
                              var code = 1;
                              window.location.href = '<?=base_url();?>Menu/SGraph1/' + stid + '/' + code;
                            }
                          });
                          chart.draw(data, options);
                        }
                        
                        
      
        
        var combinedData1 = {
            
            labels: [<?php $ta = sizeof($task); for($i=0;$i<$ta;$i++){?> '<?=$task[$i]?>', <?php } ?>],
            datasets: [
                {
                    label: 'Target',
                    backgroundColor: ['red','red','red','red','red','red','red','red','red','red','red','red','red','red'],
                    data: [
                        <?php 
                        $ta = sizeof($task); for($i=0;$i<$ta;$i++){
                        $stv = $this->Menu_model->get_ptcase1g4($i);?>
                        <?=$stv[0]->traget?>,
                        <?php } ?>
                        ],
                        stack: 'Stack 0' 
                },
                {
                    label: 'Done',
                    backgroundColor: ['green','green','green','green','green','green','green','green','green','green','green','green','green','green'],
                    data: [
                        <?php 
                        $ta = sizeof($task); for($i=0;$i<$ta;$i++){
                        $stv = $this->Menu_model->get_ptcase1g4($i);?>
                        <?=$stv[0]->done?>,
                        <?php } ?>
                        ],
                        stack: 'Stack 1'
                },
            ]
        };

        var combinedCtx = document.getElementById("combinedChartID1").getContext('2d');
        var combinedChart = new Chart(combinedCtx, {
            type: 'bar',
            data: combinedData1,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: ''
                    },
                },
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });
                  
                    
                  </script>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 mb-4 filter-item">
           <div class="card p-3 border rounded hover-div d-flex flex-column align-items-stretch h-100 text-dark">
                 <?php $tdate=date('Y-m-d');?>
                 <div class="row">
                     <div class="card border border-danger mb-3 col-12">
                         <?php  $data = $this->Menu_model->get_ptcase1($uid);$ai=1;?>
                          <div class="card-header text-danger"><b>Activation Call</b><br><i>Utilisation Not Received From Last 15 Days</i><br><b>Total Count : <?=sizeof($data)?></b></div>
                          <div class="card-body text-dark">
                                <div class="card border border-info mb-3 col-sm">
                                <div class="card-header text-info"><b><?=$data[0]->sname?></b></div>
                                <div class="card-body text-dark">
                                    <?=$data[0]->clientname?><br>
                                    <b><?=$data[0]->project_code?></b><br>
                                    <?=$data[0]->saddress?>,<?=$data[0]->scity?>,<?=$data[0]->sstate?><br>
                                    <div class="text-right text-info"><button id="add_plan<?=$ai?>" value="1"><b>Plan Task  <i class="fa-solid fa-forward"></i></b></button></div>
                                    </div>
                                </div>
                          </div>
                        </div>
                     
                     
                     <?php  $data = $this->Menu_model->get_ptcase2($uid); if(sizeof($data)>0){ ?>
                     <div class="card border border-danger mb-3 col-12">
                          <div class="card-header text-danger"><b>RTTP</b><br><i>Target Date Over Due</i><br><b>Total Count : <?=sizeof($data)?></b></div>
                          <div class="card-body text-dark">
                                <div class="card border border-info mb-3 col-sm">
                                <div class="card-header text-info"><b><?=$data[1]->sname?></b></div>
                                <div class="card-body text-dark">
                                    <?=$data[1]->clientname?><br>
                                    <b><?=$data[1]->project_code?></b><br>
                                    <?=$data[1]->saddress?>,<?=$data[1]->scity?>,<?=$data[1]->sstate?><br>
                                    <div class="text-right text-info"><b>Plan Task  <i class="fa-solid fa-forward"></i></b></div>
                                    </div>
                                </div>
                          </div>
                        </div>
                       <?php  } ?>    
                     
                     
                     <?php  $data = $this->Menu_model->get_ptcase3($uid); if(sizeof($data)>0){ ?>
                     <div class="card border border-danger mb-3 col-12">
                         <?php  $data = $this->Menu_model->get_ptcase3($uid);?>
                          <div class="card-header text-danger"><b>RTTP</b><br><i>Target Date is Comming on this week</i><br><b>Total Count : <?=sizeof($data)?></b></div>
                          <div class="card-body text-dark">
                                <div class="card border border-info mb-3 col-sm">
                                <div class="card-header text-info"><b><?=$data[0]->sname?></b></div>
                                <div class="card-body text-dark">
                                    <?=$data[0]->clientname?><br>
                                    <b><?=$data[0]->project_code?></b><br>
                                    <?=$data[0]->saddress?>,<?=$data[0]->scity?>,<?=$data[0]->sstate?><br>
                                    <div class="text-right text-info"><b>Plan Task  <i class="fa-solid fa-forward"></i></b></div>
                                    </div>
                                </div>
                          </div>
                     </div>
                     <?php  } ?>
                     
                     
                    
                     </div> 
                     
                     
                     
                     
                     
                     
                     
            </div>
         </div>
                        
<div class="col-sm-12 col-md-4 col-lg-4 mb-4 filter-item">
           <div class="card p-3 border rounded border-success hover-div d-flex flex-column align-items-stretch h-100 text-dark">             
<p id="demo" class="text-right card p-2">Time Spent in Planning: 00:00:00</p>
<center><b><i>Total Plan Time : x</i></b>
<p class="m-auto" id="chart_div"></p><hr></center>
<div class="row">
    <div class="col-lg-6 col-sm" id="piechart1"></div>
    <div class="col-lg-6 col-sm" id="piechart2"></div>
</div>

<script>
<?php $totaltaktimep = $this->Menu_model->get_totaltaktimep($uid,$tdate); $ttime = $totaltaktimep[0]->ttime;  $ttime = $ttime/60;?>

var pageLoadTime = new Date().getTime() - 0;
var x = setInterval(function() {
  var now = new Date().getTime();
  var timeSpent = now - pageLoadTime;
  var hours = Math.floor((timeSpent / 1000) / 3600);
  var minutes = Math.floor(((timeSpent / 1000) % 3600) / 60);
  var seconds = Math.floor((timeSpent / 1000) % 60);
  var formattedTimeSpent = 
    (hours < 10 ? "0" : "") + hours + ":" +
    (minutes < 10 ? "0" : "") + minutes + ":" +
    (seconds < 10 ? "0" : "") + seconds;
    document.getElementById("demo").innerHTML = "Time Spent in Planning: " + formattedTimeSpent;
    document.getElementById("tptime").value=formattedTimeSpent;
}, 1000);
</script>
       
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Planning', <?=$ttime?>]
      ]);
      var options = {
          redFrom: 0,
          redTo: 3,
          yellowFrom: 3,
          yellowTo: 6,
          greenFrom: 6,
          greenTo: 8,
          minorTicks: 4,
          max: 8
      };
      var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Status', 'No of Task'],
            <?php $action = $this->Menu_model->get_tttbytimedaction($uid,$tdate);
             foreach($action as $ac){?>
             ["<?=$ac->acname?> (<?=$ac->cont?>)", <?=$ac->cont?>],
    	    <?php } ?>
        ]);

        var options = {
          is3D: false,
          
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
      }
      
      
      
      
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart4);
      function drawChart4() {
        var data = google.visualization.arrayToDataTable([
          ['Status', 'No of Task'],
            <?php $status = $this->Menu_model->get_tttbytimedstatus($uid,$tdate);
             foreach($status as $st){?>
             ["<?=$st->stname?> (<?=$st->cont?>)", <?=$st->cont?>],
    	    <?php } ?>
        ]);

        var options = {
          is3D: false,
          
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
      }
      
      
      
  </script>



  
  
  <hr>
    
    <div>
        
        
        
        <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">
                      <h6>Task Planned for <?=$tdate?></h6>
                    </button>
                </div>
            
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                      
                      <?php $tted = $this->Menu_model->get_tttbytimedaction($uid,$tdate); foreach($tted as $ted){?>
                            <span class="badge"  style="background-color:<?=$ted->aclr?>"><?=$ted->acname?> <span class="badge badge-light text-dark"><?=$ted->cont?></span></span>
                        <?php } ?>
                        <hr>
                        <?php $tted = $this->Menu_model->get_tttbytimedstatus($uid,$tdate); foreach($tted as $ted){?>
                            <span class="badge" style="background-color:<?=$ted->sclr?>"><?=$ted->stname?> <span class="badge badge-light text-dark"><?=$ted->cont?></span></span>
                        <?php } ?>
                        
                        <hr>
                        <h5></h5>
                        <?php $timeslot = $this->Menu_model->get_timeslot(); foreach($timeslot as $tl){$t1=$tl->time1;$t2=$tl->time2;?>
                            <div class="card border border-info">
                                <div class="card-header">
                                    <b><?=date("h:i A", strtotime($tl->time1));?> to <?=date("h:i A", strtotime($tl->time2));?></b>
                                    </br>
                                    <?php  $ted = $this->Menu_model->get_ttbytimedaction($uid,$tdate,$t1,$t2); foreach($ted as $ted){?>
                                        <span class="badge" style="background-color:<?=$ted->aclr?>"><?=$ted->acname?> <span class="badge badge-light text-dark"><?=$ted->cont?></span></span>
                                    <?php } ?>
                                    <hr>
                                    <?php $ted = $this->Menu_model->get_ttbytimedstatus($uid,$tdate,$t1,$t2); foreach($ted as $ted){?>
                                        <span class="badge" style="background-color:<?=$ted->sclr?>"><?=$ted->stname?> <span class="badge badge-light text-dark"><?=$ted->cont?></span></span>
                                    <?php } ?>
                                </div>
                                <?php $totaltaktimep = $this->Menu_model->get_totaltaktimepbyh($uid,$tdate,$t1,$t2); 
                                $ttime = $totaltaktimep[0]->ttime;
                                if($ttime>'120'){$bcolor="bg-success"; $msg="Great! You have been scheduled for full-time utilization.";}
                                elseif($ttime=='0'){$bcolor="bg-danger";$msg="Caution! Make sure to plan for this period.";}
                                else{$bcolor="bg-warning";$msg="Nice job! Consider planning additional tasks.";}
                                ?>
                                <div class="card-footer <?=$bcolor?>"><b><?=$msg?></b></div>
                            </div>
                        <?php } ?>
                                    
                    
                  </div>
                </div>
              </div>
              
              <button id="printButton">Print</button>
              
              </div>
            </div>
        
    </div>  
    
    
    
        
         </div>
        </div>
        </div>
    </section> 
    
    </div>
        </div>
        
        </div>
        </div>
        
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
<script type='text/javascript'>

document.getElementById('printButton').addEventListener('click', function() {
    var contentToPrint = document.getElementById('content').outerHTML;
    var printWindow = window.open('', '', 'width=600,height=600');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Print</title>');
    printWindow.document.write('</head><body>');
    printWindow.document.write(contentToPrint);
    printWindow.document.write('</body></html>');
    printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">');
    
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
});



$("#cmpdetail,#statusmdetail,#locationdetail,#categorydetail,#notask15ddetail,#tobescheduled,#samesfld,#preplanned,#reviewtarget").hide();
  var radioButtons = document.querySelectorAll('input[name="optradio"]');
  radioButtons.forEach(function(radio) {
  radio.addEventListener('change', function() {
      var val = radio.value;
      if(val=='Compnay Name'){
          $("#statusmdetail,#locationdetail,#categorydetail,#notask15ddetail,#tobescheduled,#samesfld,#preplanned,#reviewtarget").hide();
          $("#cmpdetail").show();
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart10);
          function drawChart10() {
            var data = google.visualization.arrayToDataTable([
              ['Status', 'No of Compnay'],
            <?php $partner = $this->Menu_model->get_fannalpartner($uid);
             foreach($partner as $pa){?>
             ["<?=$pa->pname?> (<?=$pa->cont?>)", <?=$pa->cont?>],
            <?php } ?>
            
            ]);
            var options = {
              title: 'Compnay Name',
              is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('cmpdetail'));
            chart.draw(data, options);
          }
      }
      
      
      if(val=='Status'){
          $("#locationdetail,#categorydetail,#cmpdetail,#notask15ddetail,#tobescheduled,#samesfld,#preplanned,#reviewtarget").hide();
          $("#statusmdetail").show();
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart10);
          function drawChart10() {
            var data = google.visualization.arrayToDataTable([
              ['Status', 'No of Compnay'],
            <?php $partner = $this->Menu_model->get_fannalpartner($uid);
             foreach($partner as $pa){?>
             ["<?=$pa->pname?> (<?=$pa->cont?>)", <?=$pa->cont?>],
            <?php } ?>
            
            ]);
            var options = {
              title: 'Status Type wise funnel',
              is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('statusmdetail'));
            chart.draw(data, options);
          }
      }
      
      
      if(val=='Location'){
          $("#statusmdetail,#categorydetail,#cmpdetail,#notask15ddetail,#tobescheduled,#samesfld,#preplanned,#reviewtarget").hide();
          $("#locationdetail").show();
          google.charts.setOnLoadCallback(drawChart13);
          function drawChart13() {
            var data = google.visualization.arrayToDataTable([
              ['City', 'No of Compnay'],
                <?php $city = $this->Menu_model->get_fannalcitywise($uid);
                 foreach($city as $ci){?>
                 ["<?=$ci->city?> (<?=$ci->cont?>)", <?=$ci->cont?>],
        	    <?php } ?>
            ]);
    
            var options = {
              title: 'City wise funnel',
              is3D: true,
            };
    
            var chart = new google.visualization.PieChart(document.getElementById('locationdetail'));
            chart.draw(data, options);
          }
      }
      
      
      
      
      if(val=='Category'){
          $("#statusmdetail,#locationdetail,#cmpdetail,#notask15ddetail,#tobescheduled,#samesfld,#preplanned,#reviewtarget").hide();
          $("#categorydetail").show();
          google.charts.setOnLoadCallback(drawChart11);
          function drawChart11() {
            var data = google.visualization.arrayToDataTable([
              ['Category', 'No of Compnay'],
              <?php $cat = $this->Menu_model->get_fannalcat($uid);?>
             ["No Category (<?=$cat[0]->nocat?>)", <?=$cat[0]->nocat?>],
             ["Top Spender (<?=$cat[0]->topspender?>)", <?=$cat[0]->topspender?>],
             ["Focus Funnel (<?=$cat[0]->focus_funnel?>)", <?=$cat[0]->focus_funnel?>],
             ["Upsell Client (<?=$cat[0]->upsell_client?>)", <?=$cat[0]->upsell_client?>],
             ["Key Client (<?=$cat[0]->keycompany?>)", <?=$cat[0]->keycompany?>],
             ["Positive Key Client (<?=$cat[0]->pkclient?>)", <?=$cat[0]->pkclient?>],
             ["Priority Client (<?=$cat[0]->priorityc?>)", <?=$cat[0]->priorityc?>],
            ]);
            var options = {
              title: 'Category wise funnel',
              is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('categorydetail'));
            chart.draw(data, options);
          } 
      }
      
      
      if(val=='No Task Between Last 15 Days'){
          $("#statusmdetail,#locationdetail,#cmpdetail,#categorydetail,#tobescheduled,#samesfld,#preplanned,#reviewtarget").hide();
          $("#notask15ddetail").show();
          google.charts.setOnLoadCallback(drawChart12);
          function drawChart12() {
            var data = google.visualization.arrayToDataTable([
              ['Category', 'No of Compnay'],
              <?php $cat = $this->Menu_model->get_fannalcat($uid);?>
             ["No Category (<?=$cat[0]->nocat?>)", <?=$cat[0]->nocat?>],
             ["Top Spender (<?=$cat[0]->topspender?>)", <?=$cat[0]->topspender?>],
             ["Focus Funnel (<?=$cat[0]->focus_funnel?>)", <?=$cat[0]->focus_funnel?>],
             ["Upsell Client (<?=$cat[0]->upsell_client?>)", <?=$cat[0]->upsell_client?>],
             ["Key Client (<?=$cat[0]->keycompany?>)", <?=$cat[0]->keycompany?>],
             ["Positive Key Client (<?=$cat[0]->pkclient?>)", <?=$cat[0]->pkclient?>],
             ["Priority Client (<?=$cat[0]->priorityc?>)", <?=$cat[0]->priorityc?>],
            ]);
            var options = {
              title: 'No Task B/W Last 15 Days',
              is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('notask15ddetail'));
            chart.draw(data, options);
          } 
      }
      
      
      
      if(val=='In To be Scheduled'){
          $("#statusmdetail,#locationdetail,#cmpdetail,#categorydetail,#notask15ddetail,#samesfld,#preplanned,#reviewtarget").hide();
          $("#tobescheduled").show();
          google.charts.setOnLoadCallback(drawChart12);
          function drawChart12() {
            var data = google.visualization.arrayToDataTable([
              ['Category', 'No of Compnay'],
              <?php $cat = $this->Menu_model->get_fannalcat($uid);?>
             ["No Category (<?=$cat[0]->nocat?>)", <?=$cat[0]->nocat?>],
             ["Top Spender (<?=$cat[0]->topspender?>)", <?=$cat[0]->topspender?>],
             ["Focus Funnel (<?=$cat[0]->focus_funnel?>)", <?=$cat[0]->focus_funnel?>],
             ["Upsell Client (<?=$cat[0]->upsell_client?>)", <?=$cat[0]->upsell_client?>],
             ["Key Client (<?=$cat[0]->keycompany?>)", <?=$cat[0]->keycompany?>],
             ["Positive Key Client (<?=$cat[0]->pkclient?>)", <?=$cat[0]->pkclient?>],
             ["Priority Client (<?=$cat[0]->priorityc?>)", <?=$cat[0]->priorityc?>],
            ]);
            var options = {
              title: 'Task is in to be scheduled',
              is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('tobescheduled'));
            chart.draw(data, options);
          } 
      }
      
      
      
      if(val=='Same Status from Limit Date'){
          $("#statusmdetail,#locationdetail,#cmpdetail,#categorydetail,#tobescheduled,#notask15ddetail,#preplanned,#reviewtarget").hide();
          $("#samesfld").show();
          google.charts.setOnLoadCallback(drawChart12);
          function drawChart12() {
            var data = google.visualization.arrayToDataTable([
              ['Category', 'No of Compnay'],
              <?php $cat = $this->Menu_model->get_fannalcat($uid);?>
             ["No Category (<?=$cat[0]->nocat?>)", <?=$cat[0]->nocat?>],
             ["Top Spender (<?=$cat[0]->topspender?>)", <?=$cat[0]->topspender?>],
             ["Focus Funnel (<?=$cat[0]->focus_funnel?>)", <?=$cat[0]->focus_funnel?>],
             ["Upsell Client (<?=$cat[0]->upsell_client?>)", <?=$cat[0]->upsell_client?>],
             ["Key Client (<?=$cat[0]->keycompany?>)", <?=$cat[0]->keycompany?>],
             ["Positive Key Client (<?=$cat[0]->pkclient?>)", <?=$cat[0]->pkclient?>],
             ["Priority Client (<?=$cat[0]->priorityc?>)", <?=$cat[0]->priorityc?>],
            ]);
            var options = {
              title: 'Same Status from Till Day',
              is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('samesfld'));
            chart.draw(data, options);
          } 
      }
      
      
      if(val=='Pre planned for that day'){
          $("#statusmdetail,#locationdetail,#cmpdetail,#categorydetail,#tobescheduled,#notask15ddetail,#samesfld,#reviewtarget").hide();
          $("#preplanned").show();
          google.charts.setOnLoadCallback(drawChart12);
          function drawChart12() {
            var data = google.visualization.arrayToDataTable([
              ['Status', 'No of Compnay'],
            <?php $partner = $this->Menu_model->get_fannalpartner($uid);
             foreach($partner as $pa){?>
             ["<?=$pa->pname?> (<?=$pa->cont?>)", <?=$pa->cont?>],
            <?php } ?>
            
            ]);
            var options = {
              title: 'Pre planned for that day',
              is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('preplanned'));
            chart.draw(data, options);
          } 
      }
      
      if(val=='Review Target'){
          $("#statusmdetail,#locationdetail,#cmpdetail,#categorydetail,#tobescheduled,#notask15ddetail,#preplanned,#samesfld").hide();
          $("#reviewtarget").show();
          google.charts.setOnLoadCallback(drawChart12);
          function drawChart12() {
            var data = google.visualization.arrayToDataTable([
              ['Status', 'No of Compnay'],
            <?php $partner = $this->Menu_model->get_fannalpartner($uid);
             foreach($partner as $pa){?>
             ["<?=$pa->pname?> (<?=$pa->cont?>)", <?=$pa->cont?>],
            <?php } ?>
            
            ]);
            var options = {
              title: 'Review Target',
              is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('reviewtarget'));
            chart.draw(data, options);
          } 
      }
      
      
      
      
      
      
      
      
      
    });
});
</script>




<div id="doaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-standard-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-standard-title1"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- // END .modal-header -->
            <div class="modal-body">
                <div class="card card-form col-md-12">
                   <div class="card-header bg-info">Create Plan</div>
                   <h6 class="text-center mt-1" id="cmpname"></h6>
                    <div class="col-lg-12 card-body">
                        
                    </div>
                    </div>
                        </div>
                    </div>
            </div>
</div></div></div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">


$('[id^="add_plan"]').on('click', function() {
    
    $('#doaction').modal('show'); 
});
</script>








<script type='text/javascript'>
$("#mainbox").hide();$("#ScheduledBox").hide();
$("#box0").hide();$("#box1").hide();$("#box2").hide();$("#box3").hide();$("#box4").hide();$("#box5").hide();
var radioButtons = document.querySelectorAll('input[name="optradio"]');
radioButtons.forEach(function(radio) {
  radio.addEventListener('change', function() {
     var val = radio.value;
     if(val=='Compnay Name'){
         $("#box1,#box2,#box3,#box6,#mainbox,#ScheduledBox").hide();
         $("#box0").show();
         $("#tasktype").html('Company Name Wise');
     }
     
     if(val=='Status'){
         $("#box1").show();
         $("#box0,#box2,#box3,#box4,#box5,#box6,#mainbox,#ScheduledBox").hide();
         $("#tasktype").html('Status Wise');
     }
     
     
     if(val=='PST Assigned'){
         $("#box0,#box1,#box2,#box3,#box5,#box6,#ScheduledBox").hide();
         $("#box4").show();
         $("#tasktype").html('PST Assigned');
     }
     
     if(val=='PST Not Assigned'){
         $("#box0,#box1,#box2,#box3,#box5,#ScheduledBox").hide();
         $("#box6").show();
         $("#tasktype").html('PST Assigned');
     }
     
     if(val=='Location'){
         $("#box0,#box1,#box3,#box4,#box5,#box6,#mainbox").hide();
         $("#box2").show();
         $("#tasktype").html('Location Wise');
     }
     
     if(val=='Category'){
         $("#box0,#box1,#box2,#box4,#box5,#box6,#mainbox,#ScheduledBox").hide();
         $("#box3").show();
         $("#tasktype").html('Category Wise');
     }
     
     if(val=='In To be Scheduled'){
         $("#box0,#box1,#box2,#box3,#box4,#box5,#box6,#mainbox").hide();
         $("#ScheduledBox").show();
         $("#tasktype").html('In To be Scheduled');
     }
     
     if(val=='PST Assigned Not Worked'){
         $("#box0,#box1,#box2,#box3,#box4,#box5,#box6,#ScheduledBox").hide();
         $("#mainbox").show();
         document.getElementById("ttype").value=11;
         $("#tasktype").html('PST Assigned Not Worked from last 2 days Wise');
         var uid = document.getElementById("userid").value;
            $.ajax({
                url:'<?=base_url();?>Menu/getcmpbynwpsta',
                type: "POST",
                data: {
                uid: uid
                },
                cache: false,
                success: function a(result){
                $("#inid").html(result);
                }
            });
     }
     
     if(val=='No Task Between Last 15 Days'){
         $("#box0,#box1,#box2,#box3,#box4,#box5,#box6,#ScheduledBox").hide();
         $("#mainbox").show();
         document.getElementById("ttype").value=5;
         $("#tasktype").html('No Task Between Last 15 Days Wise');
         var uid = document.getElementById("userid").value;
            $.ajax({
                url:'<?=base_url();?>Menu/getcmpbynwbwd',
                type: "POST",
                data: {
                uid: uid
                },
                cache: false,
                success: function a(result){
                $("#inid").html(result);
                }
            });
     }
     
     if(val=='Same Status from Limit Date'){
         $("#box0,#box1,#box2,#box3,#box4,#box5,#box6,#ScheduledBox").hide();
         $("#mainbox").show();
         document.getElementById("ttype").value=7;
         $("#tasktype").html('Same Status from Limit Date');
         var uid = document.getElementById("userid").value;
            $.ajax({
                url:'<?=base_url();?>Menu/getcmpbynwbwd',
                type: "POST",
                data: {
                uid: uid
                },
                cache: false,
                success: function a(result){
                $("#inid").html(result);
                }
            });
     }
     
     
     
     
     if(val=='Pre planned for that day'){
         $("#box0,#box1,#box2,#box3,#box4,#box5,#box6,#ScheduledBox").hide();
         $("#mainbox").show();
         document.getElementById("ttype").value=8;
         $("#tasktype").html('Pre planned for that day');
         var uid = document.getElementById("userid").value;
            $.ajax({
                url:'<?=base_url();?>Menu/getcmpbynwbwd',
                type: "POST",
                data: {
                uid: uid
                },
                cache: false,
                success: function a(result){
                $("#inid").html(result);
                }
            });
     }
     
     if(val=='Review Target'){
         $("#box0,#box1,#box2,#box3,#box4,#box5,#box6,#ScheduledBox").hide();
         $("#mainbox").show();
         document.getElementById("ttype").value=9;
         $("#tasktype").html('Review Target');
         var uid = document.getElementById("userid").value;
            $.ajax({
                url:'<?=base_url();?>Menu/getcmpbynwbwd',
                type: "POST",
                data: {
                uid: uid
                },
                cache: false,
                success: function a(result){
                $("#inid").html(result);
                }
            });
     }
     
     
     
     
  });
});



$('#ntaction').on('change', function b() {
var inid = document.getElementById("inid").value;
$.ajax({
url:'<?=base_url();?>Menu/getinidtostatus',
type: "POST",
data: {
inid: inid
},
cache: false,
success: function a(result){
$("#ntstatus").html(result);
}
});
});
    
$('#ntaction').on('change', function f() {
    var inid = document.getElementById("inid").value;
    var aid = document.getElementById("ntaction").value;
    $.ajax({
    url:'<?=base_url();?>Menu/getpurposebyinid',
    type: "POST",
    data: {
    inid: inid,
    aid: aid
    },
    cache: false,
    success: function a(result){
    $("#ntppose").html(result);
    }
    });
});



$('#bycmp').on('change', function b() {
$("#mainbox").show();
document.getElementById("ttype").value=1;
var bycmp = document.getElementById("bycmp").value;
$.ajax({
url:'<?=base_url();?>Menu/getcmpbycmp',
type: "POST",
data: {
bycmp: bycmp
},
cache: false,
success: function a(result){
$("#inid").html(result);
}
});
});






$('#statusid4').on('change', function b() {
$("#mainbox").show();
document.getElementById("ttype").value=10;
var sid = document.getElementById("statusid4").value;
var uid = document.getElementById("userid").value;
$.ajax({
url:'<?=base_url();?>Menu/getstatuscmp4',
type: "POST",
data: {
sid: sid,
uid: uid
},
cache: false,
success: function a(result){
$("#inid").html(result);
}
});
});


$('#statusid6').on('change', function b() {
$("#mainbox").show();
document.getElementById("ttype").value=12;
var sid = document.getElementById("statusid6").value;
var uid = document.getElementById("userid").value;
$.ajax({
url:'<?=base_url();?>Menu/getstatuscmp6',
type: "POST",
data: {
sid: sid,
uid: uid
},
cache: false,
success: function a(result){
$("#inid").html(result);
}
});
});




$('#statusid').on('change', function b() {
$("#mainbox").show();
document.getElementById("ttype").value=2;
var sid = document.getElementById("statusid").value;
var uid = document.getElementById("userid").value;
$.ajax({
url:'<?=base_url();?>Menu/getstatuscmp',
type: "POST",
data: {
sid: sid,
uid: uid
},
cache: false,
success: function a(result){
$("#inid").html(result);
}
});
});


$('#bylocation').on('change', function b() {
$("#mainbox").show();
document.getElementById("ttype").value=3;
var bylocation = document.getElementById("bylocation").value;
var uid = document.getElementById("userid").value;
$.ajax({
url:'<?=base_url();?>Menu/getcmpbyloc',
type: "POST",
data: {
bylocation: bylocation,
uid: uid
},
cache: false,
success: function a(result){
$("#inid").html(result);
}
});
});



$('#category').on('change', function b() {
$("#mainbox").show();
document.getElementById("ttype").value=4;
var category = document.getElementById("category").value;
var uid = document.getElementById("userid").value;
$.ajax({
url:'<?=base_url();?>Menu/getcmpbycategory',
type: "POST",
data: {
category: category,
uid: uid
},
cache: false,
success: function a(result){
$("#inid").html(result);
}
});
});

</script>


<style>

#myInput {
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>


<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    </div></div></div>
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

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>

<script>
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWi$dth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appen$dto('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>