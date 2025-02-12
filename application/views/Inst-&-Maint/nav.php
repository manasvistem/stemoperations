<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url();?>Menu/Dashboard" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <button type="button" class="btn btn-primary ml-3" onclick="goBack()">Go Back</button>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <button type="button" class="btn btn-secondary ml-3" onclick="goForward()">Go Forward</button>
      </li>
      </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
      <!-- Messages Dropdown Menu -->
      <?php 
        $user = $this->session->userdata('user');
        $data['user'] = $user;$uid= $user['id'];
        $uid= $user['id'];
      ?>
      <h4>HI!  <?=$user['fullname']?></h4>
      <input type="hidden" id="ur_id" value="<?=$uid?>">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url();?>/Menu/Notification">
          <i class="far fa-bell"></i>
          <?php $notify=$this->Menu_model->notify($uid);?>
          <span class="badge badge-warning navbar-badge"><?=sizeof($notify);?></span>
        </a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <img src="https://stemlearning.in/wp-content/uploads/2020/07/stem-new-logo-2-1.png" width="80%" class="p-3">
    <center><h5 class="text-white"><b>STEM Operation</b></h5></center>
    <hr>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url();?>assets/image/user/Team.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User Name</a>
        </div>
      </div>
      
      
      <?php $hjlink = $this->Menu_model->get_hjoinlink();
        if($hjlink){
        $meetlink = $hjlink[0]->meetlink;
        $piid = $hjlink[0]->insid;
        $numbers = array_map('intval', explode(', ', $piid));
        if (in_array($uid, $numbers)) { ?>
        <a href="<?=$meetlink?>" class="btn btn-primary" target="_blank">Review Link</a>
      <?php }} ?>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/Dashboard" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/DayManagement" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Day Management</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/TransitProcess" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Transit Process</p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/MyDayDetail" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Day Management Detail</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/NextDayPlan" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Next Day Plan</p>
            </a>
          </li>
          
          <li class="nav-item">
                <a href="<?=base_url();?>Menu/CreateTask" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Task</p>
                </a>
            </li>
          
            <li class="nav-item">
                <a href="<?=base_url();?>Menu/RequestAmount" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Amount</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?=base_url();?>Menu/maintenanceBag" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Maintenance Bag</p>
                </a>
            </li>
            
            <li class="nav-item">
            <a href="<?=base_url();?>Menu/editProfile" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Edit Profile</p>
            </a>
          </li>
            
            <li class="nav-item">
                <a href="<?=base_url();?>Menu/logout" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
            </li>
          
        </ul>
      </nav>
      
      <hr><center><lable class="text-warning"><b>Alert!</b></lable></center><hr>
          <span id="alsmss">esgds</span>
    </div>
    <!-- /.sidebar -->
  </aside>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script> 
<script> 

function handleGeolocationError() {
   const bodyElement = document.querySelector("body");
   bodyElement.style.display = "none";
   alert('Error: Geolocation is not available or location services are turned off.');
}
function handleGeolocationSuccess(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    const contentDiv = document.getElementById("content");
    contentDiv.style.display = "block";
}
function getLocation() {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(handleGeolocationSuccess, handleGeolocationError);
    } else {
        const errorMessage = document.getElementById("error-message");
        errorMessage.style.display = "block";
    }
}
window.onload = getLocation;


function startCamera() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
        })
        .catch(function(error) {
             const bodyElement = document.querySelector("body");
             bodyElement.style.display = "none";
             alert('Error: Camera access permission denied.');
        });
}
startCamera();

$(document).ready(function() {
    trackLocation();
});

function trackLocation() {
    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          var ur_id = document.getElementById("ur_id").value;
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;
            $.ajax({
                url:'<?=base_url();?>Menu/store_location',
                 method: 'post',
                 data: {latitude: latitude, longitude: longitude, ur_id: ur_id},
                 success: function(result){
                }
            });
        },
        function (error) {
          console.error("Error getting location: " + error.message);
        }
      );
    } 
    else {console.error("Geolocation is not supported by this browser.");} 
}

function goBack() { window.history.back(); }
function goForward() { window.history.forward(); }




    var ur_id = document.getElementById("ur_id").value;
    $.ajax({
    url:'<?=base_url();?>Menu/allpopup',
     method: 'post',
     data: {ur_id: ur_id},
     success: function(result){
        var res = result;
        $("#alsmss").html(res);
    }
    });
    
</script>  