<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academic Calendar | STEM Operation | WebAPP</title>
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
    <style>
      .ApprovedStatus{
      padding:6px 10px;
      border-radius:4px;
      }
      .ApprovedStatus.Pending{
      background:orange;
      color:white;
      }
      .ApprovedStatus.Reject{
      background:red;
      color:white;
      }
      .ApprovedStatus.approved{
      background:green;
      color:white;
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
                <h1 class="m-0">Academic Calender</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <h4>HI! <?php echo $username=$user['fullname']; $uid=$user['id']; $rid=$user['region_id'];?> ( <?php $id = $user['dep_id']; $did=$this->Menu_model->get_dep_byid($id); echo $did[0]->dep_name;?> )</h4>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <?php if ($this->session->flashdata('setAcademicCalendar')): ?>
            <div class="container-fluid">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> <?php echo $this->session->flashdata('setAcademicCalendar'); ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
            <?php endif; ?>

            <?php 
              
              $getAllAcadCalender = $this->Menu_model->GetAllAcadCalender();
              $arrreject = [];
              $arrapprove = [];
              $uAcedata = $this->Menu_model->GetAcademickApprovalRequestForPIA($uid);
         
              foreach($uAcedata as $req){
                if($req->rejectbypm ==1){
                $arrreject [$req->type] = $req->type;
                $arrreject [$req->type] = $req->rejectbypm;
                $arrreject [$req->state] = $req->state;
              }elseif($req->aprovebypm ==1){
                $arrapprove [$req->type] = $req->type;
                $arrapprove [$req->type] = $req->aprovebypm;
                $arrapprove [$req->state] = $req->state;
              }
              }
                // echo $apprret = array_search('Gove Holiday', $arrapprove,false);
                // echo $apprret = in_array('Gove Holiday', $arrapprove);
              // array_search($value, $array, strict_parameter)  
              ?>
            <div class="row p-3">
              <div class="col-sm col-md-6 col-lg-6 m-auto">
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <form action="<?=base_url();?>Menu/setacalendar" method="post">
                      <div class="form-group">
                        <label>Start Date</label>
                        <input type="hidden" class="form-control" name="piaid" value="<?=$uid?>">
                        <input type="date" class="form-control" name="fdate">
                      </div>
                      <div class="form-group">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="todate">
                      </div>
                      <div class="form-group">
                        <label>State</label>
                        <select class="custom-select rounded-0" name="state">
                          <?php foreach($piastate as $pstate){?>
                          <option><?=$pstate->sstate?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Select Holiday</label>
                          <select class="custom-select rounded-0" name="type">
                          
                          <?php 
                          
                          foreach($getAllAcadCalender as $atype){
                           $exists =  array_key_exists($atype->type, $arrapprove);
                           if($exists){
                            $disabled = 'disabled';
                           }else{
                            $disabled = '';
                           }
                            ?>
                         <option <?= $disabled ?> value="<?= $atype->type ?>" ><?= $atype->type ?></option>
                           <?php } ?>
                         
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Remark</label>
                        <textarea type="text" name="remark" class="form-control" placeholder="Remark..."></textarea>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </div>
                </div>
                </form>
              </div>
              <div class="card card-body p-4">
                <div class="card text-center p-2">
                  <h3> <i>Academic Calender <?= date("Y") ?></i></h3>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">State</th>
                        <th scope="col">Type</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Approved Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                       
                        $i=1;

                      
                              foreach($uAcedata as $data){ ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $data->fdate ?></td>
                        <td><?= $data->todate ?></td>
                        <td><?= $data->state ?></td>
                        <td><?= $data->type ?></td>
                        <td><?= $data->remark ?></td>
                        <td><?php 
                          if($data->aprovebypm ==0 && $data->rejectbypm==0){
                          echo "<span class='ApprovedStatus Pending'>Pending</span>";
                          }else if($data->rejectbypm ==1 && $data->aprovebypm ==0){
                            echo "<span class='ApprovedStatus Reject'>Reject</span>";
                            }else if($data->aprovebypm ==1 && $data->rejectbypm ==0){
                            echo "<span class='ApprovedStatus approved'>Approved</span>";
                          }
                          
                          ?></td>
                      </tr>
                      <?php $i++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
      </section>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type='text/javascript'>
        $('#task_subtype').on('change', function() {
           var tst = this.value;
           var tt = document.getElementById("task_type").value;
           if(tt=="VISIT"){
               if(tst=="New Client"){
                  $("#box1").show();
                  $("#box2").hide(); 
               }
               if(tst=="Onboard Client" || tst=="Inauguration"){
                  $("#box2").show();
                  $("#box1").hide();
               }
           }
           if(tt=="TTP"){
              $("#box2").show();
              $("#box1").hide();
           }
           if(tt=="M&E"){
              $("#box2").show();
              $("#box1").hide();
           }
           if(tt=="DIY"){
              $("#box2").show();
              $("#box1").hide();
           }
           if(tt=="Utilisation"){
              $("#box2").show();
              $("#box1").hide();
           }
           if(tt=="Call"){
              $("#box2").show();
              $("#box1").hide();
           }
           if(tt=="Email"){
              $("#box2").show();
              $("#box1").hide();
           }
           if(tt=="Whatsapp"){
              $("#box2").show();
              $("#box1").hide();
           }
           if(tt=="Other"){
              $("#box2").hide();
              $("#box1").hide();
           }
           if(tt=="Report"){
              $("#box2").show();
              $("#box1").hide();
           } 
        });
        
        $('#region').on('change', function b() {
        var dep = document.getElementById("dep").value;
        var region = document.getElementById("region").value;
           
        $.ajax({
        url:'<?=base_url();?>Menu/getuserbydr',
        type: "POST",
        data: {
        dep: dep,
        region: region
        },
        cache: false,
        success: function a(result){
        $("#to_user").html(result);
        }
        });
        });
        
        
        $('#task_type').on('change', function c() {
        var tt = document.getElementById("task_type").value;
        if(tt=='OTask'){$("#box3").hide();}
        else{$("#box3").show();}
        $.ajax({
        url:'<?=base_url();?>Menu/getpitst',
        type: "POST",
        data: {
        tt: tt
        },
        cache: false,
        success: function a(result){
        $("#task_subtype").html(result);
        }
        });
        });
        
        $('#pcode').on('change', function b() {
        var pcode = document.getElementById("pcode").value;
        var userid = document.getElementById("userid").value;
        $.ajax({
        url:'<?=base_url();?>Menu/getspdbyuserpcs',
        type: "POST",
        data: {
        pcode: pcode,
        userid: userid
        },
        cache: false,
        success: function a(result){
        $("#spd_id").html(result);
        }
        });
        });
        
        $('#pcode').on('change', function b() {
        var pcode = document.getElementById("pcode").value;
        var userid = document.getElementById("userid").value;
        $.ajax({
        url:'<?=base_url();?>Menu/getspdbyuserpcs',
        type: "POST",
        data: {
        pcode: pcode,
        userid: userid
        },
        cache: false,
        success: function a(result){
        $("#spd_id1").html(result);
        }
        });
        });
        
      </script>
      <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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
    <!-- AdminLTE App -->
    <script src="<?=base_url();?>assets/js/adminlte.js"></script>
    <!-- jquery-validation -->
    <script src="<?=base_url();?>assets/js/jquery.validate.min.js"></script>
    <script src="<?=base_url();?>assets/js/additional-methods.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?=base_url();?>assets/js/dashboard.js"></script>
    <script>
      $(function() {
        $.validator.setDefaults({
          submitHandler: function () {
            alert( "Form successful submitted!" );
          }
        });
      });
    </script>
  </body>
</html>