<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
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
          <?php $notify=$this->Menu_model->get_notifybyid($uid);?>
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
          
          
          <li class="nav-item menu-open">
            <a href="<?=base_url();?>Menu/NextDayPlan" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Next Day Planing</p>
            </a>
          </li>
          
          <li class="nav-item menu-open">
            <a href="<?=base_url();?>Menu/MeetingRequest" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Meeting Request</p>
            </a>
          </li>
          
          <li class="nav-item menu-open">
            <a href="<?=base_url();?>Menu/repaircheck" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Repair Check</p>
            </a>
          </li>
          
          <li class="nav-item menu-open">
            <a href="<?=base_url();?>Menu/ChangeinSPD" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Changein SPD</p>
            </a>
          </li>
          
          <li class="nav-item menu-open">
            <a href="<?=base_url();?>Menu/programs" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Programs Detail</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/Mytarget" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>My Target</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/DayStartCheck" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Day Start Check</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/DayCloseCheck" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Day Close Check</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/LiveVisitIMP" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Live Visit</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/ReportVisit" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Report Visit</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/editProfile" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Edit Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/Total_Handover" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Handover Detail</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/MaintenanceReport" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Ins-Main Request</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/createtask" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Create Task</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>Menu/TransitAssign" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Transit Assign</p>
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
      <!-- /.sidebar-menu -->
      
      <hr><center><lable class="text-warning"><b>Alert!</b></lable></center><hr>
          <span id="alsmss"></span>
    </div>
    <!-- /.sidebar -->
  </aside>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script> 
<script> 
    var ur_id = document.getElementById("ur_id").value;;
    $.ajax({
    url:'<?=base_url();?>Menu/pcpopup',
     method: 'post',
     data: {ur_id: ur_id},
     success: function(result){
        var res = result;
        $("#alsmss").html(res);
    }
    });
    
</script>