<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stem Operation | Webapp</title>

  <!-- Google Font: Source Sans Pro -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <img src="https://stemlearning.in/wp-content/uploads/2020/07/stem-new-logo-2-1.png" width="70%" />
      <a href="#" class="h1"><b>Operation</b>APP</a>
    </div>
    <div class="card-body">

      <?=form_open('Menu/login')?>
        <div class="input-group mb-3">
            <p class="login-box-msg">Enter Your Password Recover Email ID</p>
          <input type="email" name="email" id="email" class="form-control" placeholder="Email ID">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa-solid fa-user"></span>
            </div>
          </div>
        </div>
        <div id="sms"></div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Recover</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

$('#email').on('change', function f() {
    var email = document.getElementById("email").value;
$.ajax({
url:'<?=base_url();?>Menu/srcmail',
type: "POST",
data: {
email: email
},
cache: false,
success: function a(result){
$("#sms").html(result);
}
});
});
</script>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
