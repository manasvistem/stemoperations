<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIA List With Academic Calender | STEM LEARNING PVT LTD </title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <style>
      body{
      height: 100vh;
      width: 100%;
      margin: 0;
      background: #bdbdc9;
      }
      .formareabg {
      padding: 10px;
      box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
      }
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php require('nav.php');?>
      <div class="content-wrapper">
      <?php if ($this->session->flashdata('approved_message')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong> <?php echo $this->session->flashdata('approved_message'); ?></strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endif; ?>
        <div class="content-header">
          <div class="container-fluid ">
            <div class="card p-4">
              <div class="card p-2 bg-dark text-center">
                <h3>PIA List With Academic Calender</h3>
              </div>

              <div class="card table-responsive">
              <div class="card p-2 bg-info text-center">
                <h3>All PIA List</h3>
              </div>
              <?php
         
               $allpiacnt =  sizeof($allpia);
               if($allpiacnt > 0){
               ?>
              <table id="example1" class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">No of School</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                              <tbody>
                                <?php $i=1; foreach($allpia as $pdata): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                     <td>
                                       <strong><?=$pdata->fullname ?></strong>
                                     </td>
                                     <td>
                                     <strong><?php 
                                     $piaschool = $this->Menu_model->getAllSchoolInPIA($pdata->id);
                                      $piaschoolcnt = sizeof($piaschool);
                                      echo $piaschoolcnt;
                                     ?></strong>
                                     </td>
                                     <td>

                                     <select onchange="statusupdate(this.value,<?=$pdata->id ?>)" id="statusup<?=$pdata->id ?>">

                                        <option selected disabled>Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                        </select>
                                        <?php 

                                        $stylered = "background:red;color:white;padding:5px";
                                        $stylegreen = "background:green;color:white;padding:5px";
                                        if( $pdata->status == 'active'){
                                        ?>
                                        <span style="<?= $stylegreen?>" id="statusupdate<?=$pdata->id ?>">Active</span>
                                        <?php }else{ ?>
                                            <span style="<?= $stylered ?>" id="statusupdate<?=$pdata->id ?>">InActive</span>
                                        <?php }?>
                                    
                                     </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                        <?php } ?>
                     </div>
            <div class="card table-responsive">
              <div class="card p-2 bg-success text-center">
                <h3>PIA List (start to work with academic calender)</h3>
              </div>
              <?php
                $piaDataCaleSuccessco =  sizeof($piaDataCaleSuccess);
               if($piaDataCaleSuccessco > 0){
               ?>
              <table id="example2" class="table table-striped">
              <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">No of School</th>
                                    <th scope="col">status</th>
                    
                                    </tr>
                                </thead>
                              <tbody>
                                <?php $i=1; foreach($piaDataCaleSuccess as $pdatas): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                     <td>
                                       <strong><?=$pdatas->fullname ?></strong>
                                     </td>
                                     <td>
                                     <strong><?php 

                                        $piaschool = $this->Menu_model->getAllSchoolInPIA($pdata->id);
                                        $piaschoolcnt = sizeof($piaschool);
                                        echo $piaschoolcnt;
                                     ?></strong>
                                     </td>
                                     <td>
                                     <?php
                                        $stylered = "background:red;color:white;padding:5px";
                                        $stylegreen = "background:green;color:white;padding:5px";
                                        if( $pdata->status == 'active'){
                                        ?>
                                        <span style="<?= $stylegreen?>">Active</span>
                                        <?php }else{ ?>
                                            <span style="<?= $stylered ?>">InActive</span>
                                        <?php }?>
                                     </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>



                    <div class="card table-responsive">
              <div class="card p-2 bg-danger text-center">
              <h3>PIA List (not start to work with academic calender)</h3>
              </div>
              <?php
         
               $allpiacount =  sizeof($allpia);
               if($allpiacount > 0){
               ?>
              <table id="example3" class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">No of School</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                              <tbody>
                                <?php $i=1; foreach($piaDataCale as $pdata): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                     <td>
                                       <strong><?=$pdata->fullname ?></strong>
                                     </td>
                                     <td>
                                     <strong><?php 
                                      $piaschool = $this->Menu_model->getAllSchoolInPIA($pdata->id);
                                      $piaschoolcnt = sizeof($piaschool);
                                      echo $piaschoolcnt;
                                     
                                     ?></strong>
                                     </td>
                                     <td>

                                        <?php
                                        $stylered = "background:red;color:white;padding:5px";
                                        $stylegreen = "background:green;color:white;padding:5px";
                                        if( $pdata->status == 'active'){
                                        ?>
                                        <span style="<?= $stylegreen?>" >Active</span>
                                        <?php }else{ ?>
                                            <span style="<?= $stylered ?>">InActive</span>
                                        <?php }?>
                                    
                                     </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                        <?php } ?>
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
    <script>
 
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
    <script src="<?=base_url();?>assets/js/adminlte.js"></script>
    <script src="<?=base_url();?>assets/js/dashboard.js"></script>
    <script>
           $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example2").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

    $("#example3").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');



    function statusupdate(val,piaId){
        
      var statusupdate = "#statusupdate"+piaId;
        var statusdata = $('#statusup'+piaId).val();
        // alert(statusupdate);
        // alert(statusdata);
        $.ajax({
            url:'<?=base_url();?>Menu/pIAStatusUpdate',
			type:'post',
			data:"id="+piaId+"&status="+statusdata,
			success:function(result){
                if(result == 0){
                    $(statusupdate).text('InActive');
                    $(statusupdate).css({"background-color": "red", "color": "white","padding": "5px"});
                }else{
                    $(statusupdate).text('Active');
                    $(statusupdate).css({"background-color": "Green", "color": "white","padding": "5px"});
                }
                // alert(result);
            }
        });
    }
















    </script>
  </body>
</html>