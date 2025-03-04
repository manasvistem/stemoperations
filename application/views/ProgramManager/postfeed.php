<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stem Operation App</title>

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
        body {
            background-color: #f4f4f4;
        }

        .post-container {
            max-width: 600px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .post-header, .post-footer {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            align-items: center;
        }

        .post-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .post-content {
            padding: 20px;
            color: #191919;
        }

        .post-media img, .post-media video {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-action {
            font-weight: bold;
            color: #365899;
        }

        .like-icon, .comment-icon {
            font-size: 20px;
            margin-right: 5px;
        }

        .comment-box {
            width: 100%;
            height: 100px;
            resize: none;
            margin-top: 10px;
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
    <section class="content">
        
        <div class="container">
        <div class="row">
            
            <?php 
                                        date_default_timezone_set("Asia/Kolkata");
                                        $date = "2023-10-04";
                                        $nxtdtask=$this->Menu_model->get_reportvisit('1',$date);
                                        foreach($nxtdtask as $md){
                                            $plant = $md->plandate;
                                            $plan = date('d-m-Y  h:i A', strtotime($plant));
                                            $sid = $md->spd_id; echo '<br>';
                                            $tid = $md->tid;
                                            $page = $md->checklist;
                                            
                                            $pagetask = $this->Menu_model->get_visitsubtask($page);
                                            foreach($pagetask as $pt){ 
                                            $que = $pt->que;
                                            $vu = $this->Menu_model->get_visitstupdate($sid,$tid,$que);
                                            if($vu){$color="bg-success";
                                                $sdatet = $vu[0]->sdatet;
                                                if($vu[0]->ans1!=''){$url1 = "https://stemoppapp.in/".$vu[0]->ans1;}else{$url1="";}
                                                if($vu[0]->ans2!=''){$url2 = "https://stemoppapp.in/".$vu[0]->ans2;}else{$url2="";}
                                                
                                            }
                                                else{$color="bg-danger";
                                                $sdatet = "";
                                                $url1="";$url2="";}?>
                                           
                                    
                                    
                                    
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <?php if($vu){if($vu[0]->ans1!='' && $vu[0]->ans2==''){?>
            
            <div class="col-md-12">
                <div class="post-container">
                    <div class="post-header">
                        <img class="post-avatar" src="https://mma.prnewswire.com/media/965311/STEM_Logo_Logo.jpg" alt="User Avatar">
                        <span><?=$md->fullname?></span><hr>
                        <span>Posted on: <?=$sdatet?></span>
                    </div>
                    <div class="post-content">
                        <p><h6><?=$pt->que?></h6> <br> <?=$plant?> | <?=$md->project_code?> | <?=$md->sname?> | <?=$md->task_type?> | <?=$md->taskname?></p>
                        <div class="post-media">
                            
                            <img src="<?=$url1?>" loading="lazy">
                        </div>
                    </div>
                    <div class="post-footer">
                        <button class="btn btn-action" onclick="handleLike(this)"><i class="like-icon fas fa-thumbs-up"></i> Like</button>
                        <textarea id="commentBox" class="form-control comment-box" placeholder="Write a comment..." onkeydown="handleComment(event)"></textarea>
                    </div>
                </div>
            </div>
            <?php }}?>
            
            <?php if($vu){if($vu[0]->ans2!='' && $vu[0]->ans1==''){?>
            
            
            
            <div class="col-md-12">
                <div class="post-container">
                    <div class="post-header">
                        <img class="post-avatar" src="https://mma.prnewswire.com/media/965311/STEM_Logo_Logo.jpg" alt="User Avatar">
                        <span>Jane Smith</span><hr>
                        <span>Posted on: October 8, 2023 10:30 AM</span>
                    </div>
                    <div class="post-content">
                        <p><h6><?=$pt->que?></h6><br><?=$plant?> | <?=$md->project_code?> | <?=$md->sname?> | <?=$md->task_type?> | <?=$md->taskname?></p>
                        <div class="post-media">
                            <video controls>
                                <source src="<?=$url2?>" loading="lazy">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="post-footer">
                        <button class="btn btn-action" onclick="handleLike(this)"><i class="like-icon fas fa-thumbs-up"></i> Like</button>
                        <textarea id="commentBox" class="form-control comment-box" placeholder="Write a comment..." onkeydown="handleComment(event)"></textarea>
                    </div>
                </div>
            </div>
            
            <?php }} ?>
            
            
            <?php if($vu){if($vu[0]->ans2!='' && $vu[0]->ans1!=''){?>
            
            
            
            <div class="col-md-12">
                <div class="post-container">
                    <div class="post-header">
                        <img class="post-avatar" src="https://mma.prnewswire.com/media/965311/STEM_Logo_Logo.jpg" alt="User Avatar">
                        <span>Jane Smith</span><hr>
                        <span>Posted on: October 8, 2023 10:30 AM</span>
                    </div>
                    <div class="post-content">
                        <p><h6><?=$pt->que?></h6><br><?=$plant?> | <?=$md->project_code?> | <?=$md->sname?> | <?=$md->task_type?> | <?=$md->taskname?></p>
                        <div class="post-media">
                            <video controls>
                                <source src="<?=$url2?>" loading="lazy">
                                Your browser does not support the video tag.
                            </video><?=$url2?>
                        </div>
                    </div>
                    <div class="post-footer">
                        <button class="btn btn-action" onclick="handleLike(this)"><i class="like-icon fas fa-thumbs-up"></i> Like</button>
                        <textarea id="commentBox" class="form-control comment-box" placeholder="Write a comment..." onkeydown="handleComment(event)"></textarea>
                    </div>
                </div>
            </div>
            
            <?php }} ?>
            
            <?php }} ?>
            
            
            
            
            <div class="col-md-12">
                <div class="post-container text-post">
                    <div class="post-header">
                        <img class="post-avatar" src="https://placekitten.com/50/50" alt="User Avatar">
                        <span>Alice Johnson</span><hr>
                        <span>Posted on: October 8, 2023 10:30 AM</span>
                    </div>
                    <div class="post-content">
                        <p><center><b>This is a text-only post without any media content. #TextPost #NoMedia</b></center></p>
                    </div>
                    <div class="post-footer">
                        <button class="btn btn-action" onclick="handleLike(this)"><i class="like-icon fas fa-thumbs-up"></i> Like</button>
                        <textarea id="commentBox" class="form-control comment-box" placeholder="Write a comment..." onkeydown="handleComment(event)"></textarea>
                    </div>
                </div>
            </div>
            
            
            
            
        </div>
    </div>
      
    </section>
    

<script>
        function handleLike(button) {
            button.classList.add('disabled');
            button.style.color = 'green';
        }
        function handleComment(event) {
            if (event.key === 'Enter') {
                var commentBox = event.target;
                var commentText = commentBox.value.trim();
                if (commentText !== '') {
                    console.log('Comment posted:', commentText);
                    commentBox.disabled = true;
                    commentBox.placeholder = 'Comment locked';
                }
            }
        }
    </script>
    
</div>
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