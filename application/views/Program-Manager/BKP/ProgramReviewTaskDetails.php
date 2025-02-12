<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $type; ?> | STEM LEARNING PVT LTD </title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
  
      .formareabg {
    padding: 40px;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
}
.flex-wrap {flex-wrap: wrap !important;}.d-flex {display: flex !important;}.main_area .icon_sty {max-height: 120px;width: 158px;width: 164px;margin-bottom: 25px;cursor: pointer;text-decoration: none;color: black;box-shadow: rgb(0 0 0 / 5%) 0px 0px 0px 1px;padding: 10px 0px;margin: 5px;}.mhs_sty_mps{display: flex !important;align-items: center;justify-content: center;}.mhs_sty_mps_task :hover{background: rgb(122 217 255 / 0.17);transition:0.4 ease-in-out;}h6.p-2.bg-gray34.text-center.bgtimebackground {background: #005c0b;color: white;}

    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php require('nav.php');?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid ">
          <!-- <div class="card  p-1 text-right bg-dark text-white">
            <a href='<?=base_url();?>Menu/ProgrramReviewPage' traget="_blank" ><i>Back to Progrram Review Page</i></a>
            </div> -->
     
            <div class="card p-4">
              <div class=" card p-3 text-right bg-dark text-center">
                <h5><i><?= $type; ?></i> </h5>
              </div>

             <div class="row">
               
                <?php 
              if($type =='Upload Installation Report'){
                if(sizeof($datatask) == 0){
                    echo "No Record";
                }
              foreach($datatask as $dt){
              
              ?>
               <div class="col-md-3">
                <div class="card p-4 d-flex bg-success1 text-center" style="width:250px;" >
                <embed
                    src="<?php echo base_url().$dt->filepath ?>"
                    frameBorder="0"
                    scrolling="auto"
                    height="200px"
                    width="200px"
                ></embed>
                <hr>
                <a class="bg-primary" href="<?php echo base_url().$dt->filepath ?>" download>
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                    view PDF
                </a>
                </div>
                </div>
                <?php } }  
                if($type =='Total Utilisation'){
                 
                      if(sizeof($datatask) == 0){
                        echo "No Record";
                    }
                    foreach($datatask as $dt){ ?>
                       <div class="col-md-3">
                       <div class="card p-2">
                       <a href="<?php echo base_url(). $dt->filepath; ?>" download>
                            <img src="<?php echo base_url(). $dt->filepath; ?>" class="img-fluid" alt="Responsive image">
                    </a>
                        </div>
                       </div>
                  <?php }} 
                  
                  if( $type =='Upload FTTP Report'){
                    if(sizeof($datatask) == 0){
                        echo "No Record";
                    }
                    foreach($datatask as $dt){ ?>
                       <div class="col-md-3">
                       <div class="card p-2">
                       <embed
                    src="<?php echo base_url().$dt->filepath ?>"
                    frameBorder="0"
                    scrolling="auto"
                    height="200px"
                    width="200px"
                ></embed>
                <hr>
                <a class="bg-primary" href="<?php echo base_url().$dt->filepath ?>" download>
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                    view PDF
                </a>
                        </div>
                       </div>
                  <?php }}
                  
                  if($type =='Upload Maintenance Report'){
                    if(sizeof($datatask) == 0){
                        echo "No Record";
                    }
                    foreach($datatask as $dt){ ?>
                       <div class="col-md-3">
                       <div class="card p-2">
                       <embed
                    src="<?php echo base_url().$dt->filepath ?>"
                    frameBorder="0"
                    scrolling="auto"
                    height="200px"
                    width="200px"
                ></embed>
                <hr>
                <a class="bg-primary" href="<?php echo base_url().$dt->filepath ?>" download>
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                    view PDF
                </a>
                        </div>
                       </div>
                  <?php }} 
                  
                  if($type =='Upload RTTP Report'){
                    if(sizeof($datatask) == 0){
                        echo "No Record";
                    }
                    foreach($datatask as $dt){ ?>
                       <div class="col-md-3">
                       <div class="card p-2">
                       <embed
                    src="<?php echo base_url().$dt->filepath ?>"
                    frameBorder="0"
                    scrolling="auto"
                    height="200px"
                    width="200px"
                ></embed>
                <hr>
                <a class="bg-primary" href="<?php echo base_url().$dt->filepath ?>" download>
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                    view PDF
                </a>
                        </div>
                       </div>
                  <?php }} 
                  
                  if($type =='Upload M&E Report'){
                    if(sizeof($datatask) == 0){
                        echo "No Record";
                    }
                    foreach($datatask as $dt){ ?>
                       <div class="col-md-3">
                       <div class="card p-2">
                       <embed
                    src="<?php echo base_url().$dt->filepath ?>"
                    frameBorder="0"
                    scrolling="auto"
                    height="200px"
                    width="200px"
                ></embed>
                <hr>
                <a class="bg-primary" href="<?php echo base_url().$dt->filepath ?>" download>
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                    view PDF
                </a>
                        </div>
                       </div>
                  <?php }}
                  if($type =='Upload DIY Report'){
                    if(sizeof($datatask) == 0){
                        echo "No Record";
                    }
                    foreach($datatask as $dt){ ?>
                       <div class="col-md-3">
                       <div class="card p-2">
                       <embed
                    src="<?php echo base_url().$dt->filepath ?>"
                    frameBorder="0"
                    scrolling="auto"
                    height="200px"
                    width="200px"
                ></embed>
                <hr>
                <a class="bg-primary" href="<?php echo base_url().$dt->filepath ?>" download>
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                    view PDF
                </a>
                        </div>
                       </div>
                  <?php }} 
                  if($type =='Monthly Report'){
                    if(sizeof($datatask) == 0){
                        echo "No Record";
                    }
                    foreach($datatask as $dt){ ?>
                       <div class="col-md-3">
                       <div class="card p-2">
                       <embed
                    src="<?php echo base_url().$dt->filepath ?>"
                    frameBorder="0"
                    scrolling="auto"
                    height="200px"
                    width="200px"
                ></embed>
                <hr>
                <a class="bg-primary" href="<?php echo base_url().$dt->filepath ?>" download>
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                    view PDF
                </a>
                        </div>
                       </div>
                  <?php }} 

if($type == 'Annual Report'){
    if(sizeof($datatask) == 0){
        echo "No Record";
    }
    foreach($datatask as $dt){ ?>
       <div class="col-md-3">
       <div class="card p-2">
       <embed
    src="<?php echo base_url().$dt->filepath ?>"
    frameBorder="0"
    scrolling="auto"
    height="200px"
    width="200px"
></embed>
<hr>
<a class="bg-primary" href="<?php echo base_url().$dt->filepath ?>" download>
    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
    view PDF
</a>
        </div>
       </div>
  <?php }} ?> 
                
             </div>
            </div>


        



          </div>
          </div>

        
        </div>
    
      </div>
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
    <!-- ./wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
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