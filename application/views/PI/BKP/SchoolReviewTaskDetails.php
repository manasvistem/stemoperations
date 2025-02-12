<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Select School For Review | STEM LEARNING PVT LTD </title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" />
    <style>
h1{
  font-family: Satisfy;
  font-size:50px;
  text-align:center;
  color:black;
  padding:1%;
}
#gallery{
  -webkit-column-count:4;
  -moz-column-count:4;
  column-count:4;
  
  -webkit-column-gap:20px;
  -moz-column-gap:20px;
  column-gap:20px;
}
@media (max-width:1200px){
  #gallery{
  -webkit-column-count:3;
  -moz-column-count:3;
  column-count:3;
    
  -webkit-column-gap:20px;
  -moz-column-gap:20px;
  column-gap:20px;
}
}
@media (max-width:800px){
  #gallery{
  -webkit-column-count:2;
  -moz-column-count:2;
  column-count:2;
    
  -webkit-column-gap:20px;
  -moz-column-gap:20px;
  column-gap:20px;
}
}
@media (max-width:600px){
  #gallery{
  -webkit-column-count:1;
  -moz-column-count:1;
  column-count:1;
}  
}
#gallery img,#gallery video {
  width:100%;
  height:auto;
  margin: 4% auto;
  box-shadow:-3px 5px 15px #000;
  cursor: pointer;
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
}
.modal-img,.model-vid{
  width:100%;
  height:auto;
}
.modal-body{
  padding:0px;
}
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php require('nav.php');?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid ">
            <div class="card p-4">
              <div class=" card text-center p-3">
                <h4><?= $this->Menu_model->getSchoolNameBySid($sid); ?></h4>
                <h5><?php 
                if($type == 'TotalLoginSchool'){
                    echo "Total Log in School";
                }else{
                    echo $type;
                }
                 ?></h5>
              </div>

              

              <!-- <h1>Responsive Image Gallery</h1><hr> -->
              <div id="gallery" class="container-fluid">  
<?php 
if($type == 'Visit'){ 
    foreach ($data as $task) {
        if(!empty($task->ans1)) {
            $types = get_file_type($task->ans1);
            if ($types == 'image') {
                echo "<img src='" . base_url() . "Menu/{$task->ans1}' alt='Image' class='img-responsive'>";
            } elseif ($types == 'video') {
                echo "<video class='vid' controls><source src='{$task->ans1}' type='{$types}'>Your browser does not support the video tag.</video>";
            }
        }
        if(!empty($task->ans2)) {
            $types = get_file_type($task->ans2);
            if ($types == 'image') {
                echo "<img src='" . base_url() . "Menu/{$task->ans2}' alt='Image' class='img-responsive'>";
            } elseif ($types == 'video') {
                echo "<video class='vid' controls><source src='{$task->ans2}' type='{$types}'>Your browser does not support the video tag.</video>";
            }
        }
        if(!empty($task->ans3)) {
            $types = get_file_type($task->ans3);
            if ($types == 'image') {
                echo "<img src='" . base_url() . "Menu/{$task->ans3}' alt='Image' class='img-responsive'>";
            } elseif ($types == 'video') {
                echo "<video class='vid' controls><source src='{$task->ans3}' type='{$types}'>Your browser does not support the video tag.</video>";
            }
        }
        if(!empty($task->ans4)) {
            $types = get_file_type($task->ans4);
            if ($types == 'image') {
                echo "<img src='" . base_url() . "Menu/{$task->ans4}' alt='Image' class='img-responsive'>";
            } elseif ($types == 'video') {
                echo "<video class='vid' controls><source src='{$task->ans4}' type='{$types}'>Your browser does not support the video tag.</video>";
            }
        }
        if(!empty($task->ans5)) {
            $types = get_file_type($task->ans5);
            if ($types == 'image') {
                echo "<img src='" . base_url() . "Menu/{$task->ans5}' alt='Image' class='img-responsive'>";
            } elseif ($types == 'video') {
                echo "<video class='vid' controls><source src='{$task->ans5}' type='{$types}'>Your browser does not support the video tag.</video>";
            }
        }
    }
}

    if($type == 'Utilisation'){
            foreach ($data as $task) {        
                $types = get_file_type($task->filepath);
                if ($types == 'image') {
                echo "<img src='" . base_url() . "Menu/{$task->filepath}' alt='Image' class='img-responsive'>";
            }elseif ($types == 'video') {
                echo "<video class='vid' controls><source src='{$task->filepath}' type='{$types}'>Your browser does not support the video tag.</video>";
            }
        }
    }
    if($type == 'Communication'){
            foreach ($data as $task) {        
                $types = get_file_type($task->filepath);
                if ($types == 'image') {
                echo "<img src='" . base_url() . "Menu/{$task->filepath}' alt='Image' class='img-responsive'>";
            }elseif ($types == 'video') {
                echo "<video class='vid' controls><source src='{$task->filepath}' type='{$types}'>Your browser does not support the video tag.</video>";
            }
        }
    }

 ?>
 </div>

