<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12 m-auto">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url();?>Menu/profileedit" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" class="form-control" value="<?=$uid?>"/>
                <div class="card-body">
                    <div class="row">
                            <div class="col-lg-12 p-3 m-auto">
                         
                              <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="fullname" class="form-control" value="<?=$user['fullname']?>"/>
                              </div>
                              <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?=$user['email']?>"/>
                              </div>
                              <div class="form-group">
                                <label>phone No</label>
                                <input type="number" name="phoneno" class="form-control" value="<?=$user['phoneno']?>"/>
                              </div>
                              <div class="form-group">
                                <div><label>Old Password</label>
                                <input type="Password" name="oldpass" class="form-control"/>
                              </div>
                              <div class="form-group">
                                <div><label>New Password</label>
                                <input type="Password" name="newpass" class="form-control"/>
                              </div>
                        </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true;">
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>

$(function rbspd() {
    $('input:radio[name="rspd"]').change(function() {
        if ($(this).val() == 'wspd') {
            $("#sspd").show();
        } else {
            $("#sspd").hide();
        }
    });
});


$('#projcode').on('change', function a() {
var projcode = document.getElementById("projcode").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getspdbycode',
type: "POST",
data: {
projcode: projcode
},
cache: false,
success: function a(result){
$("#spd").html(result);
}
});
});



$('#projcode').on('change', function b() {
var projcode = document.getElementById("projcode").value;
   
$.ajax({
url:'<?=base_url();?>Menu/getyear',
type: "POST",
data: {
projcode: projcode
},
cache: false,
success: function a(result){
$("#year").html(result);
}
});
});

</script>
          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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
</div></div></div>