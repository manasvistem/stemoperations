<!DOCTYPE html>
<html lang="en">
<head
  <meta charset="utf-8">
  <meta name="viewport" content="wi$dth=device-wi$dth, initial-scale=1">
  <title>STEM APP | WebAPP</title>

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
.card{
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
}
  </style>
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
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4></h4>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <?php 
    
      if ($this->session->flashdata('success_message')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> <?php echo $this->session->flashdata('success_message'); ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>

<?php 
if(isset($_GET['pcode'])){
  $pcode = $_GET['pcode'];
}else{
  redirect('Menu/ProgrramReviewPage');
}
?>

       <div class="row p-3">
       <?php $revst = $this->Menu_model->get_joincallstarted();?>
      
     
           <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                 <div class="card bg-info">
                 <h3 class="text-center">Program TimeLine Planning</h3>
                 </div>
                  <hr>
                    <div class="form-group">
                        <label>Selected Program</label>
                          <select class="custom-select rounded-0" name="pcode" id="pcode" >
                            <option selected value="<?= $pcode?>"><?= $pcode?></option>
                          </select>
                    </div> 
                  <hr>
                  <div id="pdetail1 bg-light">
                    <?php 
                      // $this->Menu_model->getpdetailbyPcode($pcode);
                      $pNextdata = $this->Menu_model->getNextyearDataofProject($pcode);
         ?>
         <br/>
         <!-- <br/> -->
         <div class="card bg-success p-2 text-center">
          <h3>Next Year Program Plan</h3>
         </div>
                    <table class="table table-striped">
                      <thead class="thead-dark" >
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th colspan="3">Answer</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $i=1; foreach($pNextdata as $pc): ?>
                        <tr>
                          <td scope="row"><?=$i ?></td>
                          <td><?= $pc->question ?></td>
                          
                          <td><?php
                          if($pc->question =='Are there any other PIA included in this program?'){
                            $getpia = $this->Menu_model->getPIABYID($pc->sub_answer1);
                           echo $getpia[0]->fullname;
                          }elseif($pc->question =='Are there any other Installation Person included in this program?'){
                            $getpia = $this->Menu_model->getPIABYID($pc->sub_answer1);
                           echo $getpia[0]->fullname;
                          }else{
                            $parts = explode(", ", $pc->sub_answer1);
                            // Print each part
                            foreach ($parts as $part) {
                                echo $part . "<br><br>";
                            }
                          }           
                          ?></td>

                          <td><?php
                          
                          if($pc->question =='Program Status Conversion Target Date'){
                              $lastStatus = $this->Menu_model->get_statusbyid($pc->answer);
                              echo $lastStatus[0]->name;
                          }else{
                            echo $pc->answer;
                          }
                          ?></td>

                          <td><?php
                           $parts = explode(", ", $pc->sub_answer2);
                            // Print each part
                            foreach ($parts as $part) {
                                echo $part . "<br><br>";
                            }
                           
                           
                           ?></td>
                        </tr>
                        <?php $i++; endforeach;  ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
             
              <?php 
              $getMandEData = $this->Menu_model->getMandERequiredOrNot($pcode);
              $getMandEStatus = $getMandEData[0]->answer;
            ?>
              <div class="col-sm col-md-6 col-lg-6 m-auto">
              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  <h3 class="text-center">Time Line Setting</h3>
                  <hr>
                  <div id="alldata">
                  <form action="<?=base_url();?>Menu/programtimelineplanning" method="post">
                      <input type="hidden" name="uid" value="<?=$uid?>">
                      <input type="hidden" name="bdid" value="123">
                      <input type="hidden" name="projectcode" value="<?= $pcode?>">
                      <!-- <input type="hidden" name="piid" id="piid"> -->
                    <div class="was-validated">
                    <div class="card p-2 mt-2">
                      <div class="from-group" id="b1">
                        <lable>WelCome Message*</lable>
                        <?php foreach ($week as $weekNumber => $month) {?>
                        <?php } ?>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="wmessage" required="">
                      </div>
                      </div>
                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b2">
                        <lable>1st 5 Communication*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="communication1"  id="communication1" required="">
                      </div>
                      <div class="from-group" id="b2">
                        <lable>2nd 5 Communication*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="communication2"  id="communication2" required="">
                      </div>
                      <div class="from-group" id="b2">
                        <lable>3rd 5 Communication*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="communication3"  id="communication3" required="">
                      </div>
                      </div>

                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b3">
                        <lable>1st 5 Calls for Utilisation*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="callsfu1" id="callsfu1" required="">
                      </div>

                      <div class="from-group" id="b3">
                        <lable>2nd 5 Calls for Utilisation*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="callsfu2" id="callsfu2" required="">
                      </div>
                      </div>


                      <div class="card p-2 mt-2">

                      <div class="from-group" id="b4">
                        <lable>Report Type*</lable>
                        <select class="form-control"  name="reporttype" required="">
                            <option value="8">Monthly</option>
                            <option value="4">Quarterly</option>
                            <option value="1">Yearly</option>
                        </select>
                      </div>
                      <div class="from-group" id="b5">
                        <lable>FTTP</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="fttp">
                       </div>
                      <div class="from-group" id="b6">
                        <lable>RTTP*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="rttp" required="">
                      </div>
                      <div class="from-group" id="b5">
                        <lable>Replacement</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="replacement">
                     </div>
                     </div>

                    
                     <div class="card p-2 mt-2">
                      <div class="from-group" id="b8">
                        <lable>Maintenance*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="maintenance" required="">
                      </div>
                      <?php if($getMandEStatus == 'Yes'): ?>
                      <div class="from-group" id="b10">
                        <lable>Base Line M&E</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="blmne">
                      </div>
                      <div class="from-group" id="b11">
                        <lable>End Line M&E</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="elmne">
                      </div>
                      <?php endif; ?>
                      <div class="from-group" id="b12">
                        <lable>NSP</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="nsp">
                      </div>
                      </div>


                      <!-- <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable>ZM Visit 10% each</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" class="form-control" name="zmvisit" id="zmvisit" required>
                      </div>

                      <div class="from-group" id="b14">
                        <lable>PM Visit 10% each</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" class="form-control" id="pmvisit" name="pmvisit" required="">
                      </div>
                      </div>

                      <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable>Other Department Call</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" class="form-control" name="otherdepartmentcall" id="otherdepartmentcall" required>
                      </div>

                      <div class="from-group" id="b17">
                        <lable>Review with BD*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" class="form-control" name="bdreview" id="bdreview" required="">
                      </div>
                      </div> -->




                      <div class="card p-2 mt-2">
                        <div class="from-group" id="b13">
                          <lable>1st 5 Utilisation*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" id="utilisation1" class="form-control" name="utilisation1" required="">
                        </div>
                        <div class="from-group" id="b13">
                          <lable>2nd 5 Utilisation*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="utilisation2" name="utilisation2" required="">
                        </div>
                        <div class="from-group" id="b13">
                          <lable>3rd 5 Utilisation*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" id="utilisation3" name="utilisation3" required="">
                        </div>
                      </div>
                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b15">
                        <lable>Other Department Call*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control"  name="otherdcall" required="">
                      </div>
                      </div>
                      <div class="card p-2 mt-2">
                        <div class="from-group" id="b16">
                          <lable>1st 4 OutBond Communication*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="outbondc1" id="outbondc1" required="">
                        </div>
                        <div class="from-group" id="b16">
                          <lable>2nd 4 OutBond Communication*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="outbondc2" id="outbondc2" required="">
                        </div>
                        <div class="from-group" id="b16">
                          <lable>3rd 4 OutBond Communication*</lable>
                          <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="outbondc3" id="outbondc3" required="">
                        </div>
                      </div>
                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b17">
                        <lable>Review with BD*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="bdreview" required="">
                      </div>
                      </div>
                      
                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b7">
                        <lable>CaseStudy*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="casestudy" required="">
                      </div>
                      
                      <div class="from-group" id="b9">
                        <lable>DIY</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="diy">
                      </div>
                      <div class="from-group" id="b18">
                        <lable>Client Engagement*</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="cengagement" required="">
                      </div>
                      </div>
                    
                      <div class="card p-2 mt-2">
                      <div class="from-group">
                        <lable>Expected Status</lable>
                        <select class="form-control" name="status" required>
                            <option>Select Status</option>
                            <?php $status = $this->Menu_model->get_status(); foreach($status as $st){?>
                            <option value="<?=$st->id?>"><?=$st->name?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="from-group">
                        <lable>Expected Status Date</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="exstatusdt" required>
                      </div>
                      </div>
                      <div class="card p-2 mt-2">
                      <div class="from-group" id="b14">
                        <lable>ZM Visit 10% each</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="zmvisit" required="">
                      </div>
                      <div class="from-group" id="b14">
                        <lable>PM Visit 10% each</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="pmvisit" required="">
                      </div>
                      </div>
                      
                     <div class="card p-2 mt-2">
                     <div class="from-group" id="b17">
                        <lable>Summer Activity</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="summeractivity" id="summeractivity" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable>winter activity</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="winteractivity" id="winteractivity" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable>Online Activity</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="onlineactivity" id="onlineactivity" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable>Webinar</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="webinar" id="webinar" required="">
                      </div>
                     </div>
                     
                     
                    <div class="card p-2 mt-2">
                     <div class="from-group" id="b17">
                        <lable>Set Date for First Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="socialMediaPost1" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable>Set Date for Second Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="socialMediaPost2"required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable>Set Date for Third Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="socialMediaPost3" required="">
                      </div>
                      <div class="from-group" id="b17">
                        <lable>Set Date for Fourth Social Media Post</lable>
                        <input type="date" min="<?= date("Y-m-d") ?>" class="form-control" name="socialMediaPost4"  required="">
                      </div>
                     </div>
                     
                     
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-success mt-2" onclick="this.form.submit(); this.disabled = true;">Set Time Line</button>
                    </div>
                    
                    </div>
                    </form>
                    </div>
                  <hr>
                  </div>
                </div>
              </div>
            
              <div id="Alldata"></div>  
             </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </div>
          <!-- /.col -->
          </div>
        <!-- /.row -->
      </div>
    
      <!-- /.container-fluid -->
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>



jQuery(document).ready(function($){
  var pcode  = $('#pcode').val();
  // alert(pcode);
  $.ajax({
    url:'<?=base_url();?>Menu/getpdetail',
    type: "POST",
    data: {
        pcode: pcode
    },
    cache: false,
    success: function a(result){
    $("#pdetail").html(result);
    }
    });
});



$('#pcode').on('change', function b() {
var pcode = this.value;
document.getElementById("projectcode").value=pcode;
    $.ajax({
    url:'<?=base_url();?>Menu/getpdetail',
    type: "POST",
    data: {
        pcode: pcode
    },
    cache: false,
    success: function a(result){
    $("#pdetail").html(result);
    }
    });
});



$('#pcode').on('change', function b() {
var pcode = this.value;
    $.ajax({
    url:'<?=base_url();?>Menu/getpyear',
    type: "POST",
    data: {
        pcode: pcode
    },
    cache: false,
    success: function a(result){
        
        if(result=='2023-24'){
            document.getElementById("b5").style.display = "none";
        }else{
            document.getElementById("b5").style.display = "block";
        }
    
    }
    });
});






$('#pcode').on('change', function b() {
var pcode = this.value;
document.getElementById("projectcode").value=pcode;
    $.ajax({
    url:'<?=base_url();?>Menu/getpalldata',
    type: "POST",
    data: {
        pcode: pcode
    },
    cache: false,
    success: function a(result){
    $("#Alldata").html(result);
    }
    });
});


$("#meetlink").change(function(){
    var meetLink = $(this).val();
    var regex = /^(https?:\/\/)?meet.google.com\/[a-z0-9-]+$/i;
    if (!regex.test(meetLink)) {
      $(this).val("");
      document.getElementById("valid-feedback").innerText = "Please enter a valid Google Meet link.";
      
    } 
});


$(document).ready(function(){
    var pcode = $('#projectcode').val();
    $.ajax({
      url:'<?=base_url();?>Menu/getpdetail',
      type: "POST",
      data: {
        pcode: pcode
      },
      cache: false,
      success: function a(result){
        $("#pdetail").html(result);
      }
    });
  // });
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

</script>  
    
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
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
</body>
</html>