<?php if($type == 'TotalLoginSchool'){ ?>
 <div class="container">
 <div class="table-responsive">
                            <div class="table-responsive">                            

                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>								
                                            <th>Sr Number</th>
                                            <th>Plan Date</th>
                                            <th>Completed Date</th>
                                            <th>School Name</th></th>
                                            <th>Task Type</th>
                                            <th>Task Purpose</th>
                                            <th>Task Done By</th>
                                            <th>Remark</th>
                                            <th>Checklist</th>
                                            <th>Media</th>
                                            <th>Report</th>
                                            <th>Visit Media</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($slog as $sl){
                                      $sid = $sl->sid;
                                      $tid = $sl->taskid;
                                      $status = $sl->status;
                                      $plan=$this->Menu_model->get_plantaskbytid($tid);
                                    
                                      $task=$this->Menu_model->get_taskassign_byid($tid);
                                      $nstatus=$this->Menu_model->get_snextststus($status);
                                      $uid = $task[0]->to_user;
                                      $user=$this->Menu_model->get_user_byid($uid);
                                      $report=$this->Menu_model->get_reportbystid($tid,$sid);
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$plan[0]->sdatet?></td>
                                        <td><?=$plan[0]->donet?></td>
                                        <td><?=$sname?></td>
                                        <td><?=$sl->task_type?></td>
                                        <td><?=$task[0]->task_subtype?></td>
                                        <td><?=$user[0]->fullname?></td>
                                        <td><?=$sl->remark?></td>
                                        <td><?php if($task[0]->checklist!=''){?><a href="../DownloadChecklist?sid=<?=$sid?>"><i class="fa fa-database" aria-hidden="true"></i></a><?php }?></td>
                                        <td><?php if($task[0]->task_type=='Utilisation'){?><a href="../ZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                                        <td><?php if($task[0]->task_type=='Report'){?><a href="<?=base_url();?><?=$report[0]->filepath?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php }?>
                                        </td>
                                        <td><?php if($task[0]->task_type=='Visit'){?><a href="../VisitZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
 </div>
<?php } ?>

<?php if($type == 'Call'){ ?>
 <div class="container">
 <div class="table-responsive">
                            <div class="table-responsive">                            

                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>								
                                            <th>Sr Number</th>
                                            <th>Plan Date</th>
                                            <th>Completed Date</th>
                                            <th>School Name</th></th>
                                            <th>Task Type</th>
                                            <th>Task Purpose</th>
                                            <th>Task Done By</th>
                                            <th>Remark</th>
                                            <th>Checklist</th>
                                            <th>Media</th>
                                            <th>Report</th>
                                            <th>Visit Media</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($callData as $sl){
                                      $sid = $sl->sid;
                                      $tid = $sl->taskid;
                                      $status = $sl->status;
                                      $plan=$this->Menu_model->get_plantaskbytid($tid);
                                    
                                      $task=$this->Menu_model->get_taskassign_byid($tid);
                                      $nstatus=$this->Menu_model->get_snextststus($status);
                                      $uid = $task[0]->to_user;
                                      $user=$this->Menu_model->get_user_byid($uid);
                                      $report=$this->Menu_model->get_reportbystid($tid,$sid);
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$plan[0]->sdatet?></td>
                                        <td><?=$plan[0]->donet?></td>
                                        <td><?=$sname?></td>
                                        <td><?=$sl->task_type?></td>
                                        <td><?=$task[0]->task_subtype?></td>
                                        <td><?=$user[0]->fullname?></td>
                                        <td><?=$sl->remark?></td>
                                        <td><?php if($task[0]->checklist!=''){?><a href="../DownloadChecklist?sid=<?=$sid?>"><i class="fa fa-database" aria-hidden="true"></i></a><?php }?></td>
                                        <td><?php if($task[0]->task_type=='Utilisation'){?><a href="../ZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                                        <td><?php if($task[0]->task_type=='Report'){?><a href="<?=base_url();?><?=$report[0]->filepath?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php }?>
                                        </td>
                                        <td><?php if($task[0]->task_type=='Visit'){?><a href="../VisitZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
 </div>
<?php } ?>

<?php if($type == 'Report'){ ?>
 <div class="container">
 <div class="table-responsive">
                            <div class="table-responsive">                            

                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>								
                                            <th>Sr Number</th>
                                            <th>Plan Date</th>
                                            <th>Completed Date</th>
                                            <th>School Name</th></th>
                                            <th>Task Type</th>
                                            <th>Task Purpose</th>
                                            <th>Task Done By</th>
                                            <th>Remark</th>
                                            <th>Checklist</th>
                                            <th>Media</th>
                                            <th>Report</th>
                                            <th>Visit Media</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($reportData as $sl){
                                      $sid = $sl->sid;
                                      $tid = $sl->taskid;
                                      $status = $sl->status;
                                      $plan=$this->Menu_model->get_plantaskbytid($tid);
                                    
                                      $task=$this->Menu_model->get_taskassign_byid($tid);
                                      $nstatus=$this->Menu_model->get_snextststus($status);
                                      $uid = $task[0]->to_user;
                                      $user=$this->Menu_model->get_user_byid($uid);
                                      $report=$this->Menu_model->get_reportbystid($tid,$sid);
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$plan[0]->sdatet?></td>
                                        <td><?=$plan[0]->donet?></td>
                                        <td><?=$sname?></td>
                                        <td><?=$sl->task_type?></td>
                                        <td><?=$task[0]->task_subtype?></td>
                                        <td><?=$user[0]->fullname?></td>
                                        <td><?=$sl->remark?></td>
                                        <td><?php if($task[0]->checklist!=''){?><a href="../DownloadChecklist?sid=<?=$sid?>"><i class="fa fa-database" aria-hidden="true"></i></a><?php }?></td>
                                        <td><?php if($task[0]->task_type=='Utilisation'){?><a href="../ZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                                        <td><?php if($task[0]->task_type=='Report'){?><a href="<?=base_url();?><?=$report[0]->filepath?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php }?>
                                        </td>
                                        <td><?php if($task[0]->task_type=='Visit'){?><a href="../VisitZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
 </div>
<?php } ?>

<?php if($type == 'Email'){ ?>
 <div class="container">
 <div class="table-responsive">
                            <div class="table-responsive">                            

                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>								
                                            <th>Sr Number</th>
                                            <th>Plan Date</th>
                                            <th>Completed Date</th>
                                            <th>School Name</th></th>
                                            <th>Task Type</th>
                                            <th>Task Purpose</th>
                                            <th>Task Done By</th>
                                            <th>Remark</th>
                                            <th>Checklist</th>
                                            <th>Media</th>
                                            <th>Report</th>
                                            <th>Visit Media</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i=1; foreach($emailtData as $sl){
                                      $sid = $sl->sid;
                                      $tid = $sl->taskid;
                                      $status = $sl->status;
                                      $plan=$this->Menu_model->get_plantaskbytid($tid);
                                    
                                      $task=$this->Menu_model->get_taskassign_byid($tid);
                                      $nstatus=$this->Menu_model->get_snextststus($status);
                                      $uid = $task[0]->to_user;
                                      $user=$this->Menu_model->get_user_byid($uid);
                                      $report=$this->Menu_model->get_reportbystid($tid,$sid);
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$plan[0]->sdatet?></td>
                                        <td><?=$plan[0]->donet?></td>
                                        <td><?=$sname?></td>
                                        <td><?=$sl->task_type?></td>
                                        <td><?=$task[0]->task_subtype?></td>
                                        <td><?=$user[0]->fullname?></td>
                                        <td><?=$sl->remark?></td>
                                        <td><?php if($task[0]->checklist!=''){?><a href="../DownloadChecklist?sid=<?=$sid?>"><i class="fa fa-database" aria-hidden="true"></i></a><?php }?></td>
                                        <td><?php if($task[0]->task_type=='Utilisation'){?><a href="../ZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                                        <td><?php if($task[0]->task_type=='Report'){?><a href="<?=base_url();?><?=$report[0]->filepath?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php }?>
                                        </td>
                                        <td><?php if($task[0]->task_type=='Visit'){?><a href="../VisitZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
 </div>
<?php } ?>

<br>
<br>
<?php if($type == 'Visit'){  ?>
 <div class="container">
 <div class="table-responsive">
                            <div class="table-responsive">                            

                                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>								
                                            <th>Sr Number</th>
                                            <th>Plan Date</th>
                                            <th>Completed Date</th>
                                            <th>School Name</th></th>
                                            <th>Task Type</th>
                                            <th>Task Purpose</th>
                                            <th>Task Done By</th>
                                            <th>Remark</th>
                                            <th>Checklist</th>
                                            <th>Media</th>
                                            <th>Report</th>
                                            <th>Visit Media</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                     
                                      $i=1; foreach($visitData as $sl){
                                      $sid = $sl->sid;
                                      $tid = $sl->taskid;
                                      $status = $sl->status;
                                      $plan=$this->Menu_model->get_plantaskbytid($tid);
                                    
                                      $task=$this->Menu_model->get_taskassign_byid($tid);
                                      $nstatus=$this->Menu_model->get_snextststus($status);
                                      $uid = $task[0]->to_user;
                                      $user=$this->Menu_model->get_user_byid($uid);
                                      $report=$this->Menu_model->get_reportbystid($tid,$sid);
                                      ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$plan[0]->sdatet?></td>
                                        <td><?=$plan[0]->donet?></td>
                                        <td><?=$sname?></td>
                                        <td><?=$sl->task_type?></td>
                                        <td><?=$task[0]->task_subtype?></td>
                                        <td><?=$user[0]->fullname?></td>
                                        <td><?=$sl->remark?></td>
                                        <td><?php if($task[0]->checklist!=''){?><a href="../DownloadChecklist?sid=<?=$sid?>"><i class="fa fa-database" aria-hidden="true"></i></a><?php }?></td>
                                        <td><?php if($task[0]->task_type=='Utilisation'){?><a href="../ZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                                        <td><?php if($task[0]->task_type=='Report'){?><a href="<?=base_url();?><?=$report[0]->filepath?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php }?>
                                        </td>
                                        <td><?php if($task[0]->task_type=='Visit'){?><a href="../VisitZipDownload/<?=$tid?>"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a><?php }?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
 </div>
<?php } ?>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      </div>
    </div>

  </div>
</div>




       

            </div>
          </div>
          </div>
        </div>
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer text-center">
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
    <?php 
    function get_file_type($filename)
    {
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $image_extensions = array('png', 'jpg', 'jpeg', 'gif', 'bmp');
        $video_extensions = array('mp4', 'avi', 'mov', 'wmv', 'flv');
    
        if (in_array($extension, $image_extensions)) {
            return 'image';
        } elseif (in_array($extension, $video_extensions)) {
            return 'video';
        } else {
            return 'unknown';
        }
    }

?>
    <!-- ./wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("img").click(function(){
    var t = $(this).attr("src");
    $(".modal-body").html("<img src='"+t+"' class='modal-img'>");
    $("#myModal").modal();
  });

  $("video").click(function(){
    var v = $(this).find("source");
    var t = v.attr("src");
    $(".modal-body").html("<video class='modal-vid' controls><source src='"+t+"' type='video/mp4'></source></video>");
    $("#myModal").modal();  
  });
});

</script>
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
    
  </body>
</html>