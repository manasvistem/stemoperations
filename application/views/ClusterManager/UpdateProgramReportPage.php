<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Program SID Update | STEM LEARNING PVT LTD </title>
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

        .card.table-responsive {
    background: bisque;
    padding: 10px;
}





        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <?php require('nav.php');?>
            <div class="content-wrapper">
                <?php if ($this->session->flashdata('success_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <?php echo $this->session->flashdata('success_message'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <div class="content-header">
                    
                    <div class="container-fluid ">

                    <div class="card p-2 bg-success text-center">
                        <h5>Update Program Report SID</h5>
                    </div>
                    <hr>
                    <div class="card p-2 bg-info text-center">
                        <h5><?= $pcode?></h5>
                    </div>

                        <div class="card p-4">
                      <?php 
                
                    $grouped = [];

                    // Grouping by 'sid'
                    foreach ($getwgPcode as $item) {
                        $sid = $item->spd_id;
                        if (!isset($grouped[$sid])) {
                            $grouped[$sid] = [];
                        }
                        $grouped[$sid][] = $item;
                    }


                    // echo "<pre>";
                    // print_r($grouped);
                    // die;

                    $j=1;
                    foreach($grouped as $gdata):
                        $gdatacnt =  sizeof($gdata);
                        if($gdatacnt > 0){

                            if($j ==1){
                                $show = 'show';
                            }else{
                                $show = '';
                            }
                          
                      ?>
                                
                                <div id="accordion<?=$j?>">
                                
                                <div class="card">
                                    <div class="card-header bg-primary" id="headingOne<?=$j?>">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne<?=$j?>" aria-expanded="true" aria-controls="collapseOne">
                                              [ <?=$j ?> ]  School Name -  <?= $this->Menu_model->getSchoolNameBySid($gdata[0]->spd_id) ?> - <?= $gdata[0]->spd_id ?>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne<?=$j?>" class="collapse <?= $show ?>" aria-labelledby="headingOne<?=$j?>" data-parent="#accordion<?=$j?>">
                                    <div class="card-body">

                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                        <?php $k=1; 
                                        foreach($gdata as $pdata1):
                                            if($k == 1){
                                            ?>
                                            <form action="<?=base_url();?>Menu/UpdateProgramReportPageSID" method="post" id="formbody<?= $pdata1->spd_id ?>">
                                                <input type="hidden" value="<?= $pdata1->project_code ?>" name="project_code">
                                                <input type="hidden" value="<?= $pdata1->spd_id ?>" name="old_sid">
                                                <input type="number"name="update_sid" placeholder="Enter right sid" >
                                                <button type="submit" id="update<?= $pdata1->spd_id ?>" class="btn btn-primary">Update</button>
                                            </form>
                                            <?php } $k++; endforeach; ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="card table-responsive">
                                <table id="example1" class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Project Code</th>
                                            <th scope="col">SID</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Show</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($gdata as $pdata): ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $pdata->project_code ?></td>
                                            <td> <p><?= $this->Menu_model->getSchoolNameBySid($pdata->spd_id) ?> - <?= $pdata->spd_id ?></p> </td>
                                            <td><?= $pdata->report_type ?></td>
                                            <td>
                                                <embed
                                                src="<?=base_url();?><?= $pdata->filepath ?>"
                                                type="application/pdf"
                                                frameBorder="0"
                                                scrolling="auto"
                                                height="200px"
                                                width="200px"
                                            ></embed></td>
                                            <td>
                                                <a href="<?=base_url();?><?= $pdata->filepath ?>" target="_BLANK" >
                                                <?=base_url();?><?= $pdata->filepath ?>
                                                </a>
                                            </td>
                                           
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                                    </div>
                                </div>

                                </div>
                            <?php  $j++; } endforeach; ?>
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
    </script>


<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            // Prevent default form submission
            event.preventDefault();
            if (confirm('Are you sure you want to update the data?')) {
            // Serialize form data
            var formData = $(this).serialize();

            var params = new URLSearchParams(formData);
            var sid = params.get('old_sid');
            var btn = '#update'+sid;
            $(btn).text('Please Wait..');
            $(btn).attr("disabled", true);

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                success: function(response) {
                
                    if(response ==1){
                        $(formbodyid).hide();
                        $(btn).text('Update');
                        $(btn).attr("disabled", false);
                        alert("Data Update Successfully");

                    }else{
                        $(formbodyid).show();
                        $(btn).text('Update');
                        $(btn).attr("disabled", false);
                    }
                },
            });


        }else {
            // User cancelled the confirmation alert, do nothing
            alert("Update cancelled");
        }

        });
    });
    </script>




</body>
</html>